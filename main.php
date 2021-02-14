<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../../style/main.css">
</head>
<body>
    <H1 class="title" style="color:#0AC0D8; font-weight:bold;">일상의 기록이<br/>포트폴리오가 되는 곳</H1>
    <P class="subtitle" style="margin-top:40px;">청년과 기업을 이어주는 곳, 하모니에서 시작해보세요.</P>
    <a href="profiles.html"><img src="../../assets/image/icon8.png" class="harmony_logo"></a>
    
    <button id="open">로그인/회원가입</button>

    <div class="phonebtn1"></div>
    <div class="phonebtn2"></div>
    <div class="phonebtn3"></div>
    
    <div class="Outside"></div>
    <div class="Inside"></div>
    <img src="../../assets/image/screen_color.jpg" class="screen">
    
    <div class="bottom" style="background-color:#0AC0D8;">
        <img src="../../assets/image/icon8.png" class="bottom_hm_logo">
        <div id="detail" class="detail1">
            상호 : (주)하모니<br/>
            사업자등록번호 : 222-22-22222<br/>
            통신판매업신고번호 : 제2020-서울용산-1234호</div>
        <div id="detail" class="detail2">
            대표 : 방서영<br/>
            주소 : 서울시 용산구 숙명여자대학교<br/>
            고객센터 : help@harmony.com
        </div>
        <div class="copyright">
            © Since 2020, Harmony,<br/>
            All rights reserved
        </div>
        
        <button id="policy" class="privacy_policy">개인정보처리방침</button>
        <button id="policy" class="use_policy"> 이용약관</button>
        
        <button id="sns" class="instagram">
            <img src="../../assets/image/ig.png" id="logo">
        </button>
        <button id="sns" class="twitter">
            <img src="../../assets/image/tw.png" id="logo">
        </button>
        <button id="sns" class="facebook">
            <img src="../../assets/image/fb.png" id="logo">
        </button>
    </div>
    
    <div class="modal_wrapper" style="display:none">
        <div class="main_login">
            <img src="../../assets/image/icon3.png" id="close">

            <form action="login_action.php" method="POST">
                <input type="text" id="i" class="email" name="email" placeholder="   이메일"/>
                <input type="password" id="i" class="password" name="password" placeholder="   비밀번호"/>
                <button class="find">ID/PW 찾기</button>
                
                <input type="submit" id="b" class="login" value="로그인"/>
                <input type="button" id="b" class="signup" onclick="location.href='signup1.html'" value="회원가입"/>
            </form>  
                
            <div class="sns_login">다른 로그인 방법</div>

            <button id="sns_login" class="margin">
                <img src="../../assets/image/naver.png" class="naver">
            </button>
            <button id="sns_login" class="margin">
                <img src="../../assets/image/kakao.png" class="kakao">
            </button>
            <button id="sns_login">
                <img src="../../assets/image/google.png" class="kakao">
            </button>
        </div>
    </div>

    <script>
        var open=document.getElementById("open");
        var close=document.getElementById("close");
        var modal=document.querySelector(".modal_wrapper");

        open.onclick=()=>{
            modal.style.display="flex";
        }

        close.onclick=()=>{
            modal.style.display="none";
        }
    </script>
</body> 
</html>