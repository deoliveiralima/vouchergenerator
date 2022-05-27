<?php

require_once 'vendor/autoload.php';

use chillerlan\QRCode\QRCode;


$data = 'https://imasters.com.br'; //inserindo a URL do iMasters

echo '<img src="'.(new QRCode)->render($data).'" />'; //gerando o QRCode em uma tag img



echo "<br>";


// ler arquivo csv e atribuir cada linha que é um voucher a um array
$handle = fopen("vouchers.csv", "r");
$row = 0;
while ($line = fgetcsv($handle, 1000, ",")) {
	if ($row++ == 0) {
		continue;
	}
	
	$vouchers[] = $line[0];
}

$urlbase = "http://10.145.0.1:8004/index.php?zone=wiff_visitantes&voucher=";


//imprimir os vouchers
foreach($vouchers as $voucher){
   // echo($voucher) . "<br><br><br>";
   echo '<img src="'.(new QRCode)->render($urlbase."".$voucher).'" /> <br>'; //gerando o QRCode em uma tag img
    echo "<a href='http://10.145.0.1:8004/index.php?zone=wiff_visitantes&voucher=$voucher'> $voucher </a><br><br>";
}

fclose($handle);