<x-layout>
  <x-slot name=title>申し込みカレンダー</x-slot>
  <x-slot name=content>
    
    {{ Form::open() }}
      <div class="container-fluid calendar-wrapper p-0 px-md-5">
        <div class="row m-0">
          <h3 class="text-center my-3">
            <a href="{{ route('user.calendar', ['yearMonth' => $calendar['last']]) }}">&lt;</a>
            &nbsp;{{ $calendar['title'] }}&nbsp;
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
                    <td>
                      <span>{{ $day }}</span>
                    </td>
                  @endforeach
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    {{ Form::close() }}

  </x-slot>
</x-layout>