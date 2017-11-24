<td class="menu" width=550 align=center>
<form action="remalias.php" name ="alias" method="POST">
<table border="0" width="500" bordercolor="green" align="center">
<tr><td>
 <table align="center" border="0" height="130"  width="400">
  <tr>
   <td class="small_titulo" height="30" align="center" colspan="2"><b>Remover Alias</b></td>
  </tr>
  <tr>
   <td class="small_titulo" width="70"><b>&nbsp;&nbsp;Alias:</b></td>
   <td><input type="text" name="email"><i> @<?echo $_SESSION['domain'];?></i></td>
  </tr>
  <tr>
   <td>&nbsp;</td>
   <td><input type="button" onclick="check_form()" value="Procurar">
  </tr>
 </table>
</td></tr>
</table>
</form>
</tb>
