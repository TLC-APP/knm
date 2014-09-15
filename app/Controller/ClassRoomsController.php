<?php
App::uses('AppController', 'Controller');
/**
 * ClassRooms Controller
 *
 * @property ClassRoom $ClassRoom
 * @property PaginatorComponent $Paginator
 */
class ClassRoomsController extends AppController {

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
		$this->ClassRoom->recursive = 0;
		$this->set('classRooms', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ClassRoom->exists($id)) {
			throw new NotFoundException(__('Invalid class room'));
		}
		$options = array('conditions' => array('ClassRoom.' . $this->ClassRoom->primaryKey => $id));
		$this->set('classRoom', $this->ClassRoom->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ClassRoom->create();
			if ($this->ClassRoom->save($this->request->data)) {
				return $this->flash(__('The class room has been saved.'), array('action' => 'index'));
			}
		}
		$departments = $this->ClassRoom->Department->find('list');
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
		if (!$this->ClassRoom->exists($id)) {
			throw new NotFoundException(__('Invalid class room'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ClassRoom->save($this->request->data)) {
				return $this->flash(__('The class room has been saved.'), array('action' => 'index'));
			}
		} else {
			$options = array('conditions' => array('ClassRoom.' . $this->ClassRoom->primaryKey => $id));
			$this->request->data = $this->ClassRoom->find('first', $options);
		}
		$departments = $this->ClassRoom->Department->find('list');
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
		$this->ClassRoom->id = $id;
		if (!$this->ClassRoom->exists()) {
			throw new NotFoundException(__('Invalid class room'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ClassRoom->delete()) {
			return $this->flash(__('The class room has been deleted.'), array('action' => 'index'));
		} else {
			return $this->flash(__('The class room could not be deleted. Please, try again.'), array('action' => 'index'));
		}
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->ClassRoom->recursive = 0;
		$this->set('classRooms', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->ClassRoom->exists($id)) {
			throw new NotFoundException(__('Invalid class room'));
		}
		$options = array('conditions' => array('ClassRoom.' . $this->ClassRoom->primaryKey => $id));
		$this->set('classRoom', $this->ClassRoom->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->ClassRoom->create();
			if ($this->ClassRoom->save($this->request->data)) {
				return $this->flash(__('The class room has been saved.'), array('action' => 'index'));
			}
		}
		$departments = $this->ClassRoom->Department->find('list');
		$this->set(compact('departments'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->ClassRoom->exists($id)) {
			throw new NotFoundException(__('Invalid class room'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ClassRoom->save($this->request->data)) {
				return $this->flash(__('The class room has been saved.'), array('action' => 'index'));
			}
		} else {
			$options = array('conditions' => array('ClassRoom.' . $this->ClassRoom->primaryKey => $id));
			$this->request->data = $this->ClassRoom->find('first', $options);
		}
		$departments = $this->ClassRoom->Department->find('list');
		$this->set(compact('departments'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->ClassRoom->id = $id;
		if (!$this->ClassRoom->exists()) {
			throw new NotFoundException(__('Invalid class room'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ClassRoom->delete()) {
			return $this->flash(__('The class room has been deleted.'), array('action' => 'index'));
		} else {
			return $this->flash(__('The class room could not be deleted. Please, try again.'), array('action' => 'index'));
		}
	}
}
