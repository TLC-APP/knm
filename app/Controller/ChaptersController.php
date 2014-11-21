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
    public $components = array('Paginator', 'RequestHandler');

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
        if ($this->request->data['oper'] == 'add') {
            $data = array(
                'name' => $this->request->data['name'],
                'so_tiet_ly_thuyet' => $this->request->data['so_tiet_ly_thuyet'],
                'so_tiet_thuc_hanh' => $this->request->data['so_tiet_thuc_hanh'],
                'chapter_type_id' => $this->request->data['chapter_type_id'],
                'description' => $this->request->data['description'],
            );
            $this->Chapter->create();
            if ($this->Chapter->save($data)) {
                echo $this->Chapter->id;
            } else {
                $this->response->statusCode('500');
            }
        }
        /* sửa dòng */
        if ($this->request->data['oper'] == 'edit') {
            $data = array(
                'id' => $this->request->data['id'],
                'name' => $this->request->data['name'],
                'so_tiet_ly_thuyet' => $this->request->data['so_tiet_ly_thuyet'],
                'so_tiet_thuc_hanh' => $this->request->data['so_tiet_thuc_hanh'],
                'chapter_type_id' => $this->request->data['chapter_type_id'],
                'description' => $this->request->data['description'],
            );
            if ($this->Chapter->save($data)) {
                echo $this->Chapter->id;
            } else {
                $this->response->statusCode('500');
            }
        }

        /* xóa dòng */
        if ($this->request->data['oper'] == 'del') {
            $id = explode(',', $this->request->data['id']);
            try {
                $this->Chapter->deleteAll(array('Chapter.id' => $id));
                $this->response->statusCode('200');
            } catch (Exception $exc) {
                $this->response->statusCode('500');
                echo $exc->getTraceAsString();
            }
        }
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $conditions = array();
        if (isset($this->request->query['_search']) && $this->request->query['_search']) {
            if (!empty($this->request->query['filters'])) {
                $searchoptions = json_decode($this->request->query['filters'], true);
                $condition = array();
                foreach ($searchoptions['rules'] as $rule) {
                    if ($rule['op'] == 'cn') {
                        $condition = Set::merge($condition, array('Chapter.' . $rule['field'].' like' => '%'.$rule['data'].'%'));
                    }
                    if ($rule['op'] == 'nc') {
                        $condition = Set::merge($condition, array('Chapter.' . $rule['field'].' not like' => '%'.$rule['data'].'%'));
                    }
                    if ($rule['op'] == 'eq') {
                        $condition = Set::merge($condition, array('Chapter.' . $rule['field'] => $rule['data']));
                    }
                }
                $conditions = array($searchoptions['groupOp'] => $condition);
                //debug($conditions);die;
            }
        }
        $sord = "asc";
        $page = 0;
        $limit = 10;
        $sidx = "Chapter.name";
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
        $count = $this->Chapter->find('count',$conditions);
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

        $rows = $this->Chapter->find('all', array(
            'recursive' => 0, //int
            'limit' => $limit, //int
            'page' => $page, //int
            'offset' => $offset, //int,
            'order' => array($sidx => $sord),
            'conditions' => $conditions
        ));
        $i = 0;
        foreach ($rows as $row) {
            $responce->rows[$i]['id'] = $row['Chapter']['id'];
            $responce->rows[$i]['cell'] = array(
                $row['Chapter']['id'],
                $row['Chapter']['name'],
                $row['Chapter']['so_tiet_ly_thuyet'],
                $row['Chapter']['so_tiet_thuc_hanh'],
                $row['ChapterType']['name'],
                $row['Chapter']['description']
            );
            $i++;
        }

        $this->set('responce', $responce);
        if ($this->request->is('ajax')) {
            $this->render('index');
        }
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
                $this->Session->setFlash('Đã lưu chuyên đề thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                $this->redirect(array('action' => 'index'));
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
