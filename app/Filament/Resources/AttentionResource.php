<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AttentionResource\Pages;
use App\Filament\Resources\AttentionResource\RelationManagers;
use App\Models\Attention;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AttentionResource extends Resource
{
    protected static ?string $model = Attention::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
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
                Forms\Components\Textarea::make('antecedent')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('symptoms')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('inconvenience')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('diagnosis')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('treatment')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('state')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('route')
                    ->maxLength(200)
                    ->default(null),
                Forms\Components\TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('appointment_id')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('fr')
                    ->searchable(),
                Tables\Columns\TextColumn::make('peso')
                    ->searchable(),
                Tables\Columns\TextColumn::make('so2')
                    ->searchable(),
                Tables\Columns\TextColumn::make('temp')
                    ->searchable(),
                Tables\Columns\TextColumn::make('pa')
                    ->searchable(),
                Tables\Columns\TextColumn::make('talla')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fc')
                    ->searchable(),
                Tables\Columns\TextColumn::make('state')
                    ->searchable(),
                Tables\Columns\TextColumn::make('route')
                    ->searchable(),
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('appointment_id')
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
            'index' => Pages\ListAttentions::route('/'),
            'create' => Pages\CreateAttention::route('/create'),
            'edit' => Pages\EditAttention::route('/{record}/edit'),
        ];
    }
}
