# Content management system

## Deployment

- run tests
    cd /www/cms/tests
    python TestSuite.py
- git add .
- git commit -m "Commit message"
- npm version <major> <minor> <patch> // Increases the version number in package.json file and creates a commit ..
- fab deploy:testing
- fab deploy:production

