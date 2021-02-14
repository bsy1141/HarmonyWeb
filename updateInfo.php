<?php
    session_start();
    $n_email = $_SESSION['email'];

    $new_name=$_POST['ps_name'];
    $new_year=$_POST['ps_year'];
    $new_month=$_POST['ps_month'];
    $new_day=$_POST['ps_day'];

    echo $new_name;


    $conn=mysqli_connect('localhost','root','harmony2020','harmony');
?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
</head>
<body>
    <?php
        if(!$_SESSION['email']){
            ?>
            <script>
                alert('로그인해주세요.');
                history.back();
            </script>
            <?php
        }

        $query_update = "UPDATE User_Accounts SET username='$new_name', birth_year='$new_year', birth_month='$new_month', birth_day='$new_day' WHERE email='$n_email';";

        $result=mysqli_query($conn,$query_update);

        if($result){
            ?>      <script>
                        alert("<?php echo "정보가 수정되었습니다."?>");  
                        location.replace("mainfeed.php");
                    </script>
            <?php
            } else{       
                echo "FAIL!!";
            }

    ?>

</body>
</html>