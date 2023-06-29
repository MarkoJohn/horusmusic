<?php

namespace App\Services;

class Circle  extends ShapeService
{

    public function __construct()
    {
    }

    public function setAttributes($a_or_radius, $b, $c)
    {
        $this->a_or_radius = $a_or_radius;
        $this->b = $b;
        $this->c = $c;
    }

    public function getType(): string
    {
        return "circle";
    }

    public function getAttributes(): array
    {
        return [
            "radius" => (float)$this->a_or_radius,
        ];
    }

    public function computeArea(): float|int
    {
        return pi() * ($this->a_or_radius * $this->a_or_radius);
    }

    public function computeCircumference(): float|int
    {
        return 2 * pi() * $this->a_or_radius;
    }
}