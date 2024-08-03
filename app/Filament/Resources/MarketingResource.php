<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MarketingResource\Pages;
use App\Filament\Resources\MarketingResource\RelationManagers;
use App\Models\Marketing;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MarketingResource extends Resource
{
    protected static ?string $model = Marketing::class;
    protected static ?string $navigationGroup = 'Marketing';
    protected static ?string $navigationIcon = 'heroicon-o-presentation-chart-line';
    protected static ?string $navigationLabel = 'Marketing';
    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('state')
                    ->label('Stato')
                    ->options([
                        'attivo' => 'Attivo',
                        'non attivo' => 'Non attivo',
                    ]),
                Forms\Components\TextInput::make('name')
                    ->label('Nome')
                    ->maxLength(40),
                Forms\Components\DatePicker::make('start')
                    ->label('Inizio'),
                Forms\Components\DatePicker::make('end')
                    ->label('Fine'),
                Forms\Components\Select::make('channel_id')
                    ->label('Canale')
                    ->relationship('channel', 'name')
                    ->required(),
                Forms\Components\TextInput::make('note_channel')
                    ->label('Note Canale')
                    ->maxLength(40),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('state')
                    ->label('Stato')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nome')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('start')
                    ->date()
                    ->label('Inizio')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('end')
                    ->date()
                    ->label('Fine')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('channel.name')
                    ->label('Canale')
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
            'index' => Pages\ListMarketings::route('/'),
            'create' => Pages\CreateMarketing::route('/create'),
            'edit' => Pages\EditMarketing::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return __('Marketing'); // Customize the singular label
    }

    public static function getPluralModelLabel(): string
    {
        return __('Marketing'); // Customize the plural label
    }
}
