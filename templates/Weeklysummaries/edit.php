<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Weeklysummary $weeklysummary
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $weeklysummary->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $weeklysummary->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Weeklysummaries'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="weeklysummaries form content">
            <?= $this->Form->create($weeklysummary) ?>
            <fieldset>
                <legend><?= __('Edit Weeklysummary') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('week_start');
                    echo $this->Form->control('week_end');
                    echo $this->Form->control('total_sleep_cycles');
                    echo $this->Form->control('days_with_5_cycles');
                    echo $this->Form->control('feeling_score');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<style>
    /* Mise en page de la ligne contenant les colonnes */
.row {
    display: flex;
    gap: 20px;
    margin: 20px auto;
    flex-wrap: wrap; /* Permet la réorganisation des éléments en fonction de l'espace disponible */
}

/* Colonnes (side-nav et formulaire principal) */
.column {
    flex: 1;
}

.column-80 {
    flex: 0 0 80%; /* La colonne principale occupe 80% de la largeur */
}

/* Barre latérale des actions */
.side-nav {
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 8px;
    width: 250px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

/* Titre dans la barre latérale */
.side-nav .heading {
    font-size: 1.2em;
    margin-bottom: 15px;
    color: #333;
}

/* Liens dans la barre latérale */
.side-nav-item {
    display: block;
    padding: 10px;
    text-decoration: none;
    color: #007bff;
    margin-bottom: 8px;
    border-radius: 4px;
}

.side-nav-item:hover {
    background-color: #007bff;
    color: white;
}

/* Formulaire principal */
.weeklysummaries.form.content {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

/* Formulaire */
form {
    display: flex;
    flex-direction: column;
}

/* Titre du formulaire */
legend {
    font-size: 1.4em;
    color: #333;
    margin-bottom: 15px;
}

/* Champs de formulaire */
fieldset {
    border: none;
    margin-bottom: 20px;
}

label {
    font-weight: bold;
    margin-bottom: 8px;
    color: #555;
}

input, select, textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 1em;
    background-color: #f9f9f9;
}

/* Spécial pour les champs "datetime-local" */
input[type="datetime-local"] {
    padding: 8px;
}

/* Bouton de soumission */
button {
    background-color: #007bff;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 1em;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #0056b3;
}

/* Message de confirmation de suppression */
.confirmation-message {
    font-size: 1em;
    color: #d9534f;
    font-weight: bold;
}

</style>
