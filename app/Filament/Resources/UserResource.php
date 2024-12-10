<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Tables\Table;
use Form\Components\TextInput;
use Filament\Actions\ViewAction;
use Filament\Resources\Resource;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Pages\CreateRecord;
use Filament\Forms\Components\DateTimePicker;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserResource\Pages\EditUser;
use App\Filament\Resources\UserResource\Pages\ListUsers;
use App\Filament\Resources\UserResource\Pages\CreateUser;
use App\Filament\Resources\UserResource\RelationManagers;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form

            ->schema([
                //
                Forms\Components\TextInput::make('name')
                ->required(),
                Forms\Components\TextInput::make('email')
                ->email()
                ->required()
                        ->label('Email Address')
                        ->unique(ignoreRecord: true)
                        ->maxlength(255),

                        Forms\Components\DateTimePicker::make('email_verified_at')
                        ->label('Email Verified At')
                        ->default(now()),
                        Forms\Components\TextInput::make('password')
                        ->password()
                        ->dehydrated(fn ($state) => filled($state))
                        ->required(fn (Page $livewire): bool => $livewire instanceof CreateRecord),
        ]);
                }

                public static function table(Table $table): Table
                {
                    return $table

                    ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email_verified_at')
                    ->datetime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email_verified_at')
                    ->datetime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->datetime()
                    ->sortable(),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    DeleteAction::make()
                ])
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
