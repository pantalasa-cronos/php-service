<?php

declare(strict_types=1);

namespace Tests;

use App\Service;
use PHPUnit\Framework\TestCase;

class ServiceTest extends TestCase
{
    public function testGetVersion(): void
    {
        $service = new Service();
        $this->assertSame('1.0.0', $service->getVersion());
    }

    public function testIsHealthy(): void
    {
        $service = new Service();
        $this->assertTrue($service->isHealthy());
    }

    public function testConstructorWithConfig(): void
    {
        $config = ['key' => 'value'];
        $service = new Service($config);
        $this->assertSame('1.0.0', $service->getVersion());
    }
}
