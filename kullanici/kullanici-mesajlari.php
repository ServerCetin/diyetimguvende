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
    <title>Mesajlar-Diyetin Güvende!</title>
    <link rel="stylesheet" href="/css/styles.css" type="text/css" />

    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
</head>

<body>

<section id="body" class="width">
    <?php include "../ortak/get-menu.php"?>


    <section id="content" class="column-right">

        <article>

            <div class="beyaz" >

                <fieldset>
                    <legend>Mesaj Gönder</legend><br>
                  
                        <?php
                        include "../baglan.php";
                        $id = $_SESSION['Id'];
                        $gel = $db->prepare("SELECT * FROM hastabilgi WHERE KullaniciId ='{$id}'");
                        $gel->execute(array('KullaniciId'));
                        $gel1=$gel->fetch();
                        if(empty($gel1['KocId']) && empty($gel1['DiyetisyenId'])  ){
                            echo "<br><p><font style='color:green' size='6'face='Georgia, Arial'>Koçunuz ve diyetisyeniniz bulunmadığı için herhangi bir mesajınız yok!</h2></p>";
                            echo "<br><br><center><img src='../images/logo.png' width='250'hight='250' value='Diyetin Güvende'></center><br><br>";
                            }
                        else
                        {
                            echo"  <table>
                        <th>
                        <th>Diyetisyene Mesaj</th>
                        <th>Koçuna Mesaj</th>
                        </th>";
                        

                        $query = $db->query("SELECT * FROM hastabilgi where KullaniciId= $id", PDO::FETCH_ASSOC);

                        if ( $query->rowCount() ){
                        
                            foreach( $query as $hastaBilgi ){
                            
                                $diyetisyenId = $hastaBilgi['DiyetisyenId'];
                                $kocId = $hastaBilgi['KocId'];

                                $hastakullanici = $db->query("SELECT * FROM kullanici WHERE Id = $id")->fetch(PDO::FETCH_ASSOC);
                                $kAdi = $hastakullanici['KullaniciAdi'];
                                $kocVarMi = false;
                                $diyetisyenVarMi = false;
                                if($kocId){
                                    $hastaKoc = $db->query("SELECT * FROM kullanici WHERE Id = $kocId")->fetch(PDO::FETCH_ASSOC);
                                    $kocVarMi = true;
                                }
                                if($diyetisyenId){
                                    $hastaDiyetisyen = $db->query("SELECT * FROM kullanici WHERE Id = $diyetisyenId")->fetch(PDO::FETCH_ASSOC);
                                    $diyetisyenVarMi = true;
                                }

                                print'
                                
                                     <tr> <td>Seç</td>';
                                if($diyetisyenVarMi){
                                    echo '
                                       
										<td>
                                             <form method="GET" action="../ortak/mesajlar.php">
                                                <input type="hidden" value="'.$diyetisyenId.'" name="kullaniciId">
                                                <input type="submit" class="formbutton" value="Diyetisyene Mesaj"> 
                                             </form>
                                        </td>';
                                }
                                if($kocVarMi) {
                                    print '
                                        <td>
                                            <form method="GET" action="../ortak/mesajlar.php">
                                                <input type="hidden" value="'.$kocId.'" name="kullaniciId">
                                                <input type="submit" class="formbutton"value="Koça Mesaj"> 
                                            </form>
                                                
                                        </td>';
                                }
                                print '
                                    </tr>
                                </form>';
                        }    
                    }

                        ?>
                    </table>

                    <table style="margin-top: 40px;">
                        <tr>
                            <th>Gelen Mesajlar</th>
                            <th>Kimden</th>
                            <th>Gönderilme Tarihi</th>
                        </tr>
                        <?php

                        $query = $db->query("SELECT * FROM kullanicimesaj where AlanId = $id", PDO::FETCH_ASSOC);
                        if ( $query->rowCount() ){
                            foreach( $query as $mesaj ){
                                $kkId= $mesaj['GonderenId'];
                                $karsiKullanici = $db->query("SELECT * FROM kullanici WHERE Id = $kkId")->fetch(PDO::FETCH_ASSOC);
                               
                                    
                                print '
                                <tr>
                                    <td>'.$mesaj['Mesaj'].'</td>
                                    <td>'.$karsiKullanici['KullaniciAdi'].'</td>
                                    <td>'.$mesaj['GonderilmeTarihi'].'</td>
                                </tr>
                            ';
                        }
                        
                            }
                        }
                    
              echo "</table><br><br>

            </div>";    
        ?>
        </article>

    </section>

    <div class="clear"></div>

</section>

</body>
</html>
