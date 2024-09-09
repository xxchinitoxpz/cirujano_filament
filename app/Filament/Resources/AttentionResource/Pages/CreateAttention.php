<?php

namespace App\Filament\Resources\AttentionResource\Pages;

use App\Filament\Resources\AttentionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAttention extends CreateRecord
{
    protected static string $resource = AttentionResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {

        $data['state'] = 'Registrada';
        $data['doctor_id'] = auth()->user()->doctor->id;
        //dd($data);

        return $data;
    }
}
