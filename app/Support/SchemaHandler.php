<?php

namespace App\Support\Voyager;

class SchemaHandler{
    protected $types = [
        'string' => ['name' => 'string', 'length' => 255],
        'text' => ['name' => 'text'],
        'mediumText' => ['name' => 'mediumText'],
        'longText' => ['name' => 'longText'],
        'integer' => ['name' => 'integer'],
        'bigInteger' => ['name' => 'bigInteger'],
        'float' => ['name' => 'float'],
        'double' => ['name' => 'double'],
        'decimal' => ['name' => 'decimal', 'length' => 8, 'precision' => 2],
        'boolean' => ['name' => 'boolean'],
        'date' => ['name' => 'date'],
        'dateTime' => ['name' => 'dateTime'],
        'timestamp' => ['name' => 'timestamp'],
        'time' => ['name' => 'time'],
        'binary' => ['name' => 'binary'],
        'json' => ['name' => 'json'],
        'jsonb' => ['name' => 'jsonb'],
    ];

    public function getTypes()
    {
        return $this->types;
    }

    public function getType($type)
    {
        return $this->types[$type] ?? null;
    }

    public function hasType($type)
    {
        return isset($this->types[$type]);
    }

    public function getDatabaseType($type, $platform = null)
    {
        return $this->types[$type]['name'] ?? 'string';
    }

    public function getPlatformTypes()
    {
        return array_keys($this->types);
    }

    public function registerCustomType($name, $options)
    {
        $this->types[$name] = $options;
    }
}