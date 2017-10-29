<?php

namespace Dhii\Parser\Tokenizer\FuncTest\Exception;

use Exception as RootException;
use Xpmock\TestCase;
use Dhii\Parser\Tokenizer\AbstractBaseTokenizer as TestSubject;

/**
 * Tests {@see TestSubject}.
 *
 * @since [*next-version*]
 */
class AbstractBaseTokenizerTest extends TestCase
{
    /**
     * The name of the test subject.
     *
     * @since [*next-version*]
     */
    const TEST_SUBJECT_CLASSNAME = 'Dhii\Parser\Tokenizer\AbstractBaseTokenizer';

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
                ->getMockForAbstractClass();

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
            'Dhii\Parser\Tokenizer\TokenizerInterface',
            $subject,
            'Subject does not implement required interface'
        );
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

    /**
     * Tests that the `_createTokenizerException()` method works correctly.
     *
     * @since [*next-version*]
     */
    public function testCreateTokenizerException()
    {
        $message = uniqid('message-');
        $code = rand(1, 99);
        $previous = $this->createException();
        $subject = $this->createInstance();
        $_subject = $this->reflect($subject);

        $result = $_subject->_createTokenizerException($message, $code, $previous);
        $this->assertInstanceOf('Dhii\Parser\Tokenizer\Exception\TokenizerExceptionInterface', $result, 'Result did not produce a valid tokenizer exception');
        $this->assertEquals($message, $result->getMessage(), 'Exception message is wrong');
        $this->assertEquals($code, $result->getCode(), 'Exception code is wrong');
        $this->assertEquals($previous, $result->getPrevious(), 'Exception previous is wrong');
        $this->assertEquals($subject, $result->getTokenizer(), 'Exception tokenizer is wrong');
    }

    /**
     * Tests that the `_createCouldNotTokenizeException()` method works correctly.
     *
     * @since [*next-version*]
     */
    public function testCreateCouldNotTokenizeException()
    {
        $message = uniqid('message-');
        $code = rand(1, 99);
        $previous = $this->createException();
        $lineNumber = rand(1, 99);
        $columnNumber = rand(1, 99);
        $subject = $this->createInstance();
        $_subject = $this->reflect($subject);

        $result = $_subject->_createCouldNotTokenizeException($message, $code, $previous, $lineNumber, $columnNumber);
        $this->assertInstanceOf('Dhii\Parser\Tokenizer\Exception\CouldNotTokenizeExceptionInterface', $result, 'Result did not produce a valid Could Not Tokenize exception');
        $this->assertEquals($message, $result->getMessage(), 'Exception message is wrong');
        $this->assertEquals($code, $result->getCode(), 'Exception code is wrong');
        $this->assertEquals($previous, $result->getPrevious(), 'Exception previous is wrong');
        $this->assertEquals($subject, $result->getTokenizer(), 'Exception tokenizer is wrong');
        $this->assertEquals($lineNumber, $result->getLineNumber(), 'Exception line number is wrong');
        $this->assertEquals($columnNumber, $result->getColumnNumber(), 'Exception column number is wrong');
    }
}
