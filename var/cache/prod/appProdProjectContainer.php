<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerUfuafvc\appProdProjectContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerUfuafvc/appProdProjectContainer.php') {
    touch(__DIR__.'/ContainerUfuafvc.legacy');

    return;
}

if (!\class_exists(appProdProjectContainer::class, false)) {
    \class_alias(\ContainerUfuafvc\appProdProjectContainer::class, appProdProjectContainer::class, false);
}

return new \ContainerUfuafvc\appProdProjectContainer([
    'container.build_hash' => 'Ufuafvc',
    'container.build_id' => '7e9be421',
    'container.build_time' => 1625758830,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerUfuafvc');