<?php
echo shell_exec("git fetch --all");
echo shell_exec("git reset --hard origin/master");