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

if (!isset($_SERVER['REQUEST_URI'])) {
  return;
}

/**
 * Whitelist urls methods that could contains strings that might be wrongly
 * caught by the banned urls list.
 */
$whitelisted_methods = [
  '/openid-connect',
];

foreach($whitelisted_methods as $method) {
  if (str_starts_with($_SERVER['REQUEST_URI'], $method)) {
    return;
  }
}

/**
 * Hard block urls that shouldn't cause system load.
 * Don't bother even redirecting or giving a friendly error page. There is no
 * legitimate reason to be accessing these urls on a Pantheon/Amazee Drupal
 * install.
 */
$banned_urls = [
  // General.
  'admin.php',
  'api.zip',
  'autodiscover.xml',
  '.aws',
  'backup.tar',
  'back.zip',
  'back.tar',
  'backup.zip',
  'backup.tar',
  'beez',
  'bkp',
  'build.xml',
  'CMSHelp',
  'CMSPages',
  'CMSTemplates',
  'db.php',
  'dbconfig.zip',
  'DesktopModule',
  '_dump',
  '.env',
  'installer.php',
  'item.php',
  'mailer.php',
  'magento',
  'old/',
  'preview.php',
  '_profiler',
  'sitecore',
  'sitecorex',
  'sitedata',
  'site-tools',
  'Site-Tools',
  '.sql',
  '.well-known',
  'xleet',
  'xmlrpc.php',
  'var/',
  'vendor/',
  'wwwback',
  'wwwdata',
  'wwwroot',

  // Weird old ASPX requests.
  'AspxAutoDetectCookieSupport',
  '(X(1)S',

  // WP Paths.
  'wordpress',
  'wp-admin',
  'wp-back',
  'wp-config',
  'wp-cli',
  'wp-content',
  'wp-include',
  'wp-json',
  'wp-login',
  'wp-old',
  'wp-plain',
];

foreach($banned_urls as $url) {
  if (stripos($_SERVER['REQUEST_URI'], $url) !== FALSE) {
    header('HTTP/1.0 403');
    exit();
  }
}
