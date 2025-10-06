# Starter Block Plugin

A plugin boilerplate focused on custom block development.

## Quick Start

1. **Install dependencies:**
   ```bash
   npm install
   composer install
   ```

2. **Create your first block:**
   Add a new directory in `src/` with a `block.json` file and block source files.

3. **Build blocks:**
   ```bash
   npm run build
   ```

4. **Activate the plugin** in WordPress admin.

## Project Structure

```
starter-blocks/
├── src/                    # Block source files
│   ├── example-block/      # Static block example
│   │   ├── block.json      # Block metadata
│   │   ├── index.js        # Block registration
│   │   ├── editor.scss     # Editor-only styles
│   │   └── style.scss      # Frontend styles
│   └── dynamic-block/      # Dynamic block example
│       ├── block.json      # Block metadata
│       ├── index.js        # Block registration (editor only)
│       └── render.php      # Server-side rendering
├── build/                  # Built blocks (auto-generated)
├── languages/              # Translation files
├── starter-blocks.php      # Main plugin file
├── package.json           # NPM dependencies
└── composer.json          # PHP dependencies
```

## Creating New Blocks

**Quick method (recommended):**
```bash
npm run create-block
```

This will prompt you for block details and create a properly configured block in the `src/` directory.

**Manual method:**
You can also scaffold blocks directly using the WordPress tool:

```bash
# Navigate to the src directory
cd src
```

### Static Block
```bash
# Create a new block (will prompt for details)
npx @wordpress/create-block@latest --no-plugin --namespace=starter-blocks --textdomain=starter-blocks
```

### Dynamic Block
```bash
# Create a dynamic block with server-side rendering
npx @wordpress/create-block@latest my-dynamic-block --no-plugin --namespace=starter-blocks --textdomain=starter-blocks --variant=dynamic
```

### After Creating Any Block

The plugin will automatically discover and register all blocks in the build directory after running `npm run build`.

## Development Commands

- `npm run start` - Start development mode with hot reload
- `npm run build` - Build all blocks for production
- `npm run lint:js` - Lint JavaScript files
- `npm run format` - Format code
- `npm run create-block` - Create a new block with guided setup
- `composer run phpcs` - Check PHP coding standards
- `composer run phpcbf` - Fix PHP coding standards
- `composer run phpcompat` - Check PHP compatibility
- `composer run phpstan` - Run static analysis on PHP files
