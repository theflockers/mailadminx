<?

session_start();

if($_SESSION['logado']=="sim") {

		include "include/addmailboxform.inc";

	}else{
		
		header("location:../index.php");
	}	
?>
