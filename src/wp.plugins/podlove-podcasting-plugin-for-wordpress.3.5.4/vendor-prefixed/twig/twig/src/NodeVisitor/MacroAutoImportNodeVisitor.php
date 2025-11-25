<?php

/*
 * This file is part of Twig.
 *
 * (c) Fabien Potencier
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PodlovePublisher_Vendor\Twig\NodeVisitor;

use PodlovePublisher_Vendor\Twig\Environment;
use PodlovePublisher_Vendor\Twig\Node\Expression\AssignNameExpression;
use PodlovePublisher_Vendor\Twig\Node\Expression\ConstantExpression;
use PodlovePublisher_Vendor\Twig\Node\Expression\GetAttrExpression;
use PodlovePublisher_Vendor\Twig\Node\Expression\MethodCallExpression;
use PodlovePublisher_Vendor\Twig\Node\Expression\NameExpression;
use PodlovePublisher_Vendor\Twig\Node\ImportNode;
use PodlovePublisher_Vendor\Twig\Node\ModuleNode;
use PodlovePublisher_Vendor\Twig\Node\Node;
/**
 * @author Fabien Potencier <fabien@symfony.com>
 */
final class MacroAutoImportNodeVisitor implements \PodlovePublisher_Vendor\Twig\NodeVisitor\NodeVisitorInterface
{
    private $inAModule = \false;
    private $hasMacroCalls = \false;
    public function enterNode(\PodlovePublisher_Vendor\Twig\Node\Node $node, \PodlovePublisher_Vendor\Twig\Environment $env)
    {
        if ($node instanceof \PodlovePublisher_Vendor\Twig\Node\ModuleNode) {
            $this->inAModule = \true;
            $this->hasMacroCalls = \false;
        }
        return $node;
    }
    public function leaveNode(\PodlovePublisher_Vendor\Twig\Node\Node $node, \PodlovePublisher_Vendor\Twig\Environment $env)
    {
        if ($node instanceof \PodlovePublisher_Vendor\Twig\Node\ModuleNode) {
            $this->inAModule = \false;
            if ($this->hasMacroCalls) {
                $node->getNode('constructor_end')->setNode('_auto_macro_import', new \PodlovePublisher_Vendor\Twig\Node\ImportNode(new \PodlovePublisher_Vendor\Twig\Node\Expression\NameExpression('_self', 0), new \PodlovePublisher_Vendor\Twig\Node\Expression\AssignNameExpression('_self', 0), 0, 'import', \true));
            }
        } elseif ($this->inAModule) {
            if ($node instanceof \PodlovePublisher_Vendor\Twig\Node\Expression\GetAttrExpression && $node->getNode('node') instanceof \PodlovePublisher_Vendor\Twig\Node\Expression\NameExpression && '_self' === $node->getNode('node')->getAttribute('name') && $node->getNode('attribute') instanceof \PodlovePublisher_Vendor\Twig\Node\Expression\ConstantExpression) {
                $this->hasMacroCalls = \true;
                $name = $node->getNode('attribute')->getAttribute('value');
                $node = new \PodlovePublisher_Vendor\Twig\Node\Expression\MethodCallExpression($node->getNode('node'), 'macro_' . $name, $node->getNode('arguments'), $node->getTemplateLine());
                $node->setAttribute('safe', \true);
            }
        }
        return $node;
    }
    public function getPriority()
    {
        // we must be ran before auto-escaping
        return -10;
    }
}
