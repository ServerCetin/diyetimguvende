<?php
session_start();
ob_start();

?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">

<title>Diyetin Güvende!</title>
<link rel="stylesheet" href="styles.css" type="text/css" />
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
</head>

<body>

		<section id="body" class="width">
			<?php if($_SESSION["kullaniciTur"] == "Spor Hocası"){include "sporkocumenu.php";}?>


			<section id="content" class="column-right">
                		
	    <article>
			
			<div class="beyaz" style="padding-top: 50px"  >
			<form>	
				
			
			<h4>Öğrencilerim</h4><br>
				<table id="hastalistesi">
  <tr>
    <th>Öğrenci Adı Soyadı</th>
	<th style="width:200px;">Git</th>
    
  </tr>
  <tr>
    <td>Gözde Çetinkaya</td>
    <td>
		<a href="#" class="button button-reversed">Git</a>
		<a href="#" class="button">Kaldır</a>
	</td>
  </tr>
  <tr>
    <td>Semih Hatıl</td>
   
    <td>
		<a href="#" class="button button-reversed">Git</a>
		<a href="#" class="button">Kaldır</a></td>
	</tr>
  <tr>
    <td>Server Çetin</td>
    
    <td>
		<a href="#" class="button button-reversed">Git</a>
		<a href="#" class="button">Kaldır</a>
	</td>
  </tr>
  <tr>
    <td>Arda Çekem</td>
    
    <td>
		<a href="#" class="button button-reversed">Git</a>
		<a href="#" class="button">Kaldır</a>
	</td>
  </tr>
  <tr>
    <td>Tolgahan Acar</td>
    
    <td>
		<a href="#" class="button button-reversed">Git</a>
		<a href="#" class="button">Kaldır</a>
	</td>
  </tr>
  
</table>
			</form>	
				</div>
		</article>
			
		
				
		

			
			

		</section>

		<div class="clear"></div>

	</section>
	

</body>
</html>