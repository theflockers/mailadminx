<?

session_start();

include "include/conn.inc";

$mbox=imap_open("$mailhost".$_SESSION['folder'],$_SESSION['login'],$_SESSION['senha'])or die("Erro ao conectar-se");


switch($_POST['action']){

	case "del":
		
		if(imap_delete($mbox,$_POST['id'])) {
//		if(imap_setflag_full($mbox,imap_uid($mbox,$_POST['id']),"\\Deleted",ST_UID)) {
			imap_expunge($mbox);
			header("location:webmail_logon.php");
		}
	break;
}
//	header("location:webmail_logon.php");


?>
