<?php

class PostsController extends AppController {
    public $helpers = array('Html', 'Form');
    public $components = array('Flash');

    public function index() {
         $this->set('posts', $this->Post->find('all'));
    }

    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('post', $post);
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
            $this->Post->create();

            
            if ($this->Post->save($this->request->data)) {
                $this->Flash->set(__('Your post has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->set(__('Unable to add your post.'));
        }
    }

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Post->id = $id;
            if ($this->Post->save($this->request->data)) {
                $this->Flash->set(__('Your post has been updated.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->set(__('Unable to update your post.'));
        }

        if (!$this->request->data) {
            $this->request->data = $post;
        }
    }

    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Post->delete($id)) {
            $this->Flash->set(
                __('The post with id: %s has been deleted.', h($id))
            );
        } else {
            $this->Flash->set(
                __('The post with id: %s could not be deleted.', h($id))
            );
        }

        return $this->redirect(array('action' => 'index'));
    }
}