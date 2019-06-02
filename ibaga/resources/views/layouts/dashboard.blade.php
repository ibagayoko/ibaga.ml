<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Meta -->
    @stack('meta')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>@yield('title') - iBaga.ml</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Merriweather:300,400,700,900" rel="stylesheet">

    <!-- HighlightJS scripts -->
    <script src="https://cdn.jsdelivr.net/gh/highlightjs/cdn-release@9.13.1/build/highlight.min.js"></script>

    <!-- HighlightJS sheets -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/highlightjs/cdn-release@9.13.1/build/styles/github.min.css">

    <!-- Bootstrap 4 sheets -->
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"> --}}

    <!-- Medium-Zoom scripts -->
    {{-- <script src="https://unpkg.com/medium-zoom@0/dist/medium-zoom.min.js"></script> --}}

    <!-- Bootstrap 4 scripts -->
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" ></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script> --}}
    
    {{-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> --}}
{{-- <link rel="stylesheet" href="http://tabler-react.com/static/css/main.7357ccf6.chunk.css"> --}}
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/c3/0.7.0/c3.css" />  --}}

<link rel="stylesheet" href="{{ asset('assets/css/plugins.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/bundle.css') }}">
<!-- FontAwesome scripts -->
{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext"> --}}
    
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
    {{-- <script defer src="https://use.fontawesome.com/releases/v5.7.1/js/all.js" integrity="sha384-eVEQC9zshBn0rFj4+TU78eNA19HMNigMviK/PU/FFjLXqa/GKPgX58rvt5Z8PLs7" crossorigin="anonymous"></script> --}}
        <!-- Scripts -->
        {{-- <script src="https://momentjs.com/downloads/moment.js"></script> --}}
        <script src="{{ asset('assets/js/manifest.js') }}" defer></script>
        <script src="{{ asset('assets/js/vendor.js') }}" defer></script>
        <script src="{{ asset('assets/js/app.js') }}" defer></script>
        
    <!-- Additional style sheets -->
    @stack('styles')
    <style>
    [v-cloak] {
        display:none
    }
    </style>
</head>
<body style="overflow-x: hidden">
    @php
        $links = $linksName =[]
    @endphp
 
    <div id="app">
        <site-wrapper v-cloak>
                <template v-slot:header>
                    @yield('header', View::make('components.site.header'))
                </template>
                <template #nav >
                    @yield('nav', menu('home', 'components.site.navbar' ))
                    {{-- View::make('components.site.navbar', compact('menu'))) --}}
                </template>

                @yield("content")

                <template  slot="footer">
                    @yield('footer', View::make('components.site.footer', compact("links", "linksName")))
                </template>
        </site-wrapper>

</div>
 <!-- Additional scripts -->

 @stack('scripts')
<script>
document.addEventListener('DOMContentLoaded', function(){ 
        $(document).ready(function() {
      $('#example').DataTable();
  } );
}, false)
      </script>
</body>
</html>