# -*- mode: ruby -*-
# vi: set ft=ruby :

VAGRANTFILE_API_VERSION = '2'

# look up system cpu and ram so we can use more intelligent defaults
LINUX = RUBY_PLATFORM =~ /linux/
OSX = RUBY_PLATFORM =~ /darwin/
if OSX
  CPUS = `sysctl -n hw.ncpu`.to_i
  MEM = `sysctl -n hw.memsize`.to_i / 1024 / 1024 / 4
elsif LINUX
  CPUS = `nproc`.to_i
  MEM = `sed -n -e '/^MemTotal/s/^[^0-9]*//p' /proc/meminfo`.to_i / 1024 / 4
end

# use (faster) nfs sharing on osx only
SHARING = OSX ? { create: true, type: "nfs" } : { create: true }

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.box = 'ubuntu/bionic64'

  config.vm.provider "virtualbox" do |vb|
     vb.customize [ "modifyvm", :id, "--uartmode1", "disconnected" ]
  end


  # Allow the project directory to be accessible inside the Vagrant box.
  # This should match the Ansible host_vars/vagrant synced_folder value.
  config.vm.synced_folder '.', '/srv/www/vagrant', SHARING

  # Ideally, this IP will be unique, so the entry added to /etc/hosts won't
  # conflict with that of another project.
  config.vm.network :private_network, ip: '192.168.33.99'

  # Automatically add an entry to /etc/hosts for this Vagrant box (requires
  # sudo). This should match the Ansible host_vars/vagrant site_fqdn
  config.hostsupdater.aliases = ['yalepaprika.loc']

  # give vm access to 1/4 total system memory and all cpu
  config.vm.provider 'virtualbox' do |v|
    v.customize ['modifyvm', :id, '--memory', MEM] if defined?(MEM)
    v.customize ['modifyvm', :id, '--cpus', CPUS] if defined?(CPUS)
  end

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