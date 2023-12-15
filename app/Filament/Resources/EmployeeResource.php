<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmployeeResource\Pages;
use App\Filament\Resources\EmployeeResource\RelationManagers;
use App\Models\Employee;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\FormsComponent;
use Filament\Infolists\Components\Section as ComponentsSection;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = 'Employee Management';

    protected static ?string $navigationLabel = 'Employees List';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Employees Information')
                    ->schema([
                        Forms\Components\Grid::make()
                            ->schema([
                                Forms\Components\TextInput::make('first_name'),
                                Forms\Components\TextInput::make('last_name'),
                                Forms\Components\TextInput::make('email')
                                    ->email(),
                                Forms\Components\TextInput::make('phone_number')
                                    ->tel(),
                                Forms\Components\DatePicker::make('hire_date')
                                    ->format('Y-m-d'),
                                Forms\Components\Select::make('employment_type')
                                    ->options([
                                        'full-time' => 'full-time',
                                        'part-time' => 'part-time',
                                    ]),
                                Forms\Components\TextInput::make('password')
                                    ->password(),


                            ])->columnSpan(2)

                    ])->columnSpan('full'),

                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Role')
                            ->schema([
                                Forms\Components\Toggle::make('is_admin')
                                    ->helperText('Check this box if the employee is an admin.'),



                            ])

                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('employee_id'),
                Tables\Columns\TextColumn::make('first_name'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('phone_number'),
                Tables\Columns\TextColumn::make('employment_type'),
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
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }
}
