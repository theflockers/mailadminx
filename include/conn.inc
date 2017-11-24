<?

include "config/config.php";

$conn=pg_connect("host=$host port=5432 dbname=$db user=$user password=$senha")or die("Connection Failed");

?>
