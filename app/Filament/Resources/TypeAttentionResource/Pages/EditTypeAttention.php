<?php

namespace App\Filament\Resources\TypeAttentionResource\Pages;

use App\Filament\Resources\TypeAttentionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTypeAttention extends EditRecord
{
    protected static string $resource = TypeAttentionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
