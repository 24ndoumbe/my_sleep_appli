<?php
/**
 * @var \App\View\AppView $this
 */
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->fetch('title'); ?></title>
    <?= $this->Html->css('style'); ?> <!-- Inclure votre CSS global ici -->
    <?= $this->Html->css('default_mq'); ?>
</head>
<body>
    <header>
        <div class="header-left">
            <!-- Logo et lien vers la page d'accueil -->
            <a href="<?= $this->Url->build('/') ?>">
                <?= $this->Html->image('logo.png', ['alt' => 'Logo']); ?>
            </a>
        </div>

        <div class="header-right">
            <?php 
            // Vérifiez si l'utilisateur est connecté via l'objet 'identity'
            $identity = $this->request->getAttribute('identity');
            if ($identity): ?>
                <!-- Si l'utilisateur est connecté, afficher son prénom et nom -->
                <span>
                    Bonjour, <?= h($identity->username) . ' ' . h($identity->nom); ?>
                </span>
                <br>
                <!-- Lien pour se déconnecter -->
                <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'logout']); ?>">Déconnexion</a>
            <?php else: ?>
                <!-- Si l'utilisateur n'est pas connecté, afficher un lien de connexion -->
                <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'login']); ?>">Connexion</a>
            <?php endif; ?>
        </div>

        <!-- Bouton hamburger -->
    <button id="menu-toggle" onclick="toggleMenu()">☰</button>

<!-- Menu -->
< <!-- Menu (caché si l'utilisateur est déconnecté) -->
        <div id="menu" class="<?= $identity ? '' : 'hidden' ?>">
            <h3>Menu</h3>
            <ul>
                <?php foreach ($menus as $menu): ?>
                    <li>
                        <?= $this->Html->link($menu->intitule, $menu->lien) ?>
                    </li>
                <?php endforeach; ?>
               <!-- Ajoutez un lien vers le suivi du sommeil -->
        <li>
            <?= $this->Html->link('Suivi du Sommeil', ['controller' => 'SleepEntries', 'action' => 'index'], ['class' => 'btn btn-primary']) ?>
        </li>
        <!-- Ajoutez un lien vers le résumé hebdomadaire -->
        <li>
            <?= $this->Html->link('Résumé Hebdomadaire', ['controller' => 'WeeklySummaries', 'action' => 'index'], ['class' => 'btn btn-primary']) ?>
        </li>

        <li>
            <?= $this->Html->link('Sieste', ['controller' => 'Naps', 'action' => 'index'], ['class' => 'btn btn-primary']) ?>
        </li>
            </ul>
        </div>
    

    
    </header>

    <!-- Contenu principal de chaque page -->
    <main>
        <?= $this->fetch('content'); ?> <!-- Contenu de la page actuelle -->
    </main>
    
    <script>
    function toggleMenu() {
        const menu = document.getElementById('menu');
        menu.classList.toggle('open'); // Ajoute ou supprime la classe "open"
    }
    </script>


    <footer>
        <p>&copy; <?= date('Y'); ?> Mon Application</p>
    </footer>
</body>
</html>
