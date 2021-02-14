<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../../style/main.css">
</head>
<body>
    <H1 class="title" style="color:#0AC0D8; font-weight:bold;">일상의 기록이<br/>포트폴리오가 되는 곳</H1>
    <P class="subtitle" style="margin-top:40px;">청년과 기업을 이어주는 곳, 하모니에서 시작해보세요.</P>
    <img src="../../assets/image/icon8.png" class="harmony_logo" id="popup_open_btn">

    <div class="my_modal" style="display:none">  
        <img src="../../assets/image/profile_v.png" style="height:700px">
        <a id="modal_close_btn" style="top:-100px">닫기</a>
    </div>

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
                <input type="button" id="b" class="signup" onclick="location.href='signup1.php'" value="회원가입"/>
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
        var mymodal=document.querySelector(".my_modal");
        var mymodal_close=document.getElementById("modal_close_btn");

        open.onclick=()=>{
            modal.style.display="flex";
        }

        close.onclick=()=>{
            modal.style.display="none";
        }

        mymodal_close.onclick=()=>{
            mymodal.style.display="none";
        }

        function modal(id) {
            var zIndex = 9999;
            var modal = document.getElementById(id);

            // 모달 div 뒤에 희끄무레한 레이어
            var bg = document.createElement('div');
            bg.setStyle({
                position: 'fixed',
                zIndex: zIndex,
                left: '0px',
                top: '0px',
                width: '100%',
                height: '100%',
                overflow: 'auto',
                // 레이어 색갈은 여기서 바꾸면 됨
                backgroundColor: 'rgba(0,0,0,0.4)'
            });
            document.body.append(bg);

            // 닫기 버튼 처리, 시꺼먼 레이어와 모달 div 지우기
            modal.querySelector('.modal_close_btn').addEventListener('click', function() {
                bg.remove();
                modal.style.display = 'none';
            });

            modal.setStyle({
                position: 'fixed',
                display: 'block',
                boxShadow: '0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)',

                // 시꺼먼 레이어 보다 한칸 위에 보이기
                zIndex: zIndex + 1,

                // div center 정렬
                top: '50%',
                left: '50%',
                transform: 'translate(-50%, -50%)',
                msTransform: 'translate(-50%, -50%)',
                webkitTransform: 'translate(-50%, -50%)'
            });
        }

        // Element 에 style 한번에 오브젝트로 설정하는 함수 추가
        Element.prototype.setStyle = function(styles) {
            for (var k in styles) this.style[k] = styles[k];
            return this;
        };

        document.getElementById('popup_open_btn').addEventListener('click', function() {
            // 모달창 띄우기
            mymodal.style.display="flex";
        });
    </script>
</body> 
</html>