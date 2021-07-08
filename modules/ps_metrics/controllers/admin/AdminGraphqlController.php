<?php

/**
 * Copyright since 2007 PrestaShop SA and Contributors
 * PrestaShop is an International Registered Trademark & Property of PrestaShop SA
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License version 3.0
 * that is bundled with this package in the file LICENSE.md.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * @author    PrestaShop SA and Contributors <contact@prestashop.com>
 * @copyright Since 2007 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License version 3.0
 */

use GraphQL\Executor\Executor;
use GraphQL\Server\ServerConfig;
use GraphQL\Server\StandardServer;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Utils\BuildSchema;
use Overblog\DataLoader\Promise\Adapter\Webonyx\GraphQL\SyncPromiseAdapter;
use Overblog\PromiseAdapter\Adapter\WebonyxGraphQLSyncPromiseAdapter;
use PrestaShop\Module\Ps_metrics\GraphQL\DataLoaders\DataLoaders;

class AdminGraphqlController extends ModuleAdminController
{
    /**
     * @var Ps_metrics
     */
    public $module;

    /**
     * @return string
     */
    private function getResolver()
    {
        $resolver = _PS_MODULE_DIR_ . 'ps_metrics/src/GraphQL/Resolvers.php';

        if (file_exists($resolver)) {
            return include $resolver;
        }

        return '';
    }

    /**
     * @return string
     */
    private function getSchema()
    {
        $contents = '';
        $schema = _PS_MODULE_DIR_ . 'ps_metrics/src/GraphQL/schema.graphql';
        if (file_exists($schema)) {
            $contents = file_get_contents($schema);
        }

        $schema = _PS_MODULE_DIR_ . 'ps_metrics/src/GraphQL/schema_prestashop.graphql';
        if (file_exists($schema)) {
            $contents .= file_get_contents($schema);
        }

        return $contents ? $contents : '';
    }

    /**
     * @throws Exception
     *
     * @return void
     */
    public function initContent()
    {
        $graphQLSyncPromiseAdapter = new SyncPromiseAdapter();
        $promiseAdapter = new WebonyxGraphQLSyncPromiseAdapter($graphQLSyncPromiseAdapter);

        /** @var DataLoaders $dataLoaders */
        $dataLoaders = $this->module->getService('ps_metrics.graphql.dataloaders');

        $this->buildResolvers($this->getResolver());
        $schema = BuildSchema::build($this->getSchema());

        // Context, objects and data the resolver can then access. In this case the database object.
        $context = [
            'loaders' => $dataLoaders->build($promiseAdapter),
        ];

        // Create server configuration
        $config = ServerConfig::create()
            ->setSchema($schema)
            ->setContext($context)
            ->setQueryBatching(true)
            ->setPromiseAdapter($graphQLSyncPromiseAdapter)
            ->setDebug();

        // Allow GraphQL Server to handle the request and response
        $server = new StandardServer($config);
        $server->handleRequest(null, true);
    }

    /**
     * @param mixed $resolvers
     *
     * @throws Exception
     *
     * @return mixed
     */
    private function buildResolvers($resolvers)
    {
        Executor::setDefaultFieldResolver(function ($source, $args, $context, ResolveInfo $info) use ($resolvers) {
            $fieldName = $info->fieldName;

            if (empty($fieldName)) {
                throw new \Exception('Could not get $fieldName from ResolveInfo');
            }

            if (empty($info->parentType)) {
                throw new \Exception('Could not get $parentType from ResolveInfo');
            }

            $parentTypeName = $info->parentType->name;

            if (isset($resolvers[$parentTypeName])) {
                $resolver = $resolvers[$parentTypeName];

                if (is_array($resolver)) {
                    if (array_key_exists($fieldName, $resolver)) {
                        $value = $resolver[$fieldName];

                        return is_callable($value) ? $value($source, $args, $context, $info) : $value;
                    }
                }

                if (is_object($resolver)) {
                    if (isset($resolver->{$fieldName})) {
                        $value = $resolver->{$fieldName};

                        return is_callable($value) ? $value($source, $args, $context, $info) : $value;
                    }
                }
            }

            return Executor::defaultFieldResolver($source, $args, $context, $info);
        });
    }
}
