<?php
declare(strict_types=1);

require_once 'config/Autoloader.php';
Autoloader::register();

use App\Processor\GameProcessor;

if (!empty(getopt("n:"))) {
    $parameters = getopt("n:");
    $nbCards = (int) $parameters['n'];
} else {
    $nbCards = 52;
}

$gameProcessor = new GameProcessor($nbCards);
$gameProcessor->process();
