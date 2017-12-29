<?php
if (isset($_GET['mail'])){
$mail= $_GET['mail'];
}
else{
print "Une erreur s'est produite";  
}

?>


<input type="text" name="mail" value=<?php print $mail  ?> size="50" />
<textarea name="textarea"
   rows="10" cols="50">
  Vous pouvez écrire quelque
  chose ici.
</textarea>


<input type="submit" value="envoie" name="envoie" />
<input type="reset" value="annule" name="annule" />
