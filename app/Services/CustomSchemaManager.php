<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CustomSchemaManager
{
    public function listTableNames()
    {
        return Schema::getConnection()->getDoctrineSchemaManager()->listTableNames();
    }

    public function describeTable($tableName)
    {
        return DB::select("DESCRIBE {$tableName}");
    }

    public function getColumnType($tableName, $columnName)
    {
        $column = DB::select("SHOW COLUMNS FROM {$tableName} WHERE Field = ?", [$columnName]);
        return $column[0]->Type ?? null;
    }

    public function createTable($tableName, array $columns)
    {
        Schema::create($tableName, function ($table) use ($columns) {
            foreach ($columns as $column) {
                $this->addColumn($table, $column);
            }
        });
    }

    protected function addColumn($table, $column)
    {
        $type = strtolower($column['type']);
        $name = $column['name'];
        
        switch ($type) {
            case 'integer':
                $table->integer($name);
                break;
            case 'string':
                $length = $column['length'] ?? 255;
                $table->string($name, $length);
                break;
            case 'text':
                $table->text($name);
                break;
            case 'boolean':
                $table->boolean($name);
                break;
            case 'date':
                $table->date($name);
                break;
            case 'datetime':
                $table->datetime($name);
                break;
            case 'decimal':
                $precision = $column['precision'] ?? 8;
                $scale = $column['scale'] ?? 2;
                $table->decimal($name, $precision, $scale);
                break;
            // Add more types as needed
        }

        // Handle nullable
        if (isset($column['nullable']) && $column['nullable']) {
            $table->nullable();
        }

        // Handle default value
        if (isset($column['default'])) {
            $table->default($column['default']);
        }
    }

    public function alterTable($tableName, array $changes)
    {
        Schema::table($tableName, function ($table) use ($changes) {
            foreach ($changes as $change) {
                switch ($change['action']) {
                    case 'add':
                        $this->addColumn($table, $change['column']);
                        break;
                    case 'modify':
                        $table->change();
                        break;
                    case 'drop':
                        $table->dropColumn($change['column']);
                        break;
                }
            }
        });
    }

    public function dropTable($tableName)
    {
        Schema::dropIfExists($tableName);
    }
}