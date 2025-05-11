<?php

namespace App\Filament\Widgets;

use App\Models\OrderItem;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class SellTrendChart extends ChartWidget
{
    protected static ?string $heading = 'Sell trends for the last year';

    protected function getData(): array
    {
        $data = Trend::model(OrderItem::class)
            ->between(
                start: now()->subYear(),
                end: now(),
            )
            ->perMonth()
            ->sum('price');

        return [
            'datasets' => [
                [
                    'label' => 'Sales per month',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
