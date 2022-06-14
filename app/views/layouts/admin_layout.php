<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="<?php echo _WEB_ROOT ;?>/public/assets/admin/css/style.css">
    <title><?php echo $titlePage; ?></title>
</head>
<body>
    
    <?php 
        /* Load Header */
        $this->loadView("blocks/header");
        /* Load content */
        $this->loadView($page, $dataPage);
        /* Load footer */
        $this->loadView("blocks/footer");
    ?>
</body>
    <script type="text/script" src="<?php echo _WEB_ROOT ;?>/public/assets/admin/js/custom.js"></script>
</html>