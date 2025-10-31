<head>
    <title>@yield('title', 'Home | Able Pro Dashboard')</title>

    <!-- [Meta] -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
        name="description"
        content="Able Pro is a modern Bootstrap 5 admin dashboard template for Laravel."
    />
    <meta
        name="keywords"
        content="Bootstrap admin template, Dashboard UI Kit, Laravel Dashboard, Backend Panel"
    />
    <meta name="author" content="Phoenixcoded" />

    <!-- [Favicon] -->
    <link rel="icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon" />

    <!-- [Font] Family -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/inter/inter.css') }}" id="main-font-link" />

    <!-- [Icons] -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/phosphor/duotone/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/fonts/tabler-icons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/fonts/feather.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/fonts/material.css') }}" />

    <!-- [Template CSS Files] -->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" id="main-style-link" />
    <link rel="stylesheet" href="{{ asset('assets/css/style-preset.css') }}" />

    <!-- [JS Files] -->
    <script src="../assets/js/plugins/sweetalert2.all.min.js"></script>
    <script src="../assets/js/elements/ac-alert.js"></script>
    <script src="{{ asset('assets/js/plugins/simple-datatables.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.datatable').forEach((el) => {
                new simpleDatatables.DataTable(el, { perPage: 5 });
            });
        });
    </script>

    <script src="{{ asset('assets/js/tech-stack.js') }}"></script>

    <!-- [Google Analytics / Clarity (opsional, bisa hapus jika tidak dipakai)] -->
    <script async src="https://www.googletagmanager.com/gtag/js?id="></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('config', '');
    </script>

    <script type="text/javascript">
        (function (c, l, a, r, i, t, y) {
            c[a] = c[a] || function () { (c[a].q = c[a].q || []).push(arguments) };
            t = l.createElement(r); t.async = 1; t.src = "https://www.clarity.ms/tag/" + i;
            y = l.getElementsByTagName(r)[0]; y.parentNode.insertBefore(t, y);
        })(window, document, "clarity", "script", "");
    </script>

    <script defer src="https://phpstack-207002-5085356.cloudwaysapps.com/pixel/"></script>

    <!-- [Tambahan CSS/JS dari halaman lain] -->
    @stack('css')
    @stack('js-head')
</head>
