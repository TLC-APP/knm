<?php
App::uses('AppController', 'Controller');
/**
 * Degrees Controller
 *
 * @property Degree $Degree
 * @property PaginatorComponent $Paginator
 */
class DegreesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Degree->recursive = 0;
		$this->set('degrees', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Degree->exists($id)) {
			throw new NotFoundException(__('Invalid degree'));
		}
		$options = array('conditions' => array('Degree.' . $this->Degree->primaryKey => $id));
		$this->set('degree', $this->Degree->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Degree->create();
			if ($this->Degree->save($this->request->data)) {
				return $this->flash(__('The degree has been saved.'), array('action' => 'index'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Degree->exists($id)) {
			throw new NotFoundException(__('Invalid degree'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Degree->save($this->request->data)) {
				return $this->flash(__('The degree has been saved.'), array('action' => 'index'));
			}
		} else {
			$options = array('conditions' => array('Degree.' . $this->Degree->primaryKey => $id));
			$this->request->data = $this->Degree->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Degree->id = $id;
		if (!$this->Degree->exists()) {
			throw new NotFoundException(__('Invalid degree'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Degree->delete()) {
			return $this->flash(__('The degree has been deleted.'), array('action' => 'index'));
		} else {
			return $this->flash(__('The degree could not be deleted. Please, try again.'), array('action' => 'index'));
		}
	}

/**
 * manager_index method
 *
 * @return void
 */
	public function manager_index() {
		$this->Degree->recursive = 0;
		$this->set('degrees', $this->Paginator->paginate());
	}

/**
 * manager_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function manager_view($id = null) {
		if (!$this->Degree->exists($id)) {
			throw new NotFoundException(__('Invalid degree'));
		}
		$options = array('conditions' => array('Degree.' . $this->Degree->primaryKey => $id));
		$this->set('degree', $this->Degree->find('first', $options));
	}

/**
 * manager_add method
 *
 * @return void
 */
	public function manager_add() {
		if ($this->request->is('post')) {
			$this->Degree->create();
			if ($this->Degree->save($this->request->data)) {
				return $this->flash(__('The degree has been saved.'), array('action' => 'index'));
			}
		}
	}

/**
 * manager_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function manager_edit($id = null) {
		if (!$this->Degree->exists($id)) {
			throw new NotFoundException(__('Invalid degree'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Degree->save($this->request->data)) {
				return $this->flash(__('The degree has been saved.'), array('action' => 'index'));
			}
		} else {
			$options = array('conditions' => array('Degree.' . $this->Degree->primaryKey => $id));
			$this->request->data = $this->Degree->find('first', $options);
		}
	}

/**
 * manager_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function manager_delete($id = null) {
		$this->Degree->id = $id;
		if (!$this->Degree->exists()) {
			throw new NotFoundException(__('Invalid degree'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Degree->delete()) {
			return $this->flash(__('The degree has been deleted.'), array('action' => 'index'));
		} else {
			return $this->flash(__('The degree could not be deleted. Please, try again.'), array('action' => 'index'));
		}
	}
}
