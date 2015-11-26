<?php
namespace FisiLog\Services;
use FisiLog\BusinessClasses\User;
use FisiLog\Dao\DaoEloquentFactory;

class NotificationService {
	public function __construct(DaoEloquentFactory $dao) {
		$this->userPersistence = $dao->getUserDAO();
		$this->studentPersistence = $dao->getStudentDAO();
		$this->classPersistence = $dao->getClaseDAO();
	}

	public function startClase($data) {
		$clase = $this->classPersistence->findById( $data ['clase_id'] );
		$group = $clase->getGroup();
		if($group == null)
			return null;
		$students = $this->studentPersistence->getByGroup($group);
		foreach ($students as $student) {
			$student->getNotificationChannel()
			->executeStrategyNotification(
				'Ha iniciado la clase de '.$clase->getGroup()->getCourseOpened()->getCourse()->getName(),
				'Notificacion estado de clase',
				$student->getEmail()
			);
		}
	}

}