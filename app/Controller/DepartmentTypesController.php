<?php
App::uses('AppController', 'Controller');
/**
 * DepartmentTypes Controller
 *
 * @property DepartmentType $DepartmentType
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class DepartmentTypesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->DepartmentType->recursive = 0;
		$this->set('departmentTypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->DepartmentType->exists($id)) {
			throw new NotFoundException(__('Invalid department type'));
		}
		$options = array('conditions' => array('DepartmentType.' . $this->DepartmentType->primaryKey => $id));
		$this->set('departmentType', $this->DepartmentType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->DepartmentType->create();
			if ($this->DepartmentType->save($this->request->data)) {
				$this->Session->setFlash(__('The department type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The department type could not be saved. Please, try again.'));
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
		if (!$this->DepartmentType->exists($id)) {
			throw new NotFoundException(__('Invalid department type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->DepartmentType->save($this->request->data)) {
				$this->Session->setFlash(__('The department type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The department type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('DepartmentType.' . $this->DepartmentType->primaryKey => $id));
			$this->request->data = $this->DepartmentType->find('first', $options);
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
		$this->DepartmentType->id = $id;
		if (!$this->DepartmentType->exists()) {
			throw new NotFoundException(__('Invalid department type'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->DepartmentType->delete()) {
			$this->Session->setFlash(__('The department type has been deleted.'));
		} else {
			$this->Session->setFlash(__('The department type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * manager_index method
 *
 * @return void
 */
	public function manager_index() {
		$this->DepartmentType->recursive = 0;
		$this->set('departmentTypes', $this->Paginator->paginate());
	}

/**
 * manager_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function manager_view($id = null) {
		if (!$this->DepartmentType->exists($id)) {
			throw new NotFoundException(__('Invalid department type'));
		}
		$options = array('conditions' => array('DepartmentType.' . $this->DepartmentType->primaryKey => $id));
		$this->set('departmentType', $this->DepartmentType->find('first', $options));
	}

/**
 * manager_add method
 *
 * @return void
 */
	public function manager_add() {
		if ($this->request->is('post')) {
			$this->DepartmentType->create();
			if ($this->DepartmentType->save($this->request->data)) {
				$this->Session->setFlash(__('The department type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The department type could not be saved. Please, try again.'));
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
		if (!$this->DepartmentType->exists($id)) {
			throw new NotFoundException(__('Invalid department type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->DepartmentType->save($this->request->data)) {
				$this->Session->setFlash(__('The department type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The department type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('DepartmentType.' . $this->DepartmentType->primaryKey => $id));
			$this->request->data = $this->DepartmentType->find('first', $options);
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
		$this->DepartmentType->id = $id;
		if (!$this->DepartmentType->exists()) {
			throw new NotFoundException(__('Invalid department type'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->DepartmentType->delete()) {
			$this->Session->setFlash(__('The department type has been deleted.'));
		} else {
			$this->Session->setFlash(__('The department type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
