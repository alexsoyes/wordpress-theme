const forms = document.querySelectorAll('.soyes-newsletter-form');

const urlParams = new URLSearchParams(window.location.search);
const message = urlParams.get('message');

if (message) {
    alert("Erreur ! Je viens juste de mettre en place le filtre antispam et ça a planté.... Merci de me contacter à hello@alexsoyes.com 🙏");
}

/**
 * Loaded by URL script.
 */
function initRecaptcha() {
    grecaptcha.ready(function () {
        grecaptcha.execute('6LdgxOgkAAAAACxwa9O5V32POHoZ9yoUJtCTrjGX', {action: 'submit'}).then(function (token) {

            for (let i = 0; i < forms.length; i++) {
                const form = forms[i];

                const isDesktop = form.querySelector('input[name="is_desktop"]');
                const timezone = form.querySelector('input[name="timezone"]');

                isDesktop.value = !window.matchMedia('(max-width: 781px)').matches;
                timezone.value = Intl.DateTimeFormat().resolvedOptions().timeZone;

                const hiddenField = document.createElement('input');
                hiddenField.setAttribute('type', 'hidden');
                hiddenField.setAttribute('name', 'g-recaptcha-response');
                hiddenField.setAttribute('value', token);
                form.appendChild(hiddenField);
            }
        });
    });
}