<?php
declare(strict_types=1);

namespace App\Milestone\Application;

use App\Milestone\Domain\Bus\Query\QueryHandler;

final class GetMilestoneListQueryHandler implements QueryHandler
{
    private ListingMilestonesService $listingMilestoneService;

    public function __construct(ListingMilestonesService $listingMilestoneService)
    {
        $this->listingMilestoneService = $listingMilestoneService;
    }

    public function __invoke(GetMilestoneListQuery $query): ?array
    {
        return $this->listingMilestoneService->getAllMilestones();
    }
}
