<?php

namespace Api\V1\Core\Infrastructure\Traits;

trait ControllerTransaction
{
    use WrapInTransaction {
        wrapInTransaction as originalWrapInTransaction;
    }

    /**
     * Execute an action on the controller.
     *
     * @param  string  $method
     * @param  array   $parameters
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function callAction($method, $parameters)
    {
        $wrapperMethod = 'callActionUpdate';
        $actionMethod  = [$this, $method];
        if(!blank($this->transactionalExceptMethods) && array_search($method, $this->transactionalExceptMethods) == FALSE) {
            $wrapperMethod = 'wrapInTransaction';
        }

        if ($this->transactionalMethods == '*' || array_search($method, $this->transactionalMethods) != FALSE) {
            $wrapperMethod = 'wrapInTransaction';
        }

        return call_user_func_array([$this, $wrapperMethod], array_merge([$actionMethod], $parameters));
    }

    /**
     * @param $callable
     * @param mixed ...$args
     * @return mixed
     */
    protected function callActionUpdate($callable, ...$args)
    {
        return $callable(...$args);
    }

    /**
     * @param $callable
     * @param mixed ...$args
     * @return mixed
     */
    protected function wrapInTransaction($callable, ...$args)
    {
        return $this->callActionUpdate([$this, 'originalWrapInTransaction'], $callable, ...$args);
    }
}