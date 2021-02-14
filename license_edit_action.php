<?php
    session_start();
    $n_email = $_SESSION['email'];

    $conn=mysqli_connect('localhost','root','harmony2020','harmony');

    $query_id = "select * from User_Accounts where email='$n_email'";
    $data_id = mysqli_query($conn, $query_id);
    $row_id = mysqli_fetch_array($data_id);

    $lic_name = $_GET['pe_license_input0'];
    $lic_date = $_GET['pe_license_date_input0'];

    $query_udt = "INSERT INTO License (license_id, license_name, license_date, userid) VALUES ('1', '$lic_name', '$lic_date', '$row_id[0]') ON DUPLICATE KEY UPDATE license_name='$lic_name', license_date='$lic_date'";
    $data_udt = mysqli_query($conn, $query_udt);
?>

<script>
    alert("수정되었습니다.");
</script>

<meta http-equiv="refresh" content="0; url=http://203.153.155.216/src/body/profile_edit.php">
