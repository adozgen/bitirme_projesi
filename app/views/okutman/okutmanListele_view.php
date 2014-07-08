<html>
    <head>
    <title>makale listesi</title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>    
</head>
<body>
    <table border="1">
        <div class="h_title"><b><font color="blue">SİSTEMDE BULUNAN OKUTMANLAR</font></b></div>
        <tr>
            <td> Ders Adı: </td>
            <td> Okutman Adı: </td>
            <td> Okutman Unvan:</td>
            <td> Okutman Email:</td>
            <td> işlemler </td>
        </tr>
        <?php
        foreach ($okutmanListele as $key => $value) {
            echo "<tr>";
              echo "<td>".$value["dersadi"]."</td>";
              echo "<td>".$value["username"]."</td>";
              echo "<td>".$value["ounvan"]."</td>";
              echo "<td>".$value["email"]."</td>";
              echo "<td>";
                 echo "<a href='http://localhost/MVC/okutman/okutmanekle/".$value["oid"]."'> Düzenle | </a>";
                 echo "<a href='http://localhost/MVC/okutman/okutmanSil/".$value["username"]."'> | Sil</a>";
              echo "</td>";
              echo '</tr>';
        }
        ?>
    </table>
</body>
    
        
    
    
</html>

