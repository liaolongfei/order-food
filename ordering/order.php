<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-10-23
 * Time: 下午12:06
 */

header("Content-type: text/html; charset=utf-8");
error_reporting(E_ERROR);
ini_set("display_errors","Off");

include('db.php');

$order_sn = date("YmdHis").rand(100000,999999);
$customer = $_POST['customer'];
$order_time = time();
$ip = $_SERVER["REMOTE_ADDR"];

foreach($_POST as $key => $value)
{
  if(strstr($key, 'select'))
  {
    $food_id = $value;
    $food_name = getNameByID($food_id);
    $food_number = $_POST['food'.$value.'number'];
    $food_price  = getPriceByID($food_id);
    $food_sum_price = $food_price * $food_number;
   // echo $food_id.' '.$food_name.' '.$food_number.' '.$food_price.' '.$food_sum_price."</br>";
    insertFoodOrder($order_sn,$customer,$food_id,$food_name,$food_price,$food_number,$food_sum_price,$order_time,$ip);
    echo "over";

  }
  
}

$href = "Location: result.php"."?order_sn=".$order_sn;
header($href); 

  



