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
namespace PodlovePublisher_Vendor\Twig\TokenParser;

use PodlovePublisher_Vendor\Twig\Error\SyntaxError;
use PodlovePublisher_Vendor\Twig\Node\Node;
use PodlovePublisher_Vendor\Twig\Token;
/**
 * Extends a template by another one.
 *
 *  {% extends "base.html" %}
 */
final class ExtendsTokenParser extends \PodlovePublisher_Vendor\Twig\TokenParser\AbstractTokenParser
{
    public function parse(\PodlovePublisher_Vendor\Twig\Token $token)
    {
        $stream = $this->parser->getStream();
        if ($this->parser->peekBlockStack()) {
            throw new \PodlovePublisher_Vendor\Twig\Error\SyntaxError('Cannot use "extend" in a block.', $token->getLine(), $stream->getSourceContext());
        } elseif (!$this->parser->isMainScope()) {
            throw new \PodlovePublisher_Vendor\Twig\Error\SyntaxError('Cannot use "extend" in a macro.', $token->getLine(), $stream->getSourceContext());
        }
        if (null !== $this->parser->getParent()) {
            throw new \PodlovePublisher_Vendor\Twig\Error\SyntaxError('Multiple extends tags are forbidden.', $token->getLine(), $stream->getSourceContext());
        }
        $this->parser->setParent($this->parser->getExpressionParser()->parseExpression());
        $stream->expect(\PodlovePublisher_Vendor\Twig\Token::BLOCK_END_TYPE);
        return new \PodlovePublisher_Vendor\Twig\Node\Node();
    }
    public function getTag()
    {
        return 'extends';
    }
}
@\class_alias('PodlovePublisher_Vendor\\Twig\\TokenParser\\ExtendsTokenParser', 'PodlovePublisher_Vendor\\Twig_TokenParser_Extends');
