<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HouseResource\Pages;
use App\Filament\Resources\HouseResource\RelationManagers;
use App\Models\House;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HouseResource extends Resource
{
    protected static ?string $model = House::class;

    protected static ?string $navigationGroup = 'Prodotti';
    protected static ?string $navigationIcon = 'heroicon-o-home-modern';
    protected static ?string $navigationLabel = 'Immobili';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('worksite_id')
                    ->label('Cantiere')
                    ->relationship('worksite', 'name')
                    ->required(),
                Forms\Components\TextInput::make('code')
                    ->label('Codice')
                    ->required()
                    ->maxLength(15),
                Forms\Components\Select::make('type')
                    ->label('Tipologia')
                    ->options([
                        'appartamento' => 'Appartamento',
                        'villa' => 'Villa',
                    ]),
                Forms\Components\Select::make('state')
                    ->label('Stato')
                    ->options([
                        'disponibile' => 'Disponibile',
                        'prenotato' => 'Prenotato',
                        'sospeso' => 'Sospeso',
                        'venduto' => 'Venduto',
                    ]),
                Forms\Components\TextInput::make('room_number')
                    ->label('Numero Locali')
                    ->integer()
                    ->required()
                    ->maxLength(2),
                Forms\Components\Select::make('floor')
                    ->label('Piano')
                    ->options([
                        'terra' => 'Terra',
                        'primo' => 'Primo',
                        'secondo' => 'Secondo',
                        'terzo' => 'Terzo',
                    ]),
                Forms\Components\TextInput::make('mqc')
                    ->label('Metri Quadri')
                    ->numeric()
                    ->inputMode('decimal')
                    ->required(),
                Forms\Components\TextInput::make('price')
                    ->label('Prezzo')
                    ->numeric()
                    ->inputMode('decimal')
                    ->required()
                    ->maxLength(20),
                Forms\Components\TextInput::make('minimum_price')
                    ->label('Prezzo Minimo')
                    ->numeric()
                    ->inputMode('decimal')
                    ->required()
                    ->maxLength(20),
                Forms\Components\TextInput::make('minimum_deposit')
                    ->label('Caparra Minima')
                    ->numeric()
                    ->inputMode('decimal')
                    ->required()
                    ->maxLength(20),
                Forms\Components\FileUpload::make('attachment')
                    ->image()
                    ->preserveFilenames()
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('16:9')
                    ->imageResizeTargetWidth('300')
                    ->imageResizeTargetHeight('150')
                    ->imagePreviewHeight('250')
                    ->loadingIndicatorPosition('left')
                    ->panelAspectRatio('2:1')
                    ->panelLayout('integrated')
                    ->removeUploadedFileButtonPosition('right')
                    ->uploadButtonPosition('left')
                    ->uploadProgressIndicatorPosition('left'),
                Forms\Components\RichEditor::make('followup')
                    ->label('Follow Up')
                    ->maxLength(255),
                Forms\Components\RichEditor::make('note')
                    ->label('Note')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('attachment')
                    ->label('Foto'),
                Tables\Columns\TextColumn::make('code')
                    ->label('Codice')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('type')
                    ->label('Tipologia')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('room_number')
                    ->label('Locali')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('mqc')
                    ->label('MQC')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('price')
                    ->label('Prezzo')
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
            'index' => Pages\ListHouses::route('/'),
            'create' => Pages\CreateHouse::route('/create'),
            'edit' => Pages\EditHouse::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return __('Immobile'); // Customize the singular label
    }

    public static function getPluralModelLabel(): string
    {
        return __('Immobili'); // Customize the plural label
    }
}
