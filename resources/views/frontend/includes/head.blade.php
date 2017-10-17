<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>@yield('title', app_name())</title>

<!-- Meta -->
<meta name="description" content="@yield('meta_description', '')">
<meta name="author" content="@yield('meta_author', 'Yi Shen, Wu')">

{{ Html::style(mix('css/app.css')) }}
