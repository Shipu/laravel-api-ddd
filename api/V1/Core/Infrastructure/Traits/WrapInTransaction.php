<?php

namespace Api\V1\Core\Infrastructure\Traits;

use Illuminate\Database\Connection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

trait WrapInTransaction
{
    protected $transactionalMethods = [];
    protected $transactionalExceptMethods = [];
    /**
     *
     *
     * @param $callable
     * @param mixed ...$args
     * @return mixed
     * @throws \Exception
     */
    protected function wrapInTransaction($callable, ...$args)
    {
        if (!is_callable($callable)) {
            throw new \InvalidArgumentException("Parameter \$callable must be a callable.");
        }

        /**
         * @var $connection \Illuminate\Database\Connection
         */
        $connection = null;

        if (!empty($args)) {
            if (is_a($args[0], Model::class)) {
                $connection = $args[0]->getConnection();
            }
            elseif (is_a($args[0], Connection::class)) {
                $connection = $args[0];
            }
            elseif (is_a($this, Model::class)) {
                $connection = $this->getConnection();
            }
        }

        if (is_null($connection)) {
            $connection = DB::connection();
        }

        $connection->beginTransaction();
        try {
            $retVal = call_user_func_array($callable, $args);
            $connection->commit();
            return $retVal;
        } catch (\Exception $ex) {
            $connection->rollBack();
            throw $ex;
        }
    }
}