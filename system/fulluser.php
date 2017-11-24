<?

include "include/header_noimage.inc";
include "include/conn.inc";
include "include/data.inc";

$query="select  domain,
		description,
		aliases,
		mailboxes,
		maxquota,
		active 
		from domain 
		where domain='".$_REQUEST['domain']."'";


$select_date="SELECT DATE_PART('day', created), DATE_PART('month', created),DATE_PART('year', created) FROM domain WHERE domain='".$_REQUEST['domain']."'";
$res=pg_query($select_date);
$row=pg_fetch_row($res);

$created=$dia[$row[0]]." de ".$mes[$row[1]]." de ".$row[2];


//$query="SELECT nome,e_mail,cargo FROM user_info where codigo=$cod";

//echo "<td class=\"menu\" valign=\"top\" width=500>\n";
echo "<br/>\n";
echo " <table align=\"center\" border=\"0\" width=500 align=center>\n";
echo "  <tr><td>\n";
echo "   <table align=\"center\" class=\"blue\" width=\"480\">\n";

$res=pg_query($query);
$row=pg_fetch_row($res);

//$vlr=array(
//"NOME" => $row[0],
//"MAIL" => $row[0],
//"CARGO" => $row[0]
//);
	
	echo "<tr><td height=\"25\" align=\"center\" colspan=\"2\"><a><b>Detalhes de ".$row[0]."</b></a></td></tr>\n";
	echo "<tr><td class=\"small_titulo\">Dominio:</td><td width=\"350\"><a> ". $row[0]."</a></td></tr>\n";
	echo "<tr><td class=\"small_titulo\">Descri&ccedil;&atilde;o:</td><td><a>". $row[1]."</a></td></tr>\n";
	echo "<tr><td class=\"small_titulo\">Num Alias: </td><td><a>". $row[2]."</a></td></tr>\n";
	echo "<tr><td class=\"small_titulo\">Num Mailboxes: </td><td><a>". $row[3]."</a></td></tr>\n";
	echo "<tr><td class=\"small_titulo\">Quota: </td><td><a>". (($row[4]/1024)/1024)." MBytes</a></td></tr>\n";
	echo "<tr><td class=\"small_titulo\">Criado:</td><td><a>Dia ". $created."</a></td></tr>\n";
	echo "<tr><td class=\"small_titulo\">Ativo: </td><td><a>\n";
				if($row[5]=="t") {echo "sim";} else { echo "Não";}
	echo "</a></td></tr>\n";
	echo "<tr><td align=\"right\" colspan=\"2\"><input style=\"width: 100px\" type=\"button\" value=\"Editar\" onclick=\"window.open('domain_editor.php?domain=".$_REQUEST['domain']."','','width=500,height=220,scrollbars=no')\"></td><td>\n";

echo "</table>\n";
echo "</td></tr>\n";
echo "</table>\n";
echo "</td>\n";
?>
