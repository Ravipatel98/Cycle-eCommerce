<?php

class collection {

    public $items = array();
    //add array using index
    public function add($primary_key, $item) {
        $this->items[$primary_key] = $item;
    }

    //remove element using index
    public function remove($primary_key) {
        if (isset($this->items[$primary_key])) {
            unset($this->items[$primary_key]);
        }
    }
    //get element using index
    public function get($primary_key) {
        if (isset($this->items[$primary_key])) {
            return($this->items[$primary_key]);
        }
    }
    //count elements in the array
    public function count() {
        return count($this->items);
    }

}
