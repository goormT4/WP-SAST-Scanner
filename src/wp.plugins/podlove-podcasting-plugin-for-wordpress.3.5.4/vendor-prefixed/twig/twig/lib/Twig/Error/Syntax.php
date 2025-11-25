<?php

namespace PodlovePublisher_Vendor;

use PodlovePublisher_Vendor\Twig\Error\SyntaxError;
\class_exists('PodlovePublisher_Vendor\\Twig\\Error\\SyntaxError');
@\trigger_error(\sprintf('Using the "Twig_Error_Syntax" class is deprecated since Twig version 2.7, use "Twig\\Error\\SyntaxError" instead.'), \E_USER_DEPRECATED);
if (\false) {
    /** @deprecated since Twig 2.7, use "Twig\Error\SyntaxError" instead */
    class Twig_Error_Syntax extends \PodlovePublisher_Vendor\Twig\Error\SyntaxError
    {
    }
}
