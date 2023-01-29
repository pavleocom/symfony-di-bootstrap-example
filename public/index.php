<?php

declare(strict_types=1);

use App\App;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Dumper\PhpDumper;
use Symfony\Component\DependencyInjection\Loader\PhpFileLoader;

require '../vendor/autoload.php';

$cacheDir = dirname(__DIR__) . '/var/cache';
$cachedContainerFile = $cacheDir . '/CachedContainer.php';

if (file_exists($cachedContainerFile)) {
    require_once $cachedContainerFile;
    $container = new \CachedContainer(); // name of class given by dumper
} else {
    if (!file_exists($cacheDir)) {
        mkdir($cacheDir, recursive: true);
    }

    $container = new ContainerBuilder();

    (new PhpFileLoader($container, new FileLocator(dirname(__DIR__) . '/config')))->load('services.php');

    $container->compile();

    $dumper = new PhpDumper($container);

    file_put_contents($cachedContainerFile, $dumper->dump(['class' => 'CachedContainer']));
}

$container->get(App::class)->run();


