{* Smarty *}
<form action="{$SCRIPT_NAME|replace:'index.php':''}profile/login/" method="post">
    {if $error ne '' }
        {if $error eq 'user_not_found'} De gebruikersnaam en het wachtwoord komen niet overeen, probeer het opnieuw.
        {elseif $error eq 'email_invalid'} Vul een geldig emailadres in.
        {/if}
    {/if}
    <div class="field">
        <div class="question"><label for="username">Gebruikersnaam</label></div>
        <div class="answer"><input id="username" name="username" type="text" value="" /></div>
    </div>
    <div class="field">
        <div class="question"><label for="password">Wachtwoord</label></div>
        <div class="answer"><input id="password" name="password" type="password" /></div>
    </div>
    <div class="buttons">
        <input type="submit" value="Inloggen" />
        <a href="{$SCRIPT_NAME|replace:'index.php':''}profile/subscribe/" title="Aanmelden">Aanmelden</a>
    </div>
</form>