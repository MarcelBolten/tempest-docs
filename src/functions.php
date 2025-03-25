<?php

use Tempest\Router\MatchedRoute;

use function Tempest\get;

function recursive_search(string $folder, string $pattern): Generator
{
    $directory = new RecursiveDirectoryIterator($folder);
    $iterator = new RecursiveIteratorIterator($directory);
    $files = new RegexIterator($iterator, $pattern, RegexIterator::MATCH);

    foreach ($files as $file) {
        yield $file->getPathName();
    }
}
