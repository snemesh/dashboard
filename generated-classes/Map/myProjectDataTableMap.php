<?php

namespace Map;

use \myProjectData;
use \myProjectDataQuery;
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
 * This class defines the structure of the 'myprojectdata' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class myProjectDataTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.myProjectDataTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'kpidata';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'myprojectdata';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\myProjectData';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'myProjectData';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 17;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 17;

    /**
     * the column name for the id field
     */
    const COL_ID = 'myprojectdata.id';

    /**
     * the column name for the budget field
     */
    const COL_BUDGET = 'myprojectdata.budget';

    /**
     * the column name for the hourlyrate field
     */
    const COL_HOURLYRATE = 'myprojectdata.hourlyrate';

    /**
     * the column name for the hourlybuffer field
     */
    const COL_HOURLYBUFFER = 'myprojectdata.hourlybuffer';

    /**
     * the column name for the plannedvalue field
     */
    const COL_PLANNEDVALUE = 'myprojectdata.plannedvalue';

    /**
     * the column name for the actualcost field
     */
    const COL_ACTUALCOST = 'myprojectdata.actualcost';

    /**
     * the column name for the earnedvalueforus field
     */
    const COL_EARNEDVALUEFORUS = 'myprojectdata.earnedvalueforus';

    /**
     * the column name for the earnedvalueforclient field
     */
    const COL_EARNEDVALUEFORCLIENT = 'myprojectdata.earnedvalueforclient';

    /**
     * the column name for the earnedvaluevarience field
     */
    const COL_EARNEDVALUEVARIENCE = 'myprojectdata.earnedvaluevarience';

    /**
     * the column name for the schedulevariance field
     */
    const COL_SCHEDULEVARIANCE = 'myprojectdata.schedulevariance';

    /**
     * the column name for the costvariance field
     */
    const COL_COSTVARIANCE = 'myprojectdata.costvariance';

    /**
     * the column name for the scheduleperformanceindex field
     */
    const COL_SCHEDULEPERFORMANCEINDEX = 'myprojectdata.scheduleperformanceindex';

    /**
     * the column name for the costperformanceindex field
     */
    const COL_COSTPERFORMANCEINDEX = 'myprojectdata.costperformanceindex';

    /**
     * the column name for the estimateatcompletionforclient field
     */
    const COL_ESTIMATEATCOMPLETIONFORCLIENT = 'myprojectdata.estimateatcompletionforclient';

    /**
     * the column name for the varianceatcompletionforclient field
     */
    const COL_VARIANCEATCOMPLETIONFORCLIENT = 'myprojectdata.varianceatcompletionforclient';

    /**
     * the column name for the costatcompletionforus field
     */
    const COL_COSTATCOMPLETIONFORUS = 'myprojectdata.costatcompletionforus';

    /**
     * the column name for the tocompleteperformanceindex field
     */
    const COL_TOCOMPLETEPERFORMANCEINDEX = 'myprojectdata.tocompleteperformanceindex';

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
        self::TYPE_PHPNAME       => array('Id', 'Budget', 'HourlyRate', 'HourlyBuffer', 'PlannedValue', 'ActualCost', 'EarnedValueForUs', 'EarnedValueForClient', 'EarnedValueVarience', 'ScheduleVariance', 'CostVariance', 'SchedulePerformanceIndex', 'CostPerformanceIndex', 'EstimateAtCompletionForClient', 'VarianceAtCompletionForClient', 'CostAtCompletionForUs', 'ToCompletePerformanceIndex', ),
        self::TYPE_CAMELNAME     => array('id', 'budget', 'hourlyRate', 'hourlyBuffer', 'plannedValue', 'actualCost', 'earnedValueForUs', 'earnedValueForClient', 'earnedValueVarience', 'scheduleVariance', 'costVariance', 'schedulePerformanceIndex', 'costPerformanceIndex', 'estimateAtCompletionForClient', 'varianceAtCompletionForClient', 'costAtCompletionForUs', 'toCompletePerformanceIndex', ),
        self::TYPE_COLNAME       => array(myProjectDataTableMap::COL_ID, myProjectDataTableMap::COL_BUDGET, myProjectDataTableMap::COL_HOURLYRATE, myProjectDataTableMap::COL_HOURLYBUFFER, myProjectDataTableMap::COL_PLANNEDVALUE, myProjectDataTableMap::COL_ACTUALCOST, myProjectDataTableMap::COL_EARNEDVALUEFORUS, myProjectDataTableMap::COL_EARNEDVALUEFORCLIENT, myProjectDataTableMap::COL_EARNEDVALUEVARIENCE, myProjectDataTableMap::COL_SCHEDULEVARIANCE, myProjectDataTableMap::COL_COSTVARIANCE, myProjectDataTableMap::COL_SCHEDULEPERFORMANCEINDEX, myProjectDataTableMap::COL_COSTPERFORMANCEINDEX, myProjectDataTableMap::COL_ESTIMATEATCOMPLETIONFORCLIENT, myProjectDataTableMap::COL_VARIANCEATCOMPLETIONFORCLIENT, myProjectDataTableMap::COL_COSTATCOMPLETIONFORUS, myProjectDataTableMap::COL_TOCOMPLETEPERFORMANCEINDEX, ),
        self::TYPE_FIELDNAME     => array('id', 'budget', 'hourlyrate', 'hourlybuffer', 'plannedvalue', 'actualcost', 'earnedvalueforus', 'earnedvalueforclient', 'earnedvaluevarience', 'schedulevariance', 'costvariance', 'scheduleperformanceindex', 'costperformanceindex', 'estimateatcompletionforclient', 'varianceatcompletionforclient', 'costatcompletionforus', 'tocompleteperformanceindex', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Budget' => 1, 'HourlyRate' => 2, 'HourlyBuffer' => 3, 'PlannedValue' => 4, 'ActualCost' => 5, 'EarnedValueForUs' => 6, 'EarnedValueForClient' => 7, 'EarnedValueVarience' => 8, 'ScheduleVariance' => 9, 'CostVariance' => 10, 'SchedulePerformanceIndex' => 11, 'CostPerformanceIndex' => 12, 'EstimateAtCompletionForClient' => 13, 'VarianceAtCompletionForClient' => 14, 'CostAtCompletionForUs' => 15, 'ToCompletePerformanceIndex' => 16, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'budget' => 1, 'hourlyRate' => 2, 'hourlyBuffer' => 3, 'plannedValue' => 4, 'actualCost' => 5, 'earnedValueForUs' => 6, 'earnedValueForClient' => 7, 'earnedValueVarience' => 8, 'scheduleVariance' => 9, 'costVariance' => 10, 'schedulePerformanceIndex' => 11, 'costPerformanceIndex' => 12, 'estimateAtCompletionForClient' => 13, 'varianceAtCompletionForClient' => 14, 'costAtCompletionForUs' => 15, 'toCompletePerformanceIndex' => 16, ),
        self::TYPE_COLNAME       => array(myProjectDataTableMap::COL_ID => 0, myProjectDataTableMap::COL_BUDGET => 1, myProjectDataTableMap::COL_HOURLYRATE => 2, myProjectDataTableMap::COL_HOURLYBUFFER => 3, myProjectDataTableMap::COL_PLANNEDVALUE => 4, myProjectDataTableMap::COL_ACTUALCOST => 5, myProjectDataTableMap::COL_EARNEDVALUEFORUS => 6, myProjectDataTableMap::COL_EARNEDVALUEFORCLIENT => 7, myProjectDataTableMap::COL_EARNEDVALUEVARIENCE => 8, myProjectDataTableMap::COL_SCHEDULEVARIANCE => 9, myProjectDataTableMap::COL_COSTVARIANCE => 10, myProjectDataTableMap::COL_SCHEDULEPERFORMANCEINDEX => 11, myProjectDataTableMap::COL_COSTPERFORMANCEINDEX => 12, myProjectDataTableMap::COL_ESTIMATEATCOMPLETIONFORCLIENT => 13, myProjectDataTableMap::COL_VARIANCEATCOMPLETIONFORCLIENT => 14, myProjectDataTableMap::COL_COSTATCOMPLETIONFORUS => 15, myProjectDataTableMap::COL_TOCOMPLETEPERFORMANCEINDEX => 16, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'budget' => 1, 'hourlyrate' => 2, 'hourlybuffer' => 3, 'plannedvalue' => 4, 'actualcost' => 5, 'earnedvalueforus' => 6, 'earnedvalueforclient' => 7, 'earnedvaluevarience' => 8, 'schedulevariance' => 9, 'costvariance' => 10, 'scheduleperformanceindex' => 11, 'costperformanceindex' => 12, 'estimateatcompletionforclient' => 13, 'varianceatcompletionforclient' => 14, 'costatcompletionforus' => 15, 'tocompleteperformanceindex' => 16, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
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
        $this->setName('myprojectdata');
        $this->setPhpName('myProjectData');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\myProjectData');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('budget', 'Budget', 'DOUBLE', false, null, null);
        $this->addColumn('hourlyrate', 'HourlyRate', 'DOUBLE', false, null, null);
        $this->addColumn('hourlybuffer', 'HourlyBuffer', 'DOUBLE', false, null, null);
        $this->addColumn('plannedvalue', 'PlannedValue', 'DOUBLE', false, null, null);
        $this->addColumn('actualcost', 'ActualCost', 'DOUBLE', false, null, null);
        $this->addColumn('earnedvalueforus', 'EarnedValueForUs', 'DOUBLE', false, null, null);
        $this->addColumn('earnedvalueforclient', 'EarnedValueForClient', 'DOUBLE', false, null, null);
        $this->addColumn('earnedvaluevarience', 'EarnedValueVarience', 'DOUBLE', false, null, null);
        $this->addColumn('schedulevariance', 'ScheduleVariance', 'DOUBLE', false, null, null);
        $this->addColumn('costvariance', 'CostVariance', 'DOUBLE', false, null, null);
        $this->addColumn('scheduleperformanceindex', 'SchedulePerformanceIndex', 'DOUBLE', false, null, null);
        $this->addColumn('costperformanceindex', 'CostPerformanceIndex', 'DOUBLE', false, null, null);
        $this->addColumn('estimateatcompletionforclient', 'EstimateAtCompletionForClient', 'DOUBLE', false, null, null);
        $this->addColumn('varianceatcompletionforclient', 'VarianceAtCompletionForClient', 'DOUBLE', false, null, null);
        $this->addColumn('costatcompletionforus', 'CostAtCompletionForUs', 'DOUBLE', false, null, null);
        $this->addColumn('tocompleteperformanceindex', 'ToCompletePerformanceIndex', 'DOUBLE', false, null, null);
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
        return $withPrefix ? myProjectDataTableMap::CLASS_DEFAULT : myProjectDataTableMap::OM_CLASS;
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
     * @return array           (myProjectData object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = myProjectDataTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = myProjectDataTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + myProjectDataTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = myProjectDataTableMap::OM_CLASS;
            /** @var myProjectData $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            myProjectDataTableMap::addInstanceToPool($obj, $key);
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
            $key = myProjectDataTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = myProjectDataTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var myProjectData $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                myProjectDataTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(myProjectDataTableMap::COL_ID);
            $criteria->addSelectColumn(myProjectDataTableMap::COL_BUDGET);
            $criteria->addSelectColumn(myProjectDataTableMap::COL_HOURLYRATE);
            $criteria->addSelectColumn(myProjectDataTableMap::COL_HOURLYBUFFER);
            $criteria->addSelectColumn(myProjectDataTableMap::COL_PLANNEDVALUE);
            $criteria->addSelectColumn(myProjectDataTableMap::COL_ACTUALCOST);
            $criteria->addSelectColumn(myProjectDataTableMap::COL_EARNEDVALUEFORUS);
            $criteria->addSelectColumn(myProjectDataTableMap::COL_EARNEDVALUEFORCLIENT);
            $criteria->addSelectColumn(myProjectDataTableMap::COL_EARNEDVALUEVARIENCE);
            $criteria->addSelectColumn(myProjectDataTableMap::COL_SCHEDULEVARIANCE);
            $criteria->addSelectColumn(myProjectDataTableMap::COL_COSTVARIANCE);
            $criteria->addSelectColumn(myProjectDataTableMap::COL_SCHEDULEPERFORMANCEINDEX);
            $criteria->addSelectColumn(myProjectDataTableMap::COL_COSTPERFORMANCEINDEX);
            $criteria->addSelectColumn(myProjectDataTableMap::COL_ESTIMATEATCOMPLETIONFORCLIENT);
            $criteria->addSelectColumn(myProjectDataTableMap::COL_VARIANCEATCOMPLETIONFORCLIENT);
            $criteria->addSelectColumn(myProjectDataTableMap::COL_COSTATCOMPLETIONFORUS);
            $criteria->addSelectColumn(myProjectDataTableMap::COL_TOCOMPLETEPERFORMANCEINDEX);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.budget');
            $criteria->addSelectColumn($alias . '.hourlyrate');
            $criteria->addSelectColumn($alias . '.hourlybuffer');
            $criteria->addSelectColumn($alias . '.plannedvalue');
            $criteria->addSelectColumn($alias . '.actualcost');
            $criteria->addSelectColumn($alias . '.earnedvalueforus');
            $criteria->addSelectColumn($alias . '.earnedvalueforclient');
            $criteria->addSelectColumn($alias . '.earnedvaluevarience');
            $criteria->addSelectColumn($alias . '.schedulevariance');
            $criteria->addSelectColumn($alias . '.costvariance');
            $criteria->addSelectColumn($alias . '.scheduleperformanceindex');
            $criteria->addSelectColumn($alias . '.costperformanceindex');
            $criteria->addSelectColumn($alias . '.estimateatcompletionforclient');
            $criteria->addSelectColumn($alias . '.varianceatcompletionforclient');
            $criteria->addSelectColumn($alias . '.costatcompletionforus');
            $criteria->addSelectColumn($alias . '.tocompleteperformanceindex');
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
        return Propel::getServiceContainer()->getDatabaseMap(myProjectDataTableMap::DATABASE_NAME)->getTable(myProjectDataTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(myProjectDataTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(myProjectDataTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new myProjectDataTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a myProjectData or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or myProjectData object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(myProjectDataTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \myProjectData) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(myProjectDataTableMap::DATABASE_NAME);
            $criteria->add(myProjectDataTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = myProjectDataQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            myProjectDataTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                myProjectDataTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the myprojectdata table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return myProjectDataQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a myProjectData or Criteria object.
     *
     * @param mixed               $criteria Criteria or myProjectData object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(myProjectDataTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from myProjectData object
        }

        if ($criteria->containsKey(myProjectDataTableMap::COL_ID) && $criteria->keyContainsValue(myProjectDataTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.myProjectDataTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = myProjectDataQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // myProjectDataTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
myProjectDataTableMap::buildTableMap();
