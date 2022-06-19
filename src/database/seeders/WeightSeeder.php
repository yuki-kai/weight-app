<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Weight;

class WeightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 体重の範囲
        $min_weight = 65;
        $max_weight = 69;
        // 体重計測日を範囲内で1日ずつ加算
        $timestamp = strtotime(date('Y-m-d'));
        $start_day = date('Y-m-d', strtotime('-1 month', $timestamp));
        $end_day = date('Y-m-d');
        for ($day = $start_day; $day <= $end_day; $day = date('Y-m-d', strtotime($day . '+1 day'))) {
            // 小数点第一までを算出 (例：65.7)
            $weight = number_format($min_weight + mt_rand() / mt_getrandmax() * ($max_weight - $min_weight), 1);
            Weight::create(
                [
                    "weight" => $weight,
                    "day" => $day,
                    "user_id" => 1,
                ],
            );
        }
    }
}
