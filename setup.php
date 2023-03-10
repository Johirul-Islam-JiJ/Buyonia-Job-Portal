<?php

$envFilePath = './.env';

$envFileContent = file_get_contents($envFilePath);

$key = "DB_DATABASE";

$oldPair = '';

$newPair = $key . '=' . $argv[1];

$newEnvFileContent = '';

if (preg_match("#^ *{$key} *= *[^\r\n]*$#uimU", $envFileContent, $matches))
{
    $oldPair = $matches[0];
}

$replaced = preg_replace('/^' . preg_quote($oldPair, '/') . '$/uimU', $newPair, $envFileContent);

$newEnvFileContent = $replaced;

file_put_contents($envFilePath, $newEnvFileContent, LOCK_EX);


