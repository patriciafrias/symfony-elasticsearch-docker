<?php
declare(strict_types=1);

namespace App\Milestone\Domain\Bus\Event;

interface EventBus
{
    public function dispatch(Event $event): void;
}
