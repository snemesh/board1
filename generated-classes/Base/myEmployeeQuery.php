<?php

namespace Base;

use \myEmployee as ChildmyEmployee;
use \myEmployeeQuery as ChildmyEmployeeQuery;
use \Exception;
use \PDO;
use Map\myEmployeeTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'myemployee' table.
 *
 *
 *
 * @method     ChildmyEmployeeQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildmyEmployeeQuery orderBySpeciality($order = Criteria::ASC) Order by the speciality column
 * @method     ChildmyEmployeeQuery orderByEmployee($order = Criteria::ASC) Order by the employee column
 * @method     ChildmyEmployeeQuery orderByLevel($order = Criteria::ASC) Order by the level column
 * @method     ChildmyEmployeeQuery orderByDate($order = Criteria::ASC) Order by the data column
 * @method     ChildmyEmployeeQuery orderByDateMonth($order = Criteria::ASC) Order by the datemonth column
 * @method     ChildmyEmployeeQuery orderByDateYear($order = Criteria::ASC) Order by the dateyear column
 * @method     ChildmyEmployeeQuery orderBySalary($order = Criteria::ASC) Order by the salary column
 * @method     ChildmyEmployeeQuery orderByhourlyRate($order = Criteria::ASC) Order by the hourlyrate column
 * @method     ChildmyEmployeeQuery orderByGroup($order = Criteria::ASC) Order by the group column
 * @method     ChildmyEmployeeQuery orderBySpented($order = Criteria::ASC) Order by the spented column
 *
 * @method     ChildmyEmployeeQuery groupById() Group by the id column
 * @method     ChildmyEmployeeQuery groupBySpeciality() Group by the speciality column
 * @method     ChildmyEmployeeQuery groupByEmployee() Group by the employee column
 * @method     ChildmyEmployeeQuery groupByLevel() Group by the level column
 * @method     ChildmyEmployeeQuery groupByDate() Group by the data column
 * @method     ChildmyEmployeeQuery groupByDateMonth() Group by the datemonth column
 * @method     ChildmyEmployeeQuery groupByDateYear() Group by the dateyear column
 * @method     ChildmyEmployeeQuery groupBySalary() Group by the salary column
 * @method     ChildmyEmployeeQuery groupByhourlyRate() Group by the hourlyrate column
 * @method     ChildmyEmployeeQuery groupByGroup() Group by the group column
 * @method     ChildmyEmployeeQuery groupBySpented() Group by the spented column
 *
 * @method     ChildmyEmployeeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildmyEmployeeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildmyEmployeeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildmyEmployeeQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildmyEmployeeQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildmyEmployeeQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildmyEmployee findOne(ConnectionInterface $con = null) Return the first ChildmyEmployee matching the query
 * @method     ChildmyEmployee findOneOrCreate(ConnectionInterface $con = null) Return the first ChildmyEmployee matching the query, or a new ChildmyEmployee object populated from the query conditions when no match is found
 *
 * @method     ChildmyEmployee findOneById(int $id) Return the first ChildmyEmployee filtered by the id column
 * @method     ChildmyEmployee findOneBySpeciality(string $speciality) Return the first ChildmyEmployee filtered by the speciality column
 * @method     ChildmyEmployee findOneByEmployee(string $employee) Return the first ChildmyEmployee filtered by the employee column
 * @method     ChildmyEmployee findOneByLevel(string $level) Return the first ChildmyEmployee filtered by the level column
 * @method     ChildmyEmployee findOneByDate(string $data) Return the first ChildmyEmployee filtered by the data column
 * @method     ChildmyEmployee findOneByDateMonth(string $datemonth) Return the first ChildmyEmployee filtered by the datemonth column
 * @method     ChildmyEmployee findOneByDateYear(string $dateyear) Return the first ChildmyEmployee filtered by the dateyear column
 * @method     ChildmyEmployee findOneBySalary(double $salary) Return the first ChildmyEmployee filtered by the salary column
 * @method     ChildmyEmployee findOneByhourlyRate(double $hourlyrate) Return the first ChildmyEmployee filtered by the hourlyrate column
 * @method     ChildmyEmployee findOneByGroup(string $group) Return the first ChildmyEmployee filtered by the group column
 * @method     ChildmyEmployee findOneBySpented(double $spented) Return the first ChildmyEmployee filtered by the spented column *

 * @method     ChildmyEmployee requirePk($key, ConnectionInterface $con = null) Return the ChildmyEmployee by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyEmployee requireOne(ConnectionInterface $con = null) Return the first ChildmyEmployee matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildmyEmployee requireOneById(int $id) Return the first ChildmyEmployee filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyEmployee requireOneBySpeciality(string $speciality) Return the first ChildmyEmployee filtered by the speciality column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyEmployee requireOneByEmployee(string $employee) Return the first ChildmyEmployee filtered by the employee column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyEmployee requireOneByLevel(string $level) Return the first ChildmyEmployee filtered by the level column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyEmployee requireOneByDate(string $data) Return the first ChildmyEmployee filtered by the data column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyEmployee requireOneByDateMonth(string $datemonth) Return the first ChildmyEmployee filtered by the datemonth column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyEmployee requireOneByDateYear(string $dateyear) Return the first ChildmyEmployee filtered by the dateyear column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyEmployee requireOneBySalary(double $salary) Return the first ChildmyEmployee filtered by the salary column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyEmployee requireOneByhourlyRate(double $hourlyrate) Return the first ChildmyEmployee filtered by the hourlyrate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyEmployee requireOneByGroup(string $group) Return the first ChildmyEmployee filtered by the group column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyEmployee requireOneBySpented(double $spented) Return the first ChildmyEmployee filtered by the spented column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildmyEmployee[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildmyEmployee objects based on current ModelCriteria
 * @method     ChildmyEmployee[]|ObjectCollection findById(int $id) Return ChildmyEmployee objects filtered by the id column
 * @method     ChildmyEmployee[]|ObjectCollection findBySpeciality(string $speciality) Return ChildmyEmployee objects filtered by the speciality column
 * @method     ChildmyEmployee[]|ObjectCollection findByEmployee(string $employee) Return ChildmyEmployee objects filtered by the employee column
 * @method     ChildmyEmployee[]|ObjectCollection findByLevel(string $level) Return ChildmyEmployee objects filtered by the level column
 * @method     ChildmyEmployee[]|ObjectCollection findByDate(string $data) Return ChildmyEmployee objects filtered by the data column
 * @method     ChildmyEmployee[]|ObjectCollection findByDateMonth(string $datemonth) Return ChildmyEmployee objects filtered by the datemonth column
 * @method     ChildmyEmployee[]|ObjectCollection findByDateYear(string $dateyear) Return ChildmyEmployee objects filtered by the dateyear column
 * @method     ChildmyEmployee[]|ObjectCollection findBySalary(double $salary) Return ChildmyEmployee objects filtered by the salary column
 * @method     ChildmyEmployee[]|ObjectCollection findByhourlyRate(double $hourlyrate) Return ChildmyEmployee objects filtered by the hourlyrate column
 * @method     ChildmyEmployee[]|ObjectCollection findByGroup(string $group) Return ChildmyEmployee objects filtered by the group column
 * @method     ChildmyEmployee[]|ObjectCollection findBySpented(double $spented) Return ChildmyEmployee objects filtered by the spented column
 * @method     ChildmyEmployee[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class myEmployeeQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\myEmployeeQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'kpidata', $modelName = '\\myEmployee', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildmyEmployeeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildmyEmployeeQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildmyEmployeeQuery) {
            return $criteria;
        }
        $query = new ChildmyEmployeeQuery();
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
     * @return ChildmyEmployee|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(myEmployeeTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = myEmployeeTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildmyEmployee A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, speciality, employee, level, data, datemonth, dateyear, salary, hourlyrate, group, spented FROM myemployee WHERE id = :p0';
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
            /** @var ChildmyEmployee $obj */
            $obj = new ChildmyEmployee();
            $obj->hydrate($row);
            myEmployeeTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildmyEmployee|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildmyEmployeeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(myEmployeeTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildmyEmployeeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(myEmployeeTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildmyEmployeeQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(myEmployeeTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(myEmployeeTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myEmployeeTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the speciality column
     *
     * Example usage:
     * <code>
     * $query->filterBySpeciality('fooValue');   // WHERE speciality = 'fooValue'
     * $query->filterBySpeciality('%fooValue%', Criteria::LIKE); // WHERE speciality LIKE '%fooValue%'
     * </code>
     *
     * @param     string $speciality The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyEmployeeQuery The current query, for fluid interface
     */
    public function filterBySpeciality($speciality = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($speciality)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myEmployeeTableMap::COL_SPECIALITY, $speciality, $comparison);
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
     * @return $this|ChildmyEmployeeQuery The current query, for fluid interface
     */
    public function filterByEmployee($employee = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($employee)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myEmployeeTableMap::COL_EMPLOYEE, $employee, $comparison);
    }

    /**
     * Filter the query on the level column
     *
     * Example usage:
     * <code>
     * $query->filterByLevel('fooValue');   // WHERE level = 'fooValue'
     * $query->filterByLevel('%fooValue%', Criteria::LIKE); // WHERE level LIKE '%fooValue%'
     * </code>
     *
     * @param     string $level The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyEmployeeQuery The current query, for fluid interface
     */
    public function filterByLevel($level = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($level)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myEmployeeTableMap::COL_LEVEL, $level, $comparison);
    }

    /**
     * Filter the query on the data column
     *
     * Example usage:
     * <code>
     * $query->filterByDate('fooValue');   // WHERE data = 'fooValue'
     * $query->filterByDate('%fooValue%', Criteria::LIKE); // WHERE data LIKE '%fooValue%'
     * </code>
     *
     * @param     string $date The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyEmployeeQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($date)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myEmployeeTableMap::COL_DATA, $date, $comparison);
    }

    /**
     * Filter the query on the datemonth column
     *
     * Example usage:
     * <code>
     * $query->filterByDateMonth('fooValue');   // WHERE datemonth = 'fooValue'
     * $query->filterByDateMonth('%fooValue%', Criteria::LIKE); // WHERE datemonth LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dateMonth The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyEmployeeQuery The current query, for fluid interface
     */
    public function filterByDateMonth($dateMonth = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dateMonth)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myEmployeeTableMap::COL_DATEMONTH, $dateMonth, $comparison);
    }

    /**
     * Filter the query on the dateyear column
     *
     * Example usage:
     * <code>
     * $query->filterByDateYear('fooValue');   // WHERE dateyear = 'fooValue'
     * $query->filterByDateYear('%fooValue%', Criteria::LIKE); // WHERE dateyear LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dateYear The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyEmployeeQuery The current query, for fluid interface
     */
    public function filterByDateYear($dateYear = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dateYear)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myEmployeeTableMap::COL_DATEYEAR, $dateYear, $comparison);
    }

    /**
     * Filter the query on the salary column
     *
     * Example usage:
     * <code>
     * $query->filterBySalary(1234); // WHERE salary = 1234
     * $query->filterBySalary(array(12, 34)); // WHERE salary IN (12, 34)
     * $query->filterBySalary(array('min' => 12)); // WHERE salary > 12
     * </code>
     *
     * @param     mixed $salary The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyEmployeeQuery The current query, for fluid interface
     */
    public function filterBySalary($salary = null, $comparison = null)
    {
        if (is_array($salary)) {
            $useMinMax = false;
            if (isset($salary['min'])) {
                $this->addUsingAlias(myEmployeeTableMap::COL_SALARY, $salary['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($salary['max'])) {
                $this->addUsingAlias(myEmployeeTableMap::COL_SALARY, $salary['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myEmployeeTableMap::COL_SALARY, $salary, $comparison);
    }

    /**
     * Filter the query on the hourlyrate column
     *
     * Example usage:
     * <code>
     * $query->filterByhourlyRate(1234); // WHERE hourlyrate = 1234
     * $query->filterByhourlyRate(array(12, 34)); // WHERE hourlyrate IN (12, 34)
     * $query->filterByhourlyRate(array('min' => 12)); // WHERE hourlyrate > 12
     * </code>
     *
     * @param     mixed $hourlyRate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyEmployeeQuery The current query, for fluid interface
     */
    public function filterByhourlyRate($hourlyRate = null, $comparison = null)
    {
        if (is_array($hourlyRate)) {
            $useMinMax = false;
            if (isset($hourlyRate['min'])) {
                $this->addUsingAlias(myEmployeeTableMap::COL_HOURLYRATE, $hourlyRate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($hourlyRate['max'])) {
                $this->addUsingAlias(myEmployeeTableMap::COL_HOURLYRATE, $hourlyRate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myEmployeeTableMap::COL_HOURLYRATE, $hourlyRate, $comparison);
    }

    /**
     * Filter the query on the group column
     *
     * Example usage:
     * <code>
     * $query->filterByGroup('fooValue');   // WHERE group = 'fooValue'
     * $query->filterByGroup('%fooValue%', Criteria::LIKE); // WHERE group LIKE '%fooValue%'
     * </code>
     *
     * @param     string $group The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyEmployeeQuery The current query, for fluid interface
     */
    public function filterByGroup($group = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($group)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myEmployeeTableMap::COL_GROUP, $group, $comparison);
    }

    /**
     * Filter the query on the spented column
     *
     * Example usage:
     * <code>
     * $query->filterBySpented(1234); // WHERE spented = 1234
     * $query->filterBySpented(array(12, 34)); // WHERE spented IN (12, 34)
     * $query->filterBySpented(array('min' => 12)); // WHERE spented > 12
     * </code>
     *
     * @param     mixed $spented The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyEmployeeQuery The current query, for fluid interface
     */
    public function filterBySpented($spented = null, $comparison = null)
    {
        if (is_array($spented)) {
            $useMinMax = false;
            if (isset($spented['min'])) {
                $this->addUsingAlias(myEmployeeTableMap::COL_SPENTED, $spented['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($spented['max'])) {
                $this->addUsingAlias(myEmployeeTableMap::COL_SPENTED, $spented['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myEmployeeTableMap::COL_SPENTED, $spented, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildmyEmployee $myEmployee Object to remove from the list of results
     *
     * @return $this|ChildmyEmployeeQuery The current query, for fluid interface
     */
    public function prune($myEmployee = null)
    {
        if ($myEmployee) {
            $this->addUsingAlias(myEmployeeTableMap::COL_ID, $myEmployee->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the myemployee table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(myEmployeeTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            myEmployeeTableMap::clearInstancePool();
            myEmployeeTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(myEmployeeTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(myEmployeeTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            myEmployeeTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            myEmployeeTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // myEmployeeQuery
