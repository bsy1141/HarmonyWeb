<?php
    session_start();
    $n_email = $_SESSION['email'];

    $conn=mysqli_connect('localhost','root','harmony2020','harmony');

    $query_id = "select * from User_Accounts where email='$n_email'";
    $data_id = mysqli_query($conn, $query_id);
    $row_id = mysqli_fetch_array($data_id);

    $line1 = $_GET['pe_line1'];
    $work1 = $_GET['pe_work1'];
    $line2 = $_GET['pe_line2'];
    $work2 = $_GET['pe_work2'];
    $line3 = $_GET['pe_line3'];
    $work3 = $_GET['pe_work3'];

    $query_udt = "INSERT INTO Desired_Job (Line1, Work1, Line2, Work2, Line3, Work4, userid) VALUES ('$line1', '$work1', '$line2', '$work2', '$line3', '$work3', '$row_id[0]') ON DUPLICATE KEY UPDATE Line1='$line1', Work1='$work1', Line2='$line2', Work2='$work2', Line3='$line3', Work4='$work3'";

    //$query_udt = "update Desired_Job set Line1='line1', Work1='work1', Line2='line2', Work2='work2', Line3='line3', Work3='work3' where user_id='$row_id[0]'";
    $data_udt = mysqli_query($conn, $query_udt);

?>

<script>
    alert("수정되었습니다.");
</script>


<meta http-equiv="refresh" content="0; url=http://203.153.155.216/src/body/profile_edit.php">