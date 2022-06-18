<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use App\Enums\Day;

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

    $calendar['week'] = [];
    $weekCount = 1; // 第1週
    // 該当月カレンダーの初日までの空白を埋める
    for ($prevDay = 1; $prevDay < $startDay; $prevDay++) {
      $calendar['week'][$weekCount][] = '';
    }
    // 該当月の初日から最終日までをループ
    for ($day = 1; $day <= $dayCount; $day++, $startDay++) {
      $calendar['week'][$weekCount][] = $day;
      // 週の終わり且つ月末ではなければ翌週へ
      if ($startDay % Day::SUNDAY == 0 && $day != $dayCount) {
        $weekCount++;
      }
    }
    // 該当月カレンダーの最終日以降の空白を埋める
    $diffDay = Day::SUNDAY - count($calendar['week'][$weekCount]);
    for ($nextDay = 1; $nextDay <= $diffDay; $nextDay++) {
      $calendar['week'][$weekCount][] = '';
    }

    return $calendar;
  }

}