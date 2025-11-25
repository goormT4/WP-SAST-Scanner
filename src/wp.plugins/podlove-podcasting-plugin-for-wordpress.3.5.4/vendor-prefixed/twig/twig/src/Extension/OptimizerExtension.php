<?php

/*
 * This file is part of Twig.
 *
 * (c) Fabien Potencier
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PodlovePublisher_Vendor\Twig\Extension;

use PodlovePublisher_Vendor\Twig\NodeVisitor\OptimizerNodeVisitor;
final class OptimizerExtension extends \PodlovePublisher_Vendor\Twig\Extension\AbstractExtension
{
    private $optimizers;
    public function __construct($optimizers = -1)
    {
        $this->optimizers = $optimizers;
    }
    public function getNodeVisitors()
    {
        return [new \PodlovePublisher_Vendor\Twig\NodeVisitor\OptimizerNodeVisitor($this->optimizers)];
    }
}
@\class_alias('PodlovePublisher_Vendor\\Twig\\Extension\\OptimizerExtension', 'PodlovePublisher_Vendor\\Twig_Extension_Optimizer');
