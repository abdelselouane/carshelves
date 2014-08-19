module.exports = function (grunt) {
	
	var pkg = require('./package.json');

	grunt.sponsor = {
		client : encodeURIComponent(pkg.client.toLowerCase()),
		brand : encodeURIComponent(pkg.brand.toLowerCase()),
		furl : encodeURIComponent(pkg.furl.toLowerCase()),
		version : pkg.version
	};

	grunt.registerTask('default', ['tasks']);

	// Instead of building all files we prompt the user on which build they want
	grunt.registerTask('tasks', function() {
		grunt.log.subhead('Please choose a grunt task:');
		grunt.log.ok('"grunt externalCSS" - build creates an external CSS file');
		grunt.log.ok('"grunt templateCSS" - build creates a CSS file used for copying into a PB template or page');
		grunt.log.ok('"grunt externalCSSwithJS" - build for projects with JS and an external CSS file');
		grunt.log.ok('"grunt templateCSSwithJS" - build for projects with JS and a CSS file used for copying into a PB template');
		grunt.log.ok('"grunt staging" - uses ingestion service to upload files to staging');
		grunt.log.error('"grunt live" - uses ingestion service to upload files to live');
	});

	grunt.registerTask('externalCSS', [
		'clean',
		'jshint',
		'replace:externalCSS',
		'copy',
		'cssmin:externalCSS',
		'webmd-zip',
		'replace:html'
	]);
	grunt.registerTask('templateCSS', [
		'clean',
		'jshint',
		'copy',
		'webmd-zip',
		'replace:html',
		'replace:templateCSS',
		'cssmin:templateCSS'
	]);
	grunt.registerTask('externalCSSwithJS', [
		'clean',
		'jshint',
		'replace:externalCSS',
		'copy',
		'uglify',
		'cssmin:externalCSS',
		'webmd-zip',
		'replace:html'
	]);
	grunt.registerTask('templateCSSwithJS', [
		'clean',
		'jshint',
		'copy',
		'uglify',
		'webmd-zip',
		'replace:html',
		'replace:templateCSS',
		'cssmin:templateCSS'
	]);
	grunt.registerTask('doc', 'jsdoc:all'); /* shortcut since this is what people are used to */
	grunt.registerTask('test', ['jshint:all']);
	grunt.registerTask('staging', ['webmd-ingest:staging']);
	grunt.registerTask('live', ['webmd-ingest:live']);
	
	grunt.loadNpmTasks('grunt-contrib-clean');
	grunt.loadNpmTasks('grunt-text-replace');
	grunt.loadNpmTasks('grunt-contrib-copy');
	grunt.loadNpmTasks('grunt-contrib-jshint');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-webmd');
	grunt.loadNpmTasks("grunt-webmd-zip");
	grunt.loadNpmTasks('grunt-webmd-ingest');

	grunt.initConfig({
		/* self explanatory really, but you'll want to place any of the directories that need to be cleaned up here */
		clean: {
			all: ['build', 'dist']
		},

		/* Runs JS lint on all your src files and gruntfile */
		jshint: {
			all: [
				'Gruntfile.js',
				'src/**/*.js'
			]
		},

		/* replaces the image paths */
		replace: {
			externalCSS: {
				src: ['src/*.css'],
				dest:'build/external.css',
				replacements: [
					{
						from: '(img/',
						to: '(../../../../../../consumer_assets/site_images/sponsored_programs/<%= grunt.sponsor.client %>/<%= grunt.sponsor.brand %>/<%= grunt.sponsor.furl %>/'
					},
					{
						from: '"img/',
						to: '"../../../../../../consumer_assets/site_images/sponsored_programs/<%= grunt.sponsor.client %>/<%= grunt.sponsor.brand %>/<%= grunt.sponsor.furl %>/'
					},
					{
						from: "'img/",
						to: "'../../../../../../consumer_assets/site_images/sponsored_programs/<%= grunt.sponsor.client %>/<%= grunt.sponsor.brand %>/<%= grunt.sponsor.furl %>/"
					}
				]
			},
			templateCSS: {
				src: ['src/*.css'],
				dest:'build/template.css',
				replacements: [
					{
						from: '(img/',
						to: '(../../../consumer_assets/site_images/sponsored_programs/<%= grunt.sponsor.client %>/<%= grunt.sponsor.brand %>/<%= grunt.sponsor.furl %>/'
					},
					{
						from: '"img/',
						to: '"../../../consumer_assets/site_images/sponsored_programs/<%= grunt.sponsor.client %>/<%= grunt.sponsor.brand %>/<%= grunt.sponsor.furl %>/'
					},
					{
						from: "'img/",
						to: "'../../../consumer_assets/site_images/sponsored_programs/<%= grunt.sponsor.client %>/<%= grunt.sponsor.brand %>/<%= grunt.sponsor.furl %>/"
					}
				]
			},
			html: {
				src: ['src/*.htm*'],
				dest: 'dist/',
				replacements: [
					{
						from: '(img/',
						to: '({IMAGE_SERVER_URL}/webmd/consumer_assets/site_images/sponsored_programs/<%= grunt.sponsor.client %>/<%= grunt.sponsor.brand %>/<%= grunt.sponsor.furl %>/'
					},
					{
						from: '"img/',
						to: '"{IMAGE_SERVER_URL}/webmd/consumer_assets/site_images/sponsored_programs/<%= grunt.sponsor.client %>/<%= grunt.sponsor.brand %>/<%= grunt.sponsor.furl %>/'
					},
					{
						from: "'img/",
						to: "'{IMAGE_SERVER_URL}/webmd/consumer_assets/site_images/sponsored_programs/<%= grunt.sponsor.client %>/<%= grunt.sponsor.brand %>/<%= grunt.sponsor.furl %>/"
					}
				]
			}
		},

		copy: {
			images: {
				/* this copies all the files from the src/img directory over to the correct path in the dist folder for importing */
				files: [
					{
						expand: true,
						flatten: true,
						dest:'dist/webmd/consumer_assets/site_images/sponsored_programs/<%= grunt.sponsor.client %>/<%= grunt.sponsor.brand %>/<%= grunt.sponsor.furl %>/',
						src:'src/img/*'
					}
				]
			}
		},

		cssmin: {
			externalCSS: {
				options: {
					banner: '/*! revenue/<%= grunt.sponsor.client %>@<%= grunt.sponsor.version %> on <%= grunt.template.today() %>*/'
				},
				files: {
					'dist/webmd/PageBuilder_Assets/CSS/Atlanta/sponsored/<%= grunt.sponsor.client %>/<%= grunt.sponsor.brand %>/<%= grunt.sponsor.furl %>.css': [
						'build/external.css'
					]
				}
			},
			templateCSS: {
				options: {
					banner: '/*! revenue/<%= grunt.sponsor.client %>@<%= grunt.sponsor.version %> on <%= grunt.template.today() %>*/'
				},
				files: {
					'dist/template.css': [
						'build/template.css'
					]
				}
			}
		},

		/* minifies the JS and adds the version as well as time stamp at the top for easy checking against git */
		uglify: {
			options: {
				banner: '/*! revenue/<%= grunt.sponsor.client %>@<%= grunt.sponsor.version %> on <%= grunt.template.today() %>*/',
				compress: {
					drop_console: true
				}
			},
			js: {
				files: {
					'dist/webmd/PageBuilder_Assets/JS/sponsored_programs/<%= grunt.sponsor.client %>/<%= grunt.sponsor.brand %>/<%= grunt.sponsor.furl %>.js': [
						'src/*.js'
					]
				}
			}
		},

		"webmd-zip" : {
			dist : {
				src : 'dist/webmd',
				dest : 'webmd-ingest.zip'
			}
		},

		"webmd-ingest" : {
			staging: {
				src : "./webmd-ingest.zip",
				options : {
					"env" : "prod",
					"lifeCycle" : "staging"
				}
			},
			live: {
				src : "./webmd-ingest.zip",
				options : {
					"env" : "prod",
					"lifeCycle" : "active"
				}
			}
		}

	});

};
