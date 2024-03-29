{* Smarty *}
    <div class="form">
    <form action="{$SCRIPT_NAME|replace:'index.php':''}pages/update/{$pages->getId()}/" method="post">
        {if $error ne '' }
            {if $error eq 'user_not_found'} De gebruikersnaam en het wachtwoord komen niet overeen, probeer het opnieuw.
            {elseif $error eq 'email_invalid'} Vul een geldig emailadres in.
            {/if}
        {/if}
        <div class="blocks pageform">
            <div class="block settings">
                <div class="field">
                    <div class="question"><label for="title">Titel</label></div>
                    <div class="answer"><input id="title" name="title" type="text" value="{$pages->getTitle()|escape}" placeholder="Titel" /></div>
                </div>
                <div class="field">
                    <div class="question"><label for="active">Actief</label></div>
                    {if $pages->getActive() == 1}
                        <div class="answer"><input id="active" name="active" type="checkbox" checked="checked" /></div>
                    {else}
                        <div class="answer"><input id="active" name="active" type="checkbox"/></div>
                    {/if}
                </div>
                <div class="field">
                    <div class="question"><label for="metatitle">Meta titel</label></div>
                    <div class="answer"><input id="metatitle" name="metatitle" type="text" value="{$pages->getMetatitle()|escape}" maxlength="160" placeholder="Titel van de pagina voor de zoekmachines, max 160 karakters" /></div>
                </div>
                <div class="field">
                    <div class="question"><label for="metadescription">Meta omschrijving</label></div>
                    <div class="answer"><textarea id="metadescription" name="metadescription" placeholder="Omschrijving van de pagina voor de zoekmachines, max 320 karakters">{$pages->getMetadescription()|escape}</textarea></div>
                </div>
                <div class="field">
                    <div class="question"><label for="keywords">Trefwoorden (keywords)</label></div>
                    <div class="answer"><textarea id="keywords" name="keywords" placeholder="Zoekwoord suggesties voor de zoekmachines, max 20 suggesties" >{$pages->getKeywords()|escape}</textarea></div>
                </div>
                <div class="buttons">
                    <input type="submit" value="Opslaan" />
                </div>
            </div>
            <div class="block page">
                <div class="field">
                    <div class="answer"><textarea id="tinymce" name="text" placeholder="Tekstuele inhoud">{$pages->getText()|escape}</textarea></div>
                </div>
            </div>
        </div>
    </form>
</div>