<?php
// to run exdecute $ php sami.phar update sami_docs.php

use Sami\Sami;
use Sami\RemoteRepository\GitHubRemoteRepository;
use Symfony\Component\Finder\Finder;
use Sami\Parser\Filter\TrueFilter;

$iterator = Finder::create()
    ->files()
    ->name('*.php')
    ->exclude('config')
    ->exclude('database')
    ->exclude('lang')
    ->exclude('views')
    ->exclude('routes.php')
    ->in('src')
;

return new Sami($iterator, [
    'theme'                => 'default',
    'title'                => 'Hotels API',
    'build_dir'            => __DIR__.'/docs/api',
    'cache_dir'            => __DIR__.'/docs/cache',
    'remote_repository'    => new GitHubRemoteRepository('syscover/hotels', 'src'),
    'default_opened_level' => 2,
]);