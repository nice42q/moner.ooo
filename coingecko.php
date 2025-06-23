<?php
include('cg_api_key.php');
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
	"GEL",
	"LTC",
	"ETH",
	"XAG",
	"XAU");

//echo "<h1>coingecko.com</h1>";

// Die Standard-Zeitzone, die verwendet werden soll, setzen.
//date_default_timezone_set('Europe/Berlin');

// Holt den letzten Wert für die if Abfrage
$xmrdatas = json_decode(file_get_contents("coingecko.json"), true);

// Liefert den aktuellen Unix-Zeitstempel
$zeit = time();

// Sind ~30 Minuten vergangen?
if(($zeit - $xmrdatas['time']) >= 300){
    //echo "Gespeicherte Zeit: ".$xmrdatas['time']."<br/>Aktuelle Zeit: ".$zeit;

	// Initialize CURL
	$ch = curl_init('https://api.coingecko.com/api/v3/simple/price?x_cg_demo_api_key='.$coingecko_api_key.'&ids=monero&vs_currencies=btc%2Ceth%2Cltc%2Cbch%2Cbnb%2Ceos%2Cxrp%2Cxlm%2Clink%2Cdot%2Cyfi%2Cusd%2Caed%2Cars%2Caud%2Cbdt%2Cbhd%2Cbmd%2Cbrl%2Ccad%2Cchf%2Cclp%2Ccny%2Cczk%2Cdkk%2Ceur%2Cgbp%2Cgel%2Chkd%2Chuf%2Cidr%2Cils%2Cinr%2Cjpy%2Ckrw%2Ckwd%2Clkr%2Cmmk%2Cmxn%2Cmyr%2Cngn%2Cnok%2Cnzd%2Cphp%2Cpkr%2Cpln%2Crub%2Csar%2Csek%2Csgd%2Cthb%2Ctry%2Ctwd%2Cuah%2Cvef%2Cvnd%2Czar%2Cxdr%2Cxag%2Cxau%2Cbits%2Csats&include_market_cap=true&include_24hr_vol=true&include_24hr_change=true&include_last_updated_at=true');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	// Store the data:
	$json = curl_exec($ch);
	curl_close($ch);
    
    // Sortiert/Formatiert die Ausgabe
        $sort_array = json_decode($json, true);
	$new_sort_array = $sort_array['monero'];

	// Zeit wird ergänzt
	$new_array['time'] = $zeit;
	$new_sort_array['time'] = $zeit;

	foreach ($array as $fiatValue) {
		$fiatValue = strtolower($fiatValue);
		if (array_key_exists($fiatValue, $sort_array['monero'])) {
			$new_array[$fiatValue]['lastValue'] = $sort_array['monero'][$fiatValue];
			$new_array[$fiatValue]['lastDate'] = $zeit;
		}else{
			$new_array[$fiatValue]['lastValue'] = $xmrdatas[$fiatValue]['lastValue'];
			$new_array[$fiatValue]['lastDate'] = $xmrdatas[$fiatValue]['lastDate'];
		}
			//print_r($new_array);
	}


    
        // Werte in die .json gespeichert
	file_put_contents("coingecko.json", json_encode($new_array));
	file_put_contents("coingecko-original.json", json_encode($new_sort_array));
	
    // echo "<br/>Sync.<hr/>";
    
}//else{
    //echo "Keine Daten, noch zu früh!<br/><br/>";
    //echo "Gespeicherte Zeit: ".$xmrdatas['time']."<br/>Aktuelle Zeit: ".$zeit."<br/><br/>Differenz: ".$zeit - $xmrdatas['time']."<br/><hr/>";
//}
?>
