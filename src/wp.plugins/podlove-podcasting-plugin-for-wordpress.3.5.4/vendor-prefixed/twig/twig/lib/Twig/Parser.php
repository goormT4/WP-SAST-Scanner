<?php

namespace PodlovePublisher_Vendor;

use PodlovePublisher_Vendor\Twig\Parser;
\class_exists('PodlovePublisher_Vendor\\Twig\\Parser');
@\trigger_error(\sprintf('Using the "Twig_Parser" class is deprecated since Twig version 2.7, use "Twig\\Parser" instead.'), \E_USER_DEPRECATED);
if (\false) {
    /** @deprecated since Twig 2.7, use "Twig\Parser" instead */
    class Twig_Parser extends \PodlovePublisher_Vendor\Twig\Parser
    {
    }
}
