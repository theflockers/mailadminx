<html>
 <head>
  <title>.::TheFlockers::.</title>
  <link rel="stylesheet" type="text/css" href="<? include "config/config.php"; echo $style;?>style.css" />
   <script src="script.js">

</script>
   </head>
<body topmargin="0">
  <div class="header">
   <img src="<?echo $style."images/webmail_menu_01.png";?>" usemap="#btn1" border="0" align="top">
   <img src="<?echo $style."images/webmail_menu_02.png";?>" usemap="#btn2" border="0" align="top">
   <img src="<?echo $style."images/webmail_menu_03.png";?>" usemap="#btn3" border="0" align="top">
   <img src="<?echo $style."images/webmail_menu_04.png";?>" usemap="#btn4" border="0" align="top">
   <img src="<?echo $style."images/webmail_menu_05.png";?>" usemap="#btn5" border="0" align="top"></br>
   <span style="font-size: 11px; color: #000000"><b><?echo "&nbsp;&nbsp; Bem Vindo(a) ".$_SESSION['login']." - Hoje é ".date('d \de M \de Y -  H:i');?></b>
  </div>

 <map name="btn1">
  <area shape="rect" coords="28,89,72,108" href="webmail_logon.php?flag=inbox">
  <area shape="circle" coords="50,52,34" href="webmail_logon.php?flag=inbox">
 </map>

 <map name="btn2">
  <area shape="rect" coords="28,89,82,108" href="logon.php?flag=newmail">
  <area shape="circle" coords="50,52,34" href="logon.php?flag=newmail">
 </map>

 <map name="btn3">
  <area shape="rect" coords="18,89,86,108" href="logon.php?flag=message">
  <area shape="circle" coords="50,52,34" href="logon.php?flag=message">
 </map>

 <map name="btn4">
  <area shape="rect" coords="28,89,78,108" href="webmail_logon.php?flag=quarentena">
  <area shape="circle" coords="50,52,34" href="webmail_logon.php?flag=quarentena">
 </map>

 <map name="btn5">
  <area shape="rect" coords="18,89,80,108" href="logon.php?destroy=s">
  <area shape="circle" coords="50,52,34" href="logon.php?destroy=s">
 </map>
