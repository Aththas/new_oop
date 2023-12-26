<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/firestore/v1/query.proto

namespace Google\Cloud\Firestore\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A Firestore query.
 *
 * Generated from protobuf message <code>google.firestore.v1.StructuredQuery</code>
 */
class StructuredQuery extends \Google\Protobuf\Internal\Message
{
    /**
     * Optional sub-set of the fields to return.
     * This acts as a [DocumentMask][google.firestore.v1.DocumentMask] over the
     * documents returned from a query. When not set, assumes that the caller
     * wants all fields returned.
     *
     * Generated from protobuf field <code>.google.firestore.v1.StructuredQuery.Projection select = 1;</code>
     */
    private $select = null;
    /**
     * The collections to query.
     *
     * Generated from protobuf field <code>repeated .google.firestore.v1.StructuredQuery.CollectionSelector from = 2;</code>
     */
    private $from;
    /**
     * The filter to apply.
     *
     * Generated from protobuf field <code>.google.firestore.v1.StructuredQuery.Filter where = 3;</code>
     */
    private $where = null;
    /**
     * The order to apply to the query results.
     * Firestore allows callers to provide a full ordering, a partial ordering, or
     * no ordering at all. In all cases, Firestore guarantees a stable ordering
     * through the following rules:
     *  * The `order_by` is required to reference all fields used with an
     *    inequality filter.
     *  * All fields that are required to be in the `order_by` but are not already
     *    present are appended in lexicographical ordering of the field name.
     *  * If an order on `__name__` is not specified, it is appended by default.
     * Fields are appended with the same sort direction as the last order
     * specified, or 'ASCENDING' if no order was specified. For example:
     *  * `ORDER BY a` becomes `ORDER BY a ASC, __name__ ASC`
     *  * `ORDER BY a DESC` becomes `ORDER BY a DESC, __name__ DESC`
     *  * `WHERE a > 1` becomes `WHERE a > 1 ORDER BY a ASC, __name__ ASC`
     *  * `WHERE __name__ > ... AND a > 1` becomes
     *     `WHERE __name__ > ... AND a > 1 ORDER BY a ASC, __name__ ASC`
     *
     * Generated from protobuf field <code>repeated .google.firestore.v1.StructuredQuery.Order order_by = 4;</code>
     */
    private $order_by;
    /**
     * A potential prefix of a position in the result set to start the query at.
     * The ordering of the result set is based on the `ORDER BY` clause of the
     * original query.
     * ```
     * SELECT * FROM k WHERE a = 1 AND b > 2 ORDER BY b ASC, __name__ ASC;
     * ```
     * This query's results are ordered by `(b ASC, __name__ ASC)`.
     * Cursors can reference either the full ordering or a prefix of the location,
     * though it cannot reference more fields than what are in the provided
     * `ORDER BY`.
     * Continuing off the example above, attaching the following start cursors
     * will have varying impact:
     * - `START BEFORE (2, /k/123)`: start the query right before `a = 1 AND
     *    b > 2 AND __name__ > /k/123`.
     * - `START AFTER (10)`: start the query right after `a = 1 AND b > 10`.
     * Unlike `OFFSET` which requires scanning over the first N results to skip,
     * a start cursor allows the query to begin at a logical position. This
     * position is not required to match an actual result, it will scan forward
     * from this position to find the next document.
     * Requires:
     * * The number of values cannot be greater than the number of fields
     *   specified in the `ORDER BY` clause.
     *
     * Generated from protobuf field <code>.google.firestore.v1.Cursor start_at = 7;</code>
     */
    private $start_at = null;
    /**
     * A potential prefix of a position in the result set to end the query at.
     * This is similar to `START_AT` but with it controlling the end position
     * rather than the start position.
     * Requires:
     * * The number of values cannot be greater than the number of fields
     *   specified in the `ORDER BY` clause.
     *
     * Generated from protobuf field <code>.google.firestore.v1.Cursor end_at = 8;</code>
     */
    private $end_at = null;
    /**
     * The number of documents to skip before returning the first result.
     * This applies after the constraints specified by the `WHERE`, `START AT`, &
     * `END AT` but before the `LIMIT` clause.
     * Requires:
     * * The value must be greater than or equal to zero if specified.
     *
     * Generated from protobuf field <code>int32 offset = 6;</code>
     */
    private $offset = 0;
    /**
     * The maximum number of results to return.
     * Applies after all other constraints.
     * Requires:
     * * The value must be greater than or equal to zero if specified.
     *
     * Generated from protobuf field <code>.google.protobuf.Int32Value limit = 5;</code>
     */
    private $limit = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Cloud\Firestore\V1\StructuredQuery\Projection $select
     *           Optional sub-set of the fields to return.
     *           This acts as a [DocumentMask][google.firestore.v1.DocumentMask] over the
     *           documents returned from a query. When not set, assumes that the caller
     *           wants all fields returned.
     *     @type array<\Google\Cloud\Firestore\V1\StructuredQuery\CollectionSelector>|\Google\Protobuf\Internal\RepeatedField $from
     *           The collections to query.
     *     @type \Google\Cloud\Firestore\V1\StructuredQuery\Filter $where
     *           The filter to apply.
     *     @type array<\Google\Cloud\Firestore\V1\StructuredQuery\Order>|\Google\Protobuf\Internal\RepeatedField $order_by
     *           The order to apply to the query results.
     *           Firestore allows callers to provide a full ordering, a partial ordering, or
     *           no ordering at all. In all cases, Firestore guarantees a stable ordering
     *           through the following rules:
     *            * The `order_by` is required to reference all fields used with an
     *              inequality filter.
     *            * All fields that are required to be in the `order_by` but are not already
     *              present are appended in lexicographical ordering of the field name.
     *            * If an order on `__name__` is not specified, it is appended by default.
     *           Fields are appended with the same sort direction as the last order
     *           specified, or 'ASCENDING' if no order was specified. For example:
     *            * `ORDER BY a` becomes `ORDER BY a ASC, __name__ ASC`
     *            * `ORDER BY a DESC` becomes `ORDER BY a DESC, __name__ DESC`
     *            * `WHERE a > 1` becomes `WHERE a > 1 ORDER BY a ASC, __name__ ASC`
     *            * `WHERE __name__ > ... AND a > 1` becomes
     *               `WHERE __name__ > ... AND a > 1 ORDER BY a ASC, __name__ ASC`
     *     @type \Google\Cloud\Firestore\V1\Cursor $start_at
     *           A potential prefix of a position in the result set to start the query at.
     *           The ordering of the result set is based on the `ORDER BY` clause of the
     *           original query.
     *           ```
     *           SELECT * FROM k WHERE a = 1 AND b > 2 ORDER BY b ASC, __name__ ASC;
     *           ```
     *           This query's results are ordered by `(b ASC, __name__ ASC)`.
     *           Cursors can reference either the full ordering or a prefix of the location,
     *           though it cannot reference more fields than what are in the provided
     *           `ORDER BY`.
     *           Continuing off the example above, attaching the following start cursors
     *           will have varying impact:
     *           - `START BEFORE (2, /k/123)`: start the query right before `a = 1 AND
     *              b > 2 AND __name__ > /k/123`.
     *           - `START AFTER (10)`: start the query right after `a = 1 AND b > 10`.
     *           Unlike `OFFSET` which requires scanning over the first N results to skip,
     *           a start cursor allows the query to begin at a logical position. This
     *           position is not required to match an actual result, it will scan forward
     *           from this position to find the next document.
     *           Requires:
     *           * The number of values cannot be greater than the number of fields
     *             specified in the `ORDER BY` clause.
     *     @type \Google\Cloud\Firestore\V1\Cursor $end_at
     *           A potential prefix of a position in the result set to end the query at.
     *           This is similar to `START_AT` but with it controlling the end position
     *           rather than the start position.
     *           Requires:
     *           * The number of values cannot be greater than the number of fields
     *             specified in the `ORDER BY` clause.
     *     @type int $offset
     *           The number of documents to skip before returning the first result.
     *           This applies after the constraints specified by the `WHERE`, `START AT`, &
     *           `END AT` but before the `LIMIT` clause.
     *           Requires:
     *           * The value must be greater than or equal to zero if specified.
     *     @type \Google\Protobuf\Int32Value $limit
     *           The maximum number of results to return.
     *           Applies after all other constraints.
     *           Requires:
     *           * The value must be greater than or equal to zero if specified.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Firestore\V1\Query::initOnce();
        parent::__construct($data);
    }

    /**
     * Optional sub-set of the fields to return.
     * This acts as a [DocumentMask][google.firestore.v1.DocumentMask] over the
     * documents returned from a query. When not set, assumes that the caller
     * wants all fields returned.
     *
     * Generated from protobuf field <code>.google.firestore.v1.StructuredQuery.Projection select = 1;</code>
     * @return \Google\Cloud\Firestore\V1\StructuredQuery\Projection|null
     */
    public function getSelect()
    {
        return $this->select;
    }

    public function hasSelect()
    {
        return isset($this->select);
    }

    public function clearSelect()
    {
        unset($this->select);
    }

    /**
     * Optional sub-set of the fields to return.
     * This acts as a [DocumentMask][google.firestore.v1.DocumentMask] over the
     * documents returned from a query. When not set, assumes that the caller
     * wants all fields returned.
     *
     * Generated from protobuf field <code>.google.firestore.v1.StructuredQuery.Projection select = 1;</code>
     * @param \Google\Cloud\Firestore\V1\StructuredQuery\Projection $var
     * @return $this
     */
    public function setSelect($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Firestore\V1\StructuredQuery\Projection::class);
        $this->select = $var;

        return $this;
    }

    /**
     * The collections to query.
     *
     * Generated from protobuf field <code>repeated .google.firestore.v1.StructuredQuery.CollectionSelector from = 2;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * The collections to query.
     *
     * Generated from protobuf field <code>repeated .google.firestore.v1.StructuredQuery.CollectionSelector from = 2;</code>
     * @param array<\Google\Cloud\Firestore\V1\StructuredQuery\CollectionSelector>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setFrom($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Cloud\Firestore\V1\StructuredQuery\CollectionSelector::class);
        $this->from = $arr;

        return $this;
    }

    /**
     * The filter to apply.
     *
     * Generated from protobuf field <code>.google.firestore.v1.StructuredQuery.Filter where = 3;</code>
     * @return \Google\Cloud\Firestore\V1\StructuredQuery\Filter|null
     */
    public function getWhere()
    {
        return $this->where;
    }

    public function hasWhere()
    {
        return isset($this->where);
    }

    public function clearWhere()
    {
        unset($this->where);
    }

    /**
     * The filter to apply.
     *
     * Generated from protobuf field <code>.google.firestore.v1.StructuredQuery.Filter where = 3;</code>
     * @param \Google\Cloud\Firestore\V1\StructuredQuery\Filter $var
     * @return $this
     */
    public function setWhere($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Firestore\V1\StructuredQuery\Filter::class);
        $this->where = $var;

        return $this;
    }

    /**
     * The order to apply to the query results.
     * Firestore allows callers to provide a full ordering, a partial ordering, or
     * no ordering at all. In all cases, Firestore guarantees a stable ordering
     * through the following rules:
     *  * The `order_by` is required to reference all fields used with an
     *    inequality filter.
     *  * All fields that are required to be in the `order_by` but are not already
     *    present are appended in lexicographical ordering of the field name.
     *  * If an order on `__name__` is not specified, it is appended by default.
     * Fields are appended with the same sort direction as the last order
     * specified, or 'ASCENDING' if no order was specified. For example:
     *  * `ORDER BY a` becomes `ORDER BY a ASC, __name__ ASC`
     *  * `ORDER BY a DESC` becomes `ORDER BY a DESC, __name__ DESC`
     *  * `WHERE a > 1` becomes `WHERE a > 1 ORDER BY a ASC, __name__ ASC`
     *  * `WHERE __name__ > ... AND a > 1` becomes
     *     `WHERE __name__ > ... AND a > 1 ORDER BY a ASC, __name__ ASC`
     *
     * Generated from protobuf field <code>repeated .google.firestore.v1.StructuredQuery.Order order_by = 4;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getOrderBy()
    {
        return $this->order_by;
    }

    /**
     * The order to apply to the query results.
     * Firestore allows callers to provide a full ordering, a partial ordering, or
     * no ordering at all. In all cases, Firestore guarantees a stable ordering
     * through the following rules:
     *  * The `order_by` is required to reference all fields used with an
     *    inequality filter.
     *  * All fields that are required to be in the `order_by` but are not already
     *    present are appended in lexicographical ordering of the field name.
     *  * If an order on `__name__` is not specified, it is appended by default.
     * Fields are appended with the same sort direction as the last order
     * specified, or 'ASCENDING' if no order was specified. For example:
     *  * `ORDER BY a` becomes `ORDER BY a ASC, __name__ ASC`
     *  * `ORDER BY a DESC` becomes `ORDER BY a DESC, __name__ DESC`
     *  * `WHERE a > 1` becomes `WHERE a > 1 ORDER BY a ASC, __name__ ASC`
     *  * `WHERE __name__ > ... AND a > 1` becomes
     *     `WHERE __name__ > ... AND a > 1 ORDER BY a ASC, __name__ ASC`
     *
     * Generated from protobuf field <code>repeated .google.firestore.v1.StructuredQuery.Order order_by = 4;</code>
     * @param array<\Google\Cloud\Firestore\V1\StructuredQuery\Order>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setOrderBy($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Cloud\Firestore\V1\StructuredQuery\Order::class);
        $this->order_by = $arr;

        return $this;
    }

    /**
     * A potential prefix of a position in the result set to start the query at.
     * The ordering of the result set is based on the `ORDER BY` clause of the
     * original query.
     * ```
     * SELECT * FROM k WHERE a = 1 AND b > 2 ORDER BY b ASC, __name__ ASC;
     * ```
     * This query's results are ordered by `(b ASC, __name__ ASC)`.
     * Cursors can reference either the full ordering or a prefix of the location,
     * though it cannot reference more fields than what are in the provided
     * `ORDER BY`.
     * Continuing off the example above, attaching the following start cursors
     * will have varying impact:
     * - `START BEFORE (2, /k/123)`: start the query right before `a = 1 AND
     *    b > 2 AND __name__ > /k/123`.
     * - `START AFTER (10)`: start the query right after `a = 1 AND b > 10`.
     * Unlike `OFFSET` which requires scanning over the first N results to skip,
     * a start cursor allows the query to begin at a logical position. This
     * position is not required to match an actual result, it will scan forward
     * from this position to find the next document.
     * Requires:
     * * The number of values cannot be greater than the number of fields
     *   specified in the `ORDER BY` clause.
     *
     * Generated from protobuf field <code>.google.firestore.v1.Cursor start_at = 7;</code>
     * @return \Google\Cloud\Firestore\V1\Cursor|null
     */
    public function getStartAt()
    {
        return $this->start_at;
    }

    public function hasStartAt()
    {
        return isset($this->start_at);
    }

    public function clearStartAt()
    {
        unset($this->start_at);
    }

    /**
     * A potential prefix of a position in the result set to start the query at.
     * The ordering of the result set is based on the `ORDER BY` clause of the
     * original query.
     * ```
     * SELECT * FROM k WHERE a = 1 AND b > 2 ORDER BY b ASC, __name__ ASC;
     * ```
     * This query's results are ordered by `(b ASC, __name__ ASC)`.
     * Cursors can reference either the full ordering or a prefix of the location,
     * though it cannot reference more fields than what are in the provided
     * `ORDER BY`.
     * Continuing off the example above, attaching the following start cursors
     * will have varying impact:
     * - `START BEFORE (2, /k/123)`: start the query right before `a = 1 AND
     *    b > 2 AND __name__ > /k/123`.
     * - `START AFTER (10)`: start the query right after `a = 1 AND b > 10`.
     * Unlike `OFFSET` which requires scanning over the first N results to skip,
     * a start cursor allows the query to begin at a logical position. This
     * position is not required to match an actual result, it will scan forward
     * from this position to find the next document.
     * Requires:
     * * The number of values cannot be greater than the number of fields
     *   specified in the `ORDER BY` clause.
     *
     * Generated from protobuf field <code>.google.firestore.v1.Cursor start_at = 7;</code>
     * @param \Google\Cloud\Firestore\V1\Cursor $var
     * @return $this
     */
    public function setStartAt($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Firestore\V1\Cursor::class);
        $this->start_at = $var;

        return $this;
    }

    /**
     * A potential prefix of a position in the result set to end the query at.
     * This is similar to `START_AT` but with it controlling the end position
     * rather than the start position.
     * Requires:
     * * The number of values cannot be greater than the number of fields
     *   specified in the `ORDER BY` clause.
     *
     * Generated from protobuf field <code>.google.firestore.v1.Cursor end_at = 8;</code>
     * @return \Google\Cloud\Firestore\V1\Cursor|null
     */
    public function getEndAt()
    {
        return $this->end_at;
    }

    public function hasEndAt()
    {
        return isset($this->end_at);
    }

    public function clearEndAt()
    {
        unset($this->end_at);
    }

    /**
     * A potential prefix of a position in the result set to end the query at.
     * This is similar to `START_AT` but with it controlling the end position
     * rather than the start position.
     * Requires:
     * * The number of values cannot be greater than the number of fields
     *   specified in the `ORDER BY` clause.
     *
     * Generated from protobuf field <code>.google.firestore.v1.Cursor end_at = 8;</code>
     * @param \Google\Cloud\Firestore\V1\Cursor $var
     * @return $this
     */
    public function setEndAt($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Firestore\V1\Cursor::class);
        $this->end_at = $var;

        return $this;
    }

    /**
     * The number of documents to skip before returning the first result.
     * This applies after the constraints specified by the `WHERE`, `START AT`, &
     * `END AT` but before the `LIMIT` clause.
     * Requires:
     * * The value must be greater than or equal to zero if specified.
     *
     * Generated from protobuf field <code>int32 offset = 6;</code>
     * @return int
     */
    public function getOffset()
    {
        return $this->offset;
    }

    /**
     * The number of documents to skip before returning the first result.
     * This applies after the constraints specified by the `WHERE`, `START AT`, &
     * `END AT` but before the `LIMIT` clause.
     * Requires:
     * * The value must be greater than or equal to zero if specified.
     *
     * Generated from protobuf field <code>int32 offset = 6;</code>
     * @param int $var
     * @return $this
     */
    public function setOffset($var)
    {
        GPBUtil::checkInt32($var);
        $this->offset = $var;

        return $this;
    }

    /**
     * The maximum number of results to return.
     * Applies after all other constraints.
     * Requires:
     * * The value must be greater than or equal to zero if specified.
     *
     * Generated from protobuf field <code>.google.protobuf.Int32Value limit = 5;</code>
     * @return \Google\Protobuf\Int32Value|null
     */
    public function getLimit()
    {
        return $this->limit;
    }

    public function hasLimit()
    {
        return isset($this->limit);
    }

    public function clearLimit()
    {
        unset($this->limit);
    }

    /**
     * Returns the unboxed value from <code>getLimit()</code>

     * The maximum number of results to return.
     * Applies after all other constraints.
     * Requires:
     * * The value must be greater than or equal to zero if specified.
     *
     * Generated from protobuf field <code>.google.protobuf.Int32Value limit = 5;</code>
     * @return int|null
     */
    public function getLimitValue()
    {
        return $this->readWrapperValue("limit");
    }

    /**
     * The maximum number of results to return.
     * Applies after all other constraints.
     * Requires:
     * * The value must be greater than or equal to zero if specified.
     *
     * Generated from protobuf field <code>.google.protobuf.Int32Value limit = 5;</code>
     * @param \Google\Protobuf\Int32Value $var
     * @return $this
     */
    public function setLimit($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Int32Value::class);
        $this->limit = $var;

        return $this;
    }

    /**
     * Sets the field by wrapping a primitive type in a Google\Protobuf\Int32Value object.

     * The maximum number of results to return.
     * Applies after all other constraints.
     * Requires:
     * * The value must be greater than or equal to zero if specified.
     *
     * Generated from protobuf field <code>.google.protobuf.Int32Value limit = 5;</code>
     * @param int|null $var
     * @return $this
     */
    public function setLimitValue($var)
    {
        $this->writeWrapperValue("limit", $var);
        return $this;}

}

