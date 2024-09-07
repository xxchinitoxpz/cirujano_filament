<?php

namespace App\Filament\Resources\AttentionResource\Pages;

use App\Filament\Resources\AttentionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAttentions extends ListRecords
{
    protected static string $resource = AttentionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
