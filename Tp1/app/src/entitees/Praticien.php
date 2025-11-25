<?php

namespace praticiens\entitees;

use Doctrine\Common\Collections\Collection;

class Praticien {




    private string $id , $nom , $prenom , $rpps_id , $titre , $ville , $email , $telephone ;
    private bool $organisation , $nouveauPatient ;
    private Specialite $specialite ;
    private Structure $structure ;
    private Collection $motifVisites ;


    public function getId()
    {
        return $this->id;
    }


    public function setSpecialite($id)
    {
        $this->specialite = $id;
    }

    public function getSpecialite()
    {
        return $this->specialite;
    }


    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getRppsId(): string
    {
        return $this->rpps_id;
    }

    /**
     * @param string $rpps_id
     */
    public function setRppsId(string $rpps_id): void
    {
        $this->rpps_id = $rpps_id;
    }

    /**
     * @return string
     */
    public function getPrenom(): string
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     */
    public function setPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @return string
     */
    public function getTitre(): string
    {
        return $this->titre;
    }

    /**
     * @param string $titre
     */
    public function setTitre(string $titre): void
    {
        $this->titre = $titre;
    }

    /**
     * @return string
     */
    public function getVille(): string
    {
        return $this->ville;
    }

    /**
     * @param string $ville
     */
    public function setVille(string $ville): void
    {
        $this->ville = $ville;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getTelephone(): string
    {
        return $this->telephone;
    }

    /**
     * @param string $telephone
     */
    public function setTelephone(string $telephone): void
    {
        $this->telephone = $telephone;
    }

    /**
     * @return bool
     */
    public function isOrganisation(): bool
    {
        return $this->organisation;
    }

    /**
     * @param bool $organisation
     */
    public function setOrganisation(bool $organisation): void
    {
        $this->organisation = $organisation;
    }

    /**
     * @return bool
     */
    public function isNouveauPatient(): bool
    {
        return $this->nouveauPatient;
    }

    /**
     * @param bool $nouveauPatient
     */
    public function setNouveauPatient(bool $nouveauPatient): void
    {
        $this->nouveauPatient = $nouveauPatient;
    }

    /**
     * @return Structure
     */
    public function getStructure(): Structure
    {
        return $this->structure;
    }

    /**
     * @param Structure $structure
     */
    public function setStructure(Structure $structure): void
    {
        $this->structure = $structure;
    }

    /**
     * @return Collection
     */
    public function getMotifVisites(): Collection
    {
        return $this->motifVisites;
    }

    /**
     * @param Collection $motifVisites
     */
    public function setMotifVisites(Collection $motifVisites): void
    {
        $this->motifVisites = $motifVisites;
    }

}