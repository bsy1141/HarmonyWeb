<?php
    session_start();
    $n_email = $_SESSION['email'];
    $search_text = $_POST['search_text'];
    $conn=mysqli_connect('localhost','root','harmony2020','harmony');

    $query_id="SELECT * FROM User_Accounts WHERE email='$n_email'";
    $data_id=mysqli_query($conn,$query_id);
    $row_id = mysqli_fetch_array($data_id);

    $query_search="SELECT * FROM Projects WHERE overview LIKE '%$search_text%';";
    $data_search=mysqli_query($conn,$query_search);
    //$row_search = mysqli_fetch_array($data_search);
    //$row_cnt = mysqli_num_rows($data_search);

?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../../style/search.css?after">
</head>
<body>
    <div class="top">
        <button class="harmony" onclick="location.href='mainfeed.php'">
            <img src="../../assets/image/icon8.png" class="harmony_logo">
        </button>
        <form action="search.php" method="POST">
            <input type="text" name="search_text" class="find" placeholder="     검색" value="<?php echo $search_text ?>">
            <button class="findbtn" type="submit">
                <img src="../../assets/image/icon10.png" class="findbtnimg">
            </button>
        </form>
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
                    <li><a href="#">로그아웃</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="result">
        <p id="title">검색결과</p>
        <div class="searchResult">
            <?php
                while($row_search = mysqli_fetch_array($data_search)){?>
                    <form action="project_click.php" method="POST">
                        <div class="result_project">
                            <input type="submit" name="selected_proj" value="<?php echo $row_search[0] ?>" class="projectUnselect_img" style="color:transparent;border:0;outline:0;background-color:transparent;background-image:url('<?php echo $row_search[2] ?>');background-repeat:no-repeat; background-size:370px 370px;" formaction="project_click.php"/>
                            <p class="projectTitle"><?php echo $row_search[3]?></p> 
                            <p class="projectDuration"><?php echo $row_search[5]?>.<?php echo $row_search[6]?>.<?php echo $row_search[7]?>
                                - <?php echo $row_search[8]?>.<?php echo $row_search[9]?>.<?php echo $row_search[10]?></p>
                        </div>
                    </form>
            <?php
                }?>
        </div>
    </div>
</body>
</html>

<script>
     $(document).on('click', '.selected_proj', function(){
        var proj_id = $row_search[0];
        $(this).attr('disabled', 'disiabled');

        $.ajax({
            url:"project_click.php",
            method:"POST",
            data:{proj_id:proj_id}
        });

    });



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
