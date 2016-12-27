<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>学生信息管理系统</title>

    <!-- Bootstrap Core CSS -->
    <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="./vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="./vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="./vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="./dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="./vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
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
$db = mysql_connect("localhost", "root");
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
mysql_select_db("test_db", $db);


if ($_POST[submit]) {
    $sql = "UPDATE student SET name = '$_POST[name]', sex = '$_POST[sex]', 
        no = '$_POST[no]', class='$_POST[class]', address = '$_POST[address]' WHERE id = '$_POST[id]'";
    mysql_query($sql, $db);
    header("Location: ./index.php");
} else {
    $sql = "SELECT * FROM student WHERE id= '$_GET[id]'";
    $result = mysql_query($sql, $db);
    $student = mysql_fetch_array($result);

}

mysql_close($db);
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 align="center">修改学生信息</h2>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <form method="post" role="form" action="<?php echo $_SERVER["SCRIPT_NAME"] ?>">
                            <input type='text' name='id' value="<?php echo $student['0']; ?>" hidden>
                            <div class="form-group">
                                <label>姓名</label>
                                <input class="form-control" placeholder="输入姓名" type="text" name="name"
                                       value="<?php echo $student['1']; ?>">
                            </div>
                            <div class="form-group">
                                <label>性别</label>
                                <label class="radio-inline">
                                    <input type="radio" name="sex" id="optionsRadiosInline1"
                                           value="女" <?php if ($student['2'] == "女") echo "checked=checked;" ?>>女
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="sex" id="optionsRadiosInline2"
                                           value="男" <?php if ($student['2'] != "女") echo "checked=checked;" ?>>男
                                </label>
                            </div>
                            <div class="form-group">
                                <label>学号</label>
                                <input class="form-control" placeholder="输入学号" type="text" name="no"
                                       value="<?php echo $student['3']; ?>">
                            </div>
                            <div class="form-group">
                                <label>班级</label>
                                <input class="form-control" placeholder="输入姓名" type="text" name="class"
                                       value="<?php echo $student['4']; ?>">
                            </div>
                            <div class="form-group">
                                <label>家庭地址</label>
                                <input class="form-control" placeholder="输入姓名" type="text" name="address"
                                       value="<?php echo $student['5']; ?>">
                            </div>
                            <input type="submit" name="submit" value="Submit" class="btn btn-lg btn-success btn-block">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- jQuery -->
<script src="./vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="./vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="./vendor/metisMenu/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="./vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="./vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="./vendor/datatables-responsive/dataTables.responsive.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function () {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </
    body >
    < / html >

