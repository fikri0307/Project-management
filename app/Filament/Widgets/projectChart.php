<?php

namespace App\Filament\Widgets;

use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\BarChartWidget;
use App\Models\project;

class projectChart extends BarChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {   
        $data = Trend::model(project::class)
        
        ->between(  
            start: now()->startOfYear(),
            end: now()->endOfYear(),
        )
        ->perMonth()
         ->count();
 
        return [
            'datasets' => [
                [
                    'label' => 'project created',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                    'borderColor'=> 'rgb(248,156,12)',
                    'backgroundColor' => 'rgb(248,156,12)',
                    'showLine' => 'false',
                    
                ],
            ],
        //     'datasets' =>[[
        //         'label' => 'project done'
        //     ],
        // ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
 
    }
   

    protected static ?string $maxHeight = '200px';
//     protected static ?array $options = [
//         'plugins' => true,
//             'legend' => true,
//                 'display' => false,
        
//     ];
 }
