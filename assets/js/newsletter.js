const forms = document.querySelectorAll('.soyes-newsletter-form');

forms.forEach(form => {
    const isDesktop = form.querySelector('input[name="is_desktop"]');
    const timezone = form.querySelector('input[name="timezone"]');

    isDesktop.value = !window.matchMedia('(max-width: 781px)').matches;
    timezone.value = Intl.DateTimeFormat().resolvedOptions().timeZone;
});
