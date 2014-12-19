<?php

App::uses('AppController', 'Controller');

/**
 * Certs Controller
 *
 * @property Cert $Cert
 * @property PaginatorComponent $Paginator
 */
class CertsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    public function student_request() {
        $this->request->data['Cert']['student_id'] = $this->UserAuth->getUserId();
        $this->Cert->create();
        if ($this->Cert->save($this->request->data)) {
            $this->Session->setFlash('Đã gửi yêu cầu thành công.', 'alert', array('class' => 'alert-success'));
            $this->redirect(array('controller' => 'dashboards', 'action' => 'home'));
        }
    }

    public function jqgridcrud() {
        $this->autoRender = false;
        $this->layout = 'ajax';

        /* thêm dòng mới với post data
          name:Kỹ năng blabla
          so_tiet_ly_thuyet:2
          so_tiet_thuc_hanh:4
          chapter_type_id:1
          description:bla bla
          oper:add
          id:_empty
         *          */

        /* sửa dòng */
        if ($this->request->data['oper'] == 'edit') {
            $data = array(
                'id' => $this->request->data['id'],
                'cert_no' => $this->request->data['cert_no'],
                'cert_date' => $this->request->data['cert_date'],
                'da_in' => $this->request->data['da_in'],
                'recieved' => $this->request->data['recieved'],
            );
            if ($this->Cert->save($data)) {
                echo $this->Cert->id;
            } else {
                $this->response->statusCode('500');
            }
        }

        /* xóa dòng */
        if ($this->request->data['oper'] == 'del') {
            $id = explode(',', $this->request->data['id']);
            try {
                $this->Cert->deleteAll(array('Cert.id' => $id));
                $this->response->statusCode('200');
            } catch (Exception $exc) {
                $this->response->statusCode('500');
                echo $exc->getTraceAsString();
            }
        }
    }

    /**
     * manager_index method
     *
     * @return void
     */
    public function manager_index() {
        $conditions = array();
        if (isset($this->request->query['_search']) && $this->request->query['_search']) {
            if (!empty($this->request->query['filters'])) {
                $searchoptions = json_decode($this->request->query['filters'], true);
                $condition = array();
                foreach ($searchoptions['rules'] as $rule) {
                    if ($rule['op'] == 'cn') {
                        $condition = Set::merge($condition, array('Cert.' . $rule['field'] . ' like' => '%' . $rule['data'] . '%'));
                    }
                    if ($rule['op'] == 'nc') {
                        $condition = Set::merge($condition, array('Cert.' . $rule['field'] . ' not like' => '%' . $rule['data'] . '%'));
                    }
                    if ($rule['op'] == 'eq') {
                        $condition = Set::merge($condition, array('Cert.' . $rule['field'] => $rule['data']));
                    }
                }
                $conditions = array($searchoptions['groupOp'] => $condition);
                debug($conditions);die;
            }
        }
        $sord = "asc";
        $page = 0;
        $limit = 10;
        $sidx = "Cert.cert_no";
        if (!empty($this->request->query)) {
            $page = $this->request->query['page']; // get the requested page
            $limit = $this->request->query['rows']; // get how many rows we want to have into the grid
            if (!empty($this->request->query['sidx'])) {
                $sidx = $this->request->query['sidx'];
            }// get index row - i.e. user click to sort
            if (!empty($this->request->query['sord'])) {
                $sord = $this->request->query['sord']; // get the direction
            }
        }
        $count = $this->Cert->find('count', $conditions);
        if ($count > 0) {
            $total_pages = ceil($count / $limit);
        } else {
            $total_pages = 0;
        }
        if ($page > $total_pages) {
            $page = $total_pages;
        }
        $offset = $limit * $page - $limit; // do not put $limit*($page - 1)

        $responce->page = $page;
        $responce->total = $total_pages;
        $responce->records = $count;

        $rows = $this->Cert->find('all', array(
            'contain' => array('Student' => array('fields' => array('id', 'name', 'username'))),
            'limit' => $limit, //int
            'page' => $page, //int
            'offset' => $offset, //int,
            'order' => array($sidx => $sord),
            'conditions' => $conditions
        ));
        $i = 0;
        foreach ($rows as $row) {
            $responce->rows[$i]['id'] = $row['Cert']['id'];
            $responce->rows[$i]['cell'] = array(
                $row['Cert']['id'],
                $row['Student']['username'],
                $row['Student']['name'],
                $row['Cert']['cert_no'],
                $row['Cert']['cert_date'],
                $row['Cert']['created'],
                $row['Cert']['da_in'],
                $row['Cert']['recieved']
            );
            $i++;
        }

        $this->set('responce', $responce);
        if ($this->request->is('ajax')) {
            $this->render('manager_index');
        }
    }

    /**
     * manager_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function manager_view($id = null) {
        if (!$this->Cert->exists($id)) {
            throw new NotFoundException(__('Invalid cert'));
        }
        $options = array('conditions' => array('Cert.' . $this->Cert->primaryKey => $id));
        $this->set('cert', $this->Cert->find('first', $options));
    }

    /**
     * manager_add method
     *
     * @return void
     */
    public function manager_add() {
        if ($this->request->is('post')) {
            $this->Cert->create();
            if ($this->Cert->save($this->request->data)) {
                return $this->flash(__('The cert has been saved.'), array('action' => 'index'));
            }
        }
        $students = $this->Cert->Student->find('list');
        $this->set(compact('students'));
    }

    /**
     * manager_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function manager_edit($id = null) {
        if (!$this->Cert->exists($id)) {
            throw new NotFoundException(__('Invalid cert'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Cert->save($this->request->data)) {
                return $this->flash(__('The cert has been saved.'), array('action' => 'index'));
            }
        } else {
            $options = array('conditions' => array('Cert.' . $this->Cert->primaryKey => $id));
            $this->request->data = $this->Cert->find('first', $options);
        }
        $students = $this->Cert->Student->find('list');
        $this->set(compact('students'));
    }

    /**
     * manager_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function manager_delete($id = null) {
        $this->Cert->id = $id;
        if (!$this->Cert->exists()) {
            throw new NotFoundException(__('Invalid cert'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Cert->delete()) {
            return $this->flash(__('The cert has been deleted.'), array('action' => 'index'));
        } else {
            return $this->flash(__('The cert could not be deleted. Please, try again.'), array('action' => 'index'));
        }
    }

}
