<?php
    session_start();
    $n_email = $_SESSION['email'];
    $conn=mysqli_connect('localhost','root','harmony2020','harmony');

    $query_id = "select * from User_Accounts where email='$n_email'";
    $data_id = mysqli_query($conn, $query_id);
    $row_id = mysqli_fetch_array($data_id);

    $query_project="SELECT * From Projects WHERE user_id='$row_id[0]'";
    $data_project=mysqli_query($conn,$query_project);
?>

<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8" />
      <link rel="stylesheet" href="../../style/writeStyle.css">
   </head>

   <body>    
       
        <button id="open">게시글 작성</button>

    <form action="write_action.php" method = "POST" name="form" enctype="multipart/form-data"> 
   
      <!--게시글 작성 첫번째 화면-->      
      <div id="write1" class="modal-wrapper" style="display: none">
         <div class="modal">
            <div>
               <p class="title">게시글 작성</p>     
            </div>
            <div>        
               <input type="image" id="close1" src="../../assets/image/close.png" class="closeButton">   
            </div>
         
            <hr class="line">
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
                                <p class="questionText" id="qEx">활동을 위해 필요한 능력은 무엇이라고 생각하나요?</p>
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

                        <div id="qDiv6">
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
               <p class="title">프로젝트 선택</p>         
            </div>

            <div>        
               <input type="image" id="close2" src="../../assets/image/close.png" class="closeButton">   
            </div>
      
            <hr class="line">
      
            <div class="projectBox" style="height: 600px; overflow: auto;">
                    <?php
                        while($row_project=mysqli_fetch_array($data_project)){?>
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
                    <p class="title">질문 리스트</p>         
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
        var q = document.getElementById("qEx");

        //프로젝트 선택 변수
        var projectSeleted1 = false;
        var projectSeleted2 = false;
        var projectSeleted3 = false;
        var projectSeleted4 = false;
        

        //madal popup 및 버튼 관련
      open.onclick = () => {
        modal1.style.display = "flex";
      };
   
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
/*
      complete.onclick = () => {
         //modal1.style.display = "none";
         modal2.style.display = "none";
      }
*/
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
      window.onload = function() {
               var picture = document.getElementById('picture');
               var uploader = document.getElementById('upImgFile');
   
               picture.onclick=function() {
                    uploader.click();
               }
            };
            
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
            var qList = [false, false, false, false, false, false];            
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
                }                
        

               if(qList[1] == true){  
                    var q2 = document.getElementById('qDiv2');
                    q2.style.display = 'block';   
                } 

                if(qList[2] == true){  
                    var q3 = document.getElementById('qDiv3');
                    q3.style.display = 'block';       
                } 

                if(qList[3] == true){  
                    var q4 = document.getElementById('qDiv4');
                    q4.style.display = 'block';      
                } 

                if(qList[4] == true){  
                    var q5 = document.getElementById('qDiv5');
                    q5.style.display = 'block';      
                } 

                if(qList[5] == true){  
                    var q6 = document.getElementById('qDiv6');
                    q6.style.display = 'block';    
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
        

      </script>
   </body>
</html>