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

use Markocupic\ServiceLinkBundle\ContaoElements\ServiceLink;

/*
 * Backend palette
 */
$GLOBALS['TL_DCA']['tl_content']['palettes'][ServiceLink::TYPE] = 'name,type,headline;{template_legend:hide},customTpl;{icon_legend},faIcon,iconClass;{text_legend},serviceLinkText;{button_legend},buttonText,buttonClass,buttonJumpTo;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space;{invisible_legend:hide},invisible,start,stop';

/*
 * Add fields to tl_content
 */
$GLOBALS['TL_DCA']['tl_content']['fields']['faIcon'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['faIcon'],
    'search'    => true,
    'inputType' => 'fontawesome5Iconpicker',
    'eval'      => ['doNotShow' => true],
    'sql'       => 'blob NULL',
];

$GLOBALS['TL_DCA']['tl_content']['fields']['buttonClass'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['buttonClass'],
    'search'    => true,
    'inputType' => 'text',
    'eval'      => ['maxlength' => 200],
    'sql'       => "varchar(255) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['serviceLinkText'] = [
    'label'       => &$GLOBALS['TL_LANG']['tl_content']['text'],
    'search'      => true,
    'inputType'   => 'textarea',
    'eval'        => ['mandatory' => false, 'rte' => 'tinyMCE', 'helpwizard' => true],
    'explanation' => 'insertTags',
    'sql'         => 'mediumtext NULL',
];

$GLOBALS['TL_DCA']['tl_content']['fields']['buttonText'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['buttonText'],
    'search'    => true,
    'inputType' => 'text',
    'eval'      => ['maxlength' => 200],
    'sql'       => "varchar(255) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['iconClass'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['iconClass'],
    'search'    => true,
    'inputType' => 'text',
    'eval'      => ['maxlength' => 200],
    'sql'       => "varchar(255) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['buttonJumpTo'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['buttonJumpTo'],
    'search'    => true,
    'inputType' => 'text',
    'eval'      => ['mandatory' => true, 'rgxp' => 'url', 'decodeEntities' => true, 'maxlength' => 255, 'fieldType' => 'radio', 'filesOnly' => true, 'tl_class' => 'w50 wizard'],
    'wizard'    => [
        ['tl_content', 'pagePicker'],
    ],
    'sql'       => "varchar(255) NOT NULL default ''",
];
