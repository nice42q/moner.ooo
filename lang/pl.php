<?php
$l_lang_meta         = "pl";
$l_rtl               = "false";
$l_page_title        = "Wymiana XMR na EUR/BTC/CHF/USD oraz wiele innych";
$l_meta_description  = "Kurs wymiany Monero w wielu różnych walutach, darmowy dla wszystkich.";
$l_meta_keywords     = "Monero, XMR, fiat, wartość, na żywo, natychmiastowe, wymiana, kurs";

$l_title_h1          = "wymiana na";
$l_fiatSelect        = "Wybór waluty";
$l_fiatInput         = "Pole wprowadzania wartości fiat";
$l_xmrInput          = "Pole wprowadzania wartości Monero";
$l_clipboard_copy_tooltip = "Skopiuj do schowka";
$l_copytoclipboard_success_text = "Skopiowano!";
$l_copytoclipboard_error_text   = "Błąd!";

$l_refresh_info_minute  = "Kursy są aktualizowane co minutę.";
$l_refresh_info_minutes = "Kursy są aktualizowane co %s minut.";
$l_refresh_info_seconds = "Kursy są aktualizowane co %s sekund.";
$l_last_at              = "Ostatnia aktualizacja o";
$l_hr_min_sec           = "Godziny:Minuty:Sekundy (hh:mm:ss)";
$l_unixTime             = "Czas Unix:";

$l_aed = "Dirham ZEA";
$l_ars = "Peso argentyńskie";
$l_aud = "Dolar australijski";
$l_bdt = "Taka bengalska";
$l_bhd = "Dinar bahrański";
$l_bmd = "Dolar bermudzki";
$l_brl = "Real brazylijski";
$l_btc = "Bitcoin";
$l_cad = "Dolar kanadyjski";
$l_chf = "Frank szwajcarski";
$l_clp = "Peso chilijskie";
$l_cny = "Renminbi";
$l_czk = "Korona czeska";
$l_dkk = "Korona duńska";
$l_eth = "Ethereum";
$l_eur = "Euro";
$l_gbp = "Funt szterling";
$l_gel = "Lari gruzińskie";
$l_hkd = "Dolar hongkoński";
$l_huf = "Forint węgierski";
$l_idr = "Rupia indonezyjska";
$l_ils = "Nowy szekel izraelski";
$l_inr = "Rupia indyjska";
$l_jpy = "Jen";
$l_krw = "Won południowokoreański";
$l_kwd = "Dinar kuwejcki";
$l_lkr = "Rupia lankijska";
$l_ltc = "Litecoin";
$l_mmk = "Kiat birmański";
$l_mxn = "Peso meksykańskie";
$l_myr = "Ringgit malezyjski";
$l_ngn = "Naira nigeryjska";
$l_nok = "Korona norweska";
$l_nzd = "Dolar nowozelandzki";
$l_php = "Peso filipińskie";
$l_pkr = "Rupia pakistańska";
$l_pln = "Złoty";
$l_rub = "Rubel rosyjski";
$l_sar = "Rial saudyjski";
$l_sek = "Korona szwedzka";
$l_sgd = "Dolar singapurski";
$l_thb = "Baht";
$l_try = "Lira turecka";
$l_twd = "Nowy dolar tajwański";
$l_uah = "Hrywna";
$l_usd = "Dolar amerykański";
$l_vef = "Boliwar wenezuelski";
$l_vnd = "Dong wietnamski";
$l_xag = "Srebro (uncja trojańska)";
$l_xau = "Złoto (uncja trojańska)";
$l_zar = "Rand południowoafrykański";

$l_info_main         = "Podane na tej stronie kursy wymiany mają charakter wyłącznie informacyjny.&nbsp;Nie gwarantujemy ich dokładności i mogą ulec zmianie bez uprzedzenia.";

$l_data_provided     = "Dane dostarczone przez";
$l_cg_url            = "https://www.coingecko.com/pl/waluty/monero";
$l_cg_url_hreflang    = "pl";
$l_coingecko         = $l_data_provided . " <a class=\"text-white\" href=\"$l_cg_url\" hreflang=\"$l_cg_url_hreflang\" rel=\"external\" target=\"_blank\">CoinGecko</a>.";

$l_getmonero         = '<a class="text-white" href="https://www.getmonero.org/pl/" hreflang="pl" target="_blank" rel="external">Oficjalna strona</a> | <a class="text-white" href="https://ccs.getmonero.org/" hreflang="en" target="_blank" rel="external">CCS</a> | <a class="text-white" href="https://www.monero.observer/resources/" hreflang="en" target="_blank" rel="external">Observer</a> | <a class="text-white" href="https://www.monerotalk.live/" hreflang="en" target="_blank" rel="external">Talk</a>';
$l_countrymonero     = '&nbsp;| <a class="text-white" href="https://t.me/moneropl" hreflang="en" target="_blank" rel="external">Telegram PL</a>';

$l_donation_page     = "strona darowizn";
$l_kuno_homepage_url = "https://kuno.anne.media/lang/pl/";
$l_kuno_homepage_url_hreflang = "pl";
$l_kuno_text         = "Kuno – Zbieraj fundusze z Monero";
$l_webserver_sponsor = "Usługi hostingowe dostarczone przez";

$l_api_update        = $l_last_at . " <u title=\"$l_hr_min_sec\"><span id=\"lastUpdateDisplay\">00:00:00</span></u> (<span id=\"displayTimeZone\">czas lokalny</span>).";

$l_info              = $l_info_main."&nbsp;<span id=\"refreshInfo\" class=\"mb-1\">--</span>&nbsp;$l_api_update&nbsp;$l_coingecko<br><a target=\"_blank\" href=\"https://kuno.anne.media/donate/onml/\" rel=\"external\" hreflang=\"en\"><img loading=\"lazy\" align=\"middle\" src=\"./img/kuno-monero-26x26.png\" width=\"17\" height=\"17\" alt=\"Kuno - Moner.ooo $l_donation_page\"></a>&nbsp;<a target=\"_blank\" href=\"$l_kuno_homepage_url\" class=\"text-white\" rel=\"external\" hreflang=\"$l_kuno_homepage_url_hreflang\">$l_kuno_text</a> | <a class=\"text-white\" href=\"https://github.com/nice42q/moner.ooo\" hreflang=\"en\" rel=\"external\" target=\"_blank\">GitHub</a> | <a style=\"text-decoration:none; font-weight:bold;\" class=\"text-white\" href=\"https://servers.guru/\" hreflang=\"en\" rel=\"external\" target=\"_blank\">$l_webserver_sponsor<img loading=\"lazy\" align=\"middle\" src=\"./img/servers-guru.svg\" height=\"19\" alt=\"Servers Guru\" title=\"Servers Guru\"></a>";