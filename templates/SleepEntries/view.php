

// templates/SleepEntries/view.php

<h1>Détails de l'entrée de sommeil</h1>

<p><strong>Heure de coucher:</strong> <?= h($sleepEntry->sleep_start) ?></p>
<p><strong>Heure de lever:</strong> <?= h($sleepEntry->sleep_end) ?></p>
<p><strong>Sieste:</strong> <?= h($sleepEntry->nap ? 'Oui' : 'Non') ?></p>
<p><strong>Forme au réveil:</strong> <?= h($sleepEntry->feeling) ?>/10</p>
<p><strong>Commentaire:</strong> <?= h($sleepEntry->comment) ?></p>

<?= $this->Html->link('Retour', ['action' => 'index']) ?>
