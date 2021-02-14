<?php
    session_start();
    $n_email = $_SESSION['email'];
    $conn=mysqli_connect('localhost','root','harmony2020','harmony');

    $query_id="SELECT * FROM User_Accounts";
    $data_id=mysqli_query($conn,$query_id);
    $row_id = mysqli_fetch_array($data_id);

    $pid = $_POST['pid'];
    $cid = $_POST['cid'];
    $uid = $_POST['uid'];
    $wc = $_POST['wc'];

    echo $wc;

    $query_insert = "INSERT comments SET comment_id=0, user_id='$uid', 
    post_id='$pid', comment='$wc', date=0";
    $data_insert=mysqli_query($conn,$query_insert);

    if($data_insert){
        ?>      <script>
                    alert("<?php echo "등록되었습니다."?>");  
                    location.replace("mainfeed.php");
                </script>
        <?php
        } else{       
            echo "FAIL!!";
        }
        
?>