<?php

class Event
{

    public $event_libelle;
    public $event_code;

    public $event_date_debut;

    public $event_date_fin;

    public $event_mdp;

    public $event_login;

    public $event_qrduree;

    public $event_nq;

    public $event_tirage;

    public $event_tirage_mini;

    public $event_clause;

    public $event_rgpd;

    public $event_chapo;

    public $event_qr_rep_visible;

    public $event_annee;




    public function __construct(String $event_libelle,String $event_code,String $event_date_debut, String $event_date_fin
    ,String $event_mdp, String $event_login,int $event_qrduree, int $event_nq,String $event_tirage, int $event_tirage_mini,String $event_clause,
    String $event_rgpd, String $event_chapo,String $event_qr_rep_visible, String $event_annee)
    {
        $this->event_libelle = $event_libelle;
        $this->event_date_debut = $event_date_debut;
        $this->event_date_fin = $event_date_fin;
        $this->event_code = $event_code;
        $this->event_annee = $event_annee;
        $this->event_nq = $event_nq;
        $this->event_chapo = $event_chapo;
        $this->event_rgpd = $event_rgpd;
        $this->event_login = $event_login;
        $this->event_mdp = $event_mdp;
        $this->event_qrduree = $event_qrduree;
        $this->event_qr_rep_visible = $event_qr_rep_visible;
        $this->event_tirage = $event_tirage;
        $this->event_tirage_mini = $event_tirage_mini;
        $this->event_clause = $event_clause;
    }




    /**
     * @return mixed
     */
    public function getEventAnnee()
    {
        return $this->event_annee;
    }

    /**
     * @param mixed $event_annee
     */
    public function setEventAnnee($event_annee): void
    {
        $this->event_annee = $event_annee;
    }

    /**
     * @return mixed
     */
    public function getEventQrRepVisible()
    {
        return $this->event_qr_rep_visible;
    }

    /**
     * @param mixed $event_qr_rep_visible
     */
    public function setEventQrRepVisible($event_qr_rep_visible): void
    {
        $this->event_qr_rep_visible = $event_qr_rep_visible;
    }

    /**
     * @return mixed
     */
    public function getEventChapo()
    {
        return $this->event_chapo;
    }

    /**
     * @param mixed $event_chapo
     */
    public function setEventChapo($event_chapo): void
    {
        $this->event_chapo = $event_chapo;
    }

    /**
     * @return mixed
     */
    public function getEventRgpd()
    {
        return $this->event_rgpd;
    }

    /**
     * @param mixed $event_rgpd
     */
    public function setEventRgpd($event_rgpd): void
    {
        $this->event_rgpd = $event_rgpd;
    }

    /**
     * @return mixed
     */
    public function getEventClause()
    {
        return $this->event_clause;
    }

    /**
     * @param mixed $event_clause
     */
    public function setEventClause($event_clause): void
    {
        $this->event_clause = $event_clause;
    }

    /**
     * @return mixed
     */
    public function getEventTirageMini()
    {
        return $this->event_tirage_mini;
    }

    /**
     * @param mixed $event_tirage_mini
     */
    public function setEventTirageMini($event_tirage_mini): void
    {
        $this->event_tirage_mini = $event_tirage_mini;
    }

    /**
     * @return mixed
     */
    public function getEventLibelle()
    {
        return $this->event_libelle;
    }

    /**
     * @param mixed $event_libelle
     */
    public function setEventLibelle($event_libelle): void
    {
        $this->event_libelle = $event_libelle;
    }

    /**
     * @return mixed
     */
    public function getEventCode()
    {
        return $this->event_code;
    }

    /**
     * @param mixed $event_code
     */
    public function setEventCode($event_code): void
    {
        $this->event_code = $event_code;
    }

    /**
     * @return mixed
     */
    public function getEventDateDebut()
    {
        return $this->event_date_debut;
    }

    /**
     * @param mixed $event_date_debut
     */
    public function setEventDateDebut($event_date_debut): void
    {
        $this->event_date_debut = $event_date_debut;
    }

    /**
     * @return mixed
     */
    public function getEventDateFin()
    {
        return $this->event_date_fin;
    }

    /**
     * @param mixed $event_date_fin
     */
    public function setEventDateFin($event_date_fin): void
    {
        $this->event_date_fin = $event_date_fin;
    }

    /**
     * @return mixed
     */
    public function getEventMdp()
    {
        return $this->event_mdp;
    }

    /**
     * @param mixed $event_mdp
     */
    public function setEventMdp($event_mdp): void
    {
        $this->event_mdp = $event_mdp;
    }

    /**
     * @return mixed
     */
    public function getEventLogin()
    {
        return $this->event_login;
    }

    /**
     * @param mixed $event_login
     */
    public function setEventLogin($event_login): void
    {
        $this->event_login = $event_login;
    }

    /**
     * @return mixed
     */
    public function getEventNq()
    {
        return $this->event_nq;
    }

    /**
     * @param mixed $event_nq
     */
    public function setEventNq($event_nq): void
    {
        $this->event_nq = $event_nq;
    }

    /**
     * @return mixed
     */
    public function getEventQrduree()
    {
        return $this->event_qrduree;
    }

    /**
     * @param mixed $event_qrduree
     */
    public function setEventQrduree($event_qrduree): void
    {
        $this->event_qrduree = $event_qrduree;
    }

    /**
     * @return mixed
     */
    public function getEventTirage()
    {
        return $this->event_tirage;
    }

    /**
     * @param mixed $event_tirage
     */
    public function setEventTirage($event_tirage): void
    {
        $this->event_tirage = $event_tirage;
    }


}