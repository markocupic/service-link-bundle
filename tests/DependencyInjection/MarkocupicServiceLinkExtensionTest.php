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

namespace Markocupic\ServiceLinkBundle\Tests\DependencyInjection;

use Markocupic\ServiceLinkBundle\Controller\ContentElement\ServiceLinkController;
use Markocupic\ServiceLinkBundle\DependencyInjection\MarkocupicServiceLinkExtension;
use Markocupic\ServiceLinkBundle\EventSubscriber\BackendAssetsSubscriber;
use Markocupic\ServiceLinkBundle\Migration\Version300\UpdateContentElement as UpdateContentElement300;
use Markocupic\ServiceLinkBundle\Migration\Version310\UpdateContentElement as UpdateContentElement310;
use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class MarkocupicServiceLinkExtensionTest extends TestCase
{
    public function testRegistersTheServices(): void
    {
        $container = new ContainerBuilder();

        (new MarkocupicServiceLinkExtension())->load([], $container);

        $this->assertTrue($container->hasDefinition(ServiceLinkController::class));
        $this->assertTrue($container->hasDefinition(BackendAssetsSubscriber::class));
        $this->assertTrue($container->hasDefinition(UpdateContentElement300::class));
        $this->assertTrue($container->hasDefinition(UpdateContentElement310::class));
        $this->assertFalse($container->hasDefinition(MarkocupicServiceLinkExtension::class));
    }

    public function testSubscribesToTheKernelRequest(): void
    {
        $this->assertSame(['kernel.request' => 'registerBackendAssets'], BackendAssetsSubscriber::getSubscribedEvents());
    }
}
