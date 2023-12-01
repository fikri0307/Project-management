<?php

namespace App\Filament\Widgets;

use App\Models\project;
use Carbon\Carbon;
use Filament\Widgets\LineChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;



// class UsesChart extends LineChartWidget
// {
//     // protected static ?string $model = project::class;
//     protected static ?string $heading = 'Chart';

//     protected static string $color= 'info';

//     protected function getData(): array
//     {
//         $data = Trend::model(project::class)
//             ->between(  
//                 start: now()->startOfYear(),
//                 end: now()->endOfYear(),
//             )
//             ->perMonth()
//              ->count();
     
//         return [
//             'datasets' => [
//                 [
//                     'label' => 'project created',
//                     'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
//                     'borderColor'=> 'rgb(248,156,12)',
//                     'backgroundColor' => 'rgb(248,156,12)',
//                     'showLine' => 'false',
                    
//                 ],
//             ],
//             'labels' => $data->map(fn (TrendValue $value) => $value->date),
//         ];
//     }

//      protected function getType(): string
//          {
//            return    'line';
//          }


// private function getProductsPerMonth(): array
// {

//     $now = Carbon::now( );

//     $productsPerMonth = []

//     $months = collect(range(1,12))->map(function($month)use($now, $productsPerMonth){

//         $count =Product::whereMonth('created_at',Carbon::parse($now->month($month)->format('y-m')))->count();
    
//     $productsPerMonth[] =$count;


//     return $now->month($month)->format('M');


// })->toArray();

// return[

//     'productsPerMonth'=> $productsPerMonth,
//     'months' =>    $months


// ]

// }


//  }