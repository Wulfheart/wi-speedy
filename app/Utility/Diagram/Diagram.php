<?php

namespace App\Utility\Diagram;

use Illuminate\Support\Collection;

class Diagram
{
    public Collection $entries;

    public static function make(Collection $entries): Diagram
    {
        $d = new Diagram;
        $d->entries = $entries;
        return $d;
    }

    public function colorize(string ...$colors){
        for($i = 0; $i < $this->entries->count(); $i++){
            $this->entries[$i]->color = $this->numberToColor($i, 0, $this->entries->count(), $colors);
        }
    }

    protected function numberToColor($value, $min, $max, $gradientColors = null)
    {
        // Ensure value is in range
        if ($value < $min) {
            $value = $min;
        }
        if ($value > $max) {
            $value = $max;
        }

        // Normalize min-max range to [0, positive_value]
        $max -= $min;
        $value -= $min;
        $min = 0;

        // Calculate distance from min to max in [0,1]
        $distFromMin = $value / $max;

        // Define start and end color
        if (count($gradientColors) == 0) {
            return $this->numberToColor($value, $min, $max, ['#CC0000', '#EEEE00', '#00FF00']);
        } else if (count($gradientColors) == 2) {
            $startColor = $gradientColors[0];
            $endColor = $gradientColors[1];
        } else if (count($gradientColors) > 2) {
            $startColor = $gradientColors[floor($distFromMin * (count($gradientColors) - 1))];
            $endColor = $gradientColors[ceil($distFromMin * (count($gradientColors) - 1))];

            $distFromMin *= count($gradientColors) - 1;
            while ($distFromMin > 1) {
                $distFromMin--;
            }
        } else {
            die("Please pass more than one color or null to use default red-green colors.");
        }

        // Remove hex from string
        if ($startColor[0] === '#') {
            $startColor = substr($startColor, 1);
        }
        if ($endColor[0] === '#') {
            $endColor = substr($endColor, 1);
        }

        // Parse hex
        list($ra, $ga, $ba) = sscanf("#$startColor", "#%02x%02x%02x");
        list($rz, $gz, $bz) = sscanf("#$endColor", "#%02x%02x%02x");

        // Get rgb based on
        $distFromMin = $distFromMin;
        $distDiff = 1 - $distFromMin;
        $r = intval(($rz * $distFromMin) + ($ra * $distDiff));
        $r = min(max(0, $r), 255);
        $g = intval(($gz * $distFromMin) + ($ga * $distDiff));
        $g = min(max(0, $g), 255);
        $b = intval(($bz * $distFromMin) + ($ba * $distDiff));
        $b = min(max(0, $b), 255);

        // Convert rgb back to hex
        $rgbColorAsHex = '#' .
            str_pad(dechex($r), 2, "0", STR_PAD_LEFT) .
            str_pad(dechex($g), 2, "0", STR_PAD_LEFT) .
            str_pad(dechex($b), 2, "0", STR_PAD_LEFT);

        return $rgbColorAsHex;
    }
}
