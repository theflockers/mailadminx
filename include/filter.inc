<table border="0" cellpadding="0" cellspacing="0" width="500" align="center">
 <tr>
  <td width"500">
   <table width="400" align="center">
    <form name="filter" action="changefilter.php" method="POST">
    <tr>
     <td height="30"><span style="color: #000000">Configuração do filtro default</span>
     </td>
    </tr>
    <tr>
     <td height="45" valign="top">
      <span style="color: #000000; font-size: 10px; font-weight: normal">
       Configuração avançada da filtragem de mensagens. Edite-o com cuidado, pois uma altaração errada
       pode implicar no não recebimento de mensagens. Somente para uso em conjunto com o Maildrop.
      </span>
     </td>
    </tr>
    <tr>
     <td>
      <textarea name="text"><? include "samples/maildroprc"; ?></textarea>
     </td>
    </tr>
    <tr>
     <td height="30">
      <input type="submit" value="Alterar">&nbsp;
      <input type="button" value="Cancelar">
     <td>
    </tr>
    </form>
   </table>
  </td>
 </tr>
</table>
