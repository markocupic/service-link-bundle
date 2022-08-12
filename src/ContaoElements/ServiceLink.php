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

namespace Markocupic\ServiceLinkBundle\ContaoElements;

use Contao\BackendTemplate;
use Contao\ContentElement;
use Contao\StringUtil;
use Markocupic\FontawesomeIconPickerBundle\Config;

class ServiceLink extends ContentElement
{
    public const TYPE = 'serviceLink';

    /**
     * Template.
     *
     * @var string
     */
    protected $strTemplate = 'ce_servicelink';

    public function generate(): string
    {
        if (TL_MODE === 'BE') {

            $this->strTemplate = 'be_servicelink';

            /** @var BackendTemplate|object $objTemplate */
            $this->Template = new BackendTemplate($this->strTemplate);

            // Array ( [0] => signal [1] => fas [2] => f012 )
            $arrFa = StringUtil::deserialize($this->faIcon, true);

            $this->Template->faIconName = $arrFa[0] ?? '';
            $this->Template->faIconStyle = Config::$styles[$arrFa[1]] ?? '';
            $this->Template->faIconUnicode = $arrFa[2] ?? '';
            $this->Template->iconClass = $this->iconClass ?? '';
            $this->Template->headline = $this->headline ?? '';
            $this->Template->serviceLinkText = $this->serviceLinkText ?? '';
            $this->Template->buttonClass = $this->buttonClass ?? '';
            $this->Template->buttonText = $this->buttonText ?? '';

            return $this->Template->parse();

        }

        return parent::generate();
    }

    /**
     * Generate the content element.
     */
    protected function compile(): void
    {
        global $objPage;

        //$this->text = StringUtil::toHtml5($this->text);

        $arrFa = StringUtil::deserialize($this->faIcon, true);

        $this->Template->faIconName = $arrFa[0] ?? '';
        $this->Template->faIconPrefix = $arrFa[1] ?? '';
        $this->Template->faIconStyle = Config::$styles[$arrFa[1]] ?? '';
        $this->Template->faIconUnicode = $arrFa[2] ?? '';
        $this->Template->serviceLinkText = StringUtil::encodeEmail($this->serviceLinkText);
        $this->Template->buttonJumpTo = $this->buttonJumpTo;
    }
}
