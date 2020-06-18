<?php

namespace afRedirectAfterLogin\Tests;

use afRedirectAfterLogin\afRedirectAfterLogin as Plugin;
use Shopware\Components\Test\Plugin\TestCase;

class PluginTest extends TestCase
{
    protected static $ensureLoadedPlugins = [
        'afRedirectAfterLogin' => []
    ];

    public function testCanCreateInstance()
    {
        /** @var Plugin $plugin */
        $plugin = Shopware()->Container()->get('kernel')->getPlugins()['afRedirectAfterLogin'];

        $this->assertInstanceOf(Plugin::class, $plugin);
    }
}
