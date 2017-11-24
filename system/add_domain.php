<?

session_start();

if($_SESSION['logado']=="sim") {

		include "include/addform.inc";

	}else{
		
		header("location:../index.php");
	}	
?>
