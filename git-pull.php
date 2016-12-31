<?php

$githubSignature = getallheaders()['X-Hub-Signature'];

$githubSignature = mb_substr($githubSignature, 5);

$realSignature = hash_hmac('sha1', file_get_contents('php://input'), 'XnzLM8BynPmfNtVDdkadsX6hZQ>?py');

if ($githubSignature !== $realSignature) {
	http_response_code(401);
	exit;
}

exec('git pull');