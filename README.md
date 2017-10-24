CodeSpace
======

Simplify the management of your local projects and code repositories.

## Why CodeSpace?

While adopting the SoA (micro-service) architecture, we experienced a tiny little issue when managing our projects. Basically, the more services we make, the more code bases we have to manage in the local dev environment. Currently I'm maintaining over 300 code repositories.

CodeSpace helps you to keep track of these code repositories, and allows you to perform some mass commands on them.

## Project scanner

This tool will automatically scan your computer for project directories.
It currently requires a certain directory structure (configurability for personal preferences may be added later).

1. All git repositories go in the  `~/code` directory.
2. In there, create a directory per group/organization (just like on github).
3. In those directories you create the actual git repositories.

## Getting started

### Install dependencies:

Install PHP dependencies using Composer
```
composer install
```

## Commands

You can view all available commands by running `bin/codespace`

### projects:scan

Scans your computer for projects (according to structure described above), and lists the found project directories.

### atom:update

This command will scan your machine for projects, and generate a new `~/.atom/projects.cson` file.
This can be used in combination with this awesome atom plugin:

    https://atom.io/packages/project-manager

## License

Please refer to the included LICENSE.md file
