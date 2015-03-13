/* global require, process */
module.exports = function( grunt ) {
	'use strict';

	// Load grunt plugins
	require( 'time-grunt' )(grunt);

	// Define project configuration
	var project = {
		paths: {
			config:       'config/',
			assets:       'assets/',
			dist:         'dist/',
			docs:         'docs/',
			languages:    'languages/',
			logs:         'logs/',
			tmp:          'tmp/',
			authorAssets: 'assets/flagship/',
			bower:        'assets/bower/',
			composer:     'assets/composer/',
			grunt:        'config/grunt/',
			hybridCore:   'hybrid-core/',
			tasks:        'config/grunt/tasks/'
		},
		pkg: grunt.file.readJSON( 'package.json' )
	};

	project.files = {
		js:     project.paths.assets       + '{,*/}js/*.js',
		scss:   project.paths.authorAssets + 'scss/**/*.scss',
		config: project.paths.config       + '**/*.js',
		php: [
			'*.php',
			'**/*.php',
			'!.git/**/*',
			'!.sass-cache/**/*',
			'!assets/**/*',
			'!css/**/*',
			'!dist/**/*',
			'!font/**/*',
			'!images/**/*',
			'!js/**/*',
			'!languages/**/*',
			'!logs/**/*',
			'!node_modules/**/*',
			'!tmp/**/*'
		],
		changelog: 'CHANGELOG.md'
	};

	// Load Grunt plugin configurations
	require( 'load-grunt-config' )(grunt, {
		configPath: require( 'path' ).join( process.cwd(), project.paths.grunt ),
		data: project,
		jitGrunt: {
			staticMappings: {
				addtextdomain: 'grunt-wp-i18n',
				makepot:       'grunt-wp-i18n',
				scsslint:      'grunt-scss-lint',
				usebanner:     'grunt-banner',
				wpcss:         'grunt-wp-css'
			},
			loadTasks: project.paths.tasks
		}
	});
};
