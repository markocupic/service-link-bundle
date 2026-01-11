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

use Markocupic\ServiceLinkBundle\Controller\ContentElement\ServiceLinkController;

/*
 * Backend palette
 */
$GLOBALS['TL_DCA']['tl_content']['palettes'][ServiceLinkController::TYPE] = '
{type_legend},name,type,headline;
{text_legend},serviceLinkTitle,serviceLinkText;
{link_legend},serviceLinkHref;
{icon_legend},serviceLinkFaIcon,serviceLinkIconClass;
{count_up_legend},serviceLinkUseCountUp;
{button_legend},serviceLinkButtonLbl,serviceLinkButtonClass,serviceLinkTitleAttr;
{template_legend:hide},customTpl;
{protected_legend:hide},protected;
{expert_legend:hide},cssID;
{invisible_legend:hide},invisible,start,stop
';

/**
 * Subpalettes
 */
$GLOBALS['TL_DCA']['tl_content']['subpalettes']['serviceLinkUseCountUp'] = 'serviceLinkCountUpNumberStart,serviceLinkCountUpNumberEnd,serviceLinkCountUpPrefix,serviceLinkCountUpSuffix,serviceLinkCountUpDuration,serviceLinkCountUpDecimal,serviceLinkCountUpGrouping,serviceLinkCountUpEasing';

/**
 * Selectors
 */
$GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'][] = 'serviceLinkUseCountUp';

/*
 * Add fields to tl_content
 */
$GLOBALS['TL_DCA']['tl_content']['fields']['serviceLinkFaIcon'] = [
    'exclude'   => true,
    'search'    => true,
    'inputType' => 'fontawesomeIconPicker',
    'eval'      => ['doNotShow' => true],
    'sql'       => 'blob NULL',
];

$GLOBALS['TL_DCA']['tl_content']['fields']['serviceLinkButtonClass'] = [
    'exclude'   => true,
    'search'    => true,
    'inputType' => 'text',
    'eval'      => ['maxlength' => 200, 'tl_class' => 'w50'],
    'sql'       => "varchar(255) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['serviceLinkTitle'] = [
    'exclude'     => true,
    'search'      => true,
    'inputType'   => 'text',
    'eval'        => ['mandatory' => false, 'helpwizard' => true],
    'explanation' => 'insertTags',
    'sql'         => "varchar(255) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['serviceLinkText'] = [
    'exclude'     => true,
    'search'      => true,
    'inputType'   => 'textarea',
    'eval'        => ['mandatory' => false, 'rte' => 'tinyMCE', 'helpwizard' => true],
    'explanation' => 'insertTags',
    'sql'         => 'mediumtext NULL',
];

$GLOBALS['TL_DCA']['tl_content']['fields']['serviceLinkButtonLbl'] = [
    'exclude'   => true,
    'search'    => true,
    'inputType' => 'text',
    'eval'      => ['maxlength' => 200, 'tl_class' => 'w50'],
    'sql'       => "varchar(255) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['serviceLinkIconClass'] = [
    'exclude'   => true,
    'search'    => true,
    'inputType' => 'text',
    'eval'      => ['maxlength' => 200, 'tl_class' => 'w50'],
    'sql'       => "varchar(255) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['serviceLinkHref'] = [
    'exclude'   => true,
    'search'    => true,
    'inputType' => 'text',
    'eval'      => ['rgxp' => 'url', 'dcaPicker' => true, 'decodeEntities' => true, 'maxlength' => 2048, 'fieldType' => 'radio', 'filesOnly' => true, 'tl_class' => 'w50 wizard'],
    'sql'       => "text NULL",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['serviceLinkTitleAttr'] = [
    'exclude'   => true,
    'search'    => true,
    'inputType' => 'text',
    'eval'      => ['maxlength' => 255, 'tl_class' => 'w50'],
    'sql'       => "varchar(255) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['serviceLinkUseCountUp'] = [
    'exclude'   => true,
    'filter'    => true,
    'inputType' => 'checkbox',
    'eval'      => ['submitOnChange' => true, 'tl_class' => 'm12 clr'],
    'sql'       => ['type' => 'boolean', 'default' => true],
];

$GLOBALS['TL_DCA']['tl_content']['fields']['serviceLinkCountUpNumberStart'] = [
    'exclude'   => true,
    'search'    => true,
    'inputType' => 'text',
    'eval'      => ['mandatory' => false, 'tl_class' => 'clr w50'],
    'sql'       => "varchar(255) NOT NULL default '0'",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['serviceLinkCountUpNumberEnd'] = [
    'exclude'   => true,
    'search'    => true,
    'inputType' => 'text',
    'eval'      => ['mandatory' => false, 'tl_class' => 'w50'],
    'sql'       => "varchar(255) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['serviceLinkCountUpDuration'] = [
    'exclude'   => true,
    'sorting'   => true,
    'inputType' => 'text',
    'eval'      => ['maxlength' => 5, 'tl_class' => 'w50', 'rgxp' => 'natural', 'mandatory' => true],
    'sql'       => ['type' => 'integer', 'default' => 3000],
];

$GLOBALS['TL_DCA']['tl_content']['fields']['serviceLinkCountUpDecimal'] = [
    'exclude'   => true,
    'sorting'   => true,
    'inputType' => 'select',
    'options'   => ['.', ','],
    'eval'      => ['tl_class' => 'w50'],
    'sql'       => "varchar(1) NOT NULL default '.'",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['serviceLinkCountUpPrefix'] = [
    'exclude'   => true,
    'sorting'   => true,
    'inputType' => 'text',
    'eval'      => ['maxlength' => 255, 'doNotTrim' => true, 'tl_class' => 'w50'],
    'sql'       => "varchar(255) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['serviceLinkCountUpSuffix'] = [
    'exclude'   => true,
    'sorting'   => true,
    'inputType' => 'text',
    'eval'      => ['maxlength' => 255, 'doNotTrim' => true, 'tl_class' => 'w50'],
    'sql'       => "varchar(255) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['serviceLinkCountUpGrouping'] = [
    'exclude'   => true,
    'inputType' => 'checkbox',
    'default'   => 1,
    'eval'      => ['tl_class' => 'w50 m12'],
    'sql'       => ['type' => 'boolean', 'default' => false],
];

$GLOBALS['TL_DCA']['tl_content']['fields']['serviceLinkCountUpEasing'] = [
    'exclude'   => true,
    'inputType' => 'checkbox',
    'default'   => 1,
    'eval'      => ['tl_class' => 'w50 m12'],
    'sql'       => ['type' => 'boolean', 'default' => false],
];
