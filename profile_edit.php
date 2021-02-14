<?php
    session_start();
    $n_email = $_SESSION['email'];
    $conn=mysqli_connect('localhost','root','harmony2020','harmony');

    $query_info = "select * from User_Accounts where email='$n_email'";
    $data_info = mysqli_query($conn, $query_info);
    $row_info = mysqli_fetch_array($data_info);
    
    $query_intro = "select * from My_Page WHERE id='$row_info[0]'";
    $data_intro=mysqli_query($conn,$query_intro);
    $row_intro = mysqli_fetch_array($data_intro);

    $query_intro_long = "select * from Long_Intro WHERE id='$row_info[0]'";
    $data_intro_long=mysqli_query($conn,$query_intro_long);
    $row_intro_long = mysqli_fetch_array($data_intro_long);

    $query_edu = "select * from Education WHERE userid='$row_info[0]'";
    $data_edu=mysqli_query($conn,$query_edu);
    $row_edu = mysqli_fetch_array($data_edu);

    $query_job = "select * from Desired_Job WHERE userid='$row_info[0]'";
    $data_job=mysqli_query($conn,$query_job);
    $row_job = mysqli_fetch_array($data_job);

    $query_lan = "select * from Language_Skills WHERE userid='$row_info[0]'";
    $data_lan=mysqli_query($conn,$query_lan);
    $row_lan = mysqli_fetch_array($data_lan);

    $query_lic = "select * from License WHERE userid='$row_info[0]'";
    $data_lic=mysqli_query($conn,$query_lic);
    $row_lic = mysqli_fetch_array($data_lic);

    $intro_short = $row_intro[1];
    $intro_long = $row_intro_long[1];
?>

