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
/**
 * @group legacy
 */
class Twig_Tests_SimpleTokenParserTest extends \PodlovePublisher_Vendor\PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider getTests
     */
    public function testParseGrammar($str, $grammar)
    {
        $this->assertEquals($grammar, \PodlovePublisher_Vendor\Twig_Extensions_SimpleTokenParser::parseGrammar($str), '::parseGrammar() parses a grammar');
    }
    public function testParseGrammarExceptions()
    {
        try {
            \PodlovePublisher_Vendor\Twig_Extensions_SimpleTokenParser::parseGrammar('<foo:foo>');
            $this->fail();
        } catch (\Exception $e) {
            $this->assertEquals('Twig_Error_Runtime', \get_class($e));
        }
        try {
            \PodlovePublisher_Vendor\Twig_Extensions_SimpleTokenParser::parseGrammar('<foo:foo');
            $this->fail();
        } catch (\Exception $e) {
            $this->assertEquals('Twig_Error_Runtime', \get_class($e));
        }
        try {
            \PodlovePublisher_Vendor\Twig_Extensions_SimpleTokenParser::parseGrammar('<foo:foo> (with');
            $this->fail();
        } catch (\Exception $e) {
            $this->assertEquals('Twig_Error_Runtime', \get_class($e));
        }
    }
    public function getTests()
    {
        return array(array('', new \PodlovePublisher_Vendor\Twig_Extensions_Grammar_Tag()), array('const', new \PodlovePublisher_Vendor\Twig_Extensions_Grammar_Tag(new \PodlovePublisher_Vendor\Twig_Extensions_Grammar_Constant('const'))), array('   const   ', new \PodlovePublisher_Vendor\Twig_Extensions_Grammar_Tag(new \PodlovePublisher_Vendor\Twig_Extensions_Grammar_Constant('const'))), array('<expr>', new \PodlovePublisher_Vendor\Twig_Extensions_Grammar_Tag(new \PodlovePublisher_Vendor\Twig_Extensions_Grammar_Expression('expr'))), array('<expr:expression>', new \PodlovePublisher_Vendor\Twig_Extensions_Grammar_Tag(new \PodlovePublisher_Vendor\Twig_Extensions_Grammar_Expression('expr'))), array('   <expr:expression>   ', new \PodlovePublisher_Vendor\Twig_Extensions_Grammar_Tag(new \PodlovePublisher_Vendor\Twig_Extensions_Grammar_Expression('expr'))), array('<nb:number>', new \PodlovePublisher_Vendor\Twig_Extensions_Grammar_Tag(new \PodlovePublisher_Vendor\Twig_Extensions_Grammar_Number('nb'))), array('<bool:boolean>', new \PodlovePublisher_Vendor\Twig_Extensions_Grammar_Tag(new \PodlovePublisher_Vendor\Twig_Extensions_Grammar_Boolean('bool'))), array('<content:body>', new \PodlovePublisher_Vendor\Twig_Extensions_Grammar_Tag(new \PodlovePublisher_Vendor\Twig_Extensions_Grammar_Body('content'))), array('<expr:expression> [with <arguments:array>]', new \PodlovePublisher_Vendor\Twig_Extensions_Grammar_Tag(new \PodlovePublisher_Vendor\Twig_Extensions_Grammar_Expression('expr'), new \PodlovePublisher_Vendor\Twig_Extensions_Grammar_Optional(new \PodlovePublisher_Vendor\Twig_Extensions_Grammar_Constant('with'), new \PodlovePublisher_Vendor\Twig_Extensions_Grammar_Array('arguments')))), array('  <expr:expression>   [  with   <arguments:array> ]  ', new \PodlovePublisher_Vendor\Twig_Extensions_Grammar_Tag(new \PodlovePublisher_Vendor\Twig_Extensions_Grammar_Expression('expr'), new \PodlovePublisher_Vendor\Twig_Extensions_Grammar_Optional(new \PodlovePublisher_Vendor\Twig_Extensions_Grammar_Constant('with'), new \PodlovePublisher_Vendor\Twig_Extensions_Grammar_Array('arguments')))), array('<expr:expression> [with <arguments:array> [or <optional:expression>]]', new \PodlovePublisher_Vendor\Twig_Extensions_Grammar_Tag(new \PodlovePublisher_Vendor\Twig_Extensions_Grammar_Expression('expr'), new \PodlovePublisher_Vendor\Twig_Extensions_Grammar_Optional(new \PodlovePublisher_Vendor\Twig_Extensions_Grammar_Constant('with'), new \PodlovePublisher_Vendor\Twig_Extensions_Grammar_Array('arguments'), new \PodlovePublisher_Vendor\Twig_Extensions_Grammar_Optional(new \PodlovePublisher_Vendor\Twig_Extensions_Grammar_Constant('or'), new \PodlovePublisher_Vendor\Twig_Extensions_Grammar_Expression('optional'))))), array('<expr:expression> [with <arguments:array> [, <optional:expression>]]', new \PodlovePublisher_Vendor\Twig_Extensions_Grammar_Tag(new \PodlovePublisher_Vendor\Twig_Extensions_Grammar_Expression('expr'), new \PodlovePublisher_Vendor\Twig_Extensions_Grammar_Optional(new \PodlovePublisher_Vendor\Twig_Extensions_Grammar_Constant('with'), new \PodlovePublisher_Vendor\Twig_Extensions_Grammar_Array('arguments'), new \PodlovePublisher_Vendor\Twig_Extensions_Grammar_Optional(new \PodlovePublisher_Vendor\Twig_Extensions_Grammar_Constant(',', \PodlovePublisher_Vendor\Twig_Token::PUNCTUATION_TYPE), new \PodlovePublisher_Vendor\Twig_Extensions_Grammar_Expression('optional'))))));
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
/**
 * @group legacy
 */
@\class_alias('PodlovePublisher_Vendor\\Twig_Tests_SimpleTokenParserTest', 'Twig_Tests_SimpleTokenParserTest', \false);
