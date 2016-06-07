module.exports = function(grunt) {
    // -- configuracoes do projeto
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        resourcesPath: 'app/Resources/bower',

        clean: {
            js_common: ['web/js/*'],
            css_common: ['web/css/*'],
            font_common: ['web/fonts/*']
        },

        copy: {
            js_angular: {
                expand: true,
                cwd: '<%= resourcesPath %>/angular',
                src: '**/angular.min.js',
                dest: 'web/js'
            },
            js_angular_rout: {
                expand: true,
                cwd: '<%= resourcesPath %>/angular-route',
                src: '**/angular-route.min.js',
                dest: 'web/js'
            },
            css_bootstrap: {
                expand: true,
                cwd: '<%= resourcesPath %>/bootstrap/dist/css',
                src: '**/*.min.css',
                dest: 'web/css'
            },
            css_bootstrap_fonts: {
                expand: true,
                cwd: '<%= resourcesPath %>/bootstrap/dist/fonts',
                src: '**',
                dest: 'web/fonts'
            },
            css_bootstrap_dashboard: {
                expand: true,
                cwd: '<%= resourcesPath %>/../',
                src: '**/dashboard.css',
                dest: 'web/css'
            }
        },

        shell: {
            cache_clear_dev: {
                options: {
                    stdout: true
                },
                command: 'php bin/console cache:clear --no-warmup'
            }
        }
    });

    // plugin: clean
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-shell');

    // tarefa default
    grunt.registerTask('default', function(){
        grunt.task.run('clean');
        grunt.task.run('copy');
    });
};
