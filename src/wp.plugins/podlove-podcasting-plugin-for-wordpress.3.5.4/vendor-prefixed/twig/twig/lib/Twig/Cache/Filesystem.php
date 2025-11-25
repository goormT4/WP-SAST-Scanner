<?php

namespace PodlovePublisher_Vendor;

use PodlovePublisher_Vendor\Twig\Cache\FilesystemCache;
\class_exists('PodlovePublisher_Vendor\\Twig\\Cache\\FilesystemCache');
@\trigger_error(\sprintf('Using the "Twig_Cache_Filesystem" class is deprecated since Twig version 2.7, use "Twig\\Cache\\FilesystemCache" instead.'), \E_USER_DEPRECATED);
if (\false) {
    /** @deprecated since Twig 2.7, use "Twig\Cache\FilesystemCache" instead */
    class Twig_Cache_Filesystem extends \PodlovePublisher_Vendor\Twig\Cache\FilesystemCache
    {
    }
}
