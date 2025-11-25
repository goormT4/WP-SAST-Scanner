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

use PodlovePublisher_Vendor\Twig\Node\Expression\AssignNameExpression;
use PodlovePublisher_Vendor\Twig\Node\ImportNode;
use PodlovePublisher_Vendor\Twig\Token;
/**
 * Imports macros.
 *
 *   {% from 'forms.html' import forms %}
 */
final class FromTokenParser extends \PodlovePublisher_Vendor\Twig\TokenParser\AbstractTokenParser
{
    public function parse(\PodlovePublisher_Vendor\Twig\Token $token)
    {
        $macro = $this->parser->getExpressionParser()->parseExpression();
        $stream = $this->parser->getStream();
        $stream->expect(
            /* Token::NAME_TYPE */
            5,
            'import'
        );
        $targets = [];
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
            $targets[$name] = $alias;
            if (!$stream->nextIf(
                /* Token::PUNCTUATION_TYPE */
                9,
                ','
            )) {
                break;
            }
        } while (\true);
        $stream->expect(
            /* Token::BLOCK_END_TYPE */
            3
        );
        $var = new \PodlovePublisher_Vendor\Twig\Node\Expression\AssignNameExpression($this->parser->getVarName(), $token->getLine());
        $node = new \PodlovePublisher_Vendor\Twig\Node\ImportNode($macro, $var, $token->getLine(), $this->getTag(), $this->parser->isMainScope());
        foreach ($targets as $name => $alias) {
            $this->parser->addImportedSymbol('function', $alias, 'macro_' . $name, $var);
        }
        return $node;
    }
    public function getTag()
    {
        return 'from';
    }
}
@\class_alias('PodlovePublisher_Vendor\\Twig\\TokenParser\\FromTokenParser', 'PodlovePublisher_Vendor\\Twig_TokenParser_From');
