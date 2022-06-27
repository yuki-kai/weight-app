<x-layout>
  <x-slot name=title>体重カレンダー</x-slot>
  <x-slot name=content>
    
    {{ Form::open() }}
      <div class="container-fluid calendar-wrapper p-0 px-md-5">
        <div class="row m-0">
          <h3 class="text-center my-3">
            <a href="{{ route('user.calendar', ['yearMonth' => $calendar['last']]) }}">&lt;</a>
            &nbsp;{{ $calendar['title'] }}&nbsp;
            <input type="hidden" id="year_month" value="{{ $calendar['title'] }}">
            <a href="{{ route('user.calendar', ['yearMonth' => $calendar['next']]) }}">&gt;</a>
          </h3>
          <table class="table table-bordered table-calendar mb-5">
            <thead>
              <tr>
                <th class="text-center">月</th>
                <th class="text-center">火</th>
                <th class="text-center">水</th>
                <th class="text-center">木</th>
                <th class="text-center">金</th>
                <th class="text-center">土</th>
                <th class="text-center">日</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($calendar['week'] as $week)
                <tr>
                  @foreach ($week as $day)
                    <td class="text-center align-bottom">
                      <span class="day">{{ $day['day'] }}</span><br />
                      @if ($day['weight'])
                        <span class="weight">{{ number_format($day['weight'], 1) }}kg</span>
                      @endif
                    </td>
                  @endforeach
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        
        <div class="d-flex justify-content-between">
          {{-- クリックした日付と体重を表示 --}}
          <div>
            <h4 id="clicked_day">{{ date('Y年 n月 d日') }}</h4>
            <h3 id="clicked_weight">
              @if ($calendar['today_weight']) {{ $calendar['today_weight'] }}kg
              @else 未登録
              @endif
            </h3>
          </div>
          
          <div>
            <button class="btn btn-warning form-control" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">記録する</button>
          </div>
        </div>
      </div>
    {{ Form::close() }}

  </x-slot>
</x-layout>

{{-- モーダル --}}
{{ Form::open(['route' => 'user.calendar.register', 'method' => 'POST']) }}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title mx-auto" id="exampleModalLabel">
          {{ Form::date('date', \Carbon\Carbon::now(), ['class' => '']) }}
        </h5>
      </div>
      <div class="modal-body">
        <div class="text-center">
          体重 {{ Form::number('weight_integer', $today_weight['weight_integer'], ['class' => 'weight_integer', 'min' => 0]) }}
          . {{ Form::number('weight_decimal', $today_weight['weight_decimal'], ['class' => 'weight_decimal', 'min' => 0, 'max' => 9]) }} kg
        </div>
        <p class="text-center m-0 pt-3">既に体重が記録されている場合は上書きされます。</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
        <button class="btn btn-warning" type="submit">記録</button>
      </div>
    </div>
  </div>
</div>
{{ Form::close() }}

<script src="{{ asset('js/calendar.js') }}"></script>