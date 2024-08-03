<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WorksiteResource\Pages;
use App\Filament\Resources\WorksiteResource\RelationManagers;
use App\Models\Worksite;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WorksiteResource extends Resource
{
    protected static ?string $model = Worksite::class;

    protected static ?string $navigationGroup = 'Prodotti';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Cantieri';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nome')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('village')
                    ->label('Località')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('builder')
                    ->label('Costruttore')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('village')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('builder')
                    ->searchable()
                    ->sortable(),
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
            'index' => Pages\ListWorksites::route('/'),
            'create' => Pages\CreateWorksite::route('/create'),
            'edit' => Pages\EditWorksite::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return __('Cantiere'); // Customize the singular label
    }

    public static function getPluralModelLabel(): string
    {
        return __('Cantieri'); // Customize the plural label
    }
}
