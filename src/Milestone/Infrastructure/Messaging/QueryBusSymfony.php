<?php
declare(strict_types=1);

namespace App\Milestone\Infrastructure\Messaging;

use App\Milestone\Domain\Bus\Query\Query;
use App\Milestone\Domain\Bus\Query\QueryBus as DomainQueryBus;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\HandledStamp;

class QueryBusSymfony implements DomainQueryBus
{
    use HandleTrait {
        handle as handleQuery;
    }

    public function __construct(MessageBusInterface $messageQueryBus)
    {
        $this->messageBus = $messageQueryBus;
    }

    /** @return mixed */
    public function dispatch(Query $query)
    {
        /** @var HandledStamp|null $stamp */
        $stamp = $this->messageBus
            ->dispatch($query)
            ->last(HandledStamp::class);

        if (null === $stamp) {
            return null;
        }

        return $stamp->getResult();
    }
}
