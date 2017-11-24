<br><br>
		<form action="logon.php" method="POST">
		<input type="hidden" name="logon_screen" value="yes">
		<table align="center" width="300" height="120" cellpadding=2 cellspacing=2>
		<tr><td>
		 <table align="center" width="110">
		  <tr><td colspan="2" height="30"></td>
		  </tr>
		  <tr>
		   <td class="small_titulo" >Login:</td>
		   <td align="right"> <input type="text" name="login" value=<? echo $login; ?>></td>
		  </tr>
		  <tr>
		   <td class="small_titulo" >Senha:</td>
		   <td align="right"> <input type="password" name="senha"></td>
		  </tr>
		  <tr>
		   <td align="right" colspan=2><input class="none" type="image" src="<? echo "$style/images/login_button.png"; ?>" value="Entrar"></td>
		  </tr>
		  <tr>
			<!--   <td align="right" colspan=2>&nbsp;</td> -->
		  </tr>
		  <tr>
		   <td  class="small_titulo" colspan=2>
			<?if(empty($err)) {
				echo "<center>Entre com seu login</center>";
			}else{
				echo "<center>".$err."</center>";
			}?>
</td>
</tr>
 </table>
</td></tr>
</table>
</form>
</body>
</html>


