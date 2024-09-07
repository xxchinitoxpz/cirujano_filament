<?php

namespace App\Filament\Resources\TypeAttentionResource\Pages;

use App\Filament\Resources\TypeAttentionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTypeAttentions extends ListRecords
{
    protected static string $resource = TypeAttentionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
