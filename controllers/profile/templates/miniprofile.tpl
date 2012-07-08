{* Smarty *}
<div class="blocks logins">
    <div class="header">
        <h2>Ingelogd</h2>
        <span class="action"><a href="{$SCRIPT_NAME|replace:'index.php':''}profile/logout/" title="Uitloggen">Uitloggen</a></span>
    </div>
    {if isset($profile)}
        <div class="block login">
            <div class="header"><h3><a href="{$SCRIPT_NAME|replace:'index.php':''}book/view-profile/{$profile->getId()|escape}/">{$profile->getName()|escape} {$profile->getLastname()|escape}</a></h3></div>
            <div class="section">{$profile->getEmailaddress()|escape}</div>
        </div>
    {/if}
</div>