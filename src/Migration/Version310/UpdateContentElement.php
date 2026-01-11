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

namespace Markocupic\ServiceLinkBundle\Migration\Version310;

use Contao\CoreBundle\Migration\AbstractMigration;
use Contao\CoreBundle\Migration\MigrationResult;
use Contao\StringUtil;
use Doctrine\DBAL\Connection;

/**
 * @internal
 */
class UpdateContentElement extends AbstractMigration
{
    public function __construct(
        private readonly Connection $connection,
    ) {
    }

    public function shouldRun(): bool
    {
        $schemaManager = $this->connection->createSchemaManager();

        if (!$schemaManager->tablesExist(['tl_content'])) {
            return false;
        }

        $columns = $schemaManager->listTableColumns('tl_content');

        if (!isset($columns['id']) || !isset($columns['servicelinkfaicon'])) {
            return false;
        }

        $runMigration = false;

        $query = $this->buildQueryWithParams();

        $result = $this->connection->fetchOne($query['sql'], $query['params']);

        if (false !== $result) {
            $runMigration = true;
        }

        return $runMigration;
    }

    public function run(): MigrationResult
    {
        $styles = $this->getMap();

        $query = $this->buildQueryWithParams();
        $rows = $this->connection->fetchAllAssociative($query['sql'], $query['params']);

        foreach ($rows as $row) {
            $icon = StringUtil::deserialize($row['serviceLinkFaIcon']);

            if (!empty($icon[1]) && isset($styles[$icon[1]])) {
                $icon[1] = $styles[$icon[1]];

                $set = [
                    'serviceLinkFaIcon' => serialize($icon),
                ];

                $this->connection->update('tl_content', $set, ['id' => $row['id']]);
            }
        }

        return $this->createResult(true);
    }

    protected function buildQueryWithParams(): array
    {
        $styles = array_keys($this->getMap());

        $where = [];
        $params = [];

        foreach ($styles as $style) {
            $where[] = 'serviceLinkFaIcon LIKE ?';
            $params[] = '%"'.$style.'"%';
        }

        return [
            'sql' => 'SELECT id, serviceLinkFaIcon FROM tl_content WHERE serviceLinkFaIcon IS NOT NULL AND '.implode(' OR ', $where),
            'params' => $params,
        ];
    }

    protected function getMap(): array
    {
        return [
            'far' => 'fa-regular',
            'fas' => 'fa-solid',
            'fal' => 'fa-light',
            'fat' => 'fa-thin',
            'fad' => 'fa-duotone',
            'fab' => 'fa-brands',
        ];
    }
}
