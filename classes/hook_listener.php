<?php

namespace local_stringreplacer;

use core\hook\di_configuration;

use function DI\autowire;

defined('MOODLE_INTERNAL') || die();

class hook_listener {
    public static function inject_dependencies(di_configuration $hook): void {
        $config = get_config('local_stringreplacer');

        $hook->add_definition(
                   \core\strings\string_manager::class,
                   autowire(\local_stringreplacer\string_manager::class)
                       ->constructorParameter('config', $config));
    }
}
