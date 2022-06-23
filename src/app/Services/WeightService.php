<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Enums\Day;
use App\Models\Weight;

class WeightService
{
  /**
   * カレンダーを作成する
   * 
   * @return array $calendar
   */
  public function createCalendar()
  {
    // 先月・翌月リンクが押された場合は該当年月を、押されてなければ本日の年月を取得
    if (isset($_GET['yearMonth'])) {
      $yearMonth = $_GET['yearMonth'];
    } else {
      $yearMonth = date('Y-m');
    }
    $timestamp = strtotime($yearMonth); // UNIXタイムスタンプを取得
    $calendar = [];
    $calendar['last'] = date('Y-m', strtotime('-1 month', $timestamp)); // 先月
    $calendar['next'] = date('Y-m', strtotime('+1 month', $timestamp)); // 翌月
    $calendar['title'] = date('Y年 n月', $timestamp);
    $dayCount = date('t', $timestamp); // 該当月の日数を取得
    $startDay = date('N', $timestamp); // 該当月の曜日を月曜始まりで取得

    $weekCount = 1; // 第1週
    // 該当月カレンダーの初日までの空白を埋める
    for ($prevDay = 1; $prevDay < $startDay; $prevDay++) {
      $calendar['week'][$weekCount][] = ['day' => '', 'weight' => ''];
    }

    // 該当月の初日から最終日までをループ
    for ($day = 1; $day <= $dayCount; $day++, $startDay++) {
      $weight = \App\Models\Weight::where('day', date('Y-m-'.$day, $timestamp))->value('weight');
      $calendar['week'][$weekCount][] = ['day' => $day, 'weight' => $weight];

      // 今日の日付を取得
      if (date('Y-m-'.$day) == date('Y-m-d')) {
        $calendar['today_weight'] = \App\Models\Weight::where('day', date('Y-m-d'))->value('weight');
      }

      // 週の終わり且つ月末ではなければ翌週へ
      if ($startDay % Day::SUNDAY == 0 && $day != $dayCount) {
        $weekCount++;
      }
    }

    // 該当月カレンダーの最終日以降の空白を埋める
    $diffDay = Day::SUNDAY - count($calendar['week'][$weekCount]);
    for ($nextDay = 1; $nextDay <= $diffDay; $nextDay++) {
      $calendar['week'][$weekCount][] = ['day' => '', 'weight' => ''];
    }

    return $calendar;
  }

  /**
   * 
   * @return double|null
   */
  public function getTodaysWeight()
  {
    $today_weight = [];
    $today_weight['weight'] = Weight::where('day', date('Y-m-d'))->value('weight');
    // 体重を整数部と小数点以下に分離して取得 (例：65.7 => 65と7)
    $tmpArray = explode('.', $today_weight['weight']);
    $today_weight['weight_integer'] = $tmpArray[0];
    if ($tmpArray[0] && !isset($tmpArray[1])) {
      // 今日の体重の小数点以下が0の場合、省略されてしまうので明示的に追加
      $today_weight['weight_decimal'] = '0';
    } elseif (!$tmpArray[0] ) {
      // 今日の体重がまだ記録されてなければ小数点以下も空文字
      $today_weight['weight_decimal'] = '';
    } else {
      // 今日の体重の小数点以下が0ではない場合 (例：65.1〜65.9)
      $today_weight['weight_decimal'] = $tmpArray[1];
    }

    return $today_weight;
  }

  /**
   * 体重を該当日に記録・更新する
   * @param Request $request
   * @return void
   */
  public function registerWeight(Request $request)
  {
    // 体重を整形
    $weight = $request->weight_integer.'.'.$request->weight_decimal;
    // 第一引数に該当するデータがあれば更新、なければ第二引数のデータで新規作成
    Weight::updateOrCreate(
      ['day' => $request->date, 'user_id' => Auth::id()],
      ['weight' => $weight, 'day' => $request->date, 'user_id' => Auth::id()],
    );
  }

}