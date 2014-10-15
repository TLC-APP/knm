<?php
App::uses('AppController', 'Controller');
/**
 * Enrollments Controller
 *
 * @property Enrollment $Enrollment
 * @property PaginatorComponent $Paginator
 */
class EnrollmentsController extends AppController {

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
		$this->Enrollment->recursive = 0;
		$this->set('enrollments', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Enrollment->exists($id)) {
			throw new NotFoundException(__('Invalid enrollment'));
		}
		$options = array('conditions' => array('Enrollment.' . $this->Enrollment->primaryKey => $id));
		$this->set('enrollment', $this->Enrollment->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Enrollment->create();
			if ($this->Enrollment->save($this->request->data)) {
				return $this->flash(__('The enrollment has been saved.'), array('action' => 'index'));
			}
		}
		$feeHanglings = $this->Enrollment->FeeHangling->find('list');
		$absencePeriods = $this->Enrollment->AbsencePeriod->find('list');
		$absenceHandlings = $this->Enrollment->AbsenceHandling->find('list');
		$courses = $this->Enrollment->Course->find('list');
		$students = $this->Enrollment->Student->find('list');
		$this->set(compact('feeHanglings', 'absencePeriods', 'absenceHandlings', 'courses', 'students'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Enrollment->exists($id)) {
			throw new NotFoundException(__('Invalid enrollment'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Enrollment->save($this->request->data)) {
				return $this->flash(__('The enrollment has been saved.'), array('action' => 'index'));
			}
		} else {
			$options = array('conditions' => array('Enrollment.' . $this->Enrollment->primaryKey => $id));
			$this->request->data = $this->Enrollment->find('first', $options);
		}
		$feeHanglings = $this->Enrollment->FeeHangling->find('list');
		$absencePeriods = $this->Enrollment->AbsencePeriod->find('list');
		$absenceHandlings = $this->Enrollment->AbsenceHandling->find('list');
		$courses = $this->Enrollment->Course->find('list');
		$students = $this->Enrollment->Student->find('list');
		$this->set(compact('feeHanglings', 'absencePeriods', 'absenceHandlings', 'courses', 'students'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Enrollment->id = $id;
		if (!$this->Enrollment->exists()) {
			throw new NotFoundException(__('Invalid enrollment'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Enrollment->delete()) {
			return $this->flash(__('The enrollment has been deleted.'), array('action' => 'index'));
		} else {
			return $this->flash(__('The enrollment could not be deleted. Please, try again.'), array('action' => 'index'));
		}
	}

/**
 * manager_index method
 *
 * @return void
 */
	public function manager_index() {
		$this->Enrollment->recursive = 0;
		$this->set('enrollments', $this->Paginator->paginate());
	}

/**
 * manager_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function manager_view($id = null) {
		if (!$this->Enrollment->exists($id)) {
			throw new NotFoundException(__('Invalid enrollment'));
		}
		$options = array('conditions' => array('Enrollment.' . $this->Enrollment->primaryKey => $id));
		$this->set('enrollment', $this->Enrollment->find('first', $options));
	}

/**
 * manager_add method
 *
 * @return void
 */
	public function manager_add() {
		if ($this->request->is('post')) {
			$this->Enrollment->create();
			if ($this->Enrollment->save($this->request->data)) {
				return $this->flash(__('The enrollment has been saved.'), array('action' => 'index'));
			}
		}
		$feeHanglings = $this->Enrollment->FeeHangling->find('list');
		$absencePeriods = $this->Enrollment->AbsencePeriod->find('list');
		$absenceHandlings = $this->Enrollment->AbsenceHandling->find('list');
		$courses = $this->Enrollment->Course->find('list');
		$students = $this->Enrollment->Student->find('list');
		$this->set(compact('feeHanglings', 'absencePeriods', 'absenceHandlings', 'courses', 'students'));
	}

/**
 * manager_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function manager_edit($id = null) {
		if (!$this->Enrollment->exists($id)) {
			throw new NotFoundException(__('Invalid enrollment'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Enrollment->save($this->request->data)) {
				return $this->flash(__('The enrollment has been saved.'), array('action' => 'index'));
			}
		} else {
			$options = array('conditions' => array('Enrollment.' . $this->Enrollment->primaryKey => $id));
			$this->request->data = $this->Enrollment->find('first', $options);
		}
		$feeHanglings = $this->Enrollment->FeeHangling->find('list');
		$absencePeriods = $this->Enrollment->AbsencePeriod->find('list');
		$absenceHandlings = $this->Enrollment->AbsenceHandling->find('list');
		$courses = $this->Enrollment->Course->find('list');
		$students = $this->Enrollment->Student->find('list');
		$this->set(compact('feeHanglings', 'absencePeriods', 'absenceHandlings', 'courses', 'students'));
	}

/**
 * manager_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function manager_delete($id = null) {
		$this->Enrollment->id = $id;
		if (!$this->Enrollment->exists()) {
			throw new NotFoundException(__('Invalid enrollment'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Enrollment->delete()) {
			return $this->flash(__('The enrollment has been deleted.'), array('action' => 'index'));
		} else {
			return $this->flash(__('The enrollment could not be deleted. Please, try again.'), array('action' => 'index'));
		}
	}
}
