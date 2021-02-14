<?php
    session_start();
    $n_email = $_SESSION['email'];
    $introduce_long = $_GET['intro_input'];

    $conn=mysqli_connect('localhost','root','harmony2020','harmony');

    $query_id = "select * from User_Accounts where email='$n_email'";
    $data_id = mysqli_query($conn, $query_id);
    $row_id = mysqli_fetch_array($data_id);
    
    $query_udt = "INSERT INTO Long_Intro (id, introduce_long) VALUES ('$row_id[0]', '$introduce_long') ON DUPLICATE KEY UPDATE introduce_long='$introduce_long'";
    $data_udt = mysqli_query($conn, $query_udt);

?>

<script>
    alert("수정되었습니다.");
</script>

<meta http-equiv="refresh" content="0; url=http://203.153.155.216/src/body/profile_edit.php">
