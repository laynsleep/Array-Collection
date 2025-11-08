<?php
require_once 'CollectionInterface.php';

interface MapInterface extends Collection {
    public function put(mixed $key, mixed $value): void;
    public function remove(mixed $key): void;
    public function get(mixed $key): mixed;
    public function hasKey(mixed $key): bool;
    public function hasValue(mixed $value): bool;
    public function keys(): array;
    public function values(): array;
}