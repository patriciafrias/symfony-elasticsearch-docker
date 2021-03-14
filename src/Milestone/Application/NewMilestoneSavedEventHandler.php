<?php
declare(strict_types=1);

namespace App\Milestone\Application;

use App\Milestone\Domain\Bus\Event\EventHandler;

final class NewMilestoneSavedEventHandler implements EventHandler
{
    public function __invoke(NewMilestoneSavedEvent $event): void
    {
        printf("%s was emitted!", get_class($event));
    }
}
