<?php
/* Autoloader for phpMyAdmin and its dependencies */

require_once '/usr/share/php/Fedora/Autoloader/autoload.php';
\Fedora\Autoloader\Autoload::addPsr4('PhpMyAdmin\\',        dirname(__DIR__) . '/libraries/classes');
\Fedora\Autoloader\Autoload::addPsr4('PhpMyAdmin\\Setup\\', dirname(__DIR__) . '/setup/lib');
\Fedora\Autoloader\Dependencies::required([
    '/usr/share/php/PhpMyAdmin/SqlParser/autoload.php',
    '/usr/share/php/PhpMyAdmin/MoTranslator/autoload.php',
    '/usr/share/php/PhpMyAdmin/ShapeFile/autoload.php',
    '/usr/share/php/phpseclib/autoload.php',
    '/usr/share/php/ReCaptcha/autoload.php',
    '/usr/share/php/Psr/Container/autoload.php',
    '/usr/share/php/Twig/autoload.php',
    '/usr/share/php/Twig/Extensions/autoload.php',
    [
        '/usr/share/php/Symfony3/Component/ExpressionLanguage/autoload.php',
        '/usr/share/php/Symfony/Component/ExpressionLanguage/autoload.php',
    ],
    '/usr/share/php/Symfony/Polyfill/autoload.php',
]);
\Fedora\Autoloader\Dependencies::optional([
    '/usr/share/php/tcpdf/autoload.php',
    '/usr/share/php/PragmaRX/Google2FA/autoload.php',
    '/usr/share/php/BaconQrCode/autoload.php',
    '/usr/share/php/Samyoul/U2F/U2FServer/autoload.php',
]);
