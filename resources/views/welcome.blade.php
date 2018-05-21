<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body>
     <div id="app">
         {{--<nav class="nav nav-tabs|pills mr-auto nav-stacked float-lg-right">--}}
             {{--<router-link to="/example" class="nav-link">Example</router-link>--}}
             {{--<router-link to="/user" class="nav-link">User</router-link>--}}
         {{--</nav>--}}

         <nav class="nav nav-tabs|pills nav-stacked">
             <router-link to="/example" class="nav-link">Example</router-link>
             <router-link to="/user" class="nav-link">User</router-link>
         </nav>
         <div class="container mt-4">
             {{--<example-component></example-component>--}}
             <router-view></router-view>
         </div>
     </div>
     <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
