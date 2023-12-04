<?php

declare(strict_types=1);

/*
 * This file is part of Service Link Bundle.
 *
 * (c) Marko Cupic 2023 <m.cupic@gmx.ch>
 * @license GPL-3.0-or-later
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 * @link https://github.com/markocupic/service-link-bundle
 */

use Markocupic\FontawesomeIconPickerBundle\Config;

/*
 * Legends
 */
$GLOBALS['TL_LANG']['tl_content']['button_legend'] = 'Button-Einstellungen';
$GLOBALS['TL_LANG']['tl_content']['icon_legend'] = 'Icon-Einstellungen';

/*
 * Fields
 */
$GLOBALS['TL_LANG']['tl_content']['faIcon'] = ['Icon Picker (FontAwesome v'.Config::FONTAWESOME_VERSION.')', 'Wählen Sie ein Icon aus der Font Awesome 5 Bibliothek aus.'];
$GLOBALS['TL_LANG']['tl_content']['iconClass'] = ['Zusätzliche CSS-Klasse für das Icon', 'Z.B.: fa-4x'];
$GLOBALS['TL_LANG']['tl_content']['buttonClass'] = ['Button CSS-Klassen', 'Z.B. Bootstrap Klassen: btn btn-primary'];
$GLOBALS['TL_LANG']['tl_content']['buttonText'] = ['Button Beschriftung', ''];
$GLOBALS['TL_LANG']['tl_content']['buttonJumpTo'] = ['Link', 'Verlinken Sie mit einer URL/internen Seite.'];
$GLOBALS['TL_LANG']['tl_content']['buttonJumpToLinkText'] = ['Link-Titel', 'Der Link-Titel wird als &lt;em&gt;title&lt;/em&gt;-Attribut im HTML-Markup eingefügt.'];
$GLOBALS['TL_LANG']['tl_content']['serviceLinkText'] = ['Text', 'Geben Sie den Service Link Text ein.'];
