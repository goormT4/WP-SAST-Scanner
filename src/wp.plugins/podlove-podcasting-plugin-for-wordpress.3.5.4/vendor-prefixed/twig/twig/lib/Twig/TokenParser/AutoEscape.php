<?php

namespace PodlovePublisher_Vendor;

use PodlovePublisher_Vendor\Twig\TokenParser\AutoEscapeTokenParser;
\class_exists('PodlovePublisher_Vendor\\Twig\\TokenParser\\AutoEscapeTokenParser');
@\trigger_error(\sprintf('Using the "Twig_TokenParser_AutoEscape" class is deprecated since Twig version 2.7, use "Twig\\TokenParser\\AutoEscapeTokenParser" instead.'), \E_USER_DEPRECATED);
if (\false) {
    /** @deprecated since Twig 2.7, use "Twig\TokenParser\AutoEscapeTokenParser" instead */
    class Twig_TokenParser_AutoEscape extends \PodlovePublisher_Vendor\Twig\TokenParser\AutoEscapeTokenParser
    {
    }
}
