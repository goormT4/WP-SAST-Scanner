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
class ConditionalExpression extends \PodlovePublisher_Vendor\Twig\Node\Expression\AbstractExpression
{
    public function __construct(\PodlovePublisher_Vendor\Twig\Node\Expression\AbstractExpression $expr1, \PodlovePublisher_Vendor\Twig\Node\Expression\AbstractExpression $expr2, \PodlovePublisher_Vendor\Twig\Node\Expression\AbstractExpression $expr3, int $lineno)
    {
        parent::__construct(['expr1' => $expr1, 'expr2' => $expr2, 'expr3' => $expr3], [], $lineno);
    }
    public function compile(\PodlovePublisher_Vendor\Twig\Compiler $compiler)
    {
        $compiler->raw('((')->subcompile($this->getNode('expr1'))->raw(') ? (')->subcompile($this->getNode('expr2'))->raw(') : (')->subcompile($this->getNode('expr3'))->raw('))');
    }
}
@\class_alias('PodlovePublisher_Vendor\\Twig\\Node\\Expression\\ConditionalExpression', 'PodlovePublisher_Vendor\\Twig_Node_Expression_Conditional');
