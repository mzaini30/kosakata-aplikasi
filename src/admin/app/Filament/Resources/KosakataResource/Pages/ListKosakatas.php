<?php

namespace App\Filament\Resources\KosakataResource\Pages;

use App\Concern\Kosakata;
use App\Filament\Resources\KosakataResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKosakatas extends ListRecords
{
    protected static string $resource = KosakataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->after(fn () => Kosakata::generateJson()),
        ];
    }
}
