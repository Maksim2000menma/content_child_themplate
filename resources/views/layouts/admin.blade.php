<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>{{ env('APP_DOMAIN') }} - content_child_themplate</title>
    <link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/128/14976/14976443.png">

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ url('/css/admin.css') }}" rel="stylesheet">

    <style>
        table,
        td,
        th {
            word-break: break-all;
        }
    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
              <a class="navbar-brand" href="{{ url('/admin') }}">
                    <b>{{ env('APP_DOMAIN') }}</b> - content_child_themplate
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
					<ul class="navbar-nav ml-auto">
					    @if (auth()->check())
					        <li class="nav-item dropdown">
					            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
					               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					                {{ auth()->user()->name }}
					            </a>

					            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
					                <form method="POST" action="{{ url('/logout') }}" id="logout-form">
					                    <input type="hidden" name="_token" value="{{ request()->session()->token() }}">
					                    <button type="submit" class="dropdown-item">Выйти</button>
					                </form>
					            </div>
					        </li>
					    @endif
					</ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-2">
                        <div class="card">
                            <div class="card-header">Навигация</div>
                            <div class="card-body">
                                <p><b>Страницы</b></p>
                                <p><a href="{{ url('/admin') }}">Главная страница</a></p>
                                <p><a href="{{ url('/admin/posts') }}">Посты</a></p>
                                <p><a href="{{ url('/admin/pages') }}">Страницы</a></p>
                                <p><a href="{{ url('/admin/images') }}">Изображения</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
    </div>


    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script type="text/javascript">
        $('#summernote').summernote({
            height: 400
        });
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>

</html>