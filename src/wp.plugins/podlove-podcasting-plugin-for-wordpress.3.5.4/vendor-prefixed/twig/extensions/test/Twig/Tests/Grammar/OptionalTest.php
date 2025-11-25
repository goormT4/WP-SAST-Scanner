<?php

namespace PodlovePublisher_Vendor;

/*
 * This file is part of Twig.
 *
 * (c) Fabien Potencier
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
class Twig_Tests_Grammar_OptionalTest extends \PodlovePublisher_Vendor\PHPUnit\Framework\TestCase
{
    public function testMagicToString()
    {
        $grammar = new \PodlovePublisher_Vendor\Twig_Extensions_Grammar_Optional(new \PodlovePublisher_Vendor\Twig_Extensions_Grammar_Constant('foo'), new \PodlovePublisher_Vendor\Twig_Extensions_Grammar_Number('bar'));
        $this->assertEquals('[foo <bar:number>]', (string) $grammar);
    }
}
/*
 * This file is part of Twig.
 *
 * (c) Fabien Potencier
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
@\class_alias('PodlovePublisher_Vendor\\Twig_Tests_Grammar_OptionalTest', 'Twig_Tests_Grammar_OptionalTest', \false);
