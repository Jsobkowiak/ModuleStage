<?php
class Question
{
    public $q_libelle;
    public $q_imglibelle;
    public $q_sequence;
    public $q_textillustration;
    public $q_lienillustration;
    public $q_categorie;
    public $q_reponse;

    public function __construct(String $q_libelle, String $q_imglibelle, String $q_sequence,
    String $q_textillustration, String $q_lienillustration, String $q_categorie, Array $q_reponse)
    {
       $this->q_libelle = $q_libelle;
       $this->q_imglibelle = $q_imglibelle;
       $this->q_sequence = $q_sequence;
       $this->q_textillustration = $q_textillustration;
       $this->q_lienillustration = $q_lienillustration;
       $this->q_categorie = $q_categorie;
       $this->q_reponse = $q_reponse;
    }

    /**
     * @return mixed
     */
    public function getQLibelle()
    {
        return $this->q_libelle;
    }

    /**
     * @param mixed $q_libelle
     */
    public function setQLibelle($q_libelle): void
    {
        $this->q_libelle = $q_libelle;
    }

    /**
     * @return mixed
     */
    public function getQImglibelle()
    {
        return $this->q_imglibelle;
    }

    /**
     * @param mixed $q_imglibelle
     */
    public function setQImglibelle($q_imglibelle): void
    {
        $this->q_imglibelle = $q_imglibelle;
    }

    /**
     * @return mixed
     */
    public function getQSequence()
    {
        return $this->q_sequence;
    }

    /**
     * @param mixed $q_sequence
     */
    public function setQSequence($q_sequence): void
    {
        $this->q_sequence = $q_sequence;
    }

    /**
     * @return mixed
     */
    public function getQTextillustration()
    {
        return $this->q_textillustration;
    }

    /**
     * @param mixed $q_textillustration
     */
    public function setQTextillustration($q_textillustration): void
    {
        $this->q_textillustration = $q_textillustration;
    }

    /**
     * @return mixed
     */
    public function getQLienillustration()
    {
        return $this->q_lienillustration;
    }

    /**
     * @param mixed $q_lienillustration
     */
    public function setQLienillustration($q_lienillustration): void
    {
        $this->q_lienillustration = $q_lienillustration;
    }

    /**
     * @return mixed
     */
    public function getQCategorie()
    {
        return $this->q_categorie;
    }

    /**
     * @param mixed $q_categorie
     */
    public function setQCategorie($q_categorie): void
    {
        $this->q_categorie = $q_categorie;
    }

    /**
     * @return mixed
     */
    public function getQReponse()
    {
        return $this->q_reponse;
    }

    /**
     * @param mixed $q_reponse
     */
    public function setQReponse($q_reponse): void
    {
        $this->q_reponse[] = $q_reponse;
    }

}