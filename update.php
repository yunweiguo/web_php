<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <title>学生信息系统</title>
    <style>
        .error {color: #FF0000;}
    </style>
</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: yunweiguo
 * Date: 2016/12/18
 * Time: 下午5:01
 */
error_reporting(0);
$db = mysql_connect("localhost","root");
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
mysql_select_db("test_db", $db);


if ($_POST[submit]){
    $sql = "UPDATE student SET name = '$_POST[name]', sex = '$_POST[sex]', 
        no = '$_POST[no]', class='$_POST[class]', address = '$_POST[address]' WHERE id = '$_POST[id]'";
    mysql_query($sql, $db);
    header("Location: http://127.0.0.1/show.php");
}else{
    $sql = "SELECT * FROM student WHERE id= '$_GET[id]'";
    $result = mysql_query($sql, $db);
    $student = mysql_fetch_array($result);

}

mysql_close($db);
?>

<h2>修改</h2>
<form method="post" action="<?php echo $_SERVER["SCRIPT_NAME"]?>">
    <input type='text' name='id' value="<?php echo $student['0'];?>" hidden>
    名字:<input type="text" name="name" value="<?php echo $student['1'];?>"><br><br>
    性别:<input type="radio" name="sex" value="女" <?php if($student['2'] == "女") echo "checked=checked;"?>>女
    <input type="radio" name="sex" value="男" <?php if($student['2'] != "女") echo "checked=checked;"?>>男<br><br>
    学号:<input type="text" name="no" value="<?php echo $student['3'];?>"><br><br>
    班级:<input type="text" name="class" value="<?php echo $student['4'];?>"><br><br>
    家庭地址: <input type="text" name="address" value="<?php echo $student['5'];?>"><br><br>

    <input type="submit" name="submit" value="Submit">
</form>


</body>
</html>

