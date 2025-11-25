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
use PodlovePublisher_Vendor\Twig\Node\Node;
/**
 * Represents a block call node.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class BlockReferenceExpression extends \PodlovePublisher_Vendor\Twig\Node\Expression\AbstractExpression
{
    public function __construct(\PodlovePublisher_Vendor\Twig\Node\Node $name, \PodlovePublisher_Vendor\Twig\Node\Node $template = null, int $lineno, string $tag = null)
    {
        $nodes = ['name' => $name];
        if (null !== $template) {
            $nodes['template'] = $template;
        }
        parent::__construct($nodes, ['is_defined_test' => \false, 'output' => \false], $lineno, $tag);
    }
    public function compile(\PodlovePublisher_Vendor\Twig\Compiler $compiler)
    {
        if ($this->getAttribute('is_defined_test')) {
            $this->compileTemplateCall($compiler, 'hasBlock');
        } else {
            if ($this->getAttribute('output')) {
                $compiler->addDebugInfo($this);
                $this->compileTemplateCall($compiler, 'displayBlock')->raw(";\n");
            } else {
                $this->compileTemplateCall($compiler, 'renderBlock');
            }
        }
    }
    private function compileTemplateCall(\PodlovePublisher_Vendor\Twig\Compiler $compiler, string $method) : \PodlovePublisher_Vendor\Twig\Compiler
    {
        if (!$this->hasNode('template')) {
            $compiler->write('$this');
        } else {
            $compiler->write('$this->loadTemplate(')->subcompile($this->getNode('template'))->raw(', ')->repr($this->getTemplateName())->raw(', ')->repr($this->getTemplateLine())->raw(')');
        }
        $compiler->raw(\sprintf('->%s', $method));
        return $this->compileBlockArguments($compiler);
    }
    private function compileBlockArguments(\PodlovePublisher_Vendor\Twig\Compiler $compiler) : \PodlovePublisher_Vendor\Twig\Compiler
    {
        $compiler->raw('(')->subcompile($this->getNode('name'))->raw(', $context');
        if (!$this->hasNode('template')) {
            $compiler->raw(', $blocks');
        }
        return $compiler->raw(')');
    }
}
@\class_alias('PodlovePublisher_Vendor\\Twig\\Node\\Expression\\BlockReferenceExpression', 'PodlovePublisher_Vendor\\Twig_Node_Expression_BlockReference');
