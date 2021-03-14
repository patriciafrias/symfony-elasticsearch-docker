<?php
declare(strict_types=1);

namespace App\Milestone\Infrastructure\Persistence\Doctrine;

use App\Milestone\Domain\Id;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\GuidType;

class DoctrineId extends GuidType
{
    public function getName(): string
    {
        return 'Id';
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform): string
    {
        return $value->id();
    }

    public function convertToPHPValue($value, AbstractPlatform $platform): Id
    {
        return Id::create((string)$value);
    }
}
