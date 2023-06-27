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
include('localmonero.php');

// Holt die API Daten
$api_cg = json_decode(file_get_contents('coingecko.json'));
$api_lm = json_decode(file_get_contents('localmonero.json'));


// Holt die Zeit der letzten Abfrage
$time_cg = date("H:i:s", $api_cg->time);
$time_lm = date("H:i:s", $api_lm->time);
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

$BTC_lm = $api_lm->BTC->lastValue;
$EUR_lm = $api_lm->EUR->lastValue;
$USD_lm = $api_lm->USD->lastValue;
$CHF_lm = $api_lm->CHF->lastValue;
$LTC_lm = $api_lm->LTC->lastValue;
$CNY_lm = $api_lm->CNY->lastValue;
$GBP_lm = $api_lm->GBP->lastValue;
$RUB_lm = $api_lm->RUB->lastValue;
$TRY_lm = $api_lm->TRY->lastValue;
$ETH_lm = $api_lm->ETH->lastValue;
$PLN_lm = $api_lm->PLN->lastValue;
$HKD_lm = $api_lm->HKD->lastValue;
$KRW_lm = $api_lm->KRW->lastValue;
$IDR_lm = $api_lm->IDR->lastValue;
$JPY_lm = $api_lm->JPY->lastValue;
$XAU_lm = $api_lm->XAU->lastValue;
$XAG_lm = $api_lm->XAG->lastValue;
$AUD_lm = $api_lm->AUD->lastValue;
$CAD_lm = $api_lm->CAD->lastValue;
$ZAR_lm = $api_lm->ZAR->lastValue;
$SGD_lm = $api_lm->SGD->lastValue;
$INR_lm = $api_lm->INR->lastValue;
$AED_lm = $api_lm->AED->lastValue;
$UAH_lm = $api_lm->UAH->lastValue;
$BRL_lm = $api_lm->BRL->lastValue;
$MYR_lm = $api_lm->MYR->lastValue;
$VND_lm = $api_lm->VND->lastValue;
$VEF_lm = $api_lm->VEF->lastValue;
$THB_lm = $api_lm->THB->lastValue;
$SAR_lm = $api_lm->SAR->lastValue;
$SEK_lm = $api_lm->SEK->lastValue;
$PKR_lm = $api_lm->PKR->lastValue;
$NOK_lm = $api_lm->NOK->lastValue;
$LKR_lm = $api_lm->LKR->lastValue;
$MMK_lm = $api_lm->MMK->lastValue;
$HUF_lm = $api_lm->HUF->lastValue;
$ILS_lm = $api_lm->ILS->lastValue;
$KWD_lm = $api_lm->KWD->lastValue;
$NGN_lm = $api_lm->NGN->lastValue;
$NZD_lm = $api_lm->NZD->lastValue;
$PHP_lm = $api_lm->PHP->lastValue;
$TWD_lm = $api_lm->TWD->lastValue;
$ARS_lm = $api_lm->ARS->lastValue;
$BDT_lm = $api_lm->BDT->lastValue;
$BHD_lm = $api_lm->BHD->lastValue;
$BMD_lm = $api_lm->BMD->lastValue;
$CLP_lm = $api_lm->CLP->lastValue;
$CZK_lm = $api_lm->CZK->lastValue;
$DKK_lm = $api_lm->DKK->lastValue;
$MXN_lm = $api_lm->MXN->lastValue;

// Lädt die Sprachdatei, nach der Sprache die im Browser eingestellt wurde
$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

$acceptLang = ['de','es','it','zh']; 
$lang = in_array($lang, $acceptLang) ? $lang : 'en';
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
        }

        .clipboard-copy{
            border-top: 1px;
            border-bottom: 1px;
            width: auto;
        }

        @media (max-width: 475px) {
            .btn{
                padding: 1px;
                font-size: 0.6rem;
            }
        }
        
        @media (min-width: 768px) {
            .btn{
                min-width: 38px;
            }
        }

        @media (min-width: 1400px) {
            small.text-info{
                padding-right: 7%;
            }
        }
    </style>
</head>

