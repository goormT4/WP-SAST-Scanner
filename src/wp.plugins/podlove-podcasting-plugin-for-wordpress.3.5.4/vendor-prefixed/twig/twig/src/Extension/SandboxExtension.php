<?php

/*
 * This file is part of Twig.
 *
 * (c) Fabien Potencier
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PodlovePublisher_Vendor\Twig\Extension;

use PodlovePublisher_Vendor\Twig\NodeVisitor\SandboxNodeVisitor;
use PodlovePublisher_Vendor\Twig\Sandbox\SecurityNotAllowedMethodError;
use PodlovePublisher_Vendor\Twig\Sandbox\SecurityNotAllowedPropertyError;
use PodlovePublisher_Vendor\Twig\Sandbox\SecurityPolicyInterface;
use PodlovePublisher_Vendor\Twig\Source;
use PodlovePublisher_Vendor\Twig\TokenParser\SandboxTokenParser;
final class SandboxExtension extends \PodlovePublisher_Vendor\Twig\Extension\AbstractExtension
{
    private $sandboxedGlobally;
    private $sandboxed;
    private $policy;
    public function __construct(\PodlovePublisher_Vendor\Twig\Sandbox\SecurityPolicyInterface $policy, $sandboxed = \false)
    {
        $this->policy = $policy;
        $this->sandboxedGlobally = $sandboxed;
    }
    public function getTokenParsers()
    {
        return [new \PodlovePublisher_Vendor\Twig\TokenParser\SandboxTokenParser()];
    }
    public function getNodeVisitors()
    {
        return [new \PodlovePublisher_Vendor\Twig\NodeVisitor\SandboxNodeVisitor()];
    }
    public function enableSandbox()
    {
        $this->sandboxed = \true;
    }
    public function disableSandbox()
    {
        $this->sandboxed = \false;
    }
    public function isSandboxed()
    {
        return $this->sandboxedGlobally || $this->sandboxed;
    }
    public function isSandboxedGlobally()
    {
        return $this->sandboxedGlobally;
    }
    public function setSecurityPolicy(\PodlovePublisher_Vendor\Twig\Sandbox\SecurityPolicyInterface $policy)
    {
        $this->policy = $policy;
    }
    public function getSecurityPolicy()
    {
        return $this->policy;
    }
    public function checkSecurity($tags, $filters, $functions)
    {
        if ($this->isSandboxed()) {
            $this->policy->checkSecurity($tags, $filters, $functions);
        }
    }
    public function checkMethodAllowed($obj, $method, int $lineno = -1, \PodlovePublisher_Vendor\Twig\Source $source = null)
    {
        if ($this->isSandboxed()) {
            try {
                $this->policy->checkMethodAllowed($obj, $method);
            } catch (\PodlovePublisher_Vendor\Twig\Sandbox\SecurityNotAllowedMethodError $e) {
                $e->setSourceContext($source);
                $e->setTemplateLine($lineno);
                throw $e;
            }
        }
    }
    public function checkPropertyAllowed($obj, $method, int $lineno = -1, \PodlovePublisher_Vendor\Twig\Source $source = null)
    {
        if ($this->isSandboxed()) {
            try {
                $this->policy->checkPropertyAllowed($obj, $method);
            } catch (\PodlovePublisher_Vendor\Twig\Sandbox\SecurityNotAllowedPropertyError $e) {
                $e->setSourceContext($source);
                $e->setTemplateLine($lineno);
                throw $e;
            }
        }
    }
    public function ensureToStringAllowed($obj, int $lineno = -1, \PodlovePublisher_Vendor\Twig\Source $source = null)
    {
        if ($this->isSandboxed() && \is_object($obj) && \method_exists($obj, '__toString')) {
            try {
                $this->policy->checkMethodAllowed($obj, '__toString');
            } catch (\PodlovePublisher_Vendor\Twig\Sandbox\SecurityNotAllowedMethodError $e) {
                $e->setSourceContext($source);
                $e->setTemplateLine($lineno);
                throw $e;
            }
        }
        return $obj;
    }
}
@\class_alias('PodlovePublisher_Vendor\\Twig\\Extension\\SandboxExtension', 'PodlovePublisher_Vendor\\Twig_Extension_Sandbox');
