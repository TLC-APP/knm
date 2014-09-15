<?php
App::uses('AppController', 'Controller');
/**
 * ChapterTypes Controller
 *
 * @property ChapterType $ChapterType
 * @property PaginatorComponent $Paginator
 */
class ChapterTypesController extends AppController {

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
		$this->ChapterType->recursive = 0;
		$this->set('chapterTypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ChapterType->exists($id)) {
			throw new NotFoundException(__('Invalid chapter type'));
		}
		$options = array('conditions' => array('ChapterType.' . $this->ChapterType->primaryKey => $id));
		$this->set('chapterType', $this->ChapterType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ChapterType->create();
			if ($this->ChapterType->save($this->request->data)) {
				return $this->flash(__('The chapter type has been saved.'), array('action' => 'index'));
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
		if (!$this->ChapterType->exists($id)) {
			throw new NotFoundException(__('Invalid chapter type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ChapterType->save($this->request->data)) {
				return $this->flash(__('The chapter type has been saved.'), array('action' => 'index'));
			}
		} else {
			$options = array('conditions' => array('ChapterType.' . $this->ChapterType->primaryKey => $id));
			$this->request->data = $this->ChapterType->find('first', $options);
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
		$this->ChapterType->id = $id;
		if (!$this->ChapterType->exists()) {
			throw new NotFoundException(__('Invalid chapter type'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ChapterType->delete()) {
			return $this->flash(__('The chapter type has been deleted.'), array('action' => 'index'));
		} else {
			return $this->flash(__('The chapter type could not be deleted. Please, try again.'), array('action' => 'index'));
		}
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->ChapterType->recursive = 0;
		$this->set('chapterTypes', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->ChapterType->exists($id)) {
			throw new NotFoundException(__('Invalid chapter type'));
		}
		$options = array('conditions' => array('ChapterType.' . $this->ChapterType->primaryKey => $id));
		$this->set('chapterType', $this->ChapterType->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->ChapterType->create();
			if ($this->ChapterType->save($this->request->data)) {
				return $this->flash(__('The chapter type has been saved.'), array('action' => 'index'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->ChapterType->exists($id)) {
			throw new NotFoundException(__('Invalid chapter type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ChapterType->save($this->request->data)) {
				return $this->flash(__('The chapter type has been saved.'), array('action' => 'index'));
			}
		} else {
			$options = array('conditions' => array('ChapterType.' . $this->ChapterType->primaryKey => $id));
			$this->request->data = $this->ChapterType->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->ChapterType->id = $id;
		if (!$this->ChapterType->exists()) {
			throw new NotFoundException(__('Invalid chapter type'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ChapterType->delete()) {
			return $this->flash(__('The chapter type has been deleted.'), array('action' => 'index'));
		} else {
			return $this->flash(__('The chapter type could not be deleted. Please, try again.'), array('action' => 'index'));
		}
	}
}
