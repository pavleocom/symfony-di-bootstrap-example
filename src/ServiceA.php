<?php

declare(strict_types=1);

namespace App;

class ServiceA
{
    public function __construct(private ServiceB $serviceB)
    {
    }

    public function doWork(): string
    {
        return 'Service A is doing work.' . '<br />' . $this->serviceB->doWork();
    }


}