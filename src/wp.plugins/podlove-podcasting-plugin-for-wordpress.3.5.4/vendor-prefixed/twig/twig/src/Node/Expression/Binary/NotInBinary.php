<?php

/*
 * This file is part of Twig.
 *
 * (c) Fabien Potencier
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PodlovePublisher_Vendor\Twig\Node\Expression\Binary;

use PodlovePublisher_Vendor\Twig\Compiler;
class NotInBinary extends \PodlovePublisher_Vendor\Twig\Node\Expression\Binary\AbstractBinary
{
    public function compile(\PodlovePublisher_Vendor\Twig\Compiler $compiler)
    {
        $compiler->raw('!PodlovePublisher_Vendor\\twig_in_filter(')->subcompile($this->getNode('left'))->raw(', ')->subcompile($this->getNode('right'))->raw(')');
    }
    public function operator(\PodlovePublisher_Vendor\Twig\Compiler $compiler)
    {
        return $compiler->raw('not in');
    }
}
@\class_alias('PodlovePublisher_Vendor\\Twig\\Node\\Expression\\Binary\\NotInBinary', 'PodlovePublisher_Vendor\\Twig_Node_Expression_Binary_NotIn');
