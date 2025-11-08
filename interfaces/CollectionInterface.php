<?php

interface Collection extends Countable, IteratorAggregate {
    public function clear(): void;
    public function isEmpty(): bool;
}