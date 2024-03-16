function handleLeftClick(event) {
    if (event.button !== 0) {
        return;
    }

    event.preventDefault();
    const attribute = this.getAttribute("data-qcd");
    const url = decodeURIComponent(window.atob(attribute));

    if (event.ctrlKey) {
        const newWindow = window.open(url, '_blank');
        newWindow.focus();
    } else {
        document.location.href = url;
    }
}

function handleRightClick(event) {
    const attribute = this.getAttribute("data-qcd");
    const url = decodeURIComponent(window.atob(attribute));

    if (event.ctrlKey) {
        event.preventDefault();
        const newWindow = window.open(url, '_blank');
        newWindow.focus();
    }
}

function onReady() {
    const elements = document.getElementsByClassName("qcd");

    for (let element of elements) {
        element.addEventListener('click', handleLeftClick, false);
        element.addEventListener('contextmenu', handleRightClick, false);
    }
}

if (document.readyState !== "loading") {
    onReady();
} else {
    document.addEventListener("DOMContentLoaded", onReady);
}