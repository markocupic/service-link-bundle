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

use Markocupic\ServiceLinkBundle\Controller\ContentElement\ServiceLinkController;

/*
 * Backend palette
 */
$GLOBALS['TL_DCA']['tl_content']['palettes'][ServiceLinkController::TYPE] = '
{type_legend},name,type,headline;
{template_legend:hide},customTpl;
{icon_legend},faIcon,iconClass;
{text_legend},serviceLinkText;
{button_legend},buttonText,buttonClass,buttonJumpTo;
{protected_legend:hide},protected;
{expert_legend:hide},guests,cssID,space;
{invisible_legend:hide},invisible,start,stop
';

/*
 * Add fields to tl_content
 */
$GLOBALS['TL_DCA']['tl_content']['fields']['faIcon'] = [
    'search'    => true,
    'inputType' => 'fontawesomeIconPicker',
    'eval'      => ['doNotShow' => true],
    'sql'       => 'blob NULL',
];

$GLOBALS['TL_DCA']['tl_content']['fields']['buttonClass'] = [
    'search'    => true,
    'inputType' => 'text',
    'eval'      => ['maxlength' => 200],
    'sql'       => "varchar(255) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['serviceLinkText'] = [
    'label'       => &$GLOBALS['TL_LANG']['tl_content']['serviceLinkText'],
    'search'      => true,
    'inputType'   => 'textarea',
    'eval'        => ['mandatory' => false, 'rte' => 'tinyMCE', 'helpwizard' => true],
    'explanation' => 'insertTags',
    'sql'         => 'mediumtext NULL',
];

$GLOBALS['TL_DCA']['tl_content']['fields']['buttonText'] = [
    'search'    => true,
    'inputType' => 'text',
    'eval'      => ['maxlength' => 200],
    'sql'       => "varchar(255) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['iconClass'] = [
    'search'    => true,
    'inputType' => 'text',
    'eval'      => ['maxlength' => 200],
    'sql'       => "varchar(255) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['buttonJumpTo'] = [
    'search'    => true,
    'inputType' => 'text',
    'eval'      => ['rgxp' => 'url', 'decodeEntities' => true, 'maxlength' => 255, 'fieldType' => 'radio', 'filesOnly' => true, 'tl_class' => 'w50 wizard'],
    'wizard'    => [
        ['tl_content', 'pagePicker'],
    ],
    'sql'       => "varchar(255) NOT NULL default ''",
];
