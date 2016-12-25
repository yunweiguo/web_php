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
if ($_POST[submit]){
    $db = mysql_connect("localhost","root");
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    mysql_select_db("test_db", $db);
    echo $_POST[sex];
    $sql = "INSERT INTO student (name, sex, no, class, address) VALUES ('$_POST[name]', 
            '$_POST[sex]', '$_POST[no]', '$_POST[class]', '$_POST[address]')";
    $result = mysql_query($sql, $db);
    if ($result){
        header("Location: http://127.0.0.1/show.php");
    }else{
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }

    mysql_close($db);
}else{
    ?>

    <h2>添加新的学生</h2>
    <form method="post" action="<?php echo $_SERVER["SCRIPT_NAME"]?>">
        名字:<input type="text" name="name" value=""><br><br>
        性别:<input type="radio" name="sex" value="女">女
        <input type="radio" name="sex" value="男">男<br><br>
        学号:<input type="text" name="no" value=""><br><br>
        班级:<input type="text" name="class" value=""><br><br>
        家庭地址: <input type="text" name="address" value=""><br><br>

        <input type="submit" name="submit" value="Submit">
    </form>
    <?php
}
?>

</body>
</html>

