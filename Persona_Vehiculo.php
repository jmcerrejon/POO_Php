<?php

// getters & setters

class Persona
{
    private $edad;

    public function setEdad($edad)
    {
        if (is_numeric($edad) && $edad >=0) {
            $this->edad = $edad;
        }
    }

    public function getEdad()
    {
        return $this->edad;
    }
}

$yo = new Persona();
$yo->setEdad(40);
echo "Tengo {$yo->getEdad()} años". PHP_EOL;

// Herencia

class Vehiculo
{
    // Cuando una propiedad o un método son definidas como protected éstas quedan accesibles para las clases hijas.
    protected $litros = 0;

    public function __construct()
    {
        echo "Constructor definido en Vehiculo.\n";
    }

    public function repostar($litros)
    {
        if ($litros>0) {
            $this->litros += $litros;
        }
    }

    public function litrosEnDeposito()
    {
        return $this->litros;
    }
}

class Coche extends Vehiculo
{
    private $numeroPasajeros = 0;

    public function __construct()
    {
        echo "Constructor definido en Coche.\n";
        // • Si la clase madre tiene constructor y la hija no → se usa el de la madre.
        // • Si la clase hija tiene constructor se usa el suyo y se omite el de la madre.
        // • Si queremos que la hija llame al constructor de la madre hay que hacerlo con parent::__construct();
        parent::__construct();
    }

    public function setNumeroPasajeros($numeroPasajeros)
    {
        $this->numeroPasajeros = $numeroPasajeros;
    }

    public function getNumeroPasajeros()
    {
        return $this->numeroPasajeros;
    }

    public function estado()
    {
        return [
            'pasajeros' => $this->numeroPasajeros,
            'litros' => $this->litros,
        ];
    }
}
class Camion extends Vehiculo
{
    private $tieneRemolque = false;

    public function setRemolque($tieneRemolque)
    {
        $this->tieneRemolque = $tieneRemolque;
    }

    public function getRemolque()
    {
        return $this->tieneRemolque;
    }
}

$miCoche = new Coche();
$miCoche->repostar(10);
print_r($miCoche->estado());
echo "Litros en mi coche: " . $miCoche->litrosEnDeposito() . PHP_EOL;
$miCoche->setNumeroPasajeros(3);
echo "Pasajeros en mi coche: " . $miCoche->getNumeroPasajeros() . PHP_EOL;
