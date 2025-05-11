<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Review;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Users', User::count()),
            Stat::make('Total Orders', number_format(Order::count())),
            Stat::make('Total Sales', number_format(OrderItem::sum('price'))),
            Stat::make('Total Reviews', number_format(Review::count())),
        ];
    }
}
