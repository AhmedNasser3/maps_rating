<!DOCTYPE html>
<html dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- عنوان الصفحة -->
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- تضمين مكتبة jQuery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <!-- تضمين الخطوط -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- تضمين ملفات CSS و JavaScript باستخدام Vite -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- تضمين ملف CSS مخصص -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        <!-- تضمين أنماط Livewire -->
        @livewireStyles

        <!-- تضمين خطوط Google -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@400;500;600&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- تضمين ملفات CSS إضافية -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}" >
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- تضمين مكتبة Leaflet للخرائط -->
        <link
    rel="stylesheet"
    href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha512-Zcn6bjR/8RZbLEpLIeOwNtzREBAJnUKESxces60Mpoj+2okopSAcSUIUOseddDm0cxnGQzxIR7vJgsLZbdLE3w=="
    crossorigin="" />

        <!-- تضمين مكتبة Font Awesome للأيقونات -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- تضمين أنماط Livewire -->
        @livewireStyles

    </head>
    <body class="font-sans antialiased">

        <!-- مكون البانر -->
        <x-banner />

        <div class="min-h-screen bg-gray-100">

            <!-- مكون قائمة التنقل -->
            @livewire('navigation-menu')

            <!-- رأس الصفحة إذا كان موجودًا -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- محتوى الصفحة الرئيسي -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <!-- مكدس النوافذ المنبثقة -->
        @stack('modals')

        <!-- تضمين سكريبتات Livewire -->
        @livewireScripts

        <!-- سكريبت لجلب العناوين تلقائيًا -->
        <script>
        $(function(){
            // عند إدخال نص في حقل العنوان
            $('#address').on('keyup', function() {
                var address = $(this).val();
                $('#address-list').fadeIn();

                // تنفيذ طلب AJAX للحصول على اقتراحات العناوين
                $.ajax({
                    url: "{{ route('auto-complete') }}",
                    type: "GET",
                    data: {"address" : address }
                }).done(function(data) {
                    // عرض البيانات في القائمة
                    $("#address-list").html(data);
                });
            });

            // عند اختيار عنوان من القائمة
            $('#address-list').on('click', 'li', function(){
                $('#address').val($(this).text());
                $('#address-list').fadeOut();
            });
        });
        </script>

    </body>
</html>
