<?php
declare(strict_types=1);

namespace App\Milestone\Infrastructure\Messaging;

use App\Milestone\Domain\Bus\Event\Event;
use App\Milestone\Domain\Bus\Event\EventBus as DomainEventBus;
use Symfony\Component\Messenger\MessageBusInterface;

class EventBusSymfony implements DomainEventBus
{
    private MessageBusInterface $eventBus;

    public function __construct(MessageBusInterface $messageEventBus)
    {
        $this->eventBus = $messageEventBus;
    }

    public function dispatch(Event $event): void
    {
        $this->eventBus->dispatch($event);
    }
}
