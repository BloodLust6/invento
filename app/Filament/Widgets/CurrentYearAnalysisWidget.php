<?php

namespace App\Filament\Widgets;

use App\Models\Sale;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Filament\Widgets\LineChartWidget;

class CurrentYearAnalysisWidget extends LineChartWidget
{

    protected function getHeading(): string
    {
        return now()->year . ' Income';
    }

    protected function getData(): array
    {
        $monthlyIncomes = [];

        for ($i = 1; $i <= 12; $i++) {
            $monthlyIncomes[] = Sale::whereBetween('date', [today()->startOfYear(), today()->startOfYear()->addMonths($i - 1)->endOfMonth()])->sum('total_price');
        }

        return [
            'datasets' => [
                [
                    'label' => 'Income Evolution',
                    'data' => $monthlyIncomes,
                    'borderColor' => '#38bdf8',
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }
}
