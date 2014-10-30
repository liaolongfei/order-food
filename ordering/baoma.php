<?php
header("Content-type: text/html; charset=utf-8");
error_reporting(E_ERROR);
ini_set("display_errors","Off");

include('db.php');
$category_result = getCategoryByRestauntID();
?>

<!DOCTYPE HTML>
<html>
<head>

    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <title>ordering food</title>

</head>

<script language="javascript">
    function check(){

        if(checkName() && checkSelect())
        {
            document.order.action = "order.php";
            document.order.submit();
        }

    }


    function checkName()
    {
       var name=document.getElementById('customer').value;//用户名
        if(name==""){
            alert('姓名不能为空');
            return false;
        }else{
            return true;

        }
    }

    function checkSelect(){
        var objs=document.getElementsByTagName("input");
        var isSel=false;//判断是否有选中项，默认为无
        for(var i=0;i<objs.length;i++)
        {
            if(objs[i].type == "checkbox" && objs[i].checked==true)
            {
                isSel=true;
                break;
            }
        }
        if(isSel==false)
        {
            alert("请至少选择一个菜单！");
            return false;
        }

        return true;
    }


</script>

<body >

<h2>葆马快餐</h2>

<form name="order" method="post">
    姓名：<input type="text" id="customer" name="customer">
    <br><br><br><br>
    <a href="todayall.php" target="_blank">查看今天已订订单</a>

    <?php while($category_row = mysql_fetch_array($category_result)):?>
    <table border="1">
        <caption><?php echo $category_row['category_name']; ?></caption>
        <tr>
            <td width=100>选择</td>
            <td width=200>菜单</td>
            <td width=50>价格</td>
            <td width=50>数量</td>
        </tr>
        <?php
           $food_result =getFoodsByCategoryID($category_row['category_id']);
           while($food_row = mysql_fetch_array($food_result)):
            $food_id = $food_row['food_id'];
        ?>
        <tr>
            <td width=100><input name="<?php echo 'food'.$food_id.'select'; ?>" type="checkbox" value="<?php echo $food_id; ?>" /></td>
            <td width=200><?php echo $food_row['food_name']; ?></td>
            <td width=50><?php echo  $food_row['food_price1']; ?></td>
            <td width=50><input type="text" name="<?php echo 'food'.$food_id.'number'; ?>" value="1" style="text-align:center; vertical-align:middle"></td>
        </tr>
       <?php endwhile?>
    </table>
    <?php endwhile?>
    <br><br><br><br>

    <input type="submit" name="submit" value="提交" onclick="check()">
</form>





</body>
</html>
