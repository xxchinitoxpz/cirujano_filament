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
        
        // Procesar los CIE en el formato deseado
        if (isset($data['CIE']) && is_array($data['CIE'])) {
            $formattedCIE = [];

            foreach ($data['CIE'] as $cie) {
                // Dividir el valor en `cie` y `code` si están disponibles
                if (preg_match('/^(?<code>\w+) - (?<cie>.+)$/', $cie, $matches)) {
                    $formattedCIE[] = "{$matches['cie']},{$matches['code']}";
                }
            }

            // Combinar los valores en una cadena separada por punto y coma
            $data['diagnosis'] = implode(';', $formattedCIE);
        }
        // dd( $data['diagnosis']);
        $data['state'] = 'Registrada';
        $data['doctor_id'] = auth()->user()->doctor->id;
        //dd( $data['doctor_id']);
        //dd($data);
        $appointment = Appointment::find($data['appointment_id']);
        if ($appointment) {
            $appointment->update(['state' => 'Atendida']);
        }
        return $data;
    }
}
