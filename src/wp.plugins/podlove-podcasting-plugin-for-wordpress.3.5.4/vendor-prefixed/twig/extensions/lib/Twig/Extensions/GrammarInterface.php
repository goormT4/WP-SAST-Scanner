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
interface Twig_Extensions_GrammarInterface
{
    public function setParser(\PodlovePublisher_Vendor\Twig_Parser $parser);
    public function parse(\PodlovePublisher_Vendor\Twig_Token $token);
    public function getName();
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
@\class_alias('PodlovePublisher_Vendor\\Twig_Extensions_GrammarInterface', 'Twig_Extensions_GrammarInterface', \false);
