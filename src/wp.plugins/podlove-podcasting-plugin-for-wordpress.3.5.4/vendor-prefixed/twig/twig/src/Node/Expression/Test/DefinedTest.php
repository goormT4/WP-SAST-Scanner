<?php

/*
 * This file is part of Twig.
 *
 * (c) Fabien Potencier
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PodlovePublisher_Vendor\Twig\Node\Expression\Test;

use PodlovePublisher_Vendor\Twig\Compiler;
use PodlovePublisher_Vendor\Twig\Error\SyntaxError;
use PodlovePublisher_Vendor\Twig\Node\Expression\ArrayExpression;
use PodlovePublisher_Vendor\Twig\Node\Expression\BlockReferenceExpression;
use PodlovePublisher_Vendor\Twig\Node\Expression\ConstantExpression;
use PodlovePublisher_Vendor\Twig\Node\Expression\FunctionExpression;
use PodlovePublisher_Vendor\Twig\Node\Expression\GetAttrExpression;
use PodlovePublisher_Vendor\Twig\Node\Expression\MethodCallExpression;
use PodlovePublisher_Vendor\Twig\Node\Expression\NameExpression;
use PodlovePublisher_Vendor\Twig\Node\Expression\TestExpression;
use PodlovePublisher_Vendor\Twig\Node\Node;
/**
 * Checks if a variable is defined in the current context.
 *
 *    {# defined works with variable names and variable attributes #}
 *    {% if foo is defined %}
 *        {# ... #}
 *    {% endif %}
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class DefinedTest extends \PodlovePublisher_Vendor\Twig\Node\Expression\TestExpression
{
    public function __construct(\PodlovePublisher_Vendor\Twig\Node\Node $node, string $name, \PodlovePublisher_Vendor\Twig\Node\Node $arguments = null, int $lineno)
    {
        if ($node instanceof \PodlovePublisher_Vendor\Twig\Node\Expression\NameExpression) {
            $node->setAttribute('is_defined_test', \true);
        } elseif ($node instanceof \PodlovePublisher_Vendor\Twig\Node\Expression\GetAttrExpression) {
            $node->setAttribute('is_defined_test', \true);
            $this->changeIgnoreStrictCheck($node);
        } elseif ($node instanceof \PodlovePublisher_Vendor\Twig\Node\Expression\BlockReferenceExpression) {
            $node->setAttribute('is_defined_test', \true);
        } elseif ($node instanceof \PodlovePublisher_Vendor\Twig\Node\Expression\FunctionExpression && 'constant' === $node->getAttribute('name')) {
            $node->setAttribute('is_defined_test', \true);
        } elseif ($node instanceof \PodlovePublisher_Vendor\Twig\Node\Expression\ConstantExpression || $node instanceof \PodlovePublisher_Vendor\Twig\Node\Expression\ArrayExpression) {
            $node = new \PodlovePublisher_Vendor\Twig\Node\Expression\ConstantExpression(\true, $node->getTemplateLine());
        } elseif ($node instanceof \PodlovePublisher_Vendor\Twig\Node\Expression\MethodCallExpression) {
            $node->setAttribute('is_defined_test', \true);
        } else {
            throw new \PodlovePublisher_Vendor\Twig\Error\SyntaxError('The "defined" test only works with simple variables.', $lineno);
        }
        parent::__construct($node, $name, $arguments, $lineno);
    }
    private function changeIgnoreStrictCheck(\PodlovePublisher_Vendor\Twig\Node\Expression\GetAttrExpression $node)
    {
        $node->setAttribute('optimizable', \false);
        $node->setAttribute('ignore_strict_check', \true);
        if ($node->getNode('node') instanceof \PodlovePublisher_Vendor\Twig\Node\Expression\GetAttrExpression) {
            $this->changeIgnoreStrictCheck($node->getNode('node'));
        }
    }
    public function compile(\PodlovePublisher_Vendor\Twig\Compiler $compiler)
    {
        $compiler->subcompile($this->getNode('node'));
    }
}
@\class_alias('PodlovePublisher_Vendor\\Twig\\Node\\Expression\\Test\\DefinedTest', 'PodlovePublisher_Vendor\\Twig_Node_Expression_Test_Defined');
