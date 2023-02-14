<?php
namespace App\Models;
use PDO;

class Configurator extends Model
{
	//все типы параметров
	public function get_params()
	{
		$params = $this->pdo->prepare("SELECT * FROM `type_params` WHERE `public` = :public");
		$params->execute(array('public' => '1'));
		return $params->fetchAll(PDO::FETCH_ASSOC);
	}

	//все типы параметров
	public function get_params_value_all()
	{
		foreach ($this->get_params() as $key => $value) {
			$params = $this->pdo->prepare("SELECT * FROM `params_value` WHERE id_type = :id_type AND `public` = :public ");
			$params->execute(array('id_type' =>$value['id'],'public' => '1'));
			$param_value = $params->fetchAll(PDO::FETCH_ASSOC);
			$result[$value['id']] = $param_value;
		}
		return $result;
	}

	//все типы параметров
	public function get_params_value(int $id)
	{
		$params = $this->pdo->prepare("SELECT * FROM `params_value` WHERE `id_type` = :id_type AND `public` = :public ");
		$params->execute(array('id_type' => $id, 'public' => '1'));
		return $params->fetchAll(PDO::FETCH_ASSOC);
	}

	//получаем значение
	public function get_param(int $id)
	{
		$param = $this->pdo->prepare("SELECT * FROM `params_value` WHERE `id` = :id AND `public` = :public ");
		$param->execute(['id' => $id, 'public' => '1']);
		return $param->fetch(PDO::FETCH_ASSOC);
	}

	//устанавливаем cookie гостя
	public function cookie()
	{
		if(empty($_COOKIE['guest'])) setcookie("guest", rand(1,100000000), time()+86400, '/');
		return $_COOKIE['guest'];
	}

	//получаем сумму
	public function get_sum()
	{
		$cookie = $this->cookie();

		$stm = $this->pdo->prepare("SELECT SUM(`price`) AS `sum` FROM `users_params` JOIN `params_value` ON `users_params`.`value_param`=`params_value`.`id`
		WHERE `session` = :session");
		$stm->execute(['session' => $cookie]);
		$sum = $stm->fetch(PDO::FETCH_ASSOC);
		return $sum['sum'];
 }

	//устанавливаем значение
	public function set_param(int $id)
	{
		$cookie = $this->cookie();
		$param = $this->get_param($id);

		$stm = $this->pdo->prepare("SELECT * FROM `users_params` WHERE `type_param` = :id_type AND `session` = :session");
		$stm->execute(['id_type' => $param['id_type'], 'session' => $cookie]);
		$get_user = $stm->fetch(PDO::FETCH_ASSOC);

		if(empty($get_user['id']))
		{
	 		$this->pdo->prepare("INSERT INTO `users_params` (session, type_param, value_param) VALUES (?,?,?)")->execute([$cookie, $param['id_type'], $id]);
		}
		else
		{
			$query = $this->pdo->prepare("UPDATE `users_params` SET `value_param` = :value_param WHERE `id` = :id");
			$query->execute(['value_param' => $id, 'id' => $get_user['id']]);
		}

		$param['sum'] = $this->get_sum();
		return $param;
		//
	}

	//чистим таблицу
	public function clear_params()
	{
		$cookie = $this->cookie();

		$query = $this->pdo->prepare("DELETE FROM `users_params` WHERE `session` = :session");
		$query->execute(['session' => $cookie]);

		return true;
		//
	}

}
