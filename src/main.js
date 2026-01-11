import 'bootstrap/dist/css/bootstrap.css';
import './custom.css';
import Tooltip from 'bootstrap/js/dist/tooltip';

function formatOutput(num, limit) {
    let str = num.toLocaleString('en-US', {
        useGrouping: false,
        minimumFractionDigits: 0,
        maximumFractionDigits: 20
    });
    let parts = str.split('.');
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, " ");
    if (parts.length > 1) {
        let decimals = parts[1].substring(0, limit);
        decimals = decimals.replace(/(\d{4})(?=\d)/g, "$1 ");
        return parts[0] + '.' + decimals;
    }
    return parts[0];
}

function selectAllText(el) {
    window.requestAnimationFrame(() => {
        el.select();
        el.setSelectionRange(0, 99999);
    });
}

function fiatConvert(val) {
    const cleanFiat = document.getElementById("fiatInput").value.replace(/\s/g, '');
    const xmrInput = document.getElementById("xmrInput");
    const currency = document.getElementById("selectBox").value;
    const data = window.currencyData[currency];
    const rate = (data && data.rate) ? data.rate : 0;
    if (rate > 0 && cleanFiat !== "") {
        const result = parseFloat(cleanFiat) / rate;
        xmrInput.value = formatOutput(result, 12);
    }
}

function xmrConvert(val) {
    const cleanXmr = document.getElementById("xmrInput").value.replace(/\s/g, '');
    const fiatInput = document.getElementById("fiatInput");
    const currency = document.getElementById("selectBox").value;
    const data = window.currencyData[currency];
    const rate = (data && data.rate) ? data.rate : 0;
    const limit = (data && typeof data.digits !== 'undefined') ? data.digits : 2;
    if (rate > 0 && cleanXmr !== "") {
        const result = parseFloat(cleanXmr) * rate;
        fiatInput.value = formatOutput(result, limit);
    }
}

function validateAndConvert(el, type) {
    const start = el.selectionStart;
    const oldLength = el.value.length;
    let val = el.value.replace(',', '.');
    val = val.replace(/[^\d.]/g, '');
    let parts = val.split('.');
    if (parts.length > 2) {
        val = parts[0] + '.' + parts.slice(1).join('');
        parts = val.split('.');
    }
    let limit = 12;
    if (type === 'fiat') {
        const currency = document.getElementById("selectBox").value;
        const data = window.currencyData[currency];
        limit = (data && typeof data.digits !== 'undefined') ? data.digits : 2;
    }
    if (parts.length > 1 && parts[1].length > limit) {
        parts[1] = parts[1].substring(0, limit);
    }
    let formattedValue = window.formatOutput(parseFloat(parts[0] || 0), 0);
    if (parts.length > 1 || val.endsWith('.')) {
        let decimals = parts[1] || '';
        decimals = decimals.replace(/(\d{4})(?=\d)/g, "$1 ");
        formattedValue = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, " ") + '.' + decimals;
    } else {
        formattedValue = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, " ");
    }
    el.value = formattedValue;
    const newLength = el.value.length;
    let newCursorPos = start + (newLength - oldLength);
    newCursorPos = Math.max(0, newCursorPos);
    el.setSelectionRange(newCursorPos, newCursorPos);
    let cleanVal = el.value.replace(/\s/g, '');
    if (cleanVal !== "" && cleanVal !== ".") {
        type === 'xmr' ? window.xmrConvert(cleanVal) : window.fiatConvert(cleanVal);
    }
}

