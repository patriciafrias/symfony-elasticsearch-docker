<?php
declare(strict_types=1);

namespace App\Milestone\Infrastructure\Messaging;

use App\Milestone\Domain\Bus\Command\Command;
use App\Milestone\Domain\Bus\Command\CommandBus as DomainCommandBus;
use Symfony\Component\Messenger\MessageBusInterface;

class CommandBusSymfony implements DomainCommandBus
{
    private MessageBusInterface $commandBus;

    public function __construct(MessageBusInterface $messageCommandBus)
    {
        $this->commandBus = $messageCommandBus;
    }

    public function dispatch(Command $command): void
    {
        $this->commandBus->dispatch($command);
    }
}
