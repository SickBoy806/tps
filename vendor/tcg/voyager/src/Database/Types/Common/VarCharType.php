<?php

namespace TCG\Voyager\Database\Types\Common;

use TCG\Voyager\Database\Types\Type;

class VarCharType extends Type
{
    public const NAME = 'varchar';
    
    /**
     * Get the type name
     *
     * @return string
     */
    public function getName()
    {
        return static::NAME;
    }

    /**
     * Convert database value to PHP value
     *
     * @param mixed $value
     * @return string|null
     */
    public function convertToPHPValue($value)
    {
        if ($value === null) {
            return null;
        }

        return (string) $value;
    }

    /**
     * Convert PHP value to database value
     *
     * @param mixed $value
     * @return string|null
     */
    public function convertToDatabaseValue($value)
    {
        if ($value === null) {
            return null;
        }

        return (string) $value;
    }

    /**
     * Get the SQL declaration
     *
     * @param array $fieldDeclaration
     * @return string
     */
    public function getSQLDeclaration(array $fieldDeclaration)
    {
        $length = isset($fieldDeclaration['length']) ? $fieldDeclaration['length'] : 255;
        
        return "VARCHAR($length)";
    }

    /**
     * Get the default length for this type
     *
     * @return int
     */
    public function getDefaultLength()
    {
        return 255;
    }
}



