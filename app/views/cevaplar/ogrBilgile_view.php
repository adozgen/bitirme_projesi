 <?php
// session_start();
 mysql_connect("localhost","root","");
 mysql_select_db("mvc");
 if(isset($_POST['dersler'])) {
     $sorularr=$_POST["dersler"];
//     foreach($sorularr as $key => $value)
//    {
//         $sid=$value;
//         $query= mysql_query("SELECT * FROM sorular WHERE sid = '$sid'");
//         while($sql= mysql_fetch_array($query)){
//             $sorular=$sql["soru"];
//             
//    } 
    foreach($sorularr as $key => $value)
    {
         $sid=$value;
         $query= mysql_query("SELECT * FROM sorular WHERE sid = '$sid'");
         while($sql= mysql_fetch_array($query)){
             $scev=$sql["dcev"];
             $ssoru=$sql["soru"];
             echo $scev;
             echo $ssoru;
             
    }
 }
 }
 else {
    echo 'Hiç meyve seçmediniz.';
}
        