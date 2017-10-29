<?php

namespace Dhii\Parser\Tokenizer\FuncTest\Exception;

use Xpmock\TestCase;
use Dhii\Parser\Tokenizer\Exception\AbstractBaseTokenizerException as TestSubject;
use Dhii\Parser\Tokenizer\TokenizerInterface;

/**
 * Tests {@see TestSubject}.
 *
 * @since [*next-version*]
 */
class AbstractBaseTokenizerExceptionTest extends TestCase
{
    /**
     * The name of the test subject.
     *
     * @since [*next-version*]
     */
    const TEST_SUBJECT_CLASSNAME = 'Dhii\Parser\Tokenizer\Exception\AbstractBaseTokenizerException';

    /**
     * Creates a new instance of the test subject.
     *
     * @since [*next-version*]
     *
     * @return TestSubject
     */
    public function createInstance($tokenizer = null)
    {
        $mock = $this->getMock(static::TEST_SUBJECT_CLASSNAME, [
            '__',
            '_createInvalidArgumentException',
            '_getTokenizer',
        ]);

        $mock->method('_getTokenizer')
                ->will($this->returnValue($tokenizer));

        return $mock;
    }

    /**
     * Creates a new tokenizer.
     *
     * @since [*next-version*]
     *
     * @return TokenizerInterface The new tokenizer.
     */
    public function createTokenizer()
    {
        $mock = $this->getMock('Dhii\Parser\Tokenizer\TokenizerInterface');

        return $mock;
    }

    /**
     * Tests whether a valid instance of the test subject can be created.
     *
     * @since [*next-version*]
     */
    public function testCanBeCreated()
    {
        $subject = $this->createInstance();

        $this->assertInstanceOf(
            static::TEST_SUBJECT_CLASSNAME,
            $subject,
            'A valid instance of the test subject could not be created.'
        );
        $this->assertInstanceOf(
            'Dhii\Parser\Tokenizer\Exception\TokenizerExceptionInterface',
            $subject,
            'Subject does not implement required interface'
        );
    }

    /**
     * Tests that a tokenizer can be retrieved correctly.
     *
     * @since [*next-version*]
     */
    public function testGetTokenizer()
    {
        $tokenizer = $this->createTokenizer();
        $subject = $this->createInstance($tokenizer);

        $subject->expects($this->once())
                ->method('_getTokenizer');

        $this->assertSame($tokenizer, $subject->getTokenizer(), 'Incorrect tokenizer retrieved');
    }

    /**
     * Tests that a parameter-less constructor can be invoked.
     *
     * @since [*next-version*]
     */
    public function testConstruct()
    {
        $subject = $this->createInstance();
        $_subject = $this->reflect($subject);

        $this->assertNull($_subject->_construct());
    }
}
