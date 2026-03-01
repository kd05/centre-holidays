<?php 
  $dest = "subhosting.ts@gmail.com"; 
  $fromaddy = "support@centreholidays.com"; 
  mail("<$dest>","Test from php mail","Test","From:<$fromaddy>","-f$fromaddy"); 
?>
