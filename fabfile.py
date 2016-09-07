from __future__ import with_statement
from fabric.api import *
import ConfigParser

#########################################################
# Config
#########################################################

def set_config(e):
  config = ConfigParser.ConfigParser()
  config.read('./fabfile.conf')
  env.host_string = config.get(e,'host') +':'+ config.get(e,'port')
  env.user = config.get(e,'user')
  env.password = config.get(e,'password')
  env.deploy_dir = config.get(e,'deploy_dir')

def commit():
  local("git add -p && git commit")

def push():
  local("git push")

@task
def prepare_deploy():
  commit()
  push()

@task
def deploy(e="testing"):
  set_config(e);
  with settings(warn_only=True):
    run("git clone git@bitbucket.org:durino13/cms.git %s" % env.deploy_dir)
  with cd(env.deploy_dir):
    run("git pull")
    run("composer install")
