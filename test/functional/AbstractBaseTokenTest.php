<?php

namespace Dhii\Parser\Tokenizer\FuncTest\Exception;

use Xpmock\TestCase;
use Dhii\Parser\Tokenizer\AbstractBaseToken as TestSubject;

/**
 * Tests {@see TestSubject}.
 *
 * @since [*next-version*]
 */
class AbstractBaseTokenTest extends TestCase
{
    /**
     * The name of the test subject.
     *
     * @since [*next-version*]
     */
    const TEST_SUBJECT_CLASSNAME = 'Dhii\Parser\Tokenizer\AbstractBaseToken';

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
            'Dhii\Parser\Tokenizer\TokenInterface',
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
}
