<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AttentionResource\Pages;
use App\Filament\Resources\AttentionResource\RelationManagers;
use App\Filament\Resources\AttentionResource\RelationManagers\AuxiliaryExamsRelationManager;
use App\Filament\Resources\AttentionResource\RelationManagers\PatientExamsRelationManager;
use App\Filament\Resources\AttentionResource\RelationManagers\RecipeRelationManager;
use App\Models\Appointment;
use App\Models\Attention;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AttentionResource extends Resource
{
    protected static ?string $model = Attention::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Historias clinicas';
    protected static ?string $modelLabel = 'historia clinica';
    protected static ?string $navigationGroup = 'Gestion de historias clinicas';

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
                            ->options(
                                Appointment::where('state', 'En proceso')
                                    ->get()
                                    ->mapWithKeys(function (Appointment $appointment) {
                                        $patientName = $appointment->patient->name;
                                        return [$appointment->id => sprintf('%s | %s | %s - %s', $patientName, $appointment->typeAttention->type_attention, $appointment->date, $appointment->hour)];
                                    })
                            )
                            ->reactive() // Esto permite reaccionar a los cambios
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
                    ->columns(7)
                    ->description('')
                    ->schema([
                        Forms\Components\TextInput::make('fr')
                            ->required()
                            ->maxLength(20),
                        Forms\Components\TextInput::make('peso')
                            ->required()
                            ->maxLength(20),
                        Forms\Components\TextInput::make('so2')
                            ->required()
                            ->maxLength(20),
                        Forms\Components\TextInput::make('temp')
                            ->required()
                            ->maxLength(20),
                        Forms\Components\TextInput::make('pa')
                            ->required()
                            ->maxLength(20),
                        Forms\Components\TextInput::make('talla')
                            ->required()
                            ->maxLength(20),
                        Forms\Components\TextInput::make('fc')
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
                //->columnSpanFull()
                Forms\Components\Section::make()
                    ->columns(7)
                    ->description('')
                    ->schema([
                        Forms\Components\Textarea::make('antecedent')
                            ->required()
                            ->translateLabel()
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('symptoms')
                            ->translateLabel()
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('inconvenience')
                            ->required()
                            ->translateLabel()
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('diagnosis')
                            ->required()
                            ->translateLabel()
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('treatment')
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
