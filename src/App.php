<?php

declare(strict_types=1);

namespace App;

class App
{
    public function __construct(private ServiceA $serviceA)
    {
    }

    public function run(): void
    {
        echo 'App is running.';
        echo '<br />';
        echo $this->serviceA->doWork();
    }
}