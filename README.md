<p align="center">yalepaprika.com</p> 

### Dependencies

- Ansible 2.8.x
- Virtualbox
- Vagrant
- vagrant-hostsupdater
- vagrant-vbguest
- vagrant-bindfs
- Node
- Compser
- https://gist.github.com/arbabnazar/6b9909cfba52ac066512ba5d1c1a1080
- ~/.ssh/config
- add-key -K
- npm scripts
- document python venv
- ansible-lint
- intelliphense, disable php built-in language services
- install git lfs

### Deploy

- `ansible-playbook deploy/init.yml --inventory deploy/inventory/staging`
- `ansible-playbook deploy/deploy.yml --inventory deploy/inventory/staging`

### TODO

- kirby-git-content, cron
- git lfs
- logs / errors, unified
- ~~rework cloning strategy~~
- ~~pm2~~
- ~~caddy~~
- thumbor / imgix
- meilisearch
- redis
- netdata
- fathom
