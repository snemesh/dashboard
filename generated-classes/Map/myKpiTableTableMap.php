<?php

namespace Map;

use \myKpiTable;
use \myKpiTableQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'mykpitable' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class myKpiTableTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.myKpiTableTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'kpidata';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'mykpitable';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\myKpiTable';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'myKpiTable';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 9;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 9;

    /**
     * the column name for the id field
     */
    const COL_ID = 'mykpitable.id';

    /**
     * the column name for the totalestimated field
     */
    const COL_TOTALESTIMATED = 'mykpitable.totalestimated';

    /**
     * the column name for the nonbillblestimated field
     */
    const COL_NONBILLBLESTIMATED = 'mykpitable.nonbillblestimated';

    /**
     * the column name for the billblestimated field
     */
    const COL_BILLBLESTIMATED = 'mykpitable.billblestimated';

    /**
     * the column name for the totalspenttime field
     */
    const COL_TOTALSPENTTIME = 'mykpitable.totalspenttime';

    /**
     * the column name for the nonbillblspenttime field
     */
    const COL_NONBILLBLSPENTTIME = 'mykpitable.nonbillblspenttime';

    /**
     * the column name for the billblspentTime field
     */
    const COL_BILLBLSPENTTIME = 'mykpitable.billblspentTime';

    /**
     * the column name for the totalprojects field
     */
    const COL_TOTALPROJECTS = 'mykpitable.totalprojects';

    /**
     * the column name for the totalpm field
     */
    const COL_TOTALPM = 'mykpitable.totalpm';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'totalEstimated', 'nonBillblEstimated', 'billblEstimated', 'totalSpentTime', 'nonBillblSpentTime', 'billblspentTime', 'totalProjects', 'totalPM', ),
        self::TYPE_CAMELNAME     => array('id', 'totalEstimated', 'nonBillblEstimated', 'billblEstimated', 'totalSpentTime', 'nonBillblSpentTime', 'billblspentTime', 'totalProjects', 'totalPM', ),
        self::TYPE_COLNAME       => array(myKpiTableTableMap::COL_ID, myKpiTableTableMap::COL_TOTALESTIMATED, myKpiTableTableMap::COL_NONBILLBLESTIMATED, myKpiTableTableMap::COL_BILLBLESTIMATED, myKpiTableTableMap::COL_TOTALSPENTTIME, myKpiTableTableMap::COL_NONBILLBLSPENTTIME, myKpiTableTableMap::COL_BILLBLSPENTTIME, myKpiTableTableMap::COL_TOTALPROJECTS, myKpiTableTableMap::COL_TOTALPM, ),
        self::TYPE_FIELDNAME     => array('id', 'totalestimated', 'nonbillblestimated', 'billblestimated', 'totalspenttime', 'nonbillblspenttime', 'billblspentTime', 'totalprojects', 'totalpm', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'totalEstimated' => 1, 'nonBillblEstimated' => 2, 'billblEstimated' => 3, 'totalSpentTime' => 4, 'nonBillblSpentTime' => 5, 'billblspentTime' => 6, 'totalProjects' => 7, 'totalPM' => 8, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'totalEstimated' => 1, 'nonBillblEstimated' => 2, 'billblEstimated' => 3, 'totalSpentTime' => 4, 'nonBillblSpentTime' => 5, 'billblspentTime' => 6, 'totalProjects' => 7, 'totalPM' => 8, ),
        self::TYPE_COLNAME       => array(myKpiTableTableMap::COL_ID => 0, myKpiTableTableMap::COL_TOTALESTIMATED => 1, myKpiTableTableMap::COL_NONBILLBLESTIMATED => 2, myKpiTableTableMap::COL_BILLBLESTIMATED => 3, myKpiTableTableMap::COL_TOTALSPENTTIME => 4, myKpiTableTableMap::COL_NONBILLBLSPENTTIME => 5, myKpiTableTableMap::COL_BILLBLSPENTTIME => 6, myKpiTableTableMap::COL_TOTALPROJECTS => 7, myKpiTableTableMap::COL_TOTALPM => 8, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'totalestimated' => 1, 'nonbillblestimated' => 2, 'billblestimated' => 3, 'totalspenttime' => 4, 'nonbillblspenttime' => 5, 'billblspentTime' => 6, 'totalprojects' => 7, 'totalpm' => 8, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('mykpitable');
        $this->setPhpName('myKpiTable');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\myKpiTable');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('totalestimated', 'totalEstimated', 'DOUBLE', false, null, null);
        $this->addColumn('nonbillblestimated', 'nonBillblEstimated', 'DOUBLE', false, null, null);
        $this->addColumn('billblestimated', 'billblEstimated', 'DOUBLE', false, null, null);
        $this->addColumn('totalspenttime', 'totalSpentTime', 'DOUBLE', false, null, null);
        $this->addColumn('nonbillblspenttime', 'nonBillblSpentTime', 'DOUBLE', false, null, null);
        $this->addColumn('billblspentTime', 'billblspentTime', 'DOUBLE', false, null, null);
        $this->addColumn('totalprojects', 'totalProjects', 'DOUBLE', false, null, null);
        $this->addColumn('totalpm', 'totalPM', 'DOUBLE', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? myKpiTableTableMap::CLASS_DEFAULT : myKpiTableTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (myKpiTable object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = myKpiTableTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = myKpiTableTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + myKpiTableTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = myKpiTableTableMap::OM_CLASS;
            /** @var myKpiTable $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            myKpiTableTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = myKpiTableTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = myKpiTableTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var myKpiTable $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                myKpiTableTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(myKpiTableTableMap::COL_ID);
            $criteria->addSelectColumn(myKpiTableTableMap::COL_TOTALESTIMATED);
            $criteria->addSelectColumn(myKpiTableTableMap::COL_NONBILLBLESTIMATED);
            $criteria->addSelectColumn(myKpiTableTableMap::COL_BILLBLESTIMATED);
            $criteria->addSelectColumn(myKpiTableTableMap::COL_TOTALSPENTTIME);
            $criteria->addSelectColumn(myKpiTableTableMap::COL_NONBILLBLSPENTTIME);
            $criteria->addSelectColumn(myKpiTableTableMap::COL_BILLBLSPENTTIME);
            $criteria->addSelectColumn(myKpiTableTableMap::COL_TOTALPROJECTS);
            $criteria->addSelectColumn(myKpiTableTableMap::COL_TOTALPM);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.totalestimated');
            $criteria->addSelectColumn($alias . '.nonbillblestimated');
            $criteria->addSelectColumn($alias . '.billblestimated');
            $criteria->addSelectColumn($alias . '.totalspenttime');
            $criteria->addSelectColumn($alias . '.nonbillblspenttime');
            $criteria->addSelectColumn($alias . '.billblspentTime');
            $criteria->addSelectColumn($alias . '.totalprojects');
            $criteria->addSelectColumn($alias . '.totalpm');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(myKpiTableTableMap::DATABASE_NAME)->getTable(myKpiTableTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(myKpiTableTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(myKpiTableTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new myKpiTableTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a myKpiTable or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or myKpiTable object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(myKpiTableTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \myKpiTable) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(myKpiTableTableMap::DATABASE_NAME);
            $criteria->add(myKpiTableTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = myKpiTableQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            myKpiTableTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                myKpiTableTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the mykpitable table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return myKpiTableQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a myKpiTable or Criteria object.
     *
     * @param mixed               $criteria Criteria or myKpiTable object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(myKpiTableTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from myKpiTable object
        }

        if ($criteria->containsKey(myKpiTableTableMap::COL_ID) && $criteria->keyContainsValue(myKpiTableTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.myKpiTableTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = myKpiTableQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // myKpiTableTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
myKpiTableTableMap::buildTableMap();
