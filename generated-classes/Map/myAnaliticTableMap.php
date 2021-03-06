<?php

namespace Map;

use \myAnalitic;
use \myAnaliticQuery;
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
 * This class defines the structure of the 'myanalitic' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class myAnaliticTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.myAnaliticTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'kpidata';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'myanalitic';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\myAnalitic';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'myAnalitic';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 18;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 18;

    /**
     * the column name for the id field
     */
    const COL_ID = 'myanalitic.id';

    /**
     * the column name for the projectname field
     */
    const COL_PROJECTNAME = 'myanalitic.projectname';

    /**
     * the column name for the issuekey field
     */
    const COL_ISSUEKEY = 'myanalitic.issuekey';

    /**
     * the column name for the initialestimate field
     */
    const COL_INITIALESTIMATE = 'myanalitic.initialestimate';

    /**
     * the column name for the nonbil field
     */
    const COL_NONBIL = 'myanalitic.nonbil';

    /**
     * the column name for the assignee field
     */
    const COL_ASSIGNEE = 'myanalitic.assignee';

    /**
     * the column name for the estimatedhourssum field
     */
    const COL_ESTIMATEDHOURSSUM = 'myanalitic.estimatedhourssum';

    /**
     * the column name for the logworkhourssum field
     */
    const COL_LOGWORKHOURSSUM = 'myanalitic.logworkhourssum';

    /**
     * the column name for the logworkusername field
     */
    const COL_LOGWORKUSERNAME = 'myanalitic.logworkusername';

    /**
     * the column name for the logworkyear field
     */
    const COL_LOGWORKYEAR = 'myanalitic.logworkyear';

    /**
     * the column name for the logworkmonth field
     */
    const COL_LOGWORKMONTH = 'myanalitic.logworkmonth';

    /**
     * the column name for the logworkdatatime field
     */
    const COL_LOGWORKDATATIME = 'myanalitic.logworkdatatime';

    /**
     * the column name for the logworkage field
     */
    const COL_LOGWORKAGE = 'myanalitic.logworkage';

    /**
     * the column name for the countissues field
     */
    const COL_COUNTISSUES = 'myanalitic.countissues';

    /**
     * the column name for the countissuespersent field
     */
    const COL_COUNTISSUESPERSENT = 'myanalitic.countissuespersent';

    /**
     * the column name for the estimatedhourssubtask field
     */
    const COL_ESTIMATEDHOURSSUBTASK = 'myanalitic.estimatedhourssubtask';

    /**
     * the column name for the logedhours field
     */
    const COL_LOGEDHOURS = 'myanalitic.logedhours';

    /**
     * the column name for the remaininghours field
     */
    const COL_REMAININGHOURS = 'myanalitic.remaininghours';

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
        self::TYPE_PHPNAME       => array('Id', 'ProjectName', 'IssueKey', 'InitialEstimate', 'NonBil', 'Assignee', 'EstimatedHoursSum', 'LogWorkHoursSum', 'LogWorkUserName', 'LogWorkYear', 'LogWorkMonth', 'LogWorkDataTime', 'LogWorkAge', 'CountIssues', 'CountIssuesPersent', 'EstimatedHoursSubTask', 'LogedHours', 'RemainingHours', ),
        self::TYPE_CAMELNAME     => array('id', 'projectName', 'issueKey', 'initialEstimate', 'nonBil', 'assignee', 'estimatedHoursSum', 'logWorkHoursSum', 'logWorkUserName', 'logWorkYear', 'logWorkMonth', 'logWorkDataTime', 'logWorkAge', 'countIssues', 'countIssuesPersent', 'estimatedHoursSubTask', 'logedHours', 'remainingHours', ),
        self::TYPE_COLNAME       => array(myAnaliticTableMap::COL_ID, myAnaliticTableMap::COL_PROJECTNAME, myAnaliticTableMap::COL_ISSUEKEY, myAnaliticTableMap::COL_INITIALESTIMATE, myAnaliticTableMap::COL_NONBIL, myAnaliticTableMap::COL_ASSIGNEE, myAnaliticTableMap::COL_ESTIMATEDHOURSSUM, myAnaliticTableMap::COL_LOGWORKHOURSSUM, myAnaliticTableMap::COL_LOGWORKUSERNAME, myAnaliticTableMap::COL_LOGWORKYEAR, myAnaliticTableMap::COL_LOGWORKMONTH, myAnaliticTableMap::COL_LOGWORKDATATIME, myAnaliticTableMap::COL_LOGWORKAGE, myAnaliticTableMap::COL_COUNTISSUES, myAnaliticTableMap::COL_COUNTISSUESPERSENT, myAnaliticTableMap::COL_ESTIMATEDHOURSSUBTASK, myAnaliticTableMap::COL_LOGEDHOURS, myAnaliticTableMap::COL_REMAININGHOURS, ),
        self::TYPE_FIELDNAME     => array('id', 'projectname', 'issuekey', 'initialestimate', 'nonbil', 'assignee', 'estimatedhourssum', 'logworkhourssum', 'logworkusername', 'logworkyear', 'logworkmonth', 'logworkdatatime', 'logworkage', 'countissues', 'countissuespersent', 'estimatedhourssubtask', 'logedhours', 'remaininghours', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'ProjectName' => 1, 'IssueKey' => 2, 'InitialEstimate' => 3, 'NonBil' => 4, 'Assignee' => 5, 'EstimatedHoursSum' => 6, 'LogWorkHoursSum' => 7, 'LogWorkUserName' => 8, 'LogWorkYear' => 9, 'LogWorkMonth' => 10, 'LogWorkDataTime' => 11, 'LogWorkAge' => 12, 'CountIssues' => 13, 'CountIssuesPersent' => 14, 'EstimatedHoursSubTask' => 15, 'LogedHours' => 16, 'RemainingHours' => 17, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'projectName' => 1, 'issueKey' => 2, 'initialEstimate' => 3, 'nonBil' => 4, 'assignee' => 5, 'estimatedHoursSum' => 6, 'logWorkHoursSum' => 7, 'logWorkUserName' => 8, 'logWorkYear' => 9, 'logWorkMonth' => 10, 'logWorkDataTime' => 11, 'logWorkAge' => 12, 'countIssues' => 13, 'countIssuesPersent' => 14, 'estimatedHoursSubTask' => 15, 'logedHours' => 16, 'remainingHours' => 17, ),
        self::TYPE_COLNAME       => array(myAnaliticTableMap::COL_ID => 0, myAnaliticTableMap::COL_PROJECTNAME => 1, myAnaliticTableMap::COL_ISSUEKEY => 2, myAnaliticTableMap::COL_INITIALESTIMATE => 3, myAnaliticTableMap::COL_NONBIL => 4, myAnaliticTableMap::COL_ASSIGNEE => 5, myAnaliticTableMap::COL_ESTIMATEDHOURSSUM => 6, myAnaliticTableMap::COL_LOGWORKHOURSSUM => 7, myAnaliticTableMap::COL_LOGWORKUSERNAME => 8, myAnaliticTableMap::COL_LOGWORKYEAR => 9, myAnaliticTableMap::COL_LOGWORKMONTH => 10, myAnaliticTableMap::COL_LOGWORKDATATIME => 11, myAnaliticTableMap::COL_LOGWORKAGE => 12, myAnaliticTableMap::COL_COUNTISSUES => 13, myAnaliticTableMap::COL_COUNTISSUESPERSENT => 14, myAnaliticTableMap::COL_ESTIMATEDHOURSSUBTASK => 15, myAnaliticTableMap::COL_LOGEDHOURS => 16, myAnaliticTableMap::COL_REMAININGHOURS => 17, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'projectname' => 1, 'issuekey' => 2, 'initialestimate' => 3, 'nonbil' => 4, 'assignee' => 5, 'estimatedhourssum' => 6, 'logworkhourssum' => 7, 'logworkusername' => 8, 'logworkyear' => 9, 'logworkmonth' => 10, 'logworkdatatime' => 11, 'logworkage' => 12, 'countissues' => 13, 'countissuespersent' => 14, 'estimatedhourssubtask' => 15, 'logedhours' => 16, 'remaininghours' => 17, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
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
        $this->setName('myanalitic');
        $this->setPhpName('myAnalitic');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\myAnalitic');
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
        $this->addColumn('logworkhourssum', 'LogWorkHoursSum', 'DOUBLE', false, null, null);
        $this->addColumn('logworkusername', 'LogWorkUserName', 'VARCHAR', false, 128, null);
        $this->addColumn('logworkyear', 'LogWorkYear', 'INTEGER', false, null, null);
        $this->addColumn('logworkmonth', 'LogWorkMonth', 'INTEGER', false, null, null);
        $this->addColumn('logworkdatatime', 'LogWorkDataTime', 'INTEGER', false, null, null);
        $this->addColumn('logworkage', 'LogWorkAge', 'INTEGER', false, null, null);
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
        return $withPrefix ? myAnaliticTableMap::CLASS_DEFAULT : myAnaliticTableMap::OM_CLASS;
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
     * @return array           (myAnalitic object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = myAnaliticTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = myAnaliticTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + myAnaliticTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = myAnaliticTableMap::OM_CLASS;
            /** @var myAnalitic $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            myAnaliticTableMap::addInstanceToPool($obj, $key);
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
            $key = myAnaliticTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = myAnaliticTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var myAnalitic $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                myAnaliticTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(myAnaliticTableMap::COL_ID);
            $criteria->addSelectColumn(myAnaliticTableMap::COL_PROJECTNAME);
            $criteria->addSelectColumn(myAnaliticTableMap::COL_ISSUEKEY);
            $criteria->addSelectColumn(myAnaliticTableMap::COL_INITIALESTIMATE);
            $criteria->addSelectColumn(myAnaliticTableMap::COL_NONBIL);
            $criteria->addSelectColumn(myAnaliticTableMap::COL_ASSIGNEE);
            $criteria->addSelectColumn(myAnaliticTableMap::COL_ESTIMATEDHOURSSUM);
            $criteria->addSelectColumn(myAnaliticTableMap::COL_LOGWORKHOURSSUM);
            $criteria->addSelectColumn(myAnaliticTableMap::COL_LOGWORKUSERNAME);
            $criteria->addSelectColumn(myAnaliticTableMap::COL_LOGWORKYEAR);
            $criteria->addSelectColumn(myAnaliticTableMap::COL_LOGWORKMONTH);
            $criteria->addSelectColumn(myAnaliticTableMap::COL_LOGWORKDATATIME);
            $criteria->addSelectColumn(myAnaliticTableMap::COL_LOGWORKAGE);
            $criteria->addSelectColumn(myAnaliticTableMap::COL_COUNTISSUES);
            $criteria->addSelectColumn(myAnaliticTableMap::COL_COUNTISSUESPERSENT);
            $criteria->addSelectColumn(myAnaliticTableMap::COL_ESTIMATEDHOURSSUBTASK);
            $criteria->addSelectColumn(myAnaliticTableMap::COL_LOGEDHOURS);
            $criteria->addSelectColumn(myAnaliticTableMap::COL_REMAININGHOURS);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.projectname');
            $criteria->addSelectColumn($alias . '.issuekey');
            $criteria->addSelectColumn($alias . '.initialestimate');
            $criteria->addSelectColumn($alias . '.nonbil');
            $criteria->addSelectColumn($alias . '.assignee');
            $criteria->addSelectColumn($alias . '.estimatedhourssum');
            $criteria->addSelectColumn($alias . '.logworkhourssum');
            $criteria->addSelectColumn($alias . '.logworkusername');
            $criteria->addSelectColumn($alias . '.logworkyear');
            $criteria->addSelectColumn($alias . '.logworkmonth');
            $criteria->addSelectColumn($alias . '.logworkdatatime');
            $criteria->addSelectColumn($alias . '.logworkage');
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
        return Propel::getServiceContainer()->getDatabaseMap(myAnaliticTableMap::DATABASE_NAME)->getTable(myAnaliticTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(myAnaliticTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(myAnaliticTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new myAnaliticTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a myAnalitic or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or myAnalitic object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(myAnaliticTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \myAnalitic) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(myAnaliticTableMap::DATABASE_NAME);
            $criteria->add(myAnaliticTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = myAnaliticQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            myAnaliticTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                myAnaliticTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the myanalitic table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return myAnaliticQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a myAnalitic or Criteria object.
     *
     * @param mixed               $criteria Criteria or myAnalitic object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(myAnaliticTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from myAnalitic object
        }

        if ($criteria->containsKey(myAnaliticTableMap::COL_ID) && $criteria->keyContainsValue(myAnaliticTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.myAnaliticTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = myAnaliticQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // myAnaliticTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
myAnaliticTableMap::buildTableMap();
