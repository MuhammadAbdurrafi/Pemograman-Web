<?php

session_start();
session_destroy();
echo "Logging out...";
header("Location: WebProgramming.html");
exit;