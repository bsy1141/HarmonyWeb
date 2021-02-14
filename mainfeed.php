<mainfeed.php>
<?php
    session_start();
    $n_email = $_SESSION['email'];
    $conn=mysqli_connect('localhost','root','harmony2020','harmony');

    $query_id="SELECT * FROM User_Accounts";
    $data_id=mysqli_query($conn,$query_id);
    $row_id = mysqli_fetch_array($data_id);

    $query_post="SELECT * FROM Posts ORDER BY post_id DESC";
    $data_post=mysqli_query($conn,$query_post);
    //$row_post = mysqli_fetch_array($data_post);
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style/mainfeed.css?after">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>
    <div class="top">
        <button class="harmony" onclick="location.href='mainfeed.php'">
            <img src="../../assets/image/icon8.png" class="harmony_logo">
        </button>
        <form action="search.php" method="POST">
            <input type="text" name="search_text" class="find" placeholder="     검색">
            <button class="findbtn" type="submit">
                <img src="../../assets/image/icon10.png" class="findbtnimg">
            </button>
        </form>
        <button id="btn" class="write_post" onclick="openWrite()">게시글 작성</button>
        <button id="btn" class="mypage" onclick="location.href='myPage.php'">마이페이지</button>
        <button id="btn" class="bookmark">북마크</button>
        <button class="alarm">
            <img src="../../assets/image/icon7.png" class="alarm_photo">
        </button>
        <div id="prof_photo" class="photo1">
            <img src="../../assets/image/icon9.png" class="human">
        </div>
        <div class="prof_name">
            <?php
                $query_id="SELECT username FROM User_Accounts WHERE email='$n_email'";
                $data_id=mysqli_query($conn,$query_id);
                $row = mysqli_fetch_array($data_id);
            ?>
            <p><?php echo $row[0];?></p>
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
    <div style="margin-top:150px;margin-left:215px;">
    <?php
        while($row_post = mysqli_fetch_array($data_post)){?>
            <div class="post" style="position:relative;">
                <div style="float:left;">
                    <img src="<?php echo $row_post[3]?>" class="photo">
                    <form action="otherUser_project_archive.php" method="POST">
                        <img src="../../assets/image/icon9.png" class="human" id="prof_photo" style="margin-top:-536;margin-left:645px;">
                        <?php 
                            $query_name="SELECT username FROM User_Accounts WHERE id='$row_post[1]'";
                            $data_name=mysqli_query($conn,$query_name);
                            $row_name = mysqli_fetch_array($data_name);
                        ?>
                        <div style="margin-top:-538px;margin-left:700px;"><input type="submit" name="selected_profile" value="<?php echo $row_name[0];?>" class="name" formacation="therUser_project_archive.php"/></div>
                        <div class="posttime" style="margin-left:940px;"><?php echo $row_post[4]?></div>
                        <div class="follow" style="margin-top:-15px; margin-left:710px;">팔로잉</div>
                        <div id="line" style="margin-top:10px; margin-left:621px;"></div>
                    </form>
                    <div class="title" style="margin-top:-490px;margin-left:645px;"><?php echo "[".$row_post[8]."]"?></div>
                    <div class="cont" style="margin-top:5px;margin-left:645px;"><?php echo "[".$row_post[5]."]"?></div>
                    <div id="line" style="margin-left:621px; margin-top:4px;"></div>
                </div>
                <!--<div class="hashtag">#</div>-->
                <div style="float:left;margin-left:645px;margin-top:10px;">
                    <div class="like"><?php echo "좋아요 ".$row_post[7]."개"?></div>
                    <button id="btn_heart" class="heart" style="background: url('../../assets/image/icon4.png') no-repeat; margin-left:200px; margin-top:-17px;"></button>
                    <p class="heart_cnt" style="margin-left:225px; margin-top:-17px;"><?php echo $row_post[7]?></p>
                    <button class="message" style="margin-left:250px; margin-top:-30px;"></button>
                    <p class="message_cnt" style="margin-left:275px; margin-top:-27px;"><?php echo $row_post[6]?></p>
                    <button id="btn_bookmark" style="margin-left:300px; margin-top:-29px;" class="bm" onclick="addBookmark()"></button>
                        <p class="bm_cnt" style="margin-left:320px; margin-top:-27px;"></p>
                        <div id="line" style="margin-left:-25px;"></div>
                        <script type="text/javascript">
                            $(document).on('click','.btn_heart', function(){
                                    var post_id = $row_post[0];
                                    $(this).attr('disabled','disabled');

                                    $.ajax({
                                        url:"like.php",
                                        method:"POST",
                                        data:{post_id:post_id},
                                        success:function(data){
                                            if(data == 'done')
                                            {
                                                load_stuff();
                                            }
                                        }

                                    });
                            });
                        </script>
                </div>
                <div class="comment" style="width:388px; height:auto; max-height:260px; overflow-y: scroll; margin-left:621px;"> 
                    <div class="reply_view">
                        <?php
                            $query_reply="SELECT * FROM comments where post_id='$row_post[0]'";
                            $data_reply=mysqli_query($conn,$query_id);
                            while($row_reply = mysqli_fetch_array($data_reply)){
                            ?>
                            <div>
                                <div><?$row_reply['user_id']?></div>
                                <div><?$row_reply['comment']?></div>
                                <div><?$row_reply['date']?></div>
                            </div>
                            <?php
                            }
                        ?>
                    </div>
                </div>
                <div id="line" style="margin-left:621px;position:absolute;bottom:59px;"></div>
                <input type="hidden" name="pid" value=<?$row_post[0]?>>
                <input type="hidden" name="cid" value=0>
                <input type="hidden" name="uid" value=<?$row_id[0]?>>
                <input type="text" style="margin-left:640px;position:absolute;bottom:11px;" class="write_comment" name="wc" placeholder="  새 댓글을 입력하세요.">
                <button class="enroll" style="margin-left:940px;position:absolute;bottom:17px;" onclick="enrollComment(document.querySelector('.write_comment'), 1)" type="button">등록</button>
                
                <script type="text/javascript">     
                    $(document).on('click','.enroll', function(){
                        $.ajax({
                            url : "reply_ok.php",
                            type : "post",
                            data:{
                                pid:$(".pid").val(),
                                cid:$(".cid").val(),
                                uid:$(".uid").val(),
                                wc:$(".wc").val()
                            },
                           
                            success : function(data){
                                alert("댓글이 등록되었습니다!");
                            },
                            error : function(error) {
                                alert("Error!");
                            },
                            complete : function() {
                                alert("complete!");    
                            }

                        });
                    });
                </script>
                <!--
                <div class="comment" style="width:388px; height:auto; max-height:260px; overflow-y: scroll; margin-left:621px;">
                    <div id="addedCommentDiv"> </div>
                </div>
                <div>
                    <div id="line" style="margin-left:621px;position:absolute;bottom:59px;"></div>
                    <input type="text" style="margin-left:640px;position:absolute;bottom:11px;" class="write_comment" placeholder="  새 댓글을 입력하세요.">
                    <button class="enroll" style="margin-left:940px;position:absolute;bottom:17px;" onclick="enrollComment(document.querySelector('.write_comment'), 1)" type="button">등록</button>
                </div>
                -->
            </div>
        <?php
        }
    ?>
    </div>
    <form action="write_action.php" method = "POST" name="form" enctype="multipart/form-data"> 
    <!--게시글 작성 첫번째 화면-->      
    <div id="write1" class="modal-wrapper" style="display: none">
         <div class="modal">
            <div>
               <p class="modaltitle">게시글 작성</p>     
            </div>
            <div>        
               <input type="image" id="close1" src="../../assets/image/close.png" class="closeButton">   
            </div>
         
            <hr class="modalline">
                <!--<form action="write_action.php" methood="POST" enctype="multipart/form-data">-->
            <div style="height: 600px; overflow: auto;">
         
               <div style="float: left; margin-left: 37px;">
                  <p class="subTitle">활동 사진</p>
                        <div class="picture">
                            <label for="upImgFile"><img src="../../assets/image/directory.png" style="width:40px; height:40px; margin-top:130px;" id="picture" class="pictureButton"></label>
                            <input type="file" name="photo" id="upImgFile" accept="image/jpeg, image/png" style="display:none;" onChange="uploadImgPreview();">
                            <img id="thumbnailImg" src="" class="preview" style="display:none;">
                    </div>
         
                  <p class="subTitle" style="margin-top: 28px;">활동명</p>
            
                  <textarea name="activityName" placeholder="활동명을 입력하세요." 
                  class="editBox" style="height: 56px;"></textarea>
         
            
               </div>            
               
         
               <div style="float: left; margin-left: 37px;">
                  <p class="subTitle">내용</p>
         
                  <textarea type="text" name="activityText" placeholder="활동에 대해 간단하게 소개해보세요." 
                  class="editBox" style="height: 123px;"></textarea>
            
                  <p class="subTitle">태그</p>
                  <textarea type="text" name="activityTag" placeholder="태그를 입력하세요." 
                  class="editBox" style="height: 56px;"></textarea>
            
                  <div>
                     <p class="subTitle" style="float: left;">질문</p>
                     <div style="float: right;">
                        <input type="image" id="qAdd1" src="../../assets/image/small_plus.png" class="plusButton">
                        <input type="button" id="qAdd2" value="추가" class="addButton">
                     </div>                
                  </div>
         
                  <div class="question">
                     <img src="../../assets/image/bulb.png" class="bulb">
                     <p class="explanationText">질문을 선택해 응답을 통해<br>프로젝트에 대해 쉽게 소개할 수 있어요!</p>
                  </div>      
                  
                        <div id="qDiv1" style="display: none;">
                            <div>
                                <p class="questionText" id="q">활동을 위해 필요한 능력은 무엇이라고 생각하나요?</p>
                                <input type="image" src="../../assets/image/small_close.png" class="smallButton" onclick="removeQuestion1()">
                            </div>
                            <textarea placeholder="답변을 입력하세요."
                            class="answer"></textarea>                     
                        </div>

                        <div id="qDiv2" style="display: none;">
                            <div>
                                <p class="questionText" id="qEx">이 활동을 결정하신 이유는 무엇인가요?</p>
                                <input type="image" src="../../assets/image/small_close.png" class="smallButton" onclick="removeQuestion2()">
                            </div>
                            <textarea placeholder="답변을 입력하세요."
                            class="answer"></textarea>                     
                        </div>

                        <div id="qDiv3" style="display: none;">
                            <div>
                                <p class="questionText" id="qEx">이 활동을 통해 얻고 싶은 것은 무엇인가요?</p>
                                <input type="image" src="../../assets/image/small_close.png" class="smallButton" onclick="removeQuestion3()">
                            </div>
                            <textarea placeholder="답변을 입력하세요."
                            class="answer"></textarea>                     
                        </div>

                        <div id="qDiv4" style="display: none;">
                            <div>
                                <p class="questionText" id="qEx">이 활동의 차별점을 말해주세요.</p>
                                <input type="image" src="../../assets/image/small_close.png" class="smallButton" onclick="removeQuestion4()">
                            </div>
                            <textarea placeholder="답변을 입력하세요."
                            class="answer"></textarea>                     
                        </div>

                        <div id="qDiv5" style="display: none;">
                            <div>
                                <p class="questionText" id="qEx">자신이 맡은 역할은 무엇인가요? 그 역할이 자신의 적성에 맞을 것 같나요?</p>
                                <input type="image" src="../../assets/image/small_close.png" class="smallButton" onclick="removeQuestion5()">
                            </div>
                            <textarea placeholder="답변을 입력하세요."
                            class="answer"></textarea>                     
                        </div>

                        <div id="qDiv6" style="display: none;">
                            <div>
                                <p class="questionText" id="qEx">활동에서 기대되는 바가 있나요?</p>
                                <input type="image" src="../../assets/image/small_close.png" class="smallButton" onclick="removeQuestion6()">
                            </div>
                            <textarea placeholder="답변을 입력하세요."
                            class="answer"></textarea>                     
                        </div>
                    </div>                  
            </div>
            
            
            <div style="text-align: center; clear: left;">  
               <input type="button" id="cancel1" value="취소" class="button" style="background-color: #f7f7f7;" />
               <input type="button" id="next" value="다음" class="button" style="background-color: #d8d8d8;" />
            </div> 
         
         </div>
      </div>

      <!--게시글 작성 두번째 화면-->      
      <div id="write2" class="modal-wrapper" style="display: none; background-color: #00ff0000;">
         <div class="modal">
            <div>
               <p class="modaltitle">프로젝트 선택</p>         
            </div>

            <div>        
               <input type="image" id="close2" src="../../assets/image/close.png" class="closeButton">   
            </div>
      
            <hr class="modalline">
      
            <div class="projectBox" style="height: 600px; overflow: auto;">
                    
                    <?php

    $query_id1 = "select * from User_Accounts where email='$n_email'";
    $data_id1 = mysqli_query($conn, $query_id1);
    $row_id1 = mysqli_fetch_array($data_id1);

    $query_project1="SELECT * From Projects WHERE user_id='$row_id1[0]'";
    $data_project1=mysqli_query($conn,$query_project1);
                        
                        while($row_project=mysqli_fetch_array($data_project1)){?>
                            <div class="projectUnselect">
                                <img src="<?php echo $row_project[2]?>" class="projectUnselect_img">
                                <p class="projectTitle"><?php echo $row_project[3]?></p> 
                                <p class="projectDuration"><?php echo $row_project[5]?>.<?php echo $row_project[6]?>.<?php echo $row_project[7]?>
                                    - <?php echo $row_project[8]?>.<?php echo $row_project[9]?>.<?php echo $row_project[10]?></p>
                                <input type="radio" name="Selected_proj" class="projectSelectButton" value="<?php echo $row_project[0]?>">
                            </div>
                        <?php
                        }?>
            </div>         
            
            <div style="text-align: center;">  
               <input type="button" id="cancel2" value="취소" class="button" style="margin-top: 40px; background-color: #f7f7f7;" />
               <input type="submit" name="submit_btn" value="완료" id="complete" class="button" style="margin-top: 40px; background-color: #d8d8d8;" formaction="write_action.php"/>
            </div> 

         </div>
        </div>     

         <div id="questionList" class="modal-wrapper" style="display: none; background-color: #00ff0000;">
         <div class="modal">
                <div>
                    <p class="modaltitle">질문 리스트</p>         
                </div>
                <div>        
                    <input type="image" src="../../assets/image/close.png" class="closeButton">   
                </div>
        
                <hr class="line">
        
                <div style="height: 600px; overflow: auto;">
                    <div style="text-align: center;">
                        <p class="qNumText">선택한 질문 수: </p>
                        <p class="qNum" id="qNum"> </p>
                    </div>
        
                    <div>
                        <p class="questionTitleBold">활동 시작 전</p>
                        <p class="questionTitle"> 추천 질문</p>
                        <hr class="qLine">
                        <div class="check" >           
                            <input type="checkbox" id="q1" name="question[]" onClick="checkEvent(this)">
                            <label for="q1">
                                <span>활동을 위해 필요한 능력은 무엇이라고 생각하나요?</span>
                            </label>    
                        </div>  
                        <div class="check" >           
                            <input type="checkbox" id="q2" name="question[]" onClick="checkEvent(this)">
                            <label for="q2">
                                <span>이 활동을 결정하신 이유는 무엇인가요?</span>
                            </label>    
                        </div> 
                        <div class="check" >           
                            <input type="checkbox" id="q3" name="question[]" onClick="checkEvent(this)">
                            <label for="q3">
                                <span>이 활동을 통해 얻고 싶은 것은 무엇인가요?</span>
                            </label>    
                        </div> 
                        <div class="check" >           
                            <input type="checkbox" id="q4" name="question[]" onClick="checkEvent(this)">
                            <label for="q4">
                                <span>이 활동의 차별점을 말해주세요.</span>
                            </label>    
                        </div> 
                        <div class="check" >           
                            <input type="checkbox" id="q5" name="question[]" onClick="checkEvent(this)"> 
                            <label for="q5">
                                <span>자신이 맡은 역할이 무엇인가요? 그 역할이 자신의 적성에 맞을 것 같나요?</span>
                            </label>    
                        </div> 
                        <div class="check" >           
                            <input type="checkbox" id="q6" name="question[]" onClick="checkEvent(this)">
                            <label for="q6">
                                <span>활동에서 기대되는 바가 있나요?</span>
                            </label>    
                        </div> 
                    </div>
                 
                </div>         
                
                <div style="text-align: center;">  
                    <input type="button" id="qCancel" value="취소" class="button" style="background-color: #f7f7f7;" />
                    <input type="button" id="qNext" value="다음" class="button" style="background-color: #d8d8d8;" />
                </div>
            </div>
        </div> 
    </form>

    <script>
      //열기, 닫기, 다음 버튼 변수
      var open = document.getElementById("open");
      var close1 = document.getElementById("close1");
      var close2 = document.getElementById("close2");
      var next = document.getElementById("next");
      var cancel1 = document.getElementById("cancel1");
      var cancel2 = document.getElementById("cancel2");
      var complete = document.getElementById("complete");        
        var qAdd1 = document.getElementById("qAdd1");
        var qAdd2 = document.getElementById("qAdd2");
        var qCancel = document.getElementById("qCancel");
        var qNext = document.getElementById("qNext");

        //모달 변수
      var modal1 = document.getElementById("write1");
      var modal2 = document.getElementById("write2");
        var modal3 = document.getElementById("questionList");
        
        //질문 페이지 관련 변수
        var qNum = 0;     
        var qNumText = document.getElementById("qNum");       
        var qList = [false, false, false, false, false, false];  

        //프로젝트 선택 변수
        var projectSeleted1 = false;
        var projectSeleted2 = false;
        var projectSeleted3 = false;
        var projectSeleted4 = false;
        

        //madal popup 및 버튼 관련
   
      close1.onclick = () => {
        modal1.style.display = "none";
      };

      close2.onclick = () => {
        modal1.style.display = "none";
        modal2.style.display = "none";
      };
      
      next.onclick = () => {
        modal2.style.display = "flex";
      };

      cancel1.onclick = () => {
        modal1.style.display = "none";
      };

      cancel2.onclick = () => {
        modal2.style.display = "none";
      };

      complete.onclick = () => {
      }

        qAdd1.onclick = () => {
        modal3.style.display = "flex";
          qListSetting()
      };

        qAdd2.onclick = () => {
        modal3.style.display = "flex";
          qListSetting()
      };

        qCancel.onclick = () => {
        modal3.style.display = "none";
      };

        qNext.onclick = () => {            
          questionUpdate();
      };

        //이미지 버튼이 이미지 업로드 할 수 있도록 설정
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

        function qListSetting(){
            //qNum만큼 선택한 질문 수 변경하기
            qNumText.innerText = qNum;
            //체크되어 있는 질문에 체크박스 표시하기
        }

        function checkEvent(box){
            if(box.checked == true){
                qNum += 1;
                qNumText.innerText = qNum;
            }

            else{
                qNum -= 1;
                qNumText.innerText = qNum;
            }
        }

        function questionUpdate(){
            //체크한 질문 표시하기          
            var div = document.createElement('div');
            var arrQuestion = document.getElementsByName('question[]');
            for(var i=0; i<arrQuestion.length; i++){
                if(arrQuestion[i].checked == true){
                    qList[i] = true;
                }
            }

            for(var i=0; i<qList.length; i++){
                if(qList[0] == true){  
                    var q1 = document.getElementById('qDiv1');
                    q1.style.display = 'block';     
                    qList[0].checked == false;
                }                
        

               if(qList[1] == true){  
                    var q2 = document.getElementById('qDiv2');
                    q2.style.display = 'block';   
                    qList[1].checked == false;
                } 

                if(qList[2] == true){  
                    var q3 = document.getElementById('qDiv3');
                    q3.style.display = 'block'; 
                    qList[2].checked == false;     
                } 

                if(qList[3] == true){  
                    var q4 = document.getElementById('qDiv4');
                    q4.style.display = 'block';   
                    qList[3].checked == false; 
                } 

                if(qList[4] == true){  
                    var q5 = document.getElementById('qDiv5');
                    q5.style.display = 'block';    
                    qList[4].checked == false; 
                } 

                if(qList[5] == true){  
                    var q6 = document.getElementById('qDiv6');
                    q6.style.display = 'block'; 
                    qList[5].checked == false;   
                } 
            }
                    
          modal3.style.display = "none";
        }

        function removeQuestion1(obj){
            var q1 = document.getElementById('qDiv1');
            q1.style.display = 'none'; 
        }    
        
        function removeQuestion2(obj){
            var q2 = document.getElementById('qDiv2');
            q1.style.display = 'none'; 
        } 

        function removeQuestion3(obj){
            var q3 = document.getElementById('qDiv3');
            q1.style.display = 'none'; 
        } 

        function removeQuestion4(obj){
            var q4 = document.getElementById('qDiv4');
            q1.style.display = 'none'; 
        } 

        function removeQuestion5(obj){
            var q5= document.getElementById('qDiv5');
            q1.style.display = 'none'; 
        } 

        function removeQuestion6(obj){
            var q6 = document.getElementById('qDiv6');
            q1.style.display = 'none'; 
        } 
        

            function openWrite() {
                modal1.style.display = "flex";
            };
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
            
            var heart_count = 0; //임시, 나중에 DB에서 받아와야됨
            var heart_flag = 0; //좋아요 클릭한 글인지 확인. 얘도 DB. 0이면 클릭X
            document.querySelector(".heart_cnt").innerHTML=0; //임시
            document.querySelector(".message_cnt").innerHTML=0; //임시
            document.querySelector(".bm_cnt").innerHTML=0; //임시

            function clickHeart(){
                if(heart_flag == 0){ //좋아요
                    heart_flag=1;
                    heart_count++;
                    document.querySelector(".like").innerHTML="좋아요 "+heart_count+"개";
                    document.querySelector(".heart_cnt").innerHTML=heart_count;
                }
                else if(heart_flag == 1){ //좋아요 취소
                    heart_flag = 0;
                    heart_count--;
                    document.querySelector(".like").innerHTML="좋아요 "+heart_count+"개";
                    document.querySelector(".heart_cnt").innerHTML=heart_count;
                }
            }

            function addBookmark(){

            }

            //타임스탬프 만들기
            function generateTime(value){
                const today = new Date();

                const timeValue = new Date(value);

                const betweenTime = Math.floor((today.getTime() - timeValue.getTime()) / 1000 / 60);
                if (betweenTime < 1) return '방금전';
                if (betweenTime < 60) {
                    return `${betweenTime}분전`;
                }

                const betweenTimeHour = Math.floor(betweenTime / 60);
                if (betweenTimeHour < 24) {
                    return `${betweenTimeHour}시간전`;
                }

                const betweenTimeDay = Math.floor(betweenTime / 60 / 24);
                if (betweenTimeDay < 365) {
                    return `${betweenTimeDay}일전`;
                }

                return `${Math.floor(betweenTimeDay / 365)}년전`;
    
            }
            

            var commentLikeCnt = 0;
            var commentLikeFlag = 0;

            var commentCnt = 0;

            function enrollComment(input, whichComment){
                var imgDiv = document.createElement("div");
                var txtDiv = document.createElement("div");

                var userImg = document.createElement("img");
                var userName = document.createElement("p");
                var btn_like = document.createElement("button");
                var date = document.createElement("p");
                var inputValue = document.createElement("p");
                var commentLike = document.createElement("p");
                var btn_reComment = document.createElement("button");
                //var addedCommentDiv = document.getElementById("addedCommentDiv");
                
                var addedReCommentDiv = document.createElement("div");

                //유저네임과 이미지 가져오기
                userImg.setAttribute("src", "../../assets/image/icon9.png"); //임시
                userImg.style.width="37px";
                userImg.style.height="37px";
                userImg.style.borderRadius="50%";
                userName.innerHTML = "방서영"; //임시
                
                userName.setAttribute("class", "comment_name");

                //타임스탬프 찍기
                var enroll_date = new Date();
                date.innerHTML = generateTime(enroll_date);
                date.setAttribute("class", "comment_info");
               
                //댓글 좋아요버튼
                btn_like.innerHTML = "<img src='../../assets/image/icon4.png'>";

                //입력값 출력
                inputValue.innerHTML = input.value;

                //좋아요 수
                commentLike.innerHTML = "좋아요 0";
                commentLike.setAttribute("class", "comment_info");
                commentLike.style.float="left";

                //답글 달기 버튼
                btn_reComment.innerHTML = "답글 달기";
                btn_reComment.setAttribute("class", "reCommentBtn");
                
                imgDiv.appendChild(userImg);
                txtDiv.appendChild(userName);
                txtDiv.appendChild(date);
                txtDiv.appendChild(btn_like);
                txtDiv.appendChild(inputValue);
                txtDiv.appendChild(commentLike);
                txtDiv.appendChild(btn_reComment);

                userName.style.float="left";
                date.style.float="left";
                date.style.marginTop="14.2px";
                date.style.marginLeft="-9px";
                btn_like.style.border="none";
                btn_like.style.backgroundColor="#ffffff";
                btn_like.style.marginTop="13px";
                
                if(whichComment==1){
                    btn_like.style.marginLeft="150px";

                    imgDiv.style.float="left";
                    imgDiv.style.paddingLeft="26px";
                    imgDiv.style.marginTop="26px";
                    
                    txtDiv.style.float="left";
                    txtDiv.style.marginLeft="21px";
                    txtDiv.style.width="270px";
                    
                    txtDiv.style.marginTop="10px";
                   // txtDiv.style.border="solid";
                }
                    
                else if(whichComment==2){
                    btn_like.style.marginLeft="130px";

                    imgDiv.style.float="left";
                    imgDiv.style.paddingLeft="46px";
                    imgDiv.style.marginTop="26px";
                    
                    txtDiv.style.float="left";
                    txtDiv.style.marginLeft="21px";
                    txtDiv.style.width="270px";
                    
                    txtDiv.style.marginTop="10px";
                    //txtDiv.style.border="solid";

                    btn_reComment.style.display="none";
                }

                //addedCommentDiv.appendChild(imgDiv);
                //addedCommentDiv.appendChild(txtDiv);

                commentCnt++;
                document.querySelector(".message_cnt").innerHTML=commentCnt;
                
                //댓글 좋아요
                btn_like.addEventListener('click', function(event){
                    if(commentLikeFlag == 0){ //좋아요
                        commentLikeFlag=1;
                        commentLike.innerHTML = "좋아요 " + (++commentLikeCnt);
                    }
                    else if(commentLikeFlag == 1){ //좋아요 취소
                        commentLikeFlag = 0;
                        commentLike.innerHTML = "좋아요 " + (--commentLikeCnt);
                    }
                });

                var reCommentInput = document.createElement("input");
                var btn_reEnroll = document.createElement("button");

                reCommentInput.type="text";
                reCommentInput.setAttribute("class", "re_write_comment");
                reCommentInput.placeholder="  답글을 입력하세요.";

                btn_reEnroll.type="button";
                btn_reEnroll.innerText="등록";
                btn_reEnroll.setAttribute("class", "re_enroll");

                addedReCommentDiv.appendChild(reCommentInput);
                addedReCommentDiv.appendChild(btn_reEnroll);

               // addedCommentDiv.appendChild(addedReCommentDiv);


                //댓글에 답글 달기
                btn_reComment.addEventListener('click', function(event){
                    reCommentInput.style.display="inline";
                    btn_reEnroll.style.display="inline";
                });

                //답글 등록하기
                btn_reEnroll.addEventListener('click', function(event){
                    reCommentInput.style.display="none";
                    btn_reEnroll.style.display="none";
                    enrollComment(document.querySelector('.re_write_comment'), 2);
                });
            }
        </script>
    </div>
</body>