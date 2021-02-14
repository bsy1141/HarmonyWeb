<?php
    session_start();
    $n_email = $_SESSION['email'];
    $introduce_short=$POST["short_intro"];

    $conn=mysqli_connect('localhost','root','harmony2020','harmony');

    $query_id="SELECT * FROM User_Accounts WHERE email='$n_email'";
    $data_id=mysqli_query($conn,$query_id);
    $row = mysqli_fetch_array($data_id);
    $n_id = $row[0];

    $query_exist = "SELECT EXISTS(SELECT 1 FROM My_Page WHERE id='$n_id') AS success";
    $data_exist = mysqli_query($conn, $query_exist);
    $row_exist = mysqli_fetch_array($data_exist);

    if($row_exist[0]==1){
        $query = "UPDATE My_Page SET introduce_short='$introduce_short' WHERE id='$n_id';";
    }
    else{
        $query = "INSERT INTO My_Page (id, introduce_short) VALUE('$n_id','$introduce_short')";
    }
    $result=mysqli_query($conn,$query);

    if($result) echo $introduce_short;

    /*
    echo "<html>\n";
	echo "<body onload='document.form1.submit();'>\n";
	echo "<form name='form1' method='post' action='myPage.php'>\n";
	for($i=0; $i<count($introduce_short); $i++)
	{
		$value = addslashes($_POST[$introduce_short[$i]]);
		echo "<input type='hidden' name='{$introduce_short[$i]}' value='$value'>\n";
	}
	echo "</form>\n";
	echo "</body>\n";
    echo "</html>";
    */
?>