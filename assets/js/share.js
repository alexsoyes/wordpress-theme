// only desktop +
if (!window.matchMedia('(max-width: 781px)').matches) {
    /**
     * Open in a new Window.
     *
     * @type {NodeListOf<Element>}
     */
    var windowLinks = document.querySelectorAll("[data-window]");

    for (var link of windowLinks) {
        link.onclick = function () {
            openPopup(this.dataset.window, "Partager", 800, 600);
        };
    }

    /**
     * @param url
     * @param title
     * @param width
     * @param height
     * @returns {Window}
     */
    function openPopup(url, title, width, height) {
        var left = (screen.width / 2) - (width / 2);
        var top = (screen.height / 2) - (height / 2);
        return window.open(url, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + width + ', height=' + height + ', top=' + top + ', left=' + left);
    }
}