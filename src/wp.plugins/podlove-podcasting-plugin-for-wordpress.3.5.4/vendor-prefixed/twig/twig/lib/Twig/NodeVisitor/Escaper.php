<?php

namespace PodlovePublisher_Vendor;

use PodlovePublisher_Vendor\Twig\NodeVisitor\EscaperNodeVisitor;
\class_exists('PodlovePublisher_Vendor\\Twig\\NodeVisitor\\EscaperNodeVisitor');
@\trigger_error(\sprintf('Using the "Twig_NodeVisitor_Escaper" class is deprecated since Twig version 2.7, use "Twig\\NodeVisitor\\EscaperNodeVisitor" instead.'), \E_USER_DEPRECATED);
if (\false) {
    /** @deprecated since Twig 2.7, use "Twig\NodeVisitor\EscaperNodeVisitor" instead */
    class Twig_NodeVisitor_Escaper extends \PodlovePublisher_Vendor\Twig\NodeVisitor\EscaperNodeVisitor
    {
    }
}
