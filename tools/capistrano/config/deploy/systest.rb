set :deploy_to, "/var/www/" + "systest_domain"
set :branch, "develop"
set :keep_releases, 5

server "user@systest_domain", :app, :primary => true
# set :gateway, "user@host" # Use if you need to bounce through another server