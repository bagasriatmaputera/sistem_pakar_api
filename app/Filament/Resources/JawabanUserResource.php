<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JawabanUserResource\Pages;
use App\Filament\Resources\JawabanUserResource\RelationManagers;
use App\Models\Jawaban;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JawabanUserResource extends Resource
{
    protected static ?string $model = Jawaban::class;
    protected static bool $canCreate = false;
    protected static ?int $navigationSort = 6;
    protected static ?string $navigationLabel = 'Details Jawaban';
    protected static ?string $navigationIcon = 'heroicon-o-document-magnifying-glass';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('pengguna.nama')
                    ->label('Nama:')
                    ->searchable(),
                TextColumn::make('gejala.kode')
                    ->label('Gejala:'),
                TextColumn::make('adiksi.kode')
                    ->label('Adiksi:'),
                TextColumn::make('cf_user')
                    ->label('CF User:'),
                TextColumn::make('cf_kombinasi')
                    ->label('CF Kombinasi:'),
            ])
            ->filters([
                //
            ])
            ->actions([
            ])
            ->bulkActions([
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
            'index' => Pages\ListJawabanUsers::route('/'),
        ];
    }
}
