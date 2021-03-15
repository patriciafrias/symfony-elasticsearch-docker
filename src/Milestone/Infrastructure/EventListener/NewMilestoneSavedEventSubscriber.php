<?php
declare(strict_types=1);

namespace App\Milestone\Infrastructure\EventListener;

use App\Milestone\Application\NewMilestoneSavedEvent;
use Symfony\Component\Messenger\Handler\MessageSubscriberInterface;

class NewMilestoneSavedEventSubscriber implements MessageSubscriberInterface
{
    public function __invoke()
    {
        printf('Hi from an Event Subscriber!');
    }

    public static function getHandledMessages(): iterable
    {
        // Handle this message on __invoke - we could also delete the class: NewMilestoneSavedEvent and move the logic here
        return [
            NewMilestoneSavedEvent::class,
        ];
    }
}
