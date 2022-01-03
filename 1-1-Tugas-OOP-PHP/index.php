<?php

abstract class Hewan
{
    public $nama;
    public $darah;
    public $jumlahKaki;
    public $keahlian;

    public function __construct($nama, $jumlahKaki, $keahlian)
    {
        $this->nama = $nama;
        $this->darah = 50;
        $this->jumlahKaki = $jumlahKaki;
        $this->keahlian = $keahlian;

    }

    public function atraksi()
    {
        echo "$this->nama sedang $this->keahlian";
    }
}

abstract class Fight extends Hewan
{
    public $attackPower;
    public $defencePower;

    public function __construct($nama, $jumlahKaki, $keahlian, $attackPower,$defencePower)
    {
        parent::__construct($nama, $jumlahKaki, $keahlian);
        $this->attackPower = $attackPower;
        $this->defencePower = $defencePower;
    }

    public function serang(Hewan $attacker,Hewan $attacked)
    {
        echo "$attacker->nama sedang menyerang $attacked->nama";
        echo "<br>";
        
        $this->diserang($attacker, $attacked);
    }

    public function diserang(Hewan $attacker,Hewan $attacked)
    {
        echo "$attacked->nama sedang diserang $attacker->nama";
        echo "<br>";

        $attacked->darah = $attacked->darah - ($attacker->attackPower / $attacked->defencePower);
    }
}

class Elang extends Fight
{
    public function getInfoHewan()
    {
        echo "Nama : $this->nama";
        echo "<br>";
        echo "Darah : $this->darah";
        echo "<br>";
        echo "Jumlah Kaki : $this->jumlahKaki";
        echo "<br>";
        echo "Keahlian : $this->keahlian";
        echo "<br>";
        echo "Attack Power : $this->attackPower";
        echo "<br>";
        echo "Defence Power : $this->defencePower";
        echo "<br>";

    }
}

class Harimau extends Fight
{
    public function getInfoHewan()
    {
        echo "Nama : $this->nama";
        echo "<br>";
        echo "Darah : $this->darah";
        echo "<br>";
        echo "Jumlah Kaki : $this->jumlahKaki";
        echo "<br>";
        echo "Keahlian : $this->keahlian";
        echo "<br>";
        echo "Attack Power : $this->attackPower";
        echo "<br>";
        echo "Defence Power : $this->defencePower";
    }
}

$elang = new Elang("Elang","2","Terbang","30","20");
$elang->getInfoHewan();

$harimau = new Harimau("Harimau","4","Cakar","40","10");

$harimau->getInfoHewan();
echo "<br>";
echo "<br>";

$elang->serang($elang,$harimau);
echo "<br>";

$harimau->getInfoHewan();


?>