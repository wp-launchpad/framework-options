<?php

namespace LaunchpadFrameworkOptions;


use LaunchpadCore\Container\AbstractServiceProvider;
use LaunchpadOptions\Interfaces\OptionsInterface;
use LaunchpadOptions\Interfaces\SettingsInterface;
use LaunchpadOptions\Interfaces\TransientsInterface;
use LaunchpadOptions\Options;
use LaunchpadOptions\Settings;
use LaunchpadOptions\Transients;
use League\Container\Definition\DefinitionInterface;

class ServiceProvider extends AbstractServiceProvider
{

    protected function define()
    {
        $this->register_service(OptionsInterface::class)
            ->set_concrete(Options::class)
            ->set_definition(function (DefinitionInterface $definition) {
            $definition->addArgument('prefix');
        });

        $this->register_service(TransientsInterface::class)
            ->set_concrete(Transients::class)
            ->set_definition(function (DefinitionInterface $definition) {
            $definition->addArgument('prefix');
        });

        $this->register_service(SettingsInterface::class)
            ->set_concrete(Settings::class)
            ->set_definition(function (DefinitionInterface $definition) {
            $prefix = $this->container->get('prefix');
            $definition->addArguments([OptionsInterface::class, "{$prefix}_settings"]);
        });
    }
}