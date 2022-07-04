
<?php 


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $titlePage ;?> - Quản trị website</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ;?>/public/assets/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ;?>/public/assets/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ;?>/public/assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ;?>/public/assets/admin/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ;?>/public/assets/admin/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ;?>/public/assets/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ;?>/public/assets/admin/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ;?>/public/assets/admin/plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- style.css -->
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ;?>/public/assets/admin/css/style.css?ver=<?php rand(); ?>">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <?php 
        /* Load Header */
        $this->loadView("blocks/header");
        /* Load Header */
        $this->loadView("blocks/sidebar");
        /* Load BreadCrumb */
        $this->loadView("blocks/breadcrumb", $titlePage);
        /* Load content */
        if(isset($dataPage)) {
            $this->loadView($page, $dataPage);
        }else {
            $this->loadView($page);
        }
        /* Load footer */
        $this->loadView("blocks/footer");
    ?>
</body>
    <script type="text/script" src="<?php echo _WEB_ROOT ;?>/public/assets/admin/js/custom.js"></script>
</html>