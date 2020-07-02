Vagrant.configure("2") do |config|
  # https://app.vagrantup.com/gusztavvargadr/boxes/docker-linux
  config.vm.box = "gusztavvargadr/docker-linux"

  config.vm.provider "virtualbox" do |virtualbox|
    virtualbox.cpus = 2
    virtualbox.memory = 2048
  end

  config.vm.provision "docker", type: "shell", path: "./build/vagrant/docker.sh", privileged: false
  config.vm.provision "node", type: "shell", path: "./build/vagrant/node.sh", privileged: false
  config.vm.provision "python", type: "shell", path: "./build/vagrant/python.sh", privileged: false
  config.vm.provision "git", type: "shell", path: "./build/vagrant/git.sh", privileged: false

  config.vm.define "core" do |core|
    core.vm.network "forwarded_port", guest: 8889, host: 8889, auto_correct: true

    core.vm.provision "clone", type: "shell", path: "./samples/core/vagrant/clone.sh", privileged: false
    core.vm.provision "restore", type: "shell", path: "./samples/core/vagrant/restore.sh", privileged: false
    core.vm.provision "build", type: "shell", path: "./samples/core/vagrant/build.sh", privileged: false
    core.vm.provision "start", type: "shell", path: "./samples/core/vagrant/start.sh", privileged: false, run: "always"
    core.vm.provision "install", type: "shell", path: "./samples/core/vagrant/install.sh", privileged: false
  end

  config.vm.define "gutenberg-editor" do |core|
    core.vm.network "forwarded_port", guest: 8888, host: 8888, auto_correct: true

    core.vm.provision "clone", type: "shell", path: "./samples/gutenberg-editor/vagrant/clone.sh", privileged: false
    core.vm.provision "restore", type: "shell", path: "./samples/gutenberg-editor/vagrant/restore.sh", privileged: false
    core.vm.provision "build", type: "shell", path: "./samples/gutenberg-editor/vagrant/build.sh", privileged: false
    core.vm.provision "start", type: "shell", path: "./samples/gutenberg-editor/vagrant/start.sh", privileged: false, run: "always"
  end
end
