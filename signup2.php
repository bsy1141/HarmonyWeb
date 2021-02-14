<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../../style/signup2.css">
</head>

<body>
    <?php
        session_start();
        $conn=mysqli_connect('localhost','root','harmony2020','harmony');
        $_SESSION["email"]=$_POST["email"];
        $_SESSION["password"]=$_POST["password"];
    ?>
    <h3 class="sutitle">회원가입</h3>
    
    <div class="oval1">1</div>
    <div class="oval2">2</div>
    <div class="oval3">3</div>

    <p class="one">ID/PW 설정</p>
    <p class="two">기본 정보 입력</p>
    <p class="three">휴대폰 인증</p>

    <div id="t" class="name">이름</div>
    <form action="signup3.php" method="POST">
        <input type="text" name="name" class="input1"/>
      
        <div id="t" class="sex">성별</div>
        <div class="f">여성</div>
        <input type="checkbox" class="female" name="sex" value="f">
        <div class="m">남성</div>
        <input type="checkbox" class="male" name="sex" value="m">

        <div id="t" class="birth">생년월일</div>
        <select class="year" name="birth_year">
            <option hidden>YY</option>
            <option>90</option>
            <option>91</option>
            <option>92</option>
            <option>93</option>
            <option>94</option>
            <option>95</option>
            <option>96</option>
            <option>97</option>
            <option>98</option>
            <option>99</option>
            <option>00</option>
            <option>01</option>
        </select>  
        <select class="month" name="birth_month">
            <option hidden>MM</option>
            <option>01</option>
            <option>02</option>
            <option>03</option>
            <option>04</option>
            <option>05</option>
            <option>06</option>
            <option>07</option>
            <option>08</option>
            <option>09</option>
            <option>10</option>
            <option>11</option>
            <option>12</option>
        </select> 
        <select class="day" name="birth_day">
            <option hidden>DD</option>
            <option>01</option>
            <option>02</option>
            <option>03</option>
            <option>04</option>
            <option>05</option>
            <option>06</option>
            <option>07</option>
            <option>08</option>
            <option>09</option>
            <option>10</option>
            <option>11</option>
            <option>12</option>
            <option>13</option>
            <option>14</option>
            <option>15</option>
            <option>16</option>
            <option>17</option>
            <option>18</option>
            <option>19</option>
            <option>20</option>
            <option>21</option>
            <option>22</option>
            <option>23</option>
            <option>24</option>
            <option>25</option>
            <option>26</option>
            <option>27</option>
            <option>28</option>
            <option>29</option>
            <option>30</option>
            <option>31</option>
        </select> 
        
        <div id="t" class="residence">지역</div>
        <select class="do" name="do" id = "sido" onchange="selectedDo();">
        <option value="">시/도</option>
            <?php
                $query_id="SELECT `SIDO` FROM `AD` GROUP BY `SIDO`;";
                $data_id=mysqli_query($conn,$query_id);
                while($row = mysqli_fetch_array($data_id)){?>
                    <option value=<?php echo $row[0] ?>><?php echo $row[0]?></option>
                <?php
                }
                ?>
            
        </select>

        <select class="gu" name="gu" id="gugun">
            <option value="">구/군</option>

        </select>

        <input type="submit" value="다음" class="next"/>
    </form>

    <script>
        function selectedDo(){
            var selectedItem = document.getElementById("sido");
            var sVal = selectedItem.options[selectedItem.selectedIndex].value;

            var gugun1 = ["종로구", "중구", "용산구", "성동구", "광진구", "동대문구", "중랑구", "성북구", "강북구", "도봉구", "노원구", "은평구", "서대문구", "마포구", "양천구", "강서구", "구로구", "금천구", "영등포구", "동작구", "관악구", "서초구", "강남구", "송파구", "강동구"];
            var gugun2 = ["중구", "서구", "동구", "영도구", "부산진구", "동래구", "남구", "북구", "해운대구", "사하구", "금정구", "강서구", "연제구", "수영구", "사상구", "기장군"];
            var gugun3 = ["중구", "동구", "서구", "남구", "북구", "수성구", "달서구", "달성군"];
            var gugun4 = ["중구", "동구", "미추홀구", "연수구", "남동구", "부평구", "계양구", "서구", "강화군", "옹진군"];
            var gugun5 = ["동구", "서구", "남구", "북구", "광산구"];
            var gugun6 = ["동구", "중구", "서구", "유성구", "대덕구"];
            var gugun7 = ["중구", "남구", "동구", "북구", "울주군"];
            var gugun8 = ["세종특별자치시"];
            var gugun9 = ["수원시", "성남시", "고양시", "용인시", "부천시", "안산시", "안양시", "남양주시", "화성시", "평택시", "의정부시", "시흥시", "파주시", "광명시", "김포시", "군포시", "광주시", "이천시", "양주시", "오산시", "구리시", "안성시","포천시", "의왕시", "하남시", "여주시", "양평군", "동두천시", "과천시", "가평군", "연청군"];
            var gugun10 = ["춘천시", "원주시", "강릉시", "동해시", "태백시", "속초시", "삼척시", "홍천군", "횡성군", "영월군", "평창군", "정선군", "철원군", "화천군", "양구군", "인제군", "고성군", "양양군"];
            var gugun11 = ["충주시", "제천시", "보은군", "옥천군", "영동군", "진천군", "괴산군", "음성군", "단양군", "증평군"];
            var gugun12 = ["천안시", "공주시", "보령시", "아산시", "서산시", "논산시", "계롱시", "당진시", "금산군", "부여군", "서천군", "청양군", "홍성군", "예산군", "태안군"];
            var gugun13 = ["군산시", "익산시", "정읍시", "남원시", "김제시", "완주군", "진안군", "무주군", "장수군", "임실군", "순창군", "고창군", "부안군"];
            var gugun14 = ["여수시", "순천시", "나주시", "광양시", "담양군", "곡성군", "구례군", "고흥군", "보성군", "화순군", "장흥군", "강진군", "해남군", "영암군", "무안군", "함경군", "영광군", "장성군", "완도군", "진도군", "신안군"];
            var gugun15 = ["경주시", "김천시", "안동시", "구미시", "영주시", "영천시", "상주시", "문경시", "경산시", "군위군", "의성군", "청송군", "영양군", "영덕군", "청도군", "고령군", "성주군", "칠곡군", "예천군", "봉화군", "울진군", "울릉군"];
            var gugun16 = ["창원시", "진주시", "통영시", "사천시", "김해시", "밀양시", "거제시", "양산시", "의령군", "함안군", "창녕군", "고성군", "남해군", "하동군", "산청군", "함양군", "거창군", "합천군"];
            var gugun17 = ["제주시", "서귀포시"];

            var target = document.getElementById("gugun");
            target.options.length = 0;

            if(sVal=="서울특별시") var d = gugun1;
            else if(sVal=="부산광역시") var d = gugun2;
            else if(sVal=="대구광역시") var d = gugun3;
            else if(sVal=="인천광역시") var d = gugun4;
            else if(sVal=="광주광역시") var d = gugun5;
            else if(sVal=="대전광역시") var d = gugun6;
            else if(sVal=="울산광역시") var d = gugun7;
            else if(sVal=="세종특별자치시") var d = gugun8;
            else if(sVal=="경기도") var d = gugun9;
            else if(sVal=="강원도") var d = gugun10;
            else if(sVal=="충청북도") var d = gugun11;
            else if(sVal=="충청남도") var d = gugun12;
            else if(sVal=="전라북도") var d = gugun13;
            else if(sVal=="전라남도") var d = gugun14;
            else if(sVal=="경상북도") var d = gugun15;
            else if(sVal=="경상남도") var d = gugun16;
            else if(sVal=="제주특별자치도") var d = gugun17;
        

            for(x in d){
                var opt = document.createElement("option");
                opt.value = d[x];
                opt.innerHTML = d[x];
                target.options.add(opt, 0);
            }
        }
    </script>
</body>