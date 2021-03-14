<?php
declare(strict_types=1);

namespace App\Milestone\Application;

use App\Milestone\Domain\Bus\Command\CommandHandler;
use App\Milestone\Domain\Height;

final class SaveNewMilestoneCommandHandler implements CommandHandler
{
    private SaveNewMilestoneService $newMilestoneSaver;

    public function __construct(SaveNewMilestoneService $newMilestoneSaver)
    {
        $this->newMilestoneSaver = $newMilestoneSaver;
    }

    public function __invoke(SaveNewMilestoneCommand $command): void
    {
        $height = Height::create($command->height());

        $this->newMilestoneSaver->saveMilestone($height);
    }
}
