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
/**
 * Represents a trans node.
 *
 * @author Fabien Potencier <fabien.potencier@symfony-project.com>
 */
class Twig_Extensions_Node_Trans extends \PodlovePublisher_Vendor\Twig_Node
{
    public function __construct(\PodlovePublisher_Vendor\Twig_Node $body, \PodlovePublisher_Vendor\Twig_Node $plural = null, \PodlovePublisher_Vendor\Twig_Node_Expression $count = null, \PodlovePublisher_Vendor\Twig_Node $notes = null, $lineno, $tag = null)
    {
        $nodes = array('body' => $body);
        if (null !== $count) {
            $nodes['count'] = $count;
        }
        if (null !== $plural) {
            $nodes['plural'] = $plural;
        }
        if (null !== $notes) {
            $nodes['notes'] = $notes;
        }
        parent::__construct($nodes, array(), $lineno, $tag);
    }
    /**
     * {@inheritdoc}
     */
    public function compile(\PodlovePublisher_Vendor\Twig_Compiler $compiler)
    {
        $compiler->addDebugInfo($this);
        list($msg, $vars) = $this->compileString($this->getNode('body'));
        if ($this->hasNode('plural')) {
            list($msg1, $vars1) = $this->compileString($this->getNode('plural'));
            $vars = \array_merge($vars, $vars1);
        }
        $function = $this->getTransFunction($this->hasNode('plural'));
        if ($this->hasNode('notes')) {
            $message = \trim($this->getNode('notes')->getAttribute('data'));
            // line breaks are not allowed cause we want a single line comment
            $message = \str_replace(array("\n", "\r"), ' ', $message);
            $compiler->write("// notes: {$message}\n");
        }
        if ($vars) {
            $compiler->write('echo strtr(' . $function . '(')->subcompile($msg);
            if ($this->hasNode('plural')) {
                $compiler->raw(', ')->subcompile($msg1)->raw(', abs(')->subcompile($this->hasNode('count') ? $this->getNode('count') : null)->raw(')');
            }
            $compiler->raw('), array(');
            foreach ($vars as $var) {
                if ('count' === $var->getAttribute('name')) {
                    $compiler->string('%count%')->raw(' => abs(')->subcompile($this->hasNode('count') ? $this->getNode('count') : null)->raw('), ');
                } else {
                    $compiler->string('%' . $var->getAttribute('name') . '%')->raw(' => ')->subcompile($var)->raw(', ');
                }
            }
            $compiler->raw("));\n");
        } else {
            $compiler->write('echo ' . $function . '(')->subcompile($msg);
            if ($this->hasNode('plural')) {
                $compiler->raw(', ')->subcompile($msg1)->raw(', abs(')->subcompile($this->hasNode('count') ? $this->getNode('count') : null)->raw(')');
            }
            $compiler->raw(");\n");
        }
    }
    /**
     * @param Twig_Node $body A Twig_Node instance
     *
     * @return array
     */
    protected function compileString(\PodlovePublisher_Vendor\Twig_Node $body)
    {
        if ($body instanceof \PodlovePublisher_Vendor\Twig_Node_Expression_Name || $body instanceof \PodlovePublisher_Vendor\Twig_Node_Expression_Constant || $body instanceof \PodlovePublisher_Vendor\Twig_Node_Expression_TempName) {
            return array($body, array());
        }
        $vars = array();
        if (\count($body)) {
            $msg = '';
            foreach ($body as $node) {
                if (\get_class($node) === 'Twig_Node' && $node->getNode(0) instanceof \PodlovePublisher_Vendor\Twig_Node_SetTemp) {
                    $node = $node->getNode(1);
                }
                if ($node instanceof \PodlovePublisher_Vendor\Twig_Node_Print) {
                    $n = $node->getNode('expr');
                    while ($n instanceof \PodlovePublisher_Vendor\Twig_Node_Expression_Filter) {
                        $n = $n->getNode('node');
                    }
                    $msg .= \sprintf('%%%s%%', $n->getAttribute('name'));
                    $vars[] = new \PodlovePublisher_Vendor\Twig_Node_Expression_Name($n->getAttribute('name'), $n->getTemplateLine());
                } else {
                    $msg .= $node->getAttribute('data');
                }
            }
        } else {
            $msg = $body->getAttribute('data');
        }
        return array(new \PodlovePublisher_Vendor\Twig_Node(array(new \PodlovePublisher_Vendor\Twig_Node_Expression_Constant(\trim($msg), $body->getTemplateLine()))), $vars);
    }
    /**
     * @param bool $plural Return plural or singular function to use
     *
     * @return string
     */
    protected function getTransFunction($plural)
    {
        return $plural ? 'ngettext' : 'gettext';
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
/**
 * Represents a trans node.
 *
 * @author Fabien Potencier <fabien.potencier@symfony-project.com>
 */
@\class_alias('PodlovePublisher_Vendor\\Twig_Extensions_Node_Trans', 'Twig_Extensions_Node_Trans', \false);
@\class_alias('PodlovePublisher_Vendor\\Twig_Extensions_Node_Trans', 'PodlovePublisher_Vendor\\Twig\\Extensions\\Node\\TransNode', \false);
