<?php
declare(strict_types=1);

namespace App\Milestone\Domain;

use DateTimeImmutable;

class Milestone
{
    private Id $id;

    private Height $height;

    private DateTimeImmutable $date;

    public function __construct(Height $height)
    {
        $this->id = Id::create();
        $this->height = $height;
        $this->date = new DateTimeImmutable('now');
    }

    public function getId(): Id
    {
        return $this->id;
    }

    public function getHeight(): Height
    {
        return $this->height;
    }

    public function getDate(): DateTimeImmutable
    {
        return $this->date;
    }
}
