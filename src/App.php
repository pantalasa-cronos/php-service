<?php

declare(strict_types=1);

namespace App;

use Slim\Factory\AppFactory;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class App
{
    private Logger $logger;

    public function __construct()
    {
        $this->logger = new Logger('php-service');
        $this->logger->pushHandler(new StreamHandler('php://stdout', Logger::DEBUG));
    }

    public function run(): void
    {
        $app = AppFactory::create();

        $app->get('/health', function ($request, $response) {
            $response->getBody()->write(json_encode(['status' => 'healthy']));
            return $response->withHeader('Content-Type', 'application/json');
        });

        $app->get('/api/items', function ($request, $response) {
            $items = [
                ['id' => 1, 'name' => 'Item One'],
                ['id' => 2, 'name' => 'Item Two'],
            ];
            $response->getBody()->write(json_encode($items));
            return $response->withHeader('Content-Type', 'application/json');
        });

        $this->logger->info('Starting PHP service');
        $app->run();
    }
}
