<html>
    <head>
    <title>makale listesi</title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>    
</head>
<body>
    <div id="main">

<div class="full_w">
    <div class="h_title"><b>SİSTEMDE BULUNAN DERSLER</b></div>
    <table border="1">
        <tr>
            <td> Ders Kodu: </td>
            <td> Ders Adı: </td>
            <td> işlemler </td>
        </tr>
        <?php
        foreach ($dersListele as $key => $value) {
            echo "<tr>";
              echo "<td>".$value["drskodu"]."</td>";
              echo "<td>".$value["dersadi"]."</td>";
              echo "<td>";
                 echo "<a href='http://localhost/MVC/panel/dguncelle/".$value["dersid"]."'> Düzenle | </a>";
                 echo "<a href='http://localhost/MVC/panel/modulEkle/".$value["dersadi"]."'> Modul Ekle | </a>";
                 echo "<a href='http://localhost/MVC/panel/dersSil/".$value["dersid"]."'> | Sil</a>";
              echo "</td>";
              echo '</tr>';
        }
        ?>
    </table>
</div>
    </div>
</body>   
</html>

