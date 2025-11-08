<?php
require_once 'interfaces/MapInterface.php';

class HashMap implements MapInterface {
    private array $items = [];

    public function put(mixed $key, mixed $value): void {
        $this->items[$key] = $value;
    }
    public function remove(mixed $key): void {
        unset($this->items[$key]);
    }
    public function get(mixed $key): mixed {
        return $this->items[$key] ?? null;
    }
    public function hasKey(mixed $key): bool {
        return array_key_exists($key, $this->items);
    }
    public function hasValue(mixed $value): bool {
        return in_array($value, $this->items, true);
    }
    public function keys(): array {
        return array_keys($this->items);
    }
    public function values(): array {
        return array_values($this->items);
    }

    public function clear(): void {
        $this->items = [];
    }
    public function isEmpty(): bool {
        return empty($this->items);
    }
    public function count(): int {
        return count($this->items);
    }

    public function getIterator(): Traversable {
        return new ArrayIterator($this->items);
    }
}

$myMap = new HashMap;
$myMap->put ("SATU", 10);
$myMap->put ("DUA", 20);
$myMap->put ("TIGA", 30);

foreach ($myMap as $key => $value){
    echo "{$key}: {$value}\n";
}

var_dump($myMap->haskey("TIGA"));
echo "\n";

$myArr = $myMap->values();
foreach($myArr as $item){
    echo "{$item}\n";
}