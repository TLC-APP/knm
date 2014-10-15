<?php
App::uses('AppController', 'Controller');
/**
 * TeachingPlans Controller
 *
 * @property TeachingPlan $TeachingPlan
 * @property PaginatorComponent $Paginator
 */
class TeachingPlansController extends AppController {

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
		$this->TeachingPlan->recursive = 0;
		$this->set('teachingPlans', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TeachingPlan->exists($id)) {
			throw new NotFoundException(__('Invalid teaching plan'));
		}
		$options = array('conditions' => array('TeachingPlan.' . $this->TeachingPlan->primaryKey => $id));
		$this->set('teachingPlan', $this->TeachingPlan->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TeachingPlan->create();
			if ($this->TeachingPlan->save($this->request->data)) {
				return $this->flash(__('The teaching plan has been saved.'), array('action' => 'index'));
			}
		}
		$teachers = $this->TeachingPlan->Teacher->find('list');
		$this->set(compact('teachers'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->TeachingPlan->exists($id)) {
			throw new NotFoundException(__('Invalid teaching plan'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TeachingPlan->save($this->request->data)) {
				return $this->flash(__('The teaching plan has been saved.'), array('action' => 'index'));
			}
		} else {
			$options = array('conditions' => array('TeachingPlan.' . $this->TeachingPlan->primaryKey => $id));
			$this->request->data = $this->TeachingPlan->find('first', $options);
		}
		$teachers = $this->TeachingPlan->Teacher->find('list');
		$this->set(compact('teachers'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->TeachingPlan->id = $id;
		if (!$this->TeachingPlan->exists()) {
			throw new NotFoundException(__('Invalid teaching plan'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->TeachingPlan->delete()) {
			return $this->flash(__('The teaching plan has been deleted.'), array('action' => 'index'));
		} else {
			return $this->flash(__('The teaching plan could not be deleted. Please, try again.'), array('action' => 'index'));
		}
	}

/**
 * teacher_index method
 *
 * @return void
 */
	public function teacher_index() {
		$this->TeachingPlan->recursive = 0;
		$this->set('teachingPlans', $this->Paginator->paginate());
	}

/**
 * teacher_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function teacher_view($id = null) {
		if (!$this->TeachingPlan->exists($id)) {
			throw new NotFoundException(__('Invalid teaching plan'));
		}
		$options = array('conditions' => array('TeachingPlan.' . $this->TeachingPlan->primaryKey => $id));
		$this->set('teachingPlan', $this->TeachingPlan->find('first', $options));
	}

/**
 * teacher_add method
 *
 * @return void
 */
	public function teacher_add() {
		if ($this->request->is('post')) {
			$this->TeachingPlan->create();
			if ($this->TeachingPlan->save($this->request->data)) {
				return $this->flash(__('The teaching plan has been saved.'), array('action' => 'index'));
			}
		}
		$teachers = $this->TeachingPlan->Teacher->find('list');
		$this->set(compact('teachers'));
	}

/**
 * teacher_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function teacher_edit($id = null) {
		if (!$this->TeachingPlan->exists($id)) {
			throw new NotFoundException(__('Invalid teaching plan'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TeachingPlan->save($this->request->data)) {
				return $this->flash(__('The teaching plan has been saved.'), array('action' => 'index'));
			}
		} else {
			$options = array('conditions' => array('TeachingPlan.' . $this->TeachingPlan->primaryKey => $id));
			$this->request->data = $this->TeachingPlan->find('first', $options);
		}
		$teachers = $this->TeachingPlan->Teacher->find('list');
		$this->set(compact('teachers'));
	}

/**
 * teacher_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function teacher_delete($id = null) {
		$this->TeachingPlan->id = $id;
		if (!$this->TeachingPlan->exists()) {
			throw new NotFoundException(__('Invalid teaching plan'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->TeachingPlan->delete()) {
			return $this->flash(__('The teaching plan has been deleted.'), array('action' => 'index'));
		} else {
			return $this->flash(__('The teaching plan could not be deleted. Please, try again.'), array('action' => 'index'));
		}
	}
}
