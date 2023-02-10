<?php

class Reponse
{
    public $r_libelle;
    public $r_q_id;

    public $r_imagereponse;

    public $r_type;

    public $r_reponsevrai;

    public function __construct(String $r_libelle, int $r_q_id, string $r_imagereponse, string $r_type, string $r_reponsevrai){
        $this->r_libelle = $r_libelle;
        $this->r_q_id = $r_q_id;
        $this->r_imagereponse = $r_imagereponse;
        $this->r_type = $r_type;
        $this->r_reponsevrai = $r_reponsevrai;
    }


    /**
     * @return mixed
     */
    public function getRreponsevrai()
    {
        return $this->r_reponsevrai;
    }

    /**
     * @param mixed $r_reponsevrai
     */
    public function setRreponsevrai($r_reponsevrai): void
    {
        $this->r_reponsevrai = $r_reponsevrai;
    }


    /**
     * @return mixed
     */
    public function getRLibelle()
    {
        return $this->r_libelle;
    }

    /**
     * @param mixed $r_libelle
     */
    public function setRLibelle($r_libelle): void
    {
        $this->r_libelle = $r_libelle;
    }

    /**
     * @return mixed
     */
    public function getRQId()
    {
        return $this->r_q_id;
    }

    /**
     * @param mixed $r_q_id
     */
    public function setRQId($r_q_id): void
    {
        $this->r_q_id = $r_q_id;
    }

    /**
     * @return mixed
     */
    public function getRImagereponse()
    {
        return $this->r_imagereponse;
    }

    /**
     * @param mixed $r_imagereponse
     */
    public function setRImagereponse($r_imagereponse): void
    {
        $this->r_imagereponse = $r_imagereponse;
    }

    /**
     * @return mixed
     */
    public function getRType()
    {
        return $this->r_type;
    }

    /**
     * @param mixed $r_type
     */
    public function setRType($r_type): void
    {
        $this->r_type = $r_type;
    }
}