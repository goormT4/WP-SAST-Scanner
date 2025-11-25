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
use PodlovePublisher_Vendor\Twig\Node\IncludeNode;
use PodlovePublisher_Vendor\Twig\Node\SandboxNode;
use PodlovePublisher_Vendor\Twig\Node\TextNode;
use PodlovePublisher_Vendor\Twig\Token;
/**
 * Marks a section of a template as untrusted code that must be evaluated in the sandbox mode.
 *
 *    {% sandbox %}
 *        {% include 'user.html' %}
 *    {% endsandbox %}
 *
 * @see https://twig.symfony.com/doc/api.html#sandbox-extension for details
 */
final class SandboxTokenParser extends \PodlovePublisher_Vendor\Twig\TokenParser\AbstractTokenParser
{
    public function parse(\PodlovePublisher_Vendor\Twig\Token $token)
    {
        $stream = $this->parser->getStream();
        $stream->expect(
            /* Token::BLOCK_END_TYPE */
            3
        );
        $body = $this->parser->subparse([$this, 'decideBlockEnd'], \true);
        $stream->expect(
            /* Token::BLOCK_END_TYPE */
            3
        );
        // in a sandbox tag, only include tags are allowed
        if (!$body instanceof \PodlovePublisher_Vendor\Twig\Node\IncludeNode) {
            foreach ($body as $node) {
                if ($node instanceof \PodlovePublisher_Vendor\Twig\Node\TextNode && \ctype_space($node->getAttribute('data'))) {
                    continue;
                }
                if (!$node instanceof \PodlovePublisher_Vendor\Twig\Node\IncludeNode) {
                    throw new \PodlovePublisher_Vendor\Twig\Error\SyntaxError('Only "include" tags are allowed within a "sandbox" section.', $node->getTemplateLine(), $stream->getSourceContext());
                }
            }
        }
        return new \PodlovePublisher_Vendor\Twig\Node\SandboxNode($body, $token->getLine(), $this->getTag());
    }
    public function decideBlockEnd(\PodlovePublisher_Vendor\Twig\Token $token)
    {
        return $token->test('endsandbox');
    }
    public function getTag()
    {
        return 'sandbox';
    }
}
@\class_alias('PodlovePublisher_Vendor\\Twig\\TokenParser\\SandboxTokenParser', 'PodlovePublisher_Vendor\\Twig_TokenParser_Sandbox');
