load 'deploy' if respond_to?(:namespace) # cap2 differentiator

require 'capifony_symfony2'

Dir['vendor/gems/*/recipes/*.rb','vendor/plugins/*/recipes/*.rb'].each { |plugin| load(plugin) }

load 'app/config/deploy.rb'

