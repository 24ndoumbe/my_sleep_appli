

<h1>Entrées de sommeil</h1>

<table>
    <thead>
        <tr>
            <th>Heure de coucher</th>
            <th>Heure de lever</th>
            <th>Sieste</th>
            <th>Forme</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($sleepEntries as $sleepEntry): ?>
        <tr>
            <td><?= h($sleepEntry->sleep_start) ?></td>
            <td><?= h($sleepEntry->sleep_end) ?></td>
            <td><?= h($sleepEntry->nap ? 'Oui' : 'Non') ?></td>
            <td><?= h($sleepEntry->feeling) ?></td>
            <td>
                <?= $this->Html->link('Voir', ['action' => 'view', $sleepEntry->id]) ?>
                <?= $this->Html->link('Éditer', ['action' => 'edit', $sleepEntry->id]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->Html->link('Ajouter une entrée de sommeil', ['action' => 'add']) ?>

