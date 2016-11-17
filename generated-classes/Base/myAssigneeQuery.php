<?php

namespace Base;

use \myAssignee as ChildmyAssignee;
use \myAssigneeQuery as ChildmyAssigneeQuery;
use \Exception;
use \PDO;
use Map\myAssigneeTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'myassignee' table.
 *
 *
 *
 * @method     ChildmyAssigneeQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildmyAssigneeQuery orderByassigneeName($order = Criteria::ASC) Order by the assigneename column
 * @method     ChildmyAssigneeQuery orderBySalary($order = Criteria::ASC) Order by the salary column
 * @method     ChildmyAssigneeQuery orderByhourlyRate($order = Criteria::ASC) Order by the hourlyrate column
 * @method     ChildmyAssigneeQuery orderByGroup($order = Criteria::ASC) Order by the group column
 * @method     ChildmyAssigneeQuery orderBySpented($order = Criteria::ASC) Order by the spented column
 *
 * @method     ChildmyAssigneeQuery groupById() Group by the id column
 * @method     ChildmyAssigneeQuery groupByassigneeName() Group by the assigneename column
 * @method     ChildmyAssigneeQuery groupBySalary() Group by the salary column
 * @method     ChildmyAssigneeQuery groupByhourlyRate() Group by the hourlyrate column
 * @method     ChildmyAssigneeQuery groupByGroup() Group by the group column
 * @method     ChildmyAssigneeQuery groupBySpented() Group by the spented column
 *
 * @method     ChildmyAssigneeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildmyAssigneeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildmyAssigneeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildmyAssigneeQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildmyAssigneeQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildmyAssigneeQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildmyAssignee findOne(ConnectionInterface $con = null) Return the first ChildmyAssignee matching the query
 * @method     ChildmyAssignee findOneOrCreate(ConnectionInterface $con = null) Return the first ChildmyAssignee matching the query, or a new ChildmyAssignee object populated from the query conditions when no match is found
 *
 * @method     ChildmyAssignee findOneById(int $id) Return the first ChildmyAssignee filtered by the id column
 * @method     ChildmyAssignee findOneByassigneeName(string $assigneename) Return the first ChildmyAssignee filtered by the assigneename column
 * @method     ChildmyAssignee findOneBySalary(double $salary) Return the first ChildmyAssignee filtered by the salary column
 * @method     ChildmyAssignee findOneByhourlyRate(double $hourlyrate) Return the first ChildmyAssignee filtered by the hourlyrate column
 * @method     ChildmyAssignee findOneByGroup(string $group) Return the first ChildmyAssignee filtered by the group column
 * @method     ChildmyAssignee findOneBySpented(double $spented) Return the first ChildmyAssignee filtered by the spented column *

 * @method     ChildmyAssignee requirePk($key, ConnectionInterface $con = null) Return the ChildmyAssignee by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyAssignee requireOne(ConnectionInterface $con = null) Return the first ChildmyAssignee matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildmyAssignee requireOneById(int $id) Return the first ChildmyAssignee filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyAssignee requireOneByassigneeName(string $assigneename) Return the first ChildmyAssignee filtered by the assigneename column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyAssignee requireOneBySalary(double $salary) Return the first ChildmyAssignee filtered by the salary column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyAssignee requireOneByhourlyRate(double $hourlyrate) Return the first ChildmyAssignee filtered by the hourlyrate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyAssignee requireOneByGroup(string $group) Return the first ChildmyAssignee filtered by the group column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyAssignee requireOneBySpented(double $spented) Return the first ChildmyAssignee filtered by the spented column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildmyAssignee[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildmyAssignee objects based on current ModelCriteria
 * @method     ChildmyAssignee[]|ObjectCollection findById(int $id) Return ChildmyAssignee objects filtered by the id column
 * @method     ChildmyAssignee[]|ObjectCollection findByassigneeName(string $assigneename) Return ChildmyAssignee objects filtered by the assigneename column
 * @method     ChildmyAssignee[]|ObjectCollection findBySalary(double $salary) Return ChildmyAssignee objects filtered by the salary column
 * @method     ChildmyAssignee[]|ObjectCollection findByhourlyRate(double $hourlyrate) Return ChildmyAssignee objects filtered by the hourlyrate column
 * @method     ChildmyAssignee[]|ObjectCollection findByGroup(string $group) Return ChildmyAssignee objects filtered by the group column
 * @method     ChildmyAssignee[]|ObjectCollection findBySpented(double $spented) Return ChildmyAssignee objects filtered by the spented column
 * @method     ChildmyAssignee[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class myAssigneeQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\myAssigneeQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'kpidata', $modelName = '\\myAssignee', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildmyAssigneeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildmyAssigneeQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildmyAssigneeQuery) {
            return $criteria;
        }
        $query = new ChildmyAssigneeQuery();
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
     * @return ChildmyAssignee|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(myAssigneeTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = myAssigneeTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildmyAssignee A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, assigneename, salary, hourlyrate, group, spented FROM myassignee WHERE id = :p0';
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
            /** @var ChildmyAssignee $obj */
            $obj = new ChildmyAssignee();
            $obj->hydrate($row);
            myAssigneeTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildmyAssignee|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildmyAssigneeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(myAssigneeTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildmyAssigneeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(myAssigneeTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildmyAssigneeQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(myAssigneeTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(myAssigneeTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myAssigneeTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the assigneename column
     *
     * Example usage:
     * <code>
     * $query->filterByassigneeName('fooValue');   // WHERE assigneename = 'fooValue'
     * $query->filterByassigneeName('%fooValue%', Criteria::LIKE); // WHERE assigneename LIKE '%fooValue%'
     * </code>
     *
     * @param     string $assigneeName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyAssigneeQuery The current query, for fluid interface
     */
    public function filterByassigneeName($assigneeName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($assigneeName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myAssigneeTableMap::COL_ASSIGNEENAME, $assigneeName, $comparison);
    }

    /**
     * Filter the query on the salary column
     *
     * Example usage:
     * <code>
     * $query->filterBySalary(1234); // WHERE salary = 1234
     * $query->filterBySalary(array(12, 34)); // WHERE salary IN (12, 34)
     * $query->filterBySalary(array('min' => 12)); // WHERE salary > 12
     * </code>
     *
     * @param     mixed $salary The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyAssigneeQuery The current query, for fluid interface
     */
    public function filterBySalary($salary = null, $comparison = null)
    {
        if (is_array($salary)) {
            $useMinMax = false;
            if (isset($salary['min'])) {
                $this->addUsingAlias(myAssigneeTableMap::COL_SALARY, $salary['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($salary['max'])) {
                $this->addUsingAlias(myAssigneeTableMap::COL_SALARY, $salary['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myAssigneeTableMap::COL_SALARY, $salary, $comparison);
    }

    /**
     * Filter the query on the hourlyrate column
     *
     * Example usage:
     * <code>
     * $query->filterByhourlyRate(1234); // WHERE hourlyrate = 1234
     * $query->filterByhourlyRate(array(12, 34)); // WHERE hourlyrate IN (12, 34)
     * $query->filterByhourlyRate(array('min' => 12)); // WHERE hourlyrate > 12
     * </code>
     *
     * @param     mixed $hourlyRate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyAssigneeQuery The current query, for fluid interface
     */
    public function filterByhourlyRate($hourlyRate = null, $comparison = null)
    {
        if (is_array($hourlyRate)) {
            $useMinMax = false;
            if (isset($hourlyRate['min'])) {
                $this->addUsingAlias(myAssigneeTableMap::COL_HOURLYRATE, $hourlyRate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($hourlyRate['max'])) {
                $this->addUsingAlias(myAssigneeTableMap::COL_HOURLYRATE, $hourlyRate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myAssigneeTableMap::COL_HOURLYRATE, $hourlyRate, $comparison);
    }

    /**
     * Filter the query on the group column
     *
     * Example usage:
     * <code>
     * $query->filterByGroup('fooValue');   // WHERE group = 'fooValue'
     * $query->filterByGroup('%fooValue%', Criteria::LIKE); // WHERE group LIKE '%fooValue%'
     * </code>
     *
     * @param     string $group The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyAssigneeQuery The current query, for fluid interface
     */
    public function filterByGroup($group = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($group)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myAssigneeTableMap::COL_GROUP, $group, $comparison);
    }

    /**
     * Filter the query on the spented column
     *
     * Example usage:
     * <code>
     * $query->filterBySpented(1234); // WHERE spented = 1234
     * $query->filterBySpented(array(12, 34)); // WHERE spented IN (12, 34)
     * $query->filterBySpented(array('min' => 12)); // WHERE spented > 12
     * </code>
     *
     * @param     mixed $spented The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyAssigneeQuery The current query, for fluid interface
     */
    public function filterBySpented($spented = null, $comparison = null)
    {
        if (is_array($spented)) {
            $useMinMax = false;
            if (isset($spented['min'])) {
                $this->addUsingAlias(myAssigneeTableMap::COL_SPENTED, $spented['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($spented['max'])) {
                $this->addUsingAlias(myAssigneeTableMap::COL_SPENTED, $spented['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myAssigneeTableMap::COL_SPENTED, $spented, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildmyAssignee $myAssignee Object to remove from the list of results
     *
     * @return $this|ChildmyAssigneeQuery The current query, for fluid interface
     */
    public function prune($myAssignee = null)
    {
        if ($myAssignee) {
            $this->addUsingAlias(myAssigneeTableMap::COL_ID, $myAssignee->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the myassignee table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(myAssigneeTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            myAssigneeTableMap::clearInstancePool();
            myAssigneeTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(myAssigneeTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(myAssigneeTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            myAssigneeTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            myAssigneeTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // myAssigneeQuery
