<?php
date_default_timezone_set('Europe/Berlin');
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

include('coingecko.php');

// Holt die API Daten
$api = json_decode(file_get_contents('coingecko.json'));

// Holt die Zeit der letzten Abfrage
$time = date("H:i:s", $api->time);

// Holt die einzelnen Werte für die Berechnung
$BTC = $api->btc;
$EUR = $api->eur;
$USD = $api->usd;
$CHF = $api->chf;
$LTC = $api->ltc;
$CAD = $api->cad;
$AUD = $api->aud;
$HKD = $api->hkd;
$SGD = $api->sgd;
$GBP = $api->gbp;
$RUB = $api->rub;
$ZAR = $api->zar;
$TRY = $api->try;
$JPY = $api->jpy;
$PLN = $api->pln;
$INR = $api->inr;
$AED = $api->aed;
$ETH = $api->eth;
$UAH = $api->uah;
$KRW = $api->krw;
$BRL = $api->brl;
$MYR = $api->myr;
$CNY = $api->cny;
$XAU = $api->xau;
$XAG = $api->xag;
$XDR = $api->xdr;
$VND = $api->vnd;
$VEF = $api->vef;
$THB = $api->thb;
$SAR = $api->sar;
$SEK = $api->sek;
$PKR = $api->pkr;
$NOK = $api->nok;
$LKR = $api->lkr;
$MMK = $api->mmk;
$HUF = $api->huf;
$ILS = $api->ils;
$KWD = $api->kwd;
$NGN = $api->ngn;
$NZD = $api->nzd;
$PHP = $api->php;
$IDR = $api->idr;
$TWD = $api->twd;
$ARS = $api->ars;
$BDT = $api->bdt;
$BHD = $api->bhd;
$BMD = $api->bmd;
$CLP = $api->clp;
$CZK = $api->czk;
$DKK = $api->dkk;
$MXN = $api->mxn;

