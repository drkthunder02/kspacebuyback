<?php

namespace App\Library\LinkedList;

class DoublyNode { 
    public $data; 
    public $next; 
    public $prev; 
  
    public function __construct($data) { 
        $this->data = $data; 
        $this->next = null; 
        $this->prev = null; 
    } 
}