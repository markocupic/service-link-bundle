<?php


/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2012 Leo Feyer
 *
 * @package Gallery Creator
 * @link    http://www.contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


$GLOBALS['TL_DCA']['tl_content']['palettes']['serviceLink'] = 'name,type,headline;{template_legend:hide},customTpl;{icon_legend},faIcon,faPrefix,iconClass;{text_legend},serviceLinkText;{button_legend},buttonText,buttonClass,buttonJumpTo;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space;{invisible_legend:hide},invisible,start,stop';


/**
 * Add fields to tl_content
 */
$GLOBALS['TL_DCA']['tl_content']['fields']['faIcon'] = array(
    'label' => &$GLOBALS['TL_LANG']['tl_content']['faIcon'],
    'search' => true,
    'input_field_callback' => array('ce_serviceLink', 'generatePicker'),
    'inputType' => 'radio',
    'eval' => array('doNotShow' => true),
    'sql' => "varchar(255) NOT NULL default ''"
);


$GLOBALS['TL_DCA']['tl_content']['fields']['buttonClass'] = array(
    'label' => &$GLOBALS['TL_LANG']['tl_content']['buttonClass'],
    'search' => true,
    'inputType' => 'text',
    'eval' => array('maxlength' => 200),
    'sql' => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['serviceLinkText'] = array(
    'label' => &$GLOBALS['TL_LANG']['tl_content']['text'],
    'search' => true,
    'inputType' => 'textarea',
    'eval' => array('mandatory' => false, 'rte' => 'tinyMCE', 'helpwizard' => true),
    'explanation' => 'insertTags',
    'sql' => "mediumtext NULL"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['buttonText'] = array(
    'label' => &$GLOBALS['TL_LANG']['tl_content']['buttonText'],
    'search' => true,
    'inputType' => 'text',
    'eval' => array('maxlength' => 200),
    'sql' => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['iconClass'] = array(
    'label' => &$GLOBALS['TL_LANG']['tl_content']['iconClass'],
    'search' => true,
    'inputType' => 'text',
    'eval' => array('maxlength' => 200),
    'sql' => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['faPrefix'] = array(
    'label' => &$GLOBALS['TL_LANG']['tl_content']['faPrefix'],
    'references' => &$GLOBALS['TL_LANG']['tl_content'],
    'search' => true,
    'inputType' => 'select',
    'options' => array('far', 'fal', 'fas', 'fab'),
    'eval' => array('mandatory' => true, 'maxlength' => 200),
    'sql' => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['buttonJumpTo'] = array(
    'label' => &$GLOBALS['TL_LANG']['tl_content']['buttonJumpTo'],
    'search' => true,
    'inputType' => 'text',
    'eval' => array('mandatory' => true, 'rgxp' => 'url', 'decodeEntities' => true, 'maxlength' => 255, 'fieldType' => 'radio', 'filesOnly' => true, 'tl_class' => 'w50 wizard'),
    'wizard' => array
    (
        array('tl_content', 'pagePicker')
    ),
    'sql' => "varchar(255) NOT NULL default ''"
);


