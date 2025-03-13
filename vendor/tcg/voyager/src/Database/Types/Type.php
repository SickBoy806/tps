<?php

namespace TCG\Voyager\Database\Types;

use TCG\Voyager\Database\Platforms\Platform;
use TCG\Voyager\Database\Schema\SchemaManager;
use Illuminate\Support\Collection;

abstract class Type
{
    protected static $customTypesRegistered = false;
    protected static $platformTypeMapping = [];
    protected static $allTypes = [];
    protected static $platformTypes = [];
    protected static $customTypeOptions = [];
    protected static $typeCategories = [];
    protected static $registeredTypes = [];

    public const NAME = 'UNDEFINED_TYPE_NAME';
    public const NOT_SUPPORTED = 'notSupported';
    public const NOT_SUPPORT_INDEX = 'notSupportIndex';

    /**
     * Get the database type name
     */
    public function getName()
    {
        return static::NAME;
    }

    /**
     * Convert type to array representation
     */
    public static function toArray($type)
    {
        if (is_array($type)) {
            return array_merge(['name' => 'unknown'], $type);
        }

        // ✅ Ensure $customOptions exists to prevent "undeclared property" error
        $customTypeOptions = property_exists($type, 'customOptions') ? $type::$customOptions : [];

        return array_merge([
            'name' => method_exists($type, 'getName') ? $type->getName() : class_basename($type),
        ], $customTypeOptions);
    }

    /**
     * Register custom platform types
     */
    public static function registerCustomPlatformTypes($force = false)
    {
        if (static::$customTypesRegistered && !$force) {
            return;
        }

        $platform = SchemaManager::getDatabaseConnection()->getDriverName();
        $platformName = ucfirst($platform);

        $customTypes = array_merge(
            static::getPlatformCustomTypes('Common'),
            static::getPlatformCustomTypes($platformName)
        );

        foreach ($customTypes as $type) {
            $name = $type::NAME;
            static::registerType($name, $type);
        }

        static::addCustomTypeOptions($platformName);

        static::$customTypesRegistered = true;
    }

    /**
     * Register a new type
     */
    public static function registerType($name, $typeClass)
    {
        static::$registeredTypes[$name] = $typeClass;

        // ✅ Ensure every type class has a $customOptions property
        if (!property_exists($typeClass, 'customOptions')) {
            $typeClass::$customOptions = [];
        }
    }

    /**
     * Add custom type options
     */
    protected static function addCustomTypeOptions($platformName)
    {
        static::registerCommonCustomTypeOptions();
        Platform::registerPlatformCustomTypeOptions($platformName);

        foreach (static::$customTypeOptions as $option) {
            foreach ($option['types'] as $type) {
                if (isset(static::$registeredTypes[$type])) {
                    $typeClass = static::$registeredTypes[$type];

                    // ✅ Ensure $customOptions exists to prevent "undeclared property" error
                    if (!property_exists($typeClass, 'customOptions')) {
                        $typeClass::$customOptions = [];
                    }

                    $typeClass::$customOptions[$option['name']] = $option['value'];
                }
            }
        }
    }
    public static function getPlatformTypes()
{
    return [
        'bigint',
        'binary',
        'boolean',
        'char',
        'date',
        'datetime',
        'decimal',
        'float',
        'integer',
        'json',
        'longtext',
        'mediumint',
        'mediumtext',
        'set',
        'smallint',
        'string',
        'text',
        'time',
        'timestamp',
        'tinyint',
        'uuid',
        'enum',
    ];
}

}

