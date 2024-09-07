<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AppointmentResource\Pages;
use App\Filament\Resources\AppointmentResource\RelationManagers;
use App\Models\Appointment;
use App\Models\Patient;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Collection;

class AppointmentResource extends Resource
{
    protected static ?string $model = Appointment::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Citas';
    protected static ?string $modelLabel = 'cita';
    protected static ?string $navigationGroup = 'Gestion de citas';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informacion del paciente')
                    ->columns(1)
                    ->description('')
                    ->schema([
                        Forms\Components\Select::make('patient_id')
                            ->relationship(name: 'patient', titleAttribute: 'name')
                            ->preload()
                            ->createOptionForm([
                                Forms\Components\TextInput::make('DNI')
                                    ->required()
                                    ->translateLabel()
                                    ->maxLength(8),
                                Forms\Components\TextInput::make('name')
                                    ->required()
                                    ->translateLabel()
                                    ->maxLength(200),
                                Forms\Components\TextInput::make('phone')
                                    ->tel()
                                    ->required()
                                    ->translateLabel()
                                    ->maxLength(9),
                                Forms\Components\DatePicker::make('birthdate')
                                    ->translateLabel()
                                    ->required(),
                            ])
                            ->searchable()
                            ->required()
                            ->translateLabel()
                    ]),
                Forms\Components\Section::make('Informacion de la cita')
                    ->columns(2)
                    ->description('')
                    ->schema([
                        Forms\Components\Select::make('type_attention_id')
                            ->relationship(name: 'typeAttention', titleAttribute: 'type_attention')
                            ->preload()
                            ->searchable()
                            ->required()
                            ->translateLabel()
                            ->createOptionForm([
                                Forms\Components\TextInput::make('type_attention')
                                    ->required()
                                    ->translateLabel()
                                    ->maxLength(200),
                                Forms\Components\TextInput::make('price')
                                    ->required()
                                    ->translateLabel()
                                    ->numeric()
                                    ->prefix('S/'),
                            ]),
                        Forms\Components\TextInput::make('price')
                            ->translateLabel()
                            ->readOnly(),
                        Forms\Components\DatePicker::make('date')
                            ->translateLabel()
                            ->required(),
                        Forms\Components\TextInput::make('hour')
                            ->translateLabel()
                            ->required(),
                    ]),
                Forms\Components\TextInput::make('state')
                    ->required()
                    ->translateLabel()
                    ->default('En proceso')
                    ->visible(false)
                    ->maxLength(20),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('hour'),
                Tables\Columns\TextColumn::make('state')
                    ->searchable(),
                Tables\Columns\TextColumn::make('patient_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('type_attention_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAppointments::route('/'),
            'create' => Pages\CreateAppointment::route('/create'),
            'edit' => Pages\EditAppointment::route('/{record}/edit'),
        ];
    }
}
