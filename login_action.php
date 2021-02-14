<?php
    session_start();

    $conn=mysqli_connect('localhost','root','harmony2020','harmony');

    $email=$_POST['email'];
    $password=$_POST['password'];

    $query="select * from User_Accounts where email='$email'";
    $result=$conn->query($query);

    if(mysqli_num_rows($result)==1){
        $row=mysqli_fetch_assoc($result);

        if($row['password']==$password){
            $_SESSION['email']=$email;
            if(isset($_SESSION['email'])){
                ?>
                <script>
                    alert("로그인 되었습니다");
                    location.replace("mainfeed.php");
                </script>
            <?php
            }
            else {
                echo "session fail";    
            }
        }
        else{
            ?>
            <script>
                alert("아이디 혹은 비밀번호가 잘못되었습니다.");
                history.back();
            </script>
            <?php    
            }
        }
    else{
        ?>
        <script>
            alert("아이디 혹은 비밀번호가 잘못되었습니다.");
            history.back();
        </script>
        <?php
    }
    ?>
    