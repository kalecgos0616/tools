#!/bin/bash
# $ bash create_env.sh <SVN_REPOS_PATH>
# eg. # bash create_env.sh /home/svn/

SVN_REPOS_PATH=$1
cd ${SVN_REPOS_PATH}
svnadmin create test
svnadmin create test2

# cook test repos
svn checkout file://${SVN_REPOS_PATH}test test_checkout
cd test_checkout
mkdir trunk tags branches
touch trunk/hello.txt
svn add *
svn commit -m "hello test"
svn update
svn log
cd ..

# cook test2 repos
svn checkout file://${SVN_REPOS_PATH}test2 test2_checkout
cd test2_checkout
mkdir trunk tags branches
mkdir -p trunk/media/cloud/web/internet
svn add *
svn commit -m "hello test2"
svn update
svn log
cd ..

rm -rf test_checkout test2_checkout
ls -l


# cd /home/svn/ ;
# cd /home/bear/test_command/svn