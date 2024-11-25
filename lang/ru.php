<?php
// For the HTML meta specification, e.g. <!DOCTYPE html><html lang="en">
// https://www.w3schools.com/tags/ref_language_codes.asp
$lang_meta = "ru";
// The browser tab title or search engine title
$page_title = "Конвертация XMR в EUR/BTC/CHF/USD и многие другие";
// Search engine description / text
$meta_description = "Живой курс обмена Monero на многие различные валюты, бесплатно для всех.";
// Search engine keywords
$meta_keywords = "Monero, XMR, фиат, стоимость, курс, живой, обмен, конвертация";
// ↓ XMR [...] ↓
$title_h1 = "конвертация в";
$moneroooTable = "Сервис предоставлен <a href='https://moner.ooo/'>Moner.ooo</a>, Данные предоставлены <a href='https://www.coingecko.com/ru/%D0%9A%D1%80%D0%B8%D0%BF%D1%82%D0%BE%D0%B2%D0%B0%D0%BB%D1%8E%D1%82%D1%8B/%D0%9C%D0%BE%D0%BD%D0%B5%D1%80%D0%BE' hreflang='ru' rel='external'>CoinGecko</a>";
// Info Text
$info = "Курсы обмена, представленные на этом сайте, носят исключительно информационный характер. Их точность не гарантируется, и они могут быть изменены без предварительного уведомления. Курсы обмена обновляются каждые 5 секунд. Последнее обновление <u title='Hours:Minutes:Seconds (hh:mm:ss)'>$time</u>, Europe/Berlin. Данные предоставлены <a class='text-white' href='https://www.coingecko.com/ru/%D0%9A%D1%80%D0%B8%D0%BF%D1%82%D0%BE%D0%B2%D0%B0%D0%BB%D1%8E%D1%82%D1%8B/%D0%9C%D0%BE%D0%BD%D0%B5%D1%80%D0%BE' hreflang='ru' rel='external' target='_blank'>CoinGecko</a>.<br/><a target='_blank' href='https://kuno.anne.media/donate/onml/' rel='external' hreflang='en'><img loading='lazy' src='./img/kuno-monero-26x26.png' width='17' height='17' alt='Kuno - Moner.ooo страница для донатов'></a>&nbsp;<a target='_blank' href='https://kuno.anne.media/' class='text-white' rel='external' hreflang='en'>Kuno – Сбор средств с помощью Monero</a> | <a class='text-white' href='https://github.com/nice42q/moner.ooo' hreflang='en' rel='external' target='_blank'>GitHub</a> | <a style='text-decoration:none; font-weight:bold;' class='text-white' href='https://servers.guru/' hreflang='en' rel='external' target='_blank'>Webhosting provided by<img loading='lazy' src='./img/servers-guru.svg' height='19' alt='Servers Guru' title='Servers Guru' /></a>";
$clipboard_copy_tooltip = "Копировать в буфер обмена";
$l_fiatSelect = "Выбор валюты";
$l_fiatInput = "Поле ввода значений в фиате";
$l_xmrInput = "Поле ввода значения в Monero";
// Tooltip Titel
$l_eur = "Евро";
$l_btc = "Bitcoin";
$l_chf = "Швейцарский франк";
$l_usd = "Доллар США";
$l_ltc = "Litecoin";
$l_gbp = "Фунт стерлингов";
$l_rub = "Российский рубль";
$l_jpy = "Йена";
$l_try = "Турецкая лира";
$l_cad = "Канадский доллар";
$l_aud = "Австралийский доллар";
$l_hkd = "Гонконгский доллар";
$l_sgd = "Сингапурский доллар";
$l_pln = "Злотые";
$l_zar = "Южноафриканский ранд";
$l_inr = "Индийская рупия";
$l_aed = "Дирхам ОАЭ";
$l_eth = "Ethereum";
$l_uah = "Гривна";
$l_krw = "Южнокорейская вона";
$l_brl = "Бразильский риал";
$l_myr = "Малайзийский ринггит";
$l_cny = "Китайский юань";
$l_xag = "Серебро (тройская унция)";
$l_xau = "Золото (тройская унция)";
$l_vnd = "Вьетнамский донг";
$l_vef = "Венесуэльский боливар";
$l_thb = "Тайский бат";
$l_sar = "Саудовский риял";
$l_sek = "Шведская крона";
$l_pkr = "Пакистанская рупия";
$l_nzd = "Новозеландский доллар";
$l_php = "Филиппинское песо";
$l_nok = "Норвежская крона";
$l_lkr = "Шри-Ланкийская рупия";
$l_mmk = "Мьянманский кят";
$l_huf = "Венгерский форинт";
$l_ils = "Новый израильский шекель";
$l_kwd = "Кувейтский динар";
$l_ngn = "Нигерийская найра";
$l_idr = "Индонезийская рупия";
$l_twd = "Новый тайваньский доллар";
$l_ars = "Аргентинское песо";
$l_bdt = "Бангладешская така";
$l_bhd = "Бахрейнский динар";
$l_bmd = "Бермудский доллар";
$l_czk = "Чешская крона";
$l_dkk = "Датская крона";
$l_clp = "Чилийское песо";
$l_mxn = "Мексиканское песо";
$l_gel = "Georgian Lari";
// More Monero links
$getmonero = '<a class="text-white" href="https://www.getmonero.org/ru/" hreflang="ru" target="_blank" rel="external">Официальный сайт</a> | <a class="text-white" href="https://ccs.getmonero.org/" hreflang="en" target="_blank" rel="external">Система краудфандинга для сообществ (CCS)</a> | <a class="text-white" href="https://www.monero.observer/resources/" hreflang="en" target="_blank" rel="external">Обозреватель Monero</a> | <a class="text-white" href="https://www.monerotalk.live/" hreflang="en" target="_blank" rel="external">Monero Talk</a>';
$countrymonero = '&nbsp;| <a class="text-white" href="https://t.me/xmr_ru" hreflang="en" target="_blank" rel="external">Telegram - Monero XMR.RU</a>';
