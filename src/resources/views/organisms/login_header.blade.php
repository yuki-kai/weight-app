<nav class="navbar navbar-expand-sm navbar-dark default-bg-color border-white">
  <div class="container">
    <a class="navbar-brand" href="#">LOGO</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
      <ul class="nav navbar-nav">
        <li class="nav-item m-1">
          <form action="{{ route('login') }}" method="GET">
            <button class="btn btn-warning form-control" type="submit">ログイン</button>
          </form>
        </li>
        <li class="nav-item m-1">
          <form action="{{ route('register') }}" method="GET">
            <button class="btn btn-warning form-control" type="submit">新規登録</button>
          </form>
        </li>
      </ul>
    </div>
  </div>
</nav>