<body>
    <div class="container pt-4">
        <div class="row">            
            <div class="col-12">
                <div class="cursor-default text-center text-white">
                    <h1 lang="<?php echo $lang_meta; ?>"><span style="color:#4d4d4d;">&darr;</span>&nbsp;<span style="color:#ff6600;" title="Monero">XMR</span>&nbsp;<?php echo $title_h1;?>&nbsp;<span style="color:#4d4d4d;">&darr;</span></h1>
                    <div class="fiat-btns">
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
                </div>
                <hr class="gold" />
                
                <div class="input-group">
                    <button onclick="copyToClipBoardXMR()" class="btn-outline-secondary input-group-text clipboard-copy" title="<?php echo $clipboard_copy_tooltip; ?>" data-toggle="tooltip" data-bs-html="true" data-placement="top">&#128203;</button>
                    <input class="form-control" id="xmrInput" type="text" spellcheck="false" autocorrect="off" inputmode="numeric" aria-describedby="basic-addon-xmr" value="1" onchange="xmrConvert(this.value)" onkeyup="this.value = this.value.replace(/[^\.^,\d]/g, ''); this.value = this.value.replace(/\,/, '.'); if(this.value.split('.').length > 2){this.value = this.value.slice(0, -1);} xmrConvert(this.value)">
                    <input class="input-group-text" id="basic-addon-xmr" type="text" value="XMR" disabled>
                </div>
                
                <div class="equals-box">
                    <span class="equals-text cursor-default">=</span>
                    <!-- Rounded switch -->
                    <label class="switch" style="float:right; top:20px; right:20px;" title="<b><?php echo $localmonero_tooltip; ?></b>" data-toggle="tooltip" data-bs-html="true" data-placement="left">
                        <input type="checkbox" class="localmonero-check" onchange="xmrConvert(document.getElementById('xmrInput').value)">
                        <span class="slider round"></span>
                    </label>
                </div>
                
                <div class="fiatDiv input-group">
                    <button onclick="copyToClipBoardFiat()" class="btn-outline-secondary input-group-text clipboard-copy" title="<?php echo $clipboard_copy_tooltip; ?>" data-toggle="tooltip" data-bs-html="true" data-placement="top">&#128203;</button>
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
                <small class="cursor-default text-white text-info" lang="<?php echo $lang_meta; ?>">
                    <?php echo $info; ?>
                </small>
                <hr />
                <small class="cursor-default text-white" lang="<?php echo $lang_meta; ?>">
                    <?php echo $getmonero; ?>
                </small>
            </div>
            
        </div>
    </div>


