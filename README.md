# Gantt Charts
## _For Laravel Projects_

A library built and customized to work with Laravel 5.* to show Gantt Charts.

## Installation:

Require this package with composer:

```shell
    composer require sbshara/gantt_chart
```

Copy the package css file to your public folder under CSS using the publish command:

```shell
    php artisan vendor:publish --tag="gantt"
```

## Usage

The model to display in the Gantt Chart will need to have properties of 

`label`, 
`start` and 
`end` at minimum.

- `label`: Item Name
- `start`: Item Start Date/Time (yyyy-mm-dd)
- `end`: Item End Date/Time (yyyy-mm-dd)

```php
/**
 * Get your model items however you deem necessary
 */

$select = 'title as label, DATE_FORMAT(start, \'%Y-%m-%d\') as start, DATE_FORMAT(end, \'%Y-%m-%d\') as end';
$projects = \App\Project::select(\Illuminate\Support\Facades\DB::raw($select))
                ->orderBy('start', 'asc')
                ->orderBy('end', 'asc')
                ->get();
    
/**
 *  You'll pass data as an array in this format:
 *  [
 *    [ 
 *      'label' => 'The item title',
 *      'start' => '2016-10-08',
 *      'end'   => '2016-10-14'
 *    ]
 *  ]
 */
 
$gantt = new sbshara\gantt_chart\Gantt($projects->toArray(), array(
    'title'      => 'Demo',
    'cellwidth'  => 25,
    'cellheight' => 35
));

return view('gantt')->with([ 'gantt' => $gantt ]);

```

### Display in your view

In your view, add the `gantt.css` file:

```html
    <link href="/vendor/sbshara/gantt_chart/css/gantt.css" rel="stylesheet" type="text/css">
```

And then output the gantt HTML:

```html
    {!! $gantt !!}
```

## Model Factory

Here is a factory for creating test data for your projects. You can paste this into your `database/factories/ModelFactory.php` file and then run this via `tinker`. See <https://laravel.com/docs/5.6/seeding#using-model-factories>.

```php
$factory->define(App\Project::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence(),
        'start' => $faker->dateTimeBetween('-30 days'),
        'end' => $faker->dateTimeBetween('now', '+30 days')
    ];
});
```

## Attribution

This code is adapted from https://github.com/bastianallgeier/gantti

## License: 

MIT License - <http://www.opensource.org/licenses/mit-license.php>
