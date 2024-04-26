<?php

namespace LaunchpadFrameworkOptions;


use LaunchpadCore\Container\AbstractServiceProvider;
use LaunchpadOptions\Options;
use LaunchpadOptions\OptionsInterface;
use League\Container\Definition\DefinitionInterface;

class ServiceProvider extends AbstractServiceProvider
{

    protected function define()
    {
        $this->register_service(OptionsInterface::class, function (DefinitionInterface $definition) {
            $definition->addArgument('prefix');
        }, Options::class);
    }
}