<!---- umrechnung bei EUR/BTC/CHF/USD angabe -->
<script type="text/javascript">
    function fiatConvert(value)
    {
        // Holt sich den Wert aus dem Eingabefeld
        let fiatAmount = document.getElementById("fiatInput").value;
        let xmrValue = document.getElementById("xmrInput");
        let selectBox = document.getElementById("selectBox").value;

        // Welche Umrechnung?
        if (selectBox == "BTC") {
            if ($('input.localmonero-check').is(':checked')) {
                // Die Formel
                let value = fiatAmount / ((<?php echo $BTC; ?> + <?php echo $BTC_lm; ?>) / 2);
                // Formatiert und gibt die Umrechnung aus
                xmrValue.value = value.toFixed(12);
            } else {
                let value = fiatAmount / <?php echo $BTC; ?>;
                xmrValue.value = value.toFixed(12);
            }
        } else if (selectBox == "EUR") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = fiatAmount / ((<?php echo $EUR; ?> + <?php echo $EUR_lm; ?>) / 2);
                xmrValue.value = value.toFixed(12);
            } else {
                let value = fiatAmount / <?php echo $EUR; ?>;
                xmrValue.value = value.toFixed(12);
            }
        } else if (selectBox == "USD") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = fiatAmount / ((<?php echo $USD; ?> + <?php echo $USD_lm; ?>) / 2);
                xmrValue.value = value.toFixed(12);
            } else {
                let value = fiatAmount / <?php echo $USD; ?>;
                xmrValue.value = value.toFixed(12);
            }
        } else if (selectBox == "CHF") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = fiatAmount / ((<?php echo $CHF; ?> + <?php echo $CHF_lm; ?>) / 2);
                xmrValue.value = value.toFixed(12);
            } else {
                let value = fiatAmount / <?php echo $CHF; ?>;
                xmrValue.value = value.toFixed(12);
            }
        } else if (selectBox == "LTC") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = fiatAmount / ((<?php echo $LTC; ?> + <?php echo $LTC_lm; ?>) / 2);
                xmrValue.value = value.toFixed(12);
            } else {
                let value = fiatAmount / <?php echo $LTC; ?>;
                xmrValue.value = value.toFixed(12);
            }
        } else if (selectBox == "CAD") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = fiatAmount / ((<?php echo $CAD; ?> + <?php echo $CAD_lm; ?>) / 2);
                xmrValue.value = value.toFixed(12);
            } else {
                let value = fiatAmount / <?php echo $CAD; ?>;
                xmrValue.value = value.toFixed(12);
            }
        } else if (selectBox == "AUD") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = fiatAmount / ((<?php echo $AUD; ?> + <?php echo $AUD_lm; ?>) / 2);
                xmrValue.value = value.toFixed(12);
            } else {
                let value = fiatAmount / <?php echo $AUD; ?>;
                xmrValue.value = value.toFixed(12);
            }
        } else if (selectBox == "HKD") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = fiatAmount / ((<?php echo $HKD; ?> + <?php echo $HKD_lm; ?>) / 2);
                xmrValue.value = value.toFixed(12);
            } else {
                let value = fiatAmount / <?php echo $HKD; ?>;
                xmrValue.value = value.toFixed(12);
            }
        } else if (selectBox == "SGD") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = fiatAmount / ((<?php echo $SGD; ?> + <?php echo $SGD_lm; ?>) / 2);
                xmrValue.value = value.toFixed(12);
            } else {
                let value = fiatAmount / <?php echo $SGD; ?>;
                xmrValue.value = value.toFixed(12);
            }
        } else if (selectBox == "GBP") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = fiatAmount / ((<?php echo $GBP; ?> + <?php echo $GBP_lm; ?>) / 2);
                xmrValue.value = value.toFixed(12);
            } else {
                let value = fiatAmount / <?php echo $GBP; ?>;
                xmrValue.value = value.toFixed(12);
            }
        } else if (selectBox == "RUB") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = fiatAmount / ((<?php echo $RUB; ?> + <?php echo $RUB_lm; ?>) / 2);
                xmrValue.value = value.toFixed(12);
            } else {
                let value = fiatAmount / <?php echo $RUB; ?>;
                xmrValue.value = value.toFixed(12);
            }
        } else if (selectBox == "ZAR") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = fiatAmount / ((<?php echo $ZAR; ?> + <?php echo $ZAR_lm; ?>) / 2);
                xmrValue.value = value.toFixed(12);
            } else {
                let value = fiatAmount / <?php echo $ZAR; ?>;
                xmrValue.value = value.toFixed(12);
            }
        } else if (selectBox == "TRY") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = fiatAmount / ((<?php echo $TRY; ?> + <?php echo $TRY_lm; ?>) / 2);
                xmrValue.value = value.toFixed(12);
            } else {
                let value = fiatAmount / <?php echo $TRY; ?>;
                xmrValue.value = value.toFixed(12);
            }
        } else if (selectBox == "JPY") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = fiatAmount / ((<?php echo $JPY; ?> + <?php echo $JPY_lm; ?>) / 2);
                xmrValue.value = value.toFixed(12);
            } else {
                let value = fiatAmount / <?php echo $JPY; ?>;
                xmrValue.value = value.toFixed(12);
            }
        } else if (selectBox == "PLN") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = fiatAmount / ((<?php echo $PLN; ?> + <?php echo $PLN_lm; ?>) / 2);
                xmrValue.value = value.toFixed(12);
            } else {
                let value = fiatAmount / <?php echo $PLN; ?>;
                xmrValue.value = value.toFixed(12);
            }
        } else if (selectBox == "INR") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = fiatAmount / ((<?php echo $INR; ?> + <?php echo $INR_lm; ?>) / 2);
                xmrValue.value = value.toFixed(12);
            } else {
                let value = fiatAmount / <?php echo $INR; ?>;
                xmrValue.value = value.toFixed(12);
            }
        } else if (selectBox == "AED") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = fiatAmount / ((<?php echo $AED; ?> + <?php echo $AED_lm; ?>) / 2);
                xmrValue.value = value.toFixed(12);
            } else {
                let value = fiatAmount / <?php echo $AED; ?>;
                xmrValue.value = value.toFixed(12);
            }
        } else if (selectBox == "ETH") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = fiatAmount / ((<?php echo $ETH; ?> + <?php echo $ETH_lm; ?>) / 2);
                xmrValue.value = value.toFixed(12);
            } else {
                let value = fiatAmount / <?php echo $ETH; ?>;
                xmrValue.value = value.toFixed(12);
            }
        } else if (selectBox == "UAH") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = fiatAmount / ((<?php echo $UAH; ?> + <?php echo $UAH_lm; ?>) / 2);
                xmrValue.value = value.toFixed(12);
            } else {
                let value = fiatAmount / <?php echo $UAH; ?>;
                xmrValue.value = value.toFixed(12);
            }
        } else if (selectBox == "KRW") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = fiatAmount / ((<?php echo $KRW; ?> + <?php echo $KRW_lm; ?>) / 2);
                xmrValue.value = value.toFixed(12);
            } else {
                let value = fiatAmount / <?php echo $KRW; ?>;
                xmrValue.value = value.toFixed(12);
            }
        } else if (selectBox == "BRL") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = fiatAmount / ((<?php echo $BRL; ?> + <?php echo $BRL_lm; ?>) / 2);
                xmrValue.value = value.toFixed(12);
            } else {
                let value = fiatAmount / <?php echo $BRL; ?>;
                xmrValue.value = value.toFixed(12);
            }
        } else if (selectBox == "MYR") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = fiatAmount / ((<?php echo $MYR; ?> + <?php echo $MYR_lm; ?>) / 2);
                xmrValue.value = value.toFixed(12);
            } else {
                let value = fiatAmount / <?php echo $MYR; ?>;
                xmrValue.value = value.toFixed(12);
            }
        } else if (selectBox == "CNY") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = fiatAmount / ((<?php echo $CNY; ?> + <?php echo $CNY_lm; ?>) / 2);
                xmrValue.value = value.toFixed(12);
            } else {
                let value = fiatAmount / <?php echo $CNY; ?>;
                xmrValue.value = value.toFixed(12);
            }
        } else if (selectBox == "XAG") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = fiatAmount / ((<?php echo $XAG; ?> + <?php echo $XAG_lm; ?>) / 2);
                xmrValue.value = value.toFixed(12);
            } else {
                let value = fiatAmount / <?php echo $XAG; ?>;
                xmrValue.value = value.toFixed(12);
            }
        } else if (selectBox == "XAU") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = fiatAmount / ((<?php echo $XAU; ?> + <?php echo $XAU_lm; ?>) / 2);
                xmrValue.value = value.toFixed(12);
            } else {
                let value = fiatAmount / <?php echo $XAU; ?>;
                xmrValue.value = value.toFixed(12);
            }
        } else if (selectBox == "VEF") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = fiatAmount / ((<?php echo $VEF; ?> + <?php echo $VEF_lm; ?>) / 2);
                xmrValue.value = value.toFixed(12);
            } else {
                let value = fiatAmount / <?php echo $VEF; ?>;
                xmrValue.value = value.toFixed(12);
            }
        } else if (selectBox == "VND") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = fiatAmount / ((<?php echo $VND; ?> + <?php echo $VND_lm; ?>) / 2);
                xmrValue.value = value.toFixed(12);
            } else {
                let value = fiatAmount / <?php echo $VND; ?>;
                xmrValue.value = value.toFixed(12);
            }
        } else if (selectBox == "THB") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = fiatAmount / ((<?php echo $THB; ?> + <?php echo $THB_lm; ?>) / 2);
                xmrValue.value = value.toFixed(12);
            } else {
                let value = fiatAmount / <?php echo $THB; ?>;
                xmrValue.value = value.toFixed(12);
            }
        } else if (selectBox == "SAR") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = fiatAmount / ((<?php echo $SAR; ?> + <?php echo $SAR_lm; ?>) / 2);
                xmrValue.value = value.toFixed(12);
            } else {
                let value = fiatAmount / <?php echo $SAR; ?>;
                xmrValue.value = value.toFixed(12);
            }
        } else if (selectBox == "SEK") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = fiatAmount / ((<?php echo $SEK; ?> + <?php echo $SEK_lm; ?>) / 2);
                xmrValue.value = value.toFixed(12);
            } else {
                let value = fiatAmount / <?php echo $SEK; ?>;
                xmrValue.value = value.toFixed(12);
            }
        } else if (selectBox == "PKR") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = fiatAmount / ((<?php echo $PKR; ?> + <?php echo $PKR_lm; ?>) / 2);
                xmrValue.value = value.toFixed(12);
            } else {
                let value = fiatAmount / <?php echo $PKR; ?>;
                xmrValue.value = value.toFixed(12);
            }
        } else if (selectBox == "NZD") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = fiatAmount / ((<?php echo $NZD; ?> + <?php echo $NZD_lm; ?>) / 2);
                xmrValue.value = value.toFixed(12);
            } else {
                let value = fiatAmount / <?php echo $NZD; ?>;
                xmrValue.value = value.toFixed(12);
            }
        } else if (selectBox == "PHP") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = fiatAmount / ((<?php echo $PHP; ?> + <?php echo $PHP_lm; ?>) / 2);
                xmrValue.value = value.toFixed(12);
            } else {
                let value = fiatAmount / <?php echo $PHP; ?>;
                xmrValue.value = value.toFixed(12);
            }
        } else if (selectBox == "NOK") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = fiatAmount / ((<?php echo $NOK; ?> + <?php echo $NOK_lm; ?>) / 2);
                xmrValue.value = value.toFixed(12);
            } else {
                let value = fiatAmount / <?php echo $NOK; ?>;
                xmrValue.value = value.toFixed(12);
            }
        } else if (selectBox == "LKR") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = fiatAmount / ((<?php echo $LKR; ?> + <?php echo $LKR_lm; ?>) / 2);
                xmrValue.value = value.toFixed(12);
            } else {
                let value = fiatAmount / <?php echo $LKR; ?>;
                xmrValue.value = value.toFixed(12);
            }
        } else if (selectBox == "MMK") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = fiatAmount / ((<?php echo $MMK; ?> + <?php echo $MMK_lm; ?>) / 2);
                xmrValue.value = value.toFixed(12);
            } else {
                let value = fiatAmount / <?php echo $MMK; ?>;
                xmrValue.value = value.toFixed(12);
            }
        } else if (selectBox == "HUF") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = fiatAmount / ((<?php echo $HUF; ?> + <?php echo $HUF_lm; ?>) / 2);
                xmrValue.value = value.toFixed(12);
            } else {
                let value = fiatAmount / <?php echo $HUF; ?>;
                xmrValue.value = value.toFixed(12);
            }
        } else if (selectBox == "ILS") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = fiatAmount / ((<?php echo $ILS; ?> + <?php echo $ILS_lm; ?>) / 2);
                xmrValue.value = value.toFixed(12);
            } else {
                let value = fiatAmount / <?php echo $ILS; ?>;
                xmrValue.value = value.toFixed(12);
            }
        } else if (selectBox == "KWD") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = fiatAmount / ((<?php echo $KWD; ?> + <?php echo $KWD_lm; ?>) / 2);
                xmrValue.value = value.toFixed(12);
            } else {
                let value = fiatAmount / <?php echo $KWD; ?>;
                xmrValue.value = value.toFixed(12);
            }
        } else if (selectBox == "NGN") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = fiatAmount / ((<?php echo $NGN; ?> + <?php echo $NGN_lm; ?>) / 2);
                xmrValue.value = value.toFixed(12);
            } else {
                let value = fiatAmount / <?php echo $NGN; ?>;
                xmrValue.value = value.toFixed(12);
            }
        } else if (selectBox == "IDR") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = fiatAmount / ((<?php echo $IDR; ?> + <?php echo $IDR_lm; ?>) / 2);
                xmrValue.value = value.toFixed(12);
            } else {
                let value = fiatAmount / <?php echo $IDR; ?>;
                xmrValue.value = value.toFixed(12);
            }
        } else if (selectBox == "TWD") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = fiatAmount / ((<?php echo $TWD; ?> + <?php echo $TWD_lm; ?>) / 2);
                xmrValue.value = value.toFixed(12);
            } else {
                let value = fiatAmount / <?php echo $TWD; ?>;
                xmrValue.value = value.toFixed(12);
            }
        } else if (selectBox == "ARS") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = fiatAmount / ((<?php echo $ARS; ?> + <?php echo $ARS_lm; ?>) / 2);
                xmrValue.value = value.toFixed(12);
            } else {
                let value = fiatAmount / <?php echo $ARS; ?>;
                xmrValue.value = value.toFixed(12);
            }
        } else if (selectBox == "BDT") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = fiatAmount / ((<?php echo $BDT; ?> + <?php echo $BDT_lm; ?>) / 2);
                xmrValue.value = value.toFixed(12);
            } else {
                let value = fiatAmount / <?php echo $BDT; ?>;
                xmrValue.value = value.toFixed(12);
            }
        } else if (selectBox == "BHD") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = fiatAmount / ((<?php echo $BHD; ?> + <?php echo $BHD_lm; ?>) / 2);
                xmrValue.value = value.toFixed(12);
            } else {
                let value = fiatAmount / <?php echo $BHD; ?>;
                xmrValue.value = value.toFixed(12);
            }
        } else if (selectBox == "BMD") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = fiatAmount / ((<?php echo $BMD; ?> + <?php echo $BMD_lm; ?>) / 2);
                xmrValue.value = value.toFixed(12);
            } else {
                let value = fiatAmount / <?php echo $BMD; ?>;
                xmrValue.value = value.toFixed(12);
            }
        } else if (selectBox == "CZK") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = fiatAmount / ((<?php echo $CZK; ?> + <?php echo $CZK_lm; ?>) / 2);
                xmrValue.value = value.toFixed(12);
            } else {
                let value = fiatAmount / <?php echo $CZK; ?>;
                xmrValue.value = value.toFixed(12);
            }
        } else if (selectBox == "CLP") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = fiatAmount / ((<?php echo $CLP; ?> + <?php echo $CLP_lm; ?>) / 2);
                xmrValue.value = value.toFixed(12);
            } else {
                let value = fiatAmount / <?php echo $CLP; ?>;
                xmrValue.value = value.toFixed(12);
            }
        } else if (selectBox == "DKK") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = fiatAmount / ((<?php echo $DKK; ?> + <?php echo $DKK_lm; ?>) / 2);
                xmrValue.value = value.toFixed(12);
            } else {
                let value = fiatAmount / <?php echo $DKK; ?>;
                xmrValue.value = value.toFixed(12);
            }
        } else if (selectBox == "MXN") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = fiatAmount / ((<?php echo $MXN; ?> + <?php echo $MXN_lm; ?>) / 2);
                xmrValue.value = value.toFixed(12);
            } else {
                let value = fiatAmount / <?php echo $MXN; ?>;
                xmrValue.value = value.toFixed(12);
            }
        }
    }
