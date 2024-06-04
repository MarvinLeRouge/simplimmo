<?php
namespace Simplimmo\Core;

class Model {
    protected array $defaults = [];

    public function __construct($data = []) {
        foreach($data as $key => $value) {
            $this->{$key} = $value ?? $this->defaults[$key] ?? null;
        }        
    }
}