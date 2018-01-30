#Week 4 Survey Results

Responses for the survey follow.

###Any controller questions/topics that you would like me to address in class?

- What is the difference between secure and unsecure signing in git?  
_Signing in git is done using GPG keys. This is cryptographically secure.  
There is no "unsecure signing".  
There is the unsecure technique of adding a "signed off by ..." comment to a git commit,
using whatever alias (bogus or not) you claim for yourself. This is not a signed commit._

- Is GPG signing the same with secure signing or unsecure signing?  
_No. See above._

- Is the `-s` switch in `git commit -s -m <msg>` using GPG signing? Which one should be used? secure or unsecure? How can I set up secure signing?  
_No.  
`git commit -s ...` adds a "signed off by ..." comment, using the username from your git config.  
`git commit -S ...` GPG signs the commit, using the signing key from your git config and that you registered with your git repository._  

_With a signed commit, contributions are attributed to you. With an unsigned commit, contributions may be attributed to you if your git 
config username matches that of a contributor for the repo you are
committing to. Note that someone else could commit buggy or virus-laden code, claiming to be you, using just a signed-off-by commit._

_User names can be totally spoofed with an unsigned commit. [Here's an example](https://medium.com/@pjbgf/spoofing-git-commits-7bef357d72f0)_

_If you change your signing key, that can mess up some analytics associated with your commits._

**My earlier explanations may not have been clear ... see the [ultimate authority](https://help.github.com/articles/signing-commits-with-gpg/).**

