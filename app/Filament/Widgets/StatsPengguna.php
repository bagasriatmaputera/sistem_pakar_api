<?php

namespace App\Filament\Widgets;

use App\Models\Gejala;
use App\Models\Hasil;
use App\Models\Jawaban;
use App\Models\Lvl_adiksi;
use App\Models\Pengguna;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;

class StatsPengguna extends BaseWidget
{
    protected function getStats(): array
    {
        $totalPengguns = Pengguna::count();
        $totalAdikasi = Lvl_adiksi::count();
        $totalGejala = Gejala::count();
        return [
            Stat::make('Total Diagnosis', $totalPengguns . ' Pengguna'),
            Stat::make('Total Gejala', $totalGejala . ' Gejala'),
            Stat::make('Total Kategori Adiksi', $totalAdikasi . ' Kategori'),
        ];
    }
}
