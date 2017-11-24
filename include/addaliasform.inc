<?
session_start();

include  "include/conn.inc";
include "config/config.php";

$query="SELECT domains FROM domain_admins WHERE username='".$_SESSION['login']."'";
$res=pg_query($query);
$row=pg_fetch_array($res);

?>

<td class="menu" width=550 align=center>
<form action="newalias.php" name="alias" method="POST">
<table height="100" width=500 border="0" align="center">
<input size="20" type="hidden" name="domain" value="<? echo $row[0];?>">
<tr><td>
 <table align=center border="0" height="100"  width="400">
  <tr>
   <td class="small_titulo" height="30" colspan="2" align="center"><b>Adicionar Alias</b></td>
  </tr>
  <tr>
   <td class="small_titulo" width="140"><b>Alias:</b></td>
   <td align="left"> <input size="15" type="text" name="alias"><i> @<?echo $row[0];?></i></td>
  </tr>
  <tr>
   <td class="small_titulo" width="140"><b>Redirecionar para:</b></td>
	   <td align="left"> <input size="15" type="text"  name="alias_to"><i> @<?echo $row[0];?></i></td>
  </tr>

  <tr>
   <td height=30 align="center" colspan=2><input type="button" onclick="check_alias_form()" value="Adicionar">&nbsp;&nbsp;<input type="button" value="Cancelar" onclick=self.close()></td>
  </tr>
 </table>
</td></tr>
</table>
</form>
</td>
