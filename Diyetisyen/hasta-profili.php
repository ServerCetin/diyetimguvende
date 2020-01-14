<?php
session_start();
ob_start();
$ad = $_SESSION["ad"];
$username = $_SESSION["username"];
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link rel="shortcut icon" type="image/png" href="../favicon.png"/>
<title>Hasta Profili-Diyetin Güvende!</title>
<link rel="stylesheet" href="../css/styles.css" type="text/css" />

<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
</head>

<body>

		<section id="body" class="width">
            <?php include "../Ortak/get-menu.php"?>


			<section id="content" class="column-right">
                	
	    <article>
		
			<div class="beyaz">
                <?php
                include "../baglan.php";

                $id = $_POST['kullaniciIds'];
                $hasta = $db->query("SELECT * FROM hastabilgi WHERE KullaniciId = $id")->fetch(PDO::FETCH_ASSOC);
                $kullanici = $db->query("SELECT * FROM kullanici WHERE Id = $id")->fetch(PDO::FETCH_ASSOC);

                $cinsiyet = $kullanici['CinsiyetId'] == 1 ? "Kadın" : "Erkek";
                echo '
                <h2>Hastanın bilgileri</h2><br><br><br>
                <b >Adı ve Soyadı:   </b>'.$kullanici['Ad'].' '.$kullanici['Soyad'].'<br>
                <b>Kullanıcı Adı:   </b>'.$kullanici['KullaniciAdi'].'<br>
                <b>Cinsiyeti:   </b>'.$cinsiyet.'<br><br>
                <b>Boyu:   </b>'.$hasta['Boy'].'<br>
                <b>Kilosu:   </b>'.$hasta['Kilo'].'<br>
                <b>Yağ oranı:   </b>'.$hasta['YagOrani'].'<br><br><br>

                <a href="yeni-diyet-listesi.php" class="button ButtonS"><b>Yeni Liste Oluştur</b></a><br><br><br>
                <h4>Listesini değiştir</h4>
                <form method="post">
                    <select name="tabloId">
                    ';
                    $diyetisyenId = $_SESSION['Id'];
                    $listele = $db->query("SELECT * FROM diyettablosu where DiyetisyenId =$diyetisyenId", PDO::FETCH_ASSOC);
                        if ( $listele->rowCount() ) //rawcountu 0 değilse
                        {
                            foreach( $listele as $gelenveri )
                            {
                                if($gelenveri['Id'] ==$hasta['DiyetTabloId'])
                                    echo '<option selected="selected" value="'.$gelenveri['Id'].'">'.$gelenveri['TabloAdi'].'</option>';
                                else
                                    echo '<option value="'.$gelenveri['Id'].'">'.$gelenveri['TabloAdi'].'</option>';
                            }
                        }
                        echo '<input type="hidden" name="kullaniciIds" value="'.$kullanici['Id'].'">';
                    ?>
                    </select>

                <input type="submit" value="Değiştir">
                </div>
			</div>
	</article>

			<table></table>
		</section>
		<div class="clear"></div>

	</section>
	

</body>
</html>
<?php
if(isset($_POST['tabloId'])){
    $tabloId = $_POST['tabloId'];
    $kId = $_POST['kullaniciIds'];
    $insert = $db -> exec("UPDATE hastabilgi SET DiyetTabloId='$tabloId' where KullaniciId='$kId'");
}

?>