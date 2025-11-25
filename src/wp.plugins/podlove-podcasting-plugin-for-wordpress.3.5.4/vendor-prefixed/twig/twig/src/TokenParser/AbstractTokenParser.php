<?php

/*
 * This file is part of Twig.
 *
 * (c) Fabien Potencier
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PodlovePublisher_Vendor\Twig\TokenParser;

use PodlovePublisher_Vendor\Twig\Parser;
/**
 * Base class for all token parsers.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
abstract class AbstractTokenParser implements \PodlovePublisher_Vendor\Twig\TokenParser\TokenParserInterface
{
    /**
     * @var Parser
     */
    protected $parser;
    public function setParser(\PodlovePublisher_Vendor\Twig\Parser $parser)
    {
        $this->parser = $parser;
    }
}
@\class_alias('PodlovePublisher_Vendor\\Twig\\TokenParser\\AbstractTokenParser', 'PodlovePublisher_Vendor\\Twig_TokenParser');
