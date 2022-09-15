#!/bin/bash

# https://web.archive.org/web/*/http://www.apolitical.info/webgame/images/*


# hair, magic shields are skipped
# also *-thumb.jpg files are skipped

for value in `ls *.jpg`
do
    echo $value
    wget https://web.archive.org/web/20160530131213/http://www.apolitical.info/webgame/images/${value%.*}-thumb.jpg
done

