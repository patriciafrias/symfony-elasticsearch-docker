<?php
declare(strict_types=1);

namespace App\Milestone\Domain\Bus\Query;

interface QueryBus
{
    /**
     * @return mixed
     */
    public function dispatch(Query $query);
}
