<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GejalaResource\Pages;
use App\Filament\Resources\GejalaResource\RelationManagers;
use App\Models\Gejala;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GejalaResource extends Resource
{
    protected static ?string $model = Gejala::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('kode')
                    ->label('Kode Gejala')
                    ->default(function () {
                        $lastCode = Gejala::orderBy('kode', 'desc')->first()?->kode ?? 'G00';
                        $number = intval(substr($lastCode, 1)) + 1;
                        return 'G' . str_pad($number, 2, '0', STR_PAD_LEFT);
                    })
                    ->disabled() // agar user tidak ubah
                    ->dehydrated(true), // <-- tambahkan ini agar tetap dikirim ke database!,
                TextInput::make('nama')
                    ->label('Nama Gejala: ')
                    ->required()
                    ->helperText('Masukan nama gejala.')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kode')
                ->label('Kode Gejala'),
                TextColumn::make('nama')
                ->label('Gejala')
                ->searchable()
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
            'index' => Pages\ListGejalas::route('/'),
            'create' => Pages\CreateGejala::route('/create'),
            'edit' => Pages\EditGejala::route('/{record}/edit'),
        ];
    }
}
