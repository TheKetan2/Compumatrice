json.extract! user, :id, :username, :password, :confirm_password, :f_name, :lname, :email, :phone, :location, :created_at, :updated_at
json.url user_url(user, format: :json)