<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../../style/signup3.css">
</head>
<body>
<?php
        session_start();
        $conn=mysqli_connect('localhost','root','harmony2020','harmony');
        $_SESSION["name"]=$_POST["name"];
        $_SESSION["birth_year"]=$_POST["birth_year"];
        $_SESSION["birth_month"]=$_POST["birth_month"];
        $_SESSION["birth_day"]=$_POST["birth_day"];
        $_SESSION["sex"]=$_POST["sex"];
        $_SESSION["do"]=$_POST["do"];
        $_SESSION["gu"]=$_POST["gu"];
        
?>
    <h3 class="sutitle">회원가입</h3>
    
    <div class="oval1">1</div>
    <div class="oval2">2</div>
    <div class="oval3">3</div>

    <p class="one">ID/PW 설정</p>
    <p class="two">기본 정보 입력</p>
    <p class="three">필수 약관 동의</p>

    <form action="input.php" method="POST" name="checking">
        <input type="checkbox" id="cb" class="cb1" name="check1"/>
        <div id="t" class="agree1">개인정보 수집 및 이용 동의(필수)</div>
        <button id="b" class="btn2">보기</button>

        <input type="checkbox" id="cb" class="cb2" name="check2"/>
        <div id="t" class="agree2">마케팅 정보 수신 동의(필수)</div>
        <button id="b"class="btn3">보기</button>

        <input type="submit" value="완료" class="btn4"/>
    </form>

    <script>
        var chk1=document.checking.check1.checked;
        var chk2=document.checking.check2.checked;

        if(!chk1||!chk2){
            alert("약관 동의는 필수 사항입니다.");
            return false;
        }
    </script>
</body>