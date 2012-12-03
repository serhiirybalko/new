<?php
//////////////////////////SR
require_once "./../bpqueue.php";
require_once "./../config/dbconfig_debug.php";

$bpqueue=new bpQueue();
echo '<h3>Создаем новый объект класса bpQueue и выводим информацию о нем используя метод showInfo класса bpQueue:</h3>';
echo '$bpqueue->showInfo()<br>';
$bpqueue->showInfo();
echo '<h3>Присваиваем свойствам вновь созданного объекта следующие значения:</h3>';
echo '$bpqueue->type = "payment";<br>
$bpqueue->object_id = 20;<br>
$bpqueue->queued_item = "bp2";<br>
$bpqueue->reason = "Смена юрлица";<br>
$bpqueue->createdon = date("Y-m-d h:m:s",time());<br>
$bpqueue->status = "not_processed";<br>
';

$bpqueue->type = "payment";
$bpqueue->object_id = 20;
$bpqueue->queued_item = "bp2";
$bpqueue->reason = "Смена юрлица";
$bpqueue->createdon = date("Y-m-d h:m:s",time());
$bpqueue->status = "not_processed";
echo '<h3>Выводим информацию об объекте с измененными свойствами:</h3>';
echo '$bpqueue->showInfo()<br>';
$bpqueue->showInfo();
echo '<h3>Добавляем объект в базу, используя метод insertItem класса bpQueue:</h3>';
echo '$bpqueue->insertItem()<br>';
$res=$bpqueue->insertItem();
echo '<h3>Загружаем объект из базы, используя метод loadNextItem класса bpQueue указав в его параметрах тип и название процесса:</h3>';
echo '$bpqueue->loadNextItem("payment","bp2")<br>';
$res=$bpqueue->loadNextItem('payment','bp2');

echo '<h3>Запускаем блок try-catch в котором вызываем метод processItem класса bpQueue указав в его параметрах название функции обработки и ее параметр (тест)</h3>';
echo '$bpqueue->processItem("callbackFuncName",true)<br>
если функция обработки вернет -1, будет выведено сообщение "Queue callback function failed", в базе статус объекта примет значение "processing" (метод updateStatusCode)<br>
если функция обработки вернет 1, будет выведено сообщение "Queue callback function worked, the process is complete!", в базе статус объекта примет значение "processed" (метод updateStatusCode)<br>
';

if ($res!=''){	
	try{
	  $bpqueue->processItem('callbackFuncName',true);
	  echo 'Message: <b>Queue callback function worked, the process is complete!</b>';
	}
	catch(Exception $e){
	  echo 'Message: ' .$e->getMessage();
	}
}


?>