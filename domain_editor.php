<?

include "include/header_noimage.inc";
include "include/conn.inc";

session_start();

echo "<table cellpading=\"0\" cellspacing=\"2\" align=\"center\" width=\"400\">";
echo " <tr>\n";
echo "  <td>\n";

if(empty($_POST['action'])) {

	include "include/edit_domain.php";

} elseif($_POST['action']=="alt") {
	

	$UpdateDomain="UPDATE domain SET domain='".$_POST['domain']."',description='".$_POST['desc']."',mailboxes=".$_POST['mailbox'].",aliases=".$_POST['alias'].",maxquota=".(($_POST['maxquota']*1024)*1024).",active='".$_POST['ativo']."' WHERE domain='".$_POST['domain']."'";

	$UpdateAdmin="UPDATE admin SET active='".$_POST['ativo']."' WHERE username='".$_POST['admin']."'";
	$UpdateDomainAdmins="UPDATE domain_admins SET active='".$_POST['ativo']."' WHERE username='".$_POST['admin']."'";
	// Se o update ocorre OK, fará upload da fispq.
//	echo $UpdateDomain;
	if(pg_query($UpdateDomain)or die("Erro Domain")) {
		pg_query($UpdateAdmin)or die("Erro Admin");
		pg_query($UpdateDomainAdmins)or die("Erro Domain_admins");
	}

		echo "<center><script>close_and_reload('Dominio Alterado com Sucesso')</script></b></a><p>";//		echo "<input class=\"button\" type=\"button\" value=\"Fechar\" onclick=\"close_and_reload()\"></center>\n";
} else {
		echo $UpdateProd;
		echo "Ocorreu um erro ao Alterar o produto";
}
//}

echo "  </td>\n";
echo " </tr>\n";	
echo "</table>\n";

?>
