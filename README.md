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
- set up .env
- set up .vault_pass

### Deploy

- provision, first time with user=root
- configure, first time with user=root
- add ForwardAgent to ~/.ssh/config
- run deploy (no user=root needed from here on out)


- `export $(cat .env | xargs) && vagrant provision` (zsh)
- `export (cat .env | xargs -L 1) && vagrant provision` (fish)
- `export $(cat .env | xargs) && ansible-playbook deploy/init.yml --inventory deploy/inventory/staging --vault-password-file .vault_pass`
- `export $(cat .env | xargs) && ansible-playbook deploy/deploy.yml --inventory deploy/inventory/staging --vault-password-file .vault_pass`
- `export $(cat .env | xargs) && ansible-playbook deploy/provision.yml --inventory deploy/inventory/production --vault-password-file .vault_pass --user=root`


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
