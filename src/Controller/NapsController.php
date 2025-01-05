<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Naps Controller
 *
 */
class NapsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        //$query = $this->Naps->find();
        //$naps = $this->paginate($query);
        //Récupérer toutes les siestes dans la base de données
        $naps = $this->Naps->find('all'); // Convertir les résultats en tableau
    
        // Passer la variable $naps à la vue
        $this->set('naps', $naps);
    
        // Utilisation de compact pour rendre la variable disponible dans la vue
        $this->set(compact('naps'));
    }

    /**
     * View method
     *
     * @param string|null $id Nap id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $nap = $this->Naps->get($id, contain: []);
        $this->set(compact('nap'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
{
    // Créer une nouvelle entité de sieste
    $nap = $this->Naps->newEmptyEntity();

    if ($this->request->is('post')) {
        // Récupérer les données envoyées via le formulaire
        $data = $this->request->getData();

        // Ajouter l'utilisateur connecté (user_id) aux données
        $identity = $this->Authentication->getIdentity(); // Récupérer l'utilisateur authentifié
        $data['user_id'] = $identity->id; // Associez l'utilisateur connecté
        
        // Créer une entité de sieste à partir des données
        $nap = $this->Naps->patchEntity($nap, $data);

        if ($this->Naps->save($nap)) {
            // Si l'enregistrement est réussi, rediriger vers la page index
            $this->Flash->success(__('La sieste a été ajoutée.'));
            return $this->redirect(['action' => 'index']);
        }

        // Si l'enregistrement échoue, afficher un message d'erreur
        $this->Flash->error(__('Impossible d\'ajouter la sieste.'));
    }

    // Passer l'entité de la sieste à la vue
    $this->set(compact('nap'));
}


    /**
     * Edit method
     *
     * @param string|null $id Nap id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $nap = $this->Naps->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $nap = $this->Naps->patchEntity($nap, $this->request->getData());
            if ($this->Naps->save($nap)) {
                $this->Flash->success(__('The nap has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The nap could not be saved. Please, try again.'));
        }
        $this->set(compact('nap'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Nap id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $nap = $this->Naps->get($id);
        if ($this->Naps->delete($nap)) {
            $this->Flash->success(__('The nap has been deleted.'));
        } else {
            $this->Flash->error(__('The nap could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
