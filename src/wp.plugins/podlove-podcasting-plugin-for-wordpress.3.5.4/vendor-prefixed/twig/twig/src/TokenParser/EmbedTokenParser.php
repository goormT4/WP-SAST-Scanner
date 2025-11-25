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

use PodlovePublisher_Vendor\Twig\Node\EmbedNode;
use PodlovePublisher_Vendor\Twig\Node\Expression\ConstantExpression;
use PodlovePublisher_Vendor\Twig\Node\Expression\NameExpression;
use PodlovePublisher_Vendor\Twig\Token;
/**
 * Embeds a template.
 */
final class EmbedTokenParser extends \PodlovePublisher_Vendor\Twig\TokenParser\IncludeTokenParser
{
    public function parse(\PodlovePublisher_Vendor\Twig\Token $token)
    {
        $stream = $this->parser->getStream();
        $parent = $this->parser->getExpressionParser()->parseExpression();
        list($variables, $only, $ignoreMissing) = $this->parseArguments();
        $parentToken = $fakeParentToken = new \PodlovePublisher_Vendor\Twig\Token(
            /* Token::STRING_TYPE */
            7,
            '__parent__',
            $token->getLine()
        );
        if ($parent instanceof \PodlovePublisher_Vendor\Twig\Node\Expression\ConstantExpression) {
            $parentToken = new \PodlovePublisher_Vendor\Twig\Token(
                /* Token::STRING_TYPE */
                7,
                $parent->getAttribute('value'),
                $token->getLine()
            );
        } elseif ($parent instanceof \PodlovePublisher_Vendor\Twig\Node\Expression\NameExpression) {
            $parentToken = new \PodlovePublisher_Vendor\Twig\Token(
                /* Token::NAME_TYPE */
                5,
                $parent->getAttribute('name'),
                $token->getLine()
            );
        }
        // inject a fake parent to make the parent() function work
        $stream->injectTokens([new \PodlovePublisher_Vendor\Twig\Token(
            /* Token::BLOCK_START_TYPE */
            1,
            '',
            $token->getLine()
        ), new \PodlovePublisher_Vendor\Twig\Token(
            /* Token::NAME_TYPE */
            5,
            'extends',
            $token->getLine()
        ), $parentToken, new \PodlovePublisher_Vendor\Twig\Token(
            /* Token::BLOCK_END_TYPE */
            3,
            '',
            $token->getLine()
        )]);
        $module = $this->parser->parse($stream, [$this, 'decideBlockEnd'], \true);
        // override the parent with the correct one
        if ($fakeParentToken === $parentToken) {
            $module->setNode('parent', $parent);
        }
        $this->parser->embedTemplate($module);
        $stream->expect(
            /* Token::BLOCK_END_TYPE */
            3
        );
        return new \PodlovePublisher_Vendor\Twig\Node\EmbedNode($module->getTemplateName(), $module->getAttribute('index'), $variables, $only, $ignoreMissing, $token->getLine(), $this->getTag());
    }
    public function decideBlockEnd(\PodlovePublisher_Vendor\Twig\Token $token)
    {
        return $token->test('endembed');
    }
    public function getTag()
    {
        return 'embed';
    }
}
@\class_alias('PodlovePublisher_Vendor\\Twig\\TokenParser\\EmbedTokenParser', 'PodlovePublisher_Vendor\\Twig_TokenParser_Embed');
