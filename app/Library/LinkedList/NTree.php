<?php

namespace App\Library\LinkedList;

use App\Library\Interfaces\TreeInterface;
use App\Library\LinkedList\NTreeNode;

class NTree implements TreeInterface {
    private NtreeNode $node;
    private $root;
    private $levels;

    /**
     * Constructor
     */
    public function __construct($data) {
        $node = new NTreeNode($data);
        $this->root = $node;
        $this->levels = 0;
    }

    /**
     * Add a node to the tree
     */
    public function add($data, $toParent) {
        $child = new NTreeNode($data);
        $parent = false;
        $results = $this->traverseBreadthFirst();

        foreach($results as $result) {
            //Add as child to node
            $result->children[] = $child;

            //Add a node as child's parent
            $child->parent = $result->data;

            //Update parent
            $parent = true;
        }

        if($parent == false) {
            echo "Error: Cannot add node to non-existent parent.";
        }
    }
    
    /**
     * Remove a node from the tree
     */
    public function remove($data, $fromParent) {
        $results = $this->traverseBreadthFirst();
        foreach($results as $result) {
            if($result->data == $fromParent) {
                $i = 0;
                foreach($result->children as $child) {
                    if($child->data == $data) {
                        unset($result->children[$i]);
                        break;
                    }
                    $i++;
                }
            }
        }
    }

    /**
     * Return the data if it is contained in the tree
     * 
     * @param data
     * @return result
     */
    public function contains($data) {
        $results = $this->traverseBreadthFirst();
        foreach($results as $result) {
            if($result->data == $data) {
                return $result;
            }
        }
    }

    /**
     * Recursive function for depth first search
     * 
     * @param currentNode
     * @param results
     * @return results
     */
    private function recurse($currentNode, &$results = array()) {
        $length = count($currentNode->children);
        for ($i = 0; $i < $length; $i++) {
            $results[] = $currentNode->children[$i];
            recurse($currentNode->children[$i], $results);
        }
    }

    /**
     * Traverse the tree from the bottm up
     * 
     * @return results
     */
    public function traverseDepthFirst() {
        recurse($this->root, $results);
        return $results;
    }

    /**
     * Search the tree from the top down
     * 
     * @return results
     */
    function traverseBreadthFirst() {
        $queue = array();
        $queueIndex = 1;
        $results = array();

        array_push($queue, $this->root);
        array_push($results, $this->root);

        $currentTree = $queue[0];
        unset($queue[0]);

        while($currentTree) {
            $length = count($currentTree->children);
            for ($i = 0; $i < $length; $i++) {
                array_push($queue, $currentTree->children[$i]);
                array_push($results, $currentTree->children[$i]);
            }
            if(count($queue) > 0) {
                $currentTree = $queue[$queueIndex];
                unset($queue[$queueIndex]);
            } else {
                $currentTree = false;
            }
            $queueIndex++;
        }
        return $results;
    }
}

?>