<?php

namespace App\Library\LinkedList;

class NTreeNode {
    private $parent;
    private $child;
    private $data;

    public function __construct($data = null) {
        $this->data = $data;
        $this->parent = $parent;
        $this->child = array();
    }
}

?>