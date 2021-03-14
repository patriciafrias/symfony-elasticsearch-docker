<?php
declare(strict_types=1);

namespace App\Tests\Unit\Milestone;

use App\Milestone\Domain\Height;
use App\Milestone\Domain\Milestone;
use App\Milestone\Domain\MilestoneRepositoryInterface;
use App\Milestone\Infrastructure\Persistence\MilestoneRepositoryInMemory;
use PHPUnit\Framework\TestCase;

class MilestoneListingTest extends TestCase
{
    /**
     * @test
     */
    public function milestoneList_returnsAllMilestones()
    {
        $milestoneRepository = new MilestoneRepositoryInMemory([
            new Milestone(Height::create(51)),
            new Milestone(Height::create(52)),
        ]);

        $milestoneList = $milestoneRepository->findAll();

        $this->assertCount(2, $milestoneList);
    }

    /**
     * @test
     */
    public function milestoneList_returnsEmptyArray()
    {
        $milestoneRepository = new MilestoneRepositoryInMemory([]);

        $this->assertEmpty($milestoneRepository->findAll());
    }
}
