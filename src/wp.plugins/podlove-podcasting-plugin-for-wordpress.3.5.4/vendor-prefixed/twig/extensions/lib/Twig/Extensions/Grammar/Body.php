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
class Twig_Extensions_Grammar_Body extends \PodlovePublisher_Vendor\Twig_Extensions_Grammar
{
    protected $end;
    public function __construct($name, $end = null)
    {
        parent::__construct($name);
        $this->end = null === $end ? 'end' . $name : $end;
    }
    public function __toString()
    {
        return \sprintf('<%s:body>', $this->name);
    }
    public function parse(\PodlovePublisher_Vendor\Twig_Token $token)
    {
        $stream = $this->parser->getStream();
        $stream->expect(\PodlovePublisher_Vendor\Twig_Token::BLOCK_END_TYPE);
        return $this->parser->subparse(array($this, 'decideBlockEnd'), \true);
    }
    public function decideBlockEnd(\PodlovePublisher_Vendor\Twig_Token $token)
    {
        return $token->test($this->end);
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
@\class_alias('PodlovePublisher_Vendor\\Twig_Extensions_Grammar_Body', 'Twig_Extensions_Grammar_Body', \false);
