<?php

    $conn=mysqli_connect('localhost','root','harmony2020','harmony');

    if(isset($_POST["post_id"]))
    {

        $query = "
            UPDATE Posts SET like_num = like_num+1 where post_id=$_POST['post_id'];
        ";

        $statement = $connect-> prepare($query);
        $statement -> execute(
            array(
            ':post_id' => $_POST["post_id"],
            ':user_id' => $_SESSION["user_id"]
            )
        );

        $result = $statement->fetchAll();
        if(isset($result))
        {
            echo 'done';
        }
        else{
            echo 'fail';
        }
    }

?>
<script>
    alert("<?php echo $_POST["post_id"] ?>");
</script>