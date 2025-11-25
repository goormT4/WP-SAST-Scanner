<?php

namespace PodlovePublisher_Vendor;

use PodlovePublisher_Vendor\Twig\Loader\ChainLoader;
\class_exists('PodlovePublisher_Vendor\\Twig\\Loader\\ChainLoader');
@\trigger_error(\sprintf('Using the "Twig_Loader_Chain" class is deprecated since Twig version 2.7, use "Twig\\Loader\\ChainLoader" instead.'), \E_USER_DEPRECATED);
if (\false) {
    /** @deprecated since Twig 2.7, use "Twig\Loader\ChainLoader" instead */
    class Twig_Loader_Chain extends \PodlovePublisher_Vendor\Twig\Loader\ChainLoader
    {
    }
}
