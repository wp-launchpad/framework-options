<?php
namespace LaunchpadFrameworkOptions\Tests;

use LaunchpadCore\EventManagement\EventManager;
use LaunchpadCore\EventManagement\Wrapper\SubscriberWrapper;
use LaunchpadCore\Plugin;
use LaunchpadFrameworkOptions\Tests\Integration\TestCase;
use LaunchpadOptions\Options;
use LaunchpadOptions\OptionsInterface;
use League\Container\Container;

class ServiceProvider extends TestCase
{

    public function testShouldReturnAsExpected()
    {
        $container = new Container();

        $event_manager = new EventManager();

        $prefix = 'prefix_';

        $plugin = new Plugin($container, $event_manager, new SubscriberWrapper($prefix));

        $plugin->load([
            'prefix' => $prefix,
            'version' => '3.16'
        ], [
            \LaunchpadFrameworkOptions\ServiceProvider::class
        ]);

        $this->assertInstanceOf(Options::class, $container->get(OptionsInterface::class));
    }
}