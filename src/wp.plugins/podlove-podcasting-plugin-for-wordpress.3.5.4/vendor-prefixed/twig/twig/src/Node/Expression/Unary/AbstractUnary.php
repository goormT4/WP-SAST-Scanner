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
use PodlovePublisher_Vendor\Twig\Node\Expression\AbstractExpression;
use PodlovePublisher_Vendor\Twig\Node\Node;
abstract class AbstractUnary extends \PodlovePublisher_Vendor\Twig\Node\Expression\AbstractExpression
{
    public function __construct(\PodlovePublisher_Vendor\Twig\Node\Node $node, int $lineno)
    {
        parent::__construct(['node' => $node], [], $lineno);
    }
    public function compile(\PodlovePublisher_Vendor\Twig\Compiler $compiler)
    {
        $compiler->raw(' ');
        $this->operator($compiler);
        $compiler->subcompile($this->getNode('node'));
    }
    public abstract function operator(\PodlovePublisher_Vendor\Twig\Compiler $compiler);
}
@\class_alias('PodlovePublisher_Vendor\\Twig\\Node\\Expression\\Unary\\AbstractUnary', 'PodlovePublisher_Vendor\\Twig_Node_Expression_Unary');
