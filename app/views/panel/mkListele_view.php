<html>
    <head>
    <title>makale listesi</title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>    
</head>
<body>
<div id="main">
<div class="full_w">
    <div class="h_title"><b>SİSTEMDE BULUNAN MODUL VE KONULAR</b></div>
    <table border="1">
        <tr>
            <td> Modul Adı: </td>
            <td> Konu Adı: </td>
            <td> İşlemler </td>
        </tr>
        <?php
        foreach ($mkListele as $key => $value) {
            echo "<tr>";
              echo "<td>".$value["mdladi"]."</td>";
              echo "<td>".$value["konuadi"]."</td>";
              echo "<td>";
                 echo "<a href='http://localhost/MVC/panel/konuEkle/".$value['mdladi']."'> Yeni Konu | </a>";
                 echo "<a href='http://localhost/MVC/panel/konuSil/".$value['konuadi']."'> | Konu Sil</a>";
              echo "</td>";
              echo '</tr>';
        }
        ?>
    </table>
    </div>
</div>
</body>    
</html>

