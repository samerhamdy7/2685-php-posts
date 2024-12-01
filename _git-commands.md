# initializa a new reposotory
git init

# to track a file
git add file/path/and/name

# to track all files
git add .

# to commit the chamges
git commit -m "Your Message"

# create a new branch
git branch branch-name

# switch to another branch
git checkout branch-name

# check all branches
git branch

# merge a branch into master
## Move to branch (master)
git checkout master

## merge the branch
git merge branch-name

## delete the merged branch
git branch -D branch-name
