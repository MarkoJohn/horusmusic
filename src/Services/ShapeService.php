<?php

namespace App\Services;

use Exception;

abstract class ShapeService
{

    /**
     * @throws Exception
     */
    public static function getInstance(string $shape): object
    {
        return match ($shape) {
            "triangle" => new Triangle(),
            "circle" => new Circle(),
            default => throw new Exception("Shape not supported yet"),
        };
    }

    /**
     * @throws Exception
     */
    public function circumference(): float
    {
        return $this->computeCircumference();
    }

    /**
     * @throws Exception
     */
    public function surface(): float
    {
        return $this->computeArea();
    }

    abstract public function computeArea(): float|int;

    abstract public function setAttributes($a_or_radius, $b, $c);

    abstract public function computeCircumference(): float|int;
}