<?php

/*
 * This file is part of Twig.
 *
 * (c) Fabien Potencier
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PodlovePublisher_Vendor\Twig\Node\Expression\Filter;

use PodlovePublisher_Vendor\Twig\Compiler;
use PodlovePublisher_Vendor\Twig\Node\Expression\ConditionalExpression;
use PodlovePublisher_Vendor\Twig\Node\Expression\ConstantExpression;
use PodlovePublisher_Vendor\Twig\Node\Expression\FilterExpression;
use PodlovePublisher_Vendor\Twig\Node\Expression\GetAttrExpression;
use PodlovePublisher_Vendor\Twig\Node\Expression\NameExpression;
use PodlovePublisher_Vendor\Twig\Node\Expression\Test\DefinedTest;
use PodlovePublisher_Vendor\Twig\Node\Node;
/**
 * Returns the value or the default value when it is undefined or empty.
 *
 *  {{ var.foo|default('foo item on var is not defined') }}
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class DefaultFilter extends \PodlovePublisher_Vendor\Twig\Node\Expression\FilterExpression
{
    public function __construct(\PodlovePublisher_Vendor\Twig\Node\Node $node, \PodlovePublisher_Vendor\Twig\Node\Expression\ConstantExpression $filterName, \PodlovePublisher_Vendor\Twig\Node\Node $arguments, int $lineno, string $tag = null)
    {
        $default = new \PodlovePublisher_Vendor\Twig\Node\Expression\FilterExpression($node, new \PodlovePublisher_Vendor\Twig\Node\Expression\ConstantExpression('default', $node->getTemplateLine()), $arguments, $node->getTemplateLine());
        if ('default' === $filterName->getAttribute('value') && ($node instanceof \PodlovePublisher_Vendor\Twig\Node\Expression\NameExpression || $node instanceof \PodlovePublisher_Vendor\Twig\Node\Expression\GetAttrExpression)) {
            $test = new \PodlovePublisher_Vendor\Twig\Node\Expression\Test\DefinedTest(clone $node, 'defined', new \PodlovePublisher_Vendor\Twig\Node\Node(), $node->getTemplateLine());
            $false = \count($arguments) ? $arguments->getNode(0) : new \PodlovePublisher_Vendor\Twig\Node\Expression\ConstantExpression('', $node->getTemplateLine());
            $node = new \PodlovePublisher_Vendor\Twig\Node\Expression\ConditionalExpression($test, $default, $false, $node->getTemplateLine());
        } else {
            $node = $default;
        }
        parent::__construct($node, $filterName, $arguments, $lineno, $tag);
    }
    public function compile(\PodlovePublisher_Vendor\Twig\Compiler $compiler)
    {
        $compiler->subcompile($this->getNode('node'));
    }
}
@\class_alias('PodlovePublisher_Vendor\\Twig\\Node\\Expression\\Filter\\DefaultFilter', 'PodlovePublisher_Vendor\\Twig_Node_Expression_Filter_Default');
