<?php
    session_start();
    $n_email = $_SESSION['email'];
    $conn=mysqli_connect('localhost','root','harmony2020','harmony');

    $query_id="SELECT * FROM User_Accounts WHERE email='$n_email'";
    $data_id=mysqli_query($conn,$query_id);
    $row = mysqli_fetch_array($data_id);
    $n_id=$row[0];

    $query_id2="SELECT * FROM My_Page WHERE id='$n_id'";
    $data_id2=mysqli_query($conn,$query_id2);
    $row2 = mysqli_fetch_array($data_id2);

    $query_intro_long = "select * from Long_Intro WHERE id='$row[0]'";
    $data_intro_long=mysqli_query($conn,$query_intro_long);
    $row_intro_long = mysqli_fetch_array($data_intro_long);

    $query_edu = "select * from Education WHERE userid='$row[0]'";
    $data_edu=mysqli_query($conn,$query_edu);
    $row_edu = mysqli_fetch_array($data_edu);

    $query_job = "select * from Desired_Job WHERE userid='$row[0]'";
    $data_job=mysqli_query($conn,$query_job);
    $row_job = mysqli_fetch_array($data_job);

    $query_lan = "select * from Language_Skills WHERE userid='$row[0]'";
    $data_lan=mysqli_query($conn,$query_lan);
    $row_lan = mysqli_fetch_array($data_lan);

    $query_lic = "select * from License WHERE userid='$row[0]'";
    $data_lic=mysqli_query($conn,$query_lic);
    $row_lic = mysqli_fetch_array($data_lic);

    $query_proj = "select * from Projects WHERE user_id='$row[0]'";
    $data_proj=mysqli_query($conn,$query_proj);
    $row_proj = mysqli_fetch_array($data_proj);
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../../style/page.css">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
</head>
<body>
    <div class="top">
        <button class="harmony" onclick="location.href='mainfeed.php'">
            <img src="../../assets/image/icon8.png" class="harmony_logo">
        </button>
        <form action="search.php">
            <input type="text" name="search_text" class="find" placeholder="     검색">
            <button class="findbtn" type="submit">
                <img src="../../assets/image/icon10.png" class="findbtnimg">
            </button>
        </form>
        <button id="btn" class="write_post" onclick="location.href='write.php'" >게시글 작성</button>
        <button id="btn" class="mypage" onclick="location.href='myPage.php'">마이페이지</button>
        <button id="btn" class="bookmark">북마크</button>
        <button class="alarm">
            <img src="../../assets/image/icon7.png" class="alarm_photo">
        </button>
        <div id="prof_photo" class="photo1">
            <img src="../../assets/image/icon9.png" class="human">
        </div>
        <div class="prof_name">
            <p><?php echo $row[1];?></p>
            <button onclick="showDropMenu()" style="border: none; outline: none; background-color: transparent; position:absolute; top:12px; left:40px">
                <img src="../../assets/image/dropdown_tr.png" style="width: 6px; height: 4px;">
            </button>
            <div>
                <ul id="dropdownMenu">
                    <li><a href="#">프로젝트 보관함</a></li>
                    <hr style="width:148px;margin-left:-40px;">
                    <li><a href="editInfo.php">정보 변경</a></li>
                    <hr style="width:148px;margin-left:-40px;">
                    <li><a href="logout.php">로그아웃</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="profile">
        <div class="background"></div>
        
        <form name="introForm" action="slogan_edit_action.php">
            <div class="photo" id="div_photo" style="display:block;">
                <img src="../../assets/image/profile_img.png" class="human">
                <!--<input type="file" name="photo_n" id="upImgFile" accept="image/jpeg, image/png" style="display:none;">-->
            </div>
            <label><img src="../../assets/image/directory.png" style="width:40px; height:40px; position:absolute; top:290px; left:750px; z-index:1; display:none;" id="p_btn" class="pictureButton"></label>
            <img id="thumbnailProfile" src="" style="display:none;">
            <div class="name"><?php echo $row[1];?></div>
            <div class="follow">
                <button onclick="slogan_edit()" type="button" style="border:none; outline:0; background-color:transparent">
                    <img src="../../assets/image/edit_pen.PNG" style="width:13px; height:17px;">
                </button>
            </div>
            <input type="text" name="short_intro" id="short_intro_input" style="width:253px; height:22px; position:absolute; top:380px; left:594px; visibility:hidden;" value="<?=$row2[1]?>" placeholder="한 줄 프로필을 입력하세요." autocomplete="off"></input>
            <button id="btn_slogan_reset" class="pe_button_small" type="reset" style="display:none; position:absolute; top:385px; left:865px; background-color: rgba(216, 216, 216, 0.26); outline-color: rgba(216, 216, 216, 0.26);">취소</button>
            <button id="btn_slogan_submit" class="pe_button_small" onclick="slogan_input()" type="submit" style="display:none; position:absolute; top:385px; left:920px; background-color: #d8d8d8; outline-color: #d8d8d8;">저장</button>
        </form>
        <div id="pe_slogan_output"><p class="introduction"><?php echo $row2[1];?></p></div>
        <div class="line1"></div>
    </div>
    
    
    <div class="project">
        <div class="title_proj">프로젝트</div>
        <div><button id="open" class="add_proj">추가</div>
        <div class="photo_proj"><img src="<?php echo $row_proj[2]?>" style="width:517px;height:517px;border-radius: 12px;"></div>
    </div>

    <div class="ability">
        <div class="introduction_detail">
            <div class="title_id">소개</div>
            <div><button type="button" class="edit_detail_prof" onclick="location.href='profile_edit.php'">수정</div>
            <div class="content_id"><pre class="long_intro"><?php echo $row_intro_long[1]?><pre></div>
            <div id="line" class="line2"></div>
    </div>

    <div class="education">
            <div class="title_edu" style="margin-top:20px;">학력</div>
            <div class="photo_edu" style="margin-top:20px;">
                <img class="_photo" src="../../assets/image/icon8.png">
            </div>
            <div class="name_edu" style="margin-top:20px;"><?php echo $row_edu[2] ?></div>
            <div class="content_edu" style="margin-top:20px;"><?php echo $row_edu[3]."(".$row_edu[4].")" ?></div>
            <div class="period_edu" style="margin-top:20px;"><?php echo $row_edu[5]."년 ~ ".$row_edu[6]."년" ?></div>
            <div id="line" class="line3" style="margin-top:20px;"></div>
        </div>
        
        <div class="desired_job">
            <div class="title_dj">희망직무</div>
            <div id="dj" class="first_dj">1지망</div>
            <div id="job" class="first_job"><?php echo $row_job[0].' ('.$row_job[1].')' ?></div>
            <div id="dj" class="second_dj">2지망</div>
            <div id="job" class="second_job"><?php echo $row_job[2].' ('.$row_job[3].')' ?></div>
            <div id="dj" class="third_dj">3지망</div>
            <div id="job" class="third_job"><?php echo $row_job[4].' ('.$row_job[5].')' ?></div>
        </div>
    </div>

    <div class="alarm_page" style="display:none"></div>

    <form method = "post" name="form" enctype="multipart/form-data">

        <div id="addProject" class="modal-wrapper" style="display: none">
         <div class="modal">

                <div>
                    <p class="title">프로젝트 추가</p>
                </div>
                <div>
                    <input type="image" id="close" src="../../assets/image/close.png" class="closeButton">
                </div>

                <hr class="line">

                <div style="float: left; margin-left: 37px;">
                    <p class="subTitle">메인 이미지</p>

                    <div class="picture">
                        <label for="upImgFile"><img src="../../assets/image/directory.png" style="width:40px; height:40px; margin-top:130px;" id="picture" class="pictureButton"></label>
                        <input type="file" name="photo" id="upImgFile" accept="image/jpeg, image/png" style="display:none;" onChange="uploadImgPreview();">
                        <img id="thumbnailImg" src="" class="preview" style="display:none;">
                    </div>

                    <p class="subTitle" style="margin-top: 28px;">제목</p>

                    <textarea name="activityName" placeholder="프로젝트명을 입력하세요."
                    class="editBox" style="height: 56px;"></textarea>

                </div>


                <div style="float: left; margin-left: 37px;">
                    <p class="subTitle">개요</p>

                    <textarea type="text" name="activityText" placeholder="프로젝트에 대해 간단하게 소개해보세요."
                    class="editBox" style="height: 123px;"></textarea>

                    <p class="subTitle">태그</p>
                    <textarea type="text" name="activityTag" placeholder="태그를 입력하세요."
                    class="editBox" style="height: 56px;"></textarea>

                    <div>
                        <p class="subTitle">시작</p>
                        <div>
                            <div class="selectbox" style="width: 130px; float: left; margin-bottom: 17px;">
                                <label for="select_year">YYYY</label>
                                <select name="start_year" id="select_year">
                                    <option selected value="none">YYYY</option>
                                    <option value=2020>2020</option>
                                    <option value=2019>2019</option>
                                    <option value=2018>2018</option>
                                    <option value=2017>2017</option>
                                    <option value=2016>2016</option>
                                    <option value=2016>2015</option>
                                    <option value=2016>2014</option>
                                    <option value=2016>2013</option>
                                    <option value=2016>2012</option>
                                    <option value=2016>2011</option>
                                    <option value=2016>2010</option>
                                </select>
                            </div>
                            <div class="selectbox" style="margin-left: 17px; width: 68px; float: left;">
                                <label for="select_month">MM</label>
                                <select name="start_month" id="select_month">
                                    <option selected value="none">MM</option>
                                    <option value=1>01</option>
                                    <option value=2>02</option>
                                    <option value=3>03</option>
                                    <option value=4>04</option>
                                    <option value=5>05</option>
                                    <option value=6>06</option>
                                    <option value=7>07</option>
                                    <option value=8>08</option>
                                    <option value=9>09</option>
                                    <option value=10>10</option>
                                    <option value=11>11</option>
                                    <option value=12>12</option>
                                </select>
                            </div>

                            <div class="selectbox" style="margin-left: 17px; width: 68px; float: left;">
                                <label for="select_day">DD</label>
                                <select name="start_day" id="select_day">
                                    <option selected value="none">DD</option>
                                    <option value=1>01</option>
                                    <option value=2>02</option>
                                    <option value=3>03</option>
                                    <option value=4>04</option>
                                    <option value=5>05</option>
                                    <option value=6>06</option>
                                    <option value=7>07</option>
                                    <option value=8>08</option>
                                    <option value=9>09</option>
                                    <option value=10>10</option>
                                    <option value=11>11</option>
                                    <option value=12>12</option>
                                    <option value=13>13</option>
                                    <option value=14>14</option>
                                    <option value=15>15</option>
                                    <option value=16>16</option>
                                    <option value=17>17</option>
                                    <option value=18>18</option>
                                    <option value=19>19</option>
                                    <option value=20>20</option>
                                    <option value=21>21</option>
                                    <option value=22>22</option>
                                    <option value=23>23</option>
                                    <option value=24>24</option>
                                    <option value=25>25</option>
                                    <option value=26>26</option>
                                    <option value=27>27</option>
                                    <option value=28>28</option>
                                    <option value=29>29</option>
                                    <option value=30>30</option>
                                    <option value=31>31</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div>
                        <p class="subTitle" style="clear: both; ">종료</p>
                        <div>
                            <div class="selectbox" style="width: 130px; float: left;">
                                <label for="select_year">YYYY</label>
                                <select name="end_year" id="select_year">
                                    <option selected value="none">YYYY</option>
                                    <option value=2020>2020</option>
                                    <option value=2019>2019</option>
                                    <option value=2018>2018</option>
                                    <option value=2017>2017</option>
                                    <option value=2016>2016</option>
                                    <option value=2016>2015</option>
                                    <option value=2016>2014</option>
                                    <option value=2016>2013</option>
                                    <option value=2016>2012</option>
                                    <option value=2016>2011</option>
                                    <option value=2016>2010</option>
                                </select>
                            </div>
                            <div class="selectbox" style="margin-left: 17px; width: 68px; float: left;">
                                <label for="select_month">MM</label>
                                <select name="end_month" id="select_month">
                                    <option selected value="none">MM</option>
                                    <option value=1>1</option>
                                    <option value=2>02</option>
                                    <option value=3>03</option>
                                    <option value=4>04</option>
                                    <option value=5>05</option>
                                    <option value=6>06</option>
                                    <option value=7>07</option>
                                    <option value=8>08</option>
                                    <option value=9>09</option>
                                    <option value=10>10</option>
                                    <option value=11>11</option>
                                    <option value=12>12</option>
                                </select>
                            </div>

                            <div class="selectbox" style="margin-left: 17px; width: 68px; float: left;">
                                <label for="select_day">DD</label>
                                <select name="end_day" id="select_day">
                                    <option selected value="none">DD</option>
                                    <option value=1>01</option>
                                    <option value=2>02</option>
                                    <option value=3>03</option>
                                    <option value=4>04</option>
                                    <option value=5>05</option>
                                    <option value=6>06</option>
                                    <option value=7>07</option>
                                    <option value=8>08</option>
                                    <option value=9>09</option>
                                    <option value=10>10</option>
                                    <option value=11>11</option>
                                    <option value=12>12</option>
                                    <option value=13>13</option>
                                    <option value=14>14</option>
                                    <option value=15>15</option>
                                    <option value=16>16</option>
                                    <option value=17>17</option>
                                    <option value=18>18</option>
                                    <option value=19>19</option>
                                    <option value=20>20</option>
                                    <option value=21>21</option>
                                    <option value=22>22</option>
                                    <option value=23>23</option>
                                    <option value=24>24</option>
                                    <option value=25>25</option>
                                    <option value=26>26</option>
                                    <option value=27>27</option>
                                    <option value=28>28</option>
                                    <option value=29>29</option>
                                    <option value=30>30</option>
                                    <option value=31>31</option>
                                </select>
                            </div>
                        </div>
                    </div>


                </div>

                <div style="text-align: center; clear: left;">
                    <input type="button" id="cancel" value="취소" class="button" style="background-color: #f7f7f7;" />
                    <input type="submit" name="submit_btn" id="complete" value="저장" class="button" style="background-color: #d8d8d8;" formaction="add_project_action.php"/>

                </div>
            </div>
        </div>
        </form>

    <script>

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


        $(function(){
            $(".alarm").click(function(e){
                e.stopPropagation();
                $(".alarm_page").show();
            });

            $(document).click(function() {
                $(".alarm_page").hide();
            }) 
        });

        var flag = 0;

        function slogan_edit(){
                document.getElementById("pe_slogan_output").style.visibility = "hidden";//출력태그 숨김
                document.getElementById("short_intro_input").style.visibility = "visible";//입력폼 나타냄
                document.getElementById("btn_slogan_reset").style.display = "block";//버튼 나타냄
                document.getElementById("btn_slogan_submit").style.display = "block";
                document.getElementById("p_btn").style.display = "block";//사진 업로드 버튼 나타냄

            }

        function slogan_input(){
            var input = document.getElementById("short_intro_input").value; //입력값 읽어와서
            document.getElementById("pe_slogan_output").innerHTML = input; //출력
            document.getElementById("pe_slogan_output").style.visibility = "visible";//출력태그 보임
            document.getElementById("short_intro_input").style.visibility = "hidden";//입력폼 숨김
            document.getElementById("btn_slogan_reset").style.display = "none";//입력폼 숨김
            document.getElementById("btn_slogan_submit").style.display = "none";//입력폼 숨김
            document.getElementById("p_btn").style.display = "none";//사진 업로드 버튼 숨김
               
        }

        function editProfile(){
            document.getElementById("short_introid").style.display="none";
            document.getElementById("edit_profDiv").style.display="block";
            flag=1;
        }

        function saveProfile(){
            document.getElementById("edit_profDiv").style.display="none";
            flag=0;
            document.getElementById("short_introid").style.display="block";
            var input = document.getElementById("short_intro_input").value;
            document.getElementById("short_introid").innerHTML = input;
        }

        //열기, 닫기, 다음 버튼 변수
      var open = document.getElementById("open");
      var close1 = document.getElementById("close");
      var cancel1 = document.getElementById("cancel");
      var complete = document.getElementById("complete");

        //모달 변수
      var modal1 = document.getElementById("addProject");

        //질문 페이지 관련 변수

        //madal popup 및 버튼 관련
      open.onclick = () => {
        modal1.style.display = "flex";
      };

      close1.onclick = () => {
        modal1.style.display = "none";
      };

      cancel1.onclick = () => {
        modal1.style.display = "none";
      };

      complete.onclick = () => {
         modal1.style.display = "none";
      }

        function uploadImgPreview() {// breif 업로드 파일 읽기
            let fileInfo = document.getElementById("upImgFile").files[0];
            let reader = new FileReader();

            // @details readAsDataURL( )을 통해 파일을 읽어 들일때 onload가 실행
            reader.onload = function() {
                // @details 파일의 URL을 Base64 형태로 가져온다.
                document.getElementById("thumbnailImg").src = reader.result;
                document.getElementById("thumbnailUrl").innerText = reader.result;
            };

             if( fileInfo ) {    // @details readAsDataURL( )을 통해 파일의 URL을 읽어온다.
               reader.readAsDataURL( fileInfo );
              }
            document.getElementById("picture").style.display="none";
            document.getElementById("thumbnailImg").style.display="block";
        }

        $(document).ready(function() { 
            var selectTarget = $('.selectbox select'); 
            
            selectTarget.change(function(){ 
                var select_name = $(this).children('option:selected').text(); 
                $(this).siblings('label').text(select_name); 
            }); 
        });
    </script>
</body>

</body>
