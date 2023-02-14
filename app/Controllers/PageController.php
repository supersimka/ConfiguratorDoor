<?php

namespace App\Controllers;

use App\Models\Configurator;
use Symfony\Component\Routing\RouteCollection;

class PageController
{
	protected $params;
	public function __construct()
	{
		$this->params = new Configurator;
	}
    //Главная
	public function indexAction(RouteCollection $routes)
	{
				//чистим базу при обновлении
				$this->params->clear_params();

				$type_params = $this->params->get_params();
				$get_params_value = $this->params->get_params_value_all();
        require_once APP_ROOT . '/views/home.php';
	}

	// Показываем параметры во всплывающем окне
	public function showParamsValue(int $id, RouteCollection $routes)
	{
			 $params_value = $this->params->get_params_value($id);
			 require_once APP_ROOT . '/views/ajax/modalParam.php';
	}

	// Устанавливаем параметры
	public function setParamsValue(int $id, RouteCollection $routes)
	{
			 $param_value = $this->params->set_param($id);
			 print json_encode($param_value);
	}


}
