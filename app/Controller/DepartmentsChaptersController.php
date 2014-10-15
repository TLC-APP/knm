<?php
App::uses('AppController', 'Controller');
/**
 * DepartmentsChapters Controller
 *
 * @property DepartmentsChapter $DepartmentsChapter
 * @property PaginatorComponent $Paginator
 */
class DepartmentsChaptersController extends AppController {

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
		$this->DepartmentsChapter->recursive = 0;
		$this->set('departmentsChapters', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->DepartmentsChapter->exists($id)) {
			throw new NotFoundException(__('Invalid departments chapter'));
		}
		$options = array('conditions' => array('DepartmentsChapter.' . $this->DepartmentsChapter->primaryKey => $id));
		$this->set('departmentsChapter', $this->DepartmentsChapter->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->DepartmentsChapter->create();
			if ($this->DepartmentsChapter->save($this->request->data)) {
				return $this->flash(__('The departments chapter has been saved.'), array('action' => 'index'));
			}
		}
		$chapters = $this->DepartmentsChapter->Chapter->find('list');
		$departments = $this->DepartmentsChapter->Department->find('list');
		$this->set(compact('chapters', 'departments'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->DepartmentsChapter->exists($id)) {
			throw new NotFoundException(__('Invalid departments chapter'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->DepartmentsChapter->save($this->request->data)) {
				return $this->flash(__('The departments chapter has been saved.'), array('action' => 'index'));
			}
		} else {
			$options = array('conditions' => array('DepartmentsChapter.' . $this->DepartmentsChapter->primaryKey => $id));
			$this->request->data = $this->DepartmentsChapter->find('first', $options);
		}
		$chapters = $this->DepartmentsChapter->Chapter->find('list');
		$departments = $this->DepartmentsChapter->Department->find('list');
		$this->set(compact('chapters', 'departments'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->DepartmentsChapter->id = $id;
		if (!$this->DepartmentsChapter->exists()) {
			throw new NotFoundException(__('Invalid departments chapter'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->DepartmentsChapter->delete()) {
			return $this->flash(__('The departments chapter has been deleted.'), array('action' => 'index'));
		} else {
			return $this->flash(__('The departments chapter could not be deleted. Please, try again.'), array('action' => 'index'));
		}
	}

/**
 * manager_index method
 *
 * @return void
 */
	public function manager_index() {
		$this->DepartmentsChapter->recursive = 0;
		$this->set('departmentsChapters', $this->Paginator->paginate());
	}

/**
 * manager_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function manager_view($id = null) {
		if (!$this->DepartmentsChapter->exists($id)) {
			throw new NotFoundException(__('Invalid departments chapter'));
		}
		$options = array('conditions' => array('DepartmentsChapter.' . $this->DepartmentsChapter->primaryKey => $id));
		$this->set('departmentsChapter', $this->DepartmentsChapter->find('first', $options));
	}

/**
 * manager_add method
 *
 * @return void
 */
	public function manager_add() {
		if ($this->request->is('post')) {
			$this->DepartmentsChapter->create();
			if ($this->DepartmentsChapter->save($this->request->data)) {
				return $this->flash(__('The departments chapter has been saved.'), array('action' => 'index'));
			}
		}
		$chapters = $this->DepartmentsChapter->Chapter->find('list');
		$departments = $this->DepartmentsChapter->Department->find('list');
		$this->set(compact('chapters', 'departments'));
	}

/**
 * manager_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function manager_edit($id = null) {
		if (!$this->DepartmentsChapter->exists($id)) {
			throw new NotFoundException(__('Invalid departments chapter'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->DepartmentsChapter->save($this->request->data)) {
				return $this->flash(__('The departments chapter has been saved.'), array('action' => 'index'));
			}
		} else {
			$options = array('conditions' => array('DepartmentsChapter.' . $this->DepartmentsChapter->primaryKey => $id));
			$this->request->data = $this->DepartmentsChapter->find('first', $options);
		}
		$chapters = $this->DepartmentsChapter->Chapter->find('list');
		$departments = $this->DepartmentsChapter->Department->find('list');
		$this->set(compact('chapters', 'departments'));
	}

/**
 * manager_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function manager_delete($id = null) {
		$this->DepartmentsChapter->id = $id;
		if (!$this->DepartmentsChapter->exists()) {
			throw new NotFoundException(__('Invalid departments chapter'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->DepartmentsChapter->delete()) {
			return $this->flash(__('The departments chapter has been deleted.'), array('action' => 'index'));
		} else {
			return $this->flash(__('The departments chapter could not be deleted. Please, try again.'), array('action' => 'index'));
		}
	}
}
