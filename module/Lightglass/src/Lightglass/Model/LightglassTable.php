<?php
/**
 * Created by JetBrains PhpStorm.
 * User: user
 * Date: 15.04.13
 * Time: 14:45
 * To change this template use File | Settings | File Templates.
 */

namespace Lightglass\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Sql;

class LightglassTable
{
    protected $tableGateway;

    public function __construct($dbad)
    {
	    $this->adapter = $dbad;
    }

    public function fetchAll($table)
    {
	    $adapter = $this->adapter;
	    $sql = new Sql($adapter);
	    $select = $sql->select();
	    $select->from($table);
	    $selectString = $sql->getSqlStringForSqlObject($select);
	    $results = $adapter->query($selectString, $adapter::QUERY_MODE_EXECUTE);
	    return $results;
    }

    public function getLightglass($table, $id)
    {

	    $id  = (int) $id;
	    $adapter = $this->adapter;
	    $sql = new Sql($adapter, $table);
		$select = $sql->select();
		$select->where(array('id' => $id));

	    $statement = $sql->prepareStatementForSqlObject($select);
	    $results = $statement->execute();

	    return $results;

    }

    public function saveLightglass($id, $table,  $lightglassUpd)
    {
	    $adapter = $this->adapter;
	    $sql = new Sql($adapter);
	    $update = $sql->update($table);
	    $update->where(array('id' => $id));
	    $update->set($lightglassUpd);

	    $statement = $sql->prepareStatementForSqlObject($update);
	    $results = $statement->execute();
	    return $results;
    }

    public function deleteLightglass($id)
    {
        $this->tableGateway->delete(array('id' => $id));
    }

	public function addLightglass($table, $aLightglassAdd) {
		$adapter = $this->adapter;
		$sql = new Sql($adapter);
		$insert = $sql->insert($table);
		$insert->values($aLightglassAdd);

		$statement = $sql->prepareStatementForSqlObject($insert);
		$results = $statement->execute();
		return $results;
	}

	public function delItem($table, $id)
	{
		$adapter = $this->adapter;
		$sql = new Sql($adapter);
		$delete = $sql->delete($table);
		$delete->where(array('id' => $id));

		$statement = $sql->prepareStatementForSqlObject($delete);
		$results = $statement->execute();
		return $results;
	}
}