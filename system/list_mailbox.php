<?

session_start();

include "include/conn.inc";

$query="SELECT username,name,quota,active FROM mailbox WHERE domain='".$_SESSION['domain']."'";

echo "<td class=\"menu\" valign=top width=550>\n";
echo " <table border=\"0\" width=500 align=center>\n";
echo "  <tr>\n";
echo "   <td>\n";
echo "    <table width=400 align=\"center\">\n";
echo "<tr><td colspan=\"3\" height=\"30\" align=\"center\"><a><b>Lista de Usuários</b></a></td></tr>";

$res=pg_query($query);
while($row=pg_fetch_row($res)) {

if($row[3]=="t") {
	$active="Sim";
}else{
	$active="Não";
}
//	$vlr=array(
//	"NOME" => $row[0],
//	"MAIL" => $row[0],
//	"CARGO" => $row[0]
//	);
	
	echo "<tr><td colspan=\"2\"><a class=\"list\"><b>Nome:</b>&nbsp;". $row[1]."</a></td></tr>\n";
	echo "<tr><td colspan=\"2\"><a class=\"list\"><b>Login:</b> ". $row[0]."</a></td></tr>\n";
	echo "<tr><td colspan=\"2\"><a class=\"list\"><b>Quota:</b> ". (($row[2] / 1024)/1024)." MByte(s)</a></td></tr>\n";
	echo "<tr><td><a class=\"list\"><b>Conta ativa:</b> ". $active."</a></td>\n";
	if($row[3]=="t") {
		echo "<td align=\"right\"><input type=\"button\" value=\"Desativar\" onClick=location=\"logon.php?flag=email&&action=des&&mail=".$row[0]."&&status=".$row[3]."\" />&nbsp;\n";
	} else {
		echo "<td align=\"right\"><input type=\"button\" value=\"Ativar\" onClick=location=\"logon.php?flag=email&&action=des&&mail=".$row[0]."&&status=".$row[3]."\" />&nbsp;\n";
	
	}
	echo "<input type=\"button\" value=\"Alterar senha\" onclick=\"window.open('alt_passwd.php?username=".$row[0]."','','width=330,height=118')\"/></td>\n";
	echo "<tr><td colspan=\"2\" >&nbsp;</td></tr>\n";
}
echo "</table>\n";
echo "</td></tr>\n";
echo "</table>\n";
echo "</td>\n";
?>
