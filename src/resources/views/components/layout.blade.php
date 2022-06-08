<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <title>{{ $title ?? '体重管理' }}</title>
</head>
<header>
  <div style="height: 30px; background-color: grey;">

  </div>
</header>
<body>
  {{ $content }}
</body>
</html>