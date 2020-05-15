<?php
declare(strict_types=1);

final class Adherent
{
    private $identifiant;
    private $identifiantTampon;

    private function __construct(string $nom, string $prenom, string $dateNaissance)
    {
        $this->normalizeID($nom, $prenom, $dateNaissance);

        $this->identifiant = $this->identifiantTampon;
    }

    public static function fromString(string $identifiant): self
    {
        return new self($identifiant);
    }

    public function __toString(): string
    {
        return $this->identifiant;
    }

    private function normalizeID(string $nom, string $prenom, string $dateNaissance): void
    {
        $chaine = $nom . $prenom . $dateNaissance;
        $chaine = strtoupper($chaine);
        $chaine = preg_replace('/\s\s+/', ' ', $chaine);
        $chaine = preg_replace( '#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $chaine );
        $chaine = preg_replace( '#&([A-za-z]{2})(?:lig);#', '\1', $chaine );
        $chaine = preg_replace( '#&[^;]+;#', '', $chaine );

        $this->identifiantTampon = $chaine;
    }
}
