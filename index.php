<?php
define('MONEROOO_ACCESS', true);
function minify_html($buffer) {
    $search = array(
        '/\n/',
        '/\.[ ]+/',
        '/[ ]+/',
        '/[\t]/'
    );
    $replace = array('', '.', ' ', '');
    $buffer = preg_replace($search, $replace, $buffer);
    return $buffer;
}
ob_start("minify_html");

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");

$currencies = [
    "EUR", "USD", "GBP", "CHF", "RUB", "CNY", "JPY", "IDR", "KRW", "TRY", "AUD", "BMD", "CAD", 
    "HKD", "NZD", "SGD", "TWD", "ILS", "PLN", "ZAR", "CZK", "DKK", "NOK", "SEK", "ARS", "CLP", 
    "PHP", "MXN", "BHD", "KWD", "BRL", "MYR", "VEF", "UAH", "VND", "BDT", "HUF", "MMK", "NGN", 
    "THB", "AED", "SAR", "PKR", "LKR", "INR", "BTC", "LTC", "ETH", "XAG", "XAU", "GEL"
];

include_once('coingecko.php');

$json_file = 'coingecko.json';
$api_data = file_exists($json_file) ? json_decode(file_get_contents($json_file), true) : [];

foreach ($currencies as $curr) {
    $key = strtolower($curr);
    ${$curr} = isset($api_data[$key]['lastValue']) ? $api_data[$key]['lastValue'] : 0;
}

$time_cg = isset($api_data['time']) ? date("H:i:s", $api_data['time']) : date("H:i:s");

$lang = 'en'; 
if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
    $browser_lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    $full_lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 5);
    if ($browser_lang == 'zh') {
        $lang = (strpos($full_lang, 'Hant') !== false || $full_lang == 'zh-HK' || $full_lang == 'zh-TW') ? 'zh-Hant' : 'zh';
    } elseif ($full_lang == 'pt-BR') {
        $lang = 'pt'; 
    } else {
        $lang = $browser_lang;
    }
}
$allowed_langs = ['de','es','it','zh','zh-Hant','nl','pl','el','pt','ru','cs','fa','tr','fr','da','ar','ta'];
if (!in_array($lang, $allowed_langs)) { $lang = 'en'; }
require_once "lang/" . strtolower($lang) . ".php";

$xmr_in_fiat = "0,00";
$xmr_in = "EUR";

if (isset($_GET["in"])) {
    $target_currency = strtoupper(htmlspecialchars($_GET["in"]));
    $target_key = strtolower($target_currency);
    if (isset($api_data[$target_key]['lastValue'])) {
        $xmr_in = $target_currency;
        $current_fiat_val = $api_data[$target_key]['lastValue'];
        $decimals = (in_array($target_currency, ['BTC', 'LTC', 'ETH', 'XAG', 'XAU'])) ? 8 : 2;
        $xmr_in_fiat = number_format($current_fiat_val, $decimals, '.', '');
    }
} else {
    $eur_val = $api_data['eur']['lastValue'] ?? 0;
    $xmr_in_fiat = number_format($eur_val, 2, '.', '');
}
?>

<!DOCTYPE html>
<html lang="<?php echo $lang; ?>"<?php if(isset($l_rtl) && $l_rtl == 'true'){echo ' dir="rtl"';} ?>>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $l_page_title; ?></title>
    <meta name="description" content="<?php echo $l_meta_description; ?>"/>
    <meta name="theme-color" content="#193e4c">
    <meta name="msapplication-TileColor" content="#193e4c">
    <meta name="msapplication-TileImage" content="img/mstile-144x144.png">
    <meta name="application-name" content="Moner.ooo" />
    <meta name="apple-mobile-web-app-title" content="Moner.ooo" />
    <meta name="apple-mobile-web-app-status-bar-style" content="#193e4c" />
    <link rel="icon" type="image/png" href="img/favicon-32x32.png" sizes="32x32" />
    <link rel="manifest" href="manifest.json?v=<?php echo filemtime('manifest.json'); ?>">
    <link rel="apple-touch-icon" sizes="152x152" href="img/apple-touch-icon-152x152.png">
    <link rel="stylesheet" href="css/main.css?v=<?php echo filemtime('css/main.css'); ?>">    
</head>

