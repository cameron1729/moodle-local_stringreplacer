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
 * Custom string manager for local_stringreplacer.
 *
 * @package     local_stringreplacer
 * @copyright   2023 Cameron Ball <cameron@cameron1729.xyz>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

declare(strict_types=1);

namespace local_stringreplacer;

/**
 * String manager which can naively replace patterns within language strings.
 *
 * @copyright  2023 Cameron Ball <cameron@cameron1729.xyz>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class string_manager extends \core_string_manager_standard {

    public function get_string($identifier, $component = '', $a = null, $lang = null) {
        $config = get_config('local_stringreplacer');
        $string = parent::get_string($identifier, $component, $a, $lang);

        if (in_array($component, explode(',', $config->excludecomponents))) {
            return $string;
        }

        $wholeword = $config->wholewordonly ? "\b" : '';
        $patterns = array_map(
            fn(string $l): array => array_map('trim', explode("|", $l)),
            explode("\n", $config->patterns)
        );

        return preg_replace(
            array_map(
                fn(string $f): string => '/' . $wholeword . $f . $wholeword . '/',
                array_column($patterns, 0)
            ),
            array_column($patterns, 1),
            $string
        );
    }
}
