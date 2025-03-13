<?php

namespace TCG\Voyager\Database\Schema;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class Table
{
    public static function make($table)
    {
        if (!is_array($table)) {
            $table = json_decode($table, true);
        }

        $name = Identifier::validate($table['name'], 'Table');

        $columns = [];
        foreach ($table['columns'] as $columnArr) {
            $column = Column::make($columnArr, $table['name']);
            $columns[$column->getName()] = $column;
        }

        $indexes = [];
        foreach ($table['indexes'] as $indexArr) {
            $index = Index::make($indexArr);
            $indexes[$index->getName()] = $index;
        }

        $foreignKeys = [];
        foreach ($table['foreignKeys'] as $foreignKeyArr) {
            $foreignKey = ForeignKey::make($foreignKeyArr);
            $foreignKeys[$foreignKey->getName()] = $foreignKey;
        }

        $options = $table['options'];

        return new self($name, $columns, $indexes, [], $foreignKeys, $options);
    }

    public static function createTable($tableName, $columns, $indexes = [], $foreignKeys = [])
    {
        Schema::create($tableName, function (Blueprint $table) use ($columns, $indexes, $foreignKeys) {
            foreach ($columns as $column) {
                $table->addColumn($column->getType(), $column->getName(), $column->getOptions());
            }

            foreach ($indexes as $index) {
                $table->index($index->getColumns(), $index->getName());
            }

            foreach ($foreignKeys as $foreignKey) {
                $table->foreign($foreignKey->getColumns())->references($foreignKey->getForeignColumns())->on($foreignKey->getForeignTable());
            }
        });
    }

    public static function dropTable($tableName)
    {
        Schema::dropIfExists($tableName);
    }

    public static function renameTable($oldName, $newName)
    {
        Schema::rename($oldName, $newName);
    }

    public function toJson()
{
    return json_encode($this->toArray());
}

public function toArray()
{
    return [
        'name'        => $this->name ?? '',
        'columns'     => $this->exportColumnsToArray(),
        'indexes'     => $this->exportIndexesToArray(),
        'foreignKeys' => $this->exportForeignKeysToArray(),
        'options'     => $this->options ?? [],
    ];
}

public function exportColumnsToArray()
{
    $exportedColumns = [];

    foreach (Schema::getColumnListing($this->name) as $column) {
        $exportedColumns[] = [
            'name'    => $column,
            'type'    => Schema::getColumnType($this->name, $column),
            'options' => [],
        ];
    }

    return $exportedColumns;
}

public function exportIndexesToArray()
{
    return [];
}

public function exportForeignKeysToArray()
{
    return [];
}

    public static function tableExists($tableName)
    {
        return Schema::hasTable($tableName);
    }

    public static function getColumnsIndexes($tableName, $columns)
    {
        return Schema::getColumnListing($tableName);
    }

    public static function getTableDetails($tableName)
    {
        return [
            'columns' => Schema::getColumnListing($tableName),
            'indexes' => Schema::getConnection()->getDoctrineSchemaManager()->listTableIndexes($tableName),
        ];
    }

    public function __get($property)
    {
        $getter = 'get' . ucfirst($property);
    
        // ✅ Check if method exists before calling
        if (method_exists($this, $getter)) {
            return $this->$getter();
        }
    
        // ✅ Check if property exists before accessing
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    
        // ❌ Instead of throwing an error, return null or log a warning
        return null;
    }
}    