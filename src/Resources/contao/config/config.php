<?php

// ServiceLinks require FontAwesome 5
define('SERVICE_LINK_FONTAWESOME_VERSION', '5.0.1');

// !important notice
// Get the icons.yml file from fontawesome-pro-5.0.1/advanced-options/metadata/icons.yml
// and save it to "vendor/markocupic/service_link/src/resources/contao/yml/icons.yml"


// Content Elements
array_insert($GLOBALS['TL_CTE'], 2, array('ce_serviceLink' => array('serviceLink' => 'Markocupic\ServiceLink')));

if (TL_MODE == 'FE')
{
    $GLOBALS['TL_JAVASCRIPT'][] = 'bundles/markocupicservicelink/js/ce_servicelink.js';
}

if (TL_MODE == 'BE')
{
    $GLOBALS['TL_CSS'][] = 'bundles/markocupicservicelink/css/service_link.css|static';

    if(Config::get('serviceLinkFontawesomeSRC') != '')
    {
        // Use custom version
        $GLOBALS['TL_JAVASCRIPT'][] = \Contao\Config::get('serviceLinkFontawesomeSRC');
    }
    else
    {
        // Use free version
        $GLOBALS['TL_JAVASCRIPT'][] = 'https://use.fontawesome.com/releases/v5.0.1/js/all.js';
    }

}
