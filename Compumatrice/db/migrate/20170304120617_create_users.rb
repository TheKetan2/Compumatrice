class CreateUsers < ActiveRecord::Migration
  def change
    create_table :users do |t|
      t.string :username
      t.string :password
      t.string :confirm_password
      t.string :f_name
      t.string :lname
      t.string :email
      t.integer :phone
      t.string :location

      t.timestamps null: false
    end
  end
end
