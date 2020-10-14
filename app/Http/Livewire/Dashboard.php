<?php

namespace App\Http\Livewire;

use App\Models\Speedtest;
use App\Utility\Diagram\Diagram;
use App\Utility\Diagram\Entry;
use Arr;
use Livewire\Component;

class Dashboard extends Component
{
    public int $hours = 24;

    public string $checks;
    public string $up;
    public string $down;
    public string $ping;

    public function render()
    {
        $query = Speedtest::query()->whereBetween('tested_at', [now()->subHours($this->hours), now()]);
        $this->checks = $query->count();
        $this->up = $this->siPrefix($query->avg('upload'));
        $this->down = $this->siPrefix($query->avg('download'));
        $this->ping = $this->siPrefix($query->avg('ping'));
        $diagram = $this->makeDiagram($query);
        $diagram->colorize("#fc00ff", "#00dbde");
        return view('livewire.dashboard', [
            'diagram' => $diagram,
        ])->layout('components.layout');
    }

    private function makeDiagram($query): Diagram{
        $d = new Diagram;
        $steps = 64;
        $max = $query->max('download');
        $entries = collect();
        for($i = 1; $i <= $steps; $i++){
            $q = clone $query;
            $lower = ($i - 1)/$steps * $max;
            $upper = $i /$steps * $max;
            $c = $q->whereBetween('download',[$lower, $upper])->count();
            logger("Lower: ${lower}\t Upper: ${upper}\t Count: ${c}");
            $e = Entry::new()->x(sprintf("%sbit/s", $this->siPrefix($lower + (($upper - $lower) / 2))))->y($c);
            $entries->push($e);
        }
        $d->entries = $entries;
        return $d;

    }


    public function siPrefix(?float $n): string
    {
        $n = $n ?? 0;
        $i = floor(log($n) / log(1000));
        if ($n == 0) {
            return 'n/a ';
        }
        $sizes = [
            24 => 'Y',
            21 => 'Z',
            18 => 'E',
            15 => 'P',
            12 => 'T',
            9 => 'G',
            6 => 'M',
            3 => 'k',
            0 => '',
            -3 => 'm',
            -6 => 'μ',
            -12 => 'n',
            -15 => 'p',
            -18 => 'f',
            -21 => 'z',
            -24 => 'y',
        ];
        return round($n / pow(1000, $i), 2) . ' ' . $sizes[$i * 3];
    }
}
