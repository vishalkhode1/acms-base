<?php

namespace App\Drush\Commands;

use Drush\Commands\DrushCommands;

final class AppDrushCommands extends DrushCommands {

    /**
     * Show a fabulous picture.
     *
     * @command hello:world
     * @aliases hello
     * @usage drush art sandwich
     *   Show a marvelous picture of a sandwich with pickles.
     */
    public function helloWorld(): void {
        $this->io()->writeln('<info>Hello world!</info>');
    }

}