<?php

namespace Map;

use \myAnaliticNonBill;
use \myAnaliticNonBillQuery;
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
 * This class defines the structure of the 'myanaliticnonbill' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class myAnaliticNonBillTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.myAnaliticNonBillTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'kpidata';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'myanaliticnonbill';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\myAnaliticNonBill';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'myAnaliticNonBill';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 19;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 19;

    /**
     * the column name for the id field
     */
    const COL_ID = 'myanaliticnonbill.id';

    /**
     * the column name for the projectname field
     */
    const COL_PROJECTNAME = 'myanaliticnonbill.projectname';

    /**
     * the column name for the issuekey field
     */
    const COL_ISSUEKEY = 'myanaliticnonbill.issuekey';

    /**
     * the column name for the initialestimate field
     */
    const COL_INITIALESTIMATE = 'myanaliticnonbill.initialestimate';

    /**
     * the column name for the nonbil field
     */
    const COL_NONBIL = 'myanaliticnonbill.nonbil';

    /**
     * the column name for the assignee field
     */
    const COL_ASSIGNEE = 'myanaliticnonbill.assignee';

    /**
     * the column name for the estimatedhourssum field
     */
    const COL_ESTIMATEDHOURSSUM = 'myanaliticnonbill.estimatedhourssum';

    /**
     * the column name for the workloghourssum field
     */
    const COL_WORKLOGHOURSSUM = 'myanaliticnonbill.workloghourssum';

    /**
     * the column name for the worklogusername field
     */
    const COL_WORKLOGUSERNAME = 'myanaliticnonbill.worklogusername';

    /**
     * the column name for the worklogkyear field
     */
    const COL_WORKLOGKYEAR = 'myanaliticnonbill.worklogkyear';

    /**
     * the column name for the worklogmonth field
     */
    const COL_WORKLOGMONTH = 'myanaliticnonbill.worklogmonth';

    /**
     * the column name for the worklogdatatime field
     */
    const COL_WORKLOGDATATIME = 'myanaliticnonbill.worklogdatatime';

    /**
     * the column name for the worklogyearmonth field
     */
    const COL_WORKLOGYEARMONTH = 'myanaliticnonbill.worklogyearmonth';

    /**
     * the column name for the worklogage field
     */
    const COL_WORKLOGAGE = 'myanaliticnonbill.worklogage';

    /**
     * the column name for the countissues field
     */
    const COL_COUNTISSUES = 'myanaliticnonbill.countissues';

    /**
     * the column name for the countissuespersent field
     */
    const COL_COUNTISSUESPERSENT = 'myanaliticnonbill.countissuespersent';

    /**
     * the column name for the estimatedhourssubtask field
     */
    const COL_ESTIMATEDHOURSSUBTASK = 'myanaliticnonbill.estimatedhourssubtask';

    /**
     * the column name for the logedhours field
     */
    const COL_LOGEDHOURS = 'myanaliticnonbill.logedhours';

    /**
     * the column name for the remaininghours field
     */
    const COL_REMAININGHOURS = 'myanaliticnonbill.remaininghours';

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
        self::TYPE_PHPNAME       => array('Id', 'ProjectName', 'IssueKey', 'InitialEstimate', 'NonBil', 'Assignee', 'EstimatedHoursSum', 'WorkLogHoursSum', 'WorkLogUserName', 'WorkLogYear', 'WorkLogMonth', 'WorkLogDataTime', 'WorkLogYearMonth', 'WorkLogAge', 'CountIssues', 'CountIssuesPersent', 'EstimatedHoursSubTask', 'LogedHours', 'RemainingHours', ),
        self::TYPE_CAMELNAME     => array('id', 'projectName', 'issueKey', 'initialEstimate', 'nonBil', 'assignee', 'estimatedHoursSum', 'workLogHoursSum', 'workLogUserName', 'workLogYear', 'workLogMonth', 'workLogDataTime', 'workLogYearMonth', 'workLogAge', 'countIssues', 'countIssuesPersent', 'estimatedHoursSubTask', 'logedHours', 'remainingHours', ),
        self::TYPE_COLNAME       => array(myAnaliticNonBillTableMap::COL_ID, myAnaliticNonBillTableMap::COL_PROJECTNAME, myAnaliticNonBillTableMap::COL_ISSUEKEY, myAnaliticNonBillTableMap::COL_INITIALESTIMATE, myAnaliticNonBillTableMap::COL_NONBIL, myAnaliticNonBillTableMap::COL_ASSIGNEE, myAnaliticNonBillTableMap::COL_ESTIMATEDHOURSSUM, myAnaliticNonBillTableMap::COL_WORKLOGHOURSSUM, myAnaliticNonBillTableMap::COL_WORKLOGUSERNAME, myAnaliticNonBillTableMap::COL_WORKLOGKYEAR, myAnaliticNonBillTableMap::COL_WORKLOGMONTH, myAnaliticNonBillTableMap::COL_WORKLOGDATATIME, myAnaliticNonBillTableMap::COL_WORKLOGYEARMONTH, myAnaliticNonBillTableMap::COL_WORKLOGAGE, myAnaliticNonBillTableMap::COL_COUNTISSUES, myAnaliticNonBillTableMap::COL_COUNTISSUESPERSENT, myAnaliticNonBillTableMap::COL_ESTIMATEDHOURSSUBTASK, myAnaliticNonBillTableMap::COL_LOGEDHOURS, myAnaliticNonBillTableMap::COL_REMAININGHOURS, ),
        self::TYPE_FIELDNAME     => array('id', 'projectname', 'issuekey', 'initialestimate', 'nonbil', 'assignee', 'estimatedhourssum', 'workloghourssum', 'worklogusername', 'worklogkyear', 'worklogmonth', 'worklogdatatime', 'worklogyearmonth', 'worklogage', 'countissues', 'countissuespersent', 'estimatedhourssubtask', 'logedhours', 'remaininghours', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'ProjectName' => 1, 'IssueKey' => 2, 'InitialEstimate' => 3, 'NonBil' => 4, 'Assignee' => 5, 'EstimatedHoursSum' => 6, 'WorkLogHoursSum' => 7, 'WorkLogUserName' => 8, 'WorkLogYear' => 9, 'WorkLogMonth' => 10, 'WorkLogDataTime' => 11, 'WorkLogYearMonth' => 12, 'WorkLogAge' => 13, 'CountIssues' => 14, 'CountIssuesPersent' => 15, 'EstimatedHoursSubTask' => 16, 'LogedHours' => 17, 'RemainingHours' => 18, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'projectName' => 1, 'issueKey' => 2, 'initialEstimate' => 3, 'nonBil' => 4, 'assignee' => 5, 'estimatedHoursSum' => 6, 'workLogHoursSum' => 7, 'workLogUserName' => 8, 'workLogYear' => 9, 'workLogMonth' => 10, 'workLogDataTime' => 11, 'workLogYearMonth' => 12, 'workLogAge' => 13, 'countIssues' => 14, 'countIssuesPersent' => 15, 'estimatedHoursSubTask' => 16, 'logedHours' => 17, 'remainingHours' => 18, ),
        self::TYPE_COLNAME       => array(myAnaliticNonBillTableMap::COL_ID => 0, myAnaliticNonBillTableMap::COL_PROJECTNAME => 1, myAnaliticNonBillTableMap::COL_ISSUEKEY => 2, myAnaliticNonBillTableMap::COL_INITIALESTIMATE => 3, myAnaliticNonBillTableMap::COL_NONBIL => 4, myAnaliticNonBillTableMap::COL_ASSIGNEE => 5, myAnaliticNonBillTableMap::COL_ESTIMATEDHOURSSUM => 6, myAnaliticNonBillTableMap::COL_WORKLOGHOURSSUM => 7, myAnaliticNonBillTableMap::COL_WORKLOGUSERNAME => 8, myAnaliticNonBillTableMap::COL_WORKLOGKYEAR => 9, myAnaliticNonBillTableMap::COL_WORKLOGMONTH => 10, myAnaliticNonBillTableMap::COL_WORKLOGDATATIME => 11, myAnaliticNonBillTableMap::COL_WORKLOGYEARMONTH => 12, myAnaliticNonBillTableMap::COL_WORKLOGAGE => 13, myAnaliticNonBillTableMap::COL_COUNTISSUES => 14, myAnaliticNonBillTableMap::COL_COUNTISSUESPERSENT => 15, myAnaliticNonBillTableMap::COL_ESTIMATEDHOURSSUBTASK => 16, myAnaliticNonBillTableMap::COL_LOGEDHOURS => 17, myAnaliticNonBillTableMap::COL_REMAININGHOURS => 18, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'projectname' => 1, 'issuekey' => 2, 'initialestimate' => 3, 'nonbil' => 4, 'assignee' => 5, 'estimatedhourssum' => 6, 'workloghourssum' => 7, 'worklogusername' => 8, 'worklogkyear' => 9, 'worklogmonth' => 10, 'worklogdatatime' => 11, 'worklogyearmonth' => 12, 'worklogage' => 13, 'countissues' => 14, 'countissuespersent' => 15, 'estimatedhourssubtask' => 16, 'logedhours' => 17, 'remaininghours' => 18, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
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
        $this->setName('myanaliticnonbill');
        $this->setPhpName('myAnaliticNonBill');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\myAnaliticNonBill');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('projectname', 'ProjectName', 'VARCHAR', false, 128, null);
        $this->addColumn('issuekey', 'IssueKey', 'VARCHAR', false, 128, null);
        $this->addColumn('initialestimate', 'InitialEstimate', 'VARCHAR', false, 128, null);
        $this->addColumn('nonbil', 'NonBil', 'VARCHAR', false, 24, null);
        $this->addColumn('assignee', 'Assignee', 'VARCHAR', false, 128, null);
        $this->addColumn('estimatedhourssum', 'EstimatedHoursSum', 'DOUBLE', false, null, null);
        $this->addColumn('workloghourssum', 'WorkLogHoursSum', 'DOUBLE', false, null, null);
        $this->addColumn('worklogusername', 'WorkLogUserName', 'VARCHAR', false, 128, null);
        $this->addColumn('worklogkyear', 'WorkLogYear', 'INTEGER', false, null, null);
        $this->addColumn('worklogmonth', 'WorkLogMonth', 'VARCHAR', false, 128, null);
        $this->addColumn('worklogdatatime', 'WorkLogDataTime', 'DATE', false, null, null);
        $this->addColumn('worklogyearmonth', 'WorkLogYearMonth', 'VARCHAR', false, 128, null);
        $this->addColumn('worklogage', 'WorkLogAge', 'INTEGER', false, null, null);
        $this->addColumn('countissues', 'CountIssues', 'INTEGER', false, null, null);
        $this->addColumn('countissuespersent', 'CountIssuesPersent', 'DOUBLE', false, null, null);
        $this->addColumn('estimatedhourssubtask', 'EstimatedHoursSubTask', 'DOUBLE', false, null, null);
        $this->addColumn('logedhours', 'LogedHours', 'DOUBLE', false, null, null);
        $this->addColumn('remaininghours', 'RemainingHours', 'DOUBLE', false, null, null);
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
        return $withPrefix ? myAnaliticNonBillTableMap::CLASS_DEFAULT : myAnaliticNonBillTableMap::OM_CLASS;
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
     * @return array           (myAnaliticNonBill object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = myAnaliticNonBillTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = myAnaliticNonBillTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + myAnaliticNonBillTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = myAnaliticNonBillTableMap::OM_CLASS;
            /** @var myAnaliticNonBill $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            myAnaliticNonBillTableMap::addInstanceToPool($obj, $key);
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
            $key = myAnaliticNonBillTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = myAnaliticNonBillTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var myAnaliticNonBill $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                myAnaliticNonBillTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(myAnaliticNonBillTableMap::COL_ID);
            $criteria->addSelectColumn(myAnaliticNonBillTableMap::COL_PROJECTNAME);
            $criteria->addSelectColumn(myAnaliticNonBillTableMap::COL_ISSUEKEY);
            $criteria->addSelectColumn(myAnaliticNonBillTableMap::COL_INITIALESTIMATE);
            $criteria->addSelectColumn(myAnaliticNonBillTableMap::COL_NONBIL);
            $criteria->addSelectColumn(myAnaliticNonBillTableMap::COL_ASSIGNEE);
            $criteria->addSelectColumn(myAnaliticNonBillTableMap::COL_ESTIMATEDHOURSSUM);
            $criteria->addSelectColumn(myAnaliticNonBillTableMap::COL_WORKLOGHOURSSUM);
            $criteria->addSelectColumn(myAnaliticNonBillTableMap::COL_WORKLOGUSERNAME);
            $criteria->addSelectColumn(myAnaliticNonBillTableMap::COL_WORKLOGKYEAR);
            $criteria->addSelectColumn(myAnaliticNonBillTableMap::COL_WORKLOGMONTH);
            $criteria->addSelectColumn(myAnaliticNonBillTableMap::COL_WORKLOGDATATIME);
            $criteria->addSelectColumn(myAnaliticNonBillTableMap::COL_WORKLOGYEARMONTH);
            $criteria->addSelectColumn(myAnaliticNonBillTableMap::COL_WORKLOGAGE);
            $criteria->addSelectColumn(myAnaliticNonBillTableMap::COL_COUNTISSUES);
            $criteria->addSelectColumn(myAnaliticNonBillTableMap::COL_COUNTISSUESPERSENT);
            $criteria->addSelectColumn(myAnaliticNonBillTableMap::COL_ESTIMATEDHOURSSUBTASK);
            $criteria->addSelectColumn(myAnaliticNonBillTableMap::COL_LOGEDHOURS);
            $criteria->addSelectColumn(myAnaliticNonBillTableMap::COL_REMAININGHOURS);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.projectname');
            $criteria->addSelectColumn($alias . '.issuekey');
            $criteria->addSelectColumn($alias . '.initialestimate');
            $criteria->addSelectColumn($alias . '.nonbil');
            $criteria->addSelectColumn($alias . '.assignee');
            $criteria->addSelectColumn($alias . '.estimatedhourssum');
            $criteria->addSelectColumn($alias . '.workloghourssum');
            $criteria->addSelectColumn($alias . '.worklogusername');
            $criteria->addSelectColumn($alias . '.worklogkyear');
            $criteria->addSelectColumn($alias . '.worklogmonth');
            $criteria->addSelectColumn($alias . '.worklogdatatime');
            $criteria->addSelectColumn($alias . '.worklogyearmonth');
            $criteria->addSelectColumn($alias . '.worklogage');
            $criteria->addSelectColumn($alias . '.countissues');
            $criteria->addSelectColumn($alias . '.countissuespersent');
            $criteria->addSelectColumn($alias . '.estimatedhourssubtask');
            $criteria->addSelectColumn($alias . '.logedhours');
            $criteria->addSelectColumn($alias . '.remaininghours');
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
        return Propel::getServiceContainer()->getDatabaseMap(myAnaliticNonBillTableMap::DATABASE_NAME)->getTable(myAnaliticNonBillTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(myAnaliticNonBillTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(myAnaliticNonBillTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new myAnaliticNonBillTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a myAnaliticNonBill or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or myAnaliticNonBill object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(myAnaliticNonBillTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \myAnaliticNonBill) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(myAnaliticNonBillTableMap::DATABASE_NAME);
            $criteria->add(myAnaliticNonBillTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = myAnaliticNonBillQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            myAnaliticNonBillTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                myAnaliticNonBillTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the myanaliticnonbill table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return myAnaliticNonBillQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a myAnaliticNonBill or Criteria object.
     *
     * @param mixed               $criteria Criteria or myAnaliticNonBill object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(myAnaliticNonBillTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from myAnaliticNonBill object
        }

        if ($criteria->containsKey(myAnaliticNonBillTableMap::COL_ID) && $criteria->keyContainsValue(myAnaliticNonBillTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.myAnaliticNonBillTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = myAnaliticNonBillQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // myAnaliticNonBillTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
myAnaliticNonBillTableMap::buildTableMap();
