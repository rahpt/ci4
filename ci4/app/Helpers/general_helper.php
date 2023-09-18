<?php

////////////////////////////////////////////////////
/// Control Rules and Menus
////////////////////////////////////////////////////
function getControlRules($getRules, $item) {
    foreach ($getRules as $key => $value) {
        if ($key == $item['name']) {
            $item['methods'] = $value;
            $data[] = $item;
        }
    }
    return $data;
}

function getMenuControl() {
    try {
        $getClass = getAllClass();
        $getRules = json_decode(session()->get('rules') ?? '[]');
        foreach ($getClass as $item) {
            $data = array_merge(getControlRules($getRules, $item), $data);
        }
        return $data ?? [];
    } catch (Exception $e) {
        session()->setFlashdata('alert', 'error_acesso');
        return [];
    }
}

/**
 * 
 * @param array $array - Permissions 
 * @param string $key
 * @param string $word
 * @param bool $isArray
 * @return type
 */
function getArrayItem(array $array, string $key, string $word, bool $isArray = false) {
    $data = [];
    try {
        foreach ($array as $item) {
            if ($isArray) {
                foreach ($item[$key] as $subitem) {
                    if ($subitem == $word) {
                        $data[] = $subitem;
                    }
                }
            } else {
                if ($item[$key] == $word) {
                    $data[] = $item;
                }
            }
        }
        return $data ?? [];
    } catch (Exception $e) {
        return [];
    }
}

////////////////////////////////////////////////////
/// Notification Messages
////////////////////////////////////////////////////


function toastAlert() {
    try {
        $session = session();
        $alert = $session->getFlashdata('toast');
        if (count((array) $alert) == 3) {
            return "<script>" .
                    "    $(document).ready(function () {" .
                    "           'use strict';" .
                    "           let config = {" .
                    "	            positionClass: 'toast-top-center'," .
                    "	            timeOut: 5e3," .
                    "	            closeButton: !0," .
                    "	            debug: !1," .
                    "	            newestOnTop: !0," .
                    "	            progressBar: !0," .
                    "	            preventDuplicates: !0," .
                    "	            onclick: null," .
                    "	            showDuration: '300'," .
                    "	            hideDuration: '1000'," .
                    "	            extendedTimeOut: '1000'," .
                    "	            showEasing: 'swing'," .
                    "	            hideEasing: 'linear'," .
                    "	            showMethod: 'fadeIn'," .
                    "	            hideMethod: 'fadeOut'," .
                    "	            tapToDismiss: !1" .
                    "           };" .
                    "           toastr." . $alert[0] . "('" . $alert[2] . "','" . $alert[1] . "',config);" .
                    "        });" .
                    "</script>";
        }
    } catch (Exception $ex) {
        
    }
}

function langJS() {
    $lang = session()->get('lang') ?? 'en';
    switch ($lang) {
        case "pt":
            return "pt-br";
        default:
            return $lang;
    }
}

function version() {
    return "0.1";
}
