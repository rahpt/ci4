<?php

function getMenuDivider($menuItem) {
    return '<li class="nav-label">' . lang($menuItem->divider) . '</li>';
}

function getMenuItem($menuItem): string {
    $external = $menuItem->external ?? 'target="_blank"';
    $icon = isset($menuItem->icon) ? "<i class='$menuItem->icon'></i>" : '';
    $menu = '<li>' .
            "<a $external href='$menuItem->url' aria-expanded='false'>" .
            $icon .
            '<span class="nav-text">' . lang($menuItem->title) . '</span>' .
            '</a>' .
            '</li>';
    return $menu;
}

function getMenuItemParent($menuItem, $submenu): string {
    $icon = isset($menuItem->icon) ? "<i class='$menuItem->icon'></i>" : '';
    $menu = '<li>' .
            "<a class='has-arrow' href='Javascript:void()' aria-expanded='false'>" .
            $icon .
            '<span class="nav-text">' . lang($menuItem->title) . '</span>' .
            '</a>' .
            $submenu .
            '</li>';
    return $menu;
}

function getMenu($menus): string {
    $r = '';
    if (isset($menus->divider)) {
        return getMenuDivider($menus);
    }

    if (is_array($menus)) {
        foreach ($menus as $m) {
            $r .= getMenu($m);
        }
        return $r;
    }

    if (isset($menus->children) && count($menus->children) > 0) {
        $submenu = '';
        foreach ($menus->children as $m) {
            $submenu .= getMenu($m);
            // dd($m, $submenu);
        }
        $submenu = '<ul aria-expanded="false">' . $submenu . '</ul>';
        $r .= getMenuItemParent($menus, $submenu);
    } else {
        $r .= getMenuItem($menus);
    }

    return $r;
}

function prepareMenu(): string {
    $menus = null;
    if (file_exists(APPPATH . "Views/menus/Backend.json")) {
        $menusJSON = file_get_contents(APPPATH . "Views/menus/Backend.json");
        $menus = json_decode($menusJSON);
    }

    $menu = getMenu($menus);

    return $menu;
}

function salutation(): string {
    $hora = date('H');

    //Salutation
    if ($hora >= 6 && $hora <= 12) {
        $salutation = lang("App.dashboard_good_morning");
    } else if ($hora > 12 && $hora <= 18) {
        $salutation = lang("App.dashboard_good_afternoon");
    } else {
        $salutation = lang("App.dashboard_good_night");
    }
    return $salutation;
}
