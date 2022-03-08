<?php

namespace Drupal\acquia_base\Commands;

use Consolidation\OutputFormatters\StructuredData\RowsOfFields;
use Drush\Commands\DrushCommands;

/**
 * A Drush commandfile.
 *
 * In addition to this file, you need a drush.services.yml
 * in root of your module, and a composer.json file that provides the name
 * of the services file to use.
 *
 * See these files for an example of injecting Drupal services:
 *   - http://cgit.drupalcode.org/devel/tree/src/Commands/DevelCommands.php
 *   - http://cgit.drupalcode.org/devel/tree/drush.services.yml
 */
class AcquiaBaseCommands extends DrushCommands {

  /**
   * Show a fabulous picture.
   *
   * @command hello:world
   * @aliases hello
   * @usage drush art sandwich
   *   Show a marvelous picture of a sandwich with pickles.
   */
  public function hello() {
    $this->output()->writeln("\nHow are you!!!\n");
  }
}
