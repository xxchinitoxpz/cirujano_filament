<?php

namespace App\Filament\Resources\AttentionResource\RelationManagers;

use App\Models\Recipe;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RecipeRelationManager extends RelationManager
{
    protected static string $relationship = 'recipe';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Repeater::make('medicineRecipe')
                    ->relationship()
                    ->schema([
                        Forms\Components\Select::make('medicine_id')
                            ->relationship('medicine', 'medicine')
                            ->searchable()
                            ->translateLabel()
                            ->required(),
                        Forms\Components\TextInput::make('cantidad')
                            ->required()
                            ->translateLabel(),
                        Forms\Components\TextInput::make('dosis')
                            ->required()
                            ->translateLabel(),
                        Forms\Components\TextInput::make('periodo')
                            ->required()
                            ->translateLabel(),
                    ])->columns(2),
                Forms\Components\Textarea::make('dieta')
                    ->translateLabel(),
            ])->columns(1);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                Tables\Columns\TextColumn::make('id'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\Action::make('downloadPdf')
                    ->label('Descargar PDF')
                    ->url(fn (Recipe $record) => route('recipe.pdf', ['id' => $record->id])) // URL para descargar el PDF
                    ->openUrlInNewTab(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
