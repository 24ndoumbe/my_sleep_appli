<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Utility\Text;
use Cake\Mailer\Mailer;
use App\Controller\AppController;
use Authentication\PasswordHasher\DefaultPasswordHasher;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Cake\Utility\Security;




/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Users->find();
        $users = $this->paginate($query);

        $this->set(compact('users'));
    }

    public function hashPasswords()
    {
        // Récupère tous les utilisateurs de la base de données
        $users = $this->Users->find()->all();

        foreach ($users as $user) {
            if ($user->password) {
                // Hache chaque mot de passe
                $user->password = (new DefaultPasswordHasher())->hash($user->password);
                $this->Users->save($user);
            }
        }

        $this->Flash->success('Les mots de passe ont été hachés avec succès.');
        return $this->redirect(['action' => 'index']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, contain: []);
        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
    parent::beforeFilter($event);
    // Configurez l'action de connexion pour ne pas exiger d'authentification,
    // évitant ainsi le problème de la boucle de redirection infinie
    // Ajoutez la méthode beforeFilter au UsersController
    $this->Authentication->addUnauthenticatedActions(['login', 'add', 'forgotPassword','showNewPassword','index','weeklySummaries','view']);
    // Autorise l'accès à l'action 'weeklySummaries' sans authentification
    //$this->Authentication->addUnauthenticatedActions(['weeklySummaries']);



    }



    public function login()
    {
    $this->request->allowMethod(['get', 'post']);
    $result = $this->Authentication->getResult();
    // indépendamment de POST ou GET, rediriger si l'utilisateur est connecté
    if ($result && $result->isValid()) {
        // rediriger vers /articles après la connexion réussie
        $redirect = $this->request->getQuery('redirect', [
            'controller' => 'Users',
            'action' => 'index',
        ]);

        return $this->redirect($redirect);
    }
    // afficher une erreur si l'utilisateur a soumis un formulaire
    // et que l'authentification a échoué
    if ($this->request->is('post') && !$result->isValid()) {
        $this->Flash->error(__('Votre identifiant ou votre mot de passe est incorrect.'));
    }
    // Spécifier que la vue à utiliser est login.php
    $this->viewBuilder()->setTemplate('login');
    }

    public function logout()
    {
        $result = $this->Authentication->getResult();
        // indépendamment de POST ou GET, rediriger si l'utilisateur est connecté
        if ($result && $result->isValid()) {
            $this->Authentication->logout();

            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }


    public function forgotPassword()
    {
        // Vérifiez si la demande est de type POST
        if ($this->request->is('post')) {
            // Récupérer l'email de l'utilisateur
            $email = $this->request->getData('email');
    
            // Vérifiez si l'email existe dans la base de données
            $usersTable = $this->getTableLocator()->get('Users'); 
            $user = $usersTable->find()
                ->where(['email' => $email])
                ->first();
    
            if ($user) {
                // Générer un nouveau mot de passe aléatoire
                $newPassword = Security::randomString(8);
    
                // Mettre à jour le mot de passe de l'utilisateur
                $user->password = $newPassword;
                if ($usersTable->save($user)) {
                    // Rediriger vers la page showNewPassword pour afficher le nouveau mot de passe
                    return $this->redirect(['action' => 'show_new_password', $newPassword]);
                } else {
                    $this->Flash->error('Une erreur est survenue lors de la mise à jour du mot de passe.');
                }
            } else {
                $this->Flash->error('Cet email n\'existe pas dans notre base de données.');
            }
        }
    }
    

    public function showNewPassword($newPassword = null)
{
    // Passer le mot de passe à la vue
    $this->set(compact('newPassword'));
}
    

}






