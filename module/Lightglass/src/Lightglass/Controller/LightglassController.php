<?php
/**
 * Created by JetBrains PhpStorm.
 * User: rustam
 * Date: 19.03.13
 * Time: 13:53
 * To change this template use File | Settings | File Templates.
 */

namespace Lightglass\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class LightglassController extends AbstractActionController
{
	protected $lightglassTable;

	public function indexAction()
	{
		$oProjects = $this->getLightglassTable()->fetchAll('projects');
		return new ViewModel(array(
			'oProjects' => $oProjects,
		));
	}

	public function technologyAction()
	{
		$oData = $this->getLightglassTable()->fetchAll('projects');
		return new ViewModel(array(
			'data' => $oData,
		));
	}

	public function jobsAction()
	{
		$oData = $this->getLightglassTable()->fetchAll('jobs');
		return new ViewModel(array(
			'data' => $oData,
		));
	}

	public function contactsAction()
	{
	}

	public function projectAction()
	{
		$id = (int) $this->params()->fromRoute('id', 1);
		$oData = $this->getLightglassTable()->getLightglass('projects', $id);

		foreach($oData as $data) {
			$aData['id'] = $data['id'];
			$aData['title'] = $data['title'];
			$aData['desc'] = $data['desc'];
		}
		return new ViewModel(array(
			'data' => $aData,
		));

	}

	public function getLightglassTable()
	{
		if (!$this->lightglassTable) {
			$sm = $this->getServiceLocator();
			$this->lightglassTable = $sm->get('Lightglass\Model\LightglassTable');
		}
		return $this->lightglassTable;
	}

	public function addAction()
	{
	}

	public function editAction()
	{
	}

	public function deletejAction()
	{
		if (!$this->zfcUserAuthentication()->hasIdentity()) {
			return $this->redirect()->toRoute('zfcuser/login');
		}

		if(isset($_POST['module'])) {
			if($_POST['del'] == 'Да'){
				$this->getLightglassTable()->delItem($_POST['module'], $_POST['id']);
				return $this->redirect()->toUrl('/admin');
			} else {
				return $this->redirect()->toUrl('/admin');
			}
		}

		$id = (int) $this->params()->fromRoute('id');
		$oData = $this->getLightglassTable()->getLightglass('jobs', $id);

		foreach($oData as $data) {
			$aData['id'] = $data['id'];
			$aData['title'] = $data['title'];
		}

		return new ViewModel(array(
			'aData' => $aData,
		));
	}

	public function deletepAction()
	{
		if (!$this->zfcUserAuthentication()->hasIdentity()) {
			return $this->redirect()->toRoute('zfcuser/login');
		}

		if(isset($_POST['module'])) {
			if($_POST['del'] == 'Да'){
				$this->getLightglassTable()->delItem($_POST['module'], $_POST['id']);
				return $this->redirect()->toUrl('/admin');
			} else {
				return $this->redirect()->toUrl('/admin');
			}
		}

		$id = (int) $this->params()->fromRoute('id');
		$oData = $this->getLightglassTable()->getLightglass('projects', $id);

		foreach($oData as $data) {
			$aData['id'] = $data['id'];
			$aData['title'] = $data['title'];
		}

		return new ViewModel(array(
			'aData' => $aData,
		));
	}

	public function adminAction()
	{
		if (!$this->zfcUserAuthentication()->hasIdentity()) {
			return $this->redirect()->toRoute('zfcuser/login');
		}

		$oProjects = $this->getLightglassTable()->fetchAll('projects');
		$oJobs = $this->getLightglassTable()->fetchAll('jobs');
		return new ViewModel(array(
			'oProjects' => $oProjects,
			'oJobs' => $oJobs,
		));
	}

