<?php

declare(strict_types=1);

namespace App\Todo;

use Psr\Container\ContainerInterface;
use Ray\Di\Exception\Unbound;
use Ray\Di\Injector;

class Container implements ContainerInterface
{
    private Injector $injector;

    public function __construct(Injector $injector)
    {
        $this->injector = $injector;
    }

    /**
     * {@inheritDoc}
     */
    public function get(string $id)
    {
        return $this->injector->getInstance($id);
    }

    /**
     * {@inheritDoc}
     **/
    public function has(string $id)
    {
        try {
            $this->get($id);
            return true;
        } catch (Unbound $e) {
            return false;
        }
    }

    public static function createFromRayDi(AppModule $app): self
    {
        return new self(new Injector($app));
    }
}
