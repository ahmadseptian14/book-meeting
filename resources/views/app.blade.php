<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @routes
  @vite('resources/js/app.js')
  @inertiaHead
  <title>AdminLTE 3 | Dashboard</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="/admin-lte/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="/admin-lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="/admin-lte/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="/admin-lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    @inertia
    <script src="/admin-lte/plugins/jquery/jquery.min.js"></script>
    <script src="/admin-lte/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/admin-lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="/admin-lte/dist/js/adminlte.js"></script>
    <script src="/admin-lte/dist/js/pages/dashboard.js"></script>
</body>
</html>
