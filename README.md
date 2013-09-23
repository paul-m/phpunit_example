PHPUnit Example
===============

This is a temporary residence for the PHPUnit Example for Drupal 8.

Once a few blocking issues are resolved, this module will find its way soon into Drupal's Examples for Developers Project: https://drupal.org/project/examples

This module also exists as a patch on the Examples project issue queue: https://drupal.org/node/2032697

I created this github repo version of this module to support a session I'm giving at the Pacific Northwest Drupal Summit, and potentially BADCamp. Here's the page for that talk: http://2013.pnwdrupalsummit.org/sessions/phpunit-and-drupal-8-no-unit-left-behind

How To Use This Module
----------------------

### With Drupal 8

There are a couple of issues about Drupal and contributed modules at the moment.

One is that PHPUnit isn't properly configured to find tests in module subfolders under `/module`. That issue lives here: https://drupal.org/node/2056607

Another is that Drupal doesn't properly autoload classes from contrib modules. That issue is here: https://drupal.org/node/2025883

So to really use this module (other than just to read it, which should hopefully be instructive), you'll have to apply patches from those issues.

### Standalone

You can run the tests in this module without a Drupal installation.

It has a standard Composer structure, which you can set up in the standard Composer way. Here are the commands for those not familiar.

	$ curl -sS https://getcomposer.org/installer | php
	$ ./composer.phar install
	$ ./vendor/bin/phpunit


