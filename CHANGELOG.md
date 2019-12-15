# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/), and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## Unreleased

For a full diff see [`0.2.1...master`][0.2.1...master].

## [`0.2.1`][0.2.1]

For a full diff see [`0.2.0...0.2.1`][0.2.0...0.2.1].

### Fixed

* Removed an inappropriate `replace` configuration from `composer.json` ([#23]), by [@localheinz]

## [`0.2.0`][0.2.0]

For a full diff see [`0.1.0...0.2.0`][0.1.0...0.2.0].

### Changed

* Required `phpunit/phpunit:^8.5.0` ([#10]), by [@localheinz]
* Renamed vendor namespace `Localheinz` to `Ergebnis` after move to [@ergebnis] ([#20]), by [@localheinz]

  Run

  ```
  $ composer remove localheinz/phpunit-framework-constraint
  ```

  and

  ```
  $ composer require ergebnis/phpunit-framework-constraint
  ```

  to update.

  Run

  ```
  $ find . -type f -exec sed -i '.bak' 's/Localheinz\\PHPUnit\\Framework\\Constraint/Ergebnos\\PHPUnit\\Framework\\Constraint/g' {} \;
  ```

  to replace occurrences of `Localheinz\PHPUnit\Framework\Constraint` with `Ergebnis\PHPUnit\Framework\Constraint`.

  Run

  ```
  $ find -type f -name '*.bak' -delete
  ```

  to delete backup files created in the previous step.

### Fixed

* Dropped support for PHP 7.1 ([#8]), by [@localheinz]

## [`0.1.0`][0.1.0]

For a full diff see [`49693ce...0.1.0`][49693ce...0.1.0].

### Added

* Added `JsonIdentical` constraint ([#1]), by [@localheinz]

[0.1.0]: https://github.com/ergebnis/phpunit-framework-constraint/releases/tag/0.1.0
[0.2.0]: https://github.com/ergebnis/phpunit-framework-constraint/releases/tag/0.2.0
[0.2.1]: https://github.com/ergebnis/phpunit-framework-constraint/releases/tag/0.2.1

[49693ce...0.1.0]: https://github.com/ergebnis/phpunit-framework-constraint/compare/49693ce...0.1.0
[0.1.0...0.2.0]: https://github.com/ergebnis/phpunit-framework-constraint/compare/0.1.0...0.2.0
[0.2.0...0.2.1]: https://github.com/ergebnis/phpunit-framework-constraint/compare/0.2.0...0.2.1
[0.2.1...master]: https://github.com/ergebnis/phpunit-framework-constraint/compare/0.2.1...master

[#1]: https://github.com/ergebnis/phpunit-framework-constraint/pull/1
[#8]: https://github.com/ergebnis/phpunit-framework-constraint/pull/8
[#10]: https://github.com/ergebnis/phpunit-framework-constraint/pull/10
[#20]: https://github.com/ergebnis/phpunit-framework-constraint/pull/20
[#23]: https://github.com/ergebnis/phpunit-framework-constraint/pull/23

[@ergebnis]: https://github.com/ergebnis
[@localheinz]: https://github.com/localheinz
