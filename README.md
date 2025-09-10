# moodle-local_stringreplacer

Experimental plugin to dynamically replace text in language strings.

This branch is intended to test https://github.com/abgreeve/moodle/tree/my-MDL-86042-main

It can be used to show that "legacy" style string managers (i.e., those requiring edits to **config.php**) and string managers defined [via the DI hook](https://moodledev.io/docs/5.1/apis/core/di#injecting-dependencies) can coexist in a 100% backwards compatible way, with no changes needed to legacy constructors, and no restrictions imposed on non-legacy constructors.

## Installation

1. Ensure your Moodle codebase is using this branch: https://github.com/abgreeve/moodle/tree/my-MDL-86042-main

2. Install the plugin:

        git clone git@github.com:cameron1729/moodle-local_stringreplacer.git public/local/stringreplacer

3. Do NOT edit **config.php** - this version of the plugin uses dependency injection to override the stock string manager

4. Configure search/replace patterns in the admin UI

## Extra Fun

The changes in [my-MDL-86042-main](https://github.com/abgreeve/moodle/tree/my-MDL-86042-main) also allow "legacy" string managers to keep being used in the exact same way. To see this:

1. Ensure the [my-MDL-86042-main](https://github.com/abgreeve/moodle/tree/my-MDL-86042-main) is applied

2. Install the version of this plugin from the [master branch](https://github.com/cameron1729/moodle-local_stringreplacer/tree/master):

        git clone git@github.com:cameron1729/moodle-local_stringreplacer.git public/local/stringreplacer
        git checkout master

3. Edit **config.php**:

        $CFG->customstringmanager = '\local_stringreplacer\string_manager';

4. Observe that it all still works - confirming that legacy and non-legacy string managers can exist in perfect harmony

## See also

 - [MDL-32098](https://tracker.moodle.org/browse/MDL-32098)
 - [MDL-49361](https://tracker.moodle.org/browse/MDL-49361)
 - [MDL-57743](https://tracker.moodle.org/browse/MDL-57743)
 - [MDL-70415](https://tracker.moodle.org/browse/MDL-70415)
 - [MDL-76228](https://tracker.moodle.org/browse/MDL-76228)
 - [MDL-80073](https://moodle.atlassian.net/browse/MDL-80073)
 - [MDL-86042](https://moodle.atlassian.net/browse/MDL-86042)
