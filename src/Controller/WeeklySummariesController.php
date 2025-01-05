<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class WeeklySummariesController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        // Charger les modèles nécessaires
        $this->WeeklySummaries = $this->getTableLocator()->get('WeeklySummaries');
        $this->SleepEntries = $this->getTableLocator()->get('SleepEntries');
    }

    public function index()
{
    $userId = 1; // Exemple d'ID utilisateur
    $startOfWeek = new \DateTime('Monday this week');
    $endOfWeek = new \DateTime('Sunday this week');

    // Récupérer les entrées de sommeil pour la semaine courante
    $sleepEntries = $this->paginate($this->SleepEntries->find()
        ->where(['user_id' => $userId])
        ->andWhere(['sleep_start >=' => $startOfWeek])
        ->andWhere(['sleep_end <=' => $endOfWeek])
    );

    // Initialiser les variables de calcul
    $totalCycles = 0;
    $consecutiveCycles = 0;
    $totalCyclesGreen = false;
    $consecutiveCyclesGreen = false;

    // Calcul des cycles de sommeil
    foreach ($sleepEntries as $entry) {
        $totalCycles += $entry->cycles;
    }

    // Vérifier si l'objectif de 42 cycles est atteint
    if ($totalCycles >= 42) {
        $totalCyclesGreen = true;
    }

    // Calcul des jours avec 5 cycles consécutifs
    $consecutiveDays = 0;
    foreach ($sleepEntries as $entry) {
        if ($entry->cycles >= 5) {
            $consecutiveDays++;
        } else {
            $consecutiveDays = 0;
        }
        if ($consecutiveDays >= 4) {
            $consecutiveCyclesGreen = true;
        }
    }

    // Extraire les données pour le graphique
    $sleepLabels = array_map(function($entry) {
        return (new \DateTime($entry->sleep_start))->format('l');  // Jours de la semaine (ex. "Monday", "Tuesday")
    }, $sleepEntries->toArray());

    $sleepCycles = array_map(function($entry) {
        return $entry->cycles;  // Nombre de cycles de sommeil
    }, $sleepEntries->toArray());

    // Passer les données à la vue
    $this->set(compact('sleepEntries', 'totalCycles', 'consecutiveCycles', 'totalCyclesGreen', 'consecutiveCyclesGreen', 'sleepLabels', 'sleepCycles'));

    // Passer les résumés hebdomadaires à la vue
    $weeklySummaries = $this->WeeklySummaries->find('all')->toArray();
    $this->set('weeklysummaries', $weeklySummaries);
    

}


    public function view($id = null)
    {
        // Récupérer un résumé hebdomadaire avec les données utilisateur associées
        $weeklysummary = $this->WeeklySummaries->get($id, [
            'contain' => ['Users']
        ]);

        $this->set(compact('weeklysummary'));
    }

    public function add()
    {
        // Créer une nouvelle entité de résumé hebdomadaire
        $weeklysummary = $this->WeeklySummaries->newEmptyEntity();
        if ($this->request->is('post')) {
            // Mettre à jour l'entité avec les données du formulaire
            $weeklysummary = $this->WeeklySummaries->patchEntity($weeklysummary, $this->request->getData());
            if ($this->WeeklySummaries->save($weeklysummary)) {
                $this->Flash->success(__('The weekly summary has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The weekly summary could not be saved. Please, try again.'));
        }

        // Récupérer la liste des utilisateurs pour l'ajouter au formulaire
        $users = $this->WeeklySummaries->Users->find('list', ['limit' => 200]);
        $this->set(compact('weeklysummary', 'users'));
    }

    public function edit($id = null)
    {
        // Récupérer un résumé hebdomadaire existant
        $weeklysummary = $this->WeeklySummaries->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            // Mettre à jour l'entité avec les données du formulaire
            $weeklysummary = $this->WeeklySummaries->patchEntity($weeklysummary, $this->request->getData());
            if ($this->WeeklySummaries->save($weeklysummary)) {
                $this->Flash->success(__('The weekly summary has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The weekly summary could not be saved. Please, try again.'));
        }

        // Récupérer la liste des utilisateurs pour l'ajouter au formulaire
        $users = $this->WeeklySummaries->Users->find('list', ['limit' => 200]);
        $this->set(compact('weeklysummary', 'users'));
    }

    public function delete($id = null)
    {
        // Permettre la suppression uniquement par méthode POST ou DELETE
        $this->request->allowMethod(['post', 'delete']);
        
        // Récupérer l'entité WeeklySummary
        $weeklysummary = $this->WeeklySummaries->get($id);
        
        // Essayer de supprimer l'entité
        if ($this->WeeklySummaries->delete($weeklysummary)) {
            $this->Flash->success(__('The weekly summary has been deleted.'));
        } else {
            $this->Flash->error(__('The weekly summary could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
