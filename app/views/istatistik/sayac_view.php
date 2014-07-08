<?php
function sayac() {

@mysql_connect("localhost", "root", "") or die("Host ile bağlantı kurulamıyor: " . mysql_error());
@mysql_select_db("mvc");

$gun=0;
//Kaç gün öncesinin kayıtları silinsin?Eğer sıfırdan farklı bir değer girmezseniz hiç bir zaman kayıtları silmez

$ip			=$_SERVER['REMOTE_ADDR'];
//Siteye ziyaret edenin IP'sini öğrenelim

$zaman		=time();
//Şu anki zamanı öğrenmemizi sağlar ve saniye cinsindendir.(Online sayac icin)

$buguntarih = date('Y-m-d');
//Bugünün tarihini öğreniyoruz. Çünkü ziyaret edenlerin sitemizi bugün içerisinde kaç kere ziyaret ettiğini öğrenmek için.

$sure_siniri=$zaman-60*5;
//Burada zaman 300 saniye 5 dk lik bir limit koyuyoruz ve 5 dk süre ile sitede herhangi bir işlem yapmadıysa online kısmında düşmek için bunu kullanacağız. Yani Online olayı 5 dk içindeki aktifliğine göre ayarlanıyor.

$kayit_sorgu = mysql_query("SELECT * FROM ip_sayaci WHERE tarih='$buguntarih' AND ip='$ip'");
//Bugün siteye gelen ziyaretçi bu IP ile daha önce giriş yapmış mı yoksa yapmamışmı diye kontrol etmek istiyoruz.

$kayit_sayisi=mysql_num_rows($kayit_sorgu);
//Burada daha onceden bugun tarihi ile giriş yapımış ise 1 değerini döndürcektir. Biz de bu sayede tekil sayısını saptamada birinci adımı atmış olacağız.

/*Başlangıç--Bugün bu IP ile ilk giriş yapılınca bu işlemler gerçekleşecektir.*/
if($kayit_sayisi==0){//Sıfır (0) değeri geldi ise bugün daha önceden bu IP ile giriş yapılmamış demektir. Bu yüzden ip_sayaci tablomuza yeni veri girişi yapmamız gerekecektir.
	$ip_kaydet=mysql_query("INSERT INTO ip_sayaci (tarih, tiklama, ip) VALUES ('$buguntarih',1,'$ip')");//Veri girişini yaptık.
	$toplam_kayit_sorgu=mysql_query("SELECT * FROM toplam_sayac");//Burada eğer ki sayaç yeni oluşturuluyorsa tablo'da hiç kayıt yok demektir. Eğer öle ise kayıt var mı yokmu onu öğreneceğiz.
	$toplam_kayit_sayisi=mysql_num_rows($toplam_kayit_sorgu);//Kayır var ise kayıt sayısını getirir. Normalde 1 tane kayıttan sonra başka kayıt girilmez bu tabloya. Yani sayac siteye kurulduktan sonra siteyi ilk ziyaret eden bu tabloya veri girişini yapar. Diğer kullanıcılar ise sürekli güncelleme yaptırır.
	if($toplam_kayit_sayisi==0){//Sıfır(0) yani sayaç ilk kurumda ise Toplam_sayac tablosuna ilk veri girişi burada yapılır.
		$toplam_sayaci_baslat=mysql_query("INSERT INTO toplam_sayac(toplam_tekil,toplam_cogul) VALUES(1,1)");//Veri girişi yapılıyor.
	}
	else{//Eğer tablo_sayac' a veri girişi daha önceden yapıldıysa burada güncelleme yapılır.
		$toplam_sayaci_artir = mysql_query("UPDATE toplam_sayac SET toplam_tekil=toplam_tekil+1, toplam_cogul=toplam_cogul+1 WHERE id=1 LIMIT 1");//Güncelleme yapılıyor.
	}
}
/*Bitiş--Bugün bu IP ile ilk giriş yapılınca bu işlemler gerçekleşecektir.*/

/*Başlangıç--Bugün daha önceden bu IP ile giriş yapımıştır*/
else{
$ip_sayaci_arttir = mysql_query("UPDATE ip_sayaci SET tiklama=tiklama+1 WHERE tarih='$buguntarih' and ip='$ip'");//SAdece ip_sayaci tablosundaki bugün tarihli ve IP'ye eşit verinin tıklama sayısını arttır.
$toplam_sayaci_artir1 = mysql_query("UPDATE toplam_sayac SET toplam_cogul=toplam_cogul+1 WHERE id=1 LIMIT 1");//Toplam_sayac tablosunda sadece cogul verisini arttır.
}
/*Bitiş--Bugün daha önceden bu IP ile giriş yapımıştır*/

//Eski kayıtları (ip_sayaci) tablosundan siler.
if ($gun > 0){
	$eski_kayit_sil = mysql_query("DELETE FROM ip_sayaci WHERE tarih <= DATE_SUB('$buguntarih', INTERVAL $gun DAY)");
}

/*Başlangıç-Online ziyaretçileri saydırmak için yapılan veri giriş, güncelleme ve silme*/
//Süre sınırı ile ilgi sql cümleciği
$sure_miktari= mysql_query("DELETE FROM online_ziyaretci WHERE tarih<'$sure_siniri'");//Burada online olmayanları tablodan siliyor.

$ipsorgu=mysql_query("SELECT * FROM online_ziyaretci WHERE ip='$ip'");
//ip'li kullanıcı daha öncede sitede varmıydı diye sorgu gonderiyoruz.

$ipline	=mysql_num_rows($ipsorgu);//Varsa 1 değeri dönecektir.

if($ipline==0)//Eğer yok ise siteme kayıt ediyoruz.
{
	$gir="INSERT INTO online_ziyaretci VALUES ('','$ip','$zaman')";
	$girsor=mysql_query($gir);
}
else //Sistemde var ise tekrar girmeye gerek yoktur. Sadece zamanı güncellemek yeterlidir.
{
	$guncelle=mysql_query("UPDATE online_ziyaretci SET tarih='$zaman' WHERE ip='$ip'");
}
/*Bitiş-Online ziyaretçileri saydırmak için yapılan veri giriş, güncelleme ve silme*/


/*Başlangıç--Sistemdeki Online Ziyaretcilerin Sayısını Öğrenme*/
$kac=mysql_query("SELECT id FROM online_ziyaretci");
//Sorgumuzu yapıyoruz
$online_ziyaretci_sayisi=mysql_num_rows($kac);
//Tabloda kaç satır var ise o kadar online ziyaretçi var demektir. Onu öğrenmiş olduk.
/*Bitiş--Sistemdeki Online Ziyaretcilerin Sayısını Öğrenme*/

/*Başlangıç--Sistemdeki Toplam Tekil ve Çoğul Ziyaretçilerin Sayısını Öğrenme*/
$toplam_tc=mysql_query("SELECT * FROM toplam_sayac WHERE id=1 LIMIT 1");
//Sorgumuzu yapıyoruz. 1. satırdaki bilgiler bizim verilerimizi içerir.
$toplam_tc_cek=mysql_fetch_array($toplam_tc);
//Sorgumuz ile verileri diziye attık.
$toplam_tekil_sayisi=$toplam_tc_cek["toplam_tekil"];
//Tekil sayısı
$toplam_cogul_sayisi=$toplam_tc_cek["toplam_cogul"];
//Çoğul Sayısı
/*Bitiş--Sistemdeki Toplam Tekil ve Çoğul Ziyaretçilerin Sayısını Öğrenme*/

/*Başlangıç--Sistemdeki Bugünün Tekil ve Çoğul Ziyaretçilerin Sayısını Öğrenme*/
$bugun = mysql_query("SELECT COUNT(ip) AS ttoplam, SUM(tiklama) AS ctoplam FROM ip_sayaci WHERE tarih='$buguntarih'");
//Sorgumuzu yaptık. Bu sorguyu anlamak için biraz MYSQL bilginiz olursa daha rahat edersiniz.
//1. Tekil sayısını bugün kaç tane giriş yapan IP varsa onu saydırarak öğrenebiliriz.
//2. Çoğul sayısını bugün kaç tane tiklama varsa onları toplatırarak öğrenebiliriz.
$bugun_veri = mysql_fetch_object($bugun);
//Burada farklılık olması açısından Class'a attım verilerimizi
$bugun_tekil = $bugun_veri->ttoplam;//Bugün Toplam Tekil Ziyaretci Sayısı
$bugun_cogul = $bugun_veri->ctoplam;//Bugün Toplam Çoğul Ziyaretçi SAyısı
/*Bitiş--Sistemdeki Bugünün Tekil ve Çoğul Ziyaretçilerin Sayısını Öğrenme*/

/*Başlangıç--Sistemdeki Dün Tekil ve Çoğul Ziyaretçilerin Sayısını Öğrenme*/
$dun = mysql_query("SELECT COUNT(ip) AS dttoplam, SUM(tiklama) AS dctoplam FROM ip_sayaci WHERE tarih = DATE_SUB('$buguntarih', INTERVAL 1 DAY)");
//Sorgumuzu yaptırıyoruz.SQL cümleciğindeki tek fark gün işlemleri fonksiyonu olan DATE_SUB'u kullandık ve önceki tarihteki değeri öğrendik.
$dun_veri = mysql_fetch_object($dun);//Class'a attık.
$dun_tekil = $dun_veri->dttoplam;//Dün Toplam Tekil Ziyaretci Sayısı
$dun_cogul = $dun_veri->dctoplam;//Dün Toplam Çoğul Ziyaretci Sayısı
/*Bitiş--Sistemdeki Dün Tekil ve Çoğul Ziyaretçilerin Sayısını Öğrenme*/

?>

<table width="240" border="1" cellpadding="0" cellspacing="0" bordercolor="#333333" bgcolor="#99CCCC" align="center">
  <tr>
    <td colspan="3" bgcolor="#99CCCC"><div align="center"><strong><a href="#" target="_blank">ZİYARETÇİ SAYACI</a></strong></div></td>
  </tr>
  <tr>
    <td width="108" bgcolor="#99FF99">Online</td>
    <td width="4" bgcolor="#99FF99">:</td>
    <td width="141" bgcolor="#99FF99"><?php echo $online_ziyaretci_sayisi; ?></td>
  </tr>
  <tr>
    <td bgcolor="#99CCCC">Bugün Tekil</td>
    <td bgcolor="#99CCCC">:</td>
    <td bgcolor="#99CCCC"><?php echo $bugun_tekil; ?></td>
  </tr>
  <tr bgcolor="#99FF99">
    <td>Bugün Çoğul</td>
    <td>:</td>
    <td><?php echo $bugun_cogul; ?></td>
  </tr>
  <tr bgcolor="#99CCCC">
    <td>Dün Tekil</td>
    <td>:</td>
    <td><?php echo $dun_tekil; ?></td>
  </tr>
  <tr bgcolor="#99FF99">
    <td>Dün Çoğul</td>
    <td>:</td>
    <td><?php echo $dun_cogul; ?></td>
  </tr>
  <tr bgcolor="#99CCCC">
    <td>Toplam Tekil</td>
    <td>:</td>
    <td><?php echo $toplam_tekil_sayisi; ?></td>
  </tr>
  <tr bgcolor="#99FF99">
    <td>Toplam Çoğul</td>
    <td>:</td>
    <td><?php echo $toplam_cogul_sayisi; ?></td>
  </tr>
  <tr>
    <td bgcolor="#99CCCC">IP</td>
    <td bgcolor="#99CCCC">:</td>
    <td bgcolor="#99CCCC"><?php echo $ip; ?></td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#99FF99"><div align="right"><a href="#">byadozgen</a> </div></td>
  </tr>
</table>


<?php
}
sayac();
//Yazdığımız fonksiyonumuzu çağırdık.
?>

