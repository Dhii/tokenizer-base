<?php

namespace Dhii\Parser\Tokenizer\Exception;

use Exception as RootException;
use Dhii\Parser\Tokenizer\TokenizerInterface;

/**
 * An exception related to a tokenizer.
 *
 * @since [*next-version*]
 */
class TokenizerException extends AbstractBaseTokenizerException
{
    /**
     * @since [*next-version*]
     *
     * @param string|Stringable|null  $message   The error message, if any.
     * @param int|null                $code      The error code, if any.
     * @param RootException|null      $previous  The inner exception, if any.
     * @param TokenizerInterface|null $tokenizer The tokenizer, if any
     */
    public function __construct(
            $message = null,
            $code = null,
            RootException $previous = null,
            TokenizerInterface $tokenizer = null
    ) {
        $message = $message === null ? (string) $message : $this->_normalizeString($message);
        $code    = $code === null ? (int) $code : $this->_normalizeInt($code);

        parent::__construct($message, $code, $previous);
        $this->_setTokenizer($tokenizer);

        $this->_construct();
    }
}
