<x-layout>
  <x-slot name=title>ログインページ</x-slot>
  <x-slot name=content>
    <div class="login-form">
      {{ Form::open(['method' => 'POST']) }}
        <h1 class="text-white text-center">ログイン</h1>
        {{ Form::text('email', null,
          ['class' => 'form-control', 'placeholder' => 'メールアドレス'])
        }}
        
        {{ Form::password('password',
          ['class' => 'form-control', 'placeholder' => 'パスワード'])
        }}
        <button class="btn btn-warning form-control" type="submit">ログイン</button>
      {{ Form::close() }}
    </div>
  </x-slot>
</x-layout>