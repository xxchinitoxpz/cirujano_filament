<?php

namespace App\Filament\Resources\AttentionResource\Pages;

use App\Filament\Resources\AttentionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAttention extends EditRecord
{
    protected static string $resource = AttentionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
