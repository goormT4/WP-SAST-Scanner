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

use PodlovePublisher_Vendor\Twig\TwigFunction;
final class DebugExtension extends \PodlovePublisher_Vendor\Twig\Extension\AbstractExtension
{
    public function getFunctions()
    {
        // dump is safe if var_dump is overridden by xdebug
        $isDumpOutputHtmlSafe = \extension_loaded('xdebug') && (\false === \ini_get('xdebug.overload_var_dump') || \ini_get('xdebug.overload_var_dump')) && (\false === \ini_get('html_errors') || \ini_get('html_errors')) || 'cli' === \PHP_SAPI;
        return [new \PodlovePublisher_Vendor\Twig\TwigFunction('dump', 'PodlovePublisher_Vendor\twig_var_dump', ['is_safe' => $isDumpOutputHtmlSafe ? ['html'] : [], 'needs_context' => \true, 'needs_environment' => \true, 'is_variadic' => \true])];
    }
}
@\class_alias('PodlovePublisher_Vendor\\Twig\\Extension\\DebugExtension', 'PodlovePublisher_Vendor\\Twig_Extension_Debug');
namespace PodlovePublisher_Vendor;

use PodlovePublisher_Vendor\Twig\Environment;
use PodlovePublisher_Vendor\Twig\Template;
use PodlovePublisher_Vendor\Twig\TemplateWrapper;
function twig_var_dump(\PodlovePublisher_Vendor\Twig\Environment $env, $context, ...$vars)
{
    if (!$env->isDebug()) {
        return;
    }
    \ob_start();
    if (!$vars) {
        $vars = [];
        foreach ($context as $key => $value) {
            if (!$value instanceof \PodlovePublisher_Vendor\Twig\Template && !$value instanceof \PodlovePublisher_Vendor\Twig\TemplateWrapper) {
                $vars[$key] = $value;
            }
        }
        \var_dump($vars);
    } else {
        \var_dump(...$vars);
    }
    return \ob_get_clean();
}
