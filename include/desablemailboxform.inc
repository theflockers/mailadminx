<?

session_start();

?>

<td class="menu" width=550 align=center>
<form action="desablemailbox.php" name="mailbox"  method="POST">
<input type="hidden" name="status" value="<?echo $_GET['status']; ?>" />
<table width=500 border="0" align="center">
<tr><td>
 <table align=center border="0" height="50"  width="400">
  <tr>
   <td style="font-family: verdana; font-size: 12px; font-weight:bold" height="30" colspan="2" align="center">Deseja
	<? if($_GET['status']=="t") {
		echo " desabilitar";
	   } else {
		echo " reabilitar ";
	   }
	?>
	este mailbox?
   </td>
  </tr>
  <tr>
   <td  class="small_titulo" width="100">E-mail:</td>
   <td  align="left"><input type="text" name="mailbox" value="<? echo $_SESSION['mailbox'];?>" size="25"></span></i></td>
  </tr>
  <tr>
   <td height="50" align="center" colspan=2><input type="button" onclick="document.mailbox.submit()" value="Sim">&nbsp;&nbsp;<input type="reset" value="Não" onclick="history.back()"></td>
  </tr>
 </table>
</td></tr>
</table>
</form>
</td>
