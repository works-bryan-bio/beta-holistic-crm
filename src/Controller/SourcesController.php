<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Sources Controller
 *
 * @property \App\Model\Table\SourcesTable $Sources
 */
class SourcesController extends AppController
{
    /**
     * initialize method
     *  ID : CA-01
     * 
     */
    public function initialize()
    {
        parent::initialize();
        $nav_selected = ["system_settings"];
        $this->set('nav_selected', $nav_selected);

        $session   = $this->request->session();    
        $user_data = $session->read('User.data');         
        if( isset($user_data) ){
            if( $user_data->group_id == 1 ){ //Admin
              $this->Auth->allow();
            }else{                          
                $authorized_modules = array();     
                $rights = $this->default_group_actions['sources'];                
                switch ($rights) {
                    case 'View Only':
                        $authorized_modules = ['index', 'view'];
                        break;
                    case 'View and Edit':
                        $authorized_modules = ['index', 'view', 'edit', 'add'];
                        break;
                    case 'View, Edit and Delete':
                        $authorized_modules = ['index', 'view', 'edit', 'delete', 'add'];
                        break;        
                    default:            
                        break;
                }                
                $this->Auth->allow($authorized_modules);
            }
        }    
    }    

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->unlock_lead_check();
        if( isset( $this->request->query['query'] ) ) {

            $query   = $this->request->query['query'];
            $sources = $this->Sources->find('all')                
                ->where( ['Sources.name LIKE' => '%' . $query . '%'] );

        } else {
            $sort_direction = !empty($this->request->query['direction']) ? $this->request->query['direction'] : 'ASC';
            $sort_field     = !empty($this->request->query['sort']) ? $this->request->query['sort'] : 'ASC';            

            if( !empty($this->request->query['direction']) && !empty($this->request->query['sort']) ) {
                //$sources_to_sort  = $this->Sources->find('all', ['order' => ['Sources.'.$sort_field => $sort_direction]]);
                $sources_to_sort  = $this->Sources->find('all', ['order' => [$sort_field => $sort_direction]]);
                $sort = 1;
                foreach($sources_to_sort as $skey => $sd) {

                    $a_data = $this->Sources->get($sd->id, []);
                    $data_sort['sort'] = $sort;
                    $a_data = $this->Sources->patchEntity($a_data, $data_sort);
                    if ( !$this->Sources->save($a_data) ) { echo "error unlocking lead"; }                    

                $sort++;
                }
            }

            $sources = $this->Sources->find('all', ['order' => ['Sources.sort' => 'ASC']]);
        }     

        $this->set('sources', $this->paginate($sources));
        $this->set('_serialize', ['sources']);
    }    

    /**
     * View method
     *
     * @param string|null $id Source id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $source = $this->Sources->get($id, [
            'contain' => []
        ]);
        $this->set('source', $source);
        $this->set('_serialize', ['source']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->FormLocations = TableRegistry::get('FormLocations');
        $this->SourceEmailRecipients = TableRegistry::get('SourceEmailRecipients');

        $source = $this->Sources->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;
            //debug($data);
            //exit;

            //Save source
            $source = $this->Sources->patchEntity($source, $data);           
            if ( $new_source = $this->Sources->save($source)) {
                $data_emails = $data['emails'];
                $data_fields = $data['fields'];


                foreach( $data_fields as $key => $values ){
                    $a_fields = array();
                    foreach( $values as $subKey => $subValues ){
                        $a_fields[] = $subKey;
                    }
                    $sources_recipients[$key]['fields'] = implode(",", $a_fields);
                    $sources_recipients[$key]['emails'] = $data_emails[$key];
                }

                foreach( $sources_recipients as $key => $values ){
                    if( trim($values['emails']) != '' ){
                        $data_recipients = [
                            'source_id' => $new_source->id,
                            'form_location_id' => $key,
                            'emails' => $values['emails'],
                            'fields' => $values['fields']
                        ];

                        $sourceEmailRecipients = $this->SourceEmailRecipients->newEntity();
                        $sourceEmailRecipients = $this->SourceEmailRecipients->patchEntity($sourceEmailRecipients, $data_recipients);
                        $this->SourceEmailRecipients->save($sourceEmailRecipients);
                    }                    
                }

                $this->Flash->success(__('The source has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'add']);
                }  
            }else{
                $this->Flash->error(__('The source could not be saved. Please, try again.'));
            }
        }

        $formLocations = $this->FormLocations->find('all');
        $fields        = $this->FormLocations->formLocationFields();

        $this->set('fields', $fields);
        $this->set('formLocations', $formLocations);
        $this->set('enable_tags_input', true);
        $this->set(compact('source'));
        $this->set('_serialize', ['source']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Source id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->FormLocations = TableRegistry::get('FormLocations');
        $this->SourceEmailRecipients = TableRegistry::get('SourceEmailRecipients');

        $source = $this->Sources->get($id, [
            'contain' => []
        ]);

        $sourceEmailRecipients = $this->SourceEmailRecipients->find('all')
            ->where(['SourceEmailRecipients.source_id' => $source->id])
        ;

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->data;      
            $data['emails'] = str_replace(",", ";", $this->request->data['emails']);              
            $source = $this->Sources->patchEntity($source, $data);
            if ($this->Sources->save($source)) {
                $this->Flash->success(__('The source has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'edit', $id]);
                }         
            } else {
                $this->Flash->error(__('The source could not be saved. Please, try again.'));
            }
        }

        $email_fields = array();
        $emails       = array();
        foreach($sourceEmailRecipients as $s){
            $a_fields = explode(",", $s->fields);
            $email_fields[$s->form_location_id] = $a_fields;
            $emails[$s->form_location_id] = $s->emails;            
        }

        $formLocations = $this->FormLocations->find('all');
        $fields        = $this->FormLocations->formLocationFields();

        $this->set([
            'email_fields' => $email_fields,
            'emails' => $emails,
            'sourceEmailRecipients' => $sourceEmailRecipients,
            'formLocations' => $formLocations,
            'fields' => $fields
        ]);

        $this->set('enable_tags_input', true);
        $this->set(compact('source'));
        $this->set('_serialize', ['source']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Source id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $source = $this->Sources->get($id);
        if ($this->Sources->delete($source)) {
            $this->Flash->success(__('The source has been deleted.'));
        } else {
            $this->Flash->error(__('The source could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
