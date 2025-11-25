<?php

namespace PodlovePublisher_Vendor;

use PodlovePublisher_Vendor\Twig\Cache\CacheInterface;
\class_exists('PodlovePublisher_Vendor\\Twig\\Cache\\CacheInterface');
@\trigger_error(\sprintf('Using the "Twig_CacheInterface" class is deprecated since Twig version 2.7, use "Twig\\Cache\\CacheInterface" instead.'), \E_USER_DEPRECATED);
if (\false) {
    /** @deprecated since Twig 2.7, use "Twig\Cache\CacheInterface" instead */
    class Twig_CacheInterface extends \PodlovePublisher_Vendor\Twig\Cache\CacheInterface
    {
    }
}
