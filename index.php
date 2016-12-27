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

<?php
/**
 * Created by PhpStorm.
 * User: yunweiguo kniost
 * Date: 2016/12/18
 * Time: 下午5:01
 */
error_reporting(0);
header("Content-type: text/html; charset:utf-8");
$db = mysql_connect("localhost", "root");
mysql_select_db("test_db", $db);
if ($_GET[delete]) {
    $result = mysql_query("DELETE FROM student WHERE id ='$_GET[id]'", $db);
    if ($result) {
        header("Location: ./index.php");
    }
} else {
    $result = mysql_query("SELECT * FROM student", $db);
}

?>
<body>
<div align="center" width="50%">
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>学生信息管理系统</h2>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <script type="text/javascript" src="jquery-3.1.1.min.js"></script>
                        <table class="table table-striped table-bordered table-hover" width="70%" >
                            <tr align="center">
                                <th>姓名</th>
                                <th>性别</th>
                                <th>学号</th>
                                <th>班级</th>
                                <th>地址</th>
                                <th></th>
                            </tr>
                            <?php
                            while ($student = mysql_fetch_array($result, MYSQL_NUM)) {
                                ?>
                                <tr>
                                    <td class="name"><?php echo $student['1'] ?></td>
                                    <td class="sex"><?php echo $student['2'] ?></td>
                                    <td class="no"><?php echo $student['3'] ?></td>
                                    <td class="class"><?php echo $student['4'] ?></td>
                                    <td class="address"><?php echo $student['5'] ?></td>
                                    <td>
                                        <input type="button"
                                               class="btn btn-danger"
                                               onclick="window.location.href='index.php?delete=yes&id=<?php echo $student['0']; ?>'"
                                               value="删除"/>
                                        <button type="button"
                                                class="btn btn-info"
                                                onclick="window.location.href='update.php?id=<?php echo $student['0']; ?>'">
                                            更新
                                        </button>
                                    </td>
                                </tr>

                                <?php
                            }
                            ?>
                        </table>

                        <input type="button" class="btn btn-lg btn-success btn-block"
                               onclick="window.location.href='insert.php'" value="新增">
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
</script>
</body>
</html>

