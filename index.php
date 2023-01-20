<?php

if ($_GET['setweb']){
  $dir = $_SERVER['PHP_SELF'];
  $server = $_SERVER['SERVER_NAME'];
  if (!$_SERVER['HTTP_X_FORWARDED_PROTO'] and $_SERVER['HTTP_X_FORWARDED_PROTO'] !== "https" ){
    die("A url do bot deve ser https ");
  }
  
  $token = file_get_contents('./token.txt');
    $res = file_get_contents('https://api.telegram.org/bot'.$token.'/setwebhook?url='."https://".$server.$dir);
    if ($res){
      echo $res;
    }else{
      die("Ocorreu um erro ao seta a utl !");
    }
    die;
}


while(ob_get_level()) ob_end_clean();
header('Connection: close');
ignore_user_abort();
ob_start();

?>

<!DOCTYPE html>
<html>
<head>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<title> teste</title>
</head>
<body id='gradient'>
	<style type="text/css">
        body {
            background: #010101;
        }
        #colos{
        	font-size: 3em;

        	border-radius: 10px;
        	padding: 10px;
		/*	-webkit-box-shadow: 9px 7px 5px rgba(50, 50, 50, 0.77);
			-moz-box-shadow:    9px 7px 5px rgba(50, 50, 50, 0.77);
			box-shadow:         9px 7px 5px rgba(50, 50, 50, 0.77);*/
			border: 1px solid transparent;
			text-shadow: black 0.2em 0.2em 0.3em;
        	
        }
        #center{
        	margin-top: 10em;
        }
       
    </style>

	<center id='center'>
		<span id='colos'>TERRORZINHO home pag </span>
	</center>

</body>

<script type="text/javascript">

	setInterval(function altercor() {
		var ele = document.getElementById('colos');
		var letras  = document.getElementById('colos').innerText;

		var spans = '';
		// console.log(letras.length);
		for (var pos = 0; pos < letras.length; pos++) {
      var coreesd = [];
			var r = Math.floor(Math.random() * 40);
			var g = Math.floor(Math.random() * 40);
			var b = Math.floor(Math.random() * 40);
			 var letraatual = letras[pos];
			 var span = `<span id='${pos}' style='color: rgb(${r}, ${g}, ${b});'>${letraatual}</span>`;
			  spans += span;
	 //	
			}

		document.getElementById('colos').innerHTML = spans;

	}, 1000);

var cores = new Array( [62,35,255], [60,255,60], [255,35,98], [45,175,230], [255,0,255], [255,128,0] ),
    indices = [0,1,2,3],
    i = 0,
    fator_anima = 0.002,
    veloc_anima = 10;
 
function atualiza(){
  var c0_0 = cores[indices[0]],
      c0_1 = cores[indices[1]],
      c1_0 = cores[indices[2]],
      c1_1 = cores[indices[3]];
 
  var passo = 1 - i,
    r1 = Math.round(passo * c0_0[0] + i * c0_1[0]),
    g1 = Math.round(passo * c0_0[1] + i * c0_1[1]),
    b1 = Math.round(passo * c0_0[2] + i * c0_1[2]),
    r2 = Math.round(passo * c1_0[0] + i * c1_1[0]),
    g2 = Math.round(passo * c1_0[1] + i * c1_1[1]),
    b2 = Math.round(passo * c1_0[2] + i * c1_1[2]),
    color1 = "rgb("+r1+","+g1+","+b1+")",
    color2 = "rgb("+r2+","+g2+","+b2+")";
 
 $('#gradient').css({
  background: "-webkit-gradient(linear, left top, right top, from("+color1+"), to("+color2+"))"}).css({
  background: "-moz-linear-gradient(left, "+color1+" 0%, "+color2+" 100%)"});
 
 i += fator_anima;
 
 if(i >= 1){
    i %= 1;
    indices[0] = indices[1];
    indices[2] = indices[3];
 
    indices[1] = (indices[1] + Math.floor( 1 + Math.random() * (cores.length - 1))) % cores.length;
    indices[3] = (indices[3] + Math.floor( 1 + Math.random() * (cores.length - 1))) % cores.length;
  }
}
 
setInterval(atualiza,veloc_anima)
</script>
</html>

<?php

$size = ob_get_length();
header("Content-Length: $size");
ob_end_flush();
flush();

include("./terrorzinho.php");



