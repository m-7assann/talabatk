<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield("title")</title>

    <!-- Fonts -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Aref+Ruqaa&family=Cairo:wght@200;300;400;500;600;800;900&display=swap"
        rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/256efe1232.js" crossorigin="anonymous"></script>
    <!-- Styles -->
    <style>
        html {
            scroll-behavior: smooth
        }

        body {
            font-family: 'Aref Ruqaa', serif;
            font-family: 'Cairo', sans-serif;
        }
    </style>
    @livewireStyles

    @toastr_css
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'bottom',
            showConfirmButton: false,
            showCloseButton: true,
            timer: 3000,
            timerProgressBar:true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });
    
        window.addEventListener('alert',({detail:{type,message}})=>{
            Toast.fire({
                icon:type,
                title:message
            })
        })
    </script>
    <style>
        .list-item {
            display: inline-block;
            margin-right: 10px;
        }

        .rating {
            color: gold;
        }

        .rating>h5 {
            color: rgb(87, 83, 83);
        }

        .rating:not(:checked)>input {
            display: none;
            cursor: pointer;
        }

        .rating:not(:checked)>label:before {
            content: '★';
        }

        .rating:not(:checked)>label {
            float: left;
            cursor: pointer;
            font-size: 160%;
            color: #ddd;
        }

        .rating:not(:checked)>label:hover,
        .rating:not(:checked)>label:hover~label {
            color: gold;
        }

        .rating>input:checked~label {
            color: gold;
        }

        .like {
            outline: none;
        }
    </style>
    @yield('css')
</head>

<body class="antialiased">
    @include('layout.users.navbar')
    @yield('page-header')
    <div id="app" class=" sm:px-10 md:px-20 lg:px-40">
        @yield('page-main')
    </div>
    @include('layout.users.footer')

    <script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script>
    <script src="{{asset('js/app.js')}}"></script>

    @toastr_js
    @toastr_render
    @livewireScripts
    @yield('js')
</body>

</html>