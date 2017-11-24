<?

include "include/conn.inc";

$query="SELECT COUNT(*) FROM domain_admins";
$res=pg_query($query);
$row=pg_fetch_row($res);
$num=$row[0];

$query="SELECT domains,username FROM domain_admins";

//echo "<td class=\"menu\" valign=top width=550>\n";
echo "<table border=\"0\" bordercolor=green width=500 align=center>\n";
echo " <tr>\n  <td>\n";
echo "   <table align=center border=0 width=490>\n";
echo "    <tr>\n     <td class=\"small_titulo\" colspan=2>\n";
echo "Existem $num dom&iacute;nios registrados\n";
echo "     </td>\n    </tr>\n";
echo "   <tr>\n  <td class=\"small_titulo\" width=300>Dom&iacute;nio</td>\n";
echo "  <td class=\"small_titulo\">Admin</td>\n </tr>\n";

$res=pg_query($query);
while($row=pg_fetch_row($res)) {

	$vlr=array(
	"DOMAIN" => $row[0],
	"DESCR" => $row[1],
	"CREATE" => $row[2]
	);

	echo "<tr><td><a class=\"list\" href=logon.php?flag=domain&&action=list&&info=all&&domain=$vlr[DOMAIN]>". $vlr[DOMAIN]."</a></td>\n";
	echo "<td><a class=\"list\">".$vlr[DESCR]."</a></td></tr>";
}
echo "</table>";
echo "</td>\n</tr>\n";
echo "</table>\n";
echo "</td>\n";
?>
