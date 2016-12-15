<?php

namespace Base;

use \myDataTemp as ChildmyDataTemp;
use \myDataTempQuery as ChildmyDataTempQuery;
use \Exception;
use \PDO;
use Map\myDataTempTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'mydatatemp' table.
 *
 *
 *
 * @method     ChildmyDataTempQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildmyDataTempQuery orderByProject($order = Criteria::ASC) Order by the project column
 * @method     ChildmyDataTempQuery orderByNonBil($order = Criteria::ASC) Order by the nonbil column
 * @method     ChildmyDataTempQuery orderByEstimated($order = Criteria::ASC) Order by the estimated column
 * @method     ChildmyDataTempQuery orderBySpent($order = Criteria::ASC) Order by the spent column
 * @method     ChildmyDataTempQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildmyDataTempQuery orderByEmployee($order = Criteria::ASC) Order by the employee column
 *
 * @method     ChildmyDataTempQuery groupById() Group by the id column
 * @method     ChildmyDataTempQuery groupByProject() Group by the project column
 * @method     ChildmyDataTempQuery groupByNonBil() Group by the nonbil column
 * @method     ChildmyDataTempQuery groupByEstimated() Group by the estimated column
 * @method     ChildmyDataTempQuery groupBySpent() Group by the spent column
 * @method     ChildmyDataTempQuery groupByDate() Group by the date column
 * @method     ChildmyDataTempQuery groupByEmployee() Group by the employee column
 *
 * @method     ChildmyDataTempQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildmyDataTempQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildmyDataTempQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildmyDataTempQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildmyDataTempQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildmyDataTempQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildmyDataTemp findOne(ConnectionInterface $con = null) Return the first ChildmyDataTemp matching the query
 * @method     ChildmyDataTemp findOneOrCreate(ConnectionInterface $con = null) Return the first ChildmyDataTemp matching the query, or a new ChildmyDataTemp object populated from the query conditions when no match is found
 *
 * @method     ChildmyDataTemp findOneById(int $id) Return the first ChildmyDataTemp filtered by the id column
 * @method     ChildmyDataTemp findOneByProject(string $project) Return the first ChildmyDataTemp filtered by the project column
 * @method     ChildmyDataTemp findOneByNonBil(string $nonbil) Return the first ChildmyDataTemp filtered by the nonbil column
 * @method     ChildmyDataTemp findOneByEstimated(double $estimated) Return the first ChildmyDataTemp filtered by the estimated column
 * @method     ChildmyDataTemp findOneBySpent(double $spent) Return the first ChildmyDataTemp filtered by the spent column
 * @method     ChildmyDataTemp findOneByDate(int $date) Return the first ChildmyDataTemp filtered by the date column
 * @method     ChildmyDataTemp findOneByEmployee(string $employee) Return the first ChildmyDataTemp filtered by the employee column *

 * @method     ChildmyDataTemp requirePk($key, ConnectionInterface $con = null) Return the ChildmyDataTemp by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyDataTemp requireOne(ConnectionInterface $con = null) Return the first ChildmyDataTemp matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildmyDataTemp requireOneById(int $id) Return the first ChildmyDataTemp filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyDataTemp requireOneByProject(string $project) Return the first ChildmyDataTemp filtered by the project column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyDataTemp requireOneByNonBil(string $nonbil) Return the first ChildmyDataTemp filtered by the nonbil column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyDataTemp requireOneByEstimated(double $estimated) Return the first ChildmyDataTemp filtered by the estimated column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyDataTemp requireOneBySpent(double $spent) Return the first ChildmyDataTemp filtered by the spent column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyDataTemp requireOneByDate(int $date) Return the first ChildmyDataTemp filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyDataTemp requireOneByEmployee(string $employee) Return the first ChildmyDataTemp filtered by the employee column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildmyDataTemp[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildmyDataTemp objects based on current ModelCriteria
 * @method     ChildmyDataTemp[]|ObjectCollection findById(int $id) Return ChildmyDataTemp objects filtered by the id column
 * @method     ChildmyDataTemp[]|ObjectCollection findByProject(string $project) Return ChildmyDataTemp objects filtered by the project column
 * @method     ChildmyDataTemp[]|ObjectCollection findByNonBil(string $nonbil) Return ChildmyDataTemp objects filtered by the nonbil column
 * @method     ChildmyDataTemp[]|ObjectCollection findByEstimated(double $estimated) Return ChildmyDataTemp objects filtered by the estimated column
 * @method     ChildmyDataTemp[]|ObjectCollection findBySpent(double $spent) Return ChildmyDataTemp objects filtered by the spent column
 * @method     ChildmyDataTemp[]|ObjectCollection findByDate(int $date) Return ChildmyDataTemp objects filtered by the date column
 * @method     ChildmyDataTemp[]|ObjectCollection findByEmployee(string $employee) Return ChildmyDataTemp objects filtered by the employee column
 * @method     ChildmyDataTemp[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class myDataTempQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\myDataTempQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'kpidata', $modelName = '\\myDataTemp', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildmyDataTempQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildmyDataTempQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildmyDataTempQuery) {
            return $criteria;
        }
        $query = new ChildmyDataTempQuery();
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
     * @return ChildmyDataTemp|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(myDataTempTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = myDataTempTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildmyDataTemp A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, project, nonbil, estimated, spent, date, employee FROM mydatatemp WHERE id = :p0';
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
            /** @var ChildmyDataTemp $obj */
            $obj = new ChildmyDataTemp();
            $obj->hydrate($row);
            myDataTempTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildmyDataTemp|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildmyDataTempQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(myDataTempTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildmyDataTempQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(myDataTempTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildmyDataTempQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(myDataTempTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(myDataTempTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myDataTempTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildmyDataTempQuery The current query, for fluid interface
     */
    public function filterByProject($project = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($project)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myDataTempTableMap::COL_PROJECT, $project, $comparison);
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
     * @return $this|ChildmyDataTempQuery The current query, for fluid interface
     */
    public function filterByNonBil($nonBil = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nonBil)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myDataTempTableMap::COL_NONBIL, $nonBil, $comparison);
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
     * @return $this|ChildmyDataTempQuery The current query, for fluid interface
     */
    public function filterByEstimated($estimated = null, $comparison = null)
    {
        if (is_array($estimated)) {
            $useMinMax = false;
            if (isset($estimated['min'])) {
                $this->addUsingAlias(myDataTempTableMap::COL_ESTIMATED, $estimated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($estimated['max'])) {
                $this->addUsingAlias(myDataTempTableMap::COL_ESTIMATED, $estimated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myDataTempTableMap::COL_ESTIMATED, $estimated, $comparison);
    }

    /**
     * Filter the query on the spent column
     *
     * Example usage:
     * <code>
     * $query->filterBySpent(1234); // WHERE spent = 1234
     * $query->filterBySpent(array(12, 34)); // WHERE spent IN (12, 34)
     * $query->filterBySpent(array('min' => 12)); // WHERE spent > 12
     * </code>
     *
     * @param     mixed $spent The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyDataTempQuery The current query, for fluid interface
     */
    public function filterBySpent($spent = null, $comparison = null)
    {
        if (is_array($spent)) {
            $useMinMax = false;
            if (isset($spent['min'])) {
                $this->addUsingAlias(myDataTempTableMap::COL_SPENT, $spent['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($spent['max'])) {
                $this->addUsingAlias(myDataTempTableMap::COL_SPENT, $spent['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myDataTempTableMap::COL_SPENT, $spent, $comparison);
    }

    /**
     * Filter the query on the date column
     *
     * Example usage:
     * <code>
     * $query->filterByDate(1234); // WHERE date = 1234
     * $query->filterByDate(array(12, 34)); // WHERE date IN (12, 34)
     * $query->filterByDate(array('min' => 12)); // WHERE date > 12
     * </code>
     *
     * @param     mixed $date The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyDataTempQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(myDataTempTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(myDataTempTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myDataTempTableMap::COL_DATE, $date, $comparison);
    }

    /**
     * Filter the query on the employee column
     *
     * Example usage:
     * <code>
     * $query->filterByEmployee('fooValue');   // WHERE employee = 'fooValue'
     * $query->filterByEmployee('%fooValue%', Criteria::LIKE); // WHERE employee LIKE '%fooValue%'
     * </code>
     *
     * @param     string $employee The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyDataTempQuery The current query, for fluid interface
     */
    public function filterByEmployee($employee = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($employee)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myDataTempTableMap::COL_EMPLOYEE, $employee, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildmyDataTemp $myDataTemp Object to remove from the list of results
     *
     * @return $this|ChildmyDataTempQuery The current query, for fluid interface
     */
    public function prune($myDataTemp = null)
    {
        if ($myDataTemp) {
            $this->addUsingAlias(myDataTempTableMap::COL_ID, $myDataTemp->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the mydatatemp table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(myDataTempTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            myDataTempTableMap::clearInstancePool();
            myDataTempTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(myDataTempTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(myDataTempTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            myDataTempTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            myDataTempTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // myDataTempQuery
