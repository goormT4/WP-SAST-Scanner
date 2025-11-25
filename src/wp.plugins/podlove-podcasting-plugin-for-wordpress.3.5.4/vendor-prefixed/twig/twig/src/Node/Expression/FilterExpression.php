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
namespace PodlovePublisher_Vendor\Twig\Node\Expression;

use PodlovePublisher_Vendor\Twig\Compiler;
use PodlovePublisher_Vendor\Twig\Node\Node;
class FilterExpression extends \PodlovePublisher_Vendor\Twig\Node\Expression\CallExpression
{
    public function __construct(\PodlovePublisher_Vendor\Twig\Node\Node $node, \PodlovePublisher_Vendor\Twig\Node\Expression\ConstantExpression $filterName, \PodlovePublisher_Vendor\Twig\Node\Node $arguments, int $lineno, string $tag = null)
    {
        parent::__construct(['node' => $node, 'filter' => $filterName, 'arguments' => $arguments], [], $lineno, $tag);
    }
    public function compile(\PodlovePublisher_Vendor\Twig\Compiler $compiler)
    {
        $name = $this->getNode('filter')->getAttribute('value');
        $filter = $compiler->getEnvironment()->getFilter($name);
        $this->setAttribute('name', $name);
        $this->setAttribute('type', 'filter');
        $this->setAttribute('needs_environment', $filter->needsEnvironment());
        $this->setAttribute('needs_context', $filter->needsContext());
        $this->setAttribute('arguments', $filter->getArguments());
        $this->setAttribute('callable', $filter->getCallable());
        $this->setAttribute('is_variadic', $filter->isVariadic());
        $this->compileCallable($compiler);
    }
}
@\class_alias('PodlovePublisher_Vendor\\Twig\\Node\\Expression\\FilterExpression', 'PodlovePublisher_Vendor\\Twig_Node_Expression_Filter');
