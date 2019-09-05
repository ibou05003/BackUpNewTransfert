<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/api/compte' => [[['_route' => 'compte_index', '_controller' => 'App\\Controller\\CompteController::index'], null, ['GET' => 0], null, true, false, null]],
        '/api/compte/trouve' => [[['_route' => 'compte_trouve', '_controller' => 'App\\Controller\\CompteController::recherche'], null, ['GET' => 0], null, false, false, null]],
        '/api/versement' => [[['_route' => 'versement_index', '_controller' => 'App\\Controller\\CompteController::indexVersement'], null, ['GET' => 0], null, true, false, null]],
        '/api/partenaire' => [[['_route' => 'partenaire_index', '_controller' => 'App\\Controller\\PartenaireController::index'], null, ['GET' => 0], null, true, false, null]],
        '/api/partenaire/ajout' => [[['_route' => 'partenaire_ajout', '_controller' => 'App\\Controller\\PartenaireController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/api/users/register' => [[['_route' => 'app_register', '_controller' => 'App\\Controller\\SecurityController::register'], null, null, null, false, false, null]],
        '/api/users' => [[['_route' => 'users', '_controller' => 'App\\Controller\\SecurityController::index'], null, ['GET' => 0], null, true, false, null]],
        '/api/users/login' => [[['_route' => 'login', '_controller' => 'App\\Controller\\SecurityController::login'], null, ['POST' => 0], null, false, false, null]],
        '/api/users/usersysteme' => [[['_route' => 'user_systeme', '_controller' => 'App\\Controller\\SecurityController::usersSyste'], null, ['GET' => 0], null, false, false, null]],
        '/api/users/userconnecte' => [[['_route' => 'user_connecte', '_controller' => 'App\\Controller\\SecurityController::usersConnecte'], null, ['GET' => 0], null, false, false, null]],
        '/api/test' => [[['_route' => 'test', '_controller' => 'App\\Controller\\TestController::index'], null, null, null, false, false, null]],
        '/api/transaction' => [[['_route' => 'transaction_index', '_controller' => 'App\\Controller\\TransactionController::index'], null, ['GET' => 0], null, true, false, null]],
        '/api/transaction/envoi' => [[['_route' => 'transaction_envoi', '_controller' => 'App\\Controller\\TransactionController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/api/login_check' => [[['_route' => 'api_login_check'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
                .'|/api(?'
                    .'|/(?'
                        .'|compte/(?'
                            .'|ajout/([^/]++)(*:77)'
                            .'|([^/]++)(*:92)'
                            .'|affectation/([^/]++)(*:119)'
                            .'|rechercher(*:137)'
                        .')'
                        .'|versement(?'
                            .'|/(?'
                                .'|ajout/([^/]++)(*:176)'
                                .'|([^/]++)(*:192)'
                            .')'
                            .'|s/([^/]++)(*:211)'
                        .')'
                        .'|partenaire/(?'
                            .'|([^/]++)(?'
                                .'|(*:245)'
                                .'|/edit(*:258)'
                            .')'
                            .'|rechercher(*:277)'
                        .')'
                        .'|users/(?'
                            .'|status/(?'
                                .'|([^/]++)(*:313)'
                                .'|partenaire/([^/]++)(*:340)'
                            .')'
                            .'|password/([^/]++)(*:366)'
                            .'|userpartenaire/([^/]++)(*:397)'
                            .'|([^/]++)/nbconnexion(*:425)'
                        .')'
                        .'|transaction/(?'
                            .'|retrait/([^/]++)(*:465)'
                            .'|([^/]++)(*:481)'
                            .'|partenaire/details/([^/]++)(*:516)'
                            .'|tarif(*:529)'
                            .'|recherchecode(*:550)'
                        .')'
                    .')'
                    .'|(?:/(index)(?:\\.([^/]++))?)?(*:588)'
                    .'|/(?'
                        .'|docs(?:\\.([^/]++))?(*:619)'
                        .'|comptes(?'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:655)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:693)'
                            .')'
                        .')'
                        .'|transactions(?'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:736)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:774)'
                            .')'
                        .')'
                        .'|versements(?'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:815)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:853)'
                            .')'
                        .')'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [[['_route' => '_twig_error_test', '_controller' => 'twig.controller.preview_error::previewErrorPageAction', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        77 => [[['_route' => 'compte_ajout', '_controller' => 'App\\Controller\\CompteController::new'], ['id'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        92 => [[['_route' => 'compte_show', '_controller' => 'App\\Controller\\CompteController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        119 => [[['_route' => 'affectation_caisse', '_controller' => 'App\\Controller\\CompteController::affectation'], ['id'], ['POST' => 0], null, false, true, null]],
        137 => [[['_route' => 'recherche_compte', '_controller' => 'App\\Controller\\CompteController::searchCompte'], [], ['POST' => 0], null, false, false, null]],
        176 => [[['_route' => 'versement_ajout', '_controller' => 'App\\Controller\\CompteController::newVersement'], ['id'], ['GET' => 0, 'POST' => 1, 'PUT' => 2], null, false, true, null]],
        192 => [[['_route' => 'versement_show', '_controller' => 'App\\Controller\\CompteController::showVersement'], ['id'], ['GET' => 0], null, false, true, null]],
        211 => [[['_route' => 'versement_compte', '_controller' => 'App\\Controller\\CompteController::usersPartenaire'], ['id'], ['GET' => 0], null, false, true, null]],
        245 => [[['_route' => 'partenaire_show', '_controller' => 'App\\Controller\\PartenaireController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        258 => [[['_route' => 'partenaire_edit', '_controller' => 'App\\Controller\\PartenaireController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        277 => [[['_route' => 'recherche_partenaire', '_controller' => 'App\\Controller\\PartenaireController::searchPartenaire'], [], ['POST' => 0], null, false, false, null]],
        313 => [[['_route' => 'status', '_controller' => 'App\\Controller\\SecurityController::status'], ['id'], ['PUT' => 0], null, false, true, null]],
        340 => [[['_route' => 'status_partenaire', '_controller' => 'App\\Controller\\SecurityController::statusPartenaire'], ['id'], ['PUT' => 0], null, false, true, null]],
        366 => [[['_route' => 'password_change', '_controller' => 'App\\Controller\\SecurityController::initPassword'], ['id'], ['PUT' => 0], null, false, true, null]],
        397 => [[['_route' => 'user_parte', '_controller' => 'App\\Controller\\SecurityController::usersPartenaire'], ['id'], ['GET' => 0], null, false, true, null]],
        425 => [[['_route' => 'nombre_connexion', '_controller' => 'App\\Controller\\SecurityController::nombreConnexion'], ['id'], ['PUT' => 0], null, false, false, null]],
        465 => [[['_route' => 'transaction_retrait', '_controller' => 'App\\Controller\\TransactionController::retrait'], ['code'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        481 => [[['_route' => 'transaction_show', '_controller' => 'App\\Controller\\TransactionController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        516 => [[['_route' => 'transaction_partenaire_details', '_controller' => 'App\\Controller\\TransactionController::detailsOperationPartenaire'], ['id'], ['GET' => 0], null, false, true, null]],
        529 => [[['_route' => 'recherche_tarif', '_controller' => 'App\\Controller\\TransactionController::tarif'], [], ['POST' => 0], null, false, false, null]],
        550 => [[['_route' => 'recherche_code', '_controller' => 'App\\Controller\\TransactionController::searchPartenaire'], [], ['POST' => 0], null, false, false, null]],
        588 => [[['_route' => 'api_entrypoint', '_controller' => 'api_platform.action.entrypoint', '_format' => '', '_api_respond' => 'true', 'index' => 'index'], ['index', '_format'], null, null, false, true, null]],
        619 => [[['_route' => 'api_doc', '_controller' => 'api_platform.action.documentation', '_format' => '', '_api_respond' => 'true'], ['_format'], null, null, false, true, null]],
        655 => [
            [['_route' => 'api_comptes_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Compte', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_comptes_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Compte', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        693 => [
            [['_route' => 'api_comptes_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Compte', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_comptes_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Compte', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_comptes_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Compte', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
        ],
        736 => [
            [['_route' => 'api_transactions_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Transaction', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_transactions_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Transaction', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        774 => [
            [['_route' => 'api_transactions_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Transaction', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_transactions_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Transaction', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_transactions_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Transaction', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
        ],
        815 => [
            [['_route' => 'api_versements_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Versement', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_versements_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Versement', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        853 => [
            [['_route' => 'api_versements_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Versement', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_versements_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Versement', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_versements_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Versement', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
