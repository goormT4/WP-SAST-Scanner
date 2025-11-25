<?php

/*
 * This file is part of Twig.
 *
 * (c) Fabien Potencier
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PodlovePublisher_Vendor\Twig\Test;

use PodlovePublisher_Vendor\PHPUnit\Framework\TestCase;
use PodlovePublisher_Vendor\Twig\Compiler;
use PodlovePublisher_Vendor\Twig\Environment;
use PodlovePublisher_Vendor\Twig\Loader\ArrayLoader;
use PodlovePublisher_Vendor\Twig\Node\Node;
abstract class NodeTestCase extends \PodlovePublisher_Vendor\PHPUnit\Framework\TestCase
{
    public abstract function getTests();
    /**
     * @dataProvider getTests
     */
    public function testCompile($node, $source, $environment = null, $isPattern = \false)
    {
        $this->assertNodeCompilation($source, $node, $environment, $isPattern);
    }
    public function assertNodeCompilation($source, \PodlovePublisher_Vendor\Twig\Node\Node $node, \PodlovePublisher_Vendor\Twig\Environment $environment = null, $isPattern = \false)
    {
        $compiler = $this->getCompiler($environment);
        $compiler->compile($node);
        if ($isPattern) {
            $this->assertStringMatchesFormat($source, \trim($compiler->getSource()));
        } else {
            $this->assertEquals($source, \trim($compiler->getSource()));
        }
    }
    protected function getCompiler(\PodlovePublisher_Vendor\Twig\Environment $environment = null)
    {
        return new \PodlovePublisher_Vendor\Twig\Compiler(null === $environment ? $this->getEnvironment() : $environment);
    }
    protected function getEnvironment()
    {
        return new \PodlovePublisher_Vendor\Twig\Environment(new \PodlovePublisher_Vendor\Twig\Loader\ArrayLoader([]));
    }
    protected function getVariableGetter($name, $line = \false)
    {
        $line = $line > 0 ? "// line {$line}\n" : '';
        return \sprintf('%s($context["%s"] ?? null)', $line, $name);
    }
    protected function getAttributeGetter()
    {
        return 'twig_get_attribute($this->env, $this->source, ';
    }
}
@\class_alias('PodlovePublisher_Vendor\\Twig\\Test\\NodeTestCase', 'PodlovePublisher_Vendor\\Twig_Test_NodeTestCase');
