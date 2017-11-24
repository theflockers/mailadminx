<form name="domain" action="newdomain.php" method="POST">
<table width=500 border="0" align="center">
<tr><td>
 <table align=center border="0" height="170"  width="400">
  <tr>
   <td class="small_titulo" height="30" colspan="2" align="center">Adicionar Dom&iacute;nio</td>
  </tr>
  <tr>
   <td  class="small_titulo" width="100">Dom&iacute;nio:</td>
   <td align="left"> <input size=30 type="text" name="domain"></td>
  </tr>
  <tr>
   <td  class="small_titulo" width="100">Descri&ccedil;&atilde;o:</td>
   <td align="left"> <input size=30 type="text" name="desc"></td>
  </tr>
  <tr>
   <td  class="small_titulo" width="100">Max. Mailbox:</td>
   <td align="left"> <input size=3 type="text" name="mboxes" maxlength="3"><i> (Total de Mailboxes para este domínio)</i></td>
  </tr>
  <tr>
   <td  class="small_titulo" width="100">Max. Alias:</td>
   <td align="left"> <input size=3 type="text" name="alias" maxlength="3"><i> (Total de Álias para este domínio)</i></td>
  </tr>
  <tr>
   <td  class="small_titulo" width="100">Max. Quota:</td>
   <td align="left"> <input size="4" type="text" name="quota" maxlength="4"><a> MBytes</a><i> (Dividido entre todos usuários)</i></td>
  </tr>
  <tr>
   <td  class="small_titulo" width="100">Admin login:</td>
   <td align="left"> <input type="text" size="10" maxlength="15" name="adm_login"><i> @dominio.com.br</i></td>
  </tr>
  <tr>
   <td  class="small_titulo" width="100">Senha:</td>
   <td align="left"> <input type="password" size="10" maxlength="15" name="adm_senha"></td>
  </tr>
 <tr>
   <td class="small_titulo" width="100">Criar e-mail?</td>
   <td  class="small_titulo" >
			<input type="radio" name="mail" value="s" checked>Sim&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="radio" name="mail" value="n">Não

   </td>
  </tr>
  <tr>
   <td>&nbsp;</td>
   <td><input type="button" onclick="check_domain_form()"  value="Adicionar">&nbsp;&nbsp;<input type="button" value="Cancelar" onclick="document.domain.reset()"></td>
  </tr>
 </table>
</td></tr>
</table>
</form>
</td>
