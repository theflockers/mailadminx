<?

session_start();

include "include/conn.inc";

$query="SELECT address,goto,active FROM alias WHERE domain='".$_SESSION['domain']."'";

echo "<td class=\"menu\" valign=top width=550>\n";
echo " <table border=\"0\" width=500 align=center>\n";
echo "  <tr>\n";
echo "   <td>\n";
echo "    <table border=0 width=400 align=\"center\">\n";
echo "<tr><td class=\"small_titulo\" height=\"30\" align=\"center\"> Lista de Alias</td></tr>";

$res=pg_query($query);
while($row=pg_fetch_row($res)) {

if($row[2]=="t") {
	$active="Sim";
}else{
	$active="Não";
}
//	$vlr=array(
//	"NOME" => $row[0],
//	"MAIL" => $row[0],
//	"CARGO" => $row[0]
//	);
	
	echo "<tr><td><a class=\"list\"><b>Alias:</b> ". $row[0]."</a></td></tr>";
	echo "<tr><td><a class=\"list\"><b>Redireciona para:</b> ". $row[1]."</a></td></tr>";
	echo "<tr><td><a class=\"list\"><b>Alias ativo:</b> ". $active."</a></td></tr>";
	echo "<tr><td >&nbsp;</td></tr>";
}
echo "</table>";
echo "</td></tr>\n";
echo "</table>";
echo "</td>";
?>
