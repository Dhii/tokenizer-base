<?php

namespace Dhii\Parser\Tokenizer;

use Dhii\Data\Object\GetDataStoreCapableTrait;
use Dhii\Data\Object\GetDataCapableTrait;
use Dhii\Data\Object\SetDataCapableTrait;
use Dhii\Data\Object\HasDataCapableTrait;
use Dhii\Data\Object\UnsetDataCapableTrait;
use Dhii\Data\KeyValueAwareTrait;

/**
 * Base concrete functionality for tokens.
 *
 * @since [*next-version*]
 */
abstract class AbstractBaseToken implements TokenInterface
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

    /*
     * Adds data store retrieval capability.
     *
     * @since [*next-version*]
     */
    use GetDataStoreCapableTrait;

    /*
     * Adds data retrieval capability.
     *
     * @since [*next-version*]
     */
    use GetDataCapableTrait;

    /*
     * Adds data assignment capability.
     *
     * @since [*next-version*]
     */
    use SetDataCapableTrait;

    /*
     * Adds data checking capability.
     *
     * @since [*next-version*]
     */
    use HasDataCapableTrait;

    /*
     * Adds data removal capability.
     *
     * @since [*next-version*]
     */
    use UnsetDataCapableTrait;

    /*
     * Adds internal key and value awareness.
     *
     * @since [*next-version*]
     */
    use KeyValueAwareTrait;

    /*
     * Adds internal line number awareness.
     *
     * @since [*next-version*]
     */
    use LineNumberAwareTrait;

    /*
     * Adds internal column number awareness.
     *
     * @since [*next-version*]
     */
    use ColumnNumberAwareTrait;
}
