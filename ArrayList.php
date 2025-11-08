<?php
require_once 'interfaces/ListInterface.php';

class ArrayList implements ListInterface {
    private array $array = [];
    // private int $position = 0;

    // List Method
    public function add(mixed $item): void {
        $this->array[] = $item;         // Menambahkan data ke dalam ArrayList
    }
    public function remove(int $index): void {
        unset($this->array[$index]);    // Menghapus data index ke-N
    }
    public function get(int $index): mixed {
        return $this->array[$index];    // Mengambil data index ke-N
    }
    
    // Collection Method
    public function isEmpty(): bool {
        return empty($this->array);     // Mengecek apakah array kosong
    }
    public function clear(): void {
        $this->array = [];              // Menghapus data array
    }
    public function count(): int {
        return count($this->array);     // Menghitung jumlah data
    }

    // Iterator Method
    public function getIterator(): Traversable {
        return new ArrayIterator($this->array);
    }

    // public function current(): mixed {
    //     return current($this->array);
    // }
    // public function key(): mixed {
    //     return key($this->array);
    // }
    // public function next(): void {
    //     $this->postition++;
    // }
    // public function rewind(): void {
    //     $this->position = 0;
    // }
    // public function valid(): bool {
    //     return key($this->array) !== null;
    // }
}

$myArr = new ArrayList;
$myArr->add(10);
$myArr->add(20);
$myArr->add(30);

$myArr->remove(0);

foreach($myArr as $key => $value){
    echo "{$key}: {$value}\n";
}

echo $myArr->get(1);
echo "\n";
echo $myArr->count();
echo "\n";
echo var_dump($myArr->isEmpty());
echo "\n";

$myArr->clear();
var_dump($myArr->isEmpty());
echo "\n";
