<?php
/**
 * PHPStan bootstrap file.
 *
 * Minimal bootstrap since WordPress stubs and extensions handle most setup.
 *
 * @package StarterBlocks
 */

declare(strict_types=1);

// Load Composer autoloader if available.
$autoloader_path = dirname( __DIR__ ) . '/vendor/autoload.php';
if ( file_exists( $autoloader_path ) ) {
	require_once $autoloader_path;
}
