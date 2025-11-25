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
use PodlovePublisher_Vendor\Twig\Extension\SandboxExtension;
use PodlovePublisher_Vendor\Twig\Template;
class GetAttrExpression extends \PodlovePublisher_Vendor\Twig\Node\Expression\AbstractExpression
{
    public function __construct(\PodlovePublisher_Vendor\Twig\Node\Expression\AbstractExpression $node, \PodlovePublisher_Vendor\Twig\Node\Expression\AbstractExpression $attribute, \PodlovePublisher_Vendor\Twig\Node\Expression\AbstractExpression $arguments = null, string $type, int $lineno)
    {
        $nodes = ['node' => $node, 'attribute' => $attribute];
        if (null !== $arguments) {
            $nodes['arguments'] = $arguments;
        }
        parent::__construct($nodes, ['type' => $type, 'is_defined_test' => \false, 'ignore_strict_check' => \false, 'optimizable' => \true], $lineno);
    }
    public function compile(\PodlovePublisher_Vendor\Twig\Compiler $compiler)
    {
        $env = $compiler->getEnvironment();
        // optimize array calls
        if ($this->getAttribute('optimizable') && (!$env->isStrictVariables() || $this->getAttribute('ignore_strict_check')) && !$this->getAttribute('is_defined_test') && \PodlovePublisher_Vendor\Twig\Template::ARRAY_CALL === $this->getAttribute('type')) {
            $var = '$' . $compiler->getVarName();
            $compiler->raw('((' . $var . ' = ')->subcompile($this->getNode('node'))->raw(') && is_array(')->raw($var)->raw(') || ')->raw($var)->raw(' instanceof ArrayAccess ? (')->raw($var)->raw('[')->subcompile($this->getNode('attribute'))->raw('] ?? null) : null)');
            return;
        }
        $compiler->raw('PodlovePublisher_Vendor\\twig_get_attribute($this->env, $this->source, ');
        if ($this->getAttribute('ignore_strict_check')) {
            $this->getNode('node')->setAttribute('ignore_strict_check', \true);
        }
        $compiler->subcompile($this->getNode('node'))->raw(', ')->subcompile($this->getNode('attribute'));
        if ($this->hasNode('arguments')) {
            $compiler->raw(', ')->subcompile($this->getNode('arguments'));
        } else {
            $compiler->raw(', []');
        }
        $compiler->raw(', ')->repr($this->getAttribute('type'))->raw(', ')->repr($this->getAttribute('is_defined_test'))->raw(', ')->repr($this->getAttribute('ignore_strict_check'))->raw(', ')->repr($env->hasExtension(\PodlovePublisher_Vendor\Twig\Extension\SandboxExtension::class))->raw(', ')->repr($this->getNode('node')->getTemplateLine())->raw(')');
    }
}
@\class_alias('PodlovePublisher_Vendor\\Twig\\Node\\Expression\\GetAttrExpression', 'PodlovePublisher_Vendor\\Twig_Node_Expression_GetAttr');
