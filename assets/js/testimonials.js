// get all the link in data-link attribute and create a listener that open this link in a new window

const testimonials = document.querySelectorAll('.testimonial');
testimonials.forEach(function (link) {
    link.addEventListener('click', function (e) {
        e.preventDefault();
        window.open(link.dataset.link, '_blank');
    });
});