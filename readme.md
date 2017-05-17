## Laravel + Pusher Example

This project purposely created for [Laratalk #5](https://web.facebook.com/events/1813069609012345/) on Real-time Webapp using [Pusher](https://pusher.com).

### Setup
- Run `composer install`
- Copy `env.example` to `.env` and add your DB details
- Migrate database `php artisan migrate`
- Sign up at [pusher.com](https://pusher.com)
- Create project and you will be given cridentials such api key, secret, etc
- Update your `.env` for `PUSHER_APP_ID, PUSHER_APP_KEY, PUSHER_APP_SECRET`
- Now your are ready to Go!. Take a look at route `/feed` for simulating Realtime list and `/feed/create` to send message.
- Also take note that pusher client is using js as show [here](https://pusher.com/docs/javascript_quick_start)

### License

This project is licensed under the [MIT license](http://opensource.org/licenses/MIT).
