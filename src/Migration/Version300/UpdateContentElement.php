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

namespace Markocupic\ServiceLinkBundle\Migration\Version300;

use Contao\CoreBundle\Framework\ContaoFramework;
use Contao\CoreBundle\Migration\AbstractMigration;
use Contao\CoreBundle\Migration\MigrationResult;
use Contao\StringUtil;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Exception;
use Doctrine\DBAL\Types\Types;

/**
 * @internal
 */
class UpdateContentElement extends AbstractMigration
{
    public function __construct(
        private readonly Connection $connection,
        private readonly ContaoFramework $framework,
    ) {
    }

    public function getName(): string
    {
        return 'Service Link Bundle 3.0.0 update';
    }

    /**
     * @throws Exception
     */
    public function shouldRun(): bool
    {
        $schemaManager = $this->connection->createSchemaManager();

        if (!$schemaManager->tablesExist(['tl_content'])) {
            return false;
        }

        $availableColumns = $schemaManager->listTableColumns('tl_content');

        $mandatoryColumns = [
            'id',
            'type',
            'headline',
            'serviceLinkTitle',
            'serviceLinkHref',
            'buttonJumpTo',
            'serviceLinkTitle',
            'serviceLinkButtonLbl',
            'buttonText',
            'serviceLinkIconClass',
            'iconClass',
            'serviceLinkTitleAttr',
            'buttonJumpToLinkText',
            'serviceLinkFaIcon',
            'faIcon',
            'serviceLinkButtonClass',
            'buttonClass',
        ];

        foreach ($mandatoryColumns as $columnName) {
            if (!isset($availableColumns[strtolower($columnName)])) {
                return false;
            }
        }

        $result = $this->connection->fetchOne(
            'SELECT id FROM tl_content WHERE type = ?',
            [
                'serviceLink',
            ],
            [
                Types::STRING,
            ]
        );

        return false !== $result;
    }

    public function run(): MigrationResult
    {
        $this->framework->initialize();

        $contentElements = $this->connection->fetchAllAssociative(
            'SELECT * FROM tl_content WHERE type = ?',
            ['serviceLink'],
            ['type' => Types::STRING],
        );

        foreach ($contentElements as $contentElement) {
            $this->renameFieldsAndContentType($contentElement);
        }

        return $this->createResult(true);
    }

    private function renameFieldsAndContentType(array $contentElement): void
    {
        $id = $contentElement['id'];

        $stringUtil = $this->framework->getAdapter(StringUtil::class);
        $arrHeadline = $stringUtil->deserialize($contentElement['headline'], true);
        $headline = !empty($arrHeadline['value']) ? $arrHeadline['value'] : '';

        $set = array_merge(
            $contentElement,
            [
                'type' => 'service_link',
                'headline' => '',
                'serviceLinkTitle' => $headline,
                'serviceLinkHref' => $contentElement['buttonJumpTo'],
                'serviceLinkButtonLbl' => $contentElement['buttonText'],
                'serviceLinkIconClass' => $contentElement['iconClass'],
                'serviceLinkTitleAttr' => $contentElement['buttonJumpToLinkText'],
                'serviceLinkFaIcon' => $contentElement['faIcon'],
                'serviceLinkButtonClass' => $contentElement['buttonClass'],
            ],
        );

        $this->connection->update(
            'tl_content',
            $set,
            ['id' => $id],
            ['id' => Types::INTEGER],
        );
    }
}
