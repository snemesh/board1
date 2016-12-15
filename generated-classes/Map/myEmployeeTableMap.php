<?php

namespace Map;

use \myEmployee;
use \myEmployeeQuery;
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
 * This class defines the structure of the 'myemployee' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class myEmployeeTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.myEmployeeTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'kpidata';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'myemployee';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\myEmployee';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'myEmployee';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 11;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 11;

    /**
     * the column name for the id field
     */
    const COL_ID = 'myemployee.id';

    /**
     * the column name for the speciality field
     */
    const COL_SPECIALITY = 'myemployee.speciality';

    /**
     * the column name for the employee field
     */
    const COL_EMPLOYEE = 'myemployee.employee';

    /**
     * the column name for the level field
     */
    const COL_LEVEL = 'myemployee.level';

    /**
     * the column name for the data field
     */
    const COL_DATA = 'myemployee.data';

    /**
     * the column name for the datemonth field
     */
    const COL_DATEMONTH = 'myemployee.datemonth';

    /**
     * the column name for the dateyear field
     */
    const COL_DATEYEAR = 'myemployee.dateyear';

    /**
     * the column name for the salary field
     */
    const COL_SALARY = 'myemployee.salary';

    /**
     * the column name for the hourlyrate field
     */
    const COL_HOURLYRATE = 'myemployee.hourlyrate';

    /**
     * the column name for the group field
     */
    const COL_GROUP = 'myemployee.group';

    /**
     * the column name for the spented field
     */
    const COL_SPENTED = 'myemployee.spented';

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
        self::TYPE_PHPNAME       => array('Id', 'Speciality', 'Employee', 'Level', 'Date', 'DateMonth', 'DateYear', 'Salary', 'hourlyRate', 'Group', 'Spented', ),
        self::TYPE_CAMELNAME     => array('id', 'speciality', 'employee', 'level', 'date', 'dateMonth', 'dateYear', 'salary', 'hourlyRate', 'group', 'spented', ),
        self::TYPE_COLNAME       => array(myEmployeeTableMap::COL_ID, myEmployeeTableMap::COL_SPECIALITY, myEmployeeTableMap::COL_EMPLOYEE, myEmployeeTableMap::COL_LEVEL, myEmployeeTableMap::COL_DATA, myEmployeeTableMap::COL_DATEMONTH, myEmployeeTableMap::COL_DATEYEAR, myEmployeeTableMap::COL_SALARY, myEmployeeTableMap::COL_HOURLYRATE, myEmployeeTableMap::COL_GROUP, myEmployeeTableMap::COL_SPENTED, ),
        self::TYPE_FIELDNAME     => array('id', 'speciality', 'employee', 'level', 'data', 'datemonth', 'dateyear', 'salary', 'hourlyrate', 'group', 'spented', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Speciality' => 1, 'Employee' => 2, 'Level' => 3, 'Date' => 4, 'DateMonth' => 5, 'DateYear' => 6, 'Salary' => 7, 'hourlyRate' => 8, 'Group' => 9, 'Spented' => 10, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'speciality' => 1, 'employee' => 2, 'level' => 3, 'date' => 4, 'dateMonth' => 5, 'dateYear' => 6, 'salary' => 7, 'hourlyRate' => 8, 'group' => 9, 'spented' => 10, ),
        self::TYPE_COLNAME       => array(myEmployeeTableMap::COL_ID => 0, myEmployeeTableMap::COL_SPECIALITY => 1, myEmployeeTableMap::COL_EMPLOYEE => 2, myEmployeeTableMap::COL_LEVEL => 3, myEmployeeTableMap::COL_DATA => 4, myEmployeeTableMap::COL_DATEMONTH => 5, myEmployeeTableMap::COL_DATEYEAR => 6, myEmployeeTableMap::COL_SALARY => 7, myEmployeeTableMap::COL_HOURLYRATE => 8, myEmployeeTableMap::COL_GROUP => 9, myEmployeeTableMap::COL_SPENTED => 10, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'speciality' => 1, 'employee' => 2, 'level' => 3, 'data' => 4, 'datemonth' => 5, 'dateyear' => 6, 'salary' => 7, 'hourlyrate' => 8, 'group' => 9, 'spented' => 10, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
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
        $this->setName('myemployee');
        $this->setPhpName('myEmployee');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\myEmployee');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('speciality', 'Speciality', 'VARCHAR', false, 128, null);
        $this->addColumn('employee', 'Employee', 'VARCHAR', false, 128, null);
        $this->addColumn('level', 'Level', 'VARCHAR', false, 128, null);
        $this->addColumn('data', 'Date', 'VARCHAR', false, 128, null);
        $this->addColumn('datemonth', 'DateMonth', 'VARCHAR', false, 128, null);
        $this->addColumn('dateyear', 'DateYear', 'VARCHAR', false, 128, null);
        $this->addColumn('salary', 'Salary', 'DOUBLE', false, null, null);
        $this->addColumn('hourlyrate', 'hourlyRate', 'DOUBLE', false, null, null);
        $this->addColumn('group', 'Group', 'VARCHAR', false, 128, null);
        $this->addColumn('spented', 'Spented', 'DOUBLE', false, null, null);
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
        return $withPrefix ? myEmployeeTableMap::CLASS_DEFAULT : myEmployeeTableMap::OM_CLASS;
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
     * @return array           (myEmployee object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = myEmployeeTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = myEmployeeTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + myEmployeeTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = myEmployeeTableMap::OM_CLASS;
            /** @var myEmployee $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            myEmployeeTableMap::addInstanceToPool($obj, $key);
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
            $key = myEmployeeTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = myEmployeeTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var myEmployee $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                myEmployeeTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(myEmployeeTableMap::COL_ID);
            $criteria->addSelectColumn(myEmployeeTableMap::COL_SPECIALITY);
            $criteria->addSelectColumn(myEmployeeTableMap::COL_EMPLOYEE);
            $criteria->addSelectColumn(myEmployeeTableMap::COL_LEVEL);
            $criteria->addSelectColumn(myEmployeeTableMap::COL_DATA);
            $criteria->addSelectColumn(myEmployeeTableMap::COL_DATEMONTH);
            $criteria->addSelectColumn(myEmployeeTableMap::COL_DATEYEAR);
            $criteria->addSelectColumn(myEmployeeTableMap::COL_SALARY);
            $criteria->addSelectColumn(myEmployeeTableMap::COL_HOURLYRATE);
            $criteria->addSelectColumn(myEmployeeTableMap::COL_GROUP);
            $criteria->addSelectColumn(myEmployeeTableMap::COL_SPENTED);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.speciality');
            $criteria->addSelectColumn($alias . '.employee');
            $criteria->addSelectColumn($alias . '.level');
            $criteria->addSelectColumn($alias . '.data');
            $criteria->addSelectColumn($alias . '.datemonth');
            $criteria->addSelectColumn($alias . '.dateyear');
            $criteria->addSelectColumn($alias . '.salary');
            $criteria->addSelectColumn($alias . '.hourlyrate');
            $criteria->addSelectColumn($alias . '.group');
            $criteria->addSelectColumn($alias . '.spented');
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
        return Propel::getServiceContainer()->getDatabaseMap(myEmployeeTableMap::DATABASE_NAME)->getTable(myEmployeeTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(myEmployeeTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(myEmployeeTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new myEmployeeTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a myEmployee or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or myEmployee object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(myEmployeeTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \myEmployee) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(myEmployeeTableMap::DATABASE_NAME);
            $criteria->add(myEmployeeTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = myEmployeeQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            myEmployeeTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                myEmployeeTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the myemployee table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return myEmployeeQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a myEmployee or Criteria object.
     *
     * @param mixed               $criteria Criteria or myEmployee object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(myEmployeeTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from myEmployee object
        }

        if ($criteria->containsKey(myEmployeeTableMap::COL_ID) && $criteria->keyContainsValue(myEmployeeTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.myEmployeeTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = myEmployeeQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // myEmployeeTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
myEmployeeTableMap::buildTableMap();
