<?

session_start();

$_SESSION['mailbox']=$_REQUEST['mail'];


if($_SESSION['logado']=="sim") {

		include "include/desablemailboxform.inc";

	}else{
		
		header("location:../index.php");
	}	
?>
