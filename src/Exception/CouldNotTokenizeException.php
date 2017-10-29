<?php

namespace Dhii\Parser\Tokenizer\Exception;

use Exception as RootException;
use Dhii\I18n\StringTranslatingTrait;
use Dhii\Exception\CreateInvalidArgumentExceptionCapableTrait;
use Dhii\Parser\Tokenizer\TokenizerInterface;
use Dhii\Parser\Tokenizer\ColumnNumberAwareTrait;
use Dhii\Parser\Tokenizer\LineNumberAwareTrait;

/**
 * An exception that occurs when a tokenizer fails to produce a token.
 *
 * @since [*next-version*]
 */
class CouldNotTokenizeException extends AbstractBaseTokenizerException implements CouldNotTokenizeExceptionInterface
{
    /*
     * Adds internal invalid argument exception factory.
     *
     * @since [*next-version*]
     */
    use CreateInvalidArgumentExceptionCapableTrait;

    /*
     * Adds basic string translation functionality.
     *
     * @since [*next-version*]
     */
    use StringTranslatingTrait;

    /*
     * Adds internal column number awareness.
     *
     * @since [*next-version*]
     */
    use ColumnNumberAwareTrait;

    /*
     * Adds internal line number awareness.
     *
     * @since [*next-version*]
     */
    use LineNumberAwareTrait;

    /**
     * @since [*next-version*]
     *
     * @param string|Stringable|null  $message      The error message, if any.
     * @param int|null                $code         The error code, if any.
     * @param RootException|null      $previous     The inner exception, if any.
     * @param TokenizerInterface|null $tokenizer    The tokenizer, if any.
     * @param int|null                $lineNumber   The line number, if any.
     * @param int|null                $columnNumber The column number, if any.
     */
    public function __construct(
            $message = null,
            $code = null,
            RootException $previous = null,
            TokenizerInterface $tokenizer = null,
            $lineNumber = null,
            $columnNumber = null
    ) {
        $message = $message === null ? (string) $message : $this->_normalizeString($message);
        $code    = $code === null ? (int) $code : $this->_normalizeInt($code);

        parent::__construct($message, $code, $previous);
        $this->_setTokenizer($tokenizer);
        $this->_setLineNumber($lineNumber);
        $this->_setColumnNumber($columnNumber);

        $this->_construct();
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function getColumnNumber()
    {
        return $this->_getColumnNumber();
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function getLineNumber()
    {
        return $this->_getLineNumber();
    }
}
