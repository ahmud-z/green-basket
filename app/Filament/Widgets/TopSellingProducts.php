<?php

namespace App\Filament\Widgets;

use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class TopSellingProducts extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                \App\Models\Product::query()
                    ->withCount('orders')
                    ->orderBy('orders_count', 'desc')
                    ->limit(5)
            )
            ->columns([
                TextColumn::make('name')
                    ->label('Product Name')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('orders_count')
                    ->label('Total Orders'),
            ])
            ->actions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make(),
                ]),
            ]);
    }
}
