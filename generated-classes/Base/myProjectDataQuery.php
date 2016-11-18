<?php

namespace Base;

use \myProjectData as ChildmyProjectData;
use \myProjectDataQuery as ChildmyProjectDataQuery;
use \Exception;
use \PDO;
use Map\myProjectDataTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'myprojectdata' table.
 *
 *
 *
 * @method     ChildmyProjectDataQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildmyProjectDataQuery orderByBudget($order = Criteria::ASC) Order by the budget column
 * @method     ChildmyProjectDataQuery orderByHourlyRate($order = Criteria::ASC) Order by the hourlyrate column
 * @method     ChildmyProjectDataQuery orderByHourlyBuffer($order = Criteria::ASC) Order by the hourlybuffer column
 * @method     ChildmyProjectDataQuery orderByPlannedValue($order = Criteria::ASC) Order by the plannedvalue column
 * @method     ChildmyProjectDataQuery orderByActualCost($order = Criteria::ASC) Order by the actualcost column
 * @method     ChildmyProjectDataQuery orderByEarnedValueForUs($order = Criteria::ASC) Order by the earnedvalueforus column
 * @method     ChildmyProjectDataQuery orderByEarnedValueForClient($order = Criteria::ASC) Order by the earnedvalueforclient column
 * @method     ChildmyProjectDataQuery orderByEarnedValueVarience($order = Criteria::ASC) Order by the earnedvaluevarience column
 * @method     ChildmyProjectDataQuery orderByScheduleVariance($order = Criteria::ASC) Order by the schedulevariance column
 * @method     ChildmyProjectDataQuery orderByCostVariance($order = Criteria::ASC) Order by the costvariance column
 * @method     ChildmyProjectDataQuery orderBySchedulePerformanceIndex($order = Criteria::ASC) Order by the scheduleperformanceindex column
 * @method     ChildmyProjectDataQuery orderByCostPerformanceIndex($order = Criteria::ASC) Order by the costperformanceindex column
 * @method     ChildmyProjectDataQuery orderByEstimateAtCompletionForClient($order = Criteria::ASC) Order by the estimateatcompletionforclient column
 * @method     ChildmyProjectDataQuery orderByVarianceAtCompletionForClient($order = Criteria::ASC) Order by the varianceatcompletionforclient column
 * @method     ChildmyProjectDataQuery orderByCostAtCompletionForUs($order = Criteria::ASC) Order by the costatcompletionforus column
 * @method     ChildmyProjectDataQuery orderByToCompletePerformanceIndex($order = Criteria::ASC) Order by the tocompleteperformanceindex column
 *
 * @method     ChildmyProjectDataQuery groupById() Group by the id column
 * @method     ChildmyProjectDataQuery groupByBudget() Group by the budget column
 * @method     ChildmyProjectDataQuery groupByHourlyRate() Group by the hourlyrate column
 * @method     ChildmyProjectDataQuery groupByHourlyBuffer() Group by the hourlybuffer column
 * @method     ChildmyProjectDataQuery groupByPlannedValue() Group by the plannedvalue column
 * @method     ChildmyProjectDataQuery groupByActualCost() Group by the actualcost column
 * @method     ChildmyProjectDataQuery groupByEarnedValueForUs() Group by the earnedvalueforus column
 * @method     ChildmyProjectDataQuery groupByEarnedValueForClient() Group by the earnedvalueforclient column
 * @method     ChildmyProjectDataQuery groupByEarnedValueVarience() Group by the earnedvaluevarience column
 * @method     ChildmyProjectDataQuery groupByScheduleVariance() Group by the schedulevariance column
 * @method     ChildmyProjectDataQuery groupByCostVariance() Group by the costvariance column
 * @method     ChildmyProjectDataQuery groupBySchedulePerformanceIndex() Group by the scheduleperformanceindex column
 * @method     ChildmyProjectDataQuery groupByCostPerformanceIndex() Group by the costperformanceindex column
 * @method     ChildmyProjectDataQuery groupByEstimateAtCompletionForClient() Group by the estimateatcompletionforclient column
 * @method     ChildmyProjectDataQuery groupByVarianceAtCompletionForClient() Group by the varianceatcompletionforclient column
 * @method     ChildmyProjectDataQuery groupByCostAtCompletionForUs() Group by the costatcompletionforus column
 * @method     ChildmyProjectDataQuery groupByToCompletePerformanceIndex() Group by the tocompleteperformanceindex column
 *
 * @method     ChildmyProjectDataQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildmyProjectDataQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildmyProjectDataQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildmyProjectDataQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildmyProjectDataQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildmyProjectDataQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildmyProjectData findOne(ConnectionInterface $con = null) Return the first ChildmyProjectData matching the query
 * @method     ChildmyProjectData findOneOrCreate(ConnectionInterface $con = null) Return the first ChildmyProjectData matching the query, or a new ChildmyProjectData object populated from the query conditions when no match is found
 *
 * @method     ChildmyProjectData findOneById(int $id) Return the first ChildmyProjectData filtered by the id column
 * @method     ChildmyProjectData findOneByBudget(double $budget) Return the first ChildmyProjectData filtered by the budget column
 * @method     ChildmyProjectData findOneByHourlyRate(double $hourlyrate) Return the first ChildmyProjectData filtered by the hourlyrate column
 * @method     ChildmyProjectData findOneByHourlyBuffer(double $hourlybuffer) Return the first ChildmyProjectData filtered by the hourlybuffer column
 * @method     ChildmyProjectData findOneByPlannedValue(double $plannedvalue) Return the first ChildmyProjectData filtered by the plannedvalue column
 * @method     ChildmyProjectData findOneByActualCost(double $actualcost) Return the first ChildmyProjectData filtered by the actualcost column
 * @method     ChildmyProjectData findOneByEarnedValueForUs(double $earnedvalueforus) Return the first ChildmyProjectData filtered by the earnedvalueforus column
 * @method     ChildmyProjectData findOneByEarnedValueForClient(double $earnedvalueforclient) Return the first ChildmyProjectData filtered by the earnedvalueforclient column
 * @method     ChildmyProjectData findOneByEarnedValueVarience(double $earnedvaluevarience) Return the first ChildmyProjectData filtered by the earnedvaluevarience column
 * @method     ChildmyProjectData findOneByScheduleVariance(double $schedulevariance) Return the first ChildmyProjectData filtered by the schedulevariance column
 * @method     ChildmyProjectData findOneByCostVariance(double $costvariance) Return the first ChildmyProjectData filtered by the costvariance column
 * @method     ChildmyProjectData findOneBySchedulePerformanceIndex(double $scheduleperformanceindex) Return the first ChildmyProjectData filtered by the scheduleperformanceindex column
 * @method     ChildmyProjectData findOneByCostPerformanceIndex(double $costperformanceindex) Return the first ChildmyProjectData filtered by the costperformanceindex column
 * @method     ChildmyProjectData findOneByEstimateAtCompletionForClient(double $estimateatcompletionforclient) Return the first ChildmyProjectData filtered by the estimateatcompletionforclient column
 * @method     ChildmyProjectData findOneByVarianceAtCompletionForClient(double $varianceatcompletionforclient) Return the first ChildmyProjectData filtered by the varianceatcompletionforclient column
 * @method     ChildmyProjectData findOneByCostAtCompletionForUs(double $costatcompletionforus) Return the first ChildmyProjectData filtered by the costatcompletionforus column
 * @method     ChildmyProjectData findOneByToCompletePerformanceIndex(double $tocompleteperformanceindex) Return the first ChildmyProjectData filtered by the tocompleteperformanceindex column *

 * @method     ChildmyProjectData requirePk($key, ConnectionInterface $con = null) Return the ChildmyProjectData by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyProjectData requireOne(ConnectionInterface $con = null) Return the first ChildmyProjectData matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildmyProjectData requireOneById(int $id) Return the first ChildmyProjectData filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyProjectData requireOneByBudget(double $budget) Return the first ChildmyProjectData filtered by the budget column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyProjectData requireOneByHourlyRate(double $hourlyrate) Return the first ChildmyProjectData filtered by the hourlyrate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyProjectData requireOneByHourlyBuffer(double $hourlybuffer) Return the first ChildmyProjectData filtered by the hourlybuffer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyProjectData requireOneByPlannedValue(double $plannedvalue) Return the first ChildmyProjectData filtered by the plannedvalue column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyProjectData requireOneByActualCost(double $actualcost) Return the first ChildmyProjectData filtered by the actualcost column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyProjectData requireOneByEarnedValueForUs(double $earnedvalueforus) Return the first ChildmyProjectData filtered by the earnedvalueforus column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyProjectData requireOneByEarnedValueForClient(double $earnedvalueforclient) Return the first ChildmyProjectData filtered by the earnedvalueforclient column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyProjectData requireOneByEarnedValueVarience(double $earnedvaluevarience) Return the first ChildmyProjectData filtered by the earnedvaluevarience column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyProjectData requireOneByScheduleVariance(double $schedulevariance) Return the first ChildmyProjectData filtered by the schedulevariance column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyProjectData requireOneByCostVariance(double $costvariance) Return the first ChildmyProjectData filtered by the costvariance column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyProjectData requireOneBySchedulePerformanceIndex(double $scheduleperformanceindex) Return the first ChildmyProjectData filtered by the scheduleperformanceindex column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyProjectData requireOneByCostPerformanceIndex(double $costperformanceindex) Return the first ChildmyProjectData filtered by the costperformanceindex column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyProjectData requireOneByEstimateAtCompletionForClient(double $estimateatcompletionforclient) Return the first ChildmyProjectData filtered by the estimateatcompletionforclient column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyProjectData requireOneByVarianceAtCompletionForClient(double $varianceatcompletionforclient) Return the first ChildmyProjectData filtered by the varianceatcompletionforclient column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyProjectData requireOneByCostAtCompletionForUs(double $costatcompletionforus) Return the first ChildmyProjectData filtered by the costatcompletionforus column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyProjectData requireOneByToCompletePerformanceIndex(double $tocompleteperformanceindex) Return the first ChildmyProjectData filtered by the tocompleteperformanceindex column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildmyProjectData[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildmyProjectData objects based on current ModelCriteria
 * @method     ChildmyProjectData[]|ObjectCollection findById(int $id) Return ChildmyProjectData objects filtered by the id column
 * @method     ChildmyProjectData[]|ObjectCollection findByBudget(double $budget) Return ChildmyProjectData objects filtered by the budget column
 * @method     ChildmyProjectData[]|ObjectCollection findByHourlyRate(double $hourlyrate) Return ChildmyProjectData objects filtered by the hourlyrate column
 * @method     ChildmyProjectData[]|ObjectCollection findByHourlyBuffer(double $hourlybuffer) Return ChildmyProjectData objects filtered by the hourlybuffer column
 * @method     ChildmyProjectData[]|ObjectCollection findByPlannedValue(double $plannedvalue) Return ChildmyProjectData objects filtered by the plannedvalue column
 * @method     ChildmyProjectData[]|ObjectCollection findByActualCost(double $actualcost) Return ChildmyProjectData objects filtered by the actualcost column
 * @method     ChildmyProjectData[]|ObjectCollection findByEarnedValueForUs(double $earnedvalueforus) Return ChildmyProjectData objects filtered by the earnedvalueforus column
 * @method     ChildmyProjectData[]|ObjectCollection findByEarnedValueForClient(double $earnedvalueforclient) Return ChildmyProjectData objects filtered by the earnedvalueforclient column
 * @method     ChildmyProjectData[]|ObjectCollection findByEarnedValueVarience(double $earnedvaluevarience) Return ChildmyProjectData objects filtered by the earnedvaluevarience column
 * @method     ChildmyProjectData[]|ObjectCollection findByScheduleVariance(double $schedulevariance) Return ChildmyProjectData objects filtered by the schedulevariance column
 * @method     ChildmyProjectData[]|ObjectCollection findByCostVariance(double $costvariance) Return ChildmyProjectData objects filtered by the costvariance column
 * @method     ChildmyProjectData[]|ObjectCollection findBySchedulePerformanceIndex(double $scheduleperformanceindex) Return ChildmyProjectData objects filtered by the scheduleperformanceindex column
 * @method     ChildmyProjectData[]|ObjectCollection findByCostPerformanceIndex(double $costperformanceindex) Return ChildmyProjectData objects filtered by the costperformanceindex column
 * @method     ChildmyProjectData[]|ObjectCollection findByEstimateAtCompletionForClient(double $estimateatcompletionforclient) Return ChildmyProjectData objects filtered by the estimateatcompletionforclient column
 * @method     ChildmyProjectData[]|ObjectCollection findByVarianceAtCompletionForClient(double $varianceatcompletionforclient) Return ChildmyProjectData objects filtered by the varianceatcompletionforclient column
 * @method     ChildmyProjectData[]|ObjectCollection findByCostAtCompletionForUs(double $costatcompletionforus) Return ChildmyProjectData objects filtered by the costatcompletionforus column
 * @method     ChildmyProjectData[]|ObjectCollection findByToCompletePerformanceIndex(double $tocompleteperformanceindex) Return ChildmyProjectData objects filtered by the tocompleteperformanceindex column
 * @method     ChildmyProjectData[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class myProjectDataQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\myProjectDataQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'kpidata', $modelName = '\\myProjectData', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildmyProjectDataQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildmyProjectDataQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildmyProjectDataQuery) {
            return $criteria;
        }
        $query = new ChildmyProjectDataQuery();
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
     * @return ChildmyProjectData|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(myProjectDataTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = myProjectDataTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildmyProjectData A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, budget, hourlyrate, hourlybuffer, plannedvalue, actualcost, earnedvalueforus, earnedvalueforclient, earnedvaluevarience, schedulevariance, costvariance, scheduleperformanceindex, costperformanceindex, estimateatcompletionforclient, varianceatcompletionforclient, costatcompletionforus, tocompleteperformanceindex FROM myprojectdata WHERE id = :p0';
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
            /** @var ChildmyProjectData $obj */
            $obj = new ChildmyProjectData();
            $obj->hydrate($row);
            myProjectDataTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildmyProjectData|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildmyProjectDataQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(myProjectDataTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildmyProjectDataQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(myProjectDataTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildmyProjectDataQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(myProjectDataTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(myProjectDataTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myProjectDataTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the budget column
     *
     * Example usage:
     * <code>
     * $query->filterByBudget(1234); // WHERE budget = 1234
     * $query->filterByBudget(array(12, 34)); // WHERE budget IN (12, 34)
     * $query->filterByBudget(array('min' => 12)); // WHERE budget > 12
     * </code>
     *
     * @param     mixed $budget The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyProjectDataQuery The current query, for fluid interface
     */
    public function filterByBudget($budget = null, $comparison = null)
    {
        if (is_array($budget)) {
            $useMinMax = false;
            if (isset($budget['min'])) {
                $this->addUsingAlias(myProjectDataTableMap::COL_BUDGET, $budget['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($budget['max'])) {
                $this->addUsingAlias(myProjectDataTableMap::COL_BUDGET, $budget['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myProjectDataTableMap::COL_BUDGET, $budget, $comparison);
    }

    /**
     * Filter the query on the hourlyrate column
     *
     * Example usage:
     * <code>
     * $query->filterByHourlyRate(1234); // WHERE hourlyrate = 1234
     * $query->filterByHourlyRate(array(12, 34)); // WHERE hourlyrate IN (12, 34)
     * $query->filterByHourlyRate(array('min' => 12)); // WHERE hourlyrate > 12
     * </code>
     *
     * @param     mixed $hourlyRate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyProjectDataQuery The current query, for fluid interface
     */
    public function filterByHourlyRate($hourlyRate = null, $comparison = null)
    {
        if (is_array($hourlyRate)) {
            $useMinMax = false;
            if (isset($hourlyRate['min'])) {
                $this->addUsingAlias(myProjectDataTableMap::COL_HOURLYRATE, $hourlyRate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($hourlyRate['max'])) {
                $this->addUsingAlias(myProjectDataTableMap::COL_HOURLYRATE, $hourlyRate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myProjectDataTableMap::COL_HOURLYRATE, $hourlyRate, $comparison);
    }

    /**
     * Filter the query on the hourlybuffer column
     *
     * Example usage:
     * <code>
     * $query->filterByHourlyBuffer(1234); // WHERE hourlybuffer = 1234
     * $query->filterByHourlyBuffer(array(12, 34)); // WHERE hourlybuffer IN (12, 34)
     * $query->filterByHourlyBuffer(array('min' => 12)); // WHERE hourlybuffer > 12
     * </code>
     *
     * @param     mixed $hourlyBuffer The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyProjectDataQuery The current query, for fluid interface
     */
    public function filterByHourlyBuffer($hourlyBuffer = null, $comparison = null)
    {
        if (is_array($hourlyBuffer)) {
            $useMinMax = false;
            if (isset($hourlyBuffer['min'])) {
                $this->addUsingAlias(myProjectDataTableMap::COL_HOURLYBUFFER, $hourlyBuffer['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($hourlyBuffer['max'])) {
                $this->addUsingAlias(myProjectDataTableMap::COL_HOURLYBUFFER, $hourlyBuffer['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myProjectDataTableMap::COL_HOURLYBUFFER, $hourlyBuffer, $comparison);
    }

    /**
     * Filter the query on the plannedvalue column
     *
     * Example usage:
     * <code>
     * $query->filterByPlannedValue(1234); // WHERE plannedvalue = 1234
     * $query->filterByPlannedValue(array(12, 34)); // WHERE plannedvalue IN (12, 34)
     * $query->filterByPlannedValue(array('min' => 12)); // WHERE plannedvalue > 12
     * </code>
     *
     * @param     mixed $plannedValue The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyProjectDataQuery The current query, for fluid interface
     */
    public function filterByPlannedValue($plannedValue = null, $comparison = null)
    {
        if (is_array($plannedValue)) {
            $useMinMax = false;
            if (isset($plannedValue['min'])) {
                $this->addUsingAlias(myProjectDataTableMap::COL_PLANNEDVALUE, $plannedValue['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($plannedValue['max'])) {
                $this->addUsingAlias(myProjectDataTableMap::COL_PLANNEDVALUE, $plannedValue['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myProjectDataTableMap::COL_PLANNEDVALUE, $plannedValue, $comparison);
    }

    /**
     * Filter the query on the actualcost column
     *
     * Example usage:
     * <code>
     * $query->filterByActualCost(1234); // WHERE actualcost = 1234
     * $query->filterByActualCost(array(12, 34)); // WHERE actualcost IN (12, 34)
     * $query->filterByActualCost(array('min' => 12)); // WHERE actualcost > 12
     * </code>
     *
     * @param     mixed $actualCost The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyProjectDataQuery The current query, for fluid interface
     */
    public function filterByActualCost($actualCost = null, $comparison = null)
    {
        if (is_array($actualCost)) {
            $useMinMax = false;
            if (isset($actualCost['min'])) {
                $this->addUsingAlias(myProjectDataTableMap::COL_ACTUALCOST, $actualCost['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($actualCost['max'])) {
                $this->addUsingAlias(myProjectDataTableMap::COL_ACTUALCOST, $actualCost['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myProjectDataTableMap::COL_ACTUALCOST, $actualCost, $comparison);
    }

    /**
     * Filter the query on the earnedvalueforus column
     *
     * Example usage:
     * <code>
     * $query->filterByEarnedValueForUs(1234); // WHERE earnedvalueforus = 1234
     * $query->filterByEarnedValueForUs(array(12, 34)); // WHERE earnedvalueforus IN (12, 34)
     * $query->filterByEarnedValueForUs(array('min' => 12)); // WHERE earnedvalueforus > 12
     * </code>
     *
     * @param     mixed $earnedValueForUs The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyProjectDataQuery The current query, for fluid interface
     */
    public function filterByEarnedValueForUs($earnedValueForUs = null, $comparison = null)
    {
        if (is_array($earnedValueForUs)) {
            $useMinMax = false;
            if (isset($earnedValueForUs['min'])) {
                $this->addUsingAlias(myProjectDataTableMap::COL_EARNEDVALUEFORUS, $earnedValueForUs['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($earnedValueForUs['max'])) {
                $this->addUsingAlias(myProjectDataTableMap::COL_EARNEDVALUEFORUS, $earnedValueForUs['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myProjectDataTableMap::COL_EARNEDVALUEFORUS, $earnedValueForUs, $comparison);
    }

    /**
     * Filter the query on the earnedvalueforclient column
     *
     * Example usage:
     * <code>
     * $query->filterByEarnedValueForClient(1234); // WHERE earnedvalueforclient = 1234
     * $query->filterByEarnedValueForClient(array(12, 34)); // WHERE earnedvalueforclient IN (12, 34)
     * $query->filterByEarnedValueForClient(array('min' => 12)); // WHERE earnedvalueforclient > 12
     * </code>
     *
     * @param     mixed $earnedValueForClient The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyProjectDataQuery The current query, for fluid interface
     */
    public function filterByEarnedValueForClient($earnedValueForClient = null, $comparison = null)
    {
        if (is_array($earnedValueForClient)) {
            $useMinMax = false;
            if (isset($earnedValueForClient['min'])) {
                $this->addUsingAlias(myProjectDataTableMap::COL_EARNEDVALUEFORCLIENT, $earnedValueForClient['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($earnedValueForClient['max'])) {
                $this->addUsingAlias(myProjectDataTableMap::COL_EARNEDVALUEFORCLIENT, $earnedValueForClient['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myProjectDataTableMap::COL_EARNEDVALUEFORCLIENT, $earnedValueForClient, $comparison);
    }

    /**
     * Filter the query on the earnedvaluevarience column
     *
     * Example usage:
     * <code>
     * $query->filterByEarnedValueVarience(1234); // WHERE earnedvaluevarience = 1234
     * $query->filterByEarnedValueVarience(array(12, 34)); // WHERE earnedvaluevarience IN (12, 34)
     * $query->filterByEarnedValueVarience(array('min' => 12)); // WHERE earnedvaluevarience > 12
     * </code>
     *
     * @param     mixed $earnedValueVarience The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyProjectDataQuery The current query, for fluid interface
     */
    public function filterByEarnedValueVarience($earnedValueVarience = null, $comparison = null)
    {
        if (is_array($earnedValueVarience)) {
            $useMinMax = false;
            if (isset($earnedValueVarience['min'])) {
                $this->addUsingAlias(myProjectDataTableMap::COL_EARNEDVALUEVARIENCE, $earnedValueVarience['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($earnedValueVarience['max'])) {
                $this->addUsingAlias(myProjectDataTableMap::COL_EARNEDVALUEVARIENCE, $earnedValueVarience['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myProjectDataTableMap::COL_EARNEDVALUEVARIENCE, $earnedValueVarience, $comparison);
    }

    /**
     * Filter the query on the schedulevariance column
     *
     * Example usage:
     * <code>
     * $query->filterByScheduleVariance(1234); // WHERE schedulevariance = 1234
     * $query->filterByScheduleVariance(array(12, 34)); // WHERE schedulevariance IN (12, 34)
     * $query->filterByScheduleVariance(array('min' => 12)); // WHERE schedulevariance > 12
     * </code>
     *
     * @param     mixed $scheduleVariance The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyProjectDataQuery The current query, for fluid interface
     */
    public function filterByScheduleVariance($scheduleVariance = null, $comparison = null)
    {
        if (is_array($scheduleVariance)) {
            $useMinMax = false;
            if (isset($scheduleVariance['min'])) {
                $this->addUsingAlias(myProjectDataTableMap::COL_SCHEDULEVARIANCE, $scheduleVariance['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($scheduleVariance['max'])) {
                $this->addUsingAlias(myProjectDataTableMap::COL_SCHEDULEVARIANCE, $scheduleVariance['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myProjectDataTableMap::COL_SCHEDULEVARIANCE, $scheduleVariance, $comparison);
    }

    /**
     * Filter the query on the costvariance column
     *
     * Example usage:
     * <code>
     * $query->filterByCostVariance(1234); // WHERE costvariance = 1234
     * $query->filterByCostVariance(array(12, 34)); // WHERE costvariance IN (12, 34)
     * $query->filterByCostVariance(array('min' => 12)); // WHERE costvariance > 12
     * </code>
     *
     * @param     mixed $costVariance The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyProjectDataQuery The current query, for fluid interface
     */
    public function filterByCostVariance($costVariance = null, $comparison = null)
    {
        if (is_array($costVariance)) {
            $useMinMax = false;
            if (isset($costVariance['min'])) {
                $this->addUsingAlias(myProjectDataTableMap::COL_COSTVARIANCE, $costVariance['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($costVariance['max'])) {
                $this->addUsingAlias(myProjectDataTableMap::COL_COSTVARIANCE, $costVariance['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myProjectDataTableMap::COL_COSTVARIANCE, $costVariance, $comparison);
    }

    /**
     * Filter the query on the scheduleperformanceindex column
     *
     * Example usage:
     * <code>
     * $query->filterBySchedulePerformanceIndex(1234); // WHERE scheduleperformanceindex = 1234
     * $query->filterBySchedulePerformanceIndex(array(12, 34)); // WHERE scheduleperformanceindex IN (12, 34)
     * $query->filterBySchedulePerformanceIndex(array('min' => 12)); // WHERE scheduleperformanceindex > 12
     * </code>
     *
     * @param     mixed $schedulePerformanceIndex The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyProjectDataQuery The current query, for fluid interface
     */
    public function filterBySchedulePerformanceIndex($schedulePerformanceIndex = null, $comparison = null)
    {
        if (is_array($schedulePerformanceIndex)) {
            $useMinMax = false;
            if (isset($schedulePerformanceIndex['min'])) {
                $this->addUsingAlias(myProjectDataTableMap::COL_SCHEDULEPERFORMANCEINDEX, $schedulePerformanceIndex['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($schedulePerformanceIndex['max'])) {
                $this->addUsingAlias(myProjectDataTableMap::COL_SCHEDULEPERFORMANCEINDEX, $schedulePerformanceIndex['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myProjectDataTableMap::COL_SCHEDULEPERFORMANCEINDEX, $schedulePerformanceIndex, $comparison);
    }

    /**
     * Filter the query on the costperformanceindex column
     *
     * Example usage:
     * <code>
     * $query->filterByCostPerformanceIndex(1234); // WHERE costperformanceindex = 1234
     * $query->filterByCostPerformanceIndex(array(12, 34)); // WHERE costperformanceindex IN (12, 34)
     * $query->filterByCostPerformanceIndex(array('min' => 12)); // WHERE costperformanceindex > 12
     * </code>
     *
     * @param     mixed $costPerformanceIndex The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyProjectDataQuery The current query, for fluid interface
     */
    public function filterByCostPerformanceIndex($costPerformanceIndex = null, $comparison = null)
    {
        if (is_array($costPerformanceIndex)) {
            $useMinMax = false;
            if (isset($costPerformanceIndex['min'])) {
                $this->addUsingAlias(myProjectDataTableMap::COL_COSTPERFORMANCEINDEX, $costPerformanceIndex['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($costPerformanceIndex['max'])) {
                $this->addUsingAlias(myProjectDataTableMap::COL_COSTPERFORMANCEINDEX, $costPerformanceIndex['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myProjectDataTableMap::COL_COSTPERFORMANCEINDEX, $costPerformanceIndex, $comparison);
    }

    /**
     * Filter the query on the estimateatcompletionforclient column
     *
     * Example usage:
     * <code>
     * $query->filterByEstimateAtCompletionForClient(1234); // WHERE estimateatcompletionforclient = 1234
     * $query->filterByEstimateAtCompletionForClient(array(12, 34)); // WHERE estimateatcompletionforclient IN (12, 34)
     * $query->filterByEstimateAtCompletionForClient(array('min' => 12)); // WHERE estimateatcompletionforclient > 12
     * </code>
     *
     * @param     mixed $estimateAtCompletionForClient The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyProjectDataQuery The current query, for fluid interface
     */
    public function filterByEstimateAtCompletionForClient($estimateAtCompletionForClient = null, $comparison = null)
    {
        if (is_array($estimateAtCompletionForClient)) {
            $useMinMax = false;
            if (isset($estimateAtCompletionForClient['min'])) {
                $this->addUsingAlias(myProjectDataTableMap::COL_ESTIMATEATCOMPLETIONFORCLIENT, $estimateAtCompletionForClient['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($estimateAtCompletionForClient['max'])) {
                $this->addUsingAlias(myProjectDataTableMap::COL_ESTIMATEATCOMPLETIONFORCLIENT, $estimateAtCompletionForClient['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myProjectDataTableMap::COL_ESTIMATEATCOMPLETIONFORCLIENT, $estimateAtCompletionForClient, $comparison);
    }

    /**
     * Filter the query on the varianceatcompletionforclient column
     *
     * Example usage:
     * <code>
     * $query->filterByVarianceAtCompletionForClient(1234); // WHERE varianceatcompletionforclient = 1234
     * $query->filterByVarianceAtCompletionForClient(array(12, 34)); // WHERE varianceatcompletionforclient IN (12, 34)
     * $query->filterByVarianceAtCompletionForClient(array('min' => 12)); // WHERE varianceatcompletionforclient > 12
     * </code>
     *
     * @param     mixed $varianceAtCompletionForClient The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyProjectDataQuery The current query, for fluid interface
     */
    public function filterByVarianceAtCompletionForClient($varianceAtCompletionForClient = null, $comparison = null)
    {
        if (is_array($varianceAtCompletionForClient)) {
            $useMinMax = false;
            if (isset($varianceAtCompletionForClient['min'])) {
                $this->addUsingAlias(myProjectDataTableMap::COL_VARIANCEATCOMPLETIONFORCLIENT, $varianceAtCompletionForClient['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($varianceAtCompletionForClient['max'])) {
                $this->addUsingAlias(myProjectDataTableMap::COL_VARIANCEATCOMPLETIONFORCLIENT, $varianceAtCompletionForClient['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myProjectDataTableMap::COL_VARIANCEATCOMPLETIONFORCLIENT, $varianceAtCompletionForClient, $comparison);
    }

    /**
     * Filter the query on the costatcompletionforus column
     *
     * Example usage:
     * <code>
     * $query->filterByCostAtCompletionForUs(1234); // WHERE costatcompletionforus = 1234
     * $query->filterByCostAtCompletionForUs(array(12, 34)); // WHERE costatcompletionforus IN (12, 34)
     * $query->filterByCostAtCompletionForUs(array('min' => 12)); // WHERE costatcompletionforus > 12
     * </code>
     *
     * @param     mixed $costAtCompletionForUs The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyProjectDataQuery The current query, for fluid interface
     */
    public function filterByCostAtCompletionForUs($costAtCompletionForUs = null, $comparison = null)
    {
        if (is_array($costAtCompletionForUs)) {
            $useMinMax = false;
            if (isset($costAtCompletionForUs['min'])) {
                $this->addUsingAlias(myProjectDataTableMap::COL_COSTATCOMPLETIONFORUS, $costAtCompletionForUs['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($costAtCompletionForUs['max'])) {
                $this->addUsingAlias(myProjectDataTableMap::COL_COSTATCOMPLETIONFORUS, $costAtCompletionForUs['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myProjectDataTableMap::COL_COSTATCOMPLETIONFORUS, $costAtCompletionForUs, $comparison);
    }

    /**
     * Filter the query on the tocompleteperformanceindex column
     *
     * Example usage:
     * <code>
     * $query->filterByToCompletePerformanceIndex(1234); // WHERE tocompleteperformanceindex = 1234
     * $query->filterByToCompletePerformanceIndex(array(12, 34)); // WHERE tocompleteperformanceindex IN (12, 34)
     * $query->filterByToCompletePerformanceIndex(array('min' => 12)); // WHERE tocompleteperformanceindex > 12
     * </code>
     *
     * @param     mixed $toCompletePerformanceIndex The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyProjectDataQuery The current query, for fluid interface
     */
    public function filterByToCompletePerformanceIndex($toCompletePerformanceIndex = null, $comparison = null)
    {
        if (is_array($toCompletePerformanceIndex)) {
            $useMinMax = false;
            if (isset($toCompletePerformanceIndex['min'])) {
                $this->addUsingAlias(myProjectDataTableMap::COL_TOCOMPLETEPERFORMANCEINDEX, $toCompletePerformanceIndex['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($toCompletePerformanceIndex['max'])) {
                $this->addUsingAlias(myProjectDataTableMap::COL_TOCOMPLETEPERFORMANCEINDEX, $toCompletePerformanceIndex['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myProjectDataTableMap::COL_TOCOMPLETEPERFORMANCEINDEX, $toCompletePerformanceIndex, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildmyProjectData $myProjectData Object to remove from the list of results
     *
     * @return $this|ChildmyProjectDataQuery The current query, for fluid interface
     */
    public function prune($myProjectData = null)
    {
        if ($myProjectData) {
            $this->addUsingAlias(myProjectDataTableMap::COL_ID, $myProjectData->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the myprojectdata table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(myProjectDataTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            myProjectDataTableMap::clearInstancePool();
            myProjectDataTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(myProjectDataTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(myProjectDataTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            myProjectDataTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            myProjectDataTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // myProjectDataQuery
