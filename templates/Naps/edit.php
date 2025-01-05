<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Nap $nap
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $nap->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $nap->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Naps'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="naps form content">
            <?= $this->Form->create($nap) ?>
            <fieldset>
                <legend><?= __('Edit Nap') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('nap_type');
                    echo $this->Form->control('start_time');
                    echo $this->Form->control('end_time');
                    echo $this->Form->control('duration');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
