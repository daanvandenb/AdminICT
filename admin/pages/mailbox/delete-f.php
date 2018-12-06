<?php
include('../../session.php');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
$rowCount = count($_POST["users"]);
for($i=0;$i<$rowCount;$i++) {
mysqli_query($db,"DELETE FROM feedback WHERE id='" . $_POST["users"][$i] . "'");
}
header("Location:mailbox.php");
exit();
?>