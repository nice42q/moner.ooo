<?php
date_default_timezone_set('Europe/Berlin');
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

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

include('coingecko.php');

// Holt die API Daten
$api_cg = json_decode(file_get_contents('coingecko.json'));

// Holt die Zeit der letzten Abfrage
$time_cg = date("H:i:s", $api_cg->time);
$time = $time_cg;

// Holt die einzelnen Werte für die Berechnung
$BTC = $api_cg->btc->lastValue;
$EUR = $api_cg->eur->lastValue;
$USD = $api_cg->usd->lastValue;
$CHF = $api_cg->chf->lastValue;
$LTC = $api_cg->ltc->lastValue;
$CAD = $api_cg->cad->lastValue;
$AUD = $api_cg->aud->lastValue;
$HKD = $api_cg->hkd->lastValue;
$SGD = $api_cg->sgd->lastValue;
$GBP = $api_cg->gbp->lastValue;
$RUB = $api_cg->rub->lastValue;
$ZAR = $api_cg->zar->lastValue;
$TRY = $api_cg->try->lastValue;
$JPY = $api_cg->jpy->lastValue;
$PLN = $api_cg->pln->lastValue;
$INR = $api_cg->inr->lastValue;
$AED = $api_cg->aed->lastValue;
$ETH = $api_cg->eth->lastValue;
$UAH = $api_cg->uah->lastValue;
$KRW = $api_cg->krw->lastValue;
$BRL = $api_cg->brl->lastValue;
$MYR = $api_cg->myr->lastValue;
$CNY = $api_cg->cny->lastValue;
$XAU = $api_cg->xau->lastValue;
$XAG = $api_cg->xag->lastValue;
$VND = $api_cg->vnd->lastValue;
$VEF = $api_cg->vef->lastValue;
$THB = $api_cg->thb->lastValue;
$SAR = $api_cg->sar->lastValue;
$SEK = $api_cg->sek->lastValue;
$PKR = $api_cg->pkr->lastValue;
$NOK = $api_cg->nok->lastValue;
$LKR = $api_cg->lkr->lastValue;
$MMK = $api_cg->mmk->lastValue;
$HUF = $api_cg->huf->lastValue;
$ILS = $api_cg->ils->lastValue;
$KWD = $api_cg->kwd->lastValue;
$NGN = $api_cg->ngn->lastValue;
$NZD = $api_cg->nzd->lastValue;
$PHP = $api_cg->php->lastValue;
$IDR = $api_cg->idr->lastValue;
$TWD = $api_cg->twd->lastValue;
$ARS = $api_cg->ars->lastValue;
$BDT = $api_cg->bdt->lastValue;
$BHD = $api_cg->bhd->lastValue;
$BMD = $api_cg->bmd->lastValue;
$CLP = $api_cg->clp->lastValue;
$CZK = $api_cg->czk->lastValue;
$DKK = $api_cg->dkk->lastValue;
$MXN = $api_cg->mxn->lastValue;

// Lädt die Sprachdatei, nach der Sprache die im Browser eingestellt wurde
if(array_key_exists('HTTP_ACCEPT_LANGUAGE', $_SERVER)){
    $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
}else{
    $lang = "en";
}

if($lang == 'zh'){
	$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 5);
}

$acceptLang = ['de','es','it','zh-CN'];
$lang = in_array($lang, $acceptLang) ? $lang : 'en';
$lang = strtolower($lang);
require_once "lang/{$lang}.php"; 

