<!DOCTYPE html>
<head>
    <meta charset="utf-8">
</head>
<body>
    <?php
        session_start();
        
        $email=$_SESSION["email"];
        $password=$_SESSION["password"];
        $name=$_SESSION['name'];
        $birth_year=$_SESSION['birth_year'];
        $birth_month=$_SESSION['birth_month'];
        $birth_day=$_SESSION['birth_day'];
        $sex=$_SESSION['sex'];
        $residence_do=$_SESSION['do'];
        $residence_gu=$_SESSION['gu'];
        
        $conn=mysqli_connect('localhost','root','harmony2020','harmony');

        $query_id="SELECT * FROM User_Accounts;";
        $data_id=mysqli_query($conn,$query_id);
        $id=mysqli_num_rows($data_id)+1;
        
        $query_insert="INSERT INTO `User_Accounts`(`id`,`username`,`email`,`password`,`sex`,`birth_year`,`birth_month`,`birth_day`,`residence1`,`residence2`) 
        VALUES('$id','$name','$email','$password','$sex','$birth_year','$birth_month','$birth_day','$residence_do','$residence_gu');";

        $result=mysqli_query($conn,$query_insert);

        if($result){ ?> 
        <script>
            alert("하모니 회원이 되신 것을 환영합니다😎");
            location.replace("main.php");
        </script>
        <?php
        }
        else{ ?>
        <script>
            alert("회원가입에 실패했습니다😢 다시 시도해주세요");
            location.replace("main.php");
        </script>
        <?php   
        }
        ?>
</body>
</html>
