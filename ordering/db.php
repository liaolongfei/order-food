
<?php
header("Content-type: text/html; charset=utf-8");
 error_reporting(E_ERROR);
 ini_set("display_errors","Off");


function getCategoryByRestauntID()
{
    $conn=mysql_connect("localhost", "root", "");
    mysql_query("SET NAMES 'utf8'");

    $category_q = "SELECT * FROM category"; //SQL查询语句
    $category_result = mysql_db_query("ordering",$category_q, $conn);
    return  $category_result ;
}


function getFoodsByCategoryID($category_id)
{
    $conn=mysql_connect("localhost", "root", "");
    mysql_query("SET NAMES 'utf8'");

    $food_q = "SELECT * FROM food where category_id= '".$category_id."'"; //SQL查询语句
    $food_result = mysql_db_query("ordering",$food_q,$conn); //获取数据集
    return  $food_result ;
}


function getPriceByID($id)
{
    $conn=mysql_connect("localhost", "root", "");
    mysql_query("SET NAMES 'utf8'");

    $q = "SELECT food_price1 FROM food where food_id='".$id."'"; //SQL查询语句
   // echo $q;
    $result = mysql_db_query("ordering",$q, $conn);

    $row = mysql_fetch_array($result);
    $food_price = $row['food_price1'];
    return $food_price ;
}


function getNameByID($id)
{
    $conn=mysql_connect("localhost", "root", "");
    mysql_query("SET NAMES 'utf8'");

    $q = "SELECT food_name FROM food where food_id='".$id."'"; //SQL查询语句
   // echo $q;
    $result = mysql_db_query("ordering",$q, $conn);

    $row = mysql_fetch_array($result);
    $food_name = $row['food_name'];
    return $food_name ;
}


function insertFoodOrder($order_sn,$customer,$food_id,$food_name,$food_price,$food_number,$food_sum_price,$order_time,$ip)
{
     //连接本地数据库
    $conn=mysql_connect("localhost", "root", "");
    $dbname="ordering";
    //打开数据库
    mysql_select_db($dbname,$conn);
    mysql_query("set names utf-8");
     
    //插入数据
    $sql="insert into foodorder(order_sn,customer,food_id,food_name,food_price,food_number,food_sum_price,order_time,IP) values('".$order_sn."','".$customer."',".$food_id.",'".$food_name."',".$food_price.",".$food_number.",".$food_sum_price.",".$order_time.",'".$ip."')";
    echo $sql."</br>";
    $result=mysql_query($sql,$conn)or die(mysql_error());
   
}


function getTodayFoodOrder()
{
    $conn=mysql_connect("localhost", "root", "");
    mysql_query("SET NAMES 'utf8'");
    date_default_timezone_set('asia/shanghai');
    $time =  strtotime("today");
    $q = "SELECT * FROM foodorder where order_time >".$time; //SQL查询语句
    $result = mysql_db_query("ordering",$q, $conn);
    return $result;
}


function getTodayFoodOrderSumPrice()
{
    $conn=mysql_connect("localhost", "root", "");
    mysql_query("SET NAMES 'utf8'");
    date_default_timezone_set('asia/shanghai');
    $time =  strtotime("today");
    $q = "SELECT sum(food_sum_price) as sum_price FROM foodorder where order_time >".$time; //SQL查询语句
    $result = mysql_db_query("ordering",$q, $conn);
    $row = mysql_fetch_array($result);
    $sum_price = $row['sum_price'];
    return $sum_price;
}


function getAllByOrderSn($order_sn)
{
    $conn=mysql_connect("localhost", "root", "");
    mysql_query("SET NAMES 'utf8'");
    $q = "SELECT * FROM foodorder where order_sn=".$order_sn; //SQL查询语句
    $result = mysql_db_query("ordering",$q, $conn);
    return $result;
}


function getSumPriceByOrderSn($order_sn)
{
    $conn=mysql_connect("localhost", "root", "");
    mysql_query("SET NAMES 'utf8'");
    date_default_timezone_set('asia/shanghai');
    $time =  strtotime("today");
    $q = "SELECT sum(food_sum_price) as sum_price FROM foodorder where order_sn ='".$order_sn."'"; //SQL查询语句
    $result = mysql_db_query("ordering",$q, $conn);
    $row = mysql_fetch_array($result);
    $sum_price = $row['sum_price'];
    return $sum_price;
}

function countTodayFoodNum()
{
    $conn=mysql_connect("localhost", "root", "");
    mysql_query("SET NAMES 'utf8'");

    date_default_timezone_set('asia/shanghai');
    $time =  strtotime("today");
    $q = "SELECT food_name , sum(food_number)  as number FROM foodorder where order_time >".$time." group by food_id order by number desc"; //SQL查询语句
    $result = mysql_db_query("ordering",$q, $conn);
    return $result;
}


function getAllOrder()
{
    $conn=mysql_connect("localhost", "root", "");
    mysql_query("SET NAMES 'utf8'");
    $q = "SELECT * FROM foodorder order by order_time desc" ;
    $result = mysql_db_query("ordering",$q, $conn);
    return $result;
}

 
?> 
