module.exports = (grunt) ->

  grunt.initConfig

    pkg: grunt.file.readJSON 'package.json'

    coffee:
      src:
        options:
          bare: true
        files:
          'lib/<%= pkg.name %>.js': 'src/dropzone.coffee'

    watch:
      scripts:
        files: ['src/*.coffee']
        tasks: ['coffee', 'umd']

    connect:
      uses_defaults: {}

    umd:
      all:
        src: 'lib/<%= pkg.name %>.js'
        template: 'umd'
        objectToExport: 'Simditor'
        globalAlias: 'Simditor'
        deps:
          'default': ['$', 'SimpleModule', 'Simditor']
          amd: ['jquery', 'simple-module', 'simditor']
          cjs: ['jquery', 'simple-module', 'simditor']
          global:
            items: ['jQuery', 'SimpleModule', 'Simditor']
            prefix: ''


  grunt.loadNpmTasks 'grunt-contrib-coffee'
  grunt.loadNpmTasks 'grunt-contrib-watch'
  grunt.loadNpmTasks 'grunt-contrib-connect'
  grunt.loadNpmTasks 'grunt-umd'

  grunt.registerTask 'default', ['coffee', 'umd', 'connect', 'watch']
