<?php

namespace Base;

use \myProjectDataQuery as ChildmyProjectDataQuery;
use \Exception;
use \PDO;
use Map\myProjectDataTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;

/**
 * Base class that represents a row from the 'myprojectdata' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class myProjectData implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\myProjectDataTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the id field.
     *
     * @var        int
     */
    protected $id;

    /**
     * The value for the budget field.
     *
     * @var        double
     */
    protected $budget;

    /**
     * The value for the hourlyrate field.
     *
     * @var        double
     */
    protected $hourlyrate;

    /**
     * The value for the hourlybuffer field.
     *
     * @var        double
     */
    protected $hourlybuffer;

    /**
     * The value for the plannedvalue field.
     *
     * @var        double
     */
    protected $plannedvalue;

    /**
     * The value for the actualcost field.
     *
     * @var        double
     */
    protected $actualcost;

    /**
     * The value for the earnedvalueforus field.
     *
     * @var        double
     */
    protected $earnedvalueforus;

    /**
     * The value for the earnedvalueforclient field.
     *
     * @var        double
     */
    protected $earnedvalueforclient;

    /**
     * The value for the earnedvaluevarience field.
     *
     * @var        double
     */
    protected $earnedvaluevarience;

    /**
     * The value for the schedulevariance field.
     *
     * @var        double
     */
    protected $schedulevariance;

    /**
     * The value for the costvariance field.
     *
     * @var        double
     */
    protected $costvariance;

    /**
     * The value for the scheduleperformanceindex field.
     *
     * @var        double
     */
    protected $scheduleperformanceindex;

    /**
     * The value for the costperformanceindex field.
     *
     * @var        double
     */
    protected $costperformanceindex;

    /**
     * The value for the estimateatcompletionforclient field.
     *
     * @var        double
     */
    protected $estimateatcompletionforclient;

    /**
     * The value for the varianceatcompletionforclient field.
     *
     * @var        double
     */
    protected $varianceatcompletionforclient;

    /**
     * The value for the costatcompletionforus field.
     *
     * @var        double
     */
    protected $costatcompletionforus;

    /**
     * The value for the tocompleteperformanceindex field.
     *
     * @var        double
     */
    protected $tocompleteperformanceindex;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Initializes internal state of Base\myProjectData object.
     */
    public function __construct()
    {
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>myProjectData</code> instance.  If
     * <code>obj</code> is an instance of <code>myProjectData</code>, delegates to
     * <code>equals(myProjectData)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this|myProjectData The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        $cls = new \ReflectionClass($this);
        $propertyNames = [];
        $serializableProperties = array_diff($cls->getProperties(), $cls->getProperties(\ReflectionProperty::IS_STATIC));

        foreach($serializableProperties as $property) {
            $propertyNames[] = $property->getName();
        }

        return $propertyNames;
    }

    /**
     * Get the [id] column value.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the [budget] column value.
     *
     * @return double
     */
    public function getBudget()
    {
        return $this->budget;
    }

    /**
     * Get the [hourlyrate] column value.
     *
     * @return double
     */
    public function getHourlyRate()
    {
        return $this->hourlyrate;
    }

    /**
     * Get the [hourlybuffer] column value.
     *
     * @return double
     */
    public function getHourlyBuffer()
    {
        return $this->hourlybuffer;
    }

    /**
     * Get the [plannedvalue] column value.
     *
     * @return double
     */
    public function getPlannedValue()
    {
        return $this->plannedvalue;
    }

    /**
     * Get the [actualcost] column value.
     *
     * @return double
     */
    public function getActualCost()
    {
        return $this->actualcost;
    }

    /**
     * Get the [earnedvalueforus] column value.
     *
     * @return double
     */
    public function getEarnedValueForUs()
    {
        return $this->earnedvalueforus;
    }

    /**
     * Get the [earnedvalueforclient] column value.
     *
     * @return double
     */
    public function getEarnedValueForClient()
    {
        return $this->earnedvalueforclient;
    }

    /**
     * Get the [earnedvaluevarience] column value.
     *
     * @return double
     */
    public function getEarnedValueVarience()
    {
        return $this->earnedvaluevarience;
    }

    /**
     * Get the [schedulevariance] column value.
     *
     * @return double
     */
    public function getScheduleVariance()
    {
        return $this->schedulevariance;
    }

    /**
     * Get the [costvariance] column value.
     *
     * @return double
     */
    public function getCostVariance()
    {
        return $this->costvariance;
    }

    /**
     * Get the [scheduleperformanceindex] column value.
     *
     * @return double
     */
    public function getSchedulePerformanceIndex()
    {
        return $this->scheduleperformanceindex;
    }

    /**
     * Get the [costperformanceindex] column value.
     *
     * @return double
     */
    public function getCostPerformanceIndex()
    {
        return $this->costperformanceindex;
    }

    /**
     * Get the [estimateatcompletionforclient] column value.
     *
     * @return double
     */
    public function getEstimateAtCompletionForClient()
    {
        return $this->estimateatcompletionforclient;
    }

    /**
     * Get the [varianceatcompletionforclient] column value.
     *
     * @return double
     */
    public function getVarianceAtCompletionForClient()
    {
        return $this->varianceatcompletionforclient;
    }

    /**
     * Get the [costatcompletionforus] column value.
     *
     * @return double
     */
    public function getCostAtCompletionForUs()
    {
        return $this->costatcompletionforus;
    }

    /**
     * Get the [tocompleteperformanceindex] column value.
     *
     * @return double
     */
    public function getToCompletePerformanceIndex()
    {
        return $this->tocompleteperformanceindex;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return $this|\myProjectData The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[myProjectDataTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [budget] column.
     *
     * @param double $v new value
     * @return $this|\myProjectData The current object (for fluent API support)
     */
    public function setBudget($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->budget !== $v) {
            $this->budget = $v;
            $this->modifiedColumns[myProjectDataTableMap::COL_BUDGET] = true;
        }

        return $this;
    } // setBudget()

    /**
     * Set the value of [hourlyrate] column.
     *
     * @param double $v new value
     * @return $this|\myProjectData The current object (for fluent API support)
     */
    public function setHourlyRate($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->hourlyrate !== $v) {
            $this->hourlyrate = $v;
            $this->modifiedColumns[myProjectDataTableMap::COL_HOURLYRATE] = true;
        }

        return $this;
    } // setHourlyRate()

    /**
     * Set the value of [hourlybuffer] column.
     *
     * @param double $v new value
     * @return $this|\myProjectData The current object (for fluent API support)
     */
    public function setHourlyBuffer($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->hourlybuffer !== $v) {
            $this->hourlybuffer = $v;
            $this->modifiedColumns[myProjectDataTableMap::COL_HOURLYBUFFER] = true;
        }

        return $this;
    } // setHourlyBuffer()

    /**
     * Set the value of [plannedvalue] column.
     *
     * @param double $v new value
     * @return $this|\myProjectData The current object (for fluent API support)
     */
    public function setPlannedValue($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->plannedvalue !== $v) {
            $this->plannedvalue = $v;
            $this->modifiedColumns[myProjectDataTableMap::COL_PLANNEDVALUE] = true;
        }

        return $this;
    } // setPlannedValue()

    /**
     * Set the value of [actualcost] column.
     *
     * @param double $v new value
     * @return $this|\myProjectData The current object (for fluent API support)
     */
    public function setActualCost($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->actualcost !== $v) {
            $this->actualcost = $v;
            $this->modifiedColumns[myProjectDataTableMap::COL_ACTUALCOST] = true;
        }

        return $this;
    } // setActualCost()

    /**
     * Set the value of [earnedvalueforus] column.
     *
     * @param double $v new value
     * @return $this|\myProjectData The current object (for fluent API support)
     */
    public function setEarnedValueForUs($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->earnedvalueforus !== $v) {
            $this->earnedvalueforus = $v;
            $this->modifiedColumns[myProjectDataTableMap::COL_EARNEDVALUEFORUS] = true;
        }

        return $this;
    } // setEarnedValueForUs()

    /**
     * Set the value of [earnedvalueforclient] column.
     *
     * @param double $v new value
     * @return $this|\myProjectData The current object (for fluent API support)
     */
    public function setEarnedValueForClient($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->earnedvalueforclient !== $v) {
            $this->earnedvalueforclient = $v;
            $this->modifiedColumns[myProjectDataTableMap::COL_EARNEDVALUEFORCLIENT] = true;
        }

        return $this;
    } // setEarnedValueForClient()

    /**
     * Set the value of [earnedvaluevarience] column.
     *
     * @param double $v new value
     * @return $this|\myProjectData The current object (for fluent API support)
     */
    public function setEarnedValueVarience($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->earnedvaluevarience !== $v) {
            $this->earnedvaluevarience = $v;
            $this->modifiedColumns[myProjectDataTableMap::COL_EARNEDVALUEVARIENCE] = true;
        }

        return $this;
    } // setEarnedValueVarience()

    /**
     * Set the value of [schedulevariance] column.
     *
     * @param double $v new value
     * @return $this|\myProjectData The current object (for fluent API support)
     */
    public function setScheduleVariance($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->schedulevariance !== $v) {
            $this->schedulevariance = $v;
            $this->modifiedColumns[myProjectDataTableMap::COL_SCHEDULEVARIANCE] = true;
        }

        return $this;
    } // setScheduleVariance()

    /**
     * Set the value of [costvariance] column.
     *
     * @param double $v new value
     * @return $this|\myProjectData The current object (for fluent API support)
     */
    public function setCostVariance($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->costvariance !== $v) {
            $this->costvariance = $v;
            $this->modifiedColumns[myProjectDataTableMap::COL_COSTVARIANCE] = true;
        }

        return $this;
    } // setCostVariance()

    /**
     * Set the value of [scheduleperformanceindex] column.
     *
     * @param double $v new value
     * @return $this|\myProjectData The current object (for fluent API support)
     */
    public function setSchedulePerformanceIndex($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->scheduleperformanceindex !== $v) {
            $this->scheduleperformanceindex = $v;
            $this->modifiedColumns[myProjectDataTableMap::COL_SCHEDULEPERFORMANCEINDEX] = true;
        }

        return $this;
    } // setSchedulePerformanceIndex()

    /**
     * Set the value of [costperformanceindex] column.
     *
     * @param double $v new value
     * @return $this|\myProjectData The current object (for fluent API support)
     */
    public function setCostPerformanceIndex($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->costperformanceindex !== $v) {
            $this->costperformanceindex = $v;
            $this->modifiedColumns[myProjectDataTableMap::COL_COSTPERFORMANCEINDEX] = true;
        }

        return $this;
    } // setCostPerformanceIndex()

    /**
     * Set the value of [estimateatcompletionforclient] column.
     *
     * @param double $v new value
     * @return $this|\myProjectData The current object (for fluent API support)
     */
    public function setEstimateAtCompletionForClient($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->estimateatcompletionforclient !== $v) {
            $this->estimateatcompletionforclient = $v;
            $this->modifiedColumns[myProjectDataTableMap::COL_ESTIMATEATCOMPLETIONFORCLIENT] = true;
        }

        return $this;
    } // setEstimateAtCompletionForClient()

    /**
     * Set the value of [varianceatcompletionforclient] column.
     *
     * @param double $v new value
     * @return $this|\myProjectData The current object (for fluent API support)
     */
    public function setVarianceAtCompletionForClient($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->varianceatcompletionforclient !== $v) {
            $this->varianceatcompletionforclient = $v;
            $this->modifiedColumns[myProjectDataTableMap::COL_VARIANCEATCOMPLETIONFORCLIENT] = true;
        }

        return $this;
    } // setVarianceAtCompletionForClient()

    /**
     * Set the value of [costatcompletionforus] column.
     *
     * @param double $v new value
     * @return $this|\myProjectData The current object (for fluent API support)
     */
    public function setCostAtCompletionForUs($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->costatcompletionforus !== $v) {
            $this->costatcompletionforus = $v;
            $this->modifiedColumns[myProjectDataTableMap::COL_COSTATCOMPLETIONFORUS] = true;
        }

        return $this;
    } // setCostAtCompletionForUs()

    /**
     * Set the value of [tocompleteperformanceindex] column.
     *
     * @param double $v new value
     * @return $this|\myProjectData The current object (for fluent API support)
     */
    public function setToCompletePerformanceIndex($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->tocompleteperformanceindex !== $v) {
            $this->tocompleteperformanceindex = $v;
            $this->modifiedColumns[myProjectDataTableMap::COL_TOCOMPLETEPERFORMANCEINDEX] = true;
        }

        return $this;
    } // setToCompletePerformanceIndex()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : myProjectDataTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : myProjectDataTableMap::translateFieldName('Budget', TableMap::TYPE_PHPNAME, $indexType)];
            $this->budget = (null !== $col) ? (double) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : myProjectDataTableMap::translateFieldName('HourlyRate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->hourlyrate = (null !== $col) ? (double) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : myProjectDataTableMap::translateFieldName('HourlyBuffer', TableMap::TYPE_PHPNAME, $indexType)];
            $this->hourlybuffer = (null !== $col) ? (double) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : myProjectDataTableMap::translateFieldName('PlannedValue', TableMap::TYPE_PHPNAME, $indexType)];
            $this->plannedvalue = (null !== $col) ? (double) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : myProjectDataTableMap::translateFieldName('ActualCost', TableMap::TYPE_PHPNAME, $indexType)];
            $this->actualcost = (null !== $col) ? (double) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : myProjectDataTableMap::translateFieldName('EarnedValueForUs', TableMap::TYPE_PHPNAME, $indexType)];
            $this->earnedvalueforus = (null !== $col) ? (double) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : myProjectDataTableMap::translateFieldName('EarnedValueForClient', TableMap::TYPE_PHPNAME, $indexType)];
            $this->earnedvalueforclient = (null !== $col) ? (double) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : myProjectDataTableMap::translateFieldName('EarnedValueVarience', TableMap::TYPE_PHPNAME, $indexType)];
            $this->earnedvaluevarience = (null !== $col) ? (double) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : myProjectDataTableMap::translateFieldName('ScheduleVariance', TableMap::TYPE_PHPNAME, $indexType)];
            $this->schedulevariance = (null !== $col) ? (double) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : myProjectDataTableMap::translateFieldName('CostVariance', TableMap::TYPE_PHPNAME, $indexType)];
            $this->costvariance = (null !== $col) ? (double) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : myProjectDataTableMap::translateFieldName('SchedulePerformanceIndex', TableMap::TYPE_PHPNAME, $indexType)];
            $this->scheduleperformanceindex = (null !== $col) ? (double) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : myProjectDataTableMap::translateFieldName('CostPerformanceIndex', TableMap::TYPE_PHPNAME, $indexType)];
            $this->costperformanceindex = (null !== $col) ? (double) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : myProjectDataTableMap::translateFieldName('EstimateAtCompletionForClient', TableMap::TYPE_PHPNAME, $indexType)];
            $this->estimateatcompletionforclient = (null !== $col) ? (double) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : myProjectDataTableMap::translateFieldName('VarianceAtCompletionForClient', TableMap::TYPE_PHPNAME, $indexType)];
            $this->varianceatcompletionforclient = (null !== $col) ? (double) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : myProjectDataTableMap::translateFieldName('CostAtCompletionForUs', TableMap::TYPE_PHPNAME, $indexType)];
            $this->costatcompletionforus = (null !== $col) ? (double) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : myProjectDataTableMap::translateFieldName('ToCompletePerformanceIndex', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tocompleteperformanceindex = (null !== $col) ? (double) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 17; // 17 = myProjectDataTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\myProjectData'), 0, $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(myProjectDataTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildmyProjectDataQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see myProjectData::setDeleted()
     * @see myProjectData::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(myProjectDataTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildmyProjectDataQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(myProjectDataTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $ret = $this->preSave($con);
            $isInsert = $this->isNew();
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                myProjectDataTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[myProjectDataTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . myProjectDataTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(myProjectDataTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(myProjectDataTableMap::COL_BUDGET)) {
            $modifiedColumns[':p' . $index++]  = 'budget';
        }
        if ($this->isColumnModified(myProjectDataTableMap::COL_HOURLYRATE)) {
            $modifiedColumns[':p' . $index++]  = 'hourlyrate';
        }
        if ($this->isColumnModified(myProjectDataTableMap::COL_HOURLYBUFFER)) {
            $modifiedColumns[':p' . $index++]  = 'hourlybuffer';
        }
        if ($this->isColumnModified(myProjectDataTableMap::COL_PLANNEDVALUE)) {
            $modifiedColumns[':p' . $index++]  = 'plannedvalue';
        }
        if ($this->isColumnModified(myProjectDataTableMap::COL_ACTUALCOST)) {
            $modifiedColumns[':p' . $index++]  = 'actualcost';
        }
        if ($this->isColumnModified(myProjectDataTableMap::COL_EARNEDVALUEFORUS)) {
            $modifiedColumns[':p' . $index++]  = 'earnedvalueforus';
        }
        if ($this->isColumnModified(myProjectDataTableMap::COL_EARNEDVALUEFORCLIENT)) {
            $modifiedColumns[':p' . $index++]  = 'earnedvalueforclient';
        }
        if ($this->isColumnModified(myProjectDataTableMap::COL_EARNEDVALUEVARIENCE)) {
            $modifiedColumns[':p' . $index++]  = 'earnedvaluevarience';
        }
        if ($this->isColumnModified(myProjectDataTableMap::COL_SCHEDULEVARIANCE)) {
            $modifiedColumns[':p' . $index++]  = 'schedulevariance';
        }
        if ($this->isColumnModified(myProjectDataTableMap::COL_COSTVARIANCE)) {
            $modifiedColumns[':p' . $index++]  = 'costvariance';
        }
        if ($this->isColumnModified(myProjectDataTableMap::COL_SCHEDULEPERFORMANCEINDEX)) {
            $modifiedColumns[':p' . $index++]  = 'scheduleperformanceindex';
        }
        if ($this->isColumnModified(myProjectDataTableMap::COL_COSTPERFORMANCEINDEX)) {
            $modifiedColumns[':p' . $index++]  = 'costperformanceindex';
        }
        if ($this->isColumnModified(myProjectDataTableMap::COL_ESTIMATEATCOMPLETIONFORCLIENT)) {
            $modifiedColumns[':p' . $index++]  = 'estimateatcompletionforclient';
        }
        if ($this->isColumnModified(myProjectDataTableMap::COL_VARIANCEATCOMPLETIONFORCLIENT)) {
            $modifiedColumns[':p' . $index++]  = 'varianceatcompletionforclient';
        }
        if ($this->isColumnModified(myProjectDataTableMap::COL_COSTATCOMPLETIONFORUS)) {
            $modifiedColumns[':p' . $index++]  = 'costatcompletionforus';
        }
        if ($this->isColumnModified(myProjectDataTableMap::COL_TOCOMPLETEPERFORMANCEINDEX)) {
            $modifiedColumns[':p' . $index++]  = 'tocompleteperformanceindex';
        }

        $sql = sprintf(
            'INSERT INTO myprojectdata (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case 'budget':
                        $stmt->bindValue($identifier, $this->budget, PDO::PARAM_STR);
                        break;
                    case 'hourlyrate':
                        $stmt->bindValue($identifier, $this->hourlyrate, PDO::PARAM_STR);
                        break;
                    case 'hourlybuffer':
                        $stmt->bindValue($identifier, $this->hourlybuffer, PDO::PARAM_STR);
                        break;
                    case 'plannedvalue':
                        $stmt->bindValue($identifier, $this->plannedvalue, PDO::PARAM_STR);
                        break;
                    case 'actualcost':
                        $stmt->bindValue($identifier, $this->actualcost, PDO::PARAM_STR);
                        break;
                    case 'earnedvalueforus':
                        $stmt->bindValue($identifier, $this->earnedvalueforus, PDO::PARAM_STR);
                        break;
                    case 'earnedvalueforclient':
                        $stmt->bindValue($identifier, $this->earnedvalueforclient, PDO::PARAM_STR);
                        break;
                    case 'earnedvaluevarience':
                        $stmt->bindValue($identifier, $this->earnedvaluevarience, PDO::PARAM_STR);
                        break;
                    case 'schedulevariance':
                        $stmt->bindValue($identifier, $this->schedulevariance, PDO::PARAM_STR);
                        break;
                    case 'costvariance':
                        $stmt->bindValue($identifier, $this->costvariance, PDO::PARAM_STR);
                        break;
                    case 'scheduleperformanceindex':
                        $stmt->bindValue($identifier, $this->scheduleperformanceindex, PDO::PARAM_STR);
                        break;
                    case 'costperformanceindex':
                        $stmt->bindValue($identifier, $this->costperformanceindex, PDO::PARAM_STR);
                        break;
                    case 'estimateatcompletionforclient':
                        $stmt->bindValue($identifier, $this->estimateatcompletionforclient, PDO::PARAM_STR);
                        break;
                    case 'varianceatcompletionforclient':
                        $stmt->bindValue($identifier, $this->varianceatcompletionforclient, PDO::PARAM_STR);
                        break;
                    case 'costatcompletionforus':
                        $stmt->bindValue($identifier, $this->costatcompletionforus, PDO::PARAM_STR);
                        break;
                    case 'tocompleteperformanceindex':
                        $stmt->bindValue($identifier, $this->tocompleteperformanceindex, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setId($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = myProjectDataTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getId();
                break;
            case 1:
                return $this->getBudget();
                break;
            case 2:
                return $this->getHourlyRate();
                break;
            case 3:
                return $this->getHourlyBuffer();
                break;
            case 4:
                return $this->getPlannedValue();
                break;
            case 5:
                return $this->getActualCost();
                break;
            case 6:
                return $this->getEarnedValueForUs();
                break;
            case 7:
                return $this->getEarnedValueForClient();
                break;
            case 8:
                return $this->getEarnedValueVarience();
                break;
            case 9:
                return $this->getScheduleVariance();
                break;
            case 10:
                return $this->getCostVariance();
                break;
            case 11:
                return $this->getSchedulePerformanceIndex();
                break;
            case 12:
                return $this->getCostPerformanceIndex();
                break;
            case 13:
                return $this->getEstimateAtCompletionForClient();
                break;
            case 14:
                return $this->getVarianceAtCompletionForClient();
                break;
            case 15:
                return $this->getCostAtCompletionForUs();
                break;
            case 16:
                return $this->getToCompletePerformanceIndex();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array())
    {

        if (isset($alreadyDumpedObjects['myProjectData'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['myProjectData'][$this->hashCode()] = true;
        $keys = myProjectDataTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getBudget(),
            $keys[2] => $this->getHourlyRate(),
            $keys[3] => $this->getHourlyBuffer(),
            $keys[4] => $this->getPlannedValue(),
            $keys[5] => $this->getActualCost(),
            $keys[6] => $this->getEarnedValueForUs(),
            $keys[7] => $this->getEarnedValueForClient(),
            $keys[8] => $this->getEarnedValueVarience(),
            $keys[9] => $this->getScheduleVariance(),
            $keys[10] => $this->getCostVariance(),
            $keys[11] => $this->getSchedulePerformanceIndex(),
            $keys[12] => $this->getCostPerformanceIndex(),
            $keys[13] => $this->getEstimateAtCompletionForClient(),
            $keys[14] => $this->getVarianceAtCompletionForClient(),
            $keys[15] => $this->getCostAtCompletionForUs(),
            $keys[16] => $this->getToCompletePerformanceIndex(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }


        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this|\myProjectData
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = myProjectDataTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\myProjectData
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setBudget($value);
                break;
            case 2:
                $this->setHourlyRate($value);
                break;
            case 3:
                $this->setHourlyBuffer($value);
                break;
            case 4:
                $this->setPlannedValue($value);
                break;
            case 5:
                $this->setActualCost($value);
                break;
            case 6:
                $this->setEarnedValueForUs($value);
                break;
            case 7:
                $this->setEarnedValueForClient($value);
                break;
            case 8:
                $this->setEarnedValueVarience($value);
                break;
            case 9:
                $this->setScheduleVariance($value);
                break;
            case 10:
                $this->setCostVariance($value);
                break;
            case 11:
                $this->setSchedulePerformanceIndex($value);
                break;
            case 12:
                $this->setCostPerformanceIndex($value);
                break;
            case 13:
                $this->setEstimateAtCompletionForClient($value);
                break;
            case 14:
                $this->setVarianceAtCompletionForClient($value);
                break;
            case 15:
                $this->setCostAtCompletionForUs($value);
                break;
            case 16:
                $this->setToCompletePerformanceIndex($value);
                break;
        } // switch()

        return $this;
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = myProjectDataTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setBudget($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setHourlyRate($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setHourlyBuffer($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setPlannedValue($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setActualCost($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setEarnedValueForUs($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setEarnedValueForClient($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setEarnedValueVarience($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setScheduleVariance($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setCostVariance($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setSchedulePerformanceIndex($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setCostPerformanceIndex($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setEstimateAtCompletionForClient($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setVarianceAtCompletionForClient($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setCostAtCompletionForUs($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setToCompletePerformanceIndex($arr[$keys[16]]);
        }
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\myProjectData The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(myProjectDataTableMap::DATABASE_NAME);

        if ($this->isColumnModified(myProjectDataTableMap::COL_ID)) {
            $criteria->add(myProjectDataTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(myProjectDataTableMap::COL_BUDGET)) {
            $criteria->add(myProjectDataTableMap::COL_BUDGET, $this->budget);
        }
        if ($this->isColumnModified(myProjectDataTableMap::COL_HOURLYRATE)) {
            $criteria->add(myProjectDataTableMap::COL_HOURLYRATE, $this->hourlyrate);
        }
        if ($this->isColumnModified(myProjectDataTableMap::COL_HOURLYBUFFER)) {
            $criteria->add(myProjectDataTableMap::COL_HOURLYBUFFER, $this->hourlybuffer);
        }
        if ($this->isColumnModified(myProjectDataTableMap::COL_PLANNEDVALUE)) {
            $criteria->add(myProjectDataTableMap::COL_PLANNEDVALUE, $this->plannedvalue);
        }
        if ($this->isColumnModified(myProjectDataTableMap::COL_ACTUALCOST)) {
            $criteria->add(myProjectDataTableMap::COL_ACTUALCOST, $this->actualcost);
        }
        if ($this->isColumnModified(myProjectDataTableMap::COL_EARNEDVALUEFORUS)) {
            $criteria->add(myProjectDataTableMap::COL_EARNEDVALUEFORUS, $this->earnedvalueforus);
        }
        if ($this->isColumnModified(myProjectDataTableMap::COL_EARNEDVALUEFORCLIENT)) {
            $criteria->add(myProjectDataTableMap::COL_EARNEDVALUEFORCLIENT, $this->earnedvalueforclient);
        }
        if ($this->isColumnModified(myProjectDataTableMap::COL_EARNEDVALUEVARIENCE)) {
            $criteria->add(myProjectDataTableMap::COL_EARNEDVALUEVARIENCE, $this->earnedvaluevarience);
        }
        if ($this->isColumnModified(myProjectDataTableMap::COL_SCHEDULEVARIANCE)) {
            $criteria->add(myProjectDataTableMap::COL_SCHEDULEVARIANCE, $this->schedulevariance);
        }
        if ($this->isColumnModified(myProjectDataTableMap::COL_COSTVARIANCE)) {
            $criteria->add(myProjectDataTableMap::COL_COSTVARIANCE, $this->costvariance);
        }
        if ($this->isColumnModified(myProjectDataTableMap::COL_SCHEDULEPERFORMANCEINDEX)) {
            $criteria->add(myProjectDataTableMap::COL_SCHEDULEPERFORMANCEINDEX, $this->scheduleperformanceindex);
        }
        if ($this->isColumnModified(myProjectDataTableMap::COL_COSTPERFORMANCEINDEX)) {
            $criteria->add(myProjectDataTableMap::COL_COSTPERFORMANCEINDEX, $this->costperformanceindex);
        }
        if ($this->isColumnModified(myProjectDataTableMap::COL_ESTIMATEATCOMPLETIONFORCLIENT)) {
            $criteria->add(myProjectDataTableMap::COL_ESTIMATEATCOMPLETIONFORCLIENT, $this->estimateatcompletionforclient);
        }
        if ($this->isColumnModified(myProjectDataTableMap::COL_VARIANCEATCOMPLETIONFORCLIENT)) {
            $criteria->add(myProjectDataTableMap::COL_VARIANCEATCOMPLETIONFORCLIENT, $this->varianceatcompletionforclient);
        }
        if ($this->isColumnModified(myProjectDataTableMap::COL_COSTATCOMPLETIONFORUS)) {
            $criteria->add(myProjectDataTableMap::COL_COSTATCOMPLETIONFORUS, $this->costatcompletionforus);
        }
        if ($this->isColumnModified(myProjectDataTableMap::COL_TOCOMPLETEPERFORMANCEINDEX)) {
            $criteria->add(myProjectDataTableMap::COL_TOCOMPLETEPERFORMANCEINDEX, $this->tocompleteperformanceindex);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildmyProjectDataQuery::create();
        $criteria->add(myProjectDataTableMap::COL_ID, $this->id);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getId();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getId();
    }

    /**
     * Generic method to set the primary key (id column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \myProjectData (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setBudget($this->getBudget());
        $copyObj->setHourlyRate($this->getHourlyRate());
        $copyObj->setHourlyBuffer($this->getHourlyBuffer());
        $copyObj->setPlannedValue($this->getPlannedValue());
        $copyObj->setActualCost($this->getActualCost());
        $copyObj->setEarnedValueForUs($this->getEarnedValueForUs());
        $copyObj->setEarnedValueForClient($this->getEarnedValueForClient());
        $copyObj->setEarnedValueVarience($this->getEarnedValueVarience());
        $copyObj->setScheduleVariance($this->getScheduleVariance());
        $copyObj->setCostVariance($this->getCostVariance());
        $copyObj->setSchedulePerformanceIndex($this->getSchedulePerformanceIndex());
        $copyObj->setCostPerformanceIndex($this->getCostPerformanceIndex());
        $copyObj->setEstimateAtCompletionForClient($this->getEstimateAtCompletionForClient());
        $copyObj->setVarianceAtCompletionForClient($this->getVarianceAtCompletionForClient());
        $copyObj->setCostAtCompletionForUs($this->getCostAtCompletionForUs());
        $copyObj->setToCompletePerformanceIndex($this->getToCompletePerformanceIndex());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setId(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \myProjectData Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->id = null;
        $this->budget = null;
        $this->hourlyrate = null;
        $this->hourlybuffer = null;
        $this->plannedvalue = null;
        $this->actualcost = null;
        $this->earnedvalueforus = null;
        $this->earnedvalueforclient = null;
        $this->earnedvaluevarience = null;
        $this->schedulevariance = null;
        $this->costvariance = null;
        $this->scheduleperformanceindex = null;
        $this->costperformanceindex = null;
        $this->estimateatcompletionforclient = null;
        $this->varianceatcompletionforclient = null;
        $this->costatcompletionforus = null;
        $this->tocompleteperformanceindex = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
        } // if ($deep)

    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(myProjectDataTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preSave')) {
            return parent::preSave($con);
        }
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postSave')) {
            parent::postSave($con);
        }
    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preInsert')) {
            return parent::preInsert($con);
        }
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postInsert')) {
            parent::postInsert($con);
        }
    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preUpdate')) {
            return parent::preUpdate($con);
        }
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postUpdate')) {
            parent::postUpdate($con);
        }
    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preDelete')) {
            return parent::preDelete($con);
        }
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postDelete')) {
            parent::postDelete($con);
        }
    }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
