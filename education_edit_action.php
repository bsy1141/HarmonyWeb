<?php
    session_start();
    $n_email = $_SESSION['email'];

    $conn=mysqli_connect('localhost','root','harmony2020','harmony');

    $query_id = "select * from User_Accounts where email='$n_email'";
    $data_id = mysqli_query($conn, $query_id);
    $row_id = mysqli_fetch_array($data_id);

    $academy_name = $_GET['pe_school_input0'];
    $major = $_GET['pe_major_input0'];
    $degree = $_GET['pe_degree_input0'];
    $entrance = $_GET['pe_e_year_input0'];
    $graduate = $_GET['pe_g_year_input0'];

    
    $query_udt = "INSERT INTO Education (Edu_id, userid, Academy_name, major, degree, entrance, graduate) VALUES ('1', '$row_id[0]', '$academy_name', '$major', '$degree', '$entrance', '$graduate') ON DUPLICATE KEY UPDATE Academy_name='$academy_name', major='$major', degree='$degree', entrance='$entrance', graduate='$graduate'";
  //  $query_udt = "update Education set Edu_id='1', Academy_name='$academy_name', major='$major', degree='$degree', entrance='$entrance', graduate='$graduate' where user_id='$row_id[0]'";
    $data_udt = mysqli_query($conn, $query_udt);
?>

<script>
    alert("수정되었습니다.");
</script>


<meta http-equiv="refresh" content="0; url=http://203.153.155.216/src/body/profile_edit.php">