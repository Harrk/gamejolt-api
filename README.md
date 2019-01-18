# Gamejolt API PHP Library

https://gamejolt.com

This library provides full (except batching) coverage of Game Jolt's API (Trophies, Scores, Sessions, etc...)
At the moment this library is written and tested for v1.2 of Game Jolt's API.


## Installation

```bash
$ composer require "harrk/gamejolt-api"
```

## Usage
Create an instance of GamejoltApi and provide a GamejoltConfig 
to begin making API calls to Game Jolt.

```php
$api = new GamejoltApi(new GamejoltConfig(
    'mygameid',
    'mygameprivatekey'
));
```

## Endpoints
### Data Store
The Data Store API can be used to store/retrieve data in the cloud.

```php
// Fetch the value for my-key
$api->dataStore()->fetch('my-key');

// Set the value for my-key to my-value
$api->dataStore()->set('my-key', 'my-value');

// Update player-logins by 1
$api->dataStore()->update('player-logins', DataStore::OPERATION_ADD, 1);

// Remove my-key
$api->dataStore()->remove('my-key');

// Fetch all keys
$api->dataStore()->getKeys();
```
### Friends
The Friends API can only be used to find the friend IDs of the user currently.
```php
// Fetch all friend ids for the user
$api->friends()->fetch('username', 'user-token');
```

### Scores
```php
//Fetch scores
$api->scores()->fetch();

//Fetch all score tables
$api->scores()->tables();

//Add a gamejolt user's score to the table
$api->scores()->addUserScore('username', 'user_token', '100 Jumps', 100);

//Add a guest's score to the table
$api->scores()->addGuestScore('Mr Guest', '50 jumps', 50);

//Get score rank
$api->scores()->getRank(60);
```

### Sessions
```php
//Open a session for the given user
$api->sessions()->open('username', 'user_token');

//Let GJ know the user session is still active
$api->sessions()->ping('username', 'user_token', Sessions::STATUS_ACTIVE);

//Check if the session is still open for user
$api->sessions()->check('username', 'user_token');

//Close the session for user
$api->sessions()->close('username', 'user_token');
```

### Time
```php
//Get GJ's server time
$api->time()->fetch();
```

### Trophies
```php
//Get all trophies
$api->trophies()->fetch('username', 'user_token');

//User has achieved a trophy with ID 1
$api->trophies()->addAchieved('username', 'user_token', 1);

//User unachieved trophy with ID 1
$api->trophies()->removeAchieved('username', 'user_token', 1);
```

### Users

```php
//Fetch data on user
$api->users()->fetch('username', 'user_token');

//Verify if the user's credentials are correct
$api->users()->auth('username', 'user_token');
```

## Testing
Two commands have been provided to simplify the running of tests.

**Run Unit Tests**
```bash
$ composer test
```

**Run Static Code Analysis**
```bash
$ composer analyse
```

## Todo
- Allow POST method on endpoints
- Increase coverage of Unit Tests

## License
MIT License
