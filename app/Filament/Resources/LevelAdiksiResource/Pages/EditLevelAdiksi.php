<?php

namespace App\Filament\Resources\LevelAdiksiResource\Pages;

use App\Filament\Resources\LevelAdiksiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLevelAdiksi extends EditRecord
{
    protected static string $resource = LevelAdiksiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
