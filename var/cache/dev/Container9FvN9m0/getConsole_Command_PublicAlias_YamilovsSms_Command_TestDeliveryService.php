<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'console.command.public_alias.yamilovs_sms.command.test_delivery' shared service.

include_once $this->targetDirs[3].'/vendor/symfony/console/Command/Command.php';
include_once $this->targetDirs[3].'/vendor/yamilovs/sms-bundle/src/Command/TestDeliveryCommand.php';
include_once $this->targetDirs[3].'/vendor/yamilovs/sms-bundle/src/Service/ProviderManager.php';
include_once $this->targetDirs[3].'/vendor/yamilovs/sms-bundle/src/Provider/ProviderInterface.php';
include_once $this->targetDirs[3].'/vendor/yamilovs/sms-bundle/src/Provider/MessageBirdProvider.php';

$a = new \Yamilovs\Bundle\SmsBundle\Service\ProviderManager();

$b = new \Yamilovs\Bundle\SmsBundle\Provider\MessageBirdProvider();
$b->setAccessKey('FmIQlV19ztW61uSnfSX5rUR05');
$b->setOriginator('+221778083808');
$b->setType('sms');

$a->addProvider('message_bird_provider_doc', $b);

return $this->services['console.command.public_alias.yamilovs_sms.command.test_delivery'] = new \Yamilovs\Bundle\SmsBundle\Command\TestDeliveryCommand($a);
