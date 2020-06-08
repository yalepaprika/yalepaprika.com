# -*- mode: ruby -*-
# vi: set ft=ruby :

VAGRANTFILE_API_VERSION = '2'

OSX = RUBY_PLATFORM =~ /darwin/
# use (faster) nfs sharing on osx only
SHARING = OSX ? { create: true, type: "nfs" } : { create: true }

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vagrant.plugins = [
    "vagrant-hostsupdater",
    "vagrant-vbguest",
    "vagrant-bindfs"
  ]

  config.vm.box = 'ubuntu/bionic64'

  # Allow the project directory to be accessible inside the Vagrant box.
  # This should match the Ansible host_vars/vagrant synced_folder value.
  config.vm.synced_folder '.', '/mnt/vagrant', SHARING

  config.bindfs.bind_folder "/mnt/vagrant", "/srv/www/vagrant",
    force_user:   'www-data',
    force_group:  'www-data'

  # Ideally, this IP will be unique, so the entry added to /etc/hosts won't
  # conflict with that of another project.
  config.vm.network :private_network, ip: '192.168.33.99'

  # Automatically add an entry to /etc/hosts for this Vagrant box (requires
  # sudo). This should match the Ansible host_vars/vagrant site_fqdn
  config.hostsupdater.aliases = ['yalepaprika.loc']
  config.vm.post_up_message = 'The app is now running at https://yalepaprika.loc/'

  # A specific name looks much better than "default" in ansible output.
  config.vm.define 'vagrant'

  # The Vagrant ansible provisioner is used here for convenience. Instead of
  # the following code, the Vagrant box may be provisioned manually with
  # ansible-playbook (like in production), but adding this code saves the
  # trouble of having to run ansible-playbook manually after "vagrant up".
  config.vm.provision 'ansible' do |ansible|
    # Run init playbook (which runs base, configure, vagrant-link playbooks).
    ansible.playbook = 'deploy/init.yml'
  end
end