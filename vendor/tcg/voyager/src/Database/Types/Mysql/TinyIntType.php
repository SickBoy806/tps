<?php
namespace TCG\Voyager\Database\Types\Mysql;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use TCG\Voyager\Database\Types\Type;

class TinyIntType extends Type
{
    public const NAME = 'tinyint';

    // ✅ Add this missing static property to fix the error
    public static array $customOptions = [];

    public function getSQLDeclaration(array $field, AbstractPlatform $platform)
    {
        $commonIntegerTypeDeclaration = call_protected_method($platform, '_getCommonIntegerTypeDeclarationSQL', $field);
        return 'tinyint'.$commonIntegerTypeDeclaration;
    }
}


