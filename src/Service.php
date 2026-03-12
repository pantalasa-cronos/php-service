<?php

declare(strict_types=1);

namespace App;

class Service
{
    /**
     * @param array<string, mixed> $config
     */
    public function __construct(private array $config = [])
    {
    }

    public function getVersion(): string
    {
        return '1.0.0';
    }

    public function isHealthy(): bool
    {
        return true;
    }
}
