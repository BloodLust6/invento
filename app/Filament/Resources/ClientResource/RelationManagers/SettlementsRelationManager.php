<?php

namespace App\Filament\Resources\ClientResource\RelationManagers;

use Filament\Tables;
use App\Enums\SaleStatusEnum;
use Filament\Resources\Table;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Resources\RelationManagers\RelationManager;

class SettlementsRelationManager extends RelationManager
{
    protected static string $relationship = 'settlements';

    protected static ?string $recordTitleAttribute = 'amount';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('amount')
                    ->money('myr', true)
                    ->sortable(),
                Tables\Columns\TextColumn::make('date')
                    ->sortable(),
                Tables\Columns\TextColumn::make('sale.date')
                    ->sortable(),
                BadgeColumn::make('sale.status')
                    ->colors(SaleStatusEnum::enumColors())
                    ->sortable(),

            ]);
    }
}
