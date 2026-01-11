<?php
$l_lang_meta         = "ko";
$l_rtl               = "false";
$l_page_title        = "XMR을 EUR/BTC/CHF/USD 등 다양한 통화로 변환";
$l_meta_description  = "다양한 통화로 모네로의 실시간 환율, 누구나 무료로 이용 가능.";
$l_meta_keywords     = "모네로, XMR, 법정화폐, 가치, 환율, 실시간, 환전, 변환";

$l_title_h1          = "변환 대상";
$l_fiatSelect        = "통화 선택";
$l_fiatInput         = "법정화폐 입력 필드";
$l_xmrInput          = "모네로 입력 필드";
$l_clipboard_copy_tooltip = "클립보드에 복사";
$l_copytoclipboard_success_text = "복사 완료!";
$l_copytoclipboard_error_text   = "오류 발생!";

$l_refresh_info_minute  = "환율은 1분마다 업데이트됩니다.";
$l_refresh_info_minutes = "환율은 %s분마다 업데이트됩니다.";
$l_refresh_info_seconds = "환율은 %s초마다 업데이트됩니다.";
$l_last_at              = "마지막 업데이트 시각:";
$l_hr_min_sec           = "시:분:초 (hh:mm:ss)";
$l_unixTime             = "Unix 시간:";

$l_aed = "아랍에미리트 디르함";
$l_ars = "아르헨티나 페소";
$l_aud = "호주 달러";
$l_bdt = "방글라데시 타카";
$l_bhd = "바레인 디나르";
$l_bmd = "버뮤다 달러";
$l_brl = "브라질 레알";
$l_btc = "비트코인";
$l_cad = "캐나다 달러";
$l_chf = "스위스 프랑";
$l_clp = "칠레 페소";
$l_cny = "위안";
$l_czk = "체코 코루나";
$l_dkk = "덴마크 크로네";
$l_eth = "이더리움";
$l_eur = "유로";
$l_gbp = "영국 파운드";
$l_gel = "조지아 라리";
$l_hkd = "홍콩 달러";
$l_huf = "포린트";
$l_idr = "인도네시아 루피아";
$l_ils = "이스라엘 셰켈";
$l_inr = "인도 루피";
$l_jpy = "엔";
$l_krw = "대한민국 원";
$l_kwd = "쿠웨이트 디나르";
$l_lkr = "스리랑카 루피";
$l_ltc = "라이트코인";
$l_mmk = "미얀마 차트";
$l_mxn = "멕시코 페소";
$l_myr = "말레이시아 링깃";
$l_ngn = "나이지리아 나이라";
$l_nok = "노르웨이 크로나";
$l_nzd = "뉴질랜드 달러";
$l_php = "필리핀 페소";
$l_pkr = "파키스탄 루피";
$l_pln = "즈워티";
$l_rub = "러시아 루블";
$l_sar = "사우디 리얄";
$l_sek = "스웨덴 크로나";
$l_sgd = "싱가포르 달러";
$l_thb = "바트";
$l_try = "터키 리라";
$l_twd = "신 타이완 달러";
$l_uah = "흐리브냐";
$l_usd = "미국 달러";
$l_vef = "베네수엘라 볼리바르";
$l_vnd = "베트남 동";
$l_xag = "은 (트로이 온스)";
$l_xau = "금 (트로이 온스)";
$l_zar = "남아프리카 랜드";

$l_info_main         = "이 사이트의 환율은 정보 제공 목적으로만 제공됩니다.&nbsp;정확성을 보장하지 않으며 사전 통보 없이 변경될 수 있습니다.";

$l_data_provided     = "데이터 제공:";
$l_cg_url            = "https://www.coingecko.com/ko/코인/모네로";
$l_cg_url_hreflang    = "ko";
$l_coingecko         = $l_data_provided . " <a class=\"text-white\" href=\"$l_cg_url\" hreflang=\"$l_cg_url_hreflang\" rel=\"external\" target=\"_blank\">CoinGecko</a>.";

$l_getmonero         = '<a class="text-white" href="https://www.getmonero.org/" hreflang="en" target="_blank" rel="external">공식 웹사이트</a> | <a class="text-white" href="https://ccs.getmonero.org/" hreflang="en" target="_blank" rel="external">CCS</a> | <a class="text-white" href="https://www.monero.observer/resources/" hreflang="en" target="_blank" rel="external">Observer</a> | <a class="text-white" href="https://www.monerotalk.live/" hreflang="en" target="_blank" rel="external">Talk</a>';
$l_countrymonero     = '';

$l_donation_page     = "후원 페이지";
$l_kuno_homepage_url = "https://kuno.anne.media/";
$l_kuno_homepage_url_hreflang = "en";
$l_kuno_text         = "Kuno – 모네로 기금 조성";
$l_webserver_sponsor = "웹호스팅 제공:";

$l_api_update        = $l_last_at . " <u title=\"$l_hr_min_sec\"><span id=\"lastUpdateDisplay\">00:00:00</span></u> (<span id=\"displayTimeZone\">현지 시간</span>).";

$l_info              = $l_info_main."&nbsp;<span id=\"refreshInfo\" class=\"mb-1\">--</span>&nbsp;$l_api_update&nbsp;$l_coingecko<br><a target=\"_blank\" href=\"https://kuno.anne.media/donate/onml/\" rel=\"external\" hreflang=\"en\"><img loading=\"lazy\" align=\"middle\" src=\"./img/kuno-monero-26x26.png\" width=\"17\" height=\"17\" alt=\"Kuno - Moner.ooo $l_donation_page\"></a>&nbsp;<a target=\"_blank\" href=\"$l_kuno_homepage_url\" class=\"text-white\" rel=\"external\" hreflang=\"$l_kuno_homepage_url_hreflang\">$l_kuno_text</a> | <a class=\"text-white\" href=\"https://github.com/nice42q/moner.ooo\" hreflang=\"en\" rel=\"external\" target=\"_blank\">GitHub</a> | <a style=\"text-decoration:none; font-weight:bold;\" class=\"text-white\" href=\"https://servers.guru/\" hreflang=\"en\" rel=\"external\" target=\"_blank\">$l_webserver_sponsor<img loading=\"lazy\" align=\"middle\" src=\"./img/servers-guru.svg\" height=\"19\" alt=\"Servers Guru\" title=\"Servers Guru\"></a>";