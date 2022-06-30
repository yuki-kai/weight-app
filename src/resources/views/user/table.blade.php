@inject('weightService', 'App\Services\WeightService')
<x-layout>
  <x-slot name=title>体重テーブル</x-slot>
  <x-slot name=content>

    <div class="table-wrapper">
      {{-- 上部・左部 --}}
      <div class="row col-12 m-0">
        <div class="col-12 col-md-6">
          <div class="info-block">
            <div class="form-group d-flex">
              <label class="info-head">記録範囲</label>
              <label class="info-body" id="day_range">2022/4/1 から 2022/7/31</label>
            </div>
            <div class="form-group d-flex">
              <label class="info-head">記録日数</label>
              <label class="info-body" id="day_count">90日</label>
            </div>
            <div class="form-group d-flex">
              <label class="info-head">平均体重</label>
              <label class="info-body" id="average_weight">66.6kg</label>
            </div>
            <div class="form-group d-flex">
              <label class="info-head">最低体重</label>
              <label class="info-body" id="min_weight">66.6kg</label>
            </div>
            <div class="form-group d-flex">
              <label class="info-head">最高体重</label>
              <label class="info-body" id="max_weight">66.6kg</label>
            </div>
            <div>
              <button class="btn btn-warning form-control" id="output" type="button">出力する</button>
            </div>
          </div>
        </div>

        {{-- 下部・右部 --}}
        <div class="col-12 col-md-6 table-scroll">
          <table class="table table-bordered col-12">
            <thead class="default-bg-color">
              <tr>
                <th width="180px" class="text-white">年月日</th>
                <th width="110px" class="text-white">体重(kg)</th>
                <th width="110px" class="text-white">前回比(kg)</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($weights as $index => $weight)
                <tr>
                  <td>{{ $weight->day->format('Y年n月j日') }}</td>
                  <td>{{ number_format($weight->weight, 1) }}</td>
                  <td>
                    @if ($index > 0)
                      @php $prev = $weights[$index - 1]->weight @endphp
                      {{ $weightService->getComparedWeight($weight->weight, $prev) }}
                    @else
                      --- {{-- 前回比がない初回ループ --}}
                    @endif
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

    </div>

  </x-slot>
</x-layout>

<script src="{{ asset('js/table.js') }}"></script>