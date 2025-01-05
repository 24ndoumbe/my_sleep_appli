<?php
// src/Controller/SleepEntriesController.php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;

/**
 * SleepEntries Controller
 */
class SleepEntriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function initialize(): void
    {
        parent::initialize();

        
        
        // Charger le modèle SleepEntries avec TableLocator
        $this->SleepEntries = $this->getTableLocator()->get('SleepEntries');
    }

    public function index()
    {
        // Récupérer les entrées de sommeil
        $sleepEntries = $this->SleepEntries->find('all')->toArray();

        // Passer les entrées de sommeil à la vue
        $this->set(compact('sleepEntries'));
    }


    public function view($id = null)
    {
        // Trouver l'entrée de sommeil par ID
        $sleepEntry = $this->SleepEntries->get($id);
        $this->set(compact('sleepEntry'));
    }

    public function add()
{
    // Créer une nouvelle entité de sommeil
    $sleepEntry = $this->SleepEntries->newEmptyEntity();

    if ($this->request->is('post')) {
        // Récupérer les données envoyées via le formulaire
        $data = $this->request->getData();

        // Ajouter l'utilisateur connecté (user_id) aux données
        $identity = $this->Authentication->getIdentity(); // Récupérer l'utilisateur authentifié
        $data['user_id'] = $identity->id; // Associez l'utilisateur connecté
        
        // Créer une entité de sommeil à partir des données
        $sleepEntry = $this->SleepEntries->patchEntity($sleepEntry, $data);

        if ($this->SleepEntries->save($sleepEntry)) {
            // Si l'enregistrement est réussi, rediriger vers la page index
            $this->Flash->success(__('L\'entrée de sommeil a été ajoutée.'));
            return $this->redirect(['action' => 'index']);
        }

        // Si l'enregistrement échoue, afficher un message d'erreur
        $this->Flash->error(__('Impossible d\'ajouter l\'entrée de sommeil.'));
    }

    $this->set(compact('sleepEntry'));
}




    public function edit($id = null)
    {
        // Récupérer l'entrée de sommeil à modifier
        $sleepEntry = $this->SleepEntries->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            // Appliquer les modifications à l'entité
            $sleepEntry = $this->SleepEntries->patchEntity($sleepEntry, $this->request->getData());
            if ($this->SleepEntries->save($sleepEntry)) {
                // Si la modification réussit, rediriger vers la page index
                $this->Flash->success(__('L\'entrée de sommeil a été modifiée.'));
                return $this->redirect(['action' => 'index']);
            }
            // Si la modification échoue, afficher un message d'erreur
            $this->Flash->error(__('Impossible de modifier l\'entrée de sommeil.'));
        }
        $this->set(compact('sleepEntry'));
    }

    public function delete($id = null)
    {
        // Autoriser uniquement la méthode POST ou DELETE pour cette action
        $this->request->allowMethod(['post', 'delete']);
        // Récupérer l'entrée de sommeil à supprimer
        $sleepEntry = $this->SleepEntries->get($id);
        if ($this->SleepEntries->delete($sleepEntry)) {
            // Si la suppression réussit, afficher un message de succès
            $this->Flash->success(__('L\'entrée de sommeil a été supprimée.'));
        } else {
            // Si la suppression échoue, afficher un message d'erreur
            $this->Flash->error(__('Impossible de supprimer l\'entrée de sommeil.'));
        }

        // Rediriger vers la page index après suppression
        return $this->redirect(['action' => 'index']);
    }
}
