<!DOCTYPE html>
<html class="supports-animation supports-columns svg no-touch no-ie no-oldie no-ios supports-backdrop-filter as-mouseuser" lang="en-US"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=1024">
    <title>Tienda e-commerce</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="format-detection" content="telephone=no">

    <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./assets/category-landing.css" media="screen, print">

    <link rel="stylesheet" href="./assets/category.css" media="screen, print">

    <link rel="stylesheet" href="./assets/merch-tools.css" media="screen, print">

    <link rel="stylesheet" href="./assets/fonts" media="">
    <style>
        .as-filter-button-text {
            font-size: 26px;
            font-weight: 700;
            color: #333;
        }
        .row.as-fixed-nav {
            border-bottom: 1px solid #ddd;
        }
        .as-producttile-tilehero.with-paddlenav.with-paddlenav-onhover {
            height: 330px;
        }
        .as-footnotes {
            background: #333;
            color: #fff;
            padding: 16px 40px;
        }
    </style>
</head>



<body class="as-theme-light-heroimage">

    <div class="stack">
        
        <div class="as-search-wrapper" role="main">
            <div class="as-navtuck-wrapper">
                <div class="as-l-fullwidth  as-navtuck" data-events="event52">
                    <div>
                        <div class="pd-billboard pd-category-header">
                            <div class="pd-l-plate-scale">
                                <div class="pd-billboard-background">
                                    <img src="./assets/music-audio-alp-201709" alt="" width="1440" height="320" data-scale-params-2="wid=2880&amp;hei=640&amp;fmt=jpeg&amp;qlt=95&amp;op_usm=0.5,0.5&amp;.v=1503948581306" class="pd-billboard-hero ir">
                                </div>
                                <div class="pd-billboard-info">
                                    <h1 class="pd-billboard-header pd-util-compact-small-18">Tienda e-commerce</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div >
            <center>
                <h1>Gracias por tu pago</h1>
                <br>
                <h2>Tu pago se ha realizado satisfactoriamente</h2>
                <br>
                <h3>Datos sobre tu pago:</h3>
                <ul style="text-align: left; width: 30%;">
                    <li><b>ID pago en MP:</b> <?php echo $_GET["collection_id"]; ?></li>
                    <li><b>Estado del pago:</b> <?php echo $_GET["collection_status"]; ?></li>
                    <li><b>Referencia de pago:</b> <?php echo $_GET["external_reference"]; ?></li>
                    <li><b>Tipo de pago:</b> <?php echo $_GET["payment_type"]; ?></li>
                    <li>ID de preferencia: <?php echo $_GET["preference_id"]; ?></li>
                </ul>

                <br>

                <h4><a href="/">Regresar al inicio</a></h4>
                
            </center>          

        </div>
    </div>

    <div role="alert" class="as-loader-text ally" aria-live="assertive"></div>
    <div class="as-footnotes " style="position: fixed; bottom: 0; left: 0; width: 100%;">
        <div class="as-footnotes-content">
            <div class="as-footnotes-sosumi">
                Todos los derechos reservados Tienda Tecno 2018
            </div>
        </div>
    </div>

    <script src="https://www.mercadopago.com/v2/security.js" ></script>

</body>
</html>