if(isset($_GET["in"])) {
    $xmr_in = strtoupper(htmlspecialchars($_GET["in"]));

    if($xmr_in == 'USD'){
        $xmr_in_fiat = number_format($USD, 2);
    }elseif($xmr_in == 'GBP'){
        $xmr_in_fiat = number_format($GBP, 2);
    }elseif($xmr_in == 'CHF'){
        $xmr_in_fiat = number_format($CHF, 2);
    }elseif($xmr_in == 'RUB'){
        $xmr_in_fiat = number_format($RUB, 2);
    }elseif($xmr_in == 'CNY'){
        $xmr_in_fiat = number_format($CNY, 2);
    }elseif($xmr_in == 'JPY'){
        $xmr_in_fiat = number_format($JPY, 2);
    }elseif($xmr_in == 'AUD'){
        $xmr_in_fiat = number_format($AUD, 2);
    }elseif($xmr_in == 'BMD'){
        $xmr_in_fiat = number_format($BMD, 2);
    }elseif($xmr_in == 'CAD'){
        $xmr_in_fiat = number_format($CAD, 2);
    }elseif($xmr_in == 'HKD'){
        $xmr_in_fiat = number_format($HKD, 2);
    }elseif($xmr_in == 'NZD'){
        $xmr_in_fiat = number_format($NZD, 2);
    }elseif($xmr_in == 'SGD'){
        $xmr_in_fiat = number_format($SGD, 2);
    }elseif($xmr_in == 'TWD'){
        $xmr_in_fiat = number_format($TWD, 2);
    }elseif($xmr_in == 'CZK'){
        $xmr_in_fiat = number_format($CZK, 2);
    }elseif($xmr_in == 'CLP'){
        $xmr_in_fiat = number_format($CLP, 2);
    }elseif($xmr_in == 'DKK'){
        $xmr_in_fiat = number_format($DKK, 2);
    }elseif($xmr_in == 'NOK'){
        $xmr_in_fiat = number_format($NOK, 2);
    }elseif($xmr_in == 'PLN'){
        $xmr_in_fiat = number_format($PLN, 2);
    }elseif($xmr_in == 'SEK'){
        $xmr_in_fiat = number_format($SEK, 2);
    }elseif($xmr_in == 'TRY'){
        $xmr_in_fiat = number_format($TRY, 2);
    }elseif($xmr_in == 'UAH'){
        $xmr_in_fiat = number_format($UAH, 2);
    }elseif($xmr_in == 'ARS'){
        $xmr_in_fiat = number_format($ARS, 2);
    }elseif($xmr_in == 'PHP'){
        $xmr_in_fiat = number_format($PHP, 2);
    }elseif($xmr_in == 'AED'){
        $xmr_in_fiat = number_format($AED, 2);
    }elseif($xmr_in == 'BRL'){
        $xmr_in_fiat = number_format($BRL, 2);
    }elseif($xmr_in == 'KRW'){
        $xmr_in_fiat = number_format($KRW, 2);
    }elseif($xmr_in == 'MYR'){
        $xmr_in_fiat = number_format($MYR, 2);
    }elseif($xmr_in == 'SAR'){
        $xmr_in_fiat = number_format($SAR, 2);
    }elseif($xmr_in == 'VEF'){
        $xmr_in_fiat = number_format($VEF, 2);
    }elseif($xmr_in == 'VND'){
        $xmr_in_fiat = number_format($VND, 2);
    }elseif($xmr_in == 'ZAR'){
        $xmr_in_fiat = number_format($ZAR, 2);
    }elseif($xmr_in == 'BDT'){
        $xmr_in_fiat = number_format($BDT, 2);
    }elseif($xmr_in == 'HUF'){
        $xmr_in_fiat = number_format($HUF, 2);
    }elseif($xmr_in == 'ILS'){
        $xmr_in_fiat = number_format($ILS, 2);
    }elseif($xmr_in == 'MMK'){
        $xmr_in_fiat = number_format($MMK, 2);
    }elseif($xmr_in == 'NGN'){
        $xmr_in_fiat = number_format($NGN, 2);
    }elseif($xmr_in == 'THB'){
        $xmr_in_fiat = number_format($THB, 2);
    }elseif($xmr_in == 'BHD'){
        $xmr_in_fiat = number_format($BHD, 2);
    }elseif($xmr_in == 'KWD'){
        $xmr_in_fiat = number_format($KWD, 2);
    }elseif($xmr_in == 'PKR'){
        $xmr_in_fiat = number_format($PKR, 2);
    }elseif($xmr_in == 'LKR'){
        $xmr_in_fiat = number_format($LKR, 2);
    }elseif($xmr_in == 'INR'){
        $xmr_in_fiat = number_format($INR, 2);
    }elseif($xmr_in == 'IDR'){
        $xmr_in_fiat = number_format($IDR, 2);
    }elseif($xmr_in == 'MXN'){
        $xmr_in_fiat = number_format($MXN, 2);
    }elseif($xmr_in == 'BTC'){
        $xmr_in_fiat = number_format($BTC, 8);
    }elseif($xmr_in == 'LTC'){
        $xmr_in_fiat = number_format($LTC, 8);
    }elseif($xmr_in == 'ETH'){
        $xmr_in_fiat = number_format($ETH, 8);
    }elseif($xmr_in == 'XAG'){
        $xmr_in_fiat = number_format($XAG, 6);
    }elseif($xmr_in == 'XAU'){
        $xmr_in_fiat = number_format($XAU, 6);
    }else{
        $xmr_in_fiat = number_format($EUR, 2);
    }

}else{
    $xmr_in_fiat = number_format($EUR, 2);
}

