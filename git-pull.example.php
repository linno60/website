<?php

$githubSignature = getallheaders()['X-Hub-Signature'];

$githubSignature = mb_substr($githubSignature, 5);

$realSignature = hash_hmac('sha1', file_get_contents('php://input'), 'GITHUB_SECRET_HERE');

if ($githubSignature !== $realSignature) {
    http_response_code(401);
    exit;
}

exec('git pull', $result);
exec('rm -rf buildable');
var_dump($result);
