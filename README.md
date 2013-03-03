# MongoDB aggregation demo (using Lithium)

This is a port of [Ross Lawley][1]'s [candlestick demo][2] ported to PHP 5.4 for
presentation at the [London Lithium/CakePHP meetup][3].

## Setup

### Install Dependencies

    $ composer.phar install

### Cache Directory

Ensure the `resources/tmp/cache/` directory is writable by your web server.

### Configuration

The MongoDB connection may be configured in
`app/config/bootstrap/connections.php`.

### Load Data Fixtures

Load the provide sample data into the `demo.money` collection:

    $ mongorestore -d demo -c money --drop ./money.bson

  [1]: https://github.com/rozza
  [2]: https://github.com/rozza/demos
  [3]: http://www.meetup.com/lithium-uk/events/79406232/
