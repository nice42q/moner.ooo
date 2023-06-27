<?php
$new_array = array();
$array = array("EUR",
	"BTC",
	"USD",
	"GBP",
	"CHF",
	"RUB",
	"CNY",
	"JPY",
	"IDR",
	"KRW",
	"TRY",
	"AUD",
	"BMD",
	"CAD",
	"HKD",
	"NZD",
	"SGD",
	"TWD",
	"ILS",
	"PLN",
	"ZAR",
	"CZK",
	"DKK",
	"NOK",
	"SEK",
	"ARS",
	"CLP",
	"PHP",
	"MXN",
	"BHD",
	"KWD",
	"BRL",
	"MYR",
	"VEF",
	"UAH",
	"VND",
	"BDT",
	"HUF",
	"MMK",
	"NGN",
	"THB",
	"AED",
	"SAR",
	"PKR",
	"LKR",
	"INR",
	"BTC",
	"LTC",
	"ETH",
	"XAG",
	"XAU");

//echo "<h1>localmonero.co</h1>";

// Die Standard-Zeitzone, die verwendet werden soll, setzen.
date_default_timezone_set('Europe/Berlin');

// Holt den letzten Wert für die if Abfrage
$xmrdatas = json_decode(file_get_contents("localmonero.json"), true);

// Liefert den aktuellen Unix-Zeitstempel
$zeit = time();

// Sind ~30 Minuten vergangen?
if(($zeit - $xmrdatas['time']) >= 5){
    //echo "Gespeicherte Zeit: ".$xmrdatas['time']."<br/>Aktuelle Zeit: ".$zeit;
	
	// API key -> https://agoradesk.com/ Account registrieren und API Key anfordern (kostenlos)
	$access_key = '';

	// Initialize CURL
	//$ch = curl_init('https://min-api.cryptocompare.com/data/price?api_key='.$access_key.'&fsym=XMR&tsyms=BTC,USDT,ETH,USD,EUR,LTC,BCH,GBP,DOGE,USDC,DASH,CNY,BNB,RUB,UAH,KRW,TUSD,DAI,JPY,WAVES,INR,BUSD,BRL,PLN,UNO,FTC,NZDT,DOTC,EOS,HITBITC,EURS,SAI,EURN,BNT,NANO,XLM,XRP,KNC,ZEC,OMG,BITUSD,BITCNY,BTS,RUR,QC,XQR,TRY,CHFT,CHF,SGD,HKD,PAX,AED,MYR,CAD,AUD,IDR,ZAR');
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://agoradesk.com/api/v1/moneroaverage/ticker-all-currencies');
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: '.$access_key.''));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_USERAGENT, 'MoneroooBot/1.0 (+https://moner.ooo/bot)');

	// Store the data:
	$json = curl_exec($ch);
	curl_close($ch);
    
	if ($json === null) {
		// Fehler beim Dekodieren der JSON-Daten
		die('Fehler beim Dekodieren der JSON-Daten');
	}

    // Sortiert/Formatiert die Ausgabe
    $sort_array = json_decode($json, true);

    // Zeit wird ergänzt
    $new_array['time'] = $zeit;

	foreach ($array as $fiatValue) {
		if (array_key_exists($fiatValue, $sort_array['data'])) {
			$new_array[$fiatValue]['lastValue'] = $sort_array['data'][$fiatValue]['avg_24h'];
			$new_array[$fiatValue]['lastDate'] = $zeit;
		}else{
			$new_array[$fiatValue]['lastValue'] = $xmrdatas[$fiatValue]['lastValue'];
			$new_array[$fiatValue]['lastDate'] = $xmrdatas[$fiatValue]['lastDate'];
		}
		//print_r($new_array);
	}

    // Werte in die .json gespeichert
	file_put_contents("localmonero.json", json_encode($new_array));
	
    // echo "<br/>Sync.<hr/>";
    
}//else{
	//echo "Keine Daten, noch zu früh!<br/><br/>";
    //echo "Gespeicherte Zeit: ".$xmrdatas['time']."<br/>Aktuelle Zeit: ".$zeit."<br/><br/>Differenz: ".$zeit - $xmrdatas['time']."<br/><hr/>";
//}
?>