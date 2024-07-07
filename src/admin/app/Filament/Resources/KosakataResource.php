<?php

namespace App\Filament\Resources;

use App\Concern\Kosakata as AppKosakata;
use App\Filament\Resources\KosakataResource\Pages;
use App\Filament\Resources\KosakataResource\RelationManagers;
use App\Models\Kosakata;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KosakataResource extends Resource
{
    protected static ?string $model = Kosakata::class;

    protected static ?string $pluralModelLabel = 'Kosakata';
    protected static ?string $slug = 'kosakata';
    protected static ?string $navigationIcon = 'heroicon-o-photo';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('gambar'),
            ])
            ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('id', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('gambar')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->after(fn () => AppKosakata::generateJson()),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
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
            'index' => Pages\ListKosakatas::route('/'),
            // 'create' => Pages\CreateKosakata::route('/create'),
            // 'edit' => Pages\EditKosakata::route('/{record}/edit'),
        ];
    }
}
