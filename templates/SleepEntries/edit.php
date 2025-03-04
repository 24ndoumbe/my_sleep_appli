<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sleepentry $sleepentry
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $sleepentry->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $sleepentry->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Sleepentries'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="sleepentries form content">
            <?= $this->Form->create($sleepentry) ?>
            <fieldset>
                <legend><?= __('Edit Sleepentry') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('sleep_start');
                    echo $this->Form->control('sleep_end');
                    echo $this->Form->control('nap');
                    echo $this->Form->control('feeling');
                    echo $this->Form->control('comment');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<style>
    /* Conteneur principal pour les colonnes */
.row {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    margin: 0 auto;
}

/* Colonne de navigation (menu latéral) */
.side-nav {
    background-color: #f4f4f4;
    padding: 20px;
    border-radius: 8px;
    width: 200px;
}

.side-nav .heading {
    font-size: 1.2em;
    margin-bottom: 10px;
    color: #333;
}

.side-nav-item {
    display: block;
    padding: 10px;
    text-decoration: none;
    color: #007bff;
    border-radius: 4px;
    margin-bottom: 8px;
}

.side-nav-item:hover {
    background-color: #007bff;
    color: white;
}

/* Colonne principale (formulaire) */
.column-80 {
    flex: 1;
}

.sleepentries.form.content {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.sleepentries form {
    display: flex;
    flex-direction: column;
}

fieldset {
    border: none;
    padding: 0;
    margin-bottom: 20px;
}

legend {
    font-size: 1.4em;
    margin-bottom: 10px;
    color: #333;
}

label {
    font-weight: bold;
    margin-bottom: 5px;
}

input, select, textarea {
    padding: 8px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 1em;
}

input[type="datetime-local"], input[type="text"], select, textarea {
    width: 100%;
}

/* Textarea */
textarea {
    resize: vertical;
    min-height: 100px;
}

/* Bouton de soumission */
button {
    background-color: #007bff;
    color: white;
    padding: 10px 15px;
    font-size: 1em;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #0056b3;
}

button:active {
    background-color: #003f7f;
}

</style>
