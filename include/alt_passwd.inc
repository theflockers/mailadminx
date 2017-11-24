   <form method="post" action="alt_passwd.php">
   <input type="hidden" name="action" value="alt" />
   <input type="hidden" name="email" value="<? echo $_GET['username']; ?>"/>
   <table align="center" width="320" cellpadding="3" cellspacing="0" border=0>
    <tr>
     <td height="30" width="470"colspan="2" align="center"><a style="font-size: 11px"><b>Alterar senha para <? echo $_GET['username'];?></b></a></td>
    </tr>
    <tr>
     <td width="150"><a><b>&nbsp;Nova senha:</b></a></td>
     <td><input size="20" style="font-weight: bold" type="password" name="pass"/></td>
    </tr>
    <tr>
     <td width="80"><a><b>&nbsp;Confirma nova senha:</b></a></td>
     <td><input size="20" style="font-weight: bold" type="password" name="conf_pass"/></td>
    </tr>
    <tr>
     <td height="30" valign="middle" align="center" colspan="2"><input class="button" type="submit" value="Alterar" />
     <input class="button" type="button" value="Fechar" onclick="self.close()" />
     </td>
    </tr>
   </table>
  </form>
