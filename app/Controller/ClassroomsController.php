<?php
App::uses('AppController', 'Controller');
/**
 * Classrooms Controller
 *
 * @property Classroom $Classroom
 * @property PaginatorComponent $Paginator
 */
class ClassroomsController extends AppController {

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
		$this->Classroom->recursive = 0;
		$this->set('classrooms', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Classroom->exists($id)) {
			throw new NotFoundException(__('Invalid classroom'));
		}
		$options = array('conditions' => array('Classroom.' . $this->Classroom->primaryKey => $id));
		$this->set('classroom', $this->Classroom->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Classroom->create();
			if ($this->Classroom->save($this->request->data)) {
				return $this->flash(__('The classroom has been saved.'), array('action' => 'index'));
			}
		}
		$departments = $this->Classroom->Department->find('list');
		$this->set(compact('departments'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Classroom->exists($id)) {
			throw new NotFoundException(__('Invalid classroom'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Classroom->save($this->request->data)) {
				return $this->flash(__('The classroom has been saved.'), array('action' => 'index'));
			}
		} else {
			$options = array('conditions' => array('Classroom.' . $this->Classroom->primaryKey => $id));
			$this->request->data = $this->Classroom->find('first', $options);
		}
		$departments = $this->Classroom->Department->find('list');
		$this->set(compact('departments'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Classroom->id = $id;
		if (!$this->Classroom->exists()) {
			throw new NotFoundException(__('Invalid classroom'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Classroom->delete()) {
			return $this->flash(__('The classroom has been deleted.'), array('action' => 'index'));
		} else {
			return $this->flash(__('The classroom could not be deleted. Please, try again.'), array('action' => 'index'));
		}
	}

/**
 * manager_index method
 *
 * @return void
 */
	public function manager_index() {
		$this->Classroom->recursive = 0;
		$this->set('classrooms', $this->Paginator->paginate());
	}

/**
 * manager_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function manager_view($id = null) {
		if (!$this->Classroom->exists($id)) {
			throw new NotFoundException(__('Invalid classroom'));
		}
		$options = array('conditions' => array('Classroom.' . $this->Classroom->primaryKey => $id));
		$this->set('classroom', $this->Classroom->find('first', $options));
	}

/**
 * manager_add method
 *
 * @return void
 */
	public function manager_add() {
		if ($this->request->is('post')) {
			$this->Classroom->create();
			if ($this->Classroom->save($this->request->data)) {
				return $this->flash(__('The classroom has been saved.'), array('action' => 'index'));
			}
		}
		$departments = $this->Classroom->Department->find('list');
		$this->set(compact('departments'));
	}

/**
 * manager_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function manager_edit($id = null) {
		if (!$this->Classroom->exists($id)) {
			throw new NotFoundException(__('Invalid classroom'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Classroom->save($this->request->data)) {
				return $this->flash(__('The classroom has been saved.'), array('action' => 'index'));
			}
		} else {
			$options = array('conditions' => array('Classroom.' . $this->Classroom->primaryKey => $id));
			$this->request->data = $this->Classroom->find('first', $options);
		}
		$departments = $this->Classroom->Department->find('list');
		$this->set(compact('departments'));
	}

/**
 * manager_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function manager_delete($id = null) {
		$this->Classroom->id = $id;
		if (!$this->Classroom->exists()) {
			throw new NotFoundException(__('Invalid classroom'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Classroom->delete()) {
			return $this->flash(__('The classroom has been deleted.'), array('action' => 'index'));
		} else {
			return $this->flash(__('The classroom could not be deleted. Please, try again.'), array('action' => 'index'));
		}
	}
}
