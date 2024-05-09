<?php

namespace LaunchpadFrameworkOptions\Tests\Integration\inc\files;

use LaunchpadFrameworkOptions\Interfaces\OptionsAwareInterface;
use LaunchpadFrameworkOptions\Interfaces\SettingsAwareInterface;
use LaunchpadFrameworkOptions\Interfaces\TransientsAwareInterface;
use LaunchpadFrameworkOptions\Traits\OptionsAwareTrait;
use LaunchpadFrameworkOptions\Traits\SettingsAwareTrait;
use LaunchpadFrameworkOptions\Traits\TransientsAwareTrait;

class Subscriber implements OptionsAwareInterface, TransientsAwareInterface, SettingsAwareInterface
{
    use OptionsAwareTrait, TransientsAwareTrait, SettingsAwareTrait;

    /**
     * @hook test
     */
    public function callback()
    {
        $this->options->get('test', false);
        $this->transients->get('test', false);
        $this->settings->get('test', false);
    }
}