<?php
/**
 * Plugin Name: Starter Blocks
 * Description: Custom blocks
 * Author: Benoît Chantre
 * Author URI: https://benoitchantre.com
 * Requires at least: 6.8
 * Requires PHP: 8.1
 * Version: 0.0.1
 * Updater URI: false
 * License: GPL-2.0-or-later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: starter-blocks
 * Domain Path: /languages
 */

declare(strict_types=1);

namespace StarterBlocks;

use function add_action;
use function wp_register_block_types_from_metadata_collection;
use function wp_set_script_translations;

// Prevent direct access.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Initialize the plugin.
 */
function init(): void {
	// Register blocks.
	register_blocks();
}
add_action( 'init', __NAMESPACE__ . '\init' );

/**
 * Register all blocks from the build directory using blocks manifest.
 */
function register_blocks(): void {
	$block_manifest_path = __DIR__ . '/build/blocks-manifest.php';

	// Check if blocks have been built.
	if ( ! file_exists( $block_manifest_path ) ) {
		return;
	}

	// Register blocks from manifest collection.
	wp_register_block_types_from_metadata_collection(
		__DIR__ . '/build',
		$block_manifest_path
	);

	/**
	 * Internationalization support for block scripts.
	 * Add script handles here when blocks use i18n functions.
	 * Example: array( 'starter-blocks-example-block-editor-script' );
	 */
	$script_handles_requiring_i18n = array();

	foreach ( $script_handles_requiring_i18n as $handle ) {
		wp_set_script_translations(
			$handle,
			'starter-blocks',
			__DIR__ . '/languages'
		);
	}
}

/**
 * Enqueue block editor assets.
 */
function enqueue_block_editor_assets(): void {
	// You can add global editor styles or scripts here if needed.
}
add_action( 'enqueue_block_editor_assets', __NAMESPACE__ . '\enqueue_block_editor_assets' );

/**
 * Enqueue frontend assets.
 */
function enqueue_block_assets(): void {
	// You can add global frontend styles here if needed.
}
add_action( 'enqueue_block_assets', __NAMESPACE__ . '\enqueue_block_assets' );
