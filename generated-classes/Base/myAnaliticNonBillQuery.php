<?php

namespace Base;

use \myAnaliticNonBill as ChildmyAnaliticNonBill;
use \myAnaliticNonBillQuery as ChildmyAnaliticNonBillQuery;
use \Exception;
use \PDO;
use Map\myAnaliticNonBillTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'myanaliticnonbill' table.
 *
 *
 *
 * @method     ChildmyAnaliticNonBillQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildmyAnaliticNonBillQuery orderByProjectName($order = Criteria::ASC) Order by the projectname column
 * @method     ChildmyAnaliticNonBillQuery orderByIssueKey($order = Criteria::ASC) Order by the issuekey column
 * @method     ChildmyAnaliticNonBillQuery orderByInitialEstimate($order = Criteria::ASC) Order by the initialestimate column
 * @method     ChildmyAnaliticNonBillQuery orderByNonBil($order = Criteria::ASC) Order by the nonbil column
 * @method     ChildmyAnaliticNonBillQuery orderByAssignee($order = Criteria::ASC) Order by the assignee column
 * @method     ChildmyAnaliticNonBillQuery orderByEstimatedHoursSum($order = Criteria::ASC) Order by the estimatedhourssum column
 * @method     ChildmyAnaliticNonBillQuery orderByWorkLogHoursSum($order = Criteria::ASC) Order by the workloghourssum column
 * @method     ChildmyAnaliticNonBillQuery orderByWorkLogUserName($order = Criteria::ASC) Order by the worklogusername column
 * @method     ChildmyAnaliticNonBillQuery orderByWorkLogLogin($order = Criteria::ASC) Order by the workloglogin column
 * @method     ChildmyAnaliticNonBillQuery orderByWorkLogYear($order = Criteria::ASC) Order by the worklogkyear column
 * @method     ChildmyAnaliticNonBillQuery orderByWorkLogMonth($order = Criteria::ASC) Order by the worklogmonth column
 * @method     ChildmyAnaliticNonBillQuery orderByWorkLogDataTime($order = Criteria::ASC) Order by the worklogdatatime column
 * @method     ChildmyAnaliticNonBillQuery orderByWorkLogYearMonth($order = Criteria::ASC) Order by the worklogyearmonth column
 * @method     ChildmyAnaliticNonBillQuery orderByWorkLogAge($order = Criteria::ASC) Order by the worklogage column
 * @method     ChildmyAnaliticNonBillQuery orderByCountIssues($order = Criteria::ASC) Order by the countissues column
 * @method     ChildmyAnaliticNonBillQuery orderByCountIssuesPersent($order = Criteria::ASC) Order by the countissuespersent column
 * @method     ChildmyAnaliticNonBillQuery orderByEstimatedHoursSubTask($order = Criteria::ASC) Order by the estimatedhourssubtask column
 * @method     ChildmyAnaliticNonBillQuery orderByRemainingHours($order = Criteria::ASC) Order by the remaininghours column
 *
 * @method     ChildmyAnaliticNonBillQuery groupById() Group by the id column
 * @method     ChildmyAnaliticNonBillQuery groupByProjectName() Group by the projectname column
 * @method     ChildmyAnaliticNonBillQuery groupByIssueKey() Group by the issuekey column
 * @method     ChildmyAnaliticNonBillQuery groupByInitialEstimate() Group by the initialestimate column
 * @method     ChildmyAnaliticNonBillQuery groupByNonBil() Group by the nonbil column
 * @method     ChildmyAnaliticNonBillQuery groupByAssignee() Group by the assignee column
 * @method     ChildmyAnaliticNonBillQuery groupByEstimatedHoursSum() Group by the estimatedhourssum column
 * @method     ChildmyAnaliticNonBillQuery groupByWorkLogHoursSum() Group by the workloghourssum column
 * @method     ChildmyAnaliticNonBillQuery groupByWorkLogUserName() Group by the worklogusername column
 * @method     ChildmyAnaliticNonBillQuery groupByWorkLogLogin() Group by the workloglogin column
 * @method     ChildmyAnaliticNonBillQuery groupByWorkLogYear() Group by the worklogkyear column
 * @method     ChildmyAnaliticNonBillQuery groupByWorkLogMonth() Group by the worklogmonth column
 * @method     ChildmyAnaliticNonBillQuery groupByWorkLogDataTime() Group by the worklogdatatime column
 * @method     ChildmyAnaliticNonBillQuery groupByWorkLogYearMonth() Group by the worklogyearmonth column
 * @method     ChildmyAnaliticNonBillQuery groupByWorkLogAge() Group by the worklogage column
 * @method     ChildmyAnaliticNonBillQuery groupByCountIssues() Group by the countissues column
 * @method     ChildmyAnaliticNonBillQuery groupByCountIssuesPersent() Group by the countissuespersent column
 * @method     ChildmyAnaliticNonBillQuery groupByEstimatedHoursSubTask() Group by the estimatedhourssubtask column
 * @method     ChildmyAnaliticNonBillQuery groupByRemainingHours() Group by the remaininghours column
 *
 * @method     ChildmyAnaliticNonBillQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildmyAnaliticNonBillQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildmyAnaliticNonBillQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildmyAnaliticNonBillQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildmyAnaliticNonBillQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildmyAnaliticNonBillQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildmyAnaliticNonBill findOne(ConnectionInterface $con = null) Return the first ChildmyAnaliticNonBill matching the query
 * @method     ChildmyAnaliticNonBill findOneOrCreate(ConnectionInterface $con = null) Return the first ChildmyAnaliticNonBill matching the query, or a new ChildmyAnaliticNonBill object populated from the query conditions when no match is found
 *
 * @method     ChildmyAnaliticNonBill findOneById(int $id) Return the first ChildmyAnaliticNonBill filtered by the id column
 * @method     ChildmyAnaliticNonBill findOneByProjectName(string $projectname) Return the first ChildmyAnaliticNonBill filtered by the projectname column
 * @method     ChildmyAnaliticNonBill findOneByIssueKey(string $issuekey) Return the first ChildmyAnaliticNonBill filtered by the issuekey column
 * @method     ChildmyAnaliticNonBill findOneByInitialEstimate(string $initialestimate) Return the first ChildmyAnaliticNonBill filtered by the initialestimate column
 * @method     ChildmyAnaliticNonBill findOneByNonBil(string $nonbil) Return the first ChildmyAnaliticNonBill filtered by the nonbil column
 * @method     ChildmyAnaliticNonBill findOneByAssignee(string $assignee) Return the first ChildmyAnaliticNonBill filtered by the assignee column
 * @method     ChildmyAnaliticNonBill findOneByEstimatedHoursSum(double $estimatedhourssum) Return the first ChildmyAnaliticNonBill filtered by the estimatedhourssum column
 * @method     ChildmyAnaliticNonBill findOneByWorkLogHoursSum(double $workloghourssum) Return the first ChildmyAnaliticNonBill filtered by the workloghourssum column
 * @method     ChildmyAnaliticNonBill findOneByWorkLogUserName(string $worklogusername) Return the first ChildmyAnaliticNonBill filtered by the worklogusername column
 * @method     ChildmyAnaliticNonBill findOneByWorkLogLogin(string $workloglogin) Return the first ChildmyAnaliticNonBill filtered by the workloglogin column
 * @method     ChildmyAnaliticNonBill findOneByWorkLogYear(int $worklogkyear) Return the first ChildmyAnaliticNonBill filtered by the worklogkyear column
 * @method     ChildmyAnaliticNonBill findOneByWorkLogMonth(int $worklogmonth) Return the first ChildmyAnaliticNonBill filtered by the worklogmonth column
 * @method     ChildmyAnaliticNonBill findOneByWorkLogDataTime(string $worklogdatatime) Return the first ChildmyAnaliticNonBill filtered by the worklogdatatime column
 * @method     ChildmyAnaliticNonBill findOneByWorkLogYearMonth(string $worklogyearmonth) Return the first ChildmyAnaliticNonBill filtered by the worklogyearmonth column
 * @method     ChildmyAnaliticNonBill findOneByWorkLogAge(int $worklogage) Return the first ChildmyAnaliticNonBill filtered by the worklogage column
 * @method     ChildmyAnaliticNonBill findOneByCountIssues(int $countissues) Return the first ChildmyAnaliticNonBill filtered by the countissues column
 * @method     ChildmyAnaliticNonBill findOneByCountIssuesPersent(double $countissuespersent) Return the first ChildmyAnaliticNonBill filtered by the countissuespersent column
 * @method     ChildmyAnaliticNonBill findOneByEstimatedHoursSubTask(double $estimatedhourssubtask) Return the first ChildmyAnaliticNonBill filtered by the estimatedhourssubtask column
 * @method     ChildmyAnaliticNonBill findOneByRemainingHours(double $remaininghours) Return the first ChildmyAnaliticNonBill filtered by the remaininghours column *

 * @method     ChildmyAnaliticNonBill requirePk($key, ConnectionInterface $con = null) Return the ChildmyAnaliticNonBill by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyAnaliticNonBill requireOne(ConnectionInterface $con = null) Return the first ChildmyAnaliticNonBill matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildmyAnaliticNonBill requireOneById(int $id) Return the first ChildmyAnaliticNonBill filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyAnaliticNonBill requireOneByProjectName(string $projectname) Return the first ChildmyAnaliticNonBill filtered by the projectname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyAnaliticNonBill requireOneByIssueKey(string $issuekey) Return the first ChildmyAnaliticNonBill filtered by the issuekey column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyAnaliticNonBill requireOneByInitialEstimate(string $initialestimate) Return the first ChildmyAnaliticNonBill filtered by the initialestimate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyAnaliticNonBill requireOneByNonBil(string $nonbil) Return the first ChildmyAnaliticNonBill filtered by the nonbil column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyAnaliticNonBill requireOneByAssignee(string $assignee) Return the first ChildmyAnaliticNonBill filtered by the assignee column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyAnaliticNonBill requireOneByEstimatedHoursSum(double $estimatedhourssum) Return the first ChildmyAnaliticNonBill filtered by the estimatedhourssum column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyAnaliticNonBill requireOneByWorkLogHoursSum(double $workloghourssum) Return the first ChildmyAnaliticNonBill filtered by the workloghourssum column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyAnaliticNonBill requireOneByWorkLogUserName(string $worklogusername) Return the first ChildmyAnaliticNonBill filtered by the worklogusername column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyAnaliticNonBill requireOneByWorkLogLogin(string $workloglogin) Return the first ChildmyAnaliticNonBill filtered by the workloglogin column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyAnaliticNonBill requireOneByWorkLogYear(int $worklogkyear) Return the first ChildmyAnaliticNonBill filtered by the worklogkyear column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyAnaliticNonBill requireOneByWorkLogMonth(int $worklogmonth) Return the first ChildmyAnaliticNonBill filtered by the worklogmonth column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyAnaliticNonBill requireOneByWorkLogDataTime(string $worklogdatatime) Return the first ChildmyAnaliticNonBill filtered by the worklogdatatime column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyAnaliticNonBill requireOneByWorkLogYearMonth(string $worklogyearmonth) Return the first ChildmyAnaliticNonBill filtered by the worklogyearmonth column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyAnaliticNonBill requireOneByWorkLogAge(int $worklogage) Return the first ChildmyAnaliticNonBill filtered by the worklogage column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyAnaliticNonBill requireOneByCountIssues(int $countissues) Return the first ChildmyAnaliticNonBill filtered by the countissues column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyAnaliticNonBill requireOneByCountIssuesPersent(double $countissuespersent) Return the first ChildmyAnaliticNonBill filtered by the countissuespersent column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyAnaliticNonBill requireOneByEstimatedHoursSubTask(double $estimatedhourssubtask) Return the first ChildmyAnaliticNonBill filtered by the estimatedhourssubtask column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildmyAnaliticNonBill requireOneByRemainingHours(double $remaininghours) Return the first ChildmyAnaliticNonBill filtered by the remaininghours column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildmyAnaliticNonBill[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildmyAnaliticNonBill objects based on current ModelCriteria
 * @method     ChildmyAnaliticNonBill[]|ObjectCollection findById(int $id) Return ChildmyAnaliticNonBill objects filtered by the id column
 * @method     ChildmyAnaliticNonBill[]|ObjectCollection findByProjectName(string $projectname) Return ChildmyAnaliticNonBill objects filtered by the projectname column
 * @method     ChildmyAnaliticNonBill[]|ObjectCollection findByIssueKey(string $issuekey) Return ChildmyAnaliticNonBill objects filtered by the issuekey column
 * @method     ChildmyAnaliticNonBill[]|ObjectCollection findByInitialEstimate(string $initialestimate) Return ChildmyAnaliticNonBill objects filtered by the initialestimate column
 * @method     ChildmyAnaliticNonBill[]|ObjectCollection findByNonBil(string $nonbil) Return ChildmyAnaliticNonBill objects filtered by the nonbil column
 * @method     ChildmyAnaliticNonBill[]|ObjectCollection findByAssignee(string $assignee) Return ChildmyAnaliticNonBill objects filtered by the assignee column
 * @method     ChildmyAnaliticNonBill[]|ObjectCollection findByEstimatedHoursSum(double $estimatedhourssum) Return ChildmyAnaliticNonBill objects filtered by the estimatedhourssum column
 * @method     ChildmyAnaliticNonBill[]|ObjectCollection findByWorkLogHoursSum(double $workloghourssum) Return ChildmyAnaliticNonBill objects filtered by the workloghourssum column
 * @method     ChildmyAnaliticNonBill[]|ObjectCollection findByWorkLogUserName(string $worklogusername) Return ChildmyAnaliticNonBill objects filtered by the worklogusername column
 * @method     ChildmyAnaliticNonBill[]|ObjectCollection findByWorkLogLogin(string $workloglogin) Return ChildmyAnaliticNonBill objects filtered by the workloglogin column
 * @method     ChildmyAnaliticNonBill[]|ObjectCollection findByWorkLogYear(int $worklogkyear) Return ChildmyAnaliticNonBill objects filtered by the worklogkyear column
 * @method     ChildmyAnaliticNonBill[]|ObjectCollection findByWorkLogMonth(int $worklogmonth) Return ChildmyAnaliticNonBill objects filtered by the worklogmonth column
 * @method     ChildmyAnaliticNonBill[]|ObjectCollection findByWorkLogDataTime(string $worklogdatatime) Return ChildmyAnaliticNonBill objects filtered by the worklogdatatime column
 * @method     ChildmyAnaliticNonBill[]|ObjectCollection findByWorkLogYearMonth(string $worklogyearmonth) Return ChildmyAnaliticNonBill objects filtered by the worklogyearmonth column
 * @method     ChildmyAnaliticNonBill[]|ObjectCollection findByWorkLogAge(int $worklogage) Return ChildmyAnaliticNonBill objects filtered by the worklogage column
 * @method     ChildmyAnaliticNonBill[]|ObjectCollection findByCountIssues(int $countissues) Return ChildmyAnaliticNonBill objects filtered by the countissues column
 * @method     ChildmyAnaliticNonBill[]|ObjectCollection findByCountIssuesPersent(double $countissuespersent) Return ChildmyAnaliticNonBill objects filtered by the countissuespersent column
 * @method     ChildmyAnaliticNonBill[]|ObjectCollection findByEstimatedHoursSubTask(double $estimatedhourssubtask) Return ChildmyAnaliticNonBill objects filtered by the estimatedhourssubtask column
 * @method     ChildmyAnaliticNonBill[]|ObjectCollection findByRemainingHours(double $remaininghours) Return ChildmyAnaliticNonBill objects filtered by the remaininghours column
 * @method     ChildmyAnaliticNonBill[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class myAnaliticNonBillQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\myAnaliticNonBillQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'kpidata', $modelName = '\\myAnaliticNonBill', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildmyAnaliticNonBillQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildmyAnaliticNonBillQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildmyAnaliticNonBillQuery) {
            return $criteria;
        }
        $query = new ChildmyAnaliticNonBillQuery();
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
     * @return ChildmyAnaliticNonBill|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(myAnaliticNonBillTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = myAnaliticNonBillTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildmyAnaliticNonBill A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, projectname, issuekey, initialestimate, nonbil, assignee, estimatedhourssum, workloghourssum, worklogusername, workloglogin, worklogkyear, worklogmonth, worklogdatatime, worklogyearmonth, worklogage, countissues, countissuespersent, estimatedhourssubtask, remaininghours FROM myanaliticnonbill WHERE id = :p0';
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
            /** @var ChildmyAnaliticNonBill $obj */
            $obj = new ChildmyAnaliticNonBill();
            $obj->hydrate($row);
            myAnaliticNonBillTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildmyAnaliticNonBill|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildmyAnaliticNonBillQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(myAnaliticNonBillTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildmyAnaliticNonBillQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(myAnaliticNonBillTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildmyAnaliticNonBillQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(myAnaliticNonBillTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(myAnaliticNonBillTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myAnaliticNonBillTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildmyAnaliticNonBillQuery The current query, for fluid interface
     */
    public function filterByProjectName($projectName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($projectName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myAnaliticNonBillTableMap::COL_PROJECTNAME, $projectName, $comparison);
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
     * @return $this|ChildmyAnaliticNonBillQuery The current query, for fluid interface
     */
    public function filterByIssueKey($issueKey = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($issueKey)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myAnaliticNonBillTableMap::COL_ISSUEKEY, $issueKey, $comparison);
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
     * @return $this|ChildmyAnaliticNonBillQuery The current query, for fluid interface
     */
    public function filterByInitialEstimate($initialEstimate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($initialEstimate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myAnaliticNonBillTableMap::COL_INITIALESTIMATE, $initialEstimate, $comparison);
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
     * @return $this|ChildmyAnaliticNonBillQuery The current query, for fluid interface
     */
    public function filterByNonBil($nonBil = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nonBil)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myAnaliticNonBillTableMap::COL_NONBIL, $nonBil, $comparison);
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
     * @return $this|ChildmyAnaliticNonBillQuery The current query, for fluid interface
     */
    public function filterByAssignee($assignee = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($assignee)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myAnaliticNonBillTableMap::COL_ASSIGNEE, $assignee, $comparison);
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
     * @return $this|ChildmyAnaliticNonBillQuery The current query, for fluid interface
     */
    public function filterByEstimatedHoursSum($estimatedHoursSum = null, $comparison = null)
    {
        if (is_array($estimatedHoursSum)) {
            $useMinMax = false;
            if (isset($estimatedHoursSum['min'])) {
                $this->addUsingAlias(myAnaliticNonBillTableMap::COL_ESTIMATEDHOURSSUM, $estimatedHoursSum['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($estimatedHoursSum['max'])) {
                $this->addUsingAlias(myAnaliticNonBillTableMap::COL_ESTIMATEDHOURSSUM, $estimatedHoursSum['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myAnaliticNonBillTableMap::COL_ESTIMATEDHOURSSUM, $estimatedHoursSum, $comparison);
    }

    /**
     * Filter the query on the workloghourssum column
     *
     * Example usage:
     * <code>
     * $query->filterByWorkLogHoursSum(1234); // WHERE workloghourssum = 1234
     * $query->filterByWorkLogHoursSum(array(12, 34)); // WHERE workloghourssum IN (12, 34)
     * $query->filterByWorkLogHoursSum(array('min' => 12)); // WHERE workloghourssum > 12
     * </code>
     *
     * @param     mixed $workLogHoursSum The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyAnaliticNonBillQuery The current query, for fluid interface
     */
    public function filterByWorkLogHoursSum($workLogHoursSum = null, $comparison = null)
    {
        if (is_array($workLogHoursSum)) {
            $useMinMax = false;
            if (isset($workLogHoursSum['min'])) {
                $this->addUsingAlias(myAnaliticNonBillTableMap::COL_WORKLOGHOURSSUM, $workLogHoursSum['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($workLogHoursSum['max'])) {
                $this->addUsingAlias(myAnaliticNonBillTableMap::COL_WORKLOGHOURSSUM, $workLogHoursSum['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myAnaliticNonBillTableMap::COL_WORKLOGHOURSSUM, $workLogHoursSum, $comparison);
    }

    /**
     * Filter the query on the worklogusername column
     *
     * Example usage:
     * <code>
     * $query->filterByWorkLogUserName('fooValue');   // WHERE worklogusername = 'fooValue'
     * $query->filterByWorkLogUserName('%fooValue%', Criteria::LIKE); // WHERE worklogusername LIKE '%fooValue%'
     * </code>
     *
     * @param     string $workLogUserName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyAnaliticNonBillQuery The current query, for fluid interface
     */
    public function filterByWorkLogUserName($workLogUserName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($workLogUserName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myAnaliticNonBillTableMap::COL_WORKLOGUSERNAME, $workLogUserName, $comparison);
    }

    /**
     * Filter the query on the workloglogin column
     *
     * Example usage:
     * <code>
     * $query->filterByWorkLogLogin('fooValue');   // WHERE workloglogin = 'fooValue'
     * $query->filterByWorkLogLogin('%fooValue%', Criteria::LIKE); // WHERE workloglogin LIKE '%fooValue%'
     * </code>
     *
     * @param     string $workLogLogin The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyAnaliticNonBillQuery The current query, for fluid interface
     */
    public function filterByWorkLogLogin($workLogLogin = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($workLogLogin)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myAnaliticNonBillTableMap::COL_WORKLOGLOGIN, $workLogLogin, $comparison);
    }

    /**
     * Filter the query on the worklogkyear column
     *
     * Example usage:
     * <code>
     * $query->filterByWorkLogYear(1234); // WHERE worklogkyear = 1234
     * $query->filterByWorkLogYear(array(12, 34)); // WHERE worklogkyear IN (12, 34)
     * $query->filterByWorkLogYear(array('min' => 12)); // WHERE worklogkyear > 12
     * </code>
     *
     * @param     mixed $workLogYear The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyAnaliticNonBillQuery The current query, for fluid interface
     */
    public function filterByWorkLogYear($workLogYear = null, $comparison = null)
    {
        if (is_array($workLogYear)) {
            $useMinMax = false;
            if (isset($workLogYear['min'])) {
                $this->addUsingAlias(myAnaliticNonBillTableMap::COL_WORKLOGKYEAR, $workLogYear['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($workLogYear['max'])) {
                $this->addUsingAlias(myAnaliticNonBillTableMap::COL_WORKLOGKYEAR, $workLogYear['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myAnaliticNonBillTableMap::COL_WORKLOGKYEAR, $workLogYear, $comparison);
    }

    /**
     * Filter the query on the worklogmonth column
     *
     * Example usage:
     * <code>
     * $query->filterByWorkLogMonth(1234); // WHERE worklogmonth = 1234
     * $query->filterByWorkLogMonth(array(12, 34)); // WHERE worklogmonth IN (12, 34)
     * $query->filterByWorkLogMonth(array('min' => 12)); // WHERE worklogmonth > 12
     * </code>
     *
     * @param     mixed $workLogMonth The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyAnaliticNonBillQuery The current query, for fluid interface
     */
    public function filterByWorkLogMonth($workLogMonth = null, $comparison = null)
    {
        if (is_array($workLogMonth)) {
            $useMinMax = false;
            if (isset($workLogMonth['min'])) {
                $this->addUsingAlias(myAnaliticNonBillTableMap::COL_WORKLOGMONTH, $workLogMonth['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($workLogMonth['max'])) {
                $this->addUsingAlias(myAnaliticNonBillTableMap::COL_WORKLOGMONTH, $workLogMonth['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myAnaliticNonBillTableMap::COL_WORKLOGMONTH, $workLogMonth, $comparison);
    }

    /**
     * Filter the query on the worklogdatatime column
     *
     * Example usage:
     * <code>
     * $query->filterByWorkLogDataTime('2011-03-14'); // WHERE worklogdatatime = '2011-03-14'
     * $query->filterByWorkLogDataTime('now'); // WHERE worklogdatatime = '2011-03-14'
     * $query->filterByWorkLogDataTime(array('max' => 'yesterday')); // WHERE worklogdatatime > '2011-03-13'
     * </code>
     *
     * @param     mixed $workLogDataTime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyAnaliticNonBillQuery The current query, for fluid interface
     */
    public function filterByWorkLogDataTime($workLogDataTime = null, $comparison = null)
    {
        if (is_array($workLogDataTime)) {
            $useMinMax = false;
            if (isset($workLogDataTime['min'])) {
                $this->addUsingAlias(myAnaliticNonBillTableMap::COL_WORKLOGDATATIME, $workLogDataTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($workLogDataTime['max'])) {
                $this->addUsingAlias(myAnaliticNonBillTableMap::COL_WORKLOGDATATIME, $workLogDataTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myAnaliticNonBillTableMap::COL_WORKLOGDATATIME, $workLogDataTime, $comparison);
    }

    /**
     * Filter the query on the worklogyearmonth column
     *
     * Example usage:
     * <code>
     * $query->filterByWorkLogYearMonth('fooValue');   // WHERE worklogyearmonth = 'fooValue'
     * $query->filterByWorkLogYearMonth('%fooValue%', Criteria::LIKE); // WHERE worklogyearmonth LIKE '%fooValue%'
     * </code>
     *
     * @param     string $workLogYearMonth The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyAnaliticNonBillQuery The current query, for fluid interface
     */
    public function filterByWorkLogYearMonth($workLogYearMonth = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($workLogYearMonth)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myAnaliticNonBillTableMap::COL_WORKLOGYEARMONTH, $workLogYearMonth, $comparison);
    }

    /**
     * Filter the query on the worklogage column
     *
     * Example usage:
     * <code>
     * $query->filterByWorkLogAge(1234); // WHERE worklogage = 1234
     * $query->filterByWorkLogAge(array(12, 34)); // WHERE worklogage IN (12, 34)
     * $query->filterByWorkLogAge(array('min' => 12)); // WHERE worklogage > 12
     * </code>
     *
     * @param     mixed $workLogAge The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildmyAnaliticNonBillQuery The current query, for fluid interface
     */
    public function filterByWorkLogAge($workLogAge = null, $comparison = null)
    {
        if (is_array($workLogAge)) {
            $useMinMax = false;
            if (isset($workLogAge['min'])) {
                $this->addUsingAlias(myAnaliticNonBillTableMap::COL_WORKLOGAGE, $workLogAge['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($workLogAge['max'])) {
                $this->addUsingAlias(myAnaliticNonBillTableMap::COL_WORKLOGAGE, $workLogAge['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myAnaliticNonBillTableMap::COL_WORKLOGAGE, $workLogAge, $comparison);
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
     * @return $this|ChildmyAnaliticNonBillQuery The current query, for fluid interface
     */
    public function filterByCountIssues($countIssues = null, $comparison = null)
    {
        if (is_array($countIssues)) {
            $useMinMax = false;
            if (isset($countIssues['min'])) {
                $this->addUsingAlias(myAnaliticNonBillTableMap::COL_COUNTISSUES, $countIssues['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($countIssues['max'])) {
                $this->addUsingAlias(myAnaliticNonBillTableMap::COL_COUNTISSUES, $countIssues['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myAnaliticNonBillTableMap::COL_COUNTISSUES, $countIssues, $comparison);
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
     * @return $this|ChildmyAnaliticNonBillQuery The current query, for fluid interface
     */
    public function filterByCountIssuesPersent($countIssuesPersent = null, $comparison = null)
    {
        if (is_array($countIssuesPersent)) {
            $useMinMax = false;
            if (isset($countIssuesPersent['min'])) {
                $this->addUsingAlias(myAnaliticNonBillTableMap::COL_COUNTISSUESPERSENT, $countIssuesPersent['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($countIssuesPersent['max'])) {
                $this->addUsingAlias(myAnaliticNonBillTableMap::COL_COUNTISSUESPERSENT, $countIssuesPersent['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myAnaliticNonBillTableMap::COL_COUNTISSUESPERSENT, $countIssuesPersent, $comparison);
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
     * @return $this|ChildmyAnaliticNonBillQuery The current query, for fluid interface
     */
    public function filterByEstimatedHoursSubTask($estimatedHoursSubTask = null, $comparison = null)
    {
        if (is_array($estimatedHoursSubTask)) {
            $useMinMax = false;
            if (isset($estimatedHoursSubTask['min'])) {
                $this->addUsingAlias(myAnaliticNonBillTableMap::COL_ESTIMATEDHOURSSUBTASK, $estimatedHoursSubTask['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($estimatedHoursSubTask['max'])) {
                $this->addUsingAlias(myAnaliticNonBillTableMap::COL_ESTIMATEDHOURSSUBTASK, $estimatedHoursSubTask['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myAnaliticNonBillTableMap::COL_ESTIMATEDHOURSSUBTASK, $estimatedHoursSubTask, $comparison);
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
     * @return $this|ChildmyAnaliticNonBillQuery The current query, for fluid interface
     */
    public function filterByRemainingHours($remainingHours = null, $comparison = null)
    {
        if (is_array($remainingHours)) {
            $useMinMax = false;
            if (isset($remainingHours['min'])) {
                $this->addUsingAlias(myAnaliticNonBillTableMap::COL_REMAININGHOURS, $remainingHours['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($remainingHours['max'])) {
                $this->addUsingAlias(myAnaliticNonBillTableMap::COL_REMAININGHOURS, $remainingHours['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(myAnaliticNonBillTableMap::COL_REMAININGHOURS, $remainingHours, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildmyAnaliticNonBill $myAnaliticNonBill Object to remove from the list of results
     *
     * @return $this|ChildmyAnaliticNonBillQuery The current query, for fluid interface
     */
    public function prune($myAnaliticNonBill = null)
    {
        if ($myAnaliticNonBill) {
            $this->addUsingAlias(myAnaliticNonBillTableMap::COL_ID, $myAnaliticNonBill->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the myanaliticnonbill table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(myAnaliticNonBillTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            myAnaliticNonBillTableMap::clearInstancePool();
            myAnaliticNonBillTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(myAnaliticNonBillTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(myAnaliticNonBillTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            myAnaliticNonBillTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            myAnaliticNonBillTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // myAnaliticNonBillQuery
