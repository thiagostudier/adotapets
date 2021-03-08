<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

    <title><?= isset($data['page']) ? $data['page'] : 'Mundo Pet' ?></title>

    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="icon" href="/img/favico.ico">

    <meta name="viewport" content="width=device-width, user-scalable=no">

    <!-- CSS -->
    <link rel="stylesheet" href="/css/style.css" />
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="/bootstrap-social/css/bootstrap.css" />
    <!-- FONTAWSOME -->
    <link rel="stylesheet" href="/font-awesome/css/font-awesome.css" />
    <!-- SLICK CAROUSEL -->
    <link rel="stylesheet" type="text/css" href="/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="/slick/slick-theme.css" />
    <!-- TOOLTIP -->
    <link rel="stylesheet" type="text/css" href="/tippy/tippy.css" />
    <!-- JQUERY -->
    <script src="/js/jquery.js"></script>
    <script src="/js/jquery-ui.js"></script>
    <!-- JQUERY MASK -->
    <script src="/js/jquery.mask.js"></script>
    <!-- DATATABLE -->
    <link href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet" />

</head>
<body class="h-100 d-flex flex-column">
    <!-- NAVBAR -->
    <?php include __DIR__ . '/includes/navbar.inc.php' ?>
    <!-- end NAVBAR -->

    <div class="full-content">

        <div class="opacity"></div>
        
        <?php include $content; ?>
        
        <!-- FOOTER -->
        <?php include __DIR__ . '/includes/footer.inc.php' ?>
        <!-- end FOOTER -->

    </div>

    <script src="/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="/slick/slick.js"></script>
    <script src="/js/pagination.js"></script>
    <script src="/tippy/tippy.js"></script>
    <!-- DATATABLE -->
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="/js/script.js"></script>
    
</body>
</html>
