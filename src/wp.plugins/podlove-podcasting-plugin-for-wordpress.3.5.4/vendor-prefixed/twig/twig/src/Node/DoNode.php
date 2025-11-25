<?php

/*
 * This file is part of Twig.
 *
 * (c) Fabien Potencier
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PodlovePublisher_Vendor\Twig\Node;

use PodlovePublisher_Vendor\Twig\Compiler;
use PodlovePublisher_Vendor\Twig\Node\Expression\AbstractExpression;
/**
 * Represents a do node.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class DoNode extends \PodlovePublisher_Vendor\Twig\Node\Node
{
    public function __construct(\PodlovePublisher_Vendor\Twig\Node\Expression\AbstractExpression $expr, int $lineno, string $tag = null)
    {
        parent::__construct(['expr' => $expr], [], $lineno, $tag);
    }
    public function compile(\PodlovePublisher_Vendor\Twig\Compiler $compiler)
    {
        $compiler->addDebugInfo($this)->write('')->subcompile($this->getNode('expr'))->raw(";\n");
    }
}
@\class_alias('PodlovePublisher_Vendor\\Twig\\Node\\DoNode', 'PodlovePublisher_Vendor\\Twig_Node_Do');
