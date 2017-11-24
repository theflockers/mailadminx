<?

$strHead="=?ISO-8859-1?Q?=5BFwd=3A_02/02/2005";
$str="=?ISO-8859-1?Q?=5BFwd=3A_02/02/2005";

if(ereg("=\?.{0,}\?Q\?",$strHead)){
  $strHead=quoted_printable_decode($strHead);
  $strHead=ereg_replace("=\?.{0,}\?[Qq]\?","",$strHead);
  $strHead=ereg_replace("\?=","",$strHead);
  $strHead=ereg_replace("_"," ",$strHead);
} 
echo $strHead."<br>";
echo quoted_printable_decode($str);
?>
