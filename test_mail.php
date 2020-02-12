<?php
$msg = "
        Hello Aksha,\n
        Cron generated successfully.";

$headers = "From: FoxTrot Online <system@FoxTrotOnline.com>\n";

//		Send email
$flag     = mail('scspl.aksha@gmail.com', "FoxTrot Online Cron Recovery", $msg, $headers);

?>