<?php

namespace App\Controllers;

class Dashboard extends BaseController {

    function __construct() 
    {
        helper('general');
    }

    private function getMenuDivider($menuItem) {
        return '<li class="nav-label">' . lang($menuItem->divider) . '</li>';
    }

    private function getMenuItem($menuItem): string {
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
    
    private function getMenuItemParent($menuItem, $submenu): string {
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

    private function getMenu($menus): string {
        $r = '';
        if (isset($menus->divider)) {
            return $this->getMenuDivider($menus);
        }

        if (is_array($menus)) {
            foreach ($menus as $m) {
                $r .= $this->getMenu($m);
            }
            return $r;
        }
        
        if (isset($menus->children) && count($menus->children) > 0) {
            $submenu = '';
            foreach ($menus->children as $m) {
                $submenu .= $this->getMenu($m);
                // dd($m, $submenu);
            }
            $submenu = '<ul aria-expanded="false">' . $submenu . '</ul>';
            $r .= $this->getMenuItemParent($menus, $submenu);
        } else {
            $r .= $this->getMenuItem($menus);
        }

        return $r;
    }

    private function prepareMenu(): string {
        $menus = null;
        if (file_exists(APPPATH . "Views/menus/Backend.json")) {
            $menusJSON = file_get_contents(APPPATH . "Views/menus/Backend.json");
            $menus = json_decode($menusJSON);
        }

        $menu = $this->getMenu($menus);

        return $menu;
    }

    private function salutation(): string {
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

    public function index(): void {
        $salutation = $this->salutation();
        $data['menus'] = $this->prepareMenu();

        echo view(getenv('theme.backend.path') . 'main/header', $data);
        echo view(getenv('theme.backend.path') . 'form/dashboard/index');
        echo view(getenv('theme.backend.path') . 'main/footer');
    }
}
