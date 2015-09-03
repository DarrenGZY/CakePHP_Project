<?php

class PhotosController extends AppController {
    public $helpers = array('Html', 'Form');
    public $components = array('Flash'); // Session is replaced by Flash in 2.7+ version

    public function index() {
         $this->set('photos', $this->Photo->find('all'));
    }

    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid photo'));
        }

        $photo = $this->Photo->findById($id);
        if (!$photo) {
            throw new NotFoundException(__('Invalid photo'));
        }
        $this->set('photo', $photo);
    }

    public function resume(){
        $this->viewClass = 'Media';
        
        $params = array(
            'id'        => 'Resume.pdf',
            'name'      => 'Resume',
            'extension' => 'pdf',
            'path'      => 'files' . DS
        );
        $this->set($params);
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Photo->create();
            echo "<pre>";
            print_r($this->request->data);
            echo "</pre>";
            echo exec('whoami');

            $file = $this->request->data['Photo']['upload'];

            $dataArray = array(
                'filename' => $file['name'],
                'title' => $this->request->data['Photo']['title'],
                'body' => $this->request->data['Photo']['body'],
            );

            echo WWW_ROOT;
            move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/' . $file['name']);
            
            if ($this->Photo->save($dataArray)) {
                $this->Flash->set(__('Your photo has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->set(__('Unable to add your Photo.'));
        }
    }

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid photo'));
        }

        $photo = $this->Photo->findById($id);
        if (!$photo) {
            throw new NotFoundException(__('Invalid photo'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Photo->id = $id;
            if ($this->Photo->save($this->request->data)) {
                $this->Flash->set(__('Your photo has been updated.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->set(__('Unable to update your photo.'));
        }

        if (!$this->request->data) {
            $this->request->data = $photo;
        }
    }

    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Photo->delete($id)) {
            $this->Flash->set(
                __('The photo with id: %s has been deleted.', h($id))
            );
        } else {
            $this->Flash->set(
                __('The photo with id: %s could not be deleted.', h($id))
            );
        }

        return $this->redirect(array('action' => 'index'));
    }
}