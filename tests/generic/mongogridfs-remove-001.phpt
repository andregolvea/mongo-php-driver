--TEST--
MongoGridFS::remove() with no arguments
--SKIPIF--
<?php require dirname(__FILE__) . "/skipif.inc";?>
--FILE--
<?php
require_once dirname(__FILE__) . "/../utils.inc";
$mongo = mongo();
$db = $mongo->selectDB(dbname());

$gridfs = $db->getGridFS();
$gridfs->drop();
$gridfs->storeFile(__FILE__);

var_dump(0 < $gridfs->chunks->count());
var_dump(1 === $gridfs->count());

$gridfs->remove();

var_dump(0 === $gridfs->chunks->count());
var_dump(0 === $gridfs->count());
--EXPECT--
bool(true)
bool(true)
bool(true)
bool(true)
