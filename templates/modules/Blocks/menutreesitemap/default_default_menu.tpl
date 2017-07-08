{nocache}
<li>
    <a href="{$item.href}" title="{$item.title}">
        {$item.name}
    </a>
    <ul>
        {menutreesitemap data=$nodes parentclass='default'}
    </ul>
</li>
{/nocache}