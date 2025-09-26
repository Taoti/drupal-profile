<?php

// phpcs:ignoreFile

/**
 * @file
 * Taoti specific settings.
 *
 * IMPORTANT NOTE:
 * Do not modify this file. This file is always overwritten by the composer
 * install or update commands.
 */

/*
 * Prevent inane warnings about no database in some cases when running
 * migrations.
 */
if (isset($databases['default']['default'])) {
  $databases['migrate']['default'] = $databases['default']['default'];
}

/*
 * Enable local and dev config splits on local sites if they are present.
 */
if (isset($_ENV['LANDO'])) {
  $config['config_split.config_split.local']['status'] = TRUE;
  $config['config_split.config_split.dev']['status'] = TRUE;
  $config['config_split.config_split.prod']['status'] = FALSE;
}
if ((isset($_ENV['PANTHEON_ENVIRONMENT']) && $_ENV['PANTHEON_ENVIRONMENT'] !== 'live') ||
    (isset($_ENV['LAGOON_ENVIRONMENT_TYPE']) && $_ENV['LAGOON_ENVIRONMENT_TYPE'] !== 'production')) {
  $config['config_split.config_split.prod']['status'] = FALSE;
  $config['config_split.config_split.dev']['status'] = TRUE;
}

/**
 * Place the config directory outside of the Drupal root.
 */
$settings['config_sync_directory'] = dirname(DRUPAL_ROOT) . '/config/sync';
