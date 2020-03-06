<?php
/**
 * Created by PhpStorm.
 * User: antoine
 * Date: 2019-03-22
 * Time: 15:32
 */

namespace DisplayErp\AppBundle\Service;

use DisplayErp\AppBundle\Entity\ServiceReport\ServiceReport;
use Doctrine\ORM\EntityManager;

class GenerateSerialNumberServiceReport
{
    private $serialNumberGenerator;

    private $em;

    public function __construct(SerialNumberGenerator $serialNumberGenerator, EntityManager $em)
    {
        $this->serialNumberGenerator = $serialNumberGenerator;
        $this->em = $em;
    }

    public function generateSerialNumberServiceReport(ServiceReport $serviceReport)
    {
        $objectType = "DO";
        $objectName = "SR";
        $date = new \DateTime();
        $idPrefix = $date->format("y");

        if ($serviceReport->getDocumentNumber()) {
            return;
        }

        $serialNumber = $this->serialNumberGenerator->generateSerialNumber($objectType, $objectName, $idPrefix);

        $serviceReport->setDocumentNumber($serialNumber);
    }
}
