<?php

namespace Base;

use \myProjectTmp as ChildmyProjectTmp;
use \myProjectTmpQuery as ChildmyProjectTmpQuery;
use \Exception;
use \PDO;
use Map\myProjectTmpTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'myprojecttmp' table.
 *
 *
 *
 * @method     ChildmyProjectTmpQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildmyProjectTmpQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildmyProjectTmpQuery orderByEmployee($order = Criteria::ASC) Order by the employee column
 * @method     ChildmyProjectTmpQuery orderByProjectName($order = Criteria::ASC) Order by the projectname column
 * @method     ChildmyProjectTmpQuery orderByTotalHoursEstimated($order = Criteria::ASC) Order by the totalhoursestimated column
 * @method     ChildmyProjectTmpQuery orderByTotalHoursSpent($order = Criteria::ASC) Order by the totalhoursspent column
 * @method     ChildmyProjectTmpQuery orderByHourlyRateAvr($order = Criteria::ASC) Order by the hourlyrateAvr column
 * @method     ChildmyProjectTmpQuery orderByTotalCostEstimated($order = Criteria::ASC) Order by the totalcostestimated column
 * @method     ChildmyProjectTmpQuery orderByTotalCostSpent($order = Criteria::ASC) Order by the totalcostspent column
 * @method     ChildmyProjectTmpQuery orderByTotalCost($order = Criteria::ASC) Order by the totalcost column
 *
 * @method     ChildmyProjectTmpQuery groupById() Group by the id column
 * @method     ChildmyProjectTmpQuery groupByDate() Group by the date column
 * @method     ChildmyProjectTmpQuery groupByEmployee() Group by the employee column
 * @method     ChildmyProjectTmpQuery groupByProjectName() Group by the projectname column
 * @method     ChildmyProjectTmpQuery groupByTotalHoursEstimated() Group by the totalhoursestimated column
 * @method     ChildmyProjectTmpQuery groupByTotalHoursSpent() Group by the totalhoursspent column
 * @method     ChildmyProjectTmpQuery groupByHourlyRateAvr() Group by the hourlyrateAvr column
 * @method     ChildmyProjectTmpQuery groupByTotalCostEstimated() Group by the totalcostestimated column
 * @method     ChildmyProjectTmpQuery groupByTotalCostSpent() Group by the totalcostspent column
 * @method     ChildmyProjectTmpQuery groupByTotalCost() Group by the totalcost column
 *
 * @method     ChildmyProjectTmpQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildmyProjectTmpQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildmyProjectTmpQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildmyProjectTmpQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildmyProjectTmpQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildmyProjectTmpQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildmyProjectTmp findOne(ConnectionInterface $con = null) Return the first ChildmyProjectTmp matching the query
 * @method     ChildmyProjectTmp findOneOrCreate(ConnectionInterface $con = null) Return the first ChildmyProjectTmp matching the query, or a new ChildmyProjectTmp object populated from the query conditions when no match is found
 *
 * @method     ChildmyProjectTmp findOneById(int $id) Return the first ChildmyProjectTmp filtered by the id column
 * @method     ChildmyProjectTmp findOneByDate(int $date) Return the first ChildmyProjectTmp filtered by the date column
 * @method     ChildmyProjectTmp findOneByEmployee(string $employee) Return the first ChildmyProjectTmp filtered by the employee column
 * @method     ChildmyProjectTmp findOneByProjectName(string $projectname) Return the first ChildmyProjectTmp filtered by the projectname column
 * @method     ChildmyProjectTmp findOneByTotalHoursEstimated(double $totalhoursestimated) Return the first ChildmyProjectTmp filtered by the totalhoursestimated column
 * @method     ChildmyProjectTmp findOneByTotalHoursSpent(double $totalhoursspent) Return the first ChildmyProjectTmp filtered by the totalhoursspent column
 * @method     ChildmyProjectTmp findOneByHourlyRateAvr(double $hourlyrateAvr) Return the first ChildmyProjectTmp filtered by the hourlyrateAvr column
 * @method     ChildmyProjectTmp findOneByTotalCostEstimated(double $totalcostestimated) Return the first ChildmyProjectTmp filtered by the totalcostestimated column
 * @method     ChildmyProjectTmp findOneByTotalCostSpent(double $totalcostspent) Return the first ChildmyProjectTmp filtered by the totalcostspent column
 * @method     ChildmyProjectTmp findOneByTotalCost(double $totalcost) Return the first ChildmyProjectTmp filtered by the totalcost column *

 * @method     ChildmyProjectTmp requirePk($key, ConnectionInterface $con = null) Return the ChildmyProjectTmp by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyProjectTmp requireOne(ConnectionInterface $con = null) Return the first ChildmyProjectTmp matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildmyProjectTmp requireOneById(int $id) Return the first ChildmyProjectTmp filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyProjectTmp requireOneByDate(int $date) Return the first ChildmyProjectTmp filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyProjectTmp requireOneByEmployee(string $employee) Return the first ChildmyProjectTmp filtered by the employee column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyProjectTmp requireOneByProjectName(string $projectname) Return the first ChildmyProjectTmp filtered by the projectname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyProjectTmp requireOneByTotalHoursEstimated(double $totalhoursestimated) Return the first ChildmyProjectTmp filtered by the totalhoursestimated column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyProjectTmp requireOneByTotalHoursSpent(double $totalhoursspent) Return the first ChildmyProjectTmp filtered by the totalhoursspent column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyProjectTmp requireOneByHourlyRateAvr(double $hourlyrateAvr) Return the first ChildmyProjectTmp filtered by the hourlyrateAvr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyProjectTmp requireOneByTotalCostEstimated(double $totalcostestimated) Return the first ChildmyProjectTmp filtered by the totalcostestimated column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyProjectTmp requireOneByTotalCostSpent(double $totalcostspent) Return the first ChildmyProjectTmp filtered by the totalcostspent column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyProjectTmp requireOneByTotalCost(double $totalcost) Return the first ChildmyProjectTmp filtered by the totalcost column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildmyProjectTmp[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildmyProjectTmp objects based on current ModelCriteria
 * @method     ChildmyProjectTmp[]|ObjectCollection findById(int $id) Return ChildmyProjectTmp objects filtered by the id column
 * @method     ChildmyProjectTmp[]|ObjectCollection findByDate(int $date) Return ChildmyProjectTmp objects filtered by the date column
 * @method     ChildmyProjectTmp[]|ObjectCollection findByEmployee(string $employee) Return ChildmyProjectTmp objects filtered by the employee column
 * @method     ChildmyProjectTmp[]|ObjectCollection findByProjectName(string $projectname) Return ChildmyProjectTmp objects filtered by the projectname column
 * @method     ChildmyProjectTmp[]|ObjectCollection findByTotalHoursEstimated(double $totalhoursestimated) Return ChildmyProjectTmp objects filtered by the totalhoursestimated column
 * @method     ChildmyProjectTmp[]|ObjectCollection findByTotalHoursSpent(double $totalhoursspent) Return ChildmyProjectTmp objects filtered by the totalhoursspent column
 * @method     ChildmyProjectTmp[]|ObjectCollection findByHourlyRateAvr(double $hourlyrateAvr) Return ChildmyProjectTmp objects filtered by the hourlyrateAvr column
 * @method     ChildmyProjectTmp[]|ObjectCollection findByTotalCostEstimated(double $totalcostestimated) Return ChildmyProjectTmp objects filtered by the totalcostestimated column
 * @method     ChildmyProjectTmp[]|ObjectCollection findByTotalCostSpent(double $totalcostspent) Return ChildmyProjectTmp objects filtered by the totalcostspent column
 * @method     ChildmyProjectTmp[]|ObjectCollection findByTotalCost(double $totalcost) Return ChildmyProjectTmp objects filtered by the totalcost column
 * @method     ChildmyProjectTmp[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class myProjectTmpQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\myProjectTmpQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'kpidata', $modelName = '\\myProjectTmp', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildmyProjectTmpQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildmyProjectTmpQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildmyProjectTmpQuery) {
            return $criteria;
        }
        $query = new ChildmyProjectTmpQuery();
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
     * @return ChildmyProjectTmp|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(myProjectTmpTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = myProjectTmpTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildmyProjectTmp A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, date, employee, projectname, totalhoursestimated, totalhoursspent, hourlyrateAvr, totalcostestimated, totalcostspent, totalcost FROM myprojecttmp WHERE id = :p0';
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
            /** @var ChildmyProjectTmp $obj */
            $obj = new ChildmyProjectTmp();
            $obj->hydrate($row);
            myProjectTmpTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildmyProjectTmp|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildmyProjectTmpQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(myProjectTmpTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildmyProjectTmpQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(myProjectTmpTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildmyProjectTmpQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(myProjectTmpTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(myProjectTmpTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myProjectTmpTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildmyProjectTmpQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(myProjectTmpTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(myProjectTmpTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myProjectTmpTableMap::COL_DATE, $date, $comparison);
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
     * @return $this|ChildmyProjectTmpQuery The current query, for fluid interface
     */
    public function filterByEmployee($employee = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($employee)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myProjectTmpTableMap::COL_EMPLOYEE, $employee, $comparison);
    }

    /**
     * Filter the query on the projectname column
     *
     * Example usage:
     * <code>
     * $query->filterByProjectName('fooValue');   // WHERE projectname = 'fooValue'
     * $query->filterByProjectName('%fooValue%', Criteria::LIKE); // WHERE projectname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $projectName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyProjectTmpQuery The current query, for fluid interface
     */
    public function filterByProjectName($projectName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($projectName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myProjectTmpTableMap::COL_PROJECTNAME, $projectName, $comparison);
    }

    /**
     * Filter the query on the totalhoursestimated column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalHoursEstimated(1234); // WHERE totalhoursestimated = 1234
     * $query->filterByTotalHoursEstimated(array(12, 34)); // WHERE totalhoursestimated IN (12, 34)
     * $query->filterByTotalHoursEstimated(array('min' => 12)); // WHERE totalhoursestimated > 12
     * </code>
     *
     * @param     mixed $totalHoursEstimated The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyProjectTmpQuery The current query, for fluid interface
     */
    public function filterByTotalHoursEstimated($totalHoursEstimated = null, $comparison = null)
    {
        if (is_array($totalHoursEstimated)) {
            $useMinMax = false;
            if (isset($totalHoursEstimated['min'])) {
                $this->addUsingAlias(myProjectTmpTableMap::COL_TOTALHOURSESTIMATED, $totalHoursEstimated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalHoursEstimated['max'])) {
                $this->addUsingAlias(myProjectTmpTableMap::COL_TOTALHOURSESTIMATED, $totalHoursEstimated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myProjectTmpTableMap::COL_TOTALHOURSESTIMATED, $totalHoursEstimated, $comparison);
    }

    /**
     * Filter the query on the totalhoursspent column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalHoursSpent(1234); // WHERE totalhoursspent = 1234
     * $query->filterByTotalHoursSpent(array(12, 34)); // WHERE totalhoursspent IN (12, 34)
     * $query->filterByTotalHoursSpent(array('min' => 12)); // WHERE totalhoursspent > 12
     * </code>
     *
     * @param     mixed $totalHoursSpent The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyProjectTmpQuery The current query, for fluid interface
     */
    public function filterByTotalHoursSpent($totalHoursSpent = null, $comparison = null)
    {
        if (is_array($totalHoursSpent)) {
            $useMinMax = false;
            if (isset($totalHoursSpent['min'])) {
                $this->addUsingAlias(myProjectTmpTableMap::COL_TOTALHOURSSPENT, $totalHoursSpent['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalHoursSpent['max'])) {
                $this->addUsingAlias(myProjectTmpTableMap::COL_TOTALHOURSSPENT, $totalHoursSpent['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myProjectTmpTableMap::COL_TOTALHOURSSPENT, $totalHoursSpent, $comparison);
    }

    /**
     * Filter the query on the hourlyrateAvr column
     *
     * Example usage:
     * <code>
     * $query->filterByHourlyRateAvr(1234); // WHERE hourlyrateAvr = 1234
     * $query->filterByHourlyRateAvr(array(12, 34)); // WHERE hourlyrateAvr IN (12, 34)
     * $query->filterByHourlyRateAvr(array('min' => 12)); // WHERE hourlyrateAvr > 12
     * </code>
     *
     * @param     mixed $hourlyRateAvr The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyProjectTmpQuery The current query, for fluid interface
     */
    public function filterByHourlyRateAvr($hourlyRateAvr = null, $comparison = null)
    {
        if (is_array($hourlyRateAvr)) {
            $useMinMax = false;
            if (isset($hourlyRateAvr['min'])) {
                $this->addUsingAlias(myProjectTmpTableMap::COL_HOURLYRATEAVR, $hourlyRateAvr['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($hourlyRateAvr['max'])) {
                $this->addUsingAlias(myProjectTmpTableMap::COL_HOURLYRATEAVR, $hourlyRateAvr['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myProjectTmpTableMap::COL_HOURLYRATEAVR, $hourlyRateAvr, $comparison);
    }

    /**
     * Filter the query on the totalcostestimated column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalCostEstimated(1234); // WHERE totalcostestimated = 1234
     * $query->filterByTotalCostEstimated(array(12, 34)); // WHERE totalcostestimated IN (12, 34)
     * $query->filterByTotalCostEstimated(array('min' => 12)); // WHERE totalcostestimated > 12
     * </code>
     *
     * @param     mixed $totalCostEstimated The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyProjectTmpQuery The current query, for fluid interface
     */
    public function filterByTotalCostEstimated($totalCostEstimated = null, $comparison = null)
    {
        if (is_array($totalCostEstimated)) {
            $useMinMax = false;
            if (isset($totalCostEstimated['min'])) {
                $this->addUsingAlias(myProjectTmpTableMap::COL_TOTALCOSTESTIMATED, $totalCostEstimated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalCostEstimated['max'])) {
                $this->addUsingAlias(myProjectTmpTableMap::COL_TOTALCOSTESTIMATED, $totalCostEstimated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myProjectTmpTableMap::COL_TOTALCOSTESTIMATED, $totalCostEstimated, $comparison);
    }

    /**
     * Filter the query on the totalcostspent column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalCostSpent(1234); // WHERE totalcostspent = 1234
     * $query->filterByTotalCostSpent(array(12, 34)); // WHERE totalcostspent IN (12, 34)
     * $query->filterByTotalCostSpent(array('min' => 12)); // WHERE totalcostspent > 12
     * </code>
     *
     * @param     mixed $totalCostSpent The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyProjectTmpQuery The current query, for fluid interface
     */
    public function filterByTotalCostSpent($totalCostSpent = null, $comparison = null)
    {
        if (is_array($totalCostSpent)) {
            $useMinMax = false;
            if (isset($totalCostSpent['min'])) {
                $this->addUsingAlias(myProjectTmpTableMap::COL_TOTALCOSTSPENT, $totalCostSpent['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalCostSpent['max'])) {
                $this->addUsingAlias(myProjectTmpTableMap::COL_TOTALCOSTSPENT, $totalCostSpent['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myProjectTmpTableMap::COL_TOTALCOSTSPENT, $totalCostSpent, $comparison);
    }

    /**
     * Filter the query on the totalcost column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalCost(1234); // WHERE totalcost = 1234
     * $query->filterByTotalCost(array(12, 34)); // WHERE totalcost IN (12, 34)
     * $query->filterByTotalCost(array('min' => 12)); // WHERE totalcost > 12
     * </code>
     *
     * @param     mixed $totalCost The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyProjectTmpQuery The current query, for fluid interface
     */
    public function filterByTotalCost($totalCost = null, $comparison = null)
    {
        if (is_array($totalCost)) {
            $useMinMax = false;
            if (isset($totalCost['min'])) {
                $this->addUsingAlias(myProjectTmpTableMap::COL_TOTALCOST, $totalCost['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalCost['max'])) {
                $this->addUsingAlias(myProjectTmpTableMap::COL_TOTALCOST, $totalCost['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myProjectTmpTableMap::COL_TOTALCOST, $totalCost, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildmyProjectTmp $myProjectTmp Object to remove from the list of results
     *
     * @return $this|ChildmyProjectTmpQuery The current query, for fluid interface
     */
    public function prune($myProjectTmp = null)
    {
        if ($myProjectTmp) {
            $this->addUsingAlias(myProjectTmpTableMap::COL_ID, $myProjectTmp->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the myprojecttmp table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(myProjectTmpTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            myProjectTmpTableMap::clearInstancePool();
            myProjectTmpTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(myProjectTmpTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(myProjectTmpTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            myProjectTmpTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            myProjectTmpTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // myProjectTmpQuery
