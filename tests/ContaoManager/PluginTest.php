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

namespace Markocupic\ServiceLinkBundle\Tests\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\DelegatingParser;
use Contao\TestCase\ContaoTestCase;
use Markocupic\FontawesomeIconPickerBundle\MarkocupicFontawesomeIconPickerBundle;
use Markocupic\ServiceLinkBundle\ContaoManager\Plugin;
use Markocupic\ServiceLinkBundle\MarkocupicServiceLinkBundle;

class PluginTest extends ContaoTestCase
{
    public function testInstantiation(): void
    {
        $this->assertInstanceOf(Plugin::class, new Plugin());
    }

    public function testGetBundles(): void
    {
        $plugin = new Plugin();

        /** @var array $bundles */
        $bundles = $plugin->getBundles(new DelegatingParser());

        $this->assertCount(1, $bundles);
        $this->assertInstanceOf(BundleConfig::class, $bundles[0]);
        $this->assertSame(MarkocupicServiceLinkBundle::class, $bundles[0]->getName());
        $this->assertSame([ContaoCoreBundle::class, MarkocupicFontawesomeIconPickerBundle::class], $bundles[0]->getLoadAfter());
    }
}
