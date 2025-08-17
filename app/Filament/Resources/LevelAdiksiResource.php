<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LevelAdiksiResource\Pages;
use App\Filament\Resources\LevelAdiksiResource\RelationManagers;
use App\Models\LevelAdiksi;
use App\Models\Lvl_adiksi;
use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LevelAdiksiResource extends Resource
{
    protected static ?string $model = Lvl_adiksi::class;

    protected static ?string $navigationLabel = 'Kat Adiksi';
    protected static ?int $navigationSort = 3;
    protected static ?string $navigationIcon = 'heroicon-o-identification';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('kode')
                    ->label('Kode Adiksi')
                    ->default(function () {
                        $lastCode = Lvl_adiksi::orderBy('kode', 'desc')->first()?->kode ?? 'P00';
                        $number = intval(substr($lastCode, 1)) + 1;
                        return 'P' . str_pad($number, 2, '0', STR_PAD_LEFT);
                    })
                    ->disabled() // agar user tidak ubah
                    ->dehydrated(true),
                    TextInput::make('nama')
                    ->label('Kategori Kecanduan:')
                    ->required()
                    ->helperText('Masukan tingkat adiksi'),
                    Textarea::make('deskripsi')
                    ->label('Deskripsi:')
                    ->required()
                    ->helperText('Masukan deskripsi singkat tentang tingkat adiksi tsb.'),
                    Textarea::make('solusi')
                    ->label('Solusi/Penanganan:')
                    ->required()
                    ->helperText('Masukan solusi menghadapi kecanduan AI pada tingkat tsb.'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kode')
                ->label('Kode'),
                TextColumn::make('nama')
                ->label('Kategori Adiksi')
                ->searchable(),
                TextColumn::make('deskripsi')
                ->label('Deskripsi'),
                TextColumn::make('solusi')
                ->label('Solusi'),
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
            'index' => Pages\ListLevelAdiksis::route('/'),
            'create' => Pages\CreateLevelAdiksi::route('/create'),
            'edit' => Pages\EditLevelAdiksi::route('/{record}/edit'),
        ];
    }
}
