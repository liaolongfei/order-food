<?php
header("Content-type: text/html; charset=utf-8");
error_reporting(E_ERROR);
ini_set("display_errors","Off");

include('db.php');

$order_sn = $_GET['order_sn'];
$result = getAllOrder();
$count = 1;
?>

<!DOCTYPE HTML>
<html>
<head>

    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <title>所有历史订单</title>

</head>


<body >

<h2>订餐订单</h2>
    <table border="1">
        <tr>
            <td width=100>序号</td>
            <td width=100>订单号</td>
            <td width=100>姓名</td>
            <td width=200>菜单</td>
            <td width=50>价格</td>
            <td width=50>数量</td>
            <td width=50>总价格</td>
            <td width=200>时间</td>
        </tr>
        <?php while($row = mysql_fetch_array($result)):?>
        <tr>
            <td width=100><?php echo $count++; ?></td>
            <td width=100><?php echo $row['order_sn']; ?></td>
            <td width=100><?php echo $row['customer']; ?></td>
            <td width=200><?php echo $row['food_name']; ?></td>
            <td width=50><?php echo $row['food_price']; ?></td>
            <td width=50><?php echo $row['food_number']; ?></td>
            <td width=50><?php echo $row['food_sum_price']; ?></td>
            <td width=50><?php date_default_timezone_set('asia/shanghai'); echo date("Y-m-d H:i:s",$row['order_time']); ?></td>
        </tr>
       <?php endwhile?>
    </table>

    </br></br></br></br>
</body>
</html>
