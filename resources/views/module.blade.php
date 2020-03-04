<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title>Hello, world!</title>
</head>

<body class="d-flex flex-column small">
  <nav class="navbar navbar-expand-sm navbar-light">
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
      aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          <a href="/admin/site/index" class="nav-link" href="#">
            <i class="fa fa-sitemap" aria-hidden="true"></i>
            站点列表
          </a>
        </li>
        <li class="nav-item">
          <a href="/admin/site/{{site()['id']}}/module" class="nav-link" href="#">
            <i class="fa fa-apple" aria-hidden="true"></i>
            所有应用
          </a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-user"></i>
            {{ auth()->user()['name'] }}
          </a>
          <div class="dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdown">
            <a class="dropdown-item small" href="#" @click.prevent="logout">退出登录</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>

  <div class="d-flex hd flex-fill flex-column flex-md-row">
    <div class="border-right border-top menu shadow-sm">
      <ul class="list-group list-group-flush">
        <a href="" class="list-group-item list-group-item-warning">在线教程</a>
        <a href="" class="list-group-item list-group-item-light">在线教程</a>
        <a href="" class="list-group-item text-secondary">在线教程好学习</a>
        <a href="" class="list-group-item text-secondary">在线教程</a>
        <a href="" class="list-group-item text-secondary">在线教程</a>
      </ul>
    </div>
    <div class="flex-fill ml-2">
      <div class="card rounded-0">
        <div class="card-body rounded-0">
          @yield('content')
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
  </script>
  <style>
    body {
      height: 100vh;
    }

    .hd .menu a {
      text-decoration: none;
    }
  </style>
</body>

</html>
