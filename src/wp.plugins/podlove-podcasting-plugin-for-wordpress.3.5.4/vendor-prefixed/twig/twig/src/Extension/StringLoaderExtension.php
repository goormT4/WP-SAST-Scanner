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
final class StringLoaderExtension extends \PodlovePublisher_Vendor\Twig\Extension\AbstractExtension
{
    public function getFunctions()
    {
        return [new \PodlovePublisher_Vendor\Twig\TwigFunction('template_from_string', 'twig_template_from_string', ['needs_environment' => \true])];
    }
}
@\class_alias('PodlovePublisher_Vendor\\Twig\\Extension\\StringLoaderExtension', 'PodlovePublisher_Vendor\\Twig_Extension_StringLoader');
namespace PodlovePublisher_Vendor;

use PodlovePublisher_Vendor\Twig\Environment;
use PodlovePublisher_Vendor\Twig\TemplateWrapper;
/**
 * Loads a template from a string.
 *
 *     {{ include(template_from_string("Hello {{ name }}")) }}
 *
 * @param string $template A template as a string or object implementing __toString()
 * @param string $name     An optional name of the template to be used in error messages
 *
 * @return TemplateWrapper
 */
function twig_template_from_string(\PodlovePublisher_Vendor\Twig\Environment $env, $template, string $name = null)
{
    return $env->createTemplate((string) $template, $name);
}
