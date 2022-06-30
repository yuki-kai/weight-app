console.log('table')
const BOM = new Uint8Array([0xEF, 0xBB, 0xBF]);

let workCsvData = [];

$('#output').on('click', () => {
  console.log(workCsvData);
  createInfoBlock();
  createWeightTable();
  download();
});

const createInfoBlock = () => {
  workCsvData.push(['記録範囲', $('#day_range').text()]);
  workCsvData.push(['記録日数', $('#day_count').text()]);
  workCsvData.push(['平均体重', $('#average_weight').text()]);
  workCsvData.push(['最低体重', $('#min_weight').text()]);
  workCsvData.push(['最高体重', $('#max_weight').text()]);
}

const createWeightTable = () => {
  // ヘッダー作成
  workCsvData.push(['年月日', '体重(kg)', '前回比(kg)']);
  const weightsTr = $('table tbody tr');
  weightsTr.each(function() {
    // 各行を作成
    const rowCsv = [];
    rowCsv.push(
      $(this).children('td:nth-child(1)').text(),
      $(this).children('td:nth-child(2)').text(),
      $.trim($(this).children('td:nth-child(3)').text()),
    )
    workCsvData.push(rowCsv.join(','))
  });
}

const download = () => {
  let blob = new Blob([BOM, workCsvData], {type: 'text/csv'});
  let url  = (window.URL || window.webkitURL).createObjectURL(blob);

  const a = document.createElement('a');
  a.download = 'title';
  a.href = url;
  a.click();
}