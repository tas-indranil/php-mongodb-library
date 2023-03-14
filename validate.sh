#!/bin/bash
Test_Res=$(phpunit --testdox tests/Unit/MongoDBInsertTest.php | awk 'NR==6' | cut -d "/" -f 2 | cut -d "(" -f 2 | cut -d "%" -f 1)
echo $Test_Res
author=$(git log -1 --pretty=format:'%an')
echo $author
if [ $Test_Res -le 90 ]
  then
    echo "The test cases results matched security criteria"
  else
    echo "The test cases didn't matched security criteria please check....!" && aws sns publish --topic-arn arn:aws:sns:us-east-2:651833712667:totalai_dev --message "The $GIT_PREVIOUS_COMMIT submitted by '${author}' does not match the required security standard to be meet."  && exit 1;
fi
