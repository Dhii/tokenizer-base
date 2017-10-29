<?php

namespace Dhii\Parser\Tokenizer\Exception;

use RuntimeException;
use Dhii\Parser\Tokenizer\TokenizerAwareTrait;
use Dhii\Util\Normalization\NormalizeStringCapableTrait;
use Dhii\Util\Normalization\NormalizeIntCapableTrait;
use Dhii\I18n\StringTranslatingTrait;
use Dhii\Exception\CreateInvalidArgumentExceptionCapableTrait;

/**
 * Common functionality for tokenizer exceptions.
 *
 * @since [*next-version*]
 */
abstract class AbstractBaseTokenizerException extends RuntimeException implements TokenizerExceptionInterface
{
    /*
     * Adds internal tokenizer awareness.
     *
     * @since [*next-version*]
     */
    use TokenizerAwareTrait;

    /*
     * Adds string normalization functionality.
     *
     * @since [*next-version*]
     */
    use NormalizeStringCapableTrait;

    /*
     * Adds integer normalization functionality.
     *
     * @since [*next-version*]
     */
    use NormalizeIntCapableTrait;
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
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function getTokenizer()
    {
        return $this->_getTokenizer();
    }
}
