<?php

declare(strict_types=1);

namespace App\Todo;

use App\Todo\Query\TaskInterface;
use Ray\AuraSqlModule\AuraSqlModule;
use Ray\Di\AbstractModule;
use Ray\MediaQuery\DbQueryConfig;
use Ray\MediaQuery\MediaQueryModule;
use Ray\MediaQuery\Queries;

class AppModule extends AbstractModule
{
    private const PROJECT_ROOT = __DIR__ . '/../var/sql';

    public function configure(): void
    {
        $this->install(
            new MediaQueryModule(
                Queries::fromClasses([
                    TaskInterface::class,
                ]), 
                [new DbQueryConfig(self::PROJECT_ROOT)]
            )
        );
        $this->install(new AuraSqlModule('mysql:dbname=todo;host=127.0.0.1;port=3306;charset=utf8', 'root', 'root'));
    }
}
