<html>
<head>
	<meta charset="utf-8">
        <SCRIPT LANGUAGE="JavaScript">
var da = (document.all) ? 1 : 0;
var pr = (window.print) ? 1 : 0;
var mac = (navigator.userAgent.indexOf("Mac") != -1);
 
function printPage() {
 if (pr) // NS4, IE5
 window.print()
 else if (da && !mac) // IE4 (Windows)
 vbPrintPage()
 else // other browsers
 alert("Sorry, your browser doesn't support this feature.");
 return false;
}
 
if (da && !pr && !mac) with (document) {
 writeln('<OBJECT ID="WB" WIDTH="0" HEIGHT="0" CLASSID="clsid:8856F961-340A-11D0-A96B-00C04FD705A2"></OBJECT>');
 writeln('<' + 'SCRIPT LANGUAGE="VBScript">');
 writeln('Sub window_onunload');
 writeln(' On Error Resume Next');
 writeln(' Set WB = nothing');
 writeln('End Sub');
 writeln('Sub vbPrintPage');
 writeln(' OLECMDID_PRINT = 6');
 writeln(' OLECMDEXECOPT_DONTPROMPTUSER = 2');
 writeln(' OLECMDEXECOPT_PROMPTUSER = 1');
 writeln(' On Error Resume Next');
 writeln(' WB.ExecWB OLECMDID_PRINT, OLECMDEXECOPT_DONTPROMPTUSER');
 writeln('End Sub');
 writeln('<' + '/SCRIPT>');
}
</SCRIPT>
        
</head>
<body>
    
<div id="main">

<div class="full_w">
    
    <?php
   // mysql_query("SET NAMES UTF8");
    include_once 'skitabck_view.php';
	include_once 'yazdir_view.php';
    $link="localhost/mvc/sinavlar/sinavhazir";
    if ($link==$_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]) {
        echo "<font color='blue'><center><b>SAYFAYI YAZDIRMAK İÇİN LÜTFEN</b></center></font>";
        echo"</br>";
        echo "<center><a href='./sinavkagt' target='_blank'>TIKLAYINIZ</a></center></br><br/>";
        
    } else {   
        echo "<center><a href='#' onClick='return printPage()'>SAYFAYI YAZDIR</a></center></br></br>";
    }
    ?>
    
</div>
</div>
</body>
</html>