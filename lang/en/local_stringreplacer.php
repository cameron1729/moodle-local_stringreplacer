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
 * @package     local_stringreplacer
 * @copyright   2023 Cameron Ball <cameron@cameron1729.xyz>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$string['pluginname'] = 'String replacer';
$string['patterns'] = 'String replacement patterns';
$string['patterns_help'] = 'Strings to find and replace. Each entry should be on a new line and in the format search|replace - where "search" is the string to be replaced, and "replace" is the string it will be replaced with. For example, course|unit will replace any instance of the string "course" with the string "unit". Note that patterns are case sensitive; i.e., course|unit will not replace "Course".';
$string['excludecomponents'] = 'Components to exclude from string replacement';
$string['excludecomponents_help'] = 'Components selected here will not be mutated by the string replacer plugin.';
$string['wholewordonly'] = 'Replace whole words only';
$string['wholewordonly_help'] = 'When enabled, only whole words will be replaced. For example, given a pattern of course|unit - the substring "course" in "My courses" will NOT be replaced with "unit", i.e., the entire string will remain unmodified. With the setting disabled, the string will become "My courses".';
