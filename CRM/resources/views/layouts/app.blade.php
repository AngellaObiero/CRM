<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

<script src="https://use.fontawesome.com/d3fbe2215a.js"></script>
<link href="./assets/img/brand/favicon.png" rel="icon" type="image/png">
<!-- Fonts -->
<!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"> -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<!-- Icons -->
<link href="{{asset('assets/vendor/nucleo/css/nucleo.css')}}" rel="stylesheet">
<link href="{{asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
<!-- Argon CSS -->
<link href='{{asset("assets/vendor/fullcalendar.css")}}' rel='stylesheet' />
<link href='{{asset("css/fullcalendar.print.css")}}' rel='stylesheet' media='print' />

<link type="text/css" href="{{asset('assets/css/argon.css?v=1.0.0')}}" rel="stylesheet">
<!-- <script src="assets/vendor/jquery/dist/jquery.min.js"></script> -->
<script
  src="https://code.jquery.com/jquery-1.12.4.js"
  integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="
  crossorigin="anonymous"></script>
  <link href="{{asset('assets/css/material-dashboard.css')}}" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    @yield('header')
</head>
<body>
    <div id="app">
            @if(Auth::user()!=null)
      <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
        <!--
          Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

          Tip 2: you can also add an image using data-image tag
      -->
        <div class="logo">

            A+ CRM

        </div>

        <div class="sidebar-wrapper">
          <ul class="nav">

            <li class="nav-item ">
              <a class="nav-link" href="{{url('permissions')}}">
                <i class="material-icons">bubble_chart</i>
                <p>Permissions</p>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="{{url('roles')}}">
                <i class="material-icons">bubble_chart</i>
                <p>Roles</p>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="{{url('users')}}">
                <i class="material-icons">bubble_chart</i>
                <p>Users</p>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="{{url('clients')}}">
                <i class="material-icons">bubble_chart</i>
                <p>customers</p>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="{{url('events')}}">
                <i class="material-icons">location_ons</i>
                <p>Events</p>
              </a>
            </li>
            <!-- <li class="nav-item ">
              <a class="nav-link" href="../resources/views/notifications.blade.php">
                <i class="material-icons">notifications</i>
                <p>Notifications</p>
              </a>
            </li> -->
            <li class="nav-item ">
              <a class="nav-link" href="{{url('sms')}}">
                <i class="material-icons">language</i>
                <p>Messages</p>
              </a>
            </li>
            <li class="nav-item active-pro">



                    <a class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

            </li>
          </ul>
        </div>



      </div>
@endif
      <div class="main-panel">
        <main class="py-4">
          @yield('content')
        </main>
      </div>
    </div>
</body>


<script src="{{asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<!-- Optional JS -->
<script src="{{asset('assets/vendor/chart.js/dist/Chart.min.js')}}"></script>
<script src="{{asset('assets/vendor/chart.js/dist/Chart.extension.js')}}"></script>
<!-- Argon JS -->
<script src="{{asset('assets/js/argon.js?v=1.0.0')}}"></script>

<script src='{{asset("assets/vendor/moment.min.js")}}'></script>
<script src='{{asset("assets/js/events.js")}}'></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script type="text/javascript">
  // window.Vue=require('vue');
new Vue({
      el: '#app',
      date:{

      }
  });

</script>
@yield('scripts')
</html>
