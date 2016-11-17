<?php

namespace Base;

use \myDataStore as ChildmyDataStore;
use \myDataStoreQuery as ChildmyDataStoreQuery;
use \Exception;
use \PDO;
use Map\myDataStoreTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'mydatastore' table.
 *
 *
 *
 * @method     ChildmyDataStoreQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildmyDataStoreQuery orderByProject($order = Criteria::ASC) Order by the project column
 * @method     ChildmyDataStoreQuery orderByNonBil($order = Criteria::ASC) Order by the nonbil column
 * @method     ChildmyDataStoreQuery orderByAssignee($order = Criteria::ASC) Order by the assignee column
 * @method     ChildmyDataStoreQuery orderByEstimated($order = Criteria::ASC) Order by the estimated column
 * @method     ChildmyDataStoreQuery orderBySpentTime($order = Criteria::ASC) Order by the spenttime column
 * @method     ChildmyDataStoreQuery orderByData($order = Criteria::ASC) Order by the data column
 * @method     ChildmyDataStoreQuery orderByDataMonth($order = Criteria::ASC) Order by the datamonth column
 * @method     ChildmyDataStoreQuery orderByDataYear($order = Criteria::ASC) Order by the datayear column
 *
 * @method     ChildmyDataStoreQuery groupById() Group by the id column
 * @method     ChildmyDataStoreQuery groupByProject() Group by the project column
 * @method     ChildmyDataStoreQuery groupByNonBil() Group by the nonbil column
 * @method     ChildmyDataStoreQuery groupByAssignee() Group by the assignee column
 * @method     ChildmyDataStoreQuery groupByEstimated() Group by the estimated column
 * @method     ChildmyDataStoreQuery groupBySpentTime() Group by the spenttime column
 * @method     ChildmyDataStoreQuery groupByData() Group by the data column
 * @method     ChildmyDataStoreQuery groupByDataMonth() Group by the datamonth column
 * @method     ChildmyDataStoreQuery groupByDataYear() Group by the datayear column
 *
 * @method     ChildmyDataStoreQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildmyDataStoreQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildmyDataStoreQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildmyDataStoreQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildmyDataStoreQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildmyDataStoreQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildmyDataStore findOne(ConnectionInterface $con = null) Return the first ChildmyDataStore matching the query
 * @method     ChildmyDataStore findOneOrCreate(ConnectionInterface $con = null) Return the first ChildmyDataStore matching the query, or a new ChildmyDataStore object populated from the query conditions when no match is found
 *
 * @method     ChildmyDataStore findOneById(int $id) Return the first ChildmyDataStore filtered by the id column
 * @method     ChildmyDataStore findOneByProject(string $project) Return the first ChildmyDataStore filtered by the project column
 * @method     ChildmyDataStore findOneByNonBil(string $nonbil) Return the first ChildmyDataStore filtered by the nonbil column
 * @method     ChildmyDataStore findOneByAssignee(double $assignee) Return the first ChildmyDataStore filtered by the assignee column
 * @method     ChildmyDataStore findOneByEstimated(double $estimated) Return the first ChildmyDataStore filtered by the estimated column
 * @method     ChildmyDataStore findOneBySpentTime(double $spenttime) Return the first ChildmyDataStore filtered by the spenttime column
 * @method     ChildmyDataStore findOneByData(string $data) Return the first ChildmyDataStore filtered by the data column
 * @method     ChildmyDataStore findOneByDataMonth(string $datamonth) Return the first ChildmyDataStore filtered by the datamonth column
 * @method     ChildmyDataStore findOneByDataYear(string $datayear) Return the first ChildmyDataStore filtered by the datayear column *

 * @method     ChildmyDataStore requirePk($key, ConnectionInterface $con = null) Return the ChildmyDataStore by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyDataStore requireOne(ConnectionInterface $con = null) Return the first ChildmyDataStore matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildmyDataStore requireOneById(int $id) Return the first ChildmyDataStore filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyDataStore requireOneByProject(string $project) Return the first ChildmyDataStore filtered by the project column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyDataStore requireOneByNonBil(string $nonbil) Return the first ChildmyDataStore filtered by the nonbil column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyDataStore requireOneByAssignee(double $assignee) Return the first ChildmyDataStore filtered by the assignee column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyDataStore requireOneByEstimated(double $estimated) Return the first ChildmyDataStore filtered by the estimated column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyDataStore requireOneBySpentTime(double $spenttime) Return the first ChildmyDataStore filtered by the spenttime column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyDataStore requireOneByData(string $data) Return the first ChildmyDataStore filtered by the data column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyDataStore requireOneByDataMonth(string $datamonth) Return the first ChildmyDataStore filtered by the datamonth column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyDataStore requireOneByDataYear(string $datayear) Return the first ChildmyDataStore filtered by the datayear column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildmyDataStore[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildmyDataStore objects based on current ModelCriteria
 * @method     ChildmyDataStore[]|ObjectCollection findById(int $id) Return ChildmyDataStore objects filtered by the id column
 * @method     ChildmyDataStore[]|ObjectCollection findByProject(string $project) Return ChildmyDataStore objects filtered by the project column
 * @method     ChildmyDataStore[]|ObjectCollection findByNonBil(string $nonbil) Return ChildmyDataStore objects filtered by the nonbil column
 * @method     ChildmyDataStore[]|ObjectCollection findByAssignee(double $assignee) Return ChildmyDataStore objects filtered by the assignee column
 * @method     ChildmyDataStore[]|ObjectCollection findByEstimated(double $estimated) Return ChildmyDataStore objects filtered by the estimated column
 * @method     ChildmyDataStore[]|ObjectCollection findBySpentTime(double $spenttime) Return ChildmyDataStore objects filtered by the spenttime column
 * @method     ChildmyDataStore[]|ObjectCollection findByData(string $data) Return ChildmyDataStore objects filtered by the data column
 * @method     ChildmyDataStore[]|ObjectCollection findByDataMonth(string $datamonth) Return ChildmyDataStore objects filtered by the datamonth column
 * @method     ChildmyDataStore[]|ObjectCollection findByDataYear(string $datayear) Return ChildmyDataStore objects filtered by the datayear column
 * @method     ChildmyDataStore[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class myDataStoreQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\myDataStoreQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'kpidata', $modelName = '\\myDataStore', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildmyDataStoreQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildmyDataStoreQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildmyDataStoreQuery) {
            return $criteria;
        }
        $query = new ChildmyDataStoreQuery();
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
     * @return ChildmyDataStore|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(myDataStoreTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = myDataStoreTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildmyDataStore A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, project, nonbil, assignee, estimated, spenttime, data, datamonth, datayear FROM mydatastore WHERE id = :p0';
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
            /** @var ChildmyDataStore $obj */
            $obj = new ChildmyDataStore();
            $obj->hydrate($row);
            myDataStoreTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildmyDataStore|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildmyDataStoreQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(myDataStoreTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildmyDataStoreQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(myDataStoreTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildmyDataStoreQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(myDataStoreTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(myDataStoreTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myDataStoreTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the project column
     *
     * Example usage:
     * <code>
     * $query->filterByProject('fooValue');   // WHERE project = 'fooValue'
     * $query->filterByProject('%fooValue%', Criteria::LIKE); // WHERE project LIKE '%fooValue%'
     * </code>
     *
     * @param     string $project The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyDataStoreQuery The current query, for fluid interface
     */
    public function filterByProject($project = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($project)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myDataStoreTableMap::COL_PROJECT, $project, $comparison);
    }

    /**
     * Filter the query on the nonbil column
     *
     * Example usage:
     * <code>
     * $query->filterByNonBil('fooValue');   // WHERE nonbil = 'fooValue'
     * $query->filterByNonBil('%fooValue%', Criteria::LIKE); // WHERE nonbil LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nonBil The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyDataStoreQuery The current query, for fluid interface
     */
    public function filterByNonBil($nonBil = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nonBil)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myDataStoreTableMap::COL_NONBIL, $nonBil, $comparison);
    }

    /**
     * Filter the query on the assignee column
     *
     * Example usage:
     * <code>
     * $query->filterByAssignee(1234); // WHERE assignee = 1234
     * $query->filterByAssignee(array(12, 34)); // WHERE assignee IN (12, 34)
     * $query->filterByAssignee(array('min' => 12)); // WHERE assignee > 12
     * </code>
     *
     * @param     mixed $assignee The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyDataStoreQuery The current query, for fluid interface
     */
    public function filterByAssignee($assignee = null, $comparison = null)
    {
        if (is_array($assignee)) {
            $useMinMax = false;
            if (isset($assignee['min'])) {
                $this->addUsingAlias(myDataStoreTableMap::COL_ASSIGNEE, $assignee['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($assignee['max'])) {
                $this->addUsingAlias(myDataStoreTableMap::COL_ASSIGNEE, $assignee['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myDataStoreTableMap::COL_ASSIGNEE, $assignee, $comparison);
    }

    /**
     * Filter the query on the estimated column
     *
     * Example usage:
     * <code>
     * $query->filterByEstimated(1234); // WHERE estimated = 1234
     * $query->filterByEstimated(array(12, 34)); // WHERE estimated IN (12, 34)
     * $query->filterByEstimated(array('min' => 12)); // WHERE estimated > 12
     * </code>
     *
     * @param     mixed $estimated The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyDataStoreQuery The current query, for fluid interface
     */
    public function filterByEstimated($estimated = null, $comparison = null)
    {
        if (is_array($estimated)) {
            $useMinMax = false;
            if (isset($estimated['min'])) {
                $this->addUsingAlias(myDataStoreTableMap::COL_ESTIMATED, $estimated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($estimated['max'])) {
                $this->addUsingAlias(myDataStoreTableMap::COL_ESTIMATED, $estimated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myDataStoreTableMap::COL_ESTIMATED, $estimated, $comparison);
    }

    /**
     * Filter the query on the spenttime column
     *
     * Example usage:
     * <code>
     * $query->filterBySpentTime(1234); // WHERE spenttime = 1234
     * $query->filterBySpentTime(array(12, 34)); // WHERE spenttime IN (12, 34)
     * $query->filterBySpentTime(array('min' => 12)); // WHERE spenttime > 12
     * </code>
     *
     * @param     mixed $spentTime The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyDataStoreQuery The current query, for fluid interface
     */
    public function filterBySpentTime($spentTime = null, $comparison = null)
    {
        if (is_array($spentTime)) {
            $useMinMax = false;
            if (isset($spentTime['min'])) {
                $this->addUsingAlias(myDataStoreTableMap::COL_SPENTTIME, $spentTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($spentTime['max'])) {
                $this->addUsingAlias(myDataStoreTableMap::COL_SPENTTIME, $spentTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myDataStoreTableMap::COL_SPENTTIME, $spentTime, $comparison);
    }

    /**
     * Filter the query on the data column
     *
     * Example usage:
     * <code>
     * $query->filterByData('2011-03-14'); // WHERE data = '2011-03-14'
     * $query->filterByData('now'); // WHERE data = '2011-03-14'
     * $query->filterByData(array('max' => 'yesterday')); // WHERE data > '2011-03-13'
     * </code>
     *
     * @param     mixed $data The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyDataStoreQuery The current query, for fluid interface
     */
    public function filterByData($data = null, $comparison = null)
    {
        if (is_array($data)) {
            $useMinMax = false;
            if (isset($data['min'])) {
                $this->addUsingAlias(myDataStoreTableMap::COL_DATA, $data['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($data['max'])) {
                $this->addUsingAlias(myDataStoreTableMap::COL_DATA, $data['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myDataStoreTableMap::COL_DATA, $data, $comparison);
    }

    /**
     * Filter the query on the datamonth column
     *
     * Example usage:
     * <code>
     * $query->filterByDataMonth('2011-03-14'); // WHERE datamonth = '2011-03-14'
     * $query->filterByDataMonth('now'); // WHERE datamonth = '2011-03-14'
     * $query->filterByDataMonth(array('max' => 'yesterday')); // WHERE datamonth > '2011-03-13'
     * </code>
     *
     * @param     mixed $dataMonth The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyDataStoreQuery The current query, for fluid interface
     */
    public function filterByDataMonth($dataMonth = null, $comparison = null)
    {
        if (is_array($dataMonth)) {
            $useMinMax = false;
            if (isset($dataMonth['min'])) {
                $this->addUsingAlias(myDataStoreTableMap::COL_DATAMONTH, $dataMonth['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dataMonth['max'])) {
                $this->addUsingAlias(myDataStoreTableMap::COL_DATAMONTH, $dataMonth['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myDataStoreTableMap::COL_DATAMONTH, $dataMonth, $comparison);
    }

    /**
     * Filter the query on the datayear column
     *
     * Example usage:
     * <code>
     * $query->filterByDataYear('2011-03-14'); // WHERE datayear = '2011-03-14'
     * $query->filterByDataYear('now'); // WHERE datayear = '2011-03-14'
     * $query->filterByDataYear(array('max' => 'yesterday')); // WHERE datayear > '2011-03-13'
     * </code>
     *
     * @param     mixed $dataYear The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyDataStoreQuery The current query, for fluid interface
     */
    public function filterByDataYear($dataYear = null, $comparison = null)
    {
        if (is_array($dataYear)) {
            $useMinMax = false;
            if (isset($dataYear['min'])) {
                $this->addUsingAlias(myDataStoreTableMap::COL_DATAYEAR, $dataYear['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dataYear['max'])) {
                $this->addUsingAlias(myDataStoreTableMap::COL_DATAYEAR, $dataYear['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myDataStoreTableMap::COL_DATAYEAR, $dataYear, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildmyDataStore $myDataStore Object to remove from the list of results
     *
     * @return $this|ChildmyDataStoreQuery The current query, for fluid interface
     */
    public function prune($myDataStore = null)
    {
        if ($myDataStore) {
            $this->addUsingAlias(myDataStoreTableMap::COL_ID, $myDataStore->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the mydatastore table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(myDataStoreTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            myDataStoreTableMap::clearInstancePool();
            myDataStoreTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(myDataStoreTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(myDataStoreTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            myDataStoreTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            myDataStoreTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // myDataStoreQuery
