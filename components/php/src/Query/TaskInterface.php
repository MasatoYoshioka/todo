<?php

declare(strict_types=1);

namespace App\Todo\Query;

use Ray\MediaQuery\Annotation\DbQuery;
use Ray\MediaQuery\Annotation\Pager;
use Ray\MediaQuery\PagesInterface;

interface TaskInterface
{
    /**
     * @DbQuery("/task_list")
     * @Pager(300, "/tasks{?page}")
     *
     * @return PagesInterface
     **/
    public function fetch(): PagesInterface;

    /**
     * @DbQuery("/task_list")
     */
    public function fetchAll(): array;
}
