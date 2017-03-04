Rails.application.routes.draw do
  resources :users
  resources :users
  root "users#index"
end
