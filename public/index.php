<?php

declare(strict_types=1);

use App\App;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\PhpFileLoader;

require '../vendor/autoload.php';

$container = new ContainerBuilder();

(new PhpFileLoader($container, new FileLocator(dirname(__DIR__) . '/config')))->load('services.php');

$container->compile();

$container->get(App::class)->run();


