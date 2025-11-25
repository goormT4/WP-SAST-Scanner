<?php

namespace PodlovePublisher_Vendor;

/*
 * This file is part of Twig.
 *
 * (c) Fabien Potencier
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
class SimpleTokenParser extends \PodlovePublisher_Vendor\Twig_Extensions_SimpleTokenParser
{
    protected $tag;
    protected $grammar;
    public function __construct($tag, $grammar)
    {
        $this->tag = $tag;
        $this->grammar = $grammar;
    }
    public function getGrammar()
    {
        return $this->grammar;
    }
    public function getTag()
    {
        return $this->tag;
    }
    public function getNode(array $values, $line)
    {
        $nodes = array();
        $nodes[] = new \PodlovePublisher_Vendor\Twig_Node_Print(new \PodlovePublisher_Vendor\Twig_Node_Expression_Constant('|', $line), $line);
        foreach ($values as $value) {
            if ($value instanceof \PodlovePublisher_Vendor\Twig_Node) {
                if ($value instanceof \PodlovePublisher_Vendor\Twig_Node_Expression_Array) {
                    $nodes[] = new \PodlovePublisher_Vendor\Twig_Node_Print(new \PodlovePublisher_Vendor\Twig_Node_Expression_Function('dump', $value, $line), $line);
                } else {
                    $nodes[] = new \PodlovePublisher_Vendor\Twig_Node_Print($value, $line);
                }
            } else {
                $nodes[] = new \PodlovePublisher_Vendor\Twig_Node_Print(new \PodlovePublisher_Vendor\Twig_Node_Expression_Constant($value, $line), $line);
            }
            $nodes[] = new \PodlovePublisher_Vendor\Twig_Node_Print(new \PodlovePublisher_Vendor\Twig_Node_Expression_Constant('|', $line), $line);
        }
        return new \PodlovePublisher_Vendor\Twig_Node($nodes);
    }
}
/*
 * This file is part of Twig.
 *
 * (c) Fabien Potencier
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
@\class_alias('PodlovePublisher_Vendor\\SimpleTokenParser', 'SimpleTokenParser', \false);
