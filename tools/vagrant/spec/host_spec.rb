require 'spec_helper'
require 'resolv'
require 'yaml'

hosts = Resolv::Hosts.new
config = YAML::load_file("../hobo/config.yaml")
describe "Host" do
  it "magentoce-test.dev should route to #{config[:vm_ip]}" do
    hosts.getaddress("magentoce-test.dev").to_s.should eq config[:vm_ip]
  end
end
