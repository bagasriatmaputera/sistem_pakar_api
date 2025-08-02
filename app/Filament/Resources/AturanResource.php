<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AturanResource\Pages;
use App\Filament\Resources\AturanResource\RelationManagers;
use App\Models\Aturan;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AturanResource extends Resource
{
    protected static ?string $model = Aturan::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('gejala_id')
                    ->relationship('gejala', 'nama')
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('lvl_adiksi_id')
                    ->relationship('lvl_adiksi', 'nama')
                    ->searchable()
                    ->preload()
                    ->required(),

                TextInput::make('cf_pakar')
                    ->label("CF Pakar:")
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(1)
                    ->rule(['between:0,1'])
                    ->required()
                    ->helperText("Masukan nilai cf 0.0 - 1.0")
                    ->validationMessages([
                        'between' => 'Nilai harus di antara 0.0 sampai 1.0.',
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('gejala.nama')
                    ->label('Nama gejala:'),
                TextColumn::make('lvl_adiksi.nama')
                    ->label('Nama Penyakit/Tingkat Adiksi:'),
                TextColumn::make('cf_pakar')
                ->label('CF_Pakar')
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
            'index' => Pages\ListAturans::route('/'),
            'create' => Pages\CreateAturan::route('/create'),
            'edit' => Pages\EditAturan::route('/{record}/edit'),
        ];
    }
}
