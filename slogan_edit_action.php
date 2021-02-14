<?php

session_start();
$n_email = $_SESSION['email'];
$introduce_short = $_GET['short_intro'];


    if ($error === 0){
        if($img_size > 125000) {
            $em = "사진의 용량이 너무 큽니다.";
            header("Location: myPage.php?error=$em");
        } else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png");

            if(in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                $img_upload_path = 'uploads/'.$new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);
                
                $conn = mysqli_connect('localhost','root','harmony2020','harmony');

                $query_id = "select * from User_Accounts where email='$n_email'";
                $data_id = mysqli_query($conn, $query_id);
                $row_id = mysqli_fetch_array($data_id);

                $query_udt = "INSERT INTO My_Page (id, introduce_short, profile_photo) VALUES ('$row_id[0]', '$introduce_short', '$img_ex') ON DUPLICATE KEY UPDATE introduce_short='$introduce_short', profile_photo='$img_ex'";
                $data_udt = mysqli_query($conn, $query_udt);
                
                $result = mysqli_query($conn, $query);
                if($result){
                 ?>      <script>
                             alert("<?php echo "정보가 업데이트 되었습니다."?>");                                  
                         </script>
                 <?php
                     } else{       
                         echo "FAIL!!";
                     }
                 
                     mysqli_close($conn);
            
            } else {
                $em = "이미지 형식의 파일만 업로드할 수 있습니다.";
            }
        }

    } else {
        $em = "unknown error occurred!";
    }
    
?>

<script>
    alert("수정되었습니다.");
</script>

<meta http-equiv="refresh" content="0; url=http://203.153.155.216/src/body/myPage.php">
