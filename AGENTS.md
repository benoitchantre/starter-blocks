# AI Agent Instructions

## Repository Overview

A WordPress plugin boilerplate for custom block development using the Block Editor (Gutenberg).

## Build Commands

**npm:**
- `npm run build` — compile assets for production
- `npm run start` — watch mode for development
- `npm run format` — auto-format files
- `npm run lint:js` — lint JavaScript
- `npm run check-engines` — Node.js compatibility check
- `npm run create-block` — scaffold a new block in `src/`

**Composer:**
- `composer run phpcs` — PHP CodeSniffer
- `composer run phpcbf` — auto-fix PHP coding standards
- `composer run phpstan` — static analysis (level 8)
- `composer run phpcompat` — PHP compatibility checks

## Directory Structure

```
├── starter-blocks.php         # Main plugin file with activation hooks
├── uninstall.php              # Plugin cleanup on uninstall
├── src/                        # Block source files
│   └── [block-name]/
│       ├── block.json          # Block metadata (required)
│       ├── index.js            # Block registration/editor code
│       ├── editor.scss         # Editor-only styles
│       ├── style.scss          # Frontend styles
│       └── render.php          # Server-side rendering (dynamic blocks)
├── build/                      # Compiled output (auto-generated)
│   └── blocks-manifest.php     # Generated block registry
├── languages/
├── tests/                      # PHPStan bootstrap only
└── vendor/                     # Composer dependencies
```

## Verifying Changes

After making changes, run the tools relevant to the files you changed, then always build:

- PHP files: `composer run phpcs`, `composer run phpstan`
- JS files: `npm run lint:js`
- Always run `npm run build` last

## Development Guidelines

**Adding a Custom Block**: run `npm run create-block`, then develop the block. It is automatically registered via `blocks-manifest.php` in `starter-blocks.php`.
