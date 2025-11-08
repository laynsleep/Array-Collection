<?php
require_once 'interfaces/ListInterface.php';

class Node {
    public mixed $value;
    public ?Node $next = null;
    public function __construct(mixed $value) {
        $this->value = $value;
    }
}

class LinkedList implements ListInterface {
    private ?Node $head = null;
    private int $count = 0;

    public function add(mixed $item): void {
        $node = new Node($item);
        if (!$this->head) {
            $this->head = $node;
        } else {
            $current = $this->head;
            while ($current->next !== null) {
                $current = $current->next;
            }
            $current->next = $node;
        }
        $this->count++;
    }

    public function get(int $index): mixed {
        $current = $this->head;
        for ($i = 0; $i < $index && $current !== null; $i++) {
            $current = $current->next;
        }
        return $current?->value ?? null;
    }

    public function remove(int $index): void {
        if (!$this->head) return;

        if ($index === 0) {
            $this->head = $this->head->next;
            return;
        }

        $current = $this->head;
        $prev = null;
        $i = 0;
        while ($current !== null && $i < $index) {
            $prev = $current;
            $current = $current->next;
            $i++;
        }

        if ($current !== null && $prev !== null) {
            $prev->next = $current->next;
            $current->next = null;
        }
    }

    public function isEmpty(): bool {
        return $this->head === null;
    }

    public function clear(): void {
        $this->head = null;
        $this->count = 0;
    }

    public function count(): int {
        return $this->count;
    }

    public function getIterator(): Traversable {
        $current = $this->head;
        while ($current !== null) {
            yield $current->value;
            $current = $current->next;
        }
    }
}

$myLinkedList = new LinkedList;
$myLinkedList->add(10);
$myLinkedList->add(20);
$myLinkedList->add(30);

echo $myLinkedList->get(2);
echo "\n";

foreach ($myLinkedList as $key => $value) {
    echo "{$key}: {$value}\n";
}