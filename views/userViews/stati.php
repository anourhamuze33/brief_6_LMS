<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord Statistiques</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #0a0e27 0%, #1a1f3a 50%, #0f1419 100%);
            color: #e0e6ed;
            min-height: 100vh;
            padding: 20px;
            position: relative;
            overflow-x: hidden;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 20% 50%, rgba(41, 128, 185, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(52, 152, 219, 0.15) 0%, transparent 50%);
            pointer-events: none;
            z-index: 0;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        header {
            text-align: center;
            margin-bottom: 50px;
            padding: 30px;
            background: linear-gradient(135deg, rgba(20, 30, 48, 0.9), rgba(30, 50, 80, 0.7));
            border-radius: 20px;
            border: 1px solid rgba(52, 152, 219, 0.3);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5), 0 0 20px rgba(52, 152, 219, 0.2);
            position: relative;
            overflow: hidden;
        }

        header::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent 30%, rgba(52, 152, 219, 0.1) 50%, transparent 70%);
            animation: shimmer 3s infinite;
        }

        @keyframes shimmer {
            0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
            100% { transform: translateX(100%) translateY(100%) rotate(45deg); }
        }

        h1 {
            font-size: 3em;
            font-weight: 800;
            background: linear-gradient(135deg, #3498db, #5dade2, #85c1e9);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-shadow: 0 0 30px rgba(52, 152, 219, 0.5);
            margin-bottom: 10px;
            position: relative;
            z-index: 1;
        }

        .subtitle {
            color: #85c1e9;
            font-size: 1.1em;
            font-weight: 300;
            letter-spacing: 2px;
            position: relative;
            z-index: 1;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        .card {
            background: linear-gradient(135deg, rgba(15, 25, 45, 0.95), rgba(25, 40, 65, 0.85));
            border-radius: 20px;
            padding: 30px;
            border: 1px solid rgba(52, 152, 219, 0.4);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.6), 0 0 20px rgba(52, 152, 219, 0.15);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, transparent, rgba(52, 152, 219, 0.1));
            opacity: 0;
            transition: opacity 0.4s;
        }

        .card:hover {
            transform: translateY(-10px);
            border-color: rgba(52, 152, 219, 0.8);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.8), 0 0 40px rgba(52, 152, 219, 0.3);
        }

        .card:hover::before {
            opacity: 1;
        }

        .card-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
        }

        .card-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #2980b9, #3498db);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-right: 15px;
            box-shadow: 0 5px 15px rgba(52, 152, 219, 0.4);
        }

        .card-title {
            font-size: 1em;
            color: #85c1e9;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .card-value {
            font-size: 2.5em;
            font-weight: 800;
            background: linear-gradient(135deg, #ffffff, #85c1e9);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 10px;
            position: relative;
            z-index: 1;
        }

        .card-description {
            color: #7f8c8d;
            font-size: 0.9em;
            position: relative;
            z-index: 1;
        }

        .table-card {
            background: linear-gradient(135deg, rgba(15, 25, 45, 0.95), rgba(25, 40, 65, 0.85));
            border-radius: 20px;
            padding: 30px;
            border: 1px solid rgba(52, 152, 219, 0.4);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.6);
            margin-bottom: 30px;
        }

        .table-title {
            font-size: 1.5em;
            color: #3498db;
            margin-bottom: 20px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        thead {
            background: linear-gradient(135deg, #1e3a5f, #2c5282);
        }

        th {
            padding: 15px;
            text-align: left;
            color: #85c1e9;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.85em;
            letter-spacing: 1px;
            border-bottom: 2px solid rgba(52, 152, 219, 0.5);
        }

        th:first-child {
            border-top-left-radius: 10px;
        }

        th:last-child {
            border-top-right-radius: 10px;
        }

        tbody tr {
            background: rgba(20, 30, 48, 0.5);
            transition: all 0.3s;
        }

        tbody tr:hover {
            background: rgba(52, 152, 219, 0.15);
            transform: scale(1.01);
        }

        td {
            padding: 15px;
            color: #e0e6ed;
            border-bottom: 1px solid rgba(52, 152, 219, 0.2);
        }

        tbody tr:last-child td:first-child {
            border-bottom-left-radius: 10px;
        }

        tbody tr:last-child td:last-child {
            border-bottom-right-radius: 10px;
        }

        .badge {
            display: inline-block;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.85em;
            font-weight: 600;
            background: linear-gradient(135deg, #2980b9, #3498db);
            color: white;
            box-shadow: 0 3px 10px rgba(52, 152, 219, 0.3);
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 2em;
            }

            .dashboard-grid {
                grid-template-columns: 1fr;
            }

            table {
                font-size: 0.85em;
            }

            th, td {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>TABLEAU DE BORD</h1>
            <p class="subtitle">Statistiques & Indicateurs Clés</p>
        </header>

        <div class="dashboard-grid">
            <div class="card">
                <div class="card-header">
                    <div class="card-icon">C</div>
                    <h3 class="card-title">Total Cours</h3>
                </div>
                <div class="card-value"><?= $nbr_total_cour[0]['COUNT(id)'] ?></div>
                <p class="card-description">Nombre total de cours disponibles</p>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="card-icon">U</div>
                    <h3 class="card-title">Total Utilisateurs</h3>
                </div>
                <div class="card-value"><?= $nbr_total_cour[1]['COUNT(id)'] ?></div>
                <p class="card-description">Utilisateurs inscrits sur la plateforme</p>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="card-icon">💎</div>
                    <h3 class="card-title">Total User Inscrit</h3>
                </div>
                <div class="card-value"><?= $nbr_total_cour[6][0]['total_users'] ?></div>
                <p class="card-description">Inscriptions aux cours</p>
            </div>

            <div class="card">
                <div class="card-header">
                    <div class="card-icon">🔥</div>
                    <h3 class="card-title">Cours Populaire</h3>
                </div>
                <div class="card-value"><?= $nbr_total_cour[5][0]['title'] ?></div>
                <p class="card-description">Le cours le plus populaire</p>
            </div>

            <div class="card">
                <div class="card-header">
                    <div class="card-icon">M</div>
                    <h3 class="card-title">Moyenne Sections</h3>
                </div>
                <div class="card-value"><?= $nbr_total_cour[4][0]['avg_sc']  ?></div>
                <p class="card-description">Sections par cours en moyenne</p>
            </div>
        </div>

        <div class="table-card">
            <h2 class="table-title">Total des Inscriptions par cours</h2>
            <table>
                <thead>
                    <tr>
                        <th>Nom du Cours</th>
                        <th>Total inscription</th>
                    </tr>
                </thead>
                <tbody>
<?php foreach($nbr_total_cour[2] as $cour_rank): ?>
                    <tr>
                        <td><?= $cour_rank['title'] ?></td>
                        <td><?= $cour_rank['total_inscriptions'] ?></td>
                    </tr>
<?php endforeach; ?>
                </tbody>
            </table>
        </div>



           <div class="table-card">
            <h2 class="table-title">Les coures populaires</h2>
            <table>
                <thead>
                    <tr>
                        <th>Nom du Cours</th>
                    </tr>
                </thead>
                <tbody>
<?php foreach($nbr_total_cour[3] as $cour_pop): ?>
                    <tr>
                        <td><?= $cour_pop['title'] ?></td>
                    </tr>
<?php endforeach; ?>
                </tbody>
            </table>
        </div>


 <div class="table-card">
            <h2 class="table-title">Cours avec Plus de 5 Sections</h2>
            <table>
                <thead>
                    <tr>
                        <th>Nom du Cours</th>
                        <th>Nombre de Sections</th>
                        <th>Statut</th>
                    </tr>
                </thead>
                <tbody>
<?php foreach($nbr_total_cour[7] as $arr_cour5): ?>
                    <tr>
                        <td><?= $arr_cour5['title'] ?></td>
                        <td><?= $arr_cour5['total_sec'] ?></td>
                        <td><span class="badge">Actif</span></td>
                    </tr>
<?php endforeach;?>
                </tbody>
            </table>
        </div>
        <div class="table-card">
            <h2 class="table-title">Utilisateurs Inscrits cette Année</h2>
            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Date Inscription</th>
                        <th>Cours Suivis</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Sophie Martin</td>
                        <td>sophie.martin@email.com</td>
                        <td>15 Jan 2025</td>
                        <td><span class="badge">3</span></td>
                    </tr>
                    <tr>
                        <td>Ahmed Benali</td>
                        <td>a.benali@email.com</td>
                        <td>08 Fév 2025</td>
                        <td><span class="badge">5</span></td>
                    </tr>
                    <tr>
                        <td>Marie Dubois</td>
                        <td>marie.d@email.com</td>
                        <td>22 Mars 2025</td>
                        <td><span class="badge">2</span></td>
                    </tr>
                    <tr>
                        <td>Thomas Laurent</td>
                        <td>t.laurent@email.com</td>
                        <td>10 Avr 2025</td>
                        <td><span class="badge">4</span></td>
                    </tr>
                    <tr>
                        <td>Fatima El Amrani</td>
                        <td>f.elamrani@email.com</td>
                        <td>05 Mai 2025</td>
                        <td><span class="badge">6</span></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="table-card">
            <h2 class="table-title">Cours Sans Inscription</h2>
            <table>
                <thead>
                    <tr>
                        <th>Nom du Cours</th>
                    </tr>
                </thead>
                <tbody>
<?php foreach($nbr_total_cour[8] as $arr_0sec): ?>
                    <tr>
                        <td><?= $arr_0sec['title'] ?></td>
                    </tr>
<?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="table-card">
            <h2 class="table-title">🔥 Dernières Inscriptions</h2>
            <table>
                <thead>
                    <tr>
                        <th>Utilisateur</th>
                        <th>Cours</th>
                        <!-- <th>Date</th> -->
                        <th>Progression</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Karim Alaoui</td>
                        <td>React & Redux Masterclass</td>
                        <!-- <td>20 Déc 2025</td> -->
                        <td><span class="badge">0%</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>