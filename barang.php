<?php
class Barang
{
    private $nama;
    private $beratKG;
    private $beratG;
    private $beratMG;
    private $stok;

    function __construct($nama, $beratKG, $stok)
    {
        $this->nama = $nama;
        $this->beratKG = $beratKG;
        $this->stok = $stok;
    }

    function convertBeratG($beratKG)
    {
        $this->beratG = $beratKG * 1000;
    }
    function convertBeratMG($beratKG)
    {
        $this->beratMG = $beratKG * 1000000;
    }

    function getNama()
    {
        return $this->nama;
    }
    function getBeratKG()
    {
        return $this->beratKG;
    }
    function getBeratG()
    {
        return $this->beratG;
    }
    function getBeratMG()
    {
        return $this->beratMG;
    }
    function getStok()
    {
        return $this->stok;
    }
}
