<?php
declare(strict_types=1);

namespace App\Milestone\Application;

use App\Milestone\Domain\Bus\Command\Command;

final class SaveNewMilestoneCommand implements Command
{
    private float $height;

    public function __construct(float $height)
    {
        $this->height = $height;
    }

    public function height(): float
    {
        return $this->height;
    }
}