function copyToClipboard(elementId) {
    const input = document.getElementById(elementId);
    if (!input) return;
    const btn = document.querySelector(`button[onclick*="${elementId}"]`);
    const successText = (window.translations && window.translations.copySuccess) || 'Success!';
    const errorText = (window.translations && window.translations.copyFail) || 'Fail!';
    const originalValue = input.value;
    const cleanValue = originalValue.replace(/\s/g, '');
    input.value = cleanValue;
    input.select();
    input.setSelectionRange(0, 99999);
    const tooltip = Tooltip.getInstance(btn);
    try {
        const successful = document.execCommand('copy');
        if (successful && btn) {
            const originalIcon = btn.innerHTML;
            btn.innerHTML = '&#x2705;';
            if (tooltip) {
                tooltip.setContent({ '.tooltip-inner': '<b>' + successText + '</b>' });
                tooltip.show();
            }
            setTimeout(() => {
                btn.innerHTML = originalIcon;
                resetTooltip(tooltip, btn);
            }, 1500);
        } else {
            throw new Error('Copy command returned false');
        }
    } catch (err) {
        console.error(errorText, err);
        if (btn && tooltip) {
            const originalIcon = btn.innerHTML;
            btn.innerHTML = '&#x274C;';
            tooltip.setContent({ '.tooltip-inner': '<span style="color: #ff4d4d;"><b>' + errorText + '</b></span>' });
            tooltip.show();
            setTimeout(() => {
                btn.innerHTML = originalIcon;
                resetTooltip(tooltip, btn);
            }, 1500);
        }
    }
    input.value = originalValue;
    input.blur();
}

function resetTooltip(tooltip, btn) {
    if (tooltip) {
        const originalTitle = btn.getAttribute('data-bs-original-title') || btn.title || 'Copy to clipboard';
        tooltip.setContent({ '.tooltip-inner': originalTitle });
        tooltip.hide();
    }
}

function updateTimestamp(unixSeconds) {
    const displayEl = document.getElementById('lastUpdateDisplay');
    const displayTz = document.getElementById('displayTimeZone');
    if (!displayEl || !displayTz) return;
    const timestamp = (unixSeconds && unixSeconds > 0) ? unixSeconds * 1000 : Date.now();
    const date = new Date(timestamp);
    const userLocale = navigator.language || 'en-US';
    const timeString = date.toLocaleTimeString(userLocale, {
        hour: '2-digit',
        minute: '2-digit',
        second: '2-digit'
    });
    let timeZone;
    try {
        timeZone = Intl.DateTimeFormat().resolvedOptions().timeZone || "UTC";
    } catch (e) {
        timeZone = "UTC";
    }
    displayEl.textContent = timeString;
    displayTz.textContent = timeZone;
}

function updateRefreshText() {
    const infoEl = document.getElementById('refreshInfo');
    if (!infoEl || !window.translations || !window.appConfig) return;
    const seconds = (window.appConfig.refreshInterval / 1000);
    const t = window.translations;
    let message = "";
    if (seconds === 60) {
        message = t.refreshMinute;
    } else if (seconds % 60 === 0) {
        const minutes = seconds / 60;
        message = t.refreshMinutes.replace('%s', minutes);
    } else {
        message = t.refreshSeconds.replace('%s', seconds);
    }
    infoEl.textContent = message;
}

window.Tooltip = Tooltip;
window.validateAndConvert = validateAndConvert;
window.fiatConvert = fiatConvert;
window.xmrConvert = xmrConvert;
window.copyToClipboard = copyToClipboard;
window.updateTimestamp = updateTimestamp;
window.formatOutput = formatOutput;
window.updateRefreshText = updateRefreshText;

document.addEventListener('DOMContentLoaded', () => {
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    tooltipTriggerList.forEach(el => {
        new Tooltip(el, { placement: "top", html: true });
    });

    updateRefreshText();

    const inputs = [document.getElementById('xmrInput'), document.getElementById('fiatInput')];
    inputs.forEach(input => {
        if (input) {
            input.addEventListener('focus', function () {
                selectAllText(this);
            });
        }
    });

    const initialUnix = (window.appConfig && window.appConfig.lastUpdate)
        ? window.appConfig.lastUpdate
        : Math.floor(Date.now() / 1000);

    updateTimestamp(initialUnix);
});