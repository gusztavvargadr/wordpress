Vagrant.configure("2") do |config|
  # https://app.vagrantup.com/gusztavvargadr/boxes/docker-linux
  config.vm.box = "gusztavvargadr/docker-linux"

  config.vm.provider "virtualbox" do |provider|
    provider.cpus = 2
    provider.memory = 2048
  end

  config.vm.provision "docker", type: "shell", path: "./build/vagrant/docker.sh", privileged: false
  config.vm.provision "node", type: "shell", path: "./build/vagrant/node.sh", privileged: false
  config.vm.provision "python", type: "shell", path: "./build/vagrant/python.sh", privileged: false
  config.vm.provision "git", type: "shell", path: "./build/vagrant/git.sh", privileged: false

  config.vm.define "samples.core" do |config|
    config.vm.network "forwarded_port", guest: 22, host: 10022, auto_correct: true

    config.vm.provision "clone", type: "shell", path: "./samples/core/vagrant/clone.sh", privileged: false
    config.vm.provision "restore", type: "shell", path: "./samples/core/vagrant/restore.sh", privileged: false
    config.vm.provision "build", type: "shell", path: "./samples/core/vagrant/build.sh", privileged: false
    config.vm.provision "start", type: "shell", path: "./samples/core/vagrant/start.sh", privileged: false, run: "always"
    config.vm.provision "install", type: "shell", path: "./samples/core/vagrant/install.sh", privileged: false
  end

  config.vm.define "samples.gutenberg-editor" do |config|
    config.vm.network "forwarded_port", guest: 22, host: 20022, auto_correct: true

    config.vm.provision "clone", type: "shell", path: "./samples/gutenberg-editor/vagrant/clone.sh", privileged: false
    config.vm.provision "restore", type: "shell", path: "./samples/gutenberg-editor/vagrant/restore.sh", privileged: false
    config.vm.provision "build", type: "shell", path: "./samples/gutenberg-editor/vagrant/build.sh", privileged: false
    config.vm.provision "start", type: "shell", path: "./samples/gutenberg-editor/vagrant/start.sh", privileged: false, run: "always"
  end

  config.vm.define "samples.gutenberg-block" do |config|
    config.vm.network "forwarded_port", guest: 22, host: 30022, auto_correct: true

    config.vm.provision "clone", type: "shell", path: "./samples/gutenberg-block/vagrant/clone.sh", privileged: false
    config.vm.provision "restore", type: "shell", path: "./samples/gutenberg-block/vagrant/restore.sh", privileged: false
    config.vm.provision "build", type: "shell", path: "./samples/gutenberg-block/vagrant/build.sh", privileged: false
    config.vm.provision "start", type: "shell", path: "./samples/gutenberg-block/vagrant/start.sh", privileged: false, run: "always"
  end

  config.vm.define "src.gutenberg-block" do |config|
    config.vm.network "forwarded_port", guest: 22, host: 40022, auto_correct: true

    config.vm.provision "clone", type: "shell", path: "./src/gutenberg-block/vagrant/clone.sh", privileged: false
    # config.vm.provision "restore", type: "shell", path: "./src/gutenberg-block/vagrant/restore.sh", privileged: false
    # config.vm.provision "build", type: "shell", path: "./src/gutenberg-block/vagrant/build.sh", privileged: false
    # config.vm.provision "start", type: "shell", path: "./src/gutenberg-block/vagrant/start.sh", privileged: false, run: "always"
  end
end
