<?php

namespace TCG\Voyager\Database\Types\Common;

use TCG\Voyager\Database\Types\Type;

class DoubleType extends Type
{
    public const NAME = 'double';

    public function getName()
    {
        return static::NAME;
    }

    /**
     * Get the platform specific type
     */
    public static function getPlatformType($platform)
    {
        $platformName = $platform->getName();
        
        $typeMapping = [
            'mysql' => 'DOUBLE',
            'pgsql' => 'DOUBLE PRECISION',
            'sqlite' => 'REAL',
            'sqlsrv' => 'FLOAT(53)',
        ];

        return $typeMapping[$platformName] ?? static::NOT_SUPPORTED;
    }

    /**
     * Get default options for this type
     */
    public function getDefaultOptions()
    {
        return [
            'type' => 'number',
            'step' => 'any',
            'precision' => 53,
            'category' => 'Numbers'
        ];
    }
}