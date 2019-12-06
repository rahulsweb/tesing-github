<!DOCTYPE html>
<html lang="en">

<head>
   @include('frontend_theme.head.styles')
   @stack('styles')
   <style>
        .btn.btn-primary {
            background: #FE980F;
            border: 0 none;
            border-radius: 0;
            margin-top: 0px;
        }
   </style>
</head>
<!--/head-->

<body>
    @include('frontend_theme.frontend_index.header')
    <!--/header-->

{{-- add section  --}}
    @section('content')
    @show



    @include('frontend_theme.frontend_index.footer')
    <!-- footer -->

   

    @include('frontend_theme.head.scripts')
    @stack('scripts')
 
</body>

</html>


