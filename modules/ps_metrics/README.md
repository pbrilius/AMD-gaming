![alt tag](views/img/logo-ps-metrics.png)

## About

Module for Prestashop Metrics

## Contributing

Prestashop Metrics is compatible with all versions of PrestaShop 1.7 and 1.6

### Requirements

Contributors **must** follow the following rules:

- **Make your Pull Request on the "master" branch**.
- Do NOT update the module's version number.
- Follow [the coding standards][1].
- Commit rules
  _ref : https://www.conventionalcommits.org/en/v1.0.0/#summary_

**_type[optional scope]:_**

**_[optional body]_**

**_[optional footer(s)]_**

The commit contains the following structural elements, to communicate intent to the consumers of your library:

- fix: a commit of the type fix patches a bug in your codebase (this correlates with PATCH in semantic versioning).

- feat: a commit of the type feat introduces a new feature to the codebase (this correlates with MINOR in semantic versioning).

- BREAKING CHANGE: a commit that has a footer BREAKING CHANGE:, or appends a ! after the type/scope, introduces a breaking API change (correlating with MAJOR in semantic versioning). A BREAKING CHANGE can be part of commits of any type.

- types other than fix: and feat: are allowed, for example @commitlint/config-conventional (based on the the Angular convention) recommends build:, chore:, ci:, docs:, style:, refactor:, perf:, test:, and others.

- footers other than BREAKING CHANGE: may be provided and follow a convention similar to git trailer format.

### Process in details

Contributors wishing to edit a module's files should follow the following process:

1. Create your GitHub account, if you do not have one already.
2. Fork the ps_googleanalytics project to your GitHub account.
3. Clone your fork to your local machine in the `/modules` directory of your PrestaShop installation.
4. Create a branch in your local clone of the module for your changes.
5. Change the files in your branch. Be sure to follow [the coding standards][1]!
6. Push your changed branch to your fork in your GitHub account.
7. Create a pull request for your changes **on the _'dev'_ branch** of the module's project. Be sure to follow [the commit message norm][2] in your pull request. If you need help to make a pull request, read the [Github help page about creating pull requests][3].
8. Wait for one of the core developers either to include your change in the codebase, or to comment on possible improvements you should make to your code.

That's it: you have contributed to this open-source project! Congratulations!

[1]: http://doc.prestashop.com/display/PS16/Coding+Standards
[2]: http://doc.prestashop.com/display/PS16/How+to+write+a+commit+message
[3]: https://help.github.com/articles/using-pull-requests
[4]: https://support.google.com/analytics/answer/6032539
