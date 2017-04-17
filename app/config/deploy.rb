role :web, "51.255.49.2"
role :app, "51.255.49.2", :primary => true

set :application, "bitbucket-status"
set :deploy_to, "/web/bitbucket-status"
set :user, "fodaveg"
set :ssh_options, {:forward_agent => true, :port => 7850}
#set :shared_children, %w(app/logs)

set :parameters_file, "parameters.yml.dist"
set :shared_files,      ["app/config/parameters.yml"]
#this is the default shared_children configuration, so you don't need to uncomment unless you wanna some change
set :shared_children,     ["var/logs", "var/cache/sessions", web_path + "/uploads"]

default_run_options[:shell] = '/bin/bash'

set :scm, :git
set :repository, "git@github.com:fodaveg/bitbucket-status.git"
set :deploy_via, :remote_cache
set :branch, "master"

set :model_manager, "doctrine"

#logger.level = Logger::MAX_LEVEL
logger.level = 3

set :use_sudo, false
default_run_options[:pty] = true
set :writable_dirs, ["var/cache", "var/logs"]
set :keep_releases, 5
set :use_set_permissions, true
set :webserver_user, "www-data"
set :permission_method,   :acl


set :dump_assetic_assets, false
set :normalize_asset_timestamps, false

set :use_composer, true
set :composer_options, "--verbose"

task :do_deploy do
	symfony.composer.install
end



task :quick_deploy do
	capifony_pretty_print "--> Doing quick deploy (updating)"

	if !dry_run
		run "cd #{current_path} ; git fetch 2>&1 ; git checkout origin/master 2>&1 ; php bin/console cache:clear --env=#{symfony_env_prod}"
	end
	capifony_puts_ok
end

namespace :composer do
  task :copy_vendors, :except => { :no_release => true } do
    capifony_pretty_print "--> Copy vendor file from previous release"

    run "vendorDir=#{current_path}/vendor; if [ -d $vendorDir ] || [ -h $vendorDir ]; then cp -a $vendorDir #{latest_release}/vendor; fi;"
    capifony_puts_ok
  end
end

after "deploy", "deploy:cleanup"
before 'symfony:composer:install', 'composer:copy_vendors'
before 'symfony:composer:update', 'composer:copy_vendors'

