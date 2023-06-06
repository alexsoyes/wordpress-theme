function setCookie(name, value, days, path) {
    let expires = '';

    if (days) {
        const date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = '; expires=' + date.toUTCString();
    }

    document.cookie = name + '=' + (value || '') + expires + '; path=' + path;
}

function getCookie(name) {
    const cookies = document.cookie.split(';');

    for (const cookie of cookies) {
        if (cookie.indexOf(name + '=') > -1) {
            return cookie.split('=')[1];
        }
    }

    return null;
}

const exit = e => {
    const shouldExit =
        [...e.target.classList].includes('exit-intent-popup') || // user clicks on mask
        e.target.className === 'close' || // user clicks on the close icon
        e.keyCode === 27; // user hits escape

    if (shouldExit) {
        document.querySelector('.exit-intent-popup').classList.remove('visible');

        setCookie('exitIntentShown', true, 14, '/');
    }
};

const mouseEvent = e => {
    const shouldShowExitIntent =
        !e.toElement &&
        !e.relatedTarget &&
        e.clientY < 10;

    if (shouldShowExitIntent) {
        document.removeEventListener('mouseout', mouseEvent);
        document.querySelector('.exit-intent-popup').classList.add('visible');
    }
};

if ('true' !== getCookie('exitIntentShown')) {
    setTimeout(() => {
        document.addEventListener('mouseout', mouseEvent);
    }, 0);
}

setTimeout(() => {
    document.addEventListener('keydown', exit);
    document.querySelector('.exit-intent-popup').addEventListener('click', exit);
}, 0);

if (window.location.href.indexOf('inscription-confirmee') > -1) {
    setCookie('exitIntentShown', true, 14, '/');
}