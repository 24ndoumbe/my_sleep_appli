<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Weeklysummary $weeklysummary
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Weeklysummary'), ['action' => 'edit', $weeklysummary->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Weeklysummary'), ['action' => 'delete', $weeklysummary->id], ['confirm' => __('Are you sure you want to delete # {0}?', $weeklysummary->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Weeklysummaries'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Weeklysummary'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="weeklysummaries view content">
            <h3><?= h($weeklysummary->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $weeklysummary->hasValue('user') ? $this->Html->link($weeklysummary->user->username, ['controller' => 'Users', 'action' => 'view', $weeklysummary->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($weeklysummary->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Total Sleep Cycles') ?></th>
                    <td><?= $this->Number->format($weeklysummary->total_sleep_cycles) ?></td>
                </tr>
                <tr>
                    <th><?= __('Days With 5 Cycles') ?></th>
                    <td><?= $this->Number->format($weeklysummary->days_with_5_cycles) ?></td>
                </tr>
                <tr>
                    <th><?= __('Feeling Score') ?></th>
                    <td><?= $this->Number->format($weeklysummary->feeling_score) ?></td>
                </tr>
                <tr>
                    <th><?= __('Week Start') ?></th>
                    <td><?= h($weeklysummary->week_start) ?></td>
                </tr>
                <tr>
                    <th><?= __('Week End') ?></th>
                    <td><?= h($weeklysummary->week_end) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>