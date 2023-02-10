<?php

class Lot
{

    public $lot_libelle;
    public $lot_img;
    public $lot_quantite;

    public $lot_reste;

    public $lot_mini;

    public $lot_maxi;

    public $typeReponse;

    public function __construct(String $lot_libelle, String $lot_img, int $lot_mini,int $lot_maxi,
    int $lot_quantite, int $lot_reste, String $typeReponse)
    {
        $this->lot_libelle = $lot_libelle;
        $this->lot_img = $lot_img;
        $this->lot_mini = $lot_mini;
        $this->lot_maxi = $lot_maxi;
        $this->lot_quantite = $lot_quantite;
        $this->lot_reste = $lot_reste;
        $this->typeReponse = $typeReponse;
    }


    /**
     * @return mixed
     */
    public function getLotLibelle()
    {
        return $this->lot_libelle;
    }

    /**
     * @param mixed $lot_libelle
     */
    public function setLotLibelle($lot_libelle): void
    {
        $this->lot_libelle = $lot_libelle;
    }

    /**
     * @return mixed
     */
    public function getLotImg()
    {
        return $this->lot_img;
    }

    /**
     * @param mixed $lot_img
     */
    public function setLotImg($lot_img): void
    {
        $this->lot_img = $lot_img;
    }

    /**
     * @return mixed
     */
    public function getLotQuantite()
    {
        return $this->lot_quantite;
    }

    /**
     * @param mixed $lot_quantite
     */
    public function setLotQuantite($lot_quantite): void
    {
        $this->lot_quantite = $lot_quantite;
    }

    /**
     * @return mixed
     */
    public function getLotReste()
    {
        return $this->lot_reste;
    }

    /**
     * @param mixed $lot_reste
     */
    public function setLotReste($lot_reste): void
    {
        $this->lot_reste = $lot_reste;
    }

    /**
     * @return mixed
     */
    public function getLotMini()
    {
        return $this->lot_mini;
    }

    /**
     * @param mixed $lot_mini
     */
    public function setLotMini($lot_mini): void
    {
        $this->lot_mini = $lot_mini;
    }

    /**
     * @return mixed
     */
    public function getLotMaxi()
    {
        return $this->lot_maxi;
    }

    /**
     * @param mixed $lot_maxi
     */
    public function setLotMaxi($lot_maxi): void
    {
        $this->lot_maxi = $lot_maxi;
    }



    /**
     * Get the value of typeReponse
     */ 
    public function getTypeReponse()
    {
        return $this->typeReponse;
    }

    /**
     * Set the value of typeReponse
     *
     * @return  self
     */ 
    public function setTypeReponse($typeReponse)
    {
        $this->typeReponse = $typeReponse;

        return $this;
    }
}