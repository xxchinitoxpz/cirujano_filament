<?php

namespace App\Filament\Resources\ReportResource\Pages;

use App\Filament\Resources\ReportResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateReport extends CreateRecord
{
    protected static string $resource = ReportResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {

        $data['doctor_id'] = auth()->user()->doctor->id;
        //dd($data);
        return $data;
    }
}
