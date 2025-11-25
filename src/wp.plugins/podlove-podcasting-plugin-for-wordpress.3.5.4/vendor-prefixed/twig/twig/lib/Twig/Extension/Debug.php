<?php

namespace PodlovePublisher_Vendor;

use PodlovePublisher_Vendor\Twig\Extension\DebugExtension;
\class_exists('PodlovePublisher_Vendor\\Twig\\Extension\\DebugExtension');
@\trigger_error(\sprintf('Using the "Twig_Extension_Debug" class is deprecated since Twig version 2.7, use "Twig\\Extension\\DebugExtension" instead.'), \E_USER_DEPRECATED);
if (\false) {
    /** @deprecated since Twig 2.7, use "Twig\Extension\DebugExtension" instead */
    class Twig_Extension_Debug extends \PodlovePublisher_Vendor\Twig\Extension\DebugExtension
    {
    }
}
