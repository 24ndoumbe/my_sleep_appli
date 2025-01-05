<h1>Ajouter une sieste</h1>

<?= $this->Form->create($nap) ?>
    <fieldset>
       <!-- <legend><?= __('Ajouter une sieste') ?></legend>-->
        <?= $this->Form->control('start_time', ['label' => 'Heure de début']); ?>
        <?= $this->Form->control('end_time', ['label' => 'Heure de fin']); ?>
        <?= $this->Form->control('nap_type', ['label' => 'Type de sieste']); ?>
        <?= $this->Form->control('duration', ['label' => 'Durée (en minutes)']); ?>
    </fieldset>
    <?= $this->Form->button(__('Enregistrer')) ?>
<?= $this->Form->end() ?>

<style>
    /* Styles pour la page "Ajouter une sieste" */
h1 {
    font-size: 2em;
    color: #333;
    text-align: center;
    margin-bottom: 20px;
}

/* Conteneur principal du formulaire */
.nap-form.content {
    background-color: #ffffff;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    max-width: 600px;
    margin: 0 auto;  /* Centrer le formulaire */
}

/* Titre du formulaire */
legend {
    font-size: 1.4em;
    color: #333;
    margin-bottom: 20px;
    text-align: center;
}

/* Champ de formulaire */
fieldset {
    border: none;
    margin-bottom: 30px;
}

/* Label des champs de formulaire */
label {
    font-weight: bold;
    margin-bottom: 8px;
    color: #555;
    font-size: 1.1em;
}

/* Champs de saisie (input, select) */
input, select {
    width: 100%;
    padding: 12px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 1.1em;
    background-color: #f9f9f9;
    transition: all 0.3s ease;
}

/* Champ de durée (en minutes) */
input[type="number"] {
    -moz-appearance: textfield;
}

input[type="number"]::-webkit-outer-spin-button,
input[type="number"]::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

/* Survol des champs de formulaire */
input:hover, select:hover {
    border-color: #007bff;
    background-color: #e6f0ff;
}

/* Bouton d'enregistrement */
button {
    background-color: #28a745;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 1.1em;
    width: 100%;
    transition: background-color 0.3s ease;
    margin-top: 20px;
}

/* Survol du bouton */
button:hover {
    background-color: #218838;
}

/* Validation du formulaire */
form {
    display: flex;
    flex-direction: column;
}

/* Espace entre les champs */
.nap-form.content .form-group {
    margin-bottom: 20px;
}

/* Responsiveness */
@media (max-width: 768px) {
    .nap-form.content {
        padding: 20px;
        margin: 10px;
    }

    h1 {
        font-size: 1.6em;
    }

    button {
        padding: 10px 15px;
    }
}

</style>