
function updateUrlParams(key, value) {
    const urlParams = new URLSearchParams(window.location.search);
    urlParams.set(key, value)
    window.history.replaceState({}, '', `${window.location.pathname}?${urlParams}`);
}
