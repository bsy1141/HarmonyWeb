<?php
    session_start();
    $n_email = $_SESSION['email'];
    $conn=mysqli_connect('localhost','root','harmony2020','harmony');

    $post_id=$_POST['post_id'];

    $query_heart="UPDATE Posts SET like_num=like_num+1 WHERE post_id='$post_id'";
    $data_heart=mysqli_query($conn,$query_heart);
?>