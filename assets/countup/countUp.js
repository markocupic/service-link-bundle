/*jshint esversion: 6 */
'use strict';

import {CountUp} from 'countup.js';

(function () {
    const countUpElements = document.querySelectorAll('.content-service-link .service-link-number.count-up');

    for (const countUpElement of countUpElements) {
        const options = {
            startVal: countUpElement.dataset.countupstartval ?? 0,
            separator: "'",
            decimalPlaces: countUpElement.dataset.countupdecimalplaces ?? 0,
            decimal: countUpElement.dataset.countupdecimal ?? '.',
            useIndianSeparators: false,
            duration: countUpElement.dataset.countupduration ?? 3,
            useGrouping: 'true' === countUpElement.dataset.countupgrouping ?? false,
            useEasing: 'true' === countUpElement.dataset.countupeasing ?? false,
            prefix: countUpElement.dataset.countupprefix ?? '',
            suffix: countUpElement.dataset.countupsuffix ?? '',
            enableScrollSpy: true,
            scrollSpyOnce: true,
            onStartCallback: () => {
                countUpElement.classList.add('count-up-started');
            },
            onCompleteCallback: () => {
                countUpElement.classList.remove('count-up-started');
                countUpElement.classList.add('count-up-completed');
            }
        };

        const endVal = countUpElement.dataset.countupendval ?? 0;

        const countUp = new CountUp(countUpElement, endVal, options);

        if (!countUp.error) {
            countUp.start();
        } else {
            console.error(countUp.error);
        }
    }

})();