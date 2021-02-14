<?php
    session_start();
    $n_email = $_SESSION['email'];
    $conn=mysqli_connect('localhost','root','harmony2020','harmony');
?>

<html>
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="../../style/projectStyle.css">
    </head>

    <body>
        <button id="open">프로젝트 추가</button>

        <?php if (isset($_GET[error])): ?>
            <p><?php echo $_GET[error]; ?></p>
        <?php endif ?>
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

    </body>

    <script>
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

</html>