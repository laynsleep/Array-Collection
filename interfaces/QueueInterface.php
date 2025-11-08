<?php
require_once 'CollectionInterface.php';

interface QueueInterface extends Collection {
    public function enqueue(mixed $item): void;
    public function dequeue(): mixed;    
    public function peek(): mixed;
}