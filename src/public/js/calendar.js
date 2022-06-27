
$(document).on('click','td',function() {
  // クリックした日付を取得
  if ($(this).find('span.day').text()) {
    var clicked_Ymd = $('#year_month').val() + ' ' + $(this).find('span.day').text() + '日';
  } else {
    var clicked_Ymd = $('#year_month').val();
  }

  // クリックした日付の体重を取得
  if ($(this).find('span.weight').text()) {
    var clicked_weight = $(this).find('span.weight').text();
  } else {
    var clicked_weight = '未登録';
  }

  // 取得した日付と体重を設定
  $('#clicked_day').text(clicked_Ymd);
  $('#clicked_weight').text(clicked_weight);
});
