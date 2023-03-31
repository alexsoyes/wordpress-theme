// only desktop +
if (!window.matchMedia('(max-width: 781px)').matches) {
    const tocButtons = document.querySelectorAll('.toc_button');

    for (let i = 0; i < tocButtons.length; i++) {
        tocButtons[i].addEventListener('click', function () {
            window.location.hash = this.dataset.href;
        });
    }
}



