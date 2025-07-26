<?php

namespace App\Filament\Resources\LevelAdiksiResource\Pages;

use App\Filament\Resources\LevelAdiksiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLevelAdiksis extends ListRecords
{
    protected static string $resource = LevelAdiksiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
