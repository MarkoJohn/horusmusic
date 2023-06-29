<?php

namespace App\Services;

class Triangle extends ShapeService
{
    public $a_or_radius;
    public $b;
    public $c;

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
        return "triangle";
    }

    public function getAttributes(): array
    {
        return [
            "a" => (float)$this->a_or_radius,
            "b" => (float)$this->b,
            "c" => (float)$this->c,
        ];
    }

    public function computeArea(): float|int
    {
        return ($this->b * $this->a_or_radius)/2;
    }

    public function computeCircumference(): float|int
    {
        return $this->a_or_radius + $this->b + $this->c;
    }
}