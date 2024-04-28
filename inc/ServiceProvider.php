<?php

namespace LaunchpadFrameworkOptions;


use LaunchpadCore\Container\AbstractServiceProvider;
use LaunchpadOptions\Interfaces\OptionsInterface;
use LaunchpadOptions\Interfaces\TransientsInterface;
use LaunchpadOptions\Options;
use LaunchpadOptions\Transients;
use League\Container\Definition\DefinitionInterface;

class ServiceProvider extends AbstractServiceProvider
{

    protected function define()
    {
        $this->register_service(OptionsInterface::class, function (DefinitionInterface $definition) {
            $definition->addArgument('prefix');
        }, Options::class);

        $this->register_service(TransientsInterface::class, function (DefinitionInterface $definition) {
            $definition->addArgument('prefix');
        }, Transients::class);
    }
}