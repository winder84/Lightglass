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
	public function indexAction()
	{
	}

	public function technologyAction()
	{
	}

	public function jobsAction()
	{
	}

	public function contactsAction()
	{
	}

	public function projectAction()
	{
		$id = (int) $this->params()->fromRoute('id', 1);

		switch ($id) {
			case 1:
				$title = 'Волгодонска атомная электростанция';
				$desc = 'Был произведён комплекс работ по реконструкции здания АБК Волгодонской АЭС.
				Были установлены алюминиевые фасадные конструкции с применением безопасного остекления.
				Входные группы выполнены с помощью автоматических систем GEZE (Германия)';
				$img = array('volg_ae.jpg');
				break;
			case 2:
				$title = 'Marc Cain';
				$desc = 'Входная группа из закалённого стекла.';
				$img = array('marccain_f.jpg');
				break;
			case 3:
				$title = 'Банк "Восточный Экспресс"';
				$desc = 'Алюминиевые конструкции, внутренние перегородки из закаленного стекла, нанесение рисунка с помощью пескоструйной обработки.';
				$img = array('bank_1.jpg', 'bank_2.jpg', 'bank_3.jpg');
				break;
			case 4:
				$title = 'Пиццерия & Кафе Сан-Ремо';
				$desc = '';
				$img = array('sanremo.jpg');
				break;
		}

		return new ViewModel(array(
			'title' => $title,
			'desc' => $desc,
			'img' => $img,
		));
	}

	public function addAction()
	{
	}

	public function editAction()
	{
	}

	public function deleteAction()
	{
	}
}