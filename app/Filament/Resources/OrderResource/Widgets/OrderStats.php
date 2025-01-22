<?php

namespace App\Filament\Resources\OrderResource\Widgets;

use App\Models\Order;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Number;

class OrderStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('New Orders', Order::query()->where('status', 'new')->count()),
            Stat::make('Processing Orders', Order::query()->where('status', 'Processing')->count()),
            Stat::make('Shipped Orders', Order::query()->where('status', 'Shipped')->count()),
            Stat::make('Delivered Orders', Order::query()->where('status', 'Delivered')->count()),
            Stat::make('Cancelled Orders', Order::query()->where('status', 'Cancelled')->count()),
            Stat::make('Average Price', Number::currency(Order::query()->average('grand_total'), 'IDR')),
        ];
    }
}
