{* Smarty *}
<div class="blocks pages">
    <div class="header">
        <h2>Pagina's</h2>
        <span class="action"><a href="{$SCRIPT_NAME|replace:'index.php':''}pages/create/" title="Pagina toevoegen">Pagina toevoegen</a></span>
    </div>
    <div class="block pages">
        <div class="row header">
            <div class="column column1">Titel</div>
            <div class="column column2">Actief</div>
            <div class="column column3">Aangemaakt op</div>
            <div class="column column4">Aangepast op</div>
            <div class="column column5">&nbsp;</div>
            <!--<div class="column column6">&nbsp;</div>-->
        </div>
    {section name=pagesec loop=$data}
        {assign var=pages value=$data[pagesec]}
        <div class="row instance">
            <div class="column column1">{$pages->getTitle()|escape}</div>
            <div class="column column2">{if $pages->getActive() ne 0}Actief{else}Niet-actief{/if}</div>
            <div class="column column3">{$pages->getCreated()|date_format:"%d-%m-%Y"}</div>
            <div class="column column4">{$pages->getUpdated()|date_format:"%d-%m-%Y"}</div>
            <div class="column column5"><a href="{$SCRIPT_NAME|replace:'index.php':''}pages/edit/{$pages->getId()}/" title="Bewerken">Bewerken</a></div>
            <!--<div class="column column6"><a href="{$SCRIPT_NAME|replace:'index.php':''}pages/delete/{$pages->getId()}/" title="Verwijderen">Verwijderen</a></div>-->
        </div>
    {/section}
    </div>
</div>