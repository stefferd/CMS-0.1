<form class="contact" action="{$SCRIPT_NAME|replace:'index.php':''}contact/" method="POST" id="contactform">
    <div class="inputholder text">
        <div class="question text">
            <label for="contact_name">Naam: *</label>
        </div>
        <div class="answer text">
            <input type="text" value="" class="text" id="contact_name" name="contact_name" title="Naam: *">
        </div>
    </div>
    <div class="inputholder text">
        <div class="question text">
            <label for="contact_email">E-mail: *</label>
        </div>
        <div class="answer text">
            <input type="text" value="" class="text" id="contact_email" name="contact_email" title="E-mail: *">
        </div>
    </div>
    <div class="inputholder textarea">
        <div class="question textarea">
            <label for="contact_message">Vraag / Opmerking: *</label>
        </div>
        <div class="answer textarea">
            <textarea class="textarea" cols="40" rows="10" id="contact_message" name="contact_message" title="Vraag / Opmerking: *"></textarea>
        </div>
    </div>
    <div class="explain">{$snippet_required}</div>
    <input type="submit" value="Verzenden" class="submit">
</form>