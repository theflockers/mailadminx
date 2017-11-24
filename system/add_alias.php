<?

session_start();

if($_SESSION['logado']=="sim") {

		include "include/addaliasform.inc";

	}else{
		
		header("location:../index.php");
	}	
?>