<body>
    <div class="container pt-4">
        <div class="row">            
            <div class="col-12">
                <div class="cursor-default text-center text-white">
                    <h1><span style="color:#4d4d4d;">&darr;</span>&nbsp;<span style="color:#ff6600;" title="Monero">XMR</span>&nbsp;<?php echo $l_title_h1; ?>&nbsp;<span style="color:#4d4d4d;">&darr;</span></h1>

                    <div class="fiat-btns table-responsive">
                        <table class="table table-sm table-borderless">
                            <tbody>
                                <?php 
                                $chunks = array_chunk($currencies, 10); 

                                foreach($chunks as $row): 
                                ?>
                                <tr>
                                    <?php foreach($row as $curr): 
                                        $curr_lower = strtolower($curr);
                                        $label_var = "l_" . $curr_lower;
                                        $tooltip_text = isset($$label_var) ? $$label_var : $curr;
                                    
                                    if($curr == "GEL"){echo "<td class='hidden-data'>";}else{echo "<td>";}?><button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='?in=<?php echo $curr; ?>'><b><?php echo $tooltip_text; ?></b></a>" data-bs-toggle="tooltip" data-bs-html="true" data-placement="top"><?php echo $curr; ?></button></td>
                                    <?php endforeach; ?>
                                </tr>

                                <tr class="hidden-data">
                                    <?php foreach($row as $curr): 
                                        $val = isset($$curr) ? $$curr : 0;
                                        echo "<td>" . str_replace(".", ",", $val) . "</td>";
                                    endforeach; ?>
                                </tr>
                                <?php endforeach; ?>
                                <tr class="hidden-data">
                                    <td colspan="7"><?php echo $l_moneroooTable; ?></td>
                                    <td>Unix Time:</td>
                                    <td colspan="2"><?php echo $api_data['time']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <hr class="xmr" />
                
                <div class="input-group input-group-lg mb-1">
                    <button onclick="window.copyToClipboard('xmrInput')" class="btn-outline-secondary input-group-text clipboard-copy" title="<?php echo $l_clipboard_copy_tooltip; ?>" data-bs-toggle="tooltip" data-bs-html="true" data-placement="top">&#128203;</button>
                    
                    <input class="form-control" 
                        id="xmrInput" 
                        type="text" 
                        spellcheck="false" 
                        autocorrect="off" 
                        inputmode="decimal" 
                        aria-label="<?php echo $l_xmrInput; ?>" 
                        aria-describedby="basic-addon-xmr" 
                        value="1" 
                        oninput="window.validateAndConvert(this, 'xmr')">
                    
                    <input class="input-group-text" id="basic-addon-xmr" type="text" value="XMR" aria-label="Monero" disabled>
                </div>
                
                <div class="equals-box text-center pt-1">
                    <span class="equals-text cursor-default" style="font-size: 2rem;">=</span>
                </div>
                
                <div class="fiatDiv input-group input-group-lg mb-3">
                    <button onclick="window.copyToClipboard('fiatInput')" class="btn-outline-secondary input-group-text clipboard-copy" title="<?php echo $l_clipboard_copy_tooltip; ?>" data-bs-toggle="tooltip" data-bs-html="true" data-placement="top">&#128203;</button>
                    
                    <input class="form-control" 
                        id="fiatInput" 
                        type="text" 
                        spellcheck="false" 
                        autocorrect="off" 
                        inputmode="decimal" 
                        aria-label="<?php echo $l_fiatInput; ?>" 
                        aria-describedby="basic-addon-fiat" 
                        value="<?php echo $xmr_in_fiat; ?>" 
                        oninput="window.validateAndConvert(this, 'fiat')">
                           
                    <select class="input-group-text cursor-pointer" id="selectBox" onchange="window.xmrConvert(document.getElementById('xmrInput').value)" aria-label="<?php echo $l_fiatSelect; ?>">
						<?php
						$curr_lower_in = strtolower($xmr_in);
						$label_var_in = "l_" . $curr_lower_in;
						$full_name_in = isset($$label_var_in) ? $$label_var_in : $xmr_in;
						echo '<option value="'.$xmr_in.'" selected>'.$full_name_in.'</option>';
						foreach($currencies as $curr) {
							if($curr != $xmr_in) {
								$curr_lower = strtolower($curr);
								$label_var = "l_" . $curr_lower;
								$full_name = isset($$label_var) ? $$label_var : $curr;
								echo '<option value="'.$curr.'">'.$full_name.'</option>';
							}
						}
						?>
					</select>
                </div>
                
                <hr class="xmr" />
                <small class="cursor-default text-white text-info">
                    <?php echo $l_info ?? ''; ?>
                </small>
                <hr />
                <small class="cursor-default text-white">
                    <?php echo ($l_getmonero ?? '') . ($l_countrymonero ?? ''); ?>
                </small>
            </div>
        </div>
    </div>

<script>
window.translations = {
    copySuccess: "<?php echo $l_copytoclipboard_success_text; ?>",
    copyFail: "<?php echo $l_copytoclipboard_error_text; ?>",
    refreshMinute: "<?php echo $l_refresh_info_minute; ?>",
    refreshMinutes: "<?php echo $l_refresh_info_minutes; ?>",
    refreshSeconds: "<?php echo $l_refresh_info_seconds; ?>"
};
	
window.appConfig = {
    refreshInterval: <?php echo $api_refresh_time * 1000; ?>,
	lastUpdate: <?php echo $api_data['time']; ?>
};

window.currencyData = {
    <?php
    foreach($currencies as $curr) {
        $rate = ${$curr};
        
        $apiDigits = 0;
        if (strpos((string)$rate, '.') !== false) {
            $apiDigits = strlen(substr(strrchr((string)$rate, "."), 1));
        }

        $digits = (in_array($curr, ['BTC', 'LTC', 'ETH', 'XAU', 'XAG'])) ? 8 : max(2, $apiDigits);
        
        echo '"'.$curr.'": { rate: '.$rate.', digits: '.$digits.' },' . "\n";
    }
    ?>
};
</script>
<script src="js/main.js?v=<?php echo filemtime('js/main.js'); ?>" defer></script>
</body>
</html>
<?php ob_end_flush(); ?>
