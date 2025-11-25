<?php

namespace PodlovePublisher_Vendor;

/*
 * This file is part of Twig.
 *
 * (c) 2010 Fabien Potencier
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
class Twig_Extensions_TokenParser_Trans extends \PodlovePublisher_Vendor\Twig_TokenParser
{
    /**
     * {@inheritdoc}
     */
    public function parse(\PodlovePublisher_Vendor\Twig_Token $token)
    {
        $lineno = $token->getLine();
        $stream = $this->parser->getStream();
        $count = null;
        $plural = null;
        $notes = null;
        if (!$stream->test(\PodlovePublisher_Vendor\Twig_Token::BLOCK_END_TYPE)) {
            $body = $this->parser->getExpressionParser()->parseExpression();
        } else {
            $stream->expect(\PodlovePublisher_Vendor\Twig_Token::BLOCK_END_TYPE);
            $body = $this->parser->subparse(array($this, 'decideForFork'));
            $next = $stream->next()->getValue();
            if ('plural' === $next) {
                $count = $this->parser->getExpressionParser()->parseExpression();
                $stream->expect(\PodlovePublisher_Vendor\Twig_Token::BLOCK_END_TYPE);
                $plural = $this->parser->subparse(array($this, 'decideForFork'));
                if ('notes' === $stream->next()->getValue()) {
                    $stream->expect(\PodlovePublisher_Vendor\Twig_Token::BLOCK_END_TYPE);
                    $notes = $this->parser->subparse(array($this, 'decideForEnd'), \true);
                }
            } elseif ('notes' === $next) {
                $stream->expect(\PodlovePublisher_Vendor\Twig_Token::BLOCK_END_TYPE);
                $notes = $this->parser->subparse(array($this, 'decideForEnd'), \true);
            }
        }
        $stream->expect(\PodlovePublisher_Vendor\Twig_Token::BLOCK_END_TYPE);
        $this->checkTransString($body, $lineno);
        return new \PodlovePublisher_Vendor\Twig_Extensions_Node_Trans($body, $plural, $count, $notes, $lineno, $this->getTag());
    }
    public function decideForFork(\PodlovePublisher_Vendor\Twig_Token $token)
    {
        return $token->test(array('plural', 'notes', 'endtrans'));
    }
    public function decideForEnd(\PodlovePublisher_Vendor\Twig_Token $token)
    {
        return $token->test('endtrans');
    }
    /**
     * {@inheritdoc}
     */
    public function getTag()
    {
        return 'trans';
    }
    protected function checkTransString(\PodlovePublisher_Vendor\Twig_Node $body, $lineno)
    {
        foreach ($body as $i => $node) {
            if ($node instanceof \PodlovePublisher_Vendor\Twig_Node_Text || $node instanceof \PodlovePublisher_Vendor\Twig_Node_Print && $node->getNode('expr') instanceof \PodlovePublisher_Vendor\Twig_Node_Expression_Name) {
                continue;
            }
            throw new \PodlovePublisher_Vendor\Twig_Error_Syntax(\sprintf('The text to be translated with "trans" can only contain references to simple variables'), $lineno);
        }
    }
}
/*
 * This file is part of Twig.
 *
 * (c) 2010 Fabien Potencier
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
@\class_alias('PodlovePublisher_Vendor\\Twig_Extensions_TokenParser_Trans', 'Twig_Extensions_TokenParser_Trans', \false);
@\class_alias('PodlovePublisher_Vendor\\Twig_Extensions_TokenParser_Trans', 'PodlovePublisher_Vendor\\Twig\\Extensions\\TokenParser\\TransTokenParser', \false);
