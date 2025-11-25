<?php

namespace PodlovePublisher_Vendor;

use PodlovePublisher_Vendor\Twig\TokenParser\WithTokenParser;
\class_exists('PodlovePublisher_Vendor\\Twig\\TokenParser\\WithTokenParser');
@\trigger_error(\sprintf('Using the "Twig_TokenParser_With" class is deprecated since Twig version 2.7, use "Twig\\TokenParser\\WithTokenParser" instead.'), \E_USER_DEPRECATED);
if (\false) {
    /** @deprecated since Twig 2.7, use "Twig\TokenParser\WithTokenParser" instead */
    class Twig_TokenParser_With extends \PodlovePublisher_Vendor\Twig\TokenParser\WithTokenParser
    {
    }
}
