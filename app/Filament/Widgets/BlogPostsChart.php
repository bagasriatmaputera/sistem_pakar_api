<?php

namespace App\Filament\Widgets;

use App\Models\Jawaban;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class BlogPostsChart extends ChartWidget
{
    protected static ?string $heading = 'Rata-rata CF per Adiksi';
    protected static ?int $sort = 2;
    protected function getData(): array
    {
        $cfPerAdiksi = Jawaban::select('adiksi_id', DB::raw('AVG(cf_kombinasi) as avg_cf'))
            ->with('adiksi') // ambil relasi
            ->groupBy('adiksi_id')
            ->get();

        $konsisten = Jawaban::where('cf_kombinasi', '>=', 0.5)->count();


        return [
            'datasets' => [
                [
                    'label' => 'CF Kombinasi Rata-rata',
                    'data' => $cfPerAdiksi->pluck('avg_cf')->toArray(),
                    'backgroundColor' => [
                        'rgb(255, 99, 132)',
                        'rgba(7, 60, 95, 1)',
                        'rgba(19, 210, 57, 1)',
                        'rgba(233, 86, 1, 1)',
                        'rgba(208, 26, 135, 1)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)'
                    ],
                ],
            ],
            'labels' => $cfPerAdiksi->map(fn($item) => $item->adiksi->nama)->toArray(), // pakai nama adiksi
        ];
    }

    protected function getType(): string
    {
        return 'doughnut'; // bisa 'line', 'pie', 'doughnut', dll
    }
}
