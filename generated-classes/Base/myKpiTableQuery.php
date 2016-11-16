<?php

namespace Base;

use \myKpiTable as ChildmyKpiTable;
use \myKpiTableQuery as ChildmyKpiTableQuery;
use \Exception;
use \PDO;
use Map\myKpiTableTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'mykpitable' table.
 *
 *
 *
 * @method     ChildmyKpiTableQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildmyKpiTableQuery orderBytotalEstimated($order = Criteria::ASC) Order by the totalestimated column
 * @method     ChildmyKpiTableQuery orderBynonBillblEstimated($order = Criteria::ASC) Order by the nonbillblestimated column
 * @method     ChildmyKpiTableQuery orderBybillblEstimated($order = Criteria::ASC) Order by the billblestimated column
 * @method     ChildmyKpiTableQuery orderBytotalSpentTime($order = Criteria::ASC) Order by the totalspenttime column
 * @method     ChildmyKpiTableQuery orderBynonBillblSpentTime($order = Criteria::ASC) Order by the nonbillblspenttime column
 * @method     ChildmyKpiTableQuery orderBybillblspentTime($order = Criteria::ASC) Order by the billblspentTime column
 * @method     ChildmyKpiTableQuery orderBytotalProjects($order = Criteria::ASC) Order by the totalprojects column
 * @method     ChildmyKpiTableQuery orderBytotalPM($order = Criteria::ASC) Order by the totalpm column
 *
 * @method     ChildmyKpiTableQuery groupById() Group by the id column
 * @method     ChildmyKpiTableQuery groupBytotalEstimated() Group by the totalestimated column
 * @method     ChildmyKpiTableQuery groupBynonBillblEstimated() Group by the nonbillblestimated column
 * @method     ChildmyKpiTableQuery groupBybillblEstimated() Group by the billblestimated column
 * @method     ChildmyKpiTableQuery groupBytotalSpentTime() Group by the totalspenttime column
 * @method     ChildmyKpiTableQuery groupBynonBillblSpentTime() Group by the nonbillblspenttime column
 * @method     ChildmyKpiTableQuery groupBybillblspentTime() Group by the billblspentTime column
 * @method     ChildmyKpiTableQuery groupBytotalProjects() Group by the totalprojects column
 * @method     ChildmyKpiTableQuery groupBytotalPM() Group by the totalpm column
 *
 * @method     ChildmyKpiTableQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildmyKpiTableQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildmyKpiTableQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildmyKpiTableQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildmyKpiTableQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildmyKpiTableQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildmyKpiTable findOne(ConnectionInterface $con = null) Return the first ChildmyKpiTable matching the query
 * @method     ChildmyKpiTable findOneOrCreate(ConnectionInterface $con = null) Return the first ChildmyKpiTable matching the query, or a new ChildmyKpiTable object populated from the query conditions when no match is found
 *
 * @method     ChildmyKpiTable findOneById(int $id) Return the first ChildmyKpiTable filtered by the id column
 * @method     ChildmyKpiTable findOneBytotalEstimated(double $totalestimated) Return the first ChildmyKpiTable filtered by the totalestimated column
 * @method     ChildmyKpiTable findOneBynonBillblEstimated(double $nonbillblestimated) Return the first ChildmyKpiTable filtered by the nonbillblestimated column
 * @method     ChildmyKpiTable findOneBybillblEstimated(double $billblestimated) Return the first ChildmyKpiTable filtered by the billblestimated column
 * @method     ChildmyKpiTable findOneBytotalSpentTime(double $totalspenttime) Return the first ChildmyKpiTable filtered by the totalspenttime column
 * @method     ChildmyKpiTable findOneBynonBillblSpentTime(double $nonbillblspenttime) Return the first ChildmyKpiTable filtered by the nonbillblspenttime column
 * @method     ChildmyKpiTable findOneBybillblspentTime(double $billblspentTime) Return the first ChildmyKpiTable filtered by the billblspentTime column
 * @method     ChildmyKpiTable findOneBytotalProjects(double $totalprojects) Return the first ChildmyKpiTable filtered by the totalprojects column
 * @method     ChildmyKpiTable findOneBytotalPM(double $totalpm) Return the first ChildmyKpiTable filtered by the totalpm column *

 * @method     ChildmyKpiTable requirePk($key, ConnectionInterface $con = null) Return the ChildmyKpiTable by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyKpiTable requireOne(ConnectionInterface $con = null) Return the first ChildmyKpiTable matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildmyKpiTable requireOneById(int $id) Return the first ChildmyKpiTable filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyKpiTable requireOneBytotalEstimated(double $totalestimated) Return the first ChildmyKpiTable filtered by the totalestimated column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyKpiTable requireOneBynonBillblEstimated(double $nonbillblestimated) Return the first ChildmyKpiTable filtered by the nonbillblestimated column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyKpiTable requireOneBybillblEstimated(double $billblestimated) Return the first ChildmyKpiTable filtered by the billblestimated column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyKpiTable requireOneBytotalSpentTime(double $totalspenttime) Return the first ChildmyKpiTable filtered by the totalspenttime column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyKpiTable requireOneBynonBillblSpentTime(double $nonbillblspenttime) Return the first ChildmyKpiTable filtered by the nonbillblspenttime column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyKpiTable requireOneBybillblspentTime(double $billblspentTime) Return the first ChildmyKpiTable filtered by the billblspentTime column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyKpiTable requireOneBytotalProjects(double $totalprojects) Return the first ChildmyKpiTable filtered by the totalprojects column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyKpiTable requireOneBytotalPM(double $totalpm) Return the first ChildmyKpiTable filtered by the totalpm column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildmyKpiTable[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildmyKpiTable objects based on current ModelCriteria
 * @method     ChildmyKpiTable[]|ObjectCollection findById(int $id) Return ChildmyKpiTable objects filtered by the id column
 * @method     ChildmyKpiTable[]|ObjectCollection findBytotalEstimated(double $totalestimated) Return ChildmyKpiTable objects filtered by the totalestimated column
 * @method     ChildmyKpiTable[]|ObjectCollection findBynonBillblEstimated(double $nonbillblestimated) Return ChildmyKpiTable objects filtered by the nonbillblestimated column
 * @method     ChildmyKpiTable[]|ObjectCollection findBybillblEstimated(double $billblestimated) Return ChildmyKpiTable objects filtered by the billblestimated column
 * @method     ChildmyKpiTable[]|ObjectCollection findBytotalSpentTime(double $totalspenttime) Return ChildmyKpiTable objects filtered by the totalspenttime column
 * @method     ChildmyKpiTable[]|ObjectCollection findBynonBillblSpentTime(double $nonbillblspenttime) Return ChildmyKpiTable objects filtered by the nonbillblspenttime column
 * @method     ChildmyKpiTable[]|ObjectCollection findBybillblspentTime(double $billblspentTime) Return ChildmyKpiTable objects filtered by the billblspentTime column
 * @method     ChildmyKpiTable[]|ObjectCollection findBytotalProjects(double $totalprojects) Return ChildmyKpiTable objects filtered by the totalprojects column
 * @method     ChildmyKpiTable[]|ObjectCollection findBytotalPM(double $totalpm) Return ChildmyKpiTable objects filtered by the totalpm column
 * @method     ChildmyKpiTable[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class myKpiTableQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\myKpiTableQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'kpidata', $modelName = '\\myKpiTable', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildmyKpiTableQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildmyKpiTableQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildmyKpiTableQuery) {
            return $criteria;
        }
        $query = new ChildmyKpiTableQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildmyKpiTable|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(myKpiTableTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = myKpiTableTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildmyKpiTable A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, totalestimated, nonbillblestimated, billblestimated, totalspenttime, nonbillblspenttime, billblspentTime, totalprojects, totalpm FROM mykpitable WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildmyKpiTable $obj */
            $obj = new ChildmyKpiTable();
            $obj->hydrate($row);
            myKpiTableTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildmyKpiTable|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildmyKpiTableQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(myKpiTableTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildmyKpiTableQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(myKpiTableTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyKpiTableQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(myKpiTableTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(myKpiTableTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myKpiTableTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the totalestimated column
     *
     * Example usage:
     * <code>
     * $query->filterBytotalEstimated(1234); // WHERE totalestimated = 1234
     * $query->filterBytotalEstimated(array(12, 34)); // WHERE totalestimated IN (12, 34)
     * $query->filterBytotalEstimated(array('min' => 12)); // WHERE totalestimated > 12
     * </code>
     *
     * @param     mixed $totalEstimated The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyKpiTableQuery The current query, for fluid interface
     */
    public function filterBytotalEstimated($totalEstimated = null, $comparison = null)
    {
        if (is_array($totalEstimated)) {
            $useMinMax = false;
            if (isset($totalEstimated['min'])) {
                $this->addUsingAlias(myKpiTableTableMap::COL_TOTALESTIMATED, $totalEstimated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalEstimated['max'])) {
                $this->addUsingAlias(myKpiTableTableMap::COL_TOTALESTIMATED, $totalEstimated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myKpiTableTableMap::COL_TOTALESTIMATED, $totalEstimated, $comparison);
    }

    /**
     * Filter the query on the nonbillblestimated column
     *
     * Example usage:
     * <code>
     * $query->filterBynonBillblEstimated(1234); // WHERE nonbillblestimated = 1234
     * $query->filterBynonBillblEstimated(array(12, 34)); // WHERE nonbillblestimated IN (12, 34)
     * $query->filterBynonBillblEstimated(array('min' => 12)); // WHERE nonbillblestimated > 12
     * </code>
     *
     * @param     mixed $nonBillblEstimated The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyKpiTableQuery The current query, for fluid interface
     */
    public function filterBynonBillblEstimated($nonBillblEstimated = null, $comparison = null)
    {
        if (is_array($nonBillblEstimated)) {
            $useMinMax = false;
            if (isset($nonBillblEstimated['min'])) {
                $this->addUsingAlias(myKpiTableTableMap::COL_NONBILLBLESTIMATED, $nonBillblEstimated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($nonBillblEstimated['max'])) {
                $this->addUsingAlias(myKpiTableTableMap::COL_NONBILLBLESTIMATED, $nonBillblEstimated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myKpiTableTableMap::COL_NONBILLBLESTIMATED, $nonBillblEstimated, $comparison);
    }

    /**
     * Filter the query on the billblestimated column
     *
     * Example usage:
     * <code>
     * $query->filterBybillblEstimated(1234); // WHERE billblestimated = 1234
     * $query->filterBybillblEstimated(array(12, 34)); // WHERE billblestimated IN (12, 34)
     * $query->filterBybillblEstimated(array('min' => 12)); // WHERE billblestimated > 12
     * </code>
     *
     * @param     mixed $billblEstimated The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyKpiTableQuery The current query, for fluid interface
     */
    public function filterBybillblEstimated($billblEstimated = null, $comparison = null)
    {
        if (is_array($billblEstimated)) {
            $useMinMax = false;
            if (isset($billblEstimated['min'])) {
                $this->addUsingAlias(myKpiTableTableMap::COL_BILLBLESTIMATED, $billblEstimated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($billblEstimated['max'])) {
                $this->addUsingAlias(myKpiTableTableMap::COL_BILLBLESTIMATED, $billblEstimated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myKpiTableTableMap::COL_BILLBLESTIMATED, $billblEstimated, $comparison);
    }

    /**
     * Filter the query on the totalspenttime column
     *
     * Example usage:
     * <code>
     * $query->filterBytotalSpentTime(1234); // WHERE totalspenttime = 1234
     * $query->filterBytotalSpentTime(array(12, 34)); // WHERE totalspenttime IN (12, 34)
     * $query->filterBytotalSpentTime(array('min' => 12)); // WHERE totalspenttime > 12
     * </code>
     *
     * @param     mixed $totalSpentTime The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyKpiTableQuery The current query, for fluid interface
     */
    public function filterBytotalSpentTime($totalSpentTime = null, $comparison = null)
    {
        if (is_array($totalSpentTime)) {
            $useMinMax = false;
            if (isset($totalSpentTime['min'])) {
                $this->addUsingAlias(myKpiTableTableMap::COL_TOTALSPENTTIME, $totalSpentTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalSpentTime['max'])) {
                $this->addUsingAlias(myKpiTableTableMap::COL_TOTALSPENTTIME, $totalSpentTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myKpiTableTableMap::COL_TOTALSPENTTIME, $totalSpentTime, $comparison);
    }

    /**
     * Filter the query on the nonbillblspenttime column
     *
     * Example usage:
     * <code>
     * $query->filterBynonBillblSpentTime(1234); // WHERE nonbillblspenttime = 1234
     * $query->filterBynonBillblSpentTime(array(12, 34)); // WHERE nonbillblspenttime IN (12, 34)
     * $query->filterBynonBillblSpentTime(array('min' => 12)); // WHERE nonbillblspenttime > 12
     * </code>
     *
     * @param     mixed $nonBillblSpentTime The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyKpiTableQuery The current query, for fluid interface
     */
    public function filterBynonBillblSpentTime($nonBillblSpentTime = null, $comparison = null)
    {
        if (is_array($nonBillblSpentTime)) {
            $useMinMax = false;
            if (isset($nonBillblSpentTime['min'])) {
                $this->addUsingAlias(myKpiTableTableMap::COL_NONBILLBLSPENTTIME, $nonBillblSpentTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($nonBillblSpentTime['max'])) {
                $this->addUsingAlias(myKpiTableTableMap::COL_NONBILLBLSPENTTIME, $nonBillblSpentTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myKpiTableTableMap::COL_NONBILLBLSPENTTIME, $nonBillblSpentTime, $comparison);
    }

    /**
     * Filter the query on the billblspentTime column
     *
     * Example usage:
     * <code>
     * $query->filterBybillblspentTime(1234); // WHERE billblspentTime = 1234
     * $query->filterBybillblspentTime(array(12, 34)); // WHERE billblspentTime IN (12, 34)
     * $query->filterBybillblspentTime(array('min' => 12)); // WHERE billblspentTime > 12
     * </code>
     *
     * @param     mixed $billblspentTime The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyKpiTableQuery The current query, for fluid interface
     */
    public function filterBybillblspentTime($billblspentTime = null, $comparison = null)
    {
        if (is_array($billblspentTime)) {
            $useMinMax = false;
            if (isset($billblspentTime['min'])) {
                $this->addUsingAlias(myKpiTableTableMap::COL_BILLBLSPENTTIME, $billblspentTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($billblspentTime['max'])) {
                $this->addUsingAlias(myKpiTableTableMap::COL_BILLBLSPENTTIME, $billblspentTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myKpiTableTableMap::COL_BILLBLSPENTTIME, $billblspentTime, $comparison);
    }

    /**
     * Filter the query on the totalprojects column
     *
     * Example usage:
     * <code>
     * $query->filterBytotalProjects(1234); // WHERE totalprojects = 1234
     * $query->filterBytotalProjects(array(12, 34)); // WHERE totalprojects IN (12, 34)
     * $query->filterBytotalProjects(array('min' => 12)); // WHERE totalprojects > 12
     * </code>
     *
     * @param     mixed $totalProjects The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyKpiTableQuery The current query, for fluid interface
     */
    public function filterBytotalProjects($totalProjects = null, $comparison = null)
    {
        if (is_array($totalProjects)) {
            $useMinMax = false;
            if (isset($totalProjects['min'])) {
                $this->addUsingAlias(myKpiTableTableMap::COL_TOTALPROJECTS, $totalProjects['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalProjects['max'])) {
                $this->addUsingAlias(myKpiTableTableMap::COL_TOTALPROJECTS, $totalProjects['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myKpiTableTableMap::COL_TOTALPROJECTS, $totalProjects, $comparison);
    }

    /**
     * Filter the query on the totalpm column
     *
     * Example usage:
     * <code>
     * $query->filterBytotalPM(1234); // WHERE totalpm = 1234
     * $query->filterBytotalPM(array(12, 34)); // WHERE totalpm IN (12, 34)
     * $query->filterBytotalPM(array('min' => 12)); // WHERE totalpm > 12
     * </code>
     *
     * @param     mixed $totalPM The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyKpiTableQuery The current query, for fluid interface
     */
    public function filterBytotalPM($totalPM = null, $comparison = null)
    {
        if (is_array($totalPM)) {
            $useMinMax = false;
            if (isset($totalPM['min'])) {
                $this->addUsingAlias(myKpiTableTableMap::COL_TOTALPM, $totalPM['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalPM['max'])) {
                $this->addUsingAlias(myKpiTableTableMap::COL_TOTALPM, $totalPM['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myKpiTableTableMap::COL_TOTALPM, $totalPM, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildmyKpiTable $myKpiTable Object to remove from the list of results
     *
     * @return $this|ChildmyKpiTableQuery The current query, for fluid interface
     */
    public function prune($myKpiTable = null)
    {
        if ($myKpiTable) {
            $this->addUsingAlias(myKpiTableTableMap::COL_ID, $myKpiTable->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the mykpitable table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(myKpiTableTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            myKpiTableTableMap::clearInstancePool();
            myKpiTableTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(myKpiTableTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(myKpiTableTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            myKpiTableTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            myKpiTableTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // myKpiTableQuery
