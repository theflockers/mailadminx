<?

include "include/classes.php";

$mail = new DomainInfo;
$mail->dominio_info("theflockers.eti.br");
echo "<pre>\n";
print_r($mail);
echo "</pre>\n";

?>
