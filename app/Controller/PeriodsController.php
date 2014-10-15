<?php
App::uses('AppController', 'Controller');
/**
 * Periods Controller
 *
 * @property Period $Period
 * @property PaginatorComponent $Paginator
 */
class PeriodsController extends AppController {

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
		$this->Period->recursive = 0;
		$this->set('periods', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Period->exists($id)) {
			throw new NotFoundException(__('Invalid period'));
		}
		$options = array('conditions' => array('Period.' . $this->Period->primaryKey => $id));
		$this->set('period', $this->Period->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Period->create();
			if ($this->Period->save($this->request->data)) {
				return $this->flash(__('The period has been saved.'), array('action' => 'index'));
			}
		}
		$courses = $this->Period->Course->find('list');
		$rooms = $this->Period->Room->find('list');
		$this->set(compact('courses', 'rooms'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Period->exists($id)) {
			throw new NotFoundException(__('Invalid period'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Period->save($this->request->data)) {
				return $this->flash(__('The period has been saved.'), array('action' => 'index'));
			}
		} else {
			$options = array('conditions' => array('Period.' . $this->Period->primaryKey => $id));
			$this->request->data = $this->Period->find('first', $options);
		}
		$courses = $this->Period->Course->find('list');
		$rooms = $this->Period->Room->find('list');
		$this->set(compact('courses', 'rooms'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Period->id = $id;
		if (!$this->Period->exists()) {
			throw new NotFoundException(__('Invalid period'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Period->delete()) {
			return $this->flash(__('The period has been deleted.'), array('action' => 'index'));
		} else {
			return $this->flash(__('The period could not be deleted. Please, try again.'), array('action' => 'index'));
		}
	}

/**
 * manager_index method
 *
 * @return void
 */
	public function manager_index() {
		$this->Period->recursive = 0;
		$this->set('periods', $this->Paginator->paginate());
	}

/**
 * manager_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function manager_view($id = null) {
		if (!$this->Period->exists($id)) {
			throw new NotFoundException(__('Invalid period'));
		}
		$options = array('conditions' => array('Period.' . $this->Period->primaryKey => $id));
		$this->set('period', $this->Period->find('first', $options));
	}

/**
 * manager_add method
 *
 * @return void
 */
	public function manager_add() {
		if ($this->request->is('post')) {
			$this->Period->create();
			if ($this->Period->save($this->request->data)) {
				return $this->flash(__('The period has been saved.'), array('action' => 'index'));
			}
		}
		$courses = $this->Period->Course->find('list');
		$rooms = $this->Period->Room->find('list');
		$this->set(compact('courses', 'rooms'));
	}

/**
 * manager_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function manager_edit($id = null) {
		if (!$this->Period->exists($id)) {
			throw new NotFoundException(__('Invalid period'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Period->save($this->request->data)) {
				return $this->flash(__('The period has been saved.'), array('action' => 'index'));
			}
		} else {
			$options = array('conditions' => array('Period.' . $this->Period->primaryKey => $id));
			$this->request->data = $this->Period->find('first', $options);
		}
		$courses = $this->Period->Course->find('list');
		$rooms = $this->Period->Room->find('list');
		$this->set(compact('courses', 'rooms'));
	}

/**
 * manager_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function manager_delete($id = null) {
		$this->Period->id = $id;
		if (!$this->Period->exists()) {
			throw new NotFoundException(__('Invalid period'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Period->delete()) {
			return $this->flash(__('The period has been deleted.'), array('action' => 'index'));
		} else {
			return $this->flash(__('The period could not be deleted. Please, try again.'), array('action' => 'index'));
		}
	}
}
