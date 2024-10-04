<?php

namespace App\Filament\Resources\AttentionResource\Pages;

use App\Filament\Resources\AttentionResource;
use App\Models\Appointment;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAttention extends CreateRecord
{
    protected static string $resource = AttentionResource::class;
    protected function afterCreate(): void
    {
        $data['state'] = 'Registrada';
        $data['doctor_id'] = auth()->user()->doctor->id;
    }
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['state'] = 'Registrada';
        $data['doctor_id'] = auth()->user()->doctor->id;

        //dd($data);
        $appointment = Appointment::find($data['appointment_id']);
        if ($appointment) {
            $appointment->update(['state' => 'Atendida']);
        }
        return $data;
    }
}
