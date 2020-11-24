<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title',site()['title'])</title>
  <link href="/modules/Edu/app.css" rel="stylesheet">
  <link href="https://cdn.bootcdn.net/ajax/libs/font-awesome/5.13.1/css/all.min.css" rel="stylesheet">
  @stack('styles')
  @stack('links')
</head>

<body>
  <div class="front">
    @include('edu::front.layouts._header')
    <div class="container mt-3 mb-5 p-sm-1">
      <div class="row">
        <div class="col-12 col-sm-9 mb-3">
          @include('layouts._message')
          @yield('content')
        </div>
        <div class="col-sm-3 col-12">
          @include('edu::layouts._user_rec')
          <div class="card rounded shadow-sm bg-white mt-2">
            <div class="card-body p-0">
              <div class="list-group list-group-flush">
                <a href="{{ route('Edu.space.topic',$user) }}"
                   class="list-group-item list-group-item-action text-secondary ">
                  TA的贴子
                </a>
                <a href="{{ route('Edu.space.follower',$user) }}"
                   class="list-group-item list-group-item-action text-secondary">
                  TA的关注
                </a>
                <a href="{{ route('Edu.space.fans',$user) }}"
                   class="list-group-item list-group-item-action text-secondary">
                  TA的粉丝
                </a>
                <a href="{{ route('Edu.space.lesson',$user) }}"
                   class="list-group-item list-group-item-action text-secondary">
                  TA的收藏
                </a>
                <a href="{{ route('Edu.space.learn',$user) }}"
                   class="list-group-item list-group-item-action text-secondary">
                  TA学习历史
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @include('edu::front.layouts._footer')
  </div>
  @stack('scripts')
  <script src="/modules/Edu/app.js"></script>
</body>

</html>
