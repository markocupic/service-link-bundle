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

namespace Markocupic\ServiceLinkBundle\Controller\ContentElement;

use Contao\ContentModel;
use Contao\CoreBundle\Controller\ContentElement\AbstractContentElementController;
use Contao\CoreBundle\DependencyInjection\Attribute\AsContentElement;
use Contao\CoreBundle\Framework\Adapter;
use Contao\CoreBundle\Framework\ContaoFramework;
use Contao\CoreBundle\InsertTag\InsertTagParser;
use Contao\CoreBundle\Routing\ScopeMatcher;
use Contao\Database;
use Contao\StringUtil;
use Contao\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

#[AsContentElement(ServiceLinkController::TYPE, category:'links', template:'ce_servicelink')]
class ServiceLinkController extends AbstractContentElementController
{
    public const TYPE = 'serviceLink';

    private Adapter $stringUtilAdapter;

    public function __construct(
        private readonly ContaoFramework $framework,
        private readonly ScopeMatcher $scopeMatcher,
        private readonly array $fontawesomeStyles,
    ) {
        $this->stringUtilAdapter = $this->framework->getAdapter(StringUtil::class);
    }

    protected function getResponse(Template $template, ContentModel $model, Request $request): Response
    {
        $arrFa = $this->stringUtilAdapter->deserialize($model->faIcon, true);

        $template->faIconName = $arrFa[0] ?? '';
        $template->faIconPrefix = $arrFa[1] ?? '';
        $template->faIconStyle = ($arrFa[1] ?? null) ? $this->fontawesomeStyles[$arrFa[1]] ?? '' : '';
        $template->faIconUnicode = $arrFa[2] ?? '';
        $template->serviceLinkText = $model->serviceLinkText;
        $template->buttonJumpTo = $model->buttonJumpTo;
        $template->buttonJumpToLinkText = $model->buttonJumpToLinkText;

        if ($this->scopeMatcher->isBackendRequest($request)) {
            $template->setName('be_servicelink');
            $template->headline = $this->stringUtilAdapter->deserialize($model->headline);

            return $template->getResponse();
        }

        return $template->getResponse();
    }
}
