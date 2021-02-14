<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../../style/signup1.css">
</head>
<body>
    <h3 class="sutitle">회원가입</h3>
    
    <div class="oval1">1</div>
    <div class="oval2">2</div>
    <div class="oval3">3</div>

    <p class="one">ID/PW 설정</p>
    <p class="two">기본 정보 입력</p>
    <p class="three">휴대폰 인증</p>
    <form action="signup2.php" method="POST">
        <input type="text" class="email" name="email" placeholder="    이메일"/>
        <input type="password" class="password" name="password" placeholder="    비밀번호"/>
        <input type="password" class="pwagain" placeholder="    비밀번호 재입력"/>

        <input type="submit" value="다음" class="next"/>
    </form>
</body>