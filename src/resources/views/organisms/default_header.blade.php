<nav class="navbar navbar-expand-sm navbar-dark default-bg-color border-bottom border-white">
  <div class="container">
    <a class="navbar-brand" href="{{ route('user.calendar') }}">LOGO</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
      <ul class="nav navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="" role="button" aria-expanded="false">
            Menu1
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="" role="button" aria-expanded="false">
            Menu2
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li>
              <form action="{{ route('logout') }}" name="logout" method="POST">
                @csrf
                <a href="javascript:logout.submit()" class="dropdown-item">ログアウト</a>
              </form>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>