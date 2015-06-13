<?php
array_shift($argv);
$replacements=[
    "%COMMIT_HASH%"=>`git log -1 --pretty=%H|tr -d '\n'`,
    "%COMMIT_MSG%"=>`git log -1 --pretty=%B|tr -d '\n'`,
    "%GIT_DESCRIBE%"=>`git describe --tags|tr -d '\n'`,
    "%NO_MUSIC%"=>array_shift($argv),
    "%NO_EFFECTS%"=>array_shift($argv),
];
$conts=str_replace(array_keys($replacements),array_values($replacements),file_get_contents("templates/settings.as"));
file_put_contents("src/Settings.as",$conts);
