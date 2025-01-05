<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Nap $nap
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Nap'), ['action' => 'edit', $nap->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Nap'), ['action' => 'delete', $nap->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nap->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Naps'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Nap'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="naps view content">
            <h3><?= h($nap->nap_type) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $nap->hasValue('user') ? $this->Html->link($nap->user->username, ['controller' => 'Users', 'action' => 'view', $nap->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Nap Type') ?></th>
                    <td><?= h($nap->nap_type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($nap->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Duration') ?></th>
                    <td><?= $this->Number->format($nap->duration) ?></td>
                </tr>
                <tr>
                    <th><?= __('Start Time') ?></th>
                    <td><?= h($nap->start_time) ?></td>
                </tr>
                <tr>
                    <th><?= __('End Time') ?></th>
                    <td><?= h($nap->end_time) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>