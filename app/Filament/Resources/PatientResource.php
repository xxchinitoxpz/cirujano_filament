<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PatientResource\Pages;
use App\Filament\Resources\PatientResource\RelationManagers;
use App\Models\Patient;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PatientResource extends Resource
{
    protected static ?string $model = Patient::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Pacientes';
    protected static ?string $modelLabel = 'paciente';
    protected static ?string $navigationGroup = 'Gestion de pacientes';
    protected static ?int $navigationSort = 5;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informacion del paciente')
                    ->columns(2)
                    ->description('')
                    ->schema([
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

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('DNI')
                    ->translateLabel()
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->translateLabel()
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->translateLabel()
                    ->searchable(),
                Tables\Columns\TextColumn::make('birthdate')
                    ->translateLabel()
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->translateLabel()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->translateLabel()
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
            'index' => Pages\ListPatients::route('/'),
            'create' => Pages\CreatePatient::route('/create'),
            'edit' => Pages\EditPatient::route('/{record}/edit'),
        ];
    }
}
