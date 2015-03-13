# Changelog for Compass

## 1.1.0

Not a whole lot has changed feature-wise in this release, but a number of improvements have been made under the hood. In addition to the master and develop branches, we're now also maintaining a [node-sass branch](https://github.com/FlagshipWP/compass/tree/node-sass) which compiles faster than the Ruby Sass version.

### New Features

- Author Box Template

### Improvements

- Moved Flagship-specific code into an independent library (https://github.com/FlagshipWP/flagship-library)
- Various style improvements
- Improved template flexibility by increasing the use of `hybrid_attr`
- Switched to jit-grunt for improved task run times
- Made Genericons a bower dependency
- All 3rd party dependencies have been updated and tested

### Deprecations

- The `compass_footer_creds` function has been deprecated and will be removed on the next update.


## 1.0.0

First public release.
