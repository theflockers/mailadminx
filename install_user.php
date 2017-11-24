<?

/* Script para adicionar o usuário principal do PostMailAdmin */

include "config/config.php";
include "include/conn.inc";

$admin="admin";
$str="senha";

$admin_pass=crypt($str);

$Query="insert into admin(username,password,sysadmin) values('$admin','$admin_pass','t')";

if(pg_exec($Query)) {
	echo "Adicionado com sucesso!\n";
	echo "Sucessfull\n";
} else {
	echo "Erro ao adicionar\n";
	echo "Error\n";
}

?>
