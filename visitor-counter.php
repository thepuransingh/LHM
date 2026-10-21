<?php
// Simple same-origin visitor counter. No external service, no CORS, nothing
// for ad-blockers to flag as third-party tracking.
//
// Upload this file to the SAME folder as your site's homepage on Hostinger.
// It stores the running count in visitor-count-data.json, next to this
// script, and creates that file automatically on first use starting at
// 1700 (so the very first visitor after upload sees 1701).
//
// This data file is intentionally left OUT of git (see .gitignore) so that
// redeploying your site from git never resets it back to a stored value -
// it only gets touched by this script, incrementing by one on every call.

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$dataFile = __DIR__ . '/visitor-count-data.json';
$baseline = 1700;

$fp = fopen($dataFile, 'c+');
if (!$fp) {
    http_response_code(500);
    echo json_encode(['error' => 'counter unavailable']);
    exit;
}

flock($fp, LOCK_EX);
$contents = stream_get_contents($fp);
$data = json_decode($contents, true);
$count = (is_array($data) && isset($data['count'])) ? (int)$data['count'] : $baseline;
$count++;

ftruncate($fp, 0);
rewind($fp);
fwrite($fp, json_encode(['count' => $count]));
fflush($fp);
flock($fp, LOCK_UN);
fclose($fp);

echo json_encode(['count' => $count]);
