<?php

namespace PodlovePublisher_Vendor;

use PodlovePublisher_Vendor\Twig\TokenParser\MacroTokenParser;
\class_exists('PodlovePublisher_Vendor\\Twig\\TokenParser\\MacroTokenParser');
@\trigger_error(\sprintf('Using the "Twig_TokenParser_Macro" class is deprecated since Twig version 2.7, use "Twig\\TokenParser\\MacroTokenParser" instead.'), \E_USER_DEPRECATED);
if (\false) {
    /** @deprecated since Twig 2.7, use "Twig\TokenParser\MacroTokenParser" instead */
    class Twig_TokenParser_Macro extends \PodlovePublisher_Vendor\Twig\TokenParser\MacroTokenParser
    {
    }
}
