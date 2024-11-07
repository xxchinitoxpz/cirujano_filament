<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AttentionResource\Pages;
use App\Filament\Resources\AttentionResource\RelationManagers;
use App\Filament\Resources\AttentionResource\RelationManagers\AuxiliaryExamsRelationManager;
use App\Filament\Resources\AttentionResource\RelationManagers\PatientExamsRelationManager;
use App\Filament\Resources\AttentionResource\RelationManagers\RecipeRelationManager;
use App\Models\Appointment;
use App\Models\Attention;
use App\Models\cie;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\Pages\Page;


class AttentionResource extends Resource
{
    protected static ?string $model = Attention::class;

    protected static ?string $navigationIcon = 'heroicon-s-clipboard-document-list';
    protected static ?string $navigationLabel = 'Historias clinicas';
    protected static ?string $modelLabel = 'historia clinica';
    protected static ?string $navigationGroup = 'Gestion de historias clinicas';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->columns(1)
                    ->schema([
                        Forms\Components\Select::make('appointment_id')
                            ->required()
                            ->label('Cita')
                            ->live()
                            ->options(function (callable $get, Page $livewire) {
                                // Si estamos creando, solo mostrar citas "En proceso"
                                if ($livewire instanceof Pages\CreateAttention) {
                                    return Appointment::where('state', 'En proceso')
                                        ->get()
                                        ->mapWithKeys(function (Appointment $appointment) {
                                            $patientName = $appointment->patient->name;
                                            return [$appointment->id => sprintf('%s | %s | %s - %s', $patientName, $appointment->typeAttention->type_attention, $appointment->date, $appointment->hour)];
                                        });
                                }
                                // Si estamos editando, mostrar todas las citas
                                return Appointment::all()
                                    ->mapWithKeys(function (Appointment $appointment) {
                                        $patientName = $appointment->patient->name;
                                        return [$appointment->id => sprintf('%s | %s | %s - %s', $patientName, $appointment->typeAttention->type_attention, $appointment->date, $appointment->hour)];
                                    });
                            })
                            ->reactive()
                            ->afterStateUpdated(function (Set $set, $state) {

                                $appointment = Appointment::find($state);

                                if ($appointment) {
                                    $patient = $appointment->patient;

                                    // Asignar los valores del paciente a los campos correspondientes
                                    $set('patient', $patient->name);
                                    $set('dni', $patient->DNI);
                                    $set('phone', $patient->phone);
                                    $set('birthdate', $patient->birthdate);

                                    // Calcular la edad
                                    $age = \Carbon\Carbon::parse($patient->birthdate)->age;
                                    $set('age', $age);
                                }
                            })
                            ->afterStateHydrated(function (Set $set, $state) {
                                $appointment = Appointment::find($state);

                                if ($appointment) {
                                    $patient = $appointment->patient;

                                    // Asignar los valores del paciente al cargar el formulario en modo de edición
                                    $set('patient', $patient->name);
                                    $set('dni', $patient->DNI);
                                    $set('phone', $patient->phone);
                                    $set('birthdate', $patient->birthdate);

                                    // Calcular la edad
                                    $age = \Carbon\Carbon::parse($patient->birthdate)->age;
                                    $set('age', $age);
                                }
                            }),

                        Forms\Components\TextInput::make('doctor')
                            ->label('Doctor')
                            ->live()
                            ->readOnly()
                            ->default(fn() => auth()->user()->doctor->name) // Esto se usa solo en el modo de creación
                            ->afterStateHydrated(function (Set $set, $state) {
                                if (!$state) {
                                    // Solo si el campo está vacío (por ejemplo, en la creación), asigna el valor predeterminado
                                    $set('doctor', auth()->user()->doctor->name);
                                }
                            }),
                    ]),
                Forms\Components\Section::make('Signos vitales')
                    ->columns(8)
                    ->description('')
                    ->schema([
                        Forms\Components\TextInput::make('pa')
                            ->required()
                            ->maxLength(20),
                        Forms\Components\TextInput::make('fc')
                            ->required()
                            ->maxLength(20),
                        Forms\Components\TextInput::make('fr')
                            ->required()
                            ->maxLength(20),
                        Forms\Components\TextInput::make('temp')
                            ->required()
                            ->maxLength(20),
                        Forms\Components\TextInput::make('so2')
                            ->required()
                            ->maxLength(20),
                        Forms\Components\TextInput::make('talla')
                            ->required()
                            ->maxLength(20),
                        Forms\Components\TextInput::make('peso')
                            ->required()
                            ->maxLength(20),
                        Forms\Components\TextInput::make('imc')
                            ->required()
                            ->maxLength(20),
                    ]),
                Forms\Components\Section::make('Información del paciente')
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('patient')
                            ->translateLabel()
                            ->live()
                            ->readOnly()
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('dni')
                            ->translateLabel()
                            ->live()
                            ->readOnly(),

