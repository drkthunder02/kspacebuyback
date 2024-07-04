<?php

namespace App\Library\LinkedList;

/**
 * List node to add data to a linked list
 */

class ListNode {
    public $data = NULL;
    public $next = NULL;

    public function __construct($data = NULL) {
        $this->data = $data;
    }
}