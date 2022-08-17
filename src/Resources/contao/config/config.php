<?php

declare(strict_types=1);

/*
 * This file is part of Service Link Bundle.
 *
 * (c) Marko Cupic 2022 <m.cupic@gmx.ch>
 * @license GPL-3.0-or-later
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 * @link https://github.com/markocupic/service-link-bundle
 */

use Contao\ArrayUtil;
use Contao\System;
use Markocupic\ServiceLinkBundle\ContaoElements\ServiceLink;

/*
 * Contao Content Elements
 */
ArrayUtil::arrayInsert($GLOBALS['TL_CTE'], 2, ['ce_serviceLink' => [ServiceLink::TYPE => ServiceLink::class]]);

/** @var RequestStack $request */
$request = System::getContainer()->get('request_stack')->getCurrentRequest();

if ($request && System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest($request)) {
    $GLOBALS['TL_JAVASCRIPT'][] = 'bundles/markocupicservicelink/js/ce_servicelink.js|static';
}
