<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.png">
    <title>Конфигуратор</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/css/style.css?v=24">
</head>

<body>
<div class="container">
	<section>
		<h1>Конфигуратор входной двери</h1>
    <div class="row">
      <div class="col-md-3 col-6">
        <div class="door bg-light one m-2"> <div class="knob left"></div></div>
        <div class="ml-2">Вид снаружи</div>
      </div>
      <div class="col-md-3 col-6">
        <div class="door bg-light two m-2"> <div class="knob right"></div> </div>
        <div class="ml-2">Вид внутри</div>
      </div>
      <div class="col-md-6 col-12">
        <div class="h2">Параметры</div>
        <?php if(!empty($type_params)): ?>
          <?php foreach ($type_params as $key => $value): ?>
             <div class="row p-2">
               <div class="col"> <?= $value['type'] ?> </div>
               <div class="col relative">
                 <a class="choose" id="choose<?= $value['id'] ?>" rel="<?= $value['id'] ?>">Выбрать</a>
                 <div class="d-none microModal">
                   <? $params_value = $get_params_value[$value['id']]; ?>
                     <?php if(!empty($params_value)): ?>
                       <div class="row p-2">
                         <?php foreach ($params_value as $key => $value): ?>
                              <div class="col m-2 param"
                                 <?php if(!empty($value['img'])): ?> style="background:<?= $value['img'] ?>"<?php endif; ?>
                                 rel="<?= $value['id'] ?>">
                                     <?php if(empty($value['img'])): ?><?= $value['param'] ?><?php endif; ?>
                              </div>
                         <?php endforeach; ?>
                       </div>
                     <?php endif; ?>
                    </div>
                </div>
             </div>
          <?php endforeach; ?>
        <?php endif; ?>
        <div class="row p-2 result_price hide"><div class="col"></div><div class="col">Итого: <span class="price">0</span>р.</div></div>
      </div>
    </div>
  </section>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.bundle.min.js"></script>
  <script src="/public/js/script.js?v=50"></script>
</body>

</html>
