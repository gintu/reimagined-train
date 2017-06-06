<?php
if($_SESSION['uid']=="")
{
	header("Location:invalidpage.php");
}
?>