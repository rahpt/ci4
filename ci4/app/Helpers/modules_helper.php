<?php

function addModulesInPSR4(array $mods) {
        // adiciona os modulos no AUTOLOAD
    $psr4 = [];
    foreach ($mods as $item) {
        if ($item->status) {
            $psr4[$item->directory] = APPPATH . "Modules/" . $item->directory;
        }
    }
    return $psr4;

}
/**
 * Load activated plugins to the psr4 variable
 */
function loadModulesPSR4() {
    $directory = APPPATH . 'Modules/';
    if (!is_dir($directory)) {
        return [];
    }

    if (!file_exists($directory . 'Modules.json')) {
        $dirs = glob($directory . '*', GLOB_ONLYDIR);
        foreach ($dirs as $dir) {
            $mods[] = (object) ['directory' => str_replace($directory, '', $dir), 'status' => true];
        }
    } else {
        $modsJSON = file_get_contents($directory . "Modules.json");
        $mods = json_decode($modsJSON);
    }

    if (!($mods && is_array($mods) && count($mods))) {
        return [];
    }
    return addModulesInPSR4($mods);
}
