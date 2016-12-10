<?php
include ('../functions/db.php');

if(isset($_POST['bsearch'])){
	$search=$_POST["search"];
	$sql3 = "SELECT * from thread t,user_account u where t.user_id=u.user_id and t.status='SATISFIED' and (t.title like '%$search%' or t.subject like '%$search%') order by t.date_created DESC";
	$result3 = mysqli_query($conn, $sql3);
	$num_rows3=mysqli_num_rows($result3);
}else{
	$search=NULL;
	$sql3 = "SELECT * from thread t,user_account u where t.user_id=u.user_id and t.status='SATISFIED'  order by t.date_created DESC";
	$result3 = mysqli_query($conn, $sql3);
	$num_rows3=mysqli_num_rows($result3);

}

?>