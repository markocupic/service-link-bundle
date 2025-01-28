<?php

/** @noinspection PhpUndefinedFieldInspection */

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

namespace Markocupic\ServiceLinkBundle\Controller\ContentElement;

use Contao\ContentModel;
use Contao\CoreBundle\Controller\ContentElement\AbstractContentElementController;
use Contao\CoreBundle\DependencyInjection\Attribute\AsContentElement;
use Contao\CoreBundle\Framework\Adapter;
use Contao\CoreBundle\Framework\ContaoFramework;
use Contao\CoreBundle\InsertTag\InsertTagParser;
use Contao\CoreBundle\Twig\FragmentTemplate;
use Contao\StringUtil;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

#[AsContentElement(ServiceLinkController::TYPE, category: 'links')]
class ServiceLinkController extends AbstractContentElementController
{
    public const string TYPE = 'service_link';
    public const string DECIMAL_SEPARATOR = '.';

    private Adapter $stringUtilAdapter;

    public function __construct(
        private readonly ContaoFramework $framework,
        private readonly InsertTagParser $insertTagParser,
        private readonly array $fontawesomeStyles,
    ) {
        $this->stringUtilAdapter = $this->framework->getAdapter(StringUtil::class);
    }

    protected function getResponse(FragmentTemplate $template, ContentModel $model, Request $request): Response
    {
        $arrFa = $this->stringUtilAdapter->deserialize($model->serviceLinkFaIcon, true);
        $template->set('id', $model->id);
        $template->set('hasIcon', !empty($arrFa[0]));
        $template->set('faIconName', $arrFa[0] ?? '');
        $template->set('faIconPrefix', $arrFa[1] ?? '');
        $template->set('faIconStyle', $arrFa[1] ?? null ? $this->fontawesomeStyles[$arrFa[1]] ?? '' : '');
        $template->set('faIconUnicode', $arrFa[2] ?? '');
        $template->set('serviceLinkIconClass', $model->serviceLinkIconClass);
        $template->set('serviceLinkTitle', $this->insertTagParser->replaceInline($model->serviceLinkTitle));
        $template->set('serviceLinkText', $this->insertTagParser->replaceInline((string) $model->serviceLinkText));
        $template->set('hasLink', !empty($model->serviceLinkHref));
        $template->set('serviceLinkHref', $this->insertTagParser->replaceInline($model->serviceLinkHref));
        $template->set('hasButton', !empty($model->serviceLinkButtonLbl));
        $template->set('serviceLinkButtonLbl', $this->insertTagParser->replaceInline($model->serviceLinkButtonLbl));
        $template->set('serviceLinkTitleAttr', $this->insertTagParser->replaceInline($model->serviceLinkTitleAttr));
        $template->set('serviceLinkUseCountUp', (bool) $model->serviceLinkUseCountUp);
        $template->set('serviceLinkCountUpDuration', ceil(((int) $model->serviceLinkCountUpDuration ?? 3000) / 1000));
        $template->set('serviceLinkCountUpGrouping', $model->serviceLinkCountUpGrouping ? 'true' : 'false');
        $template->set('serviceLinkCountUpEasing', $model->serviceLinkCountUpEasing ? 'true' : 'false');
        $template->set('serviceLinkCountUpPrefix', $this->insertTagParser->replaceInline($model->serviceLinkCountUpPrefix));
        $template->set('serviceLinkCountUpSuffix', $this->insertTagParser->replaceInline($model->serviceLinkCountUpSuffix));
        $template->set('serviceLinkCountUpDecimal', (string) $model->serviceLinkCountUpDecimal ?? '.');
        $numberStart = $this->checkNumber($model->serviceLinkCountUpNumberStart);
        $numberEnd = $this->checkNumber($model->serviceLinkCountUpNumberEnd);
        $template->set('serviceLinkCountUpNumberStart', $numberStart);
        $template->set('serviceLinkCountUpNumberEnd', $numberEnd);
        $template->set('serviceLinkCountUpDecimalPlaces', max($this->getDecimalPlaces($numberStart), $this->getDecimalPlaces($numberEnd)));

        return $template->getResponse();
    }

    protected function checkNumber(string $number): string
    {
        if ('' === $number) {
            return '';
        }

        // Replace insert tags
        $number = $this->insertTagParser->replaceInline($number);

        // Use the correct decimal separator
        return preg_replace('/\D/', self::DECIMAL_SEPARATOR, $number);
    }

    protected function getDecimalPlaces(string $number): int
    {
        return (int) strpos(strrev($number), self::DECIMAL_SEPARATOR);
    }
}
