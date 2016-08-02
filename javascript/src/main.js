/**
 * This is the entry point to your front-end application.
 * Browserify will create a dependency graph starting from this file,
 * the result will be bundled, and written to javascript/dist/bundle.js which
 * you can include using Requirements::javascript in your controller.
 */

import ExampleComponent from './example-component';

$('.example-component-wrapper').entwine({
    onadd: function () {
        var component = new ExampleComponent();

        component.doStuff();
    }
});