<!DOCTYPE html>
<html>
    <head>
        <title>마이페이지 프로필 수정</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../../style/profile_edit.css">
    </head>
    <body>
        <div class="top">
            <button class="harmony">
                <img src="../../assets/image/icon8.png" class="harmony_logo">
            </button>
            <input type="text" class="find" placeholder="     검색">
            <button class="findbtn">
                <img src="../../assets/image/icon10.png" class="findbtnimg">
            </button>
            <button id="btn" class="write_post">게시글 작성</button>
            <button id="btn" class="mypage" onclick="location.href='myPage.php'">마이페이지</button>
            <button id="btn" class="bookmark">북마크</button>
            <button class="alarm">
                <img src="../../assets/image/icon7.png" class="alarm_photo">
            </button>
            <div id="prof_photo" class="photo1">
                <img src="../../assets/image/icon9.png" class="human">
            </div>
            <div class="prof_name">
                <p><?php echo $row_info[1];?></p>
                <button onclick="showDropMenu()" style="border: none; outline: none; background-color: transparent; position:absolute; top:12px; left:40px">
                    <img src="../../assets/image/dropdown_tr.png" style="width: 6px; height: 4px;">
                </button>
                <div>
                    <ul id="dropdownMenu">
                        <li><a href="#">프로젝트 보관함</a></li>
                        <hr style="width:148px;margin-left:-40px;">
                        <li><a href="editInfo.php">정보 변경</a></li>
                        <hr style="width:148px;margin-left:-40px;">
                        <li><a href="#">로그아웃</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div id="pe_top">
            <img src="../../assets/image/i_school_img.png" style="width:700px; height:570px; opacity: 0.2; float:right; transform:rotate(340deg); margin-top: -140px;"/>
        </div>
        <img id="pe_profile_img" src="../../assets/image/profile_img.png">
        <div id="pe_center">
            <div id="pe_name">
                <p><?php echo $row_info[1] ?></p>
            </div>
            <p id="pe_slogan_output" class="pe_output_text" style="margin-left:0px; margin-top: 30px; position: absolute; left: 50%; transform: translate(-50%, 340%);"><?php echo $intro_short ?></p>
            <form id="pe_slogan" action="slogan_edit_action.php">
                <input type="text" id="pe_slogan_input" name="slogan_input" value="<?=$intro_short?>" placeholder="한 줄 프로필을 입력하세요." autocomplete="off" style="visibility:hidden;"></input>
                <button id="btn_slogan_reset" class="pe_button_small" type="reset" style="display:none; position:absolute; top:135px; left:40px; background-color: rgba(216, 216, 216, 0.26); outline-color: rgba(216, 216, 216, 0.26);">취소</button>
                <button id="btn_slogan_submit" onclick="slogan_input()" class="pe_button_small" type="submit" style="display:none; position:absolute; top:135px; left:100px; background-color: #d8d8d8; outline-color: #d8d8d8;">저장</button>
            </form>   
        </div>
        <hr style="margin-top: -10px;">
        <div class="pe_category">
            <form class="pe_form" action="introduce_edit_action.php">
                <div>
                    <p class="pe_category_title">소개</p>
                    <button type="button" onclick="intro_edit()" id="btn_intro" class="pe_edit_pen" style="position: relative; top:-45px; left:550px"></button>
                </div>
                <pre style="white-space: pre-wrap; width: 548px; margin-top: -22px;" id="pe_intro_output" class="pe_output_text"><?php echo $intro_long ?></pre>
                <textarea id="pe_intro_input" name="intro_input" style="visibility:hidden; margin-top: -22px;"><?php echo $intro_long?></textarea>
                <button id="btn_intro_reset" type="reset" class="pe_button" type="reset" style="display:none; background-color: rgba(216, 216, 216, 0.26); margin-top: 25px; margin-left: 390px; margin-bottom: 19px; outline-color: rgba(216, 216, 216, 0.26);">취소</button>
                <button id="btn_intro_submit" type="submit" onclick="intro_input()" class="pe_button" type="button" style="display:none; background-color: #d8d8d8; margin-top: 25px; margin-left: 25px; margin-bottom: 19px; outline-color: #d8d8d8;">저장</button>
            </form>
        </div>

        
        <div class="pe_category">
            <form class="pe_form" action="education_edit_action.php">
                <div id="school_Div0">
                    <div>
                        <p class="pe_category_title">학력</p>
                        <button type="button" onclick="school_edit()" id="btn_school" class="pe_edit_pen" style="position: relative; top:-45px; left:550px"></button>
                    </div>
                    <p name="school_title" class="pe_title" style="display:none; margin-top: -22px;">기관명</p>
                    <div id="pe_div_output0" style="margin-top: -40px;">
                        <img id="pe_img_output0" class="pe_school_img" src="../../assets/image/i_school_img.png">
                        <p id="pe_school_output0" class="pe_school_name"><?php echo $row_edu[2] ?></p>
                        <p id="pe_major_output0" class="pe_school_info"><?php echo $row_edu[3]."(".$row_edu[4].")" ?></p>
                        <p id="pe_year_output0" class="pe_school_info"><?php echo $row_edu[5]."년 ~ ".$row_edu[6]."년" ?></p>
                    </div>
                    <input id="pe_school_input0" class="pe_input" name="pe_school_input0" autocomplete="off" type="text" placeholder="학교, 연구실, 교육기관 등을 입력하세요."
                                style="display:none; position: relative; width: 382px;" value="<?=$row_edu[2]?>">
                    <!--<img name="nm_arrow" src="../../assets/image/arrow-right-black.png" style="display:none; position: relative; top: 3px; left: -20px; width: 10px; height: 15px;">-->
                    <div name="pe_div" style="float:left; width: 32%;">
                        <p name="school_title" class="pe_title" style="display:none;">전공</p>
                        <input id="pe_major_input0" name="pe_major_input0" class="pe_input" type="text" placeholder="전공명을 입력하세요." autocomplete="off" 
                        value="<?=$row_edu[3]?>" style="display:none; width: 142px;">
                    </div>
                    <div name="pe_div" class="pe_parent">
                        <p name="school_title" class="pe_title" style="display:none;">학위</p>
                        <select id="pe_degree_input0" name="pe_degree_input0" class="pe_level_inputc" value="<?=$row_edu[4]?>" style="display:none; width: 204px; margin-left: 0px;">
                            <option value="학사">학사</option>
                            <option value="석사">석사</option>
                            <option value="박사">박사</option>
                        </select>
                        <!--<img name="nm_arrow" src="../../assets/image/arrow-right-black.png" style="display:none; position: relative; top: 3px; left: -20px; width: 10px; height: 15px;">-->
                    </div>   
                    <div name="pe_div" style="float:left; padding-right: 20px;"> 
                        <p name="school_title" class="pe_title" style="display:none;">입학연도</p>
                        <input id="pe_e_year_input0" name="pe_e_year_input0" value="<?=$row_edu[5]?>" class="pe_input" type="year" placeholder="YYYY" autocomplete="off" style="display:none; width: 130px;">
                        <!--<img name="nm_arrow" src="../../assets/image/arrow-right-black.png" style="display:none; position: relative; top: 3px; left: -20px; width: 10px; height: 15px;">-->
                    </div>
                    <div name="pe_div">
                        <p name="school_title" class="pe_title" style="display:none; padding-left: 175px;">졸업연도</p>
                        <input id="pe_g_year_input0" name="pe_g_year_input0" value="<?=$row_edu[6]?>" class="pe_input" type="year" placeholder="YYYY" autocomplete="off" style="display:none; width: 130px; margin-left:20px;">
                        <!--<img name="nm_arrow" src="../../assets/image/arrow-right-black.png" style="display:none; position: relative; top: 3px; left: -20px; width: 10px; height: 15px;">-->
                    </div>
                    <div name="pe_div" style="float:right; margin-right:17px; margin-top: -42px;">
                        <button id="btn_school_add0" onclick="school_add()" class="pe_button" type="button" style="display:none; background-color: rgba(139, 139, 139, 0.15); width: 69px; height: 35px;">+ 추가</button>
                    </div>
                    <div id="addedSchoolDiv"></div>
                    <div id="pe_school_btns" style="display:none; clear:both; margin-top: 30px;">
                        <button id="btn_school_reset" class="pe_button" type="reset" style="background-color: rgba(216, 216, 216, 0.26); margin-top: 25px; margin-left: 390px; margin-bottom: 19px; outline-color: rgba(216, 216, 216, 0.26);">취소</button>
                        <button id="btn_school_submit" onclick="school_input()" class="pe_button" type="submit" style="background-color: #d8d8d8; margin-top: 25px; margin-left: 25px; margin-bottom: 19px; outline-color: #d8d8d8;">저장</button>
                    </div>
                </div>
            </form>
        </div>
        
        <div class="pe_category">
            <form class="pe_form" action="desiredjob_edit_action.php">
                <div>
                    <p class="pe_category_title">희망 직무</p>
                    <button type="button" onclick="work_edit()" id="btn_school" class="pe_edit_pen" style="position: relative; top:-45px; left:550px"></button>
                </div>
                <p class="pe_title" style="margin-top: -22px;">1지망</p>
                <div style="float:left; width: 42%;">
                    <p class="pe_title">직군</p>
                    <p id="pe_line1_output" class="pe_output_text"><?php echo $row_job[0] ?></p>
                    <input id="pe_line1" name="pe_line1" value="<?=$row_job[0]?>" class="pe_input" type="text" name="pe_line" autocomplete="off" style="width: 208px; display:none;">
                    <!--<img name="nm_arrow" src="../../assets/image/arrow-right-black.png" style="display:none; position: relative; top: 3px; left: -20px; width: 10px; height: 15px;">-->
                </div>
                <div class="pe_parent" style="margin-top: 27px;">
                    <p class="pe_title">직무</p>
                    <p id="pe_work1_output" class="pe_output_text"><?php echo $row_job[1] ?></p>
                    <input id="pe_work1" name="pe_work1" value="<?=$row_job[1]?>" class="pe_input" type="text" name="pe_work" autocomplete="off" style="display:none; width: 208px; margin-left: 0px;">
                    <!--<img name="nm_arrow" src="../../assets/image/arrow-right-black.png" style="display:none; position: relative; top: 3px; left: -20px; width: 10px; height: 15px;">-->
                </div>
                <p class="pe_title">2지망</p>
                <div style="float:left; width: 42%;">
                    <p class="pe_title">직군</p>
                    <p id="pe_line2_output" class="pe_output_text" ><?php echo $row_job[2] ?></p>
                    <input id="pe_line2" name="pe_line2" value="<?=$row_job[2]?>" class="pe_input" type="text" name="pe_line" autocomplete="off" style="display:none; width: 208px;">
                    <!--<img name="nm_arrow" src="../../assets/image/arrow-right-black.png" style="display:none; position: relative; top: 3px; left: -20px; width: 10px; height: 15px;">-->
                </div>
                <div class="pe_parent" style="margin-top: 27px;">
                    <p class="pe_title">직무</p>
                    <p id="pe_work2_output" class="pe_output_text"><?php echo $row_job[3] ?></p>
                    <input id="pe_work2" name="pe_work2" value="<?=$row_job[3]?>" class="pe_input" type="text" name="pe_work" autocomplete="off" style="display:none; width: 208px; margin-left: 0px;">
                    <!--<img name="nm_arrow" src="../../assets/image/arrow-right-black.png" style="display:none; position: relative; top: 3px; left: -20px; width: 10px; height: 15px;">-->
                </div>
                <p class="pe_title">3지망</p>
                <div style="float:left; width: 42%;">
                    <p class="pe_title">직군</p>
                    <p id="pe_line3_output" class="pe_output_text"><?php echo $row_job[4] ?></p>
                    <input id="pe_line3" name="pe_line3" value="<?=$row_job[4]?>" class="pe_input" type="text" name="pe_line" autocomplete="off" style="display:none; width: 208px;">
                    <!--<img name="nm_arrow" src="../../assets/image/arrow-right-black.png" style="display:none; position: relative; top: 3px; left: -20px; width: 10px; height: 15px;">-->
                </div>
                <div class="pe_parent" style="margin-top: 27px;">
                    <p class="pe_title">직무</p>
                    <p id="pe_work3_output" class="pe_output_text"><?php echo $row_job[5] ?></p>
                    <input id="pe_work3" name="pe_work3" value="<?=$row_job[5]?>" class="pe_input" type="text" name="pe_work" autocomplete="off" style="display:none; width: 208px; margin-left: 0px;">
                    <!--<img name="nm_arrow" src="../../assets/image/arrow-right-black.png" style="display:none; position: relative; top: 3px; left: -20px; width: 10px; height: 15px;">-->
                </div>
                <div id="pe_work_btns" style="display:none; clear:both; margin-top: 30px;">
                    <button id="btn_work_reset" class="pe_button" type="reset" style="background-color: rgba(216, 216, 216, 0.26); margin-top: 25px; margin-left: 390px; margin-bottom: 19px; outline-color: rgba(216, 216, 216, 0.26);">취소</button>
                    <button id="btn_work_submit" onclick="work_input()"  class="pe_button" type="submit" style="background-color: #d8d8d8; margin-top: 25px; margin-left: 25px; margin-bottom: 19px; outline-color: #d8d8d8;">저장</button>
                </div>
            </form>
        </div>
        <div class="pe_category">
            <form class="pe_form" action="languageskills_edit_action.php">
                <div id="lan_Div0">
                    <div>
                        <p class="pe_category_title">어학 능력</p>
                        <button type="button" onclick="language_edit()" id="btn_language" class="pe_edit_pen" style="position: relative; top:-45px; left:550px"></button>
                    </div>
                    <div style="float:left; width: 42%; margin-top:-32px;">
                        <p class="pe_title">언어</p>
                        <p id="pe_lan_output0" class="pe_output_text"><?php echo $row_lan[1] ?></p>
                        <input id="pe_lan_input0" name="pe_lan_input0" value="<?=$row_lan[1]?>" class="pe_input" type="text" autocomplete="off" style="display:none; width: 208px;">
                    </div>
                    <div class="pe_parent" style="margin-top:-32px;">
                        <p class="pe_title">숙련도</p>
                        <p id="pe_level_output0" class="pe_output_text"><?php echo $row_lan[2] ?></p>
                        <select id="pe_level_input0" name="pe_level_input0" value="<?=$row_lan[2]?>" class="pe_level_inputc" style="display:none; width: 215px; margin-left: 0px;">
                            <option value="초급">초급</option>
                            <option value="중급">중급</option>
                            <option value="고급">고급</option>
                        </select>
                        <!--<img name="nm_arrow" src="../../assets/image/arrow-right-black.png" style="display:none; position: relative; top: 3px; left: -20px; width: 10px; height: 15px;">-->
                    </div>
                    <div style="float:left; width: 42%;">
                        <p class="pe_title">시험명</p>
                        <p id="pe_lan_name_output0" class="pe_output_text"><?php echo $row_lan[3] ?></p>
                        <input id="pe_lan_name_input0" name="pe_lan_name_input0" value="<?=$row_lan[3]?>" class="pe_input" type="text" autocomplete="off" style="display:none; width: 208px;">
                        <!--<img name="nm_arrow" src="../../assets/image/arrow-right-black.png" style="display:none; position: relative; top: 3px; left: -20px; width: 10px; height: 15px;">-->
                    </div>
                    <div class="pe_parent">
                        <p class="pe_title">점수</p>
                        <p id="pe_score_output0" class="pe_output_text"><?php echo $row_lan[4] ?></p>
                        <input id="pe_score_input0" name="pe_score_input0" value="<?=$row_lan[4]?>" class="pe_input" type="text" autocomplete="off" style="display:none; width: 208px; margin-left: 0px;">
                        <!--<img name="nm_arrow" src="../../assets/image/arrow-right-black.png" style="display:none; position: relative; top: 3px; left: -20px; width: 10px; height: 15px;">-->
                    </div>
                    <div>
                        <p class="pe_title">취득일</p>
                        <p id="pe_lan_date_output0" class="pe_output_text"><?php echo $row_lan[5] ?></p>
                        <input id="pe_lan_date_input0" name="pe_lan_date_input0" value="<?=$row_lan[5]?>" class="pe_input" type="date" autocomplete="off" style="display:none; width: 210px;">
                        <!--<img name="nm_arrow" src="../../assets/image/arrow-right-black.png" style="display:none; position: relative; top: 3px; left: -20px; width: 10px; height: 15px;">-->
                    </div>
                    <div style="float:right; margin-right:17px; margin-top: -42px;">
                        <button id="btn_lan_add0" onclick="language_add()" class="pe_button" type="button" style="display:none; background-color: rgba(139, 139, 139, 0.15); width: 69px; height: 35px;">+ 추가</button>
                    </div>
                    <div id="addedLanDiv"></div>
                 </div>
                <div id="pe_lan_btns" style="display:none; clear:both; margin-top: 30px;">
                    <button id="btn_lan_reset" class="pe_button" type="reset" style="background-color: rgba(216, 216, 216, 0.26); margin-top: 25px; margin-left: 390px; margin-bottom: 19px; outline-color: rgba(216, 216, 216, 0.26);">취소</button>
                    <button id="btn_lan_submit" onclick="language_input();" class="pe_button" type="submit" style="background-color: #d8d8d8; margin-top: 25px; margin-left: 25px; margin-bottom: 19px; outline-color: #d8d8d8;">저장</button>
                </div>
            </form>
        </div>
        <div class="pe_category"  style=" margin-bottom: 100px;">
            <form class="pe_form" action="license_edit_action.php">
                <div id="license_Div0">
                    <div>
                        <p class="pe_category_title">자격증</p>
                        <button type="button" onclick="license_edit()" id="btn_school" class="pe_edit_pen" style="position: relative; top:-45px; left:550px"></button>
                    </div>
                    <div style="margin-top:-32px;">
                        <p class="pe_title">시험명</p>
                        <p id="pe_license_output0" class="pe_output_text"><?php echo $row_lic[1] ?></p>
                        <input id="pe_license_input0" name="pe_license_input0" value="<?=$row_lic[1]?>" class="pe_input" type="text" autocomplete="off" placeholder="시험명을 입력하세요."style="display:none; width: 439px;">
                    </div>
                    <div>
                        <p class="pe_title">취득일</p>
                        <p id="pe_license_date_output0" class="pe_output_text"><?php echo $row_lic[2] ?></p>
                        <input id="pe_license_date_input0" name="pe_license_date_input0" value="<?=$row_lic[2]?>" class="pe_input" type="date" style="display:none; width: 210px;">
                    </div>
                    <div style="float:right; margin-right:17px; margin-top: -42px;">
                        <button id="btn_license_add0" class="pe_button" onclick="license_add()" type="button" style="display:none; background-color: rgba(139, 139, 139, 0.15); width: 69px; height: 35px;">+ 추가</button>
                    </div>
                    <div id="addedLicenseDiv"></div>
                </div>
                <div id="pe_license_btns" style="display:none; clear:both; margin-top: 30px;">
                    <button id="btn_license_reset" class="pe_button" type="reset" style="background-color: rgba(216, 216, 216, 0.26); margin-top: 25px; margin-left: 390px; margin-bottom: 19px; outline-color: rgba(216, 216, 216, 0.26);">취소</button>
                    <button id="btn_license_submit" onclick="license_input()" class="pe_button" type="submit" style="background-color: #d8d8d8; margin-top: 25px; margin-left: 25px; margin-bottom: 19px; outline-color: #d8d8d8;">저장</button>
                </div>
            </form>
        </div>
        <script type="text/javascript">
            function slogan_edit(){
                document.getElementById("pe_slogan_output").style.visibility = "hidden";//출력태그 숨김
                document.getElementById("pe_slogan_input").style.visibility = "visible";//입력폼 나타냄
                document.getElementById("btn_slogan_reset").style.display = "block";//버튼 나타냄
                document.getElementById("btn_slogan_submit").style.display = "block";
            }

            function slogan_input(){
                var input = document.getElementById("pe_slogan_input").value; //입력값 읽어와서
                document.getElementById("pe_slogan_output").innerHTML = input; //출력
                document.getElementById("pe_slogan_output").style.visibility = "visible";//출력태그 보임
                document.getElementById("pe_slogan_input").style.visibility = "hidden";//입력폼 숨김
                document.getElementById("btn_slogan_reset").style.display = "none";//입력폼 숨김
                document.getElementById("btn_slogan_submit").style.display = "none";//입력폼 숨김
               
            }

            function intro_edit(){
                document.getElementById("pe_intro_output").style.display = "none";//출력태그 숨김
                document.getElementById("pe_intro_input").style.visibility = "visible";//입력폼 나타냄
                document.getElementById("btn_intro_reset").style.display = "inline";//버튼 나타냄
                document.getElementById("btn_intro_submit").style.display = "inline";
            }

            function intro_input(){
                var input = document.getElementById("pe_intro_input").value; //입력값 읽어와서
                document.getElementById("pe_intro_output").innerHTML = input; //출력
                document.getElementById("pe_intro_output").style.display = "block";//출력태그 보임
                document.getElementById("pe_intro_input").style.visibility = "hidden";//입력폼 숨김
                document.getElementById("btn_intro_reset").style.display = "none";//입력폼 숨김
                document.getElementById("btn_intro_submit").style.display = "none";//입력폼 숨김
            }

            var school_count = 0;

            function school_edit(){
                for(var i=0;i<=school_count;i++){
                    document.getElementById("pe_div_output"+i).style.display = "none";//출력태그 숨김
                    
                    document.getElementById("pe_school_input"+i).style.display = "inline";//입력폼 
                    document.getElementById("pe_major_input"+i).style.display = "inline";//입력폼
                    document.getElementById("pe_degree_input"+i).style.display = "inline";//입력폼
                    document.getElementById("pe_e_year_input"+i).style.display = "inline";//입력폼 
                    document.getElementById("pe_g_year_input"+i).style.display = "inline";//입력폼 

                    document.getElementById("btn_school_add"+i).style.display = "block";
                }
                for (var j=0; j<5; j++) {
                    document.getElementsByName("school_title")[j].style.display = "block";
                }
                
                document.getElementById("pe_school_btns").style.display = "block";
            }

            function school_input(){
                var school_input = new Array();
                var major_input = new Array();
                var degree_input = new Array();
                var e_year_input = new Array();
                var g_year_input = new Array();
                
                for(var i=0;i<=school_count;i++){
                    school_input.push(document.getElementById("pe_school_input"+i).value); //입력값 읽어와서
                    major_input.push(document.getElementById("pe_major_input"+i).value);
                    degree_input.push(document.getElementById("pe_degree_input"+i).value);
                    e_year_input.push(document.getElementById("pe_e_year_input"+i).value);
                    g_year_input.push(document.getElementById("pe_g_year_input"+i).value);
        
                    document.getElementById("pe_img_output"+i).innerHTML = "<img src='../../assets/image/i_school_img.png'>"; //출력
                    document.getElementById("pe_school_output"+i).innerHTML = school_input[i]; //출력
                    document.getElementById("pe_major_output"+i).innerHTML = major_input[i]+"("+ degree_input[i]  + ")"; //출력
                    document.getElementById("pe_year_output"+i).innerHTML = e_year_input[i]+"년 ~ "+g_year_input[i]+"년" ; //출력
                    document.getElementById("pe_div_output"+i).style.display = "block";//출력태그 보임
                    //document.getElementById("pe_school_output"+i).style.display = "block";//출력태그 보임
                    //document.getElementById("pe_major_output"+i).style.display = "block";//출력태그 보임
                    //document.getElementById("pe_year_output"+i).style.display = "block";//출력태그 보임
                    
                  
                    for (var j=0; j<document.getElementsByName("school_title").length; j++) {
                       document.getElementsByName("school_title")[j].style.display = "none";
                    }
                 
                    document.getElementById("pe_school_input"+i).style.display = "none";//입력폼 숨김
                    document.getElementById("pe_major_input"+i).style.display = "none";//입력폼 숨김
                    document.getElementById("pe_degree_input"+i).style.display = "none";//입력폼 숨김
                    document.getElementById("pe_e_year_input"+i).style.display = "none";//입력폼 숨김
                    document.getElementById("pe_g_year_input"+i).style.display = "none";//입력폼 숨김
                    document.getElementById("btn_school_add"+i).style.display = "none";      
                }
                document.getElementById("pe_school_btns").style.display = "none";
            }

            function school_add(){
                school_count++;
                
                var addedFormDiv=document.getElementById("addedSchoolDiv");
                var addedDiv = document.createElement("div"); //전체 div 생성
                addedDiv.setAttribute("id", "school_Div"+school_count); //div의 id 카운팅

                var school_outDiv = document.createElement("div"); //결과 출력되는 부분
                var img_out = document.createElement("img");
                var school_out = document.createElement("p");
                var major_out = document.createElement("p");
                var year_out = document.createElement("p");

                school_outDiv.setAttribute("id", "pe_div_output"+school_count);

                img_out.setAttribute("id", "pe_img_output"+school_count);
                img_out.setAttribute("class", "pe_school_img");
                img_out.setAttribute("src", "../../assets/image/i_school_img.png");

                school_out.setAttribute("id", "pe_school_output"+school_count);
                school_out.setAttribute("class", "pe_school_name");

                major_out.setAttribute("id", "pe_major_output"+school_count);
                major_out.setAttribute("class", "pe_school_info");

                year_out.setAttribute("id", "pe_year_output"+school_count);
                year_out.setAttribute("class", "pe_school_info");

                school_outDiv.appendChild(img_out);
                school_outDiv.appendChild(school_out);
                school_outDiv.appendChild(major_out);
                school_outDiv.appendChild(year_out);
        
                /*기관명*/
                var school_div1 = document.createElement("div"); //기관명 div

                var school_title1 = document.createElement("p"); //기관명 타이틀
                school_title1.setAttribute("class", "pe_title");
                var school_txt1 = document.createTextNode("기관명");
                school_title1.appendChild(school_txt1);
                //school_title1.setAttribute("name", "school_title");

                var school_in = document.createElement("input");
                school_in.setAttribute("id", "pe_school_input"+school_count);
                //school_in.setAttribute("name", "pe_school_input"+school_count);
                school_in.setAttribute("class", "pe_input");
                school_in.autocomplete="off";
                school_in.type="text";
                school_in.placeholder="학교, 연구실, 교육기관 등을 입력하세요.";
                school_in.style.width="382px";
              
                /*전공*/
                var school_div2 = document.createElement("div"); //전공 div
                school_div2.style.float="left";
                school_div2.style.width="32%";

                var school_title2 = document.createElement("p"); //전공 타이틀
                school_title2.setAttribute("class", "pe_title");
                var school_txt2 = document.createTextNode("전공");
                school_title2.appendChild(school_txt2);
                //school_title2.setAttribute("name", "school_title");

                var major_in = document.createElement("input");
                major_in.setAttribute("id", "pe_major_input"+school_count);
               // major_in.setAttribute("name", "pe_major_input"+school_count);
                major_in.setAttribute("class", "pe_input");
                major_in.type="text";
                major_in.placeholder="전공명을 입력하세요."
                major_in.autocomplete="off";
                major_in.style.width="142px";

                /*학위*/
                var school_div3 = document.createElement("div"); //학위 div
                school_div3.setAttribute("class", "pe_parent");
                
                var school_title3 = document.createElement("p"); //학위 타이틀
                school_title3.setAttribute("class", "pe_title");
                var school_txt3 = document.createTextNode("학위");
                school_title3.appendChild(school_txt3);
               // school_title3.setAttribute("name", "school_title");
                
                var degree_in = document.createElement("select");
                degree_in.setAttribute("id", "pe_degree_input"+school_count);
                //degree_in.setAttribute("name", "pe_degree_input"+school_count);
                degree_in.setAttribute("class", "pe_level_inputc");
                degree_in.style.width="204px";
                degree_in.style.marginLeft="0px";

                var degree_opt1 = document.createElement("option");
                var degree_opt2 = document.createElement("option");
                var degree_opt3 = document.createElement("option");

                degree_opt1.text="학사";
                degree_opt2.text="석사";
                degree_opt3.text="박사";
               
                degree_in.options.add(degree_opt1);
                degree_in.options.add(degree_opt2);
                degree_in.options.add(degree_opt3);

                /*입학연도*/
                var school_div4 = document.createElement("div"); //입학연도 div
                school_div4.style.float="left";
                school_div4.style.paddingRight="20px";

                var school_title4 = document.createElement("p"); //입학연도 타이틀
                school_title4.setAttribute("class", "pe_title");
                var school_txt4 = document.createTextNode("입학연도");
                school_title4.appendChild(school_txt4);
                //school_title4.setAttribute("name", "school_title");

                var e_in = document.createElement("input");
                e_in.setAttribute("id", "pe_e_year_input"+school_count);
                //e_in.setAttribute("name", "pe_e_year_input"+school_count);
                e_in.setAttribute("class", "pe_input");
                e_in.type="year";
                e_in.placeholder="YYYY";
                e_in.autocomplete="off";
                e_in.style.width="130px";

                 /*졸업연도*/
                var school_div5 = document.createElement("div"); //졸업연도 div

                var school_title5= document.createElement("p"); //졸업연도 타이틀
                school_title5.setAttribute("class", "pe_title");
                var school_txt5 = document.createTextNode("졸업연도");
                school_title5.appendChild(school_txt5);
                school_title5.style.marginLeft="190px";
                //school_title5.setAttribute("name", "school_title");

                var g_in = document.createElement("input");
                g_in.setAttribute("id", "pe_g_year_input"+school_count);
                //g_in.setAttribute("name", "pe_g_year_input"+school_count);
                g_in.setAttribute("class", "pe_input");
                g_in.type="year";
                g_in.placeholder="YYYY";
                g_in.autocomplete="off";
                g_in.style.width="130px";
                g_in.style.marginLeft="20px";

                 /*추가 버튼*/
                var school_div6 = document.createElement("div"); //추가버튼 div
                school_div6.style.float="right";
                school_div6.style.marginRight="17px";
                school_div6.style.marginTop="-42px";

                var s_btn_add = document.createElement("button");
                s_btn_add.innerHTML="+ 추가";
                s_btn_add.onclick=school_add;
                s_btn_add.setAttribute("class", "pe_button");
                s_btn_add.setAttribute("id", "btn_school_add"+school_count);
                s_btn_add.type="button";
                s_btn_add.style.backgroundColor="rgba(139, 139, 139, 0.15)";
                s_btn_add.style.width="69px";
                s_btn_add.style.height="35px";

                school_div1.appendChild(school_title1);
                school_div1.appendChild(school_in);

                school_div2.appendChild(school_title2);
                school_div2.appendChild(major_in);

                school_div3.appendChild(school_title3);
                school_div3.appendChild(degree_in);

                school_div4.appendChild(school_title4);
                school_div4.appendChild(e_in);

                school_div5.appendChild(school_title5);
                school_div5.appendChild(g_in);
                
                school_div6.appendChild(s_btn_add);

                addedDiv.appendChild(school_outDiv);
                addedDiv.appendChild(school_div1);
                addedDiv.appendChild(school_div2);
                addedDiv.appendChild(school_div3);
                addedDiv.appendChild(school_div4);
                addedDiv.appendChild(school_div5);
                addedDiv.appendChild(school_div6);
                
                addedFormDiv.appendChild(addedDiv);
                
                var tmp = school_count-1;

                document.getElementById("btn_school_add"+tmp).style.display = "none";
                document.getElementById("pe_div_output"+school_count).style.display = "none";
            }

            function work_edit(){
                document.getElementById("pe_line1_output").style.display = "none";//출력태그 숨김
                document.getElementById("pe_line2_output").style.display = "none";//출력태그 숨김
                document.getElementById("pe_line3_output").style.display = "none";//출력태그 숨김
                document.getElementById("pe_work1_output").style.display = "none";//출력태그 숨김
                document.getElementById("pe_work2_output").style.display = "none";//출력태그 숨김
                document.getElementById("pe_work3_output").style.display = "none";//출력태그 숨김

                document.getElementById("pe_line1").style.display = "block";//입력폼 
                document.getElementById("pe_line2").style.display = "block";//입력폼 
                document.getElementById("pe_line3").style.display = "block";//입력폼 
                document.getElementById("pe_work1").style.display = "block";//입력폼 
                document.getElementById("pe_work2").style.display = "block";//입력폼
                document.getElementById("pe_work3").style.display = "block";//입력폼 

                document.getElementById("pe_work_btns").style.display = "block";
                
            }

            function work_input(){
                var line1_input = document.getElementById("pe_line1").value; //입력값 읽어와서
                var line2_input = document.getElementById("pe_line2").value;
                var line3_input = document.getElementById("pe_line3").value;
                var work1_input = document.getElementById("pe_work1").value;
                var work2_input = document.getElementById("pe_work2").value;
                var work3_input = document.getElementById("pe_work3").value;

                document.getElementById("pe_line1_output").innerHTML = line1_input ; //출력
                document.getElementById("pe_line2_output").innerHTML = line2_input ; //출력
                document.getElementById("pe_line3_output").innerHTML = line3_input ; //출력
                document.getElementById("pe_work1_output").innerHTML = work1_input ; //출력
                document.getElementById("pe_work2_output").innerHTML = work2_input ; //출력
                document.getElementById("pe_work3_output").innerHTML = work3_input ; //출력

                document.getElementById("pe_line1_output").style.display = "block";//출력태그 보임
                document.getElementById("pe_line2_output").style.display = "block";//출력태그 보임
                document.getElementById("pe_line3_output").style.display = "block";//출력태그 보임
                document.getElementById("pe_work1_output").style.display = "block";//출력태그 보임
                document.getElementById("pe_work2_output").style.display = "block";//출력태그 보임
                document.getElementById("pe_work3_output").style.display = "block";//출력태그 보임
                
                document.getElementById("pe_line1").style.display = "none";//입력폼 숨김
                document.getElementById("pe_line2").style.display = "none";//입력폼 숨김
                document.getElementById("pe_line3").style.display = "none";//입력폼 숨김
                document.getElementById("pe_work1").style.display = "none";//입력폼 숨김
                document.getElementById("pe_work2").style.display = "none";//입력폼 숨김
                document.getElementById("pe_work3").style.display = "none";//입력폼 숨김

                document.getElementById("pe_work_btns").style.display = "none";
            }

            var lan_count=0;

            function language_edit(){
                for(var i=0;i<=lan_count;i++){
                    document.getElementById("pe_lan_output"+i).style.display = "none";//출력태그 숨김
                    document.getElementById("pe_level_output"+i).style.display = "none";//출력태그 숨김
                    document.getElementById("pe_score_output"+i).style.display = "none";//출력태그 숨김
                    document.getElementById("pe_lan_name_output"+i).style.display = "none";//출력태그 숨김
                    document.getElementById("pe_lan_date_output"+i).style.display = "none";//출력태그 숨김

                    document.getElementById("pe_lan_input"+i).style.display = "inline";//입력폼 
                    document.getElementById("pe_level_input"+i).style.display = "inline";//입력폼 
                    document.getElementById("pe_lan_name_input"+i).style.display = "inline";//입력폼 
                    document.getElementById("pe_score_input"+i).style.display = "inline";//입력폼 
                    document.getElementById("pe_lan_date_input"+i).style.display = "inline";//입력폼

                    document.getElementById("btn_lan_add"+i).style.display = "block";
                }
                document.getElementById("pe_lan_btns").style.display = "block";
            }

            function language_input(){
                var lan_input = new Array();
                var level_input = new Array();
                var lan_name_input = new Array();
                var score_input = new Array();
                var date_input = new Array();

                for(var i=0;i<=lan_count;i++){
                    lan_input.push(document.getElementById("pe_lan_input"+i).value); //입력값 읽어와서
                    level_input.push(document.getElementById("pe_level_input"+i).value);
                    lan_name_input.push(document.getElementById("pe_lan_name_input"+i).value);
                    score_input.push(document.getElementById("pe_score_input"+i).value);
                    date_input.push(document.getElementById("pe_lan_date_input"+i).value);
                    
                    document.getElementById("pe_lan_output"+i).innerHTML = lan_input[i]; //출력
                    document.getElementById("pe_level_output"+i).innerHTML = level_input[i] ; //출력
                    document.getElementById("pe_lan_name_output"+i).innerHTML = lan_name_input[i]; //출력
                    document.getElementById("pe_score_output"+i).innerHTML = score_input[i]; //출력   
                    document.getElementById("pe_lan_date_output"+i).innerHTML = date_input[i]; //출력
                    
                    document.getElementById("pe_lan_output"+i).style.display = "block";//출력태그 보임
                    document.getElementById("pe_level_output"+i).style.display = "block";//출력태그 보임
                    document.getElementById("pe_lan_name_output"+i).style.display = "block";//출력태그 보임
                    document.getElementById("pe_score_output"+i).style.display = "block";//출력태그 보임
                    document.getElementById("pe_lan_date_output"+i).style.display = "block";//출력태그 보임
           
                    document.getElementById("pe_lan_input"+i).style.display = "none";//입력폼 숨김
                    document.getElementById("pe_level_input"+i).style.display = "none";//입력폼 숨김
                    document.getElementById("pe_lan_name_input"+i).style.display = "none";//입력폼 숨김
                    document.getElementById("pe_score_input"+i).style.display = "none";//입력폼 숨김
                    document.getElementById("pe_lan_date_input"+i).style.display = "none";//입력폼 숨김
                    document.getElementById("btn_lan_add"+i).style.display = "none";      
                }
                document.getElementById("pe_lan_btns").style.display = "none";
            }

            function language_add(){
                lan_count++;

                var addedFormDiv=document.getElementById("addedLanDiv");
                var addedDiv = document.createElement("div"); //전체 div 생성
                addedDiv.setAttribute("id", "lan_Div"+lan_count); //div의 id 카운팅
                
                /*언어*/
                var lan_div1 = document.createElement("div"); //언어 div
                lan_div1.style.float="left";
                lan_div1.style.width="42%";
                lan_div1.style.marginTop="-10px";

                var lan_title1 = document.createElement("p"); //언어 타이틀
                lan_title1.setAttribute("class", "pe_title");
                var lan_txt1 = document.createTextNode("언어");
                lan_title1.appendChild(lan_txt1);

                var lan_out = document.createElement("p"); //p태그 생성(선택한 언어 출력하는 부분)
                lan_out.setAttribute("id", "pe_lan_output"+lan_count); //p태그 id 카운팅
                lan_out.setAttribute("class", "pe_output_text"); //p태그에 class 연결
                lan_out.style.display="none";
                
                var lan_in = document.createElement("input"); //언어 입력폼
                lan_in.setAttribute("id", "pe_lan_input"+lan_count);
                lan_in.setAttribute("class","pe_input");
                lan_in.type="text";
                lan_in.placeholder="영어";
                lan_in.autocomplete="off";
                //lan_in.style.display="none";
                lan_in.style.width="208px";

                /*숙련도*/
                var lan_div2 = document.createElement("div"); //숙련도 div
                lan_div2.setAttribute("class", "pe_parent");
                //lan_div1.style.marginTop="-32px";

                var lan_title2 = document.createElement("p"); //숙련도 타이틀
                lan_title2.setAttribute("class", "pe_title");
                var lan_txt2 = document.createTextNode("숙련도");
                lan_title2.appendChild(lan_txt2);

                var level_out = document.createElement("p")
                level_out.setAttribute("id", "pe_level_output"+lan_count);
                level_out.setAttribute("class", "pe_output_text");
                level_out.style.display="none";
                
                var level_in = document.createElement("select");
                var level_opt1 = document.createElement("option");
                var level_opt2 = document.createElement("option");
                var level_opt3 = document.createElement("option");

                level_in.setAttribute("id", "pe_level_input"+lan_count);
                level_in.setAttribute("class", "pe_level_inputc");
                //level_in.style.display="none";
                level_in.style.width="215px";
                level_in.style.marginLeft="0px";

                level_opt1.text="초급";
                level_opt2.text="중급";
                level_opt3.text="고급";

                level_in.options.add(level_opt1);
                level_in.options.add(level_opt2);
                level_in.options.add(level_opt3);
                
                /*시험명*/
                var lan_div3 = document.createElement("div"); //시험명 div
                lan_div3.style.float="left";
                lan_div3.style.width="42%";
                //lan_div1.style.marginTop="-32px";

                var lan_title3 = document.createElement("p"); //시험명 타이틀
                lan_title3.setAttribute("class", "pe_title");
                var lan_txt3 = document.createTextNode("시험명");
                lan_title3.appendChild(lan_txt3);

                var lan_name_out = document.createElement("p"); //p태그 생성
                lan_name_out.setAttribute("id", "pe_lan_name_output"+lan_count); //p태그 id 카운팅
                lan_name_out.setAttribute("class", "pe_output_text"); //p태그에 class 연결
                lan_name_out.style.display="none";
                
                var lan_name_in = document.createElement("input"); //언어 입력폼
                lan_name_in.setAttribute("id", "pe_lan_name_input"+lan_count);
                lan_name_in.setAttribute("class","pe_input");
                lan_name_in.type="text";
                lan_name_in.placeholder="토익";
                lan_name_in.autocomplete="off";
                //lan_in.style.display="none";
                lan_name_in.style.width="208px";

                /*점수*/
                var lan_div4 = document.createElement("div"); //점수 div
                lan_div4.setAttribute("class", "pe_parent");

                var lan_title4 = document.createElement("p"); //점수 타이틀
                lan_title4.setAttribute("class", "pe_title");
                var lan_txt4 = document.createTextNode("점수");
                lan_title4.appendChild(lan_txt4);

                var score_out = document.createElement("p"); //p태그 생성
                score_out.setAttribute("id", "pe_score_output"+lan_count); //p태그 id 카운팅
                score_out.setAttribute("class", "pe_output_text"); //p태그에 class 연결
                score_out.style.display="none";
                
                var score_in = document.createElement("input"); //점수 입력폼
                score_in.setAttribute("id", "pe_score_input"+lan_count);
                score_in.setAttribute("class","pe_input");
                score_in.type="text";
                score_in.placeholder="600";
                score_in.autocomplete="off";
                score_in.style.marginLeft="-2px";
                //lan_in.style.display="none";
                score_in.style.width="208px";

                /*취득일*/
                var lan_div5 = document.createElement("div"); //취득일 div

                var lan_title5 = document.createElement("p"); //취득일 타이틀
                lan_title5.setAttribute("class", "pe_title");
                var lan_txt5 = document.createTextNode("취득일");
                lan_title5.appendChild(lan_txt5);

                var date_out = document.createElement("p"); //p태그 생성
                date_out.setAttribute("id", "pe_lan_date_output"+lan_count); //p태그 id 카운팅
                date_out.setAttribute("class", "pe_output_text"); //p태그에 class 연결
                date_out.style.display="none";
                
                var date_in = document.createElement("input"); //취득일 입력폼
                date_in.setAttribute("id", "pe_lan_date_input"+lan_count);
                date_in.setAttribute("class","pe_input");
                date_in.type="date";
                //lan_in.style.display="none";
                score_in.style.width="210px";

                /*추가 버튼*/
                var lan_div6 = document.createElement("div"); //추가버튼 div
                lan_div6.style.float="right";
                lan_div6.style.marginRight="17px";
                lan_div6.style.marginTop="-42px";

                var btn_add = document.createElement("button");
                btn_add.innerHTML="+ 추가";
                btn_add.onclick=language_add;
                btn_add.setAttribute("class", "pe_button");
                btn_add.setAttribute("id", "btn_lan_add"+lan_count);
                btn_add.type="button";
                btn_add.style.backgroundColor="rgba(139, 139, 139, 0.15)";
                btn_add.style.width="69px";
                btn_add.style.height="35px";

                lan_div1.appendChild(lan_title1);
                lan_div1.appendChild(lan_out);
                lan_div1.appendChild(lan_in);

                lan_div2.appendChild(lan_title2);
                lan_div2.appendChild(level_out);
                lan_div2.appendChild(level_in);

                lan_div3.appendChild(lan_title3);
                lan_div3.appendChild(lan_name_out);
                lan_div3.appendChild(lan_name_in);

                lan_div4.appendChild(lan_title4);
                lan_div4.appendChild(score_out);
                lan_div4.appendChild(score_in);

                lan_div5.appendChild(lan_title5);
                lan_div5.appendChild(date_out);
                lan_div5.appendChild(date_in);

                lan_div6.appendChild(btn_add);
                
                addedDiv.appendChild(lan_div1);
                addedDiv.appendChild(lan_div2);
                addedDiv.appendChild(lan_div3);
                addedDiv.appendChild(lan_div4);
                addedDiv.appendChild(lan_div5);
                addedDiv.appendChild(lan_div6);
                
                //addedDiv.innerHTML = str;
                addedFormDiv.appendChild(addedDiv);
                
                var tmp = lan_count-1;

                document.getElementById("btn_lan_add"+tmp).style.display = "none";
            }

            var lic_count=0;

            function license_edit(){
                for(var i=0;i<=lic_count;i++){
                    document.getElementById("pe_license_output"+i).style.display = "none";//출력태그 숨김
                    document.getElementById("pe_license_date_output"+i).style.display = "none";//출력태그 숨김

                    document.getElementById("pe_license_input"+i).style.display = "inline";//입력폼 
                    document.getElementById("pe_license_date_input"+i).style.display = "inline";//입력폼 

                    document.getElementById("btn_license_add"+i).style.display = "block";
                }
                document.getElementById("pe_license_btns").style.display = "block";
            }

            function license_input(){
                var li_input = new Array();
                var li_date_input = new Array();

                for(var i=0;i<=lic_count;i++){
                    li_input.push(document.getElementById("pe_license_input"+i).value); //입력값 읽어와서
                    li_date_input.push(document.getElementById("pe_license_date_input"+i).value);
                    
                    document.getElementById("pe_license_output"+i).innerHTML = li_input[i] ; //출력
                    document.getElementById("pe_license_date_output"+i).innerHTML = li_date_input[i] ; //출력
                    
                    document.getElementById("pe_license_output"+i).style.display = "block";//출력태그 보임
                    document.getElementById("pe_license_date_output"+i).style.display = "block";//출력태그 보임
                   
                    document.getElementById("pe_license_input"+i).style.display = "none";//입력폼 숨김
                    document.getElementById("pe_license_date_input"+i).style.display = "none";//입력폼 숨김
                     
                    document.getElementById("btn_license_add"+i).style.display = "none";
                }
                document.getElementById("pe_license_btns").style.display = "none";
            }

            function license_add(){
                lic_count++;

                var addedFormDiv=document.getElementById("addedLicenseDiv");
                var addedDiv = document.createElement("div"); //전체 div 생성
                addedDiv.setAttribute("id", "license_Div"+lic_count); //div의 id 카운팅

                /*시험명*/
                var lic_div1 = document.createElement("div"); //시험명 div
                //lic_div1.style.marginTop="-10px";

                var lic_title1 = document.createElement("p"); //시험명 타이틀
                lic_title1.setAttribute("class", "pe_title");
                var lic_txt1 = document.createTextNode("시험명");
                lic_title1.appendChild(lic_txt1);

                var lic_out = document.createElement("p"); //p태그 생성
                lic_out.setAttribute("id", "pe_license_output"+lic_count); //p태그 id 카운팅
                lic_out.setAttribute("class", "pe_output_text"); //p태그에 class 연결
                lic_out.style.display="none";

                var lic_in = document.createElement("input"); //시험명 입력폼
                lic_in.setAttribute("id", "pe_license_input"+lic_count);
                lic_in.setAttribute("class","pe_input");
                lic_in.type="text";
                lic_in.placeholder="시험명을 입력하세요.";
                lic_in.autocomplete="off";
                //lan_in.style.display="none";
                lic_in.style.width="439px";

                /*취득일*/
                var lic_div2 = document.createElement("div"); //취득일 div
                //lic_div1.style.marginTop="-10px";

                var lic_title2 = document.createElement("p"); //취득일 타이틀
                lic_title2.setAttribute("class", "pe_title");
                var lic_txt2 = document.createTextNode("취득일");
                lic_title2.appendChild(lic_txt2);

                var lic_date_out = document.createElement("p"); //p태그 생성
                lic_date_out.setAttribute("id", "pe_license_date_output"+lic_count); //p태그 id 카운팅
                lic_date_out.setAttribute("class", "pe_output_text"); //p태그에 class 연결
                lic_date_out.style.display="none";

                var lic_date_in = document.createElement("input"); //취득일 입력폼
                lic_date_in.setAttribute("id", "pe_license_date_input"+lic_count);
                lic_date_in.setAttribute("class","pe_input");
                lic_date_in.type="date";
                //lan_in.style.display="none";
                lic_date_in.style.width="210px";

                /*추가 버튼*/
                var lic_div3 = document.createElement("div"); //추가버튼 div
                lic_div3.style.float="right";
                lic_div3.style.marginRight="17px";
                lic_div3.style.marginTop="-42px";

                var btn_add = document.createElement("button");
                btn_add.innerHTML="+ 추가";
                btn_add.onclick=license_add;
                btn_add.setAttribute("class", "pe_button");
                btn_add.setAttribute("id", "btn_license_add"+lic_count);
                btn_add.type="button";
                btn_add.style.backgroundColor="rgba(139, 139, 139, 0.15)";
                btn_add.style.width="69px";
                btn_add.style.height="35px";

                lic_div1.appendChild(lic_title1);
                lic_div1.appendChild(lic_out);
                lic_div1.appendChild(lic_in);

                lic_div1.appendChild(lic_title2);
                lic_div2.appendChild(lic_date_out);
                lic_div2.appendChild(lic_date_in);
                
                addedDiv.appendChild(lic_div1);
                addedDiv.appendChild(lic_div2);
                
                //addedDiv.innerHTML = str;
                addedFormDiv.appendChild(addedDiv);
                
                var tmp = lic_count-1;

                document.getElementById("btn_license_add"+tmp).style.display = "none";
            }

            var isShown = 0;

            function showDropMenu(){
                var dropMenu = document.getElementById("dropdownMenu");
                if(isShown==0){//메뉴가 안보이면
                    dropMenu.style.display="block";
                    isShown=1;
                }
                else{
                    dropMenu.style.display="none";
                    isShown=0;
                }
            }

        </script>
    </body>
</html>
