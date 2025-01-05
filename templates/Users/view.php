<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="users view content">
            <h3><?= h($user->username) ?></h3>
            <table>
                <tr>
                    <th><?= __('Username') ?></th>
                    <td><?= h($user->username) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($user->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($user->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($user->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($user->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Naps') ?></h4>
                <?php if (!empty($user->naps)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Nap Type') ?></th>
                            <th><?= __('Start Time') ?></th>
                            <th><?= __('End Time') ?></th>
                            <th><?= __('Duration') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->naps as $nap) : ?>
                        <tr>
                            <td><?= h($nap->id) ?></td>
                            <td><?= h($nap->user_id) ?></td>
                            <td><?= h($nap->nap_type) ?></td>
                            <td><?= h($nap->start_time) ?></td>
                            <td><?= h($nap->end_time) ?></td>
                            <td><?= h($nap->duration) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Naps', 'action' => 'view', $nap->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Naps', 'action' => 'edit', $nap->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Naps', 'action' => 'delete', $nap->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nap->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Sleep Entries') ?></h4>
                <?php if (!empty($user->sleep_entries)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Sleep Start') ?></th>
                            <th><?= __('Sleep End') ?></th>
                            <th><?= __('Nap') ?></th>
                            <th><?= __('Feeling') ?></th>
                            <th><?= __('Comment') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->sleep_entries as $sleepEntry) : ?>
                        <tr>
                            <td><?= h($sleepEntry->id) ?></td>
                            <td><?= h($sleepEntry->user_id) ?></td>
                            <td><?= h($sleepEntry->sleep_start) ?></td>
                            <td><?= h($sleepEntry->sleep_end) ?></td>
                            <td><?= h($sleepEntry->nap) ?></td>
                            <td><?= h($sleepEntry->feeling) ?></td>
                            <td><?= h($sleepEntry->comment) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'SleepEntries', 'action' => 'view', $sleepEntry->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'SleepEntries', 'action' => 'edit', $sleepEntry->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'SleepEntries', 'action' => 'delete', $sleepEntry->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sleepEntry->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Weekly Summaries') ?></h4>
                <?php if (!empty($user->weekly_summaries)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Week Start') ?></th>
                            <th><?= __('Week End') ?></th>
                            <th><?= __('Total Sleep Cycles') ?></th>
                            <th><?= __('Days With 5 Cycles') ?></th>
                            <th><?= __('Feeling Score') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->weekly_summaries as $weeklySummary) : ?>
                        <tr>
                            <td><?= h($weeklySummary->id) ?></td>
                            <td><?= h($weeklySummary->user_id) ?></td>
                            <td><?= h($weeklySummary->week_start) ?></td>
                            <td><?= h($weeklySummary->week_end) ?></td>
                            <td><?= h($weeklySummary->total_sleep_cycles) ?></td>
                            <td><?= h($weeklySummary->days_with_5_cycles) ?></td>
                            <td><?= h($weeklySummary->feeling_score) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'WeeklySummaries', 'action' => 'view', $weeklySummary->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'WeeklySummaries', 'action' => 'edit', $weeklySummary->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'WeeklySummaries', 'action' => 'delete', $weeklySummary->id], ['confirm' => __('Are you sure you want to delete # {0}?', $weeklySummary->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>