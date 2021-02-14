<?php      
    session_start();
    $n_email=$_SESSION['email'];

    $conn = mysqli_connect('localhost','root','harmony2020','harmony');
    
    $query_id = "select * from User_Accounts where email='$n_email'";
    $data_id = mysqli_query($conn, $query_id);
    $row_id = mysqli_fetch_array($data_id);

    $proj_query_id="SELECT * FROM Projects;";
    $proj_data_id=mysqli_query($conn,$proj_query_id);
    $proj_id=mysqli_num_rows($proj_data_id)+1;

    $title = $_POST[activityName];
    $overview = $_POST[activityText];
    $start_year =$_POST[start_year];
    $start_month = $_POST[start_month];
    $start_day = $_POST[start_day];
    $end_year = $_POST[end_year];
    $end_month = $_POST[end_month];
    $end_day = $_POST[end_day];

   if (isset($_POST['submit_btn']) && isset($_FILES['photo'])) {
       $img_name = $_FILES['photo']['name'];
       $img_type = $_FILES['photo']['type'];
       $img_size = $_FILES['photo']['size'];
       $tmp_name = $_FILES['photo']['tmp_name'];
       $error = $_FILES['photo']['error'];

       $target='uploads/';
       $target = $target . basename($img_name);

       
       echo $img_name;
       echo "<br />";
       echo $target;
       echo "<br />";
       echo $img_type;
       echo "<br />";
       echo $img_size;
       echo "<br />";
       echo $tmp_name;
       echo "<br />";
       echo $error;

       if(move_uploaded_file($tmp_name, $target)){
           echo "성공";
           
           $query = "INSERT INTO Projects (project_id, user_id, photo, title, overview, start_year, start_month, start_day, end_year, end_month, end_day) 
               VALUES('$proj_id', '$row_id[0]', '$target', '$title', '$overview', '$start_year', '$start_month', '$start_day', '$end_year', '$end_month', '$end_day')";
           
               $result = mysqli_query($conn, $query);
               if($result){
                ?>      <script>
                            alert("<?php echo "새로운 프로젝트가 등록되었습니다."?>");  
                            location.replace("myPage.php");
                        </script>
                <?php
                } else{       
                    echo "FAIL!!";
                }
                
                mysqli_close($conn);
           
        }
       else{
           echo "실패";
       }
   }

        /*
       if ($error === 0){
           
           if($img_size > 125000) {
               $em = "사진의 용량이 너무 큽니다.";
               header("Location: add_project.php?error=$em");
           } else { }
           $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
           $img_ex_lc = strtolower($img_ex);

           $allowed_exs = array("jpg", "jpeg", "png");

           if(in_array($img_ex_lc, $allowed_exs)) {
               $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
               $img_upload_path = 'uploads/'.$new_img_name;
               move_uploaded_file($tmp_name, $img_upload_path);

               $imageblob = addslashes(fread(fopen($img_name, "r"), filesize($img_name)));
            
               $title = $_POST[activityName];
               $overview = $_POST[activityText];
               $start_year =$_POST[start_year];
               $start_month = $_POST[start_month];
               $start_day = $_POST[start_day];
               $end_year = $_POST[end_year];
               $end_month = $_POST[end_month];
               $end_day = $_POST[end_day];

               echo $imageblob;

               $query = "INSERT INTO Projects (project_id, user_id, photo, title, overview, start_year, start_month, start_day, end_year, end_month, end_day) 
               VALUES('$proj_id', '$row_id[0]', '$imageblob', '$title', '$overview', '$start_year', '$start_month', '$start_day', '$end_year', '$end_month', '$end_day')";
           
               $result = mysqli_query($conn, $query);
               if($result){
                ?>      <script>
                            alert("<?php echo "새로운 프로젝트가 등록되었습니다."?>");  
                            location.replace("myPage.php");
                        </script>
                <?php
                    } else{       
                        echo "FAIL!!";
                    }
                
                    mysqli_close($conn);
           
           } else {
               $em = "이미지 형식의 파일만 업로드할 수 있습니다.";
               header("Location: add_project.php?error=$em");
           }

       } else {
           $em = "unknown error occurred!";
           header("Location: add_project.php?error=$em");
       }
   } else {
       header("Location: add_project.php");
   } 
*/

    //사진 업로드 구현 아직 못함
    //user id 가져오기 해야함
?>
