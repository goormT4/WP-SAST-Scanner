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
class ConstantExpression extends \PodlovePublisher_Vendor\Twig\Node\Expression\AbstractExpression
{
    public function __construct($value, int $lineno)
    {
        parent::__construct([], ['value' => $value], $lineno);
    }
    public function compile(\PodlovePublisher_Vendor\Twig\Compiler $compiler)
    {
        $compiler->repr($this->getAttribute('value'));
    }
}
@\class_alias('PodlovePublisher_Vendor\\Twig\\Node\\Expression\\ConstantExpression', 'PodlovePublisher_Vendor\\Twig_Node_Expression_Constant');
