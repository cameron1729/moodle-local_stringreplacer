<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Settings page.
 *
 * @package    tool_stringreplacer
 * @copyright  2023 Cameron Ball <cameron@cameron1729.xyz>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

declare(strict_types=1);

defined('MOODLE_INTERNAL') || die;

use core_admin\local\settings\autocomplete;

if ($hassiteconfig) {
    $settingspage = new admin_settingpage('local_stringreplacer', get_string('pluginname', 'local_stringreplacer'));
    $ADMIN->add('localplugins', $settingspage);

    if ($ADMIN->fulltree) {
        $settingspage->add(new admin_setting_configtextarea(
            'local_stringreplacer/patterns',
            get_string('patterns', 'local_stringreplacer'),
            get_string('patterns_help', 'local_stringreplacer'),
            ''
        ));

        $settingspage->add(new admin_setting_configcheckbox('local_stringreplacer/wholewordonly',
            get_string('wholewordonly', 'local_stringreplacer'),
            get_string('wholewordonly_help', 'local_stringreplacer'),
            '1'
        ));

        $componentlist = array_merge(...array_values(array_map('array_keys', \core_component::get_component_list())));
        $settingspage->add(new autocomplete(
            'local_stringreplacer/excludecomponents',
            get_string('excludecomponents', 'local_stringreplacer'),
            get_string('excludecomponents_help', 'local_stringreplacer'),
            ['local_stringreplacer'],
            array_combine($componentlist, $componentlist),
            ['multiple' => 'true', 'manageurl' => false]
        ));
    }
}
