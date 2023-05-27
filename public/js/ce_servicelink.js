document.addEventListener('DOMContentLoaded', function () {

    let icons = document.querySelectorAll('.ce_serviceLink  .service-link-icon');
    if (icons.length) {
        for (let i = 0, len = icons.length; i < len; i++) {
            icons[i].addEventListener('click', function (event) {
                event.preventDefault();
                event.stopImmediatePropagation();

                let link = event.target.closest('.ce_serviceLink').querySelector('a');

                if (link.hasAttribute('href')) {
                    window.location.href = link.getAttribute('href');
                }
            });

        }
    }

    let serviceLinks = document.querySelectorAll('.ce_serviceLink');
    if (serviceLinks.length) {
        for (let i = 0, len = icons.length; i < len; i++) {
            serviceLinks[i].addEventListener('mouseenter', function (event) {
                event.preventDefault();
                event.stopImmediatePropagation();
                event.target.style.cursor = 'pointer';
            });
        }
    }

}, false);