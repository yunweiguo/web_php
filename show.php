<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>学生信息系统</title>
    <style>

    </style>
</head>

<?php
/**
 * Created by PhpStorm.
 * User: yunweiguo
 * Date: 2016/12/18
 * Time: 下午5:01
 */
error_reporting(0);
header("Content-type: text/html; charset:utf-8");
$db = mysql_connect("localhost","root");
mysql_select_db("test_db", $db);
if($_GET[delete]){
    $result = mysql_query("DELETE FROM student WHERE id ='$_GET[id]'", $db);
    if ($result){
        header("Location: http://127.0.0.1/show.php");
    }
}else{
    $result = mysql_query("SELECT * FROM student", $db);
}

?>
<body>
<h2>学生信息列表</h2>
<script type="text/javascript" src="jquery-3.1.1.min.js"></script>
<input type="button" id="new" onclick="window.location.href='insert.php'" value="新增">
<table class="table table-striped table-bordered table-hover">
    <tr>
        <th>姓名</th>
        <th>学号</th>
        <th>性别</th>
        <th>班级</th>
        <th>地址</th>
        <th></th>
    </tr>
    <?php
    while ($student = mysql_fetch_array($result, MYSQL_NUM)) {
        ?>
        <tr>
            <td class="name"><?php echo $student['1']?></td>
            <td class="no"><?php echo $student['2']?></td>
            <td class="sex"><?php echo $student['3']?></td>
            <td class="class"><?php echo $student['4']?></td>
            <td class="address"><?php echo $student['5']?></td>
            <td>
                <input type="button" onclick="window.location.href='show.php?delete=yes&id=<?php echo $student['0'];?>'" value="删除"/>
                <button class="update" onclick="window.location.href='update.php?id=<?php echo $student['0'];?>'"> 更新</button>
            </td>
        </tr>

        <?php
    }
    ?>
</table>

</body>
</html>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>学生信息系统</title>
    <style>

    </style>
</head>

<?php
/**
 * Created by PhpStorm.
 * User: yunweiguo
 * Date: 2016/12/18
 * Time: 下午5:01
 */
error_reporting(0);
header("Content-type: text/html; charset:utf-8");
$db = mysql_connect("localhost","root");
mysql_select_db("test_db", $db);
if($_GET[delete]){
    $result = mysql_query("DELETE FROM student WHERE id ='$_GET[id]'", $db);
    if ($result){
        header("Location: http://127.0.0.1/show.php");
    }
}else{
    $result = mysql_query("SELECT * FROM student", $db);
}

?>
<body>
<h2>学生信息列表</h2>
<script type="text/javascript" src="jquery-3.1.1.min.js"></script>
<input type="button" id="new" onclick="window.location.href='insert.php'" value="新增">
<table class="table table-striped table-bordered table-hover">
    <tr>
        <th>姓名</th>
        <th>学号</th>
        <th>性别</th>
        <th>班级</th>
        <th>地址</th>
        <th></th>
    </tr>
    <?php
    while ($student = mysql_fetch_array($result, MYSQL_NUM)) {
        ?>
        <tr>
            <td class="name"><?php echo $student['1']?></td>
            <td class="no"><?php echo $student['2']?></td>
            <td class="sex"><?php echo $student['3']?></td>
            <td class="class"><?php echo $student['4']?></td>
            <td class="address"><?php echo $student['5']?></td>
            <td>
                <input type="button" onclick="window.location.href='show.php?delete=yes&id=<?php echo $student['0'];?>'" value="删除"/>
                <button class="update" onclick="window.location.href='update.php?id=<?php echo $student['0'];?>'"> 更新</button>
            </td>
        </tr>

        <?php
    }
    ?>
</table>

</body>
</html>