$xmr_in_fiat = strtr($xmr_in_fiat, ",", " ");
?>
<!DOCTYPE html>
<html lang="<?php echo $lang_meta; ?>">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="HandheldFriendly" content="true" /> 
    <meta name="MobileOptimized" content="320" /> 
    
    <title lang="<?php echo $lang_meta; ?>"><?php echo $page_title; ?></title>
    <meta name="description" lang="<?php echo $lang_meta; ?>" content="<?php echo $meta_description; ?>"/>
    <meta name="keywords" lang="<?php echo $lang_meta; ?>" content="<?php echo $meta_keywords; ?>"/>
    
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="img/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="img/apple-touch-icon-60x60.png" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="img/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="img/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="img/apple-touch-icon-152x152.png" />
    <link rel="apple-touch-startup-image" href="img/favicon-196x196.png" />
    <link rel="icon" type="image/png" href="img/favicon-196x196.png" sizes="196x196" />
    <link rel="icon" type="image/png" href="img/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/png" href="img/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="img/favicon-16x16.png" sizes="16x16" />
    <link rel="icon" type="image/png" href="img/favicon-128.png" sizes="128x128" />
    <meta name="application-name" content="Moner.ooo" />
    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta name="msapplication-TileImage" content="img/mstile-144x144.png" />
    <meta name="msapplication-square70x70logo" content="img/mstile-70x70.png" />
    <meta name="msapplication-square150x150logo" content="img/mstile-150x150.png" />
    <meta name="msapplication-wide310x150logo" content="img/mstile-310x150.png" />
    <meta name="msapplication-square310x310logo" content="img/mstile-310x310.png" />
    <meta name="theme-color" content="#193e4c" />
    <meta name="apple-mobile-web-app-title" content="Moner.ooo" />
    <meta name="apple-mobile-web-app-status-bar-style" content="#193e4c" />
    
    <link href="css/main.css" rel="stylesheet" />
    
    <style>
        html {
            width: 100%;
            height: 100%;
            background-image: linear-gradient(to bottom right, #013c4a 0, #193e4c 44%, #004b5b 100%)!important;
            color: #fff;
            font-style: normal;
        }
        body {
            background-color: transparent;
        }
    </style>

    <link href="css/custom.css" rel="stylesheet" />
</head>

<body>
    <div class="container pt-4">
        <div class="row">            
            <div class="col-12">
                <div class="cursor-default text-center text-white">
                    <h1 lang="<?php echo $lang_meta; ?>"><span style="color:#4d4d4d;">&darr;</span>&nbsp;<span style="color:#ff6600;" title="Monero">XMR</span>&nbsp;<?php echo $title_h1;?>&nbsp;<span style="color:#4d4d4d;">&darr;</span></h1>
                    <div class="fiat-btns table-responsive">
                        <table class="table table-sm table-borderless">
                            <tbody>
                                <tr>
                                    <td><button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/'><b><?php echo $l_eur; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">EUR</button></td>
                                    <td><button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=USD'><b><?php echo $l_usd; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">USD</button></td>
                                    <td><button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=GBP'><b><?php echo $l_gbp; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">GBP</button></td>
                                    <td><button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=CHF'><b><?php echo $l_chf; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">CHF</button></td>
                                    <td><button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=RUB'><b><?php echo $l_rub; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">RUB</button></td>
                                    <td><button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=CNY'><b><?php echo $l_cny; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">CNY</button></td>
                                    <td><button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=JPY'><b><?php echo $l_jpy; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">JPY</button></td>
                                    <td><button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=IDR'><b><?php echo $l_idr; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">IDR</button></td>
                                    <td><button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=KRW'><b><?php echo $l_krw; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">KRW</button></td>
                                    <td><button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=TRY'><b><?php echo $l_try; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">TRY</button></td>
                                </tr>
                                <tr style="display:none;">
                                    <td><?php echo str_replace(".", ",", $EUR); ?></td>
                                    <td><?php echo str_replace(".", ",", $USD); ?></td>
                                    <td><?php echo str_replace(".", ",", $GBP); ?></td>
                                    <td><?php echo str_replace(".", ",", $CHF); ?></td>
                                    <td><?php echo str_replace(".", ",", $RUB); ?></td>
                                    <td><?php echo str_replace(".", ",", $CNY); ?></td>
                                    <td><?php echo str_replace(".", ",", $JPY); ?></td>
                                    <td><?php echo str_replace(".", ",", $IDR); ?></td>
                                    <td><?php echo str_replace(".", ",", $KRW); ?></td>
                                    <td><?php echo str_replace(".", ",", $TRY); ?></td>
                                </tr>
                                <tr>
                                    <td><button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=AUD'><b><?php echo $l_aud; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">AUD</button></td>
                                    <td><button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=BMD'><b><?php echo $l_bmd; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">BMD</button></td>
                                    <td><button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=CAD'><b><?php echo $l_cad; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">CAD</button></td>
                                    <td><button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=HKD'><b><?php echo $l_hkd; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">HKD</button></td>
                                    <td><button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=NZD'><b><?php echo $l_nzd; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">NZD</button></td>
                                    <td><button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=SGD'><b><?php echo $l_sgd; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">SGD</button></td>
                                    <td><button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=TWD'><b><?php echo $l_twd; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">TWD</button></td>
                                    <td><button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=ILS'><b><?php echo $l_ils; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">ILS</button></td>
                                    <td><button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=PLN'><b><?php echo $l_pln; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">PLN</button></td>
                                    <td><button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=ZAR'><b><?php echo $l_zar; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">ZAR</button></td>
                                </tr>
                                <tr style="display:none;">
                                    <td><?php echo str_replace(".", ",", $AUD); ?></td>
                                    <td><?php echo str_replace(".", ",", $BMD); ?></td>
                                    <td><?php echo str_replace(".", ",", $CAD); ?></td>
                                    <td><?php echo str_replace(".", ",", $HKD); ?></td>
                                    <td><?php echo str_replace(".", ",", $NZD); ?></td>
                                    <td><?php echo str_replace(".", ",", $SGD); ?></td>
                                    <td><?php echo str_replace(".", ",", $TWD); ?></td>
                                    <td><?php echo str_replace(".", ",", $ILS); ?></td>
                                    <td><?php echo str_replace(".", ",", $PLN); ?></td>
                                    <td><?php echo str_replace(".", ",", $ZAR); ?></td>
                                </tr>
                                <tr>
                                    <td><button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=CZK'><b><?php echo $l_czk; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">CZK</button></td>
                                    <td><button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=DKK'><b><?php echo $l_dkk; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">DKK</button></td>
                                    <td><button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=NOK'><b><?php echo $l_nok; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">NOK</button></td>
                                    <td><button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=SEK'><b><?php echo $l_sek; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">SEK</button></td>
                                    <td><button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=ARS'><b><?php echo $l_ars; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">ARS</button></td>
                                    <td><button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=CLP'><b><?php echo $l_clp; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">CLP</button></td>           
                                    <td><button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=PHP'><b><?php echo $l_php; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">PHP</button></td>
                                    <td><button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=MXN'><b><?php echo $l_mxn; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">MXN</button></td>
                                    <td><button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=BHD'><b><?php echo $l_bhd; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">BHD</button></td>
                                    <td><button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=KWD'><b><?php echo $l_kwd; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">KWD</button></td>
                                </tr>
                                <tr style="display:none;">
                                    <td><?php echo str_replace(".", ",", $CZK); ?></td>
                                    <td><?php echo str_replace(".", ",", $DKK); ?></td>
                                    <td><?php echo str_replace(".", ",", $NOK); ?></td>
                                    <td><?php echo str_replace(".", ",", $SEK); ?></td>
                                    <td><?php echo str_replace(".", ",", $ARS); ?></td>
                                    <td><?php echo str_replace(".", ",", $CLP); ?></td>           
                                    <td><?php echo str_replace(".", ",", $PHP); ?></td>
                                    <td><?php echo str_replace(".", ",", $MXN); ?></td>
                                    <td><?php echo str_replace(".", ",", $BHD); ?></td>
                                    <td><?php echo str_replace(".", ",", $KWD); ?></td>
                                </tr>
                                <tr>
                                    <td><button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=BRL'><b><?php echo $l_brl; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">BRL</button></td>
                                    <td><button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=MYR'><b><?php echo $l_myr; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">MYR</button></td>
                                    <td><button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=VEF'><b><?php echo $l_vef; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">VEF</button></td>
                                    <td><button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=UAH'><b><?php echo $l_uah; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">UAH</button></td>
                                    <td><button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=VND'><b><?php echo $l_vnd; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">VND</button></td>
                                    <td><button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=BDT'><b><?php echo $l_bdt; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">BDT</button></td>
                                    <td><button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=HUF'><b><?php echo $l_huf; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">HUF</button></td>
                                    <td><button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=MMK'><b><?php echo $l_mmk; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">MMK</button></td>
                                    <td><button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=NGN'><b><?php echo $l_ngn; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">NGN</button></td>
                                    <td><button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=THB'><b><?php echo $l_thb; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">THB</button></td>
                                </tr>
                                <tr style="display:none;">
                                    <td><?php echo str_replace(".", ",", $BRL); ?></td>
                                    <td><?php echo str_replace(".", ",", $MYR); ?></td>
                                    <td><?php echo str_replace(".", ",", $VEF); ?></td>
                                    <td><?php echo str_replace(".", ",", $UAH); ?></td>
                                    <td><?php echo str_replace(".", ",", $VND); ?></td>
                                    <td><?php echo str_replace(".", ",", $BDT); ?></td>
                                    <td><?php echo str_replace(".", ",", $HUF); ?></td>
                                    <td><?php echo str_replace(".", ",", $MMK); ?></td>
                                    <td><?php echo str_replace(".", ",", $NGN); ?></td>
                                    <td><?php echo str_replace(".", ",", $THB); ?></td>
                                </tr>
                                <tr>
                                    <td><button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=AED'><b><?php echo $l_aed; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">AED</button></td>
                                    <td><button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=SAR'><b><?php echo $l_sar; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">SAR</button></td>
                                    <td><button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=PKR'><b><?php echo $l_pkr; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">PKR</button></td>
                                    <td><button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=LKR'><b><?php echo $l_lkr; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">LKR</button></td>
                                    <td><button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=INR'><b><?php echo $l_inr; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">INR</button></td>
                                    <td><button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=BTC'><b><?php echo $l_btc; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">BTC</button></td>
                                    <td><button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=LTC'><b><?php echo $l_ltc; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">LTC</button></td>
                                    <td><button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=ETH'><b><?php echo $l_eth; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">ETH</button></td>
                                    <td><button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=XAG'><b><?php echo $l_xag; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">XAG</button></td>
                                    <td><button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=XAU'><b><?php echo $l_xau; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">XAU</button></td>
                                </tr>
                                <tr style="display:none;">
                                    <td><?php echo str_replace(".", ",", $AED); ?></td>
                                    <td><?php echo str_replace(".", ",", $SAR); ?></td>
                                    <td><?php echo str_replace(".", ",", $PKR); ?></td>
                                    <td><?php echo str_replace(".", ",", $LKR); ?></td>
                                    <td><?php echo str_replace(".", ",", $INR); ?></td>
                                    <td><?php echo str_replace(".", ",", $BTC); ?></td>
                                    <td><?php echo str_replace(".", ",", $LTC); ?></td>
                                    <td><?php echo str_replace(".", ",", $ETH); ?></td>
                                    <td><?php echo str_replace(".", ",", $XAG); ?></td>
                                    <td><?php echo str_replace(".", ",", $XAU); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr class="gold" />
                
                <div class="input-group">
                    <button onclick="copyToClipBoardXMR()" class="btn-outline-secondary input-group-text clipboard-copy" title="<?php echo $clipboard_copy_tooltip; ?>" data-toggle="tooltip" data-bs-html="true" data-placement="top">&#128203;</button>
                    <input class="form-control" id="xmrInput" type="text" spellcheck="false" autocorrect="off" inputmode="numeric" aria-label="<?php echo $l_xmrInput; ?>" aria-describedby="basic-addon-xmr" value="1" onchange="xmrConvert(this.value)" onkeyup="this.value = this.value.replace(/[^\.^,\d]/g, ''); this.value = this.value.replace(/\,/, '.'); if(this.value.split('.').length > 2){this.value = this.value.slice(0, -1);} xmrConvert(this.value)">
                    <input class="input-group-text" id="basic-addon-xmr" type="text" value="XMR" aria-label="Monero" disabled>
                </div>
                
                <div class="equals-box">
                    <span class="equals-text cursor-default">=</span>
                </div>
                
                <div class="fiatDiv input-group">
                    <button onclick="copyToClipBoardFiat()" class="btn-outline-secondary input-group-text clipboard-copy" title="<?php echo $clipboard_copy_tooltip; ?>" data-toggle="tooltip" data-bs-html="true" data-placement="top">&#128203;</button>
                    <input class="form-control" id="fiatInput" type="text" spellcheck="false" autocorrect="off" inputmode="numeric" aria-label="<?php echo $l_fiatInput; ?>" value="<?php echo $xmr_in_fiat; ?>" onchange="fiatConvert(this.value)" onkeyup="this.value = this.value.replace(/[^\.^,\d]/g, ''); this.value = this.value.replace(/\,/, '.'); if(this.value.split('.').length > 2){this.value = this.value.slice(0, -1);} fiatConvert(this.value)">
                    <select class="input-group-text cursor-pointer" id="selectBox" onchange="xmrConvert(this.value)" aria-label="<?php echo $l_fiatSelect; ?>">
                        <?php
                        if(isset($xmr_in)){
                            echo '<option value="'.$xmr_in.'">'.$xmr_in.'</option>';
                        }
                        ?>
                        <option value="EUR" label="<?php echo $l_eur; ?>">EUR</option>
                        <option value="USD" label="<?php echo $l_usd; ?>">USD</option>
                        <option value="GBP" label="<?php echo $l_gbp; ?>">GBP</option>
                        <option value="CHF" label="<?php echo $l_chf; ?>">CHF</option>
                        <option value="RUB" label="<?php echo $l_rub; ?>">RUB</option>
                        <option value="CNY" label="<?php echo $l_cny; ?>">CNY</option>
                        <option value="JPY" label="<?php echo $l_jpy; ?>">JPY</option>
                        <option value="IDR" label="<?php echo $l_idr; ?>">IDR</option>
                        <option value="KRW" label="<?php echo $l_krw; ?>">KRW</option>
                        <option value="TRY" label="<?php echo $l_try; ?>">TRY</option>
                        <option value="AUD" label="<?php echo $l_aud; ?>">AUD</option>
                        <option value="BMD" label="<?php echo $l_bmd; ?>">BMD</option>
                        <option value="CAD" label="<?php echo $l_cad; ?>">CAD</option>
                        <option value="HKD" label="<?php echo $l_hkd; ?>">HKD</option>
                        <option value="NZD" label="<?php echo $l_nzd; ?>">NZD</option>
                        <option value="SGD" label="<?php echo $l_sgd; ?>">SGD</option>
                        <option value="TWD" label="<?php echo $l_twd; ?>">TWD</option>
                        <option value="ILS" label="<?php echo $l_ils; ?>">ILS</option>
                        <option value="PLN" label="<?php echo $l_pln; ?>">PLN</option>
                        <option value="ZAR" label="<?php echo $l_zar; ?>">ZAR</option>
                        <option value="CZK" label="<?php echo $l_czk; ?>">CZK</option>
                        <option value="DKK" label="<?php echo $l_dkk; ?>">DKK</option>
                        <option value="NOK" label="<?php echo $l_nok; ?>">NOK</option>
                        <option value="SEK" label="<?php echo $l_sek; ?>">SEK</option>
                        <option value="ARS" label="<?php echo $l_ars; ?>">ARS</option>
                        <option value="CLP" label="<?php echo $l_clp; ?>">CLP</option>
                        <option value="PHP" label="<?php echo $l_php; ?>">PHP</option>
                        <option value="MXN" label="<?php echo $l_mxn; ?>">MXN</option>
                        <option value="BHD" label="<?php echo $l_bhd; ?>">BHD</option>
                        <option value="KWD" label="<?php echo $l_kwd; ?>">KWD</option>
                        <option value="BRL" label="<?php echo $l_brl; ?>">BRL</option>
                        <option value="MYR" label="<?php echo $l_myr; ?>">MYR</option>
                        <option value="VEF" label="<?php echo $l_vef; ?>">VEF</option>
                        <option value="UAH" label="<?php echo $l_uah; ?>">UAH</option>
                        <option value="VND" label="<?php echo $l_vnd; ?>">VND</option>
                        <option value="BDT" label="<?php echo $l_bdt; ?>">BDT</option>
                        <option value="HUF" label="<?php echo $l_huf; ?>">HUF</option>
                        <option value="MMK" label="<?php echo $l_mmk; ?>">MMK</option>
                        <option value="NGN" label="<?php echo $l_ngn; ?>">NGN</option>
                        <option value="THB" label="<?php echo $l_thb; ?>">THB</option>
                        <option value="AED" label="<?php echo $l_aed; ?>">AED</option>
                        <option value="SAR" label="<?php echo $l_sar; ?>">SAR</option>
                        <option value="PKR" label="<?php echo $l_pkr; ?>">PKR</option>
                        <option value="LKR" label="<?php echo $l_lkr; ?>">LKR</option>
                        <option value="INR" label="<?php echo $l_inr; ?>">INR</option>
                        <option value="BTC" label="<?php echo $l_btc; ?>">BTC</option>
                        <option value="LTC" label="<?php echo $l_ltc; ?>">LTC</option>
                        <option value="ETH" label="<?php echo $l_eth; ?>">ETH</option>
                        <option value="XAG" label="<?php echo $l_xag; ?>">XAG</option>
                        <option value="XAU" label="<?php echo $l_xau; ?>">XAU</option>
                    </select>
                </div>
                
                <hr class="gold" />
                <small class="cursor-default text-white text-info" lang="<?php echo $lang_meta; ?>">
                    <?php echo $info; ?>
                </small>
                <hr />
                <small class="cursor-default text-white" lang="<?php echo $lang_meta; ?>">
                    <?php echo $getmonero.$countrymonero; ?>
                </small>
            </div>
            
        </div>
    </div>


<script type="text/javascript">
    function fiatConvert(value)
    {
        let fiatAmount = document.getElementById("fiatInput").value;
        let xmrValue = document.getElementById("xmrInput");
        let selectBox = document.getElementById("selectBox").value;

        if (selectBox == "BTC") {
                let value = fiatAmount / <?php echo $BTC; ?>;
                xmrValue.value = value.toFixed(12);
        } else if (selectBox == "EUR") {
                let value = fiatAmount / <?php echo $EUR; ?>;
                xmrValue.value = value.toFixed(12);
        } else if (selectBox == "USD") {
                let value = fiatAmount / <?php echo $USD; ?>;
                xmrValue.value = value.toFixed(12);
        } else if (selectBox == "CHF") {
                let value = fiatAmount / <?php echo $CHF; ?>;
                xmrValue.value = value.toFixed(12);
        } else if (selectBox == "LTC") {
                let value = fiatAmount / <?php echo $LTC; ?>;
                xmrValue.value = value.toFixed(12);
        } else if (selectBox == "CAD") {
                let value = fiatAmount / <?php echo $CAD; ?>;
                xmrValue.value = value.toFixed(12);
        } else if (selectBox == "AUD") {
                let value = fiatAmount / <?php echo $AUD; ?>;
                xmrValue.value = value.toFixed(12);
        } else if (selectBox == "HKD") {
                let value = fiatAmount / <?php echo $HKD; ?>;
                xmrValue.value = value.toFixed(12);
        } else if (selectBox == "SGD") {
                let value = fiatAmount / <?php echo $SGD; ?>;
                xmrValue.value = value.toFixed(12);
        } else if (selectBox == "GBP") {
                let value = fiatAmount / <?php echo $GBP; ?>;
                xmrValue.value = value.toFixed(12);
        } else if (selectBox == "RUB") {
                let value = fiatAmount / <?php echo $RUB; ?>;
                xmrValue.value = value.toFixed(12);
        } else if (selectBox == "ZAR") {
                let value = fiatAmount / <?php echo $ZAR; ?>;
                xmrValue.value = value.toFixed(12);
        } else if (selectBox == "TRY") {
                let value = fiatAmount / <?php echo $TRY; ?>;
                xmrValue.value = value.toFixed(12);
        } else if (selectBox == "JPY") {
                let value = fiatAmount / <?php echo $JPY; ?>;
                xmrValue.value = value.toFixed(12);
        } else if (selectBox == "PLN") {
                let value = fiatAmount / <?php echo $PLN; ?>;
                xmrValue.value = value.toFixed(12);
        } else if (selectBox == "INR") {
                let value = fiatAmount / <?php echo $INR; ?>;
                xmrValue.value = value.toFixed(12);
        } else if (selectBox == "AED") {
                let value = fiatAmount / <?php echo $AED; ?>;
                xmrValue.value = value.toFixed(12);
        } else if (selectBox == "ETH") {
                let value = fiatAmount / <?php echo $ETH; ?>;
                xmrValue.value = value.toFixed(12);
        } else if (selectBox == "UAH") {
                let value = fiatAmount / <?php echo $UAH; ?>;
                xmrValue.value = value.toFixed(12);
        } else if (selectBox == "KRW") {
                let value = fiatAmount / <?php echo $KRW; ?>;
                xmrValue.value = value.toFixed(12);
        } else if (selectBox == "BRL") {
                let value = fiatAmount / <?php echo $BRL; ?>;
                xmrValue.value = value.toFixed(12);
        } else if (selectBox == "MYR") {
                let value = fiatAmount / <?php echo $MYR; ?>;
                xmrValue.value = value.toFixed(12);
        } else if (selectBox == "CNY") {
                let value = fiatAmount / <?php echo $CNY; ?>;
                xmrValue.value = value.toFixed(12);
        } else if (selectBox == "XAG") {
                let value = fiatAmount / <?php echo $XAG; ?>;
                xmrValue.value = value.toFixed(12);
        } else if (selectBox == "XAU") {
                let value = fiatAmount / <?php echo $XAU; ?>;
                xmrValue.value = value.toFixed(12);
        } else if (selectBox == "VEF") {
                let value = fiatAmount / <?php echo $VEF; ?>;
                xmrValue.value = value.toFixed(12);
        } else if (selectBox == "VND") {
                let value = fiatAmount / <?php echo $VND; ?>;
                xmrValue.value = value.toFixed(12);
        } else if (selectBox == "THB") {
                let value = fiatAmount / <?php echo $THB; ?>;
                xmrValue.value = value.toFixed(12);
        } else if (selectBox == "SAR") {
                let value = fiatAmount / <?php echo $SAR; ?>;
                xmrValue.value = value.toFixed(12);
        } else if (selectBox == "SEK") {
                let value = fiatAmount / <?php echo $SEK; ?>;
                xmrValue.value = value.toFixed(12);
        } else if (selectBox == "PKR") {
                let value = fiatAmount / <?php echo $PKR; ?>;
                xmrValue.value = value.toFixed(12);
        } else if (selectBox == "NZD") {
                let value = fiatAmount / <?php echo $NZD; ?>;
                xmrValue.value = value.toFixed(12);
        } else if (selectBox == "PHP") {
                let value = fiatAmount / <?php echo $PHP; ?>;
                xmrValue.value = value.toFixed(12);
        } else if (selectBox == "NOK") {
                let value = fiatAmount / <?php echo $NOK; ?>;
                xmrValue.value = value.toFixed(12);
        } else if (selectBox == "LKR") {
                let value = fiatAmount / <?php echo $LKR; ?>;
                xmrValue.value = value.toFixed(12);
        } else if (selectBox == "MMK") {
                let value = fiatAmount / <?php echo $MMK; ?>;
                xmrValue.value = value.toFixed(12);
        } else if (selectBox == "HUF") {
                let value = fiatAmount / <?php echo $HUF; ?>;
                xmrValue.value = value.toFixed(12);
        } else if (selectBox == "ILS") {
                let value = fiatAmount / <?php echo $ILS; ?>;
                xmrValue.value = value.toFixed(12);
        } else if (selectBox == "KWD") {
                let value = fiatAmount / <?php echo $KWD; ?>;
                xmrValue.value = value.toFixed(12);
        } else if (selectBox == "NGN") {
                let value = fiatAmount / <?php echo $NGN; ?>;
                xmrValue.value = value.toFixed(12);
        } else if (selectBox == "IDR") {
                let value = fiatAmount / <?php echo $IDR; ?>;
                xmrValue.value = value.toFixed(12);
        } else if (selectBox == "TWD") {
                let value = fiatAmount / <?php echo $TWD; ?>;
                xmrValue.value = value.toFixed(12);
        } else if (selectBox == "ARS") {
                let value = fiatAmount / <?php echo $ARS; ?>;
                xmrValue.value = value.toFixed(12);
        } else if (selectBox == "BDT") {
                let value = fiatAmount / <?php echo $BDT; ?>;
                xmrValue.value = value.toFixed(12);
        } else if (selectBox == "BHD") {
                let value = fiatAmount / <?php echo $BHD; ?>;
                xmrValue.value = value.toFixed(12);
        } else if (selectBox == "BMD") {
                let value = fiatAmount / <?php echo $BMD; ?>;
                xmrValue.value = value.toFixed(12);
        } else if (selectBox == "CZK") {
                let value = fiatAmount / <?php echo $CZK; ?>;
                xmrValue.value = value.toFixed(12);
        } else if (selectBox == "CLP") {
                let value = fiatAmount / <?php echo $CLP; ?>;
                xmrValue.value = value.toFixed(12);
        } else if (selectBox == "DKK") {
                let value = fiatAmount / <?php echo $DKK; ?>;
                xmrValue.value = value.toFixed(12);
        } else if (selectBox == "MXN") {
                let value = fiatAmount / <?php echo $MXN; ?>;
                xmrValue.value = value.toFixed(12);
        }
    }
</script>

<script type="text/javascript">
    function xmrConvert(value)
    {
        let xmrAmount = document.getElementById("xmrInput").value;
        let fiatValue = document.getElementById("fiatInput");
        let selectBox = document.getElementById("selectBox").value;

        if (selectBox == "BTC") {
                let value = xmrAmount * <?php echo $BTC; ?>;
                fiatValue.value = value.toFixed(8);
        } else if (selectBox == "EUR") {
                let value = xmrAmount * <?php echo $EUR; ?>;
                fiatValue.value = value.toFixed(2);
        } else if (selectBox == "USD") {
                let value = xmrAmount * <?php echo $USD; ?>;
                fiatValue.value = value.toFixed(2);
        } else if (selectBox == "CHF") {
                let value = xmrAmount * <?php echo $CHF; ?>;
                fiatValue.value = value.toFixed(2);
        } else if (selectBox == "LTC") {
                let value = xmrAmount * <?php echo $LTC; ?>;
                fiatValue.value = value.toFixed(8);
        } else if (selectBox == "CAD") {
                let value = xmrAmount * <?php echo $CAD; ?>;
                fiatValue.value = value.toFixed(2);
        } else if (selectBox == "AUD") {
                let value = xmrAmount * <?php echo $AUD; ?>;
                fiatValue.value = value.toFixed(2);
        } else if (selectBox == "HKD") {
                let value = xmrAmount * <?php echo $HKD; ?>;
                fiatValue.value = value.toFixed(2);
        } else if (selectBox == "SGD") {
                let value = xmrAmount * <?php echo $SGD; ?>;
                fiatValue.value = value.toFixed(2);
        } else if (selectBox == "GBP") {
                let value = xmrAmount * <?php echo $GBP; ?>;
                fiatValue.value = value.toFixed(2);
        } else if (selectBox == "RUB") {
                let value = xmrAmount * <?php echo $RUB; ?>;
                fiatValue.value = value.toFixed(2);
        } else if (selectBox == "ZAR") {
                let value = xmrAmount * <?php echo $ZAR; ?>;
                fiatValue.value = value.toFixed(2);
        } else if (selectBox == "TRY") {
                let value = xmrAmount * <?php echo $TRY; ?>;
                fiatValue.value = value.toFixed(2);
        } else if (selectBox == "JPY") {
                let value = xmrAmount * <?php echo $JPY; ?>;
                fiatValue.value = value.toFixed(2);
        } else if (selectBox == "PLN") {
                let value = xmrAmount * <?php echo $PLN; ?>;
                fiatValue.value = value.toFixed(2);
        } else if (selectBox == "INR") {
                let value = xmrAmount * <?php echo $INR; ?>;
                fiatValue.value = value.toFixed(2);
        } else if (selectBox == "AED") {
                let value = xmrAmount * <?php echo $AED; ?>;
                fiatValue.value = value.toFixed(2);
        } else if (selectBox == "ETH") {
                let value = xmrAmount * <?php echo $ETH; ?>;
                fiatValue.value = value.toFixed(8);
        } else if (selectBox == "UAH") {
                let value = xmrAmount * <?php echo $UAH; ?>;
                fiatValue.value = value.toFixed(2);
        } else if (selectBox == "KRW") {
                let value = xmrAmount * <?php echo $KRW; ?>;
                fiatValue.value = value.toFixed(2);
        } else if (selectBox == "BRL") {
                let value = xmrAmount * <?php echo $BRL; ?>;
                fiatValue.value = value.toFixed(2);
        } else if (selectBox == "MYR") {
                let value = xmrAmount * <?php echo $MYR; ?>;
                fiatValue.value = value.toFixed(2);
        } else if (selectBox == "CNY") {
                let value = xmrAmount * <?php echo $CNY; ?>;
                fiatValue.value = value.toFixed(2);
        } else if (selectBox == "XAU") {
                let value = xmrAmount * <?php echo $XAU; ?>;
                fiatValue.value = value.toFixed(8);
        } else if (selectBox == "XAG") {
                let value = xmrAmount * <?php echo $XAG; ?>;
                fiatValue.value = value.toFixed(8);
        } else if (selectBox == "VND") {
                let value = xmrAmount * <?php echo $VND; ?>;
                fiatValue.value = value.toFixed(2);
        } else if (selectBox == "VEF") {
                let value = xmrAmount * <?php echo $VEF; ?>;
                fiatValue.value = value.toFixed(2);
        } else if (selectBox == "THB") {
                let value = xmrAmount * <?php echo $THB; ?>;
                fiatValue.value = value.toFixed(2);
        } else if (selectBox == "SAR") {
                let value = xmrAmount * <?php echo $SAR; ?>;
                fiatValue.value = value.toFixed(2);
        } else if (selectBox == "SEK") {
                let value = xmrAmount * <?php echo $SEK; ?>;
                fiatValue.value = value.toFixed(2);
        } else if (selectBox == "PKR") {
                let value = xmrAmount * <?php echo $PKR; ?>;
                fiatValue.value = value.toFixed(2);
        } else if (selectBox == "NZD") {
                let value = xmrAmount * <?php echo $NZD; ?>;
                fiatValue.value = value.toFixed(2);
        } else if (selectBox == "PHP") {
                let value = xmrAmount * <?php echo $PHP; ?>;
                fiatValue.value = value.toFixed(2);
        } else if (selectBox == "NOK") {
                let value = xmrAmount * <?php echo $NOK; ?>;
                fiatValue.value = value.toFixed(2);
        } else if (selectBox == "LKR") {
                let value = xmrAmount * <?php echo $LKR; ?>;
                fiatValue.value = value.toFixed(2);
        } else if (selectBox == "MMK") {
                let value = xmrAmount * <?php echo $MMK; ?>;
                fiatValue.value = value.toFixed(2);
        } else if (selectBox == "HUF") {
                let value = xmrAmount * <?php echo $HUF; ?>;
                fiatValue.value = value.toFixed(2);
        } else if (selectBox == "ILS") {
                let value = xmrAmount * <?php echo $ILS; ?>;
                fiatValue.value = value.toFixed(2);
        } else if (selectBox == "KWD") {
                let value = xmrAmount * <?php echo $KWD; ?>;
                fiatValue.value = value.toFixed(2);
        } else if (selectBox == "NGN") {
                let value = xmrAmount * <?php echo $NGN; ?>;
                fiatValue.value = value.toFixed(2);
        } else if (selectBox == "IDR") {
                let value = xmrAmount * <?php echo $IDR; ?>;
                fiatValue.value = value.toFixed(2);
        } else if (selectBox == "TWD") {
                let value = xmrAmount * <?php echo $TWD; ?>;
                fiatValue.value = value.toFixed(2);
        } else if (selectBox == "ARS") {
                let value = xmrAmount * <?php echo $ARS; ?>;
                fiatValue.value = value.toFixed(2);
        } else if (selectBox == "BDT") {
                let value = xmrAmount * <?php echo $BDT; ?>;
                fiatValue.value = value.toFixed(2);
        } else if (selectBox == "BHD") {
                let value = xmrAmount * <?php echo $BHD; ?>;
                fiatValue.value = value.toFixed(2);
        } else if (selectBox == "BMD") {
                let value = xmrAmount * <?php echo $BMD; ?>;
                fiatValue.value = value.toFixed(2);
        } else if (selectBox == "CZK") {
                let value = xmrAmount * <?php echo $CZK; ?>;
                fiatValue.value = value.toFixed(2);
        } else if (selectBox == "CLP") {
                let value = xmrAmount * <?php echo $CLP; ?>;
                fiatValue.value = value.toFixed(2);
        } else if (selectBox == "DKK") {
                let value = xmrAmount * <?php echo $DKK; ?>;
                fiatValue.value = value.toFixed(2);
        } else if (selectBox == "MXN") {
                let value = xmrAmount * <?php echo $MXN; ?>;
                fiatValue.value = value.toFixed(2);
        }
    }
</script>
    <script src="js/main.js"></script>
    <script type="text/javascript">
    function copyToClipBoardXMR() {
        var content = document.getElementById('xmrInput');
        content.select();
        document.execCommand('copy');
    }

    function copyToClipBoardFiat() {
        var content = document.getElementById('fiatInput');
        content.select();
        document.execCommand('copy');
    }
    </script>
</body>
</html>
