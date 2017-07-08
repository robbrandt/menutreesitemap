<?php

function smarty_function_menutreesitemap($params, $smarty)
{
    $content = "";

    $treeArray = isset($params['data']) ? $params['data'] : array();

    //count lines in sitemap
    $linetotal = sizeof($treeArray);
    foreach($treeArray AS $treerow){
        $linetotal = $linetotal+sizeof($treerow['nodes']);
    }

    if ($params['parentclass'] == '' || is_null($params['parentclass'])) {
        $content .= $smarty->fetch("menutreesitemap/opendiv.tpl");
        $divcount = 1;
    }
    foreach($treeArray as $index => $data) {

        $smarty->assign("item", $data['item']);
        $smarty->assign("nodes", $data['nodes']);

        if (empty($data['item']['class'])) {
            if (empty($data['nodes'])) {
                $content .= $smarty->fetch("menutreesitemap/default_item.tpl");
            } else {
                $content .= $smarty->fetch("menutreesitemap/default_menu.tpl");
            }
        } else {
            if ($data['item']['class'] == "divider") {
                $content .= $smarty->fetch("menutreesitemap/divider.tpl");
            } else {
                if (empty($data['nodes'])) {
                    $content .= $smarty->fetch("menutreesitemap/".$data['item']['class']."_item.tpl");
                } else {
                    $content .= $smarty->fetch("menutreesitemap/".$data['item']['class']."_menu.tpl");
                }
            }
        }
        if ($params['parentclass'] == '' || is_null($params['parentclass'])) {
            $linecount++;
            $linecount = $linecount + sizeof($data['nodes']);
            if (($linecount > $linetotal / 3) && $divcount < 3) {
                $content .= $smarty->fetch("menutreesitemap/closediv.tpl");
                $content .= $smarty->fetch("menutreesitemap/opendiv.tpl");
                $linecount = 0;
                $divcount++;
            }
        }

    }
    if ($params['parentclass'] == '' || is_null($params['parentclass'])) {
        $content .= $smarty->fetch("menutreesitemap/closediv.tpl");
    }

    return $content;
}
