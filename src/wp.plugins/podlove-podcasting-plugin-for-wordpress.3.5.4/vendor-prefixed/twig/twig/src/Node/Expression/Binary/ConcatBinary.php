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
namespace PodlovePublisher_Vendor\Twig\Node\Expression\Binary;

use PodlovePublisher_Vendor\Twig\Compiler;
class ConcatBinary extends \PodlovePublisher_Vendor\Twig\Node\Expression\Binary\AbstractBinary
{
    public function operator(\PodlovePublisher_Vendor\Twig\Compiler $compiler)
    {
        return $compiler->raw('.');
    }
}
@\class_alias('PodlovePublisher_Vendor\\Twig\\Node\\Expression\\Binary\\ConcatBinary', 'PodlovePublisher_Vendor\\Twig_Node_Expression_Binary_Concat');
