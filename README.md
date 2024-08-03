<h3 class="wp-block-heading" id="6-progetto-vendite-immobili">Property Sales Project</h3>
<p>I recently developed a small property/construction site management project and related property marketing and sales campaigns.</p>

If you want to delve deeper into the structure of the project you can click on this link to access the repository on GitHub.

In the project I created some Resources:

ChannelResource: for the management of Sales Channels;
HouseResource: for the management of properties
MarketingResource:: for the management of Marketing activities
SaleResource: for Sales management
WorkSite: for the management of construction sites
I set up a navigation menu by grouping the items. Below I report the settings made within the class ChannelResource: the menu item Channel is grouped in Marketing, with icon globe-alt, labels Canali and fifth in the order of navigation menu items.

protected static ?string $model = Channel::class;
protected static ?string $navigationGroup = 'Marketing';
protected static ?string $navigationIcon = 'heroicon-o-globe-alt';
protected static ?string $navigationLabel = 'Canali';
protected static ?int $navigationSort = 5;
Form
In the Property Management Form we used different types of information:

Select: to allow the choice of the construction site of which the property is part, taking advantage of the one-to-many relationship worksite specified in model

Forms\Components\Select::make('worksite_id')
                    ->label('Cantiere')
                    ->relationship('worksite', 'name')
                    ->required(),
TextInput: to allow setting the property code, mandatory entry, Code label, and maximum length 15 characters

Forms\Components\TextInput::make('code')
                    ->label('Codice')
                    ->required()
                    ->maxLength(15),
Select: so that it is possible to choose the type of property between apartment and villa

Forms\Components\Select::make('type')
                    ->label('Tipologia')
                    ->options([
                        'appartamento' => 'Appartamento',
                        'villa' => 'Villa',
                    ]),
FileUpLoad: to allow the uploading of the image of the property, where:

preserveFilenames: to keep the original name of the file
imagePreviewHeight: for definite the size (height) of the image preview
imageResizeTargetWidth e imageResizeTargetHeight: for redefinise the height and width of the uploaded image
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
RichEditor: to allow the field to be loaded followup with the style setting and editing toolbar

Forms\Components\RichEditor::make('followup')
                    ->label('Follow Up')
                    ->maxLength(255),
Table
In the list of loaded items, we used the following methods:

ImageColumn: to view the photo of the property stored in the field attachment

Tables\Columns\ImageColumn::make('attachment')
                    ->label('Foto'),
TextColumn: displaying the price of the property for sale, making the information searchable and orderable

Tables\Columns\TextColumn::make('price')
                    ->label('Prezzo')
                    ->searchable()
                    ->sortable(),
BlogInnovazione.it
