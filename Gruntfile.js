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
