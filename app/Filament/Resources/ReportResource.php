<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReportResource\Pages;
use App\Filament\Resources\ReportResource\RelationManagers;
use App\Models\Report;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReportResource extends Resource
{
    protected static ?string $model = Report::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('patient')
                    ->required()
                    ->maxLength(200),
                Forms\Components\TextInput::make('hc_nr')
                    ->required()
                    ->maxLength(100),
                Forms\Components\TextInput::make('dni')
                    ->required()
                    ->maxLength(9),
                Forms\Components\TextInput::make('edad')
                    ->required()
                    ->maxLength(3),
                Forms\Components\TextInput::make('sexo')
                    ->required()
                    ->maxLength(1),
                Forms\Components\TextInput::make('modalidad_atencion')
                    ->required()
                    ->maxLength(100),
                Forms\Components\DateTimePicker::make('fecha_hora_ingreso'),
                Forms\Components\DateTimePicker::make('fecha_hora_egreso'),
                Forms\Components\TextInput::make('resumen_hc')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('diagnostico_1')
                    ->required()
                    ->maxLength(200),
                Forms\Components\TextInput::make('cie10_1')
                    ->required()
                    ->maxLength(200),
                Forms\Components\TextInput::make('diagnostico_2')
                    ->maxLength(200)
                    ->default(null),
                Forms\Components\TextInput::make('cie10_2')
                    ->maxLength(200)
                    ->default(null),
                Forms\Components\TextInput::make('diagnostico_3')
                    ->maxLength(200)
                    ->default(null),
                Forms\Components\TextInput::make('cie10_3')
                    ->maxLength(200)
                    ->default(null),
                Forms\Components\TextInput::make('diagnostico_4')
                    ->maxLength(200)
                    ->default(null),
                Forms\Components\TextInput::make('cie10_4')
                    ->maxLength(200)
                    ->default(null),
                Forms\Components\TextInput::make('tratamiento')
                    ->required()
                    ->maxLength(10),
                Forms\Components\TextInput::make('tratamiento_desc')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('evolucion')
                    ->required()
                    ->maxLength(100),
                Forms\Components\TextInput::make('evolucion_desc')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('fecha_hora_alta'),
                Forms\Components\TextInput::make('observaciones')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('doctor_id')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('patient')
                    ->searchable(),
                Tables\Columns\TextColumn::make('hc_nr')
                    ->searchable(),
                Tables\Columns\TextColumn::make('dni')
                    ->searchable(),
                Tables\Columns\TextColumn::make('edad')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sexo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('modalidad_atencion')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fecha_hora_ingreso')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fecha_hora_egreso')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('resumen_hc')
                    ->searchable(),
                Tables\Columns\TextColumn::make('diagnostico_1')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cie10_1')
                    ->searchable(),
                Tables\Columns\TextColumn::make('diagnostico_2')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cie10_2')
                    ->searchable(),
                Tables\Columns\TextColumn::make('diagnostico_3')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cie10_3')
                    ->searchable(),
                Tables\Columns\TextColumn::make('diagnostico_4')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cie10_4')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tratamiento')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tratamiento_desc')
                    ->searchable(),
                Tables\Columns\TextColumn::make('evolucion')
                    ->searchable(),
                Tables\Columns\TextColumn::make('evolucion_desc')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fecha_hora_alta')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('observaciones')
                    ->searchable(),
                Tables\Columns\TextColumn::make('doctor_id')
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
            'index' => Pages\ListReports::route('/'),
            'create' => Pages\CreateReport::route('/create'),
            'edit' => Pages\EditReport::route('/{record}/edit'),
        ];
    }
}
