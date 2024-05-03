<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Cake.Time</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <x-link-files-component />
</head>

<body>
    <x-header-component />

    <x-sidebar-component />

    <!-- ======= #main ======= -->
    <main id="main" class="main">

        {{ $slot }}

    </main><!-- End #main -->


    <x-js-files-component />
</body>

</html>