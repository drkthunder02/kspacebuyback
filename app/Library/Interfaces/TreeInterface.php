<?php

namespace App\Library\Interfaces;

interface TreeInterface {

    /**
     * Add a node to a tree
     */
    public function add($data, $toParent);

    /**
     * Remomve a node from a tree
     */
    public function remove($data, $fromParent);

    /**
     * Return the data if it is contained in the tree
     */
    public function contains($data) : mixed;

    /**
     * Traverse the tree from the bottom up
     */
    public function traverseDepthFirst() : mixed;

    /**
     * Traverse the tree from the top down
     */
    public function traverseBreadthFirst() : mixed;
}

?>