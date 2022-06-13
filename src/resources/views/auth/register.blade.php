<x-layout>
  <x-slot name=title>新規登録ページ</x-slot>
  <x-slot name=content>

    {{-- バリデーション --}}
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    
    <div class="login-form">
      {{ Form::open(['route' => 'register', 'method' => 'POST']) }}
        @csrf
        <h1 class="text-white text-center">新規登録</h1>
        {{ Form::text('name', null,
          ['class' => 'form-control', 'placeholder' => 'お名前'])
        }}

        {{ Form::text('email', null,
          ['class' => 'form-control', 'placeholder' => 'メールアドレス'])
        }}
        
        {{ Form::password('password',
          ['class' => 'form-control', 'placeholder' => 'パスワード'])
        }}

        {{ Form::password('password_confirmation',
          ['class' => 'form-control', 'placeholder' => 'パスワード確認'])
        }}
        <button class="btn btn-warning form-control" type="submit">新規登録</button>
      {{ Form::close() }}
    </div>

  </x-slot>
</x-layout>