// Lädt die Sprachdatei, nach der Sprache die im Browser eingestellt wurde
$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
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
    <link rel="icon" type="image/png" href="img/favicon-196x196.png" sizes="196x196" />
    <link rel="icon" type="image/png" href="img/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/png" href="img/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="img/favicon-16x16.png" sizes="16x16" />
    <link rel="icon" type="image/png" href="img/favicon-128.png" sizes="128x128" />
    <meta name="application-name" content="Moner.ooo"/>
    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta name="msapplication-TileImage" content="img/mstile-144x144.png" />
    <meta name="msapplication-square70x70logo" content="img/mstile-70x70.png" />
    <meta name="msapplication-square150x150logo" content="img/mstile-150x150.png" />
    <meta name="msapplication-wide310x150logo" content="img/mstile-310x150.png" />
    <meta name="msapplication-square310x310logo" content="img/mstile-310x310.png" />
    <meta name="theme-color" content="#193e4c">
    <meta name="apple-mobile-web-app-title" content="Moner.ooo">
    <meta name="apple-mobile-web-app-status-bar-style" content="#193e4c">
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <!---- style anpassung -->
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/fonts/Montserrat.css" rel="stylesheet">
    
    <style>
        html {
            width: 100%;
            height: 100%;
            background-image: linear-gradient(to bottom right, #013c4a 0, #193e4c 44%, #004b5b 100%)!important;
            color: #fff;
            font-family: 'Montserrat'!important;
            font-style: normal;
        }
        body {
            background-color: transparent;
        }
        p.fiat-info{
            color:#4d4d4d;
        }
        p.fiat-info span,
        a.fiat-tooltip{
            color:white;
        }
        .btn{
            padding: 2px;
            margin-bottom: 5px;
            font-size: 0.8rem;
            font-weight: bold;
            min-width: 38px;
        }
        @media only screen and (max-width: 475px) {
            .btn{
                padding: 1px;
                font-size: 0.6rem;
            }
        }
    </style>
</head>

<body>
    <div class="container pt-4">
        <div class="row">
            <div class="col"></div>
            
            <div class="col-10">
                <div class="cursor-default text-center text-white">
                    <h1 lang="<?php echo $lang_meta; ?>"><span style="color:#4d4d4d;">&darr;</span>&nbsp;<span style="color:#ff6600;" title="Monero">XMR</span>&nbsp;<?php echo $title_h1;?>&nbsp;<span style="color:#4d4d4d;">&darr;</span></h1>
                    <button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/'><b><?php echo $l_eur; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">EUR</button>
                    | <button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=USD'><b><?php echo $l_usd; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">USD</button>
                    | <button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=GBP'><b><?php echo $l_gbp; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">GBP</button>
                    | <button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=CHF'><b><?php echo $l_chf; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">CHF</button>
                    | <button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=RUB'><b><?php echo $l_rub; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">RUB</button>
                    | <button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=CNY'><b><?php echo $l_cny; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">CNY</button>
                    | <button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=JPY'><b><?php echo $l_jpy; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">JPY</button>
                    | <button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=IDR'><b><?php echo $l_idr; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">IDR</button>
                    | <button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=KRW'><b><?php echo $l_krw; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">KRW</button>
                    | <button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=TRY'><b><?php echo $l_try; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">TRY</button><br/>
                    <button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=AUD'><b><?php echo $l_aud; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">AUD</button>
                    | <button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=BMD'><b><?php echo $l_bmd; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">BMD</button>
                    | <button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=CAD'><b><?php echo $l_cad; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">CAD</button>
                    | <button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=HKD'><b><?php echo $l_hkd; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">HKD</button>
                    | <button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=NZD'><b><?php echo $l_nzd; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">NZD</button>
                    | <button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=SGD'><b><?php echo $l_sgd; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">SGD</button>
                    | <button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=TWD'><b><?php echo $l_twd; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">TWD</button>
                    | <button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=ILS'><b><?php echo $l_ils; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">ILS</button>
                    | <button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=PLN'><b><?php echo $l_pln; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">PLN</button>
                    | <button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=ZAR'><b><?php echo $l_zar; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">ZAR</button><br/>
                    <button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=CZK'><b><?php echo $l_czk; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">CZK</button>
                    | <button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=DKK'><b><?php echo $l_dkk; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">DKK</button>
                    | <button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=NOK'><b><?php echo $l_nok; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">NOK</button>
                    | <button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=SEK'><b><?php echo $l_sek; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">SEK</button>
                    | <button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=ARS'><b><?php echo $l_ars; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">ARS</button>
                    | <button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=CLP'><b><?php echo $l_clp; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">CLP</button>                
                    | <button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=PHP'><b><?php echo $l_php; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">PHP</button>
                    | <button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=MXN'><b><?php echo $l_mxn; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">MXN</button>
                    | <button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=BHD'><b><?php echo $l_bhd; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">BHD</button>
                    | <button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=KWD'><b><?php echo $l_kwd; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">KWD</button><br/>
                    <button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=BRL'><b><?php echo $l_brl; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">BRL</button>
                    | <button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=MYR'><b><?php echo $l_myr; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">MYR</button>
                    | <button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=VEF'><b><?php echo $l_vef; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">VEF</button>
                    | <button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=UAH'><b><?php echo $l_uah; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">UAH</button>
                    | <button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=VND'><b><?php echo $l_vnd; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">VND</button>
                    | <button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=BDT'><b><?php echo $l_bdt; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">BDT</button>
                    | <button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=HUF'><b><?php echo $l_huf; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">HUF</button>
                    | <button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=MMK'><b><?php echo $l_mmk; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">MMK</button>
                    | <button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=NGN'><b><?php echo $l_ngn; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">NGN</button>
                    | <button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=THB'><b><?php echo $l_thb; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">THB</button><br/>
                    <button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=AED'><b><?php echo $l_aed; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">AED</button>
                    | <button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=SAR'><b><?php echo $l_sar; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">SAR</button>
                    | <button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=PKR'><b><?php echo $l_pkr; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">PKR</button>
                    | <button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=LKR'><b><?php echo $l_lkr; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">LKR</button>
                    | <button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=INR'><b><?php echo $l_inr; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">INR</button>
                    | <button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=BTC'><b><?php echo $l_btc; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">BTC</button>
                    | <button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=LTC'><b><?php echo $l_ltc; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">LTC</button>
                    | <button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=ETH'><b><?php echo $l_eth; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">ETH</button>
                    | <button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=XAG'><b><?php echo $l_xag; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">XAG</button>
                    | <button type="button" class="btn btn-light" title="<a class='text-decoration-none fiat-tooltip' href='/?in=XAU'><b><?php echo $l_xau; ?></b></a>" data-toggle="tooltip" data-bs-html="true" data-placement="top">XAU</button>
                </div>
                <hr class="gold" />
                
                <div class="input-group">
                    <input class="form-control" id="xmrInput" type="text" spellcheck="false" autocorrect="off" inputmode="numeric" aria-describedby="basic-addon-xmr" value="1" onchange="xmrConvert(this.value)" onkeyup="this.value = this.value.replace(/[^\.^,\d]/g, ''); this.value = this.value.replace(/\,/, '.'); if(this.value.split('.').length > 2){this.value = this.value.slice(0, -1);} xmrConvert(this.value)">
                    <input class="input-group-text" id="basic-addon-xmr" type="text" value="XMR" disabled>
                </div>
                
                <div class="equals-box">
                    <span class="equals-text cursor-default">=</span>
                </div>
                
                <div class="fiatDiv input-group">
                    <input class="form-control" id="fiatInput" type="text" spellcheck="false" autocorrect="off" inputmode="numeric" value="<?php echo $xmr_in_fiat; ?>" onchange="fiatConvert(this.value)" onkeyup="this.value = this.value.replace(/[^\.^,\d]/g, ''); this.value = this.value.replace(/\,/, '.'); if(this.value.split('.').length > 2){this.value = this.value.slice(0, -1);} fiatConvert(this.value)">
                    <select class="input-group-text cursor-pointer" id="selectBox" onchange="xmrConvert(this.value)">
                        <?php
                        if(isset($xmr_in)){
                            echo '<option value="'.$xmr_in.'">'.$xmr_in.'</option>';
                        }
                        ?>
                        <option value="EUR">EUR</option>
                        <option value="USD">USD</option>
                        <option value="GBP">GBP</option>
                        <option value="CHF">CHF</option>
                        <option value="RUB">RUB</option>
                        <option value="CNY">CNY</option>
                        <option value="JPY">JPY</option>
                        <option value="IDR">IDR</option>
                        <option value="KRW">KRW</option>
                        <option value="TRY">TRY</option>
                        <option value="AUD">AUD</option>
                        <option value="BMD">BMD</option>
                        <option value="CAD">CAD</option>
                        <option value="HKD">HKD</option>
                        <option value="NZD">NZD</option>
                        <option value="SGD">SGD</option>
                        <option value="TWD">TWD</option>
                        <option value="ILS">ILS</option>
                        <option value="PLN">PLN</option>
                        <option value="ZAR">ZAR</option>
                        <option value="CZK">CZK</option>
                        <option value="DKK">DKK</option>
                        <option value="NOK">NOK</option>
                        <option value="SEK">SEK</option>
                        <option value="ARS">ARS</option>
                        <option value="CLP">CLP</option>
                        <option value="PHP">PHP</option>
                        <option value="MXN">MXN</option>
                        <option value="BHD">BHD</option>
                        <option value="KWD">KWD</option>
                        <option value="BRL">BRL</option>
                        <option value="MYR">MYR</option>
                        <option value="VEF">VEF</option>
                        <option value="UAH">UAH</option>
                        <option value="VND">VND</option>
                        <option value="BDT">BDT</option>
                        <option value="HUF">HUF</option>
                        <option value="MMK">MMK</option>
                        <option value="NGN">NGN</option>
                        <option value="THB">THB</option>
                        <option value="AED">AED</option>
                        <option value="SAR">SAR</option>
                        <option value="PKR">PKR</option>
                        <option value="LKR">LKR</option>
                        <option value="INR">INR</option>
                        <option value="BTC">BTC</option>
                        <option value="LTC">LTC</option>
                        <option value="ETH">ETH</option>
                        <option value="XAG">XAG</option>
                        <option value="XAU">XAU</option>
                    </select>
                </div>
                
                <hr class="gold" />
                <small class="cursor-default text-white" lang="<?php echo $lang_meta; ?>">
                    <?php echo $info; ?>
                </small>
                <hr />
                <small class="cursor-default text-white" lang="<?php echo $lang_meta; ?>">
                    <?php echo $getmonero; ?>
                </small>
            </div>
            
            <div class="col"></div>
        </div>
    </div>

    <!---- umrechnung bei EUR/BTC/CHF/USD angabe -->
    <script type="text/javascript">
        function fiatConvert(value)
        {
            var fiatAmount = document.getElementById("fiatInput").value;             // Holt sich den Wert aus dem Eingabefeld
            var xmrValue = document.getElementById("xmrInput");
            var selectBox = document.getElementById("selectBox").value;

            if (selectBox == "BTC") {                                                // Welche Umrechnung?
                var value = fiatAmount / <?php echo number_format($BTC, 8); ?>;      // Die Formel
                xmrValue.value = value.toFixed(12);                                  // Formatiert und gibt die Umrechnung aus
            } else if (selectBox == "EUR") {
                var value = fiatAmount / <?php echo $EUR; ?>;
                xmrValue.value = value.toFixed(12);
            } else if (selectBox == "USD") {
                var value = fiatAmount / <?php echo $USD; ?>;
                xmrValue.value = value.toFixed(12);
            } else if (selectBox == "CHF") {
                var value = fiatAmount / <?php echo $CHF; ?>;
                xmrValue.value = value.toFixed(12);
            } else if (selectBox == "LTC") {
                var value = fiatAmount / <?php echo $LTC; ?>;
                xmrValue.value = value.toFixed(12);
            } else if (selectBox == "CAD") {
                var value = fiatAmount / <?php echo $CAD; ?>;
                xmrValue.value = value.toFixed(12);
            } else if (selectBox == "AUD") {
                var value = fiatAmount / <?php echo $AUD; ?>;
                xmrValue.value = value.toFixed(12);
            } else if (selectBox == "HKD") {
                var value = fiatAmount / <?php echo $HKD; ?>;
                xmrValue.value = value.toFixed(12);
            } else if (selectBox == "SGD") {
                var value = fiatAmount / <?php echo $SGD; ?>;
                xmrValue.value = value.toFixed(12);
            } else if (selectBox == "GBP") {
                var value = fiatAmount / <?php echo $GBP; ?>;
                xmrValue.value = value.toFixed(12);
            } else if (selectBox == "RUB") {
                var value = fiatAmount / <?php echo $RUB; ?>;
                xmrValue.value = value.toFixed(12);
            } else if (selectBox == "ZAR") {
                var value = fiatAmount / <?php echo $ZAR; ?>;
                xmrValue.value = value.toFixed(12);
            } else if (selectBox == "TRY") {
                var value = fiatAmount / <?php echo $TRY; ?>;
                xmrValue.value = value.toFixed(12);
            } else if (selectBox == "JPY") {
                var value = fiatAmount / <?php echo $JPY; ?>;
                xmrValue.value = value.toFixed(12);
            } else if (selectBox == "PLN") {
                var value = fiatAmount / <?php echo $PLN; ?>;
                xmrValue.value = value.toFixed(12);
            } else if (selectBox == "INR") {
                var value = fiatAmount / <?php echo $INR; ?>;
                xmrValue.value = value.toFixed(12);
            } else if (selectBox == "AED") {
                var value = fiatAmount / <?php echo $AED; ?>;
                xmrValue.value = value.toFixed(12);
            } else if (selectBox == "ETH") {
                var value = fiatAmount / <?php echo $ETH; ?>;
                xmrValue.value = value.toFixed(12);
            } else if (selectBox == "UAH") {
                var value = fiatAmount / <?php echo $UAH; ?>;
                xmrValue.value = value.toFixed(12);
            } else if (selectBox == "KRW") {
                var value = fiatAmount / <?php echo $KRW; ?>;
                xmrValue.value = value.toFixed(12);
            } else if (selectBox == "BRL") {
                var value = fiatAmount / <?php echo $BRL; ?>;
                xmrValue.value = value.toFixed(12);
            } else if (selectBox == "MYR") {
                var value = fiatAmount / <?php echo $MYR; ?>;
                xmrValue.value = value.toFixed(12);
            } else if (selectBox == "CNY") {
                var value = fiatAmount / <?php echo $CNY; ?>;
                xmrValue.value = value.toFixed(12);
            } else if (selectBox == "XAG") {
                var value = fiatAmount / <?php echo $XAG; ?>;
                xmrValue.value = value.toFixed(12);
            } else if (selectBox == "XAU") {
                var value = fiatAmount / <?php echo $XAU; ?>;
                xmrValue.value = value.toFixed(12);
            } else if (selectBox == "VEF") {
                var value = fiatAmount / <?php echo $VEF; ?>;
                xmrValue.value = value.toFixed(12);
            } else if (selectBox == "VND") {
                var value = fiatAmount / <?php echo $VND; ?>;
                xmrValue.value = value.toFixed(12);
            } else if (selectBox == "THB") {
                var value = fiatAmount / <?php echo $THB; ?>;
                xmrValue.value = value.toFixed(12);
            } else if (selectBox == "SAR") {
                var value = fiatAmount / <?php echo $SAR; ?>;
                xmrValue.value = value.toFixed(12);
            } else if (selectBox == "SEK") {
                var value = fiatAmount / <?php echo $SEK; ?>;
                xmrValue.value = value.toFixed(12);
            } else if (selectBox == "PKR") {
                var value = fiatAmount / <?php echo $PKR; ?>;
                xmrValue.value = value.toFixed(12);
            } else if (selectBox == "NZD") {
                var value = fiatAmount / <?php echo $NZD; ?>;
                xmrValue.value = value.toFixed(12);
            } else if (selectBox == "PHP") {
                var value = fiatAmount / <?php echo $PHP; ?>;
                xmrValue.value = value.toFixed(12);
            } else if (selectBox == "NOK") {
                var value = fiatAmount / <?php echo $NOK; ?>;
                xmrValue.value = value.toFixed(12);
            } else if (selectBox == "LKR") {
                var value = fiatAmount / <?php echo $LKR; ?>;
                xmrValue.value = value.toFixed(12);
            } else if (selectBox == "MMK") {
                var value = fiatAmount / <?php echo $MMK; ?>;
                xmrValue.value = value.toFixed(12);
            } else if (selectBox == "HUF") {
                var value = fiatAmount / <?php echo $HUF; ?>;
                xmrValue.value = value.toFixed(12);
            } else if (selectBox == "ILS") {
                var value = fiatAmount / <?php echo $ILS; ?>;
                xmrValue.value = value.toFixed(12);
            } else if (selectBox == "KWD") {
                var value = fiatAmount / <?php echo $KWD; ?>;
                xmrValue.value = value.toFixed(12);
            } else if (selectBox == "NGN") {
                var value = fiatAmount / <?php echo $NGN; ?>;
                xmrValue.value = value.toFixed(12);
            } else if (selectBox == "IDR") {
                var value = fiatAmount / <?php echo $IDR; ?>;
                xmrValue.value = value.toFixed(12);
            } else if (selectBox == "TWD") {
                var value = fiatAmount / <?php echo $TWD; ?>;
                xmrValue.value = value.toFixed(12);
            } else if (selectBox == "ARS") {
                var value = fiatAmount / <?php echo $ARS; ?>;
                xmrValue.value = value.toFixed(12);
            } else if (selectBox == "BDT") {
                var value = fiatAmount / <?php echo $BDT; ?>;
                xmrValue.value = value.toFixed(12);
            } else if (selectBox == "BHD") {
                var value = fiatAmount / <?php echo $BHD; ?>;
                xmrValue.value = value.toFixed(12);
            } else if (selectBox == "BMD") {
                var value = fiatAmount / <?php echo $BMD; ?>;
                xmrValue.value = value.toFixed(12);
            } else if (selectBox == "CZK") {
                var value = fiatAmount / <?php echo $CZK; ?>;
                xmrValue.value = value.toFixed(12);
            } else if (selectBox == "CLP") {
                var value = fiatAmount / <?php echo $CLP; ?>;
                xmrValue.value = value.toFixed(12);
            } else if (selectBox == "DKK") {
                var value = fiatAmount / <?php echo $DKK; ?>;
                xmrValue.value = value.toFixed(12);
            } else if (selectBox == "MXN") {
                var value = fiatAmount / <?php echo $MXN; ?>;
                xmrValue.value = value.toFixed(12);
            }
        }
    </script>
    <!---- umrechnung bei XMR angabe -->
    <script type="text/javascript">
        function xmrConvert(value)
        {
            var xmrAmount = document.getElementById("xmrInput").value;
            var fiatValue = document.getElementById("fiatInput");
            var selectBox = document.getElementById("selectBox").value;

            if (selectBox == "BTC") {
                var value = xmrAmount * <?php echo number_format($BTC, 8); ?>;
                fiatValue.value = value.toFixed(8);
            } else if (selectBox == "EUR") {
                var value = xmrAmount * <?php echo $EUR; ?>;
                fiatValue.value = value.toFixed(2);
            } else if (selectBox == "USD") {
                var value = xmrAmount * <?php echo $USD; ?>;
                fiatValue.value = value.toFixed(2);
            } else if (selectBox == "CHF") {
                var value = xmrAmount * <?php echo $CHF; ?>;
                fiatValue.value = value.toFixed(2);
            } else if (selectBox == "LTC") {
                var value = xmrAmount * <?php echo $LTC; ?>;
                fiatValue.value = value.toFixed(8);
            } else if (selectBox == "CAD") {
                var value = xmrAmount * <?php echo $CAD; ?>;
                fiatValue.value = value.toFixed(2);
            } else if (selectBox == "AUD") {
                var value = xmrAmount * <?php echo $AUD; ?>;
                fiatValue.value = value.toFixed(2);
            } else if (selectBox == "HKD") {
                var value = xmrAmount * <?php echo $HKD; ?>;
                fiatValue.value = value.toFixed(2);
            } else if (selectBox == "SGD") {
                var value = xmrAmount * <?php echo $SGD; ?>;
                fiatValue.value = value.toFixed(2);
            } else if (selectBox == "GBP") {
                var value = xmrAmount * <?php echo $GBP; ?>;
                fiatValue.value = value.toFixed(2);
            } else if (selectBox == "RUB") {
                var value = xmrAmount * <?php echo $RUB; ?>;
                fiatValue.value = value.toFixed(2);
            } else if (selectBox == "ZAR") {
                var value = xmrAmount * <?php echo $ZAR; ?>;
                fiatValue.value = value.toFixed(2);
            } else if (selectBox == "TRY") {
                var value = xmrAmount * <?php echo $TRY; ?>;
                fiatValue.value = value.toFixed(2);
            } else if (selectBox == "JPY") {
                var value = xmrAmount * <?php echo $JPY; ?>;
                fiatValue.value = value.toFixed(2);
            } else if (selectBox == "PLN") {
                var value = xmrAmount * <?php echo $PLN; ?>;
                fiatValue.value = value.toFixed(2);
            } else if (selectBox == "INR") {
                var value = xmrAmount * <?php echo $INR; ?>;
                fiatValue.value = value.toFixed(2);
            } else if (selectBox == "AED") {
                var value = xmrAmount * <?php echo $AED; ?>;
                fiatValue.value = value.toFixed(2);
            } else if (selectBox == "ETH") {
                var value = xmrAmount * <?php echo $ETH; ?>;
                fiatValue.value = value.toFixed(8);
            } else if (selectBox == "UAH") {
                var value = xmrAmount * <?php echo $UAH; ?>;
                fiatValue.value = value.toFixed(2);
            } else if (selectBox == "KRW") {
                var value = xmrAmount * <?php echo $KRW; ?>;
                fiatValue.value = value.toFixed(2);
            } else if (selectBox == "BRL") {
                var value = xmrAmount * <?php echo $BRL; ?>;
                fiatValue.value = value.toFixed(2);
            } else if (selectBox == "MYR") {
                var value = xmrAmount * <?php echo $MYR; ?>;
                fiatValue.value = value.toFixed(2);
            } else if (selectBox == "CNY") {
                var value = xmrAmount * <?php echo $CNY; ?>;
                fiatValue.value = value.toFixed(2);
            } else if (selectBox == "XAU") {
                var value = xmrAmount * <?php echo $XAU; ?>;
                fiatValue.value = value.toFixed(6);
            } else if (selectBox == "XAG") {
                var value = xmrAmount * <?php echo $XAG; ?>;
                fiatValue.value = value.toFixed(3);
            } else if (selectBox == "VND") {
                var value = xmrAmount * <?php echo $VND; ?>;
                fiatValue.value = value.toFixed(2);
            } else if (selectBox == "VEF") {
                var value = xmrAmount * <?php echo $VEF; ?>;
                fiatValue.value = value.toFixed(2);
            } else if (selectBox == "THB") {
                var value = xmrAmount * <?php echo $THB; ?>;
                fiatValue.value = value.toFixed(2);
            } else if (selectBox == "SAR") {
                var value = xmrAmount * <?php echo $SAR; ?>;
                fiatValue.value = value.toFixed(2);
            } else if (selectBox == "SEK") {
                var value = xmrAmount * <?php echo $SEK; ?>;
                fiatValue.value = value.toFixed(2);
            } else if (selectBox == "PKR") {
                var value = xmrAmount * <?php echo $PKR; ?>;
                fiatValue.value = value.toFixed(2);
            } else if (selectBox == "NZD") {
                var value = xmrAmount * <?php echo $NZD; ?>;
                fiatValue.value = value.toFixed(2);
            } else if (selectBox == "PHP") {
                var value = xmrAmount * <?php echo $PHP; ?>;
                fiatValue.value = value.toFixed(2);
            } else if (selectBox == "NOK") {
                var value = xmrAmount * <?php echo $NOK; ?>;
                fiatValue.value = value.toFixed(2);
            } else if (selectBox == "LKR") {
                var value = xmrAmount * <?php echo $LKR; ?>;
                fiatValue.value = value.toFixed(2);
            } else if (selectBox == "MMK") {
                var value = xmrAmount * <?php echo $MMK; ?>;
                fiatValue.value = value.toFixed(2);
            } else if (selectBox == "HUF") {
                var value = xmrAmount * <?php echo $HUF; ?>;
                fiatValue.value = value.toFixed(2);
            } else if (selectBox == "ILS") {
                var value = xmrAmount * <?php echo $ILS; ?>;
                fiatValue.value = value.toFixed(2);
            } else if (selectBox == "KWD") {
                var value = xmrAmount * <?php echo $KWD; ?>;
                fiatValue.value = value.toFixed(2);
            } else if (selectBox == "NGN") {
                var value = xmrAmount * <?php echo $NGN; ?>;
                fiatValue.value = value.toFixed(2);
            } else if (selectBox == "IDR") {
                var value = xmrAmount * <?php echo $IDR; ?>;
                fiatValue.value = value.toFixed(2);
            } else if (selectBox == "TWD") {
                var value = xmrAmount * <?php echo $TWD; ?>;
                fiatValue.value = value.toFixed(2);
            } else if (selectBox == "ARS") {
                var value = xmrAmount * <?php echo $ARS; ?>;
                fiatValue.value = value.toFixed(2);
            } else if (selectBox == "BDT") {
                var value = xmrAmount * <?php echo $BDT; ?>;
                fiatValue.value = value.toFixed(2);
            } else if (selectBox == "BHD") {
                var value = xmrAmount * <?php echo $BHD; ?>;
                fiatValue.value = value.toFixed(2);
            } else if (selectBox == "BMD") {
                var value = xmrAmount * <?php echo $BMD; ?>;
                fiatValue.value = value.toFixed(2);
            } else if (selectBox == "CZK") {
                var value = xmrAmount * <?php echo $CZK; ?>;
                fiatValue.value = value.toFixed(2);
            } else if (selectBox == "CLP") {
                var value = xmrAmount * <?php echo $CLP; ?>;
                fiatValue.value = value.toFixed(2);
            } else if (selectBox == "DKK") {
                var value = xmrAmount * <?php echo $DKK; ?>;
                fiatValue.value = value.toFixed(2);
            } else if (selectBox == "MXN") {
                var value = xmrAmount * <?php echo $MXN; ?>;
                fiatValue.value = value.toFixed(2);
            }
        }
    </script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
    </script>
</body>
</html>
