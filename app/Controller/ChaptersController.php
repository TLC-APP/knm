<?php
App::uses('AppController', 'Controller');
/**
 * Chapters Controller
 *
 * @property Chapter $Chapter
 * @property PaginatorComponent $Paginator
 */
class ChaptersController extends AppController {

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
		$this->Chapter->recursive = 0;
		$this->set('chapters', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Chapter->exists($id)) {
			throw new NotFoundException(__('Invalid chapter'));
		}
		$options = array('conditions' => array('Chapter.' . $this->Chapter->primaryKey => $id));
		$this->set('chapter', $this->Chapter->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Chapter->create();
			if ($this->Chapter->save($this->request->data)) {
				$this->Session->setFlash('Đã lưu chuyên đề thành công','alert',array('plugin'=>'BoostCake','class'=>'alert-success'));
                                $this->redirect(array('action'=>'index'));
                                
                        }
		}
		$chapterTypes = $this->Chapter->ChapterType->find('list');
		$departments = $this->Chapter->Department->find('list');
		$users = $this->Chapter->User->find('list');
		$this->set(compact('chapterTypes', 'departments', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Chapter->exists($id)) {
			throw new NotFoundException(__('Invalid chapter'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Chapter->save($this->request->data)) {
				return $this->flash(__('The chapter has been saved.'), array('action' => 'index'));
			}
		} else {
			$options = array('conditions' => array('Chapter.' . $this->Chapter->primaryKey => $id));
			$this->request->data = $this->Chapter->find('first', $options);
		}
		$chapterTypes = $this->Chapter->ChapterType->find('list');
		$departments = $this->Chapter->Department->find('list');
		$users = $this->Chapter->User->find('list');
		$this->set(compact('chapterTypes', 'departments', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Chapter->id = $id;
		if (!$this->Chapter->exists()) {
			throw new NotFoundException(__('Invalid chapter'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Chapter->delete()) {
			return $this->flash(__('The chapter has been deleted.'), array('action' => 'index'));
		} else {
			return $this->flash(__('The chapter could not be deleted. Please, try again.'), array('action' => 'index'));
		}
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Chapter->recursive = 0;
		$this->set('chapters', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Chapter->exists($id)) {
			throw new NotFoundException(__('Invalid chapter'));
		}
		$options = array('conditions' => array('Chapter.' . $this->Chapter->primaryKey => $id));
		$this->set('chapter', $this->Chapter->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Chapter->create();
			if ($this->Chapter->save($this->request->data)) {
				return $this->flash(__('The chapter has been saved.'), array('action' => 'index'));
			}
		}
		$chapterTypes = $this->Chapter->ChapterType->find('list');
		$departments = $this->Chapter->Department->find('list');
		$users = $this->Chapter->User->find('list');
		$this->set(compact('chapterTypes', 'departments', 'users'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Chapter->exists($id)) {
			throw new NotFoundException(__('Invalid chapter'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Chapter->save($this->request->data)) {
				return $this->flash(__('The chapter has been saved.'), array('action' => 'index'));
			}
		} else {
			$options = array('conditions' => array('Chapter.' . $this->Chapter->primaryKey => $id));
			$this->request->data = $this->Chapter->find('first', $options);
		}
		$chapterTypes = $this->Chapter->ChapterType->find('list');
		$departments = $this->Chapter->Department->find('list');
		$users = $this->Chapter->User->find('list');
		$this->set(compact('chapterTypes', 'departments', 'users'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Chapter->id = $id;
		if (!$this->Chapter->exists()) {
			throw new NotFoundException(__('Invalid chapter'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Chapter->delete()) {
			return $this->flash(__('The chapter has been deleted.'), array('action' => 'index'));
		} else {
			return $this->flash(__('The chapter could not be deleted. Please, try again.'), array('action' => 'index'));
		}
	}
}
