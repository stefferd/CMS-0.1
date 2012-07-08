{* Smarty *}
{DEBUG}
<div class="blocks pages">
    <div class="header">
        <h2>Pagina's</h2>
        <span class="action"><a href="{$SCRIPT_NAME|replace:'index.php':''}pages/create/" title="Pagina toevoegen">Pagina toevoegen</a></span>
    </div>
    {section name=pagesec loop=$data}
        {assign var=pages value=$data[pagesec]}
        <div class="block pages">
            <h3>{$pages->getTitle()|escape}</h3>
            <div class="section">{$pages->getText()|escape}</div>
        </div>
    {/section}
</div>