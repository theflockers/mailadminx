<?
session_start();

include  "include/conn.inc";
include "config/config.php";

//$QueryDomains="SELECT domains FROM domain_admins WHERE username='".$_SESSION['login']."'";

$QueryDomains="select 
		a.domains,
		b.maxquota,
		b.mailboxes
	from 
		domain_admins a,
		domain b
	where 
		a.username='".$_SESSION['login']."' 
		and b.domain=a.domains";

$res=pg_query($QueryDomains);
$row=pg_fetch_array($res);

$QueryMailbox="SELECT SUM(quota) as quota FROM mailbox WHERE domain='".$_SESSION['domain']."'";
$ResMailbox=pg_query($QueryMailbox);
$tquota=pg_fetch_array($ResMailbox);

$quota=((($row['maxquota']/1024)/1024)-(($tquota['quota']/1024)/1024));
//echo (($row['maxquota']/1024)/1024);
//echo $QueryMailbox;

?>

<td class="menu" width=550 align=center>
<form action="newmailbox.php" name="mailbox"  method="POST">
<table width=500 border="0" align="center">
<input size="20" type="hidden" name="domain" value="<? echo $row[0];?>">
<tr><td>
 <table align=center border="0" height="170"  width="400">
  <tr>
   <td class="small_titulo" height="30" colspan="2" align="center">Adicionar Mailbox</td>
  </tr>
  <tr>
   <td  class="small_titulo" width="100">E-mail:</td>
   <td  class="small_titulo" align="left"> <input size="20" type="text" name="login"><i><span class="especial">&nbsp;@<?echo $row[0];?></span></i></td>
  </tr>
  <tr>
   <td  class="small_titulo" width="100">Senha:</td>
   <td align="left"> <input type="password" maxlength="15" name="senha"></td>
  </tr>
  <tr>
   <td  class="small_titulo" width="100">Nome:</td>
   <td align="left"> <input size=30 type="text" name="name"></td>
  </tr>

  <tr>
   <td  class="small_titulo" width="100">Dominio:</td>
   <td align="left"> <input class="disabled" size=30 type="text" name="domain" value="<? echo $row[0]; ?>" disabled></td>
  </tr>

  <tr>
   <td  class="small_titulo" width="100">Quota:</td>
   <td  class="small_titulo" align="left"> <input size=2 type="text" name="quota" value="<? echo ((($row[1]/1024)/1024)/$row[2]);?>" />&nbsp;Mbytes (Dispon&iacute;vel <? echo $quota; ?> Megabytes)</td>
  </tr>


  <tr>
   <td height=30 align="center" colspan=2><input type="button" onclick="check_mailbox_form()" value="Adicionar">&nbsp;&nbsp;<input type="reset" value="Reset" onclick="document.mailbox.reset()"></td>
  </tr>
 </table>
</td></tr>
</table>
</form>
</td>
