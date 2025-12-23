<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription Étudiant</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            padding: 20px;
            position: relative;
            overflow-x: hidden;
            overflow-y: auto;
        }

        body::before {
            content: '';
            position: absolute;
            width: 500px;
            height: 500px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            top: -250px;
            right: -250px;
            animation: float 6s ease-in-out infinite;
        }

        body::after {
            content: '';
            position: absolute;
            width: 400px;
            height: 400px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            bottom: -200px;
            left: -200px;
            animation: float 8s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0) rotate(0deg);
            }

            50% {
                transform: translateY(-20px) rotate(180deg);
            }
        }

        .container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 50px 40px;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 500px;
            max-height: 90vh;
            overflow-y: auto;
            position: relative;
            z-index: 1;
            animation: slideUp 0.6s ease-out;
            margin: 20px 0;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo-circle {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            box-shadow: 0 10px 25px rgba(79, 172, 254, 0.4);
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }
        }

        .logo-circle svg {
            width: 40px;
            height: 40px;
            fill: white;
        }

        h1 {
            color: #333;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .subtitle {
            color: #666;
            font-size: 14px;
            margin-bottom: 30px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: 600;
            font-size: 14px;
        }

       input  {
            width: 100%;
            padding: 15px 20px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 15px;
            transition: all 0.3s ease;
            background: white;
        }

        input:focus {
            outline: none;
            border-color: #4facfe;
            box-shadow: 0 0 0 4px rgba(79, 172, 254, 0.1);
            transform: translateY(-2px);
        }

        input:hover {
            border-color: #b3b3b3;
        }

        .btn {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(79, 172, 254, 0.4);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(79, 172, 254, 0.6);
        }

        .btn:active {
            transform: translateY(0);
        }

        .divider {
            text-align: center;
            margin: 30px 0;
            position: relative;
        }

        .divider::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            width: 100%;
            height: 1px;
            background: #e0e0e0;
        }

        .divider span {
            background: rgba(255, 255, 255, 0.95);
            padding: 0 15px;
            color: #999;
            font-size: 14px;
            position: relative;
            z-index: 1;
        }

        .login-link {
            text-align: center;
            color: #666;
            font-size: 14px;
        }

        .login-link a {
            color: #4facfe;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .login-link a:hover {
            color: #00f2fe;
            text-decoration: underline;
        }

        .password-strength {
            margin-top: 5px;
            font-size: 12px;
            color: #666;
        }

        @media (max-width: 600px) {
            .form-row {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .container {
                padding: 40px 30px;
            }

            h1 {
                font-size: 24px;
            }
        }
        /* Insane Error Styling */
/* Small Error Styling */
.errors {
    background: linear-gradient(135deg, #ebc9c9ff, #e1aaaaff);
    border: 1px solid #ff0000;
    border-radius: 6px;
    padding: 4px 8px;
    margin: 3px 0;
    box-shadow: 0 2px 6px rgba(255, 0, 0, 0.2);
    animation: shake 0.5s ease-in-out;
    position: relative;
    overflow: hidden;
}

.errors p {
    color: #fff;
    font-weight: 600;
    font-size: 10px;
    margin: 0;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
}

.errors::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.1), transparent);
    transform: rotate(45deg);
    animation: shine 3s infinite;
}

@keyframes shake {
    0%, 100% { transform: translateX(0); }
    10%, 30%, 50%, 70%, 90% { transform: translateX(-2px); }
    20%, 40%, 60%, 80% { transform: translateX(2px); }
}

@keyframes shine {
    0% { transform: translateX(-100%) rotate(45deg); }
    100% { transform: translateX(100%) rotate(45deg); }
}
    </style>
</head>

<body>
    <div class="container">
        <div class="logo">
            <div class="logo-circle">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z" />
                </svg>
            </div>
            <h1>Inscription Étudiant</h1>
            <p class="subtitle">Créez votre compte en quelques secondes</p>
        </div>

        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" novalidate>
            <div class="form-row">
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="user_nom" value="<?= htmlspecialchars($user['user_nom'] ?? '')?>" placeholder="Votre nom" required>
                </div>

                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <input type="text" id="prenom" name="user_prenom" value="<?= htmlspecialchars($user['user_prenom'] ?? '')?>" placeholder="Votre prénom" required>
                </div>
            </div>

            <div class="form-group">
                <label for="email">Email Gmail</label>
                <input type="email" id="email" name="user_email" value="<?= htmlspecialchars($user['user_email'] ?? '')?>" placeholder="votre-email@gmail.com" required>
                <?php if (!empty($errors['email'])): ?>
                    <div class="errors">
                        <p style="color:red"><?= htmlspecialchars($errors['email']) ?></p>
                    </div>
                <?php endif; ?>
                <?php if (!empty($errors['validemail'])): ?>
                    <div class="errors">
                        <p style="color:red"><?= htmlspecialchars($errors['validemail']) ?></p>
                    </div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="username">Nom d'utilisateur</label>
                <input type="text" id="username" name="user__name" value="<?= htmlspecialchars($errors['user__name'] ?? '')?>" placeholder="Choisissez un nom d'utilisateur" required>
            </div>

            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="user_password" placeholder="Créez un mot de passe" required>
                <p class="password-strength">Utilisez au moins 8 caractères avec lettres et chiffres</p>
            </div>
            <?php if (!empty($errors['passwordlengh'])): ?>
                <div class="errors">
                    <p style="color:red"><?= htmlspecialchars($errors['passwordlengh']) ?></p>
                </div>
            <?php endif; ?>
            <?php if (!empty($errors['passwordupercase'])): ?>
                <div class="errors">
                    <p style="color:red"><?= htmlspecialchars($errors['passwordupercase']) ?></p>
                </div>
            <?php endif; ?>

            <div class="form-group">
                <label for="confirm-password">Confirmer le mot de passe</label>
                <input type="password" id="confirm-password" name="confirm_password" placeholder="Confirmez votre mot de passe" required>
            </div>
            <?php if (!empty($errors['confirm'])): ?>
                <div class="errors">
                    <p style="color:red"><?= htmlspecialchars($errors['confirm']) ?></p>
                </div>
            <?php endif; ?>
            <button type="submit" name="user_ajout" class="btn">S'inscrire</button>
        </form>

        <div class="divider">
            <span>OU</span>
        </div>

        <div class="login-link">
            Vous avez déjà un compte ? <a href="../../profile.php">Connectez-vous</a>
        </div>

    </div>
</body>

</html>