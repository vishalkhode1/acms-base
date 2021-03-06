<?php

namespace AcquiaCMS\Cli;

use Stecman\Component\Symfony\Console\BashCompletion\CompletionCommand;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Process\Process;

set_time_limit(0);
(@include_once __DIR__ . '/../vendor/autoload.php') || @include_once __DIR__ . '/../../../autoload.php';
$input = new ArgvInput();
$env = $input->getParameterOption(['--env', '-e'], $_SERVER['APP_ENV'] ?? 'prod', TRUE);
$kernel = new Kernel($env, FALSE);

// Handle the cache:clear command. This isn't implemented as a console
// command because any corrupted cache wouldn't allow to run the command
// when it's actually needed.
if (in_array($input->getFirstArgument(), ['cache:clear', 'cc'])) {
    $filesystem = new Filesystem();
    // Delete the cached directory.
    $cache_dir = $kernel->getCacheDir();
    $filesystem->remove($cache_dir);
    $filesystem->mkdir($cache_dir);
    $process = new Process(["printf", '\033[1;32m[ok]\033[0m All caches have been cleared.\n']);
    $process->run();
    // executes after the command finishes
    if (!$process->isSuccessful()) {
      throw new ProcessFailedException($process);
    }
    echo $process->getOutput();
    exit;
}

$kernel->boot();
$container = $kernel->getContainer();
$application = $container->get(Application::class);
$application->setName('Acquia CMS starterkit cli tool.');
$application->setVersion('1.0');

// Add command autocompletion.
$application->add(new CompletionCommand());

$application->run();
