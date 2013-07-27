#!/bin/bash

rsync --recursive --links --verbose --rsh=ssh --exclude-from ./exclude_from_deploy.txt --delete ./ kazan:/srv/simple-paste/