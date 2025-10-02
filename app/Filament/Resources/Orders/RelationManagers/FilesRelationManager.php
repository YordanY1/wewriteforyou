<?php

namespace App\Filament\Resources\Orders\RelationManagers;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Table;
use Filament\Schemas\Schema;

// ВАЖНО: actions са под Filament\Actions в v4
use Filament\Actions\ViewAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\CreateAction;

use Illuminate\Support\Facades\Storage;

class FilesRelationManager extends RelationManager
{
    protected static string $relationship = 'files';

    public function form(Schema $schema): Schema
    {
        return $schema->components([
            FileUpload::make('path')
                ->disk('public')
                ->directory(fn() => 'order-files/' . $this->getOwnerRecord()->id)
                ->label('File')
                ->required()
                ->downloadable()
                ->openable()
                ->preserveFilenames()
                ->getUploadedFileNameForStorageUsing(function ($file) {
                    return $file->getClientOriginalName();
                })
                ->afterStateUpdated(function ($state, callable $set, $livewire) {
                    $set('original_name', $state ? basename($state) : null);
                }),


            Select::make('type')
                ->options([
                    'client_upload'   => 'Client Upload',
                    'writer_upload'   => 'Writer Upload',
                    'final_delivery'  => 'Final Delivery',
                ])
                ->required()
                ->default('writer_upload'),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('original_name')
            ->columns([
                TextColumn::make('original_name')
                    ->label('File Name')
                    ->url(fn($record) => Storage::disk('public')->url($record->path))
                    ->openUrlInNewTab()
                    ->searchable(),

                BadgeColumn::make('type')
                    ->colors([
                        'info'    => 'client_upload',
                        'warning' => 'writer_upload',
                        'success' => 'final_delivery',
                    ])
                    ->label('Type'),

                TextColumn::make('size')
                    ->label('Size (KB)')
                    ->formatStateUsing(fn($state) => $state ? round($state / 1024, 2) . ' KB' : '—'),

                TextColumn::make('created_at')
                    ->dateTime('d M Y H:i')
                    ->label('Uploaded At'),
            ])
            ->defaultSort('created_at', 'desc')

            ->headerActions([
                CreateAction::make()
                    ->mutateFormDataUsing(function (array $data): array {
                        if (!empty($data['path'])) {
                            $path = is_array($data['path']) ? $data['path'][0] : $data['path'];
                            $fullPath = Storage::disk('public')->path($path);

                            $data['original_name'] = basename($path);
                            $data['mime_type']     = @mime_content_type($fullPath);
                            $data['size']          = @filesize($fullPath);
                        }
                        return $data;
                    }),
            ])


            ->recordActions([
                ViewAction::make('download')
                    ->label('Download')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->url(fn($record) => Storage::disk('public')->url($record->path))
                    ->openUrlInNewTab(),

                EditAction::make(),
                DeleteAction::make(),
            ]);
    }

    public static function mutateFormDataBeforeCreate(array $data): array
    {

        if (!empty($data['path'])) {
            $data['original_name'] = basename(is_array($data['path']) ? $data['path'][0] : $data['path']);
            $fullPath = Storage::disk('public')->path($data['path']);
            $data['mime_type'] = @mime_content_type($fullPath);
            $data['size'] = @filesize($fullPath);
        }

        return $data;
    }

    public static function mutateFormDataBeforeSave(array $data): array
    {
        return static::hydrateFileMeta($data);
    }


    protected static function hydrateFileMeta(array $data): array
    {
        if (!empty($data['path'])) {
            $path = $data['path'];
            $fullPath = Storage::disk('public')->path($path);

            $data['original_name'] = basename($path);
            $data['mime_type']     = @mime_content_type($fullPath);
            $data['size']          = @filesize($fullPath);
        }

        return $data;
    }
}
