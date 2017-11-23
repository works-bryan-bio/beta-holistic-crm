<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SourceEmailRecipients Controller
 *
 * @property \App\Model\Table\SourceEmailRecipientsTable $SourceEmailRecipients
 */
class SourceEmailRecipientsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Sources', 'FormLocations']
        ];
        $this->set('sourceEmailRecipients', $this->paginate($this->SourceEmailRecipients));
        $this->set('_serialize', ['sourceEmailRecipients']);
    }

    /**
     * View method
     *
     * @param string|null $id Source Email Recipient id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sourceEmailRecipient = $this->SourceEmailRecipients->get($id, [
            'contain' => ['Sources', 'FormLocations']
        ]);
        $this->set('sourceEmailRecipient', $sourceEmailRecipient);
        $this->set('_serialize', ['sourceEmailRecipient']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sourceEmailRecipient = $this->SourceEmailRecipients->newEntity();
        if ($this->request->is('post')) {
            $sourceEmailRecipient = $this->SourceEmailRecipients->patchEntity($sourceEmailRecipient, $this->request->data);
            if ($this->SourceEmailRecipients->save($sourceEmailRecipient)) {
                $this->Flash->success(__('The source email recipient has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'add']);
                }                    
            } else {
                $this->Flash->error(__('The source email recipient could not be saved. Please, try again.'));
            }
        }
        $sources = $this->SourceEmailRecipients->Sources->find('list', ['limit' => 200]);
        $formLocations = $this->SourceEmailRecipients->FormLocations->find('list', ['limit' => 200]);
        $this->set(compact('sourceEmailRecipient', 'sources', 'formLocations'));
        $this->set('_serialize', ['sourceEmailRecipient']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Source Email Recipient id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sourceEmailRecipient = $this->SourceEmailRecipients->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sourceEmailRecipient = $this->SourceEmailRecipients->patchEntity($sourceEmailRecipient, $this->request->data);
            if ($this->SourceEmailRecipients->save($sourceEmailRecipient)) {
                $this->Flash->success(__('The source email recipient has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'edit', $id]);
                }         
            } else {
                $this->Flash->error(__('The source email recipient could not be saved. Please, try again.'));
            }
        }
        $sources = $this->SourceEmailRecipients->Sources->find('list', ['limit' => 200]);
        $formLocations = $this->SourceEmailRecipients->FormLocations->find('list', ['limit' => 200]);
        $this->set(compact('sourceEmailRecipient', 'sources', 'formLocations'));
        $this->set('_serialize', ['sourceEmailRecipient']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Source Email Recipient id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sourceEmailRecipient = $this->SourceEmailRecipients->get($id);
        if ($this->SourceEmailRecipients->delete($sourceEmailRecipient)) {
            $this->Flash->success(__('The source email recipient has been deleted.'));
        } else {
            $this->Flash->error(__('The source email recipient could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
