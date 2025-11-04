# Starter Blocks

A plugin boilerplate focused on custom block development.

## Requirements

- **PHP:** 8.1 or higher
- **WordPress:** 6.8 or higher
- **Node.js:** 20 or higher (see `.nvmrc` for current version)
- **Composer:** Latest version

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

### NPM scripts
- `npm run start` - Start development mode with hot reload
- `npm run build` - Build all blocks for production
- `npm run lint:js` - Lint JavaScript files
- `npm run format` - Format code
- `npm run create-block` - Create a new block with guided setup

### Composer scripts
- `composer run phpcs` - Check PHP coding standards
- `composer run phpcbf` - Fix PHP coding standards
- `composer run phpcompat` - Check PHP compatibility
- `composer run phpstan` - Run static analysis on PHP files

## GitHub workflows

| Workflow                | Trigger                                       | Actions                                                                                                         |
|-------------------------|-----------------------------------------------|-----------------------------------------------------------------------------------------------------------------|
| PHP Code Quality        | Push/PR to main, PHP file changes             | • Coding standards (PHPCS)<br>• Compatibility checks<br>• Static analysis (PHPStan)                             |
| JavaScript Code Quality | Push/PR to main, JS file changes              | • Linting (ESLint)<br>• Node.js compatibility checks                                                            |
| Validate JSON files     | Push/PR to main, theme.json or styles changes | • JSON syntax validation<br>• theme.json schema validation<br>• Block styles validation                         |
| Build                   | Push/PR to main, build-related changes        | • Build theme assets<br>• Run unit tests<br>• Generate language files<br>• Create distributable archive         |
| Release                 | New version tag                               | • Build theme<br>• Create GitHub release<br>• Upload theme archive                                              |
| Deployment              | Manual trigger                                | • Verify PHP compatibility<br>• Validate JSON schema<br>• Build theme assets<br>• Deploy to staging environment |

## Deployment configuration

The deployment workflow requires the following configuration in your GitHub repository.

### Environment variables
- `URL`: The URL of your environment (e.g., `https://staging.example.com`)

### Environment secrets
- `SSH_KEY`: Your private SSH key for server authentication
- `SSH_CONFIG`: SSH configuration for your server. The `Host` need to be derived from the `URL` variable while `HostName` is the actual server IP or domain name:
  ```
  Host staging.example.com
    HostName 123.123.123.123
    User deploy
    Port 22
  ```

- `KNOWN_HOSTS`: SSH known hosts entries for your server (use the server address)
  ```bash
  # Get the known hosts entry
  ssh-keyscan -H staging.example.com
  ```

- `DEPLOY_PATH`: Path to the plugin directory
  ```
  /var/www/staging.example.com/wp-content/plugins/starter-blocks
  ```

### Server requirements
- SSH access configured with the deployment public key in `~/.ssh/authorized_keys`
- Write permissions on the theme directory for the SSH-authenticated user
