<?php

namespace App\Filament\Resources\AturanResource\Pages;

use App\Filament\Resources\AturanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAturans extends ListRecords
{
    protected static string $resource = AturanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
