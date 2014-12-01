<?php

App::uses('AppController', 'Controller');

/**
 * Messages Controller
 *
 * @property Message $Message
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class MessagesController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        if (!$this->UserAuth->isLogged()) {
            $this->theme = 'Home';
        }
        $contain = array('ReceiveUser' => array('fields' => array('id', 'first_name', 'last_name')), 'UserGroup');
        $this->Paginator->settings = array('contain' => $contain);
        $this->set('messages', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Message->exists($id)) {
            throw new NotFoundException(__('Invalid message'));
        }
        $contain = array('ReceiveUser' => array('fields' => array('id', 'first_name', 'last_name')), 'UserGroup');
        $options = array('contain' => $contain, 'conditions' => array('Message.' . $this->Message->primaryKey => $id));
        $this->set('message', $this->Message->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Message->create();
            $this->request->data['Message']['created_user_id'] = $this->UserAuth->getUserId();
            $this->request->data['Message']['is_read']=0;
            if ($this->Message->save($this->request->data)) {
                $this->Session->setFlash(__('The message has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The message could not be saved. Please, try again.'));
            }
        }
        $createdUsers = $this->Message->CreatedUser->find('list');
        $receiveUsers = $this->Message->ReceiveUser->find('list');
        $userGroups = $this->Message->UserGroup->find('list');
        $this->set(compact('createdUsers', 'receiveUsers', 'userGroups'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Message->exists($id)) {
            throw new NotFoundException(__('Invalid message'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Message->save($this->request->data)) {
                $this->Session->setFlash(__('The message has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The message could not be saved. Please, try again.'));
            }
        } else {
            $contain = array('ReceiveUser' => array('fields' => array('id', 'first_name', 'last_name')), 'UserGroup');
            $options = array('contain' => $contain, 'conditions' => array('Message.' . $this->Message->primaryKey => $id));
            $this->request->data = $this->Message->find('first', $options);
        }
        $createdUsers = $this->Message->CreatedUser->find('list');
        $receiveUsers = $this->Message->ReceiveUser->find('list');
        $userGroups = $this->Message->UserGroup->find('list');
        $this->set(compact('createdUsers', 'receiveUsers', 'userGroups'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Message->id = $id;
        if (!$this->Message->exists()) {
            throw new NotFoundException(__('Invalid message'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Message->delete()) {
            $this->Session->setFlash(__('The message has been deleted.'));
        } else {
            $this->Session->setFlash(__('The message could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
