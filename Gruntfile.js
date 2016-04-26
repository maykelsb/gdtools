module.exports = function(grunt) {
    // -- configuracoes do projeto
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        resourcesPath: 'app/Resources/bower',

        clean: {
            js_common: ['web/common/js/*'],
            css_common: ['web/common/css/*'],
            font_common: ['web/common/fonts/*']
        },

        copy: {
            css_common_bootstrap: {
                expand: true,
                cwd: '<%= resourcesPath %>/bootstrap/dist/css',
                src: '**/*.min.css',
                dest: 'web/common/css'
            },
            css_common_bootstrap_fonts: {
                expand: true,
                cwd: '<%= resourcesPath %>/bootstrap/dist/fonts',
                src: '**',
                dest: 'web/common/fonts'
            },
            js_common_bootstrap: {
                expand: true,
                cwd: '<%= resourcesPath %>/bootstrap/dist/js',
                src: '**/*.min.js',
                dest: 'web/common/js'
            },
            js_common_jquery: {
                expand: true,
                cwd: '<%= resourcesPath %>/jquery/dist',
                src: '**/*.min.js',
                dest: 'web/common/js'
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
