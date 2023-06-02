<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">


  <link rel="stylesheet" media="screen" href="https://fontlibrary.org//face/droid-arabic-kufi" type="text/css" />
  <link rel="stylesheet" href="{{asset('css/icofont.min.css')}}" />
  <link rel="stylesheet" href="{{asset('css/design_style.css')}}" />
  <style media="screen">
    .rtl-dashboard .menu-bar {
      margin-right: 12px;
    }

    .rtl-dashboard .menu::-webkit-scrollbar {
      width: 0px;
    }
  </style>
  <title>@yield('title','طلباتك')</title>
  @livewireStyles
  @yield('css')
</head>

<body>