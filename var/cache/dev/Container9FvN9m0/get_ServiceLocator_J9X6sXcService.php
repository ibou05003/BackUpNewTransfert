<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private '.service_locator.j9X6sXc' shared service.

return $this->privates['.service_locator.j9X6sXc'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
    'partenaire' => ['privates', '.errored..service_locator.j9X6sXc.App\\Entity\\Partenaire', NULL, 'Cannot autowire service ".service_locator.j9X6sXc": it references class "App\\Entity\\Partenaire" but no such service exists.'],
    'validator' => ['services', 'validator', 'getValidatorService', false],
], [
    'partenaire' => 'App\\Entity\\Partenaire',
    'validator' => '?',
]);