<?php

namespace App\Library\Interfaces;

interface LinkedListInterface {
    /**
     * Insert data in the list
     */
    public function insert($data);

    /**
     * Append to the list
     */
    public function append($data);

    /**
     * Delete from the linked list
     */
    public function delete($data);

    /**
     * Display the linked list
     */
    public function display();
}

?>