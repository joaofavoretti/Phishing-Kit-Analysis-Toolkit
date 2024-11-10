<?php

file_put_contents("../honeypotbots.dat", getenv('REMOTE_ADDR').',', FILE_APPEND);


?>