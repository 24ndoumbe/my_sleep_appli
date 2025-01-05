
<style>
    /* Style général du formulaire */
form {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px; /* Bords arrondis */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Ombre douce */
    max-width: 600px; /* Limite la largeur du formulaire */
    margin: 20px auto;
    font-family: 'Arial', sans-serif;
}

/* Titre du formulaire */
form h1 {
    font-size: 1.8rem;
    color: #333;
    text-align: center;
    margin-bottom: 20px;
}

/* Style des légendes */
form fieldset {
    border: none;
    padding: 0;
    margin-bottom: 20px;
}

form legend {
    font-size: 1.4rem;
    color: #333;
    margin-bottom: 10px;
    font-weight: bold;
}

/* Style des champs du formulaire */
form .form-group {
    margin-bottom: 15px;
}

form label {
    display: block;
    font-size: 1rem;
    color: #555;
    margin-bottom: 5px;
}

form input[type="text"],
form input[type="number"],
form input[type="datetime-local"],
form textarea,
form select {
    width: 100%;
    padding: 10px;
    font-size: 1rem;
    border-radius: 5px;
    border: 1px solid #ccc;
    margin-bottom: 10px;
    transition: border-color 0.3s ease;
}

/* Changement de couleur du champ de texte au focus */
form input[type="text"]:focus,
form input[type="number"]:focus,
form input[type="datetime-local"]:focus,
form textarea:focus,
form select:focus {
    border-color: #4d90fe;
    outline: none;
}

/* Style des cases à cocher (checkbox) */
form input[type="checkbox"] {
    margin-right: 10px;
}

/* Style des boutons */
form button {
    background-color: #4d90fe;
    color: white;
    font-size: 1.1rem;
    padding: 12px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    width: 100%; /* Prend toute la largeur */
}

form button:hover {
    background-color: #357ab7;
}

/* Style des commentaires (textarea) */
form textarea {
    height: 150px;
}

/* Réduire la taille du formulaire sur mobile */
@media (max-width: 768px) {
    form {
        width: 100%;
        padding: 15px;
    }

    form h1 {
        font-size: 1.5rem;
    }

    form button {
        font-size: 1rem;
        padding: 10px;
    }
}

</style>

<h1>Ajouter une entrée de sommeil</h1>


<?= $this->Form->create($sleepEntry) ?>

    <fieldset>
        <legend>Entrée de sommeil</legend>
        <?= $this->Form->control('sleep_start', ['label' => 'Heure de coucher', 'type' => 'datetime-local']) ?>
        <?= $this->Form->control('sleep_end', ['label' => 'Heure de lever', 'type' => 'datetime-local']) ?>
        <?= $this->Form->control('nap', ['label' => 'Sieste', 'type' => 'checkbox']) ?>
        <?= $this->Form->control('feeling', ['label' => 'Forme au réveil', 'type' => 'number', 'min' => 0, 'max' => 10]) ?>
        <?= $this->Form->control('comment', ['label' => 'Commentaire', 'type' => 'textarea']) ?>
    </fieldset>
    <?= $this->Form->button(__('Ajouter')) ?>

<?= $this->Form->end() ?>