                        Forms\Components\TextInput::make('phone')
                            ->translateLabel()
                            ->required()
                            ->readOnly(),

                        Forms\Components\TextInput::make('birthdate')
                            ->translateLabel()
                            ->live()
                            ->readOnly(),

                        Forms\Components\TextInput::make('age')
                            ->translateLabel()
                            ->live()
                            ->readOnly(),
                    ]),
                Forms\Components\Section::make('Antecedentes pesonales')
                    ->description('')
                    ->schema([
                        Forms\Components\Textarea::make('antecedent_medical')
                            ->required()
                            ->translateLabel()
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('antecedent_surgical')
                            ->translateLabel()
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('antecedent_allergies')
                            ->required()
                            ->translateLabel()
                            ->columnSpanFull(),
                    ]),
                Forms\Components\Section::make('Antecedentes familiares')
                    ->description('')
                    ->schema([
                        Forms\Components\Textarea::make('antecedent_family')
                            ->required()
                            ->translateLabel()
                            ->columnSpanFull(),
                    ]),
                Forms\Components\Section::make('Enfermedad actual')
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('sick_time')
                            ->translateLabel()
                            ->required()
                            ->live(),
                        Forms\Components\Select::make('sick_time2')
                            ->options([
                                'Dia' => 'Dia',
                                'Mes' => 'Mes',
                                'Año' => 'Año',
                            ])
                            ->required()
                            ->translateLabel(),
                        Forms\Components\Select::make('start_form')
                            ->options([
                                TRUE => 'Inisidioso',
                                FALSE => 'Progresivo',
                            ])
                            ->required()
                            ->translateLabel()
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('signs_symptoms')
                            ->required()
                            ->translateLabel()
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('chronological_account')
                            ->required()
                            ->translateLabel()
                            ->columnSpanFull(),
                    ]),
                Forms\Components\Section::make('Examen clinico')
                    ->columns(2)
                    ->schema([
                        Forms\Components\Textarea::make('clinical_examination')
                            ->required()
                            ->translateLabel()
                            ->columnSpanFull(),

                    ]),
                    Forms\Components\Section::make('Diagnóstico')
                    ->columns(1)
                    ->schema([
                        Forms\Components\Select::make('CIE')
                            ->preload()
                            ->translateLabel()
                            ->multiple()
                            ->required()
                            ->searchable()
                            ->options(function () {
                                return cie::all()->pluck('code', 'cie')
                                    ->mapWithKeys(function ($code, $cie) {
                                        return ["$code - $cie" => "$code - $cie"];
                                    });
                            }),
                    ]),
                Forms\Components\Section::make('Plan de trabajo')
                    ->columns(2)
                    ->schema([
                        Forms\Components\Textarea::make('work_plan')
                            ->required()
                            ->translateLabel()
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('appointment.patient.name')
                    ->searchable()
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('fr')
                    ->translateLabel()
                    ->searchable(),
                Tables\Columns\TextColumn::make('peso')
                    ->translateLabel()
                    ->searchable(),
                Tables\Columns\TextColumn::make('so2')
                    ->translateLabel()
                    ->searchable(),
                Tables\Columns\TextColumn::make('temp')
                    ->translateLabel()
                    ->searchable(),
                Tables\Columns\TextColumn::make('pa')
                    ->translateLabel()
                    ->searchable(),
                Tables\Columns\TextColumn::make('talla')
                    ->translateLabel()
                    ->searchable(),
                Tables\Columns\TextColumn::make('fc')
                    ->translateLabel()
                    ->searchable(),
                Tables\Columns\TextColumn::make('state')
                    ->translateLabel()
                    ->searchable(),
                Tables\Columns\TextColumn::make('doctor.name')
                    ->translateLabel()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->translateLabel()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->translateLabel()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('downloadPdf')
                    ->label('Descargar PDF')
                    ->url(fn(Attention $record) => route('attention.pdf', ['id' => $record->id]))
                    ->openUrlInNewTab(),

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            PatientExamsRelationManager::class,
            AuxiliaryExamsRelationManager::class,
            RecipeRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAttentions::route('/'),
            'create' => Pages\CreateAttention::route('/create'),
            'edit' => Pages\EditAttention::route('/{record}/edit'),
        ];
    }
}
