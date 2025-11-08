<?php
require_once 'interfaces/CollectionInterface.php';

class Stack implements Collection {
    private array $stack = [];

    public function push(mixed $item): void {
        $this->stack[] = $item;
    }
    public function pop(): mixed {
        return array_pop($this->stack); // menghapus elemen terakhir
    }
    public function peek(): mixed {
        return end($this->stack); // lihat elemen terakhir tanpa hapus
    }

    public function isEmpty(): bool {
        return empty($this->stack);
    }
    public function clear(): void {
        $this->stack = [];
    }
    public function count(): int {
        return count($this->stack);
    }

    public function getIterator(): Traversable {
        return new ArrayIterator($this->stack);
    }
}

$myStack = new Stack;
$myStack->push(10);
$myStack->push(20);
$myStack->push(30);

echo $myStack->peek();
echo "\n";
echo $myStack->pop();
echo "\n";
echo $myStack->pop();
echo "\n";
echo $myStack->pop();
echo "\n";
var_dump($myStack->isEmpty());