<?php 
    session_start();
    $n_email = $_SESSION['email'];

    $conn=mysqli_connect('localhost','root','harmony2020','harmony');

    $query_id = "select * from User_Accounts where email='$n_email'";
    $data_id = mysqli_query($conn, $query_id);
    $row_id = mysqli_fetch_array($data_id);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>프로젝트 보관함</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../../style/project_archive.css">
    </head>
    <body>
        <p id="pa_title">프로젝트 보관함</p>
        <table id="pa_table">     
        <?php 
            $proj_sql="select * from Projects where user_id=`$row_id[0]`";
            $proj_result_sql=mysqli_query($conn, $proj_sql);
            while($row=mysql_fetch_assoc($proj_result_sql)){
                $title=$row["title"];
            ?>   
            <tr>
                <td><?php echo $row_id[0]?></td>
                <td><?php echo $title ?></td>
            </tr>
        <?php }
            ?>
        </table>
    </body>
</html>