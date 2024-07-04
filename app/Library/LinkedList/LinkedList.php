<?php

namespace App\Library\LinkedList;

//Interface
use App\Library\Interfaces\LinkedListInterface;

//Internal Library
use App\Library\Helpers\LinkedList\ListNode;

class LinkedList {
    private $firstNode = null;

    /**
     * Add a new node to the list
     * 
     * @param data
     */
    public function insert($data) {
        $newNode = new ListNode($data);

        if($this->firstNode === null) {
            $this->firstNode = $newNode;
        } else {
            $currentNode = $this->firstNode;
            while($currentNode->next !== null) {
                $currentNode = $currentNode->next;
            }
            $currentNode->next = $newNode;
        }
    }

    /**
     * Traverse the list
     * 
     * @return echo
     */
    public function traverse() {
        $currentNode = $this->firstNode;
        while($currentNode !== null) {
            echo $currentNode->data . "\n";
            $currentNode = $currentNode->next;
        }
    }

    /**
     * Delete a node from the list
     * 
     * @param data
     */
    public function delete($data) {
        $current = $this->firstNode;
        $prev = null;
        while($current !== null) {
            if($current->data === $data) {
                if($prev === null) {
                    $this->firstNode = $current->next;
                } else {
                    $prev->next = $current->next;
                }

                return;
            }

            $prev = $current;
            $current = $current->next;
        }
    }
}

?>