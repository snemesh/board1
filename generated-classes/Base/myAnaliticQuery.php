<?php

namespace Base;

use \myAnalitic as ChildmyAnalitic;
use \myAnaliticQuery as ChildmyAnaliticQuery;
use \Exception;
use \PDO;
use Map\myAnaliticTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'myanalitic' table.
 *
 *
 *
 * @method     ChildmyAnaliticQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildmyAnaliticQuery orderByProjectName($order = Criteria::ASC) Order by the projectname column
 * @method     ChildmyAnaliticQuery orderByIssueKey($order = Criteria::ASC) Order by the issuekey column
 * @method     ChildmyAnaliticQuery orderByInitialEstimate($order = Criteria::ASC) Order by the initialestimate column
 * @method     ChildmyAnaliticQuery orderByNonBil($order = Criteria::ASC) Order by the nonbil column
 * @method     ChildmyAnaliticQuery orderByAssignee($order = Criteria::ASC) Order by the assignee column
 * @method     ChildmyAnaliticQuery orderByEstimatedHoursSum($order = Criteria::ASC) Order by the estimatedhourssum column
 * @method     ChildmyAnaliticQuery orderByLogWorkHoursSum($order = Criteria::ASC) Order by the logworkhourssum column
 * @method     ChildmyAnaliticQuery orderByLogWorkUserName($order = Criteria::ASC) Order by the logworkusername column
 * @method     ChildmyAnaliticQuery orderByLogWorkYear($order = Criteria::ASC) Order by the logworkyear column
 * @method     ChildmyAnaliticQuery orderByLogWorkMonth($order = Criteria::ASC) Order by the logworkmonth column
 * @method     ChildmyAnaliticQuery orderByLogWorkDataTime($order = Criteria::ASC) Order by the logworkdatatime column
 * @method     ChildmyAnaliticQuery orderByLogWorkAge($order = Criteria::ASC) Order by the logworkage column
 * @method     ChildmyAnaliticQuery orderByCountIssues($order = Criteria::ASC) Order by the countissues column
 * @method     ChildmyAnaliticQuery orderByCountIssuesPersent($order = Criteria::ASC) Order by the countissuespersent column
 * @method     ChildmyAnaliticQuery orderByEstimatedHoursSubTask($order = Criteria::ASC) Order by the estimatedhourssubtask column
 * @method     ChildmyAnaliticQuery orderByLogedHours($order = Criteria::ASC) Order by the logedhours column
 * @method     ChildmyAnaliticQuery orderByRemainingHours($order = Criteria::ASC) Order by the remaininghours column
 *
 * @method     ChildmyAnaliticQuery groupById() Group by the id column
 * @method     ChildmyAnaliticQuery groupByProjectName() Group by the projectname column
 * @method     ChildmyAnaliticQuery groupByIssueKey() Group by the issuekey column
 * @method     ChildmyAnaliticQuery groupByInitialEstimate() Group by the initialestimate column
 * @method     ChildmyAnaliticQuery groupByNonBil() Group by the nonbil column
 * @method     ChildmyAnaliticQuery groupByAssignee() Group by the assignee column
 * @method     ChildmyAnaliticQuery groupByEstimatedHoursSum() Group by the estimatedhourssum column
 * @method     ChildmyAnaliticQuery groupByLogWorkHoursSum() Group by the logworkhourssum column
 * @method     ChildmyAnaliticQuery groupByLogWorkUserName() Group by the logworkusername column
 * @method     ChildmyAnaliticQuery groupByLogWorkYear() Group by the logworkyear column
 * @method     ChildmyAnaliticQuery groupByLogWorkMonth() Group by the logworkmonth column
 * @method     ChildmyAnaliticQuery groupByLogWorkDataTime() Group by the logworkdatatime column
 * @method     ChildmyAnaliticQuery groupByLogWorkAge() Group by the logworkage column
 * @method     ChildmyAnaliticQuery groupByCountIssues() Group by the countissues column
 * @method     ChildmyAnaliticQuery groupByCountIssuesPersent() Group by the countissuespersent column
 * @method     ChildmyAnaliticQuery groupByEstimatedHoursSubTask() Group by the estimatedhourssubtask column
 * @method     ChildmyAnaliticQuery groupByLogedHours() Group by the logedhours column
 * @method     ChildmyAnaliticQuery groupByRemainingHours() Group by the remaininghours column
 *
 * @method     ChildmyAnaliticQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildmyAnaliticQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildmyAnaliticQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildmyAnaliticQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildmyAnaliticQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildmyAnaliticQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildmyAnalitic findOne(ConnectionInterface $con = null) Return the first ChildmyAnalitic matching the query
 * @method     ChildmyAnalitic findOneOrCreate(ConnectionInterface $con = null) Return the first ChildmyAnalitic matching the query, or a new ChildmyAnalitic object populated from the query conditions when no match is found
 *
 * @method     ChildmyAnalitic findOneById(int $id) Return the first ChildmyAnalitic filtered by the id column
 * @method     ChildmyAnalitic findOneByProjectName(string $projectname) Return the first ChildmyAnalitic filtered by the projectname column
 * @method     ChildmyAnalitic findOneByIssueKey(string $issuekey) Return the first ChildmyAnalitic filtered by the issuekey column
 * @method     ChildmyAnalitic findOneByInitialEstimate(string $initialestimate) Return the first ChildmyAnalitic filtered by the initialestimate column
 * @method     ChildmyAnalitic findOneByNonBil(string $nonbil) Return the first ChildmyAnalitic filtered by the nonbil column
 * @method     ChildmyAnalitic findOneByAssignee(string $assignee) Return the first ChildmyAnalitic filtered by the assignee column
 * @method     ChildmyAnalitic findOneByEstimatedHoursSum(double $estimatedhourssum) Return the first ChildmyAnalitic filtered by the estimatedhourssum column
 * @method     ChildmyAnalitic findOneByLogWorkHoursSum(double $logworkhourssum) Return the first ChildmyAnalitic filtered by the logworkhourssum column
 * @method     ChildmyAnalitic findOneByLogWorkUserName(string $logworkusername) Return the first ChildmyAnalitic filtered by the logworkusername column
 * @method     ChildmyAnalitic findOneByLogWorkYear(int $logworkyear) Return the first ChildmyAnalitic filtered by the logworkyear column
 * @method     ChildmyAnalitic findOneByLogWorkMonth(int $logworkmonth) Return the first ChildmyAnalitic filtered by the logworkmonth column
 * @method     ChildmyAnalitic findOneByLogWorkDataTime(int $logworkdatatime) Return the first ChildmyAnalitic filtered by the logworkdatatime column
 * @method     ChildmyAnalitic findOneByLogWorkAge(int $logworkage) Return the first ChildmyAnalitic filtered by the logworkage column
 * @method     ChildmyAnalitic findOneByCountIssues(int $countissues) Return the first ChildmyAnalitic filtered by the countissues column
 * @method     ChildmyAnalitic findOneByCountIssuesPersent(double $countissuespersent) Return the first ChildmyAnalitic filtered by the countissuespersent column
 * @method     ChildmyAnalitic findOneByEstimatedHoursSubTask(double $estimatedhourssubtask) Return the first ChildmyAnalitic filtered by the estimatedhourssubtask column
 * @method     ChildmyAnalitic findOneByLogedHours(double $logedhours) Return the first ChildmyAnalitic filtered by the logedhours column
 * @method     ChildmyAnalitic findOneByRemainingHours(double $remaininghours) Return the first ChildmyAnalitic filtered by the remaininghours column *

 * @method     ChildmyAnalitic requirePk($key, ConnectionInterface $con = null) Return the ChildmyAnalitic by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyAnalitic requireOne(ConnectionInterface $con = null) Return the first ChildmyAnalitic matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildmyAnalitic requireOneById(int $id) Return the first ChildmyAnalitic filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyAnalitic requireOneByProjectName(string $projectname) Return the first ChildmyAnalitic filtered by the projectname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyAnalitic requireOneByIssueKey(string $issuekey) Return the first ChildmyAnalitic filtered by the issuekey column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyAnalitic requireOneByInitialEstimate(string $initialestimate) Return the first ChildmyAnalitic filtered by the initialestimate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyAnalitic requireOneByNonBil(string $nonbil) Return the first ChildmyAnalitic filtered by the nonbil column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyAnalitic requireOneByAssignee(string $assignee) Return the first ChildmyAnalitic filtered by the assignee column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyAnalitic requireOneByEstimatedHoursSum(double $estimatedhourssum) Return the first ChildmyAnalitic filtered by the estimatedhourssum column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyAnalitic requireOneByLogWorkHoursSum(double $logworkhourssum) Return the first ChildmyAnalitic filtered by the logworkhourssum column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyAnalitic requireOneByLogWorkUserName(string $logworkusername) Return the first ChildmyAnalitic filtered by the logworkusername column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyAnalitic requireOneByLogWorkYear(int $logworkyear) Return the first ChildmyAnalitic filtered by the logworkyear column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyAnalitic requireOneByLogWorkMonth(int $logworkmonth) Return the first ChildmyAnalitic filtered by the logworkmonth column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyAnalitic requireOneByLogWorkDataTime(int $logworkdatatime) Return the first ChildmyAnalitic filtered by the logworkdatatime column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyAnalitic requireOneByLogWorkAge(int $logworkage) Return the first ChildmyAnalitic filtered by the logworkage column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyAnalitic requireOneByCountIssues(int $countissues) Return the first ChildmyAnalitic filtered by the countissues column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyAnalitic requireOneByCountIssuesPersent(double $countissuespersent) Return the first ChildmyAnalitic filtered by the countissuespersent column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyAnalitic requireOneByEstimatedHoursSubTask(double $estimatedhourssubtask) Return the first ChildmyAnalitic filtered by the estimatedhourssubtask column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyAnalitic requireOneByLogedHours(double $logedhours) Return the first ChildmyAnalitic filtered by the logedhours column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyAnalitic requireOneByRemainingHours(double $remaininghours) Return the first ChildmyAnalitic filtered by the remaininghours column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildmyAnalitic[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildmyAnalitic objects based on current ModelCriteria
 * @method     ChildmyAnalitic[]|ObjectCollection findById(int $id) Return ChildmyAnalitic objects filtered by the id column
 * @method     ChildmyAnalitic[]|ObjectCollection findByProjectName(string $projectname) Return ChildmyAnalitic objects filtered by the projectname column
 * @method     ChildmyAnalitic[]|ObjectCollection findByIssueKey(string $issuekey) Return ChildmyAnalitic objects filtered by the issuekey column
 * @method     ChildmyAnalitic[]|ObjectCollection findByInitialEstimate(string $initialestimate) Return ChildmyAnalitic objects filtered by the initialestimate column
 * @method     ChildmyAnalitic[]|ObjectCollection findByNonBil(string $nonbil) Return ChildmyAnalitic objects filtered by the nonbil column
 * @method     ChildmyAnalitic[]|ObjectCollection findByAssignee(string $assignee) Return ChildmyAnalitic objects filtered by the assignee column
 * @method     ChildmyAnalitic[]|ObjectCollection findByEstimatedHoursSum(double $estimatedhourssum) Return ChildmyAnalitic objects filtered by the estimatedhourssum column
 * @method     ChildmyAnalitic[]|ObjectCollection findByLogWorkHoursSum(double $logworkhourssum) Return ChildmyAnalitic objects filtered by the logworkhourssum column
 * @method     ChildmyAnalitic[]|ObjectCollection findByLogWorkUserName(string $logworkusername) Return ChildmyAnalitic objects filtered by the logworkusername column
 * @method     ChildmyAnalitic[]|ObjectCollection findByLogWorkYear(int $logworkyear) Return ChildmyAnalitic objects filtered by the logworkyear column
 * @method     ChildmyAnalitic[]|ObjectCollection findByLogWorkMonth(int $logworkmonth) Return ChildmyAnalitic objects filtered by the logworkmonth column
 * @method     ChildmyAnalitic[]|ObjectCollection findByLogWorkDataTime(int $logworkdatatime) Return ChildmyAnalitic objects filtered by the logworkdatatime column
 * @method     ChildmyAnalitic[]|ObjectCollection findByLogWorkAge(int $logworkage) Return ChildmyAnalitic objects filtered by the logworkage column
 * @method     ChildmyAnalitic[]|ObjectCollection findByCountIssues(int $countissues) Return ChildmyAnalitic objects filtered by the countissues column
 * @method     ChildmyAnalitic[]|ObjectCollection findByCountIssuesPersent(double $countissuespersent) Return ChildmyAnalitic objects filtered by the countissuespersent column
 * @method     ChildmyAnalitic[]|ObjectCollection findByEstimatedHoursSubTask(double $estimatedhourssubtask) Return ChildmyAnalitic objects filtered by the estimatedhourssubtask column
 * @method     ChildmyAnalitic[]|ObjectCollection findByLogedHours(double $logedhours) Return ChildmyAnalitic objects filtered by the logedhours column
 * @method     ChildmyAnalitic[]|ObjectCollection findByRemainingHours(double $remaininghours) Return ChildmyAnalitic objects filtered by the remaininghours column
 * @method     ChildmyAnalitic[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class myAnaliticQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\myAnaliticQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'kpidata', $modelName = '\\myAnalitic', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildmyAnaliticQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildmyAnaliticQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildmyAnaliticQuery) {
            return $criteria;
        }
        $query = new ChildmyAnaliticQuery();
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
     * @return ChildmyAnalitic|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(myAnaliticTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = myAnaliticTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildmyAnalitic A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, projectname, issuekey, initialestimate, nonbil, assignee, estimatedhourssum, logworkhourssum, logworkusername, logworkyear, logworkmonth, logworkdatatime, logworkage, countissues, countissuespersent, estimatedhourssubtask, logedhours, remaininghours FROM myanalitic WHERE id = :p0';
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
            /** @var ChildmyAnalitic $obj */
            $obj = new ChildmyAnalitic();
            $obj->hydrate($row);
            myAnaliticTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildmyAnalitic|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildmyAnaliticQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(myAnaliticTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildmyAnaliticQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(myAnaliticTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildmyAnaliticQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(myAnaliticTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(myAnaliticTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myAnaliticTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildmyAnaliticQuery The current query, for fluid interface
     */
    public function filterByProjectName($projectName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($projectName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myAnaliticTableMap::COL_PROJECTNAME, $projectName, $comparison);
    }

    /**
     * Filter the query on the issuekey column
     *
     * Example usage:
     * <code>
     * $query->filterByIssueKey('fooValue');   // WHERE issuekey = 'fooValue'
     * $query->filterByIssueKey('%fooValue%', Criteria::LIKE); // WHERE issuekey LIKE '%fooValue%'
     * </code>
     *
     * @param     string $issueKey The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyAnaliticQuery The current query, for fluid interface
     */
    public function filterByIssueKey($issueKey = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($issueKey)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myAnaliticTableMap::COL_ISSUEKEY, $issueKey, $comparison);
    }

    /**
     * Filter the query on the initialestimate column
     *
     * Example usage:
     * <code>
     * $query->filterByInitialEstimate('fooValue');   // WHERE initialestimate = 'fooValue'
     * $query->filterByInitialEstimate('%fooValue%', Criteria::LIKE); // WHERE initialestimate LIKE '%fooValue%'
     * </code>
     *
     * @param     string $initialEstimate The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyAnaliticQuery The current query, for fluid interface
     */
    public function filterByInitialEstimate($initialEstimate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($initialEstimate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myAnaliticTableMap::COL_INITIALESTIMATE, $initialEstimate, $comparison);
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
     * @return $this|ChildmyAnaliticQuery The current query, for fluid interface
     */
    public function filterByNonBil($nonBil = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nonBil)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myAnaliticTableMap::COL_NONBIL, $nonBil, $comparison);
    }

    /**
     * Filter the query on the assignee column
     *
     * Example usage:
     * <code>
     * $query->filterByAssignee('fooValue');   // WHERE assignee = 'fooValue'
     * $query->filterByAssignee('%fooValue%', Criteria::LIKE); // WHERE assignee LIKE '%fooValue%'
     * </code>
     *
     * @param     string $assignee The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyAnaliticQuery The current query, for fluid interface
     */
    public function filterByAssignee($assignee = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($assignee)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myAnaliticTableMap::COL_ASSIGNEE, $assignee, $comparison);
    }

    /**
     * Filter the query on the estimatedhourssum column
     *
     * Example usage:
     * <code>
     * $query->filterByEstimatedHoursSum(1234); // WHERE estimatedhourssum = 1234
     * $query->filterByEstimatedHoursSum(array(12, 34)); // WHERE estimatedhourssum IN (12, 34)
     * $query->filterByEstimatedHoursSum(array('min' => 12)); // WHERE estimatedhourssum > 12
     * </code>
     *
     * @param     mixed $estimatedHoursSum The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyAnaliticQuery The current query, for fluid interface
     */
    public function filterByEstimatedHoursSum($estimatedHoursSum = null, $comparison = null)
    {
        if (is_array($estimatedHoursSum)) {
            $useMinMax = false;
            if (isset($estimatedHoursSum['min'])) {
                $this->addUsingAlias(myAnaliticTableMap::COL_ESTIMATEDHOURSSUM, $estimatedHoursSum['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($estimatedHoursSum['max'])) {
                $this->addUsingAlias(myAnaliticTableMap::COL_ESTIMATEDHOURSSUM, $estimatedHoursSum['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myAnaliticTableMap::COL_ESTIMATEDHOURSSUM, $estimatedHoursSum, $comparison);
    }

    /**
     * Filter the query on the logworkhourssum column
     *
     * Example usage:
     * <code>
     * $query->filterByLogWorkHoursSum(1234); // WHERE logworkhourssum = 1234
     * $query->filterByLogWorkHoursSum(array(12, 34)); // WHERE logworkhourssum IN (12, 34)
     * $query->filterByLogWorkHoursSum(array('min' => 12)); // WHERE logworkhourssum > 12
     * </code>
     *
     * @param     mixed $logWorkHoursSum The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyAnaliticQuery The current query, for fluid interface
     */
    public function filterByLogWorkHoursSum($logWorkHoursSum = null, $comparison = null)
    {
        if (is_array($logWorkHoursSum)) {
            $useMinMax = false;
            if (isset($logWorkHoursSum['min'])) {
                $this->addUsingAlias(myAnaliticTableMap::COL_LOGWORKHOURSSUM, $logWorkHoursSum['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($logWorkHoursSum['max'])) {
                $this->addUsingAlias(myAnaliticTableMap::COL_LOGWORKHOURSSUM, $logWorkHoursSum['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myAnaliticTableMap::COL_LOGWORKHOURSSUM, $logWorkHoursSum, $comparison);
    }

    /**
     * Filter the query on the logworkusername column
     *
     * Example usage:
     * <code>
     * $query->filterByLogWorkUserName('fooValue');   // WHERE logworkusername = 'fooValue'
     * $query->filterByLogWorkUserName('%fooValue%', Criteria::LIKE); // WHERE logworkusername LIKE '%fooValue%'
     * </code>
     *
     * @param     string $logWorkUserName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyAnaliticQuery The current query, for fluid interface
     */
    public function filterByLogWorkUserName($logWorkUserName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($logWorkUserName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myAnaliticTableMap::COL_LOGWORKUSERNAME, $logWorkUserName, $comparison);
    }

    /**
     * Filter the query on the logworkyear column
     *
     * Example usage:
     * <code>
     * $query->filterByLogWorkYear(1234); // WHERE logworkyear = 1234
     * $query->filterByLogWorkYear(array(12, 34)); // WHERE logworkyear IN (12, 34)
     * $query->filterByLogWorkYear(array('min' => 12)); // WHERE logworkyear > 12
     * </code>
     *
     * @param     mixed $logWorkYear The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyAnaliticQuery The current query, for fluid interface
     */
    public function filterByLogWorkYear($logWorkYear = null, $comparison = null)
    {
        if (is_array($logWorkYear)) {
            $useMinMax = false;
            if (isset($logWorkYear['min'])) {
                $this->addUsingAlias(myAnaliticTableMap::COL_LOGWORKYEAR, $logWorkYear['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($logWorkYear['max'])) {
                $this->addUsingAlias(myAnaliticTableMap::COL_LOGWORKYEAR, $logWorkYear['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myAnaliticTableMap::COL_LOGWORKYEAR, $logWorkYear, $comparison);
    }

    /**
     * Filter the query on the logworkmonth column
     *
     * Example usage:
     * <code>
     * $query->filterByLogWorkMonth(1234); // WHERE logworkmonth = 1234
     * $query->filterByLogWorkMonth(array(12, 34)); // WHERE logworkmonth IN (12, 34)
     * $query->filterByLogWorkMonth(array('min' => 12)); // WHERE logworkmonth > 12
     * </code>
     *
     * @param     mixed $logWorkMonth The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyAnaliticQuery The current query, for fluid interface
     */
    public function filterByLogWorkMonth($logWorkMonth = null, $comparison = null)
    {
        if (is_array($logWorkMonth)) {
            $useMinMax = false;
            if (isset($logWorkMonth['min'])) {
                $this->addUsingAlias(myAnaliticTableMap::COL_LOGWORKMONTH, $logWorkMonth['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($logWorkMonth['max'])) {
                $this->addUsingAlias(myAnaliticTableMap::COL_LOGWORKMONTH, $logWorkMonth['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myAnaliticTableMap::COL_LOGWORKMONTH, $logWorkMonth, $comparison);
    }

    /**
     * Filter the query on the logworkdatatime column
     *
     * Example usage:
     * <code>
     * $query->filterByLogWorkDataTime(1234); // WHERE logworkdatatime = 1234
     * $query->filterByLogWorkDataTime(array(12, 34)); // WHERE logworkdatatime IN (12, 34)
     * $query->filterByLogWorkDataTime(array('min' => 12)); // WHERE logworkdatatime > 12
     * </code>
     *
     * @param     mixed $logWorkDataTime The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyAnaliticQuery The current query, for fluid interface
     */
    public function filterByLogWorkDataTime($logWorkDataTime = null, $comparison = null)
    {
        if (is_array($logWorkDataTime)) {
            $useMinMax = false;
            if (isset($logWorkDataTime['min'])) {
                $this->addUsingAlias(myAnaliticTableMap::COL_LOGWORKDATATIME, $logWorkDataTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($logWorkDataTime['max'])) {
                $this->addUsingAlias(myAnaliticTableMap::COL_LOGWORKDATATIME, $logWorkDataTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myAnaliticTableMap::COL_LOGWORKDATATIME, $logWorkDataTime, $comparison);
    }

    /**
     * Filter the query on the logworkage column
     *
     * Example usage:
     * <code>
     * $query->filterByLogWorkAge(1234); // WHERE logworkage = 1234
     * $query->filterByLogWorkAge(array(12, 34)); // WHERE logworkage IN (12, 34)
     * $query->filterByLogWorkAge(array('min' => 12)); // WHERE logworkage > 12
     * </code>
     *
     * @param     mixed $logWorkAge The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyAnaliticQuery The current query, for fluid interface
     */
    public function filterByLogWorkAge($logWorkAge = null, $comparison = null)
    {
        if (is_array($logWorkAge)) {
            $useMinMax = false;
            if (isset($logWorkAge['min'])) {
                $this->addUsingAlias(myAnaliticTableMap::COL_LOGWORKAGE, $logWorkAge['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($logWorkAge['max'])) {
                $this->addUsingAlias(myAnaliticTableMap::COL_LOGWORKAGE, $logWorkAge['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myAnaliticTableMap::COL_LOGWORKAGE, $logWorkAge, $comparison);
    }

    /**
     * Filter the query on the countissues column
     *
     * Example usage:
     * <code>
     * $query->filterByCountIssues(1234); // WHERE countissues = 1234
     * $query->filterByCountIssues(array(12, 34)); // WHERE countissues IN (12, 34)
     * $query->filterByCountIssues(array('min' => 12)); // WHERE countissues > 12
     * </code>
     *
     * @param     mixed $countIssues The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyAnaliticQuery The current query, for fluid interface
     */
    public function filterByCountIssues($countIssues = null, $comparison = null)
    {
        if (is_array($countIssues)) {
            $useMinMax = false;
            if (isset($countIssues['min'])) {
                $this->addUsingAlias(myAnaliticTableMap::COL_COUNTISSUES, $countIssues['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($countIssues['max'])) {
                $this->addUsingAlias(myAnaliticTableMap::COL_COUNTISSUES, $countIssues['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myAnaliticTableMap::COL_COUNTISSUES, $countIssues, $comparison);
    }

    /**
     * Filter the query on the countissuespersent column
     *
     * Example usage:
     * <code>
     * $query->filterByCountIssuesPersent(1234); // WHERE countissuespersent = 1234
     * $query->filterByCountIssuesPersent(array(12, 34)); // WHERE countissuespersent IN (12, 34)
     * $query->filterByCountIssuesPersent(array('min' => 12)); // WHERE countissuespersent > 12
     * </code>
     *
     * @param     mixed $countIssuesPersent The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyAnaliticQuery The current query, for fluid interface
     */
    public function filterByCountIssuesPersent($countIssuesPersent = null, $comparison = null)
    {
        if (is_array($countIssuesPersent)) {
            $useMinMax = false;
            if (isset($countIssuesPersent['min'])) {
                $this->addUsingAlias(myAnaliticTableMap::COL_COUNTISSUESPERSENT, $countIssuesPersent['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($countIssuesPersent['max'])) {
                $this->addUsingAlias(myAnaliticTableMap::COL_COUNTISSUESPERSENT, $countIssuesPersent['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myAnaliticTableMap::COL_COUNTISSUESPERSENT, $countIssuesPersent, $comparison);
    }

    /**
     * Filter the query on the estimatedhourssubtask column
     *
     * Example usage:
     * <code>
     * $query->filterByEstimatedHoursSubTask(1234); // WHERE estimatedhourssubtask = 1234
     * $query->filterByEstimatedHoursSubTask(array(12, 34)); // WHERE estimatedhourssubtask IN (12, 34)
     * $query->filterByEstimatedHoursSubTask(array('min' => 12)); // WHERE estimatedhourssubtask > 12
     * </code>
     *
     * @param     mixed $estimatedHoursSubTask The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyAnaliticQuery The current query, for fluid interface
     */
    public function filterByEstimatedHoursSubTask($estimatedHoursSubTask = null, $comparison = null)
    {
        if (is_array($estimatedHoursSubTask)) {
            $useMinMax = false;
            if (isset($estimatedHoursSubTask['min'])) {
                $this->addUsingAlias(myAnaliticTableMap::COL_ESTIMATEDHOURSSUBTASK, $estimatedHoursSubTask['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($estimatedHoursSubTask['max'])) {
                $this->addUsingAlias(myAnaliticTableMap::COL_ESTIMATEDHOURSSUBTASK, $estimatedHoursSubTask['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myAnaliticTableMap::COL_ESTIMATEDHOURSSUBTASK, $estimatedHoursSubTask, $comparison);
    }

    /**
     * Filter the query on the logedhours column
     *
     * Example usage:
     * <code>
     * $query->filterByLogedHours(1234); // WHERE logedhours = 1234
     * $query->filterByLogedHours(array(12, 34)); // WHERE logedhours IN (12, 34)
     * $query->filterByLogedHours(array('min' => 12)); // WHERE logedhours > 12
     * </code>
     *
     * @param     mixed $logedHours The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyAnaliticQuery The current query, for fluid interface
     */
    public function filterByLogedHours($logedHours = null, $comparison = null)
    {
        if (is_array($logedHours)) {
            $useMinMax = false;
            if (isset($logedHours['min'])) {
                $this->addUsingAlias(myAnaliticTableMap::COL_LOGEDHOURS, $logedHours['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($logedHours['max'])) {
                $this->addUsingAlias(myAnaliticTableMap::COL_LOGEDHOURS, $logedHours['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myAnaliticTableMap::COL_LOGEDHOURS, $logedHours, $comparison);
    }

    /**
     * Filter the query on the remaininghours column
     *
     * Example usage:
     * <code>
     * $query->filterByRemainingHours(1234); // WHERE remaininghours = 1234
     * $query->filterByRemainingHours(array(12, 34)); // WHERE remaininghours IN (12, 34)
     * $query->filterByRemainingHours(array('min' => 12)); // WHERE remaininghours > 12
     * </code>
     *
     * @param     mixed $remainingHours The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyAnaliticQuery The current query, for fluid interface
     */
    public function filterByRemainingHours($remainingHours = null, $comparison = null)
    {
        if (is_array($remainingHours)) {
            $useMinMax = false;
            if (isset($remainingHours['min'])) {
                $this->addUsingAlias(myAnaliticTableMap::COL_REMAININGHOURS, $remainingHours['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($remainingHours['max'])) {
                $this->addUsingAlias(myAnaliticTableMap::COL_REMAININGHOURS, $remainingHours['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myAnaliticTableMap::COL_REMAININGHOURS, $remainingHours, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildmyAnalitic $myAnalitic Object to remove from the list of results
     *
     * @return $this|ChildmyAnaliticQuery The current query, for fluid interface
     */
    public function prune($myAnalitic = null)
    {
        if ($myAnalitic) {
            $this->addUsingAlias(myAnaliticTableMap::COL_ID, $myAnalitic->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the myanalitic table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(myAnaliticTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            myAnaliticTableMap::clearInstancePool();
            myAnaliticTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(myAnaliticTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(myAnaliticTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            myAnaliticTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            myAnaliticTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // myAnaliticQuery
