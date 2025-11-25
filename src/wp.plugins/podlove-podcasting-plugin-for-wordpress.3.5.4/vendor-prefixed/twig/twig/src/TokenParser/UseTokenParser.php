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

use PodlovePublisher_Vendor\Twig\Error\SyntaxError;
use PodlovePublisher_Vendor\Twig\Node\Expression\ConstantExpression;
use PodlovePublisher_Vendor\Twig\Node\Node;
use PodlovePublisher_Vendor\Twig\Token;
/**
 * Imports blocks defined in another template into the current template.
 *
 *    {% extends "base.html" %}
 *
 *    {% use "blocks.html" %}
 *
 *    {% block title %}{% endblock %}
 *    {% block content %}{% endblock %}
 *
 * @see https://twig.symfony.com/doc/templates.html#horizontal-reuse for details.
 */
final class UseTokenParser extends \PodlovePublisher_Vendor\Twig\TokenParser\AbstractTokenParser
{
    public function parse(\PodlovePublisher_Vendor\Twig\Token $token)
    {
        $template = $this->parser->getExpressionParser()->parseExpression();
        $stream = $this->parser->getStream();
        if (!$template instanceof \PodlovePublisher_Vendor\Twig\Node\Expression\ConstantExpression) {
            throw new \PodlovePublisher_Vendor\Twig\Error\SyntaxError('The template references in a "use" statement must be a string.', $stream->getCurrent()->getLine(), $stream->getSourceContext());
        }
        $targets = [];
        if ($stream->nextIf('with')) {
            do {
                $name = $stream->expect(
                    /* Token::NAME_TYPE */
                    5
                )->getValue();
                $alias = $name;
                if ($stream->nextIf('as')) {
                    $alias = $stream->expect(
                        /* Token::NAME_TYPE */
                        5
                    )->getValue();
                }
                $targets[$name] = new \PodlovePublisher_Vendor\Twig\Node\Expression\ConstantExpression($alias, -1);
                if (!$stream->nextIf(
                    /* Token::PUNCTUATION_TYPE */
                    9,
                    ','
                )) {
                    break;
                }
            } while (\true);
        }
        $stream->expect(
            /* Token::BLOCK_END_TYPE */
            3
        );
        $this->parser->addTrait(new \PodlovePublisher_Vendor\Twig\Node\Node(['template' => $template, 'targets' => new \PodlovePublisher_Vendor\Twig\Node\Node($targets)]));
        return new \PodlovePublisher_Vendor\Twig\Node\Node();
    }
    public function getTag()
    {
        return 'use';
    }
}
@\class_alias('PodlovePublisher_Vendor\\Twig\\TokenParser\\UseTokenParser', 'PodlovePublisher_Vendor\\Twig_TokenParser_Use');
