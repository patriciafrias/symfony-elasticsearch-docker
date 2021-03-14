<?php
declare(strict_types=1);

namespace App\Milestone\Infrastructure\Persistence\Doctrine;

use App\Milestone\Domain\Height;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\FloatType;

class DoctrineHeight extends FloatType
{
    public function getName(): string
    {
        return 'Height';
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform): float
    {
        return $value->height();
    }

    public function convertToPHPValue($value, AbstractPlatform $platform): Height
    {
        return Height::create((float)$value);
    }
}
