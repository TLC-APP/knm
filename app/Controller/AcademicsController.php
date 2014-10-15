<?php
App::uses('AppController', 'Controller');
/**
 * Academics Controller
 *
 * @property Academic $Academic
 * @property PaginatorComponent $Paginator
 */
class AcademicsController extends AppController {

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
		$this->Academic->recursive = 0;
		$this->set('academics', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Academic->exists($id)) {
			throw new NotFoundException(__('Invalid academic'));
		}
		$options = array('conditions' => array('Academic.' . $this->Academic->primaryKey => $id));
		$this->set('academic', $this->Academic->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Academic->create();
			if ($this->Academic->save($this->request->data)) {
				return $this->flash(__('The academic has been saved.'), array('action' => 'index'));
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
		if (!$this->Academic->exists($id)) {
			throw new NotFoundException(__('Invalid academic'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Academic->save($this->request->data)) {
				return $this->flash(__('The academic has been saved.'), array('action' => 'index'));
			}
		} else {
			$options = array('conditions' => array('Academic.' . $this->Academic->primaryKey => $id));
			$this->request->data = $this->Academic->find('first', $options);
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
		$this->Academic->id = $id;
		if (!$this->Academic->exists()) {
			throw new NotFoundException(__('Invalid academic'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Academic->delete()) {
			return $this->flash(__('The academic has been deleted.'), array('action' => 'index'));
		} else {
			return $this->flash(__('The academic could not be deleted. Please, try again.'), array('action' => 'index'));
		}
	}

/**
 * manager_index method
 *
 * @return void
 */
	public function manager_index() {
		$this->Academic->recursive = 0;
		$this->set('academics', $this->Paginator->paginate());
	}

/**
 * manager_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function manager_view($id = null) {
		if (!$this->Academic->exists($id)) {
			throw new NotFoundException(__('Invalid academic'));
		}
		$options = array('conditions' => array('Academic.' . $this->Academic->primaryKey => $id));
		$this->set('academic', $this->Academic->find('first', $options));
	}

/**
 * manager_add method
 *
 * @return void
 */
	public function manager_add() {
		if ($this->request->is('post')) {
			$this->Academic->create();
			if ($this->Academic->save($this->request->data)) {
				return $this->flash(__('The academic has been saved.'), array('action' => 'index'));
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
		if (!$this->Academic->exists($id)) {
			throw new NotFoundException(__('Invalid academic'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Academic->save($this->request->data)) {
				return $this->flash(__('The academic has been saved.'), array('action' => 'index'));
			}
		} else {
			$options = array('conditions' => array('Academic.' . $this->Academic->primaryKey => $id));
			$this->request->data = $this->Academic->find('first', $options);
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
		$this->Academic->id = $id;
		if (!$this->Academic->exists()) {
			throw new NotFoundException(__('Invalid academic'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Academic->delete()) {
			return $this->flash(__('The academic has been deleted.'), array('action' => 'index'));
		} else {
			return $this->flash(__('The academic could not be deleted. Please, try again.'), array('action' => 'index'));
		}
	}
}
