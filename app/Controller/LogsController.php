<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppController', 'Controller');

/**
 * CakePHP LogsController
 * @author NguyenThai
 */
class LogsController extends AppController {

    public function admin_index() {
        $this->Log->recursive = 0;
        $logs = $this->Paginator->paginate();
        $this->set('logs', $logs);
    }

    public function admin_delete($id) {
        
    }

    public function getLogs($limits = 5) {
        $this->layout = 'ajax';
        $logs = $this->Log->find('all', array('limit' => $limits, 'recursive' => 0, 'conditions' => array('Log.read' => 0)));

        $this->set('logs', $logs);
        if (!empty($logs)) {
            $logIds = Set::classicExtract($logs, '{n}.Log.id');
            $this->Log->updateAll(array('read' => 1), array('Log.id' => $logIds));
        }
    }

}
