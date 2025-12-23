<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Cours - Mini LMS</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .link {
            z-index: 101;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: linear-gradient(180deg, #0a0e27 0%, #1a1d3d 50%, #000000 100%);
            min-height: 100vh;
            color: #fff;
            overflow-x: hidden;
            position: relative;
        }

        /* Starry Night Background */
        .stars {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: -1;
            overflow: hidden;
        }

        .star {
            position: absolute;
            width: 2px;
            height: 2px;
            background: white;
            border-radius: 50%;
            animation: twinkle 3s infinite;
        }

        @keyframes twinkle {

            0%,
            100% {
                opacity: 0.3;
                transform: scale(1);
            }

            50% {
                opacity: 1;
                transform: scale(1.5);
            }
        }

        .shooting-star {
            position: absolute;
            width: 2px;
            height: 2px;
            background: linear-gradient(90deg, #fff, transparent);
            border-radius: 50%;
            animation: shoot 3s linear infinite;
        }

        @keyframes shoot {
            0% {
                transform: translateX(0) translateY(0);
                opacity: 1;
            }

            100% {
                transform: translateX(-300px) translateY(300px);
                opacity: 0;
            }
        }

        /* Profile Sidebar */
        .profile-sidebar {
            position: fixed;
            right: 0;
            top: 0;
            width: 320px;
            height: 100vh;
            background: rgba(10, 14, 39, 0.85);
            backdrop-filter: blur(20px);
            border-left: 1px solid rgba(79, 172, 254, 0.2);
            padding: 40px 25px;
            z-index: 100;
            overflow-y: auto;
        }

        .profile-header {
            text-align: center;
            margin-bottom: 40px;
            padding-bottom: 30px;
            border-bottom: 1px solid rgba(79, 172, 254, 0.2);
        }

        .profile-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            font-weight: 700;
            margin: 0 auto 20px;
            border: 4px solid rgba(79, 172, 254, 0.3);
            box-shadow: 0 0 40px rgba(79, 172, 254, 0.6);
            animation: glow 3s ease-in-out infinite;
        }

        @keyframes glow {

            0%,
            100% {
                box-shadow: 0 0 40px rgba(79, 172, 254, 0.6);
            }

            50% {
                box-shadow: 0 0 60px rgba(79, 172, 254, 0.9), 0 0 80px rgba(79, 172, 254, 0.5);
            }
        }

        .profile-name {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 5px;
            background: linear-gradient(135deg, #fff 0%, #4facfe 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .profile-email {
            color: rgba(255, 255, 255, 0.5);
            font-size: 14px;
            margin-bottom: 15px;
        }

        .profile-role {
            display: inline-block;
            padding: 6px 16px;
            background: rgba(79, 172, 254, 0.2);
            border: 1px solid rgba(79, 172, 254, 0.4);
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            color: #4facfe;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .profile-stats {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-bottom: 30px;
        }

        .stat-box {
            background: rgba(79, 172, 254, 0.1);
            border: 1px solid rgba(79, 172, 254, 0.2);
            border-radius: 15px;
            padding: 20px 15px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .stat-box:hover {
            background: rgba(79, 172, 254, 0.15);
            border-color: rgba(79, 172, 254, 0.4);
            transform: translateY(-5px);
        }

        .stat-number {
            font-size: 28px;
            font-weight: 700;
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 5px;
        }

        .stat-label {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.6);
            font-weight: 500;
        }

        .profile-menu {
            list-style: none;
        }

        .profile-menu-item {
            margin-bottom: 10px;
        }

        .profile-menu-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 15px;
            border-radius: 10px;
            color: rgba(255, 255, 255, 0.6);
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 14px;
        }

        .profile-menu-link:hover {
            background: rgba(79, 172, 254, 0.1);
            color: #fff;
            transform: translateX(5px);
        }

        .logout-btn {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #ff4444 0%, #cc0000 100%);
            border: none;
            border-radius: 10px;
            color: #fff;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 30px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .logout-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(255, 68, 68, 0.4);
        }

        /* Main Content */
        .main-content {
            margin-right: 320px;
            padding: 50px 60px;
            position: relative;
            z-index: 1;
        }

        .page-header {
            margin-bottom: 50px;
        }

        .page-title {
            font-size: 48px;
            font-weight: 800;
            background: linear-gradient(135deg, #fff 0%, #4facfe 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 10px;
            text-shadow: 0 0 30px rgba(79, 172, 254, 0.3);
        }

        .page-subtitle {
            color: rgba(255, 255, 255, 0.6);
            font-size: 18px;
        }

        /* Courses Grid */
        .courses-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(380px, 1fr));
            gap: 35px;
        }

        .course-card {
            background: rgba(10, 14, 39, 0.7);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(79, 172, 254, 0.2);
            border-radius: 25px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            cursor: pointer;
        }

        .course-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(79, 172, 254, 0.1) 0%, transparent 100%);
            opacity: 0;
            transition: opacity 0.4s ease;
            z-index: 1;
        }

        .course-card:hover::before {
            opacity: 1;
        }

        .course-card:hover {
            transform: translateY(-15px) scale(1.02);
            border-color: rgba(79, 172, 254, 0.6);
            box-shadow: 0 30px 80px rgba(79, 172, 254, 0.4), 0 0 60px rgba(79, 172, 254, 0.2);
        }

        .course-image {
            width: 100%;
            height: 220px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            position: relative;
            overflow: hidden;
        }

        .course-image::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(180deg, transparent 0%, rgba(0, 0, 0, 0.8) 100%);
        }

        .course-badge {
            position: absolute;
            top: 20px;
            left: 20px;
            padding: 8px 16px;
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(79, 172, 254, 0.4);
            border-radius: 25px;
            font-size: 12px;
            font-weight: 700;
            color: #4facfe;
            z-index: 2;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .course-info {
            padding: 30px;
            position: relative;
            z-index: 2;
        }

        .course-title {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 15px;
            color: #fff;
            line-height: 1.4;
        }

        .course-description {
            color: rgba(255, 255, 255, 0.6);
            font-size: 15px;
            margin-bottom: 25px;
            line-height: 1.7;
        }

        .course-meta {
            display: flex;
            gap: 20px;
            margin-bottom: 25px;
            padding-top: 20px;
            border-top: 1px solid rgba(79, 172, 254, 0.2);
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: rgba(255, 255, 255, 0.5);
        }

        .meta-icon {
            font-size: 16px;
        }

        .course-actions {
            display: flex;
            gap: 12px;
        }

        .action-btn {
            flex: 1;
            padding: 14px 20px;
            border: none;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .view-btn {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            color: #fff;
        }

        .view-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(79, 172, 254, 0.5);
        }

        .delete-btn {
            background: rgba(255, 68, 68, 0.1);
            border: 1px solid rgba(255, 68, 68, 0.3);
            color: #ff4444;
        }

        .delete-btn:hover {
            background: linear-gradient(135deg, #ff4444 0%, #cc0000 100%);
            color: #fff;
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(255, 68, 68, 0.4);
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 80px 20px;
            color: rgba(255, 255, 255, 0.4);
        }

        .empty-icon {
            font-size: 80px;
            margin-bottom: 20px;
            opacity: 0.5;
        }

        .empty-title {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 10px;
            color: rgba(255, 255, 255, 0.6);
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .profile-sidebar {
                width: 280px;
            }

            .main-content {
                margin-right: 280px;
            }
        }

        @media (max-width: 968px) {
            .profile-sidebar {
                transform: translateX(100%);
                transition: transform 0.3s ease;
            }

            .profile-sidebar.active {
                transform: translateX(0);
            }

            .main-content {
                margin-right: 0;
            }

            .courses-container {
                grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            }
        }

        @media (max-width: 768px) {
            .main-content {
                padding: 30px 20px;
            }

            .page-title {
                font-size: 36px;
            }

            .courses-container {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <!-- Starry Background -->
    <div class="stars" id="stars"></div>

    <!-- Profile Sidebar -->
    <aside class="profile-sidebar">
        <div class="profile-header">
            <div class="profile-avatar"><?= strtoupper($user['name'][0] . $user['prenom'][0]) ?></div>
            <h2 class="profile-name"><?= $user['name'] ?></h2>
            <p class="profile-email"><?= $user['email'] ?></p>
            <span class="profile-role">Étudiant</span>
        </div>

        <div class="profile-stats">
            <div class="stat-box">
                <div class="stat-number">12</div>
                <div class="stat-label">Cours</div>
            </div>
            <div class="stat-box">
                <div class="stat-number">8</div>
                <div class="stat-label">Complétés</div>
            </div>
            <div class="stat-box">
                <div class="stat-number">47h</div>
                <div class="stat-label">Temps</div>
            </div>
            <div class="stat-box">
                <div class="stat-number">23</div>
                <div class="stat-label">Certificats</div>
            </div>
        </div>

        <ul class="profile-menu">
            <li class="profile-menu-item">
                <a href="index.php" class="profile-menu-link">
                    <span>Courses</span>
                </a>
            </li>
            <li class="profile-menu-item">
                <a href="#" class="profile-menu-link">
                    <span>Sections</span>
                    <span>Mes Cours</span>
                </a>
            </li>
            <li class="profile-menu-item">
                <a href="index.php" class="profile-menu-link">
                    <span>🔍</span>
                    <span>Explorer</span>
                </a>
            </li>
            <li class="profile-menu-item">
                <a href="stati.php" class="profile-menu-link">
                    <span>📊</span>
                    <span>Statistiques</span>
                </a>
            </li>
            <li class="profile-menu-item">
                <a href="sections" class="profile-menu-link">
                    <span>⚙️</span>
                    <span>sections</span>
                </a>
            </li>
        </ul>

        <button class="logout-btn">
            <a class="linkk" href='logout.php'><span>Déconnexion</span></a>
        </button>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <div class="page-header">
            <h1 class="page-title">Mes Cours Inscrits ✨</h1>
            <p class="page-subtitle">Gérez vos cours et continuez votre apprentissage</p>
        </div>
        <div class="courses-container">
            <!-- Course Card 1 -->


            <?php
            if (!empty($cour_enregistrer)) {
                ob_start();
                foreach ($cour_enregistrer as $cour_arr): ?>
                    <div class="course-card">
                        <div class="course-image" src="<?= $cour_arr['img'] ?>" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                            <span class="course-badge">🔥 <?= $cour_arr['level'] ?></span>
                        </div>
                        <div class="course-info">
                            <h3 class="course-title"><?= $cour_arr['title'] ?></h3>
                            <p class="course-description"><?= $cour_arr['description'] ?></p>

                            <div class="course-meta">
                                <div class="meta-item">
                                    <span class="meta-icon"></span>
                                    <span>Prof. Martin</span>
                                </div>
                                <div class="meta-item">
                                    <span>12 heures</span>
                                </div>
                                <div class="meta-item">
                                    <span>45 sections</span>
                                </div>
                            </div>

                            <div class="course-actions">
                                <button class="action-btn view-btn">
                                    <span>Voir les sectiones</span>
                                </button>
                                <button class="action-btn delete-btn">
                                    <span>Retirer</span>
                                </button>
                            </div>
                        </div>
                    </div>
            <?php endforeach;
                $cour_cards = ob_get_clean();
            }
            echo $cour_cards ?? "No cours enregistred";
            ?>

</div>
<a href="index.php" style="text-decoration:none;">
     <button class="action-btn view-btn" style="align-self: center; margin-top:3rem;">
        <span>Enregistrer des coures</span>
    </button>
</a>
    </main>
</body>

</html>