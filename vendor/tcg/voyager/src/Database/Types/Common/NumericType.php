<?php

namespace TCG\Voyager\Database\Types\Common;

use TCG\Voyager\Database\Types\Type;

class NumericType extends Type
{
    public const NAME = 'numeric';
    
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
     * @return float|null
     */
    public function convertToPHPValue($value)
    {
        if ($value === null) {
            return null;
        }

        return (float) $value;
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
        $precision = isset($fieldDeclaration['precision']) ? $fieldDeclaration['precision'] : 10;
        $scale = isset($fieldDeclaration['scale']) ? $fieldDeclaration['scale'] : 0;
        
        return "NUMERIC($precision, $scale)";
    }
}