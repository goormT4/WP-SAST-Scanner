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
class Twig_Extensions_Grammar_Expression extends \PodlovePublisher_Vendor\Twig_Extensions_Grammar
{
    public function __toString()
    {
        return \sprintf('<%s>', $this->name);
    }
    public function parse(\PodlovePublisher_Vendor\Twig_Token $token)
    {
        return $this->parser->getExpressionParser()->parseExpression();
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
@\class_alias('PodlovePublisher_Vendor\\Twig_Extensions_Grammar_Expression', 'Twig_Extensions_Grammar_Expression', \false);
