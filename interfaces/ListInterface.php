<?php

interface ListInterface extends Collection {
    public function add(mixed $item): void;
    public function remove(int $index): void;
    public function get(int $index):mixed;
}