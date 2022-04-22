<?php

declare(strict_types=1);

namespace App\Todo\Handlers\Task;

use App\Todo\Query\TaskInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class Index
{
    private TaskInterface $task;

    public function __construct(TaskInterface $task)
    {
        $this->task = $task;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $tasks = $this->task->fetchAll();
        $response->getBody()->write(json_encode($tasks, JSON_THROW_ON_ERROR, 512));
        return $response;
    }
}
