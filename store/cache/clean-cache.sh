#!/bin/bash

STORE_DIR=/home/zido/git/sonoloc71/store
CACHE_DIR=${STORE_DIR}/cache
SMARTY_DIR=${CACHE_DIR}/smarty/cache/
COMPILE_DIR=${CACHE_DIR}/smarty/compile/

rm -f ${CACHE_DIR}/class_index.php

find "$SMARTY_DIR" -type d -exec rm -fr {} \;

find "$COMPILE_DIR" -type d -exec rm -fr {} \;

exit 0
