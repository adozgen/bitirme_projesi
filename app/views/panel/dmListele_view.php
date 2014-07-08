<html>
    <head>
    <title>makale listesi</title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>    
</head>
<body>
        <div id="main">

<div class="full_w">
    <div class="h_title"><b>SİSTEMDE BULUNAN DERSLER VE MODULLER</b></div>
    <table border="1">
        <tr>
            <td> Ders Adı: </td>
            <td> Modul Adı: </td>
            <td> İşlemler </td>
        </tr>
        <?php
        foreach ($dmListele as $key => $value) {
            echo "<tr>";
              echo "<td>".$value["dersadi"]."</td>";
              echo "<td>".$value["mdladi"]."</td>";
              echo "<td>";
                 echo "<a href='http://localhost/MVC/panel/modulEkle/".$value['dersadi']."'> Yeni Modul | </a>";
                 echo "<a href='http://localhost/MVC/panel/konuEkle/".$value["mdladi"]."'> Konu Ekle | </a>";
                 echo "<a href='http://localhost/MVC/panel/modulSil/".$value['mdladi']."'> | Modul Sil</a>";
              echo "</td>";
              echo '</tr>';
        }
        ?>
    </table>
    </div>
        </div>
</body>   
</html>

