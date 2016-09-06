module.exports = function(grunt) {
  grunt.initConfig({
    bspkg: grunt.file.readJSON('bower_components/bootstrap/package.json'),
    bspath: 'bower_components/bootstrap',
    banner: '/*!\n' +
            ' * Bootstrap v<%= bspkg.version %> (<%= bspkg.homepage %>)\n' +
            ' * Copyright 2011-<%= grunt.template.today("yyyy") %> <%= bspkg.author %>\n' +
            ' * Licensed under <%= bspkg.license.type %> (<%= bspkg.license.url %>)\n' +
            ' */\n',
    less: {
      compileCore: {
        options: {
          strictMath: true,
          sourceMap: true,
          outputSourceFiles: true,
          sourceMapURL: 'main.css.map',
          sourceMapFilename: 'public/themes/default/assets/main.css.map',
          paths: '<%= bspath %>/less'
        },
        files: {
          'public/themes/default/assets/main.css': 'public/themes/default/assets/main.less'
        },
      }

    },
    autoprefixer: {
      options: {
        browsers: [
          'Android 2.3',
          'Android >= 4',
          'Chrome >= 20',
          'Firefox >= 24', // Firefox 24 is the latest ESR
          'Explorer >= 8',
          'iOS >= 6',
          'Opera >= 12',
          'Safari >= 6'
        ]
      },
      core: {
        options: {
          map: true
        },
        src: 'public/themes/default/assets/main.css'
      }
    },
    cssmin: {
      options: {
        compatibility: 'ie8',
        keepSpecialComments: '*',
        noAdvanced: true
      },
      core: {
        files: {
          'public/themes/default/assets/main.min.css': 'public/themes/default/assets/main.css'
        }
      }
    },
    usebanner: {
      options: {
        position: 'top',
        banner: '<%= banner %>'
      },
      files: {
        src: 'public/themes/default/assets/main.css'
      }
    },
    uglify: {
        build: {
            files: {
                'public/themes/default/assets/jquery.min.js': ['bower_components/jquery/dist/jquery.min.js'],
                'public/themes/default/assets/base.min.js': ['bower_components/bootstrap/dist/js/bootstrap.min.js']
            }
        }
    },
    qunit: {
      files: ['test/**/*.html']
    },
    jshint: {
      files: ['Gruntfile.js', 'src/**/*.js', 'test/**/*.js'],
      options: {
        // options here to override JSHint defaults
        globals: {
          jQuery: true,
          console: true,
          module: true,
          document: true
        }
      }
    },
    /*
    htmlhint: {
        build: {
            options: {
                'tag-pair': true,
                'tagname-lowercase': true,
                'attr-lowercase': true,
                'attr-value-double-quotes': true,
                'doctype-first': true,
                'spec-char-escape': true,
                'id-unique': true,
                'head-script-disabled': true,
                'style-disabled': true
            },
            src: ['index.html']
        }
    }
    */
    browserSync: {
        dev: {
            bsFiles: {
                src : [
                        'public/themes/**/*.min.css',
                        'public/themes/**/*.min.js',
                        'public/**/*.blade.php',
                        'resources/views/**/*.blade.php',
                        '**/*.php',
                        'public/**/*.html',
                        'public/content/**/*.md'
                        //'app/css/*.css',
                        //'app/*.html'
                    ]
            },
            options: {
                watchTask: true,
                proxy: 'localhost'
            }
        }
    },
    watch: {
        configFiles: {
          files: [ 'Gruntfile.js', 'config/*.js' ],
          options: {
            reload: true
          }
        },
        html: {
            files: ['index.html'],
            tasks: ['htmlhint']
        },
        js: {
            files: ['public/themes/default/assets/base.min.js', 'public/themes/assets/default/jquery.min.js'],
            tasks: ['uglify']
        },
        less: {
            files: ['public/themes/default/assets/main.less', 'public/themes/assets/default/variables.less'],
            tasks: ['less', 'cssmin'],
        },
    }
  });

  // Loading our grunt modules
  grunt.loadNpmTasks('grunt-autoprefixer');
  grunt.loadNpmTasks('grunt-banner');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-less');
  grunt.loadNpmTasks('grunt-contrib-uglify');

  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-qunit');

  grunt.loadNpmTasks('grunt-browser-sync');

  grunt.loadNpmTasks('grunt-contrib-watch');

  // CSS distribution task.
  // grunt.registerTask('default', ['less:compileCore', 'autoprefixer', 'usebanner', 'cssmin']);
  grunt.registerTask('default', ['less:compileCore', 'autoprefixer', 'usebanner', 'cssmin', 'uglify', 'browserSync', 'watch']);
  // grunt.registerTask('test', ['jshint', 'qunit']);
};
