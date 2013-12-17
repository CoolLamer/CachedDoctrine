<?php

/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter
{
	public function startup()
	{
		parent::startup();
		/** @var \Doctrine\ORM\EntityManager $em */
		$em = $this->context->getService('doctrine.entityManager');

		$driver = $em->find('CachedDoctrine\Entities\Driver', 1);
		dump($driver);
		$driver->setName('Franta ' . $driver->getName());
		$em->flush();
		$em->clear();

		$driver = $em->find('CachedDoctrine\Entities\Driver', 1);
		dump($driver);
	}

	private function generateSchema(\Doctrine\ORM\EntityManager $entityManager)
	{
		$classes = array(
			$entityManager->getClassMetadata('CachedDoctrine\Entities\User'),
			$entityManager->getClassMetadata('CachedDoctrine\Entities\Driver'),
		);

		$schemaTool = new \Doctrine\ORM\Tools\SchemaTool($entityManager);
		$schemaTool->createSchema($classes);
	}
}
