<?php
return [
    'router' => [
        'routes' => [
            'album.rest.categoria' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/categoria[/:categoria_id]',
                    'defaults' => [
                        'controller' => 'Album\\V1\\Rest\\Categoria\\Controller',
                    ],
                ],
            ],
            'album.rest.oauth-users' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/oauth_users[/:oauth_users_id]',
                    'defaults' => [
                        'controller' => 'Album\\V1\\Rest\\OauthUsers\\Controller',
                    ],
                ],
            ],
            'album.rest.album' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/album[/:album_id]',
                    'defaults' => [
                        'controller' => 'Album\\V1\\Rest\\Album\\Controller',
                    ],
                ],
            ],
            'album.rpc.dashboard' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/dashboard',
                    'defaults' => [
                        'controller' => 'Album\\V1\\Rpc\\Dashboard\\Controller',
                        'action' => 'dashboard',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'album.rest.categoria',
            1 => 'album.rest.oauth-users',
            2 => 'album.rest.album',
            3 => 'album.rpc.dashboard',
        ],
    ],
    'zf-rest' => [
        'Album\\V1\\Rest\\Categoria\\Controller' => [
            'listener' => \Album\V1\Rest\Categoria\CategoriaResource::class,
            'route_name' => 'album.rest.categoria',
            'route_identifier_name' => 'categoria_id',
            'collection_name' => 'categoria',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [
                0 => 'descricao',
            ],
            'page_size' => '7',
            'page_size_param' => null,
            'entity_class' => \Album\V1\Rest\Categoria\CategoriaEntity::class,
            'collection_class' => \Album\V1\Rest\Categoria\CategoriaCollection::class,
            'service_name' => 'categoria',
        ],
        'Album\\V1\\Rest\\OauthUsers\\Controller' => [
            'listener' => \Album\V1\Rest\OauthUsers\OauthUsersResource::class,
            'route_name' => 'album.rest.oauth-users',
            'route_identifier_name' => 'oauth_users_id',
            'collection_name' => 'oauth_users',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Album\V1\Rest\OauthUsers\OauthUsersEntity::class,
            'collection_class' => \Album\V1\Rest\OauthUsers\OauthUsersCollection::class,
            'service_name' => 'oauth_users',
        ],
        'Album\\V1\\Rest\\Album\\Controller' => [
            'listener' => \Album\V1\Rest\Album\AlbumResource::class,
            'route_name' => 'album.rest.album',
            'route_identifier_name' => 'album_id',
            'collection_name' => 'album',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [
                0 => 'pesquisa',
            ],
            'page_size' => '7',
            'page_size_param' => null,
            'entity_class' => \Album\V1\Rest\Album\AlbumEntity::class,
            'collection_class' => \Album\V1\Rest\Album\AlbumCollection::class,
            'service_name' => 'album',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'Album\\V1\\Rest\\Categoria\\Controller' => 'HalJson',
            'Album\\V1\\Rest\\OauthUsers\\Controller' => 'HalJson',
            'Album\\V1\\Rest\\Album\\Controller' => 'HalJson',
            'Album\\V1\\Rpc\\Dashboard\\Controller' => 'Json',
        ],
        'accept_whitelist' => [
            'Album\\V1\\Rest\\Categoria\\Controller' => [
                0 => 'application/vnd.album.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Album\\V1\\Rest\\OauthUsers\\Controller' => [
                0 => 'application/vnd.album.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Album\\V1\\Rest\\Album\\Controller' => [
                0 => 'application/vnd.album.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Album\\V1\\Rpc\\Dashboard\\Controller' => [
                0 => 'application/vnd.album.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ],
        ],
        'content_type_whitelist' => [
            'Album\\V1\\Rest\\Categoria\\Controller' => [
                0 => 'application/vnd.album.v1+json',
                1 => 'application/json',
            ],
            'Album\\V1\\Rest\\OauthUsers\\Controller' => [
                0 => 'application/vnd.album.v1+json',
                1 => 'application/json',
            ],
            'Album\\V1\\Rest\\Album\\Controller' => [
                0 => 'application/vnd.album.v1+json',
                1 => 'application/json',
            ],
            'Album\\V1\\Rpc\\Dashboard\\Controller' => [
                0 => 'application/vnd.album.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'zf-hal' => [
        'metadata_map' => [
            \Album\V1\Rest\Categoria\CategoriaEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'album.rest.categoria',
                'route_identifier_name' => 'categoria_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \Album\V1\Rest\Categoria\CategoriaCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'album.rest.categoria',
                'route_identifier_name' => 'categoria_id',
                'is_collection' => true,
            ],
            \Album\V1\Rest\OauthUsers\OauthUsersEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'album.rest.oauth-users',
                'route_identifier_name' => 'oauth_users_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \Album\V1\Rest\OauthUsers\OauthUsersCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'album.rest.oauth-users',
                'route_identifier_name' => 'oauth_users_id',
                'is_collection' => true,
            ],
            \Album\V1\Rest\Album\AlbumEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'album.rest.album',
                'route_identifier_name' => 'album_id',
                'hydrator' => \Zend\Hydrator\ClassMethods::class,
            ],
            \Album\V1\Rest\Album\AlbumCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'album.rest.album',
                'route_identifier_name' => 'album_id',
                'is_collection' => true,
            ],
        ],
    ],
    'zf-apigility' => [
        'db-connected' => [
            \Album\V1\Rest\Categoria\CategoriaResource::class => [
                'adapter_name' => 'DbAdapter',
                'table_name' => 'categoria',
                'hydrator_name' => \Zend\Hydrator\ArraySerializable::class,
                'controller_service_name' => 'Album\\V1\\Rest\\Categoria\\Controller',
                'entity_identifier_name' => 'id',
                'table_service' => 'Album\\V1\\Rest\\Categoria\\CategoriaResource\\Table',
                'resource_class' => \Album\V1\Rest\Categoria\CategoriaResource::class,
            ],
            \Album\V1\Rest\OauthUsers\OauthUsersResource::class => [
                'adapter_name' => 'DbAdapter',
                'table_name' => 'oauth_users',
                'hydrator_name' => \Zend\Hydrator\ArraySerializable::class,
                'controller_service_name' => 'Album\\V1\\Rest\\OauthUsers\\Controller',
                'entity_identifier_name' => 'id',
                'resource_class' => \Album\V1\Rest\OauthUsers\OauthUsersResource::class,
                'table_service' => 'Album\\V1\\Rest\\OauthUsers\\OauthUsersResource\\Table',
            ],
        ],
    ],
    'zf-content-validation' => [
        'Album\\V1\\Rest\\Categoria\\Controller' => [
            'input_filter' => 'Album\\V1\\Rest\\Categoria\\Validator',
        ],
        'Album\\V1\\Rest\\OauthUsers\\Controller' => [
            'input_filter' => 'Album\\V1\\Rest\\OauthUsers\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'Album\\V1\\Rest\\Categoria\\Validator' => [
            0 => [
                'name' => 'descricao',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '100',
                            'message' => 'Tamanho de 1 até 100',
                        ],
                    ],
                ],
                'description' => 'Descrição',
                'field_type' => 'String (100)',
                'error_message' => 'Campo é Obrigatório',
            ],
        ],
        'Album\\V1\\Rest\\OauthUsers\\Validator' => [
            0 => [
                'name' => 'username',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '255',
                        ],
                    ],
                    1 => [
                        'name' => \Zend\Validator\EmailAddress::class,
                        'options' => [
                            'message' => 'Não é um e-mail válido',
                        ],
                    ],
                ],
                'description' => 'Login do Usuário',
                'field_type' => 'String (100)',
            ],
            1 => [
                'name' => 'password',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '2000',
                        ],
                    ],
                ],
                'description' => 'Senha do Usuário',
                'field_type' => 'String (100)',
            ],
            2 => [
                'name' => 'first_name',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '255',
                        ],
                    ],
                ],
                'description' => 'Nome do Usuário',
                'field_type' => 'String (100)',
            ],
            3 => [
                'name' => 'last_name',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '255',
                        ],
                    ],
                ],
                'description' => 'Sobre nome do usário',
                'field_type' => 'String (100)',
            ],
        ],
    ],
    'zf-mvc-auth' => [
        'authorization' => [
            'Album\\V1\\Rest\\OauthUsers\\Controller' => [
                'collection' => [
                    'GET' => false,
                    'POST' => false,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
                'entity' => [
                    'GET' => false,
                    'POST' => false,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
            ],
            'Album\\V1\\Rest\\Album\\Controller' => [
                'collection' => [
                    'GET' => true,
                    'POST' => true,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
                'entity' => [
                    'GET' => true,
                    'POST' => false,
                    'PUT' => true,
                    'PATCH' => true,
                    'DELETE' => true,
                ],
            ],
        ],
    ],
    'service_manager' => [
        'factories' => [
            \Album\V1\Rest\Album\AlbumResource::class => \Album\V1\Rest\Album\AlbumResourceFactory::class,
        ],
    ],
    'controllers' => [
        'factories' => [
            'Album\\V1\\Rpc\\Dashboard\\Controller' => \Album\V1\Rpc\Dashboard\DashboardControllerFactory::class,
        ],
    ],
    'zf-rpc' => [
        'Album\\V1\\Rpc\\Dashboard\\Controller' => [
            'service_name' => 'dashboard',
            'http_methods' => [
                0 => 'GET',
            ],
            'route_name' => 'album.rpc.dashboard',
        ],
    ],
];
