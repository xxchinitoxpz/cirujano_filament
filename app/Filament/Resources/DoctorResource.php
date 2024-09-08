<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DoctorResource\Pages;
use App\Filament\Resources\DoctorResource\RelationManagers;
use App\Models\Doctor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DoctorResource extends Resource
{
    protected static ?string $model = Doctor::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Medicos';
    protected static ?string $modelLabel = 'medico';
    protected static ?string $navigationGroup = 'Gestion de medicos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informacion del medico')
                    ->columns(2)
                    ->description('')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->translateLabel()
                            ->maxLength(255),
                        Forms\Components\Select::make('user_id')
                        ->relationship(name: 'user', titleAttribute: 'name')
                            ->required()
                            ->translateLabel(),
                        Forms\Components\TextInput::make('CMP')
                            ->required()
                            ->maxLength(5)
                            ->translateLabel(),
                        Forms\Components\TextInput::make('RNE')
                            ->required()
                            ->translateLabel()
                            ->maxLength(5),
                    ]),
                Forms\Components\Section::make('Firma del medico')
                    ->columns(1)
                    ->description('')
                    ->schema([
                        Forms\Components\FileUpload::make('stamp_image')
                            ->image()
                            ->translateLabel()
                            ->required(),
                    ]),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('CMP')
                    ->searchable(),
                Tables\Columns\TextColumn::make('RNE')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('stamp_image'),
                Tables\Columns\TextColumn::make('user_id')
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
            'index' => Pages\ListDoctors::route('/'),
            'create' => Pages\CreateDoctor::route('/create'),
            'edit' => Pages\EditDoctor::route('/{record}/edit'),
        ];
    }
}
