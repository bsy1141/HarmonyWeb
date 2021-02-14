<?php
    session_start();
    $n_email = $_SESSION['email'];
    $conn=mysqli_connect('localhost','root','harmony2020','harmony');

?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../style/privacy_setting.css">
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

        $query_id="SELECT * FROM User_Accounts WHERE email='$_SESSION[email]'";
        
        $result=mysqli_query($conn,$query_id);
        $result_row=mysqli_fetch_array($result);
    ?>

     <div class="ps_category">
            <p class="ps_category_title">개인 정보 변경</p>
            <form action="updateInfo.php" method="POST" class="ps_form">
                <fieldset id="ps_fieldset1">
                    <p class="ps_title">이름</p>
                    <input class="ps_input" type="text" name="ps_name" placeholder="<?php echo $result_row['username']?>" style="width: 550px;">
                    <p class="ps_title">생년월일</p>
                    <input class="ps_input" type="text" name="ps_year" placeholder="<?php echo $result_row['birth_year']?>" style="width: 72px;">
                    <img src="../../assets/image/arrow-right-black.png" style="position: relative; top: 3px; left: -15px; width: 10px; height: 15px;">
                    <input class="ps_input" type="text" name="ps_month" placeholder="<?php echo $result_row['birth_month']?>" style="width: 72px;">
                    <img src="../../assets/image/arrow-right-black.png" style="position: relative; top: 3px; left: -15px; width: 10px; height: 15px;">
                    <input class="ps_input" type="text" name="ps_day" placeholder="<?php echo $result_row['birth_day']?>" style="width: 72px;">
                    <img src="../../assets/image/arrow-right-black.png" style="position: relative; top: 3px; left: -15px; width: 10px; height: 15px;">
                    <p class="ps_title">이메일</p>
                    <p class="ps_input" name="ps_email"style="width: 550px; color:#1e2022"><?php echo $result_row['email']?></p>
                    <p class="ps_title">공개 범위</p>
                    <div id="ps_select_arrow">
                        <select id="ps_select" name="privacy_bounds" style="width: 315px;">
                            <option value="모두 공개">모두 공개</option>
                            <option value="친구 공개">친구 공개</option>
                            <option value="비공개">비공개</option>
                        </select>
                    </div>
                    <button class="ps_button" type="reset" style="background-color: rgba(216, 216, 216, 0.26); margin-top: 110px; margin-left: 380px; outline-color: rgba(216, 216, 216, 0.26);">취소</button>
                    <button class="ps_button" type="submit" style="background-color: #d8d8d8; margin-top: 110px; margin-left: 25px; outline-color: #d8d8d8;">완료</button>
                </fieldset>
            </form>
        </div>

        <div class="ps_category">
            <p class="ps_category_title">비밀번호 변경</p>
            <form class="ps_form">
                <fieldset id="ps_fieldset2">
                    <p class="ps_title">새로운 비밀번호</p>
                    <input class="ps_input" type="password" name="ps_password" placeholder="6자 이상 입력해주세요." style="width: 550px;">
                    <img src="../../assets/image/view-simple-815.png" style="position: absolute; margin-left: -25px; margin-top: 5px;">
                    <p class="ps_title">새로운 비밀번호 확인</p>
                    <input class="ps_input" type="password" name="ps_password_re" placeholder="6자 이상 입력해주세요." style="width: 550px;">
                    <img src="../../assets/image/view-simple-815.png" style="position: absolute; margin-left: -30px; margin-top: 5px;">
                    <button class="ps_button" type="reset" style="background-color: rgba(216, 216, 216, 0.26); margin-top: 105px; margin-left: 380px; outline-color: rgba(216, 216, 216, 0.26);">취소</button>
                    <button class="ps_button" type="submit" style="background-color: #d8d8d8; margin-top: 105px; margin-left: 25px; outline-color: #d8d8d8;">완료</button>
                </fieldset>
            </form>
        </div>

        <div class="ps_category" style=" margin-bottom: 100px;">
            <p class="ps_category_title">회원 탈퇴</p>
            <form class="ps_form">
                <fieldset id="ps_fieldset3">
                    <p class="ps_title">탈퇴할 경우 모든 데이터는 삭제되며 복구할 수 없습니다.</p><br>
                    <button class="ps_button" type="submit" style="width: 132px; background-color: #d8d8d8; margin-top: 45px; margin-left: 425px; outline-color: #d8d8d8;">회원탈퇴신청</button>
                </fieldset>
            </form>
        </div>
</body>
</html>