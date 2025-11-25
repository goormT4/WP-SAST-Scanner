<?php

namespace PodlovePublisher_Vendor;

use PodlovePublisher_Vendor\Twig\NodeVisitor\OptimizerNodeVisitor;
\class_exists('PodlovePublisher_Vendor\\Twig\\NodeVisitor\\OptimizerNodeVisitor');
@\trigger_error(\sprintf('Using the "Twig_NodeVisitor_Optimizer" class is deprecated since Twig version 2.7, use "Twig\\NodeVisitor\\OptimizerNodeVisitor" instead.'), \E_USER_DEPRECATED);
if (\false) {
    /** @deprecated since Twig 2.7, use "Twig\NodeVisitor\OptimizerNodeVisitor" instead */
    class Twig_NodeVisitor_Optimizer extends \PodlovePublisher_Vendor\Twig\NodeVisitor\OptimizerNodeVisitor
    {
    }
}
