<?php

/*
 * This file is part of Twig.
 *
 * (c) Fabien Potencier
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PodlovePublisher_Vendor\Twig\TokenParser;

use PodlovePublisher_Vendor\Twig\Node\DeprecatedNode;
use PodlovePublisher_Vendor\Twig\Token;
/**
 * Deprecates a section of a template.
 *
 *    {% deprecated 'The "base.twig" template is deprecated, use "layout.twig" instead.' %}
 *    {% extends 'layout.html.twig' %}
 *
 * @author Yonel Ceruto <yonelceruto@gmail.com>
 *
 * @final
 */
class DeprecatedTokenParser extends \PodlovePublisher_Vendor\Twig\TokenParser\AbstractTokenParser
{
    public function parse(\PodlovePublisher_Vendor\Twig\Token $token)
    {
        $expr = $this->parser->getExpressionParser()->parseExpression();
        $this->parser->getStream()->expect(\PodlovePublisher_Vendor\Twig\Token::BLOCK_END_TYPE);
        return new \PodlovePublisher_Vendor\Twig\Node\DeprecatedNode($expr, $token->getLine(), $this->getTag());
    }
    public function getTag()
    {
        return 'deprecated';
    }
}
@\class_alias('PodlovePublisher_Vendor\\Twig\\TokenParser\\DeprecatedTokenParser', 'PodlovePublisher_Vendor\\Twig_TokenParser_Deprecated');
