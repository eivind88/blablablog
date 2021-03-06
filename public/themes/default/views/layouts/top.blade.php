<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="referrer" content="no-referrer">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    @if (config('b3_config.description') !== '')
      <meta name="description" content="{{config('b3_config.description')}}">
    @endif
    @if (config('b3_config.user') !== '')
      <meta name="author" content="{{config('b3_config.user')}}">
    @endif

    @if (isset($results->currentPage))
      @if ($results->currentPage() === 1)
        <link rel="next" href="{{Request::url()}}?page={{$results->currentPage()+1}}" />
      @elseif ($results->currentPage() === $results->lastPage())
        <link rel="prev" href="{{Request::url()}}{{$results->currentPage()===2?'':$results->currentPage()-1}}" />
      @else
        <link rel="prev" href="{{Request::url()}}{{$results->currentPage()===2?'':$results->currentPage()-1}}" />
        <link rel="next" href="{{Request::url()}}?page={{$results->currentPage()+1}}" />
      @endif
    @endif

    <title>{{isset($page_title) && $page_title !=='' ? $page_title : ''}}{{(isset($page_title) && $page_title !=='') && (isset($page_type) && $page_type !=='') ? ' - ' : ''}}{{isset($page_type) && $page_type !=='' ? $page_type : ''}}{{(isset($page_title) && $page_title !=='') || (isset($page_type) && $page_type !=='') ? ' | ' : ''}}{{config('b3_config.site-name')}}</title>

    @if (config('b3_config.keywords') !== '')
      <meta name="keywords" content="
      @if (isset($keywords)) @foreach ($keywords as $keyword)
        {{$keyword}},
      @endforeach @endif
      @foreach (config('b3_config.keywords') as $keyword)
        {{$keyword}},
      @endforeach">
    @endif

    <!-- Theme CSS -->
    <link href="/themes/{{config('b3_config.theme')}}/assets/dist/styles/style.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Icons -->
    <link rel="icon" href="/themes/{{config('b3_config.theme')}}/assets/dist/styles/icons/favicon.ico">

    <link rel="apple-touch-icon" sizes="57x57" href="/themes/{{config('b3_config.theme')}}/assets/dist/styles/icons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/themes/{{config('b3_config.theme')}}/assets/dist/styles/icons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/themes/{{config('b3_config.theme')}}/assets/dist/styles/icons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/themes/{{config('b3_config.theme')}}/assets/dist/styles/icons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/themes/{{config('b3_config.theme')}}/assets/dist/styles/icons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/themes/{{config('b3_config.theme')}}/assets/dist/styles/icons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/themes/{{config('b3_config.theme')}}/assets/dist/styles/icons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/themes/{{config('b3_config.theme')}}/assets/dist/styles/icons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/themes/{{config('b3_config.theme')}}/assets/dist/styles/icons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/themes/{{config('b3_config.theme')}}/assets/dist/styles/icons/android-icon-192x192.png">

    <link rel="icon" type="image/png" sizes="32x32" href="/themes/{{config('b3_config.theme')}}/assets/dist/styles/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/themes/{{config('b3_config.theme')}}/assets/dist/styles/icons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/themes/{{config('b3_config.theme')}}/assets/dist/styles/icons/favicon-16x16.png">

    <meta name="msapplication-TileImage" content="/themes/{{config('b3_config.theme')}}/assets/dist/styles/icons/ms-icon-144x144.png">

    <meta name="theme-color" content="#ffffff">
    <meta name="msapplication-TileColor" content="#ffffff">
    <link rel="manifest" href="/themes/{{config('b3_config.theme')}}/assets/dist/styles/icons/manifest.json">

    <meta property="og:title" content="{{isset($page_title) && $page_title !=='' ? $page_title : $page_type}}">
    <meta property="og:description" content="{{isset($body) ? getDescription($body) : ''}}{{!isset($body) && isset ($page_type) ? $page_type . ' - ' . config('b3_config.description') : config('b3_config.description')}}">
    @if (isset($cover) || isset($body) && getFirstImage($body))
      <meta property="og:image" content="{{url()}}{{$cover ? $cover : getFirstImage($body)}}">
    @else
      <meta property="og:image" content="{{url()}}/themes/{{config('b3_config.theme')}}/assets/dist/styles/gfx/default.png">
    @endif
    <meta property="og:url" content="{{Request::url()}}">
    <meta property="og:site_name" content="{{config('b3_config.site-name')}}">

    <meta name="twitter:title" content="{{isset($page_title) && $page_title !=='' ? $page_title : $page_type}}">
    <meta name="twitter:description" content="{{isset($body) ? getDescription($body) : ''}}{{!isset($body) && isset ($page_type) ? $page_type . ' - ' . config('b3_config.description') : config('b3_config.description')}}">
    @if ((isset($cover) && $cover !== '') || (isset($body) && getFirstImage($body) !== ''))
      <meta property="og:image" content="{{url()}}{{$cover ? $cover : getFirstImage($body) }}">
    @else
      <meta property="og:image" content="{{url()}}/themes/{{config('b3_config.theme')}}/assets/dist/styles/gfx/default.png">
    @endif
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="{{config('b3_config.twitter')}}">

    @if (getenv('APP_ENV') !== 'local')
       {{documentHead()}}
    @endif

  </head>

  <body class="{{ config('b3_config.status') != 'live' ? 'status' : ''}} {{ isset($style) && $style == 'light' ? 'light-bg' : ''}} {{ isset($style) && $style == 'dark' ? 'dark-bg' : ''}} {{ isset($page) && $page->type == 'index' ? 'index-bg' : ''}}">
  @if (isset($bg) && $bg !== '' && $bg !== '0')
      <img class="background" alt="background-image" src="{{ $bg }}" />
  @endif
