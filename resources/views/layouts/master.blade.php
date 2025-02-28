<!DOCTYPE html>
<html lang="en">
<head>

     <title>Health - Medical Website Template</title>
<!--

Template 2098 Health

http://www.tooplate.com/view/2098-health

-->

     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="Tooplate">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
     <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
     <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
     <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
     <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
     <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="{{ asset('css/tooplate-style.css') }}">
     <style>
        /* Enhanced dropdown styling */
        .dropdown-menu {
            min-width: 300px;
            padding: 12px 0 !important;
            border: none;
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
            border-radius: 8px;
            margin-top: 10px;
        }
        .smoothScroll:hover{
            transform: translate(0, 4px);
            border-bottom: 3px solid #c9df0a;





        }

        .dropdown-header {
            font-size: 12px;
            color: #6c757d !important;
            padding: 8px 20px;
            margin-bottom: 5px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .dropdown-divider {
            margin: 10px 0;
            border-color: #e9ecef;
        }

        .dropdown-item {
            padding: 8px 25px !important;
            font-size: 14px;
            color: #495057 !important;
            transition: all 0.2s ease;
        }

        .dropdown-item:hover {
            background-color: #acbf00 !important;
            color: #28a745 !important;
            transform: translateX(5px);
        }

        @media (max-width: 991px) {
            .dropdown-menu {
                border-radius: 0;
                box-shadow: none;
                margin-top: 0;
            }
        }
        </style>

        <!-- jQuery Script for Hover Functionality -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
        $(document).ready(function() {
            // Desktop hover functionality
            $('.nav-item.dropdown').hover(
                function() {
                    $(this).addClass('show');
                    $(this).find('.dropdown-menu').addClass('show');
                },
                function() {
                    $(this).removeClass('show');
                    $(this).find('.dropdown-menu').removeClass('show');
                }
            );

            // Mobile compatibility
            if ($(window).width() < 992) {
                $('.dropdown-toggle').click(function(e) {
                    e.preventDefault();
                    $(this).parent().toggleClass('show');
                });
            }
        });
        </script>



</head>
<body>

    <!-- Header -->
    @include('elements.header')


    @include('elements.menu')

    <!-- Main Content -->
    <main>
        @yield('main')
    </main>

    <!-- Footer -->
    @include('elements.footer')





    <!-- SCRIPTS -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('js/smoothscroll.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>
