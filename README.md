# menutreesitemap
Display a sitemap based on menutree settings

This project is meant to display a sitemap based on a Zikula menu configured in menutree for Zikula 1.3.  It is essentially a different way to display a menutree menu as a sitemap.

These files should be dropped into whatever theme directory you mean to use it within.

The sitemap would be instantiated by use of a Smarty block call, for example

{block bid=17 menutree_tpl="menutree/sitemap.tpl" menutree_stylesheet='sitemap.css' position='footer'}

