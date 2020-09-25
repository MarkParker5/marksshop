<!doctype html>
<html lang="ru">
  <head>
    {{-- Required meta tags --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    {{-- Bootstrap CSS --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">

    <title>@yield('title') • Marks Shop</title>
  </head>
  <body>

    <div id="preloader"><div id="loader"></div></div>

    <header>
      {{-- <div class="container"> --}}
        <nav class="navbar navbar-expand-lg navbar-light shadow-sm">

          {{-- Left side of navbar --}}
          <a class="navbar-brand" href="{{ url('/') }}"><strong>{{ config('app.name', 'Mark`s Shop') }}</strong></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav mr-auto">
              <li class="nav-item {{Request::is('/') ? 'active' : ''}}">
                <a class="nav-link" href="/">Главная</a>
              </li>
              <li class="nav-item {{Request::is('shop') ? 'active' : ''}}">
                <a class="nav-link" href="/shop">Магазин</a>
              </li>
               <li class="nav-item dropdown {{Request::is('category/*') || Request::is('product/*') ? 'active' : ''}}">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{!Request::is('shop') ? ($product->category->name ?? $category->name ?? 'Категории') : 'Категории'}}
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @foreach($categoriesNav as $category)
                      <a class="dropdown-item" href="/category/{{$category->slug}}">{{$category->name}}</a>
                    @endforeach
                    {{-- <div class="dropdown-divider"></div> --}}
                  </div>
                </li>
            </ul>


            {{-- Right side of navbar --}}
            <ul class="navbar-nav">
              <li class="navbar-nav">
                <button type="button" class="nav-link fa-cart" data-toggle="modal" data-target="#exampleModal" id="cart">
                </button>
              </li>
             {{--  Authentication Links --}}
              @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Вход') }}</a>
                    </li>
              @else
                  <li class="nav-item dropdown">
                      <a id="navbarDropdownUser" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"opup="true" aria-expanded="false" v-pre>
                          {{ Auth::user()->name }} <span class="caret"></span>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownUser">
                          <a class="dropdown-item" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
                          </a>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
                      </div>
                  </li>
              @endguest
              </ul>
          </div>

        </nav>
     {{--  </div> --}}
    </header>


    @yield('content')


    <br>
    <footer class="text-center mt-5"><p>© Mark`s Shop</p></footer>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Корзина</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            @include('shop._cart')
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
            <a class="btn btn-primary" href="/checkout">Оформить заказ</a>
            <button type="button" class="btn btn-danger clear-cart">Очистить корзину</button>
          </div>
        </div>
      </div>
    </div>


    {{-- Optional JavaScript --}}
    
    <script src="{{asset("/js/app.js")}}"></script>

    {{-- Bootstrap --}}
   {{--  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script> --}}
    {{-- /Bootstrap --}}
    
    {{-- jQuery first, then Popper.js, then Bootstrap JS --}}
  </body>
</html>