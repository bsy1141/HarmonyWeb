<?php    

    session_start();
    $n_email = $_SESSION['email'];
    $conn=mysqli_connect('localhost','root','harmony2020','harmony');

    $query_id = "select * from User_Accounts where email='$n_email'";
    $data_id = mysqli_query($conn, $query_id);
    $row_id = mysqli_fetch_array($data_id);

    $query_post="select * from Posts";
    $data_post=mysqli_query($conn,$query_post);
    $post_id=mysqli_num_rows($data_post)+1;

    $activityName = $_POST['activityName'];
    $activityText = $_POST['activityText'];
    $activityTag = $_POST['activityTag'];
    $selected_proj = $_POST['Selected_proj'];
    


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

        if(move_uploaded_file($tmp_name, $target)){
            $query = "INSERT INTO Posts (post_id, project_id, user_id, photo, activity_name, contents, date) 
               VALUES('$post_id', '$selected_proj', '$row_id[0]', '$target', '$activityName', '$activityText', NOW())";
           
               $result = mysqli_query($conn, $query);
               if($result){
                ?>      <script>
                            alert("<?php echo "등록되었습니다."?>");  
                            location.replace("mainfeed.php");
                        </script>
                <?php
                } else{       
                    echo "FAIL!!";
                }
                
                mysqli_close($conn);
        }

        
    } else{
    ?>
    <script>
        alert("<?php echo "작성이 취소되었습니다."?>");  
        location.replace("mainfeed.php");
    </script>
    <?php
    }
?>