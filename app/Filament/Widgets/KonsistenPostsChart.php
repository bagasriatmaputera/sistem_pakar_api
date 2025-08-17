<?php

namespace App\Filament\Widgets;

use App\Models\Jawaban;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class KonsistenPostsChart extends ChartWidget
{
    protected static ?string $heading = 'Jawaban Konsisten (CF ≥ 0.5) per Adiksi';
    protected static ?int $sort = 2;
    protected function getData(): array
    {
        $konsisten = Jawaban::join('lvl_adiksis', 'jawabans.adiksi_id', '=', 'lvl_adiksis.id')
            ->select('lvl_adiksis.nama', DB::raw('COUNT(jawabans.id) as total'))
            ->where('cf_kombinasi', '>=', 0.5)
            ->groupBy('lvl_adiksis.nama')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Jawaban Konsisten',
                    'data' => $konsisten->pluck('total')->toArray(),
                    'backgroundColor' => [
                        'rgba(7, 60, 95, 1)',
                        'rgb(255, 205, 86)',
                    ],
                ],
            ],
            'labels' => $konsisten->pluck('nama')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'bar'; // bisa line/pie/doughnut juga
    }
}
