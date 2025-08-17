<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HasilResource\Pages;
use App\Filament\Resources\HasilResource\RelationManagers;
use App\Models\Hasil;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HasilResource extends Resource
{
    protected static ?string $model = Hasil::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationLabel = 'Hasil CF';
    protected static ?int $navigationSort = 5;

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('pengguna.nama')
                ->label('Pengguna'),
                TextColumn::make('adiksi.nama')
                ->label('Adiksi'),
                TextColumn::make('cf_final')
                ->label('CF Akhir %')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHasils::route('/'),
        ];
    }
}