	public function projecteditAction()
	{
		if (!$this->zfcUserAuthentication()->hasIdentity()) {
			return $this->redirect()->toRoute('zfcuser/login');
		}
		if (isset($_POST['changed'])) {
			if((int)$_POST['pro_id'] == 0) {
				$aLightglassAdd['title'] = isset($_POST['title']) ? $_POST['title'] : '';
				$aLightglassAdd['desc_k'] = isset($_POST['desc_k']) ? $_POST['desc_k'] : '';
				$aLightglassAdd['desc'] = isset($_POST['desc']) ? $_POST['desc'] : '';
				$aLightglassAdd['logo'] = isset($_POST['logo']) ? $_POST['logo'] : '';
				$this->getLightglassTable()->addLightglass('projects', $aLightglassAdd);
				return $this->redirect()->toUrl('/admin');
			} else {
				$lightglassUpd['title'] = isset($_POST['title']) ? $_POST['title'] : '';
				$lightglassUpd['desc_k'] = isset($_POST['desc_k']) ? $_POST['desc_k'] : '';
				$lightglassUpd['desc'] = isset($_POST['desc']) ? $_POST['desc'] : '';
				$lightglassUpd['logo'] = isset($_POST['logo']) ? $_POST['logo'] : '';
				$this->getLightglassTable()->saveLightglass($_POST['pro_id'], 'projects', $lightglassUpd);
				$id = $_POST['pro_id'];
			}
		} else {
			if(isset($_POST['pro_id'])) {
				$id = $_POST['pro_id'];
			} else {
				$id = (int) $this->params()->fromRoute('id', 1);
			}
		}
		$oData = $this->getLightglassTable()->getLightglass('projects', $id);
		$aData['id'] = $id;

		foreach($oData as $Data) {
			$aData['title'] = $Data['title'];
			$aData['desc'] = $Data['desc'];
			$aData['desc_k'] = $Data['desc_k'];
			$aData['logo'] = $Data['logo'];
		}

		return new ViewModel(array(
			'data' => $aData,
		));
	}

	public function jobseditAction()
	{
		if (!$this->zfcUserAuthentication()->hasIdentity()) {
			return $this->redirect()->toRoute('zfcuser/login');
		}

		if (isset($_POST['changed'])) {
			if((int)$_POST['job_id'] == 0) {
				$aLightglassAdd['title'] = isset($_POST['title']) ? $_POST['title'] : '';
				$aLightglassAdd['salary'] = isset($_POST['salary']) ? $_POST['salary'] : '';
				$aLightglassAdd['desc'] = isset($_POST['desc']) ? $_POST['desc'] : '';
				$aLightglassAdd['requirements'] = isset($_POST['requirements']) ? $_POST['requirements'] : '';
				$aLightglassAdd['terms'] = isset($_POST['terms']) ? $_POST['terms'] : '';
				$aLightglassAdd['qualities'] = isset($_POST['qualities']) ? $_POST['qualities'] : '';
				$this->getLightglassTable()->addLightglass('jobs', $aLightglassAdd);
				return $this->redirect()->toUrl('/admin');
			} else {
				$lightglassUpd['title'] = isset($_POST['title']) ? $_POST['title'] : '';
				$lightglassUpd['salary'] = isset($_POST['salary']) ? $_POST['salary'] : '';
				$lightglassUpd['desc'] = isset($_POST['desc']) ? $_POST['desc'] : '';
				$lightglassUpd['requirements'] = isset($_POST['requirements']) ? $_POST['requirements'] : '';
				$lightglassUpd['terms'] = isset($_POST['terms']) ? $_POST['terms'] : '';
				$lightglassUpd['qualities'] = isset($_POST['qualities']) ? $_POST['qualities'] : '';
				$this->getLightglassTable()->saveLightglass($_POST['job_id'], 'jobs', $lightglassUpd);
				$id = $_POST['job_id'];
			}
		} else {
			if(isset($_POST['job_id'])) {
				$id = $_POST['job_id'];
			} else {
				$id = (int) $this->params()->fromRoute('id', 1);
			}
		}
		$oData = $this->getLightglassTable()->getLightglass('jobs', $id);
		$aData['id'] = $id;

		foreach($oData as $Data) {
			$aData['title'] = $Data['title'];
			$aData['desc'] = $Data['desc'];
			$aData['requirements'] = $Data['requirements'];
			$aData['terms'] = $Data['terms'];
			$aData['qualities'] = $Data['qualities'];
			$aData['salary'] = $Data['salary'];
		}

		return new ViewModel(array(
			'data' => $aData,
		));
	}
}