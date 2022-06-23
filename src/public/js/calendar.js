
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

// // 体重入力のフォーカスが外れたら外れたら入力値を整形して再表示
// $(function() {
//   $('#input_weight').blur(() => {
//     $('#input_weight').val(weightFormat($('#input_weight').val()))
//   })
// });

// // $('#input_weight').change((e) => {
// $('#input_weight').on('input', (e) => {
//   if (isNaN($('#input_weight').val())) {
//     $('#message').text('半角数字を入力してください');
//   } else {
//     $('#message').text('');
//   }
// });

// // 入力された体重をフォーマット
// const weightFormat = (str) => {
//   // 全角数値を半角数値に変換
//   let val = str.replace(/[０-９]/g, function(s) {
//     return String.fromCharCode(s.charCodeAt(0) - 0xFEE0);
//   });
//   // 区切り文字を小数点に変換
//   val = val.replace(/[・、。,]/g, '.');

  
//   return val;
// }