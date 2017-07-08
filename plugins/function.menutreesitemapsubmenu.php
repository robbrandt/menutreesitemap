<?php

function smarty_function_menutreesitemapsubmenu($params, $smarty)
{
    $content = "";

    $treeArray = isset($params['data']) ? $params['data'] : array();
    $parent = isset($params['parentclass']) ? $params['parentclass'] : null;

    foreach($treeArray as $index => $data) {
        $smarty->assign("item", $data['item']);
        $smarty->assign("nodes", $data['nodes']);

        if (empty($data['item']['class'])) {
            if ($parent) {
                if (empty($data['nodes'])) {
                    $content .= $smarty->fetch("menutreesitemap/".$parent."_default_item.tpl");
                } else {
                    $content .= $smarty->fetch("menutreesitemap/".$parent."_default_menu.tpl");
                }
            } else {
                if (empty($data['nodes'])) {
                    $content .= $smarty->fetch("menutreesitemap/default_item.tpl");
                } else {
                    $content .= $smarty->fetch("menutreesitemap/default_menu.tpl");
                }
            }
        } else {
            if ($data['item']['class'] == "divider") {
                if ($parent) {
                    $content .= $smarty->fetch("menutreesitemap/".$parent."_divider.tpl");
                } else {
                    $content .= $smarty->fetch("menutreesitemap/divider.tpl");
                }
            } else {
                if ($parent) {
                    if (empty($data['nodes'])) {
                        $content .= $smarty->fetch("menutreesitemap/".$parent."_".$data['item']['class']."_item.tpl");
                    } else {
                        $content .= $smarty->fetch("menutreesitemap/".$parent."_".$data['item']['class']."_menu.tpl");
                    }
                } else {
                    if (empty($data['nodes'])) {
                        $content .= $smarty->fetch("menutreesitemap/".$data['item']['class']."_item.tpl");
                    } else {
                        $content .= $smarty->fetch("menutreesitemap/".$data['item']['class']."_menu.tpl");
                    }
                }
            }
        }
    }

    return $content;
}