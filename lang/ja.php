<?php
// For the HTML meta specification, e.g. <!DOCTYPE html><html lang="en">
// https://www.w3schools.com/tags/ref_language_codes.asp
$lang_meta = "ja";
// The browser tab title or search engine title
$page_title = "XMRをEUR/BTC/CHF/USDおよびその他多くの通貨に変換";
// Search engine description / text
$meta_description = "さまざまな通貨でのMoneroのリアルタイム為替レートを無料で提供します。";
// Search engine keywords
$meta_keywords = "Monero, XMR, フィアット, 価値, レート, リアルタイム, 為替, 変換";
// ↓ XMR [...] ↓
$title_h1 = "変換先";
$moneroooTable = "サービス提供者 <a href='https://moner.ooo/'>Moner.ooo</a>, データ提供者 <a href='https://www.coingecko.com/ja/%E3%82%B3%E3%82%A4%E3%83%B3/%E3%83%A2%E3%83%8D%E3%83%AD' hreflang='ja' rel='external'>CoinGecko</a>";
// Info Text
$info = "このサイトの為替レートは情報提供のみを目的としています。正確性は保証されず、予告なく変更されることがあります。為替レートは5秒ごとに更新されます。最後の更新: <u title='Hours:Minutes:Seconds (hh:mm:ss)'>$time</u> 時間, Europe/Berlin。 データ提供者: <a class='text-white' href='https://www.coingecko.com/ja/%E3%82%B3%E3%82%A4%E3%83%B3/%E3%83%A2%E3%83%8D%E3%83%AD' hreflang='ja' rel='external' target='_blank'>CoinGecko</a>。<br/><a target='_blank' href='https://kuno.anne.media/donate/onml/' rel='external' hreflang='en'><img loading='lazy' src='./img/kuno-monero-26x26.png' width='17' height='17' alt='Kuno - Moner.ooo donation page'></a>&nbsp;<a target='_blank' href='https://kuno.anne.media/' class='text-white' rel='external' hreflang='en'>Kuno – Moneroで資金を集める</a> | <a class='text-white' href='https://github.com/nice42q/moner.ooo' hreflang='en' rel='external' target='_blank'>GitHub</a> | <a style='text-decoration:none; font-weight:bold;' class='text-white' href='https://servers.guru/' hreflang='en' rel='external' target='_blank'>Webホスティング提供者<img loading='lazy' src='./img/servers-guru.svg' height='19' alt='Servers Guru' title='Servers Guru' /></a>";
$clipboard_copy_tooltip = "クリップボードにコピー";
$l_fiatSelect = "通貨の選択";
$l_fiatInput = "フィアット通貨の入力フィールド";
$l_xmrInput = "Moneroの入力フィールド";
// Tooltip Titel
$l_eur = "ユーロ";
$l_btc = "ビットコイン";
$l_chf = "スイスフラン";
$l_usd = "米ドル";
$l_ltc = "ライトコイン";
$l_gbp = "ポンド";
$l_rub = "ロシアルーブル";
$l_jpy = "円";
$l_try = "トルコリラ";
$l_cad = "カナダドル";
$l_aud = "オーストラリアドル";
$l_hkd = "香港ドル";
$l_sgd = "シンガポールドル";
$l_pln = "ズウォティ";
$l_zar = "南アフリカランド";
$l_inr = "インドルピー";
$l_aed = "UAEディルハム";
$l_eth = "イーサリアム";
$l_uah = "フリヴニャ";
$l_krw = "韓国ウォン";
$l_brl = "ブラジルレアル";
$l_myr = "マレーシアリンギット";
$l_cny = "人民元";
$l_xag = "銀 (トロイオンス)";
$l_xau = "金 (トロイオンス)";
$l_vnd = "ベトナムドン";
$l_vef = "ベネズエラボリバル";
$l_thb = "バーツ";
$l_sar = "サウジリヤル";
$l_sek = "スウェーデンクローナ";
$l_pkr = "パキスタンルピー";
$l_nzd = "ニュージーランドドル";
$l_php = "フィリピンペソ";
$l_nok = "ノルウェークローネ";
$l_lkr = "スリランカルピー";
$l_mmk = "ミャンマーチャット";
$l_huf = "ハンガリーフォリント";
$l_ils = "イスラエル新シェケル";
$l_kwd = "クウェートディナール";
$l_ngn = "ナイラ";
$l_idr = "インドネシアルピア";
$l_twd = "ニュー台湾ドル";
$l_ars = "アルゼンチンペソ";
$l_bdt = "バングラデシュタカ";
$l_bhd = "バーレーンディナール";
$l_bmd = "バミューダドル";
$l_czk = "チェココルナ";
$l_dkk = "デンマーククローネ";
$l_clp = "チリペソ";
$l_mxn = "メキシコペソ";
$l_gel = "Georgian Lari";
// More Monero links
$getmonero = '<a class="text-white" href="https://www.getmonero.org/" hreflang="en" target="_blank" rel="external">公式ウェブサイト</a> | <a class="text-white" href="https://ccs.getmonero.org/" hreflang="en" target="_blank" rel="external">コミュニティクラウドファンディングシステム (CCS)</a> | <a class="text-white" href="https://www.monero.observer/resources/" hreflang="en" target="_blank" rel="external">Moneroオブザーバー</a> | <a class="text-white" href="https://www.monerotalk.live/" hreflang="en" target="_blank" rel="external">Moneroトーク</a>';
$countrymonero = ' | <a class="text-white" href="https://t.me/monero" hreflang="en" target="_blank" rel="external">Telegram - Monero XMR</a> | <a class="text-white" href="https://www.revuo-xmr.com/" hreflang="en" target="_blank" rel="external">Revuo Monero</a>';
