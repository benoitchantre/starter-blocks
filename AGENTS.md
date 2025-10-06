# AI Agent Instructions

## Repository Overview

This is a **WordPress plugin boilerplate** focused on custom block development using the modern Block Editor (Gutenberg). The plugin provides a foundation for creating both static and dynamic blocks with proper build tooling and code quality standards.

**Key Information:**
- **Primary Language:** PHP 8.1+ and JavaScript (ES6+)
- **Framework:** WordPress 6.8+, WordPress Block Editor
- **Project Type:** WordPress Plugin
- **Repository Size:** Small (~50 files)
- **Build System:** @wordpress/scripts (Webpack-based)
- **Node.js Version:** 20 (see `.nvmrc`)

## Build and Development Workflow

### Initial Setup (ALWAYS run these first)
```bash
npm install && composer install
```
**Note:** Both commands must complete successfully before any development work.

### Development Commands
- `npm run start` - **Development mode with hot reload** (use for active development)
- `npm run build` - **Production build** (required before testing/deployment)
- `npm run format` - **Auto-format all code** (run before committing)
- `npm run lint:js` - **JavaScript linting**
- `npm run check-engines` - **Node.js compatibility check**
- `npm run create-block` - **Quick block scaffolding** (creates new block in src/ directory)

### WordPress Development Environment
- `npx @wordpress/env start` - **Start local WordPress environment** (Docker-based)
- `npx @wordpress/env stop` - **Stop local WordPress environment**
- Configuration in `.wp-env.json` (PHP 8.4, plugin auto-loaded)

### PHP Quality Assurance (ALWAYS run before committing)
```bash
composer run phpcs      # Check coding standards
composer run phpcbf     # Auto-fix coding standards
composer run phpstan    # Static analysis (level 8)
composer run phpcompat  # PHP 8.1+ compatibility check
```

### Validated Build Process
1. **Clean setup:** `npm install && composer install`
2. **Create blocks:** Add directories in `src/` with `block.json` files
3. **Format code:** `npm run format` (fixes most ESLint issues)
4. **Build:** `npm run build` (generates `build/` directory and `blocks-manifest.php`)
5. **Quality checks:** Run all composer scripts above
6. **Verify:** Check `build/blocks-manifest.php` exists

**Critical:** The `npm run build` command generates `build/blocks-manifest.php` which is required for the plugin to discover and register blocks.

## Project Architecture

### Directory Structure
```
starter-blocks/
├── starter-blocks.php          # Main plugin file - block registration
├── src/                        # Block source files (empty by default)
│   └── [block-name]/           # Individual block directories
│       ├── block.json          # Block metadata (required)
│       ├── index.js            # Block registration/editor code
│       ├── editor.scss         # Editor-only styles
│       ├── style.scss          # Frontend styles
│       └── render.php          # Server-side rendering (dynamic blocks)
├── build/                      # Auto-generated build files
│   ├── blocks-manifest.php     # Generated block registry
│   └── [block-name]/           # Built assets
├── languages/                  # Translation files
├── tests/                      # PHPStan bootstrap only
└── vendor/                     # Composer dependencies
```

### Configuration Files
- **`.nvmrc`** - Node.js version (20)
- **`.wp-env.json`** - WordPress development environment (PHP 8.4, Docker-based)
- **`phpcs.xml.dist`** - PHP coding standards (WordPress standards)
- **`phpstan.neon.dist`** - Static analysis config (level 8)
- **`phpcompat.xml.dist`** - PHP compatibility rules
- **`.eslintrc.js`** - JavaScript linting (WordPress standards)
- **`package.json`** - Build scripts and dependencies
- **`composer.json`** - PHP dependencies and quality tools

### Key Source Files
- **`starter-blocks.php`** - Main plugin file, registers blocks from build manifest
- **Plugin header:** Requires PHP 8.1+, WordPress 6.8+
- **Namespace:** `StarterBlocks`
- **Text domain:** `starter-blocks`

## Continuous Integration

### GitHub Workflows (all must pass)
1. **Build workflow** (`.github/workflows/build.yml`)
2. **PHP Code Quality** (`.github/workflows/php-code-quality.yml`)
   - Coding standards (PHPCS)
   - Compatibility check (PHPCompatibility)
   - Static analysis (PHPStan level 8)
3. **JavaScript Code Quality** (`.github/workflows/js-code-quality.yml`)
   - ESLint checks
   - Node.js compatibility

### Quality Gates
- **PHP:** All composer scripts must pass (phpcs, phpstan, phpcompat)
- **JavaScript:** ESLint and format checks must pass
- **Build:** Must generate valid `build/blocks-manifest.php`

## Block Development Patterns

### Creating New Blocks

**Quick method (recommended):**
```bash
npm run create-block
```
This scaffolds a new block with proper structure and configuration in the `src/` directory.

**Manual method:**
1. **Create directory:** `src/[block-name]/`
2. **Add `block.json`** with metadata (see WordPress Block Editor Handbook)
3. **Add `index.js`** for registration and editor functionality
4. **Add styles:** `editor.scss` (editor) and `style.scss` (frontend)
5. **Dynamic blocks:** Add `render.php` for server-side rendering

### Block Registration
- Blocks are **auto-discovered** from `build/` directory after `npm run build`
- Registration happens in `starter-blocks.php` via `register_blocks()` function
- Uses WordPress core `wp_register_block_types_from_metadata_collection()`

## Common Issues and Solutions

### Build Failures
- **"No entry file discovered"** - Normal when `src/` is empty
- **ESLint errors** - Run `npm run format` to auto-fix most issues
- **Missing build directory** - Run `npm run build` to generate

### Code Quality Issues
- **PHPCS failures** - Run `composer run phpcbf` for auto-fixes
- **PHPStan errors** - Review type declarations and WordPress core compatibility
- **Formatting issues** - Always run `npm run format` before committing

### Environment Issues
- **Node version mismatch** - Ensure Node.js 20 is installed (check `.nvmrc`)
- **Memory limits** - PHPStan is configured with 512M memory limit
- **Cache issues** - Clear `.cache/` directory if builds behave unexpectedly

## Validation Checklist

Before submitting changes:
1. ✅ `npm install && composer install` completed without errors
2. ✅ `npm run format` applied successfully
3. ✅ `npm run build` generates `build/blocks-manifest.php`
4. ✅ All composer quality scripts pass
5. ✅ `npm run lint:js` and `npm run check-engines` pass
6. ✅ Plugin activates in WordPress without errors

## Trust These Instructions

These instructions are comprehensive and validated. Only perform additional exploration if:
- Instructions are incomplete for your specific task
- You encounter errors not documented here
- You need to understand implementation details not covered

The build and quality processes have been tested and verified to work correctly when followed in order.
