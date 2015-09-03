<?php

class Photo extends AppModel {
	public $validate = array(
        'filename' => array(
            'rule' => 'notBlank'
        ),
        'title' => array(
            'rule' => 'notBlank'
        ),
        'body' => array(
            'rule' => 'notBlank'
        )
    );
}