<?php
if (!defined('MONEROOO_ACCESS')) {
    header('HTTP/1.1 403 Forbidden');
    exit('Direct access denied.');
}
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    header('HTTP/1.1 403 Forbidden');
    exit('Direct access denied.');
}
$json_file = "coingecko.json";
$xmrdatas = file_exists($json_file) ? json_decode(file_get_contents($json_file), true) : [];

$time = time();
include_once('cg_api_key.php');

if(($time - ($xmrdatas['time'] ?? 0)) >= $api_refresh_time){
	$new_array = array();
	$array = array("EUR", "BTC", "USD", "GBP", "CHF", "RUB", "CNY", "JPY", "IDR", "KRW", "TRY", "AUD", "BMD", "CAD", "HKD", "NZD", "SGD", "TWD", "ILS", "PLN", "ZAR", "CZK", "DKK", "NOK", "SEK", "ARS", "CLP", "PHP", "MXN", "BHD", "KWD", "BRL", "MYR", "VEF", "UAH", "VND", "BDT", "HUF", "MMK", "NGN", "THB", "AED", "SAR", "PKR", "LKR", "INR", "GEL", "LTC", "ETH", "XAG", "XAU");


    $vs_currencies = 'btc%2Ceth%2Cltc%2Cbch%2Cbnb%2Ceos%2Cxrp%2Cxlm%2Clink%2Cdot%2Cyfi%2Cusd%2Caed%2Cars%2Caud%2Cbdt%2Cbhd%2Cbmd%2Cbrl%2Ccad%2Cchf%2Cclp%2Ccny%2Cczk%2Cdkk%2Ceur%2Cgbp%2Cgel%2Chkd%2Chuf%2Cidr%2Cils%2Cinr%2Cjpy%2Ckrw%2Ckwd%2Clkr%2Cmmk%2Cmxn%2Cmyr%2Cngn%2Cnok%2Cnzd%2Cphp%2Cpkr%2Cpln%2Crub%2Csar%2Csek%2Csgd%2Cthb%2Ctry%2Ctwd%2Cuah%2Cvef%2Cvnd%2Czar%2Cxdr%2Cxag%2Cxau%2Cbits%2Csats';
    $query_params = 'ids=monero&vs_currencies=' . $vs_currencies . '&include_market_cap=true&include_24hr_vol=true&include_24hr_change=true&include_last_updated_at=true';
    
    $headers = array();
    $headers[] = 'Accept: application/json';

    if (!empty($coingecko_pro_api_key)) {
        $url = 'https://pro-api.coingecko.com/api/v3/simple/price?' . $query_params;
        $headers[] = 'x-cg-pro-api-key: ' . $coingecko_pro_api_key;
    } elseif (!empty($coingecko_api_key)) {
        $url = 'https://api.coingecko.com/api/v3/simple/price?' . $query_params;
        $headers[] = 'x-cg-demo-api-key: ' . $coingecko_api_key;
    } else {
        $url = 'https://api.coingecko.com/api/v3/simple/price?' . $query_params;
    }

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_USERAGENT, 'MoneroooPriceBot/1.0 (https://moner.ooo)');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 15);
    
    $json = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    $sort_array = json_decode($json, true);

    if ($http_code === 200 && isset($sort_array['monero'])) {
        $new_sort_array = $sort_array['monero'];
        $new_array['time'] = $time;
        $new_sort_array['time'] = $time;

        foreach ($array as $fiatValue) {
            $fiatValue = strtolower($fiatValue);
            if (isset($sort_array['monero'][$fiatValue])) {
                $new_array[$fiatValue]['lastValue'] = $sort_array['monero'][$fiatValue];
                $new_array[$fiatValue]['lastDate'] = $time;
            } else {
                $new_array[$fiatValue]['lastValue'] = $xmrdatas[$fiatValue]['lastValue'] ?? 0;
                $new_array[$fiatValue]['lastDate'] = $xmrdatas[$fiatValue]['lastDate'] ?? $time;
            }
        }

        file_put_contents("coingecko.json", json_encode($new_array));
        file_put_contents("coingecko-original.json", json_encode($new_sort_array));
    } else {
        error_log("CoinGecko API ERROR: HTTP $http_code - " . substr($json, 0, 100));
    }
}
?>
