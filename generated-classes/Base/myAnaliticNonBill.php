<?php

namespace Base;

use \myAnaliticNonBillQuery as ChildmyAnaliticNonBillQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\myAnaliticNonBillTableMap;
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
use Propel\Runtime\Util\PropelDateTime;

/**
 * Base class that represents a row from the 'myanaliticnonbill' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class myAnaliticNonBill implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\myAnaliticNonBillTableMap';


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
     * The value for the projectname field.
     *
     * @var        string
     */
    protected $projectname;

    /**
     * The value for the issuekey field.
     *
     * @var        string
     */
    protected $issuekey;

    /**
     * The value for the initialestimate field.
     *
     * @var        string
     */
    protected $initialestimate;

    /**
     * The value for the nonbil field.
     *
     * @var        string
     */
    protected $nonbil;

    /**
     * The value for the assignee field.
     *
     * @var        string
     */
    protected $assignee;

    /**
     * The value for the estimatedhourssum field.
     *
     * @var        double
     */
    protected $estimatedhourssum;

    /**
     * The value for the workloghourssum field.
     *
     * @var        double
     */
    protected $workloghourssum;

    /**
     * The value for the worklogusername field.
     *
     * @var        string
     */
    protected $worklogusername;

    /**
     * The value for the workloglogin field.
     *
     * @var        string
     */
    protected $workloglogin;

    /**
     * The value for the worklogkyear field.
     *
     * @var        int
     */
    protected $worklogkyear;

    /**
     * The value for the worklogmonth field.
     *
     * @var        int
     */
    protected $worklogmonth;

    /**
     * The value for the worklogdatatime field.
     *
     * @var        DateTime
     */
    protected $worklogdatatime;

    /**
     * The value for the worklogyearmonth field.
     *
     * @var        string
     */
    protected $worklogyearmonth;

    /**
     * The value for the worklogage field.
     *
     * @var        int
     */
    protected $worklogage;

    /**
     * The value for the countissues field.
     *
     * @var        int
     */
    protected $countissues;

    /**
     * The value for the countissuespersent field.
     *
     * @var        double
     */
    protected $countissuespersent;

    /**
     * The value for the estimatedhourssubtask field.
     *
     * @var        double
     */
    protected $estimatedhourssubtask;

    /**
     * The value for the remaininghours field.
     *
     * @var        double
     */
    protected $remaininghours;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Initializes internal state of Base\myAnaliticNonBill object.
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
     * Compares this with another <code>myAnaliticNonBill</code> instance.  If
     * <code>obj</code> is an instance of <code>myAnaliticNonBill</code>, delegates to
     * <code>equals(myAnaliticNonBill)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|myAnaliticNonBill The current object, for fluid interface
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
     * Get the [projectname] column value.
     *
     * @return string
     */
    public function getProjectName()
    {
        return $this->projectname;
    }

    /**
     * Get the [issuekey] column value.
     *
     * @return string
     */
    public function getIssueKey()
    {
        return $this->issuekey;
    }

    /**
     * Get the [initialestimate] column value.
     *
     * @return string
     */
    public function getInitialEstimate()
    {
        return $this->initialestimate;
    }

    /**
     * Get the [nonbil] column value.
     *
     * @return string
     */
    public function getNonBil()
    {
        return $this->nonbil;
    }

    /**
     * Get the [assignee] column value.
     *
     * @return string
     */
    public function getAssignee()
    {
        return $this->assignee;
    }

    /**
     * Get the [estimatedhourssum] column value.
     *
     * @return double
     */
    public function getEstimatedHoursSum()
    {
        return $this->estimatedhourssum;
    }

    /**
     * Get the [workloghourssum] column value.
     *
     * @return double
     */
    public function getWorkLogHoursSum()
    {
        return $this->workloghourssum;
    }

    /**
     * Get the [worklogusername] column value.
     *
     * @return string
     */
    public function getWorkLogUserName()
    {
        return $this->worklogusername;
    }

    /**
     * Get the [workloglogin] column value.
     *
     * @return string
     */
    public function getWorkLogLogin()
    {
        return $this->workloglogin;
    }

    /**
     * Get the [worklogkyear] column value.
     *
     * @return int
     */
    public function getWorkLogYear()
    {
        return $this->worklogkyear;
    }

    /**
     * Get the [worklogmonth] column value.
     *
     * @return int
     */
    public function getWorkLogMonth()
    {
        return $this->worklogmonth;
    }

    /**
     * Get the [optionally formatted] temporal [worklogdatatime] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getWorkLogDataTime($format = NULL)
    {
        if ($format === null) {
            return $this->worklogdatatime;
        } else {
            return $this->worklogdatatime instanceof \DateTimeInterface ? $this->worklogdatatime->format($format) : null;
        }
    }

    /**
     * Get the [worklogyearmonth] column value.
     *
     * @return string
     */
    public function getWorkLogYearMonth()
    {
        return $this->worklogyearmonth;
    }

    /**
     * Get the [worklogage] column value.
     *
     * @return int
     */
    public function getWorkLogAge()
    {
        return $this->worklogage;
    }

    /**
     * Get the [countissues] column value.
     *
     * @return int
     */
    public function getCountIssues()
    {
        return $this->countissues;
    }

    /**
     * Get the [countissuespersent] column value.
     *
     * @return double
     */
    public function getCountIssuesPersent()
    {
        return $this->countissuespersent;
    }

    /**
     * Get the [estimatedhourssubtask] column value.
     *
     * @return double
     */
    public function getEstimatedHoursSubTask()
    {
        return $this->estimatedhourssubtask;
    }

    /**
     * Get the [remaininghours] column value.
     *
     * @return double
     */
    public function getRemainingHours()
    {
        return $this->remaininghours;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return $this|\myAnaliticNonBill The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[myAnaliticNonBillTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [projectname] column.
     *
     * @param string $v new value
     * @return $this|\myAnaliticNonBill The current object (for fluent API support)
     */
    public function setProjectName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->projectname !== $v) {
            $this->projectname = $v;
            $this->modifiedColumns[myAnaliticNonBillTableMap::COL_PROJECTNAME] = true;
        }

        return $this;
    } // setProjectName()

    /**
     * Set the value of [issuekey] column.
     *
     * @param string $v new value
     * @return $this|\myAnaliticNonBill The current object (for fluent API support)
     */
    public function setIssueKey($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->issuekey !== $v) {
            $this->issuekey = $v;
            $this->modifiedColumns[myAnaliticNonBillTableMap::COL_ISSUEKEY] = true;
        }

        return $this;
    } // setIssueKey()

    /**
     * Set the value of [initialestimate] column.
     *
     * @param string $v new value
     * @return $this|\myAnaliticNonBill The current object (for fluent API support)
     */
    public function setInitialEstimate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->initialestimate !== $v) {
            $this->initialestimate = $v;
            $this->modifiedColumns[myAnaliticNonBillTableMap::COL_INITIALESTIMATE] = true;
        }

        return $this;
    } // setInitialEstimate()

    /**
     * Set the value of [nonbil] column.
     *
     * @param string $v new value
     * @return $this|\myAnaliticNonBill The current object (for fluent API support)
     */
    public function setNonBil($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->nonbil !== $v) {
            $this->nonbil = $v;
            $this->modifiedColumns[myAnaliticNonBillTableMap::COL_NONBIL] = true;
        }

        return $this;
    } // setNonBil()

    /**
     * Set the value of [assignee] column.
     *
     * @param string $v new value
     * @return $this|\myAnaliticNonBill The current object (for fluent API support)
     */
    public function setAssignee($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->assignee !== $v) {
            $this->assignee = $v;
            $this->modifiedColumns[myAnaliticNonBillTableMap::COL_ASSIGNEE] = true;
        }

        return $this;
    } // setAssignee()

    /**
     * Set the value of [estimatedhourssum] column.
     *
     * @param double $v new value
     * @return $this|\myAnaliticNonBill The current object (for fluent API support)
     */
    public function setEstimatedHoursSum($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->estimatedhourssum !== $v) {
            $this->estimatedhourssum = $v;
            $this->modifiedColumns[myAnaliticNonBillTableMap::COL_ESTIMATEDHOURSSUM] = true;
        }

        return $this;
    } // setEstimatedHoursSum()

    /**
     * Set the value of [workloghourssum] column.
     *
     * @param double $v new value
     * @return $this|\myAnaliticNonBill The current object (for fluent API support)
     */
    public function setWorkLogHoursSum($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->workloghourssum !== $v) {
            $this->workloghourssum = $v;
            $this->modifiedColumns[myAnaliticNonBillTableMap::COL_WORKLOGHOURSSUM] = true;
        }

        return $this;
    } // setWorkLogHoursSum()

    /**
     * Set the value of [worklogusername] column.
     *
     * @param string $v new value
     * @return $this|\myAnaliticNonBill The current object (for fluent API support)
     */
    public function setWorkLogUserName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->worklogusername !== $v) {
            $this->worklogusername = $v;
            $this->modifiedColumns[myAnaliticNonBillTableMap::COL_WORKLOGUSERNAME] = true;
        }

        return $this;
    } // setWorkLogUserName()

    /**
     * Set the value of [workloglogin] column.
     *
     * @param string $v new value
     * @return $this|\myAnaliticNonBill The current object (for fluent API support)
     */
    public function setWorkLogLogin($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->workloglogin !== $v) {
            $this->workloglogin = $v;
            $this->modifiedColumns[myAnaliticNonBillTableMap::COL_WORKLOGLOGIN] = true;
        }

        return $this;
    } // setWorkLogLogin()

    /**
     * Set the value of [worklogkyear] column.
     *
     * @param int $v new value
     * @return $this|\myAnaliticNonBill The current object (for fluent API support)
     */
    public function setWorkLogYear($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->worklogkyear !== $v) {
            $this->worklogkyear = $v;
            $this->modifiedColumns[myAnaliticNonBillTableMap::COL_WORKLOGKYEAR] = true;
        }

        return $this;
    } // setWorkLogYear()

    /**
     * Set the value of [worklogmonth] column.
     *
     * @param int $v new value
     * @return $this|\myAnaliticNonBill The current object (for fluent API support)
     */
    public function setWorkLogMonth($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->worklogmonth !== $v) {
            $this->worklogmonth = $v;
            $this->modifiedColumns[myAnaliticNonBillTableMap::COL_WORKLOGMONTH] = true;
        }

        return $this;
    } // setWorkLogMonth()

    /**
     * Sets the value of [worklogdatatime] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\myAnaliticNonBill The current object (for fluent API support)
     */
    public function setWorkLogDataTime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->worklogdatatime !== null || $dt !== null) {
            if ($this->worklogdatatime === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->worklogdatatime->format("Y-m-d H:i:s.u")) {
                $this->worklogdatatime = $dt === null ? null : clone $dt;
                $this->modifiedColumns[myAnaliticNonBillTableMap::COL_WORKLOGDATATIME] = true;
            }
        } // if either are not null

        return $this;
    } // setWorkLogDataTime()

    /**
     * Set the value of [worklogyearmonth] column.
     *
     * @param string $v new value
     * @return $this|\myAnaliticNonBill The current object (for fluent API support)
     */
    public function setWorkLogYearMonth($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->worklogyearmonth !== $v) {
            $this->worklogyearmonth = $v;
            $this->modifiedColumns[myAnaliticNonBillTableMap::COL_WORKLOGYEARMONTH] = true;
        }

        return $this;
    } // setWorkLogYearMonth()

    /**
     * Set the value of [worklogage] column.
     *
     * @param int $v new value
     * @return $this|\myAnaliticNonBill The current object (for fluent API support)
     */
    public function setWorkLogAge($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->worklogage !== $v) {
            $this->worklogage = $v;
            $this->modifiedColumns[myAnaliticNonBillTableMap::COL_WORKLOGAGE] = true;
        }

        return $this;
    } // setWorkLogAge()

    /**
     * Set the value of [countissues] column.
     *
     * @param int $v new value
     * @return $this|\myAnaliticNonBill The current object (for fluent API support)
     */
    public function setCountIssues($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->countissues !== $v) {
            $this->countissues = $v;
            $this->modifiedColumns[myAnaliticNonBillTableMap::COL_COUNTISSUES] = true;
        }

        return $this;
    } // setCountIssues()

    /**
     * Set the value of [countissuespersent] column.
     *
     * @param double $v new value
     * @return $this|\myAnaliticNonBill The current object (for fluent API support)
     */
    public function setCountIssuesPersent($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->countissuespersent !== $v) {
            $this->countissuespersent = $v;
            $this->modifiedColumns[myAnaliticNonBillTableMap::COL_COUNTISSUESPERSENT] = true;
        }

        return $this;
    } // setCountIssuesPersent()

    /**
     * Set the value of [estimatedhourssubtask] column.
     *
     * @param double $v new value
     * @return $this|\myAnaliticNonBill The current object (for fluent API support)
     */
    public function setEstimatedHoursSubTask($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->estimatedhourssubtask !== $v) {
            $this->estimatedhourssubtask = $v;
            $this->modifiedColumns[myAnaliticNonBillTableMap::COL_ESTIMATEDHOURSSUBTASK] = true;
        }

        return $this;
    } // setEstimatedHoursSubTask()

    /**
     * Set the value of [remaininghours] column.
     *
     * @param double $v new value
     * @return $this|\myAnaliticNonBill The current object (for fluent API support)
     */
    public function setRemainingHours($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->remaininghours !== $v) {
            $this->remaininghours = $v;
            $this->modifiedColumns[myAnaliticNonBillTableMap::COL_REMAININGHOURS] = true;
        }

        return $this;
    } // setRemainingHours()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : myAnaliticNonBillTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : myAnaliticNonBillTableMap::translateFieldName('ProjectName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->projectname = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : myAnaliticNonBillTableMap::translateFieldName('IssueKey', TableMap::TYPE_PHPNAME, $indexType)];
            $this->issuekey = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : myAnaliticNonBillTableMap::translateFieldName('InitialEstimate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->initialestimate = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : myAnaliticNonBillTableMap::translateFieldName('NonBil', TableMap::TYPE_PHPNAME, $indexType)];
            $this->nonbil = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : myAnaliticNonBillTableMap::translateFieldName('Assignee', TableMap::TYPE_PHPNAME, $indexType)];
            $this->assignee = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : myAnaliticNonBillTableMap::translateFieldName('EstimatedHoursSum', TableMap::TYPE_PHPNAME, $indexType)];
            $this->estimatedhourssum = (null !== $col) ? (double) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : myAnaliticNonBillTableMap::translateFieldName('WorkLogHoursSum', TableMap::TYPE_PHPNAME, $indexType)];
            $this->workloghourssum = (null !== $col) ? (double) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : myAnaliticNonBillTableMap::translateFieldName('WorkLogUserName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->worklogusername = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : myAnaliticNonBillTableMap::translateFieldName('WorkLogLogin', TableMap::TYPE_PHPNAME, $indexType)];
            $this->workloglogin = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : myAnaliticNonBillTableMap::translateFieldName('WorkLogYear', TableMap::TYPE_PHPNAME, $indexType)];
            $this->worklogkyear = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : myAnaliticNonBillTableMap::translateFieldName('WorkLogMonth', TableMap::TYPE_PHPNAME, $indexType)];
            $this->worklogmonth = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : myAnaliticNonBillTableMap::translateFieldName('WorkLogDataTime', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->worklogdatatime = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : myAnaliticNonBillTableMap::translateFieldName('WorkLogYearMonth', TableMap::TYPE_PHPNAME, $indexType)];
            $this->worklogyearmonth = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : myAnaliticNonBillTableMap::translateFieldName('WorkLogAge', TableMap::TYPE_PHPNAME, $indexType)];
            $this->worklogage = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : myAnaliticNonBillTableMap::translateFieldName('CountIssues', TableMap::TYPE_PHPNAME, $indexType)];
            $this->countissues = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : myAnaliticNonBillTableMap::translateFieldName('CountIssuesPersent', TableMap::TYPE_PHPNAME, $indexType)];
            $this->countissuespersent = (null !== $col) ? (double) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : myAnaliticNonBillTableMap::translateFieldName('EstimatedHoursSubTask', TableMap::TYPE_PHPNAME, $indexType)];
            $this->estimatedhourssubtask = (null !== $col) ? (double) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : myAnaliticNonBillTableMap::translateFieldName('RemainingHours', TableMap::TYPE_PHPNAME, $indexType)];
            $this->remaininghours = (null !== $col) ? (double) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 19; // 19 = myAnaliticNonBillTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\myAnaliticNonBill'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(myAnaliticNonBillTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildmyAnaliticNonBillQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see myAnaliticNonBill::setDeleted()
     * @see myAnaliticNonBill::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(myAnaliticNonBillTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildmyAnaliticNonBillQuery::create()
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

        if ($this->alreadyInSave) {
            return 0;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(myAnaliticNonBillTableMap::DATABASE_NAME);
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
                myAnaliticNonBillTableMap::addInstanceToPool($this);
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

        $this->modifiedColumns[myAnaliticNonBillTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . myAnaliticNonBillTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(myAnaliticNonBillTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(myAnaliticNonBillTableMap::COL_PROJECTNAME)) {
            $modifiedColumns[':p' . $index++]  = 'projectname';
        }
        if ($this->isColumnModified(myAnaliticNonBillTableMap::COL_ISSUEKEY)) {
            $modifiedColumns[':p' . $index++]  = 'issuekey';
        }
        if ($this->isColumnModified(myAnaliticNonBillTableMap::COL_INITIALESTIMATE)) {
            $modifiedColumns[':p' . $index++]  = 'initialestimate';
        }
        if ($this->isColumnModified(myAnaliticNonBillTableMap::COL_NONBIL)) {
            $modifiedColumns[':p' . $index++]  = 'nonbil';
        }
        if ($this->isColumnModified(myAnaliticNonBillTableMap::COL_ASSIGNEE)) {
            $modifiedColumns[':p' . $index++]  = 'assignee';
        }
        if ($this->isColumnModified(myAnaliticNonBillTableMap::COL_ESTIMATEDHOURSSUM)) {
            $modifiedColumns[':p' . $index++]  = 'estimatedhourssum';
        }
        if ($this->isColumnModified(myAnaliticNonBillTableMap::COL_WORKLOGHOURSSUM)) {
            $modifiedColumns[':p' . $index++]  = 'workloghourssum';
        }
        if ($this->isColumnModified(myAnaliticNonBillTableMap::COL_WORKLOGUSERNAME)) {
            $modifiedColumns[':p' . $index++]  = 'worklogusername';
        }
        if ($this->isColumnModified(myAnaliticNonBillTableMap::COL_WORKLOGLOGIN)) {
            $modifiedColumns[':p' . $index++]  = 'workloglogin';
        }
        if ($this->isColumnModified(myAnaliticNonBillTableMap::COL_WORKLOGKYEAR)) {
            $modifiedColumns[':p' . $index++]  = 'worklogkyear';
        }
        if ($this->isColumnModified(myAnaliticNonBillTableMap::COL_WORKLOGMONTH)) {
            $modifiedColumns[':p' . $index++]  = 'worklogmonth';
        }
        if ($this->isColumnModified(myAnaliticNonBillTableMap::COL_WORKLOGDATATIME)) {
            $modifiedColumns[':p' . $index++]  = 'worklogdatatime';
        }
        if ($this->isColumnModified(myAnaliticNonBillTableMap::COL_WORKLOGYEARMONTH)) {
            $modifiedColumns[':p' . $index++]  = 'worklogyearmonth';
        }
        if ($this->isColumnModified(myAnaliticNonBillTableMap::COL_WORKLOGAGE)) {
            $modifiedColumns[':p' . $index++]  = 'worklogage';
        }
        if ($this->isColumnModified(myAnaliticNonBillTableMap::COL_COUNTISSUES)) {
            $modifiedColumns[':p' . $index++]  = 'countissues';
        }
        if ($this->isColumnModified(myAnaliticNonBillTableMap::COL_COUNTISSUESPERSENT)) {
            $modifiedColumns[':p' . $index++]  = 'countissuespersent';
        }
        if ($this->isColumnModified(myAnaliticNonBillTableMap::COL_ESTIMATEDHOURSSUBTASK)) {
            $modifiedColumns[':p' . $index++]  = 'estimatedhourssubtask';
        }
        if ($this->isColumnModified(myAnaliticNonBillTableMap::COL_REMAININGHOURS)) {
            $modifiedColumns[':p' . $index++]  = 'remaininghours';
        }

        $sql = sprintf(
            'INSERT INTO myanaliticnonbill (%s) VALUES (%s)',
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
                    case 'projectname':
                        $stmt->bindValue($identifier, $this->projectname, PDO::PARAM_STR);
                        break;
                    case 'issuekey':
                        $stmt->bindValue($identifier, $this->issuekey, PDO::PARAM_STR);
                        break;
                    case 'initialestimate':
                        $stmt->bindValue($identifier, $this->initialestimate, PDO::PARAM_STR);
                        break;
                    case 'nonbil':
                        $stmt->bindValue($identifier, $this->nonbil, PDO::PARAM_STR);
                        break;
                    case 'assignee':
                        $stmt->bindValue($identifier, $this->assignee, PDO::PARAM_STR);
                        break;
                    case 'estimatedhourssum':
                        $stmt->bindValue($identifier, $this->estimatedhourssum, PDO::PARAM_STR);
                        break;
                    case 'workloghourssum':
                        $stmt->bindValue($identifier, $this->workloghourssum, PDO::PARAM_STR);
                        break;
                    case 'worklogusername':
                        $stmt->bindValue($identifier, $this->worklogusername, PDO::PARAM_STR);
                        break;
                    case 'workloglogin':
                        $stmt->bindValue($identifier, $this->workloglogin, PDO::PARAM_STR);
                        break;
                    case 'worklogkyear':
                        $stmt->bindValue($identifier, $this->worklogkyear, PDO::PARAM_INT);
                        break;
                    case 'worklogmonth':
                        $stmt->bindValue($identifier, $this->worklogmonth, PDO::PARAM_INT);
                        break;
                    case 'worklogdatatime':
                        $stmt->bindValue($identifier, $this->worklogdatatime ? $this->worklogdatatime->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'worklogyearmonth':
                        $stmt->bindValue($identifier, $this->worklogyearmonth, PDO::PARAM_STR);
                        break;
                    case 'worklogage':
                        $stmt->bindValue($identifier, $this->worklogage, PDO::PARAM_INT);
                        break;
                    case 'countissues':
                        $stmt->bindValue($identifier, $this->countissues, PDO::PARAM_INT);
                        break;
                    case 'countissuespersent':
                        $stmt->bindValue($identifier, $this->countissuespersent, PDO::PARAM_STR);
                        break;
                    case 'estimatedhourssubtask':
                        $stmt->bindValue($identifier, $this->estimatedhourssubtask, PDO::PARAM_STR);
                        break;
                    case 'remaininghours':
                        $stmt->bindValue($identifier, $this->remaininghours, PDO::PARAM_STR);
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
        $pos = myAnaliticNonBillTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getProjectName();
                break;
            case 2:
                return $this->getIssueKey();
                break;
            case 3:
                return $this->getInitialEstimate();
                break;
            case 4:
                return $this->getNonBil();
                break;
            case 5:
                return $this->getAssignee();
                break;
            case 6:
                return $this->getEstimatedHoursSum();
                break;
            case 7:
                return $this->getWorkLogHoursSum();
                break;
            case 8:
                return $this->getWorkLogUserName();
                break;
            case 9:
                return $this->getWorkLogLogin();
                break;
            case 10:
                return $this->getWorkLogYear();
                break;
            case 11:
                return $this->getWorkLogMonth();
                break;
            case 12:
                return $this->getWorkLogDataTime();
                break;
            case 13:
                return $this->getWorkLogYearMonth();
                break;
            case 14:
                return $this->getWorkLogAge();
                break;
            case 15:
                return $this->getCountIssues();
                break;
            case 16:
                return $this->getCountIssuesPersent();
                break;
            case 17:
                return $this->getEstimatedHoursSubTask();
                break;
            case 18:
                return $this->getRemainingHours();
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

        if (isset($alreadyDumpedObjects['myAnaliticNonBill'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['myAnaliticNonBill'][$this->hashCode()] = true;
        $keys = myAnaliticNonBillTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getProjectName(),
            $keys[2] => $this->getIssueKey(),
            $keys[3] => $this->getInitialEstimate(),
            $keys[4] => $this->getNonBil(),
            $keys[5] => $this->getAssignee(),
            $keys[6] => $this->getEstimatedHoursSum(),
            $keys[7] => $this->getWorkLogHoursSum(),
            $keys[8] => $this->getWorkLogUserName(),
            $keys[9] => $this->getWorkLogLogin(),
            $keys[10] => $this->getWorkLogYear(),
            $keys[11] => $this->getWorkLogMonth(),
            $keys[12] => $this->getWorkLogDataTime(),
            $keys[13] => $this->getWorkLogYearMonth(),
            $keys[14] => $this->getWorkLogAge(),
            $keys[15] => $this->getCountIssues(),
            $keys[16] => $this->getCountIssuesPersent(),
            $keys[17] => $this->getEstimatedHoursSubTask(),
            $keys[18] => $this->getRemainingHours(),
        );
        if ($result[$keys[12]] instanceof \DateTime) {
            $result[$keys[12]] = $result[$keys[12]]->format('c');
        }

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
     * @return $this|\myAnaliticNonBill
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = myAnaliticNonBillTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\myAnaliticNonBill
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setProjectName($value);
                break;
            case 2:
                $this->setIssueKey($value);
                break;
            case 3:
                $this->setInitialEstimate($value);
                break;
            case 4:
                $this->setNonBil($value);
                break;
            case 5:
                $this->setAssignee($value);
                break;
            case 6:
                $this->setEstimatedHoursSum($value);
                break;
            case 7:
                $this->setWorkLogHoursSum($value);
                break;
            case 8:
                $this->setWorkLogUserName($value);
                break;
            case 9:
                $this->setWorkLogLogin($value);
                break;
            case 10:
                $this->setWorkLogYear($value);
                break;
            case 11:
                $this->setWorkLogMonth($value);
                break;
            case 12:
                $this->setWorkLogDataTime($value);
                break;
            case 13:
                $this->setWorkLogYearMonth($value);
                break;
            case 14:
                $this->setWorkLogAge($value);
                break;
            case 15:
                $this->setCountIssues($value);
                break;
            case 16:
                $this->setCountIssuesPersent($value);
                break;
            case 17:
                $this->setEstimatedHoursSubTask($value);
                break;
            case 18:
                $this->setRemainingHours($value);
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
        $keys = myAnaliticNonBillTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setProjectName($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setIssueKey($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setInitialEstimate($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setNonBil($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setAssignee($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setEstimatedHoursSum($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setWorkLogHoursSum($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setWorkLogUserName($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setWorkLogLogin($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setWorkLogYear($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setWorkLogMonth($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setWorkLogDataTime($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setWorkLogYearMonth($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setWorkLogAge($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setCountIssues($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setCountIssuesPersent($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setEstimatedHoursSubTask($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setRemainingHours($arr[$keys[18]]);
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
     * @return $this|\myAnaliticNonBill The current object, for fluid interface
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
        $criteria = new Criteria(myAnaliticNonBillTableMap::DATABASE_NAME);

        if ($this->isColumnModified(myAnaliticNonBillTableMap::COL_ID)) {
            $criteria->add(myAnaliticNonBillTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(myAnaliticNonBillTableMap::COL_PROJECTNAME)) {
            $criteria->add(myAnaliticNonBillTableMap::COL_PROJECTNAME, $this->projectname);
        }
        if ($this->isColumnModified(myAnaliticNonBillTableMap::COL_ISSUEKEY)) {
            $criteria->add(myAnaliticNonBillTableMap::COL_ISSUEKEY, $this->issuekey);
        }
        if ($this->isColumnModified(myAnaliticNonBillTableMap::COL_INITIALESTIMATE)) {
            $criteria->add(myAnaliticNonBillTableMap::COL_INITIALESTIMATE, $this->initialestimate);
        }
        if ($this->isColumnModified(myAnaliticNonBillTableMap::COL_NONBIL)) {
            $criteria->add(myAnaliticNonBillTableMap::COL_NONBIL, $this->nonbil);
        }
        if ($this->isColumnModified(myAnaliticNonBillTableMap::COL_ASSIGNEE)) {
            $criteria->add(myAnaliticNonBillTableMap::COL_ASSIGNEE, $this->assignee);
        }
        if ($this->isColumnModified(myAnaliticNonBillTableMap::COL_ESTIMATEDHOURSSUM)) {
            $criteria->add(myAnaliticNonBillTableMap::COL_ESTIMATEDHOURSSUM, $this->estimatedhourssum);
        }
        if ($this->isColumnModified(myAnaliticNonBillTableMap::COL_WORKLOGHOURSSUM)) {
            $criteria->add(myAnaliticNonBillTableMap::COL_WORKLOGHOURSSUM, $this->workloghourssum);
        }
        if ($this->isColumnModified(myAnaliticNonBillTableMap::COL_WORKLOGUSERNAME)) {
            $criteria->add(myAnaliticNonBillTableMap::COL_WORKLOGUSERNAME, $this->worklogusername);
        }
        if ($this->isColumnModified(myAnaliticNonBillTableMap::COL_WORKLOGLOGIN)) {
            $criteria->add(myAnaliticNonBillTableMap::COL_WORKLOGLOGIN, $this->workloglogin);
        }
        if ($this->isColumnModified(myAnaliticNonBillTableMap::COL_WORKLOGKYEAR)) {
            $criteria->add(myAnaliticNonBillTableMap::COL_WORKLOGKYEAR, $this->worklogkyear);
        }
        if ($this->isColumnModified(myAnaliticNonBillTableMap::COL_WORKLOGMONTH)) {
            $criteria->add(myAnaliticNonBillTableMap::COL_WORKLOGMONTH, $this->worklogmonth);
        }
        if ($this->isColumnModified(myAnaliticNonBillTableMap::COL_WORKLOGDATATIME)) {
            $criteria->add(myAnaliticNonBillTableMap::COL_WORKLOGDATATIME, $this->worklogdatatime);
        }
        if ($this->isColumnModified(myAnaliticNonBillTableMap::COL_WORKLOGYEARMONTH)) {
            $criteria->add(myAnaliticNonBillTableMap::COL_WORKLOGYEARMONTH, $this->worklogyearmonth);
        }
        if ($this->isColumnModified(myAnaliticNonBillTableMap::COL_WORKLOGAGE)) {
            $criteria->add(myAnaliticNonBillTableMap::COL_WORKLOGAGE, $this->worklogage);
        }
        if ($this->isColumnModified(myAnaliticNonBillTableMap::COL_COUNTISSUES)) {
            $criteria->add(myAnaliticNonBillTableMap::COL_COUNTISSUES, $this->countissues);
        }
        if ($this->isColumnModified(myAnaliticNonBillTableMap::COL_COUNTISSUESPERSENT)) {
            $criteria->add(myAnaliticNonBillTableMap::COL_COUNTISSUESPERSENT, $this->countissuespersent);
        }
        if ($this->isColumnModified(myAnaliticNonBillTableMap::COL_ESTIMATEDHOURSSUBTASK)) {
            $criteria->add(myAnaliticNonBillTableMap::COL_ESTIMATEDHOURSSUBTASK, $this->estimatedhourssubtask);
        }
        if ($this->isColumnModified(myAnaliticNonBillTableMap::COL_REMAININGHOURS)) {
            $criteria->add(myAnaliticNonBillTableMap::COL_REMAININGHOURS, $this->remaininghours);
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
        $criteria = ChildmyAnaliticNonBillQuery::create();
        $criteria->add(myAnaliticNonBillTableMap::COL_ID, $this->id);

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
     * @param      object $copyObj An object of \myAnaliticNonBill (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setProjectName($this->getProjectName());
        $copyObj->setIssueKey($this->getIssueKey());
        $copyObj->setInitialEstimate($this->getInitialEstimate());
        $copyObj->setNonBil($this->getNonBil());
        $copyObj->setAssignee($this->getAssignee());
        $copyObj->setEstimatedHoursSum($this->getEstimatedHoursSum());
        $copyObj->setWorkLogHoursSum($this->getWorkLogHoursSum());
        $copyObj->setWorkLogUserName($this->getWorkLogUserName());
        $copyObj->setWorkLogLogin($this->getWorkLogLogin());
        $copyObj->setWorkLogYear($this->getWorkLogYear());
        $copyObj->setWorkLogMonth($this->getWorkLogMonth());
        $copyObj->setWorkLogDataTime($this->getWorkLogDataTime());
        $copyObj->setWorkLogYearMonth($this->getWorkLogYearMonth());
        $copyObj->setWorkLogAge($this->getWorkLogAge());
        $copyObj->setCountIssues($this->getCountIssues());
        $copyObj->setCountIssuesPersent($this->getCountIssuesPersent());
        $copyObj->setEstimatedHoursSubTask($this->getEstimatedHoursSubTask());
        $copyObj->setRemainingHours($this->getRemainingHours());
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
     * @return \myAnaliticNonBill Clone of current object.
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
        $this->projectname = null;
        $this->issuekey = null;
        $this->initialestimate = null;
        $this->nonbil = null;
        $this->assignee = null;
        $this->estimatedhourssum = null;
        $this->workloghourssum = null;
        $this->worklogusername = null;
        $this->workloglogin = null;
        $this->worklogkyear = null;
        $this->worklogmonth = null;
        $this->worklogdatatime = null;
        $this->worklogyearmonth = null;
        $this->worklogage = null;
        $this->countissues = null;
        $this->countissuespersent = null;
        $this->estimatedhourssubtask = null;
        $this->remaininghours = null;
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
        return (string) $this->exportTo(myAnaliticNonBillTableMap::DEFAULT_STRING_FORMAT);
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
