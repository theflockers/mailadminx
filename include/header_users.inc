<html>
 <head>
  <title>.::TheFlockers::.</title>
  <link rel="stylesheet" type="text/css" href="<? include "config/config.php"; echo $style;?>style.css" />
   <script src="script.js">

</script>
   </head>
<body topmargin="0">
 <center>
  <div class="header">
   <img src="<?echo $style."images/menu_01.png";?>" usemap="#btn1" border="0" align="top">
   <img src="<?echo $style."images/menu_02.png";?>" usemap="#btn2" border="0" align="top">
   <!-- <img src="<?echo $style."images/menu_03.png";?>" usemap="#btn3" border="0" align="top" -->
   <!-- img src="<?echo $style."images/menu_04.png";?>" usemap="#btn4" border="0" align="top" -->
   <img src="<?echo $style."images/menu_05.png";?>" usemap="#btn5" border="0" align="top"></br>
   <span style="font-size: 10px; color: #000000"><b><?echo "Bem Vindo(a) ".$log." - Hoje é ".date('d \de M \de Y -  H:i');?></b>
  </div>
 </center>

 <map name="btn1">
  <area shape="rect" coords="28,89,72,108" href="logon.php?flag=email">
  <area shape="circle" coords="50,52,34" href="logon.php?flag=email">
 </map>

 <map name="btn2">
  <area shape="rect" coords="28,89,82,108" href="logon.php?flag=alias">
  <area shape="circle" coords="50,52,34" href="logon.php?flag=alias">
 </map>

 <!-- map name="btn3">
  <area shape="rect" coords="18,89,86,108" href="logon.php?flag=message">
  <area shape="circle" coords="50,52,34" href="logon.php?flag=message">
 </map>

 <map name="btn4">
  <area shape="rect" coords="28,89,78,108" href="logon.php?flag=filter">
  <area shape="circle" coords="50,52,34" href="logon.php?flag=filter">
 </map-->

 <map name="btn5">
  <area shape="rect" coords="18,89,80,108" href="logon.php?destroy=s">
  <area shape="circle" coords="50,52,34" href="logon.php?destroy=s">
 </map>
