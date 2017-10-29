<?php

namespace Dhii\Parser\Tokenizer;

use Exception as RootException;
use Dhii\Parser\Tokenizer\Exception\TokenizerExceptionInterface;
use Dhii\Parser\Tokenizer\Exception\TokenizerException;
use Dhii\Parser\Tokenizer\Exception\CouldNotTokenizeExceptionInterface;
use Dhii\Parser\Tokenizer\Exception\CouldNotTokenizeException;
use Dhii\Iterator\AbstractIterator;

/**
 * Base concrete functionality for tokenizers.
 *
 * @since [*next-version*]
 */
abstract class AbstractBaseTokenizer extends AbstractIterator implements TokenizerInterface
{
    /**
     * Parameter-less constructor.
     *
     * Invoke this in actual constructor.
     *
     * @since [*next-version*]
     */
    protected function _construct()
    {
    }

    /**
     * Creates a new tokenizer exception.
     *
     * @since [*next-version*]
     *
     * @param string|Stringable|null $message  The error message, if any.
     * @param int|null               $code     The error code, if any.
     * @param RootException|null     $previous The inner exception, if any.
     *
     * @return TokenizerExceptionInterface The new exception.
     */
    protected function _createTokenizerException($message = null, $code = null, RootException $previous = null)
    {
        return new TokenizerException($message, $code, $previous, $this);
    }

    /**
     * Creates a new could not tokenizer exception.
     *
     * @since [*next-version*]
     *
     * @param string|Stringable|null $message      The error message, if any.
     * @param int|null               $code         The error code, if any.
     * @param RootException|null     $previous     The inner exception, if any.
     * @param int|null               $lineNumber   The line number, if any.
     * @param int|null               $columnNumber The column number, if any.
     *
     * @return CouldNotTokenizeExceptionInterface The new exception.
     */
    protected function _createCouldNotTokenizeException($message = null, $code = null, RootException $previous = null, $lineNumber = null, $columnNumber = null)
    {
        return new CouldNotTokenizeException($message, $code, $previous, $this, $lineNumber, $columnNumber);
    }
}
