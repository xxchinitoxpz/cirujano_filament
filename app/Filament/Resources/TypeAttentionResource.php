<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TypeAttentionResource\Pages;
use App\Filament\Resources\TypeAttentionResource\RelationManagers;
use App\Models\TypeAttention;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TypeAttentionResource extends Resource
{
    protected static ?string $model = TypeAttention::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Procedimientos';
    protected static ?string $modelLabel = 'procedimiento';
    protected static ?string $navigationGroup = 'Gestion de procedimientos';
    protected static ?int $navigationSort = 9;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informacion del procedimiento')
                    ->columns(2)
                    ->description('')
                    ->schema([

                        Forms\Components\TextInput::make('type_attention')
                            ->required()
                            ->translateLabel()
                            ->maxLength(200),
                        Forms\Components\TextInput::make('price')
                            ->required()
                            ->translateLabel()
                            ->numeric()
                            ->prefix('S/'),
                    ])

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('type_attention')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->money()
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
            'index' => Pages\ListTypeAttentions::route('/'),
            'create' => Pages\CreateTypeAttention::route('/create'),
            'edit' => Pages\EditTypeAttention::route('/{record}/edit'),
        ];
    }
}
