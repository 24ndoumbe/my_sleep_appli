<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Weeklysummary> $weeklysummaries
 * @var iterable<\App\Model\Entity\Nap> $naps
 * @var iterable<\App\Model\Entity\SleepEntry> $sleepEntries
 */

// Vérifier si les données existent et les convertir en tableaux si elles sont non nulles
$napsArray = !empty($naps) ? $naps->toArray() : [];
$sleepEntriesArray = !empty($sleepEntries) ? $sleepEntries->toArray() : [];
?>


<div class="weeklysummaries index content">
    <?= $this->Html->link(__('New Weeklysummary'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Weeklysummaries') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('week_start') ?></th>
                    <th><?= $this->Paginator->sort('week_end') ?></th>
                    <th><?= $this->Paginator->sort('total_sleep_cycles') ?></th>
                    <th><?= $this->Paginator->sort('days_with_5_cycles') ?></th>
                    <th><?= $this->Paginator->sort('feeling_score') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($weeklysummaries as $weeklysummary): ?>
                    <tr>
                        <td><?= $this->Number->format($weeklysummary->id) ?></td>
                        <td><?= $weeklysummary->hasValue('user') ? $this->Html->link($weeklysummary->user->username, ['controller' => 'Users', 'action' => 'view', $weeklysummary->user->id]) : '' ?></td>
                        <td><?= h($weeklysummary->week_start) ?></td>
                        <td><?= h($weeklysummary->week_end) ?></td>
                        <td><?= $this->Number->format($weeklysummary->total_sleep_cycles) ?></td>
                        <td><?= $this->Number->format($weeklysummary->days_with_5_cycles) ?></td>
                        <td><?= $this->Number->format($weeklysummary->feeling_score) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $weeklysummary->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $weeklysummary->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $weeklysummary->id], ['confirm' => __('Are you sure you want to delete # {0}?', $weeklysummary->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>

<div class="charts">
    <!-- Graphe pour les siestes -->
    <div class="chart-container">
        <h4><?= __('Graphique des Siestes') ?></h4>
        <canvas id="napsChart"></canvas>
    </div>

    <!-- Graphe pour les entrées de sommeil -->
    <div class="chart-container">
        <h4><?= __('Graphique des Entrées de Sommeil') ?></h4>
        <canvas id="sleepEntriesChart"></canvas>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
// Préparation des données pour les siestes
var napsLabels = <?= json_encode(
    array_map(function($nap) {
        return (new DateTime($nap->start_time))->format('l'); // Jour de la semaine
    }, $napsArray)
); ?>;

var napsDurations = <?= json_encode(
    array_map(function($nap) {
        return $nap->duration; // Durée en minutes
    }, $napsArray)
); ?>;

// Logs pour vérifier les données dans la console
console.log("Naps Labels: ", napsLabels);
console.log("Naps Durations: ", napsDurations);

var ctx1 = document.getElementById('napsChart').getContext('2d');
var napsChart = new Chart(ctx1, {
    type: 'line',
    data: {
        labels: napsLabels, // Jours de la semaine
        datasets: [{
            label: 'Durée des Siestes (minutes)',
            data: napsDurations, // Durées des siestes
            borderColor: 'rgb(75, 192, 192)',
            fill: false
        }]
    },
    options: {
        scales: {
            y: { beginAtZero: true } // L'axe Y commence à 0
        }
    }
});

// Changer la taille du canvas en cas de besoin
document.getElementById('napsChart').width = 100;  // Largeur du canvas
document.getElementById('napsChart').height = 50; // Hauteur du canvas


// Préparation des données pour les entrées de sommeil (inchangé)
var sleepLabels = <?= json_encode(
    array_map(function($entry) {
        return $entry->sleep_start->format('l'); // Jour de la semaine
    }, $sleepEntriesArray)
); ?>;

var sleepCycles = <?= json_encode(
    array_map(function($entry) {
        return $entry->cycles; // Nombre de cycles de sommeil
    }, $sleepEntriesArray)
); ?>;

// Création du graphique pour les entrées de sommeil
var ctx2 = document.getElementById('sleepEntriesChart').getContext('2d');
var sleepEntriesChart = new Chart(ctx2, {
    type: 'line',
    data: {
        labels: sleepLabels, // Jours de la semaine
        datasets: [{
            label: 'Cycles de Sommeil',
            data: sleepCycles, // Nombre de cycles de sommeil
            borderColor: 'rgb(153, 102, 255)',
            fill: false
        }]
    },
    options: {
        scales: {
            y: { beginAtZero: true } // L'axe Y commence à 0
        }
    }
});
</script>
