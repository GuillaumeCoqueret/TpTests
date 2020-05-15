<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class AdherentTest extends TestCase
{
    public function testCanBeCreatedFromValidAdherent(): void
    {
        $this->assertInstanceOf(
            Adherent::class,
            Adherent::fromString('jean pierre', 'dupont', '15/12/1990')
        );
    }

    public function testCannotBeCreatedFromInvalidAdherent(): void
    {
        $this->expectException(InvalidArgumentException::class);

        Adherent::fromString('invalid');
    }

}
