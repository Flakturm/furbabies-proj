<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
</script>

<title>@yield('title', app_name())</title>

<!-- Meta -->
<meta name="description" content="@yield('meta_description', '')">
<meta name="author" content="@yield('meta_author', 'Yi Shen, Wu')">

{{ Html::style(mix('frontend/css/app.css')) }}
<script src="http://maps.google.com/maps/api/js?key=AIzaSyCaxXMj_bujGTv2PQIQBObyX1-VPbPg4Pk" charset="utf-8"></script>
