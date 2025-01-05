

// templates/Naps/index.php

<h1>Siestes</h1>

<table>
    <thead>
        <tr>
            <th>Heure de début</th>
            <th>Heure de fin</th>
            <th>Type de sieste</th>
            <th>Durée (en minutes)</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($naps as $nap): ?>
        <tr>
            <td><?= h($nap->start_time) ?></td>
            <td><?= h($nap->end_time) ?></td>
            <td><?= h($nap->nap_type) ?></td>
            <td><?= h($nap->duration) ?> min</td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->Html->link('Ajouter une sieste', ['action' => 'add']) ?>

