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

use PodlovePublisher_Vendor\Twig\Node\WithNode;
use PodlovePublisher_Vendor\Twig\Token;
/**
 * Creates a nested scope.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
final class WithTokenParser extends \PodlovePublisher_Vendor\Twig\TokenParser\AbstractTokenParser
{
    public function parse(\PodlovePublisher_Vendor\Twig\Token $token)
    {
        $stream = $this->parser->getStream();
        $variables = null;
        $only = \false;
        if (!$stream->test(
            /* Token::BLOCK_END_TYPE */
            3
        )) {
            $variables = $this->parser->getExpressionParser()->parseExpression();
            $only = (bool) $stream->nextIf(
                /* Token::NAME_TYPE */
                5,
                'only'
            );
        }
        $stream->expect(
            /* Token::BLOCK_END_TYPE */
            3
        );
        $body = $this->parser->subparse([$this, 'decideWithEnd'], \true);
        $stream->expect(
            /* Token::BLOCK_END_TYPE */
            3
        );
        return new \PodlovePublisher_Vendor\Twig\Node\WithNode($body, $variables, $only, $token->getLine(), $this->getTag());
    }
    public function decideWithEnd(\PodlovePublisher_Vendor\Twig\Token $token)
    {
        return $token->test('endwith');
    }
    public function getTag()
    {
        return 'with';
    }
}
@\class_alias('PodlovePublisher_Vendor\\Twig\\TokenParser\\WithTokenParser', 'PodlovePublisher_Vendor\\Twig_TokenParser_With');
