<?php

namespace Dhii\Parser\Tokenizer\FuncTest\Exception;

use Exception as RootException;
use Xpmock\TestCase;
use Dhii\Parser\Tokenizer\Exception\TokenizerException as TestSubject;
use Dhii\Parser\Tokenizer\TokenizerInterface;

/**
 * Tests {@see TestSubject}.
 *
 * @since [*next-version*]
 */
class TokenizerExceptionTest extends TestCase
{
    /**
     * The name of the test subject.
     *
     * @since [*next-version*]
     */
    const TEST_SUBJECT_CLASSNAME = 'Dhii\Parser\Tokenizer\Exception\TokenizerException';

    /**
     * Creates a new instance of the test subject.
     *
     * @since [*next-version*]
     *
     * @return TestSubject
     */
    public function createInstance()
    {
        $mock = $this->getMockBuilder(static::TEST_SUBJECT_CLASSNAME)
                ->disableOriginalConstructor()
                ->setMethods([
                    '_normalizeString',
                    '_normalizeInt',
                    '_setTokenizer',
                    '_construct',
                ])
                ->getMockForAbstractClass();

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
     * Creates a new exception.
     *
     * @since [*next-version*]
     *
     * @param string $message The error message.
     *
     * @return RootException The new exception.
     */
    public function createException($message = '')
    {
        $mock = $this->mock('Exception')
                ->new($message);

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
            'RuntimeException',
            $subject,
            'Subject is not a valid runtime exception'
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
    public function testConstructor()
    {
        $message = uniqid('message-');
        $code = rand(1, 99);
        $previous = $this->createException();
        $tokenizer = $this->createTokenizer();
        $subject = $this->createInstance();

        $subject->expects($this->once())
                ->method('_normalizeString')
                ->with($this->equalTo($message))
                ->will($this->returnArgument(0));
        $subject->expects($this->once())
                ->method('_normalizeInt')
                ->with($this->equalTo($code))
                ->will($this->returnArgument(0));
        $subject->expects($this->once())
                ->method('_setTokenizer')
                ->with($this->equalTo($tokenizer));
        $subject->expects($this->once())
                ->method('_construct');

        $subject->__construct($message, $code, $previous, $tokenizer);

        // This needs to be tested because no way to expect parent calls
        $this->assertEquals($message, $subject->getMessage(), 'Incorrect message retrieved');
        $this->assertEquals($code, $subject->getCode(), 'Incorrect code retrieved');
        $this->assertEquals($previous, $subject->getPrevious(), 'Incorrect inner exception retrieved');
    }
}
