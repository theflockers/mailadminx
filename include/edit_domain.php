<?

session_start();

include "include/conn.inc";
include "include/header_noimage.inc";

$DescriQuery="SELECT * FROM domain WHERE domain='".$_GET['domain']."'";
//echo $DescriQuery;
$res=pg_query($DescriQuery)or die ("Erro");
$DomainDescription=pg_fetch_array($res);

$QueryAdmin="SELECT username FROM domain_admins WHERE domains='".$_GET['domain']."'";
$resAdmin=pg_query($QueryAdmin)or die("Admin Error");
$Admin=pg_fetch_array($resAdmin);

#print_r($ProdDescription);


//mysql_free_result($res);
?>
<!-- Tabela de dentro -->
   <form method="post" name="domain" action="domain_editor.php">
   <input type="hidden" name="action" value="alt" />
   <input type="hidden" name="domain" value="<?echo $_GET['domain']; ?>" />
   <table align="center" width="490" cellpadding="3" cellspacing="0" border=0>
    <tr>
     <td height="40" width="470"colspan="2" align="center"><a style="font-size: 11px"><b>Editando domínio <? echo $DomainDescription['domain'];?></b></a></td>
    </tr>
    <tr>
     <td width="150"><a><b>&nbsp;Dominio:</b></a></td>
     <td><input size="45" style="font-weight: bold" type="text" name="domain" value="<?echo $DomainDescription['domain']; ?>"/></td>
    </tr>
    <tr>
     <td width="80"><a><b>&nbsp;Descricao:</b></a></td>
     <td><input size="45" style="font-weight: bold" type="text" name="desc" value="<?echo $DomainDescription['description']; ?>"/></td>
    </tr>
    <tr>
     <td width="80"><a><b>&nbsp;Max. Mailbox:</b></a></td>
     <td><input size="3" maxlength="3" style="font-weight: bold" type="text" name="mailbox" value="<?echo $DomainDescription['mailboxes']; ?>"/></td>
    </tr>
    <tr>
     <td width="80"><a><b>&nbsp;Max. Alias:</b></a></td>
     <td><input size="3" maxlength="3" style="font-weight: bold" type="text" name="alias" value="<?echo $DomainDescription['aliases']; ?>"/></td>
    </tr>
    <tr>
     <td width="80"><a><b>&nbsp;Max. Quota:</b></a></td>
     <td><input size="4" maxlength="4" style="font-weight: bold" type="text" name="maxquota" value="<?echo (($DomainDescription['maxquota']/1024)/1024); ?>"/><i> MBytes</i></td>
    </tr>
     <tr>
     <td width="80"><a><b>&nbsp;Admin:</b></a></td>
     <td><input size="45" style="font-weight: bold" type="text" name="admin" value="<?echo $Admin['username'];?>"/>
     </td>
    </tr>

    <tr>
     <td width="80"><a><b>&nbsp;Ativo:</b></a></td>
     <td valign="top"><a>Sim: </a><input style="font-weight: bold" type="radio" name="ativo" value="t" <?if($DomainDescription['active']=="t"){echo "checked";} ?>>
     <a>N&atilde;o: </a><input style="font-weight: bold" type="radio" name="ativo" value="f" <?if($DomainDescription['active']=="f"){echo "checked";} ?>></td>
    </tr>
    <tr>
	     <td height="30" valign="middle" align="center" colspan="2"><input class="button" type="submit" value="Alterar" />
                     <input class="button" type="button" value="Fechar" onclick="self.close()" />
     </td>
    </tr>
   </table>
  </form>
