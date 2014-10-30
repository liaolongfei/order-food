<?php
header("Content-type: text/html; charset=utf-8");
error_reporting(E_ERROR);
ini_set("display_errors","Off");

include('db.php');

$order_sn = $_GET['order_sn'];
$order_result = getTodayFoodOrder();
$count_result = countTodayFoodNum();
$sum_price = getTodayFoodOrderSumPrice();
$count = 1;
?>

<!DOCTYPE HTML>
<html>
<head>

    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <title>今天所有订单</title>

</head>


<body >

<h2>订餐订单</h2>
    <table border="1">
        <tr>
            <td width=100>序号</td>
            <td width=100>订单号</td>
            <td width=100>姓名</td>
            <td width=200>菜单</td>
            <td width=50>单价</td>
            <td width=50>数量</td>
            <td width=50>价格</td>
            <td width=200>时间</td>
        </tr>
        <?php while($order_row = mysql_fetch_array($order_result)):?>
        <tr>
            <td width=100><?php echo $count++; ?></td>
            <td width=100><?php echo $order_row['order_sn']; ?></td>
            <td width=100><?php echo $order_row['customer']; ?></td>
            <td width=200><?php echo $order_row['food_name']; ?></td>
            <td width=50><?php echo $order_row['food_price']; ?></td>
            <td width=50><?php echo $order_row['food_number']; ?></td>
            <td width=50><?php echo $order_row['food_sum_price']; ?></td>
            <td width=50><?php date_default_timezone_set('asia/shanghai'); echo date("Y-m-d H:i:s",$order_row['order_time']); ?></td>
        </tr>
       <?php endwhile?>
    </table>
    </br></br></br>


<h3>统计订餐</h3>

<table border="1">
    <tr>
        <td width=200>菜单</td>
        <td width=50>数量</td>
    </tr>
    <?php while($count_row = mysql_fetch_array($count_result)):?>
        <tr>
            <td width=200><?php echo $count_row['food_name']; ?></td>
            <td width=50><?php echo $count_row['number']; ?></td>
        </tr>
    <?php endwhile?>

</table>

<h3>总价：<?php echo $sum_price; ?></h3>
    

    </br>
    <a href="all.php" target="_blank">查看历史所有订单</a>
</body>
</html>
