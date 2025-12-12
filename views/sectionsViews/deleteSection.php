<?php
$title = "Suprimmer une section";
$form = '';
ob_start();
?>
    <div class="course-header">
        <div class="course-name"><?= $result['title'] ?></div>
    </div>
    <p class="textt">conffirmer la suppression de cette section</p>
    <?php echo '<div class="sections-grid">' ?>
        <!-- //!!!!!!!!!!!!!!!!!!!! -->
        <div class="section-card">
            <?php
            if ($section["position"] < 10) {
                echo    '<div class="section-number">0' . $section["position"] . ' </div>';
            } else {
                echo    '<div class="section-number">' . $section["position"] . ' </div>';
            }
            ?>
            <div class="section-header">
                <p class="section-description" style="font-size: 2rem; font-weight:bold"><?= $section["title"] ?></p>
                <div class="section-badge">
                    <span><?= $section["niveau"] ?></span>
                </div>
                <p class="section-description" style="font-weight: bold">
                    <?= $section["content"] ?>
                </p>
            </div>
            <div class="section-meta">
                <div class="meta-item">
                    <div class="meta-icon">⏱</div>
                    <span><?= $section["duree"] ?></span>
                </div>
                <div class="meta-item">
                    <span>12 leçons</span>
                </div>
                <div class="meta-item">
                    <span>2.4k étudiants</span>
                </div>
            </div>

            <div class="section-footer">
                <div class="progress-bar">
                    <div class="progress-fill" style="width: 10%"></div>
                </div>
                <span class="progress-text">0%</span>
            </div>
            <div class="btn-container">
                <a href="affichage_section.php?affich=<?= $id ?>" class="btn-edit-sec">
                    Canale
                </a>
                <a href="index.php?section_action=deleted_section&delete_section=<?= $deleted_id ?>&affich=<?= $id ?>" class="btn-delete-sec">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="3 6 5 6 21 6"></polyline>
                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                    </svg>
                    Delete
                </a>
            </div>
        </div>
    <?php
    echo "</div>"
?>
<?php $cards = ob_get_clean();
include_once "views/courVews/cadre.php";
?>