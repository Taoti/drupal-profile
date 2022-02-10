# CHANGELOG

## 0.3.0

### Documentation
- Added changelog

## 0.2.4

### Basic Page
- added form_display and view_display configs

## 0.2.3

### Basic Page
- updated node.body configs

## 0.2.2

### Basic Page
- Updated image_caption configs

## 0.2.1

### REPEAT Twig Module
- Reverted repeat_twig addition, this was throwing errors in composer because 'repositories' section needs to be in parent `composer.json` file in parent `drupal` repo

## 0.2.0

### Basic Page
- Added configs for REPEAT basic page, including associated paragraphs, fields, etc

## 0.1.5

### Default User Roles
- Fixed outdated config, which was preventing the Drupal install to proceed successfully
- Added a few custom user roles to the profile
- Fixed the permissions config
- Overriding Standard install profile roles
- Adjusted some permissions for the publisher role. 
  - Requested change: Give publisher permission to create, edit, and delete taxonomy terms

## 0.1.4

### REPEAT Twig Module
- Added repeat_twig custom module to composer

## 0.1.3

### Responsive Image Styles
- Responsive image styles, requested by FE team
- Depends on following module being installed and enabled: [Responsive Image](https://www.drupal.org/project/responsive_image)
- Also coordinates with a breakpoints file in the active theme, example here: [Taoti/Mimic/#10](https://github.com/Taoti/mimic/pull/10)

## 0.1.2

### Image Styles
- Default image styles, requested by FE team

## 0.1.1

### Gin Login
- Added Gin login module

## 0.1.0

### Init
- Updated default modules and installation
- Added base config
- Removed unneeded config, set defaults
