<?php

/*
 * This file is part of Twig.
 *
 * (c) Fabien Potencier
 * (c) Armin Ronacher
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PodlovePublisher_Vendor\Twig\Node\Expression\Unary;

use PodlovePublisher_Vendor\Twig\Compiler;
class NotUnary extends \PodlovePublisher_Vendor\Twig\Node\Expression\Unary\AbstractUnary
{
    public function operator(\PodlovePublisher_Vendor\Twig\Compiler $compiler)
    {
        $compiler->raw('!');
    }
}
@\class_alias('PodlovePublisher_Vendor\\Twig\\Node\\Expression\\Unary\\NotUnary', 'PodlovePublisher_Vendor\\Twig_Node_Expression_Unary_Not');
