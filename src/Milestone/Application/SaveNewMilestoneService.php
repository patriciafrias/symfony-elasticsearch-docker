<?php
declare(strict_types=1);

namespace App\Milestone\Application;

use App\Milestone\Domain\Bus\Event\EventBus;
use App\Milestone\Domain\Height;
use App\Milestone\Domain\Milestone;
use App\Milestone\Domain\MilestoneRepositoryInterface;

final class SaveNewMilestoneService
{
    private MilestoneRepositoryInterface $milestoneRepository;
    private EventBus $eventBus;

    public function __construct(MilestoneRepositoryInterface $milestoneRepository, EventBus $eventBus)
    {
        $this->milestoneRepository = $milestoneRepository;
        $this->eventBus = $eventBus;
    }

    public function saveMilestone(Height $height): void
    {
        $milestone = new Milestone($height);

        $this->milestoneRepository->persist($milestone);

        $this->eventBus->dispatch(new NewMilestoneSavedEvent());
    }
}
