<?php

namespace App\Filament\Resources\JawabanUserResource\Pages;

use App\Filament\Resources\JawabanUserResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJawabanUsers extends ListRecords
{
    protected static string $resource = JawabanUserResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
