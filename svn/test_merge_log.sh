#!/bin/bash
# merge REPOS1 log to REPOS2 folder
# run it as root
# # bash test_merge_log.sh <SVN_REPOS1_PATH> <SVN_REPOS2_PATH> <REPOS2_FOLDER>
# eg. # bash test_merge_log.sh /home/svn/test /home/svn/test2 trunk/media/cloud/web/internet

SVN_REPOS1_PATH=$1
SVN_REPOS2_PATH=$2
REPOS2_FOLDER=$3

svnadmin dump ${SVN_REPOS1_PATH} > test.dump
cat test.dump | svndumpfilter include "trunk" --drop-empty-revs --renumber-revs > test_trunk.dump
find . -name test_trunk.dump | xargs perl -ne 'open NEW, ">>test_trunk_new.dump"; s/trunk\///g; print NEW'
svnadmin load ${SVN_REPOS2_PATH} --parent-dir ${REPOS2_FOLDER} --ignore-uuid < test_trunk_new.dump
rm *.dump

# check
svn checkout file://${SVN_REPOS2_PATH} test2_checkout
cd test2_checkout
svn log
cd ..
rm -rf test2_checkout
