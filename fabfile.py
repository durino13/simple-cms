from fabric.api import local

env.hosts = ["shellserver.websupport.sk"]
deploy_dir = "/home/yuma.sk/sub/test"

def commit():
  local("git add -p && git commit")

def push():
  local("git push")

def prepare_deploy():
  commit()
  push()

def deploy():
  with settings(warn_only=True):
    run("git clone git@bitbucket.org:durino13/cms.git %s" % deploy_dir)
  with cd(deploy_dir):
    run("git pull")
