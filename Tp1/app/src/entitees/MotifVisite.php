<?php
namespace praticiens\entitees;

use Doctrine\Common\Collections\Collection;

class MotifVisite {

    private int $id ;
    private Specialite $specialite ;
    private string $libelle ;
    private Collection $praticiens ;


    /**
     * @return int
     */
    public function getId(): int {
        return $this->id ;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void {
        $this->id = $id ;
    }

    /**
     * @return string
     */
    public function getLibelle(): string {
        return $this->libelle ;
    }

    /**
     * @param string $libelle
     */
    public function setLibelle(string $libelle): void {
        $this->libelle = $libelle ;
    }
}