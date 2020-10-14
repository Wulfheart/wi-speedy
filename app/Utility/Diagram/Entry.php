<?php

namespace App\Utility\Diagram;

class Entry {
    public string $color;
    public string $x;
    public float $y;

    public static function new():Entry{
        return new Entry();
    }

    public function x(string $value) : self{
        $this->x = $value;
        return $this;
    }

    public function y(float $value) : self {
        $this->y = $value;
        return $this;
    }

    public function color(string $value) : self {
        $this->color = $value;
        return $this;
    }
}
