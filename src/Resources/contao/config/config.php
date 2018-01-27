<?php

// Content Elements
array_insert($GLOBALS['TL_CTE'], 2, array('ce_serviceLink' => array('serviceLink' => 'Markocupic\ServiceLinkBundle\ContaoElements\ServiceLink')));

if (TL_MODE == 'FE')
{
    $GLOBALS['TL_JAVASCRIPT'][] = 'bundles/markocupicservicelink/js/ce_servicelink.js|static';
}
