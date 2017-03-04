class User < ActiveRecord::Base
    validates :username, presence: true
    validates :password, confirmation: true
    validates :f_name, :presence => true
    validates :lname, :presence => true
    validates :email, :presence =>true
    validates_email_format_of :email, :message => 'Enter Valid Email'
    validates :phone, :presence => true
    validates :location, :presence => true

end
