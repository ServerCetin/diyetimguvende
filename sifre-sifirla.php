<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Şifremi Sıfırla</title>
<link rel="shortcut icon" type="image/png" href="favicon.png"/>
<link rel="stylesheet"  href="css/sifre-sifirla.css" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
    <style>
#msg {
       visibility: hidden;
    min-width: 250px;
    
    background-color:yellow;
    color: #000;
    text-align: center;
    border-radius: 2px;
    padding: 16px;
    position: fixed;
    z-index: 1;
    right: 30%;
    top: 30px;
    font-size: 17px;
	margin-right:50px;
}

#msg.show {
    visibility: visible;
    -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
    animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

@-webkit-keyframes fadein {
    from {top: 0; opacity: 0;} 
    to {top: 30px; opacity: 1;}
}

@keyframes fadein {
    from {top: 0; opacity: 0;}
    to {top: 30px; opacity: 1;}
}

@-webkit-keyframes fadeout {
    from {top: 30px; opacity: 1;} 
    to {top: 0; opacity: 0;}
}

@keyframes fadeout {
    from {top: 30px; opacity: 1;}
    to {top: 0; opacity: 0;}
}
</style>
</head>

<body>
<style>
body {
  background-image: url(./images/h1.png);
}
</style>
<div class="reset">

<form>
<h2 align="center" style="color:#fff;">Şifre Sıfırla</h2>
<input type="password" name="username" placeholder="Eski Şifre" /><br /><br />
<input type="password" name="username" placeholder="Yeni Şifre" /><br /><br />
<input type="password" name="username" placeholder="Yeni Şifreyi tekrar gir" /><br /><br />
<input type="button" value="Kaydet" onclick="myFunction()"/><br /><br />
<a href="index.php" style="text-decoration:none;">Giriş Sayfasına Geri Dön</a><br /><br />
<div id="msg">Şifre Başarı ile değiştirildi!</div>

<script>
function myFunction() {
    var x = document.getElementById("msg");
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
</script>
</form>
</div>
</body>
</html>
