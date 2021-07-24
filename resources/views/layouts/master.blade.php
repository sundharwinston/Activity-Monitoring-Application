<!DOCTYPE html>
<html>
    @includeIf('layouts.headerScript')
    <body class="hold-transition skin-green-light">
        <div class="wrapper">
            <!-- header -->
            @includeIf('layouts.header')
        <!-- color for side bar -->

            <!-- Nav Bar -->
            @includeIf('layouts.navbar')
            <!-- Content -->
                <div class="content-wrapper">
                    <section class="content-header">
                        @yield('BreadCrumb')
                    </section>
                    <section class="content">
                        @includeIf('layouts.errors')
                        @yield('content')

                    </section>
                </div>
            <!-- End Content -->

            <!-- Footer -->
            @includeIf('layouts.footer')

        <!-- End Footer -->
        </div>
    </body>
</html>