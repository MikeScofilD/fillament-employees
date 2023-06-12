<?php

namespace App\Filament\Resources\EmployeeResource\Widgets;

use App\Models\Country;
use App\Models\Employee;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class EmployeeStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $us = Country::where('country_code', 'USA')->withCount('employees')->first();
        $uk = Country::where('country_code', 'UK')->withCount('employees')->first();

        return [
            Card::make('All Employee', Employee::all()->count()),
            Card::make($uk->name.' Employees rate', $uk->employees->count()),
            Card::make($us->name.' Employees rate', $us->employees->count()),
        ];
    }
}
