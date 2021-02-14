<?php
    session_start();
    $n_email = $_SESSION['email'];

    $conn=mysqli_connect('localhost','root','harmony2020','harmony');

    $query_id = "select * from User_Accounts where email='$n_email'";
    $data_id = mysqli_query($conn, $query_id);
    $row_id = mysqli_fetch_array($data_id);

    $language = $_GET['pe_lan_input0'];
    $level = $_GET['pe_level_input0'];
    $test_name = $_GET['pe_lan_name_input0'];
    $grade = $_GET['pe_score_input0'];
    $test_date = $_GET['pe_lan_date_input0'];


    $query_udt = "INSERT INTO Language_Skills (LS_id, lan, lvl, test_name, grade, test_date, userid) VALUES ('1', '$language', '$level', '$test_name', '$grade', '$test_date', '$row_id[0]') ON DUPLICATE KEY UPDATE lan='$language', lvl='$level', test_name='$test_name', grade='$grade', test_date='$test_date'";
    $data_udt = mysqli_query($conn, $query_udt);
?>

<script>
    alert("수정되었습니다.");
</script>

<meta http-equiv="refresh" content="0; url=http://203.153.155.216/src/body/profile_edit.php">
