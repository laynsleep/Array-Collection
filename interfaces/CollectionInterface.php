<?php

interface Collection extends Countable {
    public function clear(): void;
    public function isEmpty(): bool;
}