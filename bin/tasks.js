'use strict';

module.exports = {
	'build:admin-css': [ require( './styles' ).admin ],
	'build:deprecated-css': [ require( './styles' ).deprecated ],
	'build:desktop-css': [ require( './styles' ).desktop ],
	'build:editor-css': [ require( './styles' ).editor ],
	'build:main-css': [ require( './styles' ).main ],
	'build:plugin-css': [ require( './styles' ).plugins ],
	'build:theme-css': [ require( './styles' ).themes ],

	'build:css': [ [ 'build:main-css', 'build:theme-css', 'build:desktop-css', 'build:plugin-css', 'build:admin-css', 'build:editor-css', 'build:deprecated-css' ] ],

	'build:blocks': [ require( './scripts' ).blocks ],
	'build:scripts': [ require( './scripts' ).js ],

	'build:js': [ [ 'build:scripts', 'build:blocks' ] ],

	'build:images': [ require( './images' ).img ],
	'build:svg': [ require( './images' ).svg ],

	'build:img': [ [ 'build:images', 'build:svg' ] ],

	'build:i18n': [ require( './i18n' ) ],

	'build': [ [ 'build:css', 'build:js', 'build:img', 'build:i18n' ] ],

	'create:theme': [ require( './create' ) ],

	'create': [ [ 'create:theme', 'build:css' ] ],

	'watch': [ require( './watch' ) ],
	'default': [ [ 'build', 'watch' ] ],
};
