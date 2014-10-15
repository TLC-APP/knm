<?php
App::uses('AppController', 'Controller');
/**
 * Provinces Controller
 *
 * @property Province $Province
 * @property PaginatorComponent $Paginator
 */
class ProvincesController extends AppController {

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
		$this->Province->recursive = 0;
		$this->set('provinces', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Province->exists($id)) {
			throw new NotFoundException(__('Invalid province'));
		}
		$options = array('conditions' => array('Province.' . $this->Province->primaryKey => $id));
		$this->set('province', $this->Province->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Province->create();
			if ($this->Province->save($this->request->data)) {
				return $this->flash(__('The province has been saved.'), array('action' => 'index'));
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
		if (!$this->Province->exists($id)) {
			throw new NotFoundException(__('Invalid province'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Province->save($this->request->data)) {
				return $this->flash(__('The province has been saved.'), array('action' => 'index'));
			}
		} else {
			$options = array('conditions' => array('Province.' . $this->Province->primaryKey => $id));
			$this->request->data = $this->Province->find('first', $options);
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
		$this->Province->id = $id;
		if (!$this->Province->exists()) {
			throw new NotFoundException(__('Invalid province'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Province->delete()) {
			return $this->flash(__('The province has been deleted.'), array('action' => 'index'));
		} else {
			return $this->flash(__('The province could not be deleted. Please, try again.'), array('action' => 'index'));
		}
	}

/**
 * manager_index method
 *
 * @return void
 */
	public function manager_index() {
		$this->Province->recursive = 0;
		$this->set('provinces', $this->Paginator->paginate());
	}

/**
 * manager_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function manager_view($id = null) {
		if (!$this->Province->exists($id)) {
			throw new NotFoundException(__('Invalid province'));
		}
		$options = array('conditions' => array('Province.' . $this->Province->primaryKey => $id));
		$this->set('province', $this->Province->find('first', $options));
	}

/**
 * manager_add method
 *
 * @return void
 */
	public function manager_add() {
		if ($this->request->is('post')) {
			$this->Province->create();
			if ($this->Province->save($this->request->data)) {
				return $this->flash(__('The province has been saved.'), array('action' => 'index'));
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
		if (!$this->Province->exists($id)) {
			throw new NotFoundException(__('Invalid province'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Province->save($this->request->data)) {
				return $this->flash(__('The province has been saved.'), array('action' => 'index'));
			}
		} else {
			$options = array('conditions' => array('Province.' . $this->Province->primaryKey => $id));
			$this->request->data = $this->Province->find('first', $options);
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
		$this->Province->id = $id;
		if (!$this->Province->exists()) {
			throw new NotFoundException(__('Invalid province'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Province->delete()) {
			return $this->flash(__('The province has been deleted.'), array('action' => 'index'));
		} else {
			return $this->flash(__('The province could not be deleted. Please, try again.'), array('action' => 'index'));
		}
	}
}
