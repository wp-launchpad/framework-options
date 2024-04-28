<?php
namespace LaunchpadFrameworkOptions\Tests;

use LaunchpadCore\EventManagement\EventManager;
use LaunchpadCore\EventManagement\Wrapper\SubscriberWrapper;
use LaunchpadCore\Plugin;
use LaunchpadDispatcher\Dispatcher;
use LaunchpadFrameworkOptions\Tests\Integration\TestCase;
use LaunchpadOptions\Interfaces\OptionsInterface;
use LaunchpadOptions\Interfaces\TransientsInterface;
use LaunchpadOptions\Options;
use LaunchpadOptions\Transients;
use League\Container\Container;

class ServiceProvider extends TestCase
{

    public function testShouldReturnAsExpected()
    {
        $container = new Container();

        $event_manager = new EventManager();

        $dispatcher = new Dispatcher();

        $prefix = 'prefix_';

        $plugin = new Plugin($container, $event_manager, new SubscriberWrapper($prefix), $dispatcher);

        $plugin->load([
            'prefix' => $prefix,
            'version' => '3.16'
        ], [
            \LaunchpadFrameworkOptions\ServiceProvider::class
        ]);

        $this->assertInstanceOf(Options::class, $container->get(OptionsInterface::class));
        $this->assertInstanceOf(Transients::class, $container->get(TransientsInterface::class));
    }
}