<?php

declare(strict_types=1);

/*
 * This file is part of Service Link Bundle.
 *
 * (c) Marko Cupic <m.cupic@gmx.ch>
 * @license GPL-3.0-or-later
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 * @link https://github.com/markocupic/service-link-bundle
 */

use Markocupic\FontawesomeIconPickerBundle\Config;

/*
 * Legends
 */
$GLOBALS['TL_LANG']['tl_content']['button_legend'] = 'Button settings';
$GLOBALS['TL_LANG']['tl_content']['icon_legend'] = 'Icon settings';
$GLOBALS['TL_LANG']['tl_content']['count_up_legend'] = 'Counter settings';

/*
 * Fields
 */
$GLOBALS['TL_LANG']['tl_content']['serviceLinkFaIcon'] = ['Icon Picker (FontAwesome v'.Config::getVersion().')', 'Select an icon from the Font Awesome 7 library.'];
$GLOBALS['TL_LANG']['tl_content']['serviceLinkIconClass'] = ['Additional CSS class for the icon', 'E.g.: fa-4x'];
$GLOBALS['TL_LANG']['tl_content']['serviceLinkButtonClass'] = ['Button CSS classes', 'E.g. Bootstrap classes: btn btn-primary'];
$GLOBALS['TL_LANG']['tl_content']['serviceLinkButtonLbl'] = ['Button label', 'Add the button label'];
$GLOBALS['TL_LANG']['tl_content']['serviceLinkHref'] = ['Link', 'Link to a URL/internal page'];
$GLOBALS['TL_LANG']['tl_content']['serviceLinkTitleAttr'] = ['Link title', 'The link title is inserted as &lt;em&gt;title&lt;/em&gt;-attribute in the HTML markup.'];
$GLOBALS['TL_LANG']['tl_content']['serviceLinkTitle'] = ['Text', 'Enter the service link title.'];
$GLOBALS['TL_LANG']['tl_content']['serviceLinkText'] = ['Text', 'Enter the service link text.'];
$GLOBALS['TL_LANG']['tl_content']['serviceLinkUseCountUp'] = ['Activate counter', 'Activates the scroll-into-view counter.'];
$GLOBALS['TL_LANG']['tl_content']['serviceLinkCountUpNumberStart'] = ['Start value', 'Enter the start value from which to count up. The number of decimal places for the end value and the start value must be the same.'];
$GLOBALS['TL_LANG']['tl_content']['serviceLinkCountUpNumberEnd'] = ['End value', 'Enter the number to count up to (insert tags also possible)'];
$GLOBALS['TL_LANG']['tl_content']['serviceLinkCountUpDuration'] = ['Animation duration in ms', 'Enter the animation duration in milliseconds.'];
$GLOBALS['TL_LANG']['tl_content']['serviceLinkCountUpPrefix'] = ['Prefix', 'Enter the optional text before the number.'];
$GLOBALS['TL_LANG']['tl_content']['serviceLinkCountUpSuffix'] = ['Suffix', 'Enter the optional text after the number.'];
$GLOBALS['TL_LANG']['tl_content']['serviceLinkCountUpGrouping'] = ['Number grouping', 'Enable number grouping (1,000 vs 1000).'];
$GLOBALS['TL_LANG']['tl_content']['serviceLinkCountUpEasing'] = ['Easing (speed changes)', 'Activate speed changes of the animation. The speed is reduced shortly before the final value is reached.'];
$GLOBALS['TL_LANG']['tl_content']['serviceLinkCountUpDecimal'] = ['Decimal separator', 'Enter the decimal separator.'];
