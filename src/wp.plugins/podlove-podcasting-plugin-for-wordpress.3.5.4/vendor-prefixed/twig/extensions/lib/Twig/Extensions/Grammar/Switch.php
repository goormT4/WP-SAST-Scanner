<?php

namespace PodlovePublisher_Vendor;

/*
 * This file is part of Twig.
 *
 * (c) 2010 Fabien Potencier
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * @deprecated since version 1.5
 */
class Twig_Extensions_Grammar_Switch extends \PodlovePublisher_Vendor\Twig_Extensions_Grammar
{
    public function __toString()
    {
        return \sprintf('<%s:switch>', $this->name);
    }
    public function parse(\PodlovePublisher_Vendor\Twig_Token $token)
    {
        $this->parser->getStream()->expect(\PodlovePublisher_Vendor\Twig_Token::NAME_TYPE, $this->name);
        return new \PodlovePublisher_Vendor\Twig_Node_Expression_Constant(\true, $token->getLine());
    }
}
/*
 * This file is part of Twig.
 *
 * (c) 2010 Fabien Potencier
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * @deprecated since version 1.5
 */
@\class_alias('PodlovePublisher_Vendor\\Twig_Extensions_Grammar_Switch', 'Twig_Extensions_Grammar_Switch', \false);