</script>

<!---- umrechnung bei XMR angabe -->
<script type="text/javascript">
    function xmrConvert(value)
    {
        let xmrAmount = document.getElementById("xmrInput").value;
        let fiatValue = document.getElementById("fiatInput");
        let selectBox = document.getElementById("selectBox").value;

        if (selectBox == "BTC") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = xmrAmount * ((<?php echo $BTC; ?> + <?php echo $BTC_lm; ?>) / 2);
                fiatValue.value = value.toFixed(8);
            } else {
                let value = xmrAmount * <?php echo $BTC; ?>;
                fiatValue.value = value.toFixed(8);
            }
        } else if (selectBox == "EUR") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = xmrAmount * ((<?php echo $EUR; ?> + <?php echo $EUR_lm; ?>) / 2);
                fiatValue.value = value.toFixed(2);
            } else {
                let value = xmrAmount * <?php echo $EUR; ?>;
                fiatValue.value = value.toFixed(2);
            }
        } else if (selectBox == "USD") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = xmrAmount * ((<?php echo $USD; ?> + <?php echo $USD_lm; ?>) / 2);
                fiatValue.value = value.toFixed(2);
            } else {
                let value = xmrAmount * <?php echo $USD; ?>;
                fiatValue.value = value.toFixed(2);
            }
        } else if (selectBox == "CHF") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = xmrAmount * ((<?php echo $CHF; ?> + <?php echo $CHF_lm; ?>) / 2);
                fiatValue.value = value.toFixed(2);
            } else {
                let value = xmrAmount * <?php echo $CHF; ?>;
                fiatValue.value = value.toFixed(2);
            }
        } else if (selectBox == "LTC") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = xmrAmount * ((<?php echo $LTC; ?> + <?php echo $LTC_lm; ?>) / 2);
                fiatValue.value = value.toFixed(8);
            } else {
                let value = xmrAmount * <?php echo $LTC; ?>;
                fiatValue.value = value.toFixed(8);
            }
        } else if (selectBox == "CAD") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = xmrAmount * ((<?php echo $CAD; ?> + <?php echo $CAD_lm; ?>) / 2);
                fiatValue.value = value.toFixed(2);
            } else {
                let value = xmrAmount * <?php echo $CAD; ?>;
                fiatValue.value = value.toFixed(2);
            }
        } else if (selectBox == "AUD") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = xmrAmount * ((<?php echo $AUD; ?> + <?php echo $AUD_lm; ?>) / 2);
                fiatValue.value = value.toFixed(2);
            } else {
                let value = xmrAmount * <?php echo $AUD; ?>;
                fiatValue.value = value.toFixed(2);
            }
        } else if (selectBox == "HKD") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = xmrAmount * ((<?php echo $HKD; ?> + <?php echo $HKD_lm; ?>) / 2);
                fiatValue.value = value.toFixed(2);
            } else {
                let value = xmrAmount * <?php echo $HKD; ?>;
                fiatValue.value = value.toFixed(2);
            }
        } else if (selectBox == "SGD") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = xmrAmount * ((<?php echo $SGD; ?> + <?php echo $SGD_lm; ?>) / 2);
                fiatValue.value = value.toFixed(2);
            } else {
                let value = xmrAmount * <?php echo $SGD; ?>;
                fiatValue.value = value.toFixed(2);
            }
        } else if (selectBox == "GBP") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = xmrAmount * ((<?php echo $GBP; ?> + <?php echo $GBP_lm; ?>) / 2);
                fiatValue.value = value.toFixed(2);
            } else {
                let value = xmrAmount * <?php echo $GBP; ?>;
                fiatValue.value = value.toFixed(2);
            }
        } else if (selectBox == "RUB") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = xmrAmount * ((<?php echo $RUB; ?> + <?php echo $RUB_lm; ?>) / 2);
                fiatValue.value = value.toFixed(2);
            } else {
                let value = xmrAmount * <?php echo $RUB; ?>;
                fiatValue.value = value.toFixed(2);
            }
        } else if (selectBox == "ZAR") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = xmrAmount * ((<?php echo $ZAR; ?> + <?php echo $ZAR_lm; ?>) / 2);
                fiatValue.value = value.toFixed(2);
            } else {
                let value = xmrAmount * <?php echo $ZAR; ?>;
                fiatValue.value = value.toFixed(2);
            }
        } else if (selectBox == "TRY") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = xmrAmount * ((<?php echo $TRY; ?> + <?php echo $TRY_lm; ?>) / 2);
                fiatValue.value = value.toFixed(2);
            } else {
                let value = xmrAmount * <?php echo $TRY; ?>;
                fiatValue.value = value.toFixed(2);
            }
        } else if (selectBox == "JPY") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = xmrAmount * ((<?php echo $JPY; ?> + <?php echo $JPY_lm; ?>) / 2);
                fiatValue.value = value.toFixed(2);
            } else {
                let value = xmrAmount * <?php echo $JPY; ?>;
                fiatValue.value = value.toFixed(2);
            }
        } else if (selectBox == "PLN") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = xmrAmount * ((<?php echo $PLN; ?> + <?php echo $PLN_lm; ?>) / 2);
                fiatValue.value = value.toFixed(2);
            } else {
                let value = xmrAmount * <?php echo $PLN; ?>;
                fiatValue.value = value.toFixed(2);
            }
        } else if (selectBox == "INR") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = xmrAmount * ((<?php echo $INR; ?> + <?php echo $INR_lm; ?>) / 2);
                fiatValue.value = value.toFixed(2);
            } else {
                let value = xmrAmount * <?php echo $INR; ?>;
                fiatValue.value = value.toFixed(2);
            }
        } else if (selectBox == "AED") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = xmrAmount * ((<?php echo $AED; ?> + <?php echo $AED_lm; ?>) / 2);
                fiatValue.value = value.toFixed(2);
            } else {
                let value = xmrAmount * <?php echo $AED; ?>;
                fiatValue.value = value.toFixed(2);
            }
        } else if (selectBox == "ETH") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = xmrAmount * ((<?php echo $ETH; ?> + <?php echo $ETH_lm; ?>) / 2);
                fiatValue.value = value.toFixed(8);
            } else {
                let value = xmrAmount * <?php echo $ETH; ?>;
                fiatValue.value = value.toFixed(8);
            }
        } else if (selectBox == "UAH") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = xmrAmount * ((<?php echo $UAH; ?> + <?php echo $UAH_lm; ?>) / 2);
                fiatValue.value = value.toFixed(2);
            } else {
                let value = xmrAmount * <?php echo $UAH; ?>;
                fiatValue.value = value.toFixed(2);
            }
        } else if (selectBox == "KRW") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = xmrAmount * ((<?php echo $KRW; ?> + <?php echo $KRW_lm; ?>) / 2);
                fiatValue.value = value.toFixed(2);
            } else {
                let value = xmrAmount * <?php echo $KRW; ?>;
                fiatValue.value = value.toFixed(2);
            }
        } else if (selectBox == "BRL") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = xmrAmount * ((<?php echo $BRL; ?> + <?php echo $BRL_lm; ?>) / 2);
                fiatValue.value = value.toFixed(2);
            } else {
                let value = xmrAmount * <?php echo $BRL; ?>;
                fiatValue.value = value.toFixed(2);
            }
        } else if (selectBox == "MYR") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = xmrAmount * ((<?php echo $MYR; ?> + <?php echo $MYR_lm; ?>) / 2);
                fiatValue.value = value.toFixed(2);
            } else {
                let value = xmrAmount * <?php echo $MYR; ?>;
                fiatValue.value = value.toFixed(2);
            }
        } else if (selectBox == "CNY") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = xmrAmount * ((<?php echo $CNY; ?> + <?php echo $CNY_lm; ?>) / 2);
                fiatValue.value = value.toFixed(2);
            } else {
                let value = xmrAmount * <?php echo $CNY; ?>;
                fiatValue.value = value.toFixed(2);
            }
        } else if (selectBox == "XAU") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = xmrAmount * ((<?php echo $XAU; ?> + <?php echo $XAU_lm; ?>) / 2);
                fiatValue.value = value.toFixed(8);
            } else {
                let value = xmrAmount * <?php echo $XAU; ?>;
                fiatValue.value = value.toFixed(8);
            }
        } else if (selectBox == "XAG") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = xmrAmount * ((<?php echo $XAG; ?> + <?php echo $XAG_lm; ?>) / 2);
                fiatValue.value = value.toFixed(8);
            } else {
                let value = xmrAmount * <?php echo $XAG; ?>;
                fiatValue.value = value.toFixed(8);
            }
        } else if (selectBox == "VND") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = xmrAmount * ((<?php echo $VND; ?> + <?php echo $VND_lm; ?>) / 2);
                fiatValue.value = value.toFixed(2);
            } else {
                let value = xmrAmount * <?php echo $VND; ?>;
                fiatValue.value = value.toFixed(2);
            }
        } else if (selectBox == "VEF") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = xmrAmount * ((<?php echo $VEF; ?> + <?php echo $VEF_lm; ?>) / 2);
                fiatValue.value = value.toFixed(2);
            } else {
                let value = xmrAmount * <?php echo $VEF; ?>;
                fiatValue.value = value.toFixed(2);
            }
        } else if (selectBox == "THB") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = xmrAmount * ((<?php echo $THB; ?> + <?php echo $THB_lm; ?>) / 2);
                fiatValue.value = value.toFixed(2);
            } else {
                let value = xmrAmount * <?php echo $THB; ?>;
                fiatValue.value = value.toFixed(2);
            }
        } else if (selectBox == "SAR") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = xmrAmount * ((<?php echo $SAR; ?> + <?php echo $SAR_lm; ?>) / 2);
                fiatValue.value = value.toFixed(2);
            } else {
                let value = xmrAmount * <?php echo $SAR; ?>;
                fiatValue.value = value.toFixed(2);
            }
        } else if (selectBox == "SEK") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = xmrAmount * ((<?php echo $SEK; ?> + <?php echo $SEK_lm; ?>) / 2);
                fiatValue.value = value.toFixed(2);
            } else {
                let value = xmrAmount * <?php echo $SEK; ?>;
                fiatValue.value = value.toFixed(2);
            }
        } else if (selectBox == "PKR") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = xmrAmount * ((<?php echo $PKR; ?> + <?php echo $PKR_lm; ?>) / 2);
                fiatValue.value = value.toFixed(2);
            } else {
                let value = xmrAmount * <?php echo $PKR; ?>;
                fiatValue.value = value.toFixed(2);
            }
        } else if (selectBox == "NZD") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = xmrAmount * ((<?php echo $NZD; ?> + <?php echo $NZD_lm; ?>) / 2);
                fiatValue.value = value.toFixed(2);
            } else {
                let value = xmrAmount * <?php echo $NZD; ?>;
                fiatValue.value = value.toFixed(2);
            }
        } else if (selectBox == "PHP") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = xmrAmount * ((<?php echo $PHP; ?> + <?php echo $PHP_lm; ?>) / 2);
                fiatValue.value = value.toFixed(2);
            } else {
                let value = xmrAmount * <?php echo $PHP; ?>;
                fiatValue.value = value.toFixed(2);
            }
        } else if (selectBox == "NOK") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = xmrAmount * ((<?php echo $NOK; ?> + <?php echo $NOK_lm; ?>) / 2);
                fiatValue.value = value.toFixed(2);
            } else {
                let value = xmrAmount * <?php echo $NOK; ?>;
                fiatValue.value = value.toFixed(2);
            }
        } else if (selectBox == "LKR") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = xmrAmount * ((<?php echo $LKR; ?> + <?php echo $LKR_lm; ?>) / 2);
                fiatValue.value = value.toFixed(2);
            } else {
                let value = xmrAmount * <?php echo $LKR; ?>;
                fiatValue.value = value.toFixed(2);
            }
        } else if (selectBox == "MMK") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = xmrAmount * ((<?php echo $MMK; ?> + <?php echo $MMK_lm; ?>) / 2);
                fiatValue.value = value.toFixed(2);
            } else {
                let value = xmrAmount * <?php echo $MMK; ?>;
                fiatValue.value = value.toFixed(2);
            }
        } else if (selectBox == "HUF") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = xmrAmount * ((<?php echo $HUF; ?> + <?php echo $HUF_lm; ?>) / 2);
                fiatValue.value = value.toFixed(2);
            } else {
                let value = xmrAmount * <?php echo $HUF; ?>;
                fiatValue.value = value.toFixed(2);
            }
        } else if (selectBox == "ILS") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = xmrAmount * ((<?php echo $ILS; ?> + <?php echo $ILS_lm; ?>) / 2);
                fiatValue.value = value.toFixed(2);
            } else {
                let value = xmrAmount * <?php echo $ILS; ?>;
                fiatValue.value = value.toFixed(2);
            }
        } else if (selectBox == "KWD") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = xmrAmount * ((<?php echo $KWD; ?> + <?php echo $KWD_lm; ?>) / 2);
                fiatValue.value = value.toFixed(2);
            } else {
                let value = xmrAmount * <?php echo $KWD; ?>;
                fiatValue.value = value.toFixed(2);
            }
        } else if (selectBox == "NGN") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = xmrAmount * ((<?php echo $NGN; ?> + <?php echo $NGN_lm; ?>) / 2);
                fiatValue.value = value.toFixed(2);
            } else {
                let value = xmrAmount * <?php echo $NGN; ?>;
                fiatValue.value = value.toFixed(2);
            }
        } else if (selectBox == "IDR") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = xmrAmount * ((<?php echo $IDR; ?> + <?php echo $IDR_lm; ?>) / 2);
                fiatValue.value = value.toFixed(2);
            } else {
                let value = xmrAmount * <?php echo $IDR; ?>;
                fiatValue.value = value.toFixed(2);
            }
        } else if (selectBox == "TWD") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = xmrAmount * ((<?php echo $TWD; ?> + <?php echo $TWD_lm; ?>) / 2);
                fiatValue.value = value.toFixed(2);
            } else {
                let value = xmrAmount * <?php echo $TWD; ?>;
                fiatValue.value = value.toFixed(2);
            }
        } else if (selectBox == "ARS") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = xmrAmount * ((<?php echo $ARS; ?> + <?php echo $ARS_lm; ?>) / 2);
                fiatValue.value = value.toFixed(2);
            } else {
                let value = xmrAmount * <?php echo $ARS; ?>;
                fiatValue.value = value.toFixed(2);
            }
        } else if (selectBox == "BDT") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = xmrAmount * ((<?php echo $BDT; ?> + <?php echo $BDT_lm; ?>) / 2);
                fiatValue.value = value.toFixed(2);
            } else {
                let value = xmrAmount * <?php echo $BDT; ?>;
                fiatValue.value = value.toFixed(2);
            }
        } else if (selectBox == "BHD") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = xmrAmount * ((<?php echo $BHD; ?> + <?php echo $BHD_lm; ?>) / 2);
                fiatValue.value = value.toFixed(2);
            } else {
                let value = xmrAmount * <?php echo $BHD; ?>;
                fiatValue.value = value.toFixed(2);
            }
        } else if (selectBox == "BMD") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = xmrAmount * ((<?php echo $BMD; ?> + <?php echo $BMD_lm; ?>) / 2);
                fiatValue.value = value.toFixed(2);
            } else {
                let value = xmrAmount * <?php echo $BMD; ?>;
                fiatValue.value = value.toFixed(2);
            }
        } else if (selectBox == "CZK") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = xmrAmount * ((<?php echo $CZK; ?> + <?php echo $CZK_lm; ?>) / 2);
                fiatValue.value = value.toFixed(2);
            } else {
                let value = xmrAmount * <?php echo $CZK; ?>;
                fiatValue.value = value.toFixed(2);
            }
        } else if (selectBox == "CLP") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = xmrAmount * ((<?php echo $CLP; ?> + <?php echo $CLP_lm; ?>) / 2);
                fiatValue.value = value.toFixed(2);
            } else {
                let value = xmrAmount * <?php echo $CLP; ?>;
                fiatValue.value = value.toFixed(2);
            }
        } else if (selectBox == "DKK") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = xmrAmount * ((<?php echo $DKK; ?> + <?php echo $DKK_lm; ?>) / 2);
                fiatValue.value = value.toFixed(2);
            } else {
                let value = xmrAmount * <?php echo $DKK; ?>;
                fiatValue.value = value.toFixed(2);
            }
        } else if (selectBox == "MXN") {
            if ($('input.localmonero-check').is(':checked')) {
                let value = xmrAmount * ((<?php echo $MXN; ?> + <?php echo $MXN_lm; ?>) / 2);
                fiatValue.value = value.toFixed(2);
            } else {
                let value = xmrAmount * <?php echo $MXN; ?>;
                fiatValue.value = value.toFixed(2);
            }
        }
    }
</script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.7.0.min.js"></script>
    <script type="text/javascript">
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
    </script>
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
    <script type="text/javascript">
    $(document).ready(function(){
        if ($('input.localmonero-check').is(':checked')) {
            document.getElementById('localmonero-info').classList.add("localmonero-info");
        } else {
            document.getElementById('localmonero-info').classList.remove("localmonero-info");
        }
    });

    $('input.localmonero-check').on('change', function(){
        if ($('input.localmonero-check').is(':checked')) {
            document.getElementById('localmonero-info').classList.add("localmonero-info");
        } else {
            document.getElementById('localmonero-info').classList.remove("localmonero-info");
        }
    });
    </script>
</body>
</html>
