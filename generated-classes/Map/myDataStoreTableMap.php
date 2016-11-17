<?php

namespace Map;

use \myDataStore;
use \myDataStoreQuery;
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
 * This class defines the structure of the 'mydatastore' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class myDataStoreTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.myDataStoreTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'kpidata';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'mydatastore';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\myDataStore';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'myDataStore';

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
    const COL_ID = 'mydatastore.id';

    /**
     * the column name for the project field
     */
    const COL_PROJECT = 'mydatastore.project';

    /**
     * the column name for the nonbil field
     */
    const COL_NONBIL = 'mydatastore.nonbil';

    /**
     * the column name for the assignee field
     */
    const COL_ASSIGNEE = 'mydatastore.assignee';

    /**
     * the column name for the estimated field
     */
    const COL_ESTIMATED = 'mydatastore.estimated';

    /**
     * the column name for the spenttime field
     */
    const COL_SPENTTIME = 'mydatastore.spenttime';

    /**
     * the column name for the data field
     */
    const COL_DATA = 'mydatastore.data';

    /**
     * the column name for the datamonth field
     */
    const COL_DATAMONTH = 'mydatastore.datamonth';

    /**
     * the column name for the datayear field
     */
    const COL_DATAYEAR = 'mydatastore.datayear';

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
        self::TYPE_PHPNAME       => array('Id', 'Project', 'NonBil', 'Assignee', 'Estimated', 'SpentTime', 'Data', 'DataMonth', 'DataYear', ),
        self::TYPE_CAMELNAME     => array('id', 'project', 'nonBil', 'assignee', 'estimated', 'spentTime', 'data', 'dataMonth', 'dataYear', ),
        self::TYPE_COLNAME       => array(myDataStoreTableMap::COL_ID, myDataStoreTableMap::COL_PROJECT, myDataStoreTableMap::COL_NONBIL, myDataStoreTableMap::COL_ASSIGNEE, myDataStoreTableMap::COL_ESTIMATED, myDataStoreTableMap::COL_SPENTTIME, myDataStoreTableMap::COL_DATA, myDataStoreTableMap::COL_DATAMONTH, myDataStoreTableMap::COL_DATAYEAR, ),
        self::TYPE_FIELDNAME     => array('id', 'project', 'nonbil', 'assignee', 'estimated', 'spenttime', 'data', 'datamonth', 'datayear', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Project' => 1, 'NonBil' => 2, 'Assignee' => 3, 'Estimated' => 4, 'SpentTime' => 5, 'Data' => 6, 'DataMonth' => 7, 'DataYear' => 8, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'project' => 1, 'nonBil' => 2, 'assignee' => 3, 'estimated' => 4, 'spentTime' => 5, 'data' => 6, 'dataMonth' => 7, 'dataYear' => 8, ),
        self::TYPE_COLNAME       => array(myDataStoreTableMap::COL_ID => 0, myDataStoreTableMap::COL_PROJECT => 1, myDataStoreTableMap::COL_NONBIL => 2, myDataStoreTableMap::COL_ASSIGNEE => 3, myDataStoreTableMap::COL_ESTIMATED => 4, myDataStoreTableMap::COL_SPENTTIME => 5, myDataStoreTableMap::COL_DATA => 6, myDataStoreTableMap::COL_DATAMONTH => 7, myDataStoreTableMap::COL_DATAYEAR => 8, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'project' => 1, 'nonbil' => 2, 'assignee' => 3, 'estimated' => 4, 'spenttime' => 5, 'data' => 6, 'datamonth' => 7, 'datayear' => 8, ),
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
        $this->setName('mydatastore');
        $this->setPhpName('myDataStore');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\myDataStore');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('project', 'Project', 'VARCHAR', false, 255, null);
        $this->addColumn('nonbil', 'NonBil', 'VARCHAR', false, 24, null);
        $this->addColumn('assignee', 'Assignee', 'DOUBLE', false, null, null);
        $this->addColumn('estimated', 'Estimated', 'DOUBLE', false, null, null);
        $this->addColumn('spenttime', 'SpentTime', 'DOUBLE', false, null, null);
        $this->addColumn('data', 'Data', 'TIMESTAMP', false, null, null);
        $this->addColumn('datamonth', 'DataMonth', 'DATE', false, null, null);
        $this->addColumn('datayear', 'DataYear', 'DATE', false, null, null);
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
        return $withPrefix ? myDataStoreTableMap::CLASS_DEFAULT : myDataStoreTableMap::OM_CLASS;
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
     * @return array           (myDataStore object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = myDataStoreTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = myDataStoreTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + myDataStoreTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = myDataStoreTableMap::OM_CLASS;
            /** @var myDataStore $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            myDataStoreTableMap::addInstanceToPool($obj, $key);
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
            $key = myDataStoreTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = myDataStoreTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var myDataStore $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                myDataStoreTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(myDataStoreTableMap::COL_ID);
            $criteria->addSelectColumn(myDataStoreTableMap::COL_PROJECT);
            $criteria->addSelectColumn(myDataStoreTableMap::COL_NONBIL);
            $criteria->addSelectColumn(myDataStoreTableMap::COL_ASSIGNEE);
            $criteria->addSelectColumn(myDataStoreTableMap::COL_ESTIMATED);
            $criteria->addSelectColumn(myDataStoreTableMap::COL_SPENTTIME);
            $criteria->addSelectColumn(myDataStoreTableMap::COL_DATA);
            $criteria->addSelectColumn(myDataStoreTableMap::COL_DATAMONTH);
            $criteria->addSelectColumn(myDataStoreTableMap::COL_DATAYEAR);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.project');
            $criteria->addSelectColumn($alias . '.nonbil');
            $criteria->addSelectColumn($alias . '.assignee');
            $criteria->addSelectColumn($alias . '.estimated');
            $criteria->addSelectColumn($alias . '.spenttime');
            $criteria->addSelectColumn($alias . '.data');
            $criteria->addSelectColumn($alias . '.datamonth');
            $criteria->addSelectColumn($alias . '.datayear');
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
        return Propel::getServiceContainer()->getDatabaseMap(myDataStoreTableMap::DATABASE_NAME)->getTable(myDataStoreTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(myDataStoreTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(myDataStoreTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new myDataStoreTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a myDataStore or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or myDataStore object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(myDataStoreTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \myDataStore) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(myDataStoreTableMap::DATABASE_NAME);
            $criteria->add(myDataStoreTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = myDataStoreQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            myDataStoreTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                myDataStoreTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the mydatastore table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return myDataStoreQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a myDataStore or Criteria object.
     *
     * @param mixed               $criteria Criteria or myDataStore object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(myDataStoreTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from myDataStore object
        }

        if ($criteria->containsKey(myDataStoreTableMap::COL_ID) && $criteria->keyContainsValue(myDataStoreTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.myDataStoreTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = myDataStoreQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // myDataStoreTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
myDataStoreTableMap::buildTableMap();
