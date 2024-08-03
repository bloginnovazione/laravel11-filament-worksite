<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SaleResource\Pages;
use App\Filament\Resources\SaleResource\RelationManagers;
use App\Models\Sale;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SaleResource extends Resource
{
    protected static ?string $model = Sale::class;
    protected static ?string $navigationGroup = 'Marketing';
    protected static ?string $navigationIcon = 'heroicon-o-presentation-chart-line';
    protected static ?string $navigationLabel = 'Vendite';
    protected static ?int $navigationSort = 7;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('house_id')
                    ->label('Immobile')
                    ->relationship('house', 'code')
                    ->required(),
                Forms\Components\TextInput::make('booking_name')
                    ->label('Prenotante')
                    ->maxLength(40),
                Forms\Components\TextInput::make('sale_price')
                    ->label('Prezzo Vendita')
                    ->numeric()
                    ->inputMode('decimal')
                    ->maxLength(20),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('code')
                    ->label('Codice')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('type')
                    ->label('Typologia')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('price')
                    ->label('Listino')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('floor')
                    ->label('Piano')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('booking_name')
                    ->label('Prenotante')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('sale_price')
                    ->label('Prezzo Vendita')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('deposit_amount')
                    ->label('Caparra')
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
            'index' => Pages\ListSales::route('/'),
            'create' => Pages\CreateSale::route('/create'),
            'edit' => Pages\EditSale::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return __('Vendita'); // Customize the singular label
    }

    public static function getPluralModelLabel(): string
    {
        return __('Vendite'); // Customize the plural label
    }
}
