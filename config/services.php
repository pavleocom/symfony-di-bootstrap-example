<?php

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

return static function (ContainerConfigurator $configurator) {

    $services = $configurator->services()->defaults()->autowire();

    $services->load('App\\', '../src/*');

    $services->set(\App\App::class)
        ->public(); // makes it retrievable directly from the container ($container->get)
};