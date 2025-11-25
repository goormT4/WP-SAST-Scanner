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
class Twig_Tests_Grammar_BooleanTest extends \PodlovePublisher_Vendor\PHPUnit\Framework\TestCase
{
    public function testMagicToString()
    {
        $grammar = new \PodlovePublisher_Vendor\Twig_Extensions_Grammar_Boolean('foo');
        $this->assertEquals('<foo:boolean>', (string) $grammar);
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
@\class_alias('PodlovePublisher_Vendor\\Twig_Tests_Grammar_BooleanTest', 'Twig_Tests_Grammar_BooleanTest', \false);
