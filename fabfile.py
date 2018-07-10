from __future__ import with_statement
from fabric.api import *
import ConfigParser

# Config

def read_config(e):
  config = ConfigParser.ConfigParser()
  config.read('./fabfile.conf')
  env.host_string = config.get(e,'host') +':'+ config.get(e,'port')
  env.deploy_dir = config.get(e,'deploy_dir')
  env.use_ssh_config = True
  env.user = 'uid58820'

# Task

@task
def deploy(e="testing"):

  # Read the configuration file
  read_config(e);

  # Try to clone
  with settings(warn_only=True):
    run("git clone https://github.com/durino13/simple-cms.git %s" % env.deploy_dir)

  # Pull & install dependencies
  with cd(env.deploy_dir):
    run("git pull")
    run("composer install")
    run("npm install")
    run("npm run build")
