<?php
require_once 'interfaces/QueueInterface.php';

class Queue implements QueueInterface {
    private array $queue = [];

    public function enqueue(mixed $item): void {
        $this->queue[] = $item; // tambahkan di belakang
    }
    public function dequeue(): mixed {
        return array_shift($this->queue); // hapus dari depan
    }
    public function peek(): mixed {
        return $this->queue[0] ?? null; // lihat elemen depan
    }

    public function isEmpty(): bool {
        return empty($this->queue);
    }
    public function clear(): void {
        $this->queue = [];
    }
    public function count(): int {
        return count($this->queue);
    }

    public function getIterator(): Traversable {
        return new ArrayIterator($this->queue);
    }
}

$myQueue = new Queue;
$myQueue->enqueue(10);
$myQueue->enqueue(20);
$myQueue->enqueue(30);

echo $myQueue->peek();
echo "\n";

$myQueue->dequeue();
echo $myQueue->peek();
echo "\n";
