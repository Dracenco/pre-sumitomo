@if(Session::has('token'))
<?php $auth = Session::get('token'); ?>
<script>
var token='';
token="<?php echo $auth ?>";
if(token==''){
   window.location="logout";
}
</script>
@endif

<!doctype html>
<html class="no-js" lang="{{ config('app.locale') }}" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title') - Sumitomo Chemical Italia</title>

        <link rel="apple-touch-icon" sizes="57x57" href="{{ URL::asset('/favicon/apple-icon-57x57.png') }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ URL::asset('/favicon/apple-icon-60x60.png') }}') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ URL::asset('/favicon/apple-icon-72x72.png') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ URL::asset('/favicon/apple-icon-76x76.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ URL::asset('/favicon/apple-icon-114x114.png') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ URL::asset('/favicon/apple-icon-120x120.png') }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ URL::asset('/favicon/apple-icon-144x144.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ URL::asset('/favicon/apple-icon-152x152.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ URL::asset('/favicon/apple-icon-180x180.png') }}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{ URL::asset('/favicon/android-icon-192x192.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ URL::asset('/favicon/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{ URL::asset('/favicon/favicon-96x96.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ URL::asset('/favicon/favicon-16x16.png') }}">
        <link rel="manifest" href="{{ URL::asset('/favicon/manifest.json') }}">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="{{ URL::asset('/favicon/ms-icon-144x144.png') }}">
        <meta name="theme-color" content="#ffffff">
        <script src="{{ URL::asset('/js/vendor/jquery.js') }}"></script>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ URL::asset('/css/main.css') }}">
        <script src="{{ URL::asset('/js/ckeditor.js') }}"></script>
		<script type="text/javascript">
        		var utente='';
        		var roles='';
        		var arrayRoles = new Array();

        		if(token!=''){

        			$.ajax({
        				type: "GET",
        				beforeSend: function (request) {
        					request.setRequestHeader("Authorization", "Bearer " + token );
        					request.setRequestHeader("lang", "it");
        				},
        				url: "{{ config('constants.UrlWebService') }}api/Users/GetUserInfo",
        				async:false,
        				success: function (result) {
        					utente=result.firstName + ' ' + result.lastName;
        				},
        				error: function (request, status, errorThrown){}
        			});
        		}

        </script>
    </head>

    <body data-accordion-menu>
        <header id="header-page">
        <div id="logo"><a href="<?php echo url('/'); ?>"></a></div>
        @if($mostra === 'si')
            @include('layout.menu-applicazioni')
        @endif
      </header>

    @yield('content')


    <script src="{{ URL::asset('/js/vendor/what-input.js') }}"></script>
    <script src="{{ URL::asset('/js/vendor/foundation.js') }}"></script>
    <script src="{{ URL::asset('/js/app.js') }}"></script>

    @yield('script')

    @if(Request::is('/'))
        <script src="{{ URL::asset('/js/loghp.js') }}"></script>
    @endif

  </body>
</html>
